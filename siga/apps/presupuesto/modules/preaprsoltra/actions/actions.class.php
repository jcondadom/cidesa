<?php

/**
 * preaprsoltra actions.
 *
 * @package    siga
 * @subpackage preaprsoltra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class preaprsoltraActions extends autopreaprsoltraActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridDetalle();
    $this->configGrid2($this->cpsoltrasla->getReftra());
  }

 
  public function configGridDetalle()
  {
    $mandisper=H::getConfApp2('mandisper', 'presupuesto', 'PreSolTrasla');

    $c = new Criteria();
    $c->add(CpsolmovtraPeer::REFTRA,$this->cpsoltrasla->getReftra());
    $reg = CpsolmovtraPeer::doSelect($c);

      
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/preaprsoltra/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detalle_new');
    if ($mandisper=='S' && $this->cpsoltrasla->getId()){
      $this->columnas[1][1]->setOculta(false);
      $this->columnas[1][4]->setOculta(false);
    }
    
    $this->objDetalle = $this->columnas[0]->getConfig($reg);//$objdetalle;
    $this->cpsoltrasla->setDetalle($this->objDetalle);


  }

  public function configGrid2($refdoc=''){ //Eventos
    $c = new Criteria();
    $c->add(CpdisevePeer::REFDOC ,$refdoc);
    $c->add(CpdisevePeer::TIPMOV ,'TRA');
    $result = CpdisevePeer::doSelect($c);
    
    $this->columnas = Herramientas :: getConfigGrid('grid_eventos');
       
    $this->obj2 = $this->columnas[0]->getConfig($result);
    $this->cpsoltrasla->setObj2($this->obj2);    
  }  

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $ides= $this->getRequestParameter('ides','');
    $this->ajaxs=$ajax;

    switch ($ajax){
      case '1':
        $monto = $this->getRequestParameter('monto','');
        $reg = CpdefnivPeer::doSelectOne(new Criteria());
        $msj="";     
        if ($reg){
            if (strlen($codigo) != strlen($reg->getForPre()) ){
                $msj = "alert('El Titulo Presupuestario no es de último nivel.'); $('$ides').value=''; $('$monto').value='';";
            }else{
                $c = new Criteria();
                $c->add(CpdeftitPeer::CODPRE, $codigo);
                $cpasiini = CpdeftitPeer::doSelectOne($c);
                if ($cpasiini){
                   $z= new Criteria();
                   $z->add(CpasiiniPeer::CODPRE,$codigo);
                   $z->add(CpasiiniPeer::PERPRE,'00');
                   $regz= CpasiiniPeer::doSelectOne($z);
                   if ($regz) {
                     $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
                     $loguse = sfContext::getInstance()->getUser()->getAttribute('loguse');
                     if ($categoriasusu!="") {
                        $y = new Criteria();
                        $y->add(SegcatusuPeer::LOGUSE,$loguse);
                        $y->add(SegcatusuPeer::CODCAT,substr($codigo,0,strlen(H::getObtener_FormatoCategoria())));                        
                        $regs2 = SegcatusuPeer::doSelectOne($y);
                        if (!$regs2) {
                         $msj = "alert_('La Categoria del C&oacute;digo Presupuestario no esta asociada a este Usuario'); $('$ides').value='';";
                        }
                      }
                    }else {
                      $msj = "alert_('El Titulo Presupuestario no tiene Asignaci&oacute;n Inicial.'); $('$ides').value='';";
                    }
                }else{
                    $msj = "alert('El Titulo Presupuestario no existe.'); $('$ides').value='';";
                }       
            }
        }

        $output = '[["javascript","'.$msj.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '2':
        $codpre = $this->getRequestParameter('codpre','');
        $msj = "";
        $montoDis = 0;
        $montoI = 0;
        $fectra = $this->getRequestParameter('fectra','');
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($fectra, 'i', $dateFormat->getInputPattern('d'));
        if ($codpre != ''){            
            $montoDis = Herramientas::Monto_disponible(H::getCodPreDis($codpre),$fec2);
            
            $numero = H::toFloat($codigo);

            if ($numero > $montoDis){
                $montoI = 0;
                $msj = "alert('El Monto introducido sobrepasa la Disponibilidad.'); $('$ides').value = number_format($montoI, 2, ',','.');";
            }else if ($numero <= $montoDis){
                $msj = "";
            }
        }else{
            $msj = "alert('Debe introducir primero el Titulo Presupuestario.'); $('$ides').value='';";
        }
        
        $output = '[["javascript","'.$msj.'",""]]';
        //$output = '[["javascript","alert('.$montoDis.'); alert('.$numero.')",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '3':
        $referencia = $this->getRequestParameter('referencia','');
        $fectra = $this->getRequestParameter('fectra','');
        $mens = Presupuesto::verificarAnularSolTrasla($referencia);
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
        $referencia = $this->getRequestParameter('referencia','');
        $fectra = $this->getRequestParameter('fectra','');
        $this->nivel = $this->getRequestParameter('nivel', '');
        $mens = Presupuesto::verificarAprobarSolTrasla($referencia);
        if ($mens==''){
          $javascript="abreAprobar('$referencia','$fectra','$this->nivel')";
        }else{
          $javascript="alert('$mens')";
        }
        $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '5':  
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
        $q= new Criteria();
        if ($filsoldir=='S'){
          $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
        }else $q->add(CadefdirecPeer::CODDIREC,$codigo);
        $reg= CadefdirecPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesdirec();                     
        }else {
            $dato="";
            if ($filsoldir=='S')
            $js="alert_('El Estado no existe o no esta asociada al usuario'); $('cpsoltrasla_coddirec').value=''; $('cpsoltrasla_desdirec').value=''; $('cpsoltrasla_coddirec').focus();";
          else
            $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('cpsoltrasla_coddirec').value=''; $('cpsoltrasla_desdirec').value=''; $('cpsoltrasla_coddirec').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';       
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY; 
        break; 
      case '6':  
        $codigopre = $this->getRequestParameter('codigopre');
        $reftra = $this->getRequestParameter('reftra');
        $nuevo = $this->getRequestParameter('nuevo');
        $montomov = $this->getRequestParameter('montomov','0,00');
        
        $this->params=array();
        $this->cpsoltrasla= $this->getCpsoltraslaOrCreate();
        $this->labels = $this->getLabels();

        $this->configGrid3($reftra, $codigopre, $nuevo);
        
        $js="$('divgrid_perdes').show();";

        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';      
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');        
        break; 
      case '7':  
        $codigopre = $this->getRequestParameter('codigopre');
        $reftra = $this->getRequestParameter('reftra');
        $nuevo = $this->getRequestParameter('nuevo');
        $montomov = $this->getRequestParameter('montomov','0,00');
        
        $this->params=array();
        $this->cpsoltrasla= $this->getCpsoltraslaOrCreate();
        $this->labels = $this->getLabels();

        $this->configGrid4($reftra, $codigopre, $nuevo);
        
        $js="$('divgrid_perhas').show();";

        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';      
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');        
        break;                 
      default:
         $this->cpsoltrasla = $this->getCpsoltraslaOrCreate();
         $this->updateCpsoltraslaFromRequest();
         $this->configGridDesde();
         $this->configGridHasta();
         $this->configGrid2();
         //$this->editing();
         $gridDesde = Herramientas::CargarDatosGridv2($this,$this->objD);
         $gridHasta = Herramientas::CargarDatosGridv2($this,$this->objH);
         $gridEvento = Herramientas::CargarDatosGridv2($this,$this->obj2);   
         $x = $gridDesde[0];
         $y = $gridHasta[0];        
          /*
          * Distribución de las cuentas con los montos
          */
         $datosDetalles = array();          
         $i=0;
         $j=0;
         $filas = 0;
         $montoRestante = 0;
         $montoFaltante = 0;
         $montos = 0;
         $totales=0;
          $totori=H::toFloat($this->getRequestParameter('cpsoltrasla[totori]'));
          if($totori!=0){
              $totales=H::toFloat($totori);
          }
           $totdes=H::toFloat($this->getRequestParameter('cpsoltrasla[totdes]'));
        // $total = $this->cpsoltrasla->getTottra();
           //$totaldif=H::toFloat($totori)-H::toFloat($totdes);
           $totaldif=$totori-$totdes;
         if ($totaldif == 0){               
             while ($i<count($x))
             {
                if ($x[$i]){
                    if (($x[$i]->getCodpre() != '') && (H::toFloat($x[$i]->getMonasi()) != 0)){
                        $montoRestante = H::toFloat($x[$i]->getMonasi());
                        $montos += H::toFloat($x[$i]->getMonasi());

                        while (($j<count($y)) && ($montoRestante > 0))
                        { 
                            if ($y[$j]){
                                $datosDetalles[$filas]['id'] = 1;
                                if ($montoFaltante > 0)
                                {
                                    $datosDetalles[$filas]["codori"] = $x[$i]->getCodpre();
                                    $datosDetalles[$filas]["coddes"] = $y[$j]->getCodpre();
                                    
                                    if ($montoRestante >= $montoFaltante)
                                    { 
                                        $montoRestante =H::toFloat($montoRestante) - H::toFloat($montoFaltante);
                                        $datosDetalles[$filas]["monmov"] = H::FormatoMonto($montoFaltante);                                       
                                        $montoFaltante = 0;
                                        $j++;
                                        $filas++;
                                    }else{
                                        $datosDetalles[$filas]["monmov"] = H::FormatoMonto($montoRestante);
                                        $montoFaltante -= H::toFloat($montoRestante);
                                        $montoRestante = 0;
                                        $filas++;
                                    }
                                }else{
                                    $datosDetalles[$filas]["codori"] = $x[$i]->getCodpre();
                                    $datosDetalles[$filas]["coddes"] = $y[$j]->getCodpre();

                                    if ($montoRestante >= H::toFloat($y[$j]->getMonasi()))
                                    {
                                        $montoRestante -= H::toFloat($y[$j]->getMonasi());
                                        $datosDetalles[$filas]["monmov"] = H::FormatoMonto($y[$j]->getMonasi());
                                        $j++;
                                        $filas++;
                                    }else{
                                        $montoFaltante = H::toFloat($y[$j]->getMonasi()) - H::toFloat($montoRestante);
                                        $datosDetalles[$filas]["monmov"] = H::FormatoMonto($montoRestante);
                                        $montoRestante = 0;
                                        $filas++;
                                    }
                                }
                                
                            }else{
                                $j++;
                            }
                        }
                    }
                    $i++;
                }else{
                    $i++;
                }


           }
               $msj = "alert('La Distribución se realizo Exitosamente');";
               $this->configGridDetalle($datosDetalles);
           }else{
                 $msj = "alert('Aún existen diferencias entre los totales.')";
                 $this->configGridDetalle();

           }
           
       $output = '[["javascript","'.$msj.'",""],["cpsoltrasla_tottra","' .number_format($totales,2,',','.') . '",""]]';
    }
    
    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

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

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }
  
  public function executeAprobar(){

   $this->referencia = $this->getRequestParameter('referencia');
   $fectra=$this->getRequestParameter('fectra');
   $this->nivel = $this->getRequestParameter('nivel');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fectra, 'i', $dateFormat->getInputPattern('d'));
   $c = new Criteria();
   $c->add(CpsoltraslaPeer::REFTRA,$this->referencia);
   $c->add(CpsoltraslaPeer::FECTRA,$fec);
   $this->cpsoltrasla = CpsoltraslaPeer::doSelectOne($c);
   sfView::SUCCESS;
  }

  public function executeSalvarapr(){

  $reftra = $this->getRequestParameter('reftra');
  $desapr = $this->getRequestParameter('desapr');
  $fecapr = $this->getRequestParameter('fecapr');
  $fectra = $this->getRequestParameter('fectra');
        $staapr = $this->getRequestParameter('staapr');
        $nivel = $this->getRequestParameter('nivel');
  $this->msg="";

        $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecapr, 'i', $dateFormat->getInputPattern('d'));

  if (strtotime($fec) < strtotime($fectra)){
            $this->msg='La fecha de Aprobación no puede ser menor a la del Compromiso';
        }else {
            Presupuesto::salvarAprobacionSolTrasla($reftra,$fecapr,$desapr, $nivel, $staapr);
        }

  sfView::SUCCESS;
  }

      public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->listing();

    $this->getUser()->getAttributeHolder()->remove('grabosol','presoltrasla');

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cpsoltrasla/filters');

    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   

     // 15    // pager
    $this->pager = new sfPropelPager('Cpsoltrasla', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='cpsoltrasla.reftra not in (select reftra from cptrasla) and cpsoltrasla.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CpsoltraslaPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

   public function getLabels()
  {
    $labels = parent::getLabels(); 
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['cpsoltrasla{coddirec}'] = 'Estado';
    return $labels;
  }   

}
