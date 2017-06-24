<?php

/**
 * Subclase para representar una fila de la tabla 'manordtra'.
 *
 * Contiene los Registros de las Ordenes de Trabajo
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Manordtra extends BaseManordtra
{
    protected $obj=array();
    protected $obj1=array();
    protected $obj2=array();
    protected $obj3=array();
    protected $obj4=array();
    protected $obj5=array();

	public function getNomequ()
	{
	  return H::getX_vacio('Numequ','Manregequ','Nomequ',$this->numequ);
	}

	public function getCentro()
    {        
        $codcencos = H::getX_vacio('Numequ','Manregequ','Codcencos',$this->numequ);
        if ($codcencos!=''){
           return $codcencos.' - '.H::getX_vacio('codcencos','Codefcencos','Descencos',$codcencos);
        }else return '';

    }

    public function getEstatus()
    {        
        $codest = H::getX_vacio('Numequ','Manregequ','Codest',$this->numequ);
        if ($codest!=''){
           return $codest.' - '.H::getX_vacio('codest','Manestequ','Desest',$codest);
        }else return '';

    }

    public function getTipequ()
    {        
        $codteq = H::getX_vacio('Numequ','Manregequ','Codteq',$this->numequ);
        if ($codteq!=''){
           return $codteq.' - '.H::getX_vacio('codteq','Mantipequ','Desteq',$codteq);
        }else return '';

    }

    public function getDessfa()
    {
      return H::getX_vacio('codsfa','Mansinfal','Dessfa',self::getCodsfa());
    }

    public function getDesdfa()
    {
      return H::getX_vacio('coddfa','Mandeffal','Desdfa',self::getCoddfa());
    }

    public function getDessis()
    {
      return H::getX_vacio('codsis','Mansisope','Dessis',self::getCodsis());
    }

    public function getDescfa()
    {
      return H::getX_vacio('codcfa','Mancaufal','Descfa',self::getCodcfa());
    }

    public function getDestma()
    {
      return H::getX_vacio('codtma','Mantipman','Destma',self::getCodtma());
    }

    public function getDesgrr()
    {
      return H::getX_vacio('codgrr','Mangrutre','Desgrr',self::getCodgrr());
    }

    public function getNomemp()
    {
      return H::getX_vacio('cedemp','Nphojint','Nomemp',self::getCedemp());
    }

    public function getNomempp()
    {
      return H::getX_vacio('cedemp','Nphojint','Nomemp',self::getCedres());
    }

    public function getDesact()
    {
      return H::getX_vacio('codact','Manactest','Desact',self::getCodact());
    }

    public function getDesart()
    {
      return H::getX_vacio('codart','Mannumart','Desart',self::getCodart());
    }

    public function getDessor()
    {
      return H::getX_vacio('codsor','Manestord','Dessor',self::getCodsor());
    }

    public function getNomempc()
    {
      return H::getX_vacio('cedemp','Nphojint','Nomemp',self::getCedrec());
    }

    public function getDescfc()
    {
      return H::getX_vacio('codcfa','Mancaufal','Descfa',self::getCodcfc());
    }

    
}
