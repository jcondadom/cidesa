<?php

/**
 * nomasogruadi actions.
 *
 * @package    siga
 * @subpackage nomasogruadi
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomasogruadiActions extends autonomasogruadiActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid($this->rhgruadi->getCodgru());
  }

  public function configGrid($codgru='')
  {
     $c = new Criteria();
     $c->add(RhgruadiempPeer::CODGRU, $codgru);
     $reg = RhgruadiempPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomasogruadi/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_personal');

     $this->obj = $this->columnas[0]->getConfig($reg);

     $this->rhgruadi->setObj($this->obj);

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
    if($this->getRequest()->getMethod() == sfRequest::POST){
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
    //Salvar Personal
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCodemp() != ''){
        $x[$j]->setCodgru($clasemodelo->getCodgru());
        $x[$j]->save();
      }
      $j++;
    }

    $z = $grid[1];
    $h = 0;
    if (!empty($z[$h]))
    {
      while ($h < count($z))
      {
        $z[$h]->delete();
        $h++;
      }
    }
    return -1;
  }

    public function executeAjaxgrid() {
    $name = $this->getRequestParameter('grid', 'a');
    $grid = $this->getRequestParameter('grid' . $name, '');
    $fila = $this->getRequestParameter('fila', '');
    $col = $this->getRequestParameter('columna', '');
    $codgru= $this->getRequestParameter('rhgruadi_codgru','');
    $javascript = "";
    $jsonextra = "";
    switch ($name) {
        case ('a'):
            switch ($col) {
                case ('1'):   //Codigo Empleado
                  if ($grid[$fila][$col - 1] != "") {
                      if (!Hacienda::Repetido($grid, $grid[$fila][$col - 1], $fila, $col - 1)) {
                        $c = new Criteria();
                        $c->add(NpasicarempPeer::CODEMP,$grid[$fila][$col - 1]);
                        $c->add(NpasicarempPeer::STATUS,'V');
                        $per = NpasicarempPeer::doSelectOne($c);
                        if (!$per) {
                            $javascript = "alert_('El Empleado no se encuentra Vigente o no esta Registrado'');";
                            $grid[$fila][$col - 1] = "";
                            $grid[$fila][$col] = "";
                        }else {
                          $e= new Criteria();
                          $e->add(RhgruadiempPeer::CODGRU,$codgru,Criteria::NOT_EQUAL);
                          $e->add(RhgruadiempPeer::CODEMP,$grid[$fila][$col - 1]);
                          $regs=RhgruadiempPeer::doSelectOne($e);
                          if (!$regs)
                            $grid[$fila][$col] = $per->getNomemp();
                          else{
                            $javascript = "alert_('El Empleado ya esta asociado a otro Grupo');";
                            $grid[$fila][$col - 1] = "";
                            $grid[$fila][$col] = "";
                          }
                        }                            
                      } else {
                          $javascript = "alert_('El C&oacute;digo del Empleado esta Repetido');";
                          $grid[$fila][$col - 1] = "";
                          $grid[$fila][$col] = "";
                      }
                  }                
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              default:
                break;
            }
            break;
        default:
            break;
    }

    $output = Herramientas::grid_to_json($grid, $name, $jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

    return sfView::HEADER_ONLY;
 }


}
