<?php

/**
 * bieregpolcer actions.
 *
 * @package    siga
 * @subpackage bieregpolcer
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class bieregpolcerActions extends autobieregpolcerActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid($this->bnregpolcer->getNumpol());
  }

  public function configGrid($numpol='', $numsol='')
  {
    if ($numsol!='')
    {
      $reg=array();
       $c1 = new Criteria();
       $c1->add(BndetsolpolcerPeer::NUMSOL,$numsol);
       $reg1 =  BndetsolpolcerPeer::doSelect($c1);
       if ($reg1){
        foreach ($reg1 as $obj1) {
          $bndetregpolcet2= new Bndetregpolcer();
          $bndetregpolcet2->setCodact($obj1->getCodact());
          $bndetregpolcet2->setCodmue($obj1->getCodmue());
          $bndetregpolcet2->setDesmue($obj1->getDesmue());
          $bndetregpolcet2->setMarmue($obj1->getMarmue());
          $bndetregpolcet2->setModmue($obj1->getModmue());
          $bndetregpolcet2->setSermue($obj1->getSermue());
          $bndetregpolcet2->setNomapeest($obj1->getNomapeest());
          $bndetregpolcet2->setNomaperep($obj1->getNomaperep());
          $bndetregpolcet2->setCodubi($obj1->getCodubi());
          $bndetregpolcet2->setDesubi($obj1->getDesubi());
          $bndetregpolcet2->setValini($obj1->getvalini());
          $bndetregpolcet2->setMonpri($obj1->getMonpri());
          $reg[]=$bndetregpolcet2;
        }
       }

    }else {
      $c = new Criteria();
      $c->add(BndetregpolcerPeer::NUMPOL,$numpol);
      $reg =  BndetregpolcerPeer::doSelect($c);
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/bieregpolcer/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_muebles');
    
    $this->obj = $this->columnas[0]->getConfig($reg);

    $this->bnregpolcer->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $js=""; $dato=""; $sw=true;

    switch ($ajax){
      case '1':
        $sw=false;
        $t= new Criteria();
        $t->add(BnsolpolcerPeer::NUMSOL,$codigo);
        $result= BnsolpolcerPeer::doSelectOne($t);
        if ($result)
          $dato=$result->getTipsol2();                    
        else{
          $codigo='';
          $js="alert_('La Solictud no esta registrada'); $('bnregpolcer_numsol').value=''; $('bnregpolcer_numsol').focus();";
        }

        $this->params=array();
        $this->bnregpolcer = $this->getBnregpolcerOrCreate();
        $this->updateBnregpolcerFromRequest();
        $this->labels = $this->getLabels();
       
        $this->configGrid('',$codigo);
        
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
      $this->bnregpolcer = $this->getBnregpolcerOrCreate();
      try{ $this->updateBnregpolcerFromRequest();}
      catch (Exception $ex){}
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      if (count($grid[0])==0)
        $this->coderr=4;

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

    Bienes::salvarRegistroPolizasCertificados($clasemodelo,$grid);

    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Bndetregpolcer','Numpol',$clasemodelo->getNumpol());
    return parent::deleting($clasemodelo);
  }


}
