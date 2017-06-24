<?php

/**
 * facarord actions.
 *
 * @package    siga
 * @subpackage facarord
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facarordActions extends autofacarordActions
{
    private $fam="";

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    if($this->facarord->Cerrada()) $this->setFlash('warning','Carta Orden Consumida en su Totalidad');
      $this->configGrid();      
      if ($this->facarord->getId())
      {
         $eti="";
         $c1 = new Criteria();
         $c1->add(FadetcarPeer::NUMCAR, $this->facarord->getNumcar());
         $reg = FadetcarPeer::doSelect($c1);
         if ($reg)
         {   $r=0;
             foreach ($reg as $objr)
             {
                 if ($r==0)
                    $eti=$objr->getCodart();
                 else
                     $eti=$eti."_".$objr->getCodart();
                 $r++;
             }
         }
         $this->facarord->setFamart($eti);
      }
      $fadefcaj = FadefcarordPeer::doSelectOne(new Criteria());
      $this->params['fadefcaj'] = $fadefcaj;

  }

  public function configGrid()
  {
      $this->configGridDet($this->facarord->getNumcar());
      //if (!$this->facarord->getId())
          $this->configGridDetPed();
      //else
          if ($this->facarord->getId())
            $this->configGridPed($this->facarord->getNumcar());
  }
  
  public function configGridDet($numcar='')
  {
    $c = new Criteria();
    $c->add(FadetcarPeer::NUMCAR, $numcar);
    $facdet = FadetcarPeer::doSelect($c);
     
    $reg= FadefcarordPeer::doSelectOne(new Criteria());
    if ($reg) {
        $mascara=$reg->getNivfam();
        $lonarti=  strlen($mascara);
    }else {
      $mascara="";
      $lonarti=0;
    }

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facarord/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detalle');
    
    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="' . chr(39) . $lonarti . chr(39) . '" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $mascara . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][0]->setCatalogo('caregart', 'sf_admin_edit_form', array('codart' => 1, 'desart' => 2), 'Caregart_Facarord', array ('param1' => $lonarti, 'val2'));
    if(isset($this->facarord)){
      if($this->facarord->getId()){
        $this->columnas[1][2]->setEsTotal(false);
        $this->columnas[1][2]->setHTML('readOnly=true');
      }
        
    }
     
                  
    $this->obj1 = $this->columnas[0]->getConfig($facdet);

    $this->facarord->setObj1($this->obj1); 
  }  
  
  public function configGridDetPed()
  {
    $c = new Criteria();
    $c->add(FaartpedPeer::NROPED, '');
    $facdetped = FaartpedPeer::doSelect($c);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facarord/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detped');

    $mascara=H::getMascaraArticulo();
    $lonarti=strlen($mascara);
    $params= array('param1' => $lonarti, 'param2' => "'+$('facarord_famart').value+'", 'param3' => "'+$('facarord_codtipcli').value+'", 'param4' => "'+$('facarord_codprg').value+'", 'param5' => "'+$('facarord_conpag').value+'");
    
    $this->columnas[1][1]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][1]->setCatalogo('caregart','sf_admin_edit_form',array('codart' => 2, 'desart' => 3),'Caregart_Facarord2',$params);
    //$this->columnas[1][5]->setHTML(' size="10" onBlur="ValidarMontoGridv2(this); Cantidad(this.id);"');
    $this->columnas[1][6]->setCombo(FaartpvpPeer::getPrecios());
    //$this->columnas[1][6]->setHTML('onChange="accionRemotaGrid(getUrlModulo()+\'ajaxgrid\',\'b\',\'grid\',\'0\',new Array(),this,\'\');"');
    //$this->columnas[1][7]->setHTML('size="10" readonly=true onBlur="ValidarMontoGridv2(this); Preciocaja(this.id);"');

    $this->obj2 = $this->columnas[0]->getConfig($facdetped);

    $this->facarord->setObj2($this->obj2); 
  }  
  
  public function configGridPed($numcar='')
  {
    $c = new Criteria();
    $c->add(FapedidoPeer::NUMCAR, $numcar);
    $facped = FapedidoPeer::doSelect($c);

    $this->obj3 = Herramientas :: getConfigGrid('grid_faped', $facped);

    $this->facarord->setObj3($this->obj3);    
  }  

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos= $this->getRequestParameter('cajtexmos','');
    $dato=""; $js=""; $sw=true;

    switch ($ajax){
      case '1':
          $t= new Criteria();
          $t->add(FaentcrePeer::CODENTCRE,$codigo);
          $reg= FaentcrePeer::doSelectOne($t);
          if ($reg)
          {
              $dato=$reg->getNomentcre();
          }else{
              $js="alert('La Entidad Crediticia no existe'); $('$cajtexmos').value=''; $('$cajtexmos').focus();";
          }
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
          $t= new Criteria();
          $t->add(FaclientePeer::RIFPRO,$codigo);
          $reg= FaclientePeer::doSelectOne($t);
          if ($reg)
          {
              $dato=$reg->getNompro();
              $dato1=$reg->getCodpro();
              $dato2=$reg->getDirpro();
              $dato3=$reg->getTelpro();
              $dato4=$reg->getFatipcteId();
          }else{
              $js="alert('La CI/RIF del Cliente no existe'); $('$cajtexmos').value=''; $('$cajtexmos').focus();";
              $dato1=""; $dato2=""; $dato3="";
          }
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["facarord_codpro","'.$dato1.'",""],["facarord_dirpro","'.$dato2.'",""],["facarord_telpro","'.$dato3.'",""],["facarord_codtipcli","'.$dato4.'",""],["javascript","'.$js.'",""]]';
        break;
      case '3':
          $t= new Criteria();
          $t->add(CaramartPeer::RAMART,$codigo);
          $reg= CaramartPeer::doSelectOne($t);
          if ($reg)
          {
              $dato=$reg->getNomram();
          }else{
              $js="alert('El Rubro no existe'); $('$cajtexmos').value=''; $('$cajtexmos').focus();";
          }
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;    
      case '4':
          $t= new Criteria();
          $t->add(FaclientePeer::CODPRO,$codigo);
          $reg= FaclientePeer::doSelectOne($t);
          if ($reg)
          {
              $dato=$reg->getNompro();
          }else{
              $js="alert('El Banco no existe'); $('$cajtexmos').value=''; $('$cajtexmos').focus();";
          }
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;     
      case '5':
        $sw=false;
        $this->ajaxs='5';
        $this->precios=array();
        $javascript = "";
        $precio=$this->getRequestParameter('precio');
        $fecemi=$this->getRequestParameter('fecha');
        $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($fecemi, 'i', $dateFormat->getInputPattern('d'));
        $codprg = $this->getRequestParameter('codprg');
        $codtipcli = $this->getRequestParameter('codtipcli');
        $conpag = $this->getRequestParameter('conpag');
        $this->precios=FalisprcPeer::getPreciosv2($codigo, $codprg, $codtipcli, $conpag);
        if (count($this->precios)==0)
        {
            $javascript="$('$precio').readOnly=false;";
        }
        $output = '[["javascript","' . $javascript . '",""]]';
       break;       
     case '6':
        $sw=false;
        $this->ajaxs='6';
         $this->facarord = $this->getFacarordOrCreate();
         $this->updateFacarordFromRequest();
        $this->codprg=$this->getRequestParameter('codprg','');
        $tipcteid=H::getX_vacio('RIFPRO', 'Facliente', 'Fatipcte_id', $this->getRequestParameter('cliente',''));
        $this->tipcte=$tipcteid; 
        $this->concre=$codigo;
        
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
      $this->facarord = $this->getFacarordOrCreate();
      try{ $this->updateFacarordFromRequest();}
      catch (Exception $ex){}
      $this->configGrid();
      
      if (H::toFloat($this->getRequestParameter('facarord[moncar]'))==0)
      {
      	$this->coderr=1167;
         return false;
      }
      
      $grid1=Herramientas::CargarDatosGridv2($this,$this->obj1);
      $grid2=Herramientas::CargarDatosGridv2($this,$this->obj2);
      $this->coderr=Facturacionv2::validarGridsCartaOrden($this->facarord,$grid1,$grid2,&$familia);
      $this->fam=$familia;
      
      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
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
    $this->facarord = $this->getFacarordOrCreate();
    $this->updateFacarordFromRequest();
	$this->updateError();
    $this->labels = $this->getLabels();
          $fadefcaj = FadefcarordPeer::doSelectOne(new Criteria());
      $this->params['fadefcaj'] = $fadefcaj;

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        if ($this->fam!="")
            $this->getRequest()->setError('',$err." ".$this->fam );
        else
            $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;
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
  }

  public function saving($clasemodelo)
  {
    $grid1 = Herramientas::CargarDatosGridv2($this,$this->obj1);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);     
    Facturacionv2::salvarCartaOrden($clasemodelo,$grid1,$grid2);
    return -1;
  }

  public function deleting($clasemodelo)
  {

    $c = new Criteria();
    $c->add(FapedidoPeer::NUMCAR,$clasemodelo->getNumcar());
    $fapedidos = FapedidoPeer::doSelect($c);
    foreach ($fapedidos as $pedidos) {
      $c= new Criteria();;
      $c->add(FaartfacPeer::CODREF,$pedidos->getNroped());
      $faartfac = FaartfacPeer::doSelectOne($c);
      if($faartfac) return 1179;
    }

    H::EliminarRegistro('Fadetcar', 'Numcar', $clasemodelo->getNumcar());
    $p= new Criteria();
    $p->add(FapedidoPeer::NUMCAR,$clasemodelo->getNumcar());
    $registr= FapedidoPeer::doSelect($p);
    if ($registr)
    {
        foreach ($registr as $obj)
        {
            H::EliminarRegistro('Faartped', 'Nroped', $obj->getNroped());
            H::EliminarRegistro('Fafecped', 'Nroped', $obj->getNroped());
            $obj->delete();
        }
    }
    $clasemodelo->delete();
    
    return -1;
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
    $fecha=$this->getRequestParameter('facarord_feccar', '');
    $codprg=$this->getRequestParameter('facarord_codprg', '');
    $codtipcli = $this->getRequestParameter('facarord_codtipcli','');
    $conpag=$this->getRequestParameter('facarord_conpag', '');
    $nuevo=$this->getRequestParameter('id', '');
    $id=$this->getRequestParameter('this[id]', '');
    $codalmusu=$this->getRequestParameter('facarord_codalmusu', '');
    $javascript="";  $jsonextra=""; $com="";

    switch ($name) {
         case ('a'):   //Grid Familia de Artículos
            switch ($col) {
                case ('1'):   //Código Artículo
                    if ($grid[$fila][$col-1]!="")
                    {
                        if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
                        {
                            $reg= FadefcarordPeer::doSelectOne(new Criteria());
                            $lonarti=0;
                            if ($reg) {
                                $mascara=$reg->getNivfam();
                                $lonarti=  strlen($mascara);
                            }
                            
                            if (strlen($grid[$fila][$col-1])==$lonarti) {
                                $cadena="";
                                $c= new Criteria();
                                $c->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
                                $reg= CaregartPeer::doSelectOne($c);
                                if ($reg)
                                {
                                    $grid[$fila][$col]=$reg->getDesart();
                                    Facturacion::armarCadenaFamArt($grid,&$cadena);                                    
                                    $javascript="$('facarord_famart').value=''; $('facarord_famart').value='$cadena';";
                                }else {
                                    $idfila=$name.'x_'.$fila.'_1';
                                    $javascript = "alert_('El Art&iacute;culo no existe'); $('$idfila').focus();";
                                    $grid[$fila][$col-1]="";
                                    $grid[$fila][$col]="";
                                } 
                            }else {
                                $idfila=$name.'x_'.$fila.'_1';
                                $javascript = "alert_('El Art&iacute;culo no cumple con el formato definido'); $('$idfila').focus();";
                                $grid[$fila][$col-1]="";
                                $grid[$fila][$col]="";
                            }
                        }else {
                            $idfila=$name.'x_'.$fila.'_1';
                            $grid[$fila][$col-1]="";
                            $grid[$fila][$col]="";                 
                            $javascript = "alert_('El Art&iacute;culo esta repetido'); $('$idfila').focus();";
                        }
                    }
                    $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
                    break;       
                default:
                    break;
                }
            break;   
          case ('b'):  //Grid Desglose de Artículos
              switch ($col) {
                case ('2'):   //Código Artículo
                    if ($grid[$fila][$col-1]!="")
                    {
                        if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
                        {
                            $lonarti=  strlen(H::getMascaraArticulo());                  
                            if (strlen($grid[$fila][$col-1])==$lonarti) {
                                $c= new Criteria();
                                $c->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
                                $reg= CaregartPeer::doSelectOne($c);
                                if ($reg)
                                {
                                    $grid[$fila][$col]=$reg->getDesart();
                                    $grid[$fila][$col+1]=$reg->getCodunimed();
                                    $grid[$fila][$col+2]=H::getX_vacio('CODUNIMED', 'Cadefunimed', 'Desunimed', $reg->getCodunimed());
                                    $porcrgo=0;
                                    $c1= new Criteria();
                                    $c1->add(FarecargPeer::TIPRGO,'P');
                                    $this->sql = "codrgo in (select codrgo from farecart where codart = '".$reg->getCodart()."')";
                                    $c1->add(FarecargPeer::CODRGO,$this->sql,Criteria :: CUSTOM);
                                    $reg2=FarecargPeer::doSelect($c1);
                                    if ($reg2){
                                        foreach ($reg2 as $sum)
                                        {
                                            $porcrgo += $sum->getMonrgo();
                                        }
                                    }
                                    $grid[$fila][11]=H::FormatoMonto($porcrgo);
                                    $divprecio=$name.'x_'.$fila.'_7';
                                    $divprecioe=$name.'x_'.$fila.'_8';
                                    $codart=$reg->getCodart();                                        
                                    $javascript="toAjaxUpdater('$divprecio',5,getUrlModuloAjax(),'$codart','','&fecha=".$fecha."&precio=".$divprecioe."&codprg=$codprg&codtipcli=$codtipcli&conpag=$conpag');";
                                }else {
                                    $idfila=$name.'x_'.$fila.'_2';
                                    $javascript = "alert_('El Art&iacute;culo no existe'); $('$idfila').focus();";
                                    $grid[$fila][$col-1]="";
                                    $grid[$fila][$col]="";
                                } 
                            }else {
                                $idfila=$name.'x_'.$fila.'_2';
                                $javascript = "alert_('El Art&iacute;culo no es de &uacute;ltimo nivel'); $('$idfila').focus();";
                                $grid[$fila][$col-1]="";
                                $grid[$fila][$col]="";
                            } 
                        }else {
                            $idfila=$name.'x_'.$fila.'_2';
                            $grid[$fila][$col-1]="";
                            $grid[$fila][$col]="";                 
                            $javascript = "alert_('El Art&iacute;culo esta repetido'); $('$idfila').focus();";
                        }
                    }
                    $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
                    break;    
                case ('4'):   //Código Unidad Medida
                    if ($grid[$fila][$col-1]!="")
                    {
                        $c= new Criteria();
                        $c->add(CadefunimedPeer::CODUNIMED,$grid[$fila][$col-1]);
                        $reg= CadefunimedPeer::doSelectOne($c);
                        if ($reg)
                        {
                            $grid[$fila][$col]=$reg->getDesunimed();
                        }else {
                            $idfila=$name.'x_'.$fila.'_4';
                            $javascript = "alert_('La Unidad de Medida no existe'); $('$idfila').focus();";
                            $grid[$fila][$col-1]="";
                            $grid[$fila][$col]="";
                        } 
                    }
                    $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
                    break;                      
                case ('6'):   //Cantidad Solicitada
                    if (H::toFloat($grid[$fila][$col-1])>0)
                    {
                      $codart = $grid[$fila][1];
                       $num1=H::toFloat($grid[$fila][$col-1]); //Cantidad
                       if(isset($grid[$fila][6])) $num2=H::toFloat($grid[$fila][6]); //Precio Combo
                       else $num2=H::toFloat($grid[$fila][7]); //Precio texto
                       $num3=H::toFloat($grid[$fila][11]);  //Porcentaje de Recargo
                       $num4=H::toFloat($grid[$fila][8]);  //Descuento
                       if($num1>0){
                         $exiact = CaregartPeer::getExistencia($codart,$codalmusu);
                         if($num1 > $exiact){
                           $grid[$fila][$col-1] = '0,0';
                           $num1=0.0;
                           $javascript = " alert('No hay existencia en el almacen $codalmusu para el artículo $codart (actual=$exiact)'); ";
                         }
                       }
                       $cal=0;
                       if($num3>0){
                        if(!isset($grid[$fila][0])) $cal=round(($num1*$num2)*($num3/100),2); 
                       }
                       if ($num2>0)
                       {
                          $grid[$fila][9]=H::FormatoMonto($cal);
                          $grid[$fila][10]=H::FormatoMonto($num1*$num2+$cal-$num4);
                       }else {
                           $precio=H::toFloat($grid[$fila][7]);  //Precio Texto
                           $grid[$fila][10]=H::FormatoMonto($num1*$precio+$cal-$num4);  //Total
                       }
                       $javascript .= "ValidarMontoGridv2($id,2); etiqueta_total();"; // calcular total del grid
                    }
                    $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
                    break;      
                case ('7'):   //Precio Combo
                    if (H::toFloat($grid[$fila][$col-1])>0)
                    {
                       $num1=H::toFloat($grid[$fila][5]); //Cantidad
                       if(isset($grid[$fila][6])) $num2=H::toFloat($grid[$fila][6]); //Precio Combo
                       else $num2=H::toFloat($grid[$fila][7]); //Precio texto
                       $num3=H::toFloat($grid[$fila][11]);  //Porcentaje de Recargo
                       $num4=H::toFloat($grid[$fila][8]);  //Descuento
                       $cal=0;
                       if($num3>0){
                        if(!isset($grid[$fila][0])) $cal=round(($num1*$num2)*($num3/100),2); 
                       }
                       if ($num2>0)
                       {
                          $grid[$fila][9]=H::FormatoMonto($cal);
                          $grid[$fila][10]=H::FormatoMonto($num1*$num2+$cal-$num4);
                       }else {
                           $precio=H::toFloat($grid[$fila][7]);  //Precio Texto
                           $grid[$fila][10]=H::FormatoMonto($num1*$precio+$cal-$num4);  //Total
                       }
                       $javascript = "ValidarMontoGridv2($id,2); etiqueta_total();"; // calcular total del grid
                    }
                    $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
                    break;  
                case ('8'):   //Precio Texto
                    if (H::toFloat($grid[$fila][$col-1])>0)
                    {
                       $num1=H::toFloat($grid[$fila][5]); //Cantidad
                       if(isset($grid[$fila][6])) $num2=H::toFloat($grid[$fila][6]); //Precio Combo
                       else $num2=H::toFloat($grid[$fila][7]); //Precio texto
                       $num3=H::toFloat($grid[$fila][11]);  //Porcentaje de Recargo
                       $num4=H::toFloat($grid[$fila][8]);  //Descuento
                       $cal=0;
                       if($num3>0){
                        if(!isset($grid[$fila][0])) $cal=round(($num1*$num2)*($num3/100),2); 
                       }
                       if ($num2>0)
                       {
                          $grid[$fila][9]=H::FormatoMonto($cal);
                          $grid[$fila][10]=H::FormatoMonto($num1*$num2+$cal-$num4);
                       }else {
                           $precio=H::toFloat($grid[$fila][7]);  //Precio Texto
                           $grid[$fila][10]=H::FormatoMonto($num1*$precio+$cal-$num4);  //Total
                       }
                       $javascript = "ValidarMontoGridv2($id,2); etiqueta_total();"; // calcular total del grid
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

  /**
   * Función para incluir funcionalidades adicionales en el executeList.
   * Esta funcion debe ser reescrita en la clase que hereda.
   *
   */
  protected function listing()
  {     
    $this->c = new Criteria();

    $almacenes = $this->getUser()->getAttribute('usualms',array());

    $arr_or = array();
    if(count($almacenes)>0){
      foreach($almacenes as $cod => $alm){
      $arr_or[] = FacarordPeer::CODALMUSU."='$cod'";
      }
      $this->c->addOr(FacarordPeer::CODALMUSU,'('.implode(' OR ', $arr_or).')',Criteria::CUSTOM);
    }else{
      $this->c->add(FacarordPeer::CODALMUSU,null);
      $this->getRequest()->setError('error','El usuario no tiene almacenes asociados');
    }
  }
  
}
