<?php

/**
 * tesaprproord actions.
 *
 * @package    siga
 * @subpackage tesaprproord
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesaprproordActions extends autotesaprproordActions
{

    public function executeIndex()
  {
    return $this->forward('tesaprproord', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
    $this->opordpag->setFilasord($this->filas);
    $q= new Criteria();
    $q->setLimit(1);
    $q->addDescendingOrderByColumn(OpordpagPeer::NUMORD);
    $regq= OpordpagPeer::doSelectOne($q);
    if ($regq)
      $this->opordpag->setNumord2($regq->getNumord());

    $l= new Criteria();
    $l->setLimit(1);
    $l->addAscendingOrderByColumn(OpordpagPeer::NUMORD);
    $regl= OpordpagPeer::doSelectOne($l);
    if ($regl)
      $this->opordpag->setNumord1($regl->getNumord());
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($n1="", $n2="")
  {
    $detalle=array();   
    $loguse= $this->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
    $sql2="";
    if ($filsoldir=='S') $sql2=" and coddirec='0000'"; // in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
    if ($n1=="" && $n2=="")
    {   
        $detalle=array();
    }else {
     $sql="select * from opordpag where (numord>='$n1' and numord<='$n2') and status='N' and numche isnull 
     and (aprproord<>'A'or aprproord isnull) and ((APROBADOORD<>'A' and APROBADOORD<>'R') or APROBADOORD isnull) ".$sql2." order by fecemi, numord";
       Herramientas::BuscarDatos($sql,$result);
      if ($result) {
        foreach ($result as $key) {
          $opordpag= new Opordpag();
          $opordpag->setAprproord("0");             
          $opordpag->setNumord($key["numord"]);
          $opordpag->setDesord($key["desord"]);
          $opordpag->setFecemi($key["fecemi"]);
          $opordpag->setMonord($key["monord"]);
          $opordpag->setNomben($key["nomben"]);
          $detalle[]=$opordpag;
        }
      }
    }

    $this->filas=count($detalle);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesaprproord/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ordenes');

    $this->objeto =$this->columnas[0]->getConfig($detalle);

    $this->opordpag->setObjeto($this->objeto);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
         $numord1 = $this->getRequestParameter('opordpag[numord1]','');
         $numord2 = $this->getRequestParameter('opordpag[numord2]','');          
          
        $this->params=array();
        $this->opordpag = $this->getOpordpagOrCreate();
        $this->updateOpordpagFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($numord1, $numord2);
        $this->opordpag->setFilasord($this->filas);
        $numfilas=$this->filas;
          
        $output = '[["opordpag_filasord","'.$numfilas.'",""],["","",""],["","",""]]';
        break;
    }

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
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);

  }

  public function saving($clasemodelo)
  {
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
    OrdendePago::aprobarPropuestasPagos($opordpag,$grid);
    return -1;
  }
  
}
