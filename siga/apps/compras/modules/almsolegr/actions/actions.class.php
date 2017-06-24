<?php

/**
 * almsolegr actions.
 *
 * @package    Roraima
 * @subpackage almsolegr
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almsolegrActions extends autoalmsolegrActions
{
  public  $coderror1=-1;
  public  $coderror2=-1;
  public  $coderror3=-1;
  public  $codigo1=-1;
  public  $codigo2=-1;
  public  $codigo3=-1;
  public $codeerror=-1;
  public $razonvacia=-1;
  public $salvarrecar=-1;
  public $detallevacia=-1;
  public  $coderror=-1;
  public  $fecper=-1;
  public  $fecperfis=-1;






  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST && $this->getRequestParameter('modifi')=='S')
    {
      $this->casolart = $this->getCasolartOrCreate();
      try{ $this->updateCasolartFromRequest();}
      catch (Exception $ex){}
      $tieprc = Herramientas::getX_vacio('refprc','cpprecom','refprc',$this->casolart->getReqart());
      if ($tieprc!='')
      {
        $this->codeerror=3003;
        return false;
      }

      $maxcomut= H::getConfApp2('maxcomut', 'compras', 'almsolegr');
       if($maxcomut=='S' && !$this->casolart->getId()){
          $valunitri=H::toFloat(H::getX_vacio('CODEMP','Opdefemp','unitri','001'));
          $canunitri=0;
          $q= new Criteria();
          $q->add(CaunitridirPeer::CODDIREC,$this->getRequestParameter('casolart[coddirec]'));
          $q->addDescendingOrderByColumn(CaunitridirPeer::FECVIG);
          $reg= CaunitridirPeer::doSelectOne($q);
          if ($reg)
          {
             $canunitri=$reg->getCanunitri();
          }
          $monto=$canunitri*$valunitri;
          if (H::toFloat($this->getRequestParameter('casolart[monreq]'))>H::toFloat($monto))
          {
            $this->codeerror=3008;
            return false;
          }
       }

       $indetiqueta= H::getConfApp2('indetiqueta', 'compras', 'almsolegr');
       if($indetiqueta=='S'){
           if ($this->getRequestParameter('casolart[motreq]')=="")
           {
             $this->codeerror=2102;
             return false;
          }else{
              return true;
          }
       }

		if ($this->casolart->getId())      //Validacion que permite guardar solamente la descripcion
		{
			$refsol = Herramientas::getX_vacio('refsol','caordcom','refsol',$this->casolart->getReqart());
			if (!empty($refsol))
			{
				return true;
			}
      $refsol = Herramientas::getX_vacio('refsol','cacotiza','refsol',$this->casolart->getReqart());
			if ($refsol!="")
			{
		    $this->codeerror=828;
        return false;
		  }
		}

    $valfecultreg= H::getConfApp2('valfecultreg', 'compras', 'almsolegr');
    if ($valfecultreg=='S' && !$this->casolart->getId())
    {
       $t= new Criteria();
       $t->setLimit(1);
       $t->add(CasolartPeer::TIPREQ,$this->getRequestParameter('casolart[tipreq]'));
       $t->addDescendingOrderByColumn(CasolartPeer::FECREQ);
       $reg= CasolartPeer::doSelectOne($t);
       if ($reg)
       {
          $dateFormat = new sfDateFormat('es_VE');
          $fecha = $dateFormat->format($this->getRequestParameter('casolart[fecreq]'), 'i', $dateFormat->getInputPattern('d'));
          if ($fecha<$reg->getFecreq()) {
            $this->codeerror=2106;
            return false;
          }

       }
    }

    $manevento=H::getConfApp2('manevento', 'compras', 'almsolegr');
    if ($manevento=='S' && !$this->casolart->getId())
    {
      if ($this->getRequestParameter('casolart[codeve]')==''){
        $this->codeerror=2108;
        return false;
     }
    }

      $valmonmay0= H::getConfApp2('valmonmay0', 'compras', 'almsolegr');

      $this->configGridDetalle();
      $this->configGridRecargo($this->casolart->getReqart());
      $this->configGridRazon();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
      $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
      if (!Herramientas::validarPeriodoPresuesto($this->casolart->getFecreq()))
      {
       $this->fecper=142;
       return false;
      }

      if (!Herramientas::validarPeriodoFiscal($this->casolart->getFecreq()))
      {
        $this->fecperfis=143;
        return false;
      }
      if (count($grid[0])==0)
      {
      	$this->detallevacia=128;
      	return false;
      }

			 //Validad Unidad Responsable
			  $this->catbnubica="";
			    $varemp = $this->getUser()->getAttribute('configemp');
			    if ($varemp)
				if(array_key_exists('aplicacion',$varemp))
				 if(array_key_exists('compras',$varemp['aplicacion']))
				   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
				     if(array_key_exists('almsolegr',$varemp['aplicacion']['compras']['modulos'])){
				       if(array_key_exists('catbnubica',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
				       {
				       	$this->catbnubica=$varemp['aplicacion']['compras']['modulos']['almsolegr']['catbnubica'];
				       }
			     }
		      if ($this->catbnubica=='S')
		      {
		      	$p= new Criteria();
		      	$p->add(BnubicaPeer::CODUBI,$this->getRequestParameter('casolart[unires]'));
		      	$reg= BnubicaPeer::doSelectOne($p);
		      	if (!$reg) {
		      	$this->razonvacia=127;
		      	return false;
		      	}
		      }else {
		      	$p= new Criteria();
		      	$p->add(NpcatprePeer::CODCAT,$this->getRequestParameter('casolart[unires]'));
		      	$reg= NpcatprePeer::doSelectOne($p);
		      	if (!$reg) {
		      	$this->razonvacia=127;
		      	return false;
		      	}
		      }

		    /*  if ((count($grid2[0])>0) && ($this->getUser()->getAttribute('presiono','','almsolegr'))!='S')
		      {
		      	$this->salvarrecar=138;
		      	return false;
		      }*/

       if ($valmonmay0=='S')
       {
          $x=$grid[0];
            $j=0;
            while ($j<count($x))
            {
              if ($x[$j]->getCodart()!='' && $x[$j]->getCanreq()==0)
              {
                $this->codeerror=826;
               return false;
              }
              $j++;
            }
       }
                       
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        if ($x[$j]->getCodart()!='')
        {
         if ($x[$j]->getCodpre()!='')
        {
          $c= new Criteria();
          $c->add(NppartidasPeer::CODPAR,$x[$j]->getCodpre());
          $result= NppartidasPeer::doSelectOne($c);
          if (!$result)
          { 
            $this->coderror1=99;
            $this->codigo1=$x[$j]->getCodart();
            return false;
          }
          if ($x[$j]->getCodigopre()!='')          
          {
            $c1= new Criteria();
            $c1->add(CpdeftitPeer::CODPRE,$x[$j]->getCodigopre());
            $result1= CpdeftitPeer::doSelectOne($c1);
            if (!$result1)
            { 
              $this->coderror2=112;
              $this->codigo2=$x[$j]->getCodart();
              return false;
            }

            $c2= new Criteria();
            $c2->add(CpasiiniPeer::CODPRE,$x[$j]->getCodigopre());
            $c2->add(CpasiiniPeer::PERPRE,'00');
            $c2->add(CpasiiniPeer::MONASI,0,Criteria::GREATER_EQUAL);
            $result2= CpasiiniPeer::doSelectOne($c2);
            if (!$result2)
            { 
              $this->coderror2=512;
              $this->codigo2=$x[$j]->getCodart();
              return false;
            }
          }
        }
                                }
        $j++;
      }                      


       $x=$grid[0];
       $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
       $j=0;
       
       if (count($x))
       {
          while ($j<count($x))
          {
              if ($x[$j]->getCodart()!="")
              {     $i=0;
                    while ($i<count($x))
                    {
                      if ($j!=$i)
                      {
                        if ($claartdes=='S') {
                            $clave1=$x[$j]->getCodart().'-'.trim(strtoupper($x[$j]->getDesartsol())).'-'.$x[$j]->getCodcat();
                            $clave2=$x[$i]->getCodart().'-'.trim(strtoupper($x[$i]->getDesartsol())).'-'.$x[$i]->getCodcat();
                        }else {
                            $clave1=$x[$j]->getCodart().'-'.$x[$j]->getCodcat();
                            $clave2=$x[$i]->getCodart().'-'.$x[$i]->getCodcat();
                        }

                        if ($clave1==$clave2) {
                            $this->codeerror=829;
                            return false;
                        }
                      }
                      $i++;
                    }
              }
            $j++;
          }
       }

       $valpartidaiguales=H::getConfApp2('valparigua', 'compras', 'almsolegr');
       if ($valpartidaiguales=='S')
       {
           $x=$grid[0];
           $j=0;
           if (count($x))
           {
             $partida=$x[0]->getCodpre();
                while ($j<count($x))
                {
                  if ($x[$j]->getCodpre()!=$partida)
                  {
                    $this->codeerror=827;
                   return false;
                  }
                  $j++;
                }
           }
       }

		   $t= new Criteria();
		   $result= CadefartPeer::doSelectOne($t);
		   if ($result) {		      
		     if($result->getPrcasopre()=='S' && $result->getPrcreqapr()!='S') {
            if (!Herramientas::validarPeriodoPresuesto($this->getRequestParameter('casolart[fecreq]')))
            {
              $this->codeerror=142;
              return false;
            }

  		      if (count($grid[0])!=0 || count($grid2[0])!=0)
  		      {
              SolicituddeEgresos::validarAlmsolegr($this->casolart,$grid,$grid2,$this->getRequestParameter('id'),$this->getRequestParameter('tiporecarg'),$msj1,$cod1,$msj2,$cod2,$msj3,$cod3);
              $this->coderror1=$msj1;
              $this->coderror2=$msj2;
              $this->coderror3=$msj3;
              $this->codigo1=$cod1;
              $this->codigo2=$cod2;
              $this->codigo3=$cod3;
              if ($this->coderror1<>-1 || $this->coderror2<>-1 || $this->coderror3<>-1)
              {
               return false;
              }else return true;
  		      }
		     }else return true;
		   }else return true;
    }else return true;
    
    return true;
   }

  public function executeCreate()
  {
    $c= new Criteria();
    $monedas=TsdesmonPeer::doSelectOne($c);
    if (!$monedas)
    {
      $this->getRequest()->setError('valida', 'Debe registrar al menos un Tipo de Moneda.');
      return $this->forward('almsolegr', 'list');
    }
    else {
        $o= new Criteria();
        $o->add(OpdefempPeer::CODEMP,'001');
        $defmon=OpdefempPeer::doSelectOne($o); 
        if ($defmon) {
          if ($defmon->getCodmon()=='') {
            $this->getRequest()->setError('valida', 'Debe definir en el Modulo de Tesoreria -> Empresa la Moneda Oficial.');
            return $this->forward('almsolegr', 'list');
          }
        }
    }
    $d= new Criteria();
    $tipfin=FortipfinPeer::doSelectOne($d);
    if (!$tipfin)
    {
      $this->getRequest()->setError('valida', 'Debe definir al menos un Tipo de Finaciamiento.');
      return $this->forward('almsolegr', 'list');
    }
    $e= new Criteria();
    $defart=CadefartPeer::doSelectOne($e);
    if ($defart)
    {
    	if ($defart->getPrcasopre()=='S')
    	{
    	  if ($defart->getTipdocpre()=="")
    	  {
    	  	$this->getRequest()->setError('valida', 'Debe definir el Tipo de Documento de Precompromiso a la Solictud de Egresos.');
            return $this->forward('almsolegr', 'list');
    	  }
    	}
    }

    return $this->forward('almsolegr', 'edit');
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
    {
      $this->casolart = $this->getCasolartOrCreate();
      $this->moneda= Herramientas::cargarMoneda();
      $this->listatipo = Constantes::ListaTipoCompra();
      $this->setVars();
      if (!$this->casolart->getId()){        
        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
        if ($filsoldir=='S'){
           $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
           $t= new Criteria();
           $t->add(SegdirusuPeer::LOGUSE,$loguse);
           $t->setLimit(1);
           $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
           $regt= SegdirusuPeer::doSelectOne($t); 
           if ($regt){
            if ($this->casolart->getCoddirec()=='')
              $this->casolart->setCoddirec($regt->getCoddirec());
           }
          
        }
      }
      $c=new Criteria();
      $c->add(CpcomproPeer::STACOM,'N',Criteria::NOT_EQUAL);
      $c->add(CpcomproPeer::REFPRC,$this->casolart->getReqart());
      $trajo= CpcomproPeer::doSelectOne($c);
      if ($trajo)
      {$this->haydespacho='S';}else {$this->haydespacho='N';}

      $c=new Criteria();
      $c->add(CacotizaPeer::REFSOL,$this->casolart->getReqart());
      $trajo2= CacotizaPeer::doSelect($c);
      if ($trajo2)
      {$this->cotiz='S';}else {$this->cotiz='N';}
      $sql="SELECT coalesce(SUM(CANORD),0) as CANORD FROM CAARTSOL WHERE REQART='".$this->casolart->getReqart()."'";
      if (Herramientas::BuscarDatos($sql,$result))
      {
      	if ($result[0]['canord']==0)
      	{$this->modifico='S';}else {$this->modifico='N';}
      }
      if ($this->modifico=='S')
      { $this->configGridDetalle(); $this->configGridRecargo($this->casolart->getReqart()); $this->configGridRazon();}
      else { $this->configGridDetalleConsulta(); $this->configGridRecargoConsulta(); $this->configGridRazonConsulta();}


      if ($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->updateCasolartFromRequest();
		$save = $this->saveCasolart($this->casolart);
        if ($save==-1)
        {
	        $this->casolart->setId(Herramientas::getX_vacio('reqart','casolart','id',$this->casolart->getReqart()));

	        $this->setFlash('notice', 'Your modifications have been saved');

	        $this->Bitacora('Guardo');

	         $c= new Criteria();
		     $resul=CadefartPeer::doSelectOne($c);
		     if ($resul)
		     {
		       if($resul->getPrcasopre()=='S' && $resul->getPrcreqapr()!='S')
		       {
                        $m1=H::toFloat($this->casolart->getMonreq());
                        $m2=H::toFloat($this->casolart->getValmon(),6);
		        $totaimp=round(SolicituddeEgresos::totalImputacion($this->casolart->getReqart())/$m2,2);
		        if ($m1!=$totaimp)
		        {
		        	$this->setFlash('notice', 'El Monto de la Imputaciones Generadas no es igual al de la Solicitud, Por favor verificar esta solicitud');
		        }
		       }
		     }


	        if ($this->getRequestParameter('save_and_add'))
	        {
	          return $this->redirect('almsolegr/create');
	        }
	        else if ($this->getRequestParameter('save_and_list'))
	        {
	          return $this->redirect('almsolegr/list');
	        }
	        else
	        {
	          return $this->redirect('almsolegr/edit?id='.$this->casolart->getId());
	        }
       } else if ($save==-11){

	        $this->setFlash('notice', 'Se ha guardado solamente la Descripcion ya que la solicitud tiene asociada una Orden de Compra.');
	        $this->Bitacora('Guardo');

	        if ($this->getRequestParameter('save_and_add'))
	        {
	          return $this->redirect('almsolegr/create');
	        }
	        else if ($this->getRequestParameter('save_and_list'))
	        {
	          return $this->redirect('almsolegr/list');
	        }
	        else
	        {
	          return $this->redirect('almsolegr/edit?id='.$this->casolart->getId());
	        }

       }else{

          $this->labels = $this->getLabels();
          $err = Herramientas::obtenerMensajeError($this->coderror);
       	  $this->getRequest()->setError('',$err);
          return sfView::SUCCESS;
       }
      }
      else
      {
        $this->labels = $this->getLabels();
    //    $this->getUser()->getAttributeHolder()->remove('presiono','almsolegr');
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
      $this->casolart = $this->getCasolartOrCreate();

      try{
      	$this->updateCasolartFromRequest();
      	}
      catch (Exception $ex){}

      $this->setVars();
      $this->configGridDetalle();
      $this->configGridRecargo($this->casolart->getReqart());
      $this->configGridRazon();
      Herramientas::CargarDatosGridv2($this,$this->obj);
      Herramientas::CargarDatosGridv2($this,$this->obj2);
      Herramientas::CargarDatosGridv2($this,$this->obj3);


      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        if($this->coderror1!=-1)
        {
         $err = Herramientas::obtenerMensajeError($this->coderror1);
         $this->getRequest()->setError('',$err.'  ->  '.$this->codigo1);
        }

        if($this->coderror2!=-1)
        {
         $err1 = Herramientas::obtenerMensajeError($this->coderror2);
         $this->getRequest()->setError('',$err1.'  del Articulo  '.$this->codigo2);
        }

        if($this->coderror3!=-1)
        {
         $err2 = Herramientas::obtenerMensajeError($this->coderror3);
         $this->getRequest()->setError('',$err2.'  ->  '.$this->codigo3);
        }

        if($this->codeerror!=-1)
        {
         $err3 = Herramientas::obtenerMensajeError($this->codeerror);
         $this->getRequest()->setError('',$err3);
        }

        if($this->razonvacia!=-1)
        {
         $err4 = Herramientas::obtenerMensajeError($this->razonvacia);
         $this->getRequest()->setError('casolart{unires}',$err4);
        }

        if($this->detallevacia!=-1)
        {
         $err5 = Herramientas::obtenerMensajeError($this->detallevacia);
         $this->getRequest()->setError('',$err5);
        }
        if($this->salvarrecar!=-1)
        {
         $err5 = Herramientas::obtenerMensajeError($this->salvarrecar);
         $this->getRequest()->setError('',$err5);
        }
        if($this->fecper!=-1)
        {
         $err6 = Herramientas::obtenerMensajeError($this->fecper);
         $this->getRequest()->setError('casolart{fecreq}',$err6);
        }
        if($this->fecperfis!=-1)
        {
         $err7 = Herramientas::obtenerMensajeError($this->fecperfis);
         $this->getRequest()->setError('casolart{fecreq}',$err7);
        }
      }
      return sfView::SUCCESS;
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
    protected function saveCasolart($casolart)
    {
      if ($casolart->getId())
      {

         $refsol = Herramientas::getX_vacio('refsol','caordcom','refsol',$casolart->getReqart());
          if ($casolart->getPrecom()=='N' &&  $refsol=="")
          {
              $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
      	      $grid2=Herramientas::CargarDatosGridv2($this,$this->obj2);
      	      $grid3=Herramientas::CargarDatosGridv2($this,$this->obj3);

        	  	// Si en el parametro reqreqapr  de Cadefart, no requiere que la requisicion esta aprobada para despacharla
        	  	// entonces de una vez grabo la requisicion como aprobada
        	  	 if ($this->autoriza_solicutud_egreso=="") $casolart->setAprreq('S');
               else $casolart->setAprreq('N');

      	      if (SolicituddeEgresos::salvarAlmsolegr($casolart,$grid,$grid2,$grid3,$this->getRequestParameter('generapre'),$error))
      	       {
      	       	$this->coderror=$error;
      	       	return $this->coderror;
      	       }
      	       else
      	       {
      	       	$this->coderror=$error;
      	       	return $this->coderror;
      	       }
          }
          if ($this->getRequestParameter('modifi')=='N') {       
        		if (!empty($refsol))
        		{
      	  		$reg = CasolartPeer::retrieveByPKs($casolart->getId());
      	  		$reg1 = array();
      	  		$reg1 = $reg[0];
      	  		$reg1->setDesreq($casolart->getDesreq());
      			$reg1->save();
      			$this->coderror=-1;
            }else{
             $casolart->save();
                $this->coderror=-1;
            }
          }else {
              $this->coderror=-1;
          }

       	return $this->coderror;

      }else{
	      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
	      $grid2=Herramientas::CargarDatosGridv2($this,$this->obj2);
	      $grid3=Herramientas::CargarDatosGridv2($this,$this->obj3);

	  	// Si en el parametro reqreqapr  de Cadefart, no requiere que la requisicion esta aprobada para despacharla
	  	// entonces de una vez grabo la requisicion como aprobada
	  	 if ($this->autoriza_solicutud_egreso=="") $casolart->setAprreq('S');
       else $casolart->setAprreq('N');

	      if (SolicituddeEgresos::salvarAlmsolegr($casolart,$grid,$grid2,$grid3,$this->getRequestParameter('generapre'),$error))
	       {
	       	$this->coderror=$error;
	       	return $this->coderror;
	       }
	       else
	       {
	       	$this->coderror=$error;
	       	return $this->coderror;
	       }
      }
     //$this->getUser()->getAttributeHolder()->remove('presiono','almsolegr');

   }

    protected function deleteCasolart($casolart)
    {
       SolicituddeEgresos::eliminarAlmsolegr($casolart);
    }

    /**
   * Función principal para procesar la eliminación de registros
   * en el formulario.
   *
   */
    public function executeDelete()
  {
    $this->casolart = CasolartPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->casolart);

    try
    {
      $tiepre=H::getX_vacio('REFPRC','Cpprecom','Refprc',$this->casolart->getReqart());
      $fecha=date('d/m/Y',strtotime($this->casolart->getFecreq()));
      if (!Herramientas::validarPeriodoPresuesto($fecha) && $tiene!='')
      {        
        $this->getRequest()->setError('delete', 'No se puede Eliminar, La Fecha se encuentra dentro un Período Cerrado Presupuestariamente.');
        return $this->forward('almsolegr', 'list');     
      }else {
        $this->deleteCasolart($this->casolart);
        $this->Bitacora('Elimino');
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Casolart. Make sure it does not have any associated items.');
      return $this->forward('almsolegr', 'list');
    }

    return $this->redirect('almsolegr/list');
  }

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCasolartFromRequest()
    {
      $casolart = $this->getRequestParameter('casolart');
      $this->moneda = Herramientas::cargarMoneda();
      $this->listatipo = Constantes::ListaTipoCompra();
      $c=new Criteria();
      $c->add(CpcomproPeer::STACOM,'N',Criteria::NOT_EQUAL);
      $c->add(CpcomproPeer::REFPRC,$this->casolart->getReqart());
      $trajo= CpcomproPeer::doSelectOne($c);
      if ($trajo)
      {$this->haydespacho='S';}else {$this->haydespacho='N';}
      $c=new Criteria();
      $c->add(CacotizaPeer::REFSOL,$this->casolart->getReqart());
      $trajo2= CacotizaPeer::doSelect($c);
      if ($trajo2)
      {$this->cotiz='S';}else {$this->cotiz='N';}
      $c=new Criteria();
      $c->add(CaartsolPeer::CANORD,0,Criteria::NOT_EQUAL);
      $c->add(CaartsolPeer::REQART,$this->casolart->getReqart());
      $reg= CaartsolPeer::doSelect($c);
      if (count($reg)>0)
      {$this->modifico='N';}else {$this->modifico='S';}
      if ($this->modifico=='S')
      { $this->configGridDetalle(); $this->configGridRecargo($this->casolart->getReqart()); $this->configGridRazon();}
      else { $this->configGridDetalleConsulta(); $this->configGridRecargoConsulta(); $this->configGridRazonConsulta();}

      if (isset($casolart['reqart']))
      {
        $this->casolart->setReqart($casolart['reqart']);
      }
      if (isset($casolart['fecreq']))
      {
        if ($casolart['fecreq'])
        {
          try
          {
            $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                                if (!is_array($casolart['fecreq']))
            {
              $value = $dateFormat->format($casolart['fecreq'], 'i', $dateFormat->getInputPattern('d'));
            }
            else
            {
              $value_array = $casolart['fecreq'];
              $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
            }
            $this->casolart->setFecreq($value);
          }
          catch (sfException $e)
          {
            // not a date
          }
        }
        else
        {
          $this->casolart->setFecreq(null);
        }
      }
      if (isset($casolart['tipmon']))
      {
        $this->casolart->setTipmon($casolart['tipmon']);
      }
      if (isset($casolart['desreq']))
      {
        $this->casolart->setDesreq($casolart['desreq']);
      }
      if (isset($casolart['monreq']))
      {
        $this->casolart->setMonreq($casolart['monreq']);
      }
      if (isset($casolart['unires']))
      {
        $this->casolart->setUnires($casolart['unires']);
      }
      if (isset($casolart['nomcat']))
      {
        $this->casolart->setNomcat($casolart['nomcat']);
      }
      if (isset($casolart['tipo']))
        {
          $this->casolart->setTipo($casolart['tipo']);
        }
      if (isset($casolart['tipfin']))
      {
        $this->casolart->setTipfin($casolart['tipfin']);
      }
      if (isset($casolart['nomext']))
      {
        $this->casolart->setNomext($casolart['nomext']);
      }
      if (isset($casolart['motreq']))
      {
        $this->casolart->setMotreq($casolart['motreq']);
      }
      if (isset($casolart['benreq']))
      {
        $this->casolart->setBenreq($casolart['benreq']);
      }
      if (isset($casolart['obsreq']))
      {
        $this->casolart->setObsreq($casolart['obsreq']);
      }
      if (isset($casolart['mondes']))
      {
        $this->casolart->setMondes($casolart['mondes']);
      }
      if (isset($casolart['tipreq']))
      {
        $this->casolart->setTipreq($casolart['tipreq']);
      }
      if (isset($casolart['valmon']))
      {
        $this->casolart->setValmon($casolart['valmon']);
      }
      if (isset($casolart['codcen']))
      {
        $this->casolart->setCodcen($casolart['codcen']);
      }
      if (isset($casolart['numproc']))
      {
        $this->casolart->setNumproc($casolart['numproc']);
      }
      if (isset($casolart['codeve']))
      {
        $this->casolart->setCodeve($casolart['codeve']);
      }
      if (isset($casolart['coddirec']))
      {
        $this->casolart->setCoddirec($casolart['coddirec']);
      }
      if (isset($casolart['coddivi']))
      {
        $this->casolart->setCoddivi($casolart['coddivi']);
      }
      if (isset($casolart['codubi']))
      {
        $this->casolart->setCodubi($casolart['codubi']);
      }
      if (isset($casolart['nomben']))
    {
      $this->casolart->setNomben($casolart['nomben']);
    }
    if (isset($casolart['cedrif']))
    {
      $this->casolart->setCedrif($casolart['cedrif']);
    }
    if (isset($casolart['fecsal']))
    {
      if ($casolart['fecsal'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($casolart['fecsal']))
          {
            $value = $dateFormat->format($casolart['fecsal'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $casolart['fecsal'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->casolart->setFecsal($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->casolart->setFecsal(null);
      }
    }
    if (isset($casolart['horsal']))
    {
      $this->casolart->setHorsal($casolart['horsal']);
    }
    if (isset($casolart['fecreg']))
    {
      if ($casolart['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($casolart['fecreg']))
          {
            $value = $dateFormat->format($casolart['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $casolart['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->casolart->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->casolart->setFecreg(null);
      }
    }
    if (isset($casolart['horreg']))
    {
      $this->casolart->setHorreg($casolart['horreg']);
    }
    if (isset($casolart['codreg']))
    {
      $this->casolart->setCodreg($casolart['codreg']);
    }
    if (isset($casolart['codpro']))
    {
      $this->casolart->setCodpro($casolart['codpro']);
    }
    if (isset($casolart['prebas']))
    {
      $this->casolart->setPrebas($casolart['prebas']);
    }
    if (isset($casolart['lugent']))
    {
      $this->casolart->setLugent($casolart['lugent']);
    }
    $this->casolart->setStareq('A');
  }

    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
    public function executeAjax()
   {
     $sw=true;
     $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
     $output=array();
     $javascript=""; $dato="";
     $this->ajaxs=$this->getRequestParameter('ajax');
     if ($this->getRequestParameter('ajax')=='1')
      {
      	$catbnubica="";
      	$fornumuni="";
      	$varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('compras',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
		     if(array_key_exists('almsolegr',$varemp['aplicacion']['compras']['modulos'])){
		       if(array_key_exists('catbnubica',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
		       {
		       	$catbnubica=$varemp['aplicacion']['compras']['modulos']['almsolegr']['catbnubica'];
		       }
		       if(array_key_exists('fornumuni',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
		       {
		       	$fornumuni=$varemp['aplicacion']['compras']['modulos']['almsolegr']['fornumuni'];
		       }
		     }
         if ($this->catbnubica=='S'){
      $this->mascaracategoria=Herramientas::ObtenerFormato('Opdefemp','Forubi');
    }else {
    $this->mascaracategoria = Herramientas::getObtener_FormatoCategoria();
    }
      	if ($catbnubica=='S') {
          $longcat=strlen(H::ObtenerFormato('Opdefemp','Forubi'));
          if ($longcat==strlen($this->getRequestParameter('codigo')))
      	     $dato=BnubicaPeer::getDesubi($this->getRequestParameter('codigo')); 
          else  $javascript="alert_('La Categoria no es de &Uacute;ltimo Nivel'); $('casolart_unires').value=''; $('casolart_unires').focus();";
        }else {
          $longcat=strlen(H::getObtener_FormatoCategoria());
          if ($longcat==strlen($this->getRequestParameter('codigo'))) {
             $t= new Criteria();
             if ($fornumuni!="S") {$t->add(NpcatprePeer::CODCAT,$this->getRequestParameter('codigo')); }
             else {
             	$loguse= $this->getUser()->getAttribute('loguse');
             	$sql="npcatpre.codcat='".$this->getRequestParameter('codigo')."' and npcatpre.codcat in (select codcat from causuuni where loguse='".$loguse."')";
             	$t->add(NpcatprePeer::CODCAT,$sql,Criteria::CUSTOM);
             }
             $reg= NpcatprePeer::doSelectOne($t);
             if ($reg)
             {
             	 $dato=$reg->getNomcat();
             }else $javascript="alert('La Categoria no existe'); $('casolart_unires').value=''; $('casolart_unires').focus();";
          }else $javascript="alert_('La Categoria no es de &Uacute;ltimo Nivel'); $('casolart_unires').value=''; $('casolart_unires').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='2')
      {
        $javascript="";
        $codpre=$this->getRequestParameter('codpre1');
        $refiere=$this->getRequestParameter('refere');
        $finpre=H::getConfApp2('finpre', 'compras', 'almsolegr');
        $q= new Criteria();
        $q->add(FortipfinPeer::CODFIN,$this->getRequestParameter('codigo'));
        if ($finpre=='S' && $refiere=='false'){
          $q->add(CpdisfuefinPeer::CODPRE,$codpre);
          $q->add(CpdisfuefinPeer::ORIGEN,'INICIAL');
          $q->addJoin(FortipfinPeer::CODFIN,CpdisfuefinPeer::FUEFIN);
        }
        $reg= FortipfinPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getNomext();                
        }else {
            $dato="";
            $javascript="alert_('La Financiamiento no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='3')
      {
	 	    $catbnubica=H::getConfApp2('catbnubica', 'compras', 'almsolegr');
        $filartreg=H::getConfApp2('filartreg', 'compras', 'almsolegr');
        $manconstruc=H::getConfApp2('manconstruc', 'compras', 'almregart');
        $codigopre="";
        $longitudart=strlen(Herramientas::getMascaraArticulo());
    	 	$c= new Criteria();
    		$c->add(CaregartPeer::CODART,$this->getRequestParameter('codigo'));
        /*if ($filartreg=='S'){
          $escentral=H::getX_vacio('CODDIREC','Cadefdirec','Escentral',$this->getRequestParameter('direc'));
          if ($escentral)
            $c->add(CaregartPeer::CLAART,'C');
          else
            $c->add(CaregartPeer::CLAART,'R');
        }*/
        if ($manconstruc=='S'){
          $sql= " (consbue is null or consbue=false)";
          $c->add(CaregartPeer :: CONSBUE, $sql, Criteria :: CUSTOM);
        }
      	$reg=CaregartPeer::doSelectOne($c);
    		if ($reg)
    		{
          if ($longitudart==strlen($this->getRequestParameter('codigo')))
          {
    	        $dato=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($reg->getDesart()));
    	        $dato1=$reg->getUnimed();
    	        $dato2=number_format($reg->getCosult(),6,',','.');
    	        $dato3=$reg->getCodpar();
    	        if ($catbnubica=='S')
    	          $valuni="";
              else { $valuni=$this->getRequestParameter('valuni');
                $codigopre=$valuni.'-'.$dato3;
                $codigpre=$this->getRequestParameter('codigpre');
                 $javascript="$('$codigpre').value='".$codigopre."'; ";                

                 }

	            $unires=$this->getRequestParameter('unires');
              $catunires=$this->getRequestParameter('catunires');
    	        $costo=$this->getRequestParameter('costo');
              $cantidad=$this->getRequestParameter('cantidad');
              $manunicuni=H::getConfApp2('manunicuni', 'compras', 'almsolegr');
              $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
              if ($manunicuni=='S')
              {
                 if ($claartdes=='S')
                     $javascript=$javascript."$('$catunires').hide(); $('$unires').readOnly=true; $('$cajtexmos').focus();";
                 else
                     $javascript=$javascript."$('$catunires').hide(); $('$unires').readOnly=true; $('$unires').focus(); $('$cantidad').focus();";
              }
              else {
                if ($claartdes=='S')
                  $javascript=$javascript."$('$cajtexmos').focus();";
                else
                  $javascript=$javascript."$('$unires').focus(); $('$cantidad').focus();";
              }

              $finpre=H::getConfApp2('finpre', 'compras', 'almsolegr');
              if ($this->getRequestParameter('fila')==0 && $finpre=='S'){
                if ($valuni!='' && $dato3!='')
                  $javascript.= " busfin('$unires','$codigpre','$codigopre');";
              }
	            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('unidad').'","'.$dato1.'",""],["'.$this->getRequestParameter('costo').'","'.$dato2.'",""],["'.$this->getRequestParameter('partida').'","'.$dato3.'",""],["'.$this->getRequestParameter('unires').'","'.$valuni.'",""],["javascript","'.$javascript.'",""]]';
          }else {
            $valuni="";
            $javascript="alert('Articulo no es de Ultimo Nivel');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $this->getRequestParameter('unidad') ."').value='';$('". $this->getRequestParameter('costo') ."').value='0.00';$('". $this->getRequestParameter('partida') ."').value=''";
    	      $output = '[["javascript","'.$javascript.'",""]]';
		      }
  		}
  		else
  		{    $valuni="";
  			 $javascript="alert('Articulo no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $this->getRequestParameter('unidad') ."').value='';$('". $this->getRequestParameter('costo') ."').value='0.00';$('". $this->getRequestParameter('partida') ."').value=''";
        	 $output = '[["javascript","'.$javascript.'",""]]';
  		}
      }
      else  if ($this->getRequestParameter('ajax')=='4')
      {
        $dato=CarecargPeer::getRecargo($this->getRequestParameter('codigo'));
        $dato1=number_format(CarecargPeer::getDato($this->getRequestParameter('codigo'),'monrgo'),2,',','.');
        $dato2=CarecargPeer::getDato($this->getRequestParameter('codigo'),'tiprgo');
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"],["'.$this->getRequestParameter('monto').'","'.$dato1.'",""],["'.$this->getRequestParameter('tipo').'","'.$dato2.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='5')
      {
        $dato=CarazcomPeer::getDesrazon($this->getRequestParameter('codigo'));
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      }
      else  if ($this->getRequestParameter('ajax')=='6')
      {
        $this->getUser()->setAttribute('presiono', 'S','almsolegr');
        $output = '[["","",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='7')
      {
      	if (Herramientas::validarPeriodoPresuesto($this->getRequestParameter('codigo')))
      	{
         $valido='N';
      	}else { $valido='S';}

      	if (Herramientas::validarPeriodoFiscal($this->getRequestParameter('codigo')))
      	{ $valido2='N';}
      	else { $valido2='S';}
        $output = '[["valfec","'.$valido.'",""],["valfec2","'.$valido2.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='8')
      {
      	$fec1 = $this->getRequestParameter('fecemi');
        $javascript="";
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

        if ($fec2<$fec1)
        {
          $javascript="alert('La Fecha de Anulación no puede ser menor a la Fecha de la Solicitud'); $('casolart_fecanu').value=''; ";
        }else {
            if (!Herramientas::validarPeriodoPresuesto($this->getRequestParameter('codigo')))
	      	{
	         $javascript="alert('La Fecha no se encuentra del Período Fiscal');	$('casolart_fecanu').value=''; ";
	      	}else {
	      		if (!Herramientas::validarPeriodoFiscal($this->getRequestParameter('codigo')))
		      	{
		      	  $javascript="alert('La Fecha se encuentra dentro un Período Cerrado'); $('casolart_fecanu').value='';	";
		      	}

		    }
        }
        $output = '[["javascript","'.$javascript.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='9')//Calcular Recargos
      {
        $prenoiva=H::getConfApp2('prenoiva', 'compras', 'almsolegr');
        $d= new Criteria();
        $d->add(CarecargPeer::CODRGO,$this->getRequestParameter('codigo'));
        $recargosreg= CarecargPeer::doSelectOne($d);
        if ($recargosreg)
        {
          if ($prenoiva=='S')
          {
              $desrgo=$recargosreg->getNomrgo();
              $montorgotab=$recargosreg->getMonrgo();
              $monrgo=number_format($montorgotab,2,',','.');
              $tiprgo=$recargosreg->getTiprgo();
              $reccal=SolicituddeEgresos::CalcularRecargos($tiprgo,$monrgo,$this->getRequestParameter('monart'));
              $reccalformat=number_format($reccal,4,',','.');
              if ($tiprgo=='M' and $montorgotab==0)//Tipo recargo puntual (monto)
                  //$javascript="$('".$this->getRequestParameter('moncal')."').readOnly=false; actualizarsaldos_b();";
                   $javascript="$('".$this->getRequestParameter('moncal')."').readOnly=false; total_recargos();";
              
              else //Tipo de recargo por porcentaje
//                 $javascript="actualizarsaldos_b();"; 
                  $javascript="total_recargos();"; 
          }else {
            if ($recargosreg->getCodpre()!="")
            {
              $desrgo=$recargosreg->getNomrgo();
    	        $montorgotab=$recargosreg->getMonrgo();
    	        $monrgo=number_format($montorgotab,2,',','.');
    	        $tiprgo=$recargosreg->getTiprgo();
    	        $reccal=SolicituddeEgresos::CalcularRecargos($tiprgo,$monrgo,$this->getRequestParameter('monart'));
    	        $reccalformat=number_format($reccal,4,',','.');
    	        if ($tiprgo=='M' and $montorgotab==0)//Tipo recargo puntual (monto)
    	            //$javascript="$('".$this->getRequestParameter('moncal')."').readOnly=false; actualizarsaldos_b();";
                  $javascript="$('".$this->getRequestParameter('moncal')."').readOnly=false; total_recargos();";
    	        else //Tipo de recargo por porcentaje
    	        	 //$javascript="actualizarsaldos_b();";
                 $javascript="total_recargos();"; 
            }
            else
            {
            	$desrgo=""; $monrgo="0,00"; $tiprgo=""; $reccalformat="0,0000";
            	$javascript="alert('Debe asociarle al Recargo el Código Presupuestario'); $('$cajtexcom').value='';";
            }
          }
        }else{
        	$desrgo=""; $monrgo="0,00"; $tiprgo=""; $reccalformat="0,0000";
          	$javascript="alert('El Recargo no existe'); $('$cajtexcom').value='';";
        }

        $output = '[["'.$cajtexmos.'","'.$desrgo.'",""],["'.$cajtexcom.'","4","c"],["'.$this->getRequestParameter('monto').'","'.$monrgo.'",""],["'.$this->getRequestParameter('tipo').'","'.$tiprgo.'",""],["'.$this->getRequestParameter('moncal').'","'.$reccalformat.'",""],["javascript","'.$javascript.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='10')
      {
        $filiscen=H::getConfApp2('filiscen', 'compras', 'almsolegr'); 
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
    else  if ($this->getRequestParameter('ajax')=='11')
      {
        $sw=false;
        $q= new Criteria();
        $q->add(LiprebasPeer::NUMPRE,$this->getRequestParameter('codigo'));
        $reg= LiprebasPeer::doSelectOne($q);
        if ($reg)
        {
           $javascript="";
           $dato=$reg->getDespro();
           $dato1=$reg->getMonpre();
           $dato2= $reg->getCodpre();
           $dato3=H::GetX('Codubi','Bnubica','Desubi',$dato2);
           $dato4=$reg->getCodmon();
           $dato5=$reg->getTipfin();
           $dato6=H::GetX('Codfin','Fortipfin','Nomext',$dato5);
           $dato7=$reg->getCodcen();
           $dato8=H::GetX('Codcen','Cadefcen','Descen',$dato7);
           $dato9=$reg->getMotreq();
           $dato10=$reg->getBenreq();
           $dato11=$reg->getObsreq();
           $dato12=H::getX_vacio('CODPRO', 'Caprovee', 'Rifpro', $reg->getCodpro());
           $dato13=H::getX_vacio('CODPRO', 'Caprovee', 'Nompro', $reg->getCodpro());

        }else {
            $dato="";
            $dato1="";
            $dato2="";
            $dato3="";
            $dato4="";
            $dato5="";
            $dato6="";
            $dato7="";
            $dato8="";
            $dato9="";
            $dato10="";
            $dato11="";
            $dato12="";
            $dato13="";
            $javascript="alert('El Presupuesto Base no existe');";
        }
        $this->casolart = $this->getCasolartOrCreate();        
        $this->updateCasolartFromRequest();
        $this->setVars();
        $this->configGridDetalle($this->getRequestParameter('codigo'));
        $output = '[["casolart_desreq","'.$dato.'",""],["casolart_monreq","'.$dato1.'",""],["casolart_unires","'.$dato2.'",""],
                    ["casolart_nomcat","'.$dato3.'",""],["casolart_tipmon","'.$dato4.'",""],["casolart_tipfin","'.$dato5.'",""],
                    ["casolart_nomext","'.$dato6.'",""],["casolart_codcen","'.$dato7.'",""],["casolart_descen","'.$dato8.'",""],
                    ["casolart_motreq","'.$dato9.'",""],["casolart_benreq","'.$dato10.'",""],["casolart_obsreq","'.$dato11.'",""],
                    ["casolart_nompro","'.$dato13.'",""],["casolart_codpro","'.$dato12.'",""],["javascript","'.$javascript.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='12')
      {
       $js=""; $dato="";
       if  ($this->getRequestParameter('nuevo')=='')
       {
        $q= new Criteria();
        $q->add(TsdesmonPeer::CODMON,$this->getRequestParameter('codigo'));
        $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
        $reg= TsdesmonPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=number_format($reg->getValmon(),6,',','.');
        }
       }else {
          $js="$('casolart_tipmon').value='".$this->getRequestParameter('variable')."'";   
          $dato=$this->getRequestParameter('valmone');
      }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='13')
      {
        if ($this->getRequestParameter('codigo')!='') {
          $q= new Criteria();
          $q->add(CadefcenPeer::CODCEN,$this->getRequestParameter('codigo'));
          $reg= CadefcenPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=$reg->getDescen(); $javascript="";
          }else {
              $dato="";
              $javascript="alert('El Centro de Costo no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }


        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }else  $output = '[["","",""]]';

      }
      else  if ($this->getRequestParameter('ajax')=='14')
      {
        if ($this->getRequestParameter('codigo')!='') {
        $q= new Criteria();
        $q->add(CadefunimedPeer::CODUNIMED,$this->getRequestParameter('codigo'));
        $reg= CadefunimedPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesunimed(); $javascript="";
        }else {
            $dato="";
            $javascript="alert('La Unidad de Medida no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       }else  $output = '[["","",""]]';
      }      
      else  if ($this->getRequestParameter('ajax')=='15')
      {
        $q= new Criteria();
        $q->add(CpeveprePeer::CODEVE,$this->getRequestParameter('codigo'));
        $reg= CpeveprePeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDeseve(); $javascript="";
        }else {
            $dato="";
            $javascript="alert('El Evento no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='16')
      {
        $javascript="";
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
        $q= new Criteria();
        if ($filsoldir=='S'){
          $codigo=$this->getRequestParameter('codigo');
          $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
        }else $q->add(CadefdirecPeer::CODDIREC,$this->getRequestParameter('codigo'));
        $reg= CadefdirecPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesdirec(); 
           $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
           if ($categoriasusu!='')
           {
             $codcat=$reg->getCodcat();
             $unires=$this->getRequestParameter('unires','');
             if ($codcat!='' && $unires=='') {
               $nomcat=H::getX_vacio('CODCAT','Npcatpre','Nomcat',$codcat);
               $javascript="$('casolart_unires').value='".$codcat."'; $('casolart_nomcat').value='".$nomcat."'; $$('.botoncat')[0].disabled=true;";
             }
           }          
        }else {
            $dato="";
            $javascript="alert_('La Direcci&oacute;n no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='17')
      {
        $q= new Criteria();
        $q->add(CadefdiviPeer::CODDIVI,$this->getRequestParameter('codigo'));
        $q->add(CadefdiviPeer::CODDIREC,$this->getRequestParameter('coddirec'));
        $reg= CadefdiviPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesdivi(); $javascript="";
        }else {
            $dato="";
            $javascript="alert_('La Divisi&oacute;n no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='18')
      {
        $javascript="";
        $mascaraubi = H::ObtenerFormato('Opdefemp','Forubi');
        $lonubi=strlen($mascaraubi);
        $q= new Criteria();
        $q->add(BnubicaPeer::CODUBI,$this->getRequestParameter('codigo'));
        $reg= BnubicaPeer::doSelectOne($q);
        if ($reg)
        {
          if (strlen($this->getRequestParameter('codigo'))==$lonubi)
           $dato=$reg->getDesubi();  
           else {
            $dato="";
            $javascript="alert_('La Unidad Responsable no es de &Uacute;ltimo Nivel'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";
           }                
        }else {
            $dato="";
            $javascript="alert_('La Unidad Responsable no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
      else if ($this->getRequestParameter('ajax')=='19')
      {
        $javascript="";
        $q= new Criteria();
        $q->add(CaregionesPeer::CODREG,$this->getRequestParameter('codigo'));
        $reg= CaregionesPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getNomreg();                
        }else {
            $dato="";
            $javascript="alert_('La Regi&oacute;n no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
      else if ($this->getRequestParameter('ajax')=='20')
      {        
        $id1=$this->getRequestParameter('idcat');
        $id2=$this->getRequestParameter('idcodpre');
        $esta=H::getX_vacio('CODPRE','Cpdeftit','Codpre',$this->getRequestParameter('codpre'));
        if ($esta!='') {
          $q= new Criteria();
          $q->add(CpdisfuefinPeer::CODPRE,$this->getRequestParameter('codpre'));
          $q->add(CpdisfuefinPeer::ORIGEN,'INICIAL');
          $reg= CpdisfuefinPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=$reg->getFuefin();     
             $desc=H::getX_vacio('Codfin','Fortipfin','Nomext',$dato);  
             $output = '[["casolart_tipfin","'.$dato.'",""],["casolart_nomext","'.$desc.'",""]]';        
          }else{
            $javascript="alert_('El Código Presupuestario no tiene Fuente de Financiamiento Asociada'); $('$id1').value=''; $('$id2').value=''; $('$id1').focus();";
            $output = '[["javascript","'.$javascript.'",""]]';
          }
      }
      else {
        $output = '[["","",""]]';
      }
      }else if ($this->getRequestParameter('ajax')=='21'){
        $datos=split('!',$this->getRequestParameter('codigo'));
        $codigo=$datos[0];
        $cajtexcom=$datos[1];
        $codart=$datos[2];
        $cajtexmos=$datos[3];
        $q= new Criteria();
        $q->add(CaunialartPeer::CODART,$codart);
        $q->add(CaunialartPeer::UNIALT,$codigo);
        $reg= CaunialartPeer::doSelectOne($q);
        if ($reg)
        {

           $dato=H::FormatoMonto($reg->getCosuni(),6); 
           $aux=explode('_', $cajtexcom);
           $idfila=$aux[0]."_".$aux[1]."_9";
           $javascript="TotalUnidad('$idfila'); recalcularecargosUnidad('$idfila'); ";
        }else {
            $dato="";
            $javascript="alert('La Unidad de Medida no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      } else if ($this->getRequestParameter('ajax') == '22') {      
        $this->unidades = array();
        $javascript = "";
        $sw=false;
        $this->unidades = CaunialartPeer :: getUnidades($this->getRequestParameter('codigo'));
        $output = '[["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
      }
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        if($sw)
        return sfView::HEADER_ONLY;

    }


    public function executeRecargos()
    {
      $articulo=$this->getRequestParameter('articulo');
      $codunidad=$this->getRequestParameter('codunidad');
      $desart=$this->getRequestParameter('desart');
      $reqart=$this->getRequestParameter('reqart');
      $modifico=$this->getRequestParameter('modifico');
      if ($modifico=='S')
            $this->configGridRecargo($reqart,$articulo,$codunidad,$desart);
      else
            $this->configGridRecargoConsulta($reqart,$articulo,$codunidad,$desart);
      $output = '[["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    }


    public function executeAutocomplete()
    {
     if ($this->getRequestParameter('ajax')=='1')
      {
      $this->tags=Herramientas::autocompleteAjax('CODCAT','Npcatpre','codcat',$this->getRequestParameter('casolart[unires]'));
      }
      else  if ($this->getRequestParameter('ajax')=='2')
      {
        $this->tags=Herramientas::autocompleteAjax('CODFIN','Fortipfin','codfin',$this->getRequestParameter('casolart[tipfin]'));
      }
    }

    /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
    public function configGridDetalle($prebas = null)
    {
       $detsinord=H::getConfApp2('detsinord', 'compras', 'almsolegr');
       $oculcol=H::getConfApp2('oculcol', 'compras', 'almsolegr');
       $c = new Criteria();
       if($prebas){
        $c->add(LiprebasdetPeer::NUMPRE, $prebas);
        $liprebasdet = LiprebasdetPeer::doSelect($c);
        $reg = array();
        if(count($liprebasdet)>0){
          foreach ($liprebasdet as $prebasdet) {
            $c = new Criteria();
            $c->add(CaregartPeer::CODART,$prebasdet->getCodart());

            $regart = CaregartPeer::doSelectOne($c);
            if($regart){
              $artsol = new Caartsol();
              $artsol->setCodart($prebasdet->getCodart());
              $artsol->setDesartsol($regart->getDesart());
              $artsol->setCodcat($prebasdet->getCodcat());
              $artsol->setUnimed($regart->getUnimed());
              $artsol->setCodigopre($prebasdet->getCodcat().'-'.$regart->getCodpar());
              $artsol->setCanreq($prebasdet->getCansol());
              $artsol->setCanrec($prebasdet->getCanapr());
              $artsol->setCosto($prebasdet->getCosto());
              $artsol->setMonrgo($prebasdet->getMonrec());
              $artsol->setMontot($prebasdet->getSubtot());
              $artsol->setCodpre($regart->getCodpar());
            }


            $reg[] = $artsol;
            
          }          
        }
       }else{
         $c->add(CaartsolPeer::REQART,$this->casolart->getReqart());
         if ($detsinord!="S")
         $c->addAscendingOrderByColumn(CaartsolPeer::CODART);
         else
             $c->addAscendingOrderByColumn(CaartsolPeer::ID);
         $reg = CaartsolPeer::doSelect($c);        
       }

       $mascaraarticulo=$this->mascaraarticulo;
       $lonart=strlen($this->mascaraarticulo);
       $mascaracategoria= Herramientas::getObtener_FormatoCategoria();
       $loncat=strlen($mascaracategoria);
       $mascarapresupuesto=$this->mascarapresupuesto;
       $lonpre=strlen($this->mascarapresupuesto);
       $precom=$this->precompromete;

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Caartsol');
       if ($oculcol=='S') {
           $opciones->setAncho(700);
           $opciones->setAnchoGrid(750);
       }
       else  {
           $opciones->setAncho(900);
           $opciones->setAnchoGrid(950);
       }
       
       $opciones->setFilas(150);
       $opciones->setTitulo('');
       $opciones->setHTMLTotalFilas(' ');

       $naplrecdes=H::getConfApp2('naplrecdes', 'compras', 'almsolegr');
       $mosdettec=H::getConfApp2('mosdettec', 'compras', 'almsolegr');

       $col1 = new Columna('Marque');
       $col1->setTipo(Columna::CHECK);
       $col1->setNombreCampo('check');
       $col1->setEsGrabable(true);
       $col1->setHTML(' onClick="totalmarcadas(this.id)"');
       if ($precom=='' && $this->oculrecnoprc=='S') $col1->setOculta(true);
       //$col1->setJScript('onClick="totalmarcadas(this.id)"');
       if ($naplrecdes=='S') $col1->setOculta(true);

       $obj= array('codart' => 2, 'desart' => 3, 'unimed' => 4, 'cosult' => 9, 'codpar' => 13);
       $params= array('param1' => $lonart, 'param2' => "'+$('casolart_tipreq').value+'", 'param3' => "'+$('casolart_coddirec').value+'", 'val2');

       $col2 = new Columna('Cód. Artículo');
       $col2->setTipo(Columna::TEXTO);
       $col2->setEsGrabable(true);
       $col2->setAlineacionObjeto(Columna::CENTRO);
       $col2->setAlineacionContenido(Columna::CENTRO);
       $col2->setNombreCampo('codart');
       $jsscript2='onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,15);" onBlur="javascript:event.keyCode=13; ajaxdetalle(event,this.id);"';
       //$col2->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,15);" onBlur="javascript:event.keyCode=13; ajaxdetalle(event,this.id);"');
       $col2->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Almsolegr',$params);
       $col2->setHTML('type="text" size="17" maxlength="'.chr(39).$lonart.chr(39).'"'.$jsscript2);

       $col3 = new Columna('Descripción');
       $col3->setTipo(Columna::TEXTAREA);
       $col3->setAlineacionObjeto(Columna::IZQUIERDA);
       $col3->setAlineacionContenido(Columna::IZQUIERDA);
       $col3->setNombreCampo('desartsol');
       $col3->setEsGrabable(true);
       $col3->setHTML('type="text" size="25x1" onBlur="javascript:event.keyCode=13; this.value = this.value.toUpperCase(); actualizo_cod_presupuestario(event,this.id);" onkeyUp="javascript: return this.value = this.value.toUpperCase();"');

       $manunialt=H::getConfApp2('manunialt','compras','almregart');
      if ($manunialt=='S')
      {   
        $signo="-";
        $signomas="+";
        $col4 = new Columna('Unidad Medida');
        $col4->setTipo(Columna::COMBO);
        $col4->setEsGrabable(true);
        $col4->setCombo(CaunialartPeer::getUnidades());
        $col4->setNombreCampo('unimed');
        $col4->setHTML('');
        $col4->setHTML('onChange="toAjax(21,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+this.id+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,2,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,5,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
      }else {       
       $col4 = new Columna('Unidad de Medida');
       $col4->setTipo(Columna::TEXTO);
       $col4->setAlineacionObjeto(Columna::IZQUIERDA);
       $col4->setAlineacionContenido(Columna::IZQUIERDA);
       $col4->setNombreCampo('unimed');
       $col4->setEsGrabable(true);
       $col4->setHTML('type="text" size="25" maxlength="50"');
     }

       $obj2= array('codcat' => 5);
       $params2= array('param1' => $loncat, 'param2' => 'almsolegr');

       $col5 = new Columna('Cód. Unidad');
       $col5->setTipo(Columna::TEXTO);
       $col5->setEsGrabable(true);
       $col5->setAlineacionObjeto(Columna::CENTRO);
       $col5->setAlineacionContenido(Columna::CENTRO);
       $col5->setNombreCampo('codcat');
       $jsscript5='onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaracategoria.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena; perderfocus(event,this.id,15);}" onBlur="javascript:event.keyCode=13; actualizo_cod_presupuestario(event,this.id);"';
       $col5->setHTML('type="text" size="17" maxlength="'.chr(39).$loncat.chr(39).'"'.$jsscript5);
       $col5->setCatalogo('npcatpre','sf_admin_edit_form',$obj2,'Npcatpre_Almsolegr',$params2);
       //$col5->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaracategoria.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena; perderfocus(event,this.id,15);}" onBlur="javascript:event.keyCode=13; actualizo_cod_presupuestario(event,this.id);"');
       if ($oculcol=='S') $col5->setOculta(true);

       $col6 = new Columna('Cód. Presupuestario');
       $col6->setTipo(Columna::TEXTO);
       $col6->setEsGrabable(true);
       $col6->setNombreCampo('codigopre');
       $col6->setAlineacionObjeto(Columna::CENTRO);
       $col6->setAlineacionContenido(Columna::CENTRO);
       $jsscript6='onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapresupuesto.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"';
       $col6->setHTML('type="text" size="55" maxlength="'.chr(39).$lonpre.chr(39).'"'.$jsscript6);
       //$col6->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapresupuesto.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
       if ($oculcol=='S') $col6->setOculta(true);

       $col7 = new Columna('Cant. Requerida');
       $col7->setEsGrabable(true);
       $col7->setTipo(Columna::MONTO);
       $col7->setAlineacionContenido(Columna::DERECHA);
       $col7->setAlineacionObjeto(Columna::DERECHA);
       $col7->setNombreCampo('canreq');
       $col7->setEsNumerico(true);
       $jsscript7='onBlur="javascript: obj=this; ValidarMontoGridv2(obj,2); event.keyCode=13; Cantidad(event,this.id); recalcularecargos(event,this.id);"';
       $col7->setHTML('type="text" size="10"'.$jsscript7);
       //$col7->setJScript('onBlur="javascript:event.keyCode=13; Cantidad(event,this.id); recalcularecargos(event,this.id);"');

       $col8 = clone $col7;
       $col8->setTitulo('Cant. Recibida');
       $col8->setNombreCampo('canrec');
       $col8->setHTML('type="text" size="10" readonly=true');
       //$col8->setJScript('');
       if ($oculcol=='S') $col8->setOculta(true);

       $col9 = clone $col7;
       $col9->setTitulo('Costo');
       $col9->setNombreCampo('costo');
       $col9->setDecimal(6);
       $jsscript9='onBlur="javascript: obj=this; ValidarMontoGridv2(obj,6); event.keyCode=13; Total(event,this.id); recalcularecargos(event,this.id);"';
       $col9->setHTML('type="text" size="10"'.$jsscript9);
       //$col9->setJScript('onBlur="javascript:event.keyCode=13; Total(event,this.id); recalcularecargos(event,this.id);"');
       if ($precom=='' && $this->oculrecnoprc=='S') $col9->setOculta(true);
       if ($oculcol=='S') $col9->setOculta(true);

       $col10 = clone $col7;
       $col10->setTitulo('Descuento');
       $col10->setNombreCampo('mondes');
       $jsscript10='onBlur="javascript: obj=this; ValidarMontoGridv2(obj,2); event.keyCode=13; Totalmenosdescuento(event,this.id);"';
       $col10->setHTML('type="text" size="10"'.$jsscript10);
       //$col10->setJScript('onKeypress="Totalmenosdescuento(event,this.id);"');
       if ($naplrecdes=='S')  $col10->setOculta(true);
       if ($oculcol=='S') $col10->setOculta(true);

       $col11 = clone $col7;
       $col11->setTitulo('Recargo');
       $col11->setNombreCampo('monrgo');
       $col11->setDecimal(4);
       $col11->setHTML('type="text" size="10" readonly=true');
       if ($precom=='' && $this->oculrecnoprc=='S') $col11->setOculta(true);
       if ($naplrecdes=='S')  $col11->setOculta(true);
       if ($oculcol=='S') $col11->setOculta(true);

       $col12 = clone $col7;
       $col12->setTitulo('Total');
       $col12->setNombreCampo('montot');
       $col12->setDecimal(6);
       $col12->setHTML('type="text" size="10" readonly=true');
       //$col12->setEsTotal(true,'casolart_monreq');

       $paramsq = array('param1' => "'+$(this.id).up().previous(10).descendants()[0].value+'");
       $mascarapartida = Herramientas::getMascaraPartida();
       $longpar=strlen($mascarapartida);


       $jsscript13='onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapartida.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena; perderfocus(event,this.id,15);}" onBlur="javascript:event.keyCode=13; actualizo_cod_presupuestario(event,this.id);"';
       $col13 = new Columna('Codigo Partida');
       $col13->setTipo(Columna::TEXTO);
       $col13->setEsGrabable(true);
       //$col13->setOculta(true);
       $col13->setAlineacionObjeto(Columna::CENTRO);
       $col13->setAlineacionContenido(Columna::CENTRO);
       $col13->setNombreCampo('codpre');
       $col13->setHTML('type="text" size="20" maxlength="'.chr(39).$longpar.chr(39).'"'.$jsscript13);
       $col13->setCatalogo('caartpar','sf_admin_edit_form',array('codpar' => 13),'Nppartidas_Caregart',$paramsq);
       //$col13->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapartida.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena; perderfocus(event,this.id,15);}" onBlur="javascript:event.keyCode=13; actualizo_cod_presupuestario(event,this.id);"');

       $col14 = clone $col12;
       $col14->setTitulo('Total');
       $col14->setNombreCampo('montot2');
       $col14->setOculta(true);

       $col15 = clone $col11;
       $col15->setTitulo('Recargo');
       $col15->setNombreCampo('monrgo2');
       $col15->setHTML('type="text" size="10" readonly=true');
       $col15->setOculta(true);

	   $col16 = new Columna('Recargos');
	   $col16->setTipo(Columna::TEXTO);
	   $col16->setEsGrabable(false);
	   $col16->setAlineacionObjeto(Columna::CENTRO);
	   $col16->setAlineacionContenido(Columna::CENTRO);
	   $col16->setNombreCampo('anadir');
     $jsscript16='onClick="mostrargridrecargos(this.id)"';
	   $col16->setHTML('type="text" size="1" style="border:none" class="imagenalmacen"'.$jsscript16);
	   //$col16->setJScript('onClick="mostrargridrecargos(this.id)"');
	   if ($precom=='' && $this->oculrecnoprc=='S') $col16->setOculta(true);
           if ($naplrecdes=='S')  $col16->setOculta(true);
           if ($oculcol=='S') $col16->setOculta(true);


	  $col17 = new Columna('cadena_datos_recargo');
      $col17->setTipo(Columna::TEXTO);
      $col17->setEsGrabable(true);
      $col17->setAlineacionObjeto(Columna::IZQUIERDA);
      $col17->setAlineacionContenido(Columna::IZQUIERDA);
      $col17->setNombreCampo('datosrecargo');
      $col17->setOculta(true);

      $filcencos=H::getConfApp2('filcencos','compras','almordcom');
      $oculcencos=H::getConfApp2('oculcencos', 'compras', 'almsolegr');
    $params = array("'+$(this.id).up().previous(12).descendants()[0].value+'",'val2');
      $col18 = new Columna('Centro de Costo');
    $col18->setTipo(Columna::TEXTO);
    $col18->setEsGrabable(true);
    $col18->setAlineacionObjeto(Columna::CENTRO);
    $col18->setAlineacionContenido(Columna::CENTRO);
    $col18->setNombreCampo('codcen');
    $col18->setHTML('type="text" size="10" maxlength="32"');
    if ($filcencos=='S')
        $col18->setCatalogo('Cadefcen','sf_admin_edit_form', array('codcen' => 18,'descen' => 19),'Cadefcen_Almsolegr2',$params);
    else
        $col18->setCatalogo('Cadefcen','sf_admin_edit_form', array('codcen' => 18,'descen' => 19),'Cadefcen_Almsolegr');
    $col18->setAjax('almsolegr',13,19);
    if ($oculcencos=='S') $col18->setOculta(true);

    $col19 = new Columna('Descripción');
    $col19->setTipo(Columna::TEXTO);
    $col19->setEsGrabable(true);
    $col19->setAlineacionObjeto(Columna::IZQUIERDA);
    $col19->setAlineacionContenido(Columna::IZQUIERDA);
    $col19->setNombreCampo('descen');
    $col19->setHTML('type="text" size="25" readonly="true"');
    if ($oculcencos=='S') $col19->setOculta(true);
    
    $col20 = new Columna('Unidad de Medida');
    $col20->setTipo(Columna::TEXTO);
    $col20->setEsGrabable(true);
    $col20->setAlineacionObjeto(Columna::CENTRO);
    $col20->setAlineacionContenido(Columna::CENTRO);
    $col20->setNombreCampo('codunimed');
    $col20->setHTML('type="text" size="10" maxlength="6"');
    $col20->setCatalogo('Cadefunimed','sf_admin_edit_form', array('codunimed' => 20,'desunimed' => 21),'Cadefunimed_Almregart');
    $col20->setAjax('almsolegr',14,21);

    $col21 = new Columna('Descripción');
    $col21->setTipo(Columna::TEXTO);
    $col21->setEsGrabable(true);
    $col21->setAlineacionObjeto(Columna::IZQUIERDA);
    $col21->setAlineacionContenido(Columna::IZQUIERDA);
    $col21->setNombreCampo('desunimed');
    $col21->setHTML('type="text" size="25" readonly="true"');

    $col22 = new Columna('Observaciones');
    $col22->setTipo(Columna::TEXTAREA);
    $col22->setEsGrabable(true);
    $col22->setAlineacionObjeto(Columna::IZQUIERDA);
    $col22->setAlineacionContenido(Columna::IZQUIERDA);
    $col22->setNombreCampo('observ');
    $col22->setHTML('type="text" size="25x2" maxlength="2000"');

    $col23 = new Columna('Detalles Técnicos');
    $col23->setTipo(Columna::TEXTAREA);
    $col23->setEsGrabable(true);
    $col23->setAlineacionObjeto(Columna::IZQUIERDA);
    $col23->setAlineacionContenido(Columna::IZQUIERDA);
    $col23->setNombreCampo('dettec');
    $col23->setHTML('type="text" size="25x2" maxlength="2000" onkeyup="javascript:return ismaxlength(this)"');
    if ($mosdettec!='S') $col23->setOculta(true);

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
       $opciones->addColumna($col14);
       $opciones->addColumna($col15);
       $opciones->addColumna($col16);
       $opciones->addColumna($col17);
       $opciones->addColumna($col18);
       $opciones->addColumna($col19);
       $opciones->addColumna($col20);
       $opciones->addColumna($col21);
       $opciones->addColumna($col22);
       $opciones->addColumna($col23);

       $this->obj = $opciones->getConfig($reg);

  }

      /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
      public function configGridDetalleConsulta()
   {
      $detsinord=H::getConfApp2('detsinord', 'compras', 'almsolegr');
      $oculcol=H::getConfApp2('oculcol', 'compras', 'almsolegr');
       $c = new Criteria();
       $c->add(CaartsolPeer::REQART,$this->casolart->getReqart());
       if ($detsinord!="S")
       $c->addAscendingOrderByColumn(CaartsolPeer::CODART);
       else
           $c->addAscendingOrderByColumn(CaartsolPeer::ID);
       $reg = CaartsolPeer::doSelect($c);

       $mascaraarticulo=$this->mascaraarticulo;
       $lonart=strlen($this->mascaraarticulo);
       $mascaracategoria=$this->mascaracategoria;
       $loncat=strlen($this->mascaracategoria);
       $mascarapresupuesto=$this->mascarapresupuesto;
       $lonpre=strlen($this->mascarapresupuesto);
       $precom=$this->precompromete;

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(false);
       $opciones->setTabla('Caartsol');
              if ($oculcol=='S') {
           $opciones->setAncho(700);
           $opciones->setAnchoGrid(750);
       }
       else  {
       $opciones->setAncho(900);
       $opciones->setAnchoGrid(950);
       }


       $opciones->setFilas(0);
       $opciones->setTitulo('');
       $opciones->setHTMLTotalFilas(' ');

       $naplrecdes=H::getConfApp2('naplrecdes', 'compras', 'almsolegr');

       $col1 = new Columna('Marque');
       $col1->setTipo(Columna::CHECK);
       $col1->setNombreCampo('check');
       $col1->setEsGrabable(true);
       $col1->setHTML(' ');
	   if ($precom=='' && $this->oculrecnoprc=='S') $col1->setOculta(true);
       //$col1->setJScript('onClick="totalmarcadas(this.id)"');
       if ($naplrecdes=='S') $col1->setOculta(true);

       $col2 = new Columna('Cód. Artículo');
       $col2->setTipo(Columna::TEXTO);
       $col2->setEsGrabable(true);
       $col2->setAlineacionObjeto(Columna::CENTRO);
       $col2->setAlineacionContenido(Columna::CENTRO);
       $col2->setNombreCampo('codart');
       //$col2->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
       $col2->setHTML('type="text" size="17" maxlength="'.chr(39).$lonart.chr(39).'" readonly="true"');

       $col3 = new Columna('Descripción');
       $col3->setTipo(Columna::TEXTAREA);
       $col3->setAlineacionObjeto(Columna::IZQUIERDA);
       $col3->setAlineacionContenido(Columna::IZQUIERDA);
       $col3->setNombreCampo('desartsol');
       $col3->setHTML('type="text" size="25x1" readonly=true');

       $col4 = new Columna('Unidad de Medida');
       $col4->setTipo(Columna::TEXTO);
       $col4->setAlineacionObjeto(Columna::IZQUIERDA);
       $col4->setAlineacionContenido(Columna::IZQUIERDA);
       $col4->setNombreCampo('unimed');
       $col4->setEsGrabable(true);
       $col4->setHTML('type="text" size="25" readonly=true');

       $col5 = new Columna('Cód. Unidad');
       $col5->setTipo(Columna::TEXTO);
       $col5->setEsGrabable(true);
       $col5->setAlineacionObjeto(Columna::CENTRO);
       $col5->setAlineacionContenido(Columna::CENTRO);
       $col5->setNombreCampo('codcat');
       $col5->setHTML('type="text" size="17" maxlength="'.chr(39).$loncat.chr(39).'" readonly="true"');
       //$col5->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaracategoria.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);actualizo_cod_presupuestario(this.id);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
       if ($oculcol=='S') $col5->setOculta(true);

       $col6 = new Columna('Cód. Presupuestario');
       $col6->setTipo(Columna::TEXTO);
       $col6->setEsGrabable(true);
       $col6->setNombreCampo('codigopre');
       $col6->setAlineacionObjeto(Columna::CENTRO);
       $col6->setAlineacionContenido(Columna::CENTRO);
       $col6->setHTML('type="text" size="55" maxlength="'.chr(39).$lonpre.chr(39).'" readonly="true"');
       //$col6->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapresupuesto.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
       if ($oculcol=='S') $col6->setOculta(true);

       $col7 = new Columna('Cant. Requerida');
       $col7->setEsGrabable(true);
       $col7->setTipo(Columna::MONTO);
       $col7->setAlineacionContenido(Columna::DERECHA);
       $col7->setAlineacionObjeto(Columna::DERECHA);
       $col7->setNombreCampo('canreq');
       $col7->setEsNumerico(true);
       $col7->setHTML('type="text" size="10" readonly="true"');
       //$col7->setJScript('onBlur="javascript:event.keyCode=13; Cantidad(event,this.id); recalcularecargos(event,this.id);"');

       $col8 = clone $col7;
       $col8->setTitulo('Cant. Recibida');
       $col8->setNombreCampo('canrec');
       $col8->setHTML('type="text" size="10" readonly=true');
       if ($oculcol=='S') $col8->setOculta(true);

       $col9 = clone $col7;
       $col9->setTitulo('Costo');
       $col9->setNombreCampo('costo');
       $col9->setDecimal(6);
       $col9->setHTML('type="text" size="10" readonly="true"');
       //$col9->setJScript('onKeypress="Total(event,this.id); recalcularecargos(event,this.id);"');
       if ($oculcol=='S') $col9->setOculta(true);

       $col10 = clone $col7;
       $col10->setTitulo('Descuento');
       $col10->setNombreCampo('mondes');
       $col10->setHTML('type="text" size="10" readonly="true"');
       //$col10->setJScript('onKeypress="Totalmenosdescuento(event,this.id); recalcularecargos(event,this.id);"');
       if ($naplrecdes=='S') $col10->setOculta(true);
       if ($oculcol=='S') $col10->setOculta(true);

       $col11 = clone $col7;
       $col11->setTitulo('Recargo');
       $col11->setNombreCampo('monrgo');
       $col11->setDecimal(4);
       $col11->setHTML('type="text" size="10" readonly=true');
       if ($precom=='' && $this->oculrecnoprc=='S') $col11->setOculta(true);
       if ($naplrecdes=='S') $col11->setOculta(true);
       if ($oculcol=='S') $col11->setOculta(true);

       $col12 = clone $col7;
       $col12->setTitulo('Total');
       $col12->setNombreCampo('montot');
       $col12->setDecimal(6);
       $col12->setHTML('type="text" size="10" readonly=true');
       //$col12->setEsTotal(true,'casolart_monreq');


       $col13 = new Columna('Codigo Partida');
       $col13->setTipo(Columna::TEXTO);
       $col13->setEsGrabable(false);
       $col13->setOculta(true);
       $col13->setAlineacionObjeto(Columna::CENTRO);
       $col13->setAlineacionContenido(Columna::CENTRO);
       $col13->setNombreCampo('CodPre');
       $col13->setHTML('type="text" size="20" readonly="true"');

       $col14 = clone $col12;
       $col14->setTitulo('Total');
       $col14->setNombreCampo('montot2');
       $col14->setOculta(true);

       $col15 = clone $col11;
       $col15->setTitulo('Recargo');
       $col15->setNombreCampo('monrgo2');
       $col15->setHTML('type="text" size="10" readonly=true');
       $col15->setOculta(true);

	   $col16 = new Columna('Recargos');
	   $col16->setTipo(Columna::TEXTO);
	   $col16->setEsGrabable(false);
	   $col16->setAlineacionObjeto(Columna::CENTRO);
	   $col16->setAlineacionContenido(Columna::CENTRO);
	   $col16->setNombreCampo('anadir');
     $jsscript16='onClick="mostrargridrecargos(this.id)"';
	   $col16->setHTML('type="text" size="1" style="border:none" class="imagenalmacen"'.$jsscript16);
	   //$col16->setJScript('onClick="mostrargridrecargos(this.id)"');
	   if ($precom=='' && $this->oculrecnoprc=='S') $col16->setOculta(true);
           if ($naplrecdes=='S') $col16->setOculta(true);
           if ($oculcol=='S') $col16->setOculta(true);

	   $col17 = new Columna('cadena_datos_recargo');
       $col17->setTipo(Columna::TEXTO);
       $col17->setEsGrabable(true);
       $col17->setAlineacionObjeto(Columna::IZQUIERDA);
       $col17->setAlineacionContenido(Columna::IZQUIERDA);
       $col17->setNombreCampo('datosrecargo');
       $col17->setOculta(true);

       $col18 = new Columna('Centro de Costo');
    $col18->setTipo(Columna::TEXTO);
    $col18->setEsGrabable(true);
    $col18->setAlineacionObjeto(Columna::CENTRO);
    $col18->setAlineacionContenido(Columna::CENTRO);
    $col18->setNombreCampo('codcen');
    $col18->setHTML('type="text" size="10" maxlength="32"');
    $col18->setCatalogo('Cadefcen','sf_admin_edit_form', array('codcen' => 18,'descen' => 19),'Cadefcen_Almsolegr');
    $col18->setAjax('almsolegr',13,19);

    $col19 = new Columna('Descripción');
    $col19->setTipo(Columna::TEXTO);
    $col19->setEsGrabable(true);
    $col19->setAlineacionObjeto(Columna::IZQUIERDA);
    $col19->setAlineacionContenido(Columna::IZQUIERDA);
    $col19->setNombreCampo('descen');
    $col19->setHTML('type="text" size="25" readonly="true"');


    $col20 = new Columna('Observaciones');
    $col20->setTipo(Columna::TEXTAREA);
    $col20->setEsGrabable(true);
    $col20->setAlineacionObjeto(Columna::IZQUIERDA);
    $col20->setAlineacionContenido(Columna::IZQUIERDA);
    $col20->setNombreCampo('observ');
    $col20->setHTML('type="text" size="25x2" readonly="true"');

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
       $opciones->addColumna($col14);
       $opciones->addColumna($col15);
       $opciones->addColumna($col16);
       $opciones->addColumna($col17);
       $opciones->addColumna($col18);
       $opciones->addColumna($col19);
       $opciones->addColumna($col20);

       $this->obj = $opciones->getConfig($reg);

  }

    /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
    public function configGridRecargo($reqart="",$codart="",$coduni="", $desart="")
   {
	   $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
     $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
       $c = new Criteria();
       $c->add(CadisrgoPeer::REQART,$reqart);
       $c->add(CadisrgoPeer::CODART,$codart);
       $c->add(CadisrgoPeer::CODCAT,$coduni);
       if ($claartdes=='S') $c->add(CadisrgoPeer::DESART,$desart);
       $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
       $c->addAscendingOrderByColumn(CadisrgoPeer::CODRGO);
       $reg = CadisrgoPeer::doSelect($c);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Cadisrgo');
       $opciones->setAncho(650);
       $opciones->setAnchoGrid(700);
       $opciones->setTitulo('Recargos');
       $opciones->setName('b');
       $opciones->setFilas(20);
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Código Recargo');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codrgo');
       $jsscript='onKeypress="javascript: perderfocus(event,this.id,6);" onBlur="javascript:event.keyCode=13; ajaxrecargo(event,this.id);"';
       $col1->setHTML('type="text" size="15" maxlength="4"'.$jsscript);
       $col1->setCatalogo('carecarg','sf_admin_edit_form',array('codrgo' => 1, 'nomrgo' => 2,'monrgo' => 3,'tiprgo' => 4));
       //$col1->setJScript('onKeypress="javascript: perderfocus(event,this.id,6);" onBlur="javascript:event.keyCode=13; ajaxrecargo(event,this.id);"');

       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('nomrgo');
       $col2->setHTML('type="text" size="35" readonly=true');

       $col3 = new Columna('Monto  Por Recargo');
       $col3->setTipo(Columna::TEXTO);
       $col3->setAlineacionContenido(Columna::IZQUIERDA);
       $col3->setAlineacionObjeto(Columna::IZQUIERDA);
       $col3->setNombreCampo('monrgoc');
       $col3->setEsNumerico(true);
       $col3->setOculta(true);

       $col4 = new Columna('Tipo Recargo');
       $col4->setTipo(Columna::TEXTO);
       $col4->setAlineacionContenido(Columna::CENTRO);
       $col4->setAlineacionObjeto(Columna::CENTRO);
       $col4->setNombreCampo('tiprgo');
       $col4->setOculta(true);

       $col5 = new Columna('Monto Recargo');
       $col5->setTipo(Columna::MONTO);
       $col5->setEsGrabable(true);
       $col5->setAlineacionContenido(Columna::DERECHA);
       $col5->setAlineacionObjeto(Columna::DERECHA);
       $col5->setNombreCampo('monrgo');
       $col5->setEsNumerico(true);
       $col5->setDecimal(4);
       $jsscript2='readOnly=true; onKeyPress="javascript:if (event.keyCode==13 || event.keyCode==9) {total_recargos();} "';
       $col5->setHTML('type="text" size="25"'.$jsscript2);
       //$col5->setJScript('readOnly=true; onKeyPress="javascript:if (event.keyCode==13 || event.keyCode==9) {actualizarsaldos_b();} "');
       //$col5->setEsTotal(true,'totrecar');


       $opciones->addColumna($col1);
       $opciones->addColumna($col2);
       $opciones->addColumna($col3);
       $opciones->addColumna($col4);
       $opciones->addColumna($col5);

       $this->obj2 = $opciones->getConfig($reg);

  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
   public function configGridRecargoConsulta($reqart="",$codart="",$coduni="", $desart="")
   {
       $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
       $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
       $c = new Criteria();
       $c->add(CadisrgoPeer::REQART,$reqart);
       $c->add(CadisrgoPeer::CODART,$codart);
       $c->add(CadisrgoPeer::CODCAT,$coduni);
       if ($claartdes=='S') $c->add(CadisrgoPeer::DESART,$desart);
       $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
       $c->addAscendingOrderByColumn(CadisrgoPeer::CODRGO);
       $reg = CadisrgoPeer::doSelect($c);


       $opciones = new OpcionesGrid();
       $opciones->setEliminar(false);
       $opciones->setTabla('Cargosol');
       $opciones->setAncho(700);
       $opciones->setAnchoGrid(700);
       $opciones->setTitulo('Recargos');
       $opciones->setName('b');
       $opciones->setFilas(0);
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Código Recargo');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codrgo');
       $col1->setHTML('type="text" size="15" maxlength="4" readonly="true"');

       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('nomrgo');
       $col2->setHTML('type="text" size="35" readonly=true');

       $col3 = new Columna('Monto  Por Recargo');
       $col3->setTipo(Columna::TEXTO);
       $col3->setAlineacionContenido(Columna::IZQUIERDA);
       $col3->setAlineacionObjeto(Columna::IZQUIERDA);
       $col3->setNombreCampo('monrgoc');
       $col3->setEsNumerico(true);
       $col3->setOculta(true);

       $col4 = new Columna('Tipo Recargo');
       $col4->setTipo(Columna::TEXTO);
       $col4->setAlineacionContenido(Columna::CENTRO);
       $col4->setAlineacionObjeto(Columna::CENTRO);
       $col4->setNombreCampo('tiprgo');
       $col4->setOculta(true);

       $col5 = new Columna('Monto Recargo');
       $col5->setTipo(Columna::MONTO);
       $col5->setEsGrabable(true);
       $col5->setAlineacionContenido(Columna::DERECHA);
       $col5->setAlineacionObjeto(Columna::DERECHA);
       $col5->setNombreCampo('monrgo');
       $col5->setEsNumerico(true);
       $col5->setDecimal(4);
       $col5->setHTML('type="text" size="25" readonly="true"');
       //$col5->setJScript('onKeypress="entermonto_b(event,this.id);"');
       //$col5->setEsTotal(true,'totrecar');


       $opciones->addColumna($col1);
       $opciones->addColumna($col2);
       $opciones->addColumna($col3);
       $opciones->addColumna($col4);
       $opciones->addColumna($col5);

       $this->obj2 = $opciones->getConfig($reg);

  }

    /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
    public function configGridRazon()
   {
       $c = new Criteria();
       $c->add(CasolrazPeer::NUMSOL,$this->casolart->getReqart());
       $c->addAscendingOrderByColumn(CasolrazPeer::CODRAZCOM);
       $reg = CasolrazPeer::doSelect($c);


       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Casolraz');
       $opciones->setAncho(500);
       $opciones->setAnchoGrid(550);
       $opciones->setTitulo('');
       $opciones->setName('c');
       $opciones->setFilas(10);
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Código');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codrazcom');
       $jsscript='onkeyPress="perderfocus(event,this.id,15);" onBlur="javascript:event.keyCode=13; ajax(event,this.id)"';
       $col1->setHTML('type="text" size="10" maxlength="4"'.$jsscript);
       //$col1->setJScript('onkeyPress="perderfocus(event,this.id,15);" onBlur="javascript:event.keyCode=13; ajax(event,this.id)"');
       $col1->setCatalogo('carazcom','sf_admin_edit_form',array('codrazcom' => 1, 'desrazcom' => 2));


       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('desrazcom');
       $col2->setHTML('type="text" size="40" readonly=true');

       $opciones->addColumna($col1);
       $opciones->addColumna($col2);

       $this->obj3 = $opciones->getConfig($reg);

  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRazonConsulta()
   {
       $c = new Criteria();
       $c->add(CasolrazPeer::NUMSOL,$this->casolart->getReqart());
       $c->addAscendingOrderByColumn(CasolrazPeer::CODRAZCOM);
       $reg = CasolrazPeer::doSelect($c);


       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Casolraz');
       $opciones->setAncho(400);
       $opciones->setAnchoGrid(400);
       $opciones->setTitulo('');
       $opciones->setName('c');
       $opciones->setFilas(10);
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Código');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codrazcom');
       $col1->setHTML('type="text" size="10" maxlength="4" readonly="true"');

       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('desrazcom');
       $col2->setHTML('type="text" size="25" readonly=true');

       $opciones->addColumna($col1);
       $opciones->addColumna($col2);

       $this->obj3 = $opciones->getConfig($reg);

  }

  public function setVars()
  {
  	$this->autoriza_solicutud_egreso = Herramientas::ObtenerFormato('Cadefart','solreqapr');
    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
    $this->mascarapresupuesto = Herramientas::formatoPresupuesto();
    if($this->casolart) $this->casolart->setIndetiqueta(H::getConfApp2('indetiqueta', 'compras', 'almsolegr'));
    $c= new Criteria();
    $regis= CadefartPeer::doSelectOne($c);
    if ($regis)
    {
      $this->precompromete=$regis->getPrcasopre();
      $this->autorizaprecom=$regis->getPrcreqapr();
      $this->tiporec= $regis->getAsiparrec();
      if($this->casolart) $this->casolart->setTipof($regis->getTipfin());
    }
    else
    {
      $this->precompromete="";
      $this->autorizaprecom="";
      $this->tiporec="";
    }

    $this->cambiareti="";
    $this->numsoldesh="";
    $this->mansolocor="";
    $this->bloqfec="";
    $this->oculeli="";
    $this->nometifor="";
    $this->oculrecnoprc="";
    $this->catbnubica="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almsolegr',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('cambiareti',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$this->cambiareti=$varemp['aplicacion']['compras']['modulos']['almsolegr']['cambiareti'];
	       }
           if(array_key_exists('numsoldesh',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$this->numsoldesh=$varemp['aplicacion']['compras']['modulos']['almsolegr']['numsoldesh'];
	       }
	       if(array_key_exists('mansolocor',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$this->mansolocor=$varemp['aplicacion']['compras']['modulos']['almsolegr']['mansolocor'];
	       }
	       if(array_key_exists('bloqfec',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$this->bloqfec=$varemp['aplicacion']['compras']['modulos']['almsolegr']['bloqfec'];
	       }
	       if(array_key_exists('oculeli',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$this->oculeli=$varemp['aplicacion']['compras']['modulos']['almsolegr']['oculeli'];
	       }
	       if(array_key_exists('nometifor',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$this->nometifor=$varemp['aplicacion']['compras']['modulos']['almsolegr']['nometifor'];
	       }
		    if(array_key_exists('oculrecnoprc',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$this->oculrecnoprc=$varemp['aplicacion']['compras']['modulos']['almsolegr']['oculrecnoprc'];
	       }
	       if(array_key_exists('catbnubica',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$this->catbnubica=$varemp['aplicacion']['compras']['modulos']['almsolegr']['catbnubica'];
	       }
         }
    if ($this->catbnubica=='S'){
    	$this->mascaracategoria=Herramientas::ObtenerFormato('Opdefemp','Forubi');
    }else {
    $this->mascaracategoria = Herramientas::getObtener_FormatoCategoria();
    }
    $this->loncat=strlen($this->mascaracategoria);
  }

  public function executeGenerarcompromiso()
  {
     $this->casolart = $this->getCasolartOrCreate();
      SolicituddeEgresos::verificarDispGenComp($this->casolart,$msj1,$cod1,$msj2,$cod2,$cod3,$msj3,$mdis,$mimp,$resta);
     if ($msj3==-1) {
      if ($msj1==-1)
      {
      	if ($msj2==-1) {
	     if (SolicituddeEgresos::generaPrecompromiso($this->casolart,$this->casolart->getReqart(),$msj))
	     {
	       SolicituddeEgresos::generarImputacionesPrecompromiso($this->casolart->getReqart());
                $m1=H::toFloat($this->casolart->getMonreq());
                $m2=H::toFloat($this->casolart->getValmon(),6);
                $totaimp=round(SolicituddeEgresos::totalImputacion($this->casolart->getReqart())/$m2,2);
                if ($m1!=$totaimp)
	        {
	           $this->msj="El Monto de la Imputaciones Generadas no es igual al de la Solicitud, Por favor verificar esta solicitud";
	           $this->id=$this->casolart->getId();
	        }else{
		       $this->msj="Se genero el Precompromiso satisfactoriamente";
		       $this->id=$this->casolart->getId();
	        }

	     }else {$this->msj="No se pudo grabar el compromiso, ya que existe la referencia en la base de datos";
	     $this->id=$this->casolart->getId();}
      	}else {
      		$this->msj=" No Existe Disponibilidad de Dinero para efectuar la Operación. Recargo ".$cod2." de Codigo Presupuestario ". $cod3.", el monto a imputar es de: ".H::FormatoMonto($mimp) ." y el monto disponible es: ".H::FormatoMonto($mdis).", necesita una disponibilidad adicional de: ".H::FormatoMonto($resta);
            $this->id=$this->casolart->getId();
      	}
      }else {
        if ($msj1==512 || $msj1==2103)
          $this->msj=Herramientas::obtenerMensajeError($msj1)."Articulo ".$cod1."";
        else 	
          $this->msj=" No Existe Disponibilidad de Dinero para efectuar la Operación. Articulo ".$cod1." de Codigo Presupuestario ". $cod3.", el monto a imputar es de: ".H::FormatoMonto($mimp) ." y el monto disponible es: ".H::FormatoMonto($mdis).", necesita una disponibilidad adicional de: ".H::FormatoMonto($resta);
        $this->id=$this->casolart->getId();
      }
     }else {
        $this->msj="La Fecha se encuentra dentro un Período Cerrado";
        $this->id=$this->casolart->getId();

   }
   }

   public function executeAnular()
   {
   $reqart=$this->getRequestParameter('reqart');
   $fecreq=$this->getRequestParameter('fecreq');

   $dateFormat = new sfDateFormat($this->getUser()->getCulture());
   $fec = $dateFormat->format($fecreq, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(CasolartPeer::REQART,$reqart);
   $c->add(CasolartPeer::FECREQ,$fec);
   $this->casolart = CasolartPeer::doSelectOne($c);
   sfView::SUCCESS;
   }

  public function executeSalvaranu()
  {
    $reqart=$this->getRequestParameter('reqart');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');
    $this->msg='';

    $tiepre=H::getX_vacio('REFPRC','Cpprecom','Refprc',$reqart);
    if (!Herramientas::validarPeriodoPresuesto($fecanu) && $tiene!='')
    {
      $this->msj="La Fecha se encuentra dentro un Período Cerrado Presupuestariamente.";     
    }else {
      $sql="select a.refere as referencia from cpajuste a, cpdocaju b where a.tipaju=b.tipaju and b.refier='P' and a.refere='".$reqart."' and a.staaju='A'";
      if (!(Herramientas::BuscarDatos($sql,$result)))
      {
        $c= new Criteria();
        $c->add(CpcomproPeer::STACOM,'N',Criteria::NOT_EQUAL);
        $c->add(CpcomproPeer::REFPRC,$reqart);
        $resul= CpcomproPeer::doSelectOne($c);
        if (!($resul))
        {
          $c= new Criteria();
          $c->add(CasolartPeer::REQART,$reqart);
          $registro= CasolartPeer::doSelectOne($c);
          if ($registro)
          {
            $registro->setFecanu($fecanu);
            $registro->setStareq('N');
            $registro->save();
          }

          $b= new Criteria();
          $b->add(CpprecomPeer::REFPRC,$reqart);
          $registro2= CpprecomPeer::doSelectOne($b);
          if ($registro2)
          {
            $registro2->setDesanu($desanu);
            $registro2->setFecanu($fecanu);
            $registro2->setStaprc('N');
            $registro2->save();

            $a= new Criteria();
            $a->add(CpimpprcPeer::REFPRC,$reqart);
            $registro3= CpimpprcPeer::doSelect($a);
            if ($registro3)
            {
              foreach ($registro3 as $cpimpprc)
              {
                $cpimpprc->setStaimp('N');
                $cpimpprc->save();
              }
            }
          }
        }else $this->msj="La Solicitud de Egreso no puede ser anulada ya que tiene un Compromiso Asociado";
      }else $this->msj="La Solicitud de Egreso no puede ser anulada ya que tiene un Ajuste Asociado";
    }
    return sfView::SUCCESS;
  }

  protected function getLabels()
    {
      
      $etiunires=H::getConfApp2('etiunires', 'compras', 'almsolegr');
      if ($etiunires=='')
        $etiunires='Unidad Responsable';

      $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
      if ($cambiareti=='S')
        $etidirec='Estado';
      else $etidirec='Dirección';

      return array(
        'casolart{reqart}' => 'Número',
        'casolart{fecreq}' => 'Fecha',
        'casolart{tipmon}' => 'Moneda',
        'casolart{desreq}' => 'Descripción',
        'casolart{monreq}' => 'Monto Total',
        'casolart{unires}' => $etiunires,
        'casolart{nomcat}' => 'Descripción',
        'casolart{tipreq}' => 'Tipo',
        'casolart{tipfin}' => 'Financiamiento',
        'casolart{nomext}' => 'Nomext',
        'casolart{motreq}' => 'Motivo',
        'casolart{benreq}' => 'Beneficio',
        'casolart{obsreq}' => 'Observaciones',
        'casolart{mondes}' => 'Descripción',
        'casolart{valmon}' => 'Valor',
        'casolart{stareq}' => 'estatus',
        'casolart{codcen}' => 'Centro de Costo',
         'casolart{refpre}' => 'Referencia Presupuesto Base',
         'casolart{prebas}' => 'Presupuesto Base',
         'casolart{numproc}' => 'N° de Procedimiento',
         'casolart{codeve}' => 'Evento',
         'casolart{coddirec}' => $etidirec,
         'casolart{coddivi}' => 'División',
         'casolart{codubi}' => 'Unidad Responsable',
         'casolart{nomben}' => 'Nombres y Apellidos del Pasajero:',
        'casolart{cedrif}' => 'Cédula:',
        'casolart{fecsal}' => 'Fecha de Salida:',
        'casolart{horsal}' => 'Hora de Salida:',
        'casolart{fecreg}' => 'Fecha de Regreso:',
        'casolart{horreg}' => 'Hora de Regreso:',
        'casolart{codreg}' => 'Región:',
        'casolart{codpro}' => 'Proveedor:',
        'casolart{lugent}' => 'Lugar de Entrega ó Prestación del Servicio:',
      );
    }

  protected function getCasolartOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $casolart = new Casolart();

    }
    else
    {
      $casolart = CasolartPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($casolart);
    }

    return $casolart;
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/casolart/filters');

    $this->cambiareti="";
    $this->fornumuni="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almsolegr',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('cambiareti',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$this->cambiareti=$varemp['aplicacion']['compras']['modulos']['almsolegr']['cambiareti'];
	       }
	       if(array_key_exists('nometifor',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$this->nometifor=$varemp['aplicacion']['compras']['modulos']['almsolegr']['nometifor'];
	       }
	       if(array_key_exists('fornumuni',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$this->fornumuni=$varemp['aplicacion']['compras']['modulos']['almsolegr']['fornumuni'];
	       }
	     }
   $loguse= $this->getUser()->getAttribute('loguse');
   $filiscen=H::getConfApp2('filiscen', 'compras', 'almsolegr'); 
   $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 

     // 15    // pager
    $this->pager = new sfPropelPager('Casolart', 15);
    $c = new Criteria();
    if ($this->fornumuni=='S')
    {
      $this->sql="casolart.unires in (select codcat from causuuni where loguse='".$loguse."')";
      $c->add(CasolartPeer::UNIRES,$this->sql,Criteria::CUSTOM);
    }else if ($filiscen=='S') {
        $this->sql='casolart.codcen in (select codcen from "SIMA_USER".segcenusu where loguse=\''.$loguse.'\')';
        $c->add(CasolartPeer::CODCEN,$this->sql,Criteria::CUSTOM);      
    }else if ($filsoldir=='S'){
      $this->sql='casolart.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CasolartPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['reqart_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasolartPeer::REQART, '');
      $criterion->addOr($c->getNewCriterion(CasolartPeer::REQART, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['reqart']) && $this->filters['reqart'] !== '')
    {
      $c->add(CasolartPeer::REQART, '%'.strtr($this->filters['reqart'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['desreq_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasolartPeer::DESREQ, '');
      $criterion->addOr($c->getNewCriterion(CasolartPeer::DESREQ, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desreq']) && $this->filters['desreq'] !== '')
    {
      $c->add(CasolartPeer::DESREQ, '%'.strtr($this->filters['desreq'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fecreq_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasolartPeer::FECREQ, '');
      $criterion->addOr($c->getNewCriterion(CasolartPeer::FECREQ, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecreq']))
    {
      if (isset($this->filters['fecreq']['from']) && $this->filters['fecreq']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(CasolartPeer::FECREQ, date('Y-m-d', $this->filters['fecreq']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecreq']['to']) && $this->filters['fecreq']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(CasolartPeer::FECREQ, date('Y-m-d', $this->filters['fecreq']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(CasolartPeer::FECREQ, date('Y-m-d', $this->filters['fecreq']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['codcen_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasolartPeer::CODCEN, '');
      $criterion->addOr($c->getNewCriterion(CasolartPeer::CODCEN, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcen']) && $this->filters['codcen'] !== '')
    {
      $loguse= $this->getUser()->getAttribute('loguse');
      $filiscen=H::getConfApp2('filiscen', 'compras', 'almsolegr'); 
      if ($filiscen=='S') {
        $codigocen='%'.strtr($this->filters['codcen'], '*', '%').'%';
        $this->sql='casolart.CODCEN ILIKE \''.$codigocen.'\'  AND casolart.codcen in (select codcen from "SIMA_USER".segcenusu where loguse=\''.$loguse.'\')';
        $c->add(CasolartPeer::CODCEN,$this->sql,Criteria::CUSTOM);      
      }else $c->add(CasolartPeer::CODCEN, '%'.strtr($this->filters['codcen'], '*', '%').'%', Criteria::LIKE);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['descen_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasolartPeer::DESCEN, '');
      $criterion->addOr($c->getNewCriterion(CasolartPeer::DESCEN, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['descen']) && $this->filters['descen'] !== '')
    {
      $loguse= $this->getUser()->getAttribute('loguse');
      $filiscen=H::getConfApp2('filiscen', 'compras', 'almsolegr'); 
      if ($filiscen=='S') {
        $descrcen='%'.strtr($this->filters['descen'], '*', '%').'%';
        $this->sql='cadefcen.DESCEN ILIKE \''.$descrcen.'\'  AND casolart.codcen in (select codcen from "SIMA_USER".segcenusu where loguse=\''.$loguse.'\')';
        $c->add(CasolartPeer::CODCEN,$this->sql,Criteria::CUSTOM);      
        $c->addJoin(CasolartPeer::CODCEN, CadefcenPeer::CODCEN);
      }else {
        $c->add(CadefcenPeer::DESCEN, '%'.strtr($this->filters['descen'], '*', '%').'%', Criteria::LIKE);
        $c->addJoin(CasolartPeer::CODCEN, CadefcenPeer::CODCEN);
      }
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['unires_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasolartPeer::UNIRES, '');
      $criterion->addOr($c->getNewCriterion(CasolartPeer::UNIRES, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['unires']) && $this->filters['unires'] !== '')
    {
      $c->add(CasolartPeer::UNIRES, '%'.strtr($this->filters['unires'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomcat_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasolartPeer::NOMCAT, '');
      $criterion->addOr($c->getNewCriterion(CasolartPeer::NOMCAT, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomcat']) && $this->filters['nomcat'] !== '')
    {
      $c->add(NpcatprePeer::NOMCAT, '%'.strtr($this->filters['nomcat'], '*', '%').'%', Criteria::LIKE);
      $c->addJoin(CasolartPeer::UNIRES, NpcatprePeer::CODCAT);
    }
    if (isset($this->filters['codcat_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasolartPeer::CODCAT, '');
      $criterion->addOr($c->getNewCriterion(CasolartPeer::CODCAT, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcat']) && $this->filters['codcat'] !== '')
    {
      $c->add(CaartsolPeer::CODCAT, $this->filters['codcat']);
      $c->addJoin(CasolartPeer::CODCAT, CaartsolPeer::CODCAT);
    }
    if (isset($this->filters['descat_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasolartPeer::DESCAT, '');
      $criterion->addOr($c->getNewCriterion(CasolartPeer::DESCAT, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['descat']) && $this->filters['descat'] !== '')
    {
      $c->add(NpcatprePeer::NOMCAT, '%'.strtr($this->filters['descat'], '*', '%').'%', Criteria::LIKE);
      $c->addJoin(CaartsolPeer::CODCAT, NpcatprePeer::CODCAT);
      $c->addJoin(CasolartPeer::CODCAT, CaartsolPeer::CODCAT);
    }
    if (isset($this->filters['numproc_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasolartPeer::NUMPROC, '');
      $criterion->addOr($c->getNewCriterion(CasolartPeer::NUMPROC, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['numproc']) && $this->filters['numproc'] !== '')
    {
      $c->add(CasolartPeer::NUMPROC, '%'.strtr($this->filters['numproc'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['aprreq_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasolartPeer::APRREQ, '');
      $criterion->addOr($c->getNewCriterion(CasolartPeer::APRREQ, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['aprreq']) && $this->filters['aprreq'] !== '')
    {
      $c->add(CasolartPeer::APRREQ, '%'.strtr($this->filters['aprreq'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
  }
  
}
