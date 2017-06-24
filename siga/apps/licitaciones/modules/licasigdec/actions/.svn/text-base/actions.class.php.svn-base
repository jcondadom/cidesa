<?php

/**
 * licasigdec actions.
 *
 * @package    siga
 * @subpackage licasigdec
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licasigdecActions extends autolicasigdecActions
{
     
  public function executeList()
  {
      $this->redirect('licasigdec/edit');
  }
  
  public function executeDelete()
  {
      $this->redirect('licasigdec/edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $tablas = array_merge(array(''=>'Seleccione...'),Constantes::ListaDocTablas());
      $this->params=array('tablas'=>$tablas);
      $this->configGrid();
  }

  public function configGrid($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid      
    }
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licasigdec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $this->obj = $this->obj[0]->getConfig($reg);
    $this->liasigdec->setGrid($this->obj);

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
    $sw=true;
    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion       
        $sw=false;  
        $this->liasigdec = $this->getLiasigdecOrCreate();
        $this->updateLiasigdecFromRequest();
        if($codigo=='liprebas')
            $campo = 'a.numpre';
        elseif($codigo=='limemoran')
            $campo = 'a.numemo';
        elseif($codigo=='liptocue')
            $campo = 'a.numptocue';
        elseif($codigo=='lisolegr')
            $campo = 'a.numsol';
        elseif($codigo=='licomint')
            $campo = 'a.numcomint';
        elseif($codigo=='liplieesp')
            $campo = 'a.numplie';
        elseif($codigo=='liregofe')
            $campo = 'a.numofe';
        elseif($codigo=='lianaofe')
            $campo = 'a.numanaofe';
        elseif($codigo=='lirecomen')
            $campo = 'a.numrecofe';
        elseif($codigo=='liptocuecon')
            $campo = 'a.numptocuecon';
        elseif($codigo=='linotific')
            $campo = 'a.numnotif';
        elseif($codigo=='licontrat')
            $campo = 'a.numcont';
        elseif($codigo=='liordcom')
            $campo = 'a.numord';
        
        if($codigo=='liordcom' || $codigo=='licomint')
            $sqltipconpub="'B'";
        else
            $sqltipconpub='a.tipconpub';
        $sql="select $campo as numdoc, 
                    a.coduniadm,(select desuniste from lidatste where coduniste=a.coduniadm) as desuniadm,
                    a.coduniste,(select desuniste from lidatste where coduniste=a.coduniste) as desuniste,
                    a.id as campoid,0 as check,$sqltipconpub as tipconpub, '' as docu,
                    '9' as id
                    from $codigo a
                    where 
                    a.status='P'
                    order by numdoc";
        H::BuscarDatos($sql, $reg);
        $this->configGrid($reg);
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '2':
            $tabla = $this->getRequestParameter('tabla','');
            if($tabla=='liprebas')
                $campo = array('aprpor','cargoapr','a.numpre');
            elseif($tabla=='limemoran')
                $campo = array('anapor','anaporcar','a.numemo');
            elseif($tabla=='liptocue')
                $campo = array('anapor','anaporcar','a.numptocue');
            elseif($tabla=='lisolegr')
                $campo = array('aprpor','cargoapr','a.numsol');
            elseif($tabla=='licomint')
                $campo = array('aprpor','cargoapr','a.numcomint');
            elseif($tabla=='liplieesp')
                $campo = array('anapor','anaporcar','a.numplie');
            elseif($tabla=='liregofe')
                $campo = array('anapor','cargoana','a.numofe');
            elseif($tabla=='lianaofe')
                $campo = array('anapor','cargoana','a.numanaofe');
            elseif($tabla=='lirecomen')
                $campo = array('anapor','cargoana','a.numrecofe');
            elseif($tabla=='liptocuecon')
                $campo = array('anapor','cargoana','a.numptocuecon');
            elseif($tabla=='linotific')
                $campo = array('anapor','cargoana','a.numnotif');
            elseif($tabla=='licontrat')
                $campo = array('anapor','anaporcar','a.numcont');
            elseif($tabla=='liordcom')
                $campo = array('anapor','anaporcar','a.numord');
          $sql="select a.*,b.numdec from $tabla a, liasigdec b where $campo[2]=b.numdoc and $campo[2]='$codigo' and tabla='$tabla' and b.status='A' ";
          if(H::BuscarDatos($sql, $rs))
          {
              $numdec = $rs[0]['numdec'];
              $lisicact=$rs[0]['lisicact_id'];
              $fecdecla=date('d/m/Y',strtotime($rs[0]['fecdecla']));
              $detdecmod=$rs[0]['detdecmod'];
              $anapor = $rs[0]["$campo[0]"];
              $anaporcar= $rs[0]["$campo[1]"];
          }else
          {
              $numdec='########';
              $lisicact='';
              $fecdecla='';
              $detdecmod='';
              $anapor='';
              $anaporcar='';
          }          
          $js="$$('h2')[3].show();
             $('sf_fieldset_declaratoria_del_documento').show();";
          $output = '[["javascript","'.$js.'",""],["liasigdec_lisicact_id","'.$lisicact.'",""],["liasigdec_fecdecla","'.$fecdecla.'",""],
                      ["liasigdec_detdecmod","'.$detdecmod.'",""],["liasigdec_anapor","'.$anapor.'",""],["liasigdec_anaporcar","'.$anaporcar.'",""],
                      ["liasigdec_numdec","'.$numdec.'",""]]';
        break;  
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    if($sw)
        return sfView::HEADER_ONLY;

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
      $tablas = array_merge(array(''=>'Seleccione...'),Constantes::ListaDocTablas());
      $this->params=array('tablas'=>$tablas);
      $this->configGrid();

      $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {    
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);    
    $coderr = Licitacion::SalvarDeclar($clasemodelo,$grid);  
    if($coderr=='-1')
        return $this->redirect('licasigdec/edit');
    else
        return $coderr;
    
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

}
