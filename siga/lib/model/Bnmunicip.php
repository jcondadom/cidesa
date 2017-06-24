<?php

/**
 * Subclase para representar una fila de la tabla 'bnmunicip'.
 *
 * Tabla que almacena los Municipios
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Bnmunicip extends BaseBnmunicip
{
   public function __toString()
  {
    return array($this->codmun => $this->nommun);
  }

	public function getNomest()
    {
       return H::getX('CODEST','Bnestado','Nomest',self::getBnestadoCodest());
    }
}
