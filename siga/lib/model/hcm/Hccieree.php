<?php

/**
 * Subclase para representar una fila de la tabla 'hccieree'.
 *
 * Contiene los Registros de los cierre del reembolso
 *
 * @package    Roraima
 * @subpackage lib.model.hcm
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Hccieree extends BaseHccieree
{
    protected $fecdes = "";
    protected $fechas = "";
    protected $codcar="";
    protected $tipliq="";
    protected $destipliq="";
    protected $check=false;
    protected $fecliq="";

    public function getFecdes() {
       return $this->fecdes;
    }

    public function getFechas() {
       return $this->fechas;
    }
    
    public function getCheck() {
        return $this->check;
    }
    
    public function getCorrelativo() {
        return H::getNextvalSecuencia('hccodcie_seq');
    }
}
