<?php

/**
 * facdecvehlot actions.
 *
 * @package    siga
 * @subpackage facdecvehlot
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facdecvehlotActions extends autofacdecvehlotActions
{

  public function executeIndex()
  {
    return $this->forward('facdecvehlot', 'edit');
  }
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  $this->setVars();
  $this->configGrid();

  }
  public function setVars() {

        $this->fcdeclar->setFundec($this->getUser()->getAttribute('loguse'));
}
    public function configGrid($usodesde='',$usohasta='',&$sw='')
      {
        $datos=array();
        if($usodesde!='' && $usohasta!=''){
        $c = new Criteria();
        $c->add(FcregvehPeer::ESTVEH,'D',Criteria::NOT_EQUAL);
        $c->add(FcregvehPeer::ESTDEC,'D',Criteria::NOT_EQUAL);
        $sql="anovig in (Select max(anovig) from fcusoveh)";
        $c->add(FcusovehPeer::ANOVIG,$sql,Criteria::CUSTOM);
        $sql2="Coduso >= '".$usodesde."' and Coduso <= '".$usohasta."'";
        $c->add(FcusovehPeer::CODUSO,$sql,Criteria::CUSTOM);
        $c->addJoin(FcregvehPeer::RIFCON,  FcconrepPeer::RIFCON);
        $c->addJoin(FcusovehPeer::CODUSO, FcregvehPeer::CODUSO);
        $c->add(FcconrepPeer::REPCON,'C');
        $c->addAscendingOrderByColumn(FcregvehPeer::RIFCON);
        //$c->setLimit(10);
        $per = FcregvehPeer::doSelect($c);
        }else $per = array();
        if(count($per)>0) $sw=true; else $sw = false;
        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facdecvehlot/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
        $this->columnas[1][0]->setHTML('onClick="calcularTotales();"');
        $this->grid = $this->columnas[0]->getConfig($per);
        $this->fcdeclar->setGrid($this->grid);

      
      }

  public function executeAjax()
  {

    $usohasta = $this->getRequestParameter('usohasta','');
    $usodesde= $this->getRequestParameter('usodesde','');
    $codigo= $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $this->ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');

    $javascript='';$sw=false;

    switch ($ajax){
      case '1':
        $this->params=array();
        $this->fcdeclar = $this->getFcdeclarOrCreate();
        $this->labels = $this->getLabels();

        if(Hacienda::verificarUso($usohasta) && Hacienda::verificarUso($usodesde)){
           $this->ConfigGrid($usodesde,$usohasta,$sw);
           if($sw){
            $javascript= $javascript."alert('Se han cargado los Vehiculos que cumplen con los criterios de selección')";
           }else{
               $javascript= $javascript."alert('No hay registros que cumplen con los criterios de selección')";

               }
        }else{
          $this->ConfigGrid();
        }
        $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
        break;
      case '2':
        $output = '[["'.$cajtexmos.'","'.H::getX('coduso', 'Fcusoveh', 'desuso', $codigo).'",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serÃ¡n usados en las funciones de validaciÃ³n.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los mÃ©todos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al cÃ³digo que retorna
      // Todas las funciones de validaciÃ³n y procesos del negocio
      // deben retornar cÃ³digos >= -1. Estos cÃ³digo serÃ¡m buscados en
      // el archivo errors.yml en la funciÃ³n handleErrorEdit()

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGrid($this,$this->grid);

  }
 public function saving($clase)
  {

  $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
  return Hacienda::GenerarDeudaVeh($clase,$grid);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
