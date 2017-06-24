<?php

/**
 * npforasiconemp actions.
 *
 * @package    siga
 * @subpackage npforasiconemp
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class npforasiconempActions extends autonpforasiconempActions
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npasicaremp/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Npasicaremp', 15);
    $c = new Criteria();
    $c->add(NpasicarempPeer::STATUS,'V');
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid($this->npasicaremp->getCodemp(), $this->npasicaremp->getCodnom(), $this->npasicaremp->getCodcar(), $this->npasicaremp->getFrecal());
  }

  public function configGrid($codemp='', $codnom='', $codcar='', $frecal='')
  {
    $arreglo=array();
    $per=array();
    Nomina::ArregloConceptosEmpleado($codemp,$codnom,$codcar,$arreglo);
    $i=0;
    while ($i < count($arreglo)) {
      $npasiconemp = new Npasiconemp();
      $npasiconemp->setCheck($arreglo[$i]["check"]);
      $npasiconemp->setCodcon($arreglo[$i]["codcon"]);
      $npasiconemp->setNomcon($arreglo[$i]["nomcon"]);
      $npasiconemp->setFecini($arreglo[$i]["fecini"]);
      $npasiconemp->setFecexp($arreglo[$i]["fecexp"]);
      $npasiconemp->setCantidad($arreglo[$i]["cantidad"]);
      $npasiconemp->setMonto($arreglo[$i]["monto"]);
      $npasiconemp->setFrecon($arreglo[$i]["frecon"]);
      $npasiconemp->setActivo($arreglo[$i]["activo"]);
      $npasiconemp->setAcumulado($arreglo[$i]["acumulado"]);
      $per[]=$npasiconemp;
      $i++;
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/npforasiconemp/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_conceptos');

    $this->columnas[1][7]->setCombo(Constantes::comboFrecuencia($frecal));

    $valcodconct=H::getConfApp2('valcodconct', 'nomina', 'nomnomasiconnom');
    if ($valcodconct=='S')
      $this->columnas[1][0]->setHTML('onClick="verificarCestaticket(this.id)"');

    $this->obj =$this->columnas[0]->getConfig($per);

    $this->npasicaremp->setObj($this->obj); 

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
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
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

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
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Nomina::salvarAsigConEmpUnico($clasemodelo,$grid);
    return -1;
  }

 /**
   * Función para manejar los filtros de búsqueda
   * de la lista
   *
   */
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasicarempPeer::CODEMP, '');
      $criterion->addOr($c->getNewCriterion(NpasicarempPeer::CODEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codemp']) && $this->filters['codemp'] !== '')
    {
      $c->add(NpasicarempPeer::CODEMP, strtr("%".$this->filters['codemp']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codnom_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasicarempPeer::CODNOM, '');
      $criterion->addOr($c->getNewCriterion(NpasicarempPeer::CODNOM, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codnom']) && $this->filters['codnom'] !== '')
    {
      $c->add(NpasicarempPeer::CODNOM, strtr("%".$this->filters['codnom']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasicarempPeer::NOMEMP, '');
      $criterion->addOr($c->getNewCriterion(NpasicarempPeer::NOMEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomemp']) && $this->filters['nomemp'] !== '')
    {
      $c->add(NpasicarempPeer::NOMEMP, strtr("%".$this->filters['nomemp']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codcar_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasicarempPeer::CODCAR, '');
      $criterion->addOr($c->getNewCriterion(NpasicarempPeer::CODCAR, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcar']) && $this->filters['codcar'] !== '')
    {
      $c->add(NpasicarempPeer::CODCAR, strtr("%".$this->filters['codcar']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codtipemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasicarempPeer::CODTIPEMP, '');
      $criterion->addOr($c->getNewCriterion(NpasicarempPeer::CODTIPEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codtipemp']) && $this->filters['codtipemp'] !== '')
    {
       $c->add(NphojintPeer::CODTIPEMP, strtr("%".$this->filters['codtipemp']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(NpasicarempPeer::CODEMP,  NphojintPeer::CODEMP);
      $c->setIgnoreCase(true);
    }
  }  

}
