<?php

/**
 * nomnomcalnomasinc actions.
 *
 * @package    Roraima
 * @subpackage nomnomcalnomasinc
 * @author     $Author:jlobaton $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 34727 2009-11-13 13:25:56Z jlobaton $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomnomcalnomasincActions extends autonomnomcalnomasincActions
{

  private $coderror = -1;

  public function executeIndex()
  {
    return $this->redirect('nomnomcalnomasinc/edit');
  }


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    if(SF_ENVIRONMENT=='dev'){
      $this->ent='_dev';
    }else
    {
      $this->ent='';
    }
    $this->configGrid();
    parent::executeEdit();

  }

  public function executeMensaje()
  {
    $this->codnom = $this->getRequestParameter('codnom');
  }

  public function executeCalculo()
  {
    $codnom = $this->getRequestParameter('codnom');
    $desde = $this->getRequestParameter('desde');
    $hasta = $this->getRequestParameter('hasta');
    $opsi = $this->getRequestParameter('opsi');
    $msem = $this->getRequestParameter('msem2');
    $cont='no';
    $desde = str_replace('-','/',$desde);
    $hasta = str_replace('-','/',$hasta);

    CalculoNomina::ValidicionPorEmpleado($codnom,$desde,$hasta,$opsi,$msem,$cont);

    system('rm archivo* ');


    return sfView::HEADER_ONLY;
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
    $codigo=$this->getRequestParameter('codigo');

    if ($this->getRequestParameter('ajax')=='1')
    {
      $consultado = false;
      $datoaux='';
      $datopag='';

      $datoaux='valor';
      $consultado=true;
      if ($consultado)
      {   /////DATOS NIVELES
        $opsi="$('opsi_NO').checked=true";
        $msem="";
        $sql="select codnom, nomnom, numsem, ultfec, profec, frecal,
        to_char(profec,'dd/mm/yyyy') as profec2, to_char(ultfec,'dd/mm/yyyy') as ultfec2
        from npnomina where codnom='".$codigo."' ";
        if (Herramientas::BuscarDatos($sql,$npnomina))
        {
          $nomnom=$npnomina[0]["nomnom"];
          $numsem=$npnomina[0]["numsem"];
          $ultfec=$npnomina[0]["ultfec"];
          $profec=split('-',$npnomina[0]["profec"]);

          $fecha1=$profec[0].'-'.$profec[1].'-'.'01';

          $fecha2=Herramientas::dateAdd('m',1,$fecha1,'+');
          $fecha2=Herramientas::dateAdd('d',1,$fecha2,'-');

          $numerosemanas=0;

          while (strtotime($fecha1) <= strtotime($fecha2))
          {
            $fecha1b=split('-',$fecha1);

            if (Herramientas::dia_semana($fecha1b[2],$fecha1b[1],$fecha1b[0])=='Lunes')
            {
              $numerosemanas=$numerosemanas+1;
            }
            $dia=1;
            $fecha1=date("Y-m-d", strtotime("$fecha1 +$dia day"));
          }

          $fecha1=$profec[0].'-'.$profec[1].'-'.'01';

          $fecha2=Herramientas::dateAdd('m',1,$fecha1,'+');
          $fecha2=Herramientas::dateAdd('d',1,$fecha2,'-');

          if ($npnomina[0]["frecal"]=='S')
          {
            $datopag='S';

            if (!(is_null($numsem)))
            {
              $msem=$numsem;
            }
            else
            {
              $msem="__";
            }
            
            $proxima=$npnomina[0]["profec"];
            $fechaprox=Herramientas::dateAdd('d',7,$npnomina[0]["profec"],'+');
            $fechaab=explode('-',$proxima);
            $fechaac=explode('-',$fechaprox);
            if ($fechaab[1]!=$fechaac[1])   
             $opsi="$('opsi_SI').checked=true";
           else
            $opsi="$('opsi_NO').checked=true";

          }
          else if ($npnomina[0]["frecal"]=='Q')
          {
            $datopag='Q';
          }
          else if ($npnomina[0]["frecal"]=='M')
          {
            $datopag='M';
          }

          $profec=$npnomina[0]["profec2"];
          $ultfec=$npnomina[0]["ultfec2"];
          $output = '[["npnomina_nomnom","'.$nomnom.'",""],["npnomina_numsem","'.$numerosemanas.'",""],["npnomina_profec","'.$profec.'",""],["npnomina_ultfec","'.$ultfec.'",""],["javascript","'.$opsi.'",""],["msem","'.$msem.'",""],["cajocuaux","'.$datopag.'",""]]';

            //$output = '[["caja","'.$profec.'",""]]';
          $this->getUser()->setAttribute('calculolisto','si','nomnomcalnom');
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
        }else
        {
          $output = '[["npnomina_nomnom","No existe",""],["cajocuaux","'.$datoaux.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
        }
      }
      else
      {
        $output = '[["npnomina_nomnom","No existe",""],["cajocuaux","'.$datoaux.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
    }
      ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////
    else if ($this->getRequestParameter('ajax')=='2') // CALCULO DE NOMINA!!!!!!!!!!!
    {
      $codnom=$this->getRequestParameter('codnom');
      $javascript = ''; $this->err="";
      if ($codnom!='')
      {

        $desde=$this->getRequestParameter('desde');
        $hasta=$this->getRequestParameter('hasta');
        $opsi=$this->getRequestParameter('opsi');
        $msem=$this->getRequestParameter('msem2');         

        if (true)
        {
          $now = strtotime(date("Y-m-d H:i:s"));

    		  ////////////   Integracion con Presupuesto   ////////////
          $intpre = 'N';
          $varemp = $this->getUser()->getAttribute('configemp');
          if(is_array($varemp))
            if(array_key_exists('aplicacion',$varemp))
             if(array_key_exists('nomina',$varemp['aplicacion']))
              if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
                if(array_key_exists('nomnomcienom',$varemp['aplicacion']['nomina']['modulos']))
                  if(array_key_exists('intpre',$varemp['aplicacion']['nomina']['modulos']['nomnomcienom']))
                   $intpre = $varemp['aplicacion']['nomina']['modulos']['nomnomcienom']['intpre'];
		    	////////////////////////////////////

           // CalculoNomina::ValidicionPorEmpleado($codnom,$desde,$hasta,$opsi,$msem,$cont);
           CalculoNomina::CalculoNominaAsincrono($codnom,$desde,$hasta,$opsi,$msem,$cont);
           $now2 = strtotime(date("Y-m-d H:i:s"));
           $now3 = $now2-$now;

           $output = '[["controlador","no",""],["tiempo","'.$now3.'",""],["javascript","'.$javascript.'",""]]';
         }else{
           $output = '[["controlador","si",""]]';
         }

          ///////////////////////////////////////////////
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          $this->configGrid($codnom);
      }else{
          $output = '[["controlador","vacio",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
    }else if($this->getRequestParameter('ajax')=='3'){
        $javascript = ''; $this->err="";
        $codnom=$this->getRequestParameter('codnom');
        if ($codnom!='')
        {
          $desde=$this->getRequestParameter('desde');
          $hasta=$this->getRequestParameter('hasta');

          $sql = "Select count(distinct a.codemp) as total
            from npasicaremp a,nphojint b, npsitemp c
            where a.codnom='".$codnom."' and a.status='V'
              and to_date(to_char(b.fecing,'dd/mm/yyyy'),'dd/mm/yyyy') <= to_date('".$hasta."','dd/mm/yyyy')
            and a.codemp=b.codemp
            and b.staemp = c.codsitemp
            and c.calnom = 'S' and a.status='V'
                              and ((b.fecinicon is null and b.fecfincon is null) or (to_date(to_char(b.fecinicon,'dd/mm/yyyy'),'dd/mm/yyyy') <= to_date('".$hasta."','dd/mm/yyyy') and to_date(to_char(b.fecfincon,'dd/mm/yyyy'),'dd/mm/yyyy') >= to_date('".$hasta."','dd/mm/yyyy') ) )";

          Herramientas::BuscarDatos($sql,$total);


          $sql = "select count(distinct codemp) as total from npnomcal where codnom='".$codnom."' and fecnom='".$hasta."'";

          Herramientas::BuscarDatos($sql,$avance);
          $porcentaje = ($avance[0]["total"] * 100) / $total[0]["total"];
          $javascript = "$('linfo').update('Procesando Nomina ".$codnom.": ".$avance[0]["total"]." de ".$total[0]["total"]."'); progress_bar.step.bind(progress_bar,".$porcentaje.")";

          $output = '[["controlador","no",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
        }
      }
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
    {
      $this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','Codnom',trim($this->getRequestParameter('npnomina[codnom]')));
    }
    else if ($this->getRequestParameter('ajax')=='2')
    {

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
  public function saveNpnomina($Npnomina)
  {
    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::saveNpnomina($Npnomina);

      if(is_array($coderr)){
        foreach ($coderror as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }

    } catch (Exception $ex) {

      $coderror = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

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
    $resp=-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->caajuoc = $this->getCaajuocOrCreate();
      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);




      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

      if($resp!=-1){
        $this->coderror = $resp;
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();
    if(SF_ENVIRONMENT=='dev'){
      $this->ent='_dev';
    }else
    {
      $this->ent='';
    }


    $this->Npnomina= $this->getNpnominaOrCreate();
    $this->updateNpnominaFromRequest();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;

  }

/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
public function configGrid($codnom='')
{
    /////PARA LA CONSULTA//////
    /*$c = new Criteria();
      $c->add(NpnominaPeer::CODNOM,$codnom);
      $per = NpnominaPeer::doSelect($c);*/

      try{
        $sql = "select 9 as id,codnom as codnom,condicion as condicion from tmpcalculo".$codnom;
        if (Herramientas::BuscarDatos($sql,$npnomina))
        {
          $per = $npnomina;
        }else
        $per = array('0' => array('id' => 9, 'codnom' => '**********', 'condicion' => 'NO HAY NOMINA EN EJECUCION' ));
      }
      catch(Exception $ex){
        $per = array('0' => array('id' => 9, 'codnom' => '*********', 'condicion' => 'NO HAY NOMINA EN EJECUCION' ));
      }
          ///FIN CONSULTA///

    ////OPCIONES DEL GRID//////
      $opciones = new OpcionesGrid();
      $opciones->setTabla('Npnomina');
      $opciones->setEliminar(false);
      $opciones->setAnchoGrid(400);
      $opciones->setFilas(0);
      $opciones->setTitulo('Nominas en Calculo');
      $opciones->setHTMLTotalFilas(' ');
      ///FIN OPCIONES///

    /////COLUMNAS///////

      $col1 = new Columna('Nomina');
      $col1->setTipo(Columna::TEXTO);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codnom');
      $col1->setHTML('type="text" size="7" maxlength="35"  readonly=true ');


      $col2 = new Columna('Condicion');
      $col2->setTipo(Columna::TEXTO);
      $col2->setAlineacionObjeto(Columna::CENTRO);
      $col2->setAlineacionContenido(Columna::CENTRO);
      $col2->setNombreCampo('condicion');
      $col2->setHTML('type="text" size="40" maxlength="35"  readonly=true');

      $opciones->addColumna($col1);
      $opciones->addColumna($col2);

        ///FIN COLUMNAS///

      $this->obj = $opciones->getConfig($per);
    }


  }
