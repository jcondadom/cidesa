<?php

/**
 * preasiini actions.
 *
 * @package    Roraima
 * @subpackage preasiini
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 60134 2015-01-13 19:07:52Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class preasiiniActions extends autopreasiiniActions
{
	public function executeIndex() {
		return $this->redirect('preasiini/list');
    }

/**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cpasiini/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Cpasiini', 15);
    $c = new Criteria();
    $c->add(CpasiiniPeer::PERPRE,'00');
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

	public function editing() {
	  $mascarapre=Herramientas::ObtenerFormato('Cpdefniv','Forpre');
      $this->cpasiini->setMascarapre($mascarapre);
      $this->cpasiini->setLonpre(strlen($mascarapre));
      if (!$this->cpasiini->getId())
        $this->cpasiini->setAnopre(date('Y',strtotime(H::getX_vacio('CODEMP','Cpdefniv','Feccie','001'))));
	  $this->configGrid($this->cpasiini->getMonasi());
	}

	public function configGrid($monasi=0,$reg = array()) {
		$this->params = array();

		if ($this->cpasiini->getId()!='') {
			$cpdefniv=CpdefnivPeer::doSelectOne(new Criteria());
			$anoini=substr($cpdefniv->getFecini(),0,4);
			$anocie=substr($cpdefniv->getFeccie(),0,4);

			$c = new Criteria();
  			$c->add(CpasiiniPeer::CODPRE,$this->cpasiini->getCodPre());
  			$c->add(CpasiiniPeer::ANOPRE,$anoini,Criteria::GREATER_EQUAL);
  			$c->add(CpasiiniPeer::ANOPRE,$anocie,Criteria::LESS_EQUAL);
  			$c->add(CpasiiniPeer::PERPRE,'00',Criteria::NOT_EQUAL);
  			$c->addAscendingOrderByColumn(CpasiiniPeer::CODPRE);
  			$c->addAscendingOrderByColumn(CpasiiniPeer::ANOPRE);
  			$c->addAscendingOrderByColumn(CpasiiniPeer::PERPRE);
    		$reg = CpasiiniPeer::doSelect($c);
		}else{ $reg=Presupuesto::llenarPer($this->cpasiini->getNumper(),$monasi);}

		$this->obj = H::getConfigGrid(($this->cpasiini->getId()=='' && $this->cpasiini->getAsiper()=='N') ? 'grid_cpasiini_asigN' : 'grid_cpasiini_con');
		$this->obj = $this->obj[0]->getConfig($reg);
		//$this->params['grid'] = $this->obj;
    $this->params = array('grid' => $this->obj);
	}

	public function executeAjax() {
		$codigo = $this->getRequestParameter('codigo','');
    	$ajax = $this->getRequestParameter('ajax','');
    	$cajtexcom = $this->getRequestParameter('cajtexcom','');
    	$cajtexmos = $this->getRequestParameter('cajtexmos','');
    	$javascript=""; $dato="";

    	switch ($ajax){
      		case '1':
                $longitud=strlen(Herramientas::ObtenerFormato('Cpdefniv','Forpre'));
                if ($longitud==strlen($codigo))
                {
                  $c= new Criteria();
                  $c->add(CpdeftitPeer::CODPRE,$codigo);
                  $reg= CpdeftitPeer::doSelectOne($c);
                  if ($reg)
                  {
                      $cq= new Criteria();
                      $cq->add(CpasiiniPeer::CODPRE,$codigo);
                      $regq= CpasiiniPeer::doSelectOne($cq);
                      if (!$regq)
                      {
                  	$dato=$reg->getNompre();
                      }else {
                          $javascript="alert_('El C&oacute;digo Presupuestario ya tiene Asignaci&oacute;n Inicial'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                      }
                  }else{
                  	$javascript="alert_('El C&oacute;digo Presupuestario no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                  }

                }else{
                	$javascript="alert_('El C&oacute;digo Presupuestario no es de &Uacute;ltimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                }
      			$output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
        	break;
        	case '2':
        	break;
      		default:
        		$output = '[["","",""],["","",""],["","",""]]';
        }

    	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
    }


	public function validateEdit(){
    	$this->coderr =-1;

		if($this->getRequest()->getMethod() == sfRequest::POST) {
			$this->cpasiini = $this->getCpasiiniOrCreate();
			$this->updateCpasiiniFromRequest();
			$this->configGrid($this->cpasiini->getMonasi());
			$grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
      if (!$this->cpasiini->getId()){
        $p= new Criteria();
        $p->add(CpasiiniPeer::CODPRE,$this->cpasiini->getCodpre());
        $trajo= CpasiiniPeer::doSelectOne($p);
        if ($trajo){
          $this->coderr=1376;
          return false;
        }
      }

	  		$this->coderr = Presupuesto::validarPreasiini($this->cpasiini,$grid);
	  		if($this->coderr!=-1) {
	    		return false;
	  		} else return true;
	  	} else return true;
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError(){
    $this->configGrid($this->cpasiini->getMonasi());
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
  }

  public function saving($clasemodelo){
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    return Presupuesto::salvarPreasiini($clasemodelo,$grid);
  }

  public function deleting($clasemodelo)
  {
      $o= new Criteria();
      $cpdef=CpdefnivPeer::doSelectOne($o);
      if ($cpdef)
      {
        if ($cpdef->getEtadef()=='C')
          return 305;
        else {
          $sql="select sum(
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$clasemodelo->getAnopre()."','TRA'),0) +
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$clasemodelo->getAnopre()."','ADI'),0) -
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$clasemodelo->getAnopre()."','TRN'),0) -
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$clasemodelo->getAnopre()."','DIS'),0) -
                coalesce(obtener_ejecucion(rtrim(codpre),'01','12','".$clasemodelo->getAnopre()."','PRC'),0)) as monmov
                from cpasiini where CodPre = '".$clasemodelo->getCodpre()."' and anopre='".$clasemodelo->getAnopre()."' and perpre='00'";
          if (Herramientas::BuscarDatos($sql,$result))
          {
            if ($result[0]['monmov']!=0)
            {
              return 1377;
            }else {
              $c = new Criteria();
              $c->add(CpasiiniPeer::CODPRE,$clasemodelo->getCodpre());
              $reg = CpasiiniPeer::doSelect($c);
              if ($reg)
              {
                foreach ($reg as $obj) {
                  $obj->delete();
                }
              }              
            }
          }
        }
      }
    return -1;
  }
}
