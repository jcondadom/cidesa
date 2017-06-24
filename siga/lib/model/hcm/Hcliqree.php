<?php

/**
 * Subclase para representar una fila de la tabla 'hcliqree'.
 *
 * Contiene los Registros de la liquidación del reembolso
 *
 * @package    Roraima
 * @subpackage lib.model.hcm
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Hcliqree extends BaseHcliqree
{
    protected $check=false;
    protected $check2=false;
    protected $misben=false;
    protected $obj=array();

    public function getCheck() {
        return $this->check;
    }
    
    public function getCheck2() {
        return $this->check2;
    }
    
    public function getCorrelativo() {
        return H::getNextvalSecuencia('hccodliq_seq');
    }

    public function getCedemp(){
        return Herramientas::getX_vacio('CODEMP','Nphojint','Cedemp',self::getCodemp());
    }

    public function getNomemp() {
        return Herramientas::getX_vacio('CODEMP', 'Npasicaremp', 'Nomemp', self::getCodemp());
    }

    public function getNomnom() {
        return Herramientas::getX_vacio('CODEMP', 'Npasicaremp', 'Nomnom', self::getCodemp());
    }

    public function getCodttrab() {
        return Herramientas::getX_vacio('CODEMP', 'Nphojint', 'Codtipemp', self::getCodemp());
    }

    public function getNomfam() {
        if (self::getCedemp() == self::getCedfam())
            return Herramientas::getX_vacio('CODEMP', 'Npasicaremp', 'Nomemp', self::getCodemp());
        else
            return Herramientas::getX_vacio('CEDFAM', 'Npinffam', 'Nomfam', self::getCedfam());
    }

    public function getParfam() {
        if ((self::getCedemp() == self::getCedfam()) and (self::getCedfam() != ""))
            return "TITULAR";
        else
            return Herramientas::getX_vacio('TIPPAR','NpTippar','DESPAR',Herramientas::getX('CEDFAM','Npinffam','Parfam',self::getCedfam()));
    }

    public function afterHydrate(){
        if (self::getId()) {
            $modulo = sfContext::getInstance()->getModuleName();
            switch($modulo){
                case 'hcaprconpre':
                    if (self::getStacpr()=='S')
                        $this->check=true;
                    if (self::getStacpr()=='N')
                        $this->check2=true;
                break;
                case 'hcaprliq':
                    if (self::getStatus()=='S')
                        $this->check=true;
                    if (self::getStatus()=='N')
                        $this->check2=true;
                break;
                default:
            }     
        }
    }

    public function getNomuse()
    {     
      return Herramientas::getX_vacio('loguse','Usuarios','Nomuse',self::getLoguse());
    }
}
