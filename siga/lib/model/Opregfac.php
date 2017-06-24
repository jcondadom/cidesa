<?php

/**
 * Subclase para representar una fila de la tabla 'opregfac'.
 *
 * Tabla que contiene información referente a la factura sin expediente
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Opregfac extends BaseOpregfac
{
	public function getNomben()
  {
    return Herramientas::getX_vacio('CEDRIF','Opbenefi','Nomben',self::getCedrif());
  }

  public function getLongitud(){
  	return strlen(H::ObtenerFormato('Opdefemp','Forubi'));
  }

  public function getDesubi()
  {
    return Herramientas::getX_vacio('CODUBI','Bnubica','Desubi',self::getCodubi());
  }
}
