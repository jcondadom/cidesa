<?php

/**
 * nommigsalvac actions.
 *
 * @package    siga
 * @subpackage nommigsalvac
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nommigsalvacActions extends autonommigsalvacActions
{
  public function executeList()
  {
  	$this->redirect('nommigsalvac/create');
  }	
  
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $currentFile = sfConfig::get('sf_upload_dir')."/assets/archivo_excel.xls";
  	$arc='N';
	if (is_file($currentFile))
 		$arc='S';	
	$this->params=array('archivo'=>$arc);

  }
  
  
  protected function updateNpvacsalidasFromRequest()
  {    
    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('npvacsalidas[archixls]'))
        {
            $fileName = "archivo_excel.xls";     
            $this->getRequest()->moveFile('npvacsalidas[archixls]', sfConfig::get('sf_upload_dir')."/assets/".$fileName);	      	      	      
        }
  }   

  public function configGridDatos($per=array())
  {    		     
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setFilas(0);
    $opciones->setTabla('Npvacsalidas');
    $opciones->setName('a');
    $opciones->setAnchoGrid(1200);
    $opciones->setAncho(1200);
    $opciones->setTitulo('Vacaciones - Periodos');
    $opciones->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Código Empleado');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codemp');
    $col1->setHTML('type="text" size="10" readonly="true"');

    $col2 = new Columna('Nombre Empleado');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(false);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomemp');
    $col2->setHTML('type="text" size="30" readonly="true"');
	
    $col3 = new Columna('Fecha Solicitud');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setHTML('readonly="true"');
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('fecvac2');

    $col4 = new Columna('Dias de Vacaciones');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('diasdisfrutar');
    $col4->setHTML('type="text" size="15" readonly="true"');
    
    $col5 = new Columna('Observaciones');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('observa');
    $col5->setHTML('type="text" size="30" readonly="true"');

    $col6 = new Columna('Fecha Salida');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(true);
    $col6->setHTML('readonly="true"');
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('fecdes2');
    
    $col7 = new Columna('Fecha Final Vac.');
    $col7->setTipo(Columna::TEXTO);
    $col7->setEsGrabable(true);
    $col7->setHTML('readonly="true"');
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('fecfin2');
    
    $col8 = new Columna('Fecha Incorporación');
    $col8->setTipo(Columna::TEXTO);
    $col8->setEsGrabable(true);
    $col8->setHTML('readonly="true"');
    $col8->setAlineacionObjeto(Columna::CENTRO);
    $col8->setAlineacionContenido(Columna::CENTRO);
    $col8->setNombreCampo('fechas2');    
    
    $col9 = new Columna('Suplente');
    $col9->setTipo(Columna::TEXTO);
    $col9->setEsGrabable(true);
    $col9->setAlineacionObjeto(Columna::CENTRO);
    $col9->setAlineacionContenido(Columna::CENTRO);
    $col9->setNombreCampo('nomsup');
    $col9->setHTML('type="text" size="30" readonly="true"');    
    
    $col10 = new Columna('Monto Suplencia');
    $col10->setTipo(Columna::MONTO);
    $col10->setEsGrabable(true);
    $col10->setAlineacionObjeto(Columna::CENTRO);
    $col10->setAlineacionContenido(Columna::CENTRO);
    $col10->setNombreCampo('monsup');
    $col10->setHTML('type="text" size="10" readonly="true"');

    $col11 = new Columna('Periodo Desde');
    $col11->setTipo(Columna::TEXTO);
    $col11->setEsGrabable(true);
    $col11->setAlineacionObjeto(Columna::CENTRO);
    $col11->setAlineacionContenido(Columna::CENTRO);
    $col11->setNombreCampo('perini');
    $col11->setHTML('type="text" size="10" readonly="true"');  
    
    $col12 = new Columna('Periodo Hasta');
    $col12->setTipo(Columna::TEXTO);
    $col12->setEsGrabable(true);
    $col12->setAlineacionObjeto(Columna::CENTRO);
    $col12->setAlineacionContenido(Columna::CENTRO);
    $col12->setNombreCampo('perfin');
    $col12->setHTML('type="text" size="10" readonly="true"');  
    
    $col13 = new Columna('Dias Disfrutar');
    $col13->setTipo(Columna::TEXTO);
    $col13->setEsGrabable(true);
    $col13->setAlineacionObjeto(Columna::CENTRO);
    $col13->setAlineacionContenido(Columna::CENTRO);
    $col13->setNombreCampo('diasdisfrutar2');
    $col13->setHTML('type="text" size="10" readonly="true"');
    
    $col14 = new Columna('Dias Disfrutados');
    $col14->setTipo(Columna::TEXTO);
    $col14->setEsGrabable(true);
    $col14->setAlineacionObjeto(Columna::CENTRO);
    $col14->setAlineacionContenido(Columna::CENTRO);
    $col14->setNombreCampo('diasdisfrutados');
    $col14->setHTML('type="text" size="10" readonly="true"');    
    
    $col15 = new Columna('Dias Vacaciones');
    $col15->setTipo(Columna::TEXTO);
    $col15->setEsGrabable(true);
    $col15->setAlineacionObjeto(Columna::CENTRO);
    $col15->setAlineacionContenido(Columna::CENTRO);
    $col15->setNombreCampo('diasvac');
    $col15->setHTML('type="text" size="10" readonly="true"');    
    
    $col16 = new Columna('Dias Bono Vacacional');
    $col16->setTipo(Columna::TEXTO);
    $col16->setEsGrabable(true);
    $col16->setAlineacionObjeto(Columna::CENTRO);
    $col16->setAlineacionContenido(Columna::CENTRO);
    $col16->setNombreCampo('diasbonovac');
    $col16->setHTML('type="text" size="10" readonly="true"');    
    
    $col17 = new Columna('Dias Bono Vacacional Pagados');
    $col17->setTipo(Columna::TEXTO);
    $col17->setEsGrabable(true);
    $col17->setAlineacionObjeto(Columna::CENTRO);
    $col17->setAlineacionContenido(Columna::CENTRO);
    $col17->setNombreCampo('diasbonovacpag');
    $col17->setHTML('type="text" size="10" readonly="true"');        
    
    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);
    
    

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
    
    $this->npvacsalidas->setObjvac($this->obj);
	
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $per=array();
    switch ($ajax){
      case '1':        
        $js="";
      	$this->npvacsalidas = $this->getNpvacsalidasOrCreate();
        $this->updateNpvacsalidasFromRequest();        
        
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('CP1251'); 
        $currentFile = sfConfig::get('sf_upload_dir')."/assets/archivo_excel.xls";
        if (is_file($currentFile))
        {
                $data->read($currentFile);	  			  
                $r=0;
                foreach($data->sheets[0]['cells'] as $dat){  		  	 
                    $c = new Criteria();
                    $c->add(NphojintPeer::CODEMP,$dat[1]);	  	   	  	
                    $objemp = NphojintPeer::doSelectOne($c);
                    if($objemp)
                    {
                        if(is_numeric($dat[3]) && H::toFloat($dat[3])>0)
                        {
                                $c = new Criteria();
                                $c->add(NpvacsalidasPeer::CODEMP,$dat[1]);
                                $c->add(NpvacsalidasPeer::FECVAC,$dat[2]);
                                $objjoin = NpvacsalidasPeer::doSelectOne($c);
                                if(!$objjoin){                 
                                    $per[$r]['codemp']=$dat[1];
                                    $per[$r]['nomemp']=H::getX_vacio('CODEMP', 'Nphojint', 'Nomemp', $dat[1]);
                                    $per[$r]['fecvac2']=$dat[2];
                                    $per[$r]['diasdisfrutar']=$dat[3];
                                    $per[$r]['observa']=$dat[4];
                                    $per[$r]['fecdes2']=$dat[5]; 
                                    $per[$r]['fecfin2']=$dat[6];
                                    $per[$r]['fechas2']=$dat[7];
                                    $per[$r]['nomsup']=$dat[8];
                                    $per[$r]['monsup']=H::FormatoMonto($dat[9]);						  	   	  	
                                    $per[$r]['perini']=$dat[10];
                                    $per[$r]['perfin']=$dat[11];
                                    $per[$r]['diasdisfrutar2']=$dat[12];
                                    $per[$r]['diasdisfrutados']=$dat[13];
                                    $per[$r]['diasvac']=$dat[14];
                                    $per[$r]['diasbonovac']=$dat[15];
                                    $per[$r]['diasbonovacpag']=$dat[16];
                                    $per[$r]['id']=9;
                                    $r++;
                                }else
                                        $js="alert('Algunos Empleados ya tienen registrados Vacaciones con la misma fecha de Salida');";
                        }else
                                $js="alert('Existen Dias de Vacaciones que no cumplen con Formato Numérico o no son Mayor a Cero');";
                    }else
                            $js="alert('Existen Codigos de Empleados que no Existen');";	   	   	  
                }
                unlink($currentFile);			

        }else
        {
                $js="alert('Debe existir un archivo cargado previamente');";

        }
	  	     	
        $this->configGridDatos($per);
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->datos=$per;
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    //return sfView::HEADER_ONLY;
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
       $this->npvacsalidas = $this->getNpvacsalidasOrCreate();
       $this->updateNpvacsalidasFromRequest();       


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
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);   
  }

  public function saving($clasemodelo)
  {
    $this->configGridDatos();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);   
    if(count($grid[0])>=1)
    {
        $codemp="";
        $fecvac="";
        foreach($grid[0] as $reg)
        {
            if ($codemp!=$reg['codemp'] && $fecvac!=$reg['fecvac2'])
            {
               //Grabamos en Npvacdisfrute
                $objNpvacsalidas = new Npvacsalidas();	
                $objNpvacsalidas->setCodemp($reg['codemp']);
                
                $dateFormat = new sfDateFormat('es_VE');
                $fec = $dateFormat->format($reg['fecvac2'], 'i', $dateFormat->getInputPattern('d'));                
                $objNpvacsalidas->setFecvac($fec);
                
                $objNpvacsalidas->setDiasdisfrutar($reg['diasdisfrutar']);	
                $objNpvacsalidas->setObserva($reg['observa']);
                
                $dateFormat = new sfDateFormat('es_VE');
                $fecdes = $dateFormat->format($reg['fecdes2'], 'i', $dateFormat->getInputPattern('d'));                
                $objNpvacsalidas->setFecdes($fecdes);
                
                $dateFormat = new sfDateFormat('es_VE');
                $fecfin= $dateFormat->format($reg['fecfin2'], 'i', $dateFormat->getInputPattern('d')); 
                $objNpvacsalidas->setFecfin($fecfin);
                
                $dateFormat = new sfDateFormat('es_VE');
                $fechas= $dateFormat->format($reg['fechas2'], 'i', $dateFormat->getInputPattern('d'));
                $objNpvacsalidas->setFechas($fechas);
                
                $objNpvacsalidas->setNomsup($reg['nomsup']);
                $objNpvacsalidas->setMonsup(H::toFloat($reg['monsup']));
                $objNpvacsalidas->save();          
              
                
                $codemp=$reg['codemp'];
                $fecvac=$reg['fecvac2'];
                
            }
                //Grabamos en Npvacdisfrute
                $objNpvacdisfrute = new Npvacdisfrute();	
                $objNpvacdisfrute->setCodemp($reg['codemp']);
                $objNpvacdisfrute->setPerini($reg['perini']);
                $objNpvacdisfrute->setPerfin($reg['perfin']);	
                $objNpvacdisfrute->setDiasdisfutar($reg['diasdisfrutar2']);
                $objNpvacdisfrute->setDiasdisfrutados($reg['diasdisfrutados']);
                $objNpvacdisfrute->setDiasbonovac($reg['diasbonovac']);
                $objNpvacdisfrute->setDiasbonovacpag($reg['diasbonovacpag']);
                $objNpvacdisfrute->setDiasajust(0);
                $objNpvacdisfrute->save();
			
                // Grabamos en Npvacsalidas detalle
                $objNpvacsalidasDet = new NpvacsalidasDet();
                $objNpvacsalidasDet->setCodemp($reg['codemp']);
                $objNpvacsalidasDet->setPerini($reg['perini']);
                $objNpvacsalidasDet->setPerfin($reg['perfin']);
                $objNpvacsalidasDet->setDiasdisfutar($reg['diasdisfrutar2']);
                $objNpvacsalidasDet->setDiasdisfrutados($reg['diasdisfrutados']);
                $objNpvacsalidasDet->setDiasvac($reg['diasvac']);
                $objNpvacsalidasDet->setDiasbonovac($reg['diasbonovac']);
                $objNpvacsalidasDet->setDiasbonovacpag($reg['diasbonovacpag']);
                $objNpvacsalidasDet->setFecvac($fec);	
                $objNpvacsalidasDet->setDiasajust(0);
                $objNpvacsalidasDet->save();
            

        }  		
    }
    
    return -1;
  }

}
