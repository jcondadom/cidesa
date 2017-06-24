<?php

/**
 * fadefcaj actions.
 *
 * @package    siga
 * @subpackage fadefcaj
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class fadefcajActions extends autofadefcajActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid($this->fadefcaj->getId());
  }

  public function configGrid($idcaja='')
  {
    $reg1=array();
    $a= new Criteria();
    $a->add(FarancorcajPeer::CODCAJ,$idcaja);
    $reg1= FarancorcajPeer::doSelect($a);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/fadefcaj/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_rangos');

    $this->obj = $this->columnas[0]->getConfig($reg1);

    $this->fadefcaj->setObj($this->obj);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        $n = new Criteria();
        $n->add(CadefalmPeer::CODALM, $codigo);
        $nombre= CadefalmPeer::doSelectOne($n);
        $cajtexmos= $this->getRequestParameter('cajtexmos', '');
        $resultado= "";
        $js= "";
        if($nombre)
            $resultado = $nombre->getNomalm();
        else
            $js= "alert('El código del almacén no existe'); $('fadefcaj_codalm').value=''; $('fadefcaj_nomalm').value=''; $('fadefcaj_codalm').focus();";
        $codalm   = $this->getRequestParameter('codalm','');
        $desalm   = $this->getRequestParameter('desalm','');
        $output = '[["'. $cajtexmos .'","'. $resultado .'",""],["javascript","'. $js .'",""],["","",""]]';
        break;
      case '2':
        $cajtexmos= $this->getRequestParameter('cajtexmos', '');
        $dato= "";      $js= "";
        $n = new Criteria();
        $n->add(FaconpagPeer::ID, $codigo);
        $registro= FaconpagPeer::doSelectOne($n);        
        if($registro)
            $dato = $registro->getDesconpag();
        else
            $js= "alert_('La Condici&oacute;n de Pago no existe'); $('fadefcaj_conpag').value=''; $('fadefcaj_desconpag').value=''; $('fadefcaj_conpag').focus();";
        $output = '[["'. $cajtexmos .'","'. $dato .'",""],["javascript","'. $js .'",""],["","",""]]';
        break;        
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

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

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    Facturacion::SalvarRangosCaja($clasemodelo, $grid);

    return -1;
  }

  public function deleting($clasemodelo)
  {

    return parent::deleting($clasemodelo);
  }

  public function executeReporte()
  {
    $fadefcaj = $this->getFadefcajOrCreate();
    $reporte = $this->getRequestParameter('reporte','');

    if($fadefcaj){
      require 'plugins/sidekiq-job-pusher/autoload.php';
      require 'lib/SidekiqJobPusher/Client.php';
      require 'lib/SidekiqJobPusher/KeyGenerator.php';
      require 'lib/SidekiqJobPusher/MessageSerialiser.php';

      $redis = new Predis\Client(array(
      'host' => $fadefcaj->getImpfishost(),
      'port' => '6379',
      ));

      $sidekiq = new SidekiqJobPusher\Client($redis, $fadefcaj->getImpfisname());

      if($reporte=='x'){
        $sidekiq->perform('ReporteWorker', array("X"));
      }elseif ($reporte=='z') {
        $sidekiq->perform('ReporteWorker', array("Z"));  
      }elseif ($reporte=='c') {
        $sidekiq->perform('CancelarImpresionWorker', array(''));  
      }elseif ($reporte=='r') {
        $sidekiq->perform('ResetWorker', array(''));
      }

// print("<pre>");
// print_r($sidekiq);exit;

      $this->setFlash('notice', 'Fué enviada la solicitud de reporte "'.strtoupper($reporte)).'".';

      return $this->redirect('fadefcaj/edit?id='.$fadefcaj->getId());

    }

  }

}
