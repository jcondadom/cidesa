<?php

/**
 * faartpvp actions.
 *
 * @package    Roraima
 * @subpackage faartpvp
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class faartpvpActions extends autofaartpvpActions
{
  public $coderror =-1;

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
    {
        $this->faartpvp = $this->getFaartpvpOrCreate();
        $this->configGrid();

        if ($this->getRequest()->getMethod() == sfRequest::POST)
        {
          $this->updateFaartpvpFromRequest();

          if ($this->saveFaartpvp($this->faartpvp)==-1)
              {
                  $this->setFlash('notice', 'Your modifications have been saved');
                  $this->Bitacora('Guardo');
                  $this->faartpvp->setId(Herramientas::getX_vacio('codart','faartpvp','id',$this->faartpvp->getCodart()));

                  if ($this->getRequestParameter('save_and_add'))
                  {
                    return $this->redirect('faartpvp/create');
                  }
                  else if ($this->getRequestParameter('save_and_list'))
                  {
                    return $this->redirect('faartpvp/list');
                  }
                  else
                  {
                    return $this->redirect('faartpvp/edit?id='.$this->faartpvp->getId().'&codart='.$this->faartpvp->getCodart());
                  }
                }
               else
                {
              $this->labels = $this->getLabels();
              return sfView::SUCCESS;
            }
        }
        else
        {
          $this->labels = $this->getLabels();
        }

    }

 /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js="";

    switch ($ajax){
      case '1':
        $c = new Criteria();
        $c->add(CaregartPeer::CODART,$codigo);
        $reg = CaregartPeer::doSelectOne($c);
        if ($reg){
            $output = '[["faartpvp_desart","'.$reg->getDesart().'",""],["faartpvp_codbar","'.$reg->getCodbar().'",""]]';
        }else{
            $js="alert('El Articulo no se encuentra registrado')";
            $output = '[["faartpvp_codart","",""],["faartpvp_desart","",""],["faartpvp_codbar","",""],["javascript","'.$js.'",""]]';
        }
        break;
      case '2':
        $dato=OptipretPeer::getRetencion($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        break;
      case '3':
        $c = new Criteria();
        $c->add(CaregartPeer::CODBAR,$codigo);
        $reg = CaregartPeer::doSelectOne($c);
        if ($reg){
            $output = '[["faartpvp_codart","'.$reg->getCodart().'",""],["faartpvp_desart","'.$reg->getDesart().'",""]]';
        }else{
            $js="alert('El Articulo no se encuentra registrado')";
            $output = '[["faartpvp_codart","",""],["faartpvp_desart","",""],["faartpvp_codbar","",""],["javascript","'.$js.'",""]]';
        }
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {
        $c = new Criteria();
        $c->add(FaartpvpPeer::CODART,$this->faartpvp->getCodart());
        $per = FaartpvpPeer::doSelect($c);

        $mascaraarticulo=$this->mascaraarticulo;

        $opciones = new OpcionesGrid();
        $opciones->setEliminar(true);
        $opciones->setTabla('Faartpvp');
        $opciones->setAnchoGrid(805);
        $opciones->setAncho(800);
        $opciones->setTitulo('Datos del Precio');
        $opciones->setHTMLTotalFilas(' ');
        $opciones->setFilas(50);

        $col1 = new Columna('Descripción');
        $col1->setTipo(Columna::TEXTO);
        $col1->setNombreCampo('despvp');
        $col1->setEsGrabable(true);
        $col1->setAlineacionContenido(Columna::IZQUIERDA);
        $col1->setAlineacionObjeto(Columna::IZQUIERDA);
        $col1->setHTML('type="text" size="50"');

        $col2 = new Columna('PVP');
        $col2->setTipo(Columna::MONTO);
        $col2->setNombreCampo('pvpart');
        $col2->setHTML('type="text" size="12"');
        $col2->setEsNumerico(true);
        $col2->setEsGrabable(true);
        $col2->setAlineacionContenido(Columna::DERECHA);
        $col2->setAlineacionObjeto(Columna::DERECHA);
        $col2->setJScript('onKeypress="entermonto(event,this.id)"');

        $col3 = new Columna('Fecha de Vig. Desde');
        $col3->setNombreCampo('fecdes');
        $col3->setTipo(Columna::FECHA);
        $col3->setHTML('');
        $col3->setEsGrabable(true);
        $col3->setVacia(true);
        $col3->setAjaxgrid(true);

        $col4 = new Columna('Fecha de Vig. Hasta');
        $col4->setNombreCampo('fechas');
        $col4->setTipo(Columna::FECHA);
        $col4->setHTML('');
        $col4->setEsGrabable(true);
        $col4->setVacia(true);
        $col4->setAjaxgrid(true);

        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);

        $this->obj = $opciones->getConfig($per);

  }

	/**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveFaartpvp($faartpvp)
    {
      // if ($faartpvp->getCodart())
      //{
      //    $faartpvp->save();
      //}
      //else //nuevo
      //  {
        $grid=Herramientas::CargarDatosGridV2($this,$this->obj);
        Facturacion::salvarFaartpvp($faartpvp,$grid,$this->faartpvp->getCodart(),$this->faartpvp->getCodbar());
        return -1;
      //	}
    }
/*
	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  /*protected function updateFaartpvpFromRequest()
	{
	    $faartpvp = $this->getRequestParameter('faartpvp');
		$this->configGrid();

		if (isset($faartpvp['codart']))
	    {
	      $this->faartpvp->setCodart($faartpvp['codart']);
	    }
	    if (isset($faartpvp['desart']))
	    {
	      $this->faartpvp->setDesart($faartpvp['desart']);
	    }
  }
*/
  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/faartpvp/filters');

	/*$this->pager = new sfPropelPager('Faartpvp', 10);
	$c = new Criteria();
	$c->clearSelectColumns();
	$c->clearGroupByColumns();
	$c->Setdistinct();
	$c->addSelectColumn(FaartpvpPeer::CODART);
	$c->addSelectColumn(CaregartPeer::DESART);
  $c->addSelectColumn(FaartpvpPeer::CODBAR);
	$c->addSelectColumn('0');
	$c->addSelectColumn('0');
  $c->addSelectColumn('1937-01-01');
	$c->addSelectColumn('1937-01-01');
	$c->addJoin(FaartpvpPeer::CODART,CaregartPeer::CODART);
	$c->addGroupByColumn(FaartpvpPeer::CODART);
	$c->addGroupByColumn(CaregartPeer::DESART);
  $c->addGroupByColumn(FaartpvpPeer::CODBAR);
	$this->addSortCriteria($c);
	$this->addFiltersCriteria($c);
	$this->pager->setCriteria($c);
	$this->pager->setPage($this->getRequestParameter('page', 1));
	$this->pager->init();*/

  $this->pager = new sfPropelPager('Caregart', 10);
  $c = new Criteria();  
  $c->addJoin(FaartpvpPeer::CODART,CaregartPeer::CODART);
  $c->Setdistinct();  
  $this->addSortCriteria($c);
  $this->addFiltersCriteria($c);
  $this->pager->setCriteria($c);
  $this->pager->setPage($this->getRequestParameter('page', 1));
  $this->pager->init();

  }

  protected function getFaartpvpOrCreate($id = 'id', $codart = 'codart')
  {
    if (!$this->getRequestParameter($codart) )
    {
      $faartpvp = new Faartpvp();
    }
    else
    {
      //$caretser = CaretserPeer::retrieveByPk($this->getRequestParameter($id));
      $c = new Criteria();
      $c->add(FaartpvpPeer::CODART,$this->getRequestParameter($codart));
      $faartpvp = FaartpvpPeer::doSelectOne($c);
      $this->forward404Unless($faartpvp);
    }

    return $faartpvp;
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $c = new Criteria();
    $c->add(FaartpvpPeer::CODART,$this->getRequestParameter('codart'));
    $datos = FaartpvpPeer::doSelect($c);
    $this->forward404Unless($datos);

    try
    {
       if ($datos)
       {
    	foreach ($datos as $faartpvp)
    	{
           $faartpvp->delete();
    	}
    	$this->SalvarBitacora($this->getRequestParameter('id') ,'Elimino');
       }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Faartpvp. Make sure it does not have any associated items.');
      return $this->forward('faartpvp', 'list');
    }

    return $this->redirect('faartpvp/list');
  }

   public function ValidarDatosVaciosenGrid($grid,&$error)
   {
      $error=-1;
      $x=$grid[0];
      $j=0;
      $codcatvacio=false;
      if (count($x)==0)
      {
         //$error=1100;
         //return true;
      }
      while ($j<count($x) && !$codcatvacio)
      {
        if (trim($x[$j]->getCodart())!="")
        {
	        if ((trim($x[$j]->getDespvp())=="")||($x[$j]->getPvpart()<=0))
	        {
	          $codcatvacio=true;
	          $error=1100;
	        }
        }
        $j++;
      } //while ($j<count($x))
      if ($codcatvacio)
        return true;
      else
        return false;
  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->faartpvp = $this->getFaartpvpOrCreate();

    try{
	    $this->updateFaartpvpFromRequest();
    }

    catch(Exception $ex){}

	$this->configGrid();

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
      {
	    if($this->coderror!=-1)
		  {
		   $err = Herramientas::obtenerMensajeError($this->coderror);
		   $this->getRequest()->setError('',$err);
		  }
      }
    return sfView::SUCCESS;
  }
  
    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";

    switch ($col) {
          case '3':
          case '4':
            
              if ($col=='3')
              {
                  $auxfecd = split("/",$grid[$fila][$col-1]);
                  if(count($auxfecd)==3)
                  {
                      if(strtotime($auxfecd[2].'-'.$auxfecd[1].'-'.$auxfecd[0]))
                      {
                          $dateFormat = new sfDateFormat('es_VE');
                          $fec1 = $dateFormat->format($grid[$fila][$col-1], 'i', $dateFormat->getInputPattern('d'));
                          
                          $repetido = false;
                          $i = 0;
                          while ($i < count($grid)) {
                              $dateFormat = new sfDateFormat('es_VE');
                              $fecha1 = $dateFormat->format($grid[$i][$col-1], 'i', $dateFormat->getInputPattern('d'));
                              $fecha2 = $dateFormat->format($grid[$i][$col], 'i', $dateFormat->getInputPattern('d'));
                            if ($i != $fila) {
                               if ($fec1>=$fecha1 && $fec1<=$fecha2) {
                                 $repetido = true;
                                 break;
                               }
                             }
                             $i++;
                           }                           
                      }else { 
                          $grid[$fila][$col-1]=""; $javascript="alert('Fecha Inv&aacute;lida');";                           
                      }
                  }else { 
                          $grid[$fila][$col-1]=""; $javascript="alert('Fecha Inv&aacute;lida');";                           
                  }
              }else {
                  $auxfech = split("/",$grid[$fila][$col-1]);
                  if(count($auxfech)==3)
                  {
                      if(strtotime($auxfech[2].'-'.$auxfech[1].'-'.$auxfech[0]))
                      {
                          $dateFormat = new sfDateFormat('es_VE');
                          $fec2 = $dateFormat->format($grid[$fila][$col-1], 'i', $dateFormat->getInputPattern('d'));
                          
                          $repetido = false;
                          $i = 0;
                          while ($i < count($grid)) {
                              $dateFormat = new sfDateFormat('es_VE');
                              $fecha1 = $dateFormat->format($grid[$i][$col-2], 'i', $dateFormat->getInputPattern('d'));
                              $fecha2 = $dateFormat->format($grid[$i][$col-1], 'i', $dateFormat->getInputPattern('d'));
                            if ($i != $fila) {
                               if ($fec2>=$fecha1 && $fec2<=$fecha2) {
                                 $repetido = true;
                                 break;
                               }
                             }
                             $i++;
                           }                           
                      }else { 
                          $grid[$fila][$col-1]=""; $javascript="alert('Fecha Inv&aacute;lida');";                           
                      }
                  }else { 
                          $grid[$fila][$col-1]=""; $javascript="alert('Fecha Inv&aacute;lida');";                           
                  }
              }
             if (!$repetido)
             {
                 if ($grid[$fila][2]!="" && $grid[$fila][3])
                 {
                     $dateFormat = new sfDateFormat('es_VE');
                     $feca = $dateFormat->format($grid[$fila][2], 'i', $dateFormat->getInputPattern('d'));
                     $fecb = $dateFormat->format($grid[$fila][3], 'i', $dateFormat->getInputPattern('d'));

                      if ($fecb<=$feca) {
                          $grid[$fila][3]=""; 
                          $javascript="alert('La Fecha Hasta no puede ser menor a la Fecha Desde');";                          
                      }

                 }
             }else { $javascript="alert_('Existe un Precio que ya esta entre esa fecha'); ";    $grid[$fila][$col-1]=""; }              
       
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;
          default:
            break;
        }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }  

}
