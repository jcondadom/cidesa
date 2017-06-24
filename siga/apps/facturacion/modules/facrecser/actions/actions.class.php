<?php

/**
 * facrecser actions.
 *
 * @package    siga
 * @subpackage facrecser
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facrecserActions extends autofacrecserActions
{
  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->listing();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/caregart/filters');

    $longitud=strlen(H::ObtenerFormato('Cadefart','Forart'));

     // 15    // pager
    $this->pager = new sfPropelPager('Caregart', 15);
    $c = new Criteria();
    $c->add(CaregartPeer::TIPREG,'F');
    $sql = "length(Codart) = '" . $longitud . "'";
    $c->add(CaregartPeer::CODART, $sql, Criteria :: CUSTOM);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridMateriales($this->caregart->getCodart());
    $this->configGridEquipos($this->caregart->getCodart());
    $this->configGridManoObra($this->caregart->getCodart());
    $this->configGridServicios($this->caregart->getCodart());
  }

  public function configGridMateriales($codart='')
  {
    $c = new Criteria();
    $c->add(FarecmatartPeer::CODART, $codart);
    $det = FarecmatartPeer::doSelect($c);

    $this->columns = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrecser/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_mat');

    $mascara = H::getMascaraArticulo();
    $lonarti=strlen($mascara);
    $obj= array('Codmat' => 1, 'Desmat' => 2);
    $params= array('param1' => $lonarti, 'val2');
    $this->columns[1][0]->setHTML('type="text" size="20" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,4);"');
    $this->columns[1][0]->setCatalogo('Caregart','sf_admin_edit_form',$obj,'Caregart_Materiales',$params);
    $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
    if ($manunialt=='S' && count($det)==0){
      $this->columns[1][2]->setTipo('c');
      $this->columns[1][2]->setCombo(CaunialartPeer::getUnidades());
      $this->columns[1][2]->setHTML(' ');
    }

    $this->obj1 = $this->columns[0]->getConfig($det);

    $this->caregart->setObj1($this->obj1);
  }

  public function configGridEquipos($codart='')
  {
    $c = new Criteria();
    $c->add(FarecequartPeer::CODART, $codart);
    $det = FarecequartPeer::doSelect($c);

    $this->columns = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrecser/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_equ');
    $mascara = H::getMascaraArticulo();
    $lonarti=strlen($mascara);
    $obj= array('Codequ' => 1, 'Desequ' => 2);
    $params= array('param1' => $lonarti, 'val2');
    $this->columns[1][0]->setHTML('type="text" size="20" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,4);"');
    $this->columns[1][0]->setCatalogo('Caregart','sf_admin_edit_form',$obj,'Caregart_Equipos',$params);
    $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
    if ($manunialt=='S' && count($det)==0){
      $this->columns[1][2]->setTipo('c');
      $this->columns[1][2]->setCombo(CaunialartPeer::getUnidades());
      $this->columns[1][2]->setHTML(' ');
    }
    
    $this->obj2 = $this->columns[0]->getConfig($det);

    $this->caregart->setObj2($this->obj2);
  }

  public function configGridManoObra($codart='')
  {
    $c = new Criteria();
    $c->add(FarecmanartPeer::CODART, $codart);
    $det = FarecmanartPeer::doSelect($c);

    $this->columns = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrecser/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_man');

    $this->obj3 = $this->columns[0]->getConfig($det);

    $this->caregart->setObj3($this->obj3);
  }

  public function configGridServicios($codart='')
  {
    $c = new Criteria();
    $c->add(FarecserartPeer::CODART, $codart);
    $det = FarecserartPeer::doSelect($c);

    $this->columns = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facrecser/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_ser');

    $mascara = H::getMascaraArticulo();
    $lonarti=strlen($mascara);
    $obj= array('Codser' => 1, 'Desser' => 2);
    $params= array('param1' => $lonarti, 'val2');
    $this->columns[1][0]->setHTML('type="text" size="20" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,4);"');
    $this->columns[1][0]->setCatalogo('Caregart','sf_admin_edit_form',$obj,'Caregart_Servicios',$params);
    $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
    if ($manunialt=='S' && count($det)==0){
      $this->columns[1][2]->setTipo('c');
      $this->columns[1][2]->setCombo(CaunialartPeer::getUnidades());
      $this->columns[1][2]->setHTML(' ');
    }

    $this->obj4 = $this->columns[0]->getConfig($det);

    $this->caregart->setObj4($this->obj4);
  }  

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $sw=true; $javascript = ""; $dato="";

    switch ($ajax){
      case '1':
        $this->ajaxs = '1';
        $this->unidades = array();        
        $sw=false;
        $this->unidades = CaunialartPeer :: getUnidades($codigo);
        $output = '[["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
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

    $grid1 = Herramientas::CargarDatosGridv2($this,$this->obj1);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4);

  }

  public function saving($clasemodelo)
  {
    $grid1 = Herramientas::CargarDatosGridv2($this,$this->obj1);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4);
    Facturacion::SalvarRecetasServicio($clasemodelo,$grid1,$grid2,$grid3,$grid4);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Farecmatart','Codart',$clasemodelo->getCodart());
    H::EliminarRegistro('Farecequart','Codart',$clasemodelo->getCodart());
    H::EliminarRegistro('Farecmanart','Codart',$clasemodelo->getCodart());
    H::EliminarRegistro('Farecserart','Codart',$clasemodelo->getCodart());
    return -1;
  }

  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra=""; $com='';

    switch ($name) {
      case 'a': 
        switch ($col) {
          case '1': 
            if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
            {
               $w= new Criteria();
               $w->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
               //$w->add(CaregartPeer::TIPART,'M');
               $reg= CaregartPeer::doSelectOne($w);
               if ($reg)
               {                    
                  $idart=$name."x_".$fila."_".$col;
                  $grid[$fila][1]=$reg->getDesart(); 
                  $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
                  if ($manunialt=='S')
                     $javascript="cargarComboUnidades('$idart');";
                  else
                    $grid[$fila][2]=$reg->getUnimed(); 

               }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                  $grid[$fila][2]="";
                  $javascript="alert_('El Material no esta Registrado');";
               }   
            }else {
                $grid[$fila][$col-1]="";
                $grid[$fila][1]="";
                $grid[$fila][2]="";
               $javascript="alert_('El Material esta Repetido');";
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
            break;           
          default:
            break;
        }
        break;
      case 'b': 
        switch ($col) {
          case '1': 
            if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
            {
               $w= new Criteria();
               $w->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
               //$w->add(CaregartPeer::TIPART,'E');
               $reg= CaregartPeer::doSelectOne($w);
               if ($reg)
               {                    
                  $idart=$name."x_".$fila."_".$col;
                  $grid[$fila][1]=$reg->getDesart(); 
                  $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
                  if ($manunialt=='S')
                     $javascript="cargarComboUnidades('$idart');";
                  else
                    $grid[$fila][2]=$reg->getUnimed(); 

               }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                  $grid[$fila][2]="";
                  $javascript="alert_('La Maquinaria o Equipo no esta Registrado');";
               }   
            }else {
                $grid[$fila][$col-1]="";
                $grid[$fila][1]="";
                $grid[$fila][2]="";
               $javascript="alert_('La Maquinaria o Equipo esta Repetido');";
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
            break;           
          default:
            break;
        }
        break;
      case 'c': 
        switch ($col) {
          case '1': 
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
                  $javascript="alert_('La Mano de Obra no esta Registrada');";
               }   
            }else {
                $grid[$fila][$col-1]="";
                $grid[$fila][1]="";
                $javascript="alert_('La Mano de Obra no esta Registrada');";
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
            break;           
          default:
            break;
        }
        break;
      case 'd': 
        switch ($col) {
          case '1': 
            if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
            {
               $w= new Criteria();
               $w->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
               $w->add(CaregartPeer::TIPO,'S');
               $reg= CaregartPeer::doSelectOne($w);
               if ($reg)
               {                    
                  $idart=$name."x_".$fila."_".$col;
                  $grid[$fila][1]=$reg->getDesart(); 
                  $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
                  if ($manunialt=='S')
                     $javascript="cargarComboUnidades('$idart');";
                  else
                    $grid[$fila][2]=$reg->getUnimed(); 

               }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                  $grid[$fila][2]="";
                  $javascript="alert_('El Servicio no esta Registrado');";
               }   
            }else {
                $grid[$fila][$col-1]="";
                $grid[$fila][1]="";
                $grid[$fila][2]="";
               $javascript="alert_('El Servicio esta Repetido');";
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
