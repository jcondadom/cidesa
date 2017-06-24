<?php

/**
 * nomespdefinicion actions.
 *
 * @package    Roraima
 * @subpackage nomespdefinicion
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomespdefinicionActions extends autonomespdefinicionActions
{

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
		$this->npnomesptipos = $this->getNpnomesptiposOrCreate();


		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateNpnomesptiposFromRequest();

			$this->saveNpnomesptipos($this->npnomesptipos);

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('nomespdefinicion/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('nomespdefinicion/list');
			}
			else
			{
				return $this->redirect('nomespdefinicion/edit?id='.$this->npnomesptipos->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
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
    $this->npnomesptipos = $this->getNpnomesptiposOrCreate();

    try{
    $this->updateNpnomesptiposFromRequest();
    }
    catch(Exception $ex){}

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigonomesp='')
	 {
		$c = new Criteria();
		$c->add(NpnomespnomtipPeer::CODNOMESP,$codigonomesp);
        $per = NpnomespnomtipPeer::doSelect($c);

		$filas_arreglo=1;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npnomespnomtip');
		$opciones->setName('a');
		$opciones->setAnchoGrid(500);
		$opciones->setAncho(500);
		$opciones->setTitulo('Nominas Asociadas');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Código de Nomina');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('codnom');
		$col1->setHTML('type="text" size="8"');
		//$col1->setJScript('onBlur="javascript:event.keyCode=13; verificar_codnom(event,this.id);"');
		$col1->setCatalogo('Npnomina','sf_admin_edit_form', array('codnom' => 1,'nomnom' => 2),'Npnomina_Nomespdefinicion');
		//$col1->setAjax('nomespdefinicion',2,2);
		$col1->setAjaxgrid(true);

		$col2 = new Columna('Tipo de Nomina');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(false);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('nomnom');
		$col2->setHTML('type="text" size="50" readonly=true');
		// Se guardan las columnas en el objetos de opciones

		$opciones->addColumna($col1);
		$opciones->addColumna($col2);


		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);
 	 }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_viejo($codigonomesp='')
	 {

	 $SQL = "select DISTINCT npnomespnomtip.codnom as codnom, npnomina.nomnom as nomnom, 9 as id " .
	 	  "from npnomespnomtip, npnomesptipos, npnomina " .
	 	  "where ((npnomespnomtip.codnomesp='".($codigonomesp)."') " .
	 	  "AND (npnomespnomtip.codnom=npnomina.codnom))";

	      $resp = Herramientas::BuscarDatos($SQL,$per);
		$filas_arreglo=20;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(false);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npnomina');
		$opciones->setName('a');
		$opciones->setAnchoGrid(600);
		$opciones->setTitulo('Nomina');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Código de Nomina');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('codnom');
		$col1->setHTML('type="text" size="10"');
		$col1->setJScript('onBlur="javascript:event.keyCode=13; verificar_codnom(event,this.id);"');
		$col1->setCatalogo('Npnomina','sf_admin_edit_form', array('codnom' => 1,'nomnom' => 2));

		$col2 = new Columna('Tipo de Nomina');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('nomnom');
		$col2->setHTML('type="text" size="30" readonly=true');
		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);

		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);
 	 }

  protected function getNpnomesptiposOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npnomesptipos = new Npnomesptipos();
      $this->configGrid($this->getRequestParameter('npnomesptipos[codnomesp]'));
    }
    else
    {
      $npnomesptipos = NpnomesptiposPeer::retrieveByPk($this->getRequestParameter($id));

      $this->configGrid($npnomesptipos->getCodnomesp());

      $this->forward404Unless($npnomesptipos);
    }

    return $npnomesptipos;
  }

  public function formatoFecha($fechaoriginal)
   {
    if (!$fechaoriginal)
    {
     return '';
    }
    else
    {
   	$ano = substr($fechaoriginal,0,4);
	$mes = substr($fechaoriginal,5,2);
	$dia = substr($fechaoriginal,8,2);

     $fecha = $dia.'/'.$mes.'/'.$ano;

     return $fecha;
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
	 $cajtexmos = $this->getRequestParameter('cajtexmos');
	 $codigo    = $this->getRequestParameter('codigo');

	 $this->mensaje="";
	 $output = '[["","",""]]';
	 if ($this->getRequestParameter('ajax')=='1')
       {
	    	if ($this->getRequestParameter('codigo')<>'')
	    	{
             $x=Herramientas::getX_vacio('codnomesp','Npnomesptipos','codnomesp',$this->getRequestParameter('codigo'));
             if (trim($x)=="")
	        {
	           //$this->mensaje="";
		  }
		 else
	        {
	          //$this->mensaje="Ya existe información asociada a esta nomina especial";
	          $javascript="alert('Ya existe información asociada a esta nomina especial');";
              $output = '[["javascript","'.$javascript.'",""]]';

	        }

	     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	     //$this->configGrid('');
	     return sfView::HEADER_ONLY;

	 }
    } else  if ($this->getRequestParameter('ajax')=='2')
    	{
      	  $dato=Herramientas::getX('codnom','npnomina','nomnom',$codigo);
	      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

      	  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      	  return sfView::HEADER_ONLY;
    	}



     }


  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpnomesptiposFromRequest()
	{
		$npnomesptipos = $this->getRequestParameter('npnomesptipos');

		if (isset($npnomesptipos['codnomesp']))
		{
			$this->npnomesptipos->setCodnomesp($npnomesptipos['codnomesp']);
		}
		if (isset($npnomesptipos['desnomesp']))
		{
			$this->npnomesptipos->setDesnomesp($npnomesptipos['desnomesp']);
		}

		if (isset($npnomesptipos['fecnomdes']))
		{
			if ($npnomesptipos['fecnomdes'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($npnomesptipos['fecnomdes']))
					{
						$value = $dateFormat->format($npnomesptipos['fecnomdes'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $npnomesptipos['fecnomdes'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}

					$this->npnomesptipos->setFecnomdes($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->npnomesptipos->setFecnomdes(null);
			}
		}
		if (isset($npnomesptipos['fecnomhas']))
		{
			if ($npnomesptipos['fecnomhas'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($npnomesptipos['fecnomhas']))
					{
						$value = $dateFormat->format($npnomesptipos['fecnomhas'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $npnomesptipos['fecnomhas'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->npnomesptipos->setFecnomhas($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npnomesptipos->setFecnomhas(null);
      }
    }
	if (isset($npnomesptipos['nomintpre']))
	{
		$this->npnomesptipos->setNomintpre($npnomesptipos['nomintpre']);
	}
        if (isset($npnomesptipos['nomdiaadi']))
	{
		$this->npnomesptipos->setNomdiaadi($npnomesptipos['nomdiaadi']);
	}
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
  protected function saveNpnomesptipos($npnomesptipos)
  {
	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
	Nomina::salvarNpnomesptipos($npnomesptipos,$grid);
  }

  /*protected function deleteNpnomesptipos($npnomesptipos)
  {
    $c = new Criteria();
    $c->add(NpnomespconnomtipPeer::CODNOMESP,$npnomesptipos->getCodnomesp());
    $per = NpnomespconnomtipPeer::doSelect($c);
    if (!$per) {
  	  Herramientas::EliminarRegistro('Npnomespnomtip','codnomesp',$npnomesptipos->getCodnomesp());
      $npnomesptipos->delete();
    }
  }*/

   public function executeDelete()
  {
    $this->npnomesptipos = NpnomesptiposPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npnomesptipos);

    try
    {
      //$this->deleteNpnomesptipos($this->npnomesptipos);
        $c = new Criteria();
	    $c->add(NpnomespconnomtipPeer::CODNOMESP,$this->npnomesptipos->getCodnomesp());
	    $per = NpnomespconnomtipPeer::doSelect($c);
	    if (!$per) {
	  	  Herramientas::EliminarRegistro('Npnomespnomtip','codnomesp',$this->npnomesptipos->getCodnomesp());
	      $this->npnomesptipos->delete();
	      $this->Bitacora('Elimino');
	    }else {
	    	$this->getRequest()->setError('delete', 'No se pudo borrar el registro seleccionado. Asegúrese de que no tiene ningún concepto asociado.');
	        return $this->forward('nomespdefinicion', 'list');
	    }  
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('nomespdefinicion', 'list');
    }

    return $this->redirect('nomespdefinicion/list');
  }

     /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traer el indice de lo que se quiere procesar.
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
          case '1':
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                  $t= new Criteria();
                  $t->add(NpnominaPeer::CODNOM,$grid[$fila][$col-1]);
                  $reg= NpnominaPeer::doSelectOne($t);
                  if (!$reg)
                  {
                      $grid[$fila][$col-1]="";                      
                      $javascript="alert_('La N&oacute;mina no existe');";
                  }else {
                  	$grid[$fila][$col]=$reg->getNomnom();
                  }                  
              }else {
                  
                 $grid[$fila][$col-1]="";
                 $javascript="alert_('La N&oacute;mina esta Repetida');";
              }           
       
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
