<?php

/**
 * biesolsegcer actions.
 *
 * @package    siga
 * @subpackage biesolsegcer
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class biesolsegcerActions extends autobiesolsegcerActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid($this->bnsolpolcer->getNumsol());
  }

  public function configGrid($numsol='')
  {
    $c = new Criteria();
    $c->add(BndetsolpolcerPeer::NUMSOL,$numsol);
    $reg =  BndetsolpolcerPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/biesolsegcer/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_muebles');
    
    $foract = Herramientas::ObtenerFormato('Bndefins','foract');
    $lonact=strlen($foract);
    $params= array('param1' => "'+$('bnsolpolcer_codubi').value+'", 'val2');
    
    $this->columnas[1][0]->setHTML('type="text" size="30" maxlength="'.chr(39).$lonact.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$foract.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][0]->setCatalogo('bnregmue','sf_admin_edit_form',array('codact' => 1, 'codmue' => 2),'Bnregmue_Biesolpolcer',$params);

    $this->obj = $this->columnas[0]->getConfig($reg);

    $this->bnsolpolcer->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $js=""; $dato="";

    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(BncatcomsegPeer::CODCOM,$codigo);
        $reg= BncatcomsegPeer::doSelectOne($c);
        if ($reg)
          $dato=$reg->getNomcom();
        else
          $js="alert_('La Compa&ntilde;ia Aseguradora no existe'); $('bnsolpolcer_codcom').value=''; $('bnsolpolcer_codcom').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        $c= new Criteria();
        $c->add(BnubibiePeer::CODUBI,$codigo);
        $reg= BnubibiePeer::doSelectOne($c);
        if ($reg)
          $dato=$reg->getDesubi();
        else
          $js="alert_('La Ubicaci&oacute;n no existe'); $('bnsolpolcer_codubi').value=''; $('bnsolpolcer_codubi').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;  
      case '3':
        $c= new Criteria();
        $c->add(BntipcobPeer::CODCOB,$codigo);
        $reg= BntipcobPeer::doSelectOne($c);
        if ($reg)
          $dato=$reg->getDescob();
        else
          $js="alert_('El Tipo de Cobertura no existe'); $('bnsolpolcer_codcob').value=''; $('bnsolpolcer_codcob').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
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
     $this->bnsolpolcer = $this->getBnsolpolcerOrCreate();
      try{ $this->updateBnsolpolcerFromRequest();}
      catch (Exception $ex){} 
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      if (count($grid[0])==0)
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

    Bienes::salvarSolicitudPolizasCertificados($clasemodelo,$grid);

    return -1;
  }

  public function deleting($clasemodelo)
  {
    $tienreg=H::getX_vacio('NUMSOL','Bnregpolcer','numsol',$clasemodelo->getNumsol());
    if ($tienreg==''){
      H::EliminarRegistro('Bndetsolpolcer','Numsol',$clasemodelo->getNumsol());
      return parent::deleting($clasemodelo);  
    }else return 224;
    
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
    $ubica=$this->getRequestParameter('bnsolpolcer_codubi', '');
    $javascript="";  $jsonextra="";
      switch ($name) {
         case ('a'):   //grid a detalle 
            switch ($col) {
             case ('1'):   //Codigo activo
                if ($grid[$fila][$col-1]!="")
                {
                   $foract = Herramientas::ObtenerFormato('Bndefins','foract');
                   $lonact=strlen($foract);
                   if (strlen($grid[$fila][$col-1])==$lonact)
                   {
                     if ($grid[$fila][$col]!=""){
                       if (!Hacienda::Repetido2($grid,$grid[$fila][$col-1].'-'.$grid[$fila][$col],$fila,$col-1,$col)){
                         $c = new Criteria();
                         $c->add(BnregmuePeer::CODACT,$grid[$fila][$col-1]);
                         $c->add(BnregmuePeer::CODMUE,$grid[$fila][$col]);
                         $c->add(BnregmuePeer::CODUBI,$ubica);
                         $regs = BnregmuePeer::doSelectOne($c);
                         if (!$regs)
                         {
                           $javascript = "alert_('El C&oacute;digo de  Activo no esta registrado como parte de ese Bien Mueble o no se encuentra en esa Ubicaci&oacute;n');";
                           $grid[$fila][$col-1]="";
                         }else {
                           $grid[$fila][2]=$regs->getDesmue();
                           $grid[$fila][3]=$regs->getMarmue();
                           $grid[$fila][4]=$regs->getModmue();
                           $grid[$fila][5]=$regs->getSermue();
                           $grid[$fila][6]=$regs->getNomapeest();
                           $grid[$fila][7]=$regs->getNomaperep();
                           $grid[$fila][8]=H::FormatoMonto($regs->getValini());
                           $javascript="ActualizarSaldosGrid('a',ArrTotales_a);";
                         }
                       }else {
                         $javascript = "alert_('El C&oacute;digo activo ya esta Repetido con ese Bien Mueble');";
                         $grid[$fila][$col-1]="";
                       }
                     }else {
                       $c = new Criteria();
                       $c->add(BnregmuePeer::CODACT,$grid[$fila][$col-1]);
                       $regs = BnregmuePeer::doSelectOne($c);
                       if (!$regs)
                       {
                         $javascript = "alert_('El C&oacute;digo de  Activo no esta registrado como parte de un Bien Mueble');";
                          $grid[$fila][$col-1]="";
                       }
                     }
                   }else {
                    $javascript = "alert_('El C&oacute;digo de Activo no es de &Uacute;ltimo Nivel');";
                    $grid[$fila][$col-1]="";
                   }                   
              }                  
              $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;        
              case ('2'):  //Código Mueble
                if ($grid[$fila][$col-1]!="")
                {
                  if ($grid[$fila][$col-2]!=""){
                    if (!Hacienda::Repetido2($grid,$grid[$fila][$col-1].'-'.$grid[$fila][$col-2],$fila,$col-1,$col-2)){
                         $c = new Criteria();
                         $c->add(BnregmuePeer::CODACT,$grid[$fila][$col-2]);
                         $c->add(BnregmuePeer::CODMUE,$grid[$fila][$col-1]);
                         $c->add(BnregmuePeer::CODUBI,$ubica);
                         $regs = BnregmuePeer::doSelectOne($c);
                         if (!$regs)
                         {
                           $javascript = "alert_('El C&oacute;digo del Mueble no esta registrado como un Bien Mueble o no se encuentra en esa Ubicaci&oacute;n');";
                           $grid[$fila][$col-1]="";
                         }else {
                           $grid[$fila][2]=$regs->getDesmue();
                           $grid[$fila][3]=$regs->getMarmue();
                           $grid[$fila][4]=$regs->getModmue();
                           $grid[$fila][5]=$regs->getSermue();
                           $grid[$fila][6]=$regs->getNomapeest();
                           $grid[$fila][7]=$regs->getNomaperep();
                           $grid[$fila][8]=H::FormatoMonto($regs->getValini());
                           $javascript="ActualizarSaldosGrid('a',ArrTotales_a);";
                         }
                    }else {
                       $javascript = "alert_('El C&oacute;digo del Mueble ya esta Repetido con ese Activo');";
                       $grid[$fila][$col-1]="";
                    }
                  }else {
                    $javascript = "alert_('Debe Inidicar el C&oacute;digo del Activo');";
                    $grid[$fila][$col-1]="";
                   } 
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
