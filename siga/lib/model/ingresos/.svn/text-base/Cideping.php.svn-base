<?php

/**
 * Subclase para representar una fila de la tabla 'cideping'.
 *
 * se graba los depositos realizados a un Ingreso
 *
 * @package    Roraima
 * @subpackage lib.model.ingresos
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Cideping extends BaseCideping
{
   public function getDestip()
  {
  	return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getTipmov());
  }

  public function getNomcue()
  {
  	return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getNumcue());
  }
}
