<?php

/**
 * almreq actions.
 *
 * @package    Roraima
 * @subpackage almreq
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almreqActions extends autoalmreqActions
{
  private $coderror =-1;

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/careqart/filters');

    $loguse= $this->getUser()->getAttribute('loguse');
    $filiscen=H::getConfApp2('filiscen', 'compras', 'almreq');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
   
     // 15    // pager
    $this->pager = new sfPropelPager('Careqart', 15);
    $c = new Criteria();
    if ($filiscen=='S' && $filsoldir=='S') {
      $this->sql='careqart.codcen in (select codcen from "SIMA_USER".segcenusu where loguse=\''.$loguse.'\') and careqart.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CareqartPeer::CODCEN,$this->sql,Criteria::CUSTOM);      
    }elseif ($filiscen=='S') {
      $this->sql='careqart.codcen in (select codcen from "SIMA_USER".segcenusu where loguse=\''.$loguse.'\')';
      $c->add(CareqartPeer::CODCEN,$this->sql,Criteria::CUSTOM);      
    }else if ($filsoldir=='S'){
      $this->sql='careqart.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CareqartPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }    

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
    $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
    if ($modulo=='mantenimiento'){
      $this->nomfor=$this->getRequestParameter('formulario');     
      $this->idfila=$this->getRequestParameter('idfilareq'); 
      $this->getUser()->getAttributeHolder()->remove('referencia');
      $this->getUser()->getAttributeHolder()->remove('formulario');
      $this->getUser()->getAttributeHolder()->remove('idfilareq');    
      $this->getUser()->setAttribute('formulario',$this->getRequestParameter('formulario'));
      $this->getUser()->setAttribute('idfilareq',$this->getRequestParameter('idfilareq'));
    }else{
      $this->nomfor="";
      $this->idfila="";
      $this->getUser()->getAttributeHolder()->remove('referencia');
      $this->getUser()->getAttributeHolder()->remove('formulario');
      $this->getUser()->getAttributeHolder()->remove('idfilareq'); 
    }
    
  }

    public function executeCreate()
  {
    return $this->forward('almreq', 'edit');
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
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
       $this->careqart= $this->getCareqartOrCreate();
       try{
	    $this->updateCareqartFromRequest();
          }

    catch(Exception $ex){}

      if (Tesoreria::validarFechaPerContable($this->getRequestParameter('careqart[fecreq]')))
      {
        $this->coderror=521;
        return false;
      }  

      $valunireq=H::getConfApp2('valunireq', 'compras', 'almreq');
      if ($valunireq=='S'){
        if ($this->getRequestParameter('careqart[codcatreq]')=='')
          {
            $this->coderror=3011;
            return false;
          }
      }

      $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
      $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
      if ($filsoldir=='S'){
        if ($this->getRequestParameter('careqart[coddirec]')==''){
           if ($cambiareti=='S') $this->coderror=3014; else $this->coderror=3013;
           return false;
        }
      }

      $manalmubi=H::getConfApp2('manalmubi', 'compras', 'almreq');
      if ($manalmubi=='S'){
        if ($this->getRequestParameter('careqart[codalm]')==''){
           $this->coderror=3018;
           return false;
        }
        if ($this->getRequestParameter('careqart[codubi]')==''){
           $this->coderror=3019;
           return false;
        }
      }
      
       $this->configGrid();
       $grid=Herramientas::CargarDatosGrid($this,$this->obj);
        $gencom=H::getConfApp2('gencom', 'compras', 'almdesp');
        if ($gencom=='S' && $this->careqart->getId()=="")
        {
          if ($this->careqart->getMonreq()==0)
          {
            $this->coderror=213;
            return false;
          }
        }

  	   if ($this->ValidarDatosVaciosenGrid($grid,$error))
           {
              $this->coderror=$error;
              return false;
           }
       return true;
      } else return true;
  }

 /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->careqart = $this->getCareqartOrCreate();    
    $this->setVars();
    $this->configGrid();
    if (!$this->careqart->getId()){
      $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
      if ($filsoldir=='S'){
         $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
         $t= new Criteria();
         $t->add(SegdirusuPeer::LOGUSE,$loguse);
         $t->setLimit(1);
         $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
         $regt= SegdirusuPeer::doSelectOne($t); 
         if ($regt){
          if ($this->careqart->getCoddirec()=='')
            $this->careqart->setCoddirec($regt->getCoddirec());
         }        
      }
    }


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCareqartFromRequest();

      if ($this->saveCareqart($this->careqart)==-1)
	  {
	      $this->setFlash('notice', 'Your modifications have been saved');
		  $this->Bitacora('Guardo');

 		  $this->careqart->setId(Herramientas::getX_vacio('reqart','careqart','id',$this->careqart->getReqart()));

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('almreq/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('almreq/list');
	      }
	      else
	      {
	        return $this->redirect('almreq/edit?id='.$this->careqart->getId());
	      }
	    }
	   else
	    {
          $this->labels = $this->getLabels();
          return sfView::SUCCESS;
        }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCareqartFromRequest()
  {
    $careqart = $this->getRequestParameter('careqart');
    if (isset($careqart['reqart']))
    {
      $this->careqart->setReqart($careqart['reqart']);
      $this->careqart->setStareq('A');
    }
    if (isset($careqart['fecreq']))
    {
      if ($careqart['fecreq'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($careqart['fecreq']))
          {
            $value = $dateFormat->format($careqart['fecreq'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $careqart['fecreq'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->careqart->setFecreq($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->careqart->setFecreq(null);
      }
    }
    if (isset($careqart['codcatreq']))
    {
      if (trim($careqart['codcatreq'])!="") $this->careqart->setCodcatreq($careqart['codcatreq']);
    }
    if (isset($careqart['desreq']))
    {
      $this->careqart->setDesreq($careqart['desreq']);
    }
    if (isset($careqart['monreq']))
    {
      $this->careqart->setMonreq($careqart['monreq']);
    }

    if (isset($careqart['desubi']))
    {
      $this->careqart->setDesubi($careqart['desubi']);
    }
    if (isset($careqart['codcen']))
    {
      $this->careqart->setCodcen($careqart['codcen']);
    }
    if (isset($careqart['codalm']))
    {
      $this->careqart->setCodalm($careqart['codalm']);
    }
    if (isset($careqart['codubi']))
    {
      $this->careqart->setCodubi($careqart['codubi']);
    }
    if (isset($careqart['motivo']))
    {
      $this->careqart->setMotivo($careqart['motivo']);
    }
    if (isset($careqart['coddirec']))
    {
      $this->careqart->setCoddirec($careqart['coddirec']);
    }
    if (isset($careqart['obsreq']))
    {
      $this->careqart->setObsreq($careqart['obsreq']);
    }

  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $sw=true; $dato="";
    if ($this->getRequestParameter('ajax')=='1')
    {
      $catubibnu=H::getConfApp2('catubibnu', 'compras', 'almreq');
      $catubidir=H::getConfApp2('catubidir', 'compras', 'almreq');
      if ($catubibnu=='S')
        $dato=BnubicaPeer::getDesubi($this->getRequestParameter('codigo'));
      else if ($catubidir=='S')
        $dato=H::getX_vacio('Coddirec','Cadefdirec','Desdirec',$this->getRequestParameter('codigo'));
      else
        $dato=BnubibiePeer::getDesubicacion($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }
    else  if ($this->getRequestParameter('ajax')=='2')
    {
      $dato=""; $dato1=$dato2=""; $js="";
      $cajunidad=$this->getRequestParameter('cajunidad');
      $cajcosto=$this->getRequestParameter('cajcosto');
      $valexiart=H::getConfApp2('valexiart', 'compras', 'almreq');
      $longart = strlen(H::getMascaraArticulo());
    
      $t= new Criteria();
      $t->add(CaregartPeer::CODART,$this->getRequestParameter('codigo'));
      $resul= CaregartPeer::doSelectOne($t);
      if ($resul)
      {
        if (strlen($this->getRequestParameter('codigo'))==$longart) {
          if ($resul->getTipo()=='A') {
           if ($valexiart=='S'){
             $exis=H::ObtenerExistenciaArticulo($resul->getCodart());
             if ($exis>0)
             {
               $dato=$resul->getDesart();
               $dato1=$resul->getUnimed(); 
               $dato2=H::FormatoMonto($resul->getCosult());
             }else $js="alert('El Art&iacute;culo no tiene existencia'); $('$cajtexcom').value='';";
           }else {
             $dato=$resul->getDesart();
             $dato1=$resul->getUnimed();
             $dato2=H::FormatoMonto($resul->getCosult());
           }
       }else {
          $js="alert('Debe ser un  Art&iacute;culo'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
       }
       }else {
          $js="alert('El Art&iacute;culo no es de &Uacute;ltimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
       }
      }else {
         $js="alert('El Art&iacute;culo no esta Registrado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajunidad.'","'.$dato1.'",""],["'.$cajcosto.'","'.$dato2.'",""],["javascript","'.$js.'",""]]';
    }
    else  if ($this->getRequestParameter('ajax')=='3')
    {
      $lonmas = strlen(H::getObtener_FormatoCategoria());
      $dato=$js="";
      $codigo=$this->getRequestParameter('codigo');
      if ($lonmas==strlen($this->getRequestParameter('codigo'))){
        $p= new Criteria();      
        $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
        if ($categoriasusu!='') {
          $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
          $sql='npcatpre.codcat=\'' . $codigo . '\' and npcatpre.codcat in (select codcat from "SIMA_USER".segcatusu where loguse=\'' . $loguse . '\')';
          $p->add(NpcatprePeer::CODCAT,$sql,Criteria::CUSTOM);
        }else $p->add(NpcatprePeer::CODCAT,$codigo);
        $resul= NpcatprePeer::doSelectOne($p);
        if ($resul){        
            $dato=$resul->getNomcat();
        }else {
          if ($categoriasusu!='')
            $js="alert('La Unidad no esta Registrada o no esta asociada a su Usuario'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          else
            $js="alert('La Unidad no esta Registrada'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }
      }else {
        $js="alert('La Unidad no es de &Uacute;ltimo Nivel '); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      }   
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    }
    else  if ($this->getRequestParameter('ajax')=='4')
      {
        $filiscen=H::getConfApp2('filiscen', 'compras', 'almreq'); 
        $loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
        $codigo=$this->getRequestParameter('codigo');

        $q= new Criteria();
        if ($filiscen=='S')
        {
          $this->sql='cadefcen.codcen=\''.$codigo.'\' and cadefcen.codcen in (select codcen from "SIMA_USER".segcenusu where loguse=\''.$loguse.'\')';
          $q->add(CadefcenPeer::CODCEN,$this->sql,Criteria::CUSTOM);   
        }else $q->add(CadefcenPeer::CODCEN,$this->getRequestParameter('codigo'));
        $reg= CadefcenPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDescen(); $javascript="";
        }else {
            $dato="";
            $javascript="alert('El Centro de Costo no existe o no esta asociado al usuario'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
      else if ($this->getRequestParameter('ajax')=='5')
      {
         ////////////////////////////////////
        $datos=split('!',$this->getRequestParameter('codigo'));
  	$codalm=$datos[0];
  	$codart=$datos[1];
  	$cajtexmos=$datos[2];
        $codubi="";    
        if ($codalm!="")
        {
            $aux = split('_',$cajtexmos);
            $name=$aux[0];
            $fil=$aux[1];
            $cajtexcom=$name."_".$fil."_9";
            $cajcodubi=$name."_".$fil."_11";
            $cajnomubi=$name."_".$fil."_12";
            $c=new Criteria();
            $c->add(CadefalmPeer::CODALM,$codalm);
            $datos=CadefalmPeer::doSelectOne($c);
            if ($datos)
            {
               $nomalm=$datos->getNomalm();
               //busco la primera ubicacion para el almacen seleccionado, para el articulo tipeado
               $c = new Criteria();
               $c->add(CaartalmubiPeer::CODALM,$codalm);
               $c->add(CaartalmubiPeer::CODART,$codart);
               $c->addAscendingOrderByColumn(CaartalmubiPeer::CODUBI);
               $alm = CaartalmubiPeer::doSelectOne($c);
               if ($alm)
               {
                    $codubi=$alm->getCodubi();
                    $nomubi=CadefubiPeer::getDesubicacion($codubi);
                   $output = '[["'.$cajtexmos.'","'.$nomalm.'",""],["'.$cajcodubi.'","'.$codubi.'",""],["'.$cajnomubi.'","'.$nomubi.'",""]]';
               }
               else//el almacen seleccionado no existe para el articulo introducido por el usuario
               {
                    $javascript="alert('El articulo : ".$codart.", no existe en el Almacen seleccionado: ".$codalm." ');$('".$cajtexmos."').focus()";
                    $output = '[["'.$cajtexmos.'","",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
               }
             }
             else
             {
                $nomalm="";
                $javascript="alert('Codigo del Almacen no existe...')";
                $output = '[["'.$cajtexmos.'","'.$nomalm.'",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
             }// if ($datos)
        }// if ($codalm)           
   }
   else  if ($this->getRequestParameter('ajax')=='6')//Ubicación
   {
        $datos=split('!',$this->getRequestParameter('codigo'));
        $codubi=$datos[0];
        $codalm=$datos[1];
        $codart=$datos[2];
        $cajtexmos=$datos[3];
        if ($codart=="")
        {
	     $javascript="alert('Debe primero seleccionar el artículo');";
	     $output = '[["javascript","'.$javascript.'",""]]';
        }
        else
        {
            $aux = split('_',$cajtexmos);
            $name=$aux[0];
            $fil=$aux[1];
            $cajcodubi=$name."_".$fil."_11";
            $cajnomubi=$name."_".$fil."_12";
            if (trim($codalm)!="")
            {
               $c = new Criteria();
               $c->add(CaartalmubiPeer::CODALM,$codalm);
               $c->add(CaartalmubiPeer::CODUBI,$codubi);
               $c->add(CaartalmubiPeer::CODART,$codart);
               $alm = CaartalmubiPeer::doSelectOne($c);
               if ($alm)
               {
                    $dato=CadefubiPeer::getDesubicacion($codubi);
                    $javascript="";
               }
               else
               {
                     $javascript="alert('La ubicacion : ".$codubi.", no existe para el almacen seleccionado: ".$codalm." y el articulo ".$codart." ')";
                     $dato="";
                     $codubi="";
               }
              $output = '[["'.$cajnomubi.'","'.$dato.'",""],["'.$cajcodubi.'","'.$codubi.'",""],["javascript","'.$javascript.'",""]]';
           }
           else
           {
             $javascript="alert('Primero debe seleccionar un Almacen...');";
             $dato="";
             $codubi="";
             $output = '[["'.$cajnomubi.'","'.$dato.'",""],["'.$cajcodubi.'","'.$codubi.'",""],["javascript","'.$javascript.'",""]]';
           }
        }
   }
   else if ($this->getRequestParameter('ajax')=='7')
   {
       $javascript="";
       $dato="";
       $q= new Criteria();
       $q->add(CadefalmPeer::CODALM,$this->getRequestParameter('codigo'));
       $reg= CadefalmPeer::doSelectOne($q);
       if ($reg)
       {
           $dato=$reg->getNomalm();    
       }else {
          $javascript="alert_('El Almac&eacute;n no existe...'); $('careqart_codalm').value='';$('careqart_nomalm').value='';$('careqart_codalm').focus();";    
       }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
   }
   else if ($this->getRequestParameter('ajax')=='8')
   {
      $codalm=$this->getRequestParameter('codalm');
      $codubi=$this->getRequestParameter('codigo');
      $javascript=""; $dato="";
      if (trim($codalm)!="")
      {
          $t= new Criteria();
          $t->add(CadefubiPeer::CODUBI,$codubi);
          $reg= CadefubiPeer::doSelectOne($t);
          if ($reg)
          {
              if (Compras::verificarexistenciaubialm($codalm,$codubi))
              {
                  $dato=CadefubiPeer::getDesubicacion($codubi);              
              }
              else
              {
                $javascript="alert('La ubicacion : ".$codubi.", no existe para el Almacén seleccionado...');$('careqart_codubi').value='';$('careqart_nomubi').value='';$('careqart_codubi').focus();";            
              }
          }
          else
          {
            $javascript="alert('La ubicacion no existe ');$('careqart_codubi').value='';$('careqart_nomubi').value='';$('careqart_codubi').focus();";            
          }
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
      else
      {
         $javascript="alert('Primero debe seleccionar un Almacén ...');$('careqart_codubi').value='';$('careqart_nomubi').value='';$('careqart_codubi').focus();";        
         $output = '[["javascript","'.$javascript.'",""]]';
      }
    }elseif ($this->getRequestParameter('ajax')=='9'){
       $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir2=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
        $codigo=$this->getRequestParameter('codigo'); $js="";

      $q= new Criteria();
      if ($filsoldir2=='S'){
        $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
        $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
      }else $q->add(CadefdirecPeer::CODDIREC,$codigo);
      $reg= CadefdirecPeer::doSelectOne($q);
      if ($reg)
      {
         $dato=$reg->getDesdirec();         
      }else {
          $dato="";
          $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
          if ($cambiareti=='S')
            $js="alert_('La Estado no existe o no esta asociada al usuario'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
          else
           $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
      }
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    }elseif ($this->getRequestParameter('ajax')=='10'){
      $sw=false;
      $this->ajaxs=$this->getRequestParameter('ajax');
      $this->unidades = array();
      $javascript = "";
      $this->unidades = CaunialartPeer :: getUnidades($this->getRequestParameter('codigo'));
      $output = '[["javascript","' . $javascript . '",""]]';
    }elseif ($this->getRequestParameter('ajax')=='11'){
        $dateFormat = new sfDateFormat('es_VE');
        $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

        $c = new Criteria();
        $c->add(CareqartPeer::REQART, $this->getRequestParameter('reqart'));
        $data = CareqartPeer::doSelectOne($c);
        if ($data) {
          if ($fecha < $data->getFecreq()) {
            $msj = "alert_('La Fecha de Anulaci&oacute;n no puede ser menor a la fecha de la Requisición'); $('careqart_fecanu').value=''";
          } else {
            $msj = "";
          }
        } else {
          $msj = "";
        }
        $output = '[["javascript","' . $msj . '",""]]';
    }elseif ($this->getRequestParameter('ajax')=='12'){
      $sw=false;
      $this->ajaxs=$this->getRequestParameter('ajax');
      $codigo=$this->getRequestParameter('codigo');
      $q= new Criteria();
      $q->add(ManesttraPeer::CODEST,$codigo);
      $regq= ManesttraPeer::doSelectOne($q);
      if ($regq){
        $dato=$regq->getDesest();
        $javascript="";
      }else{
        $codigo="";
        $javascript="alert_('La Lista de Repuesto no esta registrada'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";
      }

      $this->configGrid($codigo);     
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","' . $javascript . '",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw) return sfView::HEADER_ONLY;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codest='')
  {
    if ($codest!=''){
      $per=array();
      $q= new Criteria();
      $q->add(MandetesttraPeer::CODEST,$codest);
      $regq= MandetesttraPeer::doSelect($q);
      if ($regq){
        foreach ($regq as $objq) {
          $caartreq_new= new Caartreq();
          $caartreq_new->setCodart($objq->getCodart());
          $caartreq_new->setCanreq($objq->getCanreq());
          $per[]=$caartreq_new;
        }
      }
    }else {
    $c = new Criteria();
    $c->add(CaartreqPeer::REQART,$this->careqart->getReqart());
    $per = CaartreqPeer::doSelect($c);
  }

	// Se crea el objeto principal de la clase OpcionesGrid
	$opciones = new OpcionesGrid();
	// Se configuran las opciones globales del Grid
	$opciones->setEliminar(true);
	$opciones->setTabla('Caartreq');
	$opciones->setAnchoGrid(1120);
  $opciones->setAncho(1120);
  $nfil=H::getConfApp2('numfilas', 'compras', 'almreq');
  if ($nfil!="")
    $opciones->setFilas($nfil);
  else 
	  $opciones->setFilas(50);
	$opciones->setTitulo('Detalle de la Orden de Requisición');
	$opciones->setHTMLTotalFilas(' ');

  $novalcat=H::getConfApp2('novalcat', 'compras', 'almreq');

      $obj= array ('codart' => '1','desart' =>'2', 'cosult' =>'7');
      $params= array('param1' =>  $this->longmasart);
	  // Se generan las columnas
	  $col1 = new Columna('Código  Artículo');
	  $col1->setTipo(Columna::TEXTO);
	  $col1->setEsGrabable(true);
	  $col1->setAlineacionObjeto(Columna::CENTRO);
	  $col1->setAlineacionContenido(Columna::CENTRO);
	  $col1->setNombreCampo('Codart');
	  $col1->setHTML('type="text" size="10" maxlength="'.chr(39).$this->longmasart.chr(39).'"');
	  $col1->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Almreq',$params);
	  $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39). $this->mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="javascript:event.keyCode=13; ajaxart(event,this.id);"');

	  $col2 = new Columna('Descripción');
	  $col2->setTipo(Columna::TEXTAREA);
	  $col2->setAlineacionObjeto(Columna::IZQUIERDA);
	  $col2->setAlineacionContenido(Columna::IZQUIERDA);
	  $col2->setNombreCampo('Desart');
	  $col2->setHTML('type="text" size="30x1" readonly=true');


      $obj2= array ('codcat' => '3','nomcat' =>'4');
      $params2= array('param1' =>  $this->longcat);
      $col3 = new Columna('Cod. Unidad');
      $col3->setTipo(Columna::TEXTO);
      $col3->setEsGrabable(true);
      $col3->setAlineacionObjeto(Columna::CENTRO);
      $col3->setAlineacionContenido(Columna::CENTRO);
      $col3->setNombreCampo('Codcat');
      $col3->setHTML('type="text" size="8" maxlength="'.chr(39).$this->longcat.chr(39).'"');
      $col3->setCatalogo('Npcatpre','sf_admin_edit_form',$obj2,'Npcatpre_Almreq',$params2);
      $col3->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39). $this->formatocategoria.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="javascript:event.keyCode=13; ajaxcat(event,this.id);"');
      if ($novalcat=='S') $col3->setOculta(true);

      $col4 = new Columna('Descripción');
      $col4->setTipo(Columna::TEXTAREA);
      $col4->setAlineacionObjeto(Columna::IZQUIERDA);
      $col4->setAlineacionContenido(Columna::IZQUIERDA);
      $col4->setNombreCampo('Nomcat');
      $col4->setHTML('type="text" size="25x1" readonly=true');
      if ($novalcat=='S') $col4->setOculta(true);

      $col5 = new Columna('Cant. Req.');
      $col5->setTipo(Columna::MONTO);
      $col5->setEsGrabable(true);
      $col5->setAlineacionContenido(Columna::IZQUIERDA);
      $col5->setAlineacionObjeto(Columna::IZQUIERDA);
      $col5->setNombreCampo('Canreq');
      $col5->setEsNumerico(true);
      $col5->setHTML('type="text" size="3"');
      $col5->setJScript('onKeypress="calcularcosto(event,this.id)"');

        $col6 = clone $col5;
        $col6->setTitulo('Cant. Rec.');
        $col6->setHTML('type="text" size="8" readonly=true');
        $col6->setNombreCampo('Canrec');

        $col7 = clone $col5;
        $col7->setTitulo('Costo');
        $col7->setHTML('type="text" size="8"');
        $col7->setNombreCampo('costo');
        $col7->setJScript('onKeypress="calcularcosto(event,this.id)"');

        $col8 = clone $col6;
        $col8->setTitulo('Total');
        $col8->setNombreCampo('Montot');
        $col8->setHTML('type="text" size="8" readonly=true');
        $col8->setEsTotal(true,'careqart_monreq');

        $manalmubi=H::getConfApp2('manalmubi', 'compras', 'almreq');
        
        $objalm= array ('codalm' => '9','nomalm' =>'10');
        $col9 = new Columna('Código del Almacén');
        $col9->setTipo(Columna::TEXTO);
        $col9->setAlineacionObjeto(Columna::CENTRO);
        $col9->setAlineacionContenido(Columna::CENTRO);
        $col9->setEsGrabable(true);
        $col9->setNombreCampo('codalm');
        $col9->setHTML('type="text" size="8" maxlength="6"');
        $col9->setCatalogo('Cadefalm','sf_admin_edit_form',$objalm,'Cadelfalm_Almordrec');
        $signo="-";
        $signomas="+";
        $col9->setJScript('onBlur="toAjax(5,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,8,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
        if ($manalmubi!="S")  $col9->setOculta(true);
        
        $col10 = new Columna('Nombre Almacén');
        $col10->setTipo(Columna::TEXTAREA);
        $col10->setEsGrabable(true);
        $col10->setNombreCampo('nomalm');
        $col10->setAlineacionObjeto(Columna::CENTRO);
        $col10->setAlineacionContenido(Columna::CENTRO);
        $col10->setHTML('type="text" size="15x1" readonly=true'); 
        if ($manalmubi!="S")  $col10->setOculta(true);
        
        $objubi= array ('codubi' => '11','nomubi' =>'12');
        $params = array("'+$(this.id).up().previous(1).descendants()[0].value+'",'val2');
        $col11 = new Columna('Código de Ubicación');
        $col11->setTipo(Columna::TEXTO);
        $col11->setAlineacionObjeto(Columna::CENTRO);
        $col11->setAlineacionContenido(Columna::CENTRO);
        $col11->setEsGrabable(true);
        $col11->setNombreCampo('codubi');
        $signo="-";
        $signomas="+";
        $mascaraubi=Herramientas::ObtenerFormato('Cadefart','Forubi');
        $col11->setHTML('type="text" size="8" maxlength="'.chr(39).strlen($mascaraubi).chr(39).'"');
        $col11->setCatalogo('Cadefubi','sf_admin_edit_form',$objubi,'Cadefubi_Almdes',$params);
        $col11->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubi.chr(39).')"  onBlur="toAjax(6,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,2,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,10,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
        if ($manalmubi!="S")  $col11->setOculta(true);
        
        $col12 = new Columna('Nombre Ubicación');
        $col12->setTipo(Columna::TEXTAREA);
        $col12->setEsGrabable(true);
        $col12->setNombreCampo('nomubi');
        $col12->setAlineacionObjeto(Columna::CENTRO);
        $col12->setAlineacionContenido(Columna::CENTRO);
        $col12->setHTML('type="text" size="8x1" readonly=true');
        if ($manalmubi!="S")  $col12->setOculta(true);

        $manunialt=H::getConfApp2('manunialt','compras','almregart');
        if ($manunialt=='S' && $this->careqart->getId()=='')
        {
        $col13 = new Columna('Unidad Medida');
        $col13->setTipo(Columna::COMBO);
        $col13->setEsGrabable(true);
        $col13->setCombo(CaunialartPeer::getUnidades());
        $col13->setNombreCampo('unimed');
        $col13->setHTML('');
        }else {
        $col13 = new Columna('Unidad de Medida');
        $col13->setTipo(Columna::TEXTO);
        $col13->setNombreCampo('unimed');
        $col13->setEsGrabable(false);
        $col13->setAlineacionObjeto(Columna::CENTRO);
        $col13->setAlineacionContenido(Columna::CENTRO);
        $col13->setHTML('type="text" size="20" readonly=true');
      }

        // Se guardan las columnas en el objetos de opciones
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
        $opciones->addColumna($col7);
        $opciones->addColumna($col8);
        $opciones->addColumna($col9);
        $opciones->addColumna($col10);
        $opciones->addColumna($col11);
        $opciones->addColumna($col12);        
        $opciones->addColumna($col13); 

      // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($per);
  }

  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveCareqart($careqart)
  {
    $nuevo=$careqart->getId();
  	// Si en el parametro reqreqapr  de Cadefart, no requiere que la requisicion esta aprobada para despacharla
  	// entonces de una vez grabo la requisicion como aprobada
     if ($careqart->getId() && ($careqart->getAprreq()=='S' || (Herramientas::getHay_Despacho($careqart->getReqart()))))
     {
       $careqart->save();
     }else {
  	 if ($this->autorizareq=="") $careqart->setAprreq('S');

         $grid=Herramientas::CargarDatosGrid($this,$this->obj);
         Articulos::salvarAlmreqart($careqart,$grid);
     }
     $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
     if ($this->getUser()->getAttribute('formulario')!='' && $modulo=='mantenimiento'){
      $this->getUser()->getAttributeHolder()->remove('referencia');
      $this->getUser()->setAttribute('referencia', $careqart->getReqart(), $this->getUser()->getAttribute('formulario'));
      $this->redirect('almreq/salvarOrden?id='.$nuevo);
     }else return -1;
  }

  public function executeSalvarOrden()
  {
    $this->resp=$this->getRequestParameter('id');
    $this->idreffila=$this->getUser()->getAttribute('idfilareq');
    $this->ref=$this->getUser()->getAttribute('referencia',null,$this->getUser()->getAttribute('formulario'));
    sfView::SUCCESS;
  }

  public function executeDelete()
  {
    $this->careqart = CareqartPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->careqart);

    try
    {
      $this->deleteCareqart($this->careqart);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('almreq', 'list');
    }

    return $this->forward('almreq', 'list');
  }

  protected function deleteCareqart($careqart)
  {
    if (!Herramientas::getHay_Despacho($this->careqart->getReqart()))
    {      
      Herramientas::EliminarRegistro('Caartreq','reqart',$this->careqart->getReqart());
      $careqart->delete();
    }else{
      $err = Herramientas::obtenerMensajeError(2100);
      $this->getRequest()->setError('delete', $err);
    }
  }

  public function setVars()
  {
    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
    $this->longmasart=strlen($this->mascaraarticulo);
    $this->formatocategoria = Herramientas::getObtener_FormatoCategoria();
    $this->longcat=strlen($this->formatocategoria);
    $catubibnu=H::getConfApp2('catubibnu', 'compras', 'almreq');
    if ($catubibnu=='S') {
    $this->forubi = Herramientas::ObtenerFormato('Opdefemp','Forubi');//Herramientas::ObtenerFormato('Bndefins','forubi');
    $this->lonubi= strlen($this->forubi);//Herramientas::ObtenerFormato('Bndefins','lonubi');
    }else {
        $this->forubi = Herramientas::ObtenerFormato('Bndefins','forubi');
        $this->lonubi= strlen($this->forubi);
    }
    $this->autorizareq= Herramientas::ObtenerFormato('Cadefart','reqreqapr');
    $varemp = $this->getUser()->getAttribute('configemp');
    $this->numdesh="";
    $this->mansolocor="";
    $this->bloqfec="";
    $this->oculeli="";
    $this->cambiaretiuni="";
    $this->nometiuni="";
	if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almreq',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('reqartdesh',$varemp['aplicacion']['compras']['modulos']['almreq']))
	       {
	       	$this->numdesh=$varemp['aplicacion']['compras']['modulos']['almreq']['reqartdesh'];
	       }
           if(array_key_exists('mansolocor',$varemp['aplicacion']['compras']['modulos']['almreq']))
	       {
	       	$this->mansolocor=$varemp['aplicacion']['compras']['modulos']['almreq']['mansolocor'];
	       }
	       if(array_key_exists('bloqfec',$varemp['aplicacion']['compras']['modulos']['almreq']))
	       {
	       	$this->bloqfec=$varemp['aplicacion']['compras']['modulos']['almreq']['bloqfec'];
	       }
	       if(array_key_exists('oculeli',$varemp['aplicacion']['compras']['modulos']['almreq']))
	       {
	       	$this->oculeli=$varemp['aplicacion']['compras']['modulos']['almreq']['oculeli'];
	       }
	       if(array_key_exists('cambiaretiuni',$varemp['aplicacion']['compras']['modulos']['almreq']))
	       {
	       	$this->cambiaretiuni=$varemp['aplicacion']['compras']['modulos']['almreq']['cambiaretiuni'];
	       }
	       if(array_key_exists('nometiuni',$varemp['aplicacion']['compras']['modulos']['almreq']))
	       {
	       	$this->nometiuni=$varemp['aplicacion']['compras']['modulos']['almreq']['nometiuni'];
	       }
	     }
  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->careqart = $this->getCareqartOrCreate();

    try{
	    $this->updateCareqartFromRequest();
    }

    catch(Exception $ex){}

	$this->setVars();
	$this->configGrid();
        $grid=Herramientas::CargarDatosGrid($this,$this->obj);

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
      {
	    if($this->coderror!=-1)
		  {
		   $err = Herramientas::obtenerMensajeError($this->coderror);
		   $this->getRequest()->setError('',$err);
		  }
      }
    return sfView::SUCCESS;
  }

   public function ValidarDatosVaciosenGrid($grid,&$error)
   {
      $error=-1;
      $x=$grid[0];
      $j=0;
      $codcatvacio=false;

      if (count($x)==0)
      {
         $error=178;
         return true;
      }

      $novalcat=H::getConfApp2('novalcat', 'compras', 'almreq');

      while ($j<count($x) && !$codcatvacio)
      {
        if (trim($x[$j]->getCodart())!="")
        {
          if ($novalcat!='S') {
  	        if (trim($x[$j]->getCodcat())=="")
  	        {
  	          $codcatvacio=true;
  	          $error=179;
  	        }
          }

	        if ($x[$j]->getCanreq()==0)
	        {
	          $codcatvacio=true;
	          $error=1011;
	        }
        }
        $j++;
      } //while ($j<count($x))

      if ($codcatvacio)
        return true;
      else
        return false;
  }

  public function executeAutoriza()
  {
     $careqart = CareqartPeer::retrieveByPk($this->getRequestParameter('id'));
     $careqart->setAprreq('S');
     $careqart->save();
     $javascript="alert('La Requisición fue aprobada satisfactoriamente')";
     $output = '[["javascript","'.$javascript.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;

   }

  /*protected function getLabels()
  {
    $this->cambiaretiuni="";
    $this->nometiuni="";
    $varemp = $this->getUser()->getAttribute('configemp');
	if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almreq',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('cambiaretiuni',$varemp['aplicacion']['compras']['modulos']['almreq']))
	       {
	       	$this->cambiaretiuni=$varemp['aplicacion']['compras']['modulos']['almreq']['cambiaretiuni'];
	       }
	       if(array_key_exists('nometiuni',$varemp['aplicacion']['compras']['modulos']['almreq']))
	       {
	       	$this->nometiuni=$varemp['aplicacion']['compras']['modulos']['almreq']['nometiuni'];
	       }
	     }
       $nometimot=H::getConfApp2('nometimot', 'compras', 'almreq');

  	if ($this->cambiaretiuni=='S'){
    return array(
      'careqart{reqart}' => 'Número:',
      'careqart{fecreq}' => 'Fecha:',
      'careqart{desreq}' => 'Descripción:',
      'careqart{monreq}' => 'Monto:',
      'careqart{codcatreq}' => $this->nometiuni,
      'careqart{desubi}' => 'Descripción Unidad:',
      'careqart{codcen}' => 'Centro de Costo:',
      'careqart{codalm}' => 'Almacén:',
      'careqart{codubi}' => 'Ubicación:',
      'careqart{motivo}' => 'Motivo:',
    );
  	}else{
  	return array(
      'careqart{reqart}' => 'Número:',
      'careqart{fecreq}' => 'Fecha:',
      'careqart{desreq}' => 'Descripción:',
      'careqart{monreq}' => 'Monto:',
      'careqart{codcatreq}' => 'Unidad:',
      'careqart{desubi}' => 'Descripción Unidad:',
      'careqart{codcen}' => 'Centro de Costo:',
      'careqart{codalm}' => 'Almacén:',
      'careqart{codubi}' => 'Ubicación:',
      'careqart{motivo}' => 'Motivo:',
    );
  	}
  }*/

  public function getLabels()
  {
    $labels = parent::getLabels();
  
    $cambiaretimot=H::getConfApp2('cambiaretimot', 'compras', 'almreq');
    $cambiaretiuni=H::getConfApp2('cambiaretiuni', 'compras', 'almreq');
    $nometiuni=H::getConfApp2('nometiuni', 'compras', 'almreq');
    if ($cambiaretiuni=='S')
      $labels['careqart{codcatreq}'] = $nometiuni;

    if ($cambiaretimot=='S')
      $labels['careqart{motivo}'] = 'Destino';
    
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['careqart{coddirec}'] = 'Estado';

    return $labels;
  }
  
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['reqart_is_empty']))
    {
      $criterion = $c->getNewCriterion(CareqartPeer::REQART, '');
      $criterion->addOr($c->getNewCriterion(CareqartPeer::REQART, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['reqart']) && $this->filters['reqart'] !== '')
    {
      $c->add(CareqartPeer::REQART, '%'.strtr($this->filters['reqart'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fecreq_is_empty']))
    {
      $criterion = $c->getNewCriterion(CareqartPeer::FECREQ, '');
      $criterion->addOr($c->getNewCriterion(CareqartPeer::FECREQ, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecreq']))
    {
      if (isset($this->filters['fecreq']['from']) && $this->filters['fecreq']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(CareqartPeer::FECREQ, date('Y-m-d', $this->filters['fecreq']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecreq']['to']) && $this->filters['fecreq']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(CareqartPeer::FECREQ, date('Y-m-d', $this->filters['fecreq']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(CareqartPeer::FECREQ, date('Y-m-d', $this->filters['fecreq']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['desreq_is_empty']))
    {
      $criterion = $c->getNewCriterion(CareqartPeer::DESREQ, '');
      $criterion->addOr($c->getNewCriterion(CareqartPeer::DESREQ, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desreq']) && $this->filters['desreq'] !== '')
    {
      $c->add(CareqartPeer::DESREQ, '%'.strtr($this->filters['desreq'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codcen_is_empty']))
    {
      $criterion = $c->getNewCriterion(CareqartPeer::CODCEN, '');
      $criterion->addOr($c->getNewCriterion(CareqartPeer::CODCEN, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcen']) && $this->filters['codcen'] !== '')
    {
      $loguse= $this->getUser()->getAttribute('loguse');
      $filiscen=H::getConfApp2('filiscen', 'compras', 'almreq');
      if ($filiscen=='S') {
        $codigocen='%'.strtr($this->filters['codcen'], '*', '%').'%';
        $this->sql='careqart.CODCEN ILIKE \''.$codigocen.'\'  AND careqart.codcen in (select codcen from "SIMA_USER".segcenusu where loguse=\''.$loguse.'\')';
        $c->add(CareqartPeer::CODCEN,$this->sql,Criteria::CUSTOM);      
      }else $c->add(CareqartPeer::CODCEN, '%'.strtr($this->filters['codcen'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['descen_is_empty']))
    {
      $criterion = $c->getNewCriterion(CareqartPeer::DESCEN, '');
      $criterion->addOr($c->getNewCriterion(CareqartPeer::DESCEN, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['descen']) && $this->filters['descen'] !== '')
    {
      $loguse= $this->getUser()->getAttribute('loguse');
      $filiscen=H::getConfApp2('filiscen', 'compras', 'almreq');
      if ($filiscen=='S') {
        $descrcen='%'.strtr($this->filters['descen'], '*', '%').'%';
        $this->sql='cadefcen.DESCEN ILIKE \''.$descrcen.'\'  AND careqart.codcen in (select codcen from "SIMA_USER".segcenusu where loguse=\''.$loguse.'\')';
        $c->add(CareqartPeer::CODCEN,$this->sql,Criteria::CUSTOM);      
        $c->addJoin(CareqartPeer::CODCEN, CadefcenPeer::CODCEN);
      }else {
          $c->add(CadefcenPeer::DESCEN, '%'.strtr($this->filters['descen'], '*', '%').'%', Criteria::LIKE);
          $c->addJoin(CareqartPeer::CODCEN, CadefcenPeer::CODCEN);
      }
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['stareq_is_empty']))
    {
      $criterion = $c->getNewCriterion(CareqartPeer::STAREQ, '');
      $criterion->addOr($c->getNewCriterion(CareqartPeer::STAREQ, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['stareq']) && $this->filters['stareq'] !== '')
    {
      $c->add(CareqartPeer::STAREQ, '%'.strtr($this->filters['stareq'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codcatreq_is_empty']))
    {
      $criterion = $c->getNewCriterion(CareqartPeer::CODCATREQ, '');
      $criterion->addOr($c->getNewCriterion(CareqartPeer::CODCATREQ, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcatreq']) && $this->filters['codcatreq'] !== '')
    {
      $c->add(CareqartPeer::CODCATREQ, '%'.strtr($this->filters['codcatreq'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['desubi_is_empty']))
    {
      $criterion = $c->getNewCriterion(CareqartPeer::DESUBI, '');
      $criterion->addOr($c->getNewCriterion(CareqartPeer::DESUBI, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desubi']) && $this->filters['desubi'] !== '')
    {
      $c->add(BnubibiePeer::DESUBI,'%'.strtr($this->filters['desubi'], '*', '%').'%', Criteria::LIKE);
      $c->addJoin(CareqartPeer::CODCATREQ, BnubibiePeer::CODUBI);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codalm_is_empty']))
    {
      $criterion = $c->getNewCriterion(CareqartPeer::CODALM, '');
      $criterion->addOr($c->getNewCriterion(CareqartPeer::CODALM, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codalm']) && $this->filters['codalm'] !== '')
    {
      $c->add(CaartreqPeer::CODALM, '%'.strtr($this->filters['codalm'], '*', '%').'%', Criteria::LIKE);
      $c->addJoin(CareqartPeer::REQART, CaartreqPeer::REQART);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomalm_is_empty']))
    {
      $criterion = $c->getNewCriterion(CareqartPeer::NOMALM, '');
      $criterion->addOr($c->getNewCriterion(CareqartPeer::NOMALM, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomalm']) && $this->filters['nomalm'] !== '')
    {
      $c->add(CadefalmPeer::NOMALM, '%'.strtr($this->filters['nomalm'], '*', '%').'%', Criteria::LIKE);
      $c->addJoin(CaartreqPeer::CODALM, CadefalmPeer::CODALM);
      $c->addJoin(CareqartPeer::REQART, CaartreqPeer::REQART);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codubi_is_empty']))
    {
      $criterion = $c->getNewCriterion(CareqartPeer::CODUBI, '');
      $criterion->addOr($c->getNewCriterion(CareqartPeer::CODUBI, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codubi']) && $this->filters['codubi'] !== '')
    {
      $c->add(CaartreqPeer::CODUBI, '%'.strtr($this->filters['codubi'], '*', '%').'%', Criteria::LIKE);
      $c->addJoin(CareqartPeer::REQART, CaartreqPeer::REQART);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomubi_is_empty']))
    {
      $criterion = $c->getNewCriterion(CareqartPeer::NOMUBI, '');
      $criterion->addOr($c->getNewCriterion(CareqartPeer::NOMUBI, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomubi']) && $this->filters['nomubi'] !== '')
    {
      $c->add(CadefubiPeer::NOMUBI, '%'.strtr($this->filters['nomubi'], '*', '%').'%', Criteria::LIKE);
      $c->addJoin(CaartreqPeer::CODUBI, CadefubiPeer::CODUBI);
      $c->addJoin(CareqartPeer::REQART, CaartreqPeer::REQART);
      $c->setIgnoreCase(true);
    }
  }

  public function executeAnular() {
    $reqart = $this->getRequestParameter('reqart');
    $fecreq = $this->getRequestParameter('fecreq');

    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecreq, 'i', $dateFormat->getInputPattern('d'));

    $c = new Criteria();
    $c->add(CareqartPeer::REQART, $reqart);
    $c->add(CareqartPeer::FECREQ, $fec);
    $this->careqart = CareqartPeer::doSelectOne($c);
    sfView :: SUCCESS;
  }  

  public function executeSalvaranu() {
    $reqart = $this->getRequestParameter('reqart');
    $desanu = $this->getRequestParameter('desanu');
    $fecanu = $this->getRequestParameter('fecanu');
    $fecha_aux = split("/", $fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
    $this->msg = "";
    $this->mensaje2="";

    $c = new Criteria();
    $c->add(CareqartPeer::REQART, $reqart);
    $resul = CareqartPeer::doSelectOne($c);
    if ($resul) {           
       if (!Herramientas::getHay_Despacho($reqart))
       {
        $resul->setFecanu($fec);
        $resul->setDesanu($desanu);
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $resul->setUsuanu($loguse);
        $resul->setStareq('N');
        $resul->save();        
      }else {
        $this->mensaje2 = Herramientas::obtenerMensajeError(2100);
        return sfView::SUCCESS;
      }
    }    
    return sfView :: SUCCESS;
  }
}
