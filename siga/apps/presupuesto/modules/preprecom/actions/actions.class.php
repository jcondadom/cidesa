<?php

/**
 * preprecom actions.
 *
 * @package    Roraima
 * @subpackage preprecom
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 32375 2009-09-01 16:19:59Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class preprecomActions extends autopreprecomActions
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cpprecom/filters');

    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   

     // 15    // pager
    $this->pager = new sfPropelPager('Cpprecom', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='cpprecom.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CpprecomPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }


  // Para incluir funcionalidades al executeEdit()
  public function editing(){
    $this->configGrid();
    $this->configGrid2($this->cpprecom->getRefprc());
    if (!$this->cpprecom->getId()){        
      $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
      if ($filsoldir=='S'){
         $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
         $t= new Criteria();
         $t->add(SegdirusuPeer::LOGUSE,$loguse);
         $t->setLimit(1);
         $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
         $regt= SegdirusuPeer::doSelectOne($t); 
         if ($regt){
          if ($this->cpprecom->getCoddirec()=='')
            $this->cpprecom->setCoddirec($regt->getCoddirec());
         }
        
      }
    }
  }

  public function configGrid($reg = array(),$regelim = array()){
  	$this->params = array();
    $c = new Criteria();
    $c->add(CpimpprcPeer::REFPRC ,$this->cpprecom->getRefprc());
    $reg = CpimpprcPeer::doSelect($c);
  

    $tiecom=H::getX_vacio('REFERE','Cpimpcom','Refcom',$this->cpprecom->getRefprc());

    //$this->obj = H::getConfigGrid($this->cpprecom->getId()=='' ? 'grid_cpimpprc_create' : 'grid_cpimpprc_edit',$reg);
    $this->columnas = Herramientas :: getConfigGrid($this->cpprecom->getId()=='' || $tiecom=='' ? 'grid_cpimpprc_create' : 'grid_cpimpprc_edit');
    if ($this->cpprecom->getId()=='' || $tiecom=='') {
      $mascara=H::formatoPresupuesto();
      $loncod=strlen($mascara);
      $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
      $params= array('param1' => $categoriasusu);
      
      $this->columnas[1][0]->setHTML('type="text" size="40" maxlength="'.chr(39).$loncod.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
      $this->columnas[1][0]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 1),'Preprecom_Cpasiini2',$params);
    }
    $this->obj = $this->columnas[0]->getConfig($reg);
    //$this->params['grid'] = $this->obj;    
    $this->params=array('grid' => $this->obj);
  }

  public function configGrid2($refdoc=''){ //Eventos
    $c = new Criteria();
    $c->add(CpdisevePeer::REFDOC ,$refdoc);
    $c->add(CpdisevePeer::TIPMOV ,'PRC');
    $result = CpdisevePeer::doSelect($c);
    
    $this->columnas = Herramientas :: getConfigGrid('grid_eventos');
    $mascara=H::formatoPresupuesto();
    $loncod=strlen($mascara);
    $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
    $params= array('param1' => $categoriasusu);
      
    $this->columnas[1][0]->setHTML('type="text" size="40" maxlength="'.chr(39).$loncod.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][0]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 1),'Preprecom_Cpasiini2',$params);
    
    $this->obj2 = $this->columnas[0]->getConfig($result);
    $this->cpprecom->setObj2($this->obj2);    
  }

  public function executeAjax(){
    $codigo = $this->getRequestParameter('codigo','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $ajax = $this->getRequestParameter('ajax','');
    $referencia=$this->getRequestParameter('referencia','');
    $fecprc =$this->getRequestParameter('fecprc','');
    $salcom=$this->getRequestParameter('salcom','');

    switch ($ajax){
      case '1':
        $mens=  Presupuesto::verificarAnular($referencia,$salcom);
        if ($mens==''){
        	$javascript="abreAnular('$referencia','$fecprc')";
        }else{
        	$javascript="alert('$mens')";
        }
        $output = '[["javascript","'.$javascript.'",""]]';
        break;
      case '2':  
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
            $js="alert_('El Estado no existe o no esta asociada al usuario'); $('cpprecom_coddirec').value=''; $('cpprecom_desdirec').value=''; $('cpprecom_coddirec').focus();";
          else
            $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('cpprecom_coddirec').value=''; $('cpprecom_desdirec').value=''; $('cpprecom_coddirec').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';        
        break; 
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

  	public function executeAjaxgrid() {
		$name = $this->getRequestParameter('grid','a');
		$grid = $this->getRequestParameter('grid'.$name,'');
		$fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $fecprc = $this->getRequestParameter('cpprecom_fecprc','');
    $dateFormat = new sfDateFormat('es_VE');
    $fec2 = $dateFormat->format($fecprc, 'i', $dateFormat->getInputPattern('d'));
    $javascript="";  $jsonextra="";
    switch ($name) {
      case ('a'):
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
                              $mondis = H::FormatoMonto(H::Monto_disponible(H::getCodPreDis($grid[$fila][$col-1]),$fec2));
                              $grid[$fila][2] = $mondis;
                            }else {
                              $javascript = "alert_('La Categoria del C&oacute;digo Presupuestario no esta asociada a este Usuario');";
                             $grid[$fila][$col-1]="";
                             $grid[$fila][2] = "0,00";
                            }
                          }else {
                            $mondis = H::FormatoMonto(H::Monto_disponible(H::getCodPreDis($grid[$fila][$col-1]),$fec2));
                            $grid[$fila][2] = $mondis;
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
                  $mondis = H::Monto_disponible(H::getCodPreDis($grid[$fila][0]),$fec2);
                 if (H::toFloat($grid[$fila][$col-1])>$mondis)
                 {
                    $javascript = "alert_('El Monto a Imputar es mayor al Disponible');";
                    $grid[$fila][$col-1]="0,00";
                    $grid[$fila][2]=number_format($mondis,2,',','.');
                 }else {
                  $cal1=$mondis-H::toFloat($grid[$fila][$col-1]);
                  $grid[$fila][2]=number_format($cal1,2,',','.');
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
               $valcom=$grid[$fila][$col-5];//.'-'.$grid[$fila][$col-3];
               $totcod=$grid[$fila][$col-4];
               $moneve=$grid[$fila][$col-1];
               $i=0;
               $acum=0;
               while ($i<count($grid))
               {
                  $valcom2=$grid[$i][$col-5];//.'-'.$grid[$i][$col-3];
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
        default:
          break;            
      }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

    }


  public function validateEdit(){
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
	     $this->cpprecom = $this->getCpprecomOrCreate();
       try{ $this->updateCpprecomFromRequest();}catch(Exception $ex){}

       $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');  
       $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec'); 
       if ($filsoldir=='S'){
         if ($this->getRequestParameter('cpprecom[coddirec]')==''){
            if ($cambiareti=='S') $this->coderr=3014; else $this->coderr=3013;
            return false;
         }
       }

       if (!H::validarPeriodoPresuesto($this->cpprecom->getFecprc()) && !$this->cpprecom->getId())
       {
          $this->coderr=151;
          return false;
       }
        
      $this->configGrid2();
     $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
     if (count($grid2[0])>0){
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
        if (H::toFloat($this->getRequestParameter('cpprecom[monprc]'))!=H::toFloat($this->getRequestParameter('cpprecom[toteve]'))){
            $this->coderr=1370;
            return false;
        }
      }
    }
            
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridV2($this,$this->obj);
	  if (count($grid[0])>0){
	  	$this->coderr = Presupuesto::validarPreCom($this->cpprecom,$grid,$this->cpprecom->getFecprc());
	  }
	  else{
	  	$this->coderr = 1342;
	  }
      if($this->coderr!=-1){
        return false;
      }else return true;
    }else return true;
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError(){
  	$this->configGrid();
    $this->configGrid2();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);

  }

  public function saving($cpprecom){
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    return Presupuesto::salvarPreprecom($cpprecom,$grid,$grid2);
  }

  public function deleting($cpprecom){
    return Presupuesto::eliminarPreprecom($cpprecom);
  }

  public function executeAnular(){

   $this->referencia=$this->getRequestParameter('referencia');
   $fecprc=$this->getRequestParameter('fecprc');
   $salcom=$this->getRequestParameter('salcom');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fecprc, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(CpprecomPeer::REFPRC,$this->referencia);
   $c->add(CpprecomPeer::FECPRC,$fec);
   $this->cpprecom = CpprecomPeer::doSelectOne($c);
   $id = $this->cpprecom->getId();

   sfView::SUCCESS;
  }

  public function executeSalvaranu(){
	$refprc=$this->getRequestParameter('refprc');
	$desanu=$this->getRequestParameter('desanu');
	$fecanu=$this->getRequestParameter('fecanu');
	$fecprc=$this->getRequestParameter('fecprc');
	$this->msg="";
    $dateFormat = new sfDateFormat('es_VE');
   	$fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

	if (strtotime($fec) < strtotime($fecprc)){
			$this->msg='La fecha de Anulación no puede ser menor a la del Compromiso';
		}else {
       if (substr($refprc, 0,2)=='TR'){
          $this->msg='No se puede Anular el PreCompromiso esta asociado a un Traslado.';
       }else {
          $q= new Criteria();
          $q->add(CpimpcomPeer::REFERE,$refprc);
          $q->add(CpimpcomPeer::STAIMP,'N',Criteria::NOT_EQUAL);
          $resul= CpimpcomPeer::doSelectOne($q);
          if ($resul)
             $this->msg='No se puede eliminar el PreCompromiso porque ya está asociado a un Compromiso.';
          else {
             $t= new Criteria();
             $t->add(CpajustePeer::REFERE,$refprc);
             $t->add(CpdocajuPeer::REFIER,'P');
             $t->addJoin(CpajustePeer::TIPAJU,CpdocajuPeer::TIPAJU);
             $regt=CpajustePeer::doSelectOne($t);
             if ($regt){
               if ($regt->getStaaju()=='N'){
                 $this->msg=Presupuesto::salvarAnular($refprc,$fecanu,$desanu);
                  if ($this->msg!=-1)
                    $this->msg=H::obtenerMensajeError($this->msg);
                  else $this->msg='';
               }else $this->msg='No se puede eliminar el PreCompromiso porque ya está asociado a un Ajuste.';
             }else {                
                $this->msg=Presupuesto::salvarAnular($refprc,$fecanu,$desanu);
                if ($this->msg!=-1)
                  $this->msg=H::obtenerMensajeError($this->msg);
                else $this->msg='';
             }                    			
          }   
       } 
		}
		sfView::SUCCESS;
  }

    /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el obejto del modelo base del formulario.
   *
   */
  protected function updateCpprecomFromRequest()
  {
    $cpprecom = $this->getRequestParameter('cpprecom');

    $fields = CpprecomPeer::getFieldNames();

    if(array_search('Codalmusu', $fields))
    {
      if (isset($cpprecom['codalmusu']))
      {
        $this->cpprecom->setCodalmusu($cpprecom['codalmusu']);
      }
    }
    if (isset($cpprecom['mensaje']))
    {
      $this->cpprecom->setMensaje($cpprecom['mensaje']);
    }
    if (isset($cpprecom['refprc']))
    {
      $this->cpprecom->setRefprc($cpprecom['refprc']);
    }
    if (isset($cpprecom['fecprc']))
    {
      if ($cpprecom['fecprc'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cpprecom['fecprc']))
          {
            $value = $dateFormat->format($cpprecom['fecprc'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cpprecom['fecprc'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cpprecom->setFecprc($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cpprecom->setFecprc(null);
      }
    }
    if (isset($cpprecom['desprc']))
    {
      $this->cpprecom->setDesprc($cpprecom['desprc']);
    }
    if (isset($cpprecom['tipprc']))
    {
    $this->cpprecom->setTipprc($cpprecom['tipprc'] ? $cpprecom['tipprc'] : null);
    }
    if (isset($cpprecom['cedrif']))
    {
    $this->cpprecom->setCedrif($cpprecom['cedrif'] ? $cpprecom['cedrif'] : null);
    }
    if (isset($cpprecom['grid']))
    {
      $this->cpprecom->setGrid($cpprecom['grid']);
    }
    if (isset($cpprecom['grid2']))
    {
      $this->cpprecom->setGrid2($cpprecom['grid2']);
    }
    if (isset($cpprecom['salaju']))
    {
      $this->cpprecom->setSalaju($cpprecom['salaju']);
    }
    if (isset($cpprecom['salpre']))
    {
      $this->cpprecom->setSalpre($cpprecom['salpre']);
    }
    if (isset($cpprecom['salcom']))
    {
      $this->cpprecom->setSalcom($cpprecom['salcom']);
    }
    if (isset($cpprecom['salcau']))
    {
      $this->cpprecom->setSalcau($cpprecom['salcau']);
    }
    if (isset($cpprecom['salpag']))
    {
      $this->cpprecom->setSalpag($cpprecom['salpag']);
    }
    if (isset($cpprecom['monprc']))
    {
      $this->cpprecom->setMonprc($cpprecom['monprc']);
    }
    if (isset($cpprecom['toteve']))
    {
      $this->cpprecom->setToteve($cpprecom['toteve']);
    }    
    if (isset($cpprecom['anoprc']))
    {
      $this->cpprecom->setAnoprc($cpprecom['anoprc']);
    }    
    if (isset($cpprecom['desanu']))
    {
      $this->cpprecom->setDesanu($cpprecom['desanu']);
    }   
    if (isset($cpprecom['staprc']))
    {
      $this->cpprecom->setStaprc($cpprecom['staprc']);
    }
    if (isset($cpprecom['fecanu']))
    {
      if ($cpprecom['fecanu'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cpprecom['fecanu']))
          {
            $value = $dateFormat->format($cpprecom['fecanu'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cpprecom['fecanu'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cpprecom->setFecanu($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cpprecom->setFecanu(null);
      }
    }    
    if (isset($cpprecom['refsol']))
    {
      $this->cpprecom->setRefsol($cpprecom['refsol']);
    }
    if (isset($cpprecom['fecreg']))
    {
      if ($cpprecom['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cpprecom['fecreg']))
          {
            $value = $dateFormat->format($cpprecom['fecreg'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $cpprecom['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cpprecom->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cpprecom->setFecreg(null);
      }
    }
    if (isset($cpprecom['cajocul']))
    {
      $this->cpprecom->setCajocul($cpprecom['cajocul']);
    }
    if (isset($cpprecom['coddirec']))
    {
      $this->cpprecom->setCoddirec($cpprecom['coddirec']);
    }

  }

  public function getLabels()
  {
    $labels = parent::getLabels(); 
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['cpprecom{coddirec}'] = 'Estado';
    return $labels;
  }

}
