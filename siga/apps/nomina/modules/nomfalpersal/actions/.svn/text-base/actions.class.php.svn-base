<?php

/**
 * nomfalpersal actions.
 *
 * @package    Roraima
 * @subpackage nomfalpersal
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 45313 2011-07-27 13:30:30Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomfalpersalActions extends autonomfalpersalActions
{
  protected $coderr = -1;
  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npfalper/filters');

    // pager
    $this->pager = new sfPropelPager('Npfalper', 10);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

	/**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpfalperFromRequest()
	{
		$npfalper = $this->getRequestParameter('npfalper');

		$p= new Criteria();
    $p->add(NpasicarempPeer::CODEMP,trim($npfalper['codemp']));
    $p->add(NpasicarempPeer::STATUS,'V');
    $resul= NpasicarempPeer::doSelectOne($p);
    if ($resul)
    {
      $this->npfalper->setCodnom($resul->getCodnom());
    }

		if (isset($npfalper['codemp']))
		{
			$this->npfalper->setCodemp($npfalper['codemp']);
		}
		if (isset($npfalper['nomemp']))
		{
			$this->npfalper->setNomemp($npfalper['nomemp']);
		}
		if (isset($npfalper['codmot']))
		{
			$this->npfalper->setCodmot(str_pad($npfalper['codmot'],4,'0',STR_PAD_LEFT));
		}
		if (isset($npfalper['desmotfal']))
		{
			$this->npfalper->setDesmotfal($npfalper['desmotfal']);
		}
		if (isset($npfalper['observ']))
		{
			$this->npfalper->setObserv($npfalper['observ']);
		}
                if (isset($npfalper['numctr']))
                {
                  $this->npfalper->setNumctr($npfalper['numctr']);
                }

		//$this->nphojint->setStaemp('P');
    if (isset($npfalper['fecdes']))
    {
      if ($npfalper['fecdes'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npfalper['fecdes']))
          {
            $value = $dateFormat->format($npfalper['fecdes'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npfalper['fecdes'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npfalper->setFecdes($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npfalper->setFecdes(null);
      }
    }
		if (isset($npfalper['fechas']))
		{
			if ($npfalper['fechas'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($npfalper['fechas']))
					{
						$value = $dateFormat->format($npfalper['fechas'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $npfalper['fechas'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->npfalper->setFechas(Herramientas::dateAdd('d',0,$value,'-'));
					//$this->npfalper->setFecdes($value);
				}
				catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npfalper->setFechas(null);
        $this->npfalper->setFecdes(null);
      }
    }
     if (isset($npfalper['nrodia']))
    {
      $this->npfalper->setNrodia($npfalper['nrodia']);
    }
    if (isset($npfalper['nrohoras']))
    {
      $this->npfalper->setNrohoras($npfalper['nrohoras']);
    }
    if (isset($npfalper['tipsal']))
    {
      $this->npfalper->setTipsal($npfalper['tipsal']);
    }
    if (isset($npfalper['tipper']))
    {
      $this->npfalper->setTipper($npfalper['tipper']);
    }
    if (isset($npfalper['nomsup']))
    {
      $this->npfalper->setNomsup($npfalper['nomsup']);
    }
    if (isset($npfalper['monsup']))
    {
      $this->npfalper->setMonsup($npfalper['monsup']);
    }
    if (isset($npfalper['medexp']))
    {
      $this->npfalper->setMedexp($npfalper['medexp']);
    }
    if (isset($npfalper['espmed']))
    {
      $this->npfalper->setEspmed($npfalper['espmed']);
    }
    if (isset($npfalper['cenate']))
    {
      $this->npfalper->setCenate($npfalper['cenate']);
    }
    if (isset($npfalper['tipdoc']))
    {
      $this->npfalper->setTipdoc($npfalper['tipdoc']);
    }
    if (isset($npfalper['diarep']))
    {
      $this->npfalper->setDiarep($npfalper['diarep']);
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
   $js=""; $dato="";
	 if ($this->getRequestParameter('ajax')=='1')
	 {
    $p1= new Criteria();
    $p1->add(NphojintPeer::CODEMP,$this->getRequestParameter('codigo'));
    $resul1= NphojintPeer::doSelectOne($p1);
    if ($resul1)
    {
      $p= new Criteria();
      $p->add(NpasicarempPeer::CODEMP,$this->getRequestParameter('codigo'));
      $p->add(NpasicarempPeer::STATUS,'V');
      $resul= NpasicarempPeer::doSelectOne($p);
      if (!$resul)
        $js="alert('El Empleado no se Encuentra Vigente'); $('npfalper_codemp').value=''; $('npfalper_codemp').focus();";
      else
        $dato=$resul1->getNomemp();
    }else{
       $js="alert('El Empleado no esta registrado'); $('npfalper_codemp').value=''; $('npfalper_codemp').focus();";
    }
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
	 if ($this->getRequestParameter('ajax')=='2')
	 {
	 	$dato=NpmotfalPeer::getDesmotfal_text(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
         if ($this->getRequestParameter('ajax')=='3')
	 {
                $fecdes=$this->getRequestParameter('fecdes');
                $fechas=$this->getRequestParameter('fechas');
                $codmot=$this->getRequestParameter('codmot');
                $codemp=$this->getRequestParameter('codemp');
                $dato = H::GetX('Codmotfal','Npmotfal','Tipdia',$codmot);
	 	$sql="select
                        case when '$dato'='H' then
                                diashab(codnom,to_date('$fecdes','dd/mm/yyyy'),to_date('$fechas','dd/mm/yyyy'))
                        else
                                to_date('$fechas','dd/mm/yyyy')-to_date('$fecdes','dd/mm/yyyy')+1
                        end
                        as dias, to_char(fecharetorno(to_date('$fechas','dd/mm/yyyy'),codnom,1,'$dato'),'dd/mm/yyyy') as fecret
                        from npasicaremp where codemp='$codemp' and status='V'";
                if(H::BuscarDatos($sql, $rs))
                {    
                    $dias = $rs[0]['dias'];
                    $fecinc= $rs[0]['fecret'];
                }    
                else
                    $dias=null;
                
	 	$output = '[["npfalper_fecinc","'.$fecinc.'",""],["npfalper_nrodia","'.$dias.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                return sfView::HEADER_ONLY;

	 }
         if ($this->getRequestParameter('ajax')=='4')
	 {
                $fecdes=$this->getRequestParameter('fecdes');
                $nrodia=$this->getRequestParameter('nrodia');
                $codmot=$this->getRequestParameter('codmot');
                $codemp=$this->getRequestParameter('codemp');
                $dato = H::GetX('Codmotfal','Npmotfal','Tipdia',$codmot);
                $calfecinc=H::getConfApp2('calfecinc', 'nomina', 'nomfalpersal');
                if ($calfecinc=="S")//calcular fecha incorporacion
                {
                    $sql="select to_char(fecharetornofalper(to_date('$fecdes','dd/mm/yyyy'),codnom,$nrodia,'$dato'),'dd/mm/yyyy') as fecha,
                        to_char(fecharetorno(fecharetornofalper(to_date('$fecdes','dd/mm/yyyy'),codnom,$nrodia,'$dato'),codnom,1,'$dato'),'dd/mm/yyyy') as fecharet
                        from npasicaremp
                        where codemp='$codemp' and status='V'";
                    if(H::BuscarDatos($sql, $rs))
                        {    
                            $fec = $rs[0]['fecha'];
                            $fecret = $rs[0]['fecharet'];
                        }   
                    else
                        $fec=null;
                    
                    $output = '[["npfalper_fechas","'.$fec.'",""],["npfalper_fecinc","'.$fecret.'",""]]';
                    
                }
                else//como estaba antes
                {
                    $sql="select to_char(fecharetorno(to_date('$fecdes','dd/mm/yyyy'),codnom,$nrodia,'$dato')-1,'dd/mm/yyyy') as fecha
                        from npasicaremp
                        where codemp='$codemp' and status='V'";
                    if(H::BuscarDatos($sql, $rs))
                        {    
                            $fec = $rs[0]['fecha'];
                        }   
                    else
                        $fec=null;
                    
                    $output = '[["npfalper_fechas","'.$fec.'",""]]';
                                        
                }    
                $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
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
  protected function saveNpfalper($npfalper)
  {
  	$this->updateNpfalperFromRequest();
  	//$this->npfalper->setFecdes(date('Y-m-d'));
    $npfalper->save();
    $actstaemp=H::getConfApp2('actstaemp', 'nomina', 'nomfalpersal');
    if ($actstaemp=='S') {
    	$c= new Criteria();
    	$c->add(NphojintPeer::CODEMP,$npfalper->getCodemp());
    	$nphojint_up = NphojintPeer::doSelectOne($c);
    	if (count($nphojint_up)>0)
    	{
    		$nphojint_up->setStaemp('P');
      	$nphojint_up->save();
    	}
    }
        
      $mossesant=H::getConfApp2('mossesant', 'nomina', 'nomfalpersal');
      if ($mossesant=='S') {
          $this->getUser()->setAttribute('empleado', $npfalper->getCodemp(),'nomfalpersal');
      }
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npfalper = $this->getNpfalperOrCreate();
     $mossesant=H::getConfApp2('mossesant', 'nomina', 'nomfalpersal');
    if ($mossesant=='S')
    {
        $this->npfalper->setCodemp($this->getUser()->getAttribute('empleado',null,'nomfalpersal'));
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpfalperFromRequest();

      $this->saveNpfalper($this->npfalper);

      $this->setFlash('notice', 'Your modifications have been saved');

    $this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomfalpersal/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomfalpersal/list');
      }
      else
      {
         if ($mossesant=='S')
             return $this->redirect('nomfalpersal/create');
         else
             return $this->redirect('nomfalpersal/edit?id='.$this->npfalper->getId());
          
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function getLabels()
  {
    $etimot=H::getConfApp2('etimot', 'nomina', 'nomfalpersal');
    $denominacion=H::getConfApp2('denominacion', 'nomina', 'nomhojint');
    if ($etimot!="") $eti=$etimot; else $eti="Motivo";
    return array(
      'npfalper{codemp}' => 'Empleado:',
      'npfalper{nomemp}' => 'Nombre:',
      'npfalper{codmot}' => $eti.':',
      'npfalper{desmotfal}' => 'Descripcion:',
      'npfalper{observ}' => 'Observacion:',
      'npfalper{numctr}' => 'N° de Control:',
      'npfalper{fecdes}' => 'Fecha Desde:',
      'npfalper{fechas}' => 'Fecha Hasta:',
      'npfalper{nrodia}' => 'N° de Días:',
      'npfalper{nrohoras}' => 'N° de Horas:',
      'npfalper{tipsal}' => 'Tipo de Salida:',
      'npfalper{tipper}' => 'Tipo de Permiso:',
      'npfalper{nomsup}' => 'Nombre del Suplente:',
      'npfalper{monsup}' => 'Monto de la Suplencia'.$denominacion.':',
      'npfalper{medexp}' => 'Médico que lo Expide:',
      'npfalper{espmed}' => 'Especialidad:',
      'npfalper{fecinc}' => 'Fecha Incorporación:',
      'npfalper{cenate}' => 'Centro de Atención Médica:',
      'npfalper{tipdoc}' => 'Tipo de Documento:',
      'npfalper{diarep}' => 'Diagnóstico:',
    );
  }  

    public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npfalper = $this->getNpfalperOrCreate();
    $this->updateNpfalperFromRequest();

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }

    return sfView::SUCCESS;
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
        $this->npfalper = $this->getNpfalperOrCreate();
        $this->updateNpfalperFromRequest();
        

      if (!$this->npfalper->getId())
      {         
         $result=array();
         $sql="select * from (
          select b.fecha as fecha from npfalper a, npfechas b where a.codemp='".$this->npfalper->getCodemp()."' and b.fecha between fecdes and fechas
          ) z where fecha between  '".$this->npfalper->getFecdes()."' and '".$this->npfalper->getFechas()."'";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $this->coderr=4415;
        }        
      }   
      if ($this->coderr<>-1)
      {
        return false;
      }else return true;
    }else return true;
  }  
}

