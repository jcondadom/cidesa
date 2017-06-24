<?php

/**
 * almsolcot actions.
 *
 * @package    siga
 * @subpackage almsolcot
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almsolcotActions extends autoalmsolcotActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridReq($this->casolcot->getReqart());
    $this->configGridPro($this->casolcot->getNumsolcot());
  }

  public function configGridReq($reqart='')
  {
    $c = new Criteria();
    $c->add(CaartsolPeer :: REQART, $reqart);
    $detsol = CaartsolPeer :: doSelect($c);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almsolcot/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_sc');

    $this->obj = $this->columnas[0]->getConfig($detsol);

    $this->casolcot->setGrid($this->obj);
  }

  public function configGridPro($numsolcot='')
  {
    $c = new Criteria();
    $c->add(CadetsolcotPeer :: NUMSOLCOT, $numsolcot);
    $detcot = CadetsolcotPeer :: doSelect($c);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almsolcot/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_proveedores');

    $this->obj2 = $this->columnas[0]->getConfig($detcot);

    $this->casolcot->setGrid2($this->obj2);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato="";

    switch ($ajax){
      case '1':
        $p= new Criteria();
        $p->add(CasolartPeer::REQART,$codigo);
        $resul= CasolartPeer::doSelectOne($p);
        if ($resul)
        {
           $esta=H::getX_vacio('REQART','Casolcot','Numsolcot',$codigo);
           if ($esta=='')
             $dato=$resul->getDesreq();
           else {
             $codigo='';
            $js="alert_('La Solicitud ya esta asociada a la Solcitud de Cotizaci&oacute;n $esta'); $('$cajtexmos').value=''; $('casolcot_reqart').value=''; $('casolcot_reqart').focus();";
          }  
        }else {
          $codigo='';
          $js="alert('La Solicitud no esta registrada'); $('$cajtexmos').value=''; $('casolcot_reqart').value=''; $('casolcot_reqart').focus();";
        }
        $this->params=array();
        $this->casolcot = $this->getCasolcotOrCreate();
        $this->updateCasolcotFromRequest();
        $this->labels = $this->getLabels();
       
        $this->configGridReq($codigo);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    //return sfView::HEADER_ONLY;
  }

  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra=""; $com='';

    switch ($col) {
          case '1': 
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                 $w= new Criteria();
                 $w->add(CaproveePeer::CODPRO,$grid[$fila][$col-1]);
                 $reg= CaproveePeer::doSelectOne($w);
                 if ($reg)
                 {                    
                    $grid[$fila][1]=$reg->getRifpro();                       
                    $grid[$fila][2]=$reg->getNompro();                       
                 }else {
                    $grid[$fila][$col-1]="";
                    $grid[$fila][1]="";
                    $grid[$fila][2]="";
                    $javascript="alert_('El Proveedor no esta Registrado');";
                 }   
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                  $grid[$fila][2]="";
                 $javascript="alert('El Proveedor esta Repetido');";
              }
            $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
            break;           
          default:
            break;
        }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
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
       $this->casolcot = $this->getCasolcotOrCreate();
       $this->updateCasolcotFromRequest();

       $this->configGridPro();
       $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
       if (count($grid2[0])==0)
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
    $this->configGridReq();
    $this->configGridPro();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
  }

  public function saving($clasemodelo)
  {
    if ($clasemodelo->getId())
    {
      $clasemodelo->save();
    }else {
      $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
      Compras::salvarSolCot($clasemodelo,$grid2);
    }

    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Cadetsolcot', 'Numsolcot', $clasemodelo->getNumsolcot());
    $clasemodelo->delete();
    return -1;
  }


}
