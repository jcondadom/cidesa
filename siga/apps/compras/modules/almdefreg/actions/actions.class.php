<?php

/**
 * almdefreg actions.
 *
 * @package    siga
 * @subpackage almdefreg
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almdefregActions extends autoalmdefregActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid($this->caregiones->getCodreg());
   
  }

  public function configGrid($codreg='')
  {
    $c = new Criteria();
    $c->add(CaregestPeer::CODREG, $codreg);
    $detalle = CaregestPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almdefreg/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_estados');

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->caregiones->setObj($this->obj);
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
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
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
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
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
    $clasemodelo->save();
    $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
    $j=0;
    $x=$grid[0];
    while ($j<count($x))
    {
        if ($x[$j]->getCodedo()!='')
        {
            $x[$j]->setCodreg($clasemodelo->getCodreg());            
            $x[$j]->save();
        }
        $j++;
    }
    
    $z = $grid[1];
    $l = 0;
    if (!empty($z[$l]))
    {
      while ($l < count($z))
      {
        $z[$l]->delete();
        $l++;
      }
    }
    
    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Caregest', 'CODREG', $clasemodelo->getCodreg());
    return parent::deleting($clasemodelo);
  }
  
    /**
   * FunciÃÂ³n para procesar _todas_ las funciones Ajax del formulario
   * Cada funciÃÂ³n esta identificada con el valor de la vista "ajax"
   * el cual traerÃÂ¡ el indice de lo que se quiere procesar.
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
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                 $w= new Criteria();
                 $w->add(OcestadoPeer::CODEDO,$grid[$fila][$col-1]);
                 $reg= OcestadoPeer::doSelectOne($w);
                 if ($reg)
                 {                    
                    $grid[$fila][1]=$reg->getNomedo();                       
                 }else {
                    $grid[$fila][$col-1]="";
                    $grid[$fila][1]="";
                    $javascript="alert_('El Estado no existe');";
                 }   
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                 $javascript="alert('El Estado esta Repetido');";
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
