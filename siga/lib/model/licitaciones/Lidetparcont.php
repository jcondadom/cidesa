<?php

/**
 * Subclase para representar una fila de la tabla 'lidetparcont'.
 *
 * Detalle de partidas por contrato
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Lidetparcont extends BaseLidetparcont
{

  public function getDesart(){
    return H::getX('codpar', 'ocdefpar', 'despar', $this->codart);
  }

}
