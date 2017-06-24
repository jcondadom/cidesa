<?php

/**
 * tesdeftipmon actions.
 *
 * @package    Roraima
 * @subpackage tesdeftipmon
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 45357 2011-07-29 22:21:54Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesdeftipmonActions extends autotesdeftipmonActions
{
    
   /**
   * Función para incluir funcionalidades adicionales en el executeEdit.
   * Esta funcion debe ser reescrita en la clase que hereda.
   *
   */
  protected function editing()
  {
      $this->configGrid();
  }    

 
  public function validateEdit()
    {
    $this->tsdefmon = $this->getTsdefmonOrCreate();
    $this->updateTsdefmonFromRequest();

    if ($this->getRequest()->getMethod() == sfRequest::POST){
    }
    return true;
  }
      

  // Funcion para validar los datos de la vista luego de detectado un error
  // se usa por ejemplo para recargar la informacion y configuración de un grid
  protected function updateError()
  {
      $this->configGrid();  
      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

      }
  
  public function configGrid()
      {
    $c = new Criteria();
    $c->add(TsdesmonPeer::CODMON,  $this->tsdefmon->getCodmon());
    $detalle = TsdesmonPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesdeftipmon/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_valores');

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->tsdefmon->setObj($this->obj);
      }
  
 
  /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de guardado adecuado para cada formulario.
   *
   */
  protected function saving($tsdefmon)
      {
    $tsdefmon->save();
    $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
    $j=0;
    $x=$grid[0];
    while ($j<count($x))
    {
        if ($x[$j]->getFecmon()!='' && $x[$j]->getValmon()!=0)
        {
            $x[$j]->setCodmon($tsdefmon->getCodmon());
            $x[$j]->setNommon($tsdefmon->getNommon());
            $x[$j]->save();
    }
        $j++;
  }
  
    return -1;

  }

  /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de eliminación adecuado para cada formulario.
   *
   */
  protected function deleting($tsdefmon)
  {
     if ($tsdefmon->getTiedatrel()!='S') {
       H::EliminarRegistro('Tsdesmon', 'CODMON', $tsdefmon->getCodmon());
  	$tsdefmon->delete();
     }else
     {
         return 6;
  }
    return -1;

      }
    }
