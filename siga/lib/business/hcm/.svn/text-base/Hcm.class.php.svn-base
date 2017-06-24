<?php
class Hcm {
    public static function salvarMedlab($hcregmedlab){
        if ($hcregmedlab->getId()==""){
                $numero=str_pad($hcregmedlab->getCorrelativo(), 8, '0', STR_PAD_LEFT);
                $hcregmedlab->setCodmedlab($numero);
        }
        $hcregmedlab->save();
    }

    public static function grabarGasFun($hcgasfun){
        if ($hcgasfun->getId()==""){
          $numero=str_pad($hcgasfun->getCorrelativo(), 8, '0', STR_PAD_LEFT);
          $hcgasfun->setCodgas($numero);

          $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
          $hcgasfun->setLoguse($loguse);

                /*if (!$hcgasfun->getMisben())
                    $sql="UPDATE nphojint SET hcmexo='N' WHERE codemp='".$hcgasfun->getCodemp()."' AND cedemp='".$hcgasfun->getCedemp()."'";
                else 
                    $sql="UPDATE npinffam SET status='I' WHERE codemp='".$hcgasfun->getCodemp()."' AND cedfam='".$hcgasfun->getCedfam()."' AND nomfam='".$hcgasfun->getNomfam()."'";
                H::insertarRegistros($sql);*/
        }
        $hcgasfun->save();
    }

    public static function grabarExaCon($hcexacon){
        if ($hcexacon->getId()==""){
                $numero=str_pad($hcexacon->getCorrelativo(), 8, '0', STR_PAD_LEFT);
                $hcexacon->setRefexacon($numero);

          $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
          $hcexacon->setLoguse($loguse);
        }
        
        $c=new Criteria();
        $c->add(HcregmedlabPeer::CODMEDLAB,$hcexacon->getCodmedlab());
        $r=HcregmedlabPeer::doSelectOne($c);
        if($r->getTipmedlab()=='M'){
            $hcexacon->setTipexacon('C');
        }else{
            $hcexacon->setTipexacon('E');
        }
        $hcexacon->save();
    }

    public static function grabarLiqRee($hcliqree){
        if ($hcliqree->getId()==""){
          $numero=str_pad($hcliqree->getCorrelativo(), 8, '0', STR_PAD_LEFT);
          $hcliqree->setCodliq($numero);
          $hcliqree->setStacie('N');

          $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
          $hcliqree->setLoguse($loguse);
        }
        if ($hcliqree->getStacpr()!='S')
          $hcliqree->save();
    }

    public static function aprobarReembolso($grid){
        $g=$grid[0];
        $n=0;
        while ($n<count($g)){
          if($g[$n]->getCheck()==1){
              $g[$n]->setStatus('S');
              $g[$n]->setFecapr(date('Y-m-d'));
              $g[$n]->setUsrapr(sfContext::getInstance()->getUser()->getAttribute('loguse'));
              $g[$n]->save();
          }
           if($g[$n]->getCheck2()==1){
              $g[$n]->setStatus('N');
              $g[$n]->setFecapr(date('Y-m-d'));
              $g[$n]->setUsrapr(sfContext::getInstance()->getUser()->getAttribute('loguse'));
              $g[$n]->save();
          }
          $n++;
        }
    }

    public static function cerrarReembolso($hccieree, $grid, &$emp){
        $emp="";
        $tabla=HcdefgenPeer::doSelectOne(new Criteria());
        if ($tabla) { 
          $codreem=$tabla->getCodreem();       
          $codreeo=$tabla->getCodreeo();  
          if ($codreeo=='' || $codreem=='')  
            return 2010;
        }

        $g=$grid[0];
        $n=0;
        while ($n<count($g)){
            if ($g[$n]->getCheck()==1) {
              $codemp=$g[$n]->getCodemp();
              $codcar=$g[$n]->getCodcar();
              $c = new Criteria();
              $c->add(NpasiconempPeer::CODEMP,$codemp);
              $c->add(NpasiconempPeer::CODCAR,$codcar);
              if ($g[$n]->getTipliq()=='M' || $g[$n]->getTipliq()=='D'){
                  $c->add(NpasiconempPeer::CODCON,$codreem);
                  $z = NpasiconempPeer::doSelectOne($c);                  
              }else{
                  $c->add(NpasiconempPeer::CODCON,$codreeo);
                  $z = NpasiconempPeer::doSelectOne($c);                  
              }
              if (!$z) 
                if ($emp=='')
                  $emp=$codemp;
                else $emp=', '.$codemp;
            }
        $n++;
      }
      if ($emp!='')
        return 2011;
        
        $g=$grid[0];
        $n=0;
        while ($n<count($g)){
            if ($g[$n]->getCheck()==1) {
              $numero=str_pad($g[$n]->getCorrelativo(), 8, '0', STR_PAD_LEFT);
              $g[$n]->setCodcie($numero);
              $g[$n]->setFeccie(date('Y-m-d'));                    
              $codemp=$g[$n]->getCodemp();
              $codcar=$g[$n]->getCodcar();
              
              $c = new Criteria();
              $c->add(NpasiconempPeer::CODEMP,$codemp);
              $c->add(NpasiconempPeer::CODCAR,$codcar);
              if ($g[$n]->getTipliq()=='M' || $g[$n]->getTipliq()=='D'){
                  $c->add(NpasiconempPeer::CODCON,$codreem);
                  $z = NpasiconempPeer::doSelectOne($c);
                  if ($z) {
                  $moncie=$z->getMonto()+H::toFloat($g[$n]->getMoncie());
                  $sql2="update npasiconemp set monto='".$moncie."' where codemp='".$codemp."' and codcar='".$codcar."' and codcon='".$codreem."' ";
                }
              }else{
                  $c->add(NpasiconempPeer::CODCON,$codreeo);
                  $z = NpasiconempPeer::doSelectOne($c);
                  if ($z) {
                  $moncie=$z->getMonto()+H::toFloat($g[$n]->getMoncie());
                  $sql2="update npasiconemp set monto='".$moncie."' where codemp='".$codemp."' and codcar='".$codcar."' and codcon='".$codreeo."' ";
                }
              }
              H::insertarRegistros($sql2);
              $sql="update hcliqree set stacie='S', codcie='".$numero."' where codemp='".$codemp."' and tipliq='".$g[$n]->getTipliq()."' and status='S' and fecliq='".$g[$n]->getFecliq()."'";
              H::insertarRegistros($sql);
              $g[$n]->save();
            }           
            $n++;
        }

        return -1;
    }
    
    public static function reversarReembolso($hccieree, $grid){

        $tabla=HcdefgenPeer::doSelectOne(new Criteria());
        if ($tabla) { 
          $codreem=$tabla->getCodreem();       
          $codreeo=$tabla->getCodreeo();    
        }
        
        $g=$grid[0];
        $n=0;
        while ($n<count($g)){          
            if ($g[$n]->getCheck()==1) {
              $codcie=$g[$n]->getCodcie();
              $codemp=$g[$n]->getCodemp();
              $codcar=$g[$n]->getCodcar();
              
              $c = new Criteria();
              $c->add(NpasiconempPeer::CODEMP,$codemp);
              $c->add(NpasiconempPeer::CODCAR,$codcar);
              if ($g[$n]->getTipliq()=='M' || $g[$n]->getTipliq()=='D'){
                  $c->add(NpasiconempPeer::CODCON,$codreem);
                  $z = NpasiconempPeer::doSelectOne($c);
                  $moncie=$z->getMonto()-H::toFloat($g[$n]->getMoncie());
                  $sql2="update npasiconemp set monto='".$moncie."' where codemp='".$codemp."' and codcar='".$codcar."' and codcon='".$codreem."' ";
              }else{
                  $c->add(NpasiconempPeer::CODCON,$codreeo);
                  $z = NpasiconempPeer::doSelectOne($c);
                  $moncie=$z->getMonto()-H::toFloat($g[$n]->getMoncie());
                  $sql2="update npasiconemp set monto='".$moncie."' where codemp='".$codemp."' and codcar='".$codcar."' and codcon='".$codreeo."' ";                          
              }
              H::insertarRegistros($sql2);
              $sql="update hcliqree set stacie='N', codcie=null where codemp='".$codemp."' and codcie='".$codcie."'";
              H::insertarRegistros($sql);
              $g[$n]->delete();
            }
            $n++;
        }
    }

    public static function grabarCarava($hccarava){
        if ($hccarava->getId()==""){
          $numero=str_pad($hccarava->getCorrelativo(), 8, '0', STR_PAD_LEFT);
          $hccarava->setNumcar($numero);

          $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
          $hccarava->setLoguse($loguse);
        }
        $hccarava->save();
    }

    public static function aprobarReembolsoConPre($grid){
        $g=$grid[0];
        $n=0;
        while ($n<count($g)){
          if($g[$n]->getCheck()==1){
              $g[$n]->setStacpr('S');
              $g[$n]->setFecaprcp(date('Y-m-d'));
              $g[$n]->setUsraprcp(sfContext::getInstance()->getUser()->getAttribute('loguse'));
              $g[$n]->save();
          }
           if($g[$n]->getCheck2()==1){
              $g[$n]->setStacpr('N');
              $g[$n]->setFecaprcp(date('Y-m-d'));
              $g[$n]->setUsraprcp(sfContext::getInstance()->getUser()->getAttribute('loguse'));
              $g[$n]->save();
          }
          $n++;
        }
    }
}
?>
