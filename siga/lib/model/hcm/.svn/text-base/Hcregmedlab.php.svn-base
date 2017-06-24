<?php

/**
 * Subclase para representar una fila de la tabla 'hcregmedlab'.
 *
 * Contiene los Registros de los Medicos y/o Laboratorios
 *
 * @package    Roraima
 * @subpackage lib.model.hcm
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Hcregmedlab extends BaseHcregmedlab
{
    public function getCorrelativo()
    {
      return H::getNextvalSecuencia('hccodmedlab_seq');
    }
}
