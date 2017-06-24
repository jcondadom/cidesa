<?php


/**
 * facrecpag actions.
 *
 * @package    siga
 * @subpackage facrecpag
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facrecpagActions extends autofacrecpagActions {

private $msjpag='';
	// Para incluir funcionalidades al executeEdit()
	public function editing() {
                if (!$this->fcpagos->getId())
                    $this->fcpagos->setFecpag(date('Y-m-d'));
                $this-> setVars();
		$this->configGriddetalles($this->fcpagos->getRifcon(),'',$this->fcpagos->getNumpag()) ;
		$this->configGridrecargdescto($this->fcpagos->getNumpag());
                $this->configGridformpag('',$this->fcpagos->getNumpag(),$this->fcpagos->getMonefe());
                

	}

        public function setVars() {
		$this->params = '';
		$this->params[0] = Herramientas :: getX_vacio('codemp', 'fcdefins', 'codpic', '001');
                $this->fcpagos->setVienededeclaracion(false);
                $this->fcpagos->setCodfact('');
                $this->fcpagos->setFunpag($this->fcpagos->getFunpag()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcpagos->getFunpag());
                $login=$this->getUser()->getAttribute('loguse');
                $c= new Criteria();
                $c->add(ApliUserPeer :: LOGUSE, $login);
                $c->add(ApliUserPeer :: NOMOPC, 'Valida');
                $apliuser = ApliUserPeer :: doSelect($c);
                if($apliuser){
                    if($apliuser->getPrioridad()){
                      $this->fcpagos->setHab(true);
                      }
                }
	}

	public function configGridrecargdescto($numpag='',$reg = array ()) {
                if(count($reg)>0){
  
                   for ($i=0 ; $i < count($reg); $i++){
               
                        $fcrecdespag = new Fcrecdespag();
                        $fcrecdespag->setCodrede($reg[$i]['codrede']);
                        $fcrecdespag->setNomdes($reg[$i]['nomdes']);
                        $fcrecdespag->setMonto($reg[$i]['monto']);
                        $fcrecdespag->setNumcuo($reg[$i]['numcuo']);
                        $per[]=$fcrecdespag;


                    }
                }else{
                    $c = new Criteria();
                    $c->add(FcrecdespagPeer :: NUMPAG, $numpag);
                    $per = FcrecdespagPeer :: doSelect($c);

                }
		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrecpag/' . sfConfig :: get('sf_app_module_config_dir_name') . '/gridrecargdescto');
                $this->columnas[0]->setEliminar(true,'calcularTotales()');
             

                if($this->fcpagos->getId()!=''){
                    $this->columnas[1][0]->setHTML('readonly="true"');
                    $this->columnas[1][3]->setHTML('readonly="true"');                
                }else{
                    $this->columnas[1][0]->setCatalogo('fcdefdesc','sf_admin_edit_form', array('coddes'=>'1','nomdes'=>'2'), 'Facrecpag_Fcdefdesc');
                }
                $this->gridrecargdescto = $this->columnas[0]->getConfig($per);

                $this->fcpagos->setGridrecargdescto($this->gridrecargdescto);

	}

/*        public function configGrid_detOtr($numdec='',&$montototal=0){
                $dec = array();
                $c = new Criteria();
                $c->add(FcdeclarPeer::RIFCON,  $this->fcpagos->getRifcon());
                $c->add(FcdecpagPeer :: NUMDEC, $numdec);
                $c->addAscendingOrderByColumn(FcdecpagPeer::NUMREF);
                $c->addAscendingOrderByColumn(FcdecpagPeer::TIPO);
                $c->addAscendingOrderByColumn(FcdecpagPeer::NUMERO);
                $c->addAscendingOrderByColumn(FcdecpagPeer::FECVEN);
                $c->addAscendingOrderByColumn(FcdecpagPeer::NUMDEC);
                $reg = FcdeclarPeer :: doSelect($c);
                if(!$reg){
                    foreach ($reg as $datos) {
                        $per = new Fcdeclar();
                    	$per->setFueing(Herramientas :: getX_vacio('codfue', 'fcfuepre', 'nomabr', $per->getFueing()));
                        $per->setNumdec($datos->getNumdec());
                        $per->setNumref($datos->getNumref());
                        $per->setNombre($datos->getNombre());
                        $per->setFecven($datos->getFecven());
                        $per->setNumero($datos->getNumero());
                        $per->setTipo($datos->getTipo());
                        $per->setMondec($datos->getMondec());
                        $montototal=$montototal+$datos->getMondec();
                        $per->setAutliq(H :: FormatoMonto($datos->getAutliq()));
                        $per->setMora(H :: FormatoMonto($datos->getMora()));
                        $per->setProntopg(H :: FormatoMonto($datos->getProntopg()));
                        $per->setMontopag(H :: FormatoMonto($datos->getMondec() + $datos->getMora() - $datos->getProntopg() - $datos->getAutliq()));
                        $per->setMontopagcon(H :: FormatoMonto($datos->getAutliq()));
                        $per->setSaldo(H :: FormatoMonto($datos->getMontopag() - $datos->getMontopagcon()));
                        if ($datos->getEdodec() == 'P') {
                                $per->setCheck('true');
                        }
                        $dec[]=$per;
                     }
                }
                $this->numreg=count($dec);
                $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrecpag/' . sfConfig :: get('sf_app_module_config_dir_name') . '/griddetalles');

		$this->griddetalles = $this->columnas[0]->getConfig($dec);

		$this->fcpagos->setGriddetalles($this->griddetalles);

        }*/
        	public function configGriddetalles($rifcon='',$numref='',$numpag='',$sw=false,$criterio='') {
                 $datos= array();
                   if($sw){
                    $c = new Criteria();
                    $c->add(FcdeclarPeer::RIFCON,  $rifcon);
                    $c->add(FcdeclarPeer::EDODEC, array('X','P'),Criteria::NOT_IN);            
                     if($numref!=''){
                        if($criterio !='O'){
                        $c->add(FcdeclarPeer::NUMREF, $numref);
                            }else{
                            $c->add(FcdeclarPeer::NUMDEC, $numref);
                    }
                    }
                    $c->addAscendingOrderByColumn(FcdeclarPeer::NUMREF);
                    $c->addAscendingOrderByColumn(FcdeclarPeer::TIPO);
                    $c->addAscendingOrderByColumn(FcdeclarPeer::FECVEN);
                    $c->addAscendingOrderByColumn(FcdeclarPeer::NUMERO);                    
                    $c->addAscendingOrderByColumn(FcdeclarPeer::NUMDEC);
                    $datos= FcdeclarPeer :: doSelect($c);
                     for ($i = 0; $i < count($datos); $i++) {
                         //$datos[$i]->setNumero($i+1);
                         $datos[$i]->setMontopag(H :: FormatoMonto($datos[$i]->getMondec() + $datos[$i]->getMora() - $datos[$i]->getProntopg()));
		         $datos[$i]->setMontopagcon(H :: FormatoMonto($datos[$i]->getMondec() + $datos[$i]->getMora() - $datos[$i]->getProntopg()));//(H :: FormatoMonto($datos[$i]->getAutliq()));
			 $datos[$i]->setSaldo(H :: FormatoMonto( H::toFloat($datos[$i]->getMondec()) + H::toFloat($datos[$i]->getMora()) - H::toFloat($datos[$i]->getProntopg()) - H::toFloat($datos[$i]->getMontopagcon())));
                       
                            if ( $datos[$i]->getEdodec() == 'P') {
					 $datos[$i]->setCheck('1');
				}else{
                                     $datos[$i]->setCheck('0');
                                }
                         $datos[$i]->setStsdec('P');
                         $datos[$i]->setSumfue(H::getX_vacio('CODFUE', 'Fcfuepre', 'Sumfue', $datos[$i]->getFueing()));

                       }
        
                }else{
                $c = new Criteria();
		$c->add(FcdecpagPeer :: NUMPAG, $numpag);
		$reg = FcdecpagPeer :: doSelect($c);
                if(count($reg)>0){
		foreach ($reg as $per) {
                       
			$c = new Criteria();
			$c->add(FcdeclarPeer :: RIFCON, $rifcon);
			$c->add(FcdeclarPeer :: NUMDEC, $per->getNumdec());
			$c->add(FcdeclarPeer :: NUMREF, $per->getNumref());
			$c->add(FcdeclarPeer :: FECVEN, $per->getFecven());
			$c->add(FcdeclarPeer :: NUMERO, $per->getNumero());
			$c->add(FcdeclarPeer :: FUEING, $per->getFueing());
			$registros = FcdeclarPeer :: doSelect($c);
                        if($registros){
			foreach ($registros as $dat) {
                                $fcdeclar=  new Fcdeclar();
                                $fcdeclar->setNombre($dat->getNombre());
                                $fcdeclar->setNumref($dat->getNumref());
                                $fcdeclar->setAutliq($dat->getAutliq());
                                $fcdeclar->setMora($dat->getMora());
                                $fcdeclar->setTipo($dat->getTipo());
                                $fcdeclar->setNumero($per->getNumero());
                                $fcdeclar->setNumdec($per->getNumdec());
                                $fcdeclar->setFecven($per->getFecven());
                                $fcdeclar->setMondec($dat->getMondec());
				$fcdeclar->setFueing($per->getFueing());
                                $fcdeclar->setStsdec($dat->getStsdec());
                                $fcdeclar->setSumfue(H::getX_vacio('CODFUE', 'Fcfuepre', 'Sumfue', $per->getFueing()));
				$fcdeclar->setMontopag(H :: FormatoMonto($dat->getMondec() + $dat->getMora() - $dat->getProntopg()));
				$fcdeclar->setMontopagcon(H :: FormatoMonto($dat->getAutliq()));
				$fcdeclar->setSaldo(H :: FormatoMonto($dat->getMontopag() - $dat->getMontopagcon()));

                                if ($dat->getEdodec() == 'P') {
					$fcdeclar->setCheck('1');
				}else{
                                    	$fcdeclar->setCheck('0');
                                }
                                 $datos[]=$fcdeclar;
                        }
			} else {
                                $fcdeclar=  new Fcdeclar();
				$fcdeclar->setCheck('1');
				$fcdeclar->setFueing($per->getFueing());
                                $fcdeclar->setSumfue(H::getX_vacio('CODFUE', 'Fcfuepre', 'Sumfue', $per->getFueing()));
				$fcdeclar->setNombre('REGISTRO ELIMINADO EN OTROS INGRESOS');
				$fcdeclar->setTipo('PAG');
				$fcdeclar->setMondec(H :: FormatoMonto(0));
				$fcdeclar->setAutliq(H :: FormatoMonto(0));
				$fcdeclar->setMora(H :: FormatoMonto(0));
				$fcdeclar->setProntopg(H :: FormatoMonto(0));
				$fcdeclar->setMontopag(H :: FormatoMonto(0));
				$fcdeclar->setMontopagcon(H :: FormatoMonto(0));
				$fcdeclar->setSaldo(H :: FormatoMonto(0));
                                $datos[]=$fcdeclar;
                        }
			
		}}}

		$this->numreg=count($datos);

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrecpag/' . sfConfig :: get('sf_app_module_config_dir_name') . '/griddetalles');
               if($this->fcpagos->getId()!=''){
                $this->columnas[1][0]->setHTML('readonly="true"');

                }else{
                  $this->columnas[1][0]->setHTML('onClick="habilitarCampo(this.id);"');

                }       
		$this->griddetalles = $this->columnas[0]->getConfig($datos);

		$this->fcpagos->setGriddetalles($this->griddetalles);

	}
     
	public function configGridformpag($reg = array (),$numpag='',$monefe='') {
		$datos = array ();
		$c = new Criteria();
		$c->add(FcdetpagPeer :: NUMPAG,$numpag);
		$reg = FcdetpagPeer :: doSelect($c);
		//La primera Fila debe contener esto:
	/*	$datos[0]["id"] = '';
		$datos[0]["tippag"] = '001';
		$datos[0]["nrodet"] = '';
                $datos[0]["ctaban"]='';
                $datos[0]["nomcue"]='';
		$datos[0]["monpag"] = H :: FormatoMonto($monefe);
		//Union de la primera fila + la Busqueda
		$reg = array_merge($datos, $reg);*/
                $pagliq=H::getConfApp2('pagliq', 'hacienda', 'facrecpag');

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrecpag/' . sfConfig :: get('sf_app_module_config_dir_name') . '/gridformpag');
		$this->columnas[1][0]->setCombo(Fcdetpag::ListaTipPag());
                  if($this->fcpagos->getId()!='' && $pagliq!='S'){
                $this->columnas[1][0]->setHTML('readonly="true"');
                $this->columnas[1][1]->setHTML('readonly="true"');
                $this->columnas[1][2]->setHTML('readonly="true"');
                $this->columnas[1][3]->setHTML('readonly="true"');
                $this->columnas[1][4]->setHTML('readonly="true"');
                $this->columnas[1][5]->setHTML('readonly="true"');
                }else{
             
                 $this->columnas[1][3]->setCatalogo('tsdefban','sf_admin_edit_form', array('Numcue'=>'4','Nomcue'=>'5'), 'Ingreging_tsdefban');
                }
                
                $this->columnas[0]->setEliminar(true,'calcularTotales()');
		$this->gridformpag = $this->columnas[0]->getConfig($reg);
		$this->fcpagos->setGridformpag($this->gridformpag);

	}

	public function executeAjax() {

		$codigo = $this->getRequestParameter('codigo', '');
		$ajax = $this->getRequestParameter('ajax', '');
                $vienededeclaracion= $this->getRequestParameter('vienededeclaracion', '');
                $javascript = "";
                $cajtexmos   = $this->getRequestParameter('cajtexmos','');
                $this->ajax=$ajax;
                $this->msg='';
                $this->valor='';
                $msg = -1;
                $valor=0;
                $this->js='';
		switch ($ajax) {
			case '1' :
                                $numpag = $this->getRequestParameter('numpag','');
                                $fecpag = $this->getRequestParameter('fecpag', '');
                                $feccor = $this->getRequestParameter('feccor', '');
                                $numref = $this->getRequestParameter('seleccion', '');
                                $numdec = $this->getRequestParameter('numdec', '');
                                $criterio = $this->getRequestParameter('criterio', '');
                                $id=$this->getRequestParameter('id', '');
                                $montototal=0;
                                $montomora=0;$montoprontopg=0;$montoautliq=0;$montopagcon=0;
                                $saldo1= 0;
                                $saldo2=0;$porcprontop=0;$deudafrac='';
				$c = new Criteria();
				$c->add(FcconrepPeer :: RIFCON, trim($codigo));
				$fcconrep2 = FcconrepPeer :: doSelectOne($c);
				if (count($fcconrep2) > 0) {
					$nomcon = $fcconrep2->getNomcon();
					$dircon = $fcconrep2->getDircon();
					if ($fcconrep2->getNaccon() == 'V') {
						$javascript = $javascript . "$('fcpagos_naccon_V').checked=true; ";
					} else {
						$javascript = $javascript . "$('fcpagos_naccon_E').checked=true; ";
					}
					if ($fcconrep2->getTipcon() == 'N') {
						$javascript = $javascript . "$('fcpagos_tipcon_N').checked=true; ";
					} else {
						$javascript = $javascript . "$('fcpagos_tipcon_J').checked=true; ";
					}

                                        //Deuda
                                        $cr= new Criteria();
                                        $cr->add(FcdeclarPeer :: RIFCON, trim($codigo));
                                        if($numref !=''){
                                            if($criterio !='O'){
                                            $cr->add(FcdeclarPeer :: NUMREF, trim($numref));                            
                                            }else{
                                             $cr->add(FcdeclarPeer :: NUMDEC, trim($numref));
                                        }
                                        }
                                        $fcdeclar = FcdeclarPeer :: doSelectOne($cr);
                                        if($fcdeclar){
                                            $this->params=array();
                                            $this->fcpagos = $this->getFcpagosOrCreate();
                                            $this->updateFcpagosFromRequest();
                                            $this->labels = $this->getLabels();

                                            Hacienda :: CalcularMora($codigo,$fecpag,$feccor,$numref,$vienededeclaracion,$porcprontop,$deudafrac);
                                            if(!$vienededeclaracion){
                                                 $this->configGriddetalles($codigo,$numref,'',true,$criterio);
                                            }/*else{
                                                 $this->configGrid_detOtr($numdec,&$montototal);
                                            }*/
                                            $saldo1= $montototal+$montomora-$montoprontopg;
                                            $saldo2=$montototal-$montoautliq;
                                          
                                        }else{
                                             $javascript = $javascript ."alert('Contribuyente no Tiene Deuda');";
                                             $this->params=array();
                                             $this->fcpagos = $this->getFcpagosOrCreate();
                                             $this->updateFcpagosFromRequest();
                                             $this->labels = $this->getLabels();
                                             $this->configGriddetalles('','','',true) ;

                                        }
                                        
				}else{
                                    $javascript = "alert('El Contribuyente no existe');";
                                }
                                $c= new Criteria();

                                $output = '[["fcpagos_nomcon","' . $nomcon . '",""],["fcpagos_dircon","' . $dircon . '",""],
                                            ["javascript","' . $javascript . '",""],["fcpagos_deudafrac","' . $deudafrac . '",""]  ]';

                                break;

			case '2' :
                            $funval = $this->getRequestParameter('funval', '');
                            $password = $this->getRequestParameter('password', '');
                            $edo='';$fecha='';$mensaje='';
                            if($password!="" && $password != 'null'){
                                 $c= new Criteria();
                                 $c->add(FcaccesoPeer :: PASUSU, $password);
                                 $fcacceso = FcaccesoPeer :: doSelectOne($c);
                                 if($fcacceso){
                                    
                                    if(Hacienda::ValidarPago($codigo,$funval,$edo)){
                                         $fecha =date('d/m/Y');
                                         $mensaje='VALIDADO';
                                        $javascript="alert('Pago validado con Exito'); $('divfunval').hide(); $('divfechahora').hide(); $('divvalidar').hide(); $('divanular').hide(); $('divinvalidar').show(); $('divmensaje').show();";
                                    }
                                }else{
                                         $javascript="alert('CLAVE DE REVERSO INVALIDA, ASEGURESE QUE LA INGRESO CORRECTAMENTE');";
                                     }
                                 }else{
                                        $javascript="alert('Debe introducir el password si desea validar');";
                                 }
                            $output = '[["javascript","' . $javascript . '",""],["fcpagos_edopag","' . $edo . '",""],["fcpagos_fecrec","' . $fecha . '",""],["fcpagos_mensaje","' . $mensaje . '",""]]';

                              break;
                         case '3' :
                             $password = $this->getRequestParameter('password', '');
                             $numpag = $this->getRequestParameter('numpag', '');
                             if($password!="" && $password != 'null'){
                                 $c= new Criteria();
                                 $c->add(FcaccesoPeer :: PASUSU, $password);
                                 $fcacceso = FcaccesoPeer :: doSelectOne($c);
                                 if($fcacceso){
                                     Hacienda::reversarPago($numpag);
                                       $mensaje='';
                                     $javascript="alert('Pago reversado con Exito');$('divinvalidar').hide();$('divvalidar').show();$('divmensaje').hide();$('divanular').show()";
                                 }else{
                                     $javascript="alert('CLAVE DE REVERSO INVALIDA, ASEGURESE QUE LA INGRESO CORRECTAMENTE');";
                                 }
                             }else{
                                    $javascript="alert('Debe introducir el password si desea reversar');";
                             }
                             $output = '[["javascript","' . $javascript . '",""],["fcpagos_mensaje","' . $mensaje . '",""]]';
                             break;
                         case '4' :
                             $password = $this->getRequestParameter('password', '');
                             $id = $this->getRequestParameter('numpag', '');
                             if($password!="" && $password != 'null'){
                                 $mensaje='ANULADO';
                                 $c= new Criteria();
                                 $c->add(FcaccesoPeer :: PASUSU, $password);
                                 $fcacceso = FcaccesoPeer :: doSelectOne($c);
                               /*  if($fcacceso){
                                     $javascript="f = document.createElement('form'); document.body.appendChild(f); f.method = 'POST'; f.action = '/hacienda_dev.php/facrecpag/delete/id/$id'; f.submit();";
                                 }else{*/
                                  if(!$fcacceso){
                                     $this->msg="CLAVE DE ANULACION INVALIDA, ASEGURESE QUE LA INGRESO CORRECTAMENTE";
                                 }else{
                                     $this->valor=$id;
                                 }
                             }else{
                                    $this->msg="Debe introducir el password si desea eliminar";
                             }
                          //   $output = '[["javascript","' . $javascript . '",""]]';
                            $output = '[["","",""],["","",""],["","",""]]';
                             break;
                          case '5' :
                               $this->params=array();
                               $this->fcpagos = $this->getFcpagosOrCreate();
                               $this->updateFcpagosFromRequest();
                               $this->labels = $this->getLabels();
                               $javascript= $javascript."desmarcarTodos();";
                               $this->configGridrecargdescto();
                               $output = '[["javascript","' . $javascript . '",""]]';

                          break;
                         case '6' :
                             $password = $this->getRequestParameter('password', '');
                             $numpag = $this->getRequestParameter('numpag', '');
                             if($password!="" && $password != 'null'){
                                 $c= new Criteria();
                                 $c->add(FcaccesoPeer :: PASUSU, $password);
                                 $fcacceso = FcaccesoPeer :: doSelectOne($c);
                                 if($fcacceso){                                     
                                     $javascript="$('anulacion').show();$('segurid').hide();";
                                 }else{
                                     $javascript="alert('CLAVE INVALIDA, ASEGURESE QUE LA INGRESO CORRECTAMENTE'); $('fcpagos_password').value=''; $('fcpagos_password').focus();";
                                 }
                             }else{
                                    $javascript="alert('Debe introducir el password si desea anular');";
                             }
                             $output = '[["javascript","' . $javascript . '",""]]';
                             break;                      
			default :
                              
                               break;

		}

		// Instruccion para escribir en la cabecera los datos a enviar a la vista
		$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                 if($ajax!=1 && $ajax!=4 && $ajax!=5){
                return sfView::HEADER_ONLY;
                }
	}

	/**
	 *
	 * Función que se ejecuta luego los validadores del negocio (validators)
	 * Para realizar validaciones específicas del negocio del formulario
	 * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
	 *
	 */
	public function validateEdit() {
		$this->coderr = -1;
                $cont=0;
                $contpag=0;

		// Se deben llamar a las funciones necesarias para cargar los
		// datos de la vista que serán usados en las funciones de validación.
		// Por ejemplo:

		if ($this->getRequest()->getMethod() == sfRequest :: POST) {

                        $this->fcpagos = $this->getFcpagosOrCreate();
                        $this->updateFcpagosFromRequest();
                        $cad=split('-', $this->getRequestParameter('fcpagos[saldo]'));
                        if (count($cad)>1)
                            $monto=$cad[1];
                        else
                            $monto= $this->getRequestParameter('fcpagos[saldo]');

                        if (H::toFloat($monto)!=0){
                              $this->coderr=748;
                             return false;
                        }
                        $this->configGriddetalles('','','',false,true) ;
                        $griddetalle = Herramientas::CargarDatosGridv2($this,$this->griddetalle);
                        $this->configGridformpag();
                        $gridformpag = Herramientas::CargarDatosGridv2($this,$this->gridformpag);
                        $this->configGridrecargdescto();
                        $gridrecargdescto = Herramientas::CargarDatosGridv2($this,$this->gridrecargdescto);
                        $pagliq=H::getConfApp2('pagliq', 'hacienda', 'facrecpag');
                        if ($pagliq=='S')
                        {
                            if ($this->fcpagos->getId())
                            {
                                $j=0;
                                 $x=$gridformpag[0];
                                while ($j<count($x))
                                {
                                    if($x[$j]->getTippag() =="" && $x[$j]->getMonpag()>0){
                                          $this->coderr=749;
                                          return false;
                                    }
                                       $c= new Criteria();
                                        $c->add(FctippagPeer::TIPPAG, $x[$j]->getTippag());
                                        $lista = FctippagPeer::doSelectOne($c);
                                         if(strtoupper($lista->getDespag())!='EFECTIVO'){

                                     if($x[$j]->getNrodet() =="" && $x[$j]->getMonpag()>0){
                                         $this->coderr=750;
                                         return false;
                                    }}
                                    $j++;
                                }
                            }
                        }else {
                        $j=0;
                         $x=$gridformpag[0];
                            while ($j<count($x))
                            {
                                if($x[$j]->getTippag() =="" && $x[$j]->getMonpag()>0){
                                      $this->coderr=749;
                                      return false;
                                }
                                   $c= new Criteria();
                                    $c->add(FctippagPeer::TIPPAG, $x[$j]->getTippag());
                                    $lista = FctippagPeer::doSelectOne($c);
                                     if(strtoupper($lista->getDespag())!='EFECTIVO'){

                                 if($x[$j]->getNrodet() =="" && $x[$j]->getMonpag()>0){
                                     $this->coderr=750;
                                     return false;
                                }}
                                $j++;
                            }
                        }
            
                           if ($this->getRequestParameter('fcpagos[pagcon]')!=$this->getRequestParameter('fcpagos[totalpag]')){

                                  $j=0;$cont=0;
                                   $x=$gridrecargdescto[0];
                                    while ($j<count($x))
                                    {
                                        if($x[$j]->getCodrede() ==''){
                                                $this->coderr=751;
                                                 return false;
                                        }
                                         if($x[$j]->getMonto()==0){
                                             $this->coderr=752;
                                          return false;
                                        }
                                        $j++;
                                    }
                           }
                        
			if ($this->coderr != -1) {
				return false;
			} else
				return true;

		} else
			return true;

	}

	public function configGrid_detalles_nuevo($reg = array (), $regelim = array ()) {
		$c = new Criteria();
		$c->add(FcdeclarPeer :: RIFCON, $this->fcconrep2->getRifcon());
		$opc1 = $c->getNewCriterion(FcdeclarPeer :: EDODEC, 'P', Criteria :: NOT_EQUAL);
		$opc2 = $c->getNewCriterion(FcdeclarPeer :: EDODEC, 'X', Criteria :: NOT_EQUAL);
		$opc1->addAnd($opc2);
		$c->add($opc1);

		$c->addAscendingOrderByColumn(FcdeclarPeer :: NUMREF);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: FECVEN);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: TIPO);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: NUMERO);
		$c->addAscendingOrderByColumn(FcdeclarPeer :: NUMDEC);

		$reg = FcdeclarPeer :: doSelect($c);

		foreach ($reg as $per) {
			$per->setFueing(Herramientas :: getX_vacio('codfue', 'fcfuepre', 'nomabr', $per->getFueing()));
			$per->setMora(H :: FormatoMonto('0'));
			$per->setMontopag(H :: FormatoMonto($per->getMondec() + $per->getMora() - $per->getProntopg() - $per->getAutliq()));
			$per->setMontopagcon(H :: FormatoMonto('0'));
			$per->setSaldo(H :: FormatoMonto(($per->getMondec() + $per->getMora() - $per->getProntopg() - $per->getAutliq()) - $per->getMontopagcon()));
			if ($per->getEdodec() == 'P') {
				$per->setCheck('true');
			}
		}

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrecpag/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detalles');
		$signo = "+";
		$signo2 = "-";
		$this->columnas[1][0]->setHTML(' onclick="AsignarMonto(this.id)" ');
		#$this->columnas[1][0]->setHTML(' onBlur="toAjaxUpdater(obtenerColumna(this.id,11,'.chr(39).$signo.chr(39).'),2,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).');" ');
		//$this->columnas[1][0]->setHTML('readOnly="false" ');

		$this->grid = $this->columnas[0]->getConfig($reg);

		$this->fcpagos->setGrid_detalles($this->grid);

	}

	/**
	 * Función para actualziar el grid en el post si ocurre un error
	 * Se pueden colocar aqui los grids adicionales
	 *
	 */
	public function updateError() {
                $this->setVars();
		$this->configGriddetalles();
		$this->configGridformpag();
		$this->configGridrecargdescto();
                $griddetalles = Herramientas::CargarDatosGridv2($this,$this->griddetalles);
                $gridformpag = Herramientas::CargarDatosGridv2($this,$this->gridformpag);
                $gridrecargdescto = Herramientas::CargarDatosGridv2($this,$this->gridrecargdescto);
	}

	public function saving($clasemodelo)
	{
	    $griddetalles     = Herramientas::CargarDatosGridv2($this,$this->griddetalles);
	    $gridformpag  = Herramientas::CargarDatosGridv2($this,$this->gridformpag);
	    $gridrecargdescto = Herramientas::CargarDatosGridv2($this,$this->gridrecargdescto);
            $msjuno =-1;
            $msjdos ="";
	    $error = Hacienda::SalvarFacrecpag($clasemodelo, $griddetalles, $gridformpag, $gridrecargdescto, $msjuno, $msjdos);
            if ($msjuno!=-1) { 
                $this->msjpag= $msjdos;
                return  $msjuno;
                }
            return -1;

	}
       protected function saveFcpagos($fcpagos)
              {

                // habilitar la siguiente línea si se usa grid
                //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

                try {

                  // Modificar la siguiente línea para llamar al método
                  // correcto en la clase del negocio, ej:
                  // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

                  // OJO ----> Eliminar esta linea al modificar este método
                  $this->coderr = $this->saving($fcpagos);


                  if(is_array($this->coderr)){
                    foreach ($this->coderr as $ERR){
                      $err = Herramientas::obtenerMensajeError($ERR);
                      $this->getRequest()->setError('',$err);
                      $this->updateError();}
                      return sfView::SUCCESS;
                  }elseif($this->coderr!=-1){
                    $err = Herramientas::obtenerMensajeError($this->coderr);
                    $this->getRequest()->setError('',$err.'  '.$this->msjpag);
                    $this->updateError();
                    return sfView::SUCCESS;
                  }else
                  return -1;

                } catch (Exception $ex) {

                  $this->coderr = 0;
                  $err = Herramientas::obtenerMensajeError($this->coderr);
                  $this->getRequest()->setError('',$err);
                  $this->updateError();
                return sfView::SUCCESS;
                }

  }
	public function deleting($clasemodelo) {
            if($clasemodelo->getEdopag()=='V'){
                return 753;
            }else{

		return Hacienda::eliminarFacrecpag($clasemodelo);
	}

        }

	public function executeAjaxgrid() {
                $name = $this->getRequestParameter('grid', 'a');
    		$grid = $this->getRequestParameter('grid'.$name,'');
                $nuevo= $this->getRequestParameter('id','');
                $fila = $this->getRequestParameter('fila','');
                $col = $this->getRequestParameter('columna', '');
                $fecpag= $this->getRequestParameter('fcpagos_fecpag','');
                $pagcon= $this->getRequestParameter('fcpagos_pagcon','');
                $montodeuda= $this->getRequestParameter('fcpagos_montodeuda','');
                $porcprontopg= $this->getRequestParameter('fcpagos_porcentaje','');
                $rifcon= $this->getRequestParameter('fcpagos_rifcon','');
                $numref= $this->getRequestParameter('fcpagos_seleccion','');
                $feccor= $this->getRequestParameter('fcpagos_feccor','');
                $numpag= $this->getRequestParameter('fcpagos_numpag','');
                $vienededeclaracion= $this->getRequestParameter('fcpagos_vienededeclaracion','');
                $criterio = $this->getRequestParameter('fcpagos[criterio]');
                $javascript="";  $jsonextra=""; $com='';           
                $acumrec=0;$acumdes=0;$montot=0;$montototal=0;$saldo=0;$montoprontopg=0;
                $dateFormat = new sfDateFormat('es_VE');
                $sw=false;
                $cm='';

                $this->params=array();
                $this->fcpagos = $this->getFcpagosOrCreate();
                $this->updateFcpagosFromRequest();
                $this->labels = $this->getLabels();
                $this->setVars();
                switch ($name) {
                  //Grid detalle
                  case 'a':
                      $gridrecargdescto=$this->getRequestParameter('gridc','c');
                      switch ($col) {
                      case '10':
                      case '14':
                            if(H::toFloat($grid[$fila][13]) > H::toFloat($grid[$fila][12])){
                                   $javascript=$javascript."alert('Monto Incluido Excede el Total a Pagar');";
                            }else{
                                $mtoc = H::toFloat($grid[$fila][12])-H::toFloat($grid[$fila][13]);
                                $grid[$fila][14]= number_format($mtoc,2,',','.');
                                $javascript= $javascript." calcularTotales();";
                                $this->CargarGridRecargo($grid[$fila][6],$grid[$fila][3],$criterio,$numref,$feccor,$rifcon,$numpag,$grid[$fila][13],$montodeuda,$porcprontopg,$gridrecargdescto,$grid,$cm,$this->fcpagos->getVienededeclaracion(),$javascript);
                            }

                            $jsonextra=',["javascript","' . $javascript . '",""]'.$cm;

                          break;
                     case '1':
                           $this->CargarGridRecargo($grid[$fila][6],$grid[$fila][3],$criterio,$numref,$feccor,$rifcon,$numpag,$grid[$fila][13],$montodeuda,$porcprontopg,$gridrecargdescto,$grid,$cm,$this->fcpagos->getVienededeclaracion(),$javascript);
                           //$javascript= $javascript." calcularTotales();";
                           $jsonextra='["javascript","' . $javascript . '",""]'.$cm;
                         break;
                      }
                   break;
                   //Grid de Recargo y descuento
                  case 'c' :

                  switch ($col) {   
                    case '1':
                    case '4':
                         $griddetalle = $this->getRequestParameter('grida','');
                         $monto=0;
                         $codigo=$grid[$fila][$col-1];
                         if (!Hacienda::verificarCoincidencia($grid,$codigo,$fila,$col-1))
                           {

                                $c = new Criteria();
                                $c->add(FcdefdescPeer :: CODDES, $grid[$fila][0]);
                                $fcrecdes = FcdefdescPeer :: doSelectOne($c);
                                if($fcrecdes){
                                   // if($fcrecdes->getRecdes() == "R" ){
                                   //    $grid[$fila][2]='Recargo';
                                   // }else{
                                        $grid[$fila][1]= $fcrecdes->getNomdes();
                                        $grid[$fila][2]='Descuento';
                                        //Falta el griddetalle
                                        Hacienda ::MontoDescuentoEventual($griddetalle,$grid[$fila][0],$rifcon,$numref,$monto,$vienededeclaracion,$feccor);
                                        if ($monto==0)
                                        {
                                             $grid[$fila][0]='';
                                             $grid[$fila][1]='';
                                             $grid[$fila][2]='';
                                             $grid[$fila][3]='0,00';
                                             //$javascript=$javascript."alert('El Descuento no esta asociado a la Fuente de Ingresos ó esta Limitado');";
                                        }else  {                                        
                                            $grid[$fila][3]=number_format(H::toFloat($monto),2,',','.') ;
                                        }
                                        //comentado en vb
                                        /* if($fcrecdes->getCodrede()=='00' ){
                                           $mifecha='01/01/'.date('y');
                                           if((H::dateDiff('d',$dateFormat->format($mifecha, 'i', $dateFormat->getInputPattern('d')), $fecpag)>30) ){
                                               $grid[$fila][3]= number_format(H::toFloat(($pagcon*10)/100),2,',','.');
                                           }else if((H::dateDiff('d', $dateFormat->format($mifecha, 'i', $dateFormat->getInputPattern('d')), $fecpag)>30)&&(H::dateDiff('d', $dateFormat->format($mifecha, 'i', $dateFormat->getInputPattern('d')), $fecpag)<=59) ){
                                                $grid[$fila][3]=number_format(H::toFloat(($pagcon*8)/100),2,',','.') ;
                                           }
                                           }*/
                                     // }
                                    }                          
                              
                            Hacienda::calcularrecdes($grid,$acumdes,$acumrec,$montototal,$montot,$saldo,$montoprontopg,$pagcon,$porcprontopg,$montodeuda,$montotpag);
                            //$javascript= $javascript." calcularTotales();";
                            if($montot < 0){
                                 $javascript = $javascript ."alert('Monto Incluido Excede el Total a Pagar');";
                                 $grid[$fila][3]=H::toFloat(0);
                                 $acumrec=0;$acumdes=0;$montot=0;$montotpag=0;$montototal=0;$saldo=0;$montoprontopg=0;
                                 Hacienda::calcularrecdes($grid,$acumdes,$acumrec,$montototal,$montot,$saldo,$montoprontopg,$pagcon,$porcprontopg,$montodeuda,$montotpag);
                              
                               }
                           }else{
                                 $grid[$fila][0]='';
                                 $grid[$fila][1]='';
                                 $grid[$fila][2]='';
                                 $grid[$fila][2]='0,00';
                                 $javascript=$javascript."alert('Recargo ó Descuento ya ha sido incluido');";
                           }
            
                       $jsonextra=',["fcpagos_montodscprntopago","' .number_format($montoprontopg,2,',','.'). '",""],["fcpagos_saldo","' .number_format($saldo,2,',','.'). '",""],["fcpagos_totalmon","' .number_format($montototal,2,',','.'). '",""],["fcpagos_monpag","' .number_format($montot,2,',','.'). '",""],
                                     ["fcpagos_totalpag","' .number_format($montotpag,2,',','.'). '",""],["fcpagos_recargo","' .number_format($acumrec,2,',','.'). '",""],["fcpagos_descuento","' .number_format($acumdes,2,',','.'). '",""],["javascript","' . $javascript . '",""]';

                        break;
                    }
                    break;
                  //Grid de Forma de Pago
                   case 'b':
                     $recargo= $this->getRequestParameter('fcpagos_recargo','');
                     $descuento= $this->getRequestParameter('fcpagos_descuento','');
                     $saldo= $this->getRequestParameter('fcpagos_saldo','');
                     $acum=0;
                     $sw=true;
                      switch ($col) {
                        case '6':
                                Hacienda::totalizarSaldo($grid,$pagcon,$recargo,$descuento,$montot,$acum,$porcprontopg,$montodeuda,$col);
                                 if($grid[$fila][$col-1]==0){
                                     $grid[$fila][2]= number_format($acum,2,',','.');
                                 }
                                 Hacienda::totalizarSaldo($grid,$pagcon,$recargo,$descuento,$montot,$acum,$porcprontopg,$montodeuda,$col);
                                 if($acum < 0){
                                         $javascript=$javascript."alert('El Monto Incluido Excede el Saldo');";
                                         $grid[$fila][$col-1]=number_format(0,2,',','.');
                                          Hacienda::totalizarSaldo($grid,$pagcon,$recargo,$descuento,$montot,$acum,$porcprontopg,$montodeuda,$col);
                                 }
                                  $jsonextra=',["fcpagos_montodscprntopago","' .number_format($montoprontopg,2,',','.'). '",""],["fcpagos_saldo","' .number_format($saldo,2,',','.'). '",""],["fcpagos_totalmon","' .number_format($montototal,2,',','.'). '",""],["fcpagos_monpag","' .number_format($montot,2,',','.'). '",""],
                                     ["fcpagos_totalpag","' .number_format($montot,2,',','.'). '",""],["fcpagos_recargo","' .number_format($acumrec,2,',','.'). '",""],["fcpagos_descuento","' .number_format($acumdes,2,',','.'). '",""],["javascript","' . $javascript . '",""]';

                          break;
                        }

                    }

		if ($name=='a' && $col=='1') $output = '['.$jsonextra.']';
                else $output = Herramientas :: grid_to_json($grid, $name,$jsonextra);
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
             if($sw){
                return sfView::HEADER_ONLY;
             }
	}


      public function CargarGridRecargo($fecha,$numdec,$criterio,$numref,$feccor,$rifcon,$numpag,$pagcon,$montodeuda,$porcprontopg,$gridrecargdescto,$griddetalle,&$cm,$dec,&$javascript){
        $sw=false;
        $montototal=0;
        $montomora=0;$montoprontopg=0;$montoautliq=0;
        $acumrec=0;$acumdes=0;$montot=0;$montototal=0;$saldo=0;$montoprontopg=0;
        $gridnuevo=array();
        $recaudo='N';
        if($dec){
            $criterio= 1;
        }

        if(!Hacienda ::CalculoDescuentoAut($fecha,$numdec,$rifcon,$numref,$feccor,$griddetalle,$gridrecargdescto,$gridnuevo)){
            $javascript=$javascript." alert('El Contribuyente no cumple con todos los Recaudos para Optar al Descuento');";
            $recaudo='N';
           }else{
               $recaudo='S';
           }
       Hacienda::calcularSaldos($gridnuevo,$acumdes,$acumrec,$montototal,$montot,$saldo,$montoprontopg,$pagcon,$porcprontopg,$montodeuda);

       $this->configGridrecargdescto('',$gridnuevo);
       
       $javascript= $javascript." calcularTotales();";

       $cm = ',["fcpagos_montodscprntopago","' .number_format($montoprontopg,2,',','.'). '",""],["fcpagos_recargo","' .number_format($acumrec,2,',','.'). '",""],["fcpagos_descuento","' .number_format($acumdes,2,',','.'). '",""],["fcpagos_recaudo","' . $recaudo . '",""]';

  }
  public function executeAnular()
  {    $numpag=$this->getRequestParameter('numpag');
       $cr= new Criteria();
       $cr->add(FcpagosPeer::NUMPAG,trim($numpag));
       $this->fcpagos = FcpagosPeer::doSelectOne($cr);
       sfView::SUCCESS;
  }  
   public function executeSalvaranu() {
    $numpag=$this->getRequestParameter('numpag');
    $motanu=$this->getRequestParameter('motanu');
    $rifcon=$this->getRequestParameter('rifcon');
    $this->msg='';
    $this->msg2='';
    $c= new Criteria();
    $c->add(FcdecpagPeer :: NUMPAG, $numpag);
    $c->addJoin(FcdecpagPeer::NUMDEC,  FcdeclarPeer::NUMDEC);
    $c->addJoin(FcdecpagPeer::NUMREF,  FcdeclarPeer::NUMREF);
    $c->addJoin(FcdecpagPeer::FECVEN,  FcdeclarPeer::FECVEN);
    $c->addJoin(FcdecpagPeer::NUMERO,  FcdeclarPeer::NUMERO);
    $c->addJoin(FcdecpagPeer::FUEING,  FcdeclarPeer::FUEING);
    $c->add(FcdeclarPeer :: RIFCON, $rifcon);
    $reg = FcdecpagPeer :: doSelect($c);
    if (Hacienda::verificarPagos($numpag)){
    if($motanu !=''){
         if(count($reg)>0){
         foreach ($reg as $dec) {
            $sql = "Select * from FCDECLAR where NumDec<>'".$dec->getNumdec()."' and(NumDec='SP".substr($dec->getNumdec(),2,8)."' Or NumDec='CR".substr($dec->getNumdec(),2,8). "') And EDOdec='P' And FecVen =To_Date('" .$dec->getFecven(). "','DD/MM/YYYY') ";
            if(H::BuscarDatos($sql,$result)){
                $this->msg="El pago genero un Saldo Pendiente o Nota de Credito que ya fue cancelado.";
                 return sfView::SUCCESS;
            }
          }
          Hacienda::FacrepagAnular($reg,$numpag,$motanu,$rifcon);
          $this->msg="La Planilla Fue Anulada Con Exito.";
        }
    }else{
        $this->msg="No se Puede anular un pago sin explicar el Motivo de la Anulación.";
        return sfView::SUCCESS;   
        }
  }else{
      $this->msg="No se puede Anular un pago Validado.";
      return sfView::SUCCESS;
  }
   return sfView::SUCCESS;
 }
  public function executeActualizar()
  {    $numpag=$this->getRequestParameter('numpag');
       $cr= new Criteria();
       $cr->add(FcpagosPeer::NUMPAG,trim($numpag));
       $this->fcpagos = FcpagosPeer::doSelectOne($cr);
       sfView::SUCCESS;
  }

  public function executeSalvaract() {
        $numpag=$this->getRequestParameter('numpag');
        $nuevonumpag=$this->getRequestParameter('nuevonumpag');
        $rifcon=$this->getRequestParameter('rifcon');
        if($nuevonumpag!=''){
            if(Hacienda:: existenciaPago($nuevonumpag)){
                $this->msg2="Este número ya existe para otro pago";
                 return sfView::SUCCESS;
            }else{
                Hacienda::actualizarFactura($numpag,$rifcon,$nuevonumpag);
                $this->msg2="Actualización efectuada correctamente";
                 return sfView::SUCCESS;

                }

        }else{
             $this->msg2="Debe Introducir un Número.";
             return sfView::SUCCESS;
        }
         return sfView::SUCCESS;

    }
    protected function updateFcpagosFromRequest()
  {
    $fcpagos = $this->getRequestParameter('fcpagos');

    if (isset($fcpagos['numpag']))
    {
      $this->fcpagos->setNumpag($fcpagos['numpag']);
    }
    if (isset($fcpagos['fecpag']))
    {
      if ($fcpagos['fecpag'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcpagos['fecpag']))
          {
            $value = $dateFormat->format($fcpagos['fecpag'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcpagos['fecpag'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcpagos->setFecpag($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcpagos->setFecpag(null);
      }
    }
    if (isset($fcpagos['feccor']))
    {
      $this->fcpagos->setFeccor($fcpagos['feccor']);
    }
    if (isset($fcpagos['despag']))
    {
      $this->fcpagos->setDespag($fcpagos['despag']);
    }
    if (isset($fcpagos['mensaje']))
    {
      $this->fcpagos->setMensaje($fcpagos['mensaje']);
    }
    if (isset($fcpagos['opciones']))
    {
      $this->fcpagos->setOpciones($fcpagos['opciones']);
    }
    if (isset($fcpagos['combocriterio']))
    {
      $this->fcpagos->setCombocriterio($fcpagos['combocriterio']);
    }
    if (isset($fcpagos['rifcon']))
    {
      $this->fcpagos->setRifcon($fcpagos['rifcon']);
    }
    if (isset($fcpagos['dircon']))
    {
      $this->fcpagos->setDircon($fcpagos['dircon']);
    }
    if (isset($fcpagos['naccon']))
    {
      $this->fcpagos->setNaccon($fcpagos['naccon']);
    }
    if (isset($fcpagos['tipcon']))
    {
      $this->fcpagos->setTipcon($fcpagos['tipcon']);
    }
    if (isset($fcpagos['botones']))
    {
      $this->fcpagos->setBotones($fcpagos['botones']);
    }
    if (isset($fcpagos['griddetalles']))
    {
      $this->fcpagos->setGriddetalles($fcpagos['griddetalles']);
    }
    if (isset($fcpagos['totalgeneral']))
    {
      $this->fcpagos->setTotalgeneral($fcpagos['totalgeneral']);
    }
    if (isset($fcpagos['totales']))
    {
      $this->fcpagos->setTotales($fcpagos['totales']);
    }
    if (isset($fcpagos['totalrecargo']))
    {
      $this->fcpagos->setTotalrecargo($fcpagos['totalrecargo']);
    }
    if (isset($fcpagos['gridrecargdescto']))
    {
      $this->fcpagos->setGridrecargdescto($fcpagos['gridrecargdescto']);
    }
    if (isset($fcpagos['totalformpag']))
    {
      $this->fcpagos->setTotalformpag($fcpagos['totalformpag']);
    }
    if (isset($fcpagos['gridformpag']))
    {
      $this->fcpagos->setGridformpag($fcpagos['gridformpag']);
    }
    if (isset($fcpagos['funpag']))
    {
      $this->fcpagos->setFunpag($fcpagos['funpag']);
    }
    if (isset($fcpagos['fecrec']))
    {
      $this->fcpagos->setFecrec($fcpagos['fecrec']);
    }
    if (isset($fcpagos['funval']))
    {
      $this->fcpagos->setFunval($fcpagos['funval']);
    }
    if (isset($fcpagos['fechorval']))
    {
      if ($fcpagos['fechorval'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcpagos['fechorval']))
          {
            $value = $dateFormat->format($fcpagos['fechorval'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $fcpagos['fechorval'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcpagos->setFechorval($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcpagos->setFechorval(null);
      }
    }

    if (isset($fcpagos['numpag']))
    {
      $this->fcpagos->setNumpag($fcpagos['numpag']);
    }
    if (isset($fcpagos['fecpag']))
    {
      if ($fcpagos['fecpag'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcpagos['fecpag']))
          {
            $value = $dateFormat->format($fcpagos['fecpag'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcpagos['fecpag'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcpagos->setFecpag($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcpagos->setFecpag(null);
      }
    }
    if (isset($fcpagos['rifcon']))
    {
      $this->fcpagos->setRifcon($fcpagos['rifcon']);
    }
    if (isset($fcpagos['despag']))
    {
      $this->fcpagos->setDespag($fcpagos['despag']);
    }
    if (isset($fcpagos['monpag']))
    {
      $this->fcpagos->setMonpag($fcpagos['monpag']);
    }
    if (isset($fcpagos['monefe']))
    {
      $this->fcpagos->setMonefe($fcpagos['monefe']);
    }
    if (isset($fcpagos['funpag']))
    {
      $this->fcpagos->setFunpag($fcpagos['funpag']);
    }
    if (isset($fcpagos['codrec']))
    {
      $this->fcpagos->setCodrec($fcpagos['codrec']);
    }
    if (isset($fcpagos['numpagold']))
    {
      $this->fcpagos->setNumpagold($fcpagos['numpagold']);
    }
    if (isset($fcpagos['edopag']))
    {
      $this->fcpagos->setEdopag($fcpagos['edopag']);
    }
    if (isset($fcpagos['fecanu']))
    {
      if ($fcpagos['fecanu'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcpagos['fecanu']))
          {
            $value = $dateFormat->format($fcpagos['fecanu'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcpagos['fecanu'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcpagos->setFecanu($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcpagos->setFecanu(null);
      }
    }
    if (isset($fcpagos['motanu']))
    {
      $this->fcpagos->setMotanu($fcpagos['motanu']);
    }
    if (isset($fcpagos['cedanu']))
    {
      $this->fcpagos->setCedanu($fcpagos['cedanu']);
    }
    if (isset($fcpagos['nomcon']))
    {
      $this->fcpagos->setNomcon($fcpagos['nomcon']);
    }
    if (isset($fcpagos['dircon']))
    {
      $this->fcpagos->setDircon($fcpagos['dircon']);
    }
    if (isset($fcpagos['funval']))
    {
      $this->fcpagos->setFunval($fcpagos['funval']);
    }
    if (isset($fcpagos['fechorval']))
    {
      if ($fcpagos['fechorval'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcpagos['fechorval']))
          {
            $value = $dateFormat->format($fcpagos['fechorval'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $fcpagos['fechorval'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcpagos->setFechorval($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcpagos->setFechorval(null);
      }
    }
    if (isset($fcpagos['fechorregpag']))
    {
      if ($fcpagos['fechorregpag'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcpagos['fechorregpag']))
          {
            $value = $dateFormat->format($fcpagos['fechorregpag'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $fcpagos['fechorregpag'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcpagos->setFechorregpag($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcpagos->setFechorregpag(null);
      }
    }

    if (isset($fcpagos['seleccion']))
    {
      $this->fcpagos->setSeleccion($fcpagos['seleccion']);
    }
    if (isset($fcpagos['numreg']))
    {
      $this->fcpagos->setNumreg($fcpagos['numreg']);
    }
    if (isset($fcpagos['vienededeclaracion']))
    {
      $this->fcpagos->setVienededeclaracion($fcpagos['vienededeclaracion']);
    }
    if (isset($fcpagos['porcentaje']))
    {
      $this->fcpagos->setPorcentaje($fcpagos['porcentaje']);
    }
    if (isset($fcpagos['deudafrac']))
    {
      $this->fcpagos->setDeudafrac($fcpagos['deudafrac']);
    }
     if (isset($fcpagos['saldo5']))
    {
      $this->fcpagos->setSaldo5($fcpagos['saldo5']);
    }
      if (isset($fcpagos['totalpag']))
    {
      $this->fcpagos->setTotalpag($fcpagos['totalpag']);
    }

  }
  public function executeEliminarreg()
  {    $numpag=$this->getRequestParameter('id');
       $cr= new Criteria();
       $cr->add(FcpagosPeer::ID,trim($numpag));
       $this->fcpagos = FcpagosPeer::doSelectOne($cr);
       sfView::SUCCESS;
  }

  public function executeDelete2()
  {
    $password = $this->getRequestParameter('password', '');
    $nuevo=$this->getRequestParameter('id');
    $this->msg='';

       if($password!="" && $password != 'null'){
             $c= new Criteria();
             $c->add(FcaccesoPeer :: PASUSU, $password);
             $fcacceso = FcaccesoPeer :: doSelectOne($c);

              if(!$fcacceso){
                  $this->msg="CLAVE DE ANULACION INVALIDA, ASEGURESE QUE LA INGRESO CORRECTAMENTE";
                  return sfView::SUCCESS;

             }else{
              $this->fcpagos = FcpagosPeer::retrieveByPk($this->getRequestParameter('id'));
              if($this->fcpagos->getEdopag()=='V'){

                    $err = Herramientas::obtenerMensajeError(753);
                    $this->msg="$err";
                    return sfView::SUCCESS;

            } /*if($this->fcpagos->getEdopag()=='L'){
                    $err = Herramientas::obtenerMensajeError(762);
                    $this->msg="$err";
                    return sfView::SUCCESS;
            }*/
            else{
		$valor=Hacienda::eliminarFacrecpag($this->fcpagos);
                if ($valor!=-1)
                {
                    $err = Herramientas::obtenerMensajeError($valor);
                    $this->msg="$err";
                    return sfView::SUCCESS;
                }else {
                    $id= $this->fcpagos->getId();
                    $this->SalvarBitacora($id ,'Elimino');
                }
                }
              }              
              
         }else{
              $this->msg="Debe introducir el password si desea eliminar";
              return sfView::SUCCESS;
         }

         return sfView::SUCCESS;
  }
  
/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->guardo=$this->getRequestParameter('guardo');
    $this->params=array();
    
    $this->fcpagos = $this->getFcpagosOrCreate();

    $this->editing();

    $this->params[1]=$this->guardo;
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFcpagosFromRequest();

      if($this->saveFcpagos($this->fcpagos) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->fcpagos->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('facrecpag/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('facrecpag/list');
        }
        else
        {
            return $this->redirect('facrecpag/edit?id='.$this->fcpagos->getId().'&guardo=S');
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }  
}
