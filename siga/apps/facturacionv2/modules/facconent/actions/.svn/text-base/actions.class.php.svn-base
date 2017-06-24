<?php

/**
 * facconent actions.
 *
 * @package    siga
 * @subpackage facconent
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facconentActions extends autofacconentActions
{
 public function executeIndex()
  {
    return $this->forward('facconent', 'edit');
  }
  
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid();
  }

  public function configGrid($fechades='',$fechahas='',$cedrif='')
  {
    $sql="";
    $c = new Criteria();
    $c->add(FafacturPeer::STATUS,'A');
    $codcli=H::getX_vacio('RIFPRO','Facliente','Codcli',$cedrif);
    if ($cedrif!="") $c->add(FafacturPeer::CODCLI,$codcli);
    $sql = "(fafactur.STAENT<>'S' or fafactur.STAENT isnull)";
    if ($fechades!="" && $fechahas!="")
    {
       $sql.=" and (fafactur.fecfac<='".$fechahas."' and fafactur.fecfac>='".$fechades."')";
    }else $c->setLimit(20);    
    $c->add(FafacturPeer::STAENT, $sql, Criteria :: CUSTOM);    
    $detalle = FafacturPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facconent/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_facturas');

    $this->obj1 =$this->columnas[0]->getConfig($detalle);

    $this->fafactur->setObj1($this->obj1);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $sw=true; $js="";
    switch ($ajax){
      case '1':
        $sw=false;
        $javascript="";
        $arredes=split('/',$this->getRequestParameter('fecemides'));
        $arrehas=split('/',$codigo);
        $fechades=$arredes[2]."-".$arredes[1]."-".$arredes[0];
        $fechahas=$arrehas[2]."-".$arrehas[1]."-".$arrehas[0];

        $this->params=array();
        $this->labels = $this->getLabels();
        $this->fafactur = $this->getFafacturOrCreate();
        $this->configGrid($fechades,$fechahas,$this->getRequestParameter('cedrif'));
        $output = '[["javascript","'.$javascript.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '2':
        $c= new Criteria();
        $c->add(FaclientePeer::RIFPRO, $codigo);
        $result= FaclientePeer::doSelectOne($c);
        if ($result)
        {
           $dato=$result->getNompro();         
        }else {
            $js="alert('El Cliente no esta registrado'); $('fafactur_rifpro').value=''; $('fafactur_rifpro').focus();";
        }        
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj1);

  }

  public function saving($clasemodelo)
  {
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj1);
      $i=0;
      $x=$grid[0];
      while ($i<count($x))
      {
         if ($x[$i]->getCheckent()=='1')
         {
             $x[$i]->setStaent('S');
             $x[$i]->setFecent($clasemodelo->getFecent());
             $x[$i]->setusuent(sfContext::getInstance()->getUser()->getAttribute('loguse'));
             $x[$i]->save();
         }
          $i++;
      }
    return -1;
  }
}
