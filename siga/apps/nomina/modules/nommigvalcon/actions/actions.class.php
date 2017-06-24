<?php

/**
 * nommigvalcon actions.
 *
 * @package    siga
 * @subpackage nommigvalcon
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nommigvalconActions extends autonommigvalconActions
{
  private $dir="";

  public function executeList()
  {
  	$this->redirect('nommigvalcon/create');
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
  
  protected function updateNpasiconempFromRequest()
  {    
      if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('npasiconemp[archixls]'))
	    {
	        $fileName = "archivo_excel.xls";     
	        $this->getRequest()->moveFile('npasiconemp[archixls]', sfConfig::get('sf_upload_dir')."/assets/".$fileName);	      	      	      
	    }
  } 

  public function configGridDatos($per=array())
  {    		    	    
   // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setFilas(0);
    $opciones->setTabla('Npasiconemp');
    $opciones->setName('a');
	  $opciones->setAnchoGrid(900);
    $opciones->setAncho(900);
    $opciones->setTitulo('Conceptos - Monto');
    $opciones->setHTMLTotalFilas(' ');

    $this->totfil=count($per);

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
	
	  $col3 = new Columna('Código Cargo');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codcar');
    $col3->setHTML('type="text" size="10" readonly="true"');

    $col4 = new Columna('Nombre Cargo');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(false);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('nomcar');
    $col4->setHTML('type="text" size="40" readonly="true"');
    
    $col5 = new Columna('Código Concepto');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('codcon');
    $col5->setHTML('type="text" size="10" readonly="true"');

    $col6 = new Columna('Nombre Concepto');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(false);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setNombreCampo('nomcon');
    $col6->setHTML('type="text" size="40" readonly="true"');
    
    $col7 = new Columna('Cantidad');
    $col7->setTipo(Columna::MONTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('cantidad');
    $col7->setHTML('type="text" size="10" readonly="true"');

    $col8 = new Columna('Monto');
    $col8->setTipo(Columna::MONTO);
    $col8->setEsGrabable(true);
    $col8->setAlineacionObjeto(Columna::IZQUIERDA);
    $col8->setAlineacionContenido(Columna::IZQUIERDA);
    $col8->setNombreCampo('monto');
    $col8->setHTML('type="text" size="10" readonly="true"');

    $col9 = new Columna('Acumulado');
    $col9->setTipo(Columna::MONTO);
    $col9->setEsGrabable(true);
    $col9->setAlineacionObjeto(Columna::IZQUIERDA);
    $col9->setAlineacionContenido(Columna::IZQUIERDA);
    $col9->setNombreCampo('acumulado');
    $col9->setHTML('type="text" size="10" readonly="true"');

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

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
    $this->npasiconemp->setObjcon($this->obj);
	
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    switch ($ajax){
      case '1':
        $per=array();
        $js="";
        $emp="";
      	$this->npasiconemp = $this->getNpasiconempOrCreate();
        $this->updateNpasiconempFromRequest();        
        
        $data = new Spreadsheet_Excel_Reader();
	  	$data->setOutputEncoding('CP1251'); 
	  	$currentFile = sfConfig::get('sf_upload_dir')."/assets/archivo_excel.xls";
	  	if (is_file($currentFile))
	  	{
		  	$data->read($currentFile);	  	
		  
		  	$r=0;
		  	$col1="";
		  	$col2="";
		  	$col3="";
        $col4="";
        $col5="";  	  
        $concp="";	$concp2=""; $concp3="";  $monto=""; $empre="";
		  	foreach($data->sheets[0]['cells'] as $dat){  		  	 
	  	   	  if(empty($col1) || empty($col2) || empty($col3) || empty($col4) || empty($col5))
	  	   	  {	  	   	  	
	  	   	  	$col1=$dat[1]; //Código de Empleado
	  	   	  	$col2=$dat[2];  //Código de Concepto
	  	   	  	$col3=$dat[3];  //Cantidad 
              $col4=$dat[4];  //Monto
              $col5=$dat[5];  //Acumulado
	  	   	  	
      	  	  $sql1 = "select * from information_schema.columns  
      				where 
      				table_name='npasiconemp' and column_name='".$col1."'";
                  	
              $sql2 = "select * from information_schema.columns  
      				where 				
      				table_name='npasiconemp' and column_name='".$col2."'";            	
                  	
             $sql3 = "select * from information_schema.columns  
      				where 				
      				table_name='npasiconemp' and column_name='".$col3."'";

              $sql4 = "select * from information_schema.columns  
              where         
              table_name='npasiconemp' and column_name='".$col4."'";

                    $sql5 = "select * from information_schema.columns  
              where         
              table_name='npasiconemp' and column_name='".$col5."'";
            	
            	if(!H::BuscarDatos($sql1,$rs))
            	{
            		$js="alert('La Columna $col1 no existe en la tabla NPASICONEMP ');";
            		break;	
            	}
	  	   	    if(!H::BuscarDatos($sql2,$rs))
            	{
            		$js="alert('La Columna $col2 no existe en la tabla NPASICONEMP ');";
            		break;	
            	}
	  	   	    if(!H::BuscarDatos($sql3,$rs))
            	{
            		$js="alert('La Columna $col3 no existe en la tabla NPASICONEMP ');";
            		break;	
            	}

              if(!H::BuscarDatos($sql4,$rs))
              {
                $js="alert('La Columna $col4 no existe en la tabla NPASICONEMP ');";
                break;  
              }
              if(!H::BuscarDatos($sql5,$rs))
              {
                $js="alert('La Columna $col5 no existe en la tabla NPASICONEMP ');";
                break;  
              }
            	
	  	   	  }  	   	  	
	  	   	  else
	  	   	  {
	  	   	  	$c = new Criteria();
	  	   	  	$c->add(NphojintPeer::CODEMP,$dat[1]);	  	   	  	
	  	   	  	$objemp = NphojintPeer::doSelectOne($c);
	  	   	  	if($objemp)
	  	   	  	{
	  	   	  		$c = new Criteria();
		  	   	  	$c->add(NpdefcptPeer::CODCON,$dat[2]);	  	   	  	
		  	   	  	$objcon = NpdefcptPeer::doSelectOne($c);
		  	   	  	if($objcon)
		  	   	  	{
		  	   	  		if(is_numeric($dat[3]))
		  	   	  		{
		  	   	  			$c = new Criteria();
		  	   	  			$c->add(NpasicarempPeer::CODEMP,$dat[1]);
		  	   	  			$c->add(NpasicarempPeer::STATUS,'V');
		  	   	  			$c->add(NpasiconnomPeer::CODCON,$dat[2]);
		  	   	  			$c->addJoin(NpasiconnomPeer::CODNOM,NpasicarempPeer::CODNOM);
		  	   	  			$objjoin = NpasicarempPeer::doSelectOne($c);
		  	   	  			if($objjoin){
					  	   	  	
					  	   	  	$c = new Criteria();
					  	   	  	$c->add(NpdefmovPeer::CODNOM,$objjoin->getCodnom());
					  	   	  	$c->add(NpdefmovPeer::CODCON,$dat[2]);
					  	   	  	$objmov = NpdefmovPeer::doSelectOne($c);	   	  	
					  	   	  	
					  	   	  	if($objmov)
					  	   	  	{
					  	   	  		$per[$r][$col1]=$dat[1];
			  	   	  				$per[$r]['nomemp']=$objemp->getNomemp();
			  	   	  				$per[$r]['codcar']=$objjoin->getCodcar();
			  	   	  				$per[$r]['nomcar']=$objjoin->getNomcar();
						  	   	  	$per[$r][$col2]=$dat[2];
						  	   	  	$per[$r]['nomcon']=$objcon->getNomcon();
						  	   	  	//$objmov->getStatus()=='M' ? $per[$r][$col3]=H::FormatoMonto($dat[3]) : $per[$r]['cantidad']=H::FormatoMonto($dat[3]);						  	   	  	
                        //$col3=='monto' ? $per[$r][$col3]=H::FormatoMonto($dat[3]) : $per[$r]['cantidad']=H::FormatoMonto($dat[3]);                       
                        $per[$r][$col3]=H::FormatoMonto($dat[3]);
                        $per[$r][$col4]=H::FormatoMonto($dat[4]);                       
                        $per[$r][$col5]=H::FormatoMonto($dat[5]);                       
						  	   	  	$per[$r]['id']=9;
						  	   	  	$r++;
					  	   	  		
					  	   	  	}else {  $concp=='' ? $concp=$dat[1].'-'.$dat[2] : $concp=$concp.', '.$dat[1].'-'.$dat[2];
					  	   	  		$js="alert('Hay Conceptos no definidos como Conceptos de Movimientos. $concp');";}
		  	   	  			}else {  $concp2=='' ? $concp2=$dat[1].'-'.$dat[2] : $concp2=$concp2.', '.$dat[1].'-'.$dat[2];
		  	   	  				$js="alert('Algunos Conceptos no estan asociados a la nomina que pertence el empleado o el Empleado no ha sido asignado a ninguna nomina $concp2');"; }
		  	   	  		}else {  $monto=='' ? $monto=$dat[1].'-'.$dat[3] : $monto=$monto.', '.$dat[1].'-'.$dat[3];
		  	   	  			$js="alert_('Existen Montos que no cumplen con Formato Num&eacute;rico $monto');"; }
		  	   	  	}else {  $concp3=='' ? $concp3=$dat[1].'-'.$dat[2] : $concp3=$concp3.', '.$dat[1].'-'.$dat[2];
		  	   	  		$js="alert('Existen Codigos de Conceptos Incorrectos $concp3');"; }
	  	   	  	}else {  $empre=='' ? $empre=$dat[1] : $empre=$empre.', '.$dat[1];
		  	   	  	$js="alert('Existen Codigos de Empleados Incorrectos $empre');";	}
	  	   	  }  	   	  
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
        break;
    }
    $this->datos=$per;
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');    
  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  /**
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGridDatos();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
  }

  public function saving($clasemodelo)
  {
    $this->configGridDatos();
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
  	
  	if(count($grid[0])>=1)
  	{
  		foreach($grid[0] as $reg)
  		{
  			$c = new Criteria();
	  		$c->add(NpasiconempPeer::CODEMP,$reg['codemp']);
	  		$c->add(NpasiconempPeer::CODCON,$reg['codcon']);
	  		$c->add(NpasiconempPeer::CODCAR,$reg['codcar']);
	  		$obj = NpasiconempPeer::doSelectOne($c);	
	  		if($obj)
	  		{
	  			$obj->setCantidad($reg['cantidad']);
	  			$obj->setMonto($reg['monto']);
          $obj->setAcumulado($reg['acumulado']);
	  			$obj->save();
	  		}else $this->dir=$this->dir.", ".$reg['codemp'].'-'.$reg['codcon'];
  		}  		
  		return '-1';
  	}else
    	return '-1';
  }

  public function deleting($clasemodelo)
  {
    return $this->forward('nommigvalcon', 'create');
  }

/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->npasiconemp = $this->getNpasiconempOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpasiconempFromRequest();

      if($this->saveNpasiconemp($this->npasiconemp) ==-1){
        {
          if ($this->dir!='')
            $this->setFlash('notice', 'Los Siguientes datos no se migraron:'. $this->dir);
          else
            $this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->npasiconemp->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('nommigvalcon/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('nommigvalcon/list');
        }
        else
        {
            return $this->redirect('nommigvalcon/edit?id='.$this->npasiconemp->getId());
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
