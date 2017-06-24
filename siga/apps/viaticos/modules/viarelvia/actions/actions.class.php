<?php

/**
 * viarelvia actions.
 *
 * @package    siga
 * @subpackage viarelvia
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class viarelviaActions extends autoviarelviaActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid($this->viarelvia->getNumrel());
  }

  public function configGrid($numrel='')
  {
     $c = new Criteria();
     $c->add(ViadetrelviaPeer::NUMREL,$numrel);
     $reg = ViadetrelviaPeer::doSelect($c);

     $this->columnas = H:: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/viarelvia/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');
     
     $mascara = H::getMascaraArticulo();
     $lonarti = strlen($mascara);
     $mascaracategoria= H::getObtener_FormatoCategoria();
     $loncat=strlen($mascaracategoria);
     $obj = array ('codart' => 1, 'desart' => 2);
     $params = array ('param1' => $lonarti, 'val2');

     $this->columnas[1][0]->setHTML('type="text" size="25" maxlength="' . chr(39) . $lonarti . chr(39) . '" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $mascara . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter2(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,21);"');
     $this->columnas[1][0]->setCatalogo('caregart', 'sf_admin_edit_form', $obj, 'Caregart_Facarord', $params);

     $this->columnas[1][6]->setHTML('type="text" size="25" maxlength="' . chr(39) . $loncat . chr(39) . '" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $mascaracategoria . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter2(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,21);"');
     $this->columnas[1][6]->setCatalogo('npcatpre', 'sf_admin_edit_form', array('codcat' => 7, 'nomcat' => 8), 'NconceptosCat_Asignar');
     

     $this->obj = $this->columnas[0]->getConfig($reg);

     $this->viarelvia->setGrid($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js="";
    switch ($ajax){
      case '1':      
        if ($this->getRequestParameter('nuevo')=='')
        {
          $q= new Criteria();
          $q->add(TsdesmonPeer::CODMON,$codigo);
          $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
          $reg= TsdesmonPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=number_format($reg->getValmon(),6,',','.');
          }    
        }else {
            $js="$('viarelvia_codmon').value='".$this->getRequestParameter('moneref')."'";   
            $dato=$this->getRequestParameter('valmone');
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
         $q = new Criteria();
         $q->add(NphojintPeer :: CODEMP, $codigo);
         $q->add(NpasicarempPeer :: STATUS, 'V');
         $q->addJoin(NphojintPeer :: CODEMP, NpasicarempPeer :: CODEMP);
         $result= NphojintPeer::doSelectOne($q);
         if ($result)
         {
           $dato=$result->getNomemp();
         }else {
           $js="alert_('El Empleado no esta Registrado o no esta Vigente'); $('viarelvia_codemp').value=''; $('$cajtexmos').value=''; $('viarelvia_codemp').focus();";
         }
         $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '3':
        break;        
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;   
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
        $mascara = H::getMascaraArticulo();
        $lonarti = strlen($mascara);
        $t= new Criteria();                
        $t->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
        $reg= CaregartPeer::doSelectOne($t);
        if ($reg)
        {              
          if ($lonarti==strlen($grid[$fila][$col-1])) {
            $grid[$fila][$col]=$reg->getDesart();
            $grid[$fila][8]=$reg->getCodpar();
            $grid[$fila][9]=H::getX_vacio('CODPAR','Nppartidas','Nompar',$reg->getCodpar());             
          }else {
            $grid[$fila][$col-1]="";
            $grid[$fila][$col]="";
            $grid[$fila][8]="";
            $grid[$fila][9]="";
            $javascript="alert_('El Art&iacute;culo no es de &Uacute;ltimo Nivel');";
          }  
        } else {
          $grid[$fila][$col-1]="";
          $grid[$fila][$col]="";
          $grid[$fila][8]="";
          $grid[$fila][9]="";
          $javascript="alert_('El Art&iacute;culo no esta Registrado');";
        }          
        $jsonextra = ',["javascript","' . $javascript . '",""]';
        break;    
      case '7':
        $mascaracategoria= H::getObtener_FormatoCategoria();
        $loncat=strlen($mascaracategoria);
        $t= new Criteria();                
        $t->add(NpcatprePeer::CODCAT,$grid[$fila][$col-1]);
        $reg= NpcatprePeer::doSelectOne($t);
        if ($reg)
        {              
          if ($loncat==strlen($grid[$fila][$col-1]))
            $grid[$fila][$col]=$reg->getNomcat();                  
          else {
            $grid[$fila][$col-1]="";
            $grid[$fila][$col]="";
            $javascript="alert_('El C&oacute;digo del Unidad no es de &Uacute;ltimo Nivel ');";
          }
        } else {
          $grid[$fila][$col-1]="";
          $grid[$fila][$col]="";
          $javascript="alert_('El C&oacute;digo del Unidad no esta Registrado');";
        }          
        $jsonextra = ',["javascript","' . $javascript . '",""]';
        break;      
      case '11':
        $t= new Criteria();                
        $t->add(ViasolviatraPeer::NUMSOL,$grid[$fila][$col-1]);
        $reg= ViasolviatraPeer::doSelectOne($t);
        if (!$reg)        {              
        
          $grid[$fila][$col-1]="";
          $javascript="alert_('El N&uacute;mero de la Solicitud no esta Registrado');";
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

      $this->viarelvia = $this->getViarelviaOrCreate();
      $this->updateViarelviaFromRequest();
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      if(count($grid[0])<=0)
      {
          $this->coderr='V005';
          return false;
      }
      foreach($grid[0] as $reg)
      {
        if($reg->getCodart()=='')
        {
            $this->coderr='V006';
            return false;
        }
        if($reg->getNumfac()=='')
        {
            $this->coderr='V006';
            return false;
        }
        if($reg->getFecfac()==null)
        {
            $this->coderr='V006';
            return false;
        }
        if($reg->getMontonet()==0)
        {
            $this->coderr='V006';
            return false;
        }
        if($reg->getCodcat()=='')
        {
            $this->coderr='V006';
            return false;
        }
        if($reg->getCodpar()=='')
        {
            $this->coderr='V006';
            return false;
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

  public function saving($clasemodelo)
  {
    if (!$clasemodelo->getId())
    {
      $tienecorrelativo=false;
      if($clasemodelo->getNumrel()=='##########')
      {
        $tienecorrelativo=true;
        if (Herramientas::getVerCorrelativo('numrelgasadi','viadefgen',$r))
        {
          $encontrado=false;
          while (!$encontrado)
          {
            $numero=str_pad($r, 10, '0', STR_PAD_LEFT);
            $sql="select numrel from viarelvia where numrel='".$numero."'";
            if (Herramientas::BuscarDatos($sql,$result))
            {
              $r=$r+1;
            }
            else
            {
              $encontrado=true;
            }
          }
          $clasemodelo->setNumrel(str_pad($r, 10, '0', STR_PAD_LEFT));
        }
      }else $clasemodelo->setNumrel(str_replace('#','0',$clasemodelo->getNumrel()));
        
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      $moneda=$clasemodelo->getCodmon();
      $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      if ($moneda2!=$moneda)
            $valmon=$clasemodelo->getValmon();
    else
        $valmon=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);        
        #GENERAMOS COMPROMISO
        $valor=Viaticos::GenerarCompromisoviarelvia($clasemodelo, $grid, $refcom);
        if ($valor==-1)
        {
            if($refcom!="")
            {
                Viaticos::salvarDetalleRelVia($clasemodelo,$grid);
                $clasemodelo->setRefcom($refcom);    
                $clasemodelo->setMonbol($clasemodelo->getMonbol()*$valmon);
                $clasemodelo->setTotfac($clasemodelo->getTotfac()*$valmon);
                if ($tienecorrelativo==true)                
                  H::getSalvarCorrelativo('numrelgasadi','viadefgen','Referencia',$r,$msg);               
                return parent::saving($clasemodelo);
            }
        }else {
            return $valor;
        }   
    }else return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Cpimpcom','REFCOM',$clasemodelo->getRefcom());
    H::EliminarRegistro('Cpcompro','REFCOM',$clasemodelo->getRefcom());

    $c = new Criteria();
    $c->add(ViarelviaPeer::NUMREL,$clasemodelo->getNumrel());
    $per = ViarelviaPeer::doSelect($c);
    foreach($per as $r)
      $r->delete();

    return parent::deleting($clasemodelo);
  }
  
}
