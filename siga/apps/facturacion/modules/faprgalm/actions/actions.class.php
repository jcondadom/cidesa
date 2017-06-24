<?php

/**
 * faprgalm actions.
 *
 * @package    siga
 * @subpackage faprgalm
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class faprgalmActions extends autofaprgalmActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid($this->fadefprg->getCodprg());

  }

  public function configGrid($codprg='')
  {
     $almacenes=array();
      $sql="select '1' as check,a.codalm as codalm, b.nomalm as nomalm from faprgalm a left outer join cadefalm b on a.codalm=b.codalm
            where a.codprg='".$codprg."'
            union 
            select '0' as check,codalm as codalm, nomalm as nomalm from cadefalm where codalm not in (select codalm from faprgalm where codprg='".$codprg."')
            order by 2";
     Herramientas::BuscarDatos($sql,&$result);
     if (count($result)>0)
     {
         $i=0;
         while ($i<count($result))
         {
             $faprgalm= new Faprgalm();
             $faprgalm->setCheck($result[$i]["check"]);
             $faprgalm->setCodalm($result[$i]["codalm"]);
             $almacenes[]=$faprgalm;             
             $i++;
         }
     }
      

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/faprgalm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_almacenes');

    $this->obj =$this->columnas[0]->getConfig($almacenes);

    $this->fadefprg->setGrid($this->obj);
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

   switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
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
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      
    Facturacion::SalvarAlmacenesaProgramas($clasemodelo, $grid);
    return -1;
  }

  /**
   * FunciÃ³n para procesar _todas_ las funciones Ajax del formulario
   * Cada funciÃ³n esta identificada con el valor de la vista "ajax"
   * el cual traerÃ¡ el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";

    switch ($col) {
         case ('1'):   //Código Almacén
            if ($grid[$fila][$col-1]!="")
            {
             if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
             {
                $c= new Criteria();
                $c->add(CadefalmPeer::CODALM,$grid[$fila][$col-1]);
                $reg= CadefalmPeer::doSelectOne($c);
                if ($reg)
                {
                    $grid[$fila][$col]=$reg->getNomalm();
                }else {
                    $idfila=$name.'x_'.$fila.'_1';
                    $javascript = "alert_('El Almac&eacute;n no existe'); $('$idfila').focus();";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";
                } 
             }else {
                 $idfila=$name.'x_'.$fila.'_1';
                 $grid[$fila][$col-1]="";
                 $grid[$fila][$col]="";                 
                 $javascript = "alert_('El Almacen esta repetido'); $('$idfila').focus();";
      
             }
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
            break;       
          default:
            break;
        }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }  

}
