<?php

/**
 * almtraart actions.
 *
 * @package    siga
 * @subpackage almtraart
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almtraartActions extends autoalmtraartActions
{
  private $codigo="";

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid($this->catraalm->getCodtra());
  }

  public function configGrid($codtra = '') {
    $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
    $det=array();
        
    $c = new Criteria();
    $c->add(CadettraPeer::CODTRA,$codtra);
    $det = CadettraPeer::doSelect($c);
    
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/almtraart/' . sfConfig::get('sf_app_module_config_dir_name') . '/grid_art');

   //Columna de Código Ubicación Origen
    $paramso = array('param1' => "'+$(this.id).up().previous(1).descendants()[0].value+'");
    $this->columnas[1][2]->setCatalogo('cadefubi','sf_admin_edit_form',array('codubi' => 3, 'nomubi' => 4),'Cadefubi_Almdes',$paramso);

    //Columna de Código Ubicación Destino
    $paramsd = array('param1' => "'+$(this.id).up().previous(1).descendants()[0].value+'");
    $this->columnas[1][6]->setCatalogo('cadefubi','sf_admin_edit_form',array('codubi' => 7, 'nomubi' => 8),'Cadefubi_Almdes',$paramsd);

    //Columna de Código Artículo
    $mascaraart= H::getMascaraArticulo();
    $lonart=strlen($mascaraart);
    $obj= array('codart' => 9,'desart' => 10, 'unimed' => 11);
    $params= array('param1' => $lonart);
    $this->columnas[1][8]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonart.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraart.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][8]->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Almtraalm',$params);

    //Columna N° Lote Origen y Destino    
    $this->columnas[1][11]->setCombo(self::ObtenerNumlotxart());
    $this->columnas[1][12]->setCombo(self::ObtenerNumlotxart());
    if ($manartlot=='S'){
      $this->columnas[1][11]->setOculta(false);
      $this->columnas[1][12]->setOculta(false);
    }    

    $this->obj = $this->columnas[0]->getConfig($det);
    $this->catraalm->setGrid($this->obj);
  }

  public function ObtenerNumlotxart($codart="",$codalm="",$codubi="")
  {
    $c = new Criteria();
    $c->add(CaartalmubiPeer::CODALM,$codalm);
    $c->add(CaartalmubiPeer::CODUBI,$codubi);
    $c->add(CaartalmubiPeer::CODART,$codart);
    $c->add(CaartalmubiPeer::EXIACT,0,Criteria::GREATER_THAN);
    $c->addAscendingOrderByColumn(CaartalmubiPeer::FECVEN);

    $datos = CaartalmubiPeer::doSelect($c);

    $lotes = array();

    foreach($datos as $obj_datos)
    {
     if ($obj_datos->getFecven()!="")
     {
        $fecven=date("d/m/Y",strtotime($obj_datos->getFecven()));
        $lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot()." - ".$fecven);
     }
      else
        $lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot());

    }
    return $lotes;
  }    


  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $js=""; $dato=""; $sw=true;
    $this->ajax=$ajax;

    switch ($ajax){
      case '1':
       $codalm = $this->getRequestParameter('alm','');
       $codubi = $this->getRequestParameter('ubi','');
       $this->numlot=$numlot;
       $this->lotes=$this->ObtenerNumlotxart($codigo,$codalm,$codubi);
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

      $this->catraalm = $this->getCatraalmOrCreate();
      try{ $this->updateCatraalmFromRequest();}
      catch (Exception $ex){}
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

      if (Tesoreria::validarFechaPerContable($this->getRequestParameter('catraalm[fectra]')))
      {
         $this->coderr=521;
         return false;
      }

      $this->coderr=Almacen::validacionTVA($this->catraalm,$grid,$codi);
      $this->codigo=$codi;
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
    return Almacen::salvarTrasferenciaArticulos($clasemodelo,$grid);
  }

  public function deleting($clasemodelo)
  {    
    $p= new Criteria();
    $p->add(CadettraPeer::CODTRA,$clasemodelo->getCodtra());
    $cadettra= CadettraPeer::doSelect($p);

    $error=Almacen::validacionTVAEliminar($clasemodelo,$cadettra,$codigo);
    $this->codigo=$codigo;
    if ($error==-1){
      Almacen::Actualizar_ArticulosEliminar('D',$cadettra);
      Almacen::Actualizar_ArticulosEliminar('S',$cadettra);
      foreach ($cadettra as $objdel) {
        $objdel->delete();
      }
      $clasemodelo->delete();
    }
    return $error;    
  }

  public function executeAjaxgrid() {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";
    switch ($name) {           
      case ('a'):
        switch ($col) {
             case ('1'):
                if ($grid[$fila][$col-1]!='') {
                  $d = new Criteria();
                  $d->add(CadefalmPeer::CODALM, $grid[$fila][$col-1]);
                  $regd = CadefalmPeer::doSelectOne($d);
                  if ($regd) {
                      $grid[$fila][$col] = $regd->getNomalm();
                  }else {
                    $javascript = "alert_('El Almac&eacute;n Origen no existe');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";                   
                 }
               }
               $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;  
            case ('3'):
                if ($grid[$fila][$col-1]!='') {
                  if ($grid[$fila][$col-3]!='') {
                    $d = new Criteria();
                    $d->add(CadefubiPeer::CODUBI, $grid[$fila][$col-1]);
                    $regd = CadefubiPeer::doSelectOne($d);
                    if ($regd) {
                       $q= new Criteria();
                       $q->add(CaalmubiPeer::CODALM, $grid[$fila][$col-3]);
                       $q->add(CaalmubiPeer::CODUBI, $grid[$fila][$col-1]);
                       $regq = CaalmubiPeer::doSelectOne($q);
                       if ($regq) 
                         $grid[$fila][$col] = $regd->getNomubi();
                       else {
                         $javascript = "alert_('La Ubicaci&oacute;n Origen no esta asociada a ese Almac&eacute;n');";
                         $grid[$fila][$col-1]="";
                         $grid[$fila][$col]="";                   
                       }
                    }else {
                      $javascript = "alert_('La Ubicaci&oacute;n Origen no existe');";
                      $grid[$fila][$col-1]="";
                      $grid[$fila][$col]="";                   
                   }
                 }else {
                    $javascript = "alert_('Debe Seleccionar el Almac&eacute;n Origen');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";                   
                 }
               }
               $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;      
            case ('5'):
                if ($grid[$fila][$col-1]!='') {
                  $d = new Criteria();
                  $d->add(CadefalmPeer::CODALM, $grid[$fila][$col-1]);
                  $regd = CadefalmPeer::doSelectOne($d);
                  if ($regd) {
                      $grid[$fila][$col] = $regd->getNomalm();
                  }else {
                    $javascript = "alert_('El Almac&eacute;n Destino no existe');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";                   
                 }
               }
               $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;  
            case ('7'):
                if ($grid[$fila][$col-1]!='') {
                  if ($grid[$fila][$col-3]!='') {
                    $d = new Criteria();
                    $d->add(CadefubiPeer::CODUBI, $grid[$fila][$col-1]);
                    $regd = CadefubiPeer::doSelectOne($d);
                    if ($regd) {
                       $q= new Criteria();
                       $q->add(CaalmubiPeer::CODALM, $grid[$fila][$col-3]);
                       $q->add(CaalmubiPeer::CODUBI, $grid[$fila][$col-1]);
                       $regq = CaalmubiPeer::doSelectOne($q);
                       if ($regq) 
                         $grid[$fila][$col] = $regd->getNomubi();
                       else {
                         $javascript = "alert_('La Ubicaci&oacute;n Destino no esta asociada a ese Almac&eacute;n');";
                         $grid[$fila][$col-1]="";
                         $grid[$fila][$col]="";                   
                       }
                    }else {
                      $javascript = "alert_('La Ubicaci&oacute;n Destino no existe');";
                      $grid[$fila][$col-1]="";
                      $grid[$fila][$col]="";                   
                   }
                 }else {
                    $javascript = "alert_('Debe Seleccionar el Almac&eacute;n Destino');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";                   
                 }
               }
               $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;
            case ('9'):
                $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
                if ($grid[$fila][$col-1]!='') {
                  if ($grid[$fila][$col-7]!='' && $grid[$fila][$col-3]!='') { //Ubicación Origen y Destino
                    if (!Hacienda::Repetido3($grid,$grid[$fila][$col-1].'-'.$grid[$fila][$col-9].'-'.$grid[$fila][$col-7].'-'.$grid[$fila][$col-5].'-'.$grid[$fila][$col-3],$fila,$col-1,$col-9,$col-7,$col-5,$col-3))
                    {
                      $d = new Criteria();
                      $d->add(CaregartPeer::CODART, $grid[$fila][$col-1]);
                      $regd = CaregartPeer::doSelectOne($d);
                      if ($regd) {
                         $exiact=0;
                         if (Almacen::ExistenciayObtenerDisponibilidadAlmArt($grid[$fila][$col-1],$grid[$fila][$col-9],$grid[$fila][$col-7],$exiact)){
                           $grid[$fila][$col] = htmlspecialchars($regd->getDesart());
                           $grid[$fila][$col+1]=$regd->getUnimed();
                           $grid[$fila][$col+4]=$exiact;
                           if ($manartlot=='S'){
                             $c = new Criteria();
                             $c->add(CaartalmubiPeer::CODART,$grid[$fila][$col-1]);
                             $c->add(CaartalmubiPeer::CODALM,$grid[$fila][$col-9]);
                             $c->add(CaartalmubiPeer::CODUBI,$grid[$fila][$col-7]);
                             $alm = CaartalmubiPeer::doSelectOne($c);
                             if ($alm)
                             {
                               $numlot=$alm->getNumlot();
                               $codigo=$grid[$fila][$col-1];
                               //Origen
                               $alm=$grid[$fila][$col-9];
                               $ubi=$grid[$fila][$col-7];                             
                               $divlotori=$name.'_'.$fila.'_12';
                               //Destino                             
                               $alm2=$grid[$fila][$col-5];
                               $ubi2=$grid[$fila][$col-3];
                               $divlotdes=$name.'_'.$fila.'_13';
                               $js="toAjaxUpdater('$divlotori',1,getUrlModuloAjax(),'$codigo','','&alm=".$alm."&ubi=".$ubi."'); toAjaxUpdater('$divlotdes',1,getUrlModuloAjax(),'$codigo','','&alm=".$alm2."&ubi=".$ubi2."');";
                             }
                           }
                         }else {
                           $javascript = "alert_('El Art&iacute;culo no esta asociada a ese Almac&eacute;n y Ubicacio&oacute;n');";
                           $grid[$fila][$col-1]="";
                           $grid[$fila][$col]="";  
                           $grid[$fila][$col+1]="";
                           $grid[$fila][$col+4]="0,00";               
                         }
                      }else {
                        $javascript = "alert_('El Art&iacute;culo no existe');";
                        $grid[$fila][$col-1]="";
                        $grid[$fila][$col]=""; 
                        $grid[$fila][$col+1]="";
                        $grid[$fila][$col+4]="0,00";                        
                     }
                   }else {
                    $javascript = "alert_('El artículo esta repetido para es mismo Almac&eacute;n y ubicaci&oacute;n Origen');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";   
                    $grid[$fila][$col+1]="";
                    $grid[$fila][$col+4]="0,00";                      
                 }
                 }else {
                    $javascript = "alert_('Debe Seleccionar Ubicaci&oacute;n Origen y Destino');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";    
                    $grid[$fila][$col+1]="";
                    $grid[$fila][$col+4]="0,00";                     
                 }
               }
               $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;   
            case ('15'):  //Cantidad a Trasferir
                if (H::toFloat($grid[$fila][$col-1])>0)
                {
                  if (H::toFloat($grid[$fila][$col-1])>H::toFloat($grid[$fila][$col-2]))
                  {
                    $javascript = "alert('La cantidad a Transferir no puede ser mayor a la Cantidad Disponible')";
                    $grid[$fila][$col-1]='0,00';
                  }             
                }else {
                  $javascript = "alert('La Cantidad a trasferir debe ser mayor a cero')";
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

  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->catraalm = $this->getCatraalmOrCreate();
    $this->updateCatraalmFromRequest();
   $this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        if ($this->codigo!='')
        $this->getRequest()->setError('',$err.$this->codigo);
      else
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;
  } 

    protected function deleteCatraalm($catraalm)
  {
    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      $this->coderr = $this->deleting($catraalm);

      if(is_array($this->coderr)){
        foreach ($this->coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          if ($this->codigo!='')
            $this->getRequest()->setError('delete',$err.$this->codigo);
          else
            $this->getRequest()->setError('delete',$err);
          $this->updateError();
        }
      }elseif($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        if ($this->codigo!='')
          $this->getRequest()->setError('delete',$err.$this->codigo);
        else
          $this->getRequest()->setError('delete',$err);
        $this->updateError();
      }

      //return -1;

    } catch (Exception $ex) {
      $this->coderr = 6;
      $err = Herramientas::obtenerMensajeError($this->coderr);
      $this->getRequest()->setError('delete',$err);
      $this->updateError();
    }

  }   


}
