<?php

/**
 * nomfalperper actions.
 *
 * @package    Roraima
 * @subpackage nomfalperper
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 42869 2011-03-02 23:00:45Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomfalperperActions extends autonomfalperperActions
{

  public function executeIndex()
  {
    return $this->forward('nomfalperper', 'edit');
  }

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
		$this->codigoemp = $this->getRequestParameter('codigoemp');
	    $this->nphojint = $this->getNphojintOrCreate();
		if($this->codigoemp!='')
			if($this->nphojint->getCodemp()=='')
		 		 $this->nphojint->setCodemp($this->codigoemp);


	    $this->pagerNpfalper = NpfalperPeer::getPagerByCodemp($this->nphojint->getCodemp(),$this->getRequestParameter('page',1));

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
		  $this->updateNphojintFromRequest();

		  $this->saveNphojint($this->nphojint);

		  $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

		  if ($this->getRequestParameter('save_and_add'))
		  {
		    return $this->redirect('nomfalperper/create');
		  }
		  else if ($this->getRequestParameter('save_and_list'))
		  {
		    return $this->redirect('nomfalperper/list');
		  }
		  else
		  {
		    return $this->redirect('nomfalperper/edit?id='.$this->nphojint->getId());
		  }
		}
		else
		{
		  $this->labels = $this->getLabels();
		}

	}
	public function executeGrid()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=NphojintPeer::getNomemp(trim($this->getRequestParameter('codigo')));
                $c = new Criteria();
                $c->addJoin(NpasicarempPeer::CODCAR,NpcargosPeer::CODCAR);
                $c->add(NpasicarempPeer::CODEMP,trim($this->getRequestParameter('codigo')));
                $c->add(NpasicarempPeer::STATUS,'V');
                $per = NpasicarempPeer::doSelectOne($c);
                $cargo='';
                if($per)
                    $cargo = $per->getNomcar();
                $codniv = H::GetX_vacio('Codemp','Nphojint','Codniv',trim($this->getRequestParameter('codigo')));
                $nivel= H::GetX_vacio('Codniv','Npestorg','Desniv',$codniv);
	 	$this->configGrid($this->getRequestParameter('codigo'),$this->getRequestParameter('codmot'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["nphojint_nomcar","'.$cargo.'",""],["nphojint_desniv","'.$nivel.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

	 }
    }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='',$codmot='')
  {

      if($codmot!='')
          $sqlmot = "a.codmot='$codmot' and";
      else
          $sqlmot = "";

		$sql = "select a.id as id,(case when a.tipper='R' then 'Remunerado' else 'No Remunerado' end) as tipper, b.desmotfal as desmotfal, to_char(a.fecdes,'dd/mm/yyyy') as fecdes,to_char(a.fechas,'dd/mm/yyyy') as fechas,
                        a.nomsup as nomsup, a.monsup as monsup, a.observ as observ, a.nrodia as nrodia, a.codmot as codmot
                        from npfalper a,npmotfal b where
                        codemp='".$codigo."' and $sqlmot a.codmot=b.codmotfal and (a.tipsal='P' or a.tipsal is null or a.tipsal='')";
	    if (Herramientas::BuscarDatos($sql,$result))
			$per = $result;
		else
			$per=array();

		$filas_arreglo=count($per);
		$this->contper=$filas_arreglo;

		$opciones = new OpcionesGrid();
		$opciones->setEliminar(false);
		$opciones->setFilas(0);
		$opciones->setTabla('Npfalper');
		$opciones->setName('a');
		$opciones->setAnchoGrid(900);
                $opciones->setAncho(2000);
		$opciones->setTitulo('Datos de los Permisos');
		$opciones->setHTMLTotalFilas(' ');

                $col1 = new Columna('Tipo de Permiso');
		$col1->setTipo(Columna::TEXTO);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('tipper');
		$col1->setHTML('type="text" size="15" readonly="true"');

		$col2 = new Columna('Motivo del Permiso');
		$col2->setTipo(Columna::TEXTO);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('desmotfal');
		$col2->setHTML('type="text" size="50" readonly="true"');
                
                $col3 = new Columna('Fecha de Desde');
		$col3->setNombreCampo('fecdes');
		$col3->setTipo(Columna::TEXTO);
		$col3->setHTML(' type="text" size="10" readonly="true" ');

		$col4 = new Columna('Fecha de Hasta');
		$col4->setNombreCampo('fechas');
		$col4->setTipo(Columna::TEXTO);
		$col4->setHTML(' type="text" size="10" readonly="true" ');

                $col5 = new Columna('Nombre del Suplente');
		$col5->setTipo(Columna::TEXTO);
		$col5->setAlineacionObjeto(Columna::CENTRO);
		$col5->setAlineacionContenido(Columna::CENTRO);
		$col5->setNombreCampo('nomsup');
		$col5->setHTML('type="text" size="40" readonly="true"');

                $denominacion=H::getConfApp2('denominacion', 'nomina', 'nomhojint');
                $col6 = new Columna('Monto Suplencia '.$denominacion.' ');
                $col6->setTipo(Columna::MONTO);
                $col6->setEsGrabable(true);
                $col6->setAlineacionContenido(Columna::DERECHA);
                $col6->setAlineacionObjeto(Columna::DERECHA);
                $col6->setNombreCampo('monsup');
                $col6->setEsNumerico(true);
                $col6->setHTML('type="text" size="10" readonly="true"');

		$col7 = new Columna('Observaciones');
		$col7->setTipo(Columna::TEXTO);
		$col7->setAlineacionObjeto(Columna::CENTRO);
		$col7->setAlineacionContenido(Columna::CENTRO);
		$col7->setNombreCampo('observ');
		$col7->setHTML('type="text" size="50" readonly="true"');

		$col8 = new Columna('Nro Dias');
		$col8->setTipo(Columna::TEXTO);
		$col8->setAlineacionObjeto(Columna::CENTRO);
		$col8->setAlineacionContenido(Columna::CENTRO);
		$col8->setNombreCampo('nrodia');
		$col8->setHTML('type="text" size="5" readonly="true"');

		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);
                $opciones->addColumna($col5);
                $opciones->addColumna($col6);
                $opciones->addColumna($col7);
                $opciones->addColumna($col8);

		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);
  }

  protected function getNphojintOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $nphojint = new Nphojint();
 	  $this->configGrid($nphojint->getCodemp());
    }
    else
    {
      $nphojint = NphojintPeer::retrieveByPk($this->getRequestParameter($id));
 	  $this->configGrid($nphojint->getCodemp());
      $this->forward404Unless($nphojint);
    }

    return $nphojint;
  }
}
