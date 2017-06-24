<?php

/**
 * Subclase para representar una fila de la tabla 'viadefgen'.
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
class Viadefgen extends BaseViadefgen
{
    public function getNompar()
    {
        return H::getX_vacio('Codpar','Nppartidas','Nompar',$this->codpar);
    }

    public function getSecsolvia()
    {
      return H::getNextvalSecuencia('viadefgen_seq_numsolvia');
    }

    public function getSeccalvianac()
    {
      return H::getNextvalSecuencia('viadefgen_seq_numcalvianac');
    }

    public function getSeccalviaint()
    {
      return H::getNextvalSecuencia('viadefgen_seq_numcalviaint');
    }

    public function getDesrub()
    {
        return H::getX_vacio('Codrub','Viadefrub','Desrub',$this->rubint);
    }

    public function getDespri()
    {
        return H::getX_vacio('Codpri','Viadefpri','Despri',$this->codprisup);
    }

    public function getDespriadi()
    {
        return H::getX_vacio('Codpri','Viadefpri','Despri',$this->codpriadi);
    }

    public function getDesprigas()
    {
        return H::getX_vacio('Codpri','Viadefpri','Despri',$this->codprigas);
    }

        public function getNomext()
    {
        return H::getX('Tipcom','Cpdoccom','Nomext',$this->tipcom);
    }
}
