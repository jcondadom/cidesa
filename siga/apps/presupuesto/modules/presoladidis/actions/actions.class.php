<?php

/**
 * presoladidis actions.
 *
 * @package    siga
 * @subpackage presoladidis
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class presoladidisActions extends autopresoladidisActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridMovimiento();
    $this->configGrid2($this->cpsoladidis->getRefadi(),$this->cpsoladidis->getAdidis());
    $this->configGrid3();
       if (!$this->cpsoladidis->getId())
    {
        $this->getUser()->getAttributeHolder()->remove('grabosol','presolladidis');
        $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
        if ($filsoldir=='S'){
           $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
           $t= new Criteria();
           $t->add(SegdirusuPeer::LOGUSE,$loguse);
           $t->setLimit(1);
           $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
           $regt= SegdirusuPeer::doSelectOne($t); 
           if ($regt){
            if ($this->cpsoladidis->getCoddirec()=='')
              $this->cpsoladidis->setCoddirec($regt->getCoddirec());
           }        
        }
    }
  }

  public function configGridMovimiento($reftra = '',$reg = array())
  {
      $mandisper=H::getConfApp2('mandisper', 'presupuesto', 'PreSolAdiDis');
      $c = new Criteria();
      $c->add(CpsolmovadiPeer::REFADI,$this->cpsoladidis->getRefadi());
      $reg = CpsolmovadiPeer::doSelect($c);
      $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/presoladidis/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_movimiento_new');
 
      $mascarapar = $this->cpsoladidis->getMascara();
      $lonpar = strlen($mascarapar);
      $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
      $parametros= array('param1' => $categoriasusu);

      $this->columnas[0]->setEliminar(true,'calculatotal()');
      $this->columnas[1][0]->setHTML('type="text" size="50" maxlength="'.chr(39).$lonpar.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapar.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="validarNoRepetido(this.id); toAjax(\'1\',getUrlModuloAjax(),this.value,\'\',\'&ides=\'+this.id+\'&monto=\'+$(this.id).up().next(0).descendants()[0].id+\'&fecadi=\'+$(\'cpsoladidis_fecadi\').value+\'&mondis=\'+$(this.id).up().next(3).descendants()[0].id)"');
      $this->columnas[1][0]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 1),'Cpasiini_Presoladidis2',$parametros);
      $this->columnas[1][7]->setCombo(Constantes::ListaTipoMovAdicDism());
      if ($mandisper=='S') 
        $this->columnas[1][8]->setOculta(false);
    
    $this->movimiento = $this->columnas[0]->getConfig($reg);

    $this->cpsoladidis->setMovimiento($this->movimiento);
  }

  public function configGrid2($refdoc='', $adidis=''){ //Eventos
    $c = new Criteria();
    $c->add(CpdisevePeer::REFDOC ,$refdoc);
    if ($adidis=='D') $c->add(CpdisevePeer::TIPMOV ,'DIS');
    else $c->add(CpdisevePeer::TIPMOV ,'ADI');
    $result = CpdisevePeer::doSelect($c);
    
    $this->columnas = Herramientas :: getConfigGrid('grid_eventos');
    $mascara=H::formatoPresupuesto();
    $loncod=strlen($mascara);
    $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
    $params= array('param1' => $categoriasusu);
      
    $this->columnas[1][0]->setHTML('type="text" size="50" maxlength="'.chr(39).$loncod.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][0]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 1),'Preprecom_Cpasiini2',$params);
    
    $this->obj2 = $this->columnas[0]->getConfig($result);
    $this->cpsoladidis->setObj2($this->obj2);    
  }

  public function configGrid3($refadi='', $codpre=''){ //Distribución por Período
    $c = new Criteria();
    $c->add(CpsolmovadiperPeer::REFADI ,$refadi);
    $c->add(CpsolmovadiperPeer::CODPRE ,$codpre);
    $result = CpsolmovadiperPeer::doSelect($c);
    
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/presoladidis/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_per');

    $this->obj3 = $this->columnas[0]->getConfig($result);

    $this->cpsoladidis->setObj3($this->obj3);    
  }  

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $msj="";
    $this->ajaxs=$ajax;
    switch ($ajax){
      case '1':
        $monto = $this->getRequestParameter('monto','');
        $MonDis = $this->getRequestParameter('mondis','');
        $fecadi = $this->getRequestParameter('fecadi','');
        $ides = $this->getRequestParameter('ides','');
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($fecadi, 'i', $dateFormat->getInputPattern('d'));
        $reg = CpdefnivPeer::doSelectOne(new Criteria());
        if ($reg){
            if (strlen($codigo) != strlen($reg->getForPre()) ){
                $msj = "alert('El Titulo Presupuestario no es de último nivel.'); $('$ides').value=''; $('$monto').value=''; calculatotal();";
            }else{
                $c = new Criteria();
                $c->add(CpasiiniPeer::CODPRE, $codigo);
                $c->add(CpasiiniPeer::PERPRE, '00');
                $cpasiini = CpasiiniPeer::doSelectOne($c);

                if ($cpasiini){ 
                      $aux = split('_',$MonDis);
                      $col=1;
                      $fil=$aux[1];
                     
                     $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
                     $loguse = sfContext::getInstance()->getUser()->getAttribute('loguse');
                     if ($categoriasusu!="") {
                        $y = new Criteria();
                        $y->add(SegcatusuPeer::LOGUSE,$loguse);
                        $y->add(SegcatusuPeer::CODCAT,substr($codigo,0,strlen(H::getObtener_FormatoCategoria())));                        
                        $regs2 = SegcatusuPeer::doSelectOne($y);
                        if (!$regs2) {
                         $msj.= "alert_('La Categoria del C&oacute;digo Presupuestario no esta asociada a este Usuario'); $('$ides').value = ''; $('$MonDis').value='';";
                        }else {       
                          $msj="colocarEvento('$codigo','$fil','$col');";                   
                          $montoDis = 0;
                          $montoI = 0;

                      if ($codigo != ''){
                          $montoDis = Herramientas::Monto_disponible(H::getCodPreDis($codigo),$fec2);

                          //if ($montoDis > 0){
                              $msj .= "$('$MonDis').value = number_format($montoDis, 2, ',','.'); calculatotal();";
                          /*}else if ($montoDis <= 0){
                              $msj .= "alert('El Titulo Presupuestario no tiene saldo disponible.'); $('$ides').value = ''; $('$MonDis').value=''; calculatotal();";
                          }*/
                      }
                        }
                      }else {
                     $msj="colocarEvento('$codigo','$fil','$col');";
                    $montoDis = 0;
                    $montoI = 0;

                if ($codigo != ''){
                    $montoDis = Herramientas::Monto_disponible(H::getCodPreDis($codigo),$fec2);

                    //if ($montoDis > 0){
                        $msj.= "$('$MonDis').value = number_format($montoDis, 2, ',','.'); calculatotal();";
                    /*}else if ($montoDis <= 0){
                        $msj.= "alert('El Titulo Presupuestario no tiene saldo disponible.'); $('$ides').value = ''; $('$MonDis').value=''; calculatotal();";
                    }*/
                }
              }

        $output = '[["javascript","'.$msj.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
                }else{
                    $msj = "alert_('El Titulo Presupuestario no Tiene Asignaci&oacute;n Inicial.'); $('$ides').value='';";
                }
            }
        }


        $output = '[["javascript","'.$msj.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '2':
        $codpre = $this->getRequestParameter('codpre','');
        $ides= $this->getRequestParameter('ides','');
        $iva= $this->getRequestParameter('iva','');
        $dis= $this->getRequestParameter('dis','');
        $vdis= $this->getRequestParameter('vdis','');
        $tipo= $this->getRequestParameter('tipo','');
        $idm= $this->getRequestParameter('idm','');
        $fecadi = $this->getRequestParameter('fecadi','');
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($fecadi, 'i', $dateFormat->getInputPattern('d'));
        $msj = "";
        $montoDis = 0;
        $montoI = 0;
        if ($tipo=='true')
        $tipo='D';
        else
        $tipo='A';
        if ($codpre != ''){
            $montoDis = Herramientas::Monto_disponible(H::getCodPreDis($codpre),$fec2);

            $numero = H::toFloat($codigo);
          if ($tipo=='D') {
            if ($numero > $montoDis){
                $montoI = 0;
                $msj = "alert('El Monto introducido sobrepasa la Disponibilidad.'); $('$ides').value = number_format($montoI, 2, ',','.'); calculatotal();";
            }else if ($numero <= $montoDis){
                $total= $numero +H::toFloat($iva);
                 if($tipo =='A'){
                    $aumento = H::toFloat($montoDis)+$total;
                    $msj =" $('$dis').value = number_format($aumento, 2, ',','.'); $('$idm').value = number_format($total, 2, ',','.'); calculatotal(); ";
                }else{
                    $mdis = H::toFloat($montoDis)-$total;
                    $msj =" $('$dis').value = number_format($mdis, 2, ',','.'); $('$idm').value = number_format($total, 2, ',','.'); calculatotal();";
                }
                $aux = split('_',$ides);
                $col=2;
                $fil=$aux[1];
               $msj.="colocarEvento('$codigo','$fil','$col');";
            }
          }else {
                $total= $numero +H::toFloat($iva);
                $msj ="$('$idm').value = number_format($total, 2, ',','.'); calculatotal();";
                
                $aux = split('_',$ides);
                $col=2;
                $fil=$aux[1];
               $msj.="colocarEvento('$codigo','$fil','$col');";
          }
        }else{
            $msj = "alert('Debe introducir primero el Titulo Presupuestario.'); $('$ides').value=''; calculatotal();";
        }

        $output = '[["javascript","'.$msj.'",""]]';
        //$output = '[["javascript","alert('.$montoDis.'); alert('.$numero.')",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
     case '3':
        $referencia = $this->getRequestParameter('referencia','');
        $fecadi = $this->getRequestParameter('fecadi','');
        $mens = Presupuesto::verificarAnularSolAdidis($referencia);
        if(Presupuesto::Verificar_Dependencias($referencia)){
            $mens= "La Solicitud no puede ser eliminada, ya generó una Adición/Disminución.";

         }
        if ($mens==''){
        	$javascript="abreAnular('$referencia','$fecadi')";
        }else{
        	$javascript="alert('$mens')";
        }
        $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
     case '4':
        $referencia = $this->getRequestParameter('referencia','');
        $fecadi = $this->getRequestParameter('fecadi','');
        $this->nivel = $this->getRequestParameter('nivel', '');
        $mens = Presupuesto::verificarAprobarSolAdidis($referencia);
        if ($mens==''){
        	$javascript="abreAprobar('$referencia','$fecadi','$this->nivel')";
        }else{
        	$javascript="alert('$mens')";
        }
        $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
     case '5':  
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
        $q= new Criteria();
        if ($filsoldir=='S'){
          $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
        }else $q->add(CadefdirecPeer::CODDIREC,$codigo);
        $reg= CadefdirecPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesdirec();                     
        }else {
            $dato="";
            if ($filsoldir=='S')
            $js="alert_('El Estado no existe o no esta asociada al usuario'); $('cpsoladidis_coddirec').value=''; $('cpsoladidis_desdirec').value=''; $('cpsoladidis_coddirec').focus();";
          else
            $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('cpsoladidis_coddirec').value=''; $('cpsoladidis_desdirec').value=''; $('cpsoladidis_coddirec').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';       
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY; 
        break; 
     case '6':  
        $codigopre = $this->getRequestParameter('codigopre');
        $refadi = $this->getRequestParameter('refadi');
        $nuevo = $this->getRequestParameter('nuevo');
        $montomov = $this->getRequestParameter('montomov');
        
        $this->params=array();
        $this->cpsoladidis = $this->getCpsoladidisOrCreate();
        $this->labels = $this->getLabels();

        $this->configGrid3($refadi, $codigopre);
        
        $js="$('divgrid_per').show();";

        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
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
    if($this->getRequest()->getMethod() == sfRequest::POST){
    $this->cpsoladidis = $this->getCpsoladidisOrCreate();
    try{ $this->updateCpsoladidisFromRequest();}catch(Exception $ex){}

     $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');  
     $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec'); 
     if ($filsoldir=='S'){
       if ($this->getRequestParameter('cpsoladidis[coddirec]')==''){
          if ($cambiareti=='S') $this->coderr=3014; else $this->coderr=3013;
          return false;
       }
     }

    if (!H::validarPeriodoPresuesto($this->cpsoladidis->getFecadi()) && !$this->cpsoladidis->getId())
     {
        $this->coderr=151;
        return false;
     }

      if (($this->getRequestParameter('cpsoladidis[totadi]')=='0,00')){
         $this->coderr=1367;
         return false;
    }

    if ($this->getRequestParameter('cpsoladidis[adidis]')=='D'){
      $this->configGridMovimiento();
      $grid = Herramientas::CargarDatosGridv2($this,$this->movimiento);
      $this->coderr = Presupuesto::validarPreSolAdiDis($this->cpsoladidis,$grid,$this->cpsoladidis->getFecadi());
       if($this->coderr!=-1){
        return false;
      } else return true;
    }

    $this->configGrid2();
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $cont=0;
    $y=$grid2[0];
    $l=0;
    while ($l<count($y))
    {
      if ($y[$l]->getCodpre()!='' && $y[$l]->getCodeve()!='' && $y[$l]->getMoneve()>0)
        $cont++;
      $l++;
    }
    if ($cont>0) { 
      if (H::toFloat($this->getRequestParameter('cpsoladidis[totadi]'))!=H::toFloat($this->getRequestParameter('cpsoladidis[toteve]'))){
          $this->coderr=1375;
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
    $this->configGridMovimiento();
    $this->configGrid2();
    $this->configGrid3();
    $grid = Herramientas::CargarDatosGridv2($this,$this->movimiento);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);

  }

  public function saving($cpsoladidis)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->movimiento);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $this->getUser()->setAttribute('grabosol', 'S','presoladidis');
    return Presupuesto::salvarSolicitudCreditos($cpsoladidis, $grid, $grid2);
  }

  public function deleting($cpsoladidis)
  {
    return Presupuesto::eliminarSolAdidis($cpsoladidis);
  }

  public function executeAnular(){

   $this->referencia = $this->getRequestParameter('referencia');
   $fecadi=$this->getRequestParameter('fecadi');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fecadi, 'i', $dateFormat->getInputPattern('d'));
   $c = new Criteria();
   $c->add(CpsoladidisPeer::REFADI,$this->referencia);
   $c->add(CpsoladidisPeer::FECADI,$fec);
   $this->cpsoladidis = CpsoladidisPeer::doSelectOne($c);
   sfView::SUCCESS;
  }

    public function executeSalvaranu(){

	$refadi = $this->getRequestParameter('refadi');
	$desanu = $this->getRequestParameter('desanu');
	$fecanu = $this->getRequestParameter('fecanu');
	$fecadi = $this->getRequestParameter('fecadi');
	$this->msg="";

        $dateFormat = new sfDateFormat('es_VE');
   	$fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

	if (strtotime($fec) < strtotime($fecadi)){
            $this->msg='La fecha de Anulación no puede ser menor a la del Compromiso';
        }else {
            Presupuesto::salvarAnularSolAdidis($refadi,$fec,$desanu);
        }

	sfView::SUCCESS;
  }

  public function executeAprobar(){

   $this->referencia = $this->getRequestParameter('referencia');
   $fecadi = $this->getRequestParameter('fecadi');
   $this->nivel = $this->getRequestParameter('nivel');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fecadi, 'i', $dateFormat->getInputPattern('d'));
   $c = new Criteria();
   $c->add(CpsoladidisPeer::REFADI,$this->referencia);
   $c->add(CpsoladidisPeer::FECADI,$fec);
   $this->cpsoladidis = CpsoladidisPeer::doSelectOne($c);
   sfView::SUCCESS;
  }

  public function executeSalvarapr(){

	$refadi = $this->getRequestParameter('refadi');
	$desapr = $this->getRequestParameter('desapr');
	$fecapr = $this->getRequestParameter('fecapr');
	$fecadi = $this->getRequestParameter('fecadi');
  $staapr = $this->getRequestParameter('staapr');
  $nivel = $this->getRequestParameter('nivel');
	$this->msg="";

  $dateFormat = new sfDateFormat('es_VE');
  $fec = $dateFormat->format($fecapr, 'i', $dateFormat->getInputPattern('d'));

   if (strtotime($fec) < strtotime($fecadi)){
        $this->msg='La fecha de Aprobación no puede ser menor a la del Compromiso';
    }else {
        $error=Presupuesto::salvarAprobacionSolAdidis($refadi,$fecapr,$desapr, $nivel, $staapr);
        if ($error!=-1){
          $this->msg=Herramientas::obtenerMensajeError($error);
        }
    }

	sfView::SUCCESS;
  }


    public function executeAjaxfila()
    {
    	$name = $this->getRequestParameter('grid','a');
    	$grid = $this->getRequestParameter('grid'.$name,'');
    	$fila = $this->getRequestParameter('fila','');
      $tipo= $this->getRequestParameter('cpsoladidis_adidis_D','');
      $fecadi= $this->getRequestParameter('cpsoladidis_fecadi','');
      $dateFormat = new sfDateFormat('es_VE');
      $fec2 = $dateFormat->format($fecadi, 'i', $dateFormat->getInputPattern('d'));
      $javascript='';
      if ($tipo=='true')
      $tipo='D';
      else
      $tipo='A';
      $montoDis = Herramientas::Monto_disponible(H::getCodPreDis($grid[$fila][0]),$fec2);
    	$mtodisponible = $grid[$fila][4];
    	$monto = $grid[$fila][1];
      $iva = $grid[$fila][2];
      $total = H::toFloat($monto)+H::toFloat($iva);
      if (H::toFloat($monto)>0 && H::toFloat($montoDis)>0) {
        if($tipo =='A'){
            $aumento = H::toFloat($montoDis)+$total;
            $grid[$fila][4] = number_format($aumento,2,',','.');
        }else{
            $dis = H::toFloat($montoDis)-$total;
            $grid[$fila][4] = number_format($dis,2,',','.');
        }     
      }
    $grid[$fila][3] = number_format($total,2,',','.');
    $javascript =" calculatotal();";
      
      $jsonextra = ',["javascript","' . $javascript . '",""]';
    	$output = Herramientas::grid_to_json($grid,$name,$jsonextra);
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    	return sfView::HEADER_ONLY;
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
        $javascript="";  $jsonextra="";
    switch ($name) {
      case ('d'):
        switch ($col) {
         case ('1'):   //Codigo Presupuestario
            if ($grid[$fila][$col-1]!="")
            {
              $mascara=H::formatoPresupuesto();
              $loncod=strlen($mascara);
              $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
              $loguse = sfContext::getInstance()->getUser()->getAttribute('loguse');
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                if (strlen($grid[$fila][$col-1])==$loncod)
                {
                   $c = new Criteria();
                   $c->add(CpasiiniPeer::CODPRE,$grid[$fila][$col-1]);
                   $c->add(CpasiiniPeer::PERPRE,'00');
                   $regs = CpasiiniPeer::doSelectOne($c);
                   if ($regs)
                   {
                     $codigopre=$grid[$fila][$col-1];
                     $javascript="colocarEvento('$codigopre','$fila','$col');";
                     if ($categoriasusu!="") {
                        $y = new Criteria();
                        $y->add(SegcatusuPeer::LOGUSE,$loguse);
                        $y->add(SegcatusuPeer::CODCAT,substr($grid[$fila][$col-1],0,strlen(H::getObtener_FormatoCategoria())));                        
                        $regs2 = SegcatusuPeer::doSelectOne($y);
                        if ($regs2) {
                          $mondis = H::FormatoMonto(H::Monto_disponible($grid[$fila][$col-1]));
                          $grid[$fila][4] = $mondis;
                        }else {
                          $javascript = "alert_('La Categoria del C&oacute;digo Presupuestario no esta asociada a este Usuario');";
                         $grid[$fila][$col-1]="";
                         $grid[$fila][4] = "0,00";
                        }
                      }else {
                        $mondis = H::FormatoMonto(H::Monto_disponible($grid[$fila][$col-1]));
                        $grid[$fila][4] = $mondis;
                      }
                    }else {
                      $javascript = "alert_('El C&oacute;digo Presupuestario no Existe');";
                      $grid[$fila][$col-1]="";
                   }
                   }else {
                    $javascript = "alert_('El C&oacute;digo Presupuestario no es de &Uacute;ltimo Nivel');";
                    $grid[$fila][$col-1]="";
                  }                
                }else {
                  $javascript = "alert_('El C&oacute;digo Presupuestario esta Repetido');";
                  $grid[$fila][$col-1]="";
              }
              }
              
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;        
          case ('2'):  //Monto Imputación
            if (H::toFloat($grid[$fila][$col-1])>0)
            {
              $mondis = H::Monto_disponible($grid[$fila][0]);
             if (H::toFloat($grid[$fila][$col-1])>$mondis)
             {
                $javascript = "alert_('El Monto a Imputar es mayor al Disponible');";
                $grid[$fila][$col-1]="0,00";
                $grid[$fila][4]=number_format($mondis,2,',','.');
             }else {
              $cal1=$mondis-H::toFloat($grid[$fila][$col-1]);
              $grid[$fila][4]=number_format($cal1,2,',','.');            
              $valor=$grid[$fila][$col-1];
              $javascript="colocarEvento('$valor','$fila','$col');";
              
             }              
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;
          default:
            break;
        }
        break;            
      case ('b'):
        switch ($col) {
             case ('1'):
                  $valor=$grid[$fila][$col-1];  
                  $javascript="BuscarCodpre('$valor','$fila')";                 
                  $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;
             case ('3'):
              if (!Hacienda::Repetido2($grid,$grid[$fila][$col-1].'-'.$grid[$fila][$col-3],$fila,$col-1,$col-3))
              {
                 $r= new Criteria();
                 $r->add(CpeveprePeer::CODEVE,$grid[$fila][$col-1]);
                 $result= CpeveprePeer::doSelectOne($r);
                 if ($result)
                 {
                   $grid[$fila][$col]=$result->getDeseve();
                 }else {
                  $javascript = "alert_('El Evento no existe');";
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
                 }
              }else {
                $javascript = "alert_('El Evento esta Repetido con ese mismo C&oacute;digo Presupuestario');";
                $grid[$fila][$col-1]="";
              }
              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;
             case ('5'):
               $valcom=$grid[$fila][$col-3].'-'.$grid[$fila][$col-5];
               $totcod=$grid[$fila][$col-4];
               $moneve=$grid[$fila][$col-1];
               $i=0;
               $acum=0;
               while ($i<count($grid))
               {
                  $valcom2=$grid[$i][$col-3].'-'.$grid[$i][$col-5];
                  if ($i!=$fila)
                    if ($valcom==$valcom2)
                     $acum=$acum + H::toFloat($grid[$i][$col-1]);
                  
                   $i++;
               }
               $dif=H::toFloat($totcod)-$acum;
               if (H::toFloat($moneve)>$dif)
               {
                  $grid[$fila][$col-1]="0,00";                        
                  $javascript="alert('El Monto del Evento sobrepasa al Monto Total de la Imputacion Presupuestaria');";
               }
               $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;
            default:
              break;
           }
          break;
        case ('c'):
          switch ($col) {
               case ('1'):
                  $fecadi = explode('/', $this->getRequestParameter('cpsoladidis_fecadi',''));
                  $mes=$grid[$fila][$col-1];  
                  $mesadi=$fecadi[1];
                  if ((int)$mes<(int)$mesadi ){
                     $grid[$fila][$col-1]="";                        
                     $javascript="alert('El Mes debe ser mayor o igual al mes de la Solicitud');";           
                  }else {
                    if ((int)$mes>12){
                      $grid[$fila][$col-1]="";                        
                     $javascript="alert_('El Mes no es v&aacute;lido');";           
                    }
                  }
                  $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;                                
              case ('2'):  //Monto
               $moncodpre=$grid[0][$col]; // Cantidad Total articulo (Grid detalle articulos)
               $monper=$grid[$fila][$col-1]; //Cantidad por período
               $i=0;
               $acum=0;
               while ($i<count($grid))
               {
                  if ($i!=$fila)
                     $acum=$acum + H::toFloat($grid[$i][$col-1]);                  
                   $i++;
               }
               $dif=H::toFloat($moncodpre)-$acum;
               if (H::toFloat($monper)>H::toFloat($dif))
               {
                  $grid[$fila][$col-1]="0,00";                        
                  $javascript="alert_('La Monto para este Per&iacute;odo sobrepasa el Monto Total para ese C&oacute;digo Presupuestario');";
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


  public function executeDelete()
  {
    $this->cpsoladidis = CpsoladidisPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->cpsoladidis);

    try
    {
      if(Presupuesto::Verificar_Dependencias($this->cpsoladidis->getRefadi())){
            $valor= "La Solicitud no puede ser eliminada, ya generó una Adición/Disminución.";
            $this->getRequest()->setError('delete',$valor);

      }else{
      $this->deleteCpsoladidis($this->cpsoladidis);
      $id= $this->cpsoladidis->getId();
      $this->SalvarBitacora($id ,'Elimino');}
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('presoladidis', 'list');
    }


    return $this->forward('presoladidis', 'list');
  }
   public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->listing();

     $this->getUser()->getAttributeHolder()->remove('grabosol','presoladidis');

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cpsoladidis/filters');

    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');

     // 15    // pager
    $this->pager = new sfPropelPager('Cpsoladidis', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='cpsoladidis.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CpsoladidisPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

    public function getLabels()
  {
    $labels = parent::getLabels(); 
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['cpsoladidis{coddirec}'] = 'Estado';
    return $labels;
  } 
}
