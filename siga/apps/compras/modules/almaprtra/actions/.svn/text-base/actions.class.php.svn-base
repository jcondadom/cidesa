<?php

/**
 * almaprtra actions.
 *
 * @package    siga
 * @subpackage almaprtra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almaprtraActions extends autoalmaprtraActions
{

 public function executeIndex()
  {
    return $this->forward('almaprtra', 'edit');
  }
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {     
       $this->configGrid();

  }

  public function configGrid($codalm='',$feccon='')
  {
      if($feccon==''){
           $fecha =date('d/m/Y');
      
      }else{
           $fecha=$feccon;
      }
    $c = new Criteria();
    $c->add(CatraalmPeer::FECTRA,$fecha,Criteria::LESS_EQUAL);
    if ($codalm != ''){
       $c->add(CatraalmPeer::ALMDES,$codalm);}
    $c->add(CatraalmPeer::STATRA,'D');
    $reg = CatraalmPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almaprtra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $this->grid = $this->columnas[0]->getConfig($reg);
    $this->catraalm->setGrid($this->grid);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el cÃ³digo necesario
    $ajax = $this->getRequestParameter('ajax','');
    $fecha= $this->getRequestParameter('fecha','');

    

    switch ($ajax){
      case '1':
           $this->params=array();
           $this->catraalm = $this->getCatraalmOrCreate();
           $this->updateCatraalmFromRequest();
           $this->labels = $this->getLabels();
           //Formato a la fecha
           $dateFormat = new sfDateFormat('es_VE');
           $fecdes = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

           $this->configGrid($codigo,$fecha);
        $output = '[["","",""],["","",""],["","",""]]';
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

    if($this->getRequest()->getMethod() == sfRequest::POST){
         $this->catraalm = $this->getCatraalmOrCreate();
         $this->updateCatraalmFromRequest();
         $this->configGrid();
         $grid     = Herramientas::CargarDatosGridv2($this,$this->grid);
          $x=$grid[0];
          $i=0;

          while ($i<count($x))
            {

              if(($x[$i]->getObstra()=='')){
                 $this->coderr=598;
                 return false;
              }
            $i++;
            }

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
     $grid     = Herramientas::CargarDatosGridv2($this,$this->grid);

  

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    return (Compras::salvardatosAprTras($clasemodelo, $grid));
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
