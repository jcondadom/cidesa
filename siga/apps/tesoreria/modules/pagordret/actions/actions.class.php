<?php

/**
 * pagordret actions.
 *
 * @package    siga
 * @subpackage pagordret
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class pagordretActions extends autopagordretActions
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/opordpag/filters');
    
    $k= new Criteria();
    $k->add(OpdefempPeer::CODEMP,'001');
    $regk= OpdefempPeer::doSelectOne($k);
    if ($regk){
      $ordpagnom=$regk->getOrdnom();
      $ordpagapo=$regk->getOrdobr();
      $ordpagliq=$regk->getOrdliq();
      $ordpagfid=$regk->getOrdfid();
      $ordpagval=$regk->getOrdval();
      $ordpagret=$regk->getOrdret();
    }

     // 15    // pager
    $this->pager = new sfPropelPager('Opordpag', 15);
    $c = new Criteria();
    //$c->add(OpordpagPeer::MONRET,0);
    $c->add(OpordpagPeer::STATUS,'N');
    $sql="(opordpag.tipcau!='".$ordpagnom."' and opordpag.tipcau!='".$ordpagapo."' and opordpag.tipcau!='".$ordpagliq."' and opordpag.tipcau!='".$ordpagfid."' and opordpag.tipcau!='".$ordpagval."' and opordpag.tipcau!='".$ordpagret."') and ((opordpag.APROBADOORD<>'A' and opordpag.APROBADOORD<>'R') or opordpag.APROBADOORD isnull)";
    $c->add(OpordpagPeer::TIPCAU,$sql,Criteria::CUSTOM);
    $c->addJoin(OpordpagPeer::TIPCAU,CpdoccauPeer::TIPCAU);
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

  public function configGrid(){
    $this->configGridImputaciones($this->opordpag->getNumord());
    $this->configGridRet($this->opordpag->getNumord());
    $this->configGridFac($this->opordpag->getNumord());
  }

  public function configGridImputaciones($numord='')
  {
   $c= new Criteria();
   $c->add(OpdetordPeer::NUMORD,$numord);
   $c->addAscendingOrderByColumn(OpdetordPeer::CODPRE);
   $det= OpdetordPeer::doSelect($c);

   if ($det){
      $acumiva=0;
      $acumsin=0;
      foreach ($det as $objdet) {
        if ($objdet->getRetiva()=='S')
         $acumiva+=$objdet->getMoncau();
        else
          $acumsin+=$objdet->getMoncau();
      }
      $this->opordpag->setMonparsin(H::FormatoMonto($acumsin));
      $this->opordpag->setMonpariva(H::FormatoMonto($acumiva));
   }
     

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/pagordret/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_imputaciones');
  
   $this->obj =$this->columnas[0]->getConfig($det);

   $this->opordpag->setObjeto($this->obj);    
   
  }

  public function configGridRet($numord='')
  {
     $c= new Criteria();
     $c->add(OpretordPeer::NUMORD,$numord);
     $det= OpretordPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/pagordret/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ret');
     
     $numfilret=H::getConfApp2('numfilret', 'tesoreria', 'pagemiord');
     if ($numfilret!="") 
       $this->columnas[0]->setFilas($numfilret);
     else 
       $this->columnas[0]->setFilas(35);

     $params= array('param1' => "'+$('opordpag_cedrif').value+'", 'val2');
     $objs= array('codtip' => 1,'destip' => 2,'codcon' => 3,'basimp' => 4, 'porret' => 5,'factor' => 6,'porsus' => 7,'unitri' => 8,'esta' => 9,'estaislr' => 12,'esta1xmil' => 13,'montoiva' => 14);
     $this->columnas[1][0]->setCatalogo('optipret','sf_admin_edit_form',$objs,'Optipret_Pagemiret',$params);

     $this->obj2 =$this->columnas[0]->getConfig($det);

     $this->opordpag->setObjret($this->obj2);   
    
  }  

  public function configGridFac($numord='')
  {
     $c= new Criteria();
     $c->add(OpfacturPeer::NUMORD,$numord);
     $det= OpfacturPeer::doSelect($c);
     if ($det){
       foreach ($det as $objdet) {
         if ($objdet->getTiptra()=='02')
           $objdet->setNotdeb($objdet->getNumfac());
         else if ($objdet->getTiptra()=='03'){
           $objdet->setNotcrd($objdet->getNumfac());
           $objdet->setTotfac($objdet->getTotfac()*-1);
         }
         if ($objdet->getBasltf()!=0) //L.T.F
           $objdet->setUnocien(1);
         else
           $objdet->setUnocien(0);

         if ($objdet->getBasislr()!=0) //I.S.L.R
           $objdet->setImpusob(1);
         else
           $objdet->setImpusob(0);

         if ($objdet->getBasirs()!=0) //I.R.S
           $objdet->setImprs(1);
         else
           $objdet->setImprs(0);

         if ($objdet->getBasimn()!=0) //Impuesto Municipal
           $objdet->setImpmn(1);
         else
           $objdet->setImpmn(0);       
     }  
   }

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/pagordret/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_fac');
     
     $this->columnas[0]->setEliminar(true,'TotalFacturas()');

     $this->columnas[1][7]->setCombo(OptipretPeer::CombosIva()); //Combo Iva
     $this->columnas[1][19]->setCombo(OptipretPeer::CombosRet()); //Combo Islr
     $this->columnas[1][26]->setCombo(OptipretPeer::CombosRet()); //Combo Irs
     $this->columnas[1][32]->setCombo(OptipretPeer::CombosRet()); //Combo Imn
     //$this->columnas[1][15]->setHTML('onChange=BuscarCosuni(this.id);');

     $this->obj3 =$this->columnas[0]->getConfig($det);

     $this->opordpag->setObjfac($this->obj3);   
    
  }  

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');  
    $ajax = $this->getRequestParameter('ajax','');
    $javascript=$dato="";
    $sw=true;
    switch ($ajax){
      case '1': //Combo Iva
        $this->ajaxs = '1';
        $sw=false;
        $this->comboiva = array();
        $javascript = "";
        $this->comboiva = OrdendePago::BuscarIva($this->getRequestParameter('retenciones'),$this->getRequestParameter('referencias2'));
        
        $output = '[["javascript","' . $javascript . '",""]]';
        break;
      case '2': //Combo Islr
        $this->ajaxs = '2';
        $sw=false;
        $this->comboislr = array();
        $javascript = "";
        $this->comboislr = OrdendePago::BuscarCombos($this->getRequestParameter('retenciones'),'ISLR');
        
        $output = '[["javascript","' . $javascript . '",""]]';
        break;
      case '3': //Combo Irs
        $this->ajaxs = '3';
        $sw=false;
        $this->comboirs = array();
        $javascript = "";
        $this->comboirs = OrdendePago::BuscarCombos($this->getRequestParameter('retenciones'),'IRS');
        
        $output = '[["javascript","' . $javascript . '",""]]';
        break;
      case '4': //Combo Imn
        $this->ajaxs = '4';
        $sw=false;
        $this->comboimn = array();
        $javascript = "";
        $this->comboimn = OrdendePago::BuscarCombos($this->getRequestParameter('retenciones'),'IMN');
        
        $output = '[["javascript","' . $javascript . '",""]]';
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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
    //if (count($grid3)==0 && count($grid2)>0)
      OrdendePago::SalvarRetencionesOP($clasemodelo,$grid,$grid2);
    if (count($grid2)>0)
      OrdendePago::SalvarFacturasOP($clasemodelo,$grid3);
    return -1;
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
    $cedrif=$this->getRequestParameter('opordpag_cedrif', '');
    $referencias=$this->getRequestParameter('opordpag_comaso', '');
    $retenapli=$this->getRequestParameter('opordpag_retenapli', '');
    $afepre=$this->getRequestParameter('opordpag_afectapresup', '');
    $modbasimpiva=$this->getRequestParameter('opordpag_modbasimpiva', '');
    $valmon=H::toFloat($this->getRequestParameter('opordpag_valmon', '0'),6);
    $monord=H::toFloat($this->getRequestParameter('opordpag_monord', '0'));
    $montorete=H::toFloat($this->getRequestParameter('opordpag_monret', '0'));
    $neto=H::toFloat($this->getRequestParameter('opordpag_neto', '0'));
    $unitri=H::toFloat($this->getRequestParameter('opordpag_unidad', '0'));
    $totmar=H::toFloat($this->getRequestParameter('opordpag_totmarcadas', '0'));
    $monparsin=H::toFloat($this->getRequestParameter('opordpag_monparsin', '0'));
    $monpariva=H::toFloat($this->getRequestParameter('opordpag_monpariva', '0'));
    $javascript="";  $jsonextra="";
      switch ($name) {
         case ('a'):   //grid Imputaciones
            switch ($col) {
             case ('1'):   //Marcar
                if ($grid[$fila][$col+4]=='N') {
                  if ($grid[$fila][$col-1]=="1")
                  {
                    $montot= H::FormatoMonto($totmar+H::toFloat($grid[$fila][$col+1]));
                    $javascript = "$('opordpag_totmarcadas').value='$montot'";                   
                  }else {
                    $montot= H::FormatoMonto($totmar-H::toFloat($grid[$fila][$col+1]));
                    $javascript = "$('opordpag_totmarcadas').value='$montot'";
                  }                  
                }
               $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;    
              default:
                break;
            }
          break;  
        case ('b'):   //grid Retenciones 
            switch ($col) {
             case '1':
                $filretpro=H::getConfApp2('filretpro', 'tesoreria', 'pagemiord');
                $limbaseret=H::getConfApp2('limbaseret', 'tesoreria', 'pagtipret');
                $ranminmax=H::getConfApp2('ranminmax', 'tesoreria', 'pagemiord');                
                if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
                {
                  $c= new Criteria();
                  if ($filretpro=='S'){
                    $sql="optipret.codtip='".$grid[$fila][$col-1]."' and optipret.codtip in (select codret from caproret where codpro='".$cedrif."')";
                    $c->add(OptipretPeer::CODTIP,$sql,Criteria::CUSTOM);
                  }else
                  $c->add(OptipretPeer::CODTIP,$grid[$fila][$col-1]);
                  $reg= OptipretPeer::doSelectOne($c);
                  if ($reg) {
                    $l = new Criteria();
                    $l->add(OpdefempPeer::CODEMP,'001');
                    $regl=OpdefempPeer::doSelectOne($l);
                    if ($regl)
                      $unitributaria=$regl->getUnitri();
                    else
                      $unitributaria=0;

                    //Calculo de la Base para el Calculo
                    if ($afepre=='S'){
                      if ($reg->getEsta()!='N'){ //La Retención es de IVA
                        $bascal=$monpariva*$reg->getBasimp()/100;
                        $forbascal=$monpariva*$valmon;
                      }else {
                        if ($totmar>0){
                          $bascal=$totmar*$reg->getBasimp()/100;
                          $forbascal=$totmar*$valmon;
                        }else {
                           $bascal=$monparsin*$reg->getBasimp()/100;
                           $forbascal=$monparsin*$valmon;
                        }
                      }
                    }else {
                      $bascal=$neto*$reg->getBasimp()/100;
                      $forbascal=$neto*$valmon;                      
                    }         
                    if ($limbaseret=='S'){   
                      $monmin=$reg->getMbasmi()*$unitributaria;                     
                      $monmax=$reg->getMbasma()*$unitributaria;                     
                      if ($ranminmax=='S') {
                        if ($forbascal>=$monmin && $forbascal<=$monmax)
                           $grid[$fila][$col+8]=H::FormatoMonto($bascal);
                        else
                          $javascript="alert('El Monto Base para el Calculo no es el mínimo requerido para esta retención.');";
                      }else {
                        if ($forbascal>=$monmin)
                           $grid[$fila][$col+8]=H::FormatoMonto($bascal);
                         else
                          $javascript="alert('El Monto Base para el Calculo no es el mínimo requerido para esta retención.');";
                      }
                    }else {
                      $grid[$fila][$col+8]=H::FormatoMonto($bascal);
                    }

                    //Calculo del Monto de Retención
                    if ($javascript==""){
                      if ($reg->getPorret()!=0){
                        $monret=$bascal*($reg->getPorret()/100);
                        $grid[$fila][$col+9]=H::FormatoMonto($monret);
                      }else {
                        $sustraendo=($reg->getPorsus()/100)*$reg->getUnitri()*$reg->getFactor();
                        $retencion=$bascal*($reg->getPorsus()/100);
                        if ($retencion>$sustraendo){
                          $monret=$retencion-$sustraendo;
                          $grid[$fila][$col+9]=H::FormatoMonto($monret);
                        }else $grid[$fila][$col+9]=H::FormatoMonto($sustraendo); 
                      }
                      $grid[$fila][$col]=$reg->getDestip();
                      $grid[$fila][$col+1]=$reg->getCodcon();
                      $grid[$fila][$col+2]=H::FormatoMonto($reg->getBasimp());
                      $grid[$fila][$col+3]=H::FormatoMonto($reg->getPorret());
                      $grid[$fila][$col+4]=H::FormatoMonto($reg->getFactor(),4);
                      $grid[$fila][$col+5]=H::FormatoMonto($reg->getPorsus());
                      $grid[$fila][$col+6]=H::FormatoMonto($reg->getUnitri());
                      $grid[$fila][$col+7]=$reg->getEsta();
                      $grid[$fila][$col+10]=$reg->getEstaislr();                    
                      $grid[$fila][$col+11]=$reg->getEsta1xmil();
                      $grid[$fila][$col+12]=H::FormatoMonto($reg->getMontoiva());
                      $grid[$fila][$col+13]=$reg->getEstairs();                    
                      $grid[$fila][$col+15]=$reg->getEstaimn();
                      if ($limbaseret=='S') {                      
                        $grid[$fila][$col+14]=H::FormatoMonto($reg->getMbasmi()*$regl->getUnitri());
                        $grid[$fila][$col+16]=H::FormatoMonto($reg->getMbasma()*$regl->getUnitri());                      
                      }
                      $javascript="TotalRetencion();";
                    }
                  }else {
                      $grid[$fila][$col-1]="";
                      if ($filretpro=='S')
                        $javascript="alert('La Retención no Existe o el Beneficiario no tiene retenciones asociadas (Proveedores)');";
                      else
                        $javascript="alert('La Retención no Existe');";
                  }                      
                }else {
                   $grid[$fila][$col-1]="";
                   $grid[$fila][$col]="";
                   $javascript="alert('La Retención esta Repetida');";
                }               
           
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break; 
              case ('10'):  //Base para el Cálculo
                if (H::toFloat($grid[$fila][$col-1])>0)
                {
                  $bascal=H::toFloat($grid[$fila][$col-1]);
                  if (H::toFloat($grid[$fila][$col-6])!=0){ //Porret
                    $monret=$bascal*(H::toFloat($grid[$fila][$col-6])/100);
                    $grid[$fila][$col]=H::FormatoMonto($monret);
                  }else { //Porsus
                    $sustraendo=(H::toFloat($grid[$fila][$col-4])/100)*H::toFloat($grid[$fila][$col-3])*H::toFloat($grid[$fila][$col-5],4);
                    $retencion=$bascal*(H::toFloat($grid[$fila][$col-4])/100);
                    if ($retencion>$sustraendo){
                      $monret=$retencion-$sustraendo;
                      $grid[$fila][$col]=H::FormatoMonto($monret);
                    }else $grid[$fila][$col]=H::FormatoMonto($sustraendo); 
                  } 
                  $javascript="TotalRetencion();";                                   
                }else {
                  $javascript = "alert_('La Base para el Calculo debe ser mayor 0');";
                  $grid[$fila][$col-1]="0,00";
                }                
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;   
              case ('11'):  //Monto Retención
                if (H::toFloat($grid[$fila][$col-1])>0)
                {
                  $javascript="TotalRetencion();";                                   
                }               
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;                       
              default:
                break;
            }
          break; 
        case ('c'):   //grid Facturas 
            switch ($col) {
              case '1':    //Fecha Factura
                if ($montorete>0){
                  $grid[$fila][$col+7]=H::FormatoMonto($monord);
                  $idfac=$name."x_".$fila."_".$col;
                  $javascript="CargarComboIva('$idfac'); CargarComboIslr('$idfac'); CargarComboIrs('$idfac'); CargarComboImn('$idfac');";
                }else {
                  $javascript = "alert_('Debe aplicar Retenciones');";
                  $grid[$fila][$col-1]="";
                } 
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break; 
              case '2':    //Nro. Factura     
               $valnumfac=H::getConfApp2('valnumfac', 'tesoreria', 'pagemiord');   
               if ($valnumfac=='S'){
                  if (!Hacienda::Repetido2($grid,$grid[$fila][$col-1].'-'.$grid[$fila][$col+20],$fila,$col-1,$col+20)){
                      $y= new Criteria();
                      $y->add(OpordpagPeer::CEDRIF,$cedrif);
                      $y->add(OpfacturPeer::NUMFAC,$grid[$fila][$col-1]);
                      $y->addJoin(OpfacturPeer::NUMORD,OpordpagPeer::NUMORD);
                      $resuly= OpfacturPeer::doSelect($y);
                      if ($resuly)
                      {
                        $javascript = "alert('El Proveedor ya tiene asociado ese mismo N&uacute;mero de Factura en otra Orden de Pago.');";
                        $grid[$fila][$col-1]="";
                      }else {
                        $idnotdeb=$name.'x_'.$fila.'_'.($col+2);
                        $idnotcre=$name.'x_'.$fila.'_'.($col+3);
                        $idfacafe=$name.'x_'.$fila.'_'.($col+5);
                        $javascript="$('$idnotdeb').disabled=true; $('$idnotcre').disabled=true; $('$idfacafe').disabled=true;";
                        $grid[$fila][$col+3]="01";
                      }
                  }else {
                    $javascript = "alert_('El N&uacute;mero de Factura esta Repetido para ese mismo Proveedor');";
                    $grid[$fila][$col-1]="";
                  }
               }else {
                    $y= new Criteria();
                    $y->add(OpordpagPeer::CEDRIF,$cedrif);
                    $y->add(OpfacturPeer::NUMFAC,$grid[$fila][$col-1]);
                    $y->addJoin(OpfacturPeer::NUMORD,OpordpagPeer::NUMORD);
                    $resuly= OpfacturPeer::doSelect($y);
                    if ($resuly)
                    {
                      $javascript = "alert('El Proveedor ya tiene asociado ese mismo N&uacute;mero de Factura en otra Orden de Pago.');";
                      $grid[$fila][$col-1]="";
                    }else {
                      $idnotdeb=$name.'x_'.$fila.'_'.($col+2);
                      $idnotcre=$name.'x_'.$fila.'_'.($col+3);
                      $idfacafe=$name.'x_'.$fila.'_'.($col+5);
                      $javascript="$('$idnotdeb').disabled=true; $('$idnotcre').disabled=true; $('$idfacafe').disabled=true;";
                      $grid[$fila][$col+3]="01";
                    }
               }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break; 
              case ('4'):  //Nota Débito
                $idnumfac=$name.'x_'.$fila.'_'.($col-2);
                $idnotcre=$name.'x_'.$fila.'_'.($col+1);
                $javascript="$('$idnumfac').disabled=true; $('$idnotcre').disabled=true;";
                $grid[$fila][$col+1]="02";
                  
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;   
              case ('5'):  //Nota Crédito
                $idnumfac=$name.'x_'.$fila.'_'.($col-3);
                $idnotdeb=$name.'x_'.$fila.'_'.($col-1);
                $javascript="$('$idnumfac').disabled=true; $('$idnotdeb').disabled=true;";
                $grid[$fila][$col]="03";

                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('8'):  //% de Alícuota (Combo)
                $aux=explode('_',$valuefila);
                $codiva=$aux[0];
                $aliiva=H::toFloat($aux[1]);
                $totfac=H::toFloat($grid[$fila][$col]);
                $monexo=H::toFloat($grid[$fila][$col+1]);

                if ($modbasimpiva=='S')
                  $basimp=H::toFloat($grid[$fila][$col+2]);
                else 
                  $basimp=($totfac-$monexo)/(100+$aliiva)*100;
                $grid[$fila][$col+2]=H::FormatoMonto($basimp); //Base Imponible


                $imp=$basimp*$aliiva/100;
                $grid[$fila][$col+3]=H::FormatoMonto($imp); //Impuesto

                $ivaret=OrdendePago::CalculaIvaRetenido($codiva,$imp,$unitri,$retenapli);
                $grid[$fila][$col+4]=H::FormatoMonto($ivaret); //Iva Retenido

                $grid[$fila][$col+21]=H::FormatoMonto($aliiva); //Porcentaje Iva
                $grid[$fila][$col+34]=$codiva; //Código Iva

                $javascript="TotalFacturas();";

                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('9'):  //Total Factura               
                if (array_key_exists($col-2,$grid[$fila]))
                {
                  $aux=explode('_',$grid[$fila][$col-2]);
                  $codiva=$aux[0];
                  $aliiva=H::toFloat($aux[1]);
                }else {
                  $codiva=$grid[$fila][$col+33];
                  $aliiva=$grid[$fila][$col+20];
                }          
                $totfac=H::toFloat($grid[$fila][$col-1]);
                $monexo=H::toFloat($grid[$fila][$col]);

                if ($modbasimpiva=='S')
                  $basimp=H::toFloat($grid[$fila][$col+1]);
                else 
                  $basimp=($totfac-$monexo)/(100+$aliiva)*100;
                $grid[$fila][$col+1]=H::FormatoMonto($basimp); //Base Imponible


                $imp=$basimp*$aliiva/100;
                $grid[$fila][$col+2]=H::FormatoMonto($imp); //Impuesto

                $ivaret=OrdendePago::CalculaIvaRetenido($codiva,$imp,$unitri,$retenapli);
                $grid[$fila][$col+3]=H::FormatoMonto($ivaret); //Iva Retenido

                $javascript="TotalFacturas();";

                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break; 
              case ('10'):  //Exento IVA
                if (array_key_exists($col-3,$grid[$fila]))
                {
                  $aux=explode('_',$grid[$fila][$col-3]);
                  $codiva=$aux[0];
                  $aliiva=H::toFloat($aux[1]);
                }else {
                  $codiva=$grid[$fila][$col+32];
                  $aliiva=$grid[$fila][$col+19];
                }
                $totfac=H::toFloat($grid[$fila][$col-2]);
                $monexo=H::toFloat($grid[$fila][$col-1]);

                if ($modbasimpiva=='S')
                  $basimp=H::toFloat($grid[$fila][$col]);
                else 
                  $basimp=($totfac-$monexo)/(100+$aliiva)*100;
                $grid[$fila][$col]=H::FormatoMonto($basimp); //Base Imponible


                $imp=$basimp*$aliiva/100;
                $grid[$fila][$col+1]=H::FormatoMonto($imp); //Impuesto

                $ivaret=OrdendePago::CalculaIvaRetenido($codiva,$imp,$unitri,$retenapli);
                $grid[$fila][$col+2]=H::FormatoMonto($ivaret); //Iva Retenido

                $javascript="TotalFacturas();";

                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('11'):  //Base Imponible
                if (array_key_exists($col-4,$grid[$fila]))
                {
                  $aux=explode('_',$grid[$fila][$col-4]);
                  $codiva=$aux[0];
                  $aliiva=H::toFloat($aux[1]);
                }else {
                  $codiva=$grid[$fila][$col+31];
                  $aliiva=$grid[$fila][$col+18];
                }    
                
                $totfac=H::toFloat($grid[$fila][$col-3]);
                $monexo=H::toFloat($grid[$fila][$col-2]);

                if ($modbasimpiva=='S')
                  $basimp=H::toFloat($grid[$fila][$col-1]);
                else 
                  $basimp=($totfac-$monexo)/(100+$aliiva)*100;
                $grid[$fila][$col-1]=H::FormatoMonto($basimp); //Base Imponible


                $imp=$basimp*$aliiva/100;
                $grid[$fila][$col]=H::FormatoMonto($imp); //Impuesto

                $ivaret=OrdendePago::CalculaIvaRetenido($codiva,$imp,$unitri,$retenapli);
                $grid[$fila][$col+1]=H::FormatoMonto($ivaret); //Iva Retenido

                $javascript="TotalFacturas();";

                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('12'):  //Impuesto
               $javascript="TotalFacturas();";
                           
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('13'):  //Iva Retenido
                $javascript="TotalFacturas();";
                           
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;  
              case ('14'):  //1 x 1000 (Ley de Timbre Fiscal) (Ckeck)
                $totfac=H::toFloat($grid[$fila][$col-6]);
                $impuesto=H::toFloat($grid[$fila][$col-3]);          
                if (OrdendePago::CalculaLTF($totfac,$impuesto,$retenapli,$grid[$fila][$col],$bltf,$pltf,$mltf)){
                  $grid[$fila][$col]=H::FormatoMonto($bltf); // Base Imponible 1 x 1000
                  $grid[$fila][$col+1]=H::FormatoMonto($pltf); // % 1 x 1000
                  $grid[$fila][$col+2]=H::FormatoMonto($mltf); // Monto 1 x 1000

                  $javascript="TotalFacturas();";
                }else {
                  $javascript = "alert_('No hay Retenci&oacute;n de Ley de Timbre Fiscal'); $('$idfila').checked=false";
                }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('15'):  //Base Imponible 1 x 1000 (Ley de Timbre Fiscal)
                $totfac=H::toFloat($grid[$fila][$col-7]);
                if ($totfac>0) {
                  $impuesto=H::toFloat($grid[$fila][$col-4]);          
                  if (OrdendePago::CalculaLTF($totfac,$impuesto,$retenapli,$grid[$fila][$col-1],$bltf,$pltf,$mltf)){
                    $grid[$fila][$col-1]=H::FormatoMonto($bltf); // Base Imponible 1 x 1000
                    $grid[$fila][$col]=H::FormatoMonto($pltf); // % 1 x 1000
                    $grid[$fila][$col+1]=H::FormatoMonto($mltf); // Monto 1 x 1000

                    $javascript="TotalFacturas();";
                  }else {
                    $javascript = "alert_('No hay Retenci&oacute;n de Ley de Timbre Fiscal');";
                    $grid[$fila][$col-1]="0,00";
                  }         
                }else {
                  $javascript = "alert_('El Total de la Factura debe ser mayor que cero'); ";
                  $grid[$fila][$col-1]="0,00";
                }  
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;       
              case ('18'):  //I.S.L.R  (Ckeck)
                $totfac=H::toFloat($grid[$fila][$col-10]);
                if ($totfac>0) {
                  if (array_key_exists($col+1, $grid[$fila])){
                    $aux=explode('_',$grid[$fila][$col+1]); //Porcentaje Islr
                    $codislr=$aux[0];
                    $porislr=H::toFloat($aux[1]);
                  }else {
                    $codislr=$grid[$fila][$col+3];
                    $porislr=$grid[$fila][$col+21];
                  }
                  if ($codislr!='') {                 
                    $impuesto=H::toFloat($grid[$fila][$col-7]);          
                    if (OrdendePago::CalculaISLR($totfac,$impuesto,$retenapli,$grid[$fila][$col],$codislr,$bislr,$pislr,$mislr)){
                      $grid[$fila][$col]=H::FormatoMonto($bislr); // Base Imponible I.S.L.R
                      $grid[$fila][$col+1]=H::FormatoMonto($pislr); // % I.S.L.R
                      $grid[$fila][$col+2]=H::FormatoMonto($mislr); // Monto I.S.L.R
                      $grid[$fila][$col+3]=$codislr; //Código I.S.L.R
                      $grid[$fila][$col+21]=H::FormatoMonto($porislr); //porcentaje I.S.L.R

                      $javascript="TotalFacturas();";
                    }else {
                      $javascript = "alert_('No hay Retenci&oacute;n de I.S.L.R'); $('$idfila').checked=false";
                    }
                  }else {
                    $javascript = "alert_('Debe Seleccionar el Porcentaje de ISLR a aplicar'); $('$idfila').checked=false";
                  }
                }else {
                  $javascript = "alert_('El Total de la Factura debe ser mayor que cero'); $('$idfila').checked=false";
                }

                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('19'):  //Base Imponible I.S.L.R
                $totfac=H::toFloat($grid[$fila][$col-11]);
                if ($totfac>0) {
                  if (array_key_exists($col, $grid[$fila])){
                    $aux=explode('_',$grid[$fila][$col]); //Porcentaje Islr
                    $codislr=$aux[0];
                    $porislr=H::toFloat($aux[1]);
                  }else {
                    $codislr=$grid[$fila][$col+2];
                    $porislr=$grid[$fila][$col+20];
                  }
                  if ($codislr!='') {
                    $impuesto=H::toFloat($grid[$fila][$col-8]);          
                    if (OrdendePago::CalculaISLR($totfac,$impuesto,$retenapli,$grid[$fila][$col-1],$codislr,$bislr,$pislr,$mislr)){
                      $grid[$fila][$col-1]=H::FormatoMonto($bislr); // Base Imponible I.S.L.R
                      $grid[$fila][$col]=H::FormatoMonto($pislr); // % I.S.L.R
                      $grid[$fila][$col+1]=H::FormatoMonto($mislr); // Monto I.S.L.R
                      $grid[$fila][$col+2]=$codislr; //Código I.S.L.R
                      $grid[$fila][$col+22]=H::FormatoMonto($porislr); //porcentaje I.S.L.R

                      $javascript="TotalFacturas();";
                    }else {
                      $javascript = "alert_('No hay Retenci&oacute;n de I.S.L.R');";
                      $grid[$fila][$col-1]="0,00";
                    }
                  }else {
                    $javascript = "alert_('Debe Seleccionar el Porcentaje de ISLR a aplicar');";
                    $grid[$fila][$col-1]="0,00";
                  }
                }else {
                  $javascript = "alert_('El Total de la Factura debe ser mayor que cero');";
                  $grid[$fila][$col-1]="0,00";
                }        
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;   
              case ('20'):  //% I.S.L.R
                $aux=explode('_',$valuefila);
                $codislr=$aux[0];
                $aliislr=H::toFloat($aux[1]);
                $grid[$fila][$col+19]=$aliislr; //Porcentaje Islr
                $grid[$fila][$col+1]=$codislr; //Código Islr

                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('23'):  //CI/RIF Alterno
                $c= new Criteria();
                $c->add(OpbenefiPeer::CEDRIF,$grid[$fila][$col-1]);
                $reg= OpbenefiPeer::doSelectOne($c);
                if ($reg)
                  $grid[$fila][$col]=$reg->getNomben();
                else {
                  $javascript = "alert_('El Beneficiario Alterno no Existe');";
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
                } 
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;        
              case ('25'):  //I.R.S (Check)
                $totfac=H::toFloat($grid[$fila][$col-17]);
                if ($totfac>0) {
                  if (array_key_exists($col+1, $grid[$fila])){
                    $aux=explode('_',$grid[$fila][$col+1]); //Porcentaje Irs
                    $codirs=$aux[0];
                    $porirs=H::toFloat($aux[1]);
                  }else {
                    $codirs=$grid[$fila][$col+3];
                    $porirs=$grid[$fila][$col+15];
                  }                  
                  if ($codirs!='') {                  
                    $impuesto=H::toFloat($grid[$fila][$col-14]);          
                    if (OrdendePago::CalculaIRS($totfac,$impuesto,$retenapli,$grid[$fila][$col],$codirs,$birs,$pirs,$mirs)){
                      $grid[$fila][$col]=H::FormatoMonto($birs); // Base Imponible I.R.S
                      $grid[$fila][$col+1]=H::FormatoMonto($pirs); // % I.R.S
                      $grid[$fila][$col+2]=H::FormatoMonto($mirs); // Monto I.R.S
                      $grid[$fila][$col+3]=$codirs; //Código I.R.S

                      $grid[$fila][$col+15]=H::FormatoMonto($porirs); //porcentaje I.R.S

                      $javascript="TotalFacturas();";
                    }else {
                      $javascript = "alert_('No hay Retenci&oacute;n de I.R.S'); $('$idfila').checked=false";
                    }
                  }else {
                    $javascript = "alert_('Debe Seleccionar el Porcentaje de I.R.S a aplicar'); $('$idfila').checked=false";
                  }
                }else {
                  $javascript = "alert_('El Total de la Factura debe ser mayor que cero'); $('$idfila').checked=false";
                }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('26'):  //Base Imponible I.R.S
                $totfac=H::toFloat($grid[$fila][$col-18]);
                if ($totfac>0) {
                  if (array_key_exists($col, $grid[$fila])){
                    $aux=explode('_',$grid[$fila][$col]); //Porcentaje Irs
                    $codirs=$aux[0];
                    $porirs=H::toFloat($aux[1]);
                  }else {
                    $codirs=$grid[$fila][$col+2];
                    $porirs=$grid[$fila][$col+14];
                  } 
                  if ($codirs!='') {
                    $impuesto=H::toFloat($grid[$fila][$col-15]);          
                    if (OrdendePago::CalculaIRS($totfac,$impuesto,$retenapli,$grid[$fila][$col-1],$codirs,$birs,$pirs,$mirs)){
                      $grid[$fila][$col-1]=H::FormatoMonto($birs); // Base Imponible I.R.S
                      $grid[$fila][$col]=H::FormatoMonto($pirs); // % I.R.S
                      $grid[$fila][$col+1]=H::FormatoMonto($mirs); // Monto I.R.S
                      $grid[$fila][$col+2]=$codirs; //Código I.R.S

                      $grid[$fila][$col+16]=H::FormatoMonto($porirs); //porcentaje I.R.S

                      $javascript="TotalFacturas();";
                    }else {
                      $javascript = "alert_('No hay Retenci&oacute;n de I.R.S');";
                      $grid[$fila][$col-1]="0,00";
                    }
                  }else {
                    $javascript = "alert_('Debe Seleccionar el Porcentaje de I.R.S a aplicar');";
                    $grid[$fila][$col-1]="0,00";
                  }
                }else {
                  $javascript = "alert_('El Total de la Factura debe ser mayor que cero');";
                  $grid[$fila][$col-1]="0,00";
                }           
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;   
              case ('27'):  //% I.R.S
                $aux=explode('_',$valuefila);
                $codirs=$aux[0];
                $aliirs=H::toFloat($aux[1]);
                $grid[$fila][$col+13]=$aliirs; //Porcentaje Irs
                $grid[$fila][$col+1]=$codirs; //Código Irs

                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('31'):  //Impuesto Municipal (Check)
                $totfac=H::toFloat($grid[$fila][$col-23]);
                if ($totfac>0) {
                  if (array_key_exists($col+1, $grid[$fila])){
                    $aux=explode('_',$grid[$fila][$col+1]); //Porcentaje Impuesto Municipal
                    $codimn=$aux[0];
                    $porimn=H::toFloat($aux[1]);
                  }else {
                    $codimn=$grid[$fila][$col+3];
                    $porimn=$grid[$fila][$col+10];
                  }
                  if ($codimn!='') {                   
                    $impuesto=H::toFloat($grid[$fila][$col-20]);          
                    if (OrdendePago::CalculaIMN($totfac,$impuesto,$retenapli,$grid[$fila][$col],$codimn,$bimn,$pimn,$mimn)){
                      $grid[$fila][$col]=H::FormatoMonto($bimn); // Base Imponible Impuesto Municipal
                      $grid[$fila][$col+1]=H::FormatoMonto($pimn); // % Impuesto Municipal
                      $grid[$fila][$col+2]=H::FormatoMonto($mimn); // Monto Impuesto Municipal
                      $grid[$fila][$col+3]=$codimn; //Código Impuesto Municipal

                      $grid[$fila][$col+11]=H::FormatoMonto($porimn); //porcentaje Impuesto Municipal

                      $javascript="TotalFacturas();";
                    }else {
                      $javascript = "alert_('No hay Retenci&oacute;n de Impuesto Municipal'); $('$idfila').checked=false";
                    }
                  }else {
                    $javascript = "alert_('Debe Seleccionar el Porcentaje de Impuesto Municipal a aplicar'); $('$idfila').checked=false";
                  }
                }else {
                  $javascript = "alert_('El Total de la Factura debe ser mayor que cero'); $('$idfila').checked=false";
                }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('32'):  //Base Imponible Impuesto Municipal
                $totfac=H::toFloat($grid[$fila][$col-24]);
                if ($totfac>0) {
                  if (array_key_exists($col, $grid[$fila])){
                    $aux=explode('_',$grid[$fila][$col]); //Porcentaje Impuesto Municipal
                    $codimn=$aux[0];
                    $porimn=H::toFloat($aux[1]);
                  }else {
                    $codimn=$grid[$fila][$col+2];
                    $porimn=$grid[$fila][$col+9];
                  }
                  if ($codimn!='') {
                    $impuesto=H::toFloat($grid[$fila][$col-21]);          
                    if (OrdendePago::CalculaIMN($totfac,$impuesto,$retenapli,$grid[$fila][$col-1],$codimn,$bimn,$pimn,$mimn)){
                      $grid[$fila][$col-1]=H::FormatoMonto($bimn); // Base Imponible Impuesto Municipal
                      $grid[$fila][$col]=H::FormatoMonto($pimn); // % Impuesto Municipal
                      $grid[$fila][$col+1]=H::FormatoMonto($mimn); // Monto Impuesto Municipal
                      $grid[$fila][$col+2]=$codimn; //Código Impuesto Municipal

                      $grid[$fila][$col+12]=H::FormatoMonto($porimn); //porcentaje Impuesto Municipal

                      $javascript="TotalFacturas();";
                    }else {
                      $javascript = "alert_('No hay Retenci&oacute;n de Impuesto Municipal');";
                      $grid[$fila][$col-1]="0,00";
                    }
                  }else {
                    $javascript = "alert_('Debe Seleccionar el Porcentaje de Impuesto Municipal a aplicar');";
                    $grid[$fila][$col-1]="0,00";
                  }
                }else {
                  $javascript = "alert_('El Total de la Factura debe ser mayor que cero');";
                  $grid[$fila][$col-1]="0,00";
                }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;   
              case ('33'):  //% Impuesto Municipal
                $aux=explode('_',$valuefila);
                $codimn=$aux[0];
                $aliimn=H::toFloat($aux[1]);
                $grid[$fila][$col+8]=$aliimn; //Porcentaje Impuesto Municipal
                $grid[$fila][$col+1]=$codimn; //Código Impuesto Municipal

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
