<?php

/**
 * Subclase para representar una fila de la tabla 'liregfiacont'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Liregfiacont extends BaseLiregfiacont
{
  public function getDescomres() {

    if(!$this->aLiccomres) $this->getLiccomres();

    if($this->aLiccomres) return $this->aLiccomres->getDescomres();
    else return '';

  }

  public function getEstado(){
    if($this->fecven > strtotime(date('Y-m-d'))) return 'Vencido';
    else return 'Vigente';
  }
}
