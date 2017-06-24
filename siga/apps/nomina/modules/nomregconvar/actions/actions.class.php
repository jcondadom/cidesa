<?php

/**
 * nomregconvar actions.
 *
 * @package    siga
 * @subpackage nomregconvar
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomregconvarActions extends autonomregconvarActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
   $this->configGrid($this->npregconvar->getCodcon(),$this->npregconvar->getCodnom(),$this->npregconvar->getFecnom(),$this->npregconvar->getCodemp());

  }

  public function configGrid($codcon='', $codnom='', $fecnom='', $codemp='')
  {
     $c= new Criteria();
     $c->add(NpregdetconvarPeer::CODCON,$codcon);
     $c->add(NpregdetconvarPeer::CODNOM,$codnom);
     $c->add(NpregdetconvarPeer::FECNOM,$fecnom);
     $c->add(NpregdetconvarPeer::CODEMP,$codemp);
     $per= NpregdetconvarPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomregconvar/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_det');

     $this->obj =$this->columnas[0]->getConfig($per);

     $this->npregconvar->setObj($this->obj);    
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $dato2=""; $js="";
    switch ($ajax){
      case '1':
        $l= new Criteria();
        $l->add(NpdefcptPeer::CODCON,$codigo);
        $reg= NpdefcptPeer::doSelectOne($l);
        if ($reg)
        {
          $dato=$reg->getNomcon(); 
        }else{
           $dato2="";$js="alert_('El Concepto no existe'); $('npregconvar_codcon').value=''; $('npregconvar_codnom').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["npasicaremp_frecal","'.$dato2.'",""],["javascript","'.$js.'",""]]';
        break;      
      case '2':
        $l= new Criteria();
        $l->add(NpnominaPeer::CODNOM,$codigo);
        $reg= NpnominaPeer::doSelectOne($l);
        if ($reg)
        {
               $dato=$reg->getNomnom(); 
               $dato2 = date('d/m/Y',strtotime($reg->getProfec()));
        }else{
           $dato2="";$js="alert_('El N&oacute;mina no existe'); $('npregconvar_codnom').value=''; $('npregconvar_codnom').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["npregconvar_fecnom","'.$dato2.'",""],["javascript","'.$js.'",""]]';
        break;        
      case '3':
        $nomina = $this->getRequestParameter('nomina');
        $l= new Criteria();        
        $l->add(NpasicarempPeer::STATUS,'V');
        $l->add(NpasicarempPeer::CODNOM,$nomina);
        $l->add(NphojintPeer::CODEMP,$codigo);
        $l->addJoin(NphojintPeer::CODEMP,NpasicarempPeer::CODEMP);
        $reg= NphojintPeer::doSelectOne($l);
        if ($reg)
        {
           $dato=$reg->getNomemp(); 
           $dato2=$reg->getNomcar();
        }else{
           $dato2="";$js="alert('El Empleado no existe'); $('npregconvar_codemp').value=''; $('npregconvar_codemp').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["npregconvar_nomcar","'.$dato2.'",""],["javascript","'.$js.'",""]]';
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

      $this->npregconvar = $this->getNpregconvarOrCreate();
      $this->updateNpregconvarFromRequest();

      if (!$this->npregconvar->getId()){
        $a= new Criteria();
        $a->add(NpregconvarPeer::CODCON,$this->npregconvar->getCodcon());
        $a->add(NpregconvarPeer::CODNOM,$this->npregconvar->getCodnom());
        $a->add(NpregconvarPeer::FECNOM,$this->npregconvar->getFecnom());
        $a->add(NpregconvarPeer::CODEMP,$this->npregconvar->getCodemp());
        $result=NpregconvarPeer::doSelectOne($a);  
        if ($result)
          $this->coderr=4414;
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
    Nomina:: grabarConceptosVariables($clasemodelo, $grid);
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    $a= new Criteria();
    $a->add(NpregdetconvarPeer::CODCON,$clasemodelo->getCodcon());
    $a->add(NpregdetconvarPeer::CODNOM,$clasemodelo->getCodnom());
    $a->add(NpregdetconvarPeer::FECNOM,$clasemodelo->getFecnom());
    $a->add(NpregdetconvarPeer::CODEMP,$clasemodelo->getCodemp());
    NpregdetconvarPeer::doDelete($a);
    
    return parent::deleting($clasemodelo);
  }


}
