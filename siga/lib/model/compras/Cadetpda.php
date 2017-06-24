<?php

/**
 * Subclase para representar una fila de la tabla 'cadetpda'.
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
class Cadetpda extends BaseCadetpda
{
    protected $distri="";
    
    public function afterHydrate() {
         $c= new Criteria();
	 $c->add(CaalmpdaPeer::REFPDA,self::getRefpda());
	 $c->add(CaalmpdaPeer::CODART,self::getCodart());
	 $c->add(CaalmpdaPeer::ID_REG,self::getId());
	 $result=CaalmpdaPeer::doSelect($c);
	 if ($result)
	 {
            foreach ($result as $datos)
            {
               $cant=number_format($datos->getCandis(),2,',','.');
               $this->distri=$this->distri . $datos->getCodalm().'_' . $datos->getNomalm().'_' . $datos->getCodubi() .'_'. $datos->getNomubi().'_' . $cant .'_'. '!';
            }
	 }
    }


    public function getNompro()
    {
        return H::getX_vacio('CODPRO','Caprovee','Nompro',self::getCodpro());
    }
    
    public function getDestrans()
    {
        return H::getX_vacio('CODTRANS','Catiptrans','Destrans',self::getTiptra());
    }  
    
    public function getUnimed()
    {
        return H::getX_vacio('CODART','Caregart','Unimed',self::getCodart());
    }
    
    public function getNomedo()
    {
        return H::getX_vacio('CODEDO','Ocestado','Nomedo',self::getCodedo());
    }
    
    public function getIdreg()
    {
        return self::getId();
    }
}
