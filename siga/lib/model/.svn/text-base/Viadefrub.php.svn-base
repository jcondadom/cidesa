<?php

/**
 * Subclase para representar una fila de la tabla 'viadefrub'.
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
class Viadefrub extends BaseViadefrub
{
    protected $horsal2="";
    protected $horlle2="";
    
    public function getNompar()
    {
        return H::GetX('Codpar','Nppartidas','Nompar',$this->codpar);
    }
    public function getLtipo()
    {
        return $this->tipo=='C' ? 'Calculable por Tabla' : ($this->tipo=='F' ? 'Monto Manual' : 'Porcentaje en el Tipo de Cálculo');
    }

    public function getLtiprub()
    {
        return $this->tiprub=='1' ? 'Alimentación y Hospedaje' : ($this->tiprub=='2' ? 'Transporte' : 'Otros') ;
    }

    public function getRubint()
    {
        return self::getCodrub();
    }
}
