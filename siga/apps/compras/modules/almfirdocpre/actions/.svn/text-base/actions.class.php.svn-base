<?php

/**
 * almfirdocpre actions.
 *
 * @package    siga
 * @subpackage almfirdocpre
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almfirdocpreActions extends autoalmfirdocpreActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid($this->cafirdocpre->getCoddirec(),$this->cafirdocpre->getTipdoc());

  }

  public function configGrid($coddirec='', $tipdoc='')
  {
    $c = new Criteria();
    $c->add(CadetfirdocprePeer::CODDIREC, $coddirec);
    $c->add(CadetfirdocprePeer::TIPDOC, $tipdoc);
    $result = CadetfirdocprePeer::doSelect($c);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almfirdocpre/' . sfConfig :: get('sf_app_module_config_dir_name').'/grid');
    
    if ($result)
       $this->columnas[1][0]->setOculta(false);
    $this->obj = $this->columnas[0]->getConfig($result);

    $this->cafirdocpre->setObj($this->obj);

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato="";
    switch ($ajax){
      case '1':
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
   
        $q= new Criteria();
        if ($filsoldir=='S'){
          $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
        }else $q->add(CadefdirecPeer::CODDIREC,$codigo);
        $reg= CadefdirecPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesdirec();                     
        }else {
            $js="alert_('El Estado no existe o no esta asociada al usuario'); $('cafirdocpre_coddirec').value=''; $('cafirdocpre_coddirec').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';     
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    return Compras::grabarFirmasDocumentosPreimpresos($clasemodelo,$grid);
  }

  public function deleting($clasemodelo)
  {
    $x= new Criteria();
    $x->add(CadetfirdocprePeer::CODDIREC, $clasemodelo->getCoddirec());
    $x->add(CadetfirdocprePeer::TIPDOC, $clasemodelo->getTipdoc());
    $result = CadetfirdocprePeer::doSelect($x);
    foreach ($result as $objx) {
      $objx->delete();
    }

    return parent::deleting($clasemodelo);
  }


}
