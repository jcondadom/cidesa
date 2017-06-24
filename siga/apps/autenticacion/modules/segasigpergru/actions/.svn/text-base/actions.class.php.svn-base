<?php

/**
 * segasigpergru actions.
 *
 * @package    siga
 * @subpackage segasigpergru
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class segasigpergruActions extends autosegasigpergruActions
{
  public function executeIndex()
  {
    return $this->redirect('segasigpergru/edit');
  }


  public function editing()
  {
    $this->configGrid($this->seggruapl->getCodgru(),$this->seggruapl->getCodapl());
  }

  public function configGrid($codgru='', $codapl='')
  {
     if($codapl!=''){
      $apl = explode('_',$codapl);
      $yml = $apl[0];
      $cod = $apl[1];
    }else{
      $yml = '';
      $cod = '';
    }

    $dir=CIDESA_CONFIG.'/menus/'.strtolower($yml);
    cidesaTools::exitsfile($dir) ? $dir=$dir : $dir = sfConfig::get('sf_root_dir').'/config/menus/'.strtolower($yml);
    $modulos = sfYaml::load($dir);

    if(is_array($modulos)){
      if($yml){
        $n = explode('.',$yml);
        $modulos = $modulos[$n[0]]['menu'];
      }
    }

    $dir_reportes = $this->getUser()->getAttribute('reportes', '').'reportes/reportes.yml';
    if(cidesaTools::exitsfile($dir_reportes)) {
      $reportes = sfYaml::load($dir_reportes);

      $modname = substr(strtolower($yml),  0, -4);
      if(isset ($reportes[$modname])){
        $modulos['Reportes'] = $reportes[$modname]; 
      }
    }

    $c = new Criteria();
    $c->add(SeggruaplPeer::CODGRU,$codgru);
    $c->add(SeggruaplPeer::CODAPL,$cod);
    $c->add(SeggruaplPeer::CODEMP,$this->getUser()->getAttribute('empresa', ''));
    $apliusers = SeggruaplPeer::doSelect($c);

    if(is_array($modulos)){
      $modulos = H::array_lineal($modulos);
    }

    $per = array();

    foreach($modulos as $k => $v)
    {
      $priuse = '';
      $id = '';
      foreach($apliusers as $obj){
        if($obj->getNomopc() == strtolower($k)) {
           $priuse = $obj->getPriuse();
           $id = $obj->getId();
        }
      }
      $per[] = array('desopc' => $v,'nomopc' => strtolower($k), 'priuse' => $priuse, 'id' => $id);
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/segasigpergru/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_formularios');
    $this->columnas[1][2]->setCombo(Constantes::Permisologias());

    $this->obj =$this->columnas[0]->getConfig($per);

    $this->seggruapl->setObj($this->obj);

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js=""; $dato="";
    switch ($ajax){
      case '1':
        $c = new Criteria();
        $c->add(SeggrupoPeer::CODGRU,$codigo);
        $reg= SeggrupoPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getDesgru();
        }else $js="alert('El Grupo no existe'); $('seggruapl_codgru').value=''; $('seggruapl_codgru').focus();";
        $output = '[["seggruapl_desgru","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '2':
        $grupo=$this->getRequestParameter('grupo');
        $this->params=array();
        $this->seggruapl = $this->getSeggruaplOrCreate();
        $this->updateSeggruaplFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($grupo,$codigo);
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    

    

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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    $codempresa = $this->getUser()->getAttribute('empresa');
    Autenticacion::salvarPerfilGrupo($clasemodelo,$grid,$codempresa);
    return -1;
  }

}
