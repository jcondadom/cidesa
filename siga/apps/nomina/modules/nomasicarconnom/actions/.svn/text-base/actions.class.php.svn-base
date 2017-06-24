<?php

/**
 * nomasicarconnom actions.
 *
 * @package    Roraima
 * @subpackage nomasicarconnom
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 39563 2010-07-21 15:43:43Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomasicarconnomActions extends autonomasicarconnomActions
{
  protected $coderr = -1;
  protected $codigoemp = "";

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npasicaremp/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Npasicaremp', 15);
    $c = new Criteria();
    $c->add(NpasicarempPeer::STATUS,"V");
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function cargarFrecuencias($frecal)
  {
    $frecuencia = array();
    if ($frecal=='Q')
    {
      $frecuencia=array('P' => 'Primera Quincena', 'S' => 'Segunda Quincena', 'D' => 'Las Dos Quincenas');
    }
    else if ($frecal=='S')
    {
      $frecuencia=array('1' => 'Primera Semana', '2' => 'Segunda Semana', '3' => 'Tercera Semana', '4' => 'Cuarta Semana', 'U' => 'Ultima Semana', 'T' => 'Todas las Semanas');
    }
    else
    {
      $frecuencia=array('M' => 'Mensual');
    }

    return $frecuencia;
  }

  public function CargarTiempo()
  {
    $c = new Criteria();
    $lista_tie = NptiempoPeer::doSelect($c);

    $tiempo = array();

    foreach($lista_tie as $obj)
    {
      $tiempo += array($obj->getCodtie() => $obj->getDestie());
    }
    return $tiempo;
  }

  public function CargarDedicacion()
  {
    $c = new Criteria();
    $lista_ded = NptipdedPeer::doSelect($c);

    $dedl = array();

    foreach($lista_ded as $obj_ded)
    {
      $dedl += array($obj_ded->getCodtip() => $obj_ded->getDestip());
    }
    return $dedl;
  }
  public function CargarCategoria()
  {
    $c = new Criteria();
    $lista_cat = NptipcatPeer::doSelect($c);

    $catl = array();

    foreach($lista_cat as $obj_cat)
    {
      $catl += array($obj_cat->getCodtipcat() => $obj_cat->getDestipcat());
    }
    return $catl;
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
        $this->npasicaremp = $this->getNpasicarempOrCreate();
    	$this->formato= Herramientas::getMascaraCategoria();
    	$this->lonfor=strlen($this->formato);
        $this->tipos=self::CargarTipoGasto();
        $this->updateNpasicarempFromRequest();

        $valcodcat=H::getConfApp2('valcodcat', 'nomina', 'nomasicarconnom');
          if ($valcodcat=='S'){
            if ($this->getRequestParameter('npasicaremp[codcat]')==''){
              $this->coderr=4420;
              return false;

            }
          }

        $filvac=H::getConfApp2('filvac', 'nomina', 'nomasicarconnom');

        if($this->npasicaremp->getCodcar() && ($this->npasicaremp->getId()==''))
        {
            $c = new Criteria();
            $c->add(NpcargosPeer::CODCAR,$this->npasicaremp->getCodcar());
            $p = NpcargosPeer::doSelectOne($c);
            if($p)
            {
              if ($filvac=='S') {
                if($p->getCanphom()+$p->getCanpmuj()>0)
                {
                    $c = new Criteria();
                    $c->add(NphojintPeer::CODEMP,$this->npasicaremp->getCodemp());
                    $r = NphojintPeer::doSelectOne($c);
                    if($r)
                    {
                        if($r->getSexemp()=='M')
                        {
                            if($p->getCanvhom()<=0)
                                    $this->coderr='N0003';
                        }else
                        {
                            if($p->getCanvmuj()<=0)
                                    $this->coderr='N0003';
                        }
                    }
                }
              }
            }
        }
	    if (!$this->npasicaremp->getId())
	    {

      			$cc = new Criteria();
      			$cc->add(NpasicarempPeer :: CODEMP, $this->npasicaremp->getCodemp());
      			$cc->add(NpasicarempPeer :: CODCAR, $this->npasicaremp->getCodcar());
      			$cc->add(NpasicarempPeer :: CODNOM, $this->npasicaremp->getCodnom());
            $cc->add(NpasicarempPeer :: STATUS, 'V');
      			$r = NpasicarempPeer :: doSelectOne($cc);
      			if ($r)
      			{
      	      $this->coderr=447;
      			}

            $mascar=H::getConfApp2('mascar', 'nomina', 'nomasicarconnom');
            if ($mascar!='S') {
            $cc = new Criteria();
      			$cc->add(NpasicarempPeer :: CODEMP, $this->npasicaremp->getCodemp());
            $cc->add(NpasicarempPeer :: STATUS, 'V');
      			$r = NpasicarempPeer :: doSelectOne($cc);
      			if ($r)
      			{
              $this->coderr=4413;
      			}
          }

    	}//if (!$npasicaremp->getId())
      $valcodconct=H::getConfApp2('valcodconct', 'nomina', 'nomnomasiconnom');
      if ($valcodconct=='S' && !$this->npasicaremp->getEsdocente()) {
        $fre = H::getX_vacio('CODNOM','Npnomina','Frecal',$this->getRequestParameter('npasicaremp[codnom]'));
        $this->configGrid($this->getRequestParameter('npasicaremp[codemp]'),$this->getRequestParameter('npasicaremp[codnom]'),$this->getRequestParameter('npasicaremp[codcar]'),$fre);
        $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
        $x = $grid[0];
         $j = 0;
         $cedemp=H::getX_vacio('CODEMP','Nphojint','Cedemp',$this->npasicaremp->getCodemp());
         while ($j < count($x)) {
          if ($x[$j]['check']=='1') {
             $r= new Criteria();
             $r->add(NpcestaticketsPeer::CODNOM,$this->npasicaremp->getCodnom());
             $r->add(NpcestaticketsPeer::CODCON,$x[$j]['codcon']);
             $regr= NpcestaticketsPeer::doSelectOne($r);
             if ($regr) {
               $w= new Criteria();
               $w->add(NphojintPeer::CODEMP,$this->npasicaremp->getCodemp(),Criteria::NOT_EQUAL);
               $w->add(NphojintPeer::CEDEMP,$cedemp);
               $regw= NphojintPeer:: doSelectOne($w);
               if ($regw){
                 $w2= new Criteria();
                 $w2->add(NpasiconempPeer::CODCON,$x[$j]['codcon']);
                 $w2->add(NpasiconempPeer::CODEMP,$regw->getCodemp());
                 //$w2->add(NpasiconempPeer::CODCAR,$codcar,Criteria::NOT_EQUAL);
                 $regw2= NpasiconempPeer:: doSelectOne($w2);
                 if ($regw2){
                    $this->codigoemp=$x[$j]['codcon'];
                    $this->coderr=4417;
                    break;
                 }
               }
             }
           }
           $j++;
        }
     }

        if ($this->coderr<>-1 )
        {
          return false;
        }else return true;
    }else return true;
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
  protected function saveNpasicaremp($npasicaremp)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
    $arreglo=array($grid);

    $this->coderror = Nomina::salvarNomasicarconnom($npasicaremp,$arreglo);

    if($this->coderror!=-1)
    {
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('',$err);
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
    if ($this->getRequestParameter('ajax')=='1')
      {
        $cedula="";
        $l= new Criteria();
        $l->add(NphojintPeer::CODEMP,$this->getRequestParameter('codigo'));
        $reg= NphojintPeer::doSelectOne($l);
        if ($reg)
        {
           if ($reg->getStaemp()!='R')
            {
               $dato=$reg->getNomemp(); $javascript="";
               $codtipemp=$reg->getCodtipemp();
            }else {
              $dato="";
              $codtipemp="";
              $javascript="alert('El Empleado se encuentra Retirado'); $('npasicaremp_codemp').value=''; $('npasicaremp_codemp').focus();";
            }
            $codniv = H::GetX('Codemp','Nphojint','Codniv',$reg->getCodemp());
            $nomniv = H::GetX('Codniv','Npestorg','Desniv',$codniv);
            $nivel = $codniv.'  '.$nomniv;
            $cedula=$reg->getCedemp();

        }else{
           $dato=""; $javascript="alert('El Empleado no existe'); $('npasicaremp_codemp').value=''; $('npasicaremp_codemp').focus();";
        }


        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["npasicaremp_nivel","'.$nivel.'",""],["npasicaremp_codtipemp","'.$codtipemp.'",""],["npasicaremp_cedemp","'.$cedula.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
    else if ($this->getRequestParameter('ajax')=='2')
      { $this->div='';
        $dato=Herramientas::getX('codnom','npnomina','nomnom',$this->getRequestParameter('codigo'));
        $dato2=Herramientas::getX('codnom','npnomina','Frecal',$this->getRequestParameter('codigo'));
       $this->nomina=$this->getRequestParameter('codigo');

       $output = '[["'.$cajtexmos.'","'.$dato.'",""], ["frecuencal","'.$dato2.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
      }
     else if ($this->getRequestParameter('ajax')=='3')
      { $this->div='S';
	    $js="";
	    $this->filvac="";
  	    $varemp = $this->getUser()->getAttribute('configemp');
	    if(is_array($varemp))
	     if(array_key_exists('aplicacion',$varemp))
	  	  if(array_key_exists('nomina',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
		     if(array_key_exists('nomasicarconnom',$varemp['aplicacion']['nomina']['modulos']))
			 {
			 	if (array_key_exists('filvac',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))
		        {
		       	 $this->filvac=$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['filvac'];
		        }

			 }
       $grado='';
       $suecar='0,00';
       $destipcar='';
       $com='';
        $c = new Criteria();
        $c->add(NpcargosPeer::CODCAR,$this->getRequestParameter('codigo'));
        $c->addJoin(NpcargosPeer::CODCAR,NpasicarnomPeer::CODCAR);
        $npcargos = NpcargosPeer::doSelectOne($c);
        if($npcargos){
        	if ($this->filvac!="") {
        	if (H::toFloat($npcargos->getCanvmix())>0){
          $dato=$npcargos->getNomcar();
          $cod = $npcargos->getCodcar();
		     $codtipcar=$npcargos->getCodtip();
         $destipcar=H::getX_vacio('CODTIPCAR','Nptipcar','Destipcar',$npcargos->getCodtip());
         $suecar=H::FormatoMonto($npcargos->getSuecar());
         $grado=$npcargos->getGraocp();
          $this->configGrid($this->getRequestParameter('codemp'),$this->getRequestParameter('codnom'),$this->getRequestParameter('codigo'),$this->getRequestParameter('frecuen'),$this->getRequestParameter('ptocta'));

        	}else{
        		$dato='';//Constantes::REGVACIO;
                $cod = '';
		        $codtipcar='';
                $this->configGrid();
		        $js="alert('El numero de Vacantes es Igual a cero'); ";
        	}
        	}else{
        	$dato=$npcargos->getNomcar();
            $cod = $npcargos->getCodcar();
        		    $codtipcar=$npcargos->getCodtip();
        $destipcar=H::getX_vacio('CODTIPCAR','Nptipcar','Destipcar',$npcargos->getCodtip());
        $suecar=H::FormatoMonto($npcargos->getSuecar());
        $grado=$npcargos->getGraocp();
            $this->configGrid($this->getRequestParameter('codemp'),$this->getRequestParameter('codnom'),$this->getRequestParameter('codigo'),$this->getRequestParameter('frecuen'),$this->getRequestParameter('ptocta'));
        	}
        }else{
          $dato='';//Constantes::REGVACIO;
          $cod = '';
		  $codtipcar='';
		  $this->configGrid();
        }
		/*if($this->getUser()->getAttribute('codcar','','nomasicarconnom')!='')
		{
			if($this->getUser()->getAttribute('codcar','','nomasicarconnom')==$codtipcar)
				$js.="$('gridcatded').show()";
			else
				$js.="$('gridcatded').hide()";
		}*/
    $docsn=H::getX_vacio('CODTIPCAR','Nptipcar','Docsn',$codtipcar);
    if ($docsn==true) {
      $suecar='0,00';
      $grado='';
      $js.="$('gridcatded').show(); $('divgrado').hide()";
    }
    else
      $js.="$('gridcatded').hide()";
      if ($this->getUser()->getAttribute('nivopsu','','nomasicarconnom')!='S')
        $com=',["npasicaremp_grado","'.$grado.'",""]';

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","'.$cod.'",""],["npasicaremp_codtipcar","'.$codtipcar.'",""],["npasicaremp_destipcar","'.$destipcar.'",""],["npasicaremp_sueldocar","'.$suecar.'",""],["javascript","'.$js.'",""]'.$com.']';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

      }
     else if ($this->getRequestParameter('ajax')=='5')
      {
        $dato=NptipgasPeer::getDestipgas($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
     else if ($this->getRequestParameter('ajax')=='6')
      {
        $dato=NpcatprePeer::getCategoria($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
     else if ($this->getRequestParameter('ajax')=='7')
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
      else if ($this->getRequestParameter('ajax')=='8')
      {
        $javascript="";
        $q= new Criteria();
        $q->add(NpcomocpPeer::CODTIPCAR,$this->getRequestParameter('codtipcar'));
        $q->add(NpcomocpPeer::PASCAR,$this->getRequestParameter('dedica'));
        $q->add(NpcomocpPeer::GRACAR,$this->getRequestParameter('codigo'));
        $q->addDescendingOrderByColumn(NpcomocpPeer::FECDES);
        $reg= NpcomocpPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=H::FormatoMonto($reg->getSuecar());
        }else {
            $dato="0,00";
        }

        $output = '[["npasicaremp_sueldocar","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }

      else if ($this->getRequestParameter('ajax')=='9')
      {
        $javascript="";
        $q= new Criteria();
        $q->add(NpcomocpPeer::CODTIPCAR,$this->getRequestParameter('codtipcar'));
        $q->add(NpcomocpPeer::PASCAR,"001");
        $q->add(NpcomocpPeer::GRACAR,$this->getRequestParameter('grado'));
        $q->addDescendingOrderByColumn(NpcomocpPeer::FECDES);
        $reg= NpcomocpPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=H::FormatoMonto($reg->getSuecar());
        }else {
            $dato="0,00";
        }

        $output = '[["npasicaremp_sueldocar","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
      else if ($this->getRequestParameter('ajax')=='10')
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
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
      else if ($this->getRequestParameter('ajax')=='11')
      {
        $q= new Criteria();
        $q->add(NpptoctaPeer::NUMPTA,$this->getRequestParameter('codigo'));
        $reg= NpptoctaPeer::doSelectOne($q);
        if ($reg)
        {
           if ($reg->getAprpto()=='A'){
            $codnom=$reg->getCodnom();
            $codcar=$reg->getCodcar();
            $dato=$reg->getCodemp();
            $javascript="$('npasicaremp_codemp').focus(); $('npasicaremp_codnom').focus(); $('npasicaremp_codnom').value='".$codnom."'; $('npasicaremp_codcar').value='".$codcar."'; $('npasicaremp_codcar').focus(); $('npasicaremp_fecasi').focus(); ";
           }else {
            $dato="";
            $javascript="alert('El Punto de Cuenta no ha sido Aprobado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
           }
        }else {
            $dato="";
            $javascript="alert('El Punto de Cuenta no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }else if ($this->getRequestParameter('ajax')=='12'){
        $codcon=$this->getRequestParameter('codcon');
       $codcar=$this->getRequestParameter('codcar');
       $codnom=$this->getRequestParameter('codnom');
       $cedemp=$this->getRequestParameter('cedemp');
       $codemp=$this->getRequestParameter('codemp');
       $id=$this->getRequestParameter('id');
       $js="";

       $esdocente=H::getX_vacio('Codtipcar','Nptipcar','docsn',H::getX_vacio('Codcar','Npcargos','codtip',$codcar));
       if (!$esdocente) {
         $r= new Criteria();
         $r->add(NpcestaticketsPeer::CODNOM,$codnom);
         $r->add(NpcestaticketsPeer::CODCON,$codcon);
         $regr= NpcestaticketsPeer::doSelectOne($r);
         if ($regr) {
           $w= new Criteria();
           $w->add(NphojintPeer::CODEMP,$codemp,Criteria::NOT_EQUAL);
           $w->add(NphojintPeer::CEDEMP,$cedemp);
           $regw= NphojintPeer:: doSelectOne($w);
           if ($regw){
             $w2= new Criteria();
             $w2->add(NpasiconempPeer::CODCON,$codcon);
             $w2->add(NpasiconempPeer::CODEMP,$regw->getCodemp());
             //$w2->add(NpasiconempPeer::CODCAR,$codcar,Criteria::NOT_EQUAL);
             $regw2= NpasiconempPeer:: doSelectOne($w2);
             if ($regw2){
               $js="alert_('El Empleado ya tiene Asignado este Concepto en otra N&oacute;mina'); $('$id').checked=false;";
             }
           }
         }
     }
       $output = '[["javascript","'.$js.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
  }

public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('CODEMP','Nphojint','CODEMP',$this->getRequestParameter('npasicaremp[codemp]'));
      }
      else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npasicaremp[codnom]'));
      }
      else if ($this->getRequestParameter('ajax')=='3')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCAR','Npcargos','CODCAR',$this->getRequestParameter('npasicaremp[codcar]'));
      }
      else if ($this->getRequestParameter('ajax')=='5')
      {
       $this->tags=Herramientas::autocompleteAjax('CODTIPGAS','Nptipgas','CODTIPGAS',$this->getRequestParameter('npasicaremp[codtipgas]'));
      }
  }


 /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codemp='',$codnom='',$codcar='',$frecal='', $numpta='')
  {
    $mosptocta=H::getConfApp2('mosptocta', 'nomina', 'nomasicarconnom');

    $c = new Criteria();
    $c->add(NpasiconempPeer::CODEMP,$codemp);
    $objNpasiconemp = NpasiconempPeer::doSelect($c);
    // SI EL EMPLEADO NO TIENE CONCEPTOS ASIGNADOS LOS MARCA TODOS POR DEFECTO SINO MARCA SOLO LOS QUE TIENE
    if ($objNpasiconemp)
      $check = 0;
    else
      $check = 1;

    if ($mosptocta=='S' && $numpta!=''){
      $sql = "SELECT y.*,
          max(case when z.status='M' then 'M' else '' end) as mont,
          max(case when z.status='C' then 'C' else '' end) as cant
          FROM (
          Select 1 as check,b.CodCon, b.nomcon, b.fecini, b.fecexp,b.cantidad,b.monto,b.FreCon,b.ACTIVO, b.acumulado, b.varia, 9 as id
          from npasiconnom a, npasiconemp b
            where b.codemp='".$codemp."' and b.codcar='".$codcar."'
            and a.codnom='".$codnom."' and a.codcon=b.codcon
          union
          Select ".$check.",a.CodCon,b.nomcon,to_date('1970-01-01','yyyy-mm-dd'),
          to_date('2099-12-31','yyyy-mm-dd'),'0.00',c.moncon,a.FreCon,a.ACTIVO, '0.00', '', 9 as id
          from NpAsiConNom a,npdefcpt b left outer join npdetptocta c on c.codcon=b.codcon
          and c.numpta='".$numpta."'
          where a.codcon=b.codcon
          and a.CodNom ='".$codnom."'
          AND A.CODCON NOT IN (
            SELECT f.CODCON
              FROM NPASICONEMP f, npasiconnom g
              WHERE
                CODEMP ='".$codemp."' and
                f.codcar='".$codcar."' and
                g.codnom='".$codnom."' and
                g.codcon=f.codcon
          )
            ) AS y
          left outer join (SELECT * FROM NPDEFMOV WHERE CODNOM = '001') AS z on (y.codcon=z.codcon)
          GROUP BY Y.CHECK,Y.CODCON,Y.NOMCON,Y.FECINI,Y.FECEXP,Y.CANTIDAD,Y.MONTO,Y.FRECON,Y.ACTIVO,Y.ACUMULADO,Y.VARIA,Y.ID
          ORDER BY Y.CHECK DESC,  Y.CODCON";

    }else {
      $sql = "SELECT y.*,
          max(case when z.status='M' then 'M' else '' end) as mont,
          max(case when z.status='C' then 'C' else '' end) as cant
          FROM (
          Select 1 as check,b.CodCon, b.nomcon, b.fecini, b.fecexp,b.cantidad,b.monto,b.FreCon,b.ACTIVO, b.acumulado, b.varia, 9 as id
          from npasiconnom a, npasiconemp b
            where b.codemp='".$codemp."' and b.codcar='".$codcar."'
            and a.codnom='".$codnom."' and a.codcon=b.codcon
          union
          Select ".$check.",a.CodCon,b.nomcon,to_date('1970-01-01','yyyy-mm-dd'),
          to_date('2099-12-31','yyyy-mm-dd'),'0.00','0.00',a.FreCon,a.ACTIVO, '0.00', '', 9 as id
          from NpAsiConNom a,npdefcpt b
          where a.codcon=b.codcon
          and a.CodNom ='".$codnom."'
          AND A.CODCON NOT IN (
            SELECT f.CODCON
              FROM NPASICONEMP f, npasiconnom g
              WHERE
                CODEMP ='".$codemp."' and
                f.codcar='".$codcar."' and
                g.codnom='".$codnom."' and
                g.codcon=f.codcon
          )
            ) AS y
          left outer join (SELECT * FROM NPDEFMOV WHERE CODNOM = '001') AS z on (y.codcon=z.codcon)
          GROUP BY Y.CHECK,Y.CODCON,Y.NOMCON,Y.FECINI,Y.FECEXP,Y.CANTIDAD,Y.MONTO,Y.FRECON,Y.ACTIVO,Y.ACUMULADO,Y.VARIA,Y.ID
          ORDER BY Y.CHECK DESC, Y.CODCON";
    }
      //print $sql; exit;



    $resp = Herramientas::BuscarDatos($sql,$per);
  $filas_arreglo=0;

      $opciones = new OpcionesGrid();
      $opciones->setTabla('Npasiconemp');
        $opciones->setAnchoGrid(1000);
        $opciones->setTitulo(' Conceptos ');
        $opciones->setHTMLTotalFilas(' ');
        $opciones->setFilas($filas_arreglo);
        $opciones->setEliminar(false);

        $col1 = new Columna('Marque');
        $col1->setTipo(Columna::CHECK);
        $col1->setEsGrabable(true);
        $col1->setNombreCampo('check');
        $col1->setHTML(' ');
        $col1->setJScript('onClick="verificarCestaticket(this.id)"');

        $col2 = new Columna('Cod. Concepto');
        $col2->setTipo(Columna::TEXTO);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('Codcon');
        $col2->setEsGrabable(true);
        $col2->setHTML('type="text" size="6" readonly=true');

        $col3 = new Columna('Nombre del Concepto');
        $col3->setTipo(Columna::TEXTO);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setEsGrabable(true);
        $col3->setNombreCampo('Nomcon');
        $col3->setHTML('type="text" size="50" readonly=true');

        $col4 = new Columna('Fecha de Inicio');
        $col4->setTipo(Columna::FECHA);
        $col4->setAlineacionObjeto(Columna::IZQUIERDA);
        $col4->setAlineacionContenido(Columna::IZQUIERDA);
        $col4->setNombreCampo('Fecini');
        $col4->setEsGrabable(true);
        $col4->setJScript('onkeyup="javascript: mascara(this,"/",patron,true);"');
        $col4->setHTML('type="date" size="10"');

        $col5 = new Columna('Fecha de Expiración');
        $col5->setTipo(Columna::FECHA);
        $col5->setAlineacionObjeto(Columna::IZQUIERDA);
        $col5->setAlineacionContenido(Columna::IZQUIERDA);
        $col5->setNombreCampo('Fecexp');
        $col5->setJScript('onkeyup="javascript: mascara(this,"/",patron,true);"');
        $col5->setEsGrabable(true);
        $col5->setHTML('type="date" size="10"');

        $col6 = new Columna('Cantidad');
        $col6->setTipo(Columna::MONTO);
        $col6->setAlineacionObjeto(Columna::IZQUIERDA);
        $col6->setAlineacionContenido(Columna::IZQUIERDA);
        $col6->setNombreCampo('Cantidad');
        $col6->setEsGrabable(true);
        $col6->setHTML('type="integer" size="10" readonly=false');

        $col7 = new Columna('Monto');
        $col7->setTipo(Columna::MONTO);
        $col7->setAlineacionObjeto(Columna::IZQUIERDA);
        $col7->setAlineacionContenido(Columna::IZQUIERDA);
        $col7->setEsGrabable(true);
        $col7->setNombreCampo('Monto');
        $col7->setJScript('onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)"');
        $col7->setHTML('type="real" size="10" readonly=false');

        $col8 = new Columna('Frecuencia');
        $col8->setTipo(Columna::COMBO);
        $col8->setEsGrabable(true);
        $col8->setNombreCampo('frecon');
        $col8->setCombo(self::cargarFrecuencias($frecal));
        $col8->setHTML(' ');

        $col9 = new Columna('Activo');
        $col9->setTipo(Columna::TEXTO);
        $col9->setAlineacionObjeto(Columna::IZQUIERDA);
        $col9->setAlineacionContenido(Columna::IZQUIERDA);
        $col9->setEsGrabable(true);
        $col9->setNombreCampo('Activo');
        $col9->setHTML('type="text" size="1" readonly=false');

        $col10 = new Columna('Acumulado');
        $col10->setTipo(Columna::MONTO);
        $col10->setAlineacionObjeto(Columna::IZQUIERDA);
        $col10->setAlineacionContenido(Columna::IZQUIERDA);
        $col10->setEsGrabable(true);
        $col10->setOculta(true);
        $col10->setNombreCampo('Acumulado');
        $col10->setHTML('type="real" size="10" readonly=false');

        $mosvaria=H::getConfApp2('mosvaria', 'nomina', 'nomasicarconnom');

        $col11 = new Columna('Variación');
        $col11->setTipo(Columna::TEXTO);
        $col11->setAlineacionObjeto(Columna::IZQUIERDA);
        $col11->setAlineacionContenido(Columna::IZQUIERDA);
        $col11->setEsGrabable(true);
        $col11->setNombreCampo('varia');
        $col11->setHTML('type="text" size="50" maxlength=1000');
        if ($mosvaria=='S')
          $col11->setOculta(false);
        else
          $col11->setOculta(true);


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

        $this->obj = $opciones->getConfig($per);
     }

 /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
  	$codtipcar='';
  	$this->filvac="";
  	$varemp = $this->getUser()->getAttribute('configemp');
	  if(is_array($varemp))
	    if(array_key_exists('aplicacion',$varemp))
	  	  if(array_key_exists('nomina',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
		     if(array_key_exists('nomasicarconnom',$varemp['aplicacion']['nomina']['modulos']))
			 {
			 	if(array_key_exists('varforma',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))
				   $this->getUser()->setAttribute('varforma',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['varforma'],'nomasicarconnom');
				if(array_key_exists('codcar',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))
				{
					#LA VARIABLE QUE SE TRAE DEL YML ES EL CODTICAR
					$this->getUser()->setAttribute('codcar',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['codcar'],'nomasicarconnom');
					$codtipcar=$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['codcar'];
				}
				if(array_key_exists('filvac',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))
		        {
		       	 $this->filvac=$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['filvac'];
		        }
			    if(array_key_exists('vartiempo',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))
		        {
		       	 $this->getUser()->setAttribute('vartiempo',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['vartiempo'],'nomasicarconnom');
		        }

			 }

    $this->npasicaremp = $this->getNpasicarempOrCreate();
	$this->listadedicacion= $this->cargardedicacion();
	$this->listatiempo= $this->cargartiempo();
	$this->listacategoria= $this->cargarcategoria();
    $this->formato= Herramientas::getMascaraCategoria();
    $this->lonfor=strlen($this->formato);
    $this->tipos=self::CargarTipoGasto();
	/*if($this->npasicaremp->getCodcar())
	  {
	  	$c = new Criteria();
		$c->add(NpcargosPeer::CODCAR,$this->npasicaremp->getCodcar());
		$perr = NpcargosPeer::doSelectOne($c);
		if($perr)
		{
			if($perr->getCodtip()==$codtipcar)
			{
				$this->getUser()->setAttribute('codtipcar',$codtipcar,'nomasicarconnom');
			}else{
				$this->getUser()->setAttribute('codtipcar','','nomasicarconnom');
			}
		}
	  }*/
    if ($this->npasicaremp->getId() && $this->npasicaremp->getCodtipemp()==''){
      $this->npasicaremp->setCodtipemp(H::getX_vacio('CODEMP','Nphojint','Codtipemp',$this->npasicaremp->getCodemp()));
    }

    $valdefecto=H::getConfApp2('valdefecto', 'nomina', 'nomhojint');
    if ($valdefecto=='S' && !$this->npasicaremp->getId()){
      $datnpdefgen= NpdefgenPeer::doSelectOne(new Criteria());
      if ($this->npasicaremp->getCodtipgas()=='')
        $this->npasicaremp->setCodtipgas($datnpdefgen->getCodtipgas());
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpasicarempFromRequest();

	  /*if($this->npasicaremp->getCodcar())
	  {
	  	$c = new Criteria();
		$c->add(NpcargosPeer::CODCAR,$this->npasicaremp->getCodcar());
		$perr = NpcargosPeer::doSelectOne($c);

		if($perr)
		{
			if($perr->getCodtip()==$codtipcar)
			{
				$this->getUser()->setAttribute('codtipcar',$codtipcar,'nomasicarconnom');
			}else{
				$this->getUser()->setAttribute('codtipcar','','nomasicarconnom');
			}
		}
	  }*/

      $this->saveNpasicaremp($this->npasicaremp);

      $this->npasicaremp->setId(Herramientas::getX_vacio('codemp','npasicaremp','id',$this->npasicaremp->getCodemp()));

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomasicarconnom/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomasicarconnom/list');
      }
      else
      {
        return $this->redirect('nomasicarconnom/edit?id='.$this->npasicaremp->getId());
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
  protected function updateNpasicarempFromRequest()
  {
    $npasicaremp = $this->getRequestParameter('npasicaremp');
    $this->formato= Herramientas::getMascaraCategoria();
    $this->lonfor=strlen($this->formato);
    $this->tipos=self::CargarTipoGasto();
  	$codtipcar='';
  	$this->filvac="";
  	$varemp = $this->getUser()->getAttribute('configemp');
	  if(is_array($varemp))
	    if(array_key_exists('aplicacion',$varemp))
	  	  if(array_key_exists('nomina',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
		     if(array_key_exists('nomasicarconnom',$varemp['aplicacion']['nomina']['modulos']))
			 {
			 	if(array_key_exists('varforma',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))
				   $this->getUser()->setAttribute('varforma',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['varforma'],'nomasicarconnom');
				if(array_key_exists('codcar',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))
				{
					#LA VARIABLE QUE SE TRAE DEL YML ES EL CODTICAR
					$this->getUser()->setAttribute('codcar',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['codcar'],'nomasicarconnom');
					$codtipcar=$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['codcar'];
				}
				if(array_key_exists('filvac',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))
		        {
		       	 $this->filvac=$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['filvac'];
		        }
			    if(array_key_exists('vartiempo',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))
		        {
		       	 $this->getUser()->setAttribute('vartiempo',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['vartiempo'],'nomasicarconnom');
		        }

			 }


    if (isset($npasicaremp['codemp']))
    {
      $this->npasicaremp->setCodemp($npasicaremp['codemp']);
    }
    if (isset($npasicaremp['nomemp']))
    {
      $this->npasicaremp->setNomemp($npasicaremp['nomemp']);
    }
    if (isset($npasicaremp['codnom']))
    {
      $this->npasicaremp->setCodnom($npasicaremp['codnom']);
    }
    if (isset($npasicaremp['nomnom']))
    {
      $this->npasicaremp->setNomnom($npasicaremp['nomnom']);
    }
    if (isset($npasicaremp['codcar']))
    {
      $this->npasicaremp->setCodcar($npasicaremp['codcar']);
    }
    if (isset($npasicaremp['nomcar']))
    {
      $this->npasicaremp->setNomcar($npasicaremp['nomcar']);
    }
    if (isset($npasicaremp['paso']))
    {
      $this->npasicaremp->setPaso($npasicaremp['paso']);
    }

    if (isset($npasicaremp['grado']))
    {
      $this->npasicaremp->setGrado($npasicaremp['grado']);
    }

    if (isset($npasicaremp['despaso']))
    {
      $this->npasicaremp->setDespaso($npasicaremp['despaso']);
    }
    if (isset($npasicaremp['fecasi']))
    {
      if ($npasicaremp['fecasi'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npasicaremp['fecasi']))
          {
            $value = $dateFormat->format($npasicaremp['fecasi'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npasicaremp['fecasi'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npasicaremp->setFecasi($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npasicaremp->setFecasi(null);
      }
    }
    if (isset($npasicaremp['codtipgas']))
    {
      $this->npasicaremp->setCodtipgas($npasicaremp['codtipgas']);
    }
    if (isset($npasicaremp['destipgas']))
    {
      $this->npasicaremp->setDestipgas($npasicaremp['destipgas']);
    }
    if (isset($npasicaremp['codcat']))
    {
      $this->npasicaremp->setCodcat($npasicaremp['codcat']);
    }
    if (isset($npasicaremp['nomcat']))
    {
      $this->npasicaremp->setNomcat($npasicaremp['nomcat']);
    }
	if (isset($npasicaremp['codtipded']))
    {
      $this->npasicaremp->setCodtipded($npasicaremp['codtipded']);
    }
	if (isset($npasicaremp['codtipcat']))
    {
      $this->npasicaremp->setCodtipcat($npasicaremp['codtipcat']);
    }
    if (isset($npasicaremp['codtie']))
    {
      $this->npasicaremp->setCodtie($npasicaremp['codtie']);
    }
    if (isset($npasicaremp['codcen']))
    {
      $this->npasicaremp->setCodcen($npasicaremp['codcen']);
    }
    if (isset($npasicaremp['codtipemp']))
    {
      $this->npasicaremp->setCodtipemp($npasicaremp['codtipemp']);
    }
    if (isset($npasicaremp['codeve']))
    {
      $this->npasicaremp->setCodeve($npasicaremp['codeve']);
    }
    if (isset($npasicaremp['codnivc']))
    {
      $this->npasicaremp->setCodnivc($npasicaremp['codnivc']);
    }
    if (isset($npasicaremp['codtipcar']))
    {
      $this->npasicaremp->setCodtipcar($npasicaremp['codtipcar']);
    }
    if (isset($npasicaremp['numpta']))
    {
      $this->npasicaremp->setNumpta($npasicaremp['numpta']);
    }
    $this->npasicaremp->setCarlibnom(isset($npasicaremp['carlibnom']) ? $npasicaremp['carlibnom'] : 0);
  }

  public function CargarTipoGasto()
  {
   $c = new Criteria();
   $lista_tip = NptipgasPeer::doSelect($c);

   $tipos = array();

   foreach($lista_tip as $obj_tip)
   {
    $tipos += array($obj_tip->getCodtipgas() => $obj_tip->getDestipgas());
   }
   return $tipos;
  }

 protected function getNpasicarempOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npasicaremp = new Npasicaremp();$c = new Criteria();
      $fre = '';
      $c->add(NpnominaPeer::CODNOM,$this->getRequestParameter('npasicaremp[codnom]'));
      $objNomina = NpnominaPeer::doSelectOne($c);
      if ($objNomina)
      $fre = $objNomina->getFrecal();
      $this->configGrid($this->getRequestParameter('npasicaremp[codemp]'),$this->getRequestParameter('npasicaremp[codnom]'),$this->getRequestParameter('npasicaremp[codcar]'),$fre);
     }
    else
    {
      $npasicaremp = NpasicarempPeer::retrieveByPk($this->getRequestParameter($id));
          $fre = '';
    $c = new Criteria();
      $c->add(NpnominaPeer::CODNOM,$npasicaremp->getCodnom());
      $objNomina = NpnominaPeer::doSelectOne($c);
      if ($objNomina)
      $fre = $objNomina->getFrecal();

      $this->configGrid($npasicaremp->getCodemp(),$npasicaremp->getCodnom(),$npasicaremp->getCodcar(),$fre);
      $this->forward404Unless($npasicaremp);
    }
    return $npasicaremp;
  }

  public function executeEliminar()
  {
    $emp=$this->getRequestParameter('empleado');
    $car=$this->getRequestParameter('cargo');
    $nom=$this->getRequestParameter('nomina');
    $fec=$this->getRequestParameter('fecha');
	$explab=$this->getRequestParameter('explab');

    Nomina::eliminarNomasicarconnom($emp,$car,$nom,$fec,$explab);
    $this->setFlash('notice','Registro Eliminado exitosamente');
    return $this->redirect('nomasicarconnom/edit');

  }

   /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->npasicaremp = $this->getNpasicarempOrCreate();
	$this->formato= Herramientas::getMascaraCategoria();
	$this->lonfor=strlen($this->formato);
	$this->tipos=self::CargarTipoGasto();
	$this->listadedicacion= $this->cargardedicacion();
	$this->listatiempo= $this->cargartiempo();
	$this->listacategoria= $this->cargarcategoria();
  $this->updateNpasicarempFromRequest();
  $fre = H::getX_vacio('CODNOM','Npnomina','Frecal',$this->getRequestParameter('npasicaremp[codnom]'));
  $this->configGrid($this->getRequestParameter('npasicaremp[codemp]'),$this->getRequestParameter('npasicaremp[codnom]'),$this->getRequestParameter('npasicaremp[codcar]'),$fre);
    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        if ($this->codigoemp!='')
          $this->getRequest()->setError('',$err.' :'.$this->codigoemp);
        else
          $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;
  }

    protected function getLabels()
  {
    $varforma = $this->getUser()->getAttribute('varforma','','nomcomocp');
    if($varforma=='S')
        $eti1 = 'Nivel';
    else
      $eti1 = 'Grado';
    return array(
      'npasicaremp{codemp}' => 'Empleado:',
      'npasicaremp{nomemp}' => 'Nombre:',
      'npasicaremp{codnom}' => 'Nómina:',
      'npasicaremp{nomnom}' => 'Descripción:',
      'npasicaremp{codcar}' => 'Cargo:',
      'npasicaremp{nomcar}' => 'Descripción:',
      'npasicaremp{paso}' => 'Paso:',
      'npasicaremp{despaso}' => 'Descripción Paso:',
      'npasicaremp{fecasi}' => 'Fecha de Asignación:',
      'npasicaremp{codtipgas}' => 'Tipo de Gasto:',
      'npasicaremp{destipgas}' => 'Tipo de Gasto:',
      'npasicaremp{codcat}' => 'Categoria Presupuestaria:',
      'npasicaremp{nomcat}' => 'Nombre Categoria:',
      'npasicaremp{codtipded}' => 'Dedicacion:',
      'npasicaremp{codtipcat}' => 'Categoria del Profesor:',
      'npasicaremp{codtie}' => 'Tiempo:',
      'npasicaremp{codcen}' => 'Centro de Costo:',
      'npasicaremp{nivel}' => 'Ubicación Administrativa:',
      'npasicaremp{codtipcar}' => 'Tipo de Cargo:',
      'npasicaremp{grado}' => $eti1.':',
      'npasicaremp{carlibnom}' => 'Cargo de Libre Nombramiento?:',
      'npasicaremp{sueldocar}' => 'Sueldo:',
      'npasicaremp{codtipemp}' => 'Tipo de Empleado:',
      'npasicaremp{codnivc}' => 'Nivel:',
      'npasicaremp{codeve}' => 'Evento:',
      'npasicaremp{numpta}' => 'Punto de Cuenta:',
    );
  }
}
