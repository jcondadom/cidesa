<?php

/**
 * almsolegrmul actions.
 *
 * @package    siga
 * @subpackage almsolegrmul
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almsolegrmulActions extends autoalmsolegrmulActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    if (!$this->casolart->getId()){
        $codmon=H::getX_vacio('CODEMP','Opdefemp','Codmon','001');
        $q= new Criteria();
        $q->add(TsdesmonPeer::CODMON,$codmon);
        $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
        $reg= TsdesmonPeer::doSelectOne($q);
        if ($reg)
        {
           $this->casolart->setTipmon($codmon);
           $this->casolart->setValmon($reg->getValmon());
        }     
    }
    $this->configGrid();     
  }

  public function configGrid()
  {
     $this->configGrid1();
     $this->configGrid2();
     $this->configGrid3();
  }

  public function configGrid1($unires='', $fec1='', $fec2='',$tipreq='',$tipmon='')
  {
    $c = new Criteria();
    $c->add(CasolartPeer::UNIRES, $unires);
    $c->add(CasolartPeer::TIPREQ, $tipreq);
    $c->add(CasolartPeer::TIPMON, $tipmon);
    $sql="casolart.reqart not in (select refsol from cacotiza)";
    if ($fec1!='' && $fec2!='')
      $sql.="and (casolart.fecreq>='".$fec1."' and casolart.fecreq<='".$fec2."')";
    $c->add(CasolartPeer::REQART,$sql,Criteria::CUSTOM);
    $gma = CasolartPeer::doSelect($c);  

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almsolegrmul/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_sol');

    $this->obj1 = $this->columnas[0]->getConfig($gma);

    $this->casolart->setGrid($this->obj1);
  }  

  public function configGrid2($reqart='')
  {
    $c = new Criteria();
    $c->add(CaartsolPeer::REQART, $reqart);
    $gdetp = CaartsolPeer::doSelect($c);  

    $this->fildet=count($gdetp);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almsolegrmul/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detsol');

    $this->obj2 = $this->columnas[0]->getConfig($gdetp);

    $this->casolart->setGrid2($this->obj2);
  }

  public function configGrid3($arreglo=array(), $reqart='')
  {
    if (count($arreglo)>0)
    {
      foreach ($arreglo as $art) {
        $caartsol_new= new Caartsol();
        $caartsol_new->setCodart($art[0]);
        $caartsol_new->setDesart($art[1]);
        $caartsol_new->setCanart($art[2]);
        $caartsol_new->setFecent($art[3]);
        $gdet[]=$caartsol_new;
      }
    }else {
      $c = new Criteria();
      $c->add(CaartsolPeer::REQART, $reqart);
      $gdet = CaartsolPeer::doSelect($c);
    }

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almsolegrmul/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_artfin');

    $this->obj = $this->columnas[0]->getConfig($gdet);

    $this->casolart->setGrid3($this->obj);
    
  }    

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js=""; $sw=true;

    switch ($ajax){
      case '1':
        $q= new Criteria();
        $q->add(NpcatprePeer::CODCAT,$codigo);
        $regq= NpcatprePeer::doSelectOne($q);
        if ($regq){
          $dato=$regq->getNomcat();
        }else {
          $js="alert('La Unidad Solicitante no existe'); $('casolart_unires').value=''; $('casolart_nomcat').value=''; $('casolart_unires').focus();";
        }
        $output = '[["javascript","'.$js.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
        break;
      case '2':
        $q= new Criteria();
        $q->add(FortipfinPeer::CODFIN,$codigo);
        $regq= FortipfinPeer::doSelectOne($q);
        if ($regq){
          $dato=$regq->getNomext();
        }else {
          $js="alert('El Tipo de Financiamiento no existe'); $('casolart_tipfin').value=''; $('casolart_tipfin').value=''; $('casolart_tipfin').focus();";
        }
        $output = '[["javascript","'.$js.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
        break;
      case '3':
          $sw=false;
          $this->ajax='1';
          if ($cajtexmos=='casolart_fechas')
          {
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

                if ($this->getRequestParameter('fecha')!="") {
                  $dateFormat = new sfDateFormat('es_VE');
                  $fec2 = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
                  
                  if ($fec1>$fec2)
                  {
                      $js="alert('La fechas Desde no puede ser mayor la Fecha Hasta'); $('casolart_fecdes').value=''; $('casolart_fecdes').focus();";
                      $this->params=array();
                      $this->labels = $this->getLabels();
                      $this->casolart = $this->getCasolartOrCreate();
                      $this->configGrid1();
                  }else {
                      $unires=$this->getRequestParameter('unires');
                      $tipreq=$this->getRequestParameter('tipreq');
                      $tipmon=$this->getRequestParameter('tipmon');
                      $this->params=array();
                      $this->labels = $this->getLabels();
                      $this->casolart = $this->getCasolartOrCreate();
                      $this->configGrid1($unires,$fec1, $fec2,$tipreq,$tipmon);
                  }
                }else { $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->casolart = $this->getCasolartOrCreate();
                    $this->configGrid1();
                  }
          }else {
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

                $dateFormat = new sfDateFormat('es_VE');
                $fec2 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
                
                if ($fec1>$fec2)
                {
                    $js="alert('La fechas Desde no puede ser mayor la Fecha Hasta'); $('casolart_fechas').value=''; $('casolart_fechas').focus();";
                     $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->casolart = $this->getCasolartOrCreate();
                    $this->configGrid1();
                }else {
                    $unires=$this->getRequestParameter('unires');
                    $tipreq=$this->getRequestParameter('tipreq');
                    $tipmon=$this->getRequestParameter('tipmon');
                    $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->casolart = $this->getCasolartOrCreate();
                    $this->configGrid1($unires,$fec1, $fec2,$tipreq,$tipmon);
                }
          }
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '4':
        $numreq=$this->getRequestParameter('numreq');
        $datart=$this->getRequestParameter('datart');
        $sw=false;
        $this->ajax='2';
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->casolart = $this->getCasolartOrCreate();
        $this->configGrid2($numreq);
        $fildet=$this->fildet;
        $js="$('divgrid2').show();";
        $output = '[["javascript","'.$js.'",""],["casolart_filtotdet","'.$fildet.'",""],["","",""]]';
        break;
      default: //Generar Detalle
        $sw=false;
        $this->ajax='3';        
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->casolart = $this->getCasolartOrCreate();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
        
        SolicituddeEgresos::generarDetalleSoli($grid, $arreglodet);


        $this->configGrid3($arreglodet);

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
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);


  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
