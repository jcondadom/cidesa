<?php

/**
 * Contabilidad: Clase estática para el manejo de los procesos contables
 *
 * @package    Roraima
 * @subpackage contabilidad
 * @author     $Author: aperez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Contabilidad.class.php 33668 2009-10-01 16:47:21Z aperez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Contabilidad
{

  public static function Distribuir($fecini, $feccie){
	$fectem = $fecini;
	$fecha1 = explode("/",$fecini);
	$fecha2 = explode("/",$feccie);
	$mes = $fecha1[1];
	if ($fecha1[0]!=1){
   		$numper = $fecha2[1] - $fecha1[1];
    	for($i=0;$i<$numper;$i++){
	  	  $reg[$i] = new Contaba1();
	      $reg[$i]->setPereje(str_pad((string)($i+1),2,"0",STR_PAD_LEFT));
	      $reg[$i]->setFecdes($fectem);
	      $reg[$i]->setFechas(H::AddDaysDateVE($fectem,30));
	  	  $fectem= H::AddDaysDateVE($fectem,31);
  		}
	}
	else{
   	    $numper = ($fecha2[1] - $fecha1[1])+1;
		for($i=00;$i<$numper;$i++){
	  	  $reg[$i] = new Contaba1();
	      $reg[$i]->setPereje(str_pad((string)($i+1),2,"0",STR_PAD_LEFT));
	      $reg[$i]->setFecdes($fectem);
	      $fecaux= explode("/",$fectem);
		  $sql= "select to_char(last_day(to_date('$fectem','dd/mm/yyyy')),'dd/mm/yyyy') as last_day;";
		  H::BuscarDatos($sql,$fecini1);
		  $fectem=$fecini1[0]['last_day'];
	      $reg[$i]->setFechas($fectem);
		  $fectem= H::AddDaysDateVE($fectem,1);
		}
	}
    return $reg;
  }

  public static function salvarConfinins($contaba,$grid){
	$numrup=split("-",$contaba->getForcta());
	$contaba->setCodemp('001');
    $contaba->setLoncta(strlen(trim($contaba->getForcta())));
    $contaba->setNumrup(count($numrup));
    $contaba->setEtadef('A');

    $contaba->save();

	/*$c = new Criteria();
	$reg= Contaba1Peer::doSelect($c);
    foreach ($reg as $r){
    	$r->delete();
    }*/

    $contaba1 = $grid[0]; //Contabilidad::Distribuir($contaba->getFecini2(),$contaba->getFeccie2());
    foreach($contaba1 as $conta1){
      $conta1->setFecini($contaba->getFecini());
      $conta1->setFeccie($contaba->getFeccie());
      $conta1->setStatus('A');
      $conta1->save();
    }

    return -1;
  }

  public static function salvarConfintipcuecon($contaba){
    $contaba->save();
    return -1;
  }

	/********************************************************************/

	public static function validarDefiniciones() {
		$contaba = ContabaPeer::doSelectOne(new Criteria());

		if ($contaba) {
			if ($contaba->getEtadef()=='C')
				return 619;
			else return -1;
		} else  return 610;
	}

  	public static function validarConfincue($contabb) {
  		$codigopadre = H::obtenerCodigoPadre('codcta','contabb',$contabb->getCodcta());
  		$cargab = H::getX('codcta','contabb','cargab',$codigopadre);
  		if ($cargab=='C'){
  			return 625;
  		}
		if ($contabb->getCargab()=='C') {
			$p=H::buscarCodigoHijo('codcta','contabb',$contabb->getCodcta());
			if ($p) return 600;
		}
		return -1;
	}

	public static function salvarConfincue($contabb, $grid) {
		if (!$contabb->getId()){
			self::salvarCuenta($contabb, $grid);
			self::salvarPeriodos($contabb, $grid);
			$c = new Criteria();
			$c->add(ContabbPeer::CODCTA,$contabb->getCodcta());
			$reg = ContabbPeer::doSelectOne($c);
			if ($reg){
				$salantreal=$reg->getSalant();
			}
			$dif=$contabb->getSalant()-$salantreal;
			self::actualizarCuenta($contabb, $salantreal);
		} else {
			$contaba = ContabaPeer::doSelectOne(new Criteria());
			if ($contaba->getEtadef()!='C') {
                $tiemov=H::getX_vacio('CODCTA','Contabc1','CODCTA',$contabb->getCodcta());
                if ($tiemov=='') {
					$c = new Criteria();
					$c->add(ContabbPeer::CODCTA,$contabb->getCodcta());
					$reg = ContabbPeer::doSelectOne($c);
					if ($reg){
						$salantreal=$reg->getSalant();
						if ($reg->getDebcre()=='C' && $salantreal>0){
							$salantreal=$reg->getSalant()*-1;
						}
					}					
					if ($contabb->getDebcre()=='C'){
					  $contabb->setSalant($contabb->getSalant()*-1);
				    }
				    $dif=$contabb->getSalant()-$salantreal;
					$contabb->save();
					self::salvarPeriodos($contabb, $grid);
					self::actualizarCuenta($contabb,$dif);
			    }else return 646;
		    }else return 619;
		}
		return -1;
	}

	public static function salvarCuenta($contabb, $grid) {
		$contaba = ContabaPeer::doSelectOne(new Criteria());
		$contabb1 = $grid[0];
     	$contabb->setSalprgper($contabb1[0]->getSalprger());
		$contabb->setSalacuper(0);
		$contabb->setFecini($contaba->getFecini());
		$contabb->setFeccie($contaba->getFeccie());
		if ($contabb->getDebcre()=='C')
			$contabb->setSalant($contabb->getSalant()*-1);
		$contabb->save();

		return -1;
	}

	public static function salvarPeriodos($contabb, $grid) {
		$datos = $grid[0];
   	    $salant = $contabb->getSalant();
		foreach ($datos as $key=> $contabb1) {
			//if ($key!=0) {
				$contabb1->setCodcta($contabb->getCodcta());
				$contabb1->setSalact($salant+$contabb1->getSalper());
				$contabb1->setFecini($contabb->getFecini());
				$contabb1->setFeccie($contabb->getFeccie());
				$contabb1->save();
			//}
		}
		return -1;
	}

	public static function actualizarCuenta($contabb, $dif) {
		$contaba = ContabaPeer::doSelectOne(new Criteria());
		if ($contaba->getEtadef()!='C') {
			$arr=split('-',$contabb->getCodcta());

			if ($arr[0]!=0) {
				$tot=count($arr);
				$carafin=strlen($arr[$tot-1]);
				$cuentaini = $arr[0];
				$cuentafin = substr($contabb->getCodcta(),0,-$carafin-1);
				$fecini=$contaba->getFecini();
				$feccie=$contaba->getFeccie();
				$sql="select codcta, cargab, salant from contabb where codcta >= '$cuentaini' and codcta <= '$cuentafin' and position(trim(codcta) in trim('$cuentafin'))<>0 and fecini='$fecini' and  feccie='$feccie'";
				if (H::BuscarDatos($sql,$contabbs)){
					//$salant = $contabb->getSalant();
					foreach ($contabbs as $contabb_) {
						$salant=0;
					  if ($contabb_["cargab"]!='C') {
					  	$p= new Criteria();
					  	$p->add(ContabbPeer::CODCTA,$contabb_["codcta"]);
                        $regp= ContabbPeer::doSelectOne($p);
                        if ($regp) {
							$salant = $contabb_["salant"] +$dif;
							$regp->setSalant($salant);
							$regp->save();
					    

							$c=new Criteria();
							$c->add(Contabb1Peer::CODCTA,$contabb_["codcta"]);
							$contabb1s=Contabb1Peer::doSelect($c);
							if ($contabb1s) {
								foreach($contabb1s as $contabb1_) {
									$contabb1_->setSalact($salant);
									$contabb1_->save();
								}
						    }
					   }
					  }
					}
				}
			}
		}
		return -1;
	}

	public static function verificarEliminar($contabb) {
		$c = new Criteria();
		$c->add(Contabc1Peer::CODCTA,$contabb->getCodcta());
		$reg = Contabc1Peer::doSelectOne($c);
		if ($reg) {
			return 611;
		} else {
			$c = new Criteria();
			$c->add(CaproveePeer::CODCTA,$contabb->getCodcta());
			$reg = CaproveePeer::doSelectOne($c);
			if ($reg) {
				return 612;
			} else {
				$c = new Criteria();
				$c->add(CpdeftitPeer::CODCTA,$contabb->getCodcta());
				$reg = CpdeftitPeer::doSelectOne($c);
				if ($reg) {
					return 613;
				}else {
					$c = new Criteria();
					$c->add(CideftitPeer::CODCTA,$contabb->getCodcta());
					$reg = CideftitPeer::doSelectOne($c);
					if ($reg) {
						return 613;
					}else {
						$acumdeb=0;
						$acumcre=0;
						$c = new Criteria();
						$c->add(Contabb1Peer::CODCTA,$contabb->getCodcta());
						$reg = Contabb1Peer::doSelect($c);
						if ($reg){
							foreach ($reg as $objreg) {
								$acumdeb+=$objreg->getTotdeb();
								$acumcre+=$objreg->getTotcre();
							}
						  if ($acumdeb!=0 || $acumcre!=0)
						  	return 636;
						}
				   }
				}
			}
		}
		return -1;
	}

	public static function eliminarConfincue($contabb, $grid) {
		$codE=self::verificarEliminar($contabb);
		if ($codE==-1) {
			$c = new Criteria();
			$c->add(Contabb1Peer::CODCTA,$contabb->getCodcta());
			$c->add(Contabb1Peer::FECINI,$contabb->getFecini());
			$c->add(Contabb1Peer::FECCIE,$contabb->getFeccie());
			$regs = Contabb1Peer::doSelect($c);
			foreach($regs as $reg){
				$reg->delete();
			}
			$salantreal=$contabb->getSalant();
			$contabb->delete();

			self::actualizarCuenta($contabb, $salantreal);
			return -1;
		}else return $codE;
	}

	/********************************************************************/


	public static function trasladarSaldos($esqori,$esqdes) {
	   $codorigen="SIMA".$esqori;
  	   $coddestino="SIMA".$esqdes;

  	   $reg= ContabaPeer::doSelectOne(new Criteria());
  	   if ($reg){
  	   		$codingreso = $reg-> getCodind();
  	    	$codegreso = $reg-> getCodegd();
  	   }else{
     	$codingreso = '5';
     	$codegreso  = '6';
    	}

    	$sql1='update "'.$coddestino.'".contabb set SalAnt=(Select SalAct from "'.$codorigen.'".contabb1 where "'.$codorigen.'".contabb1.codcta="'.$coddestino.'".contabb.codcta and "'.$codorigen.'".contabb1.PerEje=\'12\')';
	    Herramientas::insertarRegistros($sql1);

	    $sql2='update "'.$coddestino.'".contabb set salant=0,salprgper=0,salacuper=0 where codcta like \''.$codingreso.'%\'';
	    Herramientas::insertarRegistros($sql2);

	    $sql3='update "'.$coddestino.'".contabb set salant=0,salprgper=0,salacuper=0 where codcta like \''.$codegreso.'%\'';
	    Herramientas::insertarRegistros($sql3);

	    $sql4='update "'.$coddestino.'".contabb1 set salact=0,totdeb=0,totcre=0 where codcta like \''.$codingreso.'%\'';
	    Herramientas::insertarRegistros($sql4);

	    $sql5='update "'.$coddestino.'".contabb1 set salact=0,totdeb=0,totcre=0 where codcta like \''.$codegreso.'%\'';
	    Herramientas::insertarRegistros($sql5);
	  
	  return true;
	}

	public static function generarComprobantes($clase,&$arrcompro) {

		$fecini=$clase->getFecini();
		$feccie=$clase->getFeccie();

		$errA = self::Verificar_Diferidos($fecini,$feccie);
		$errB = self::Cargar_Cuentas($clase,$datos);
		$err1=$err2=$err3=618;

		if (($errA==-1) and ($errB==-1)){
			 if((self::Verificar_Comprobante('CIERREEG'))==-1){
			 	$err1 = self::Generar_Comprobante_CierreEgr('CIERREEG', $datos, $arrcompro);
			 	}
			 if((self::Verificar_Comprobante('CIERREIN'))==-1){
			 	$err2 = self::Generar_Comprobante_CierreIng('CIERREIN', $datos, $arrcompro);
			 	}
			 if((self::Verificar_Comprobante('CIERRERE'))==-1){
			 	$err3 = self::Generar_Comprobante_CierreRes('CIERRERE', $datos, $arrcompro);
			 }
			 if(($err1==-1)and($err2==-1)and($err3==-1)){
       			return -1;
       		 }else{ return 618;}
       			//irPagina('contabilidad','ConFinComGen.php?comprobante=1&fecini='.$fecini.'&feccie='.$fecha.'');
       	}else {
          if($errA!=-1) return $errA; else return $errB;
       	}

	}

	public static function Verificar_Diferidos($fecini,$feccie){
           $c = new Criteria();
           $c->add(ContabcPeer::FECCOM,$fecini,Criteria::GREATER_EQUAL);
           $c->add(ContabcPeer::FECCOM,$feccie,Criteria::LESS_EQUAL);
           $c->add(ContabcPeer::STACOM,'D');
           $reg = ContabcPeer::doSelect($c);
           if ($reg){
           	return 605;
           }
           $c = new Criteria();
           $c->add(Contaba1Peer::STATUS,'A');
           $reg = Contaba1Peer::doSelect($c);
           if($reg){
           	return 606;
           }
           return -1;
	}

	public static function Cargar_Cuentas($contaba,&$datos){

		if ($contaba->getId()!=""){
			$datos= array();
			$datos["fecini"] = $contaba->getFecini();
			$datos["feccie"] = $contaba->getFeccie();
			$datos["activos"] = $contaba->getCodtesact();
			$datos["pasivos"] = $contaba->getCodtespas();
			$datos["ingresos"] = $contaba->getCodind();
			$datos["egresos"] = $contaba->getCodegd();
			$datos["capital"] = $contaba->getCodcta();
			$datos["resultado"] = $contaba->getCodres();
			$datos["resultado_anterior"] = $contaba->getCodresant();

		    $c = new Criteria();
		    $c->add(ContabbPeer::CODCTA,$datos["resultado"]);
		    $reg = ContabcPeer::doSelectOne($c);
		    if($reg){
			 	$datos["descta"]= $reg->getDescta();
			}
			$sql="select MAX(PEREJE) as pereje from Contaba1";
	   	 	if (Herramientas::BuscarDatos($sql,$numper)){
	   	 		$datos["ultimoperiodo"]=$numper[0]["pereje"];
	   	 	}
	   	 	if ($datos["activos"]=="" ||
	   	 		 $datos["pasivos"] =="" ||
				 $datos["ingresos"] =="" ||
				 $datos["egresos"] == "" ||
				 $datos["capital"] =="" ||
			 	 $datos["resultado"] ==""||
				 $datos["resultado_anterior"] ==""){
				 return 608;

			}else{ return -1; }
		}else{
			return 0;
		}
	}

	public static function Verificar_Comprobante($numero){

	 $c = new Criteria();
     $c->add(ContabcPeer::NUMCOM,$numero);
     $reg = ContabcPeer::doSelect($c);
	 if($reg){
	 	return 609;
	 }else {
	 	return -1;
	  }
	}

	public static function Generar_Comprobante_CierreRes($numero, $datos,&$arrcompro){
	  $cuentas = "";
      $descr   = "";
      $tipos   = "";
      $montos  = "";
      if (self::Verificar_Comprobante($numero)){
      	 $sql="select B.CODCTA as CODCTA,B.DESCTA as DESCTA,A.SALACT as SALACT
		          FROM
			          CONTABB1 A,CONTABB B
		          WHERE
			         A.CODCTA=B.CODCTA AND
		          	 A.CODCTA LIKE '".$datos["egresos"]."%' and
		          	 A.PEREJE='".$datos["ultimoperiodo"]."' AND
		          	 A.SALACT<>0 AND
		          	 B.CARGAB='C'
		          ORDER BY
		          	B.CODCTA";
		  if(H::BuscarDatos($sql,$regs)){
		 	$check='1';
            $cont=0;
            $i=0;
            $i=$i+1;
	        $cont=$i;

	         $sql = "SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
	                	WHERE A.CODCTA=B.CODCTA AND
	                	A.CODCTA LIKE '".$datos["ingresos"]."%' AND
	                	A.PEREJE='".$datos["ultimoperiodo"]."' AND B.CARGAB='C'";


	         if(H::BuscarDatos($sql,$reg2)){
	         	$toting = abs($reg2[0]["total"]);
	         }

			 $sql = "SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
	                	WHERE A.CODCTA=B.CODCTA AND
	                	A.CODCTA LIKE '".$datos["egresos"]."%' AND
	                	A.PEREJE='".$datos["ultimoperiodo"]."' AND B.CARGAB='C'";
	         if(H::BuscarDatos($sql,$reg3)){
	         	$totegr = abs($reg3[0]["total"]);
	         }


	           $c = new Criteria();
			   $reg= ContabaPeer::doSelectOne($c);
	           if($reg){
	           	$resultado= $reg->getCodres();
			  	$resultado_anterior= $reg->getCodresant();
	           }
	            $sql="select descta from contabb where codcta='$resultado'";
	             $c = new Criteria();
				 $c->add(ContabbPeer::CODCTA,$resultado);
		         $reg2 = ContabbPeer::doSelectOne($c);
		         if($reg2){
		         	$descta=$reg2->getDescta();
		         	$descr   = $descta;
		         }
			  	$monres = $toting - $totegr;
				$montos  = $monres.'_'.$resultado.'_'.$resultado_anterior;


		  }
		/*$mensaje="";
	    $numeroorden="";
	    $r='';
	    $numorden=$numero;*/
	    $numerocomprob=Comprobante::Buscar_Correlativo(date("d/m/Y"));
	    $clscommpro=new Comprobante();
	    $clscommpro->setGrabar("S");
	    $clscommpro->setNumcom($numerocomprob);  //Correlativo
	    $clscommpro->setReftra("CIERRERE");
	    $clscommpro->setFectra(date("d/m/Y"));
	    $clscommpro->setDesc($descr);
	    $clscommpro->setMontos($montos);
	    $arrcompro[]=$clscommpro;
	    return -1;
      }
	}

	public static function Generar_Comprobante_CierreIng($numero, $datos,&$arrcompro){
	  $cuentas = "";
      $descr   = "";
      $tipos   = "";
      $montos  = "";

	  if (self::Verificar_Comprobante($numero)){
		  $sql="select B.CODCTA as CODCTA,B.DESCTA as DESCTA,A.SALACT as SALACT
		          FROM
			          CONTABB1 A,CONTABB B
		          WHERE
			         A.CODCTA=B.CODCTA AND
		          	 A.CODCTA LIKE '".$datos["ingresos"]."%' and
		          	 A.PEREJE='".$datos["ultimoperiodo"]."' AND
		          	 A.SALACT<>0 AND
		          	 B.CARGAB='C'
		          ORDER BY
		          	B.CODCTA";

		 if(H::BuscarDatos($sql,$regs)){
		 	$check='1';
            $cont=0;
            $i=0;
            $i=$i+1;
	        $cont=$i;

		    foreach($regs as $reg){
			     $c = new Criteria();
				 $opc1 = $c->getNewCriterion(ContabbPeer::CODCTA,$reg["codcta"]);
			 	 $opc2 = $c->getNewCriterion(ContabbPeer::CODCTA,ContabbPeer::CODCTA." LIKE '".$datos["ingresos"]."%'",Criteria::CUSTOM);
				 $opc1->addAnd($opc2);
 				 $c->add($opc1);

		         $reg2 = ContabbPeer::doSelectOne($c);
			     if ($reg2){
			     	$codigocuenta = $reg["codcta"];
			     	$descta       = $reg["descta"];
			     	$tipo         = $reg2->getDebcre();
	            	if ($tipo=='D'){
	            		    $tipo ='C';
							$monto=$reg["salact"];
					}
		            else{
	            		    $tipo ='D';
							$monto=$reg["salact"] * (-1);
	            	}
	            	if ($cuentas==""){
	            		$cuentas = $codigocuenta;
		         	    $descr   = $descta;
						$tipos   = $tipo;
				 		$montos  = $monto;

	            	}else{
	            		$cuentas = $cuentas.'_'.$codigocuenta;
			         	$descr   = $descr.'_'.$descta;
						$tipos   = $tipos.'_'.$tipo;
					 	$montos  = $montos.'_'.$monto;
	            	}
			     }
			}

			 $sql = "SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
	                	WHERE A.CODCTA=B.CODCTA AND
	                	A.CODCTA LIKE '".$datos["ingresos"]."%' AND
	                	A.PEREJE='".$datos["ultimoperiodo"]."' AND B.CARGAB='C'";

	         if(H::BuscarDatos($sql,$regs)){
	         	$toting = abs($regs[0]["total"]);

	         	//$montos  = $montos.'_'.$toting;
	         }
	         if ($cuentas==""){
	         	 $cuentas = $datos["resultado"];
			     $descr   = $datos["descta"];
			     if ($toting>=0){
			     	 $t ='C';
					 $montos  = $toting;
			     }else{
			     	$t ='D';
			     	$montos  = $toting;
			     }
			     $tipos   = $t;
	         }else{
	         	 $cuentas = $cuentas.'_'.$datos["resultado"];
			     $descr   = $descr.'_'.$datos["descta"];
			     if ($toting>=0){
			     	 $t ='C';
					 $montos  = $montos.'_'.$toting;
			     }else{
			     	$t ='D';
			     	$montos  = $montos.'_'.$toting;
			     }
			     $tipos   = $tipos.'_'.$t;
	         }
		 }
		/*$mensaje="";
	    $numeroorden="";
	    $r='';
	    $numorden=$numero;*/
	    $numerocomprob=Comprobante::Buscar_Correlativo(date("d/m/Y"));

	    $clscommpro=new Comprobante();
	    $clscommpro->setGrabar("S");
	    $clscommpro->setNumcom($numerocomprob);  //Correlativo
	    $clscommpro->setReftra("CIERREIN");
	    $clscommpro->setFectra(date("d/m/Y"));
	    $clscommpro->setCtas($cuentas);
	    $clscommpro->setDesc($descr);
	    $clscommpro->setMov($tipos);
	    $clscommpro->setMontos($montos);
	    $arrcompro[]=$clscommpro;
	    return -1;
	  }
	}

	public static function Generar_Comprobante_CierreEgr($numero, $datos, &$arrcompro){
		  $cuentas = "";
	      $descr   = "";
	      $tipos   = "";
	      $montos  = "";

		 if (self::Verificar_Comprobante($numero)){
	         $sql="select B.CODCTA as CODCTA,B.DESCTA as DESCTA,A.SALACT as SALACT
			          FROM
				          CONTABB1 A,CONTABB B
			          WHERE
				         A.CODCTA=B.CODCTA AND
			          	 A.CODCTA LIKE '".$datos["egresos"]."%' and
			          	 A.PEREJE='".$datos["ultimoperiodo"]."' AND
			          	 A.SALACT<>0 AND
			          	 B.CARGAB='C'
			          ORDER BY
			          	B.CODCTA";
			 if(H::BuscarDatos($sql,$regs)){
			 	   	$check='1';
		            $cont=0;
		            $i=0;
		            $i=$i+1;
		            $cont=$i;

		            $sql = "SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
			                	WHERE A.CODCTA=B.CODCTA AND
			                	A.CODCTA LIKE '".$datos["egresos"]."%' AND
			                	A.PEREJE='".$datos["ultimoperiodo"]."' AND B.CARGAB='C'";
			        if(H::BuscarDatos($sql,$regs2)){
			        	$totegr = abs($regs2[0]["total"]);
		        	}
		        	if ($cuentas==""){
		        		 $cuentas = $datos["resultado"];
					     $descr   = $datos["descta"];
					     $tipos   = 'D';
					     $montos  = $totegr;
		        	}else{
		        		 $cuentas = $cuentas.'_'.$datos["resultado"];
					     $descr   = $descr.'_'.$datos["descta"];
					     $tipos   = $tipos.'_'.'D';
					     $montos  = $montos.'_'.$totegr;
		        	}

			     foreach($regs as $reg){
				     $c = new Criteria();
				     $opc1 = $c->getNewCriterion(ContabbPeer::CODCTA,$reg["codcta"]);
				     $opc2 = $c->getNewCriterion(ContabbPeer::CODCTA,ContabbPeer::CODCTA." LIKE '".$datos["egresos"]."%'",Criteria::CUSTOM);
			         $opc1->addAnd($opc2);
			         $c->add($opc1);
			         $reg2 = ContabbPeer::doSelectOne($c);
				     if ($reg2){
				     	$codigocuenta=$reg["codcta"];
				     	$descta=$reg["descta"];
				     	$tipo= $reg2->getDebcre();
				  		if ($tipo=='D'){
				  			 $tipo ='C';
				  			 $monto=$reg["salact"];
				  		}else{
				  			$tipo ='D';
				  			$monto=$reg["salact"] * (-1);
				  		}
				  		if ($cuentas==""){
				  		 $cuentas = $codigocuenta;
				         $descr   = $descta;
						 $tipos   = $tipo;
						 $montos  = $monto;
						}else{
						 $cuentas = $cuentas.'_'.$codigocuenta;
				         $descr   = $descr.'_'.$descta;
						 $tipos   = $tipos.'_'.$tipo;
						 $montos  = $montos.'_'.$monto;
						}
				     }
				}


		    }

			/*$mensaje="";
		    $numeroorden="";
		    $r='';
		    $numorden=$numero;*/
		    $numerocomprob=Comprobante::Buscar_Correlativo(date("d/m/Y"));
		    $clscommpro=new Comprobante();
		    $clscommpro->setGrabar("S");
		    $clscommpro->setNumcom($numerocomprob);  //Correlativo
		    $clscommpro->setReftra("CIERREEG");
		    $clscommpro->setFectra(date("d/m/Y"));
		    $clscommpro->setCtas($cuentas);
		    $clscommpro->setDesc($descr);
		    $clscommpro->setMov($tipos);
		    $clscommpro->setMontos($montos);
		    $arrcompro[]=$clscommpro;
		    return -1;
		 }
	}


	public static function abrirEtadef() {
		$contaba = ContabaPeer::doSelectOne(new Criteria());
		$contaba->setEtadef('A');
		$contaba->save();

		return -1;
    }

    public static function cerrarEtadef() {
		$contaba = ContabaPeer::doSelectOne(new Criteria());
		$contaba->setEtadef('C');
		$contaba->save();

		return -1;
    }

    public static function abrirPeriodo($contaba1) {

		$c = new Criteria();
		$c->add(Contaba1Peer::PEREJE,$contaba1->getPereje());
		$contaba1 = Contaba1Peer::doSelectOne($c);

		if ($contaba1->getStatus()!='A') {
			$c = new Criteria();
    		$c->add(ContabcPeer::FECCOM,$contaba1->getFecdes(),Criteria::GREATER_EQUAL);
    		$c->add(ContabcPeer::FECCOM,$contaba1->getFechas(),Criteria::LESS_EQUAL);
    		$c->add(ContabcPeer::STACOM,'D');
    		$reg = ContabcPeer::doSelect($c);

    		if (!$reg) {
				$contaba1->setStatus('A');
				$contaba1->save();
				return -1;
    		} else {
    			return 607;
	    	}
		} else return 614;
	}

    public static function cerrarPeriodo($contaba1) {

		$c = new Criteria();
		$c->add(Contaba1Peer::PEREJE,$contaba1->getPereje());
		$contaba1 = Contaba1Peer::doSelectOne($c);

		if ($contaba1->getStatus()!='C') {
			$c = new Criteria();
    		$c->add(ContabcPeer::FECCOM,$contaba1->getFecdes(),Criteria::GREATER_EQUAL);
    		$c->add(ContabcPeer::FECCOM,$contaba1->getFechas(),Criteria::LESS_EQUAL);
    		$c->add(ContabcPeer::STACOM,'D');
    		$reg = ContabcPeer::doSelect($c);

    		if (!$reg) {
    			$c = new Criteria();
    			$c->add(Contaba1Peer::PEREJE,$contaba1->getPereje(),Criteria::LESS_THAN);
    			$c->add(Contaba1Peer::STATUS,'A');
    			$reg = ContabcPeer::doSelect($c);
    			if (!$reg) {
					$contaba1->setStatus('C');
					$contaba1->save();
					return -1;
    			} else {
    				return 603;
    			}
    		} else {
    			return 604;
    		}
		} else return 615;
    }


    public static function verificarCierre(){
    	$contaba = ContabaPeer::doSelectOne(new Criteria());

		if ($contaba) {
			if ($contaba->getEtadef()=='A')
				return 620;
			else return -1;
		}
    }

    public static function salvarAsigCentroCosto($contabc,$grid)
    {
        $x=$grid[0];
        $j=0;
        $r = new Criteria();
        $r->add(CodetcencosPeer::NUMCOM,$contabc->getNumcom());
        $datos=CodetcencosPeer::doSelect($r);
        if (!$datos)
        {            
            while ($j<count($x))
            {
             if ($x[$j]->getCodcencos()!="" && $x[$j]->getMoncencos()>0) {
              $detcencos= new Codetcencos();
              $detcencos->setNumcom($contabc->getNumcom());
              $detcencos->setCodcta($x[$j]->getCodcta());
              $detcencos->setCodcencos($x[$j]->getCodcencos());
              $detcencos->setMoncencos($x[$j]->getMoncencos());
              $detcencos->save();
             }
              $j++;
            }
        }else {
            while ($j<count($x))
            {
             if ($x[$j]->getCodcencos()!="" && $x[$j]->getMoncencos()>0) {
              $x[$j]->setNumcom($contabc->getNumcom());
              $x[$j]->save();
             }
              $j++;
            }
        }
    }

  public static function posicion_en_el_grid($arreglo,$codigo)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
        if ($arreglo[$ind]["codcta"]==$codigo)
        { $enc=true; }
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

  public static function ArregloCuentas($grid)
  {
    $arreglocta=array();
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
  	$pos=self::posicion_en_el_grid($arreglocta,$x[$j]->getCodcta());
        if ($pos==0)
        {
         $l=count($arreglocta)+1;
         $arreglocta[$l-1]["codcta"]=$x[$j]->getCodcta();
         $arreglocta[$l-1]["monasi"]=$x[$j]->getMonasi();
         $arreglocta[$l-1]["moncencos"]=$x[$j]->getMoncencos();
        }
        else
        {
          $valor=H::toFloat($arreglocta[$pos-1]["moncencos"]);
          $arreglocta[$pos-1]["moncencos"]=($valor+$x[$j]->getMoncencos());
          $valor1=H::toFloat($arreglocta[$pos-1]["monasi"]);
          $arreglocta[$pos-1]["monasi"]=($valor1+$x[$j]->getMonasi());
        }
        $j++;
    }

    return $arreglocta;
  }

  public static function validarMontoTotalCuenta($grid,&$cod)
  {
    $arreglo=self::ArregloCuentas($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if (H::toFloat($arreglo[$j]["moncencos"])>H::toFloat($arreglo[$j]["monasi"]))
      {
        $cod=$arreglo[$j]["codcta"];
        return 626;
      }
     $j++;
    }
    return -1;
  }

  public static function cargarComprobantes($archivo,&$arreglo)
  {
    $file = fopen(sfConfig::get('sf_upload_dir')."/".$archivo,  "r");
    $arreglo=array();
    if ($file)
    {
        $acumdeb=0;
        $acumcre=0;
        $numcom="";
        $numcom2="";
        while(!feof($file)) {
	    $comprobantes=fgets($file, 335);
            if (trim($comprobantes)!='' && trim($comprobantes)!='/n')
            {
              $tipo=trim(substr($comprobantes,0,1));
              if ($tipo=='M')
              {
                 $j=count($arreglo)+1;
                 $arreglo[$j-1]["numcom"]=trim(substr($comprobantes,1,8));
                 $arreglo[$j-1]["feccom"]=trim(substr($comprobantes,9,10));
                 $arreglo[$j-1]["descom"]=trim(substr($comprobantes,19,250));
                 $montor=trim(substr($comprobantes,269,17));
                 if (is_numeric(H::toFloat($montor)))
                 {
                   $monto=H::toFloat($montor);
                 }else $monto=0;
                 $arreglo[$j-1]["moncom"]=number_format($monto,2,',','.');
                 $arreglo[$j-1]["stacom"]=trim(substr($comprobantes,286,1));
                 if ($numcom!=$arreglo[$j-1]["numcom"] && $numcom!="")
                 {
                     if ($acumdeb!=$acumcre) $arreglo[$j-2]["cuadrado"]='N';
                     else $arreglo[$j-2]["cuadrado"]='S';

                     $acumcre=0;
                     $acumdeb=0;
}
              }
              $numcom=$arreglo[$j-1]["numcom"];
              if ($tipo=='A')
              {
                $numcom2=trim(substr($comprobantes,1,8));

                if ($numcom==$numcom2)
                {
                  $debcre=trim(substr($comprobantes,19,1));
                  $montora=trim(substr($comprobantes,313,17));
                 if (is_numeric(H::toFloat($montora)))
                 {
                   $montoa=H::toFloat($montora);
                 }else $montoa=0;
                  if ($debcre=='D')
                      $acumdeb=$acumdeb+$montoa;
                  else
                      $acumcre=$acumcre+$montoa;
                }
              }
	   }
    }
    if (count($arreglo)>0)
    {
         if ($acumdeb!=$acumcre) $arreglo[$j-1]["cuadrado"]='N';
         else $arreglo[$j-1]["cuadrado"]='S';
    }
    }
  }

  public static function grabarComprobantesMigrados($contaba,$grid)
  {
    $file = fopen(sfConfig::get('sf_upload_dir')."/".$contaba->getArchivo(),  "r");
    if ($file)
    {
        $acumdeb=0;
        $acumcre=0;
        while(!feof($file)) {
            $comprobantes=fgets($file, 335);
            if (trim($comprobantes)!='' && trim($comprobantes)!='/n')
            {
              $numcom=trim(substr($comprobantes,1,8));
              $esta=self::buscarComprobante($numcom,$grid);
              if ($esta)
              {
                $tipo=trim(substr($comprobantes,0,1));
                $feccom=trim(substr($comprobantes,9,10));
                $dateFormat = new sfDateFormat('es_VE');
                $fecha = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));
                if ($tipo=='M')
                {
                    $contabcq = new Contabc();
                    $contabcq->setNumcom($numcom);
                    $contabcq->setFeccom($fecha);
                    $contabcq->setDescom(trim(substr($comprobantes,19,250)));
                    $contabcq->setStacom('D');
                    $contabcq->setTipcom(trim(substr($comprobantes,287,3)));
                    $montor=trim(substr($comprobantes,269,17));
                    if (is_numeric(H::toFloat($montor)))
                    {
                      $monto=H::toFloat($montor);
                    }else $monto=0;
                    $contabcq->setMoncom($monto);
                    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
                    $contabcq->setLoguse($loguse);
                    $contabcq->save();
                }else {
                    $contabc1q= new Contabc1();
                    $contabc1q->setNumcom($numcom);
                    $contabc1q->setFeccom($fecha);
                    $contabc1q->setCodcta(trim(substr($comprobantes,20,32)));
                    $contabc1q->setNumasi(trim(substr($comprobantes,52,3)));
                    $contabc1q->setRefasi(trim(substr($comprobantes,55,8)));
                    $contabc1q->setDesasi(trim(substr($comprobantes,63,250)));
                    $contabc1q->setDebcre(trim(substr($comprobantes,19,1)));
                    $montora=trim(substr($comprobantes,313,17));
                    if (is_numeric(H::toFloat($montora)))
                    {
                      $montoa=H::toFloat($montora);
                    }else $montoa=0;
                    $contabc1q->setMonasi($montoa);
                    $contabc1q->save();
                }
              }
            }
        }
   }
    return -1;
  }

  public static function buscarComprobante($numcom,$grid)
  {
      $esta=false;

      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        if ($x[$j]->getCheck()=="1" && $x[$j]->getNumcom()==$numcom)
        {
           $esta=true;
           break;
        }
        $j++;
      }

      return $esta;
  }

  public static function generarTxtComprobantes($contabc,$grid)
  {
    //Generar archivo txt
    $nombre_archivo=sfConfig::get('sf_upload_dir')."/comprobantes/txt_comprobante"."_".strftime('%d_%m_%Y',time()).".txt";
    $dir="";

    if (!file_exists($nombre_archivo))
    {
            fopen($nombre_archivo,"w");
}
    chmod ($nombre_archivo,0777);
    $comprobantes = fopen($nombre_archivo,'w+');
    $dir="txt_comprobante"."_".strftime('%d_%m_%Y',time()).".txt";


      $x=$grid[0];
      $j=0;
      $cadena="";
      while ($j<count($x))
      {
        if ($x[$j]->getCheck2()=="1")
        {
           $r= new Criteria();
           $r->add(Contabc1Peer::NUMCOM,$x[$j]->getNumcom());
           $registros= Contabc1Peer::doSelect($r);
           if ($registros)
           {
               foreach ($registros as $objetos)
               {
                   $cadena=str_pad($objetos->getNumcom(), 8, ' ', STR_PAD_LEFT).str_pad(date('d/m/Y',strtotime($objetos->getFeccom())), 10, ' ', STR_PAD_LEFT).str_pad($objetos->getDebcre(), 1, ' ', STR_PAD_LEFT).str_pad($objetos->getCodcta(), 32, ' ', STR_PAD_LEFT).str_pad($objetos->getMonasi(), 17, ' ', STR_PAD_LEFT).str_pad($objetos->getDesasi(), 250, ' ', STR_PAD_LEFT).str_pad(H::getXx_vacio('Codetcencos', array('NUMCOM','CODCTA'), array($objetos->getNumcom(),$objetos->getCodcta()), 'Codcencos'), 32, ' ', STR_PAD_LEFT);

                   fputs($comprobantes,$cadena.chr(10));
               }
           }
        }
        $j++;
      }

      fclose($comprobantes);

      return $dir;
  }
  
public static function generarTxtComprobantesIBS($contabc,$grid)
  {
    //Generar archivo txt
    $nombre_archivo=sfConfig::get('sf_upload_dir')."/comprobantesibs/txt_comprobante_ibs"."_".strftime('%d_%m_%Y',time()).".txt";
    $dir="";

    if (!file_exists($nombre_archivo))
    {
            fopen($nombre_archivo,"w");
}
    chmod ($nombre_archivo,0777);
    $comprobantes = fopen($nombre_archivo,'w+');
    $dir="txt_comprobante_ibs"."_".strftime('%d_%m_%Y',time()).".txt";

      $numerolote=H::getX_vacio('TIPCOM', 'Codeftiplot', 'Numlot', $contabc->getTipcom());
      $x=$grid[0];
      $j=0;
      $cadena="";
      while ($j<count($x))
      {
        if ($x[$j]->getCheck2()=="1")
        {
            $descripcion=$x[$j]->getDescom().'  .Comprobante de cierre del día '.date('d/m/Y').'  del tipo '. ($contabc->getTipcom()=='ALM' ? 'Almacén': $contabc->getTipcom()=='BIE' ? 'Bienes': $contabc->getTipcom()=='TES' ? 'Tesoreria':'Contabilidad');
            $cadena='M'.str_pad($numerolote, 20, ' ', STR_PAD_LEFT).date('d/m/Y').str_pad($descripcion, 250, ' ', STR_PAD_LEFT).str_pad(H::toFloat($contabc->getTotcom()), 18, '0', STR_PAD_LEFT).'DIBS';
            fputs($comprobantes,$cadena.chr(10));
            
           $r= new Criteria();
           $r->add(Contabc1Peer::NUMCOM,$x[$j]->getNumcom());
           $registros= Contabc1Peer::doSelect($r);
           if ($registros)
           {
               $y=1;
               foreach ($registros as $objetos)
               {
                   $cadena='A'.str_pad($numerolote, 20, ' ', STR_PAD_LEFT).date('d/m/Y').str_pad($objetos->getDebcre(), 1, ' ', STR_PAD_LEFT).str_pad($objetos->getCodcta(), 32, ' ', STR_PAD_LEFT).str_pad($y, 3, '0', STR_PAD_LEFT).str_pad($objetos->getDesasi(), 250, ' ', STR_PAD_LEFT).str_pad($objetos->getMonasi(), 18, '0', STR_PAD_LEFT);

                   fputs($comprobantes,$cadena.chr(10));
                   $y++;
               }
           }
        }
        $j++;
      }

      fclose($comprobantes);

      return $dir;
  }

  /******************************CONTABBHIS****************************/

    public static function salvarConregsalhis($contabbhis, $grid) {
        self::salvarCuentahis($contabbhis);
        self::salvarPeriodoshis($contabbhis, $grid);
        return -1;
    }

    public static function salvarCuentahis($contabbhis) {
        $contaba = ContabaPeer::doSelectOne(new Criteria());
        $contabbhis->setFecini($contaba->getFecini());
        $contabbhis->setFeccie($contaba->getFeccie());
        $contabbhis->save();

        return -1;
    }

    public static function salvarPeriodoshis($contabbhis, $grid) {
        $datos = $grid[0];
        $n = 0;
        while ($n < count($datos)) {
            $datos[$n]->setCodcta($contabbhis->getCodcta());
            $datos[$n]->setFecini($contabbhis->getFecini());
            $datos[$n]->setFeccie($contabbhis->getFeccie());
            $datos[$n]->save();
            $n++;
        }
        return -1;
    }

  /******************************CONTABBHIS****************************/
    
    public static function ReversarAnulados($grid)
    {
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        if ($x[$j]->getCheck2()=="1")
        {
           $x[$j]->setStacom('D');
           $x[$j]->save();
        }
        $j++;
      }
    }    

    /*     * *************************CONDETFLUEFE*************************** */

    public static function salvarDetalleTitulo($clase, $grid) {
        //Guarda Datos Detalle Titulo -- Tabla contadettit
        $clase->save();

        $x = $grid[0];
        $j = 0;
        while ($j < count($x)) {
            $x[$j]->setCodtitdet($clase->getCodtitdet());
            $x[$j]->setCodcta($x[$j]->getCodcta());
            $x[$j]->setDescta($x[$j]->getDescta());
            $x[$j]->save();
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
        return -1;
    }
    
    public static function eliminarDetalleCuenta($clase) {       
        //ELIMINAR CUENTAS DEL DETALLE
        $c = new Criteria();
        $c->add(ContacuetitPeer::CODTITDET, $clase->getCodtitdet());
        $regs = ContacuetitPeer::doSelect($c);

        if ($regs) {
            foreach ($regs as $reg) {
                $reg->delete();
            }
        }

        //ELIMINA DETALLE
        $clase->delete();
        return -1;
    }

    /*     * *************************CONEDOFLUEFE*************************** */

    public static function eliminarEstFluEfe($clase) {
        $c = new Criteria();
        $c->add(ContadettitPeer::CODTIT, $clase->getCodtit());
        $reg = ContadettitPeer::doSelectOne($c);
        if ($reg) {
            return 634;
        } else {
            $clase->delete();
            return -1;
        }
    }

    public static function EliminarComprobantesAnulados($grid){
	    $x = $grid[0];
	    $j = 0;
	    while ($j < count($x)) {
	      if ($x[$j]->getCheck()=='1')
	      {
	        H::EliminarRegistro('Contabc1','Numcom',$x[$j]->getNumcom());	
	        H::EliminarRegistro('Contabc','Numcom',$x[$j]->getNumcom());	
	      }      
	      $j++;
	    }
	  return -1;
    }

    public static function ActualizarComprobantesContable($grid,&$cadena){
    	$x = $grid[0];
	    $j = 0;
	    $cadena="";
	    while ($j < count($x)) {
	      if ($x[$j]->getCheck()=='1')
	      {
	      	$error=self::validarCuentasCargables($x[$j]->getNumcom());
	      	if ($error==-1) {
        	  $x[$j]->setStacom('A');
        	   $x[$j]->save();
            }else $cadena=$cadena.', '.$x[$j]->getNumcom();
	      }      
	      $j++;
	    }
	  return -1;
    }

    public static function RespaldarenHistorico($fecini,$feccie){
        $sql="drop table hisconc1 cascade";
        Herramientas::insertarRegistros($sql);

	    $sql="drop table hisconc cascade";
	    Herramientas::insertarRegistros($sql);

	    $sql="drop table hisconb cascade";
	    Herramientas::insertarRegistros($sql);

	    $sql="drop table hisconb1 cascade";
	    Herramientas::insertarRegistros($sql);

	    $sql="create table hisconb  as (select * from contabb  where fecini=to_date('".$fecini."','dd/mm/yyyy') and feccie=to_date('".$feccie."','dd/mm/yyyy'))";
	    Herramientas::insertarRegistros($sql);
	 
	    $sql="create table hisconb1  as (select * from contabb1  where fecini=to_date('".$fecini."','dd/mm/yyyy') and feccie=to_date('".$feccie."','dd/mm/yyyy'))";
	    Herramientas::insertarRegistros($sql);

	    $sql="create table hisconc  as (select * from contabc where feccom>=to_date('".$fecini."','dd/mm/yyyy') and feccom<=to_date('".$feccie."','dd/mm/yyyy'))";
	    Herramientas::insertarRegistros($sql);

	    $sql="create table hisconc1  as (select * from contabc1 where feccom>=to_date('".$fecini."','dd/mm/yyyy') and feccom<=to_date('".$feccie."','dd/mm/yyyy'))";
	    Herramientas::insertarRegistros($sql);
    }

    public static function ComprobantesCierre(&$arrcompro){
      $contaba=ContabaPeer::doSelectOne(new Criteria());
      self::Cargar_Cuentas($contaba,$datos);         
      //Comprobante de Cierre de Resultado
      $ctas="";$movs="";$montos="";$desc="";
      $sql="select B.CODCTA as codcta,B.DESCTA as descta,A.SALACT as salact
            FROM CONTABB1 A,CONTABB B
            WHERE A.CODCTA=B.CODCTA AND A.CODCTA LIKE '".$datos["egresos"]."%' and
          	A.PEREJE='".$datos["ultimoperiodo"]."' AND A.SALACT<>0 AND
          	B.CARGAB='C' ORDER BY	B.CODCTA";
       if (Herramientas::BuscarDatos($sql,$result))
       {
		   $sql1="SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
    	          WHERE A.CODCTA=B.CODCTA AND
			      A.CODCTA LIKE '".trim($datos["egresos"])."%' AND
			      A.PEREJE='".trim($datos["ultimoperiodo"])."' AND B.CARGAB='C'";
	       if (Herramientas::BuscarDatos($sql1,$result1)){
	         $totegr=abs($result1[0]["total"]);
	       } 

		   $sql4="SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
    	          WHERE A.CODCTA=B.CODCTA AND
			      A.CODCTA LIKE '".trim($datos["ingresos"])."%' AND
			      A.PEREJE='".trim($datos["ultimoperiodo"])."' AND B.CARGAB='C'";
	       if (Herramientas::BuscarDatos($sql4,$result4)){
	         $toting=abs($result4[0]["total"]);
	       } 	       

	      $monres=$toting-$totegr;
   	  	  $numcom3="CIERRERE";
		  $destra3="Comprobante de Cierre del Ejercicio Actual";
		  $fecha3=date('d/m/Y',strtotime($contaba->getFeccie()));

		  $ctas=$datos["resultado"];
          $movs='D';
          $desc=H::getX_vacio('codcta','Contabb','Descta',$datos["resultado"]);   ;
          $montos=$monres;

		  $ctas=$ctas."_".$datos["resultado_anterior"];
          $movs=$movs."_"."C";
          $desc=$desc."_".H::getX_vacio('codcta','Contabb','Descta',$datos["resultado_anterior"]);   ;
          $montos=$montos."_".$monres;
	      
	      $clscommpro=new Comprobante();
	      $clscommpro->setGrabar("N");
	      //Cabecera del Comprobante
	      $clscommpro->setNumcom($numcom3);
	      $clscommpro->setReftra($numcom3);
	      $clscommpro->setFectra($fecha3);
	      $clscommpro->setDestra($destra3);
	      //Detalle (Asientos Contables)
	      $clscommpro->setCtas($ctas);
	      $clscommpro->setDesc($desc);
	      $clscommpro->setMov($movs);
	      $clscommpro->setMontos($montos);
	      $clscommpro->setError("N");
	      $arrcompro[]=$clscommpro;
       }

       //Comprobante de Cierre de Ingresos
       $ctas="";$movs="";$montos="";$desc="";
      $sql="select B.CODCTA as codcta,B.DESCTA as descta,A.SALACT as salact
            FROM CONTABB1 A,CONTABB B
            WHERE A.CODCTA=B.CODCTA AND A.CODCTA LIKE '".$datos["ingresos"]."%' and
          	A.PEREJE='".$datos["ultimoperiodo"]."' AND A.SALACT<>0 AND
          	B.CARGAB='C' ORDER BY	B.CODCTA";
       if (Herramientas::BuscarDatos($sql,$result))
       {
		   $sql1="SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
    	          WHERE A.CODCTA=B.CODCTA AND
			      A.CODCTA LIKE '".trim($datos["ingresos"])."%' AND
			      A.PEREJE='".trim($datos["ultimoperiodo"])."' AND B.CARGAB='C'";			      
	       if (Herramientas::BuscarDatos($sql1,$result1)){
	         $toting=abs($result1[0]["total"]);
	       } 

   	  	  $numcom2="CIERREIN";
		  $destra2="Comprobante de Cierre del Ejercicio Actual";
		  $fecha2=date('d/m/Y',strtotime($contaba->getFeccie()));

		  $ctas=$datos["resultado"];
		  $desc=H::getX_vacio('codcta','Contabb','Descta',$datos["resultado"]);   ;
          if ($toting>=0) {
            $movs='C';          
            $montos=$toting;
          }else {
          	$movs='D';          
            $montos=$toting*-1;
          }
          
          $q=0;
          while ($q<count($result)){
          	$sql3="select debcre from contabb where codcta='".$result[$q]["codcta"]."' and codcta like '".trim($datos["ingresos"])."%' ";
          	if (Herramientas::BuscarDatos($sql3,$result3)){
                 if (trim($ctas)!="") $ctas=$ctas."_".$result[$q]["codcta"]; else  $ctas = $result[$q]["codcta"];
	             if (trim($desc)!="") $desc=$desc."_".$result[$q]["descta"]; else  $desc = $result[$q]["descta"];
	             if ($result3[0]["debcre"]=='D') {
		            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
		            $montot=$result[$q]["salact"];
		            if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
	             }else{
	             	if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
	             	$montot=$result[$q]["salact"]*-1;
		            if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
	             }
          	}
          	$q++;
          }
	      
	      $clscommpro=new Comprobante();
	      $clscommpro->setGrabar("N");
	      //Cabecera del Comprobante
	      $clscommpro->setNumcom($numcom2);
	      $clscommpro->setReftra($numcom2);
	      $clscommpro->setFectra($fecha2);
	      $clscommpro->setDestra($destra2);
	      //Detalle (Asientos Contables)
	      $clscommpro->setCtas($ctas);
	      $clscommpro->setDesc($desc);
	      $clscommpro->setMov($movs);
	      $clscommpro->setMontos($montos);
	      $clscommpro->setError("N");
	      $arrcompro[]=$clscommpro;
       }

      //Comprobante de Cierre de Egresos
      $ctas="";$movs="";$montos="";$desc="";
      $sql="select B.CODCTA as codcta,B.DESCTA as descta,A.SALACT as salact
            FROM CONTABB1 A,CONTABB B
            WHERE A.CODCTA=B.CODCTA AND A.CODCTA LIKE '".$datos["egresos"]."%' and
          	A.PEREJE='".$datos["ultimoperiodo"]."' AND A.SALACT<>0 AND
          	B.CARGAB='C' ORDER BY	B.CODCTA";
       if (Herramientas::BuscarDatos($sql,$result))
       {
		   $sql1="SELECT SUM(coalesce(A.SALACT,0)) as total FROM CONTABB1 A,CONTABB B
    	          WHERE A.CODCTA=B.CODCTA AND
			      A.CODCTA LIKE '".trim($datos["egresos"])."%' AND
			      A.PEREJE='".trim($datos["ultimoperiodo"])."' AND B.CARGAB='C'";
	       if (Herramientas::BuscarDatos($sql1,$result1)){
	         $totegr=abs($result1[0]["total"]);
	       } 

   	  	  $numcom1="CIERREEG";
		  $destra1="Comprobante de Cierre del Ejercicio Actual";
		  $fecha1=date('d/m/Y',strtotime($contaba->getFeccie()));

		  $ctas=$datos["resultado"];
          $movs='D';
          $desc=H::getX_vacio('codcta','Contabb','Descta',$datos["resultado"]);   ;
          $montos=$totegr;
          $q=0;
          while ($q<count($result)){
          	$sql3="select debcre from contabb where codcta='".$result[$q]["codcta"]."' and codcta like '".trim($datos["egresos"])."%' ";
          	if (Herramientas::BuscarDatos($sql3,$result3)){
                 if (trim($ctas)!="") $ctas=$ctas."_".$result[$q]["codcta"]; else  $ctas = $result[$q]["codcta"];
	             if (trim($desc)!="") $desc=$desc."_".$result[$q]["descta"]; else  $desc = $result[$q]["descta"];
	             if ($result3[0]["debcre"]=='D') {
		            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
		            $montot=$result[$q]["salact"];
		            if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
	             }else{
	             	if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
	             	$montot=$result[$q]["salact"]*-1;
		            if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
	             }
          	}
          	$q++;
          }
	      
	      $clscommpro=new Comprobante();
	      $clscommpro->setGrabar("N");
	      //Cabecera del Comprobante
	      $clscommpro->setNumcom($numcom1);
	      $clscommpro->setReftra($numcom1);
	      $clscommpro->setFectra($fecha1);
	      $clscommpro->setDestra($destra1);
	      //Detalle (Asientos Contables)
	      $clscommpro->setCtas($ctas);
	      $clscommpro->setDesc($desc);
	      $clscommpro->setMov($movs);
	      $clscommpro->setMontos($montos);
	      $clscommpro->setError("N");
	      $arrcompro[]=$clscommpro;
       }       
    }   

public static function VerificarComprobantesCierre(){
  $w= new Criteria();
  $w->add(ContabcPeer::NUMCOM,'CIERREEG');
  $result= ContabcPeer::doSelectOne($w);
  if ($result){
    return 640;
  }else {
  	  $w= new Criteria();
	  $w->add(ContabcPeer::NUMCOM,'CIERREIN');
	  $result= ContabcPeer::doSelectOne($w);
	  if ($result){
	    return 640;
	  }else {
	  	  $w= new Criteria();
		  $w->add(ContabcPeer::NUMCOM,'CIERRERE');
		  $result= ContabcPeer::doSelectOne($w);
		  if ($result)
		    return 640;
	  } 
  }
  return -1;
}     

public static function SalvarAprobacion($grid){

	$x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCheck2()=='1')
      {
    	$x[$j]->setStaapr('S');
    	$x[$j]->setFecapr(date('Y-m-d'));
    	$x[$j]->setUsuapr(sfContext::getInstance()->getUser()->getAttribute('loguse'));
    	$x[$j]->save();
      }      
      $j++;
    }

}

  public static function validarCuentasCargables($numcom)
  {

  	$w= new Criteria();
  	$w->add(Contabc1Peer::NUMCOM,$numcom);
  	$regw= Contabc1Peer::doSelect($w);
  	if ($regw){
  		foreach ($regw as $objw) {
  			$c = new Criteria();
	        $c->add(ContabbPeer::CODCTA,$objw->getCodcta());
	        $per = ContabbPeer::doSelectOne($c);
	        if(!$per)
	        {
	        	return 549;
	        }else {
	          if ($per->getCargab()!='C')
	            return 1517;
	        }
  		}
  	}
    return -1;
  } 
}
?>
