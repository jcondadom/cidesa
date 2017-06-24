<?php

/**
 * biedisactmuelot actions.
 *
 * @package    Roraima
 * @subpackage biedisactmuelot
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class biedisactmuelotActions extends autobiedisactmuelotActions
{
 private $muebles="";
 
  public function executeIndex()
  { 
    return $this->forward('biedisactmuelot', 'edit');
  }


   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->bndismue = $this->getBndismueOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBndismueFromRequest();

      if($this->saveBndismue($this->bndismue) ==-1){
        {
           if ($this->muebles!="")
            $this->setFlash('notice', 'Los siguientes muebles no se salvaron: '.$this->muebles);
          else
            $this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->bndismue->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('biedisactmuelot/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('biedisactmuelot/list');
        }
        else
        {
            return $this->redirect('biedisactmuelot/edit?id='.$this->bndismue->getId());
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

  public function editing()
  {
    $this->configGrid();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {
    $reg = array();
    
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/biedisactmuelot/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_muebles');

    $masc=Herramientas::getX_vacio('codins','bndefins','ForAct','001');
    $lonmas=strlen($masc);

    $forubi = Herramientas::ObtenerFormato('Bndefins','forubi');
    $lonubi=strlen($forubi);

    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="' . chr(39) . $lonmas . chr(39) . '" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $masc . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][0]->setCatalogo('bnregmue', 'sf_admin_edit_form', array('codact' => 1, 'codmue' => 2, 'desmue' => 3, 'valini' => 4, 'codubi' => 5), 'Bnregmue_Biedisactmuenew'); 
    $oculcatmue=H::getConfApp2('oculcatmue', 'bienes', 'biedisactmuelot');
    if ($oculcatmue!='S')
      $this->columnas[1][1]->setCatalogo('bnregmue', 'sf_admin_edit_form', array('codmue' => 2, 'desmue' => 3, 'valini' => 4, 'codubi' => 5), 'Bnregmue_Biedisactmuenew1');

    $this->columnas[1][6]->setHTML('type="text" size="17" maxlength="' . chr(39) . $lonubi . chr(39) . '" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $forubi . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][6]->setCatalogo('bnubibie', 'sf_admin_edit_form', array('codubi' => 7, 'desubi' => 8), 'Bnubibie_Biedisactmuenew');

    $this->obj =$this->columnas[0]->getConfig($reg);

    $this->bndismue->setObj($this->obj);
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
        $e= new Criteria();
        $e->add(BnmotdisPeer::CODMOT,$codigo);
        $result= BnmotdisPeer::doSelectOne($e);
        if ($result)
        {
          $dato=$result->getDesmot();
        }else {
          $javascript="alert('El Motivo no esta registrado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '2':
        $e= new Criteria();
        $e->add(BnubibiePeer::CODUBI,$codigo);
        $result= BnubibiePeer::doSelectOne($e);
        if ($result)
        {
          $dato=$result->getDesubi();
        }else {
          $javascript="alert('El C&oacute;digo Destino no esta registrado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

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

      $this->bndismue = $this->getBndismueOrCreate();
      try{ $this->updateBndismueFromRequest();}catch(Exception $ex){}

      if ($this->getRequestParameter('bndismue[fecdismue]')!="")
      {
        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('bndismue[fecdismue]'))==true)
        {
          $this->coderr=529;
          return false;
        }

        if (Tesoreria::validarFechaPerContable($this->getRequestParameter('bndismue[fecdismue]')))
        {
          $this->coderr=521;
          return false;
        }
         if ($this->getRequestParameter('bndismue[fecdevdis]')!=""){
          if (Tesoreria::validarFechaMayorMenor($this->getRequestParameter('bndismue[fecdismue]'),$this->getRequestParameter('bndismue[fecdevdis]'),'>'))
          {
            $this->coderr=530;
            return false;
          }
       }
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

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    Bienes::generarDisposicionMuebles($clasemodelo,$grid,$cadena);
    $this->muebles=$cadena;

    return -1;
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traer el indice de lo que se quiere procesar.
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
      case '1':  //Código del Activo
        $t= new Criteria();
        $t->add(BnregmuePeer::CODACT,$grid[$fila][$col-1]);
        $reg= BnregmuePeer::doSelectOne($t);
        if ($reg)
        {           
            $grid[$fila][5]=H::getX_vacio('CODUBI','Bnubibie','Desubi',$grid[$fila][4]);
        }else {                  
           $grid[$fila][$col-1]="";
           $javascript="alert('El C&oacute;digo del Activo no existe');";
        }                            
   
        $jsonextra = ',["javascript","' . $javascript . '",""]';
        break;       
      case '2': //Código del Mueble
          if (!Bienes::Repetido2($grid,$grid[$fila][$col-1],$fila,$col-1))
          {
              $t= new Criteria();
              $t->add(BnregmuePeer::CODACT,$grid[$fila][0]);
              $t->add(BnregmuePeer::CODMUE,$grid[$fila][$col-1]);
              $reg= BnregmuePeer::doSelectOne($t);
              if ($reg)
              {
                if ($reg->getStamue()=='D')
                {
                    $grid[$fila][$col-1]="";
                    $javascript="alert('El Mueble esta Desincorporado');";
                }else {
                 $grid[$fila][$col]=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($reg->getDesmue()));
                 $grid[$fila][3]=$reg->getValini();                     
                 $grid[$fila][4]=$reg->getCodubi();
                 $grid[$fila][5]=H::getX_vacio('CODUBI','Bnubibie','Desubi',$reg->getCodubi());
               }
              }else {                  
                 $grid[$fila][$col-1]="";
                 $javascript="alert('El C&oacute;digo del Mueble no existe');";
              }                    
          }else {
              
             $grid[$fila][$col-1]="";
             $javascript="alert('El C&oacute;digo del Mueble esta repetido con ese Mismo C&oacute;digo de Activo');";
          }           
   
        $jsonextra = ',["javascript","' . $javascript . '",""]';
        break;
      case '7':  //Ubicación Destino
          $t= new Criteria();
          $t->add(BnubibiePeer::CODUBI,$grid[$fila][$col-1]);
          $reg= BnubibiePeer::doSelectOne($t);
          if ($reg)
          {
             $grid[$fila][$col]=$reg->getDesubi();                      
          }else {                  
             $grid[$fila][$col-1]="";
             $javascript="alert('La C&oacute;digo de la Ubicaci&oacute;n no existe');";
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
