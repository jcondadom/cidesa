<?php

/**
 * nomplacur actions.
 *
 * @package    siga
 * @subpackage nomplacur
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomplacurActions extends autonomplacurActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridPersonal($this->rhplacur->getCodplacur());
    $this->configGridGrupos();
  }

  public function configGridPersonal($codplacur='', $arreglo=array())
  {    
    $per=array();
    if (count($arreglo)>0){
      $i=0;
      while ($i<count($arreglo)) {
        $rhdetplacur_new= new Rhdetplacur();
        $rhdetplacur_new->setCodemp($arreglo[$i]["codemp"]);
        $rhdetplacur_new->setCodcar($arreglo[$i]["codcar"]);
        $rhdetplacur_new->setCodgru($arreglo[$i]["codgru"]);
        $per[]=$rhdetplacur_new;
        $i++;
      }

    }else {
      $c = new Criteria();
      $c->add(RhdetplacurPeer::CODPLACUR,$codplacur);
      $per = RhdetplacurPeer::doSelect($c);
    }
    
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Rhdetplacur');
    $opciones->setAnchoGrid(900);
    $opciones->setAncho(1300);
    $opciones->setName('a');
    $opciones->setFilas(1); 
    $opciones->setTitulo('Personal');
    $opciones->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Código Empleado');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);    
    $col1->setNombreCampo('codemp');
    $col1->setCatalogo('nphojint','sf_admin_edit_form',array('codemp' => 1,'nomemp' => 2), 'Oycregsol_nphojint');
    $col1->setHTML('type="text" size="10" maxlength="16" onBlur="toAjax(\'2\',getUrlModulo()+\'ajax\',this.value,\'\',\'&idcaja=\'+this.id)"');

    $col2 = new Columna('Nombre');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomemp');
    $col2->setHTML('type="text" size="40" readonly="true"');
  
    $col3 = new Columna('Código del Cargo');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('codcar');
    $col3->setHTML('type="text" size="10" readonly="true"');  
  
    $col4 = new Columna('Nombre');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('nomcar');
    $col4->setHTML('type="text" size="40" readonly="true" ');  

    $col5 = new Columna('Tipo');
    $col5->setTipo(Columna::COMBO);
    $col5->setCombo(array('I'=>'INTERNO','E'=>'EXTERNO'));
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::IZQUIERDA);
    $col5->setAlineacionContenido(Columna::IZQUIERDA);
    $col5->setNombreCampo('tipper');
    $col5->setHTML('type="text"  ');

    $col6 = new Columna('Código del Grupo');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(true);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setNombreCampo('codgru');
    $col6->setHTML('type="text" size="10" readonly="true"');  
    $col6->setOculta(true);

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3); 
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);

    $this->rhplacur->setObj($this->obj);
  }

  public function configGridGrupos($tieper='')
  {
    $reg=array();
    if ($tieper=='S') {
     $c = new Criteria();
     $sql="rhgruadi.codgru in (select codgru from rhgruadiemp)";
     $c->add(RhgruadiPeer::CODGRU,$sql,Criteria::CUSTOM);
     $reg = RhgruadiPeer::doSelect($c);
    }

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomplacur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_grupos');

     $this->obj2 = $this->columnas[0]->getConfig($reg);

     $this->rhplacur->setObj2($this->obj2);

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js=$dato=""; $sw=true;
    $this->ajax=$ajax;
    switch ($ajax){
      case '1':
        $c = new Criteria();
        $c->add(RhdefcurPeer::CODCUR,$codigo);
        $per = RhdefcurPeer::doSelectOne($c);
        if($per)
        {
          $turno = $per->getTurcur()=='D' ? 'Diurno' : 'Nocturno';
          $output = '[["rhplacur_descur","'.$per->getDescur().'",""],["rhplacur_fecini","'.date('d/m/Y',strtotime($per->getFecini())).'",""],["rhplacur_fecfin","'.date('d/m/Y',strtotime($per->getFecfin())).'",""],
                      ["rhplacur_durcur","'.H::FormatoMonto($per->getDurcur()).'",""],["rhplacur_turcur","'.$turno.'",""]]';
        }         
        else      {
          $js="alert('El Curso no esta registrado'); $('rhplacur_codcur').value=''; $('rhplacur_descur').value=''; $('rhplacur_codcur').focus();";
          $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';     
        }
        break;
      case '2':
        $idcaja = $this->getRequestParameter('idcaja','');
        $auxid= split("_", $idcaja);
        $c = new Criteria();
        $c->add(NpasicarempPeer::CODEMP,$codigo);
        $c->add(NpasicarempPeer::STATUS,'V');
        $per = NpasicarempPeer::doSelectOne($c);
        if($per)
        {
          $output = '[["'.$auxid[0].'_'.$auxid[1].'_3","'.$per->getCodcar().'",""],["'.$auxid[0].'_'.$auxid[1].'_4","'.$per->getNomcar().'",""],["","",""]]';     
        }else   {
          $js="alert('El Empleado no se encuentra Vigente o no esta Registrado'); $('$idcaja').value=''; $('$idcaja').focus();";
          $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]'; 
        }
        break;
      case '3':
        $sw=false;
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->rhplacur = $this->getRhplacurOrCreate();   
        $this->configGridGrupos($this->getRequestParameter('pergru'));
        //$filsal=$this->filsal;
        //$output = '[["javascript","'.$javascript.'",""],["opordpag_filassal","'.$filsal.'",""],["","",""]]';        
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '4':
        $sw=false;
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->rhplacur = $this->getRhplacurOrCreate();
        $arre=Nomina::FormarArrePersonal($codigo);
        $this->configGridPersonal('',$arre);
        //$filajax=$this->filajax;
        //$output = '[["javascript","'.$javascript.'",""],["opordpag_filasord","'.$filajax.'",""],["","",""]]';
        $output = '[["","",""],["","",""],["","",""]]';
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

      $this->rhplacur = $this->getRhplacurOrCreate();
      $this->updateRhplacurFromRequest();
      $this->configGridPersonal();    
    
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    
      if(count($grid[0])>=1)
      {
        foreach($grid[0] as $dat)
      {
        if(!$dat->getCodemp())
        {
          $this->coderr=807;
          return false;
        }
        if(!$dat->getCodcar())
        {
          $this->coderr=807;
          return false;
        }
        if(!$dat->getTipper())
        {
          $this->coderr=807;
          return false;
        }
      }           
      }else
      {
        $this->coderr=808;
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
    $arreglo=array('Codplacur');
    H::Guardar_Grid($grid,$arreglo,$clasemodelo);
    $clasemodelo->save();
    return -1;
  }

  public function deleting($clasemodelo)
  {
    $c = new Criteria();
    $c->add(RhinscurPeer::CODPLACUR,$clasemodelo->getCodplacur());
    $c->add(RhinscurPeer::CODCUR,$clasemodelo->getCodcur());
    $per = RhinscurPeer::doSelectOne($c);
    if($per)
    {
      return 830;
    }else 
    {
      $c = new Criteria();
      $c->add(RhdetplacurPeer::CODPLACUR,$clasemodelo->getCodplacur());
      RhdetplacurPeer::doDelete($c);
      
      $clasemodelo->delete();
      return -1;
    } 
  }


}
