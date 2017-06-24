<?php

/**
 * tesaprorddir actions.
 *
 * @package    siga
 * @subpackage tesaprorddir
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesaprorddirActions extends autotesaprorddirActions
{

  public function executeIndex()
  {
    return $this->forward('tesaprorddir', 'edit');
  }

  public function editing()
  {
    $this->configGridOrdenes();
    $this->opordpag->setFilasord($this->filas);
  }

  public function configGridOrdenes($n1="", $n2="")
  {
    $loguse= $this->getUser()->getAttribute('loguse');
    $filubiadm=H::getConfApp2('filubiadm', 'tesoreria', 'pagemiord');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');    
    
    $sql2="";
    if ($filubiadm=='S') $sql2=' and opordpag.coduni in (select codubi from "SIMA_USER".segubausu where loguse=\''.$loguse.'\')';

    if ($filsoldir=='S') $sql2.=' and opordpag.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';

    if ($n1=="" && $n2=="")
    {
        $c = new Criteria();
        $c->add(OpordpagPeer::NUMORD,null);
        $detalle = OpordpagPeer::doSelect($c);
    }else {
      $c = new Criteria();
      $c->add(OpordpagPeer::STATUS,'N');
      $sql = "(opordpag.numord>='$n1' and opordpag.numord<='$n2') and (((opordpag.APRORDDIR<>'A' and opordpag.APRORDDIR<>'R') or opordpag.APRORDDIR isnull) and ((cpdoccau.refier='N' and cpdoccau.afeprc='S' and cpdoccau.afecom='S' and cpdoccau.afecau='S' and cpdoccau.afedis='R'))) ".$sql2."";
      $c->add(OpordpagPeer::APRORDDIR, $sql, Criteria :: CUSTOM);
      $c->add(OpordpagPeer::NUMCHE,null);
      $c->addJoin(OpordpagPeer::TIPCAU,CpdoccauPeer::TIPCAU);
      $c->addAscendingOrderByColumn(OpordpagPeer::FECEMI);
      $c->addAscendingOrderByColumn(OpordpagPeer::NUMORD);
      $detalle = OpordpagPeer::doSelect($c);
  }

    $this->filas=count($detalle);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesaprorddir/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ordenes');

    $this->columnas[1][0]->setHTML('onClick="verificar(this.id)"');
	$this->columnas[1][1]->setHTML('onClick="verificar(this.id)"');

    $this->objeto =$this->columnas[0]->getConfig($detalle);

    $this->opordpag->setObjeto($this->objeto);
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
        $this->configGridOrdenes($numord1, $numord2);
        $this->opordpag->setFilasord($this->filas);
        $numfilas=$this->filas;
          
        $output = '[["opordpag_filasord","'.$numfilas.'",""],["","",""],["","",""]]';
        break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    //return sfView::HEADER_ONLY;
  }

  public function updateError()
  {
    $this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
  }

 protected function saving($opordpag)
 {
   $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
   OrdendePago::aprobarOrdenesDirectas($opordpag,$grid);
   return -1;
 }


}
