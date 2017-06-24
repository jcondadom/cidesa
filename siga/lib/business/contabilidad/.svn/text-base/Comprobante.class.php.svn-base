<?php

/**
 * Comprobantes: Clase estática para el manejo de los comprobantes contables
 *
 * @package    Roraima
 * @subpackage contabilidad
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Comprobante
{
  private $grabar = '';
  private $reftra = '';
  private $numcom = '';
  private $fectra = '';
  private $destra = '';
  private $ctas = "";
  private $desc = "";
  private $tipmov= "";
  private $mov= "";
  private $error= "";
  private $msgerr= "";
  private $montos= 0;

  public function setGrabar($val){
    $this->grabar = $val;
  }

  public function getGrabar()
    {
    return $this->grabar;
    }

  public function setReftra($val){
    $this->reftra = $val;
  }

  public function getReftra()
    {
    return $this->reftra;
    }

  public function setNumcom($val){
    $this->numcom = $val;
  }

  public function getNumcom()
    {
    return $this->numcom;
    }

  public function setFectra($val){
    $this->fectra = $val;
  }

  public function getFectra()
    {
    return $this->fectra;
    }

   public function setDestra($val){
    $this->destra = $val;
  }

  public function getDestra()
    {
    return $this->destra;
    }

  public function setCtas($val){
    $this->ctas = $val;
  }

  public function getCtas()
    {
    return $this->ctas;
    }

  public function setDesc($val){
    $this->desc = $val;
  }

  public function getDesc()
    {
    return $this->desc;
    }

  public function setTipmov($val){
    $this->tipmov = $val;
  }

  public function getTipmov()
    {
    return $this->tipmov;
    }

  public function setMov($val){
    $this->mov = $val;
  }

  public function getMov()
    {
    return $this->mov;
    }

  public function setMontos($val){
    $this->montos = $val;
  }

  public function getMontos()
    {
    return $this->montos;
    }

  public function setError($val){
    $this->error = $val;
  }

  public function getError()
    {
    return $this->error;
    }

  public function setMsgerr($val){
    $this->msgerr = $val;
  }

  public function getMsgerr()
    {
    return $this->msgerr;
    }

  public static function Buscar_Correlativo($fecha='')
  {
     if ($fecha=='') $fecha=date('Y-m-d');
     else {
               $aux=substr($fecha,2,1);
      if ($aux=='/') {
        $dateFormat = new sfDateFormat('es_VE');
        $fecha = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
      }
     }
    $num=0;
    $cor=0;
    $numcom='';
    $valido = false;
    $formato = '';
    $longitud='8';
		//Verificamos el formato del correlativo,
		//ya que es parametrizable
      $c = new Criteria();
      $c->add(ContabaPeer::CODEMP,'001');
      $per = ContabaPeer::doSelectOne($c);
      if ($per) {

      if ($per->getCorcomp()=='AAMM####'){
      	$formato = substr($fecha,2,2).substr($fecha,5,2); //date('ym');
      	$mes=substr($fecha,5,2);
        $anio=substr($fecha,0,4); //date('m');
      	$longitud='4';
      	$sql="select substring(numcom,5,4) as num from contabc where substring(numcom,3,2)='".$anio.$mes."' order by feccom desc limit 1";
      	if (Herramientas::BuscarDatos($sql,$result))
      	{
      	  $cor=$result[0]["num"]+1;
      	}else $cor=1;

      	while(!$valido){
	     $numcom = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

	      $c = new Criteria();
	      $c->add(ContabcPeer::NUMCOM,$numcom);
	      $contabc = ContabcPeer::doSelectOne($c);
	      if(!$contabc){
	        $valido = true;
	      }else { $cor=$cor +1;}
      	}

      }elseif ($per->getCorcomp()=='MMAA####'){
      	$formato = substr($fecha,5,2).substr($fecha,2,2); //date('my',$fecha);
		$longitud='4';
    $anio=substr($fecha,0,4);
        $mes=substr($fecha,5,2);//date('m');
        $sql="select substring(numcom,5,4) as num from contabc where substring(numcom,1,2)='".$mes.$anio."' order by feccom desc limit 1";
        if (Herramientas::BuscarDatos($sql,$result))
      	{
      	  $cor=$result[0]["num"]+1;
      	}else $cor=1;

      	while(!$valido){
	     $numcom = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

	      $c = new Criteria();
	      $c->add(ContabcPeer::NUMCOM,$numcom);
	      $contabc = ContabcPeer::doSelectOne($c);
	      if(!$contabc){
	        $valido = true;
	      }else { $cor=$cor +1;}
      	}

      }else{
	    while(!$valido){
	      $num = H::getNextvalSecuencia('contabc_numcom_seq');
	      $numcom = $formato.str_pad((string)$num, $longitud, "0", STR_PAD_LEFT);

	      $c = new Criteria();
	      $c->add(ContabcPeer::NUMCOM,$numcom);
	      $contabc = ContabcPeer::doSelectOne($c);
	      if(!$contabc){
	        $valido = true;
	      }
	    }
    }
    }else{
      while(!$valido){
        $num = H::getNextvalSecuencia('contabc_numcom_seq');
        $numcom = $formato.str_pad((string)$num, $longitud, "0", STR_PAD_LEFT);

        $c = new Criteria();
        $c->add(ContabcPeer::NUMCOM,$numcom);
        $contabc = ContabcPeer::doSelectOne($c);
        if(!$contabc){
          $valido = true;
        }
      }
    }
    return $numcom;
  }

  // Funcion para guardar los comprobantes contables
  public static function SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid, $guarda,$tipcom=null,$codtippta=null,$coddirec='',$codmon='',$valmon=1)
  {
    if($numcom=='########'){
      $numcom = Comprobante::Buscar_Correlativo($feccom);
    }
    if ($codmon=='')
    {
      $t=new Criteria();
      $t->add(OpdefempPeer::CODEMP,'001');
      $regt=OpdefempPeer::doSelectOne($t);
      if ($regt){
        $codmon=$regt->getCodmon();
        $q= new Criteria();
        $q->add(TsdesmonPeer::CODMON,$codmon);
        $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
        $reg= TsdesmonPeer::doSelectOne($q);
        if ($reg)
        {
           $valmon=$reg->getValmon();
        }
      }
    }
    Tesoreria::Salvarconfincomgen($numcom,$reftra,$feccom,$descom,$debito,$credito,$tipcom,$codtippta,$coddirec,$codmon,$valmon);
    Tesoreria::Salvar_asientosconfincomgen($numcom,$reftra,$feccom,$grid,$guarda);
    return $numcom;
  }
  
  public static function ActualizarReferenciaComprobante($numcom, $refasi, $tipo='')
  {
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    $forconuney='N';
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
    if(array_key_exists('generales',$varemp)) {
       if(array_key_exists('forconuney',$varemp['generales']))
       {
        $forconuney=$varemp['generales']['forconuney'];
       }
   }     
    $c = new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numcom);
    $contabc = ContabcPeer::doSelectOne($c);
    if($contabc){
     if ($confcorcom=='N' && $forconuney=='N') {
         if ($tipo=='OP') $contabc->setNumcom("OP".substr($refasi,2,6));
     }
      $contabc->setReftra($refasi);
      $contabc->save();
      $c = new Criteria();
      $c->add(Contabc1Peer::NUMCOM,$numcom);
      $contabc1 = Contabc1Peer::doSelect($c);
      foreach($contabc1 as $det)
      {
          if ($confcorcom=='N') {
              if ($tipo=='OP') $det->setNumcom("OP".substr($refasi,2,6));}
        $det->setRefasi($refasi);
        $det->save();
      }
      return true;
    }else return false;
  }

	public static function salvarConfinactcom($contabc,$grid){
		try{
			$contabcs = $grid[0];
			$j = 0;

			foreach($contabcs as $ccontabc){
				if($ccontabc->getCheck()=='1'){
					$ccontabc->setStacom('A');
					$ccontabc->save();
				}
			}
			return -1;

		}catch (Exception $ex){
			exit($ex);
			return 0;
		}
	}

	public static function salvarConfinelicom($contabc,$grid) {
		try {
			$contabcs = $grid[0];

			foreach($contabcs as $contabc) {
				if($contabc->getCheck()=='1') {
					$c = new Criteria();
					$c->add(Contabc1Peer::NUMCOM,$contabc->getNumcom());
					$c->add(Contabc1Peer::FECCOM,$contabc->getFeccom());
					$reg = Contabc1Peer::doDelete($c);

					$contabc->delete();
				}
			}
			return -1;

		}catch (Exception $ex) {
			exit($ex);
			return 0;
		}
	}

	public static function salvarConfincom($contabc, $grid) {
		self::SalvarComprobante($contabc->getNumcom(),$contabc->getReftra(),$contabc->getFeccom(),$contabc->getDescom(),$contabc->getTotdeb(),$contabc->getTotcre(),$grid,'S');

		return -1;
	}

	public static function verificarEliminarConfincom($contabc) { //cuando vaya a colocar estatus anulado
		$c = new Criteria();
		$c->add(OpordpagPeer::NUMCOM,$contabc->getNumcom());
		$reg = OpordpagPeer::doSelect($c);
		if ($reg) {
			return 623;
		}

		$c = new Criteria();
		$c->add(TsmovlibPeer::NUMCOM,$contabc->getNumcom());
		$reg = TsmovlibPeer::doSelect($c);
		if ($reg) {
			return 624;
		}

		return -1;
	}

	public static function validarEliminarConfincom($contabc){
		if ($contabc->getStacom()=='N') {
			return 616;
		}
		$c = new Criteria();
		$c->add(Contaba1Peer::FECDES,$contabc->getFeccom(),Criteria::LESS_EQUAL);
		$c->add(Contaba1Peer::FECHAS,$contabc->getFeccom(),Criteria::GREATER_EQUAL);
		$reg = Contaba1Peer::doSelectOne($c);

		if ($reg){
			if ($reg->getStatus()=='C'){
				return 621;
			}else return -1;
		}else return 622;
	}

	public static function eliminarConfincom($contabc) {

	}
	
	public static function salvarConfincomnew($contabc, $grid) {

		    $obj = ContabcPeer::retrieveByPk($contabc->getId());
		    
		    if($obj)
		    {
		    	$obj->setFeccom($contabc->getFeccom());
		    	$obj->setDescom($contabc->getDescom());
          $obj->setCodtiptra($contabc->getCodtiptra());
          $obj->setMoncom($contabc->getTotdeb());
		    	$obj->save();
		    }else
		    {
				/*$obj = new Contabc();
				$obj->setNumcom($contabc->getNumcom());
				$obj->setFeccom($contabc->getFeccom());
				$obj->setDescom($contabc->getDescom());
				$obj->setReftra($contabc->getReftra());*/
			    if ($contabc->getTotdeb() == $contabc->getTotcre()) {
			      $contabc->setStacom('D');
			    } else {
			      $contabc->setStacom('E');
			    }
			    $contabc->setTipcom('CON');
			    $contabc->setMoncom($contabc->getTotdeb());
                            $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
                            $contabc->setLoguse($loguse);
			    $contabc->save();
		    }
			self::Salvar_asientosconfincom($contabc->getNumcom(),$contabc->getFeccom(),$contabc->getReftra(),$grid);
			return -1;
	}
	
	public static function Salvar_asientosconfincom($numcom, $feccom, $reftra, $grid)
	{
		
		$j=0;
		foreach($grid[0] as $reg)
		{				
			$reg->setNumcom($numcom);
			$reg->setFeccom($feccom);
			if (($reg->getMondebito() > 0) and ($reg->getMoncredito() <= 0)) {
	          $cre = 'D';
	          $monto = $reg->getMondebito();
	        }
	        if (($reg->getMoncredito() > 0) and ($reg->getMondebito() <= 0)) {
	          $cre = 'C';
	          $monto = $reg->getMoncredito();
	        }
	        $reg->setDesasi($reg->getDescta());
	        $reg->setRefasi($reg->getRefasi());
	        $reg->setNumasi($j +1);
	        $reg->setDebcre($cre);
	        $reg->setMonasi($monto);
	        $reg->save();
                
                //Graba los centro de costo asociado
                $mancencos=H::getConfApp2('mancencos', 'contabilidad', 'confincom');
                if ($mancencos=='S')
                {
                    if ($reg->getCodcencos()!="" && $reg->getMoncencos()>0) {
                      $detcencos= new Codetcencos();
                      $detcencos->setNumcom($numcom);
                      $detcencos->setCodcta($reg->getCodcta());
                      $detcencos->setCodcencos($reg->getCodcencos());
                      $detcencos->setMoncencos($reg->getMoncencos());
                      $detcencos->save();
                    }
                }    
                    
	        $j++;	
		}
		$z = $grid[1];
        $j = 0;
        if (!empty($z[$j])) {
          while ($j < count($z)) {
            $z[$j]->delete();
            $j++;
          }	
        }			
				
	    
    }
    
public static function Buscar_Correlativo2()
  {
    $num=0;
    $cor=0;
    $numcom='';
    $valido = false;
    $formato = '';
    $longitud='8';
    while(!$valido){
      $num = H::getNextvalSecuencia('contabc_numcom_seq');
      $numcom = $formato.str_pad((string)$num, $longitud, "0", STR_PAD_LEFT);

      $c = new Criteria();
      $c->add(ContabcPeer::NUMCOM,$numcom);
      $contabc = ContabcPeer::doSelectOne($c);
      if(!$contabc){
        $valido = true;
      }
    }

    return $numcom;
  }    

}
?>
