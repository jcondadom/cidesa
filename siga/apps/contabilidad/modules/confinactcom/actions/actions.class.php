<?php

/**
 * confinactcom actions.
 *
 * @package    siga
 * @subpackage confinactcom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class confinactcomActions extends autoconfinactcomActions
{
  private $dir="";

  public function executeIndex()
  {
    return $this->forward('confinactcom', 'edit');
  }

    /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->contabc = $this->getContabcOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateContabcFromRequest();

      if($this->saveContabc($this->contabc) ==-1){
        {

          //$this->setFlash('notice', 'Your modifications have been saved');
          if ($this->dir!="")                 
             $this->setFlash('notice', 'Todos los Comprobantes Contables fueron Actualizados. Excepto lo siguientes, debido a que poseen Cuentas Contables que no existen o no son Cargables: '.$this->dir);
         else
             $this->setFlash('notice', 'Todos los Comprobantes Contables fueron Actualizados.');

         $id= $this->contabc->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('confinactcom/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('confinactcom/list');
        }
        else
        {
            return $this->redirect('confinactcom/edit?id='.$this->contabc->getId());
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
     $this->configGrid();
  }

  public function configGrid($fecdes='', $fechas='', $codtiptra='')
  {
    $reg = array();

    if ($fecdes!='' && $fechas!='')
    {
      if ($codtiptra!='')
        $sql=" contabc.codtiptra='".$codtiptra."' and (contabc.feccom>='".$fecdes."' and contabc.feccom<='".$fechas."') ";
      else
        $sql=" (contabc.feccom>='".$fecdes."' and contabc.feccom<='".$fechas."') ";
      $c = new Criteria();
      $c->add(ContabcPeer::STACOM,'D');
      $c->add(ContabcPeer::NUMCOM,$sql,Criteria::CUSTOM);
      $c->addAscendingOrderByColumn(ContabcPeer::FECCOM);
      $c->addAscendingOrderByColumn(ContabcPeer::NUMCOM);
      $reg= ContabcPeer::doSelect($c);
    }

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/confinactcom/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_com');

   $this->obj =$this->columnas[0]->getConfig($reg);

   $this->contabc->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':       
        $fec1 = $this->getRequestParameter('fec1','');
        $fec2 = $this->getRequestParameter('fec2','');
        $codtiptra = $this->getRequestParameter('codtiptra','');
        $dateFormat = new sfDateFormat('es_VE');
        $fecdes = $dateFormat->format($fec1, 'i', $dateFormat->getInputPattern('d'));
        $dateFormat = new sfDateFormat('es_VE');
        $fechas = $dateFormat->format($fec2, 'i', $dateFormat->getInputPattern('d'));


        $this->params=array();
        $this->contabc = $this->getContabcOrCreate();
        $this->updateContabcFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($fecdes, $fechas,$codtiptra);
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
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

    $q= new Criteria();
    $q->add(ContabaPeer::CODEMP,'001');
    $resul=ContabaPeer::doSelectOne($q);
    if ($resul)    
      $etadef=$resul->getEtadef();
    else $etadef="";

    if ($etadef=='A')
      $this->coderr=620;

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
    return Contabilidad::ActualizarComprobantesContable($grid,$this->dir);
  }

    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";
    switch ($name) {
      case 'a':
         switch ($col) {
            case '5':
              $t= new Criteria();                
              $t->add(CotiptraPeer::CODTIPTRA,$grid[$fila][$col-1]);
              $reg= CotiptraPeer::doSelectOne($t);
              if ($reg)
              {              
                $grid[$fila][$col]=$reg->getDestiptra(); 
              } else {
                $grid[$fila][$col-1]="";
                $grid[$fila][$col]="";
                $javascript="alert_('El Tipo de Transacción no esta Registrado');";
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
