<?php

/**
 * mangenpla actions.
 *
 * @package    siga
 * @subpackage mangenpla
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class mangenplaActions extends automangenplaActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid($this->mangenpla->getCodgru(),$this->mangenpla->getFecgen());

  }

  public function configGrid($codgru='',$fec='1999-02-01',$arreglo = array())
  {
    if (count($arreglo)>0){
      $j=0;
      while($j<count($arreglo)){
        $mandetpla_new= new Mandetpla();
        $mandetpla_new->setNumequ($arreglo[$j]["numequ"]);
        $mandetpla_new->setDestar($arreglo[$j]["destar"]);
        $mandetpla_new->setFeceje($arreglo[$j]["fecha"]);
        $mandetpla_new->setHorequ($arreglo[$j]["horometro"]);
        $det[]=$mandetpla_new;
        $j++;
      }
    }else {
      $c= new Criteria();
      $c->add(MandetplaPeer::CODGRU,$codgru);
      $c->add(MandetplaPeer::CODGRU,$fec);
      $det= MandetplaPeer::doSelect($c);     
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/mangenpla/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    
    $this->obj =$this->columnas[0]->getConfig($det);

    $this->mangenpla->setObj($this->obj);

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=$js=""; $sw=true; 
    $this->ajaxs=$ajax;

    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '2':
        $sw=false;
        $codgru=$this->getRequestParameter('codgru');    
        $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));
        
        $h= new Criteria();
        $h->add(MandisproPeer::CODGRU,$codgru);
        $h->add(MandisproPeer::FECINI,$fec);
        $regh= MandisproPeer::doSelectOne($h);
        if ($regh){
          if ($regh->getStatus()=='N'){
             Mantenimiento::CargarEquipoProgramado($codgru,$fec,$arreglo);          
          }else {
            $arreglo=array();
            $js="alert('El Grupo de Trabajo ya fue genrado con esa Fecha');";
          }
        }else {
          $arreglo=array();
        }
       
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->mangenpla = $this->getMangenplaOrCreate();        
        $this->configGrid('','',$arreglo);
        $output = '[["javascript","'.$js.'",""]]';
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
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

       /**
 * Función para procesar _todas_ las funciones Ajax del formulario
 * Cada función esta identificada con el valor de la vista "ajax"
 * el cual traerá el indice de lo que se quiere procesar.
 *
 */
  public function executeAjaxgrid() {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');    
    $idfila = $this->getRequestParameter('this[id]', '');    
    $valuefila = $this->getRequestParameter('this[value]', ''); 
    $javascript="";  $jsonextra="";
      switch ($name) {
        case ('a'):   //grid Equipos 
            switch ($col) { 
              case ('1'):  //Número del Equipo
                $c= new Criteria();
                $c->add(ManregequPeer::NUMEQU,$grid[$fila][$col-1]);
                $reg= ManregequPeer::doSelectOne($c);
                if ($reg)
                  $grid[$fila][$col]=$reg->getNomequ();
                else {
                  $javascript = "alert_('El Equipo no Existe');";
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
                } 
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;      
              default:
                break;
            }
          break;    
        default:
          break;
        }

      $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }


}
