<?php

/**
 * nomasohorxnucemp actions.
 *
 * @package    siga
 * @subpackage nomasohorxnucemp
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomasohorxnucempActions extends autonomasohorxnucempActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    if (!$this->npnucemphor->getId()) $this->npnucemphor->setFecreg(date('d/m/Y'));
    $this->configGrid($this->npnucemphor->getCodniv(),$this->npnucemphor->getCodcon(),$this->npnucemphor->getFecreg());
  }

  public function configGrid($codniv='',$codcon='', $fec1='')
  {
     $reg=array();
     Nomina::cargarEmpleadosNucCon($codniv,$codcon, $fec1, $arreglo);
     $j=0;
     while ($j<count($arreglo)) {
       $npdetnucemphor = new Npdetnucemphor();
       $npdetnucemphor->setCodemp($arreglo[$j]["codemp"]);
       $npdetnucemphor->setCanhor($arreglo[$j]["canhor"]);
       $reg[]=$npdetnucemphor;
       $j++;
     }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomasohorxnucemp/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_emp');
    
    $this->obj =$this->columnas[0]->getConfig($reg);

    $this->npnucemphor->setObj($this->obj);

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $sw=true; $dato="";
    switch ($ajax){
      case '1':
        $lonniv = $this->getRequestParameter('longitud','');
        if (strlen($codigo)==$lonniv)
        {    
          $c = new Criteria();                            
          $c->add(NpestorgPeer::CODNIV,$codigo);                            
          $alm = NpestorgPeer::doSelectOne($c);
          if ($alm)
          {
            $dato=$alm->getDesniv();                       
          }else {
            $js="alert_('El N&uacute;cleo no esta Registrado'); $('npnucemphor_codniv').value=''; $('npnucemphor_codniv').focus();";
          }
        }else {
          $js="alert_('La Ubicaci&oacute;n no es de &uacute;ltimo nivel'); $('npnucemphor_codniv').value=''; $('npnucemphor_codniv').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
        $sw=false;
        $js="";
        $codniv = $this->getRequestParameter('nucleo','');
        $fecha = $this->getRequestParameter('fecha','');
        $dateFormat = new sfDateFormat('es_VE');
        $fec1 = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
        $l= new Criteria();
        $l->add(NpdefcptPeer::CODCON,$codigo);
        $reg= NpdefcptPeer::doSelectOne($l);
        if ($reg)
        {
          $dato=$reg->getNomcon();           
        }else{
          $codigo=""; $codniv=""; $fec1="";
          $js="alert_('El Concepto no existe'); $('npnucemphor_codcon').value=''; $('npnucemphor_codcon').focus();";
        }
        $this->params=array();
        $this->npnucemphor = $this->getNpnucemphorOrCreate();
        $this->labels = $this->getLabels();
        $this->configGrid($codniv,$codigo,$fec1);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;          
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if ($sw) return sfView::HEADER_ONLY;

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

      $this->npnucemphor = $this->getNpnucemphorOrCreate();
      $this->updateNpnucemphorFromRequest();

      if (!$this->npnucemphor->getId()) {
        $dateFormat = new sfDateFormat('es_VE');
        $fec1 = $dateFormat->format($this->getRequestParameter('npnucemphor[fecreg]'), 'i', $dateFormat->getInputPattern('d'));

        $q= new Criteria();
        $q->add(npnucemphorPeer::CODNIV,$this->getRequestParameter('npnucemphor[codniv]'));
        $q->add(npnucemphorPeer::CODCON,$this->getRequestParameter('npnucemphor[codcon]'));
        $q->add(npnucemphorPeer::FECREG,$fec1);
        $result= npnucemphorPeer::doSelectOne($q);
        if ($result)
          $this->coderr=2407;
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
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Nomina::salvarCanHorEmpNucCon($clasemodelo, $grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    $q= new Criteria();
    $q->add(NpdetnucemphorPeer::CODNIV,$clasemodelo->getCodniv());
    $q->add(NpdetnucemphorPeer::CODCON,$clasemodelo->getCodcon());
    $q->add(NpdetnucemphorPeer::FECREG,$clasemodelo->getFecreg());
    $result= NpdetnucemphorPeer::doSelect($q);
    if ($result)
    {
      foreach ($result as $obj) {
        $obj->delete();
      }
    }
    return parent::deleting($clasemodelo);
  }

   /**
   * Función para manejar los filtros de búsqueda
   * de la lista
   *
   */
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codniv_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpnucemphorPeer::CODNIV, '');
      $criterion->addOr($c->getNewCriterion(NpnucemphorPeer::CODNIV, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codniv']) && $this->filters['codniv'] !== '')
    {
      $c->add(NpnucemphorPeer::CODNIV, strtr("%".$this->filters['codniv']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['desniv_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpnucemphorPeer::DESNIV, '');
      $criterion->addOr($c->getNewCriterion(NpnucemphorPeer::DESNIV, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desniv']) && $this->filters['desniv'] !== '')
    {
      $c->add(NpestorgPeer::DESNIV, strtr("%".$this->filters['desniv']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(NpnucemphorPeer::CODNIV, NpestorgPeer::CODNIV);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codcon_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpnucemphorPeer::CODCON, '');
      $criterion->addOr($c->getNewCriterion(NpnucemphorPeer::CODCON, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcon']) && $this->filters['codcon'] !== '')
    {
      $c->add(NpnucemphorPeer::CODCON, strtr("%".$this->filters['codcon']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fecreg_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpnucemphorPeer::FECREG, '');
      $criterion->addOr($c->getNewCriterion(NpnucemphorPeer::FECREG, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecreg']))
    {
      if (isset($this->filters['fecreg']['from']) && $this->filters['fecreg']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(NpnucemphorPeer::FECREG, date('Y-m-d', $this->filters['fecreg']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecreg']['to']) && $this->filters['fecreg']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(NpnucemphorPeer::FECREG, date('Y-m-d', $this->filters['fecreg']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(NpnucemphorPeer::FECREG, date('Y-m-d', $this->filters['fecreg']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
  }



}
?>