<?php

/**
 * nomcarfun actions.
 *
 * @package    siga
 * @subpackage nomcarfun
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomcarfunActions extends autonomcarfunActions
{

/*    public function executeIndex()
  {
    return $this->forward('nomcarfun', 'edit');
  }*/

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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npasocarfun/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Npasocarfun', 15);
    $c = new Criteria();
    //$this->c ? $c=$this->c : '';
    //$c->setDistinct();
    $c->addSelectColumn(NpasocarfunPeer::CODCAR);
    $c->addSelectColumn(NpasocarfunPeer::CODNIV);
    $c->addSelectColumn("'' as NOMCAR");
    $c->addSelectColumn("'' as DESNIV");
    $c->addSelectColumn("'' as DESFUN");
    $c->addSelectColumn("'' as ID");
    $c->addGroupByColumn(NpasocarfunPeer::CODCAR);
    $c->addGroupByColumn(NpasocarfunPeer::CODNIV);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

    /**
   * Retorna el registro del modelo del formulario
   * Identifica si es un registro nuevo o actual, y lo retorna
   *
   */
  protected function getNpasocarfunOrCreate($id = 'id', $codcar='codcar', $codniv='codniv')
  {
    if (!$this->getRequestParameter($id) && $this->getRequestParameter($codcar)=='' && $this->getRequestParameter($codniv)=='')
    { 
      $npasocarfun = new Npasocarfun();
    }
    else
    {    
      $n= new Criteria();
      $n->add(NpasocarfunPeer::CODCAR,$this->getRequestParameter($codcar));
      $n->add(NpasocarfunPeer::CODNIV,$this->getRequestParameter($codniv));
      $npasocarfun = NpasocarfunPeer::doSelectOne($n); //retrieveByPk($this->getRequestParameter($id));
      if (!$npasocarfun){
        $n= new Criteria();
        $n->add(NpasocarfunPeer::CODCAR,$this->getRequestParameter('npasocarfun[codcar]'));
        $n->add(NpasocarfunPeer::CODNIV,$this->getRequestParameter('npasocarfun[codniv]'));
        $npasocarfun = NpasocarfunPeer::doSelectOne($n);
      }

      $this->forward404Unless($npasocarfun);
    }

    return $npasocarfun;
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
    $this->npasocarfun = $this->getNpasocarfunOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpasocarfunFromRequest();

      if($this->saveNpasocarfun($this->npasocarfun) ==-1){
        $c= new Criteria();
         $c->add(NpasocarfunPeer::CODCAR,$this->npasocarfun->getCodcar());
         $c->add(NpasocarfunPeer::CODNIV,$this->npasocarfun->getCodniv());
         $npasoc = NpdiaextPeer::doSelectOne($c);
         if (count($npasoc)>0)
         {
          $this->npasocarfun->setId($npasoc->getId());
         }
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->npasocarfun->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('nomcarfun/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('nomcarfun/list');
        }
        else
        {
            //return $this->redirect('nomcarfun/edit?id='.$this->npasocarfun->getId());
            return $this->redirect('nomcarfun/edit?id=');
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

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {

    $this->configGrid($this->npasocarfun->getCodcar(),$this->npasocarfun->getCodniv());
  }

  public function configGrid($codcar='',$codniv='')
  {
     $c = new Criteria();     
     $c->add(NpasocarfunPeer::CODCAR,$codcar);
     $c->add(NpasocarfunPeer::CODNIV,$codniv);
     $reg = NpasocarfunPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomcarfun/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $this->obj = $this->columnas[0]->getConfig($reg);
    
    $this->npasocarfun->setObj($this->obj);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $sw=true; $dato=""; $js="";

    switch ($ajax){
      case '1':
        $p= new Criteria();
        $p->add(NpcargosPeer::CODCAR,$codigo);
        $regp= NpcargosPeer::doSelectOne($p);
        if ($regp){
          $dato=$regp->getNomcar();          
        }else $js="alert('El Cargo no esta registrado'); $('npcargos_codcar').value=''; $('npcargos_nomcar').value='';";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        $cargo = $this->getRequestParameter('cargo','');
       // $sw=false;
        if ($cargo!='') {
          $r= new Criteria();
          $r->add(NpestorgPeer::CODNIV,$codigo);
          $regr= NpestorgPeer::doSelectOne($r);
          if ($regr){
            $dato=$regr->getDesniv();
          }else {
            $js="alert('La Ubicaci&oacute;n Administrativa no esta registrado'); $('npcargos_codniv').value=''; $('npcargos_desniv').value='';";
            $codigo='';
            $cargo='';
          }
        }else {
          $js="alert('El Cargo no puede estar en blanco'); $('npcargos_codcar').focus();";
          $codigo='';
        }

        /*$this->params=array();
        $this->npcargos = $this->getNpcargosOrCreate();
        $this->labels = $this->getLabels();

        $this->configGrid($cargo, $codigo);*/

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw) return sfView::HEADER_ONLY;
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

      $this->npasocarfun = $this->getNpasocarfunOrCreate();
      $this->updateNpasocarfunFromRequest();

      if (!$this->getRequestParameter('id')) {
        $n= new Criteria();
        $n->add(NpasocarfunPeer::CODCAR,$this->getRequestParameter('npasocarfun[codcar]'));
        $n->add(NpasocarfunPeer::CODNIV,$this->getRequestParameter('npasocarfun[codniv]'));
        $trae = NpasocarfunPeer::doSelectOne($n);
        if ($trae){
          $this->coderr=4418;
        }
      }

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
    //H::PrintR($grid); exit;
    $q= new Criteria();
    $q->add(NpasocarfunPeer::CODCAR,$clasemodelo->getCodcar());
    $q->add(NpasocarfunPeer::CODNIV,$clasemodelo->getCodniv());
    NpasocarfunPeer::doDelete($q);

     //Salvar Funciones
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getDesfun() != ''){
        $new_r= new Npasocarfun();
        $new_r->setCodcar($clasemodelo->getCodcar());
        $new_r->setCodniv($clasemodelo->getCodniv());
        $new_r->setDesfun($x[$j]->getDesfun());
        $new_r->save();
      }
      $j++;
    }        
    
    return -1;
  }

    /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de eliminación adecuado para cada formulario.
   *
   */
  protected function deleting($npasocarfun)
  {
    $p= new Criteria();
    $p->add(NpfuncarptoctaPeer::CODCAR,$npasocarfun->getCodcar());
    $p->add(NpfuncarptoctaPeer::CODNIV,$npasocarfun->getCodniv());
    $regp= NpfuncarptoctaPeer::doSelectOne($p);
    if (!$regp) {
      $n= new Criteria();
      $n->add(NpasocarfunPeer::CODCAR,$npasocarfun->getCodcar());
      $n->add(NpasocarfunPeer::CODNIV,$npasocarfun->getCodniv());
      $reg = NpasocarfunPeer::doSelect($n);
      if ($reg) {
        foreach ($reg as $regobj) {
          $regobj->delete();
        }
      }
    }else return 4419;

    return -1;

  }



}
