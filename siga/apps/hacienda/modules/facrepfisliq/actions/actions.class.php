<?php

/**
 * facrepfisliq actions.
 *
 * @package    siga
 * @subpackage facrepfisliq
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facrepfisliqActions extends autofacrepfisliqActions
{

	protected $mostrargrid=false;

  public function editing()
  {
	$this->setVars();
	$this->configGrid($this->fcrepfis->getNumrep());
	$this->configGridDistribucion($this->fcrepfis->getNumrep());

  }

	public function setVars() {
                $this->params='';
                $this->fcrepfis->setFunrec($this->getUser()->getAttribute('loguse'));
		$this->params[0] = $this->fcrepfis->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcrepfis->getFunrec();
		$this->params[1] = Herramientas::getX('codemp','fcdefins','unipic','001');
		$this->params[2] = Herramientas::getX('codemp','fcdefins','valunitri','001');
		$this->params[3] = false;
                if($this->fcrepfis->getId()){
                     $this->fcrepfis->setIncmod('M');
                }else{
                     $this->fcrepfis->setIncmod('I');
                }
	}

  public function configGrid($numrep='', $arreglo=array()) {
         if ($arreglo){
            $y=0;
            while ($y<count($arreglo))
            {
                $fcrepliq= new Fcrepliq();
                $fcrepliq->setAno($arreglo[$y]["ano"]);
                $fcrepliq->setCodact($arreglo[$y]["codact"]);
                $fcrepliq->setDesact($arreglo[$y]["desact"]);
                $fcrepliq->setMoning($arreglo[$y]["moning"]);
                $fcrepliq->setMonimp($arreglo[$y]["monimp"]);
                $fcrepliq->setMonfis($arreglo[$y]["monfis"]);
                $fcrepliq->setPorali($arreglo[$y]["porali"]);
                $fcrepliq->setMonliq($arreglo[$y]["monliq"]);
                $fcrepliq->setUnidad($arreglo[$y]['unidad']);
                $fcrepliq->setMinimo($arreglo[$y]['minimo']);
                $reg[]=$fcrepliq;

                $y++;
            }
                }else{
		$c = new Criteria();
		$c->add(FcrepliqPeer :: NUMREP, $numrep);
		$reg =  FcrepliqPeer :: doSelect($c);
                
	}
        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrepfisliq/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');

	$this->grid = $this->columnas[0]->getConfig($reg);

	$this->fcrepfis->setGrid($this->grid);

        }

  public function configGridDistribucion($numrep='',$arreglo=array()) {

  		if ($arreglo)
  		{
                    $y=0;
                    while ($y<count($arreglo))
                    {   $fcdetrep= new Fcdetrep();
                        $fcdetrep->setNum($arreglo[$y]['num']);
                        $fcdetrep->setFecha($arreglo[$y]['fecha']);
                        $fcdetrep->setDescrip($arreglo[$y]['descrip']);
                        $fcdetrep->setTipo($arreglo[$y]['tipo']);
                        $fcdetrep->setMonto($arreglo[$y]['mtrcon']);
                        $fcdetrep->setFuente($arreglo[$y]['codfue']);
                        $reg[]=$fcdetrep;
                        $y++;
	  			}
      		}else{
                    $c = new Criteria();
                    $c->add(FcdetrepPeer :: NUMREP, $numrep);
                    $reg =  FcdetrepPeer :: doSelect($c);
                    //Para el control de la númeración de los registros mostrados en la grid
                      for ($i = 1; $i <= count($reg); $i++) {
                        $reg[$i-1]-> setNroreg($i);
	  		}
  		}

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrepfisliq/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_distribucion');
		$this->columnas[0]->setEliminar(true,'CalcularTotales()');
                $this->griddistribucion = $this->columnas[0]->getConfig($reg);
		$this->fcrepfis->setGriddistribucion($this->griddistribucion);

	}



  public function executeAjax()
  {
	$codigo = $this->getRequestParameter('codigo', '');
	$fecha = str_replace('/','-',$this->getRequestParameter('fecha'));
	$ajax = $this->getRequestParameter('ajax', '');
        $javascript='';
        $montodeclar=0;
        $this->ajax =$ajax;
	switch ($ajax) {
		case '1' :
			$codigo = str_pad($codigo,10,"0",STR_PAD_LEFT);
			$c = new Criteria();
			$c->add(FcsollicPeer::STASOL, 'D', Criteria::NOT_EQUAL);
			$c->add(FcsollicPeer::NUMSOL, $codigo);
			$reg = FcsollicPeer::doselectone($c);
			$javascript='';
			if ($reg)
			{
				$nomneg = $reg->getNomneg();
				$fecven = $reg->getFecven();
				$stalic = $reg->getStalic();
				$nomcon = Herramientas::getX('numlic','fcrepfis','numlic',$codigo);
				$feccie = Herramientas::getX('codfue','fcfuepre','feccie','01');

				$rifcon = $reg->getRifcon();
				$nomcon = $reg->getNomcon();
				$dircon = $reg->getDircon();
				$rifrep = $reg->getRifrep();

                            $dateFormat = new sfDateFormat('es_VE');
                            $feccie = substr($dateFormat->format($feccie, 'i', $dateFormat->getInputPattern('d')),2,10);  //se utilizo el substr por que traia la fecha mal
	                 																							  //2001-01-2009
			    $DecCerrada = (H::DateDiff('d',$feccie,$fecha) > 0);
				if (($stalic=='V') || ($stalic=='E'))
				{
					if ((H::DateDiff('d',$fecven,date('Y-m-d')) < 0 ) or ($DecCerrada) )
					{

						if (H::DateDiff('d',$fecven,date('Y-m-d')) > 0 ){  $javascript=  $javascript . "alert('Licencia esta Vencida. Debe Renovar la licencia luego de Realizar la Declaracion');"; }
					}else{
						$javascript=$javascript . "alert('Licencia esta Vencida. Debe Renovar la licencia antes de Realizar la declaracion');";
					}

				}else if ($stalic=='C'){  $javascript = $javascript."alert('Licencia fue Cancelada'); $('fcrepfis_numlic')=''; $('fcrepfis_numlic').focus();";

				}else if ($stalic=='S'){  $javascript = $javascript."alert('Licencia fue Suspendida'); $('fcrepfis_numlic')=''; $('fcrepfis_numlic').focus();";
				}

                                $c= new Criteria();
                                $c->add(FcrepfisPeer::NUMLIC, $codigo);
                                $fcrepfis = FcrepfisPeer::doselectone($c);
				if ($fcrepfis){
                                    $javascript = $javascript."alert('Esta Licencia tiene uno o varios Reparos Fiscales.');";                                    
                                    }

			      $c= new Criteria();
			      $c->add(FcconrepPeer::RIFCON,trim($rifcon));
			      $fcconrep2 = FcconrepPeer::doSelectOne($c);

				//Constribuyente
			      if (count($fcconrep2)>0)
			      {
			          if ($fcconrep2->getNaccon()=='V')
			          {
			          	$javascript = $javascript . "$('fcrepfis_naccon_V').checked=true; ";
			          }
			          else
			          {
			          	$javascript = $javascript . "$('fcrepfis_naccon_E').checked=true; ";
			          }
			          if ($fcconrep2->getTipcon()=='N')
			          {
			          	$javascript = $javascript . "$('fcrepfis_tipcon_N').checked=true; ";
			          }
			          else
			          {
			          	$javascript = $javascript . "$('fcrepfis_tipcon_J').checked=true; ";
			          }
			      }

				//Representante
			      $c= new Criteria();
			      $c->add(FcconrepPeer::RIFCON,trim($rifrep));
			      $fcconrep2 = FcconrepPeer::doSelectOne($c);

			      if (count($fcconrep2)>0)
			      {
					$nomconrep = $fcconrep2->getNomcon();
					$dirconrep = $fcconrep2->getDircon();

			          if ($fcconrep2->getNaccon()=='V')
			          {
			          	$javascript = $javascript . "$('fcrepfis_nacconrep_V').checked=true; ";
			          }
			          else
			          {
			          	$javascript = $javascript . "$('fcrepfis_nacconrep_E').checked=true; ";
			          }
			          if ($fcconrep2->getTipcon()=='N')
			          {
			          	$javascript = $javascript . "$('fcrepfis_tipconrep_N').checked=true; ";
			          }
			          else
			          {
			          	$javascript = $javascript . "$('fcrepfis_tipconrep_J').checked=true; ";
			          }
			      }
			}

			  $output = '[["fcrepfis_numlic","'.$codigo.'",""],["fcrepfis_nomneg","'.$nomneg.'",""],["fcrepfis_rifcon","'.$rifcon.'",""],["fcrepfis_nomcon","'.$nomcon.'",""],["fcrepfis_dircon","'.$dircon.'",""],["fcrepfis_rifrep","'.$rifrep.'",""], ["javascript","' . $javascript . '",""],["fcrepfis_nomconrep","'.$nomconrep.'",""],["fcrepfis_dirconrep","'.$dirconrep.'",""]]';
		          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                          return sfView::HEADER_ONLY;
		      break;

		case '2' :
                    $annioini= $this->getRequestParameter('annioini', '');
                    $numlic= $this->getRequestParameter('numlic', '');
                    $this->fcrepfis = $this->getFcrepfisOrCreate();
                    $this->updateFcrepfisFromRequest();
                    $montodeclar=0;
                    self::setVars();
                    $gridactecom=array();
                    if($annioini !='' && $codigo!=''){
                         if((int)$annioini <= (int)$codigo){
                            if($this->fcrepfis->getIncmod()=='I'){
                                Hacienda::datosActEconomica($numlic,$annioini,$codigo,$gridactecom,$this->params,$montodeclar);
                                $this->params=array();
                                 $this->labels = $this->getLabels();
                                $this->configGrid('',$gridactecom);
                            }
                         }else{
                           $this->params=array();
                           $this->labels = $this->getLabels();
                           $this->configGrid();
                           $javascript=$javascript."alert('El Año Desde no puede ser mayor al Año Hasta');";
                         }
                    }else{
                        $this->params=array();
                        $this->labels = $this->getLabels();
                        $this->configGrid();
                        $javascript=$javascript."alert('Debe Completar el Rango de Años');";
                    }
                  
                     $output = '[["fcrepfis_monadi","'.number_format($montodeclar,2,',','.').'",""],["javascript","'.$javascript.'",""],["","",""]]';
                    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                    break;
      default:
      
            break;
    }


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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){


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
    $this->configGridDistribucion();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $griddistribucion = Herramientas::CargarDatosGridv2($this,$this->griddistribucion);

  }

  public function saving($clasemodelo)
  {
	    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
	    $gridD = Herramientas::CargarDatosGridv2($this,$this->griddistribucion);
	    return Hacienda::salvarFacrepfisliq($clasemodelo, $grid, $gridD);
  }

  public function deleting($clasemodelo)
  {

    return Hacienda::EliminarFacrepfisliq($clasemodelo);
  }

  public function executeAjaxgrid() {
                $name = $this->getRequestParameter('grid', 'a');
    		$grid = $this->getRequestParameter('grid'.$name,'');
                $nuevo= $this->getRequestParameter('id','');
                $fila = $this->getRequestParameter('fila','');
                $col = $this->getRequestParameter('columna', '');
                $fuentesan = $this->getRequestParameter('fuentesan', '');
                $fuenterep = $this->getRequestParameter('fuenterep', '');
                $sw=false;
                $javascript='';
                $montoreparo=0;$montodeclar=0;
                $this->params=array();
                $this->fcrepfis = $this->getFcrepfisOrCreate();
                $this->updateFcrepfisFromRequest();
                $this->labels = $this->getLabels();
                $this->setVars();
                switch ($name) {
                  //Grid detalle
                  case 'a':
                      switch ($col) {
                      case '6':
                            Hacienda::calculoImpuesto($fila,$grid);
                            Hacienda::CalculoDeclaracionReparo($grid, $modo,$montoreparo,$montodeclar);
                            $javascript=$javascript." new Ajax.Updater('divgriddistribucion',getUrlModulo()+'grid', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});";
                            $jsonextra=',["javascript","' . $javascript . '",""],["fcrepfis_monrep","' . $montoreparo . '",""],["fcrepfis_monadi","' . $montodeclar . '",""]';

                          break;
                       case '2':
                         $sql = "Select a.codact,a.desact,a.mintri,a.afoact,b.valunitri from FCACTCOM a,FCDefIns b Where a.codact like '".$grid[$fila][$col-1]. "%' and a.anoact='".$grid[$fila][0]."' order by a.CodAct ";
                          if (Herramientas::BuscarDatos($sql,$result)){
                              $x=3;
                               while ($x <= 8){
                                    $grid[$fila][$x] =0;
                                    $x++;
}
                                 $grid[$fila][2] = $result[0]['desact'];
                                 $grid[$fila][6] = $result[0]['afoact'];
                                 $grid[$fila][8] = $result[0]['valunitri'];
                                 $grid[$fila][9] = $result[0]['mintri'];
                          }else{
                             $sql = "Select a.codact,a.desact,a.mintri,a.afoact from FCACTCOM a Where " .
                              "a.codact like '".$grid[$fila][$col-1]. "%' ".
                             "and a.anoact=(Select max(AnoAct) from FCActCom where trim(codact)='".$grid[$fila][$col-1]."') order by a.CodAct ";
                               if (Herramientas::BuscarDatos($sql,$result)){
                                    $x=3;
                                    while ($x <= 7){
                                        $grid[$fila][$x] =0;
                                        $x++;
                                    }
                                     $grid[$fila][2] = $result[0]['desact'];
                                     $grid[$fila][6] = $result[0]['afoact'];
                                     $grid[$fila][8] = $result[0]['afoact'];
                                     $grid[$fila][9] = $result[0]['mintri'];
                               }else{
                                    $javascript=$javascript."alert('Actividad Comercial no Existe')";
                               }
                          }
                           $jsonextra = ',["javascript","' . $javascript . '",""]';
                           break;
                         case '4':
                              $grid[$fila][4] =H::FloatVEtoFloat2($grid[$fila][3]) * H::FloatVEtoFloat2($grid[$fila][6]) /100;
                           break;
                      }
                   break;
               case 'b':
                    $fecharep = $this->getRequestParameter('fcrepfis_fecrep', '');
                    $fuesan= $this->getRequestParameter('fcrepfis_fuesan', '');
                    $annioini = $this->getRequestParameter('fcrepfis_annioini', '');
                    $anniofin = $this->getRequestParameter('fcrepfis_anniofin', '');
                    if($annioini =='' || $anniofin==''){
                        $javascript=$javascript."alert('Debe completar el rango de años');";
                    }else{
                    $fechaven=H::DiasHabiles($fecharep);
                    $c= new Criteria();
                    $c->add(FcfueprePeer::CODFUE,$fuesan);
                    $reg = FcfueprePeer :: doSelectOne($c);
                    if($reg){
                        if($grid[$fila][0]==''){
                            $grid[$fila][0]=$fila+1;
                        }
                         $grid[$fila][1]=$fechaven;
                         $grid[$fila][2]="MULTA ILICITO MATERIAL ";
                         $grid[$fila][3]=$reg->getNomabr();
                         $grid[$fila][5]= $reg->getCodfue();
                    }
                     $javascript=$javascript."CalcularTotales();";

                     }
                     $jsonextra = ',["javascript","' . $javascript . '",""]';
                   break;

                   }
              $output = Herramientas :: grid_to_json($grid, $name,$jsonextra);
              $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
             if($sw){
                return sfView::HEADER_ONLY;
             }

  }

  public function executeGrid()
  {   $fecrep=$this->getRequestParameter('fcrepfis[fecrep]');
      $codfuesan=$this->getRequestParameter('fcrepfis[fuesan]');
      $codfuerep=$this->getRequestParameter('fcrepfis[fuerep]');
      $numlic =$this->getRequestParameter('fcrepfis[numlic]');
      $grid = $this->getRequestParameter('grida','');
      $fila = $this->getRequestParameter('fila','');
      $gridd= $this->getRequestParameter('gridb','');
      $indcalint = H::getConfApp('indcalint', 'hacienda', 'facrepfisliq');
      $javascript="";
      $griddeuda=array();
      $montoreparo=0;$montodeclar=0;
      $this->params=array();
      $this->fcrepfis = $this->getFcrepfisOrCreate();
      $this->updateFcrepfisFromRequest();
      $this->labels = $this->getLabels();
       $this->setVars();
       if ( $this->fcrepfis->getIncmod() == "I"){
        Hacienda::DistribuirDeclaracionReparo($grid,$gridd,$griddeuda,$codfuerep,$codfuesan,$fecrep,$numlic,$indcalint);
         $this->configGridDistribucion('',$griddeuda);
          $javascript=$javascript." CalcularTotales();";
       }else{
            $this->configGridDistribucion();
       }

      $output = '[["javascript","'.$javascript.'",""],["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }
}
