<?php

/**
 * Subclase para representar una fila de la tabla 'caartnosada'.
 *
 * Tabla para guardar la Ubicaciones que no tienen Código SADA
 *
 * @package    Roraima
 * @subpackage lib.model.compras
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Caartnosada extends BaseCaartnosada
{
  public function getNomubi()
  {
     return H::getX('CODUBI','Cadefubi','Nomubi',self::getCodubi());
  }
}
