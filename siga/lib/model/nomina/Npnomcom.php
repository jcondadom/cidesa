<?php

/**
 * Subclase para representar una fila de la tabla 'npnomcom'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npnomcom extends BaseNpnomcom
{
  public function getNomnom()
  {
  	return Herramientas::getX('codnom','npnomina','nomnom',self::getCodnom());
  }

    public function getDesnomesp()
  {
  	return Herramientas::getX('codnomesp','npnomesptipos','desnomesp',self::getCodnomesp());
  }

}
