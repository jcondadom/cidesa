<?php

/**
 * pregencomapo actions.
 *
 * @package    siga
 * @subpackage pregencomapo
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class pregencomapoActions extends autopregencomapoActions
{

  public function executeIndex()
  {
    return $this->forward('pregencomapo', 'edit');
  }    
    
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->cpcompro->setRefcom('########');
     $this->cpcompro->setFeccom(date('Y-m-d'));
     $this->configGrid();    
  }

  public function configGrid($arreglo=array())
  {
    if (count($arreglo)>0)
    {
        $y=0;
        while ($y<count($arreglo))
        {
            $cpimpcom= new Cpimpcom();
            $cpimpcom->setCodpre($arreglo[$y]["codpre"]);
            $cpimpcom->setMonimp($arreglo[$y]["monto"]);                
            $reg[]=$cpimpcom;                
            $y++;
        }
    }else {
        $c= new Criteria();
        $c->add(CpimpcomPeer::REFCOM, $this->cpcompro->getRefcom()); 
        $reg=CpimpcomPeer::doSelect($c);
    }
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/pregencomapo/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');

    $this->obj = $this->columnas[0]->getConfig($reg);

    $this->cpcompro->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js=""; $sw=true;

    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(CpdoccomPeer::TIPCOM,$codigo);
        $reg= CpdoccomPeer::doSelectOne($c);
        if ($reg)
        {
            $dato=$reg->getNomext();
        }else {
            $js="alert('El Tipo de Documento no existe'); $('cpcompro_tipcom').value=''; $('cpcompro_tipcom').focus();";
        }          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        $c= new Criteria();
        $c->add(OpbenefiPeer::CEDRIF,$codigo);
        $reg= OpbenefiPeer::doSelectOne($c);
        if ($reg)
        {
            $dato=$reg->getNomben();
        }else {
            $js="alert('El Beneficiario no existe'); $('cpcompro_cedrif').value=''; $('cpcompro_cedrif').focus();";
        }          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
        $sw=false;
        $fecnom = $this->getRequestParameter('fecha','');
        $gasto = $this->getRequestParameter('gasto','');
        
        Presupuesto::mostrarAportesPresuspuestarios($codigo,$fecnom,$gasto,$arreglo);
        $this->params=array();
        $this->cpcompro = $this->getCpcomproOrCreate();
        $this->updateCpcomproFromRequest();        
        $this->labels = $this->getLabels();
        $this->configGrid($arreglo);
        
        $js="calcularTotales();";
        
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;            
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw) return sfView::HEADER_ONLY;

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

       $this->cpcompro = $this->getCpcomproOrCreate();
       $this->updateCpcomproFromRequest();     

     $this->configGrid();
     $grid = Herramientas::CargarDatosGridv2($this,$this->obj);   
     
      $x = $grid[0];
      $j = 0;
      if (count($x)>0)
      {
          $this->coderr = Presupuesto::validarPreCom($this->cpcompro,$grid,$this->cpcompro->getFeccom());
      }else {
          $this->coderr=4;
      }

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
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Presupuesto::generarCompromisoAportes($clasemodelo,$grid);
      
    return -1;
  }

/**
   * FunciÃ³n principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  /**
   * FunciÃ³n principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->cpcompro = $this->getCpcomproOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCpcomproFromRequest();

      if($this->saveCpcompro($this->cpcompro) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->cpcompro->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('pregencomapo/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('pregencomapo/list');
        }
        else
        {
            return $this->redirect('pregencomapo/edit');
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
}
