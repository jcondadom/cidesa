<?php

/**
 * Subclase para representar una fila de la tabla 'hcexacon'.
 *
 * Contiene los Registros de los examenes y consultas
 *
 * @package    Roraima
 * @subpackage lib.model.hcm
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Hcexacon extends BaseHcexacon
{
    protected $misben=false;
    protected $obj=array();

    public function getCorrelativo() {
        return H::getNextvalSecuencia('hcrefexacon_seq');
    }

    public function getCedemp() {
         return Herramientas::getX('CODEMP','Nphojint','Cedemp',self::getCodemp());
    }

    public function getNomemp() {
        return Herramientas::getX('CODEMP', 'Npasicaremp', 'Nomemp', self::getCodemp());
    }

    public function getNomnom() {
        return Herramientas::getX('CODEMP', 'Npasicaremp', 'Nomnom', self::getCodemp());
    }

    public function getCodttrab() {
        return Herramientas::getX('CODEMP', 'Nphojint', 'Codtipemp', self::getCodemp());
    }

    public function getNomfam() {
        if (self::getCedemp() == self::getCedfam())
            return Herramientas::getX('CODEMP', 'Npasicaremp', 'Nomemp', self::getCodemp());
        else
            return Herramientas::getX('CEDFAM', 'Npinffam', 'Nomfam', self::getCedfam());
    }

    public function getParfam() {
        if ((self::getCedemp() == self::getCedfam()) and (self::getCedfam() != ""))
            return "TITULAR";
        else
            return Herramientas::getX('TIPPAR','NpTippar','DESPAR',Herramientas::getX('CEDFAM','Npinffam','Parfam',self::getCedfam()));
    }

    public function getNommedlab() {
        return Herramientas::getX('CODMEDLAB', 'Hcregmedlab', 'Nommedlab', self::getCodmedlab());
    }

    public function getNomcontra() {
        if(self::getId()==''){
            $c = new Criteria();
            $r = EmpresaPeer::doSelectOne($c);
            return $r->getNomemp();
        }else{
            return trim($this->nomcontra);
        }
            
    }

}
