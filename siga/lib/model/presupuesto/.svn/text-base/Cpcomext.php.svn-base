<?php

/**
 * Subclase para representar una fila de la tabla 'cpcomext'.
 *
 * Tabla que contiene información referente a las operaciones que comprometen la disponibilidad de las partidas presupuestarias.
 *
 * @package    Roraima
 * @subpackage lib.model.presupuesto
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Cpcomext extends BaseCpcomext
{
    protected $obj=array();
    
    public function getNomext()
    {
        return Herramientas::getX_vacio('TIPCOM','Cpdoccom','Nomext',self::getTipcom());
    }
    
    public function getNomben()
    {
        return Herramientas::getX_vacio('CEDRIF','Opbenefi','Nomben',self::getCedrif());
    }

    public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,6,',','.');
    else return $this->valmon;

  }
  
    public function setValmon($v)
    {

        if ($this->valmon !== $v) {
            $this->valmon = Herramientas::toFloat($v,6);
            $this->modifiedColumns[] = CpcomextPeer::VALMON;
          }  
    } 
}
