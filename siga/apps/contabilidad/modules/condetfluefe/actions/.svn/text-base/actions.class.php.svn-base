<?php

/**
 * condetfluefe actions.
 *
 * @package    siga
 * @subpackage condetfluefe
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class condetfluefeActions extends autocondetfluefeActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid($this->contadettit->getCodtitdet());
  }

  public function configGrid($codtitdet = " ")
  {
    $res = array();

    $c = new Criteria();         
    $c->add(ContacuetitPeer::CODTITDET, $codtitdet);
    $res = ContacuetitPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/condetfluefe/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_cuentas');
    $this->obj = $this->columnas[0]->getConfig($res);
    $params['grid_cuentas'] = $this->obj;
    $this->params = $params;

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
          $codigo = str_pad($codigo, 3, '0', STR_PAD_LEFT);
          $msj="";
          $c = new Criteria();
          $c->add(ContatitPeer::CODTIT, $codigo);
          $reg = ContatitPeer::doSelectOne($c);

          //Verifica Titulo
          if ($reg){            ;
            $destit = $reg->getDestit();
            $msj = "$('contadettit_codtit').value='$codigo'; $('contadettit_destit').value = '$destit';";
          }else{
              $msj = "alert('El Titulo no existe.');";
          }
        $output = '[["javascript","'.$msj.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra=""; $com='';

    switch ($col) {
        case '1': 
          if ($grid[$fila][$col-1] != "")
          {
           if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
           {
              $c = new Criteria();                            
              $c->add(ContabbPeer::CODCTA, $grid[$fila][$col-1]);                            
              $cuenta = ContabbPeer::doSelectOne($c);
              if (!$cuenta)
              {
                $grid[$fila][$col-1]="";
                $grid[$fila][$col]="";
                $javascript="alert_('La Cuenta no existe');";
              } else {
                $grid[$fila][$col]=$cuenta->getDescta();
              }
           } else {
              $grid[$fila][$col-1]="";
              $grid[$fila][$col]="";
              $javascript="alert_('La Cuenta esta repetida');";
           }
          $jsonextra = ',["javascript","' . $javascript . '",""]';
          }                        
          break;    
      default:
          break;
    }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this, $this->params['grid_cuentas']);
    return Contabilidad::salvarDetalleTitulo($clasemodelo, $grid);
  }

  public function deleting($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this, $this->params['grid_cuentas']);
    return Contabilidad::eliminarDetalleCuenta($clasemodelo, $grid);
  }


}
