<?php
/**
 * Presupuesto: Clase estática para trabajar con el modulo de Contabilidad Presupuestaria
 *
 * @package    Roraima
 * @subpackage presupuesto
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Presupuesto.class.php 61944 2015-05-07 18:48:13Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Presupuesto
{
/*
 * Author: Actualiza el Compromiso para su Causado
 */
  public static function salvarPreaprcom($clasemodelo,$grid)
  {
    $x = $grid[0];
    $j = 0;
    $filnoaprpre=H::getConfApp2('filnoaprpre', 'presupuesto', 'preaprcom');
    $loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
    while ($j < count($x)) {
      if ($x[$j]->getCheck()=='1'){
        $x[$j]->setAprcom('S');
        if (is_null($x[$j]->getLoguse()) || $x[$j]->getLoguse()==''){          
          $x[$j]->setLoguse($loguse);
        }
        $x[$j]->setUsuapr($loguse);
        $x[$j]->setFecapr(date('Y-m-d'));
        $x[$j]->save();
      }
      if ($x[$j]->getCheck2()=='1'){
        $x[$j]->setAprcom('R');
        $x[$j]->setUsuapr($loguse);
        $x[$j]->setFecapr(date('Y-m-d'));
        $x[$j]->save();
      }
      if ($filnoaprpre!='S'){
          if ($x[$j]->getCheck3()=='1'){
          $x[$j]->setAprcom('N');
          $x[$j]->setUsuapr($loguse);
          $x[$j]->setFecapr(date('Y-m-d'));
          $x[$j]->save();
        }
      }
      
      $j++;
    }

  return -1;
  }

  public static function validarPrecretit($cpdeftit)
  {
    $titulo = $cpdeftit->getCodpre();

    $formato = H::formatoPresupuesto();

    $split_titulo = split('-',$titulo);
    $split_formato = split('-',$formato);

    foreach($split_titulo as $i => $ruptura)
    {
      if($split_formato[$i])
        if(strlen($ruptura)!= strlen($split_formato[$i])) return 1150;
      else return 1150;
    }
    return -1;

  }

  public static function salvarPrecretit($cpdeftit)
  {

    $titulo = $cpdeftit->getCodpre();

    $split_titulo = split('-',$titulo);
    $tit = '';

    foreach($split_titulo as $i => $ruptura)
    {
      $tit .= $ruptura;
      $c = new Criteria();
      $c->add(CpdeftitPeer::CODPRE,$tit);
      $deftit = CpdeftitPeer::doSelectOne($c);
      if(!$deftit){
        $titulo = new Cpdeftit();
        $titulo->setCodpre($tit);
        $titulo->setNombre($cpdeftit->getNombre());
        $titulo->setNombre('A');
        $titulo->save();
      }
    }

  }

  public static function SalvarPreAsiFueFin($clasemodelo,$grid)
  {
    try{
      $x = $grid[0];
      $j = 0;
      while ($j < count($x))  {
        if ($clasemodelo->getMonasi()>0) {
          $c = new Criteria();
          $c->add(CpdisfuefinPeer::FUEFIN,$x[$j]->getCodfin());
          $c->add(CpdisfuefinPeer::CODPRE,$clasemodelo->getCodpre());
          CpdisfuefinPeer::doDelete($c);

         if ($x[$j]->getMonasi2()>0){

          if (Herramientas::getVerCorrelativo('corfue','cpdefniv',$r))
          {
            $ref = str_pad($r, 8, '0', STR_PAD_LEFT);
            H::getSalvarCorrelativo('corfue','cpdefniv','Registo Solicitud Fuente de Financiamiento',$ref,$msg);

            $c = new Cpdisfuefin();
            $c->setCorrel($ref);
            $c->setCodpre($clasemodelo->getCodpre());
            $c->setFuefin($x[$j]->getCodfin());
            $ano=substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
            $c->setFecdis($ano.date('-m-d'));
            $c->setOrigen('INICIAL');
            $c->setMonasi($x[$j]->getMonasi2());
            $c->setStatus('A');
            $c->save();
          }else{
            return 1303;
          }
        }
      }else {
        if ($x[$j]->getCheck()=='1'){
          $c = new Criteria();
          $c->add(CpdisfuefinPeer::ORIGEN,'INICIAL');
          $c->add(CpdisfuefinPeer::CODPRE,$clasemodelo->getCodpre());
          CpdisfuefinPeer::doDelete($c);
          
          if (Herramientas::getVerCorrelativo('corfue','cpdefniv',$r))
          {
            $ref = str_pad($r, 8, '0', STR_PAD_LEFT);
            H::getSalvarCorrelativo('corfue','cpdefniv','Registo Solicitud Fuente de Financiamiento',$ref,$msg);

            $c = new Cpdisfuefin();
            $c->setCorrel($ref);
            $c->setCodpre($clasemodelo->getCodpre());
            $c->setFuefin($x[$j]->getCodfin());
            $ano=substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
            $c->setFecdis($ano.date('-m-d'));
            $c->setOrigen('INICIAL');
            $c->setMonasi(0);
            $c->setStatus('A');
            $c->save();
            break;
          }else{
            return 1303;
          }
        }
      }


      $j++;
     }
    return -1;

  } catch (Exception $ex){
    exit($ex);
    return 0;
  }
  }


  public static function validarPreDisFueFinMov($clasemodelo,$grid,&$codipre)
  {
  $x = $grid[0];
  $codipre="";
  //Le asigna el monto total del documento
  if ($clasemodelo->getTipmov()=='P') {  $monto = Herramientas::getX('refprc','cpprecom','monprc',$clasemodelo->getRefmov());	}
  if ($clasemodelo->getTipmov()=='C') {  $monto = Herramientas::getX('refcom','cpcompro','moncom',$clasemodelo->getRefmov());	}
  if ($clasemodelo->getTipmov()=='CA'){  $monto = Herramientas::getX('refcau','cpcausad','moncau',$clasemodelo->getRefmov());	}
  if ($clasemodelo->getTipmov()=='PA'){  $monto = Herramientas::getX('refpag','cppagos','monpag',$clasemodelo->getRefmov());  }
  if ($clasemodelo->getTipmov()=='A'){   $monto = Herramientas::getX('refadi','cpadidis','totadi',$clasemodelo->getRefmov()); }
  if ($clasemodelo->getTipmov()=='T'){   $monto = Herramientas::getX('reftra','cpsoltrasla','tottra',$clasemodelo->getRefmov()); }

  $clasemodelo->setMontot($monto);
  /////
  if (H::toFloat($clasemodelo->getMonmov()) > H::toFloat($clasemodelo->getMontot()))
  {
    return '1304';   //El Monto Total del Financiamiento no puede ser Mayor al Movimiento del Documento
  }

  foreach ($x as $reg)
  {
      if ($reg->getMonto() > 0)
    {
          $codipre=$reg->getCodpre();
          if ($clasemodelo->getTipmov()=='A'){
              $adidis = Herramientas::getX('refadi','cpadidis','adidis',$clasemodelo->getRefmov());
              if ($adidis=='A' && $clasemodelo->getCodfin()!="")
              {
                  $esta=false;
                  $w= new Criteria();
                  $w->add(CpdisfuefinPeer::CODPRE,$reg->getCodpre());
                  $registro= CpdisfuefinPeer::doSelect($w);
                  if ($registro)
                  {
                      foreach ($registro as $objreg)
                      {
                          if ($clasemodelo->getCodfin()==$objreg)
                              $esta=true;
                      }
                      
                      if ($esta)
                           return '1166';  // Existe un Código Presupuestario que ya tiene asignada esa Fuente de Financiamiento.  
                  }
              }
          }          

      if (H::QuitarMontov2($reg->getMonto()) > H::QuitarMontov2($reg->getMondis()) && $reg->getNuevo()=='N' )
      {
           return '1300';  //El Monto del Financiamiento no puede ser Mayor al Disponible
      }
      $total = self::TotalizarColumnaGrid('GridFuentes','',$reg->getCodpre(),$grid);
      if ( $total > $monto)
      {
        return '1301';   //El Monto del Financiamiento no puede ser Mayor que el Comprometido de la Partida
      }
      if ( $total > $monto)
      {
        return '1304';   //El Monto Total del Financiamiento no puede ser Menor al Movimiento del Documento
      }

    }
  }
  return -1;
  }


  public static function TotalizarColumnaGrid($NombreGrid, $LaColumna, $ValorClave,$grid)
  {
    $x = $grid[0];
      $total = 0;
    if ($NombreGrid == "GridFuentes"){
      foreach ($x as $datos){
        if ($datos->getCodpre() == $ValorClave){
          $total += $datos->getMonto();
        }
      }
    }
    return $total;
  }


  public static function SalvarPredisfuefinmov($clasemodelo,$grid)
  {
    try{
      $x = $grid[0];

    if ($clasemodelo->getTipmov()=='P') {  $tipmov="PRECOMPROMISO"; }
    if ($clasemodelo->getTipmov()=='C') {  $tipmov="COMPROMISO";    }
    if ($clasemodelo->getTipmov()=='CA'){  $tipmov="CAUSADO";       }
    if ($clasemodelo->getTipmov()=='PA'){  $tipmov="PAGADO";        }
    if ($clasemodelo->getTipmov()=='A') {  $tipmov="CREDITO";       }
    if ($clasemodelo->getTipmov()=='ST') {  $tipmov="TRASLADO";      }
    if ($clasemodelo->getTipmov()=='T') {  $tipmov="TRASLADO";      }
    //if ($clasemodelo->getTipmov()=='AJ'){  $tipmov="AJUSTES";        }

    if ($clasemodelo->getTipmov()=='A'){  //CREDITO -> ADICION / DISMINUCION
      $j = 0;
      while ($j < count($x)){
          if (Herramientas::getVerCorrelativo('correl','cpdisfuefin',$r))
          {
              $ref  = str_pad($r, 8, '0', STR_PAD_LEFT);
              $ref2 = Herramientas::getBuscar_correlativo($ref,'cpdisfuefin','correl','cpdisfuefin','correl');

          $c = new Criteria();
          $c->add(CpsoladidisPeer::	REFADI,$clasemodelo->getRefmov());
          $per = CpsoladidisPeer::doSelectone($c);

          //Siempre deberia traer valor
          if ($per) $adidis = $per->getAdidis();
          else return 0;

          if ($adidis=='A'){  //S UNA ADICION DEBE GRABAR EN CPDISFUEFIN

            if ($x[$j]->getMonto() > 0){
              $c = new Cpdisfuefin();
              $c->setCorrel($ref2);
              $c->setOrigen($tipmov);
              if ($clasemodelo->getNuevo()!='N') {
                $c->setFuefin($clasemodelo->getCodfin());
              }else {
                if ($clasemodelo->getCodfin()!=$x[$j]->getFuefin())
                  $c->setFuefin($clasemodelo->getCodfin());
                else
                    $c->setFuefin($x[$j]->getFuefin());
              }
              $c->setCodpre($x[$j]->getCodpre());
              $ano = substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
              $c->setFecdis($ano.date('-m-d'));
              $c->setMonasi($x[$j]->getMonto());
              $c->setRefdis($clasemodelo->getRefmov());
              $c->setStatus('A');
              $c->save();
            }
          }else if ($adidis=='D'){  //ES UNA DISMINUCION DEBE GRABARSE EN CPMOVFUEFIN
            $tipmov = 'DEBITO';
            $c = new Criteria();
            $c->add(CpmovfuefinPeer::	REFMOV,$clasemodelo->getRefmov());
            $c->add(CpmovfuefinPeer::CODPRE,$x[$j]->getCodpre());
            $c->add(CpmovfuefinPeer::CORREL,$x[$j]->getCorrel());
            CpmovfuefinPeer::doDelete($c);

            if ($x[$j]->getMonto() > 0){
              $monto=H::toFloat($x[$j]->getMonto());
              if ($x[$j]->getCorreldis()!=''){
               $cad=split(',',$x[$j]->getCorreldis());
               $r=1;
               while ($r<(count($cad)))
               {  
                  $p= new Criteria();
                  $p->add(CpdisfuefinPeer::CODPRE,$x[$j]->getCodpre());
                  $p->add(CpdisfuefinPeer::FUEFIN,$x[$j]->getFuefin());
                  $p->add(CpdisfuefinPeer::CORREL,$cad[$r]);
                  $regp= CpdisfuefinPeer::doSelectOne($p);
                  if ($regp){
                    $mondis=H::toFloat($regp->getMondisf());
                    if ($mondis>0){
                      $dif=$monto-$mondis;
                      if ($dif<=0){
                        $c = new Cpmovfuefin();
                        $c->setCorrel($cad[$r]);//$x[$j]->getCorrel());
                        $c->setRefmov($clasemodelo->getRefmov());
                        $c->setTipmov($tipmov);
                        $c->setMonmov($x[$j]->getMonto());
                        $ano = substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
                        $c->setFecmov($ano.date('-m-d'));
                        $c->setCodpre($x[$j]->getCodpre());
                        $c->setStamov('A');
                        $c->save();
                        break;
                      }else {
                        $monto=$dif;
                        $c = new Cpmovfuefin();
                        $c->setCorrel($cad[$r]);//$x[$j]->getCorrel());
                        $c->setRefmov($clasemodelo->getRefmov());
                        $c->setTipmov($tipmov);
                        $c->setMonmov($mondis);
                        $ano = substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
                        $c->setFecmov($ano.date('-m-d'));
                        $c->setCodpre($x[$j]->getCodpre());
                        $c->setStamov('A');
                        $c->save();
                      }
                    }
                  }
                $r++;
              }
            }
            }
          }
        }else{
          return 1303;
        }

        $j++;
      }


    }elseif ($clasemodelo->getTipmov()=='T'){  //TRASLADO

      $j = 0;
      $coddes="";
      while ($j < count($x)){
          if (Herramientas::getVerCorrelativo('correl','cpdisfuefin',$r))
          {
          if ($x[$j]->getMonto() > 0){

            //Para buscar el codigo presupuestario DESTINO
              $c = new Criteria();
              $c->add(CpsolmovtraPeer::REFTRA,$clasemodelo->getRefmov());
              $c->add(CpsolmovtraPeer::CODORI,$x[$j]->getCodpre());
              $c->add(CpsolmovtraPeer::CODDES,$x[$j]->getCodpre3());
              $c->add(CpsolmovtraPeer::STAMOV,'A');  //Para tener un grado acertacion
              $per = CpsolmovtraPeer::doSelectOne($c);
              if ($per) $coddes = $per->getCoddes();
              
              //Generar cpmovfuefin  - Codigo Origen
              if ($x[$j]->getCorrel()!="") {
                $monto=H::toFloat($x[$j]->getMonto());
                if ($x[$j]->getCorreldis()!=''){
                 $cad=split(',',$x[$j]->getCorreldis());
                 $r=1;
                 while ($r<(count($cad)))
                 {  
                    $p= new Criteria();
                    $p->add(CpdisfuefinPeer::CODPRE,$x[$j]->getCodpre());
                    $p->add(CpdisfuefinPeer::FUEFIN,$x[$j]->getFuefin());
                    $p->add(CpdisfuefinPeer::CORREL,$cad[$r]);
                    $regp= CpdisfuefinPeer::doSelectOne($p);
                    if ($regp){
                      $mondis=H::toFloat($regp->getMondisf());
                      if ($mondis>0){
                        $dif=$monto-$mondis;
                        if ($dif<=0){
                          $c = new Cpmovfuefin();
                          $c->setCorrel($cad[$r]); //$x[$j]->getCorrel());
                          $c->setRefmov($clasemodelo->getRefmov());
                          $c->setTipmov($tipmov);
                          $c->setCodpre($x[$j]->getCodpre());
                          $c->setMonmov($x[$j]->getMonto());
                          $ano = substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
                          $c->setFecmov($ano.date('-m-d'));              
                          $c->setStamov('A');
                          $c->save();
                          break;
                        }else {
                          $monto=$dif;
                          $c = new Cpmovfuefin();
                          $c->setCorrel($cad[$r]); //$x[$j]->getCorrel());
                          $c->setRefmov($clasemodelo->getRefmov());
                          $c->setTipmov($tipmov);
                          $c->setCodpre($x[$j]->getCodpre());
                          $c->setMonmov($mondis);
                          $ano = substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
                          $c->setFecmov($ano.date('-m-d'));              
                          $c->setStamov('A');
                          $c->save();
                        }
                      }
                    }
                    $r++;
                  }
                }
              
              
              //Generar cpdisfuefin - Codigo Destino
              $ref  = str_pad($r, 8, '0', STR_PAD_LEFT);
              $ref2 = Herramientas::getBuscar_correlativo($ref,'cpdisfuefin','correl','cpdisfuefin','correl');
              $c = new Cpdisfuefin();
              $c->setCorrel($ref2);
              $c->setOrigen($tipmov);
              if ($x[$j]->getNuevo()!='N') {
                $c->setFuefin($clasemodelo->getCodfin());
              }else {
                if ($clasemodelo->getCodfin()!=$x[$j]->getFuefin() && $clasemodelo->getCodfin()!='')
                  $c->setFuefin($clasemodelo->getCodfin());
                else
                    $c->setFuefin($x[$j]->getFuefin());
              }
              //$c->setFuefin($x[$j]->getFuefin());
              $c->setCodpre($coddes);
              $ano = substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
              $c->setFecdis($ano.date('-m-d'));
              $c->setMonasi($x[$j]->getMonto());                
              $c->setRefdis($clasemodelo->getRefmov());
              $c->setStatus('A');
              $c->save();       
              }
          }
        }else{
          return 1303;
        }
        $j++;

      }

    }else{
      $j = 0;
      while ($j < count($x)){
        if ($x[$j]->getMonto() > 0){
          $monto=H::toFloat($x[$j]->getMonto());
          if ($x[$j]->getCorreldis()!=''){
           $cad=split(',',$x[$j]->getCorreldis());
           $r=1;           
           while ($r<(count($cad)))
           {  
              $p= new Criteria();
              $p->add(CpdisfuefinPeer::CODPRE,$x[$j]->getCodpre());
              $p->add(CpdisfuefinPeer::FUEFIN,$x[$j]->getFuefin());
              $p->add(CpdisfuefinPeer::CORREL,$cad[$r]);
              $regp= CpdisfuefinPeer::doSelectOne($p);
              if ($regp){
                $mondis=H::toFloat($regp->getMondisf());            
                if ($mondis>0){
                  $dif=$monto-$mondis;
                  if ($dif<=0){
                    $c = new Cpmovfuefin();
                    $c->setCorrel($cad[$r]); //$x[$j]->getCorrel());
                    $c->setRefmov($clasemodelo->getRefmov());
                    $c->setTipmov($tipmov);
                    $c->setMonmov($x[$j]->getMonto());
                    $ano = substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
                    $c->setFecmov($ano.date('-m-d'));
                    $c->setCodpre($x[$j]->getCodpre());
                    $c->setStamov('A');
                    $c->save();
                    break;
                  }else {
                    $monto=$dif;
                    $c = new Cpmovfuefin();
                    $c->setCorrel($cad[$r]); //$x[$j]->getCorrel());
                    $c->setRefmov($clasemodelo->getRefmov());
                    $c->setTipmov($tipmov);
                    $c->setMonmov($mondis);
                    $ano = substr(Herramientas::getX('codemp','cpdefniv','fecper','001'),0,4);
                    $c->setFecmov($ano.date('-m-d'));
                    $c->setCodpre($x[$j]->getCodpre());
                    $c->setStamov('A');
                    $c->save();
                  }
                }
              }
            $r++;
          }
        }        
      }
    $j++;
    }
  }

      return -1;
    } catch (Exception $ex){
      return 0;
    }
  }


  public static function validarPreasifuefin($clasemodelo,$grid)
  {
    $monmov = H::QuitarMontov2($clasemodelo->getMonmov());  //Total
    $a= new Criteria();
    $a->add(CpasiiniPeer::PERPRE,'00');
    $a->add(CpasiiniPeer::CODPRE,$clasemodelo->getCodpre());
    $data2= CpasiiniPeer::doSelectOne($a);
    if ($data2)
    {
      $monasi=$data2->getMonasi();
    }

    if ($monmov > $monasi)
    {
    return 1302;
    }
    if ($monmov < $monasi)
    {
      return '1305';   //El Monto Total del Financiamiento no puede ser Menor al Movimiento del Documento
    }
    return -1;
  }

  public static function VerificarAprobacion()
  {
    $status= true;
    return $status;
  }

/***************************************************************************************************************************************************/

	public static function validarPrenivpre($cpdefniv,$grid) {
		$codE1=self::validarNivel($cpdefniv);
		if ($codE1==-1) {
			$codE2=self::chequeaNiveles($cpdefniv,$grid);
			if ($codE2==-1) {
				$codE3=self::validarFechas($cpdefniv);
				if ($codE3==-1) {
					return -1;
				}else return $codE3;
			}else return $codE2;
		}else return $codE1;
	}

	public static function validarNivel($cpdefniv) {
		$suma=$cpdefniv->getRupcat()+$cpdefniv->getRuppar();
  		if ($cpdefniv->getNivdis()>$suma) {
			return 1308;
  		} else {
  			return -1;
  		}
  	}

  	public static function chequeaNiveles($cpdefniv,$grid) {
  		$contC=0;
  		$contP=0;
  		$cpniveles = $grid[0];

  		foreach($cpniveles as $cpnivel) {
        if (strlen($cpnivel->getNomabr())!=$cpnivel->getLonniv()){
          return 4016;
        }
    		if($cpnivel->getCatpar()!="") {
    			if($cpnivel->getCatpar()=='C') {
    				$contC++;
    			}else {
    				$contP++;
    			}
    		}
  		}
  		if ($cpdefniv->getRupcat()!=$contC) {
			return 1323;
  		}
  		if ($cpdefniv->getRuppar()!=$contP) {
			return 1324;
  		}

  		return -1;
  	}

	public static function validarFechas($cpdefniv) {
		if (strtotime($cpdefniv->getFeccie()) < strtotime($cpdefniv->getFecini())) {
			return 1319;
		}
		if (strtotime($cpdefniv->getFecini()) > strtotime($cpdefniv->getFecper())) {
			return 1320;
		}
		if (strtotime($cpdefniv->getFeccie()) < strtotime($cpdefniv->getFecper())) {
			return 1321;
		}
		return -1;
	}

	public static function salvarPrenivpre($cpdefniv,$grid,$gridPer) {
		$cpdefniv->setLoncod(strlen($cpdefniv->getForpre()));
		$cpdefniv->setCodemp('001');
        $cpdefniv->setPeract('01');
		$cpdefniv->setEtadef('A');
		$cpdefniv->setStaprc('N');
		$cpdefniv->save();

		self::salvarNiveles($grid);
		self::salvarPeriodos($cpdefniv, $gridPer);

		return -1;
	}

	public static function salvarNiveles($grid) {
		$cpniveles=$grid[0];

		foreach($cpniveles as $key => $cpnivel) {
			$cpnivel->setConsec($key+1);
			$cpnivel->setStaniv('A');
			$cpnivel->save();
		}

		$datos=$grid[1];
		foreach($datos as $dato) {
			$dato->delete();
		}
	}

	 public static function salvarPeriodos($cpdefniv, $gridPer) {
   $p= new Criteria();
    $reg=CpperejePeer::doSelect($p);
    if ($reg)
    {
      foreach ($reg as $obj) {
        $obj->delete();
      }
    }


	 	$cpperejes = $gridPer[0];

		foreach ($cpperejes as $cppereje) {
			$tablacppereje= new Cppereje();
        	$tablacppereje->setFecini($cpdefniv->getFecini());
        	$tablacppereje->setFeccie($cpdefniv->getFeccie());
        	$tablacppereje->setPereje($cppereje["pereje"]);
        	$tablacppereje->setFecdes($cppereje["fecdes2"]);
        	$tablacppereje->setFechas($cppereje["fechas2"]);
          $tablacppereje->setCerrado('N');
          $tablacppereje->save();
        }
  	}

/***************************************************************************************************************************************************/

  public static function buscaCodigos($clasemodelo){
	$formato = Herramientas :: ObtenerFormato('cpdefniv', 'forpre');
    Herramientas :: FormarCodigoPadre($clasemodelo->getCodpre(), $nivelcodigo, $ultimo, $formato);
	if ( ! (H::buscarCodigoPadre('codpre', 'cpdeftit', $ultimo))){
	      if ($nivelcodigo == 0) {
	        return false;
	      } else
	        return true;
	} else
	      return true;
  }



  public static function modificaAsigInicial($clasemodelo){
  	$c = new Criteria();
	$c->add(CpasiiniPeer::CODPRE,$clasemodelo->getCodpre());
	$regs = CpasiiniPeer::doSelect($c);
	foreach($regs as $reg){
		$reg->setNompre($clasemodelo->getNompre());
	}
  }


  public static function salvarPretitpre($clasemodelo){

	if (self::buscaCodigos($clasemodelo)){
		$cuenta=$clasemodelo->getCodcta();
	 	$c = new Criteria();
	    $c->add(ContabbPeer::CODCTA,$cuenta);
	  	$reg = ContabbPeer::doSelect($c);
	  	if ($reg){
	  		Presupuesto::grabaCodigoPre($clasemodelo);
	  		Presupuesto::modificaAsigInicial($clasemodelo);
	  	}else{
	  		$cpdefniv = CpdefnivPeer::doSelectOne(new Criteria());
	  		if($cpdefniv){
			    $mascpre = $cpdefniv->getForpre();
			    if(!$mascpre){
			       	return 1306; // La Definición Presupuestaria no ha sido grabada
			    }else{
			    	if (strlen($mascpre)==strlen($cuenta)){
			    		return 1309;
			    	}else{
			    		Presupuesto::grabaCodigoPre($clasemodelo);
	  					Presupuesto::modificaAsigInicial($clasemodelo);
			    	}
			    }
	  		}else{
	  			return 1310;
	  		}
	  	}
		return -1;
   }else
   {
   		return 1307;
   }
  }

  public static function grabaCodigoPre($clasemodelo){
  	$clasemodelo->setStacod('A');
  	$clasemodelo->save();
  }

  public static function verificarEliminar($clasemodelo){

  		$cod=$clasemodelo->getCodpre();

  	       if(!(H::getx_vacio('Codpre','cpasiini','nompre',$cod))){
  	       	if(!(H::getx_vacio('Codpre','cpimpprc','refprc',$cod))){
  	       		if(!(H::getx_vacio('Codpre','cpimpcom','refcom',$cod))){
  	       			if(!(H::getx_vacio('Codpre','cpimpcau','refcau',$cod))){
  	       				if(!(H::getx_vacio('Codpre','cpimppag','refpag',$cod))){
  	       					if(!(H::getx_vacio('Codpre','cpmovaju','refaju',$cod))){
  	       						if(!(H::getx_vacio('Codpre','cpmovadi','refadi',$cod))){
  	       							if(!(H::getx_vacio('Codori','cpmovtra','reftra',$cod))){
  	       								return -1;
  	       							} else{ return 1311;}
  	       						}else{ return 1312;}
  	       					}else{ return 1313;}
  	       				}else{ return 1314;}
  	       			}else{ return 1315;}
  	       		}else{ return 1316;}
   	       	 }else{ return 1317;}
  	       }else{ return 1318;}
  }

  public static function eliminarPretitpre($clasemodelo){

  	if (H::buscarCodigoHijo('codpre', 'cpdeftit', $clasemodelo->getCodpre())){
	  return 1322;
  	}else{
            $msj=self::verificarEliminar($clasemodelo);
  		if ($msj==-1) {
			$clasemodelo->delete();
			return -1;
	  	}else return $msj;
  	}
  }

/***************************************************************************************************************************************************/

	public static function validarPreasiini($cpasiini,$grid) {
		$codN=self::noSobregira($cpasiini);
		if ($codN==-1){
			$codA=self::validarAnoPer($cpasiini);
			if ($codA==-1){
				$codE=self::validarEtadef($cpasiini);
				if ($codE==-1) {
					return -1;
				}else return $codE;
			}else return $codA;
		}else return $codN;
	}

	public static function validarAnoPer($cpasiini){
		$fecini = H::getX('CODEMP','Cpdefniv','fecini','001');
		$feccie = H::getX('CODEMP','Cpdefniv','feccie','001');
		$anoini = substr($fecini,0,4);
		$anocie = substr($feccie,0,4);

		if (($cpasiini->getAnopre() < $anoini) and ($cpasiini->getAnopre() > $anocie)){
			return 1349;
		}else return -1;
	}

	public static function noSobregira($cpasiini) {
    
    $sql="select sum(
      coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$cpasiini->getAnopre()."','TRA'),0) +
      coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$cpasiini->getAnopre()."','ADI'),0) -
      coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$cpasiini->getAnopre()."','TRN'),0) -
      coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$cpasiini->getAnopre()."','DIS'),0) -
      coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$cpasiini->getAnopre()."','PRC'),0)) as monmov
      from cpasiini where CodPre = '".$cpasiini->getCodpre()."' and anopre='".$cpasiini->getAnopre()."' and perpre='00'";
      if (Herramientas::BuscarDatos($sql,$result))
      {
        if ($result[0]['monmov']!=0)
        {
          return 1377;
        }
      }

      $c = new Criteria();
      $c->add(CpasiiniPeer::PERPRE,'00');
      $c->add(CpasiiniPeer::CODPRE,$cpasiini->getCodpre());
      $reg = CpasiiniPeer::doSelectOne($c);

      if ($reg){
        $moneje = $reg->getMonprc();
        $montoComparar=$cpasiini->getMonasi()+$reg->getMonadi()+$reg->getMontra()-$reg->getMontrn()-$reg->getMondim();
        if ($montoComparar <= $moneje){
          return 1350;
        }
      }

		return -1;
	}

	public static function validarEtadef($cpasiini) {
		$etadef=H::getX('CODEMP','cpdefniv','etadef','001');

		if ($etadef=='C')
		{
		  if ($cpasiini->getMonasi()>0)  return 1351;
		  else return -1;
	    }
		else return -1;
	}

	public static function salvarPreasiini($cpasiini,$grid) {
		$cpasiinis = $grid[0];

		$cpasiini->setPerpre('00');
		$cpasiini->setMonprc(0);
		$cpasiini->setMoncom(0);
		$cpasiini->setMoncau(0);
		$cpasiini->setMonpag(0);
		$cpasiini->setMontra(0);
		$cpasiini->setMontrn(0);
		$cpasiini->setMonadi(0);
		$cpasiini->setMondim(0);
		$cpasiini->setMonaju(0);
		$cpasiini->setMondis($cpasiini->getMonasi());
		$cpasiini->setDifere(0);
		$cpasiini->setStatus('A');
		$cpasiini->save();

      $c= new Criteria();
      $c->add(CpasiiniPeer::CODPRE,$cpasiini->getCodpre());
      $c->add(CpasiiniPeer::ANOPRE,$cpasiini->getAnopre());
      $c->add(CpasiiniPeer::PERPRE,'00',Criteria::NOT_EQUAL);
      CpasiiniPeer::doDelete($c);

		foreach ($cpasiinis as $cpasiini_) {
			$tablacpasiini= new Cpasiini();
			$tablacpasiini->setCodpre($cpasiini->getCodpre());
 		    $tablacpasiini->setNompre($cpasiini->getNompre());
			$tablacpasiini->setAnopre($cpasiini->getAnopre());
			$tablacpasiini->setPerpre($cpasiini_["perpre"]);
			$tablacpasiini->setMonasi($cpasiini_["monasi"]);
			$tablacpasiini->setMonprc(0);
			$tablacpasiini->setMoncom(0);
			$tablacpasiini->setMoncau(0);
			$tablacpasiini->setMonpag(0);
			$tablacpasiini->setMontra(0);
			$tablacpasiini->setMontrn(0);
			$tablacpasiini->setMonadi(0);
			$tablacpasiini->setMondim(0);
			$tablacpasiini->setMonaju(0);
			$tablacpasiini->setMondis($cpasiini_["monasi"]);
			$tablacpasiini->setDifere(0);
			$tablacpasiini->setStatus('A');
			$tablacpasiini->save();
		}
		return -1;
	}



	public static function salvarPreartley($cpartley) {
		$cpartley->save();
		return -1;
	}

	public static function eliminarPreartley($cpartley) {
		if($cpartley->countCpsoladidiss()==0 && $cpartley->countCpsoltraslas()==0){
			$cpartley->delete();
			return -1;
		} else return 1339;
	}

	public static function salvarPredoccom($cpdoccom) {
		$cpdoccom->save();
		return -1;
	}

	public static function eliminarPredoccom($cpdoccom) {
		if($cpdoccom->countCpcompros()==0){
			$cpdoccom->delete();
			return -1;
		} else return 1339;
	}

	public static function salvarPredocpag($cpdocpag) {
		$cpdocpag->save();
		return -1;
	}

	public static function eliminarPredocpag($cpdocpag) {
		if($cpdocpag->countCppagoss()==0){
			$cpdocpag->delete();
			return -1;
		} else return 1326;
	}

/***************************************************************************************************************************************************/
	public static function salvarPredocpre($cpdocprc) {
		$cpdocprc->save();
		return -1;
	}

	public static function eliminarPredocpre($cpdocprc) {
		if($cpdocprc->countCpprecoms()==0 ){
			$cpdocprc->delete();
			return -1;
		} else return 1339;
	}

	public static function salvarPredoccau($cpdoccau) {
		$cpdoccau->save();
		return -1;
	}

	public static function eliminarPredoccau($cpdoccau) {

		if($cpdoccau->countCpcausads()==0 ){
			$cpdoccau->delete();
			return -1;
		} else return 1339;


	}
	public static function salvarPredocaju($cpdocaju) {
		$cpdocaju->save();
		return -1;
	}

	public static function eliminarPredocaju($cpdocaju) {
		if($cpdocaju->countCpajustes()==0 ){
			$cpdocaju->delete();
			return -1;
		} else return 1327;

	}


	public static function salvarPreprecom($clasemodelo,$grid,$grid2){
			if (!$clasemodelo->getId()) {
      $correlativo=self::correlativo('corprc','cpdefniv',$clasemodelo->getRefprc(),'refprc','Cpprecom',$valorSetear);
			$clasemodelo->setRefprc($valorSetear);
      }
			self::grabaPrecompromiso($clasemodelo);
			self::grabaGrid($clasemodelo,$grid);
      self::grabaGridEventos($clasemodelo,$grid2);
			return -1;
	}

	public static function grabaPrecompromiso($clasemodelo){
    if (!$clasemodelo->getId()) {
  		$clasemodelo->setAnoprc(substr($clasemodelo->getFecprc(),0,4));
  		$clasemodelo->setDesanu("");
  		$clasemodelo->setStaprc('A');
    }
		$clasemodelo->save();
		return -1;
	}

	public static function grabaGrid($clasemodelo,$grid){
		try{
			$cpimpprc = $grid[0];
			foreach ($cpimpprc as $reg){
				$reg->setRefprc($clasemodelo->getRefprc());
        if (!$reg->getId()) {
			  	$reg->setStaimp('A');
       }
				$reg->save();
			}
			$cpimpprcb = $grid[1];
			foreach ($cpimpprcb as $reg){
				$reg->delete();
			}
			return -1;
		}catch (Exception $ex){
      		echo $ex;
      		return 0;
    	}
	}

	public static function eliminarPreprecom($clasemodelo){
   if (substr($clasemodelo->getRefprc(), 0,2)=='TR')
    return 1398;

   $q= new Criteria();
   $q->add(CpimpcomPeer::REFERE,$clasemodelo->getRefprc());
   $q->add(CpimpcomPeer::STAIMP,'N',Criteria::NOT_EQUAL);
   $resul= CpimpcomPeer::doSelectOne($q);
   if ($resul)
    return 1392;

   $t= new Criteria();
   $t->add(CpajustePeer::REFERE,$clasemodelo->getRefprc());
   $t->add(CpajustePeer::STAAJU,'N',Criteria::NOT_EQUAL);
   $t->add(CpdocajuPeer::REFIER,'P');
   $t->addJoin(CpajustePeer::TIPAJU,CpdocajuPeer::TIPAJU);
   $regt=CpajustePeer::doSelectOne($t);
   if ($regt)
    return 4011;

		$fec= $clasemodelo->getFecprc();
		if ($clasemodelo->getStaprc()=='N'){ return 1328;}
		$c = new Criteria();
		$c->add(CpimpprcPeer::REFPRC,$clasemodelo->getRefprc());
		$reg = CpimpprcPeer::doSelect($c);
		if($reg){
      foreach ($reg as $key) {
        if ($key->getMonaju()>0){ return 1329;}
      }			
		}
     


		if ($clasemodelo->getSalcom()>0){ return 1330; }
		if(self::validarFechaPresupuesto($fec)==-1){
			H::EliminarRegistro('Cpimpprc','REFPRC',$clasemodelo->getRefprc());
      $ct = new Criteria();
      $ct->add(CpdisevePeer::REFDOC, $clasemodelo->getRefprc());
      $ct->add(CpdisevePeer::TIPMOV, 'PRC');
      $cpdiseven=CpdisevePeer::doSelect($ct);
      if ($cpdiseven) {
        foreach ($cpdiseven as $objeve) {
          $objeve->delete();
        }
      }

       $w= new Criteria();
       $w->add(CpmovfuefinPeer::REFMOV,$clasemodelo->getRefprc());
       $w->add(CpmovfuefinPeer::TIPMOV,'PRECOMPROMISO');
       $cpmovfuefins = CpmovfuefinPeer::doSelect($w);
       if ($cpmovfuefins) {
        foreach ($cpmovfuefins as $cpmovfuefin) {
          $cpmovfuefin->delete();
        }
       }
      $clasemodelo->delete();

		}else return (self::validarFechaPresupuesto($fec));
		return -1;
	}

	public static function verificarAnular($ref,$salcom){

		$mens="";
		$c = new Criteria();
		$c->add(CpprecomPeer::REFPRC,$ref);
		$reg = CpprecomPeer::doSelectOne($c);
		if ($reg){
			if ($reg->getStaprc()=='N'){
				$mens="El Precompromiso ya esta Anulado";
			}
		}
		$c = new Criteria();
		$c->add(CpimpprcPeer::REFPRC,$ref);
		$dato = CpimpprcPeer::doSelectOne($c);
		if($dato){
			if ($dato->getMonaju()>0){
				$mens="El Precompromiso No Puede ser Eliminado Ni Anulado, Tiene un Ajuste";
			}
		}
		if ($salcom>0){
			$mens="El Precompromiso No Puede ser Eliminado Ni Anulado, Tiene Movimiento";
		}
		return $mens;
	}

	public static function generarMovimientos(){
 		$nommovs = array ("Asignado","Precomprometido","Comprometido","Causado","Pagado","Traslados (+)","Traslados (-)","Aumentos","Disminuciones");
 		$movimientos = array();

		foreach ($nommovs as $key=>$nommov){
			$movimientos[$key]["id"]="";
			$movimientos[$key]["nommov"]=$nommov;
			$movimientos[$key]["monmov"]=H::FormatoMonto('');
			$movimientos[$key]["pormov"]=H::FormatoMonto('');
		}
		return $movimientos;
	}


	public static function arregloPreejeglo($codpre,$perpre,&$movimientos,&$dismon,&$dispor,&$msj) {
		$msj="";
    $lonmas=strlen(H::getObtener_FormatoCategoria())+1;   
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu'); 
    if ($categoriasusu!='') {
      $c= new Criteria();
      $sql='cpdeftit.codpre=\''.$codpre.'\' and substr(cpdeftit.codpre,0,'.$lonmas.')  in (select codcat from "SIMA_USER".segcatusu where loguse=\''.$loguse.'\')';
      $c->add(CpdeftitPeer::CODPRE,$sql,Criteria::CUSTOM);
      $data=CpdeftitPeer::doSelectOne($c);
      if (!$data){
        $msj='La Categoria Presupuestaria no esta asociada a este Usuario';
        return $msj;
      }
    }

		$sql="SELECT anopre FROM cpasiini WHERE codpre||anopre||perpre=(SELECT MAX (codpre||anopre||perpre) FROM cpasiini where perpre='".$perpre."')";
		if (H::BuscarDatos($sql,$datos)) {
		   $ano=$datos[0]['anopre'];
		}
		$cpdefniv = CpdefnivPeer::doSelectOne(new Criteria());
		if ($cpdefniv) {
			if ($perpre=='00') {
				$ano = substr($cpdefniv->getFecini(),0,4);
				$fecini = substr($cpdefniv->getFecini(),5,2);
				$feccie = substr($cpdefniv->getFeccie(),5,2);
			} else {
				$fecini = $perpre;
				$feccie = $perpre;
			}

			$nommovs = array ('PRC','COM','CAU','PAG','TRA','TRN','ADI','DIS');
			$i=1;
			foreach ($nommovs as $nommov) {
				$sql="SELECT coalesce(obtener_ejecucion('".$codpre."%','".$fecini."','".$feccie."','".$ano."','".$nommov."'),0) as monto FROM empresa";
				if (H::BuscarDatos($sql,$registros)) {
					$movimientos[$i]["monmov"]=number_format($registros[0]["monto"],2,'.',',');
					$i++;
				}
			}

			$c = new Criteria();
			$c->add(CpdeftitPeer::CODPRE,$codpre);
			$cpdeftit = CpdeftitPeer::doSelectOne($c);
            if ($cpdeftit) {
		 		$nombre = strtoupper($cpdeftit->getNompre());
            }

        	$sql = "select coalesce(sum(monasi),0) as monasi from cpasiini where codpre like '$codpre%' and anopre='$ano' and perpre='$perpre'";
        	if (H::BuscarDatos($sql,$monasir)) {
				$movimientos[0]["monmov"]=number_format($monasir[0]["monasi"],2,'.',',');
				$dismon = number_format(H::Monto_disponible_ejecucionP($ano,$codpre.'%',$perpre),2,'.',',');

				if (H::tofloat($movimientos[0]["monmov"])!=0) {
					$movimientos[0]["pormov"]=number_format(100,2,'.',',');
				} else {
					$movimientos[0]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[1]["monmov"])!=0 && H::tofloat($movimientos[0]["monmov"])!=0) {
					$movimientos[1]["pormov"]=number_format(H::tofloat($movimientos[1]["monmov"])*100/H::tofloat($movimientos[0]["monmov"]),2,'.',',');
				} else {
					$movimientos[1]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[2]["monmov"])!=0 && H::tofloat($movimientos[1]["monmov"])!=0) {
					$movimientos[2]["pormov"]=number_format(H::tofloat($movimientos[2]["monmov"])*100/H::tofloat($movimientos[1]["monmov"]),2,'.',',');
				} else {
					$movimientos[2]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[3]["monmov"])!=0 && H::tofloat($movimientos[2]["monmov"])!=0) {
					$movimientos[3]["pormov"]=number_format(H::tofloat($movimientos[3]["monmov"])*100/H::tofloat($movimientos[2]["monmov"]),2,'.',',');
				} else {
					$movimientos[3]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[4]["monmov"])!=0 && H::tofloat($movimientos[3]["monmov"])!=0) {
					$movimientos[4]["pormov"]=number_format(H::tofloat($movimientos[4]["monmov"])*100/H::tofloat($movimientos[3]["monmov"]),2,'.',',');
				} else {
					$movimientos[4]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[5]["monmov"])!=0 && H::tofloat($movimientos[0]["monmov"])!=0) {
					$movimientos[5]["pormov"]=number_format(H::tofloat($movimientos[5]["monmov"])*100/H::tofloat($movimientos[0]["monmov"]),2,'.',',');
				} else {
					$movimientos[5]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[6]["monmov"])!=0 && H::tofloat($movimientos[0]["monmov"])!=0) {
					$movimientos[6]["pormov"]=number_format(H::tofloat($movimientos[6]["monmov"])*100/H::tofloat($movimientos[0]["monmov"]),2,'.',',');
				} else {
					$movimientos[6]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[7]["monmov"])!=0 && H::tofloat($movimientos[0]["monmov"])!=0) {
					$movimientos[7]["pormov"]=number_format(H::tofloat($movimientos[7]["monmov"])*100/H::tofloat($movimientos[0]["monmov"]),2,'.',',');
				} else {
					$movimientos[7]["pormov"]=number_format(0,2,'.',',');
				}

				if (H::tofloat($movimientos[8]["monmov"])!=0 && H::tofloat($movimientos[0]["monmov"])!=0) {
					$movimientos[8]["pormov"]=number_format(H::tofloat($movimientos[8]["monmov"])*100/H::tofloat($movimientos[0]["monmov"]),2,'.',',');
				} else {
					$movimientos[8]["pormov"]=number_format(0,2,'.',',');
				}
				if ($dismon!=0 && H::tofloat($movimientos[0]["monmov"])!=0) {
					$dispor=number_format((H::tofloat($dismon)*100/H::tofloat($movimientos[0]["monmov"])),2,'.',',');
				} else {
					$dispor=number_format(0,2,'.',',');
				}
			} else {}
		} else {
			return $msj='No se ha Definido Saldo Inicial para este Periodo.';
		}
	}

	public static function salvarAnular($ref,$fec,$desanu){
      if (self::validarFechaPresupuesto($fec)==-1) {
                    //Precompromiso
			$c= new Criteria();
		    $c->add(CpprecomPeer::REFPRC,$ref);
		    $resul= CpprecomPeer::doSelectOne($c);
		    if ($resul){
			   $resul->setFecanu($fec);
		       $resul->setDesanu($desanu);
		       $resul->setStaprc('N');
		       $resul->save();
		    }
		    $c= new Criteria();
		    $c->add(CpimpprcPeer::REFPRC,$ref);
		    $res= CpimpprcPeer::doSelect($c);
		    if ($res){
		    	foreach ($res as $rs){
		          $rs->setStaimp('N');
		          $rs->save();
		        }
		    }
		    $c= new Criteria();
		    $c->add(CpmovfuefinPeer::REFMOV,$ref);
		    $c->add(CpmovfuefinPeer::TIPMOV,'PRECOMPROMISO');
		    $res= CpmovfuefinPeer::doSelect($c);
		    if ($res){
		    	foreach ($res as $rs){
		          $rs->setStamov('N');
		          $rs->save();
		        }
		    }
        return -1;
      }else return self::validarFechaPresupuesto($fec);
	}


	public static function validarFechaPresupuesto($fecanu) {
		$sql="SELECT cerrado FROM cppereje WHERE '".$fecanu."' BETWEEN fecdes AND fechas";

		if (!H::BuscarDatos($sql,$cerrado)){
			return 1333;
		}else {
			if ($cerrado[0]["cerrado"]=='C') {
				return 1334;
			}else {
				return -1;
			}
		}
	}

	public static function verificarAnuPrecompro($refcom,$salcau){
		$c = new Criteria();
		$c->add(CpcomproPeer::REFCOM,$refcom);
		$reg = CpcomproPeer::doSelectOne($c);

		$msj='';

		if ($reg){
			if ($reg->getStacom()=='N') {
				$msj = 'El Compromiso ya esta Anulado.';
			}
		}
		if ($salcau>0) {
			$msj = 'El Compromiso No Puede ser Anulado, Tiene Movimiento.';
		}
		$c = new Criteria();
		$c->add(CpimpcomPeer::REFCOM,$refcom);
		$cpimpcoms = CpimpcomPeer::doSelect($c);
		if($cpimpcoms){
			foreach ($cpimpcoms as $cpimpcom){
				if ($cpimpcom->getMonaju()>0) {
					$msj = 'El Compromiso No Puede ser Anulado, Tiene un Ajuste.';
				}
			}
		}
		return $msj;
	}

	public static function salvarAnuPrecompro($refcom,$fecanu,$desanu) {
		if (self::validarFechaPresupuesto($fecanu)==-1) {
			$c = new Criteria();
			$c->add(CpcomproPeer::REFCOM,$refcom);
			$cpcompro = CpcomproPeer::doSelectOne($c);
			if ($cpcompro){
				$cpcompro->setFecanu($fecanu);
				$cpcompro->setDesanu($desanu);
				$cpcompro->setStacom('N');
				$cpcompro->save();
			}
			$c = new Criteria();
			$c->add(CpimpcomPeer::REFCOM,$refcom);
			$cpimpcoms = CpimpcomPeer::doSelect($c);
			if ($cpimpcoms) {
				foreach ($cpimpcoms as $cpimpcom) {
					$cpimpcom->setStaimp('N');
					$cpimpcom->save();
				}
			}
			$c = new Criteria();
			$c->add(CpmovfuefinPeer::REFMOV,$refcom);
			$c->add(CpmovfuefinPeer::TIPMOV,'COMPROMISO');
			$cpmovfuefins = CpmovfuefinPeer::doSelect($c);
			if ($cpmovfuefins) {
				foreach ($cpmovfuefins as $cpmovfuefin) {
					$cpmovfuefin->setStamov('N');
					$cpmovfuefin->save();
				}
			}
			return -1;
		}else return self::validarFechaPresupuesto($fecanu);
	}

	public static function verificarEliPrecompro($cpcompro){
   $q= new Criteria();
   $q->add(CpimpcauPeer::REFERE,$cpcompro->getRefcom());
   $q->add(CpimpcauPeer::STAIMP,'N',Criteria::NOT_EQUAL);
   $resul= CpimpcauPeer::doSelectOne($q);
   if ($resul)
    return 1393;

   $t= new Criteria();
   $t->add(CpajustePeer::REFERE,$cpcompro->getRefcom());
   $t->add(CpajustePeer::STAAJU,'N',Criteria::NOT_EQUAL);
   $t->add(CpdocajuPeer::REFIER,'C');
   $t->addJoin(CpajustePeer::TIPAJU,CpdocajuPeer::TIPAJU);
   $regt=CpajustePeer::doSelectOne($t);
   if ($regt)
     return 4012;

		$c = new Criteria();
		$c->add(CpcomproPeer::REFCOM,$cpcompro->getRefcom());
		$reg = CpcomproPeer::doSelectOne($c);

		if ($reg){
			if ($reg->getStacom()=='N') {
				return 1331;
			}
		}
		if ($cpcompro->getSalcau()>0) {
			return 1332;
		}
		$c = new Criteria();
		$c->add(CpimpcomPeer::REFCOM,$cpcompro->getRefcom());
		$cpimpcoms = CpimpcomPeer::doSelect($c);
		if($cpimpcoms){
			foreach ($cpimpcoms as $cpimpcom){
				if ($cpimpcom->getMonaju()>0) {
					return 1335;
				}
			}
		}
		return -1;
	}

	public static function verificarEliminarPrecompro($cpcompro){
		$c = new Criteria();
		$c->add(CaordcomPeer::ORDCOM,$cpcompro->getRefcom());
		$caordcom = CaordcomPeer::doSelectOne($c);
		if ($caordcom){
			return 1336;
		}
		/*$c = new Criteria();
		$c->add(CaordserPeer::ORDSER,$cpcompro->getRefcom());
		$caordser = CaordserPeer::doSelectOne($c);
		if ($caordser){
			return 1336;
		}*/
		return -1;
	}

	public static function eliminarPrecompro($cpcompro){
		$codE1=self::verificarEliPrecompro($cpcompro);
		if ($codE1==-1){
			$codE2=self::verificarEliminarPrecompro($cpcompro);
			if ($codE2==-1){
				$codE3=self::validarFechaPresupuesto($cpcompro->getFeccom());
				if ($codE3==-1){
					$c = new Criteria();
					$c->add(CpimpcomPeer::REFCOM,$cpcompro->getRefcom());
					$cpimpcoms = CpimpcomPeer::doSelect($c);
					if ($cpimpcoms) {
						foreach ($cpimpcoms as $cpimpcom) {
							$cpimpcom->delete();
						}
					}
					$c = new Criteria();
					$c->add(CpmovfuefinPeer::REFMOV,$cpcompro->getRefcom());
					$c->add(CpmovfuefinPeer::TIPMOV,'COMPROMISO');
					$cpmovfuefins = CpmovfuefinPeer::doSelect($c);
					if ($cpmovfuefins) {
						foreach ($cpmovfuefins as $cpmovfuefin) {
							$cpmovfuefin->delete();
						}
					}
          $t = new Criteria();
          $t->add(CpdisevePeer::REFDOC,$cpcompro->getRefcom());
          $t->add(CpdisevePeer::TIPMOV ,'COM');
          $cpdiseven = CpdisevePeer::doSelect($t);
          if ($cpdiseven) {
            foreach ($cpdiseven as $objeve) {
              $objeve->delete();
            }
          }
					$cpcompro->delete();
					return -1;
				} else return $codE3;
			} else return $codE2;
		} else return $codE1;
	}

	public static function salvarPrecompro($cpcompro,$grid,$grid2){
		if (!$cpcompro->getId())
    {
      self::salvarCompromiso($cpcompro);
  		self::salvarCpimpcom($cpcompro,$grid);
      self::salvarCpdiseve($cpcompro,$grid2); //Eventos
    }else {
      $q= new Criteria();
      $q->add(CpcomproPeer::REFCOM,$cpcompro->getRefcom());
      $reg= CpcomproPeer::doSelectOne($q);
      if ($reg)
      {
        if ($reg->getCausado()=='N'){
          $reg->setDescom($cpcompro->getDescom());
          $reg->save();
        }
      }  
      self::salvarCpdiseve($cpcompro,$grid2); //Eventos
    }
		return -1;
	}

	public static function validarPreCom($clasemodelo,$grid,$fecmov) {           
    
        $datosGridsingrupo=$grid[0];

    foreach($datosGridsingrupo as $codpre){
      $actual = $codpre->getCodpre();
      $encontrado = false;

        $c = new Criteria();
        $c->add(CpasiiniPeer::CODPRE,$actual);
        $cpasiini = CpasiiniPeer::doSelectOne($c);
        if(!$cpasiini) {
                return 1340;
                }
      
      foreach ($datosGridsingrupo as $fila){
        if ($fila->getCodpre()==$actual){
          if ($encontrado) return 1337;
          $encontrado=true;
        }
      }
    }

    $datosGrid = array();
    foreach($datosGridsingrupo as $cpimpcom){
      if ($cpimpcom->getMonimp()>0) {
        $codpre=H::getCodPreDis($cpimpcom->getCodpre());
        $pos=self::posicion_en_el_grid2($datosGrid, $codpre);
        if ($pos==0)
        {
         $i=count($datosGrid)+1;
         $datosGrid[$i-1]["codpre"]=$codpre;
         $datosGrid[$i-1]["monimp"]=$cpimpcom->getMonimp();
        }
        else
        {
         $datosGrid[$pos-1]["monimp"]=$datosGrid[$pos-1]["monimp"]+$cpimpcom->getMonimp();
        }    
      }
    }
    
    $p=0;
    while ($p<count($datosGrid))
    {
      $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$fecmov);
      if($datosGrid[$p]["monimp"] > $disponible){
        return 1338;
      }
      $p++;
    }
    return -1;
}

	public static function correlativo($campoC,$tablaC,$getReferencia,$campo,$tabla,&$valorSetear) {
		$tienecorrelativo=false;

		if (H::getVerCorrelativo($campoC,$tablaC,$r)) {
			if ($getReferencia=='########') {
				$tienecorrelativo=true;
				$encontrado=false;
				while (!$encontrado) {
					$numero=str_pad($r, 8, '0', STR_PAD_LEFT);
					eval ('$field = '.ucfirst(strtolower($tabla)).'Peer::'.strtoupper($campo).';');
					$c = new Criteria();
     				$c->add($field,$numero);
     				eval ('$registro = '.ucfirst(strtolower($tabla)).'Peer::doSelectOne($c);');
     				if ($registro){
						$r++;
     				}else { $encontrado=true; }
				}
				$valorSetear=str_pad($r, 8, '0', STR_PAD_LEFT);
			}
			else {
				$valorSetear=str_replace('#','0',$getReferencia);
      		}
		}
		if ($tienecorrelativo) {
			H::getSalvarCorrelativo($campoC,$tablaC,'Referencia',$r,$msg);
		}
	}

	public static function salvarCompromiso($cpcompro){
		self::correlativo('corcom','cpdefniv',$cpcompro->getRefcom(),'refcom','Cpcompro',$valorSetear);
		$cpcompro->setRefcom($valorSetear);
		$cpcompro->setTipprc('');
		$cpcompro->setAnocom(substr($cpcompro->getFeccom(),0,4));
		$cpcompro->setDesanu('');
		$cpcompro->setStacom('A');

		$c = new Criteria();
		$c->add(CpdoccomPeer::TIPCOM,$cpcompro->getTipcom());
		$cpdoccom = CpdoccomPeer::doSelectOne($c);
		if ($cpdoccom->getReqaut()=='S'){
			$reqaut='N';
		}else $reqaut='S';

		$cpcompro->setAprcom($reqaut);
    $loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
    $cpcompro->setLoguse($loguse);
		$cpcompro->save();
		return -1;
	}

	public static function salvarCpimpcom($cpcompro,$grid){
		try{
			$cpimpcoms = $grid[0];
			foreach ($cpimpcoms as $cpimpcom){
				$cpimpcom->setRefcom($cpcompro->getRefcom());
				$cpimpcom->setStaimp('A');
                                if ($cpimpcom->getRefere()=='')
                                    $cpimpcom->setRefere('NULO');
				$cpimpcom->save();
			}
			$cpimpcoms1 = $grid[1];
			foreach ($cpimpcoms1 as $cpimpcom1){
				$cpimpcom1->delete();
			}
			return -1;
		} catch (Exception $ex){
      		echo $ex;
      		return 0;
    	}
	}

	public static function autorizarCompromiso($cpcompro){
		if ($cpcompro->getRefcom()!=''){
			if ($cpcompro->getStacom()=='N'){
					return 1341;
			}
			else{
				$cpcompro->setAprcom('S');
        if (is_null($cpcompro->getLoguse()) || $cpcompro->getLoguse()==''){
          $loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
          $cpcompro->setLoguse($loguse);
        }
				$cpcompro->save();
				return -1;
			}
		}
	}

	public static function eliminarPrecausar($clasemodelo){
    $q= new Criteria();
    $q->add(CpimppagPeer::REFERE,$clasemodelo->getRefcau());
    $q->add(CpimppagPeer::STAIMP,'N',Criteria::NOT_EQUAL);
    $resul= CpimppagPeer::doSelectOne($q);
    if ($resul)
     return 1394;

     $t= new Criteria();
     $t->add(CpajustePeer::REFERE,$clasemodelo->getRefcau());
     $t->add(CpajustePeer::STAAJU,'N',Criteria::NOT_EQUAL);
     $t->add(CpdocajuPeer::REFIER,'A');
     $t->addJoin(CpajustePeer::TIPAJU,CpdocajuPeer::TIPAJU);
     $regt=CpajustePeer::doSelectOne($t);
     if ($regt)
      return 4013;

		$fec= $clasemodelo->getFeccau();
		if ($clasemodelo->getStacau()=='N'){ return 1346;}
		$c = new Criteria();
		$c->add(CpimpcauPeer::REFCAU,$clasemodelo->getRefcau());
		$reg = CpimpcauPeer::doSelectOne($c);
		if($reg){
			if ($reg->getMonaju()>0){ return 1347;}
		}
		if ($clasemodelo->getTotpag()>0){ return 1348; }
		if(self::validarFechaPresupuesto($fec)==-1){
      H::EliminarRegistro('Cpimpcau','REFCAU',$clasemodelo->getRefcau());      
      $gencomcon=H::getConfApp2('gencomcon', 'presupuesto', 'precausar');
      if ($gencomcon=='S')
      {
        H::EliminarRegistro('Contabc1','NUMCOM',$clasemodelo->getNumcom());
        H::EliminarRegistro('Contabc','NUMCOM',$clasemodelo->getNumcom());  
      }

      $ct = new Criteria();
      $ct->add(CpdisevePeer::REFDOC, $clasemodelo->getRefcau());
      $ct->add(CpdisevePeer::TIPMOV, 'PRC');
      CpdisevePeer::doDelete($ct);

       $w= new Criteria();
       $w->add(CpmovfuefinPeer::REFMOV,$clasemodelo->getRefcau());
       $w->add(CpmovfuefinPeer::TIPMOV,'CAUSADO');
       $cpmovfuefins = CpmovfuefinPeer::doSelect($w);
       if ($cpmovfuefins) {
        foreach ($cpmovfuefins as $cpmovfuefin) {
          $cpmovfuefin->delete();
        }
       }

			$clasemodelo->delete();

		}else return (self::validarFechaPresupuesto($fec));
		return -1;
	}

	public static function verificarAnuPrepagar($refpag){
		$c = new Criteria();
		$c->add(CppagosPeer::REFPAG,$refpag);
		$reg = CppagosPeer::doSelectOne($c);

		$msj='';

		if ($reg){
			if ($reg->getStapag()=='N') {
				$msj = 'El Pagado ya esta Anulado.';
			}
		}
		$c = new Criteria();
		$c->add(CpimppagPeer::REFPAG,$refpag);
		$cpimppags = CpimppagPeer::doSelect($c);
		if($cpimppags){
			foreach ($cpimppags as $cpimppag){
				if ($cpimppag->getMonaju()>0) {
					$msj = 'El Pagado No Puede ser Anulado, Tiene un Ajuste.';
				}
			}
		}
		return $msj;
	}

	public static function salvarAnuPrepagar($refpag,$fecanu,$desanu) {
		if (self::validarFechaPresupuesto($fecanu)==-1) {
			$c = new Criteria();
			$c->add(CppagosPeer::REFPAG,$refpag);
			$cppagos = CppagosPeer::doSelectOne($c);
			if ($cppagos){
				$cppagos->setFecanu($fecanu);
				$cppagos->setDesanu($desanu);
				$cppagos->setStapag('N');
				$cppagos->save();
			}
			$c = new Criteria();
			$c->add(CpimppagPeer::REFPAG,$refpag);
			$cpimppags = CpimppagPeer::doSelect($c);
			if ($cpimppags) {
				foreach ($cpimppags as $cpimppag) {
					$cpimppag->setStaimp('N');
					$cpimppag->save();
				}
			}
			$c = new Criteria();
			$c->add(CpmovfuefinPeer::REFMOV,$refpag);
			$c->add(CpmovfuefinPeer::TIPMOV,'PAGADO');
			$cpmovfuefins = CpmovfuefinPeer::doSelect($c);
			if ($cpmovfuefins) {
				foreach ($cpmovfuefins as $cpmovfuefin) {
					$cpmovfuefin->setStamov('N');
					$cpmovfuefin->save();
				}
			}
			return -1;
		} else return self::validarFechaPresupuesto($fecanu);
	}

	public static function verificarEliminarPrepagar($cppagos) {
		$c = new Criteria();
		$c->add(CppagosPeer::REFPAG,$cppagos->getRefpag());
		$reg = CppagosPeer::doSelectOne($c);

		if ($reg){
			if ($reg->getStapag()=='N') {
				return 1343;
			}
		}
		$c = new Criteria();
		$c->add(CpimppagPeer::REFPAG,$cppagos->getRefpag());
		$cpimppags = CpimppagPeer::doSelect($c);
		if($cpimppags){
			foreach ($cpimppags as $cpimppag){
				if ($cpimppag->getMonaju()>0) {
					return 1344;
				}
			}
		}
		$c = new Criteria();
		$c->add(TsmovlibPeer::REFPAG,$cppagos->getRefpag());
		$tsmovlib = TsmovlibPeer::doSelectOne($c);
		if ($tsmovlib){
			return 1345;
		}
    
   $t= new Criteria();
   $t->add(CpajustePeer::REFERE,$cppagos->getRefpag());
   $t->add(CpajustePeer::STAAJU,'N',Criteria::NOT_EQUAL);
   $t->add(CpdocajuPeer::REFIER,'G');
   $t->addJoin(CpajustePeer::TIPAJU,CpdocajuPeer::TIPAJU);
   $regt=CpajustePeer::doSelectOne($t);
   if ($regt)
    return 4014;

		return -1;
	}

	/*public static function verificarEliminarPrepagar($cppagos) {
		$c = new Criteria();
		$c->add(TsmovlibPeer::REFLIB,$cppagos->getRefpag());
		$tsmovlib = TsmovlibPeer::doSelectOne($c);
		if ($tsmovlib){
			return 1345;
		}
		else return -1;
	}*/

	public static function eliminarPrepagar($cppagos) {
		if (self::verificarEliminarPrepagar($cppagos)==-1){
				if (self::validarFechaPresupuesto($cppagos->getFecpag())==-1){
					$c = new Criteria();
					$c->add(CpimppagPeer::REFPAG,$cppagos->getRefpag());
					$cpimppags = CpimppagPeer::doSelect($c);
					if ($cpimppags) {
						foreach ($cpimppags as $cpimppag) {
							$cpimppag->delete();
						}
					}
					$c = new Criteria();
					$c->add(CpmovfuefinPeer::REFMOV,$cppagos->getRefpag());
					$c->add(CpmovfuefinPeer::TIPMOV,'PAGADO');
					$cpmovfuefins = CpmovfuefinPeer::doSelect($c);
					if ($cpmovfuefins) {
						foreach ($cpmovfuefins as $cpmovfuefin) {
							$cpmovfuefin->delete();
						}
					}
          $ct = new Criteria();
          $ct->add(CpdisevePeer::REFDOC, $cppagos->getRefpag());
          $ct->add(CpdisevePeer::TIPMOV, 'PAG');
          CpdisevePeer::doDelete($ct);
					$cppagos->delete();
					return -1;
				}
				else return (self::validarFechaPresupuesto($cppagos->getFecpag()));
			//}
		} else return self::verificarEliminarPrepagar($cppagos);
	}

	public static function salvarPagado($cppagos){
		self::correlativo('corpag','cpdefniv',$cppagos->getRefpag(),'refpag','Cppagos',$valorSetear);
		$cppagos->setRefpag($valorSetear);
		$cppagos->setTipcau('');
		$cppagos->setAnopag(substr($cppagos->getFecpag(),0,4));
		$cppagos->setDesanu('');
		$cppagos->setStapag('A');
    $cppagos->setSalaju(0);
		$cppagos->save();
		return -1;
	}

	public static function generarRefer($cppagos,$refcom,$refcau,&$refere,&$refcom,&$refprc){
		$refier = H::getX('TIPPAG','Cpdocpag','Refier',$cppagos->tippag);
		/*$c = new Criteria();
		 *$c->add(CpdocpagPeer::TIPPAG,$cppagos->tippag);
		 *$cpdocpag=CpdocpagPeer::doSelectOne($c);*/

		if ($refier=='A'){
			$c = new Criteria();
			$c->add(CpimpcauPeer::REFCAU,$refcau);
		}
		//if ($cpdocpag->getRefier()=='A'){
		//}
	}

	public static function salvarCpimppag($cppagos,$grid){
		try{
			$cpimppags = $grid[0];
			foreach ($cpimppags as $cpimppag){
        $cpimppag->setRefpag($cppagos->getRefpag());
        $cpimppag->setStaimp('A');
        if ($cppagos->getRefcau()!='') {
          $cpimppag->setRefere($cpimppag->getRefere());
          $t= new Criteria();
          $t->add(CpimpcauPeer::REFCAU,$cppagos->getRefcau());
          $t->add(CpimpcauPeer::CODPRE,$cpimppag->getCodpre());
          $result=CpimpcauPeer::doSelectOne($t);
          if ($result){            
            if ($result->getRefere()!='')
            $cpimppag->setRefcom($result->getRefere());
          else
            $cpimppag->setRefcom('NULO');
          if ($result->getRefprc()!='')
            $cpimppag->setRefprc($result->getRefprc());
          else
            $cpimppag->setRefprc('NULO');
          }
      }else {
        $cpimppag->setRefere('NULO');
        $cpimppag->setRefcom('NULO');
        $cpimppag->setRefprc('NULO');
      }
        $cpimppag->save();                            
      
			}
			$cpimppags1 = $grid[1];
			foreach ($cpimppags1 as $cpimppag1){
				$cpimppag1->delete();
			}
			return -1;
		} catch (Exception $ex){
      		echo $ex;
      		return 0;
    	}
	}



	public static function verificarAnuCausado($referencia,$totpag){
		$mens="";
		$c = new Criteria();
		$c->add(CpcausadPeer::REFCAU,$referencia);
		$reg = CpcausadPeer::doSelectOne($c);
		if ($reg){
			if ($reg->getStacau()=='N'){
				$mens="El Causado ya esta Anulado";
			}
		}
		$c = new Criteria();
		$c->add(CpimpcauPeer::REFPRC,$referencia);
		$dato = CpimpprcPeer::doSelectOne($c);
		if($dato){
			if ($dato->getMonaju()>0){
				$mens="El Causado No Puede ser Eliminado Ni Anulado, Tiene un Ajuste";
			}
		}
		if ($totpag>0){
			$mens="El Causado No Puede ser Eliminado Ni Anulado, Tiene Movimiento";
		}
		return $mens;
	}

	public static function salvarAnuCausado($refcau,$fecanu,$desanu){
		if (self::validarFechaPresupuesto($fecanu)==-1) {
			$c= new Criteria();
		    $c->add(CpcausadPeer::REFCAU,$refcau);
		    $resul= CpcausadPeer::doSelectOne($c);
		    if ($resul){
			   $resul->setFecanu($fecanu);
		       $resul->setDesanu($desanu);
		       $resul->setStacau('N');
		       $resul->save();
		    }
		    $c= new Criteria();
		    $c->add(CpimpcauPeer::REFCAU,$refcau);
		    $res= CpimpcauPeer::doSelect($c);
		    if ($res){
		    	foreach ($res as $rs){
		          $rs->setStaimp('N');
		          $rs->save();
		        }
		    }
		    $c= new Criteria();
		    $c->add(CpmovfuefinPeer::REFMOV,$refcau);
		    $c->add(CpmovfuefinPeer::TIPMOV,'CAUSADO');
		    $resc= CpmovfuefinPeer::doSelect($c);
		    if ($resc){
		    	foreach ($resc as $rs){
		          $rs->setStamov('N');
		          $rs->save();
		        }
		    }
        //Generar Comprobante Reverso
        $gencomcon=H::getConfApp2('gencomcon', 'presupuesto', 'precausar');
        if ($gencomcon=='S')
        {
           self::anular_comprobante_causado($resul,$fecanu);
        }
        return -1;
      }else return self::validarFechaPresupuesto($fecanu);
	}

		public static function salvarPrecausar($clasemodelo,$grid,$grid2){
      if (!$clasemodelo->getId()) {
			  $correlativo=self::correlativo('corcau','cpdefniv',$clasemodelo->getRefcau(),'refcau','Cpcausad',$valorSetear);
			  $clasemodelo->setRefcau($valorSetear);
        self::grabaCausado($clasemodelo);
        self::grabaGridCau($clasemodelo,$grid);
      }else self::grabaCausado($clasemodelo);
			
      self::grabaGridEventosCau($clasemodelo,$grid2);
			return -1;
	}

	public static function grabaCausado($clasemodelo){

		if (!$clasemodelo->getId()) {
      $clasemodelo->setAnocau(substr($clasemodelo->getFeccau(),0,4));
      $clasemodelo->setDesanu("");
      $clasemodelo->setSalpag(0);
      $clasemodelo->setSalaju(0);
      $clasemodelo->setStacau('A');  
    }    
		$clasemodelo->save();
		return -1;
	}

	public static function grabaGridCau($clasemodelo,$grid){
		try{
			$cpcausad = $grid[0];
			foreach ($cpcausad as $reg){
        if ($reg->getMonimp()>0) {
  				$reg->setRefcau($clasemodelo->getRefcau());
          $reg->setStaimp('A');
          $refprc=H::getX_vacio('REFCOM', 'Cpimpcom','Refere',$reg->getRefere());
          $reg->setRefprc($refprc);
  				$reg->save();
      }
			}
			$cpcausadb = $grid[1];
			foreach ($cpcausadb as $reg){
				$reg->delete();
			}
			return -1;
		}catch (Exception $ex){
      		echo $ex;
      		return 0;
    	}
	}

	public static function salvarPreasipar($clasemodelo,$grid){
		 $datosgrid = $grid[0];
     $codigopre=$clasemodelo->getCodpre();
     $codigocon=$clasemodelo->getCodigo11();

		 foreach ($datosgrid as $reg){
			if($reg->getChecked()=='1') {
				$concurrencia=1;				
        $PosGuion=H::instr($reg->getCodpre(),'-',0,$concurrencia);
        while ($PosGuion!=0){
  	        $CodigoMov= $codigopre."-".substr($reg->getCodpre(),0,$PosGuion-1);
  	        $CodigoMov=trim($CodigoMov);

  	        $c = new Criteria();
    				$c->add(CpdeftitPeer::CODPRE,$CodigoMov);
    				$regs = CpdeftitPeer::doSelectOne($c);
    		 		if ($regs){
    		 			$CodigoGrabar= $codigocon."-".substr($reg->getCodpre(),0,$PosGuion-1);
              $nompre=$regs->getNompre();
              $codcta=$regs->getCodcta();
               //print '1/'.$CodigoGrabar;
              $c = new Criteria();
    					$c->add(CpdeftitPeer::CODPRE,$CodigoGrabar);
    					$regs = CpdeftitPeer::doSelectOne($c);
              if (!$regs){
              	  $c = new Cpdeftit();
                  $c->setCodpre($CodigoGrabar);
                  $c->setNompre($nompre);
                  $c->setCodcta($codcta);
        				  $c->setStacod('A');
        				  $c->save();
  		        }
    		 		}
  		 		    $concurrencia=$concurrencia+1;
  		        $PosGuion=H::instr($reg->getCodpre(),'-',0,$concurrencia);
		        }
		        $CodigoMov= $codigopre."-".$reg->getCodpre();
		        $CodigoMov=trim($CodigoMov);
		        $c = new Criteria();
    				$c->add(CpdeftitPeer::CODPRE,$CodigoMov);
    				$regs = CpdeftitPeer::doSelectOne($c);
    				if ($regs){
				      $CodigoGrabar= $codigocon."-".$reg->getCodpre();
	            $nompre=$regs->getNompre();
	            $codcta=$regs->getCodcta();

	             $c = new Criteria();
    					 $c->add(CpdeftitPeer::CODPRE,$CodigoGrabar);
    					 $regs = CpdeftitPeer::doSelectOne($c);
	             if (!$regs){
            	  $c = new Cpdeftit();
                $c->setCodpre($CodigoGrabar);
                $c->setNompre($nompre);
                $c->setCodcta($codcta);
  						  $c->setStacod('A');
  						  $c->save();
	             }
    				}
			}
		}
    return -1;
	}

	public static function validarPretitpre($clasemodelo)
	{
		return H::VerificarFormatoPadre($clasemodelo->getCodpre());
	}

	public static function llenarPer($numper=12,$monasi=0)
	{
		$arregloper=array();
		if ($monasi>0)
		{
		  $monto=$monasi/$numper;
		}
		$j=0;
		while ($j<$numper){
	    if (($j+1)<10){
         $arregloper[$j]["perpre"]='0'.($j+1); }
        else {$arregloper[$j]["perpre"]=$j+1;}
         if ($monasi>0) $arregloper[$j]["monasi"]=number_format($monto,2,',','.');
         else $arregloper[$j]["monasi"]="0,00";
         $arregloper[$j]["id"]="";
         $j++;
		}
		return $arregloper;
	}
        
        public static function generarCorrelativoSolTrasla($clase)
        {
            $tienecorrelativo=false;
            $correlativo = '';

            if ($clase->getReftra() == '########')
            {
                if (Herramientas::getVerCorrelativo('corsoltra','cpdefniv',$r)) // Buscar Correlativo
                {
                    $tienecorrelativo=true;
                    $encontrado=false;

                       while (!$encontrado)
                       {
                         $numero = str_pad($r, 8, '0', STR_PAD_LEFT);

                         $sql="select reftra from cpsoltrasla where reftra='".$numero."'";
                         if (Herramientas::BuscarDatos($sql,$result))
                         {
                           $r=$r+1;
                         }
                         else
                         {
                           $encontrado=true;
                         }
                       }

                   $correlativo = str_pad($r, 8, '0', STR_PAD_LEFT);
                }
            }
            else
            {
               $correlativo = str_replace('#','0',$clase->getReftra());
            }

             if ($tienecorrelativo==true)
             {
               Herramientas::getSalvarCorrelativo('corsoltra','cpdefniv','Referencia',$correlativo,$msg);
             }
            return $correlativo;
       }


        public static function salvarSolicitudTraslado($clasemodelo, $grid, $gridOri, $gridDes, $grid2)
        {
            $id= $clasemodelo->getId();
            //Guarda Datos Solicitud Traslado -- Tabla CpSolTrasla
            if($id==''){
                $reftra = self::generarCorrelativoSolTrasla($clasemodelo);
                $clasemodelo->setReftra($reftra);

                }
            $pertra = date($clasemodelo->getFectra('m'));
            $clasemodelo->setPertra($pertra);
            $anotra = date($clasemodelo->getFectra('Y'));
            $clasemodelo->setAnotra($anotra);

            $clasemodelo->setStatra('A');
            $clasemodelo->save();

            //Guarda Grid Detalles -- Tabla CpsolMovTra
            $gridS = $grid[0];

            $i = 0;
            $c2='';
            while ($i < count($gridS))
            {
                if ($gridS[$i])
                {
                    if ($gridS[$i]['codori'] != '' && $gridS[$i]['coddes'] != '')
                    {
                       if($id==''){
                        $c2 = new Cpsolmovtra();
                        $c2->setReftra($reftra);
                        $c2->setCodori($gridS[$i]['codori']);
                        $c2->setCoddes($gridS[$i]['coddes']);
                        $c2->setMonmov(H::FormatoMonto($gridS[$i]['monmov']));
                        $c2->setStamov('A');
                        $c2->save();
                        }

                    }
                }
                    $i++;
            }

            //Guarda Precompromiso -- Tabla Cpprecom
             $tipoPrc = CpdefnivPeer::doSelectOne(new Criteria());

             if($id==''){
                $prec = new Cpprecom();
                $corr2 = "TR".substr($reftra, 2, strlen($reftra));
                $prec->setRefprc($corr2);
                if($tipoPrc){
                  if ($tipoPrc->getTiptraprc()!='')
                    $prec->setTipprc($tipoPrc->getTiptraprc());
                  else
                    $prec->setTipprc("SAE");
                }else{
                $prec->setTipprc("SAE");
                }
                $prec->setFecprc($clasemodelo->getFectra());
                $prec->setAnoprc($clasemodelo->getFectra('Y'));
                $prec->setDesprc($clasemodelo->getDestra());
                $prec->setMonprc(H::FormatoMonto($clasemodelo->getTottra()));
                $prec->setSalcom(H::FormatoMonto(0));
                $prec->setSalcau(H::FormatoMonto(0));
                $prec->setSalpag(H::FormatoMonto(0));
                $prec->setSalaju(H::FormatoMonto(0));
                $prec->setStaprc('A');
                $prec->save();

            }



            //Guarda Imputaciones Precompromiso -- Tabla Cpimpprc
            $gridO = $gridOri[0];
            $i = 0;
            while ($i < count($gridO))
            {
                if ($gridO[$i])
                {
                    if ($gridO[$i]['codpre'] != '' && $gridO[$i]['monasi'] != '')
                    {
                        if($id==''){
                        $c3 = new Cpimpprc();
                        $c3->setRefprc($corr2);
                        $c3->setCodpre($gridO[$i]['codpre']);
                        $c3->setMonimp(H::FormatoMonto($gridO[$i]['monasi']));
                        $c3->setMoncom(H::FormatoMonto(0));
                        $c3->setMoncau(H::FormatoMonto(0));
                        $c3->setMonpag(H::FormatoMonto(0));
                        $c3->setMonaju(H::FormatoMonto(0));
                        $c3->setStaimp('A');
                        $c3->save();
                        if ($gridO[$i]['datosperiodos']!=''){
                              $c1= new Criteria();
                              $c1->add(CpsolmovtraperoriPeer::REFTRA,$reftra);                 
                              $c1->add(CpsolmovtraperoriPeer::CODORI,$gridO[$i]['codpre']);                 
                              CpsolmovtraperoriPeer::doDelete($c1);
                             
                               $cadenacont=split('!',$gridO[$i]['datosperiodos']);
                               $r=0;
                               while ($r<(count($cadenacont)-1))
                               {
                                 $aux=$cadenacont[$r];
                                 $aux2=split('_',$aux);
                                 if ($aux2[0]!="" )
                                 {               
                                  $cpsolmovtraperori2= new Cpsolmovtraperori();
                                  $cpsolmovtraperori2->setReftra($reftra);
                                  $cpsolmovtraperori2->setCodori($gridO[$i]['codpre']);
                                  $cpsolmovtraperori2->setPerpre($aux2[0]);                      
                                  $cpsolmovtraperori2->setMonmov(H::toFloat($aux2[1]));
                                  $cpsolmovtraperori2->save();                         
                                 }
                                 $r++;
                               }//while
                           }
                        }

                    }

                    $i++;
                }

            }

            //Guardar Detalle por Período Destino
            $gridO = $gridDes[0];
            $i = 0;
            while ($i < count($gridO))
            {
                if ($gridO[$i])
                {
                    if ($gridO[$i]['codpre'] != '' && $gridO[$i]['monasi'] != '')
                    {
                        if($id==''){
                          if ($gridO[$i]['datosperiodos2']!=''){
                              $c1= new Criteria();
                              $c1->add(CpsolmovtraperdesPeer::REFTRA,$reftra);                 
                              $c1->add(CpsolmovtraperdesPeer::CODDES,$gridO[$i]['codpre']);                 
                              CpsolmovtraperdesPeer::doDelete($c1);
                             
                               $cadenacont=split('!',$gridO[$i]['datosperiodos2']);
                               $r=0;
                               while ($r<(count($cadenacont)-1))
                               {
                                 $aux=$cadenacont[$r];
                                 $aux2=split('_',$aux);
                                 if ($aux2[0]!="" )
                                 {               
                                  $cpsolmovtraperdes2= new Cpsolmovtraperdes();
                                  $cpsolmovtraperdes2->setReftra($reftra);
                                  $cpsolmovtraperdes2->setCoddes($gridO[$i]['codpre']);
                                  $cpsolmovtraperdes2->setPerpre($aux2[0]);                      
                                  $cpsolmovtraperdes2->setMonmov(H::toFloat($aux2[1]));
                                  $cpsolmovtraperdes2->save();                         
                                 }
                                 $r++;
                               }//while
                           }
                        }

                    }

                    $i++;
                }

            }

             //salvar eventos
            self::grabaGridEventosTras($clasemodelo,$grid2);


            return -1;
        }


        public static function eliminarSolTrasla($clasemodelo)
        {
            if ($clasemodelo->getReftra() != '' || strlen($clasemodelo->getReftra()) != 8){
                $c = new Criteria();
                $c->add(CpsoltraslaPeer::REFTRA, $clasemodelo->getReftra());
                $reg = CpsoltraslaPeer::doSelectOne($c);

                if ($reg)
                {
                    //Eliminando Movimientos Solicitud Traslado
                    $c2 = new Criteria();
                    $c2->add(CpsolmovtraPeer::REFTRA, $clasemodelo->getReftra());
                    $movs = CpsolmovtraPeer::doSelect($c2);

                    foreach ($movs as $mov)
                    {
                        $mov->delete();
                    }

                    //Eliminando Precompromiso
                    $corr2 = "TR".substr($clasemodelo->getReftra(), 2, strlen($clasemodelo->getReftra()));
                    $c4 = new Criteria();
                    $c4->add(CpimpprcPeer::REFPRC, $corr2);
                    $imputaciones = CpimpprcPeer::doSelect($c4);
                    if ($imputaciones)
                    {
                        foreach ($imputaciones as $imp){
                            $imp->delete();
                        }
                    }

                    $c3 = new Criteria();
                    $c3->add(CpprecomPeer::REFPRC, $corr2);
                    $cpprc = CpprecomPeer::doSelectOne($c3);
                    if ($cpprc){
                        $cpprc->delete();
                    }

                    //Financiamiento
                     $c5 = new Criteria();
                     $c5->add(CpmovfuefinPeer::REFMOV, $clasemodelo->getReftra());
                     $c5->add(CpmovfuefinPeer::TIPMOV, 'TRASLADO');
                     $cpmovfue = CpmovfuefinPeer::doSelect($c5);
                        if ($cpmovfue)
                        {
                            foreach ($cpmovfue as $movfue){
                                $movfue->delete();
                            }
                        }
                     //Eliminó la distribución de eventos
                     $ct = new Criteria();
                     $ct->add(CpdisevePeer::REFDOC, $clasemodelo->getReftra());
                     $ct->add(CpdisevePeer::TIPMOV, 'TRA');
                     CpdisevePeer::doDelete($ct);
                    //Eliminando Solicitud de Traslado

                    Herramientas::EliminarRegistro('Cpsolmovtraperori','Reftra',$clasemodelo->getReftra());
                    Herramientas::EliminarRegistro('Cpsolmovtraperdes','Reftra',$clasemodelo->getReftra());
                    $clasemodelo->delete();
                    return -1;
                }else
                {
                    return 1509;
                }
            }else{
                return 101;
            }
        }

        public static function salvarAnularSoltrasla($ref,$fec,$desanu){
         // if (self::validarFechaPresupuesto($fec)==-1) {
            $c= new Criteria();
            $c->add(CpsoltraslaPeer::REFTRA,$ref);
            $reg = CpsoltraslaPeer::doSelectOne($c);

            //Anulando Solicitud Traslado - Cpsoltrasla
            if ($reg){
                $reg->setFecanu($fec);
                $reg->setDesanu($desanu);
                $reg->setStatra('N');
                $reg->save();
            }
            //Movimientos
            $c= new Criteria();
            $c->add(CpsolmovtraPeer::REFTRA,$ref);
            $res= CpsolmovtraPeer::doSelect($c);
            if ($res){
                foreach ($res as $rs){
                  $rs->setStamov('N');
                  $rs->save();
                }
            }
           //Financiamiento
            $c= new Criteria();
            $c->add(CpmovfuefinPeer::REFMOV,$ref);
            $res= CpsolmovtraPeer::doSelect($c);
              if ($res){
                  $res->setStamov('N');
                  $res->save();
                  $res->save();
              }

            //Anulando Imputaciones -- CpImpprc
             $corr2 = "TR".substr($ref, 2, strlen($ref));
            $c2 = new Criteria();
            $c2->add(CpimpprcPeer::REFPRC,$corr2);
            $res= CpimpprcPeer::doSelect($c2);

            if ($res){
                foreach ($res as $rs){
                    $rs->setStaimp('N');
                    $rs->save();
                }
            }
          //Grabar Precompromiso
            $c= new Criteria();
            $c->add(CpprecomPeer::REFPRC,$corr2);
            $cpprecom= CpprecomPeer::doSelectOne($c);
            if ($cpprecom){
              $cpprecom->setFecanu($fec);
              $cpprecom->setDesanu($desanu);
              $cpprecom->setStaprc('N');
              $cpprecom->save();                
            }
          //}
          return -1;
       }

       	public static function verificarAnularSolTrasla($ref){

            $mens="";
            $c = new Criteria();
            $c->add(CpsoltraslaPeer::REFTRA,$ref);
            $reg = CpsoltraslaPeer::doSelectOne($c);

            if ($reg){
                if ($reg->getStatra()=='N'){
                    $mens="El Precompromiso ya esta Anulado";
                }
            }

            return $mens;
	}

        public static function verificarAprobarSolTrasla($ref){

            $mens="";
            $c = new Criteria();
            $c->add(CpsoltraslaPeer::REFTRA,$ref);
            $reg = CpsoltraslaPeer::doSelectOne($c);

            if ($reg){
                if ($reg->getStatra()=='N'){
                    $mens="El Precompromiso esta Anulado";
                }
            }

            return $mens;
	}

        public static function salvarAprobacionSolTrasla($reftra,$fecapr,$desapr, $nivel, $staapr){
            if (self::validarFechaPresupuesto($fecapr)==-1) {
                $c= new Criteria();
                $c->add(CpsoltraslaPeer::REFTRA,$reftra);
                $reg = CpsoltraslaPeer::doSelectOne($c);

                //Actualizando Solicitud Traslado - Cpsoltrasla
                if ($reg){
                    if ($nivel == 'C'){
                        $reg->setDescon($desapr);
                        $reg->setFeccon($fecapr);
                        $reg->setStacon($staapr);
                    }else if ($nivel == 'G'){
                        $reg->setDesgob($desapr);
                        $reg->setFecgob($fecapr);
                        $reg->setStagob($staapr);
                    }else if ($nivel == 'P'){
                        $reg->setDespre($desapr);
                        $reg->setFecpre($fecapr);
                        $reg->setStapre($staapr);
                    }else if ($nivel == 'N4'){
                        $reg->setDesniv4($desapr);
                        $reg->setFecniv4($fecapr);
                        $reg->setStaniv4($staapr);
                    }else if ($nivel == 'N5'){
                        $reg->setDesniv5($desapr);
                        $reg->setFecniv5($fecapr);
                        $reg->setStaniv5($staapr);
                    }else if ($nivel == 'N6'){
                        $reg->setDesniv6($desapr);
                        $reg->setFecniv6($fecapr);
                        $reg->setStaniv6($staapr);
                    }

                    $reg->save();
                    return -1;
                }else{
                    return 1509;
                }

            }
        }

        public static function validarFecha($fecha1, $fecha2){
            $dFecIni = str_replace("/","",$fecha1);
            $dFecFin = str_replace("/","",$fecha2);

            ereg( "([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})", $dFecIni, $aFecIni);
            ereg( "([0-9]{1,2})([0-9]{1,2})([0-9]{2,4})", $dFecFin, $aFecFin);

            $date1 = mktime(0,0,0,$aFecIni[2], $aFecIni[1], $aFecIni[3]);
            $date2 = mktime(0,0,0,$aFecFin[2], $aFecFin[1], $aFecFin[3]);

            $dias = round(($date2 - $date1) / (60 * 60 * 24));

            if ($dias >= 0){
                return -1;
            }else{
                return 1;
            }
          }

        public static function salvarTraslado($clase,$grid){
           $cordissol=H::getConfApp2('cordissol', 'presupuesto', 'PreTrasla');
            $c = new Criteria();
            if ($cordissol=='S')
              $c->add(CpsoltraslaPeer::REFTRA, $clase->getRefsoltra());
            else
              $c->add(CpsoltraslaPeer::REFTRA, $clase->getReftra());
            $sol = CpsoltraslaPeer::doSelectOne($c);


          if ($sol) {

              if ($sol->getFectra() <= $clase->getFectra()){
                //Anula Precompromiso
                if ($cordissol=='S')
                  $refprc = "TR".substr($clase->getRefsoltra(), 2, strlen($clase->getRefsoltra()));
                else
                  $refprc = "TR".substr($clase->getReftra(), 2, strlen($clase->getReftra()));
                $c = new Criteria();
                $c->add(CpprecomPeer::REFPRC, $refprc);
                $prec = CpprecomPeer::doSelectOne($c);
                if ($prec){
                    $prec->setDesanu('APROBACION DE LA SOLICITUD DEL TRASLADO');
                    $prec->setFecanu($clase->getFectra());
                    $prec->setStaprc('N');
                    $prec->save();
                }

                //Movimientos en CpImpprc
                $c2 = new Criteria();
                $c2->add(CpimpprcPeer::REFPRC, $refprc);
                $reg = CpimpprcPeer::doSelect($c2);

                if ($reg){
                    foreach ($reg as $rs){
                        $rs->setStaimp('N');
                        $rs->save();
                    }
                }


                //Guarda Traslado
                if ($cordissol=='S')
                {
                  $num=0;
                  $numero='';
                  $valido = false;
                  while(!$valido){
                    $num = H::getNextvalSecuencia('cpadidis_refadi_seq');
                    $numero = str_pad((string)$num, 8, "0", STR_PAD_LEFT);

                    $c = new Criteria();
                    $c->add(CptraslaPeer::REFTRA,$numero);
                    $cptra = CptraslaPeer::doSelectOne($c);
                    if(!$cptra){
                      $valido = true;
                    }
                  }
                  $clase->setReftra($numero);
                }
                $clase->setStatra('A');
                $pertra = date($clase->getFectra('m'));
                $clase->setPertra($pertra);
                $anotra = date($clase->getFectra('Y'));
                $clase->setAnotra($anotra);
                $clase->save();

                //Guarda Grid Detalles -- Tabla CpMovTra
                $gridS = $grid[0];

                $i = 0;
                while ($i < count($gridS))
                {
                        $gridS[$i]->setReftra($clase->getReftra());
                        $gridS[$i]->setStamov('A');
                        $gridS[$i]->save();                        

                    $i++;
                }
                $mandisper=H::getConfApp2('mandisper', 'presupuesto', 'PreSolTrasla');
                if ($mandisper=='S'){
                  $c = new Criteria();
                  if ($cordissol=='S')
                    $c->add(CpsolmovtraperoriPeer::REFTRA ,$clase->getRefsoltra());
                  else
                    $c->add(CpsolmovtraperoriPeer::REFTRA ,$clase->getReftra());
                  $result = CpsolmovtraperoriPeer::doSelect($c);
                  if ($result){
                    foreach ($result as $objo) {
                      $cpmovtraperori2= new Cpmovtraperori();
                      $cpmovtraperori2->setReftra($clase->getReftra());
                      $cpmovtraperori2->setCodori($objo->getCodori());
                      $cpmovtraperori2->setPerpre($objo->getPerpre());                      
                      $cpmovtraperori2->setMonmov($objo->getMonmov());
                      $cpmovtraperori2->save();               
                    }
                  }

                  $c1 = new Criteria();
                  if ($cordissol=='S')
                    $c1->add(CpsolmovtraperdesPeer::REFTRA ,$clase->getRefsoltra());
                  else
                    $c1->add(CpsolmovtraperdesPeer::REFTRA ,$clase->getReftra());
                  $result2 = CpsolmovtraperdesPeer::doSelect($c1);
                  if ($result2){
                    foreach ($result2 as $objo2) {
                      $cpmovtraperdes2= new Cpmovtraperdes();
                      $cpmovtraperdes2->setReftra($clase->getReftra());
                      $cpmovtraperdes2->setCoddes($objo2->getCoddes());
                      $cpmovtraperdes2->setPerpre($objo2->getPerpre());                      
                      $cpmovtraperdes2->setMonmov($objo2->getMonmov());
                      $cpmovtraperdes2->save();               
                    }
                  }
                }
                return -1;
              }else{
                  return 1354;
              }
          }else{
              return 1353;
          }
       }

       public static function eliminarTraslado($clase){

          if ($clase->getReftra() != '' || strlen($clase->getReftra()) != 8){
              if (self::validarFechaPresupuesto($clase->getFectra())==-1) {
                $cordissol=H::getConfApp2('cordissol', 'presupuesto', 'PreTrasla');
                //Reactiva Precompromiso
                if ($cordissol=='S')
                  $refprc = "TR".substr($clase->getRefsoltra(), 2, strlen($clase->getRefsoltra()));
                else
                  $refprc = "TR".substr($clase->getReftra(), 2, strlen($clase->getReftra()));
                $c = new Criteria();
                $c->add(CpprecomPeer::REFPRC, $refprc);
                $prec = CpprecomPeer::doSelectOne($c);
                if ($prec){
                    $prec->setDesanu('');
                    $prec->setFecanu('');
                    $prec->setStaprc('A');
                    $prec->save();
                }

                //Movimientos en CpImpprc
                $c2 = new Criteria();
                $c2->add(CpimpprcPeer::REFPRC, $refprc);
                $reg = CpimpprcPeer::doSelect($c2);

                if ($reg){
                    foreach ($reg as $rs){
                        $rs->setStaimp('A');
                        $rs->save();
                    }
                }

                //Elimina Movimientos -- Tabla CpMovTra
                $c3 = new Criteria();
                $c3->add(CpmovtraPeer::REFTRA, $clase->getReftra());
                $reg2 = CpmovtraPeer::doSelect($c3);

                if ($reg2){
                    foreach ($reg2 as $rs){
                        $rs->delete();
                    }
                }
                Herramientas::EliminarRegistro('Cpmovtraperori','Reftra',$clase->getReftra());
                Herramientas::EliminarRegistro('Cpmovtraperdes','Reftra',$clase->getReftra());
                //Elimina Traslado
                $clase->delete();

                return -1;
              }else{
                  return 142;
              }
         }else{
             return 101;
         }

       }

       public static function salvarAnularTraslado($ref,$fec,$desanu){
          $annio ='';$mondis=0;$sts=false;
          $cordissol=H::getConfApp2('cordissol', 'presupuesto', 'PreTrasla');
          $dateFormat = new sfDateFormat('es_VE');
          $fecha = $dateFormat->format($fec, 'i', $dateFormat->getInputPattern('d'));
          $p= new Criteria();
          $p->add(CpdefnivPeer::CODEMP,'001');
          $def = CpdefnivPeer::doSelectOne($p);
          if($def){
                $annio = (int)substr($def->getFeccie(), 0, 4);
                $mes = (int)substr($def->getFeccie(), 5, 2);
          }
            $c= new Criteria();
            $c->add(CptraslaPeer::REFTRA,$ref);
            $reg = CptraslaPeer::doSelectOne($c);

           if ($reg->getFectra() <= $fecha) {


             $m= new Criteria();
              $m->add(CpmovtraPeer::REFTRA,$ref);
              $regis = CpmovtraPeer::doSelect($m);

                if ($regis){
                    foreach ($regis as $rs){

                        H::Monto_disponible_ejecucion($annio,$rs->getCoddes(),$mes,$mondis);
                          if ($mondis-$rs->getMonmov()<0)
                          {
                              return " El Traslado no se puede anular debido a que Existe un movimiento asociado con el titulo presupuestario";
                          }
                    }
                }

            //Anulando Solicitud Traslado - Cpsoltrasla
            if ($reg){
                $reg->setFecanu($fec);
                $reg->setDesanu($desanu);
                $reg->setStatra('N');
                $reg->save();
            }

            //Anulando Imputaciones -- CpImpprc
            if ($cordissol=='S')
              $corr2 = "TR".substr($reg->getRefsoltra(), 2, strlen($reg->getRefsoltra()));
            else
              $corr2 = "TR".substr($ref, 2, strlen($ref));
                
                $c2 = new Criteria();
                $c2->add(CpimpprcPeer::REFPRC,$corr2);
                $res= CpimpprcPeer::doSelect($c2);
                if ($res){
                    foreach ($res as $rs){
                        $rs->setStaimp('A');
                        $rs->save();
                    }
                }

                $c= new Criteria();
            		$c->add(CpprecomPeer::REFPRC,$corr2);
            		$resul= CpprecomPeer::doSelectOne($c);
                if ($resul){
                  $resul->setFecanu('');
          		    $resul->setDesanu('');
          		    $resul->setStaprc('A');
          		    $resul->save();
            		}

                return "";
          }else{
              return "La Fecha del Traslado debe ser mayor o igual a la Fecha de la Solicitud";
          }

       }

       	public static function verificarAnularTraslado($ref){

            $mens="";
            $c = new Criteria();
            $c->add(CptraslaPeer::REFTRA,$ref);
            $reg = CptraslaPeer::doSelectOne($c);

            if ($reg){
                if ($reg->getStatra()=='N'){
                    $mens="El Traslado ya esta Anulado";
                }
            }

            return $mens;
	}

       public static function generarCorrelativoSolCreditos($clase)
        {
            $tienecorrelativo=false;
            $correlativo = '';

            if ($clase->getRefadi() == '########')
            {
                if (Herramientas::getVerCorrelativo('refadi','cpsoladidis',$r)) // Buscar Correlativo
                {
                    $tienecorrelativo=true;
                    $encontrado=false;

                       while (!$encontrado)
                       {
                         $numero = str_pad($r, 8, '0', STR_PAD_LEFT);

                         $sql="select refadi from cpsoladidis where refadi='".$numero."'";
                         if (Herramientas::BuscarDatos($sql,$result))
                         {
                           $r=$r+1;
                         }
                         else
                         {
                           $encontrado=true;
                         }
                       }

                   $correlativo = str_pad($r, 8, '0', STR_PAD_LEFT);
                }else
                {
                   $r = 1;
                   $numero = str_pad($r, 8, '0', STR_PAD_LEFT);
                   $correlativo = str_pad($r, 8, '0', STR_PAD_LEFT);
                }
            }
            else
            {
               $correlativo = str_replace('#','0',$clase->getRefadi());
            }

            /* if ($tienecorrelativo==true)
             {
               Herramientas::getSalvarCorrelativo('reftra','cpsoltrasla','Referencia',$correlativo,&$msg);
             }*/
            return $correlativo;
       }

        public static function salvarSolicitudCreditos($clasemodelo, $grid, $grid2)
        {   $id=$clasemodelo->getId();
            $refadi='';

            if ($clasemodelo->getRefadi() != '' || strlen($clasemodelo->getRefadi()) != 8){
                //Guarda Datos Solicitud Traslado -- Tabla CpSolAdidis
                if (!($id)){
                    $refadi = self::generarCorrelativoSolCreditos($clasemodelo);
                    $clasemodelo->setRefadi($refadi);
                    $clasemodelo->setStaadi('A');
                    }
                $peradi = date($clasemodelo->getFecadi('m'));
                $clasemodelo->setPeradi($peradi);
                $anoadi = date($clasemodelo->getFecadi('Y'));
                $clasemodelo->setAnoadi($anoadi);


                $clasemodelo->save();


                //Guarda Grid Movimiento -- Tabla CpsolMovadi
                $gridS = $grid[0];

                $i = 0;
                while ($i < count($gridS))
                {
                    if ($gridS[$i])
                    {
                            if(($refadi)){
                                $gridS[$i]->setRefadi($refadi);
                                $gridS[$i]->setStamov('A');
                                }else if($id){
                                    $gridS[$i]->setRefadi($clasemodelo->getRefadi());
                                    $gridS[$i]->setStamov('A');
                                }


                            $gridS[$i]->setPerpre($peradi);
                            if ($gridS[$i]->getDatosperiodos()!=''){
                              $c1= new Criteria();
                              $c1->add(CpsolmovadiperPeer::REFADI,$clasemodelo->getRefadi());                 
                              $c1->add(CpsolmovadiperPeer::CODPRE,$gridS[$i]->getCodpre());                 
                              CpsolmovadiperPeer::doDelete($c1);
                             
                               $cadenacont=split('!',$gridS[$i]->getDatosperiodos());
                               $r=0;
                               while ($r<(count($cadenacont)-1))
                               {
                                 $aux=$cadenacont[$r];
                                 $aux2=split('_',$aux);
                                 if ($aux2[0]!="" )
                                 {               
                                  $cpsolmovadiper2= new Cpsolmovadiper();
                                  $cpsolmovadiper2->setRefadi($clasemodelo->getRefadi());
                                  $cpsolmovadiper2->setCodpre($gridS[$i]->getCodpre());
                                  $cpsolmovadiper2->setPerpre($aux2[0]);                      
                                  $cpsolmovadiper2->setMonmov(H::toFloat($aux2[1]));
                                  $cpsolmovadiper2->save();                         
                                 }
                                 $r++;
                               }//while
                           }
                        $gridS[$i]->save();

                    }
                        $i++;

                }

                $gridS2 = $grid[1];
                foreach ($gridS2 as $reg2){
                   $reg2->delete();
                }
                //Se graban los eventos
                self::grabaGridEventosAdiDis($clasemodelo,$grid2);
                return -1;
            }else{
                return 101;
            }
        }

       public static function eliminarSolAdidis($clase){
         if ($clase->getRefadi() != '' || strlen($clase->getRefadi()) != 8){
             $c = new Criteria();
             $c->add(CpsoladidisPeer::REFADI, $clase->getRefadi());
             $ref = CpsoladidisPeer::doSelectOne($c);

             if ($ref){
                 //Eliminar Movimientos Solicitud Creditos
                 $c2 = new Criteria();
                 $c2->add(CpsolmovadiPeer::REFADI, $clase->getRefadi());
                 $regs = CpsolmovadiPeer::doSelect($c2);

                 if ($regs){
                     foreach ($regs as $reg){
                         $reg->delete();
                     }
                 }else{

                 }
                  //Eliminacion de los Eventos
                 $ct = new Criteria();
                $ct->add(CpdisevePeer::REFDOC, $clase->getRefadi());
                if ($clase->getAdidis()=='D') $ct->add(CpdisevePeer::TIPMOV, 'DIS');
                else $ct->add(CpdisevePeer::TIPMOV, 'ADI');
                CpdisevePeer::doDelete($ct);

                Herramientas::EliminarRegistro('Cpsolmovadiper','Refadi',$clase->getRefadi());
                 //Elimina Solicitud de Creditos
                 $clase->delete();
             }else{
                 return 1353;
             }

             return -1;
         }else{
             return 101;
         }

       }

       public static function verificarAnularSolAdidis($ref){

            $mens="";
            $c = new Criteria();
            $c->add(CpsoladidisPeer::REFADI,$ref);
            $reg = CpsoladidisPeer::doSelectOne($c);

            if ($reg){
                if ($reg->getStaadi()=='N'){
                    $mens="El Precompromiso ya esta Anulado";
                }
            }else{
                return 1353;
            }

            return $mens;
	}

        public static function salvarAnularSolAdidis($ref,$fec,$desanu){
            //Anulando Solicitud Credito - Cpsoladidis
          $cordissol=H::getConfApp2('cordissol', 'presupuesto', 'PreAdiDis');
            $c= new Criteria();
            $c->add(CpsoladidisPeer::REFADI,$ref);
            $reg = CpsoladidisPeer::doSelectOne($c);       
            if ($reg){
              $c1= new Criteria();
              if ($cordissol=='S')
                $c1->add(CpadidisPeer::REFSOLADI,$ref);
              else
                $c1->add(CpadidisPeer::REFADI,$ref);
              $reg1 = CpadidisPeer::doSelectOne($c1);
              if (!$reg1){  
                if ($reg->getFecadi() <= $fec) {
                  $reg->setFecanu($fec);
                  $reg->setDesanu($desanu);
                  $reg->setStaadi('N');
                  $reg->save();
                }else{
                   return 4017;
                }
              }else{
                 return 4018;
              }
            }else{
                return 1353;
            }
            return -1;
          

       }

       public static function verificarAprobarSolAdidis($ref){

            $mens="";
            $c = new Criteria();
            $c->add(CpsoladidisPeer::REFADI,$ref);
            $reg = CpsoladidisPeer::doSelectOne($c);

            if ($reg){
                if ($reg->getStaadi()=='N'){
                    $mens="La Solicitud no puede ser aprobada ya que esta Anulada";
                }
            }

            return $mens;
	}

        public static function salvarAprobacionSolAdidis($refadi,$fecapr,$desapr, $nivel, $staapr){
            $dateFormat = new sfDateFormat('es_VE');
            $fecapr = $dateFormat->format($fecapr, 'i', $dateFormat->getInputPattern('d'));
            $c= new Criteria();
            $c->add(CpsoladidisPeer::REFADI,$refadi);
            $reg = CpsoladidisPeer::doSelectOne($c);

            if ($reg->getFecadi() <= $fecapr) {


                //Actualizando Solicitud Traslado - Cpsoladidis
                if ($reg){
                   /*if ($reg->getStacon()=='S')
                   {
                     return 4015;
                   }else {*/
                    if ($nivel == 'C'){
                        $reg->setDescon($desapr);
                        $reg->setFeccon($fecapr);
                        $reg->setStacon($staapr);
                    }else if ($nivel == 'G'){
                        $reg->setDesgob($desapr);
                        $reg->setFecgob($fecapr);
                        $reg->setStagob($staapr);
                    }else if ($nivel == 'P'){
                        $reg->setDespre($desapr);
                        $reg->setFecpre($fecapr);
                        $reg->setStapre($staapr);
                    }else if ($nivel == 'N4'){
                        $reg->setDesniv4($desapr);
                        $reg->setFecniv4($fecapr);
                        $reg->setStaniv4($staapr);
                    }else if ($nivel == 'N5'){
                        $reg->setDesniv5($desapr);
                        $reg->setFecniv5($fecapr);
                        $reg->setStaniv5($staapr);
                    }else if ($nivel == 'N6'){
                        $reg->setDesniv6($desapr);
                        $reg->setFecniv6($fecapr);
                        $reg->setStaniv6($staapr);
                    }

                    $reg->save();
                    return -1;
                  //}
                }else{
                    return -1;
                }

            }else return 4016;
        }


        public static function salvarAdidis($clase, $grid){
            if (self::validarFechaPresupuesto($fecapr)==-1) {
                $c= new Criteria();
                $c->add(CpsoltraslaPeer::REFTRA,$reftra);
                $reg = CpsoltraslaPeer::doSelectOne($c);

                //Actualizando Solicitud Traslado - Cpsoltrasla
                if ($reg){
                    if ($nivel == 'C'){
                        $reg->setDescon($desapr);
                        $reg->setFeccon($fecapr);
                        $reg->setStacon($staapr);
                    }else if ($nivel == 'G'){
                        $reg->setDesgob($desapr);
                        $reg->setFecgob($fecapr);
                        $reg->setStagob($staapr);
                    }else if ($nivel == 'P'){
                        $reg->setDespre($desapr);
                        $reg->setFecpre($fecapr);
                        $reg->setStapre($staapr);
                    }else if ($nivel == 'N4'){
                        $reg->setDesniv4($desapr);
                        $reg->setFecniv4($fecapr);
                        $reg->setStaniv4($staapr);
                    }else if ($nivel == 'N5'){
                        $reg->setDesniv5($desapr);
                        $reg->setFecniv5($fecapr);
                        $reg->setStaniv5($staapr);
                    }else if ($nivel == 'N6'){
                        $reg->setDesniv6($desapr);
                        $reg->setFecniv6($fecapr);
                        $reg->setStaniv6($staapr);
                    }

                    $reg->save();
                    return -1;
                }else{
                    return 1509;
                }

            }
        }

        public static function salvarCreditoAdidis($clase,$grid){
          if (self::validarFechaPresupuesto($clase->getFecadi())==-1) {
            $cordissol=H::getConfApp2('cordissol', 'presupuesto', 'PreAdiDis');
            $c = new Criteria();
            if ($cordissol=='S')
              $c->add(CpsoladidisPeer::REFADI, $clase->getRefsoladi());
            else
              $c->add(CpsoladidisPeer::REFADI, $clase->getRefadi());
            $reg = CpsoladidisPeer::doSelectOne($c);

            if ($reg){

                if ($reg->getFecadi() <= $clase->getFecadi()){
                    $staadi = $reg->getStaadi();


                    if($staadi != 'N'){
                        //Guarda Traslado
                        if ($cordissol=='S')
                        {
                          $num=0;
                          $numero='';
                          $valido = false;
                          while(!$valido){
                            $num = H::getNextvalSecuencia('cpadidis_refadi_seq');
                            $numero = str_pad((string)$num, 8, "0", STR_PAD_LEFT);

                            $c = new Criteria();
                            $c->add(CpadidisPeer::REFADI,$numero);
                            $cpadi = CpadidisPeer::doSelectOne($c);
                            if(!$cpadi){
                              $valido = true;
                            }
                          }
                          $clase->setRefadi($numero);
                        }
                        $clase->setStaadi('A');
                        $peradi = date($clase->getFecadi('m'));
                        $clase->setPeradi($peradi);
                        $anoadi = date($clase->getFecadi('Y'));
                        $clase->setAnoadi($anoadi);
                        $clase->save();

                        //Guarda Grid Detalles -- Tabla CpMovAdi
                        $gridS = $grid[0];

                        $i = 0;
                        while ($i < count($gridS))
                        {
                            if ($gridS[$i])
                            {
                                if ($gridS[$i]->getCodpre() != '' && $gridS[$i]->getMonmov() != '')
                                {
                                    $gridS[$i]->setRefadi($clase->getRefadi());
                                    $gridS[$i]->setPerpre($peradi);
                                    $gridS[$i]->setStamov('A');
                                    if($gridS[$i]->getDes()=='Origen'){
                                       $gridS[$i]->setTipo('O');
                                    }else{
                                         $gridS[$i]->setTipo('D');
                                    }
                                    if ($gridS[$i]->getDatosperiodos()!=''){
                                      $c1= new Criteria();
                                      $c1->add(CpmovadiperPeer::REFADI,$clase->getRefadi());                 
                                      $c1->add(CpmovadiperPeer::CODPRE,$gridS[$i]->getCodpre());                 
                                      CpmovadiperPeer::doDelete($c1);
                                     
                                       $cadenacont=split('!',$gridS[$i]->getDatosperiodos());
                                       $r=0;
                                       while ($r<(count($cadenacont)-1))
                                       {
                                         $aux=$cadenacont[$r];
                                         $aux2=split('_',$aux);
                                         if ($aux2[0]!="" )
                                         {               
                                          $cpmovadiper2= new Cpmovadiper();
                                          $cpmovadiper2->setRefadi($clase->getRefadi());
                                          $cpmovadiper2->setCodpre($gridS[$i]->getCodpre());
                                          $cpmovadiper2->setPerpre($aux2[0]);                      
                                          $cpmovadiper2->setMonmov(H::toFloat($aux2[1]));
                                          $cpmovadiper2->save();                         
                                         }
                                         $r++;
                                       }//while
                                   }

                                    $gridS[$i]->save();
                                }

                            }   $i++;

                        }

                        return -1;

                    }else{
                        return 1328;
                    }
                }else{
                    return 1355;
                }
            }else{
                return 1353;
            }
          }else{
              return 142;
          }
      }

      public static function eliminarCreditoAdidis($clase){
        $msg="";

      if ($clase->getAdidis()=='A') 
        $msg=Presupuesto::validarDetalleAumDism($clase->getRefadi());
      if($msg!=''){
        return 1380;
      }else {
          $staadi = $clase->getStaadi();


          if($staadi != 'N'){
               //Eliminar Movimientos Creditos
               $c2 = new Criteria();
               $c2->add(CpmovadiPeer::REFADI, $clase->getRefadi());
               $regs = CpmovadiPeer::doSelect($c2);

               if ($regs){
                   foreach ($regs as $reg2){
                       $reg2->delete();
                   }
               }
               Herramientas::EliminarRegistro('Cpmovadiper','Refadi',$clase->getRefadi());
               //Elimina Crédito
               $clase->delete();
              return -1;

          }else{
              return 1379;
          }
        }
       }

        public static function verificarAnularCreditoAdidis($ref){

            $mens="";
            $c = new Criteria();
            $c->add(CpadidisPeer::REFADI,$ref);
            $reg = CpadidisPeer::doSelectOne($c);

            if ($reg){
                if ($reg->getStaadi()=='N'){
                    $mens="El Crédito ya esta Anulado";
                }
            }

            return $mens;
	}

        public static function salvarAnularCreditoAdidis($ref,$fec,$desanu){
          if (self::validarFechaPresupuesto($fec)==-1) {
            $c= new Criteria();
            $c->add(CpadidisPeer::REFADI,$ref);
            $reg = CpadidisPeer::doSelectOne($c);

            //Anulando Credito - Cpadidis
            if ($reg){
                $reg->setFecanu($fec);
                $reg->setDesanu($desanu);
                $reg->setStaadi('N');
                $reg->save();

                $cr= new Criteria();
                $cr->add(CpmovadiPeer::REFADI,$ref);
                $registros = CpmovadiPeer::doSelect($cr);
                if ($registros){
                         foreach ($registros as $mreg){
                            $mreg->setStaadi('N');
                         }
                     }
                if($reg->getAdidis()=='A'){
                    $cp= new Criteria();
                    $cp->add(CpdisfuefinPeer::REFDIS, $ref);
                    $regs = CpdisfuefinPeer::doSelect($cp);
                    if ($regs){
                         foreach ($regs as $reg){
                             $reg->delete();
                         }
                     }
                }else{
                   $cp= new Criteria();
                   $cp->add(CpmovfuefinPeer::REFMOV, $ref);
                   $cp->add(CpmovfuefinPeer::TIPMOV, 'DEBITO' );
                   $regs = CpmovfuefinPeer::doSelect($cp);
                     if ($regs){
                         foreach ($regs as $reg){
                             $reg->setStamov('N');
                             $reg->save();
                         }
                     }

                }
            }else{
                return 1353;
            }
            return -1;
          }

       }


       public static function generarCorrelativoAjuste($clase)
        {
            $tienecorrelativo=false;
            $correlativo = '';

            if ($clase->getRefaju() == '########')
            {
                if (Herramientas::getVerCorrelativo('refaju','cpajuste',$r)) // Buscar Correlativo
                {
                    $tienecorrelativo=true;
                    $encontrado=false;

                       while (!$encontrado)
                       {
                         $numero = str_pad($r, 8, '0', STR_PAD_LEFT);

                         $sql="select refaju from cpajuste where refaju='".$numero."'";
                         if (Herramientas::BuscarDatos($sql,$result))
                         {
                           $r=$r+1;
                         }
                         else
                         {
                           $encontrado=true;
                         }
                       }
                    $correlativo = str_pad($r, 8, '0', STR_PAD_LEFT);
                }else
                {
                   $r = 1;
                   $numero = str_pad($r, 8, '0', STR_PAD_LEFT);
                   $correlativo = str_pad($r, 8, '0', STR_PAD_LEFT);
                }
            }
            else
            {
               $correlativo = str_replace('#','0',$clase->getReftra());
            }

            /* if ($tienecorrelativo==true)
             {
               Herramientas::getSalvarCorrelativo('reftra','cpsoltrasla','Referencia',$correlativo,&$msg);
             }*/
            return $correlativo;
       }


        public static function salvarAjuste($clasemodelo, $grid)
        {
            if (self::validarFechaPresupuesto($clasemodelo->getFecaju())==-1) {
                //Guarda Datos Solicitud Traslado -- Tabla CpSolTrasla
                $refaju = self::generarCorrelativoAjuste($clasemodelo);
                $clasemodelo->setRefaju($refaju);

                $peraju = date($clasemodelo->getFecaju('m'));
                $clasemodelo->setPeraju($peraju);
                $anoaju = date($clasemodelo->getFecaju('Y'));
                $clasemodelo->setAnoaju($anoaju);

                $clasemodelo->setStaaju('A');

                $tipo = $clasemodelo->getTipaju();

                $c = new Criteria();
                if ($tipo == 'AJCA'){
                    $c->add(CpcausadPeer::REFCAU, $clasemodelo->getRefere());
                    $aux = CpcausadPeer::doSelectOne($c);

                    $fec = $aux->getFeccau();
                }else if ($tipo == 'AJPR'){
                    $codigo ="TR".substr($clasemodelo->getRefere(), 2, strlen($clasemodelo->getRefere()));
                    $c->add(CpprecomPeer::REFPRC, $codigo);
                    $aux = CpprecomPeer::doSelectOne($c);

                    $fec = $aux->getFecprc();
                }else if ($tipo == 'AJCM'){
                    $c->add(CpcomproPeer::REFCOM, $clasemodelo->getRefere());
                    $aux = CpcomproPeer::doSelectOne($c);

                    $fec = $aux->getFeccom();
                }else if ($tipo == 'AJPA'){
                    $c->add(CppagosPeer::REFPAG, $clasemodelo->getRefere());
                    $aux = CppagosPeer::doSelectOne($c);

                    $fec = $aux->getFecpag();
                }

                if ($fec <= $clasemodelo->getFecaju()){
                    $clasemodelo->save();

                    //Elimina Datos viejos
                    $c = new Criteria();
                    $c->add(CpmovajuPeer::REFAJU, $refaju);
                    $reg = CpmovajuPeer::doSelect($c);

                    if ($reg){
                        foreach($reg as $r){
                            $r->delete();
                        }
                    }

                    //Guarda Grid Detalles -- Tabla Cpmovaju
                    $gridS = $grid[0];

                    $i = 0;
                    while ($i < count($gridS))
                    {
                        if ($gridS[$i])
                        {

                                $c2 = new Cpmovaju();
                                $c2->setRefaju($refaju);
                                $c2->setCodpre($gridS[$i]['codpre']);

                                if($clasemodelo->getAfecta() == 'P'){
                                    $c2->setMonaju(H::FormatoMonto($gridS[$i]['monaju']));
                                }else{
                                    $valor = $gridS[$i]['monaju'];
                                    $valor = (-1) * $valor;
                                    $c2->setMonaju($valor);
                                }
                                $c2->setStamov('A');

                                if ($tipo == 'AJCA'){
                                    $c2->setRefcau($clasemodelo->getRefere());
                                    $c2->setRefprc('NULO');
                                    $c2->setRefcom('NULO');
                                    $c2->setRefpag('NULO');
                                }else if ($tipo == 'AJPR'){
                                    $c2->setRefcau('NULO');
                                    $c2->setRefprc($clasemodelo->getRefere());
                                    $c2->setRefcom('NULO');
                                    $c2->setRefpag('NULO');
                                }else if ($tipo == 'AJCM'){
                                    $c2->setRefcau('NULO');
                                    $c2->setRefprc('NULO');
                                    $c2->setRefcom($clasemodelo->getRefere());
                                    $c2->setRefpag('NULO');
                                }else if ($tipo == 'AJPA'){
                                    $c2->setRefcau('NULO');
                                    $c2->setRefprc('NULO');
                                    $c2->setRefcom('NULO');
                                    $c2->setRefpag($clasemodelo->getRefere());
                                }

                                $c2->save();

                            $i++;
                        }else
                        {
                            $i++;
                        }

                    }
                    return -1;
                }else{
                    return 1356;
                }

            }
        }

        public static function eliminarAjuste($clase){

            if($clase->getStaaju() != 'N'){
                $c = new Criteria();
                $c->add(CpmovajuPeer::REFAJU, $clase->getRefaju());
                $reg = CpmovajuPeer::doSelect($c);

                if ($reg){
                    foreach($reg as $r){
                        $r->delete();
                     }
                }

                $clase->delete();

                return -1;
            }else{
                return 1357;
            }
        }

        public static function verificarAnularAjuste($ref){

            $mens="";
            $c = new Criteria();
            $c->add(CpajustePeer::REFAJU,$ref);
            $reg = CpajustePeer::doSelectOne($c);

            if ($reg){
                if ($reg->getStaaju()=='N'){
                    $mens="El Ajuste ya esta Anulado";
                }
            }

            return $mens;
	}

        public static function salvarAnularAjuste($ref,$fec,$desanu){
          if (self::validarFechaPresupuesto($fec)==-1) {
            $c= new Criteria();
            $c->add(CpajustePeer::REFAJU,$ref);
            $reg = CpajustePeer::doSelectOne($c);

            //Anulando Credito - Cpadidis
            if ($reg){
                $reg->setFecanu($fec);
                $reg->setDesanu($desanu);
                $reg->setStaaju('N');
                $reg->save();
            }else{
                return 1353;
            }
            return -1;
          }

       }

        public static function salvardatosCompromisos($clasemodelo,$grid)
   {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
        $x[$j]->save();
        $j++;
    }
   }

   public static function mostrarAsignacionesPresuspuestarias($codigo,$fecnom,$gasto,$banco,$especial,$codnomesp,&$arreglodet)
   {
     $arreglodet=array();
     $sql="SELECT a.codpre as codpre, a.monto as monto, a.asided as asided, a.codcon as codcon FROM NPCIENOM a,NPDEFCPT b
         WHERE  a.CODNOM = '".$codigo."' AND a.CodTipGas='".$gasto."' AND a.CODBAN='".$banco."' AND  (a.ASIDED='A' OR a.ASIDED='D')
         ".($especial=='S' ? "AND a.especial='S' AND a.codnomesp='".$codnomesp."'" : "AND a.especial='N'")."
            AND a.FECNOM=TO_DATE('".$fecnom."','YYYY-MM-DD') AND a.codcon=b.codcon Order By CodCon";
     if (Herramientas::BuscarDatos($sql,$result))
     {
          $i=0;
          while ($i<count($result))
          {
           if ($result[$i]["asided"]=='A' && $result[$i]["monto"]>0)
           {
            $pos=self::posicion_en_el_grid($arreglodet,$result[$i]["codpre"]);
            if ($pos==0)
            {
             $j=count($arreglodet)+1;
             $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
             $arreglodet[$j-1]["monto"]=number_format($result[$i]["monto"],2,',','.');
}
            else
            {
              $valor=H::toFloat($arreglodet[$pos-1]["monto"]);
              $arreglodet[$pos-1]["monto"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
            }
           }
           
            if ($result[$i]["asided"]=='D' && $result[$i]["monto"]>0)
            {
             $c= new Criteria();
             $c->add(OpretconPeer::CODCON,$result[$i]["codcon"]);
             $c->add(OpretconPeer::CODNOM,$codigo);
             $resultado=OpretconPeer::doSelectOne($c);
             if (!$resultado)
             {
                 $pos=self::posicion_en_el_grid($arreglodet,$result[$i]["codpre"]);
                 if ($pos!=0) {
                     $valor=H::toFloat($arreglodet[$pos-1]["monto"]);
                     $arreglodet[$pos-1]["monto"]=number_format(($valor-$result[$i]["monto"]),2,',','.');
                 }
             }   
            }
            $i++;
          }
     }
   }

      public static function posicion_en_el_grid($arreglo,$codigo)
      {
        $enc=false;
        $ind=0;
        while (($ind<count($arreglo)) && (!$enc))
        {
            if ($arreglo[$ind]["codpre"]==$codigo)
            { $enc=true; }
          $ind++;
        }

        if ($enc)
        { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

       return $posicionenelgrid;
      }

      public static function generarCompromisoNomina($cpcompro,$grid)
      {
        self::correlativo('corcom','cpdefniv',$cpcompro->getRefcom(),'refcom','Cpcompro',$valorSetear);
        $cpcompro->setRefcom($valorSetear);          
        $cpcompro->setTipprc('');
        $cpcompro->setAnocom(substr($cpcompro->getFeccom(),0,4));
        $cpcompro->setDesanu('');
        $cpcompro->setStacom('A');

        $c = new Criteria();
        $c->add(CpdoccomPeer::TIPCOM,$cpcompro->getTipcom());
        $cpdoccom = CpdoccomPeer::doSelectOne($c);
        if ($cpdoccom->getReqaut()=='S'){
                $reqaut='N';
        }else $reqaut='';

        $cpcompro->setAprcom($reqaut);
        $cpcompro->save();

        //salvar detalle y actualizar npcienom
            $x = $grid[0];
            $j = 0;
            while ($j < count($x)) {

                $x[$j]->setRefcom($cpcompro->getRefcom());
                $x[$j]->setStaimp('A');
                $x[$j]->setMoncau(0);
                $x[$j]->setMonpag(0);
                $x[$j]->setMonaju(0);
                $x[$j]->setRefere('NULO');
                $x[$j]->save();

                //Actualizo npcienom
                $l= new Criteria();
                $l->add(NpcienomPeer::CODNOM,$cpcompro->getTipnom());
                $l->add(NpcienomPeer::FECNOM,$cpcompro->getFecnom());
                $l->add(NpcienomPeer::CODTIPGAS,$cpcompro->getGasto());
                $l->add(NpcienomPeer::CODBAN,$cpcompro->getBanco());
                if ($cpcompro->getNomespecial()=='S')  {
                   $l->add(NpcienomPeer::ESPECIAL,'S');
                   $l->add(NpcienomPeer::CODNOMESP,$cpcompro->getCodnomesp());
                }else {
                    $l->add(NpcienomPeer::ESPECIAL,'N');
                }
                $l->add(NpcienomPeer::CODPRE,$x[$j]->getCodpre());
                $sql="(npcienom.asided='A' or npcienom.asided='D')";
                $l->add(NpcienomPeer::ASIDED,$sql,Criteria::CUSTOM);
                $resultado= NpcienomPeer::doSelect($l);
                if ($resultado)
                {
                    foreach ($resultado as $obj)
                    {
                        $obj->setRefcom($cpcompro->getRefcom());
                        $obj->save();
                    }
                }

              $j++;
            }
      }
    public static function BuscarNombreCodPre($codpre){
        $nombre='';
        $c= new Criteria();
        $c->add(CpdeftitPeer::CODPRE, $codpre);
        $cpdestit= CpdeftitPeer::doSelectOne($c);
        if($cpdestit){
            $d= new Criteria();
            $d->add(CpasiiniPeer::CODPRE, $codpre);
            $d->add(CpasiiniPeer::PERPRE, "00");
            $cpasiini= CpasiiniPeer::doSelectOne($d);
            if($cpasiini){
                $nombre =$cpdestit->getNompre().",  Disponibilidad:  ". number_format($cpasiini->getMondis(),2,'.',',');
            }
        }
        return($nombre);

    }
    public static function validarDetalleTraslado($reftra){
      $msg='';$annio='';
      $c = new Criteria();
      $c->add(CpmovtraPeer::REFTRA,$reftra);
      $resultado = CpmovtraPeer::doSelect($c);
        $r= new Criteria();
          $r->add(CpdefnivPeer::CODEMP,'001');
            $def = CpdefnivPeer::doSelectOne($r);
              if($def){
                    $annio = (int)substr($def->getFeccie(), 0, 4);
                    $mes = (int)substr($def->getFeccie(), 5, 2);
              }
      if($resultado){
          foreach ($resultado as $reg){

          H::Monto_disponible_ejecucion($annio,$reg->getCoddes(),$mes,$mondis);
           $MonTra=H::toFloat($reg->getMonmov());
              if (H::toFloat($mondis) < $MonTra)
                {
                $msg= $reg->getCoddes() . " es de " . number_format($mondis,2,'.',',');
                break;
                }

                }
      }
      return($msg);
    }
     public static function Verificar_Dependencias($codigo){
        $cordissol=H::getConfApp2('cordissol', 'presupuesto', 'PreAdiDis');
         $c= new Criteria();
         if ($cordissol=='S')
           $c->add(CpadidisPeer::REFSOLADI, $codigo);
         else
          $c->add(CpadidisPeer::REFADI, $codigo);
         $c->add(CpadidisPeer::STAADI, 'A');
          $def = CpdefnivPeer::doSelectOne($c);
          if($def){
              return(true);
          }else{
              return(false);
          }

     }
    public static function validarDetalleAumDism($refadi){
      $msg='';$annio='';

       $r= new Criteria();
          $r->add(CpdefnivPeer::CODEMP,'001');
            $def = CpdefnivPeer::doSelectOne($r);
              if($def){
                    $annio = (int)substr($def->getFeccie(), 0, 4);
                    $mes = (int)substr($def->getFeccie(), 5, 2);
              }
      $c = new Criteria();
      $c->add(CpmovadiPeer::REFADI,$refadi);
      $resultado = CpmovadiPeer::doSelect($c);
      if($resultado){
        $peradi=substr(H::getX_vacio('REFADI','Cpadidis','Fecadi',$refadi), 5,2);
          foreach ($resultado as $reg){

          H::Monto_disponible_ejecucion($annio,H::getCodPreDis($reg->getCodpre()),$peradi,$mondis);
           $MonTra=H::toFloat($reg->getMonmov());
              if (H::toFloat($mondis) < $MonTra)
                {
                $msg= $reg->getCodpre() . " es de " . number_format($mondis,2,'.',',');
                break;
                }

                }
      }
      return($msg);
    }

    public static function validarAnulAumDis($refadi){
              $p= new Criteria();
              $p->add(CpdefnivPeer::CODEMP,'001');
              $def = CpdefnivPeer::doSelectOne($p);
              if($def){
                    $annio = (int)substr($def->getFeccie(), 0, 4);
                    $mes = (int)substr($def->getFeccie(), 5, 2);
              }
              $m= new Criteria();
              $m->add(CpmovadiPeer::REFADI,$refadi);
              $regis = CpmovadiPeer::doSelect($m);

                if ($regis){
                    foreach ($regis as $rs){

                        H::Monto_disponible_ejecucion($annio,$rs->getCodpre(),$mes,$mondis);
                          if ($mondis-$rs->getMonmov()<0)
                          {
                              return true;
                          }
                          return false;
                    }
                }

    }
    
   public static function mostrarAportesPresuspuestarios($codigo,$fecnom,$gasto,&$arreglodet)
   {
     $arreglodet=array();
     $sql="SELECT codpre as codpre, monto as monto, asided as asided, codcon as codcon FROM NPCIENOM WHERE CODCON = '".$codigo."' AND 
         CodTipGas='".$gasto."'  AND ASIDED='P' AND FECNOM=TO_DATE('".$fecnom."','YYYY-MM-DD') Order By CodCon";
     if (Herramientas::BuscarDatos($sql,$result))
     {         
          $i=0;
          while ($i<count($result))
          {
           if ($result[$i]["asided"]=='P' && $result[$i]["monto"]>0)
           {
            $pos=self::posicion_en_el_grid($arreglodet,$result[$i]["codpre"]);
            if ($pos==0)
            {
             $j=count($arreglodet)+1;
             $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
             $arreglodet[$j-1]["monto"]=number_format($result[$i]["monto"],2,',','.');
            }
            else
            {
              $valor=H::toFloat($arreglodet[$pos-1]["monto"]);
              $arreglodet[$pos-1]["monto"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
            }
           }
            $i++;
          }
     }
   }
   
   public static function generarCompromisoAportes($cpcompro,$grid)
      {
        self::correlativo('corcom','cpdefniv',$cpcompro->getRefcom(),'refcom','Cpcompro',$valorSetear);
        $cpcompro->setRefcom($valorSetear);          
        $cpcompro->setTipprc('');
        $cpcompro->setAnocom(substr($cpcompro->getFeccom(),0,4));
        $cpcompro->setDesanu('');
        $cpcompro->setStacom('A');

        $c = new Criteria();
        $c->add(CpdoccomPeer::TIPCOM,$cpcompro->getTipcom());
        $cpdoccom = CpdoccomPeer::doSelectOne($c);
        if ($cpdoccom->getReqaut()=='S'){
                $reqaut='N';
        }else $reqaut='';

        $cpcompro->setAprcom($reqaut);
        $cpcompro->save();
        
        //salvar detalle y actualizar npcienom
            $x = $grid[0];
            $j = 0;
            while ($j < count($x)) {

                $x[$j]->setRefcom($cpcompro->getRefcom());
                $x[$j]->setStaimp('A');
                $x[$j]->setMoncau(0);
                $x[$j]->setMonpag(0);
                $x[$j]->setMonaju(0);
                $x[$j]->setRefere('NULO');                
                $x[$j]->save();         
                
                //Actualizo npcienom
                $l= new Criteria();
                $l->add(NpcienomPeer::CODCON,$cpcompro->getTipapo());
                $l->add(NpcienomPeer::FECNOM,$cpcompro->getFecnom());
                $l->add(NpcienomPeer::CODTIPGAS,$cpcompro->getGasto());
                $l->add(NpcienomPeer::CODPRE,$x[$j]->getCodpre());
                $l->add(NpcienomPeer::ASIDED,'P');
                $resultado= NpcienomPeer::doSelect($l);
                if ($resultado)
                {
                    foreach ($resultado as $obj)
                    {
                        $obj->setRefcom($cpcompro->getRefcom());
                        $obj->save();
                    }
                }                
                     
              $j++;
            }
      }
      
  public static function posicion_en_el_grid2($arreglo,$codigo)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
        if ($arreglo[$ind]["codpre"]==$codigo)
        { 
            $enc=true;        
        }
      $ind++;
    }

    if ($enc)
    { 
        $posicionenelgrid=$ind;
        
    }else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }      
  
	public static function salvarPrePagar($cppagos,$grid,$grid2){
		if (!$cppagos->getId()) {
      self::salvarPagado($cppagos);
  		self::salvarCpimppag($cppagos, $grid);
    }else $cppagos->save();
    self::grabaGridEventosPag($cppagos, $grid2);
		return -1;
	}
        
    public static function SalvarCompromisoExtranjeros($clasemodelo,$grid)
    {
        if (Herramientas::getVerCorrelativo('corcomext','cacorrel',$r))
        {
             $tienecorrelativo=false;
             if ($clasemodelo->getRefcomext()=='########')
             {
    	      	$tienecorrelativo=true;
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

	          $sql="select refcomext from cpcomext where refcomext='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	        $clasemodelo->setRefcomext(str_pad($r, 8, '0', STR_PAD_LEFT));      
              }
              else
              {
                $clasemodelo->setRefcomext(str_replace('#','0',$clasemodelo->getRefcomext()));
              }
         }

     if ($tienecorrelativo==true)
     {
       Herramientas::getSalvarCorrelativo('corcomext','cacorrel','Referencia',$r,$msg);
     }
       $clasemodelo->setStacom('A');
       $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
       $clasemodelo->setLoguse($loguse);     
       $clasemodelo->save();
       
       $refe=$clasemodelo->getRefcomext();
       $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCodpre()!='')
          {
            $x[$j]->setRefcomext($refe);            
            $x[$j]->save();
          }
          $j++;
        }
        
        $z=$grid[1];
        $l=0;
        if (!empty($z[$l]))
        {
          while ($l<count($z))
          {
            $z[$l]->delete();
            $l++;
          }
        }
        
              
        //Grabar Compromiso Presupuestario         
        $moneda=$clasemodelo->getCodmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda) {
                $valor=$clasemodelo->getValmon();                
        }else
            $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
        
          self::correlativo('corcom','cpdefniv','########','refcom','Cpcompro',$valorSetear);
          $fecha_ano=substr($clasemodelo->getFeccom(), 0, 4);
          $referencia=$valorSetear;
          $cpcompro_new = new Cpcompro();
          $cpcompro_new->setRefcom($referencia);
          $cpcompro_new->setTipcom($clasemodelo->getTipcom());
          $cpcompro_new->setFeccom($clasemodelo->getFeccom());
          $cpcompro_new->setAnocom($fecha_ano);
          $cpcompro_new->setRefprc('NULO');
          $cpcompro_new->setDescom($clasemodelo->getDescom());
          $cpcompro_new->setMoncom($clasemodelo->getMoncom()*$valor);
          $cpcompro_new->setSalcau(0);
          $cpcompro_new->setSalpag(0);
          $cpcompro_new->setSalaju(0);
          $cpcompro_new->setCedrif($clasemodelo->getCedrif());
          $cpcompro_new->setStacom('A');              
          $reqaut=H::getX('TIPCOM','Cpdoccom','Reqaut',$clasemodelo->getTipcom());
          if ($reqaut=='S')              
            $cpcompro_new->setAprcom('N');
          else 
            $cpcompro_new->setAprcom('S');
          $cpcompro_new->save();          
          
           $x=$grid[0];
           $i=0;
           while ($i<count($x))
           {
              if ($x[$i]->getCodpre()!='')
              {
                $cpimpcom_new = new Cpimpcom();
                $cpimpcom_new->setRefcom($referencia);
                $cpimpcom_new->setCodpre($x[$i]->getCodpre());
                $cpimpcom_new->setMonimp($x[$i]->getMonimp()*$valor);
                $cpimpcom_new->setMoncau(0);
                $cpimpcom_new->setMonpag(0);
                $cpimpcom_new->setMonaju(0);
                $cpimpcom_new->setStaimp('A');
                $cpimpcom_new->setRefere('NULO');
                $cpimpcom_new->save();
              }
            $i++;
          }  

       $clasemodelo->setRefcom($referencia);
       $clasemodelo->save();
       
    }
    
public static function validarPreComExt($clasemodelo,$grid) {
		$datosGridsingrupo=$grid[0];

    foreach($datosGridsingrupo as $codpre){
      $actual = $codpre->getCodpre();
      $encontrado = false;

        $c = new Criteria();
        $c->add(CpasiiniPeer::CODPRE,$actual);
        $cpasiini = CpasiiniPeer::doSelectOne($c);
        if(!$cpasiini) {
                return 1340;
                }
      
      foreach ($datosGridsingrupo as $fila){
        if ($fila->getCodpre()==$actual){
          if ($encontrado) return 1337;
          $encontrado=true;
        }
      }
    }

    $datosGrid = array();
    foreach($datosGridsingrupo as $cpimpcom){
        $codpre=H::getCodPreDis($cpimpcom->getCodpre());
        $pos=self::posicion_en_el_grid2($datosGrid, $codpre);
        if ($pos==0)
        {
         $i=count($datosGrid)+1;
         $datosGrid[$i-1]["codpre"]=$codpre;
         $datosGrid[$i-1]["monimp"]=$cpimpcom->getMonimp();
        }
        else
        {
         $datosGrid[$pos-1]["monimp"]=$datosGrid[$pos-1]["monimp"]+$cpimpcom->getMonimp();
        }    
    }
    
    //Grabar Compromiso Presupuestario         
        $moneda=$clasemodelo->getCodmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda) {
                $valor=$clasemodelo->getValmon();                
        }else
            $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    
    $p=0;
    while ($p<count($datosGrid))
    {
      $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$clasemodelo->getFeccom());
      if(($datosGrid[$p]["monimp"]*$valor) > $disponible){
        return 1338;
      }
      $p++;
    }
    return -1;
}    


    public static function SalvarAjustesEjecucion($clasemodelo,$grid)
    {
        if (Herramientas::getVerCorrelativo('coraju','cpdefniv',$r))
        {
             $tienecorrelativo=false;
             if ($clasemodelo->getRefaju()=='########')
             {
    	      	$tienecorrelativo=true;
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

	          $sql="select refaju from cpajuste where refaju='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	        $clasemodelo->setRefaju(str_pad($r, 8, '0', STR_PAD_LEFT));      
              }
              else
              {
                $clasemodelo->setRefaju(str_replace('#','0',$clasemodelo->getRefaju()));
              }
         }

     if ($tienecorrelativo==true)
     {
       Herramientas::getSalvarCorrelativo('coraju','cpdefniv','Referencia',$r,$msg);
     }
       $clasemodelo->setStaaju('A');
       $clasemodelo->setAnoaju(substr($clasemodelo->getFecaju(),0,4));   
       $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
       $clasemodelo->setLoguse($loguse);
       $clasemodelo->save();
       
        $refe=$clasemodelo->getRefaju();
        $refier=H::getX_vacio('TIPAJU','Cpdocaju','Refier',$clasemodelo->getTipaju());
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCodpre()!='' && $x[$j]->getMonaju()>0)
          {
            $x[$j]->setRefaju($refe);
            if ($refier=='P') {
              $x[$j]->setRefprc($clasemodelo->getRefere());
              if ($x[$j]->getRefcom()=="")
                $x[$j]->setRefcom('NULO');
              if ($x[$j]->getRefcau()=="")
                $x[$j]->setRefcau('NULO');
              $x[$j]->setRefpag('NULO');
            }else if ($refier=='C') {
              if ($x[$j]->getRefprc()=="")
                $x[$j]->setRefprc('NULO');
              $x[$j]->setRefcom($clasemodelo->getRefere());
              if ($x[$j]->getRefcau()=="")
                $x[$j]->setRefcau('NULO');
              $x[$j]->setRefpag('NULO');
            }else if ($refier=='A') {
              if ($x[$j]->getRefprc()=="")
                $x[$j]->setRefprc('NULO');
              if ($x[$j]->getRefcom()=="")
                $x[$j]->setRefcom('NULO');
              $x[$j]->setRefcau($clasemodelo->getRefere());
              $x[$j]->setRefpag('NULO');
            }else if ($refier=='G') {
              if ($x[$j]->getRefprc()=="")
                $x[$j]->setRefprc('NULO');
              if ($x[$j]->getRefcom()=="")
                $x[$j]->setRefcom('NULO');
              if ($x[$j]->getRefcau()=="")
                $x[$j]->setRefcau('NULO');
              $x[$j]->setRefpag($clasemodelo->getRefere());
            }          
            if ($clasemodelo->getAfeaju()=='S')
                $x[$j]->setMonaju($x[$j]->getMonaju()*-1);
             $x[$j]->setStamov('A');
            $x[$j]->save();
          }
          $j++;
        } 
    }
    
  public static function generarComprobanteAjuste($cpajuste,$grid,&$arrcompro,&$msjuno)
  {
    $numeroorden="";
    $r='';

    if ($cpajuste->getRefaju()=='########')
    {
      if (Herramientas::getVerCorrelativo('coraju','cpdefniv',$r))
      {
         $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(CpajustePeer::REFAJU,$numero);
          $resul= CpajustePeer::doSelectOne($c);
          if ($resul)
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $numorden=$numero;
      }
    }else{
      $numorden=str_replace('#','0',$cpajuste->getRefaju());
    }

    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob= $numorden;
    }else $numerocomprob= '########';
    $reftra=$numorden;

    $codigocuenta = "";
    $tipo  = "";
    $des   = "";
    $monto = "";

    $codigocuentas = "";
    $tipo1  = "";
    $desc   = "";
    $monto1 = "";

    $codigo= "";
    $tipo2  ="";
    $des2   ="";
    $monto2 ="";

    $cuentas= "";
    $tipos  = "";
    $montos ="";
    $descr  ="";

    $msjuno = "";
    $msjdos = "";    

    if ($cpajuste->getReftipaju()=='A'){
      $o= new Criteria();
      $o->add(OpordpagPeer::NUMORD,$cpajuste->getRefere());
      $rego= OpordpagPeer::doSelectOne($o);
      if ($rego){
        $a= new Criteria();
        $a->add(Contabc1Peer::NUMCOM,$rego->getNumcom());
        $a->addAscendingOrderByColumn(Contabc1Peer::DEBCRE);
        $resul2= Contabc1Peer::doSelect($a);
        if ($resul2)
        {
          $k=0;
          $j=0;
          $valor=count($resul2);
          while($j<$valor)
          { 
            $codigocuenta=$resul2[$j]->getCodcta();
            if ($cpajuste->getAfeaju()=='R') {
               if ($resul2[$j]->getDebcre()=='D') $tipo='C'; else $tipo='D';
            }else $tipo=$resul2[$j]->getDebcre();
            $des="";
            $monto=H::toFloat($cpajuste->getTotaju());

             if ($k==0)
             {
               $codigocuentas=$codigocuenta;
               $desc=$des;
               $tipo1=$tipo;
               $monto1=$monto;
             }
             else
             {
               $codigocuentas=$codigocuentas.'_'.$codigocuenta;
               $desc=$desc.'_'.$des;
               $tipo1=$tipo1.'_'.$tipo;
               $monto1=$monto1.'_'.$monto;
              }
            
            $k++;
            $j++;
          }
        }
        $cuentas=$codigocuentas;
        $descr=$desc;
        $tipos=$tipo1;
        $montos=$monto1;
      }else {
        $c = new Criteria();
        $x = $grid[0];
        $j = 0;
        $k=0;
          while ($j<count($x))
          {
            if ($x[$j]->getMonaju()>0) {
            $c= new Criteria();
            $c->add(CpdeftitPeer::CODPRE,$x[$j]->getCodpre());
            $regis = CpdeftitPeer::doSelectOne($c);
            if ($regis)
            {
              $cuenta = H::iif(!is_null($regis->getCodcta()),$regis->getCodcta(),'');

              $b= new Criteria();
              $b->add(ContabbPeer::CODCTA,$cuenta);
              $regis2 = ContabbPeer::doSelectOne($b);
              if ($regis2)
              {
                  $monaju=$x[$j]->getMonaju();
                  $codigocuenta=$regis2->getCodcta();
                  if ($cpajuste->getAfeaju()=='R') $tipo='C'; else $tipo='D';
                  $des="";
                  $monto=$monaju;
              }else { $msjuno='La Cuenta Contable asociada a El Código Presupuestario no existe'; return true;}
            }
             if ($k==0)
             {
               $codigocuentas=$codigocuenta;
               $desc=$des;
               $tipo1=$tipo;
               $monto1=$monto;
             }
             else
             {
               $codigocuentas=$codigocuentas.'_'.$codigocuenta;
               $desc=$desc.'_'.$des;
               $tipo1=$tipo1.'_'.$tipo;
               $monto1=$monto1.'_'.$monto;
              }
              $k++;
            }
            $j++;
          }

      $cuentas=$codigo.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;
      }
    }else if ($cpajuste->getReftipaju()=='G'){
      $o= new Criteria();
      $o->add(TsmovlibPeer::REFPAG,$cpajuste->getRefere());
      $rego= TsmovlibPeer::doSelectOne($o);
      if ($rego){
        $a= new Criteria();
        $a->add(Contabc1Peer::NUMCOM,$rego->getNumcom());
        $a->addAscendingOrderByColumn(Contabc1Peer::DEBCRE);
        $resul2= Contabc1Peer::doSelect($a);
        if ($resul2)
        {
          $k=0;
          $j=0;
          $valor=count($resul2);
          while($j<$valor)
          { 
            $codigocuenta=$resul2[$j]->getCodcta();
            if ($cpajuste->getAfeaju()=='R') {
               if ($resul2[$j]->getDebcre()=='D') $tipo='C'; else $tipo='D';
            }else $tipo=$resul2[$j]->getDebcre();
            $des="";
            $monto=H::toFloat($cpajuste->getTotaju());

             if ($k==0)
             {
               $codigocuentas=$codigocuenta;
               $desc=$des;
               $tipo1=$tipo;
               $monto1=$monto;
             }
             else
             {
               $codigocuentas=$codigocuentas.'_'.$codigocuenta;
               $desc=$desc.'_'.$des;
               $tipo1=$tipo1.'_'.$tipo;
               $monto1=$monto1.'_'.$monto;
              }
            
            $k++;
            $j++;
          }
        }
        $cuentas=$codigocuentas;
        $descr=$desc;
        $tipos=$tipo1;
        $montos=$monto1;
      }else {
        $c = new Criteria();
        $x = $grid[0];
        $j = 0;
        $k=0;
          while ($j<count($x))
          {
            if ($x[$j]->getMonaju()>0) {
            $c= new Criteria();
            $c->add(CpdeftitPeer::CODPRE,$x[$j]->getCodpre());
            $regis = CpdeftitPeer::doSelectOne($c);
            if ($regis)
            {
              $cuenta = H::iif(!is_null($regis->getCodcta()),$regis->getCodcta(),'');

              $b= new Criteria();
              $b->add(ContabbPeer::CODCTA,$cuenta);
              $regis2 = ContabbPeer::doSelectOne($b);
              if ($regis2)
              {
                  $monaju=$x[$j]->getMonaju();
                  $codigocuenta=$regis2->getCodcta();
                  if ($cpajuste->getAfeaju()=='R') $tipo='C'; else $tipo='D';
                  $des="";
                  $monto=$monaju;
              }else { $msjuno='La Cuenta Contable asociada a El Código Presupuestario no existe'; return true;}
            }
             if ($k==0)
             {
               $codigocuentas=$codigocuenta;
               $desc=$des;
               $tipo1=$tipo;
               $monto1=$monto;
             }
             else
             {
               $codigocuentas=$codigocuentas.'_'.$codigocuenta;
               $desc=$desc.'_'.$des;
               $tipo1=$tipo1.'_'.$tipo;
               $monto1=$monto1.'_'.$monto;
              }
              $k++;
            }
            $j++;
          }

      $cuentas=$codigo.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;
      }
    }else {
      $c = new Criteria();
      $x = $grid[0];
      $j = 0;
      $k=0;
        while ($j<count($x))
        {
          if ($x[$j]->getMonaju()>0) {
          $c= new Criteria();
          $c->add(CpdeftitPeer::CODPRE,$x[$j]->getCodpre());
          $regis = CpdeftitPeer::doSelectOne($c);
          if ($regis)
          {
            $cuenta = H::iif(!is_null($regis->getCodcta()),$regis->getCodcta(),'');

            $b= new Criteria();
            $b->add(ContabbPeer::CODCTA,$cuenta);
            $regis2 = ContabbPeer::doSelectOne($b);
            if ($regis2)
            {
                $monaju=$x[$j]->getMonaju();
                $codigocuenta=$regis2->getCodcta();
                if ($cpajuste->getAfeaju()=='R') $tipo='C'; else $tipo='D';
                $des="";
                $monto=$monaju;
            }else { $msjuno='La Cuenta Contable asociada a El Código Presupuestario no existe'; return true;}
          }
           if ($k==0)
           {
             $codigocuentas=$codigocuenta;
             $desc=$des;
             $tipo1=$tipo;
             $monto1=$monto;
           }
           else
           {
             $codigocuentas=$codigocuentas.'_'.$codigocuenta;
             $desc=$desc.'_'.$des;
             $tipo1=$tipo1.'_'.$tipo;
             $monto1=$monto1.'_'.$monto;
            }
            $k++;
          }
          $j++;
        }

      $cuentas=$codigo.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;
    }
    
      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom($numerocomprob);
      $clscommpro->setReftra($reftra);
      $clscommpro->setFectra(date("d/m/Y",strtotime($cpajuste->getFecaju())));
      $clscommpro->setDestra($cpajuste->getDesaju());
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;

  return true;
  }    
  
public static function anular_comprobante($cpajuste,$fecanu){

    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$cpajuste->getNumcom());
    $contabc=ContabcPeer::doSelectOne($c);
    if ($contabc){

    	$confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
         $numcom2="A".substr($cpajuste->getRefaju(),1,7);
        else $numcom2 = 'A'.substr(Comprobante::Buscar_Correlativo($fecanu),1,7);            
        
        
      $tcontabc= new Contabc();
      $tcontabc->setNumcom($numcom2);
      $tcontabc->setFeccom($fecanu);
      $tcontabc->setReftra($contabc->getReftra());
      $tcontabc->setDescom($contabc->getDescom());
      $tcontabc->setStacom('D');
      $tcontabc->setTipcom('');
      $tcontabc->setMoncom($contabc->getMoncom());
      $tcontabc->save();

      $c= new Criteria();
      $c->add(Contabc1Peer::NUMCOM,$cpajuste->getNumcom());
      $contabc1=Contabc1Peer::doSelect($c);

      foreach ($contabc1 as $per){
        $tcontabc1= new Contabc1();
        $tcontabc1->setNumcom($numcom2);
        $tcontabc1->setFeccom($fecanu);
        $tcontabc1->setCodcta($per->getCodcta());
        $tcontabc1->setNumasi($per->getNumasi());
        $tcontabc1->setRefasi($per->getRefasi());
        $tcontabc1->setDesasi($per->getDesasi());
        $tcontabc1->setMonasi($per->getMonasi());

        if ($per->getDebcre()=='D'){ $tcontabc1->setDebcre('C');}
        else{ $tcontabc1->setDebcre('D');}

        $tcontabc1->save();
      }

    }else{
      return 'El comprobante Nro. '.$cpajuste->getNumcom().' no fué anulado';
    }  

  return -1;

}///Fin buscar_comprobante  

public static function salvarCpdiseve($cpcompro,$grid2)
{
    $afedis=H::getX_vacio('TIPCOM','Cpdoccom','Afedis',$cpcompro->getTipcom());
    if ($afedis=='R') {
      $x=$grid2[0];
      $j=0;
      while ($j<count($x))
      {
         if ($x[$j]->getCodeve()!='' && $x[$j]->getMoneve()>0)
         {
           $x[$j]->setRefdoc($cpcompro->getRefcom());
           $x[$j]->setTipdoc($cpcompro->getTipcom());
           $x[$j]->setTipmov('COM');
           $x[$j]->save();
         } 
       $j++;
      }
        
      $z=$grid2[1];
      $l=0;
      if (!empty($z[$l]))
      {
        while ($l<count($z))
        {
          $z[$l]->delete();
          $l++;
        }
      }
  }
}

    public static function armarCadenaDetPre($grid,&$cadena)
    {
        $cadena = "";
        $i = 0;
        while ($i < count($grid)) {
          if ($grid[$i][0]!="") {
            if ($i==0)
                $cadena = $grid[$i][0]."*".$grid[$i][1];
            else
                $cadena = $cadena.'_'.$grid[$i][0]."*".$grid[$i][1];
          }
          $i++;
        }

        return true;
    }

    public static function BuscarCodDetPre($codpre,$detprecom,&$monimp)
    {
       $monimp=0;
       $aux=  explode('_', $detprecom);
       for($a=0;$a<count($aux);$a++)
      {
          $aux2=  explode('*', $aux[$a]);
          if ($aux2[0]==$codpre)
          {
            $monimp=$aux2[1];
            return true;
          }
      }

      return false;
    }

    public static function ValidarAcumulado($grid, $codpre, $fila, $col) {
    $i = 0;
    $acum=0;
    while ($i < count($grid)) {
      $codpre2 = $grid[$i][$col];
      if ($i != $fila) {
        if ($codpre == $codpre2) {
          $acum+=H::toFloat($grid[$i][4]);
        }
      }
      $i++;
    }

    return $acum;
  }
  
    public static function Repetido2($grid, $codact, $fila, $col) {
    $repetido = false;
    $i = 0;
    while ($i < count($grid)) {
      $codact2 = $grid[$i][$col]."*".$grid[$i][0];
      $codact3=$codact."*".$grid[$fila][0];
      if ($i != $fila) {
        if ($codact3 == $codact2) {
          $repetido = true;
          break;
        }
      }
      $i++;
    }

    return $repetido;
  }

  public static function ReversarPagado($clasemodelo,$grid)
  {    
    // Eliminar 
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      $y= new Criteria();  //Pagado
      $y->add(CpimppagPeer::REFPAG,$clasemodelo->getRefpag());
      $y->add(CpimppagPeer::CODPRE,$x[$j]->getCodpre());
      CpimppagPeer::doDelete($y);

      $q= new Criteria(); //Causado
      $q->add(CpimpcauPeer::REFCAU,$x[$j]->getRefere());
      $q->add(CpimpcauPeer::CODPRE,$x[$j]->getCodpre());
      CpimpcauPeer::doDelete($q);
      
      $f= new Criteria(); //Compromisos 
      $f->add(CpimpcomPeer::REFCOM,$x[$j]->getRefcom());
      $f->add(CpimpcomPeer::CODPRE,$x[$j]->getCodpre());
      CpimpcomPeer::doDelete($f);

      $e= new Criteria(); //Precompromisos
      $e->add(CpimpprcPeer::REFPRC,$x[$j]->getRefprc());
      $e->add(CpimpprcPeer::CODPRE,$x[$j]->getCodpre());
      CpimpprcPeer::doDelete($e);

     $j++;
    }

    //Insertar
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      $cpimpprc= new Cpimpprc(); //Precompromiso
      $cpimpprc->setRefprc($x[$j]->getRefprc());
      $cpimpprc->setCodpre($x[$j]->getCodpre2());
      $cpimpprc->setMonimp($x[$j]->getMonimp());
      $cpimpprc->setMoncom(0);
      $cpimpprc->setMoncau(0);
      $cpimpprc->setMonpag(0);
      $cpimpprc->setMonaju(0);
      $cpimpprc->setStaimp('A');
      $cpimpprc->save();

      $cpimpcom= new Cpimpcom(); //Compromiso
      $cpimpcom->setRefcom($x[$j]->getRefcom());
      $cpimpcom->setCodpre($x[$j]->getCodpre2());
      $cpimpcom->setMonimp($x[$j]->getMonimp());
      $cpimpcom->setMoncau(0);
      $cpimpcom->setMonpag(0);
      $cpimpcom->setMonaju(0);
      $cpimpcom->setRefere($x[$j]->getRefprc());
      $cpimpcom->setStaimp('A');
      $cpimpcom->save();

      $cpimpcau= new Cpimpcau(); //Causado
      $cpimpcau->setRefcau($x[$j]->getRefere());
      $cpimpcau->setCodpre($x[$j]->getCodpre2());
      $cpimpcau->setMonimp($x[$j]->getMonimp());
      $cpimpcau->setMonpag(0);
      $cpimpcau->setMonaju(0);
      $cpimpcau->setRefere($x[$j]->getRefcom());
      $cpimpcau->setRefprc($x[$j]->getRefprc());
      $cpimpcau->setStaimp('A');
      $cpimpcau->save();

      $cpimppag2= new Cpimppag(); //Pagado
      $cpimppag2->setRefpag($clasemodelo->getRefpag());
      $cpimppag2->setCodpre($x[$j]->getCodpre2());
      $cpimppag2->setMonimp($x[$j]->getMonimp());
      $cpimppag2->setMonaju(0);
      $cpimppag2->setRefere($x[$j]->getRefere());
      $cpimppag2->setRefcom($x[$j]->getRefcom());
      $cpimppag2->setRefprc($x[$j]->getRefprc());
      $cpimppag2->setStaimp('A');
      $cpimppag2->save();

     $j++;
    }
  }

  public static function salvarAnuPrecomext($refcomext,$refcom,$fecanu,$desanu) {
    if (self::validarFechaPresupuesto($fecanu)==-1) {
      $c = new Criteria();
      $c->add(CpcomextPeer::REFCOMEXT,$refcomext);
      $cpcomext = CpcomextPeer::doSelectOne($c);
      if ($cpcomext){
        $cpcomext->setFecanu($fecanu);
        $cpcomext->setDesanu($desanu);
        $cpcomext->setStacom('N');
        $cpcomext->save();
      }

      $c = new Criteria();
      $c->add(CpcomproPeer::REFCOM,$refcom);
      $cpcompro = CpcomproPeer::doSelectOne($c);
      if ($cpcompro){
        $cpcompro->setFecanu($fecanu);
        $cpcompro->setDesanu($desanu);
        $cpcompro->setStacom('N');
        $cpcompro->save();
      }

      $c1 = new Criteria();
      $c1->add(CpimpcomPeer::REFCOM,$refcom);
      $cpimpcoms = CpimpcomPeer::doSelect($c1);
      if ($cpimpcoms) {
        foreach ($cpimpcoms as $cpimpcom) {
          $cpimpcom->setStaimp('N');
          $cpimpcom->save();
        }
      }      
      return -1;
    }
  } 

  public static function verificarAnuPrecomext($refcomext){
    $c = new Criteria();
    $c->add(CpcomextPeer::REFCOMEXT,$refcomext);
    $reg = CpcomextPeer::doSelectOne($c);

    $msj='';

    if ($reg){
      if ($reg->getStacom()=='N') {
        $msj = 'El Compromiso en Moneda Extranjera ya esta Anulado.';
      }
      $c = new Criteria();
      $c->add(CpimpcomPeer::REFCOM,$reg->getRefcom());
      $cpimpcoms = CpimpcomPeer::doSelect($c);
      if($cpimpcoms){
        foreach ($cpimpcoms as $cpimpcom){
          if ($cpimpcom->getMonaju()>0) {
            $msj = 'El Compromiso No Puede ser Anulado, Tiene un Ajuste.';
          }
        }
      }
    }   
    
    return $msj;
  }

  public static function cargarDocumentosDis($anoprc, $ref,$tipmov,&$arreglodet)
  {
    $result=array();
   if ($tipmov=="PRECOMPROMISO"){  //PRECOMPROMISOS
      $sql="select a.codpre as codpre, a.monimp as monto, b.origen as origen, b.correl as correl, b.codpre as codpre2, b.monasi as monasi, b.fuefin as fuefin from cpimpprc a left outer join cpdisfuefin b on a.codpre=b.codpre 
           and to_char(b.fecdis,'YYYY')='" . $anoprc . "' where a.refprc='".$ref."'  order by a.codpre, case when b.origen='INICIAL' then 0 else 1 end, b.origen"; // b.origen like '%INI'";

   }else if ($tipmov=="COMPROMISO"){    //COMPROMISOS
      $sql="select a.codpre as codpre, a.monimp as monto, b.origen as origen, b.correl as correl, b.codpre as codpre2, b.monasi as monasi, b.fuefin as fuefin from cpimpcom a left outer join cpdisfuefin b on a.codpre=b.codpre 
           and to_char(b.fecdis,'YYYY')='" . $anoprc . "' where a.refcom='".$ref."'  order by a.codpre, case when b.origen='INICIAL' then 0 else 1 end, b.origen";//, b.origen like '%INI'";
  
   }else if ($tipmov=="CAUSADO"){ //CAUSADOS
      $sql="select a.codpre as codpre, a.monimp as monto, b.origen as origen, b.correl as correl, b.codpre as codpre2, b.monasi as monasi, b.fuefin as fuefin from cpimpcau a left outer join cpdisfuefin b on a.codpre=b.codpre 
           and to_char(b.fecdis,'YYYY')='" . $anoprc . "' where a.refcau='".$ref."'  order by a.codpre, case when b.origen='INICIAL' then 0 else 1 end, b.origen";//, b.origen like '%INI'";

   }else if ($tipmov=="PAGADO"){ //PAGADOS
      $sql="select a.codpre as codpre, a.monimp as monto, b.origen as origen, b.correl as correl, b.codpre as codpre2, b.monasi as monasi, b.fuefin as fuefin from cpimppag a left outer join cpdisfuefin b on a.codpre=b.codpre 
           and to_char(b.fecdis,'YYYY')='" . $anoprc . "' where a.refpag='".$ref."'  order by a.codpre, case when b.origen='INICIAL' then 0 else 1 end, b.origen";//, b.origen like '%INI'";
 
   }else if ($tipmov=="CREDITO"){   //ADICION/DISMINUCION
      $adidis=H::getX_vacio('refadi','cpadidis','adidis',$ref);
      if ($adidis=='A')  //Adición
        $sql="select a.codpre as codpre, a.monmov as monto, '' as origen, '' as correl,'' as codpre2, 0 as monasi, '' as fuefin from cpmovadi a 
              where a.refadi='".$ref."'  order by a.codpre, origen";
      else  //Disminución
        $sql="select a.codpre as codpre, a.monmov as monto, b.origen as origen, b.correl as correl, b.codpre as codpre2, b.monasi as monasi, b.fuefin as fuefin from cpmovadi a left outer join cpdisfuefin b on a.codpre=b.codpre 
              and to_char(b.fecdis,'YYYY')='" . $anoprc . "' where a.refadi='".$ref."'  order by a.codpre, case when b.origen='INICIAL' then 0 else 1 end, b.origen";//, b.origen like '%INI'";
         
   }else if ($tipmov=="TRASLADO"){   //SOLICITUD DE TRASLADO
      //$sql="select a.codori as codpre, a.monmov as monto, b.origen as origen, b.correl as correl, b.codpre as codpre2, b.monasi as monasi, b.fuefin as fuefin from cpsolmovtra a left outer join cpdisfuefin b on a.codori=b.codpre 
        //   and to_char(b.fecdis,'YYYY')='" . $anoprc . "' where a.reftra='".$ref."'  order by a.codori, b.origen like '%INI'";
        $sql="select a.codori as codpre, sum(a.monmov) as monto, b.origen as origen, 
              b.correl as correl, b.codpre as codpre2, a.coddes as codpre3, 
              (select monasi from cpdisfuefin where a.codori = codpre and to_char(fecdis,'YYYY')='" . $anoprc . "' and b.fuefin=fuefin and origen=b.origen and fecdis=b.fecdis and correl=b.correl) as monasi,
              b.fuefin as fuefin from cpsolmovtra a left outer join cpdisfuefin b on a.codori=b.codpre 
              and to_char(b.fecdis,'YYYY')='" . $anoprc . "' where a.reftra='".$ref."' 
              group by a.codori , a.coddes, b.origen , b.correl , b.codpre , b.fuefin, b.fecdis order by a.codori, case when b.origen='INICIAL' then 0 else 1 end, b.origen";//, b.origen like '%INI' ";
   }else {
    $sql="";
   }
   if ($sql!="") {
  $arreglodet=array();
   if (Herramientas::BuscarDatos($sql,$result)){
       $i=0;
       while ($i<count($result))
       {
         if ($result[$i]["origen"]=="INICIAL")
         {
             if ($tipmov=="TRASLADO") $pos=self::posicion_en_el_grid4($arreglodet,$result[$i]["codpre"],$result[$i]["fuefin"],$result[$i]["codpre3"]);
             else $pos=self::posicion_en_el_grid3($arreglodet,$result[$i]["codpre"],$result[$i]["fuefin"]);

            if ($pos==0)
            {
             $j=count($arreglodet)+1;
             $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
             $arreglodet[$j-1]["origen"]=$result[$i]["origen"];             
             $arreglodet[$j-1]["fuefin"]=$result[$i]["fuefin"];
             $arreglodet[$j-1]["monasi"]=number_format($result[$i]["monasi"],2,',','.');
             $anocierre = substr(H::getX('codemp','cpdefniv','feccie','001'),0,4);
             $output=array();
             $moneje=0;
             $sql2 = "select coalesce(sum(monmov),0) as moncom from cpmovfuefin where correl='".$result[$i]["correl"]."' and codpre='".$result[$i]["codpre2"]."' and to_char(fecmov,'YYYY')='".$anocierre."' and stamov<>'N' and tipmov<>'TRASLADO'";
             if (Herramientas::BuscarDatos($sql2,$output))
             {
                if ($output[0]['moncom']!=0) {
                    $arreglodet[$j-1]["moneje"]=H::FormatoMonto($output[0]['moncom']);
                    $moneje=$output[0]['moncom'];
                }else $arreglodet[$j-1]["moneje"]="0,00";
             }   
             $arreglodet[$j-1]["mondis"]=H::FormatoMonto($result[$i]["monasi"]-$moneje);
             $arreglodet[$j-1]["nuevo"]='N';
             $arreglodet[$j-1]["monto"]=H::FormatoMonto($result[$i]["monto"]);           
             $arreglodet[$j-1]["montoimp"]=H::FormatoMonto($result[$i]["monto"]);
             $arreglodet[$j-1]["tipmov"]=$tipmov;
             $arreglodet[$j-1]["refmov"]=$ref;
             $arreglodet[$j-1]["mondif"]="0,00";
             $arreglodet[$j-1]["correl"]=$result[$i]["correl"];
             $arreglodet[$j-1]["correldis"]=','.$result[$i]["correl"];
             $arreglodet[$j-1]["id"]="9";
             if ($tipmov=="TRASLADO") $arreglodet[$j-1]["codpre3"]=$result[$i]["codpre3"];
             else  $arreglodet[$j-1]["codpre3"]="";
            }
            
         }else if ($result[$i]["origen"]=="") {
            $q= new Criteria();
            $rq=  FortipfinPeer::doSelectOne($q);
            $pos=self::posicion_en_el_grid($arreglodet,$result[$i]["codpre"]);
            if ($pos==0)
            {
             $j=count($arreglodet)+1;
             $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
             $arreglodet[$j-1]["origen"]='INICIAL';             
             $arreglodet[$j-1]["fuefin"]=$rq->getCodfin();
             $arreglodet[$j-1]["monasi"]="0,00";
             $arreglodet[$j-1]["moneje"]="0,00";             
             $arreglodet[$j-1]["mondis"]="0,00";
             $arreglodet[$j-1]["nuevo"]='S';
             $arreglodet[$j-1]["monto"]=H::FormatoMonto($result[$i]["monto"]);           
             $arreglodet[$j-1]["montoimp"]=H::FormatoMonto($result[$i]["monto"]);
             $arreglodet[$j-1]["tipmov"]=$tipmov;
             $arreglodet[$j-1]["refmov"]=$ref;
             $arreglodet[$j-1]["mondif"]="0,00";
             $arreglodet[$j-1]["correl"]=$result[$i]["correl"];
             $arreglodet[$j-1]["correldis"]=','.$result[$i]["correl"];
             $arreglodet[$j-1]["id"]="9";
             if ($tipmov=="TRASLADO") $arreglodet[$j-1]["codpre3"]=$result[$i]["codpre3"];
             else  $arreglodet[$j-1]["codpre3"]="";
            }           

         }else {
          if ($tipmov=="TRASLADO") $pos=self::posicion_en_el_grid4($arreglodet,$result[$i]["codpre"],$result[$i]["fuefin"],$result[$i]["codpre3"]);
          else $pos=self::posicion_en_el_grid3($arreglodet,$result[$i]["codpre"],$result[$i]["fuefin"]);
          if ($pos!=0)            
          {
            $valor=H::toFloat($arreglodet[$pos-1]["mondif"]);
            $arreglodet[$pos-1]["mondif"]=number_format(($valor+$result[$i]["monasi"]),2,',','.');   

             $anocierre = substr(H::getX('codemp','cpdefniv','feccie','001'),0,4);
             $output=array();
             $moneje=0;
             $sql2 = "select coalesce(sum(monmov),0) as moncom from cpmovfuefin where correl='".$result[$i]["correl"]."' and codpre='".$result[$i]["codpre2"]."' and to_char(fecmov,'YYYY')='".$anocierre."' and stamov<>'N' and tipmov<>'TRASLADO'";
             if (Herramientas::BuscarDatos($sql2,$output))
             {
                if ($output[0]['moncom']!=0) {
                    $arreglodet[$pos-1]["moneje"]=H::FormatoMonto(H::toFloat($arreglodet[$pos-1]["moneje"]) + $output[0]['moncom']);
                    $moneje=$output[0]['moncom'];
                }else $arreglodet[$pos-1]["moneje"]=$arreglodet[$pos-1]["moneje"];
             }   
             $arreglodet[$pos-1]["mondis"]=H::FormatoMonto(H::toFloat($arreglodet[$pos-1]["monasi"])+H::toFloat($arreglodet[$pos-1]["mondif"])-H::toFloat($arreglodet[$pos-1]["moneje"]));      
             $arreglodet[$pos-1]["correldis"]=$arreglodet[$pos-1]["correldis"].','.$result[$i]["correl"];
          }else {
            $j=count($arreglodet)+1;
             $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
             $arreglodet[$j-1]["origen"]=$result[$i]["origen"];             
             $arreglodet[$j-1]["fuefin"]=$result[$i]["fuefin"];
             $arreglodet[$j-1]["monasi"]="0,00";
             $anocierre = substr(H::getX('codemp','cpdefniv','feccie','001'),0,4);
             $output=array();
             $moneje=0;
             $sql2 = "select coalesce(sum(monmov),0) as moncom from cpmovfuefin where correl='".$result[$i]["correl"]."' and codpre='".$result[$i]["codpre2"]."' and to_char(fecmov,'YYYY')='".$anocierre."' and stamov<>'N' and tipmov<>'TRASLADO'";
             if (Herramientas::BuscarDatos($sql2,$output))
             {
                if ($output[0]['moncom']!=0) {
                    $arreglodet[$j-1]["moneje"]=H::FormatoMonto($output[0]['moncom']);
                    $moneje=$output[0]['moncom'];
                }else $arreglodet[$j-1]["moneje"]="0,00";
             }
             $arreglodet[$j-1]["mondif"]=H::FormatoMonto($result[$i]["monasi"]);    
             $arreglodet[$j-1]["mondis"]=H::FormatoMonto(H::toFloat($arreglodet[$j-1]["monasi"])+H::toFloat($arreglodet[$j-1]["mondif"])-$moneje);
             $arreglodet[$j-1]["nuevo"]='S';
             $arreglodet[$j-1]["monto"]=H::FormatoMonto($result[$i]["monto"]);           
             $arreglodet[$j-1]["montoimp"]=H::FormatoMonto($result[$i]["monto"]);
             $arreglodet[$j-1]["tipmov"]=$tipmov;
             $arreglodet[$j-1]["refmov"]=$ref;             
             $arreglodet[$j-1]["correl"]=$result[$i]["correl"];
             $arreglodet[$j-1]["correldis"]=','.$result[$i]["correl"];
             $arreglodet[$j-1]["id"]="9";
             if ($tipmov=="TRASLADO") $arreglodet[$j-1]["codpre3"]=$result[$i]["codpre3"];
             else  $arreglodet[$j-1]["codpre3"]="";
          }
         }           
        $i++;
       }
    }
  }
  }

  public static function posicion_en_el_grid3($arreglo,$codigo,$fuente)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {     
      if ($arreglo[$ind]["codpre"]==$codigo  && $arreglo[$ind]["fuefin"]==$fuente)
       $enc=true;
      
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }
  
    public static function grabaGridEventos($clasemodelo,$grid2){
    try{
      $cpdiseve = $grid2[0];
      foreach ($cpdiseve as $reg){
        if ($reg->getCodpre()!="" and $reg->getCodeve()!="" and $reg->getMoneve()>0) {
        $reg->setRefdoc($clasemodelo->getRefprc());
        $reg->setTipdoc($clasemodelo->getTipprc());
        $reg->setTipmov('PRC');
        $reg->save();
      }
      }
      $cpdiseveb = $grid2[1];
      foreach ($cpdiseveb as $reg){
        $reg->delete();
      }
      return -1;
    }catch (Exception $ex){
          echo $ex;
          return 0;
      }
  }

  public static function grabaGridEventosCau($clasemodelo,$grid2){
    try{
      $afedis=H::getX_vacio('TIPCAU','Cpdoccau','Afedis',$clasemodelo->getTipcau());
      if ($afedis=='R') {
        $cpdiseve = $grid2[0];
        foreach ($cpdiseve as $reg){
          if ($reg->getCodpre()!="" and $reg->getCodeve()!="" and $reg->getMoneve()>0) {
          $reg->setRefdoc($clasemodelo->getRefcau());
          $reg->setTipdoc($clasemodelo->getTipcau());
          $reg->setTipmov('CAU');
          $reg->save();
        }
        }
        $cpdiseveb = $grid2[1];
        foreach ($cpdiseveb as $reg){
          $reg->delete();
        }
    }
      return -1;
    }catch (Exception $ex){
          echo $ex;
          return 0;
      }
  }

  public static function grabaGridEventosPag($clasemodelo,$grid2){
    try{
      $afedis=H::getX_vacio('TIPPAG','Cpdocpag','Afedis',$clasemodelo->getTippag());
      if ($afedis=='R') {
        $cpdiseve = $grid2[0];
        foreach ($cpdiseve as $reg){
          if ($reg->getCodpre()!="" and $reg->getCodeve()!="" and $reg->getMoneve()>0) {
          $reg->setRefdoc($clasemodelo->getRefpag());
          $reg->setTipdoc($clasemodelo->getTippag());
          $reg->setTipmov('PAG');
          $reg->save();
        }
        }
        $cpdiseveb = $grid2[1];
        foreach ($cpdiseveb as $reg){
          $reg->delete();
        }
    }
      return -1;
    }catch (Exception $ex){
          echo $ex;
          return 0;
      }
  }  

  public static function grabaGridEventosTras($clasemodelo,$grid2){
    try{
      $cpdiseve = $grid2[0];
      foreach ($cpdiseve as $reg){
        if ($reg->getCodpre()!="" and $reg->getCodeve()!="" and $reg->getMoneve()>0) {
        $reg->setRefdoc($clasemodelo->getReftra());
        $reg->setTipdoc('TRAS');
        $reg->setTipmov('TRA');
        $reg->save();
      }
      }
      $cpdiseveb = $grid2[1];
      foreach ($cpdiseveb as $reg){
        $reg->delete();
      }
      return -1;
    }catch (Exception $ex){
          echo $ex;
          return 0;
      }
  }  

    public static function grabaGridEventosAdiDis($clasemodelo,$grid2){
    try{
      $cpdiseve = $grid2[0];
      foreach ($cpdiseve as $reg){
        if ($reg->getCodpre()!="" and $reg->getCodeve()!="" and $reg->getMoneve()>0) {
        $reg->setRefdoc($clasemodelo->getRefadi());
        if ($clasemodelo->getAdidis()=='D') {
          $reg->setTipdoc('DISM');
          $reg->setTipmov('DIS');
        }else {
          $reg->setTipdoc('ADIC');
          $reg->setTipmov('ADI');
        }
        $reg->save();
      }
      }
      $cpdiseveb = $grid2[1];
      foreach ($cpdiseveb as $reg){
        $reg->delete();
      }
      return -1;
    }catch (Exception $ex){
          echo $ex;
          return 0;
      }
  }   

  public static function posicion_en_el_grid4($arreglo,$codigo,$fuente,$codides)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {     
      if ($arreglo[$ind]["codpre"]==$codigo  && $arreglo[$ind]["fuefin"]==$fuente && $arreglo[$ind]["codpre3"]==$codides)
       $enc=true;
      
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }  

  public static function generarComprobanteCausado($cpcausad,$grid,&$arrcompro,&$msjuno)
  {
    $numeroorden="";
    if (Herramientas::getVerCorrelativo('corcau','cpdefniv',$r))
    {
      if ($cpcausad->getRefcau()=='########')
      {
          $encontrado=false;
          while (!$encontrado)
          {
            $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

            $sql="select refcau from cpcausad where refcau='".$numero."'";
            if (Herramientas::BuscarDatos($sql,$result))
            {
              $r=$r+1;
            }
            else
            {
              $encontrado=true;
            }
          }
          $numeroorden=str_pad($r, 8, '0', STR_PAD_LEFT);          
      }else $numeroorden=str_replace('#','0',$cpcausad->getRefcau());
    }
    $numeroorden2=$numeroorden;
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob= $numeroorden2;
    }else $numerocomprob= '########';
    

    $reftra = $numeroorden2;
    $codigocuenta="";
    $tipo="";
    $des="";
    $monto="";
    $codigocuentas="";
    $tipo1="";
    $desc="";
    $monto1="";
    $codigocuenta2="";
    $tipo2="";
    $des2="";
    $monto2="";
    $cuentas="";
    $tipos="";
    $montos="";
    $descr="";
    $msjuno="";
    $ctabenant=H::getConfApp2('ctabenant', 'presupuesto', 'precausar');
    $tipcauant=H::getX_vacio('CODEMP','Cpdefniv','Tipcau','001');

    $c= new Criteria();
    $c->add(OpbenefiPeer::CEDRIF,$cpcausad->getCedrif());
    $regis = OpbenefiPeer::doSelectOne($c);
    if ($regis)
    {
      if ($ctabenant=='S'){
        if ($tipcauant!='' && $tipcauant==$cpcausad->getTipcau()){
            if($regis->getCodctaant()!='')
           {
              $cuenta=$regis->getCodctaant();
           }else {$cuenta='';}
        }else {
           if($regis->getCodcta()!='')
           {
              $cuenta=$regis->getCodcta();
           }else {$cuenta='';}
        }
      }else {
        if($regis->getCodcta()!='')
        {
          $cuenta=$regis->getCodcta();
        }else {$cuenta='';}
      }

      $b= new Criteria();
      $b->add(ContabbPeer::CODCTA,$cuenta);
      $regis2 = ContabbPeer::doSelectOne($b);
      if ($regis2)
      {
        $codigocuenta2=$regis2->getCodcta();
        $tipo2='C';
        $des2=$regis2->getDescta();
        $monto2=$cpcausad->getMoncau();        
      }else { 
        $msjuno='El Beneficiario no tiene asociado una Cuenta Contable'; 
        return true;
      }
    }else { 
      $msjuno='El Beneficiario no se encuentra registrado'; 
      return true;
    }

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      $c= new Criteria();
      $c->add(CpdeftitPeer::CODPRE,$x[$j]->getCodpre());
      $regis = CpdeftitPeer::doSelectOne($c);
      if ($regis)
      {
        if($regis->getCodcta()!='')
        {
          $cuenta=$regis->getCodcta();
        }else {$cuenta='';}

        $b= new Criteria();
        $b->add(ContabbPeer::CODCTA,$cuenta);
        $regis2 = ContabbPeer::doSelectOne($b);
        if ($regis2)
        {
          $monimp=H::tofloat($x[$j]->getMonimp());
          if ($monimp>0)
          {
            $codigocuenta=$regis2->getCodcta();
            $tipo='D';
            $des=$regis2->getDescta();
            $monto=$x[$j]->getMonimp();
          }
        }else { 
          $msjuno='El Código Presupuestario no tiene asociado Cuenta Contable'; 
          return true;
        }
      }else { 
          $msjuno='El Código Presupuestario no esta registrado'; 
          return true;
      }
      if ($monimp>0)
      {
       if ($j==0)
       {
         $codigocuentas=$codigocuenta;
         $desc=$des;
         $tipo1=$tipo;
         $monto1=$monto;
       }
       else
       {
        $codigocuentas=$codigocuentas.'_'.$codigocuenta;
        $desc=$desc.'_'.$des;
        $tipo1=$tipo1.'_'.$tipo;
        $monto1=$monto1.'_'.$monto;
        }
      }     

      $j++;
    }     

    $cuentas=$codigocuenta2.'_'.$codigocuentas;
    $descr=$des2.'_'.$desc;
    $tipos=$tipo2.'_'.$tipo1;
    $montos=$monto2.'_'.$monto1;       

    $clscommpro=new Comprobante();
    $clscommpro->setGrabar("N");
    $clscommpro->setNumcom($numerocomprob);
    $clscommpro->setReftra($reftra);
    $clscommpro->setFectra(date("d/m/Y",strtotime($cpcausad->getFeccau())));
    $clscommpro->setDestra($cpcausad->getDescau()." - ".$cpcausad->getNomben());
    $clscommpro->setCtas($cuentas);
    $clscommpro->setDesc($descr);
    $clscommpro->setMov($tipos);
    $clscommpro->setMontos($montos);
    $arrcompro[]=$clscommpro;

  return true;
  }

public static function anular_comprobante_causado($cpcausad,$fecanu){

    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$cpcausad->getNumcom());
    $contabc=ContabcPeer::doSelectOne($c);
    if ($contabc){
      $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
      if ($confcorcom=='N')
        $numcom2="C".substr($cpajuste->getRefcau(),1,7);
      else $numcom2 = 'C'.substr(Comprobante::Buscar_Correlativo($fecanu),1,7);            
      
      $tcontabc= new Contabc();
      $tcontabc->setNumcom($numcom2);
      $tcontabc->setFeccom($fecanu);
      $tcontabc->setReftra($contabc->getReftra());
      $tcontabc->setDescom($contabc->getDescom());
      $tcontabc->setStacom('D');
      $tcontabc->setTipcom('');
      $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
      $tcontabc->setLoguse($loguse);
      $tcontabc->setMoncom($contabc->getMoncom());
      $tcontabc->save();

      $c= new Criteria();
      $c->add(Contabc1Peer::NUMCOM,$cpcausad->getNumcom());
      $contabc1=Contabc1Peer::doSelect($c);
      if ($contabc1) {
        foreach ($contabc1 as $per){
          $tcontabc1= new Contabc1();
          $tcontabc1->setNumcom($numcom2);
          $tcontabc1->setFeccom($fecanu);
          $tcontabc1->setCodcta($per->getCodcta());
          $tcontabc1->setNumasi($per->getNumasi());
          $tcontabc1->setRefasi($per->getRefasi());
          $tcontabc1->setDesasi($per->getDesasi());
          $tcontabc1->setMonasi($per->getMonasi());
          if ($per->getDebcre()=='D'){ $tcontabc1->setDebcre('C');}
          else{ $tcontabc1->setDebcre('D');}
          $tcontabc1->save();
        }
      }
    }else{
      return 'El comprobante Nro. '.$cpcausad->getNumcom().' no fué anulado';
    }  
  return -1;

}///Fin buscar_comprobante_causado

    public static function grabaGridPtocta($clasemodelo, $grid) {
        try {
            $cpdetptocta = $grid[0];
            foreach ($cpdetptocta as $reg) {
                if ($reg->getMoncod() > 0) {
                    $reg->setNumpta($clasemodelo->getNumpta());
                    $reg->save();
                }
            }
            $cpdetptoctab = $grid[1];
            foreach ($cpdetptoctab as $reg) {
                $reg->delete();
            }
            return -1;
        } catch (Exception $ex) {
            echo $ex;
            return 0;
        }
    }

public static function AnularAjustePresupuesto($refaju, $fecanu,$desanu){
    $c = new Criteria();
    $c->add(CpajustePeer::REFAJU,$refaju);
    $reajuste = CpajustePeer::doSelectOne($c);
     if ($reajuste) {
      $msg=Presupuesto::anular_comprobante($reajuste,$fecanu);  

      $msg=="";
      $reajuste->setDesanu($desanu);
      $reajuste->setFecanu($fecanu);
      $reajuste->setStaaju('N');
      $reajuste->save();
  
      //Anular el detalle
      $c = new Criteria();
      $c->add(CpmovajuPeer::REFAJU,$refaju);
      $detalle= CpmovajuPeer::doSelect($c);
      if ($detalle) {
        foreach ($detalle as $impaju){
          $impaju->setStamov('N');
          $impaju->save();
        }
     }
      
   } 
}

  public static function validarPreSolAdiDis($clasemodelo,$grid,$fecmov) {           
    
        $datosGridsingrupo=$grid[0];

    foreach($datosGridsingrupo as $codpre){
      $actual = $codpre->getCodpre();
      $encontrado = false;

        $c = new Criteria();
        $c->add(CpasiiniPeer::CODPRE,$actual);
        $cpasiini = CpasiiniPeer::doSelectOne($c);
        if(!$cpasiini) {
                return 1340;
                }
      
      foreach ($datosGridsingrupo as $fila){
        if ($fila->getCodpre()==$actual){
          if ($encontrado) return 1337;
          $encontrado=true;
        }
      }
    }

    $datosGrid = array();
    foreach($datosGridsingrupo as $cpimpcom){
        $codpre=H::getCodPreDis($cpimpcom->getCodpre());
        $pos=self::posicion_en_el_grid2($datosGrid, $codpre);
        if ($pos==0)
        {
         $i=count($datosGrid)+1;
         $datosGrid[$i-1]["codpre"]=$codpre;
         $datosGrid[$i-1]["monimp"]=$cpimpcom->getMonmov();
        }
        else
        {
         $datosGrid[$pos-1]["monimp"]=$datosGrid[$pos-1]["monimp"]+$cpimpcom->getMonmov();
        }    
    }
    
    $p=0;
    while ($p<count($datosGrid))
    {
      $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$fecmov);
      if($datosGrid[$p]["monimp"] > $disponible){
        return 1338;
      }
      $p++;
    }
    return -1;
}

  public static function generarCodigosPresupuestarios($clasemodelo,$grid){
      $cpdefparpre = $grid[0];
      $codpre="";
      foreach ($cpdefparpre as $obj){
        if ($obj->getCheck()=="1") {
          $aux=explode('-', $obj->getCodparpre());
          for ($i=0; $i < count($aux) ; $i++) { 
            if ($i==0)
              $codpre=$aux[$i];
            else
              $codpre=$codpre.'-'.$aux[$i];

            $codigo=$clasemodelo->getCodcat().'-'.$codpre;
            $p= new Criteria();
            $p->add(CpdeftitPeer::CODPRE,$codigo);
            $resul= CpdeftitPeer::doSelectOne($p);
            if (!$resul) {
              $cpdeftit= new Cpdeftit();
              $cpdeftit->setCodpre($codigo);
              $cpdeftit->setNompre(H::getX_vacio('CODPARPRE','Cpdefparpre','Nomparpre',$codpre));
              $cpdeftit->save();
            }
          }
        }
      }
      return -1;
  }

    public static function CargarDatosGridConciliacion($codpre,$codcta,$tipo){
      $reg=array();
      if ($tipo=='1') 
        $sql="select c.refcau as refcau, c.feccau as feccau, d.monimp as moncau, e.numcom as numcom, e.feccom as feccom, f.monasi as moncom from opordpag a, cpcausad c, cpimpcau d, contabc e, contabc1 f
        where a.numord=c.refcau and a.numcom=e.numcom
        and c.refcau=d.refcau and e.numcom=f.numcom
        and d.monimp=f.monasi  and d.codpre='".$codpre."' and f.codcta='".$codcta."'
        and a.status<>'A' and (a.numcom<>'' or a.numcom is not null)";
      else if ($tipo=='2') 
        $sql="select c.refcau as refcau, c.feccau as feccau, d.monimp as moncau, e.numcom as numcom, e.feccom as feccom, f.monasi as moncom from opordpag a, cpcausad c, cpimpcau d, contabc e, contabc1 f
        where a.numord=c.refcau and a.numcom=e.numcom
        and c.refcau=d.refcau and e.numcom=f.numcom
        and d.monimp<>f.monasi  and d.codpre='".$codpre."' and f.codcta='".$codcta."'
        and a.status<>'A' and (a.numcom<>'' or a.numcom is not null)";
      else if ($tipo=='3') 
        $sql="select c.refcau as refcau, c.feccau as feccau, d.monimp as moncau, 
        '' as numcom, '' as feccom, '0,00' as moncom from opordpag a, cpcausad c, cpimpcau d
        where a.numord=c.refcau
        and c.refcau=d.refcau
        and d.codpre='".$codpre."'
        and a.status<>'A' and a.numcom not in (select distinct numcom from contabc1 where codcta='".$codcta."')";
      else
        $sql="select '' as refcau, '' as feccau, '0,00' as moncau, e.numcom as numcom, e.feccom as feccom, f.monasi as moncom from opordpag a, contabc e, contabc1 f
        where a.numcom=e.numcom and e.numcom=f.numcom
        and f.codcta='".$codcta."'
        and a.status<>'A' and (a.numcom<>'' or a.numcom is not null) 
        and a.numord not in (select distinct refcau from cpimpcau where codpre='".$codpre."')";
      if (Herramientas::BuscarDatos($sql,$result)){
       $i=0;
       while ($i<count($result))
       {
          $cpcausad= new Cpcausad();
          $cpcausad->setRefcau($result[$i]["refcau"]);
          if ($result[$i]["feccau"]!='')
            $cpcausad->setFeccau2(date('d/m/Y',strtotime($result[$i]["feccau"])));
          $cpcausad->setMoncau($result[$i]["moncau"]);
          $cpcausad->setNumcom($result[$i]["numcom"]);
          if ($result[$i]["feccom"]!='')
            $cpcausad->setFeccom(date('d/m/Y',strtotime($result[$i]["feccom"])));
          $cpcausad->setMoncom(H::FormatoMonto($result[$i]["moncom"]));
          $reg[]= $cpcausad;      
          $i++;
        }
      }
      return $reg;
  }
}
?>
