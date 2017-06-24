<?php

/**
 * forasouniobj actions.
 *
 * @package    siga
 * @subpackage forasouniobj
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class forasouniobjActions extends autoforasouniobjActions
{
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid($this->fordefunieje->getCoduni());
  }

  public function configGrid($coduni="")
  {
    $c = new Criteria();
    $c->add(ForasouniobjPeer::CODUNI,$coduni);
    $objetivos = ForasouniobjPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forasouniobj/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_objetivos');

    $this->obj =$this->columnas[0]->getConfig($objetivos);

    $this->fordefunieje->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
         $u= new Criteria();
         $u->add(FordefobjPeer::CODOBJ,$codigo);
         $result= FordefobjPeer::doSelectOne($u);
         if ($result)
         {
             $dato=$result->getDesobj();
             $javascript="validarrepetido('".$cajtexcom."')";
         }else $javascript="alert_('El Objetivo no Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
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
        
    $this->fordefunieje = $this->getFordefuniejeOrCreate();
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    if (count($grid)==0)
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
      Formulacion::salvarObjetivosUnidades($clasemodelo,$grid);
      
      return -1;
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

    switch ($col) {
          case '1':
            $u= new Criteria();
            $u->add(FordefobjPeer::CODOBJ,$grid[$fila][$col-1]);
            $reg= FordefobjPeer::doSelectOne($u);
            if ($reg) {
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                  $grid[$fila][1]=$reg->getDesobj();
              }else {
                 $grid[$fila][$col-1]="";
                 $grid[$fila][1]="";
                 $javascript="alert('El Objetivo esta Repetido');";
              }
            }else {
                $grid[$fila][$col-1]="";
                $grid[$fila][1]="";
                $javascript="alert('El Objetivo no Existe ...');";
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
