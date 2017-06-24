<?php

/**
 * Subclase para representar una fila de la tabla 'opdetbenop'.
 *
 * Tabla que contiene información referente al detalle del Beneficiarios de una OP
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Opdetbenop extends BaseOpdetbenop
{
	protected $obj=array();
	protected $montot='0,00';

  public function getNomben()
  {
  return Herramientas::getX('CEDRIF','Opbenefi','Nomben',self::getCedrif());
  }

}
