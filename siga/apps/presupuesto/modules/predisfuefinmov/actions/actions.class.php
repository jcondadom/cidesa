<?php

/**
 * predisfuefinmov actions.
 *
 * @package    Roraima
 * @subpackage predisfuefinmov
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 61260 2015-03-25 18:16:20Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class predisfuefinmovActions extends autopredisfuefinmovActions
{
  public $aprobado;
  private $codigo;

  public function executeIndex()
  {
    return $this->forward('predisfuefinmov', 'edit');
  }


  // Para incluir funcionalidades al executeEdit()
  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
  $this->configGrid();

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($anoprc='', $ref='',$tipmov='', $reg = array())
  {
   if ($tipmov=="TRASLADO")   //SOLICITUD DE TRASLADO
      $this->aprobado = Presupuesto::VerificarAprobacion();
  if ($tipmov=='CREDITO')
      $adidis=H::getX_vacio('refadi','cpadidis','adidis',$ref);
    else
      $adidis='';
   $arreglo = array();
   Presupuesto::cargarDocumentosDis($anoprc,$ref,$tipmov,$arreglo);

   $i=0;
   while ($i<count($arreglo))
   {
     if (H::toFloat($arreglo[$i]["mondis"])>0 || $adidis=='A') {
       $cpdisfuefin= new Cpdisfuefin();
       $cpdisfuefin->setCodpre($arreglo[$i]["codpre"]);
       $cpdisfuefin->setOrigen($arreglo[$i]["origen"]);
       $cpdisfuefin->setFuefin($arreglo[$i]["fuefin"]);
       $cpdisfuefin->setMonasi($arreglo[$i]["monasi"]);               
       $cpdisfuefin->setMoneje($arreglo[$i]["moneje"]);   
       $cpdisfuefin->setMondis($arreglo[$i]["mondis"]);
       $cpdisfuefin->setNuevo($arreglo[$i]["nuevo"]);
       $cpdisfuefin->setMonto($arreglo[$i]["monto"]);           
       $cpdisfuefin->setMontoimp($arreglo[$i]["montoimp"]);
       $cpdisfuefin->setTipmov($arreglo[$i]["tipmov"]);
       $cpdisfuefin->setRefmov($arreglo[$i]["refmov"]);
       $cpdisfuefin->setCorrel($arreglo[$i]["correl"]);
       $cpdisfuefin->setMondif($arreglo[$i]["mondif"]);
       $cpdisfuefin->setCodpre3($arreglo[$i]["codpre3"]);
       $cpdisfuefin->setCorreldis($arreglo[$i]["correldis"]);
       $reg[]=$cpdisfuefin;         
     }  
       $i++;
   }      
    
   
   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/predisfuefinmov/'.sfConfig::get('sf_app_module_config_dir_name').'/grip_movimiento');
   $this->columnas[1][3]->setHTML('size=10 onBlur=ValidarMontoGridv2(this); actualizarsaldosTotal();');

   $this->obj = $this->columnas[0]->getConfig($reg);

   $this->cpmovfuefin->setObj($this->obj);
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $desprc="";
    $monprc="0,00";
    $javascript="";
    switch ($ajax){
      case '1':
        $this->cpmovfuefin = new Cpmovfuefin();
        $this->cpmovfuefin->setTipmov($codigo);

        $output = '[["","",""],["","",""],["","",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;

      case '2':   //PreCompromiso
          $t= new Criteria();
          $t->add(CpprecomPeer::REFPRC,$codigo);
          $resultado= CpprecomPeer::doSelectOne($t);
          if ($resultado)
          {
              if ($resultado->getStaprc()!='A')
              {
                  $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
                  $this->configGrid();
                  $javascript=  "alert('El Movimiento no debe estar Anulado');";
                  $codigo="";
              }else {
                $w= new Criteria();
                $w->add(CpmovfuefinPeer::REFMOV,$codigo);
                $w->add(CpmovfuefinPeer::TIPMOV,'PRECOMPROMISO');
                $w->add(CpmovfuefinPeer::STAMOV,'N',Criteria::NOT_EQUAL);
                $esta= CpmovfuefinPeer::doSelectOne($w);
                  //$esta=H::getX_vacio('refmov','cpmovfuefin','refmov',$codigo);
                  if (!$esta)
                  {
                      $desprc=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($resultado->getDesprc()));
                      $anoprc=$resultado->getAnoprc();
                      $monprc = H::FormatoMonto($resultado->getMonprc());
                      $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
                      $this->configGrid($anoprc,$codigo,'PRECOMPROMISO');
                      $javascript=  "$('divGrid').show(), actualizarsaldosTotal()";
                  }else {
                      $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
                      $this->configGrid();
                      $javascript=  "alert('El Movimiento ya tiene Distribución de Financiamiento');";
                      $codigo="";
                  }
              }
          }else {
            $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
            $this->configGrid();
            $javascript=  "alert('El Movimiento no existe');";
            $codigo="";
          }

    $output = '[["'.$cajtexmos.'","'.$desprc.'",""],["javascript","'.$javascript.'",""],["cpmovfuefin_montot","'.$monprc.'",""],["cpmovfuefin_refmov","'.$codigo.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      case '3':   //Compromiso
      $c = new Criteria();
      $c->add(CpcomproPeer::REFCOM,$codigo);
      $c->addJoin(CpcomproPeer::TIPCOM,CpdoccomPeer::TIPCOM);
      $c->add(CpdoccomPeer::REFPRC,'N');
      $c->add(CpdoccomPeer::AFEDIS,'N',Criteria::NOT_EQUAL);
      $c->add(CpcomproPeer::STACOM,'A');
      $regi = CpcomproPeer::doSelectOne($c);      
      if ($regi){
        $w= new Criteria();
        $w->add(CpmovfuefinPeer::REFMOV,$codigo);
        $w->add(CpmovfuefinPeer::TIPMOV,'COMPROMISO');
        $w->add(CpmovfuefinPeer::STAMOV,'N',Criteria::NOT_EQUAL);
        $esta= CpmovfuefinPeer::doSelectOne($w);
        //$esta=H::getX_vacio('refmov','cpmovfuefin','refmov',$codigo);
        if (!$esta) {
              $desprc = eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($regi->getDescom()));
              $anoprc = $regi->getAnocom();
              $monprc = H::FormatoMonto(H::getX_vacio('REFCOM','Cpcompro','Moncom',$codigo));

              $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
              $this->configGrid($anoprc,$codigo,'COMPROMISO');
              $javascript=  "$('divGrid').show()"; // actualizarsaldosTotal()";
              $output = '[["'.$cajtexmos.'","'.$desprc.'",""],["javascript","'.$javascript.'",""],["cpmovfuefin_montot","'.$monprc.'",""]]';
        }else{
          $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
        $javascript = "alert('No se puede realizar la Distribucion por Fuente de Financiamiento, ya que este movimiento Refiere a otro que ya tiene distribucion.')";
        $output = '[["javascript","'.$javascript.'",""],["cpmovfuefin_refmov","",""]]';
      }
      }else{
          $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
        $javascript = "alert('No se puede realizar la Distribucion por Fuente de Financiamiento, ya que este movimiento no existe.')";
        $output = '[["javascript","'.$javascript.'",""],["cpmovfuefin_refmov","",""]]';
      }
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      case '4':   //Causado
      $c = new Criteria();
      //$c->add(CpcausadPeer::REFCAU,$codigo);
      $c->addJoin(CpcausadPeer::TIPCAU,CpdoccauPeer::TIPCAU);
      $c->add(CpdoccauPeer::REFIER,'N');
      $c->add(CpdoccauPeer::AFEDIS,'N',Criteria::NOT_EQUAL);
      $c->add(CpcausadPeer::STACAU,'A');
      $sql="cpcausad.refcau='".$codigo."' and cpcausad.refcau not in (select refmov from cpmovfuefin where tipmov='CAUSADO' and stamov<>'N')";
      $c->add(CpcausadPeer::REFCAU,$sql,Criteria::CUSTOM);
      $regq = CpcausadPeer::doSelectOne($c);      
      if ($regq){
      $desprc = eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($regq->getDescau()));
      $anoprc = $regq->getAnocau();
      $monprc = H::FormatoMonto($regq->getMoncau());
      
      $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
      $this->configGrid($anoprc,$codigo,'CAUSADO');
      $javascript=  "$('divGrid').show(), actualizarsaldosTotal()";
      $output = '[["'.$cajtexmos.'","'.$desprc.'",""],["cpmovfuefin_montot","'.$monprc.'",""],["javascript","'.$javascript.'",""]]';

      }else{
        $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
        $javascript = "alert('No se puede realizar la Distribucion por Fuente de Financiamiento, ya que este movimiento Refiere a otro que ya tiene distribucion.')";
        $output = '[["javascript","'.$javascript.'",""],["cpmovfuefin_refmov","",""]]';
      }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      case '5':   //Pagado
       $c = new Criteria();
       //$c->add(CppagosPeer::REFPAG,$codigo);
       $c->addJoin(CppagosPeer::TIPPAG,CpdocpagPeer::TIPPAG);
       $c->add(CpdocpagPeer::AFEDIS,'N',Criteria::NOT_EQUAL);
       $c->add(CpdocpagPeer::REFIER,'N');
       $c->add(CppagosPeer::STAPAG,'A');
       $sql="cppagos.refpag='".$codigo."' and cppagos.refpag not in (select refmov from cpmovfuefin where tipmov='PAGADO' and stamov<>'N')";
       $c->add(CppagosPeer::REFPAG,$sql,Criteria::CUSTOM);
       $rega = CppagosPeer::doSelectOne($c);      
      if ($rega){
        $desprc = eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($rega->getDespag()));
        $anoprc = $rega->getAnopag();
        $monprc = H::FormatoMonto($rega->getMonpag());

        $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
        $this->configGrid($anoprc,$codigo,'PAGADO');
        $javascript          =  "$('divGrid').show(), actualizarsaldosTotal()";
        $output = '[["'.$cajtexmos.'","'.$desprc.'",""],["javascript","'.$javascript.'",""],["cpmovfuefin_montot","'.$monprc.'",""]]';
      }else{
        $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
        $javascript = "alert('No se puede realizar la Distribucion por Fuente de Financiamiento, ya que este movimiento Refiere a otro que ya tiene distribucion.')";
        $output = '[["javascript","'.$javascript.'",""],["cpmovfuefin_refmov","",""]]';
      }
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      case '6':   //Adicion / Disminucion
          $t= new Criteria();
          $t->add(CpadidisPeer::REFADI,$codigo);
          $resultado=CpadidisPeer::doSelectOne($t);
          if ($resultado)
          {
              if ($resultado->getStaadi()!='A')
              {
                  $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
                  $this->configGrid();
                  $javascript=  "alert('El Movimiento no debe estar Anulado');";
                  $codigo="";
              }else {
                  $adidis=H::getX_vacio('refadi','cpsoladidis','adidis',$codigo);
                  if ($adidis=='A') {
                       $w= new Criteria();
                        $w->add(CpdisfuefinPeer::REFDIS,$codigo);
                        $w->add(CpdisfuefinPeer::ORIGEN,'CREDITO');
                        $esta= CpdisfuefinPeer::doSelectOne($w);
                  } else{ 
                        $w= new Criteria();
                        $w->add(CpmovfuefinPeer::REFMOV,$codigo);
                        $w->add(CpmovfuefinPeer::TIPMOV,'CREDITO');
                        $w->add(CpmovfuefinPeer::STAMOV,'N',Criteria::NOT_EQUAL);
                        $esta= CpmovfuefinPeer::doSelectOne($w);
                      //$esta=H::getX_vacio('refmov','cpmovfuefin','refmov',$codigo);
                    }
                  if (!$esta)
                  {
                      $desprc=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($resultado->getDesadi()));
                      $anoprc=$resultado->getAnoadi();
                      $monprc = H::FormatoMonto($resultado->getTotadi());
                      $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
                      $this->configGrid($anoprc,$codigo,'CREDITO');
                      $javascript=  "$('divGrid').show()"; //, actualizarsaldosTotal()";

                  }else {
                      $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
                      $this->configGrid();
                      $javascript=  "alert('El Movimiento ya tiene Distribución de Financiamiento');";
                      $codigo="";
                  }
              }
          }else {
               $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
                $this->configGrid();
                $javascript=  "alert('El Movimiento no Existe');";
                $codigo="";
          }

    $output = '[["'.$cajtexmos.'","'.$desprc.'",""],["javascript","'.$javascript.'",""],["cpmovfuefin_montot","'.$monprc.'",""],["cpmovfuefin_refmov","'.$codigo.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      case '7':   //Solicitud de Traslado
          $t= new Criteria();
          $t->add(CpsoltraslaPeer::REFTRA,$codigo);
          $resultado= CpsoltraslaPeer::doSelectOne($t);
          if ($resultado)
          {
              if ($resultado->getStatra()!='A')
              {
                  $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
                  $this->configGrid();
                  $javascript=  "alert('El Movimiento no debe estar Anulado');";
                  $codigo="";
              }else {
                  //$esta=H::getX_vacio('refdis','cpdisfuefin','refdis',$codigo);
                  $w= new Criteria();
                  $w->add(CpdisfuefinPeer::REFDIS,$codigo);
                  $w->add(CpdisfuefinPeer::ORIGEN,'TRASLADO');
                  $esta= CpdisfuefinPeer::doSelectOne($w);
                  if (!$esta)
                  {
                      $desprc=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($resultado->getDestra()));
                      $anoprc=$resultado->getAnotra();
                      $monprc = H::FormatoMonto($resultado->getTottra());
                     $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
                    $this->configGrid($anoprc,$codigo,'TRASLADO');
                    if ($this->aprobado)
                    {
                        
                    $javascript          =  "$('divGrid').show(), actualizarsaldosTotal()";
                    $output = '[["'.$cajtexmos.'","'.$desprc.'",""],["javascript","'.$javascript.'",""],["cpmovfuefin_montot","'.$monprc.'",""]]';
                    }else
                    {
                        $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
                        $javascript =  "alert('Este Movimiento no esta aprobado ')";
                        $output = '[["javascript","'.$javascript.'",""],["cpmovfuefin_refmov","",""]]';
                    }
                  }else {
                      $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
                      $this->configGrid();
                      $javascript=  "alert('El Movimiento ya tiene Distribución de Financiamiento');";
                      $output = '[["javascript","'.$javascript.'",""],["cpmovfuefin_refmov","",""]]';
                  }
              }
          }else {
               $this->cpmovfuefin  =  $this->getCpmovfuefinOrCreate();
                $this->configGrid();
                $javascript=  "alert('El Movimiento no existe');";
                $codigo="";
                $output = '[["javascript","'.$javascript.'",""],["cpmovfuefin_refmov","",""]]';
          }   
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){
     $this->cpmovfuefin = $this->getCpmovfuefinOrCreate();
     $this->updateCpmovfuefinFromRequest();

       $this->configGrid();
       $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

       $this->coderr = Presupuesto::validarPreDisFueFinMov($this->cpmovfuefin,$grid,$codpre);
       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);
        $this->codigo=$codpre;
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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    $this->configGrid($grid[0],$grid[1]);
  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clasemodelo)
  {
  try{
        $grid = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObj());
      return	Presupuesto::SalvarPredisfuefinmov($clasemodelo,$grid);
  } catch (Exception $ex){
    exit($ex);
    return 0;
  }
  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }
  
    /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   *
   */
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->cpmovfuefin = $this->getCpmovfuefinOrCreate();
    $this->updateCpmovfuefinFromRequest();
	$this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err." ".$this->codigo);
      }
    }
    return sfView::SUCCESS;
  }


}
