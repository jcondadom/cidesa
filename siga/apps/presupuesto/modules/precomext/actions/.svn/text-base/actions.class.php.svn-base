<?php

/**
 * precomext actions.
 *
 * @package    siga
 * @subpackage precomext
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class precomextActions extends autoprecomextActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid($this->cpcomext->getRefcomext());
  }

  public function configGrid($refcom='')
  {
    $c = new Criteria();
    $c->add(CpimpcomextPeer::REFCOMEXT,$refcom);
    $per = CpimpcomextPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/precomext/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_cpimpcomext');

    $this->obj = $this->columnas[0]->getConfig($per);
    
    $this->cpcomext->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js="";

    switch ($ajax){
      case '1':
          $t= new Criteria();
          $t->add(CpdoccomPeer::TIPCOM,$codigo);
          $t->add(CpdoccomPeer::REFPRC,'N');
          $t->add(CpdoccomPeer::AFEDIS,'R');
          $reg= CpdoccomPeer::doSelectOne($t);
          if ($reg)
          {
              $dato=$reg->getNomext();              
          }else {
              $js="alert_('El Tipo de Documento no existe o No es un Documento Directo'); $('cpcomext_tipcom').value=''; $('cpcomext_tipcom').focus();";
          }
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
          $t= new Criteria();
          $t->add(OpbenefiPeer::CEDRIF,$codigo);
          $reg= OpbenefiPeer::doSelectOne($t);
          if ($reg)
          {
              $dato=$reg->getNomben();              
          }else {
              $js="alert_('El Beneficiario no existe'); $('cpcomext_cedrif').value=''; $('cpcomext_cedrif').focus();";
          }
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;    
      case '3':
           if  ($this->getRequestParameter('nuevo')=='')
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
              $js="$('cpcomext_codmon').value='".$this->getRequestParameter('variable')."'";   
              $dato=$this->getRequestParameter('valmone');
           }
           $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break; 
      case '4':
        $dateFormat = new sfDateFormat('es_VE');
        $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

        $msj="";
        $c= new Criteria();
        $c->add(CpcomextPeer::REFCOMEXT,$this->getRequestParameter('refcomext'));
        $data=CpcomextPeer::doSelectOne($c);
        if ($data)
        {
          if ($fecha<$data->getFeccom())
          {
            $msj="alert('La Fecha de Anulacion no puede ser menor a la Fecha del Compromiso'); $('cpcomext_fecanu').value=''";
          }          
        }        
        $output = '[["javascript","'.$msj.'",""]]';
        break;
      case '5':
      $refcomext = $this->getRequestParameter('refcomext','');
      $feccom = $this->getRequestParameter('feccom','');
        $msj = Presupuesto::verificarAnuPrecomext($refcomext);
        if ($msj==''){
          $javascript="abrirAnular('$refcomext','$feccom')";
        }else {
          $javascript="alert('$msj')";
        }
        $output = '[["javascript","'.$javascript.'",""]]';
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
        $this->cpcomext = $this->getCpcomextOrCreate();
        try{ $this->updateCpcomextFromRequest();}catch(Exception $ex){}
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
        if (count($grid)>0){
                $this->coderr = Presupuesto::validarPreComExt($this->cpcomext,$grid);
        }
        else $this->coderr=1342;

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
    if ($clasemodelo->getId()) {
      $w= new Criteria();
      $w->add(CpcomextPeer::REFCOMEXT,$clasemodelo->getRefcomext());
      $trajo=CpcomextPeer::doSelectOne($w);
      if ($trajo)
      {
          $trajo->setDescom($clasemodelo->getDescom());
          $trajo->save();
      }
    }        
    else
        Presupuesto::SalvarCompromisoExtranjeros($clasemodelo,$grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    $tiecau=H::getX_vacio('REFERE','Cpimpcau','REFCAU',$clasemodelo->getRefcom());
    if ($tiecau=='' || $tiecau!='N') {
     H::EliminarRegistro('Cpimpcom', 'Refcom', $clasemodelo->getRefcom());
     H::EliminarRegistro('Cpcompro', 'Refcom', $clasemodelo->getRefcom());
     
     H::EliminarRegistro('Cpimpcomext', 'Refcomext', $clasemodelo->getRefcomext());
     $clasemodelo->delete();
   }else {
    return 1369;
   }      
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
    $valmon = H::toFloat($this->getRequestParameter('cpcomext_valmon',''),6);
    $feccom = $this->getRequestParameter('cpcomext_feccom','');
    $dateFormat = new sfDateFormat('es_VE');
    $fec2 = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));
    $javascript="";  $jsonextra="";

    switch ($col) {
          case '1':
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                  $t= new Criteria();
                  $t->add(CpasiiniPeer::PERPRE,'00');
                  $t->add(CpasiiniPeer::CODPRE,$grid[$fila][$col-1]);
                  $reg= CpasiiniPeer::doSelectOne($t);
                  if (!$reg)
                  {
                      $grid[$fila][$col-1]="";
                      $javascript="alert('El Código Presupuestario no existe');";
                  }                  
              }else {
                  
                 $grid[$fila][$col-1]="";
                 $javascript="alert('El Código Presupuestario esta repetido');";
              }           
       
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;
          case '2':    
              $monimp=H::toFloat($grid[$fila][$col-1])*$valmon;
              $codpre=H::getCodPreDis($grid[$fila][$col-2]);
              if($monimp>0){
                $mondis = H::Monto_disponible($codpre,$fec2);
                if($mondis<$monimp){
                   $grid[$fila][$col-1]="0,00";
                   $javascript="alert('El Código Presupuestario no tiene Disponibilidad.');";
                }                
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

public function executeAnular() {
    $this->refcomext=$this->getRequestParameter('refcomext');
    $feccom=$this->getRequestParameter('feccom');

    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));

    $c = new Criteria();
    $c->add(CpcomextPeer::REFCOMEXT,$this->refcomext);
    $c->add(CpcomextPeer::FECCOM,$fec);
    $this->cpcomext = CpcomextPeer::doSelectOne($c);
    $id = $this->cpcomext->getId();

      sfView::SUCCESS;
  }

  public function executeSalvaranu(){
    $refcomext=$this->getRequestParameter('refcomext');
    $feccom=$this->getRequestParameter('feccom');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');

    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

    $this->msj='';
    if (strtotime($fec) < strtotime($feccom)){
      $this->msj='La fecha de Anulación no puede ser menor a la del Compromiso';
    }else {
      Presupuesto::salvarAnuPrecomext($refcomext,H::getX_vacio('REFCOMEXT','Cpcomext','REFCOM',$refcomext),$fecanu,$desanu);
    }
    sfView::SUCCESS;  
  }

}
