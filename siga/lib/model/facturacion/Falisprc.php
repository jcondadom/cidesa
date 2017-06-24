<?php

/**
 * Subclase para representar una fila de la tabla 'falisprc'.
 *
 * Lista de Precios
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Falisprc extends BaseFalisprc
{
    protected $grid=array();

  public function getDesart()
  {
    $caregart = $this->getCaregart();
    if($caregart) return $caregart->getDesart();
    else return '';
  }

  #public function getDesArt()
  #{

   # return Herramientas::getX_vacio('CODART','caregart','desart',self::getCodart());
  #}


}
