<?php

/**
 * protartra actions.
 *
 * @package    siga
 * @subpackage protartra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class protartraActions extends autoprotartraActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();    
  }

  public function configGrid()
  {
    $this->configGridDet($this->fatartra->getReftar()); //Detalle Actividades
    $this->configGridMat($this->fatartra->getReftar());  //Materiales
    $this->configGridMan($this->fatartra->getReftar()); //Personal
    $this->configGridMed($this->fatartra->getReftar()); //Medidas de Seguridad
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDet($reftar='', $reford='')
  {
    $det=array();
     if ($reford!='')
     {   
       $p= new Criteria();
       $p->add(FadetordPeer::REFORD,$reford);
       $resulta= FadetordPeer::doSelect($p);
       if ($resulta)
       {
         foreach ($resulta as $objord)
         {
           $fadettar_new= new Fadettar();
           $fadettar_new->setNuitem($objord->getNuitem());
           $fadettar_new->setCodart($objord->getCodart());
           $fadettar_new->setDesart($objord->getDesart());           
           $det[]=$fadettar_new;
         }
       }
     }else {
         $c= new Criteria();
         $c->add(FadettarPeer::REFTAR,$reftar);
         $det= FadettarPeer::doSelect($c);
     }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/protartra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_det');

    /*$mascara=Herramientas::getMascaraArticulo();
    $lonarti=strlen($mascara);
    $obj= array('codart' => 2, 'desart' => 3);
    $params= array('param1' => $lonarti, 'val2');
    $this->columnas[1][1]->setHTML('type="text" size="20" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,3);"');
    $this->columnas[1][1]->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Fapedido',$params);*/

    $this->columnas[1][6]->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" onClick=mostrargridapu(this.id);'); 
    
    $this->objdet = $this->columnas[0]->getConfig($det);

    $this->fatartra->setObjdet($this->objdet);

  }

  public function configGridMat($reftar='', $refpre='', $codart='', $tiedat='')
  {
    $det=array();
    if ($refpre!='' && $codart!='' && $tiedat==0){
      $c = new Criteria();
      $c->add(FaprematartPeer::REFPRE, $refpre);
      $c->add(FaprematartPeer::CODART, $codart);
      $recmat = FaprematartPeer::doSelect($c);
      if ($recmat){
        foreach ($recmat as $mat) {
          $famattartra_new= new Famattartra();
          $famattartra_new->setCodart($mat->getCodart());
          $famattartra_new->setCodmat($mat->getCodmat());         
          $det[]=$faprematart_new;
        }
      }
    }else {
      $c = new Criteria();
      $c->add(FamattartraPeer::REFTAR, $reftar);
      $c->add(FamattartraPeer::CODART, $codart);
      $det = FamattartraPeer::doSelect($c);
    }

    $this->columns = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/protartra/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_mat');

    $mascara = H::getMascaraArticulo();
    $lonarti=strlen($mascara);
    $obj= array('Codmat' => 1, 'Desmat' => 2);
    $params= array('param1' => $lonarti, 'val2');
    $this->columns[1][0]->setHTML('type="text" size="20" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,4);"');
    $this->columns[1][0]->setCatalogo('Caregart','sf_admin_edit_form',$obj,'Caregart_Materiales',$params);

    $this->objmat = $this->columns[0]->getConfig($det);

    $this->fatartra->setObjmat($this->objmat);
  }

  public function configGridMan($reftar='', $refpre='', $codart='', $tiedat=0)
  {
    $det=array();
    if ($refpre!='' && $codart!='' && $tiedat==0){
      $c = new Criteria();
      $c->add(FapremanartPeer::REFPRE, $refpre);
      $c->add(FapremanartPeer::CODART, $codart);
      $recman = FapremanartPeer::doSelect($c);
      if ($recman){
        foreach ($recman as $man) {
          $famantartra_new= new Famantartra();
          $famantartra_new->setCodart($man->getCodart());
          $famantartra_new->setCodman($man->getCodman());
          $det[]=$famantartra_new;
        }
      }

    }else {
      $c = new Criteria();
      $c->add(FamantartraPeer::REFTAR, $reftar);
      $c->add(FamantartraPeer::CODART, $codart);
      $det = FamantartraPeer::doSelect($c);
    }

    $this->columns = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/protartra/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_man');

    $params = array('param1' => "'+$(this.id).up().previous(1).descendants()[0].value+'",'val2');
    $this->columns[1][2]->setCatalogo('Nphojint', 'sf_admin_edit_form', array('Codemp' => 3, 'Nomemp' => 4), 'Personal_Nphojint', $params);
    
    $this->objman = $this->columns[0]->getConfig($det);

    $this->fatartra->setObjman($this->objman);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridMed($reftar='') {
    $c = new Criteria();   
    $c->add(FamedsegtarPeer::REFTAR, $reftar);      
    $regmed = FamedsegtarPeer::doSelect($c);                   

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/protartra/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_med');
    
    $this->objmed = $this->columnas[0]->getConfig($regmed);

    $this->fatartra->setObjmed($this->objmed);
  }    

   public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js=""; $sw=true;
    $this->ajaxs=$ajax;
    switch ($ajax){
      case '1':
        $sw=false;
        $c= new Criteria();
        $c->add(FaordtraPeer::REFORD, $codigo);
        $result= FaordtraPeer::doSelectOne($c);
        if ($result)
        {
           $dato1=$result->getCodemb().'-'.$result->getNomemb(); 
           $refpre=$result->getRefpre();     
           $dato=$result->getDesord();     
           
        }else {
            $refpre=""; $codigo="";
            $js="alert_('La Orden de trabajo no esta registrada'); $('fatartra_reford').value=''; $('$cajtexmos').value=''; $('fatartra_reford').focus();";
        } 
    
         $this->params=array();
         $this->fatartra = $this->getFatartraOrCreate();
         $this->updateFatartraFromRequest();
         $this->labels = $this->getLabels();
         
         $this->configGridDet('',$codigo);  
         $output = '[["'.$cajtexmos.'","'.$dato.'",""],["fatartra_embarca","'.$dato1.'",""],["fatartra_refpre","'.$refpre.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
        $c= new Criteria();
        $c->add(NphojintPeer::CODEMP, $codigo);
        $c->add(NpasicarempPeer::STATUS, 'V');
        $c->addJoin(NphojintPeer::CODEMP, NpasicarempPeer::CODEMP);
        $result= NphojintPeer::doSelectOne($c);
        if ($result)
        {
           $dato=$result->getNomemp();           
        }else {       
            $js="alert('El Jefe de Proyecto y/o Responsable no esta registrado'); $('fatartra_codemp').value=''; $('fatartra_nomemp').value=''; $('fatartra_codemp').focus();";
        } 
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
        $sw=false;
        $reftar=$this->getRequestParameter('reftar');
        $refpre=$this->getRequestParameter('refpre');
        $codart=$this->getRequestParameter('articulo');        
        $tienemat=$this->getRequestParameter('datmat');

         $this->params=array();
         $this->fatartra = $this->getFatartraOrCreate();
         $this->updateFatartraFromRequest();
         $this->labels = $this->getLabels();
         
         $this->configGridMat($reftar,$refpre,$codart,$tienemat);  
         $output = '[["","",""]]';
        break; 
      case '4':
        $sw=false;
        $reftar=$this->getRequestParameter('reftar');
        $refpre=$this->getRequestParameter('refpre');
        $codart=$this->getRequestParameter('articulo');        
        $tieneman=$this->getRequestParameter('datman');

        $this->params=array();
         $this->fatartra = $this->getFatartraOrCreate();
         $this->updateFatartraFromRequest();
         $this->labels = $this->getLabels();
         
         $this->configGridMan($reftar,$refpre,$codart,$tieneman);  
         $output = '[["","",""]]';

        break;       
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw)  return sfView::HEADER_ONLY;
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
      $this->fatartra = $this->getFatartraOrCreate();
       $this->updateFatartraFromRequest();

        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->objdet);
        if (count($grid[0])==0)
        {
            $this->coderr=4;
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
    $grid_d = Herramientas::CargarDatosGridv2($this,$this->objdet);
    $grid_m = Herramientas::CargarDatosGridv2($this,$this->objmed);
  }

  public function saving($clasemodelo)
  {
    $grid_d = Herramientas::CargarDatosGridv2($this,$this->objdet);
    $grid_m = Herramientas::CargarDatosGridv2($this,$this->objmed);
    Producion::SalvarTarjetadeTrabajo($clasemodelo, $grid_d,$grid_m);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    Herramientas::EliminarRegistro('Fadettar', 'Reftar', $clasemodelo->getReftar());
    Herramientas::EliminarRegistro('Famedsegtar', 'Reftar', $clasemodelo->getReftar());
    Herramientas::EliminarRegistro('Famattartra', 'Reftar', $clasemodelo->getReftar());
    Herramientas::EliminarRegistro('Famantartra', 'Reftar', $clasemodelo->getReftar());
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
        case ('a'):   //grid Detalle 
            switch ($col) { 
              case ('2'):  //Código Articulo
                $long=strlen(H::getMascaraArticulo());
                if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
                {
                  if ($long==strlen($grid[$fila][$col-1])){
                  $c= new Criteria();
                  $c->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
                  $reg= CaregartPeer::doSelectOne($c);
                  if ($reg)
                    $grid[$fila][$col]=$reg->getDesart();
                  else {
                    $javascript = "alert_('El Art&iacute;culo no Existe');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";
                  } 
                }else {
                   $javascript = "alert_('El Art&iacute;culo no es de U&acute;ltimo Nivel');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";
                }
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                  $grid[$fila][2]="";
                 $javascript="alert_('El Art&iacute;culo esta Repetido');";
              }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;     
              default:
                break;
            }
          break;  
        case ('b'):   //grid Materiales 
            switch ($col) { 
              case ('1'):  //Código Articulo
                $long=strlen(H::getMascaraArticulo());
                if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
                {
                  if ($long==strlen($grid[$fila][$col-1])){
                  $c= new Criteria();
                  $c->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
                  $reg= CaregartPeer::doSelectOne($c);
                  if ($reg)
                    $grid[$fila][$col]=$reg->getDesart();
                  else {
                    $javascript = "alert_('El Art&iacute;culo no Existe');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";
                  } 
                }else {
                   $javascript = "alert_('El Art&iacute;culo no es de U&acute;ltimo Nivel');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";
                }
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                  $grid[$fila][2]="";
                 $javascript="alert_('El Art&iacute;culo esta Repetido');";
              }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;     
              default:
                break;
            }
          break; 
      case ('c'):   //grid Personal 
            switch ($col) { 
              case ('1'):  //Código Cargo
                if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
                {
                   $w= new Criteria();
                   $w->add(NpcargosPeer::CODCAR,$grid[$fila][$col-1]);
                   $reg= NpcargosPeer::doSelectOne($w);
                   if ($reg)
                   {                    
                      $grid[$fila][1]=$reg->getNomcar();     
                   }else {
                      $grid[$fila][$col-1]="";
                      $grid[$fila][1]="";
                      $javascript="alert_('El Cargo no esta Registrado');";
                   }   
                }else {
                    $grid[$fila][$col-1]="";
                    $grid[$fila][1]="";
                    $javascript="alert_('El Cargo esta Repetido');";
                }
                $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
                break; 
              case ('3'):  //Personal
                if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
                {
                   $w= new Criteria();
                   $w->add(NphojintPeer::CODEMP,$grid[$fila][$col-1]);
                   $reg= NphojintPeer::doSelectOne($w);
                   if ($reg)
                   {                    
                      $grid[$fila][$col]=$reg->getNomemp();     
                   }else {
                      $grid[$fila][$col-1]="";
                      $grid[$fila][$col]="";
                      $javascript="alert_('El Personal no esta Registrado');";
                   }   
                }else {
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";
                    $javascript="alert_('El Personal esta Repetido');";
                }
                $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
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
