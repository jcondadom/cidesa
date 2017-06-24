<?php

/**
 * almsalalm actions.
 *
 * @package    Roraima
 * @subpackage almsalalm
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almsalalmActions extends autoalmsalalmActions
{
  private $coderror =-1;

    public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/casalalm/filters');
    $loguse= $this->getUser()->getAttribute('loguse');
    $filalmsal=H::getConfApp2('filalmsal', 'facturacion', 'almsalalm');
    $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 

     // 15    // pager
    $this->pager = new sfPropelPager('Casalalm', 15);
    $c = new Criteria();
     if ($filalmsal=='S' && $modulo=='facturacion')
    {
      $this->sql='cadetsal.codalm in (select b.codalm from "SIMA_USER".segcajusu a, fadefcaj b where b.id=a.codcaj and a.loguse=\''.$loguse.'\')';
      $c->add(CadetsalPeer::CODALM,$this->sql,Criteria::CUSTOM);
      $c->addJoin(CasalalmPeer::CODSAL,CadetsalPeer::CODSAL);
    }else if ($filsoldir=='S'){
      $this->sql='casalalm.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CasalalmPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getCasalalmOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $casalalm = new Casalalm();
    }
    else
    {
      $casalalm = CasalalmPeer::retrieveByPk($this->getRequestParameter($id));
      $this->forward404Unless($casalalm);
    }

    return $casalalm;
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->casalalm = $this->getCasalalmOrCreate();
    $this->setVars();
    $this->configGrid();
    if (!$this->casalalm->getId()){
      $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
      if ($filsoldir=='S'){
         $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
         $t= new Criteria();
         $t->add(SegdirusuPeer::LOGUSE,$loguse);
         $t->setLimit(1);
         $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
         $regt= SegdirusuPeer::doSelectOne($t); 
         if ($regt){
          if ($this->casalalm->getCoddirec()=='')
            $this->casalalm->setCoddirec($regt->getCoddirec());
         }        
      }
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCasalalmFromRequest();

      if ($this->saveCasalalm($this->casalalm)==-1)
      {
	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('almsalalm/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('almsalalm/list');
	      }
	      else
	      {
	        return $this->redirect('almsalalm/edit?id='.$this->casalalm->getId());
	      }
      }//if ($this->saveCasalalm($this->casalalm)==-1)
     else
	 {
          $this->labels = $this->getLabels();
       	  if($this->coderror!=-1)
	      {
	       $err = Herramientas::obtenerMensajeError($this->coderror);
	       $this->getRequest()->setError('',$err);
	      }
          return sfView::SUCCESS;
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
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
  protected function saveCasalalm($casalalm)
  {
     if ($casalalm->getId())
        $griddet=array();
   else
        $griddet=Herramientas::CargarDatosGrid($this,$this->obj);

	$coderr=Almacen::salvarAlmsalalm($casalalm,$griddet);
	$this->coderror=$coderr;
	return $coderr;
  }

  protected function deleteCasalalm($casalalm)
  {
    Almacen::eliminarAlmsalalm($casalalm);
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCasalalmFromRequest()
  {
    $casalalm = $this->getRequestParameter('casalalm');

    if (isset($casalalm['codsal']))
    {
      $this->casalalm->setCodsal($casalalm['codsal']);
    }
    if (isset($casalalm['fecsal']))
    {
      if ($casalalm['fecsal'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($casalalm['fecsal']))
          {
            $value = $dateFormat->format($casalalm['fecsal'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $casalalm['fecsal'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->casalalm->setFecsal($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->casalalm->setFecsal(null);
      }
    }
    if (isset($casalalm['codalm']))
    {
      $this->casalalm->setCodalm($casalalm['codalm']);
    }
    if (isset($casalalm['nomalm']))
    {
      $this->casalalm->setNomalm($casalalm['nomalm']);
    }
    if (isset($casalalm['codpro']))
    {
      $this->casalalm->setCodpro($casalalm['codpro']);
    }

    if (isset($casalalm['nompro']))
    {
      $this->casalalm->setNompro($casalalm['nompro']);
    }
    if (isset($casalalm['dessal']))
    {
      $this->casalalm->setDessal($casalalm['dessal']);
    }
    if (isset($casalalm['tipmov']))
    {
      $this->casalalm->setTipmov($casalalm['tipmov']);
    }
    if (isset($casalalm['destipsal']))
    {
      $this->casalalm->setDestipsal($casalalm['destipsal']);
    }
    if (isset($casalalm['monsal']))
    {
      $this->casalalm->setMonsal($casalalm['monsal']);
    }
    if (isset($casalalm['codubi']))
    {
      $this->casalalm->setCodubi($casalalm['codubi']);
    }
    if (isset($casalalm['observ']))
    {
      $this->casalalm->setObserv($casalalm['observ']);
    }
    if (isset($casalalm['codcen']))
    {
      $this->casalalm->setCodcen($casalalm['codcen']);
    }
    if (isset($casalalm['coddirec']))
    {
      $this->casalalm->setCoddirec($casalalm['coddirec']);
    }
    $this->casalalm->setStasal('A');
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
   $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
   $this->ajaxs=$this->getRequestParameter('ajax');
   if ($this->getRequestParameter('ajax')=='1')
   {
    $datos=split('!',$this->getRequestParameter('codigo'));
  	$codalm=$datos[0];
  	$codart=$datos[1];
  	$cajtexmos=$datos[2];
    $codubi="";
        if ($manartlot=='S')
          $numlot="";
  	$output = '[["","",""]]';
  	if ($codart=="")
  	{
     $javascript="alert('Debe primero seleccionar el artículo');";
     $output = '[["javascript","'.$javascript.'",""]]';
  	}
  	else//articulo viene informado
  	{
  		$aux = split('_',$cajtexmos);
		$name=$aux[0];
		$fil=$aux[1];
		$cajtexcom=$name."_".$fil."_6";
		$cajcodubi=$name."_".$fil."_8";
		$cajnomubi=$name."_".$fil."_9";
		$codalm=str_pad($codalm,6,'0',STR_PAD_LEFT);
    $loguse= $this->getUser()->getAttribute('loguse');
    $filalmsal=H::getConfApp2('filalmsal', 'facturacion', 'almsalalm');
    $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
  		$c=new Criteria();
	    $c->add(CadefalmPeer::CODALM,$codalm);
      if ($filalmsal=='S' && $modulo=='facturacion'){
        $this->sql= 'cadefalm.codalm in (select b.codalm from "SIMA_USER".segcajusu a, fadefcaj b where b.id=a.codcaj and a.loguse=\''.$loguse.'\')';
        $c->add(CadefalmPeer::TIPREG,$this->sql,Criteria::CUSTOM);
      }
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
                if ($manartlot=='S')
                  $numlot=$alm->getNumlot();
             	$output = '[["'.$cajtexmos.'","'.$nomalm.'",""],["'.$cajtexcom.'","6","c"],["'.$cajcodubi.'","'.$codubi.'",""],["'.$cajnomubi.'","'.$nomubi.'",""]]';
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

  	}
        if ($manartlot=='S')
        {
            $this->numlot=$numlot;
  	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            $this->lotes=$this->ObtenerNumlotxart($codart,$codalm,$codubi);
        }else {
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   }
   else  if ($this->getRequestParameter('ajax')=='2')
   {
     $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
     if ($modulo=='facturacion')
         $dato=eregi_replace("[\n|\r|\n\r]", "", Herramientas::getXx('Facliente',array('codpro'),array($this->getRequestParameter('codigo')),'Nompro'));
     else
         $dato=eregi_replace("[\n|\r|\n\r]", "", Herramientas::getXx('Caprovee',array('codpro','estpro'),array($this->getRequestParameter('codigo'),'A'),'Nompro'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   else  if ($this->getRequestParameter('ajax')=='3')
   {
   	 $cod=str_pad($this->getRequestParameter('codigo'),3,'0',STR_PAD_LEFT);
     $dato=CatipsalPeer::getDestipo($cod);
     $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   else  if ($this->getRequestParameter('ajax')=='4')
   {
     $dato=CaregartPeer::getDesart($this->getRequestParameter('codigo'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
  else if ($this->getRequestParameter('ajax')=='5')
	{
	  	$datos=split('!',$this->getRequestParameter('codigo'));
	   	$codubi=$datos[0];
	  	$codalm=$datos[1];
	  	$codart=$datos[2];
	  	$cajtexmos=$datos[3];
                if ($manartlot=='S')
                    $numlot="";
	  	$output = '[["","",""]]';
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
			$cajcodubi=$name."_".$fil."_8";
			$cajnomubi=$name."_".$fil."_9";
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
                                if ($manartlot=='S')
                                    $numlot=$alm->getNumlot();
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
            if ($manartlot=='S')
            {
                $this->numlot=$numlot;
  		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  		$this->lotes=$this->ObtenerNumlotxart($codart,$codalm,$codubi);
            }else {
  		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
   }
   }
  else if ($this->getRequestParameter('ajax')=='6')
  {
    $datos=split('!',$this->getRequestParameter('codigo'));
  	$codart=$datos[0];
  	$cajtexmos=$datos[1];
    $codalm="";
    $codubi="";
    if ($manartlot=='S')
      $numlot="";
  	$output = '[["","",""]]';
  	if ($codart!="")
  	{
  		$aux = split('_',$cajtexmos);
		$name=$aux[0];
		$fil=$aux[1];
		$cajtexcom=$name."_".$fil."_1";
		$cajcodalm=$name."_".$fil."_6";
		$cajnomalm=$name."_".$fil."_7";
		$cajcodubi=$name."_".$fil."_8";
		$cajnomubi=$name."_".$fil."_9";
    $cajcosto=$name."_".$fil."_4";
    $cajcodbar=$name."_".$fil."_13";
    $cajunimed=$name."_".$fil."_14";
    $mancodbar = H::getConfApp2('mancodbar', 'compras', 'almregart');
    $com='';
  		$c=new Criteria();
	    $c->add(CaregartPeer::CODART,$codart);
	    $datos=CaregartPeer::doSelectOne($c);
	    if ($datos)
	     {
	       $desart=$datos->getDesart();
         $unimed=$datos->getUnimed();
	       //busco el primer almacen y la primera ubicacion para el articulo seleccionado
	       $c = new Criteria();
           $c->add(CaartalmubiPeer::CODART,$codart);
           $c->addAscendingOrderByColumn(CaartalmubiPeer::CODALM);
           $alm = CaartalmubiPeer::doSelectOne($c);
           if ($alm)
           {
             	$codalm=$alm->getCodalm();
             	$nomalm=CadefalmPeer::getDesalmacen($codalm);
             	$codubi=$alm->getCodubi();
             	$nomubi=CadefubiPeer::getDesubicacion($codubi);
              $costo = $datos->getCosult(true);
                if ($manartlot=='S')
                    $numlot=$alm->getNumlot();

              if ($mancodbar=='S'){
                $t= new Criteria();
                $t->add(CaartaltPeer::CODART,$codart);
                $t->add(CaartaltPeer::ACTCOD,'S');
                $regt= CaartaltPeer::doSelectOne($t);
                if ($regt){
                  $com=',["'.$cajcodbar.'","'.$regt->getCodalt().'",""]';
                }
              }
             	$output = '[["'.$cajtexmos.'","'.$desart.'",""],["'.$cajunimed.'","'.$unimed.'",""],["'.$cajnomalm.'","'.$nomalm.'",""],["'.$cajcodalm.'","'.$codalm.'",""],["'.$cajcodubi.'","'.$codubi.'",""],["'.$cajnomubi.'","'.$nomubi.'",""],["'.$cajcosto.'","'.$costo.'",""]'.$com.']';
           }
           else//el almacen seleccionado no existe para el articulo introducido por el usuario
           {
	    	$javascript="alert('El articulo : ".$codart.", no esta asociado a ningún almacen')";
	    	$output = '[["'.$cajtexmos.'","",""],["'.$cajnomalm.'","",""],["'.$cajcodalm.'","",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
           }

	     }
	    else
	    {
        if ($mancodbar=='S'){
            $t= new Criteria();
            $t->add(CaartaltPeer::CODALT,$codart);
            $t->add(CaartaltPeer::ACTCOD,'S');
            $regt= CaartaltPeer::doSelectOne($t);
            if ($regt){
                $c=new Criteria();
                $c->add(CaregartPeer::CODART,$regt->getCodart());
                $datos=CaregartPeer::doSelectOne($c);
                if ($datos)
                 {
                   $desart=$datos->getDesart();
                   $unimed=$datos->getUnimed();
                   //busco el primer almacen y la primera ubicacion para el articulo seleccionado
                     $c = new Criteria();
                     $c->add(CaartalmubiPeer::CODART,$regt->getCodart());
                     $c->addAscendingOrderByColumn(CaartalmubiPeer::CODALM);
                     $alm = CaartalmubiPeer::doSelectOne($c);
                     if ($alm)
                     {
                        $codalm=$alm->getCodalm();
                        $nomalm=CadefalmPeer::getDesalmacen($codalm);
                        $codubi=$alm->getCodubi();
                        $nomubi=CadefubiPeer::getDesubicacion($codubi);
                        $costo = $datos->getCosult(true);
                          if ($manartlot=='S')
                              $numlot=$alm->getNumlot();

                        $com=',["'.$cajcodbar.'","'.$codart.'",""],["'.$cajtexcom.'","'.$regt->getCodart().'",""]';
                                              
                        $output = '[["'.$cajtexmos.'","'.$desart.'",""],["'.$cajunimed.'","'.$unimed.'",""],["'.$cajnomalm.'","'.$nomalm.'",""],["'.$cajcodalm.'","'.$codalm.'",""],["'.$cajcodubi.'","'.$codubi.'",""],["'.$cajnomubi.'","'.$nomubi.'",""],["'.$cajcosto.'","'.$costo.'",""]'.$com.']';
                     }
                     else//el almacen seleccionado no existe para el articulo introducido por el usuario
                     {
                        $javascript="alert('El articulo : ".$codart.", no esta asociado a ningún almacen'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                        $output = '[["'.$cajtexmos.'","",""],["'.$cajnomalm.'","",""],["'.$cajcodalm.'","",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
                     }
                }else {                  
                  $nomalm="";
                  $javascript="alert('Codigo del Articulo no existe...'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                  $output = '[["'.$cajtexmos.'","",""],["'.$cajnomalm.'","",""],["'.$cajcodalm.'","",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
                }
            }else {
              $nomalm="";
              $javascript="alert('El Articulo no existe o no esta Activo'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
              $output = '[["'.$cajtexmos.'","",""],["'.$cajnomalm.'","",""],["'.$cajcodalm.'","",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
            }
          }else {
    	    	$nomalm="";
    	    	$javascript="alert('Codigo del Articulo no existe...'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
    	    	$output = '[["'.$cajtexmos.'","",""],["'.$cajnomalm.'","",""],["'.$cajcodalm.'","",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
          }
	    }// if ($datos)

  	}//if ($codart!="")
        if ($manartlot=='S')
        {
           $this->numlot=$numlot;
  	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
           $this->lotes=$this->ObtenerNumlotxart($codart,$codalm,$codubi);
        }else {
  	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
        }

  }else  if ($this->getRequestParameter('ajax')=='7')
   {
     $dato=CaramartPeer::getDesramo($this->getRequestParameter('codigo'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   else  if ($this->getRequestParameter('ajax')=='8')
      {
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
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
      elseif ($this->getRequestParameter('ajax')=='9'){
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
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
    }elseif ($this->getRequestParameter('ajax')=='10'){
      $this->unidades = array();
      $javascript = "";
      $this->unidades = CaunialartPeer :: getUnidades($this->getRequestParameter('codigo'));
      $output = '[["javascript","' . $javascript . '",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    }
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
	{
	  $this->tags=Herramientas::autocompleteAjax('CODALM','Cadefalm','codalm',$this->getRequestParameter('casalalm[codalm]'));
    }
    else  if ($this->getRequestParameter('ajax')=='2')
    {
       $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
       if ($modulo=='facturacion')
           $this->tags=Herramientas::autocompleteAjax('RIFPRO','Facliente','rifpro',$this->getRequestParameter('casalalm[rifpro]'));
       else
           $this->tags=Herramientas::autocompleteAjax('RIFPRO','Caprovee','rifpro',$this->getRequestParameter('casalalm[rifpro]'));
	}
	else  if ($this->getRequestParameter('ajax')=='3')
	{
	  $this->tags=Herramientas::autocompleteAjax('CODTIPSAL','Catipsal','codtipsal',$this->getRequestParameter('casalalm[tipmov]'));
    }
	else  if ($this->getRequestParameter('ajax')=='4')
	{
	  $this->tags=Herramientas::autocompleteAjax('RAMART','Caramart','ramart',$this->getRequestParameter('casalalm[ramart]'));
    }

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {
    $c = new Criteria();
    $c->add(CadetsalPeer::CODSAL,$this->casalalm->getCodsal());
    $c->addAscendingOrderByColumn(CadetsalPeer::CODART);
    $per = CadetsalPeer::doSelect($c);

	$mascaraarticulo=$this->mascaraarticulo;
    $lonart=$this->longart;

	$opciones = new OpcionesGrid();
	if ($this->casalalm->getId())
	   $opciones->setEliminar(false);
	else
	   $opciones->setEliminar(true);

    $opciones->setTabla('Cadetsal');
    $opciones->setAnchoGrid(1100);
    $opciones->setAncho(1200);
    $opciones->setName('b');
    $opciones->setTitulo('Detalle de la Salida');
    $opciones->setHTMLTotalFilas(' ');
    if ($this->casalalm->getId()){
       $opciones->setFilas(0);
    }else{
    	$opciones->setFilas(100);
    }

    $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');

    $col1 = new Columna('Código Artículo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codart');
    if ($this->casalalm->getId())
    {
    	$col1->setHTML('type="text"  size="15"  readonly=true');
    }
    else
    {
    	$signo="+";
	    $col1->setCatalogo('Caregart','sf_admin_edit_form', array('codart'=> 1, 'desart'=> 2),'Caregart_Almentalm');
            if ($manartlot=='S')
                $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjaxUpdater(obtenerColumna(this.id,11,'.chr(39).$signo.chr(39).'),6,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signo.chr(39).'),devuelveParVacios(),devuelveParVacios()); combounidad(this.id);"');
            else
	    $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjax(6,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signo.chr(39).'),devuelveParVacios(),devuelveParVacios());combounidad(this.id);"');
	    $col1->setHTML('type="text" size="15"  maxlength="'.chr(39).$lonart.chr(39).'"');
    }

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTAREA);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('desart');
    $col2->setHTML('type="text" size="20x2" readonly=true');


    $col3 = new Columna('Cantidad');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setEsNumerico(true);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setNombreCampo('cantot');
    if ($this->casalalm->getId())
    {
    	$col3->setHTML('type="text" size="8" readonly=true');
    }
    else
    {
    	$col3->setHTML('type="text" size="8" ');
    	$col3->setJScript('onKeypress="canttotal(event,this.id)"');
    }


    $col4 = clone $col3;
    $col4->setTitulo('Costo');
    $col4->setNombreCampo('cosart');
    if ($this->casalalm->getId())
    {
    	$col4->setHTML('readonly=true');
    }
    else
    {
        $col4->setJScript('onKeypress="canttotal(event,this.id)"');
    }

    $col5 = clone $col3;
    $col5->setTitulo('Total');
    $col5->setNombreCampo('totart');
    $col5->setHTML('type="text" size="8" readonly=true');
	if ($this->casalalm->getId())
    {
    	$col5->setHTML('readonly=true');
    }
    else
    {
        $col5->setEsTotal(true,'casalalm_monsal');
    }

    $objalm= array ('codalm' => '6','nomalm' =>'7');
	$col6 = new Columna('Codigo del Almacen');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('codalm');
    if ($this->casalalm->getId())
    {
        $col6->setHTML('type="text" size="8" maxlength="6" readonly=true');
    }
    else
    {
	    $col6->setHTML('type="text" size="8" ');
	    $col6->setCatalogo('Cadefalm','sf_admin_edit_form',$objalm,'Cadelfalm_AlmordrecNew');
        $signo="-";
    	$signomas="+";
        if ($manartlot=='S')
            $col6->setJScript('onBlur="toAjaxUpdater(obtenerColumna(this.id,6,'.chr(39).$signomas.chr(39).'),1,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,5,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
        else
	    $col6->setJScript('onBlur="toAjax(1,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,5,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
    }



    $col7 = new Columna('Nombre Almacén');
	$col7->setTipo(Columna::TEXTAREA);
	$col7->setEsGrabable(true);
	$col7->setNombreCampo('nomalm');
	$col7->setAlineacionObjeto(Columna::CENTRO);
	$col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setHTML('type="text" size="15x1" readonly=true');

    $objubi= array ('codubi' => '8','nomubi' =>'9');
    $params = array("'+$(this.id).up().previous(1).descendants()[0].value+'",'val2');
    $col8 = new Columna('Codigo de Ubicacion');
    $col8->setTipo(Columna::TEXTO);
    $col8->setAlineacionObjeto(Columna::CENTRO);
    $col8->setAlineacionContenido(Columna::CENTRO);
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('codubi');
    if ($this->casalalm->getId())
    {
	    $col8->setHTML('type="text" size="8" readonly=true');
    }
    else
    {   $signo="-";
    	$signomas="+";
	    $col8->setHTML('type="text" size="8" maxlength="'.chr(39).$this->lonubi.chr(39).'"');
	    $col8->setCatalogo('Cadefubi','sf_admin_edit_form',$objubi,'Cadefubi_Almdes',$params);
            if ($manartlot=='S')
                $col8->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$this->mascaraubi.chr(39).')"  onBlur="toAjaxUpdater(obtenerColumna(this.id,4,'.chr(39).$signomas.chr(39).'),5,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,2,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,7,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
            else
	    $col8->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$this->mascaraubi.chr(39).')"  onBlur="toAjax(5,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,2,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,7,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
    }

    $col9 = new Columna('Nombre Ubicación');
	$col9->setTipo(Columna::TEXTAREA);
	$col9->setEsGrabable(true);
	$col9->setNombreCampo('nomubi');
	$col9->setAlineacionObjeto(Columna::CENTRO);
	$col9->setAlineacionContenido(Columna::CENTRO);
    $col9->setHTML('type="text" size="8x1" readonly=true');
    
    $col10 = new Columna('Número de Jaulas');
	$col10->setTipo(Columna::MONTO);
	$col10->setEsGrabable(true);
	$col10->setNombreCampo('numjau');
	$col10->setAlineacionObjeto(Columna::CENTRO);
	$col10->setAlineacionContenido(Columna::CENTRO);
    $col10->setHTML('type="text" size="10" ');
    
    $col11 = new Columna('Tamaño Métrico');
	$col11->setTipo(Columna::MONTO);
	$col11->setEsGrabable(true);
	$col11->setNombreCampo('tammet');
	$col11->setAlineacionObjeto(Columna::CENTRO);
	$col11->setAlineacionContenido(Columna::CENTRO);
    $col11->setHTML('type="text" size="10" ');	
	    
    if($this->recmer='S')
    {
    	$col10->setOculta(false);	
    	$col11->setOculta(false);
    }


  
    if ($this->casalalm->getId())
    {
           $col12 = new Columna('Número de Lote');
	   $col12->setTipo(Columna::TEXTO);
	   $col12->setEsGrabable(true);
	   $col12->setAlineacionObjeto(Columna::CENTRO);
	   $col12->setAlineacionContenido(Columna::CENTRO);
	   $col12->setNombreCampo('numlot');
	   $col12->setHTML('type="text" size="15" readonly=true');
     if ($manartlot=='S')
      $col12->setOculta(false);
     else
      $col12->setOculta(true);
     }
     else
      {
	    $col12 = new Columna('Nro. de Lote');
	    $col12->setTipo(Columna::COMBOCLASE);
	    $col12->setEsGrabable(true);
	    $col12->setNombreCampo('numlot');
	    $col12->setCombosclase('Numlotxart');
	    $col12->setHTML(' ');
      if ($manartlot=='S')
        $col12->setOculta(false);
      else
        $col12->setOculta(true);
      }
    

    $col13 = new Columna('Código de Barra');
    $col13->setTipo(Columna::TEXTO);
    $col13->setAlineacionObjeto(Columna::CENTRO);
    $col13->setAlineacionContenido(Columna::CENTRO);
    $col13->setEsGrabable(true);
    $col13->setNombreCampo('codalt');
    $col13->setHTML('type="text" size="20" readonly=true'); 
    $mancodbar = H::getConfApp2('mancodbar', 'compras', 'almregart');
    if ($mancodbar=='S')
      $col13->setOculta(false);
    else
      $col13->setOculta(true);

    $manunialt=H::getConfApp2('manunialt','compras','almregart');
    if ($manunialt=='S' && $this->casalalm->getId()=='')
    {
    $col14 = new Columna('Unidad Medida');
    $col14->setTipo(Columna::COMBO);
    $col14->setEsGrabable(true);
    $col14->setCombo(CaunialartPeer::getUnidades());
    $col14->setNombreCampo('unimed');
    $col14->setHTML('');
    }else {
    $col14 = new Columna('Unidad de Medida');
    $col14->setTipo(Columna::TEXTO);
    $col14->setNombreCampo('unimed');
    $col14->setEsGrabable(false);
    $col14->setAlineacionObjeto(Columna::CENTRO);
    $col14->setAlineacionContenido(Columna::CENTRO);
    $col14->setHTML('type="text" size="20" readonly=true');
  }

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
    //if ($manartlot=='S')
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $this->obj = $opciones->getConfig($per);

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
		    $this->casalalm = $this->getCasalalmOrCreate();
        	try{
			$this->updateCasalalmFromRequest();
			}catch(Exception $ex){}
		    $this->setVars();
		    $this->configGrid();
		    $grid=Herramientas::CargarDatosGrid($this,$this->obj);


           if (!$this->casalalm->getId())
           {
               $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
               if ($modulo=='facturacion')
                   $trajo=H::getX_vacio ('CODPRO', 'Facliente', 'Nompro', $this->getRequestParameter('casalalm[codpro]'));
               else
                   $trajo=H::getX_vacio ('CODPRO', 'Caprovee', 'Nompro', $this->getRequestParameter('casalalm[codpro]'));
               if ($trajo=='')
              {
                $mierr = Herramientas::obtenerMensajeError('2104');
                $this->getRequest()->setError('',$mierr);
                return false;
              }   

              $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
              $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
              if ($filsoldir=='S'){
                if ($this->getRequestParameter('casalalm[coddirec]')==''){
                   if ($cambiareti=='S') $coderor=3014; else $coderor=3013;
                    $mierr = Herramientas::obtenerMensajeError($coderor);
                    $this->getRequest()->setError('',$mierr);
                   return false;
                }
              }
               
               
              if (Tesoreria::validarFechaPerContable($this->getRequestParameter('casalalm[fecsal]')))
              {
                $mierr = Herramientas::obtenerMensajeError('521');
                $this->getRequest()->setError('',$mierr);
                return false;
              }                

			    	//verificar en el grid de articulos que todos los articulos pertenezcan al almacen y ubicacion indicada
			    	//y verificar que al menos un articulo del grid tenga cantidad mayo que cero.
			    	  $x=$grid[0];
              $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
              $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
				      $j=0;
				      $msg="";
				      $h=0;
				      $encontro=false;
				      while ($j<count($x))
				      {

                if ($manartlot=='S')
                {
                  if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="" or  $x[$j]->getNumlot()=="")
                   {
                          $msg="Debe indicar el Código del Almacén, la Ubicación y el Nro. del Lote de todos los Artículos del Detalle de la Salida";
                          $this->getRequest()->setError('',$msg);
                                  return false;
                   }// if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="")
                }else {
  				         if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="" )
  				      	 {
  				      	 	$msg="Debe indicar el Código del Almacén, la Ubicación de todos los Artículos del Detalle de la Salida";
  				      	 	$this->getRequest()->setError('',$msg);
  			 				    return false;
  				      	 }// if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="")
                }
                                        
				      	 if ($x[$j]->getCantot()>0)
				      	 {
                    $cantd=H::toFloat($x[$j]->getCantot());
                    $c = new Criteria();
                    $c->add(CaregartPeer::CODART,$x[$j]->getCodart());
                    $arti = CaregartPeer::doSelectOne($c);
                    if ($arti)
                    {
                      if ($manunialt=='S')
                      {
                        if ($x[$j]->getUnimed()!="")
                        {
                           if ($x[$j]->getUnimed()!=$arti->getUnimed())
                           {
                               $k= new Criteria();                                     
                               $k->add(CaunialartPeer::CODART,$x[$j]->getCodart());
                               $k->add(CaunialartPeer::UNIALT,$x[$j]->getUnimed());
                               $result3= CaunialartPeer::doSelectOne($k);
                               if ($result3)
                               {
                                   $cantd=$cantd*$result3->getRelart();
                               }
                           }
                        }               
                      }
                    }
				      	    $encontro=true;
                    if ($manartlot=='S')
                    {
                      if (!Despachos::verificaexisydisp($x[$j]->getCodart(),$x[$j]->getCodalm(),$x[$j]->getCodubi(),$cantd,$msg1,$x[$j]->getNumlot()))
                      {   
                          $this->getRequest()->setError('',$msg1);
                          return false;
                      }
                    }else {
    				          if (!Despachos::verificaexisydisp($x[$j]->getCodart(),$x[$j]->getCodalm(),$x[$j]->getCodubi(),$cantd,$msg1))
		                  {
              							$this->getRequest()->setError('',$msg1);
              			 				return false;
		                  }
                    }
				      	 }//if ($x[$j]->getCantot()>0)
				      	 else
				      	 {
  				      		$this->getRequest()->setError('',"La cantidad a registrar para la salida del artículo debe ser mayor que cero...");
  			 				    return false;
				      	 }//else if ($x[$j]->getCantot()>0)
				         $j++;
				      } //while ($j<count($x))
              if (!$encontro)
             {
             	$mierr = Herramientas::obtenerMensajeError('160');
              $this->getRequest()->setError('',$mierr);
 		          return false;
             }
	                   return true;
           }//if (!$this->casalalm->getId())
           else return true;
   }else return true;
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
    $this->casalalm = $this->getCasalalmOrCreate();


	try{
		$this->updateCasalalmFromRequest();
		}catch(Exception $ex){}

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


   public function setVars()
  {
     $this->mascaraarticulo = Herramientas::ObtenerFormato('Cadefart','Forart');
     $this->longart=strlen($this->mascaraarticulo);
     $this->mascaraubi= Herramientas::ObtenerFormato('Cadefart','Forubi');
     $this->lonubi=strlen($this->mascaraubi);
    $this->mansolocor="";
    $this->bloqfec="";
    $this->oculeli="";
    $this->recmer="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almsalalm',$varemp['aplicacion']['compras']['modulos'])){
           if(array_key_exists('mansolocor',$varemp['aplicacion']['compras']['modulos']['almsalalm']))
	       {
	       	$this->mansolocor=$varemp['aplicacion']['compras']['modulos']['almsalalm']['mansolocor'];
	       }
	       if(array_key_exists('bloqfec',$varemp['aplicacion']['compras']['modulos']['almsalalm']))
	       {
	       	$this->bloqfec=$varemp['aplicacion']['compras']['modulos']['almsalalm']['bloqfec'];
	       }
	       if(array_key_exists('oculeli',$varemp['aplicacion']['compras']['modulos']['almsalalm']))
	       {
	       	$this->oculeli=$varemp['aplicacion']['compras']['modulos']['almsalalm']['oculeli'];
	       }
	       if(array_key_exists('recmer',$varemp['aplicacion']['compras']['modulos']['almsalalm']))
	       {
	       	$this->recmer=$varemp['aplicacion']['compras']['modulos']['almsalalm']['recmer'];
	       }
         }
  }

 public function ObtenerNumlotxart($codart="",$codalm="",$codubi="")
   {
    $c = new Criteria();
    $c->add(CaartalmubiPeer::CODALM,$codalm);
    $c->add(CaartalmubiPeer::CODUBI,$codubi);
    $c->add(CaartalmubiPeer::CODART,$codart);
    $c->add(CaartalmubiPeer::EXIACT,0,Criteria::GREATER_THAN);
    $c->addAscendingOrderByColumn(CaartalmubiPeer::FECVEN);

    $datos = CaartalmubiPeer::doSelect($c);

    $lotes = array();

    foreach($datos as $obj_datos)
    {
     if ($obj_datos->getFecven()!="")
     {
        $fecven=date("d/m/Y",strtotime($obj_datos->getFecven()));
      	$lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot()." - ".$fecven);
}
      else
      	$lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot());

    }
    return $lotes;
  }

protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codsal_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasalalmPeer::CODSAL, '');
      $criterion->addOr($c->getNewCriterion(CasalalmPeer::CODSAL, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codsal']) && $this->filters['codsal'] !== '')
    {
      $c->add(CasalalmPeer::CODSAL, '%'.strtr($this->filters['codsal'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fecsal_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasalalmPeer::FECSAL, '');
      $criterion->addOr($c->getNewCriterion(CasalalmPeer::FECSAL, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecsal']))
    {
      if (isset($this->filters['fecsal']['from']) && $this->filters['fecsal']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(CasalalmPeer::FECSAL, date('Y-m-d', $this->filters['fecsal']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecsal']['to']) && $this->filters['fecsal']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(CasalalmPeer::FECSAL, date('Y-m-d', $this->filters['fecsal']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(CasalalmPeer::FECSAL, date('Y-m-d', $this->filters['fecsal']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['dessal_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasalalmPeer::DESSAL, '');
      $criterion->addOr($c->getNewCriterion(CasalalmPeer::DESSAL, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['dessal']) && $this->filters['dessal'] !== '')
    {
      $c->add(CasalalmPeer::DESSAL, '%'.strtr($this->filters['dessal'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codcen_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasalalmPeer::CODCEN, '');
      $criterion->addOr($c->getNewCriterion(CasalalmPeer::CODCEN, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcen']) && $this->filters['codcen'] !== '')
    {
      $c->add(CasalalmPeer::CODCEN, '%'.strtr($this->filters['codcen'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['descen_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasalalmPeer::DESCEN, '');
      $criterion->addOr($c->getNewCriterion(CasalalmPeer::DESCEN, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['descen']) && $this->filters['descen'] !== '')
    {
      $c->add(CadefcenPeer::DESCEN, '%'.strtr($this->filters['descen'], '*', '%').'%', Criteria::LIKE);
      $c->addJoin(CasalalmPeer::CODCEN, CadefcenPeer::CODCEN);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codalm_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasalalmPeer::CODSAL, '');
      $criterion->addOr($c->getNewCriterion(CasalalmPeer::CODSAL, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codalm']) && $this->filters['codalm'] !== '')
    {
      $c->add(CadetsalPeer::CODALM, strtr("%".$this->filters['codalm']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(CasalalmPeer::CODSAL,  CadetsalPeer::CODSAL);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomalm_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasalalmPeer::NOMALM, '');
      $criterion->addOr($c->getNewCriterion(CasalalmPeer::NOMALM, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomalm']) && $this->filters['nomalm'] !== '')
    {
      $c->add(CadefalmPeer::NOMALM, strtr("%".$this->filters['nomalm']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(CadetsalPeer::CODALM,CadefalmPeer::CODALM);
      $c->addJoin(CasalalmPeer::CODSAL,  CadetsalPeer::CODSAL);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasalalmPeer::CODEDO, '');
      $criterion->addOr($c->getNewCriterion(CasalalmPeer::CODEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codedo']) && $this->filters['codedo'] !== '')
    {
      $c->add(CadefalmPeer::CODEDO, $this->filters['codedo']);
      $c->addJoin(CadetsalPeer::CODALM,CadefalmPeer::CODALM);
      $c->addJoin(CasalalmPeer::CODSAL,  CadetsalPeer::CODSAL);
    }
    if (isset($this->filters['nomedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(CasalalmPeer::NOMEDO, '');
      $criterion->addOr($c->getNewCriterion(CasalalmPeer::NOMEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomedo']) && $this->filters['nomedo'] !== '')
    {
        $c->add(OcestadoPeer::NOMEDO, strtr("%".$this->filters['nomedo']."%", '*', '%'), Criteria::LIKE);
        $c->addJoin(CadefalmPeer::CODEDO,  OcestadoPeer::CODEDO); 
        $c->addJoin(CadetsalPeer::CODALM,CadefalmPeer::CODALM);
        $c->addJoin(CasalalmPeer::CODSAL,  CadetsalPeer::CODSAL);
        $c->setIgnoreCase(true);
    }
  }

  public function getLabels()
  {
    $labels = parent::getLabels();

    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['casalalm{coddirec}'] = 'Estado';

    return $labels;
  }
}
