<?php

/**
 * preadidis actions.
 *
 * @package    siga
 * @subpackage preadidis
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class preadidisActions extends autopreadidisActions
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cpadidis/filters');

    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');

     // 15    // pager
    $this->pager = new sfPropelPager('Cpadidis', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='cpadidis.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CpadidisPeer::CODDIREC,$this->sql,Criteria::CUSTOM);
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  // Para incluir funcionalidades al executeEdit()
public function editing()
  {
    $this->configGridMovimiento($this->cpadidis->getRefadi());
    $this->configGrid2();

  }

  public function configGridMovimiento($refadi = '')
  {
    $mandisper=H::getConfApp2('mandisper', 'presupuesto', 'PreSolAdiDis');
          $c = new Criteria();
          $c->add(CpmovadiPeer::REFADI,$refadi);
          $reg = CpmovadiPeer::doSelect($c);

          if(!$reg){
            $reg= array();
            $c = new Criteria();
            $c->add(CpsolmovadiPeer::REFADI,$refadi);
            $cpsol = CpsolmovadiPeer::doSelect($c);
            if($cpsol){
                foreach ($cpsol as $cpsolmovadi) {
                $cpmovadi= new Cpmovadi();
                $cpmovadi->setCodpre($cpsolmovadi->getCodpre());
                $cpmovadi->setMonmov($cpsolmovadi->getMonmov());
                $cpmovadi->setIva($cpsolmovadi->getIva());
                $cpmovadi->setMonto($cpsolmovadi->getMonto());
                $cpmovadi->setTipo($cpsolmovadi->getTipo());
                $cpmovadi->setDatosperiodos($cpsolmovadi->getDatosperiodos());
                $reg[]=$cpmovadi;

                }
            }
          }

     for ($i = 1; $i <= count($reg); $i++) {
          if ( $reg[$i-1]->getTipo() =='O'){
                 $reg[$i-1]->setDes('Origen');
              }else  if ( $reg[$i-1]->getTipo() =='D'){
                 $reg[$i-1]->setDes('Destino');
              }
       }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/preadidis/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_movimiento_edit');
    $this->columnas[1][5]->setCombo(Constantes::ListaTipoMovAdicDism());
    $this->columnas[1][5]->setHTML('readonly="true"');

    if ($mandisper=='S')
        $this->columnas[1][6]->setOculta(false);

    $this->objMov = $this->columnas[0]->getConfig($reg);
    $this->cpadidis->setObj($this->objMov);

  }

  public function configGrid2($refadi='', $codpre=''){ //Distribución por Período
    $c = new Criteria();
    $c->add(CpmovadiperPeer::REFADI ,$refadi);
    $c->add(CpmovadiperPeer::CODPRE ,$codpre);
    $result = CpmovadiperPeer::doSelect($c);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/preadidis/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_per');

    $this->obj2 = $this->columnas[0]->getConfig($result);

    $this->cpadidis->setObj2($this->obj2);
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $this->ajaxs=$ajax;


    switch ($ajax){

      case '1':
        $desc = $this->getRequestParameter('cajtexmos','');
        $tota = $this->getRequestParameter('cajtextot','');
        $just = $this->getRequestParameter('cajtexjus','');
        $this->params=array();
        $this->cpadidis = $this->getCpadidisOrCreate();
        $this->updateCpadidisFromRequest();
        $this->labels = $this->getLabels();
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir3=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');
        $cordissol=H::getConfApp2('cordissol', 'presupuesto', 'PreAdiDis');
        $msj="";
        $c = new Criteria();
        $c->add(CpsoladidisPeer::REFADI, $codigo);
        if ($filsoldir3=='S'){
          $sql='cpsoladidis.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $c->add(CpsoladidisPeer::CODDIREC,$sql,Criteria::CUSTOM);
        }
        $reg = CpsoladidisPeer::doSelectOne($c);

        if ($reg){
            if($reg->getStapre()=='S' || $reg->getStacon()=='S' || $reg->getStagob()=='S'){
              if ($cordissol=='S')
                $yatieadicre=H::getX_vacio('REFSOLADI','Cpadidis','Refsoladi',$codigo);
              else
                $yatieadicre=H::getX_vacio('REFADI','Cpadidis','Refadi',$codigo);
            if ($yatieadicre=='') {
            //Cargando Descripción - cpsoladidis
            $fec = $reg->getFecadi();
            $fec = str_replace("-","/",$fec);
            $des=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($reg->getDesadi()));
            $tot = $reg->getTotadi();
            $jus = eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars(str_replace('°','o. ',$reg->getJustificacion())));
            $this->staadi = $reg->getStaadi();
            $coddirec=$reg->getCoddirec();
            $desdirec=H::getX_vacio('CODDIREC','cadefdirec','Desdirec',$coddirec);
            if ($cordissol=='S')        
              $msj = "$('cpadidis_refsoladi').value='$codigo'; $('cpadidis_refadi').value='########'; $('cpadidis_refadi').readOnly=true; $('$desc').value= '$des';$('$just').value='$jus'; $('cpadidis_coddirec').value='$coddirec'; $('cpadidis_desdirec').value='$desdirec'; formatoFecha('$fec'); calculatotal();";
            else
              $msj = "$('$desc').value= '$des';$('$just').value='$jus'; $('cpadidis_coddirec').value='$coddirec'; $('cpadidis_desdirec').value='$desdirec'; formatoFecha('$fec'); calculatotal();";

            if ($reg->getAdidis()=='A') $msj.=" $('cpadidis_adidis_A').checked=true";
            else  $msj.="$('cpadidis_adidis_D').checked=true";
            $this->configGridMovimiento($codigo);

          }else {
            $msj="alert('Esta Solicitud de Adición/Disminución ya tiene una Adición/Disminución ')";
                $this->configGridMovimiento();
          }

            }else{
                $msj="alert('Esta Solicitud de Adición/Disminución no esta Aprobada')";
                $this->configGridMovimiento();
            }

        }else{

        if ($filsoldir3=='S')
            $msj = "alert('No Existe la Solicitud de Adicion/Disminución o no esta asociado al Usuario'); $('cpadidis_refadi').value=''; $('$desc').value= ''; $('$tota').value = number_format(0,2,',','.'); $('$just').value=''";
          else
            $msj = "alert('No Existe la Solicitud de Adicion/Disminución'); $('cpadidis_refadi').value=''; $('$desc').value= ''; $('$tota').value = number_format(0,2,',','.'); $('$just').value=''";
            $this->configGridMovimiento();
        }
      

       $output = '[["javascript","'.$msj.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;
      case '3':
        $referencia = $this->getRequestParameter('referencia','');
        $fecadi = $this->getRequestParameter('fecadi','');
        $mens = Presupuesto::verificarAnularCreditoAdidis($referencia);
        if ($mens==''){
        	$javascript="abreAnular('$referencia','$fecadi')";
        }else{
        	$javascript="alert('$mens')";
        }
        $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '4':
        $codigopre = $this->getRequestParameter('codigopre');
        $refadi = $this->getRequestParameter('refadi');
        $nuevo = $this->getRequestParameter('nuevo');
        $montomov = $this->getRequestParameter('montomov');

        $this->params=array();
        $this->cpadidis = $this->getCpadidisOrCreate();
        $this->labels = $this->getLabels();

        $this->configGrid2($refadi, $codigopre);

        $js="$('divgrid_per').show();";

        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;

    }
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
    $this->cpadidis = $this->getCpadidisOrCreate();
    try{ $this->updateCpadidisFromRequest();}catch(Exception $ex){}

     $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');
       $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
       if ($filsoldir=='S'){
         if ($this->getRequestParameter('cpadidis[coddirec]')==''){
            if ($cambiareti=='S') $this->coderr=3014; else $this->coderr=3013;
            return false;
         }
       }

    if (!H::validarPeriodoPresuesto($this->cpadidis->getFecadi()) && !$this->cpadidis->getId())
     {
        $this->coderr=151;
        return false;
     }


    if ($this->getRequestParameter('cpadidis[adidis]')=='D'){
      $this->configGridMovimiento();
      $grid = Herramientas::CargarDatosGridv2($this,$this->objMov);
      $this->coderr = Presupuesto::validarPreSolAdiDis($this->cpadidis,$grid,$this->cpadidis->getFecadi());
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
    $this->configGridMovimiento();
    $this->configGrid2();
    $grid= Herramientas::CargarDatosGridv2($this,$this->objMov);
    $grid2= Herramientas::CargarDatosGridv2($this,$this->obj2);

  }

  public function saving($cpadidis)
  {
    $grid     = Herramientas::CargarDatosGridv2($this,$this->objMov);
    return Presupuesto::salvarCreditoAdidis($cpadidis, $grid);
  }

  public function deleting($cpadidis)
  {
    return Presupuesto::eliminarCreditoAdidis($cpadidis);
  }

  public function executeAnular(){

   $this->referencia = $this->getRequestParameter('referencia');
   $fecadi=$this->getRequestParameter('fecadi');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fecadi, 'i', $dateFormat->getInputPattern('d'));
   $c = new Criteria();
   $c->add(CpadidisPeer::REFADI,$this->referencia);
   $c->add(CpadidisPeer::FECADI,$fec);
   $this->cpadidis = CpadidisPeer::doSelectOne($c);
   sfView::SUCCESS;
  }

    public function executeSalvaranu(){

	$refadi = $this->getRequestParameter('refadi');
	$desanu = $this->getRequestParameter('desanu');
	$fecanu = $this->getRequestParameter('fecanu');
	$fecadi = $this->getRequestParameter('fecadi');
	$this->msg="";

        $dateFormat = new sfDateFormat('es_VE');
   	$fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

	if (strtotime($fec) < strtotime($fecadi)){
            $this->msg='La fecha de Anulación no puede ser menor a la del Compromiso';
        }else {
            if(Presupuesto::validarAnulAumDis($refadi)){
                 $this->msg=' El Traslado no se puede anular debido a que Existe un movimiento asociado con el titulo presupuestario';
                }else{
                    Presupuesto::salvarAnularCreditoAdidis($refadi,$fecanu,$desanu);
                }
        }

	sfView::SUCCESS;
    }

  public function getLabels()
  {
    $labels = parent::getLabels();
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['cpadidis{coddirec}'] = 'Estado';
    return $labels;
  }

}
