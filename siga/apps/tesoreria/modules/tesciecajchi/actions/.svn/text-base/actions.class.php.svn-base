<?php

/**
 * tesciecajchi actions.
 *
 * @package    siga
 * @subpackage tesciecajchi
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesciecajchiActions extends autotesciecajchiActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->setVars();
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridSalida();
    $this->configGridDetalle($this->opciecaj->getNumref());
  }

 /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridSalida($fechades='', $fechahas='', $codcaj='')
  {
    if ($fechades=='')  $fechades=date('Y-m-d');
    if ($fechahas=='') $fechahas=date('Y-m-d');

    $sql="tssalcaj.fecsal>=to_date('".$fechades."','yyyy-mm-dd')  and tssalcaj.fecsal<= to_date('".$fechahas."','yyyy-mm-dd')";

    $a= new Criteria();
    $a->add(TssalcajPeer::FECSAL,$sql,Criteria::CUSTOM);
    $a->add(TssalcajPeer::STASAL,'P');
    $a->add(TssalcajPeer::CODCAJ,$codcaj);
    $det= TssalcajPeer::doSelect($a);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesciecajchi/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_sal');
    
    $this->columnas[1][0]->setHTML('onClick="guardarseleccioncie()"');
    $this->obj2 =$this->columnas[0]->getConfig($det);

    $this->opciecaj->setObj2($this->obj2);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDetalle($numref='',$arreglo=array())
  {
    if ($numref=='')
    {      
      $detalle=$arreglo;
    }
    else
    {
      $c = new Criteria();
      $c->add(OpdetciecajPeer::NUMREF,$numref);
      $detalle = OpdetciecajPeer::doSelect($c);
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesciecajchi/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
   
    $this->obj1 =$this->columnas[0]->getConfig($detalle);

    $this->opciecaj->setObj1($this->obj1);
  }  

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $ajax = $this->getRequestParameter('ajax','');
    $javascript="";
    switch ($ajax){
      case '1':
        $javascript="";
        $this->entrada='1';
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->opciecaj = $this->getOpciecajOrCreate();
        $this->setVars();
        $arre=Tesoreria::FormarArreImp2($codigo);
        $this->configGridDetalle('',$arre);     
        $output = '[["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '2':
        $c= new Criteria();
        $c->add(BnubicaPeer::CODUBI,$codigo);
        $resul= BnubicaPeer::doSelectOne($c);
        if ($resul)
        {
          $dato=$resul->getDesubi();
        }else {
          $dato=""; $javascript="alert_('El C&oacute;digo de la Unidad Origen no existe'); $('$cajtexcom').value='';";
        }
        $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '3':
          $c= new Criteria();
          $c->add(FortipfinPeer::CODFIN,$codigo);
          $resul= FortipfinPeer::doSelectOne($c);
          if ($resul)
          {
            $dato=$resul->getNomext();
          }else {
            $dato=""; $javascript="alert_('El C&oacute;digo de Financiamiento no existe'); $('opordpag_codfin').value=''; $('opordpag_nomext').value=''; $('opordpag_codfin').focus();";
          }
          $output = '[["javascript","'.$javascript.'",""],["opordpag_nomext2","'.$dato.'",""],["","",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
          break;
      case '5':
        $this->entrada='2';
        $javascript="";
        $arredes=split('/',$this->getRequestParameter('fecdes'));
        $arrehas=split('/',$codigo);
        $fechades=$arredes[2]."-".$arredes[1]."-".$arredes[0];
        $fechahas=$arrehas[2]."-".$arrehas[1]."-".$arrehas[0];

        $this->params=array();
        $this->labels = $this->getLabels();
        $this->opciecaj = $this->getOpciecajOrCreate();
        $this->setVars();        
        $this->configGridSalida($fechades,$fechahas,$this->getRequestParameter('codcajchi'));
        $output = '[["","",""]]';        
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
    }
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
    $this->codigo =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
     $this->opciecaj = $this->getOpciecajOrCreate();
      try{ $this->updateOpordpagFromRequest();}
      catch (Exception $ex){}
      $this->setVars();

      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('opciecaj[feccie]'))==true)
      {
        $this->coderr=529;
        return false;
      }
      $this->configGrid();
      $grid=Herramientas::CargarDatosGridv2($this,$this->obj1,true);
      $x=$grid[0];
      $i=0;
      if (count($x)==0)
      {
        $this->coderr=528;
        return false;
      }
      $perhas=explode('/', $this->getRequestParameter('opciecaj[feccie]'));
      if (!Tesoreria::validarDisponibilidadPresuCajChi2($grid,1,$cod,$perhas[1]))
      {
        $this->codigo=$cod;
        $this->coderr=118;
        return false;
      }

      $ciegenpag=H::getConfApp2('ciegenpag', 'tesoreria', 'tesciecajchi');
      if ($ciegenpag=='S' && $this->getRequestParameter('id')=="") {
        if (self::validarGeneraComprobante())
        {
          $this->coderr=508;
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj1,true);
  }

  public function setVars()
  {
    $mascaraubi=Herramientas::ObtenerFormato('Opdefemp','Forubi');
    $this->opciecaj->setMascaraubi($mascaraubi);
    $this->opciecaj->setLonubi(strlen($mascaraubi));
  }

  public function saving($clasemodelo)
  {
    if ($clasemodelo->getId())
    {
      $clasemodelo->save();
    }else {
      $ciegenpag=H::getConfApp2('ciegenpag', 'tesoreria', 'tesciecajchi');
      if ($ciegenpag=='S'){
        $form="sf_admin/tesciecajchi/confincomgen";
        $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
        $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'0');
        if ($grabo=='S')
        {
          $i=0;
          $concom=$this->getRequestParameter('opciecaj[totalcomprobantes]');
          while ($i<$concom)
          {
           $formulario[$i]=$form.$i;
           if ($this->getUser()->getAttribute('grabo',null,$formulario[$i])=='S')
           {
            $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formulario[$i]);
            $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formulario[$i]);
            $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formulario[$i]);
            $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formulario[$i]);
            $debito=$this->getUser()->getAttribute('debito',null,$formulario[$i]);
            $credito=$this->getUser()->getAttribute('credito',null,$formulario[$i]);
            $grid=$this->getUser()->getAttribute('grid',null,$formulario[$i]);

            $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formulario[$i]);
            $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formulario[$i]);
            $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formulario[$i]);
            $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formulario[$i]);
            $this->getUser()->getAttributeHolder()->remove('debito',$formulario[$i]);
            $this->getUser()->getAttributeHolder()->remove('credito',$formulario[$i]);
            $this->getUser()->getAttributeHolder()->remove('grid',$formulario[$i]);
            
            $numerocomp = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]));
            $clasemodelo->setNumcom($numerocomp);
           }
           $i++;
          }
        }
        $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');
      }
      $grid=Herramientas::CargarDatosGridv2($this,$this->obj1,true);
      $grid1=Herramientas::CargarDatosGridv2($this,$this->obj2);
      Tesoreria::salvarCierreCajaChica($clasemodelo,$grid,$grid1);
    }
    return -1;
  }

  public function deleting($clasemodelo)
  {
    if ($clasemodelo->getRefcom()!='') {
      $c= new Criteria();
      $c->add(OpdetordPeer::REFCOM,$clasemodelo->getRefcom());
      $opdetord= OpdetordPeer::doSelectOne($c);
      if (!$opdetord)
      {
       // Actualizar salidas de Caja Chica
       $t= new Criteria();
       $t->add(OpdetciecajPeer::NUMREF,$clasemodelo->getNumref());
       $datos=OpdetciecajPeer::doSelect($t);
       if ($datos)
       {
           foreach ($datos as $objdat)
           {
               $cadenarefe=split(',',$objdat->getRefsal());
                $r=0;
                while ($r<(count($cadenarefe)))
                {
                    $aux=$cadenarefe[$r];
                    $a= new Criteria();
                    $a->add(TssalcajPeer::REFSAL,$aux);
                    $data= TssalcajPeer::doSelectOne($a);
                    if ($data)
                    {
                       $data->setStasal('P');
                       $data->save();
                    }

                  $r++;
                }
                if ($r==0)
                {
                   $a= new Criteria();
                   $a->add(TssalcajPeer::REFSAL,$objdat->getRefsal());
                   $data= TssalcajPeer::doSelectOne($a);
                   if ($data)
                   {
                       $data->setStasal('P');
                       $data->save();
                   }
                }
           }
       }
      Herramientas::EliminarRegistro('Opdetciecaj','Numref',$clasemodelo->getNumref());
      Herramientas::EliminarRegistro('Cpimpcom','Refcom',$clasemodelo->getRefcom());
      Herramientas::EliminarRegistro('Cpcompro','Refcom',$clasemodelo->getRefcom());    
      $clasemodelo->delete();
     }else { return 1388;}
   }else {
      // Actualizar salidas de Caja Chica
       $t= new Criteria();
       $t->add(OpdetciecajPeer::NUMREF,$clasemodelo->getNumref());
       $datos=OpdetciecajPeer::doSelect($t);
       if ($datos)
       {
           foreach ($datos as $objdat)
           {
               $cadenarefe=split(',',$objdat->getRefsal());
                $r=0;
                while ($r<(count($cadenarefe)))
                {
                    $aux=$cadenarefe[$r];
                    $a= new Criteria();
                    $a->add(TssalcajPeer::REFSAL,$aux);
                    $data= TssalcajPeer::doSelectOne($a);
                    if ($data)
                    {
                       $data->setStasal('P');
                       $data->save();
                    }

                  $r++;
                }
                if ($r==0)
                {
                   $a= new Criteria();
                   $a->add(TssalcajPeer::REFSAL,$objdat->getRefsal());
                   $data= TssalcajPeer::doSelectOne($a);
                   if ($data)
                   {
                       $data->setStasal('P');
                       $data->save();
                   }
                }
           }
       }
      Herramientas::EliminarRegistro('Opdetciecaj','Numref',$clasemodelo->getNumref());
      Herramientas::EliminarRegistro('Cpimppag','Refpag',$clasemodelo->getRefpag());
      Herramientas::EliminarRegistro('Cppagos','Refpag',$clasemodelo->getRefpag());    
      Herramientas::EliminarRegistro('Contabc1','Numcom',$clasemodelo->getNumcom());
      Herramientas::EliminarRegistro('Contabc','Numcom',$clasemodelo->getNumcom());
      $monape=H::getX_vacio('CODCAJ','Tsdefcajchi','Monape',$clasemodelo->getCodcajchi());
      if (H::toFloat($clasemodelo->getMoncie())>H::toFloat($monape)){
        Herramientas::EliminarRegistro('Opordpag','Numcom',$clasemodelo->getNumcom());    
      }
      $clasemodelo->delete();
   }
    
    return -1;
  }
/**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   *
   */
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->opciecaj = $this->getOpciecajOrCreate();
    $this->updateOpciecajFromRequest();
    $this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        if ($this->coderr==118)
        $this->getRequest()->setError('',$err.' '.$this->codigo);
        else $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;
  }

   /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
     $this->opciecaj = $this->getOpciecajOrCreate();
     $this->updateOpciecajFromRequest();
     $concom=0;
     $msjuno="";
     $msjtres="";
     $comprobante="";
     $this->msjuno="";
     $this->msjtres="";
     $this->i="";
     $this->formulario=array();
     $this->setVars();
     $this->configGridDetalle($this->opciecaj->getNumref());
     $detalle=Herramientas::CargarDatosGridv2($this,$this->obj1,true);
     $c = new Criteria();
     $c->add(TsdefcajchiPeer::CODCAJ,$this->opciecaj->getCodcajchi());
     $reg= TsdefcajchiPeer::doSelectOne($c);
     if ($reg)
     {
      $this->opciecaj->setCedrif($reg->getCedrif());
      $this->opciecaj->setTippag($reg->getTippag());
      $this->opciecaj->setSujren($reg->getSujren());
      $this->opciecaj->setMonape($reg->getMonape());
      $this->opciecaj->setCtapag($reg->getCtapag());
     }

     if ($this->opciecaj->getCtapag()=="" || count($detalle[0])==0)
     {
       $msjtres="No se puede Generar el Comprobante, Verique si introdujo la Cuenta Pasivo(Beneficiario) de Caja Chica ó las Imputaciones Presupuestarias, para luego generar el comprobante";
     }

     if ($msjtres=="")
     {
      $x=Tesoreria::grabarComprobanteCierre($this->opciecaj,$detalle,$msjuno,$comprobante);
      $concom=$concom + 1;

      if ($msjuno=="")
      {
        $form="sf_admin/tesciecajchi/confincomgen";
        $i=0;
        while ($i<$concom)
        {
         $f[$i]=$form.$i;
         $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
         $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
         $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
         $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
         $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
         $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
         $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
         $this->getUser()->setAttribute('tipmov', '');
         $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
         $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
         $i++;
        }
        $this->i=$concom-1;
        $this->formulario=$f;
        }else
        {
          $this->msjuno=$msjuno;
        }
     }
     else
     {
        $this->msjtres=$msjtres;
     }
      $output = '[["opciecaj_totalcomprobantes","'.$concom.'",""],["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }


 public function validarGeneraComprobante()
  {
    $form="sf_admin/tesciecajchi/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
    if ($grabo=='')
    { return true;}
    else { return false;}
  }
}
