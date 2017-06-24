<?php

/**
 * mancatmat actions.
 *
 * @package    siga
 * @subpackage mancatmat
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class mancatmatActions extends automancatmatActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

   public function configGrid(){
    $this->configGridPartes($this->mancatmat->getNumsol());
    $this->configGridAPL($this->mancatmat->getNumsol());
    $this->configGridReferencia($this->mancatmat->getNumsol());
    $this->configGridReposicion($this->mancatmat->getNumsol());
  }

  public function configGridPartes($numsol='')
  {
   $c= new Criteria();
   $c->add(ManparfabcatPeer::NUMSOL,$numsol);
   $det= ManparfabcatPeer::doSelect($c);
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/mancatmat/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_partes');
    
    $this->obj =$this->columnas[0]->getConfig($det);

    $this->mancatmat->setGrid($this->obj);
  }

  public function configGridAPL($numsol='')
  {
   $c= new Criteria();
   $c->add(ManaplmonPeer::NUMSOL,$numsol);
   $det= ManaplmonPeer::doSelect($c);
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/mancatmat/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_apl');
    
    $this->obj2 =$this->columnas[0]->getConfig($det);

    $this->mancatmat->setGrid2($this->obj2);
  } 

  public function configGridReferencia($numsol='')
  {
   $c= new Criteria();
   $c->add(ManrefcruPeer::NUMSOL,$numsol);
   $det= ManrefcruPeer::doSelect($c);
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/mancatmat/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_referencia');
    $this->columnas[1][1]->setCombo(array('E' => 'Ensamblaje', 'R' => 'Reemplazo', 'S' => 'Sustituto', 'C' => 'En Conjunto'));

    $this->obj3 =$this->columnas[0]->getConfig($det);

    $this->mancatmat->setGrid3($this->obj3);
  } 

  public function configGridReposicion($numsol='')
  {
   $c= new Criteria();
   $c->add(ManexicatPeer::NUMSOL,$numsol);
   $det= ManexicatPeer::doSelect($c);
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/mancatmat/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_reposicion');
    
    $this->columnas[1][0]->setCombo(array('A' => 'Automático', 'E' => 'Estratégico', 'S' => 'Solicitud', 'R' => 'Reparado'));
    
    $this->obj4 =$this->columnas[0]->getConfig($det);

    $this->mancatmat->setGrid4($this->obj4);
  }     

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=$js="";
    switch ($ajax){
      case '1':    
          $loncat = $this->getRequestParameter('longitud','');
          $q= new Criteria();
          $q->add(NpcatprePeer::CODCAT,$codigo);
          $reg= NpcatprePeer::doSelectOne($q);
          if ($reg)
          {
            if (strlen($codigo)==$loncat)
             $dato=$reg->getNomcat();    
            else 
              $js="alert_('La Unidad Solicitante debe ser de Último Nivel');  $('mancatmat_unisol').value=''; $('$cajtexmos').value=''; $('mancatmat_unisol').focus();";
          }else
            $js="alert_('La Unidad Solicitante no esta registrada');  $('mancatmat_unisol').value=''; $('$cajtexmos').value=''; $('mancatmat_unisol').focus();";
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
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
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4);
    Mantenimiento::salvarCatalogacionMateriales($clasemodelo,$grid,$grid2,$grid3,$grid4);

    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Manparfabcat','Numsol',$clasemodelo->getNumsol());
    H::EliminarRegistro('Manaplmon','Numsol',$clasemodelo->getNumsol());
    H::EliminarRegistro('Manrefcru','Numsol',$clasemodelo->getNumsol());
    H::EliminarRegistro('Manexicat','Numsol',$clasemodelo->getNumsol());
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
        case ('a'):   //grid Partes 
            switch ($col) { 
              case ('1'):  //Código del Fabricante
                $c= new Criteria();
                $c->add(MandeffabPeer::CODFAB,$grid[$fila][$col-1]);
                $reg= MandeffabPeer::doSelectOne($c);
                if ($reg)
                  $grid[$fila][$col]=$reg->getDesfab();
                else {
                  $javascript = "alert_('El Fabricante no Existe');";
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
                } 
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;    
              default:
                break;
            }
          break;
        case ('b'):   //grid APL Montaje 
            switch ($col) { 
              case ('1'):  //Número de Equipo
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
        case ('d'):   //grid Reposición
            switch ($col) { 
              case ('2'):  //Código de Almacén
                $c= new Criteria();
                $c->add(CadefalmPeer::CODALM,$grid[$fila][$col-1]);
                $reg= CadefalmPeer::doSelectOne($c);
                if ($reg)
                  $grid[$fila][$col]=$reg->getNomalm();
                else {
                  $javascript = "alert_('El Almac&eacute;n no Existe');";
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
