<?php

/**
 * preconcom actions.
 *
 * @package    siga
 * @subpackage preconcom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class preconcomActions extends autopreconcomActions
{

  public function executeIndex()
  {
    return $this->redirect('preconcom/edit');
  }
  
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid();

  }

  public function configGrid($cedrif='', $fecdes='', $fechas='')
  {
    $c = new Criteria();
    $c->add(CpcomproPeer::STACOM,'N',Criteria::NOT_EQUAL);
    $c->add(CpcomproPeer::CEDRIF,$cedrif);
    if ($fecdes!="") $sql="cpcompro.feccom>='$fecdes'";
    if ($fechas!="") $sql="and cpcompro.feccom<='$fechas'";
    if ($fecdes!="" && $fechas!="") $sql="cpcompro.feccom>='$fecdes' and cpcompro.feccom<='$fechas'";
    if ($fecdes!="" || $fechas!="") $c->add(CpcomproPeer::FECCOM,$sql,Criteria::CUSTOM);
    $c->addAscendingOrderByColumn(CpcomproPeer::FECCOM);
    $detalle = CpcomproPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/preconcom/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->cpcompro->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $fecdes=$this->getRequestParameter('fecdes','');
        $fechas=$this->getRequestParameter('fechas','');
        $fec1=""; $fec2="";
        if ($fecdes!="")
        {
            $dateFormat = new sfDateFormat('es_VE');
            $fec1 = $dateFormat->format($fecdes, 'i', $dateFormat->getInputPattern('d'));
        }
        if ($fechas!="")
        {
            $dateFormat = new sfDateFormat('es_VE');
            $fec2 = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));
        }
        
        
        
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->cpcompro = $this->getCpcomproOrCreate();
        $this->configGrid($codigo, $fec1, $fec2);
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
        $this->cpcompro = $this->getCpcomproOrCreate();
        $this->updateCpcomproFromRequest();
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          //Servicios Contables
          if ($x[$j]->getSercon()=='1')
          {
             if ($x[$j]->getFecser()=='')
              {
                $this->coderr=1357;
                break;  
              }
              
              if ($x[$j]->getFecser()<$x[$j]->getFeccom())
              {
                $this->coderr=1363;
                break;  
              }
          }
          
          //Administración
          if ($x[$j]->getAdmini()=='1')
          {
              if ($x[$j]->getFecadm()=='')
              {
                $this->coderr=1359;
                break;  
              }
          }

          //Tesoreria
          if ($x[$j]->getTesore()=='1')
          {
              if ($x[$j]->getFectes()=='')
              {
                $this->coderr=1361;
                break;  
              }
          } 
          
          if ($x[$j]->getSercon()!='1' && $x[$j]->getAdmini()=='1')
          {
                $this->coderr=1356;
                break;  
          }
          
          if ($x[$j]->getAdmini()!='1' && $x[$j]->getTesore()=='1')
          {
                $this->coderr=1362;
                break;  
          }          

                    //Administración
          if ($x[$j]->getSercon()=='1' && $x[$j]->getAdmini()=='1')
          {
              if ($x[$j]->getFecadm()<$x[$j]->getFecser())
              {
                $this->coderr=1358;
                break;  
              }
          }

          if ($x[$j]->getAdmini()=='1' && $x[$j]->getTesore()=='1')
          {
              if ($x[$j]->getFectes()<$x[$j]->getFecadm())
              {
                $this->coderr=1360;
                break;  
              }
          }          

          $j++;
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
    Presupuesto::salvardatosCompromisos($clasemodelo,$grid);
    return -1;
  }

    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxfila()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";

    switch ($col) {
         case ('7'):   //Fecha Envío Servicios Contables
            if ($grid[$fila][5]=="1")
            {
              $dateFormat = new sfDateFormat('es_VE');
              $fecant = $dateFormat->format($grid[$fila][11], 'i', $dateFormat->getInputPattern('d'));
              
              $dateFormat = new sfDateFormat('es_VE');
              $fecact = $dateFormat->format($grid[$fila][6], 'i', $dateFormat->getInputPattern('d'));
              
              if ($fecact<$fecant)
              {   
                  $javascript = "alert_('La Fecha de Env&iacute;o a Servicios Contables no puede ser menor a la Fecha del Compromiso');";
                  $grid[$fila][6]="";
              }
            }else {
                $javascript = "alert_('Debe Tildar la Opción Servicios Contables antes de Colocar la Fecha de Env&iacute;o');";
                $grid[$fila][6]="";
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;        
          case ('8'):  //Administración
            if (!array_key_exists(5,$grid[$fila]))
            {
              $idfila=$name.'x_'.$fila.'_'.$col;
              $javascript = "alert_('Debe seguir el Orden 1.- Servicio Contable 2.- Administraci&oacute;n 3.-Tesoreria'); $('$idfila').checked=false;";              
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;
          case ('9'):   //Fecha Envío Administración
            if ($grid[$fila][7]=="1")
            {
              $dateFormat = new sfDateFormat('es_VE');
              $fecant = $dateFormat->format($grid[$fila][6], 'i', $dateFormat->getInputPattern('d'));
              
              $dateFormat = new sfDateFormat('es_VE');
              $fecact = $dateFormat->format($grid[$fila][8], 'i', $dateFormat->getInputPattern('d'));
              
              if ($fecact<$fecant)
              {   
                  $javascript = "alert_('La Fecha de Env&iacute;o a Administraci&oacute;n no puede ser menor a la Fecha de Env&iacute;o de Servicios Contables');";
                  $grid[$fila][8]="";
              }
            }else {
                $javascript = "alert_('Debe Tildar la Opción Administraci&oacute;n antes de Colocar la Fecha de Env&iacute;o');";
                $grid[$fila][8]="";
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;
            
          case ('10'):  //Tesoreria
            if (!array_key_exists(7,$grid[$fila]))
            {
              $idfila=$name.'x_'.$fila.'_'.$col;
              $javascript = "alert_('Debe seguir el Orden 1.- Servicio Contable 2.- Administraci&oacute;n 3.-Tesoreria'); $('$idfila').checked=false;";
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;
          case ('11'):   //Fecha Envío Tesoreria
            if ($grid[$fila][9]=="1")
            {
              $dateFormat = new sfDateFormat('es_VE');
              $fecant = $dateFormat->format($grid[$fila][8], 'i', $dateFormat->getInputPattern('d'));
              
              $dateFormat = new sfDateFormat('es_VE');
              $fecact = $dateFormat->format($grid[$fila][10], 'i', $dateFormat->getInputPattern('d'));
              
              if ($fecact<$fecant)
              {   
                  $javascript = "alert_('La Fecha de Env&iacute;o a Tesoreria no puede ser menor a la Fecha de Env&iacute;o de Administraci&oacute;n');";
                  $grid[$fila][10]="";
              }
            }else {
                $javascript = "alert_('Debe Tildar la Opción Tesoreria antes de Colocar la Fecha de Env&iacute;o');";
                $grid[$fila][10]="";
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;            
          default:
            break;
        }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }
}
