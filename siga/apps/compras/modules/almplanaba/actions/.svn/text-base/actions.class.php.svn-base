<?php

/**
 * almplanaba actions.
 *
 * @package    siga
 * @subpackage almplanaba
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almplanabaActions extends autoalmplanabaActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      if (!$this->capdaoc->getId()) $this->capdaoc->setFecpda(date('Y-m-d'));
      $this->configGrid();
  }

  public function configGrid()
  {
      $this->configGridOrdenes();
      $this->configGridDetalle($this->capdaoc->getRefpda());
      $this->configGridDistAlm();
  }
  
  public function configGridOrdenes($fecdes='',$fechas='')
  {
    $r= new Criteria();
    $r->add(CaordcomPeer::STAORD,'A');    
    if ($fecdes!="" && $fechas!="")
        $sql="(caordcom.stapda<>'S' or caordcom.stapda is null) and caordcom.fecord>='".$fecdes."' and caordcom.fecord<='".$fechas."' and ordcom in (select ordcom from caentpda)";
    else
        $sql="(caordcom.stapda<>'S' or caordcom.stapda is null) and caordcom.ordcom='' ";
    $r->add(CaordcomPeer::FECORD,$sql,Criteria::CUSTOM);
    $reg=  CaordcomPeer::doSelect($r);
      
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almplanaba/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_ordenes');

    $this->obj2 = $this->columnas[0]->getConfig($reg);

    $this->capdaoc->setObj2($this->obj2);
  }
  
  public function configGridDetalle($refpda='',$arreglo=array())
  {
      if (count($arreglo)>0)
      {
          $j=0;
          while ($j<count($arreglo))
          {
              $cadetpda= new Cadetpda();
              $cadetpda->setOrdcom($arreglo[$j]["ordcom"]);
              $cadetpda->setCodart($arreglo[$j]["codart"]);
              $cadetpda->setDesart($arreglo[$j]["desart"]);
              $cadetpda->setCodpro($arreglo[$j]["codpro"]);
              $cadetpda->setCanart($arreglo[$j]["canart"]);
              $cadetpda->setFecent($arreglo[$j]["fecent"]);
              $cadetpda->setTiptra($arreglo[$j]["tiptra"]);
              $cadetpda->setDirori($arreglo[$j]["dirori"]);              
              $cadetpda->setTmart($arreglo[$j]["tmart"]);
              $det[]=$cadetpda;
              $j++;
          }
      }else {
          $c= new Criteria();
          $c->add(CadetpdaPeer::REFPDA,$refpda);
          $det= CadetpdaPeer::doSelect($c);            
      }
      
      $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almplanaba/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_abastecimiento');

      $this->columnas[1][3]->setCombo(CatipalmPeer :: getTipos());
      $this->columnas[1][12]->setCombo(Constantes::ListaMes());
      $this->obj = $this->columnas[0]->getConfig($det);

      $this->capdaoc->setObj($this->obj);
  }
  
  public function configGridDistAlm($codart='', $idreg='')
  {
      $c= new Criteria();
      $c->add(CaalmpdaPeer::CODART,$codart);
      $c->add(CaalmpdaPeer::ID_REG,$idreg);
      $det= CaalmpdaPeer::doSelect($c);            

      
      $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almplanaba/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_disalm');
        
        $objubi= array ('codubi' => '3','nomubi' =>'4');
        $params = array('param1' => "'+$(this.id).up().previous(1).descendants()[0].value+'");
        $mascaraubi=Herramientas::ObtenerFormato('Cadefart','Forubi');
        $lonubi=strlen($mascaraubi);
        $this->columnas[1][2]->setHTML('type="text" size="10" maxlength="'.chr(39).$lonubi.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubi.chr(39).')"');
        $this->columnas[1][2]->setCatalogo('Cadefubi','sf_admin_edit_form',$objubi,'Cadefubi_Almdes',$params);
       
      $this->obj3 = $this->columnas[0]->getConfig($det);

      $this->capdaoc->setObj3($this->obj3);
  }
  

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato=""; $sw=true;

    switch ($ajax){
      case '1':
          $this->ajax=$ajax;
          $sw=false;
          $this->params=array();
          $this->labels = $this->getLabels();
          $this->capdaoc = $this->getCapdaocOrCreate();
          $dateFormat = new sfDateFormat('es_VE');
          $fec1 = $dateFormat->format($this->getRequestParameter('capdaoc[fecdes]'), 'i', $dateFormat->getInputPattern('d'));
          
          $dateFormat = new sfDateFormat('es_VE');
          $fec2 = $dateFormat->format($this->getRequestParameter('capdaoc[fechas]'), 'i', $dateFormat->getInputPattern('d'));
          
          $this->configGridOrdenes($fec1, $fec2);
          
           $js="$('divgrid2').show(); $$('.sf_admin_action_save')[0].show();";
          
          $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '2':
          $this->ajax=$ajax;
          $this->params=array();
          $sw=false;
          $this->labels = $this->getLabels();
          $this->capdaoc = $this->getCapdaocOrCreate();
          $this->configGridOrdenes();
          $grid = Herramientas::CargarDatosGridv2($this,$this->obj2);
          $dateFormat = new sfDateFormat('es_VE');
          $fec1 = $dateFormat->format($this->getRequestParameter('capdaoc[fecdes]'), 'i', $dateFormat->getInputPattern('d'));
          
          $dateFormat = new sfDateFormat('es_VE');
          $fec2 = $dateFormat->format($this->getRequestParameter('capdaoc[fechas]'), 'i', $dateFormat->getInputPattern('d'));
          
          Almacen::buscarDetalleSD($this->capdaoc,$grid,&$arredet);
          
          $this->configGridDetalle('', $arredet);
          
          $js="$('divgrid2').hide(); $$('.sf_admin_action_save')[0].hide();";
          
          $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;   
      case '3':
          $this->ajax=$ajax;
          $this->params=array();
          $sw=false;
          $this->labels = $this->getLabels();
          $this->capdaoc = $this->getCapdaocOrCreate();
          
          $codart=$this->getRequestParameter('articulo');
          $idreg=$this->getRequestParameter('idreg');
          $cant=H::toFloat($this->getRequestParameter('cant'));
                    
          $this->configGridDistAlm($codart, $idreg);          
          
          $js="$('divgrid3').show(); $$('.sf_admin_action_save')[1].show();";
          
          $output = '[["capdaoc_codartact","'.$codart.'",""],["capdaoc_canartact","'.$cant.'",""],["javascript","'.$js.'",""]]';
        break;      
      case '4':
          $js="salvarDistribucion(); $('divgrid3').hide(); $$('.sf_admin_action_save')[1].hide();";          
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
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->capdaoc = $this->getCapdaocOrCreate();
      try{ $this->updateCapdaocFromRequest();}
      catch (Exception $ex){}
      $this->configGridDetalle();
      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

      $x=$grid[0];
      $i=0;
      if (count($x)==0)
      {
        $this->coderr=4;
      }
        
      if($this->coderr!=-1){         
        return false;
      } else return true;

    }else return true;



  }

  /**
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
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
    Compras::salvarPlanAbastecimiento($clasemodelo,$grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Cadetpda', 'Refpda', $clasemodelo->getRefpda());
    H::EliminarRegistro('Caalmpda', 'Refpda', $clasemodelo->getRefpda());
    $clasemodelo->delete();
    return -1;
  }
  
    /**
   * FunciÃÂ³n para procesar _todas_ las funciones Ajax del formulario
   * Cada funciÃÂ³n esta identificada con el valor de la vista "ajax"
   * el cual traerÃÂ¡ el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $codart = $this->getRequestParameter('capdaoc_codartact', '');
    $canart = $this->getRequestParameter('capdaoc_canartact', '');
    $javascript="";  $jsonextra=""; $com='';

    switch ($name) {
          case 'a': 
              switch ($col) {
                  case '2': 
                     $w= new Criteria();
                     $w->add(OcestadoPeer::CODEDO,$grid[$fila][$col-1]);
                     $reg= OcestadoPeer::doSelectOne($w);
                     if ($reg)
                     {                    
                        $grid[$fila][2]=$reg->getNomedo();                       
                     }else {
                        $grid[$fila][$col-1]="";
                        $grid[$fila][2]="";
                        $javascript="alert_('El Estado no existe');";
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
                     if ($grid[$fila][$col-1]!="")
                     {
                         $w= new Criteria();
                         $w->add(CadefalmPeer::CODALM,$grid[$fila][$col-1]);
                         $reg= CadefalmPeer::doSelectOne($w);
                         if ($reg)
                         {                    
                            $grid[$fila][1]=$reg->getNomalm();                       
                         }else {
                            $grid[$fila][$col-1]="";
                            $grid[$fila][1]="";
                            $javascript="alert_('El Almac&eacute;n no existe');";
                         }                         
                        $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
                     }
                    break;
                  case '3': 
                    if ($grid[$fila][$col-3]!="")
                    {
                     if (!Hacienda::Repetido2($grid,$grid[$fila][$col-1].'-'.$grid[$fila][$col-3],$fila,$col-1,$col-3))
                     {
                         $w= new Criteria();
                         $w->add(CadefubiPeer::CODUBI,$grid[$fila][$col-1]);
                         $reg= CadefubiPeer::doSelectOne($w);
                         if ($reg)
                         {    
                            $c = new Criteria();
                            $c->add(CaartalmubiPeer::CODALM,$grid[$fila][$col-3]);
                            $c->add(CaartalmubiPeer::CODUBI,$grid[$fila][$col-1]);
                            $c->add(CaartalmubiPeer::CODART,$codart);
                            $alm = CaartalmubiPeer::doSelectOne($c);
                             if ($alm)
                             {
                                $grid[$fila][3]=$reg->getNomubi();                       
                             }else {
                                $grid[$fila][$col-1]="";
                                $grid[$fila][3]="";
                                $javascript="alert_('La Ubicaci&oacute;n no esta asociada a este almac&eacute;n');";
                             }
                         }else {
                            $grid[$fila][$col-1]="";
                            $grid[$fila][3]="";
                            $javascript="alert_('La Ubicaci&oacute;n no existe');";
                         }
                     }else {
                        $grid[$fila][$col-1]="";
                        $grid[$fila][3]="";
                        $javascript="alert_('La Ubicaci&oacute;n esta repetida con el mismo almacÃ©n ');";
                     }
                    $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
                    }     
                    else {
                        $grid[$fila][$col-1]="";
                        $grid[$fila][3]="";
                        $javascript="alert_('De seleccionar el Almac&eacute;n ');";
                     }
                    break;       
                  case '5':                      
                     $i=0;
                     $acum=0;
                     while ($i<count($grid))
                     {
                         $acum=$acum + H::toFloat($grid[$i][$col-1]);
                         $i++;
                     }
                     if ($acum>$canart)
                     {
                        $grid[$fila][$col-1]="0,00";                        
                        $javascript="alert_('La Cantidad Distribuida es mayor a la Cantidad Original');";
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
