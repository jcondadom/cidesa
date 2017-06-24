<?php

/**
 * Subclase para representar una fila de la tabla 'fadefcarord'.
 *
 * null
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fadefcarord extends BaseFadefcarord
{

  public function getDesprg()
  {
    $fadefprg = $this->getFadefprg();
    if($fadefprg) return $fadefprg->getDesprg();
    else return '';
  }

  public function getDesconpag()
  {
    $faconpag = $this->getFaconpagRelatedByConpagpreId();
    if($faconpag) return $faconpag->getDesconpag();
    else return '';
  }


}
