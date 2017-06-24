<?php
// auto-generated by PropelCidesa
// date: 2017/05/30 12:55:13
?>
<?php

/**
 * autoRadarventas actions.
 *
 * @package    Roraima
 * @subpackage autoRadarventas 
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 43817 2011-04-22 21:28:42Z cramirez $
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 * @copyright  Copyright 2007, Cide S.A.
 */
class autoRadarventasActions extends sfActions
{

  // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
  protected $coderr = -1;

  public function executeIndex()
  {
    return $this->forward('radarventas', 'list');
  }

  /**
   * Función para incluir funcionalidades adicionales en el executeList.
   * Esta funcion debe ser reescrita en la clase que hereda.
   *
   */
  protected function listing()
  {     


  }

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->listing();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/radarventas/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Radarventas', 15);
    $c = new Criteria();
    $this->c ? $c=$this->c : '';
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function executeCreate()
  {
    return $this->forward('radarventas', 'edit');
  }

  /**
   * Función principal para el manejo de la acción save
   * del formulario.
   *
   */
  public function executeSave()
  {

    return $this->forward('radarventas', 'edit');

  }

  /**
   * Función para incluir funcionalidades adicionales en el executeEdit.
   * Esta funcion debe ser reescrita en la clase que hereda.
   *
   */
  protected function editing()
  {


  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->radarventas = $this->getRadarventasOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateRadarventasFromRequest();

      if($this->saveRadarventas($this->radarventas) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->radarventas->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('radarventas/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('radarventas/list');
        }
        else
        {
            return $this->redirect('radarventas/edit?id='.$this->radarventas->getId());
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

  public function executeDelete()
  {
    $this->radarventas = RadarventasPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->radarventas);

    try
    {
      $this->deleteRadarventas($this->radarventas);
      $id= $this->radarventas->getId();
      $this->SalvarBitacora($id ,'Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('radarventas', 'list');
    }


    return $this->forward('radarventas', 'list');
  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   *
   */
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->radarventas = $this->getRadarventasOrCreate();
    $this->updateRadarventasFromRequest();
	$this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;
  }

  /**
   * Función para manejar de el salvado de registros del formulario.
   * cabe destacar que llama internamente a la función $this->saving
   * que es reescrita en la clase que hereda con el proceso que el usuario
   * necesite implementar.
   * Esta función saving siempre debe retornar un valor >=-1.
   *
   */
  protected function saveRadarventas($radarventas)
  {

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      $this->coderr = $this->saving($radarventas);


      if(is_array($this->coderr)){
        foreach ($this->coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->updateError();}
          return sfView::SUCCESS;
      }elseif($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
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

  /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de guardado adecuado para cada formulario.
   *
   */
  protected function saving($radarventas)
  {
    $radarventas->save();
    return -1;

  }

  /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de eliminación adecuado para cada formulario.
   *
   */
  protected function deleting($radarventas)
  {
  	$radarventas->delete();
    return -1;

  }

  /**
   * Función para manejar la eliminación de registros del formulario.
   * cabe destacar que llama internamente a la función $this->deleting
   * que es reescrita en la clase que hereda con el proceso que el usuario
   * necesite implementar.
   * Esta función deleting siempre debe retornar un valor >=-1.
   *
   */
  protected function deleteRadarventas($radarventas)
  {
    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      $this->coderr = $this->deleting($radarventas);

      if(is_array($this->coderr)){
        foreach ($this->coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('delete',$err);
          $this->updateError();
        }
      }elseif($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('delete',$err);
        $this->updateError();
      }

      //return -1;

    } catch (Exception $ex) {
      $this->coderr = 6;
      $err = Herramientas::obtenerMensajeError($this->coderr);
      $this->getRequest()->setError('delete',$err);
      $this->updateError();
    }

  }

  // Funcion para validar los datos de la vista luego de detectado un error
  // se usa por ejemplo para recargar la informacion y configuración de un grid
  protected function updateError()
  {
    return true;
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el obejto del modelo base del formulario.
   *
   */
  protected function updateRadarventasFromRequest()
  {
    $radarventas = $this->getRequestParameter('radarventas');

    $fields = RadarventasPeer::getFieldNames();

    if(array_search('Codalmusu', $fields))
    {
      if (isset($radarventas['codalmusu']))
      {
        $this->radarventas->setCodalmusu($radarventas['codalmusu']);
      }
    }
    if (isset($radarventas['ruta_id']))
    {
    $this->radarventas->setRutaId($radarventas['ruta_id'] ? $radarventas['ruta_id'] : null);
    }
    if (isset($radarventas['cliente_vendedor_por_ruta']))
    {
      $this->radarventas->setClienteVendedorPorRuta($radarventas['cliente_vendedor_por_ruta']);
    }
    if (isset($radarventas['registrar_articulos']))
    {
      $this->radarventas->setRegistrarArticulos($radarventas['registrar_articulos']);
    }
    if (isset($radarventas['fecha']))
    {
      if ($radarventas['fecha'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($radarventas['fecha']))
          {
            $value = $dateFormat->format($radarventas['fecha'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $radarventas['fecha'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->radarventas->setFecha($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->radarventas->setFecha(null);
      }
    }
    if (isset($radarventas['status']))
    {
      $this->radarventas->setStatus($radarventas['status']);
    }
    if (isset($radarventas['fafactur_id']))
    {
    $this->radarventas->setFafacturId($radarventas['fafactur_id'] ? $radarventas['fafactur_id'] : null);
    }

    if (isset($radarventas['ruta_id']))
    {
    $this->radarventas->setRutaId($radarventas['ruta_id'] ? $radarventas['ruta_id'] : null);
    }
    if (isset($radarventas['facliente_id']))
    {
    $this->radarventas->setFaclienteId($radarventas['facliente_id'] ? $radarventas['facliente_id'] : null);
    }
    if (isset($radarventas['vendedores_id']))
    {
    $this->radarventas->setVendedoresId($radarventas['vendedores_id'] ? $radarventas['vendedores_id'] : null);
    }
    if (isset($radarventas['fafactur_id']))
    {
    $this->radarventas->setFafacturId($radarventas['fafactur_id'] ? $radarventas['fafactur_id'] : null);
    }
    if (isset($radarventas['fecha']))
    {
      if ($radarventas['fecha'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($radarventas['fecha']))
          {
            $value = $dateFormat->format($radarventas['fecha'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $radarventas['fecha'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->radarventas->setFecha($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->radarventas->setFecha(null);
      }
    }
    if (isset($radarventas['status']))
    {
      $this->radarventas->setStatus($radarventas['status']);
    }

    if (isset($radarventas['ruta_id']))
    {
    $this->radarventas->setRutaId($radarventas['ruta_id'] ? $radarventas['ruta_id'] : null);
    }
    if (isset($radarventas['facliente_id']))
    {
    $this->radarventas->setFaclienteId($radarventas['facliente_id'] ? $radarventas['facliente_id'] : null);
    }
    if (isset($radarventas['vendedores_id']))
    {
    $this->radarventas->setVendedoresId($radarventas['vendedores_id'] ? $radarventas['vendedores_id'] : null);
    }
    if (isset($radarventas['fafactur_id']))
    {
    $this->radarventas->setFafacturId($radarventas['fafactur_id'] ? $radarventas['fafactur_id'] : null);
    }
    if (isset($radarventas['fecha']))
    {
      if ($radarventas['fecha'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($radarventas['fecha']))
          {
            $value = $dateFormat->format($radarventas['fecha'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $radarventas['fecha'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->radarventas->setFecha($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->radarventas->setFecha(null);
      }
    }
    if (isset($radarventas['status']))
    {
      $this->radarventas->setStatus($radarventas['status']);
    }

  }

  /**
   * Retorna el registro del modelo del formulario
   * Identifica si es un registro nuevo o actual, y lo retorna
   *
   */
  protected function getRadarventasOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $radarventas = new Radarventas();
    }
    else
    {
      $radarventas = RadarventasPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($radarventas);
    }

    return $radarventas;
  }

  /**
   * Función para procesar los filtros aplicados a la lista de registros
   *
   */
  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/radarventas/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/radarventas/filters');
    }
  }

  /**
   * Función para procesar el orden de los registros en la lista
   *
   */
  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/radarventas/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/radarventas/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/radarventas/sort'))
    {
    }
  }

  /**
   * Función para manejar los filtros de búsqueda
   * de la lista
   *
   */
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['facliente_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(RadarventasPeer::FACLIENTE_ID, '');
      $criterion->addOr($c->getNewCriterion(RadarventasPeer::FACLIENTE_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['facliente_id']) && $this->filters['facliente_id'] !== '')
    {
      $c->add(RadarventasPeer::FACLIENTE_ID, $this->filters['facliente_id']);
    }
    if (isset($this->filters['vendedores_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(RadarventasPeer::VENDEDORES_ID, '');
      $criterion->addOr($c->getNewCriterion(RadarventasPeer::VENDEDORES_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['vendedores_id']) && $this->filters['vendedores_id'] !== '')
    {
      $c->add(RadarventasPeer::VENDEDORES_ID, $this->filters['vendedores_id']);
    }
  }

  /**
   * Función para colocar el criterio de ordenación de la lista de registros
   * en la acción List
   *
   */
  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/radarventas/sort'))
    {
      $sort_column = RadarventasPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/radarventas/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }

  /**
   * Función para retornar las etiquetas del formulario
   *
   */
  protected function getLabels()
  {
    $arreglo=array(
                  'radarventas{ruta_id}' => 'Ruta:',
              'radarventas{cliente_vendedor_por_ruta}' => 'Cliente:',
              'radarventas{registrar_articulos}' => 'Registrar articulos:',
              'radarventas{fecha}' => 'Fecha:',
              'radarventas{status}' => 'Estatus:',
              'radarventas{fafactur_id}' => 'Fafactur:',
                          'radarventas{ruta_id}' => 'Ruta:',
              'radarventas{facliente_id}' => 'Cliente:',
              'radarventas{vendedores_id}' => 'Nombre y Apellidos del Vendedor:',
              'radarventas{fafactur_id}' => 'Fafactur:',
              'radarventas{fecha}' => 'Fecha:',
              'radarventas{status}' => 'Estatus:',
              'radarventas{id}' => 'Id:',
            );
   return $arreglo;
  }



  /**
   * Función para manejar el llamado Ajax automático con el
   * Helper Catalogo.
   *
   */
  public function executeCatalogo()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $clase = $this->getRequestParameter('clase','');
    $nombre = $this->getRequestParameter('name','');
    $campobase = $this->getRequestParameter('campobase','');
    $campoprincipal = $this->getRequestParameter('campoprincipal','');
    $camposecundario = $this->getRequestParameter('camposecundario','');

    $c = new Criteria();
    eval('$c->add('.ucfirst(strtolower($clase)).'Peer::'.strtoupper($campoprincipal).','.chr(39).$codigo.chr(39).');');
    eval('$peer = '.ucfirst(strtolower($clase)).'Peer::doSelectOne($c);');

  eval('$cajasec = "'.strtolower($nombre).'_'.strtolower($camposecundario).'";');
  eval('$cajaid = "'.strtolower($nombre).'_'.strtolower($campobase).'";');
  if ($peer){
  eval('$valsec = $peer->get'.H::ObtenerNombreCampo($camposecundario).'();');
  eval('$valid = $peer->getId();');}
  else{
    $valsec='';
    $valid='';
  }
  $output = '[["'.$cajasec.'","'.$valsec.'",""],["'.$cajaid.'","'.$valid.'",""],["","",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


  /**
   * Función para guardar la bitacora de la aplicacion
   * TODO: mejorar la carga de información en la bitacora
   * Actualmente esta planteada información no muy relevante
   *
   */
 public function SalvarBitacora($id, $acc)
  {
    try{
      $segbitaco= new Segbitaco();
      $fecha=date('Y-m-d');

      $segbitaco->setCodintusu($this->getUser()->getAttribute('usuario_id'));
      $segbitaco->setTipope(substr($acc, 0, 1));
      $segbitaco->setCodmod('radarventas');
      $segbitaco->setValcla('Radarventas');
      $segbitaco->setCodapl(substr(SF_APP, 0, 3));
      $segbitaco->setFecope($fecha);
      $segbitaco->setHorope(time('h:i:s'));
      $segbitaco->setRefmov($id);
      $segbitaco->save();
    }catch(Exception $e){

    }
  }

  public function Bitacora($acc)
  {
	$id= $this->radarventas->getId();
    $this->SalvarBitacora($id ,$acc);
  }






}
