<?php

/**
 * confinins actions.
 *
 * @package    siga
 * @subpackage confinins
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class confininsActions extends autoconfininsActions
{
  public function executeIndex() {
      $c= new Criteria();
      $c->add(ContabaPeer::CODEMP,'001');
      $dato=ContabaPeer::doSelectOne($c);
      if ($dato) {
          $id=$dato->getId();
          return $this->redirect('confinins/edit?id='.$id);
      }
      else {
          return $this->redirect('confinins/edit');
      }
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
  }

  public function configGrid($arreglo=array())
  {
      if ($this->contaba->getId()!='') {
          $reg = Contaba1Peer::doSelect(new Criteria());
      }else{
        $reg = $arreglo;
      }

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/confinins/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_per');

    $this->obj = $this->columnas[0]->getConfig($reg);
    
    $this->contaba->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato=""; 

    switch ($ajax){
      case '1':
        $output = '[["","",""]]';
        break;
      default:
        $fecini=$this->getRequestParameter('contaba[fecini]','');
        $feccie=$this->getRequestParameter('contaba[feccie]','');
        $numper=12;
        $id='';
        $i=1;
        $this->incmes=12/$numper;
        $this->contador=1;
        $per=array();
        $j=0;
        while ($i<=$numper){
          $datos=Ingresos::generarperiodos($fecini,$this->incmes,$feccie,$numper,$this->contador);
          $contaba1_new= new Contaba1();
          $contaba1_new->setPereje($datos[0]);
          $contaba1_new->setFecdes($datos[1]);
          $contaba1_new->setFechas($datos[2]);
          $per[]=$contaba1_new;
          $this->contador=$this->contador+1;
          $fec=substr($datos[2],6,4)."-".substr($datos[2],3,2)."-".substr($datos[2],0,2);
          $fech=H::dateAdd('d',1,$fec,'+');
          $fecini=substr($fech,8,2)."/".substr($fech,5,2)."/".substr($fech,0,4);
          $i++;
          $j++;
        }
        $this->contaba = $this->getContabaOrCreate();
        $this->configGrid($per);
        $output = '[["","",""],["","",""],["","",""]]';
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
      $this->contaba = $this->getContabaOrCreate();
      $this->updateContabaFromRequest();
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      if (count($grid[0])==0)
        $this->coderr=637;
      else if ($this->contaba->getFecini()>$this->contaba->getFeccie())
        $this->coderr=638;

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
    return Contabilidad::salvarConfinins($clasemodelo,$grid);
  }

}
