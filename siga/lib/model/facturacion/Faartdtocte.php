<?php

/**
 * Subclase para representar una fila de la tabla 'faartdtocte'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Faartdtocte extends BaseFaartdtocte
{
    protected $obj=array();
    
  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }
  
  public function getDesdesc()
  {
   return Herramientas::getX('CODDESC','Fadescto','Desdesc',self::getCoddesc());
  }
}
