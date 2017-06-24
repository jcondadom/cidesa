<?php

/**
 * nomptocta actions.
 *
 * @package    siga
 * @subpackage nomptocta
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomptoctaActions extends autonomptoctaActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
   if (!$this->npptocta->getId()){
     $anofis=Autenticacion::anoPeriodo2();
     $this->npptocta->setNumpta('################'.$anofis);
   }
    
    $this->configGrid($this->npptocta->getNumpta());
    $this->configGrid2($this->npptocta->getNumpta(),$this->npptocta->getCodcar(),$this->npptocta->getCodniv());

  }

  public function configGrid($numpta='')
  {
     $c = new Criteria();
     $c->add(NpdetptoctaPeer::NUMPTA, $numpta);
     $reg = NpdetptoctaPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomptocta/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');

     $params= array('param1' => "'+$('npptocta_codnom').value+'", 'val2');

     $this->columnas[1][0]->setCatalogo('npdefcpt', 'sf_admin_edit_form', array('codcon' => 1, 'nomcon' => 2), 'Nomdefespcestic_Npdefcpt', $params);
     
     $this->obj = $this->columnas[0]->getConfig($reg);

     $this->npptocta->setObj($this->obj);
  }

  public function configGrid2($numpta='',$codcar='',$codniv='')
  {
     $det=array();
     $result=array();

     if ($codniv=='' || $codcar==''){
        $sql='select \'1\' as check,a.codcar as codcar, a.codniv as codniv, a.desfun as desfun from npfuncarptocta a left outer join npasocarfun b on a.codcar=b.codcar and a.codniv=b.codniv and a.desfun=b.desfun
          where a.numpta=\''.$numpta.'\'        
          order by 2';
      }else {
        $sql='select \'1\' as check,a.codcar as codcar, a.codniv as codniv, a.desfun as desfun from npfuncarptocta a left outer join npasocarfun b on a.codcar=b.codcar and a.codniv=b.codniv and a.desfun=b.desfun
          where a.numpta=\''.$numpta.'\'
          union 
          select \'0\' as check,codcar as codcar,codniv as codniv, desfun as desfun from npasocarfun where desfun not in (select desfun from npfuncarptocta where codcar=codcar and codniv=codniv and numpta=\''.$numpta.'\') and codcar=\''.$codcar.'\' and codniv=\''.$codniv.'\'
          order by 2';
      }
     Herramientas::BuscarDatos($sql,$result);
     if (count($result)>0)
     {
         $i=0;
         while ($i<count($result))
         {
             $npfuncarptocta= new Npfuncarptocta();
             $npfuncarptocta->setCheck($result[$i]["check"]);
             $npfuncarptocta->setDesfun($result[$i]["desfun"]);
             $npfuncarptocta->setCodcar($result[$i]["codcar"]);
             $npfuncarptocta->setCodniv($result[$i]["codniv"]);
             $det[]= $npfuncarptocta;        
             $i++;
         }
     }

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomptocta/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid2');
     
     $this->obj2 = $this->columnas[0]->getConfig($det);

     $this->npptocta->setObj2($this->obj2);
  }  

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato=""; $sw=true;
    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(NphojintPeer::CODEMP,$codigo);
        $c->add(NpasicarempPeer::STATUS,'V');
        $c->addJoin(NphojintPeer::CODEMP,NpasicarempPeer::CODEMP);
        $result= NphojintPeer::doSelectOne($c);
        if ($result)
          $dato=$result->getNomemp();
        else
          $js="alert_('El Empleado no esta registrado'); $('npptocta_codempa').value=''; $('npptocta_nomempa').value=''; $('npptocta_codempa').focus(); ";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        $c= new Criteria();
        $c->add(NphojintPeer::CODEMP,$codigo);
        $c->add(NpasicarempPeer::STATUS,'V');
        $c->addJoin(NphojintPeer::CODEMP,NpasicarempPeer::CODEMP);
        $result= NphojintPeer::doSelectOne($c);
        if ($result)
          $dato=$result->getNomemp();
        else
          $js="alert_('El Empleado no esta registrado'); $('npptocta_codempp').value=''; $('npptocta_nomempp').value=''; $('npptocta_codempp').focus(); ";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
        $tippto = $this->getRequestParameter('tippto');
        $c= new Criteria();
        $c->add(NphojintPeer::CODEMP,$codigo);
        $c->add(NphojintPeer::STAEMP,'E');
        $result= NphojintPeer::doSelectOne($c);
        if ($result){
          $dato=$result->getNomemp();
          $nivel=$result->getCodniv().' - '.$result->getDesniv();          
          $local=$result->getCodubi().' - '.$result->getDesubi();          
          $codniv=$result->getCodniv();
          $fechas=date('d/m/Y',strtotime($result->getFecinicon())).' - '.date('d/m/Y',strtotime($result->getFecfincon()));
          $js="$('npptocta_codniv').value='".$codniv."'; $('npptocta_nivel').value='".$nivel."'; $('npptocta_local').value='".$local."'; $('npptocta_cedemp').value='".$result->getCedemp()."'; $('npptocta_fechas').value='".$fechas."'; ";
          if ($tippto=='A'){
            $fecing=date('d/m/Y',strtotime($result->getFecing()));
            $js.="$('npptocta_fecing').value='".$fecing."'";
          }else {
            $js.="$('npptocta_fecing').value=''";
          }

        }else
          $js="alert_('El Empleado no esta registrado'); $('npptocta_codemp').value=''; $('npptocta_nomemp').value=''; $('npptocta_codemp').focus(); ";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;        
      case '4':
        $c= new Criteria();
        $c->add(NpnominaPeer::CODNOM,$codigo);
        $result= NpnominaPeer::doSelectOne($c);
        if ($result)
          $dato=$result->getNomnom();
        else
          $js="alert_('La Nómina no esta registrada'); $('npptocta_codnom').value=''; $('npptocta_nomnom').value=''; $('npptocta_codnom').focus(); ";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break; 
      case '5':
        $codnom=$this->getRequestParameter('nomina','');
        $codniv=$this->getRequestParameter('codniv','');
        $sw=false;
        $c= new Criteria();
        $c->add(NpcargosPeer::CODCAR,$codigo);
        $c->add(NpasicarnomPeer::CODNOM,$codnom);
        $c->addJoin(NpcargosPeer::CODCAR,NpasicarnomPeer::CODCAR);
        $result= NpcargosPeer::doSelectOne($c);
        if ($result)
          $dato=$result->getNomcar();
        else
          $js="alert_('El Cargo no esta registrado o no esta asociado a la n&oacute;mina'); $('npptocta_codcar').value=''; $('npptocta_nomcar').value=''; $('npptocta_codcar').focus(); ";
        
        $this->params=array();
        $this->npptocta = $this->getNpptoctaOrCreate();
        $this->labels = $this->getLabels();

        $this->configGrid2('', $codigo,$codniv);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;             
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if ($sw) return sfView::HEADER_ONLY;

  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

       $this->npptocta = $this->getNpptoctaOrCreate();
       try{ $this->updateNpptoctaFromRequest();}catch(Exception $ex){}

      /* $this->configGrid();
       $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

       $npdetptocta = $grid[0];
       foreach ($npdetptocta as $reg){
           if ($reg->getMoncon() <= 0) {
               $this->coderr = 4416;
           } 
       }*/

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $this->configGrid2();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    if (!$clasemodelo->getId())
    {
      $tienecorrelativo = false;
      if (Herramientas::getVerCorrelativo('corpto', 'npdefgen', $r)) {
        if (substr($clasemodelo->getNumpta(),0,strlen($clasemodelo->getNumpta())-4) == '################') {
          $tienecorrelativo = true;
          $encontrado = false;
          while (!$encontrado) {
            $numero = str_pad($r, 16, '0', STR_PAD_LEFT).substr($clasemodelo->getNumpta(),strlen($clasemodelo->getNumpta())-4,4);

            $sql = "select numpta from npptocta where numpta='" . $numero . "'";
            if (Herramientas::BuscarDatos($sql, $result)) {
              $r = $r + 1;
            } else {
              $encontrado = true;
            }
          }
          $clasemodelo->setNumpta($numero);
        }
     }     
     $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
     $clasemodelo->setLoguse($loguse);
   }   

   $clasemodelo->save();
   if ($tienecorrelativo)
     Herramientas::getSalvarCorrelativo('corpto', 'npdefgen', 'Punto de Cuenta', $r, $msg); 

    //Salvar Conceptos
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCodcon() != ''){
        $x[$j]->setNumpta($clasemodelo->getNumpta());
        $x[$j]->save();
      }
      $j++;
    }
    $z = $grid[1];
    $h = 0;
    if (!empty($z[$h]))
    {
      while ($h < count($z))
      {
        $z[$h]->delete();
        $h++;
      }
    }

    //Salvar Funciones-Punto Cuenta
     $t= new Criteria();
     $t->add(NpfuncarptoctaPeer::NUMPTA,$clasemodelo->getNumpta());
     NpfuncarptoctaPeer::doDelete($t);

      $l=$grid2[0];
      $b=0;
      while ($b<count($l)){
          if($l[$b]->getCheck()=="1"){
             $l[$b]->setNumpta($clasemodelo->getNumpta());          
             $l[$b]->save();
          }
        $b++;
      }     

    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Npdetptocta', 'Numpta', $clasemodelo->getNumpta());
    H::EliminarRegistro('Npfuncarptocta', 'Numpta', $clasemodelo->getNumpta());
    return parent::deleting($clasemodelo);
  }

  public function executeAjaxgrid() {
    $name = $this->getRequestParameter('grid', 'a');
    $grid = $this->getRequestParameter('grid' . $name, '');
    $fila = $this->getRequestParameter('fila', '');
    $col = $this->getRequestParameter('columna', '');
    $codnom= $this->getRequestParameter('npptocta_codnom','');
    $javascript = "";
    $jsonextra = "";
    switch ($name) {
        case ('a'):
            switch ($col) {
                case ('1'):   //Codigo Concepto
                  if ($grid[$fila][$col - 1] != "") {
                      if (!Hacienda::Repetido($grid, $grid[$fila][$col - 1], $fila, $col - 1)) {
                        $c = new Criteria();
                        $c->add(NpdefcptPeer::CODCON, $grid[$fila][$col - 1]);
                        $c->add(NpasiconnomPeer::CODNOM, $codnom);
                        $c->addJoin(NpdefcptPeer::CODCON, NpasiconnomPeer::CODCON);
                        $regs = NpdefcptPeer::doSelectOne($c);
                        if (!$regs) {
                            $javascript = "alert_('El C&oacute;digo del Concepto no Existe o no esta asociado a la N&oacute;mina');";
                            $grid[$fila][$col - 1] = "";
                            $grid[$fila][$col] = "";
                        }else {
                          $grid[$fila][$col] = $regs->getNomcon();
                        }                            
                      } else {
                          $javascript = "alert_('El C&oacute;digo del Concepto esta Repetido');";
                          $grid[$fila][$col - 1] = "";
                          $grid[$fila][$col] = "";
                      }
                  }                
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              default:
                break;
            }
            break;
        default:
            break;
    }

    $output = Herramientas::grid_to_json($grid, $name, $jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

    return sfView::HEADER_ONLY;
 }


}
