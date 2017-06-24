<?php

/**
 * pretrasla actions.
 *
 * @package    siga
 * @subpackage pretrasla
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class pretraslaActions extends autopretraslaActions
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
    $this->getUser()->getAttributeHolder()->remove('grabotra','pretrasla');

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cptrasla/filters');

    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');

     // 15    // pager
    $this->pager = new sfPropelPager('Cptrasla', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='cptrasla.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CptraslaPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
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
    $this->configGridMovimiento($this->cptrasla->getReftra());
    $this->configGrid2();
    $this->configGrid3();
    if (!$this->cptrasla->getId())
      $this->getUser()->getAttributeHolder()->remove('grabotra','pretrasla');

  }

  public function configGridMovimiento($reftra = '')
  {
    $mandisper=H::getConfApp2('mandisper', 'presupuesto', 'PreSolTrasla');
      $c = new Criteria();
      $c->add(CpmovtraPeer::REFTRA,$reftra);
      $reg = CpmovtraPeer::doSelect($c);

      if(!$reg){
        $reg= array();
        $c = new Criteria();
        $c->add(CpsolmovtraPeer::REFTRA,$reftra);
        $cpsolmov = CpsolmovtraPeer::doSelect($c);
        if($cpsolmov){
            foreach ($cpsolmov as $cpsolmovtra) {
            $cpmovtra= new Cpmovtra();
            $cpmovtra->setReftra("");
            $cpmovtra->setStamov("");
            $cpmovtra->setCodori($cpsolmovtra->getCodori());
            $cpmovtra->setCoddes($cpsolmovtra->getCoddes());
            $cpmovtra->setMonmov($cpsolmovtra->getMonmov());
            $cpmovtra->setDatosperiodos($cpsolmovtra->getDatosperiodos());
            $cpmovtra->setDatosperiodos2($cpsolmovtra->getDatosperiodos2());
            $reg[]= $cpmovtra;
            }
        }
      }
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/pretrasla/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_movimiento_new');
    if ($mandisper=='S'){
      $this->columnas[1][1]->setOculta(false);
      $this->columnas[1][4]->setOculta(false);
    }

    $this->grid = $this->columnas[0]->getConfig($reg);
    $this->cptrasla->setGrid($this->grid);

  }

  public function configGrid2($reftra='', $codori=''){ //Distribución por Período Origen
    $c = new Criteria();
    $c->add(CpsolmovtraperoriPeer::REFTRA ,$reftra);
    $c->add(CpsolmovtraperoriPeer::CODORI ,$codori);
    $result = CpsolmovtraperoriPeer::doSelect($c);
    
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/pretrasla/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_perdes');

    $this->obj2 = $this->columnas[0]->getConfig($result);

    $this->cptrasla->setObj2($this->obj2);    
  } 

  public function configGrid3($reftra='', $coddes=''){ //Distribución por Período Destino
    $c = new Criteria();
    $c->add(CpsolmovtraperdesPeer::REFTRA ,$reftra);
    $c->add(CpsolmovtraperdesPeer::CODDES ,$coddes);
    $result = CpsolmovtraperdesPeer::doSelect($c);
    
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/pretrasla/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_perhas');

    $this->obj3 = $this->columnas[0]->getConfig($result);

    $this->cptrasla->setObj3($this->obj3);    
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

        $this->params=array();
        $this->cptrasla = $this->getCptraslaOrCreate();
        $this->updateCptraslaFromRequest();
        $this->labels = $this->getLabels();
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir3=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');
        $cordissol=H::getConfApp2('cordissol', 'presupuesto', 'PreTrasla');
        
        $c = new Criteria();
        $c->add(CpsoltraslaPeer::REFTRA, $codigo);
        if ($filsoldir3=='S'){
          $sql='cpsoltrasla.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $c->add(CpsoltraslaPeer::CODDIREC,$sql,Criteria::CUSTOM); 
        }
        $reg = CpsoltraslaPeer::doSelectOne($c);

        if ($reg){
           if($reg->getStapre()=='S' || $reg->getStacon()=='S' || $reg->getStagob()=='S'){
            if ($cordissol=='S')
              $yatietras=H::getX_vacio('REFSOLTRA','Cptrasla','Refsoltra',$codigo);
            else
              $yatietras=H::getX_vacio('REFTRA','Cptrasla','Reftra',$codigo);
            if ($yatietras=='') {
            //Cargando Descripción - cpsoltrasla
            $des=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($reg->getDestra()));
            $tot = $reg->getTottra();
            $fec = $reg->getFectra();

            $fec = str_replace("-","/",$fec);
            $coddirec=$reg->getCoddirec();
            $desdirec=H::getX_vacio('CODDIREC','cadefdirec','Desdirec',$coddirec);
            
            if ($cordissol=='S')
              $msj = "$('cptrasla_refsoltra').value='$codigo'; $('cptrasla_reftra').value='########'; $('cptrasla_reftra').readOnly=true; $('$desc').value= '$des'; $('cptrasla_coddirec').value='$coddirec'; $('cptrasla_desdirec').value='$desdirec'; $('$tota').value = number_format('$tot',2,',','.'); formatoFecha('$fec');";
            else
              $msj = "$('$desc').value= '$des'; $('cptrasla_coddirec').value='$coddirec'; $('cptrasla_desdirec').value='$desdirec'; $('$tota').value = number_format('$tot',2,',','.'); formatoFecha('$fec');";
         
            $this->configGridMovimiento($codigo);
          }else {
            $this->configGridMovimiento();
            $msj = "alert('La Solicitud de Traslado ya posee un Traslado'); $('cptrasla_reftra').value='' ";
          }
          }else {
            $this->configGridMovimiento();
            $msj = "alert('La Solicitud de Traslado no ha sido Aprobada');  $('cptrasla_reftra').value=''";
          }
        }else{
            $this->configGridMovimiento();
            if ($filsoldir3=='S')
              $msj = "alert('La Solicitud de Traslado no existe o no esta asociada a su usuario');  $('cptrasla_reftra').value=''";
            else 
              $msj = "alert('La Solicitud de Traslado no existe');  $('cptrasla_reftra').value=''";
        }


        $output = '[["javascript","'.$msj.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '3':
        $referencia = $this->getRequestParameter('referencia','');
        $fectra = $this->getRequestParameter('fectra','');
        $mens = Presupuesto::verificarAnularTraslado($referencia);
        if ($mens==''){
        	$javascript="abreAnular('$referencia','$fectra')";
        }else{
        	$javascript="alert('$mens')";
        }
        $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '4':  
        $codigopre = $this->getRequestParameter('codigopre');
        $reftra = $this->getRequestParameter('reftra');
        $nuevo = $this->getRequestParameter('nuevo');
        $montomov = $this->getRequestParameter('montomov','0,00');
        
        $this->params=array();
        $this->cptrasla= $this->getCptraslaOrCreate();
        $this->labels = $this->getLabels();

        $this->configGrid2($reftra, $codigopre);
        
        $js="$('divgrid_perdes').show();";

        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';      
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');        
        break; 
      case '5':  
        $codigopre = $this->getRequestParameter('codigopre');
        $reftra = $this->getRequestParameter('reftra');
        $nuevo = $this->getRequestParameter('nuevo');
        $montomov = $this->getRequestParameter('montomov','0,00');
        
        $this->params=array();
        $this->cptrasla= $this->getCptraslaOrCreate();
        $this->labels = $this->getLabels();

        $this->configGrid3($reftra, $codigopre);
        
        $js="$('divgrid_perhas').show();";

        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';      
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');        
        break;
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    //$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    //return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

       $this->cptrasla = $this->getCptraslaOrCreate();

       $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');  
       $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec'); 
       if ($filsoldir=='S'){
         if ($this->getRequestParameter('cptrasla[coddirec]')==''){
            if ($cambiareti=='S') $this->coderr=3014; else $this->coderr=3013;
            return false;
         }
       }

     if (!H::validarPeriodoPresuesto($this->getRequestParameter('cptrasla[fectra]')) && $this->getRequestParameter('id')=="")
     {
        $this->coderr=151;
        return false;
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);

  }

  public function saving($cptrasla)
  {
        $grid     = Herramientas::CargarDatosGridv2($this,$this->grid);
        $this->getUser()->setAttribute('grabotra', 'S','pretrasla');
        return Presupuesto::salvarTraslado($cptrasla, $grid);
  }

  public function deleting($cptrasla)
  { 
   
        return Presupuesto::eliminarTraslado($cptrasla);
  }
 public function executeDelete()
  {
    $this->cptrasla = CptraslaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->cptrasla);
    $this->msg='';
    try
     {$msg=Presupuesto::validarDetalleTraslado($this->cptrasla->getReftra());
      if($msg!=''){
                $valor= "NO se puede Eliminar el Traspaso. El Monto Disponible de la Partida ". $msg .". Al Disminuirla por el Monto del Traspaso  quedaría Negativa.";
                $this->getRequest()->setError('delete',$valor);

        }else{

      $this->deleteCptrasla($this->cptrasla);
      $id= $this->cptrasla->getId();
      $this->SalvarBitacora($id ,'Elimino');}
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('pretrasla', 'list');
    }


    return $this->forward('pretrasla', 'list');
  }
  public function executeAnular(){

   $this->referencia = $this->getRequestParameter('referencia');
   $fectra=$this->getRequestParameter('fectra');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fectra, 'i', $dateFormat->getInputPattern('d'));
   $c = new Criteria();
   $c->add(CptraslaPeer::REFTRA,$this->referencia);
   $c->add(CptraslaPeer::FECTRA,$fec);
   $this->cptrasla = CptraslaPeer::doSelectOne($c);
   sfView::SUCCESS;
  }

  public function executeSalvaranu(){

	$reftra = $this->getRequestParameter('reftra');
	$desanu = $this->getRequestParameter('desanu');
	$fecanu = $this->getRequestParameter('fecanu');
	$fectra = $this->getRequestParameter('fectra');
	$this->msg="";

        $dateFormat = new sfDateFormat('es_VE');
   	$fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

	if (strtotime($fec) < strtotime($fectra)){
            $this->msg='La fecha de Anulación no puede ser menor a la del Compromiso';
        }else {
             $this->msg= Presupuesto::salvarAnularTraslado($reftra,$fecanu,$desanu);
        }

	sfView::SUCCESS;
  }

	public function executeAjaxfila() {
                $name = $this->getRequestParameter('grid', 'a');
    		$grid = $this->getRequestParameter('grid'.$name,'');
                $nuevo= $this->getRequestParameter('id','');
                $fila = $this->getRequestParameter('fila','');
                $col = $this->getRequestParameter('columna', '');
                $nombre='';
                $javascript="";  $jsonextra="";
                  switch ($name) {
                  //Grid detalle
                  case 'a':
                      switch ($col) {
                      case '1':
                      $nombre = Presupuesto::BuscarNombreCodPre($grid[$fila][0]);
                      $jsonextra = ',["cptrasla_nomcodpre","' .$nombre. '",""]';
                      break;
                      case '2':
                      $nombre = Presupuesto::BuscarNombreCodPre($grid[$fila][1]);
                      $jsonextra = ',["cptrasla_nomcodpre","' .$nombre. '",""]';
                      break;
                      }
                      break;
                      }

         $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
         $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        return sfView::HEADER_ONLY;
        }

  public function getLabels()
  {
    $labels = parent::getLabels(); 
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['cptrasla{coddirec}'] = 'Estado';
    return $labels;
  }         

}
