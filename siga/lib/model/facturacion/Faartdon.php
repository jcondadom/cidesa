<?php

/**
 * Subclase para representar una fila de la tabla 'faartdon'.
 *
 * Detalle de la donación
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Faartdon extends BaseFaartdon
{
  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }
}
