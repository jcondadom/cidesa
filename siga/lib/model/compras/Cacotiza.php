<?php

/**
 * Subclass for representing a row from the 'cacotiza'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Cacotiza extends BaseCacotiza
{
	private $rifpro = '';
	protected $justifica="";
	protected $priori2="";
        protected $modifico="";
        protected $canite=0;
        protected $observaciones="";


        public function getNompro()
	{
	  return Herramientas::getX('codpro','caprovee','nompro',self::getCodpro());
	}
	
	

	public function getDesconpag()
	{
	  return Herramientas::getX('codconpag','caconpag','desconpag',self::getConpag());
	}
	
	public function getDesforent()
	{
	  return Herramientas::getX('codforent','caforent','desforent',self::getForent());
	}

	public function getDesreq()
	{
	  return Herramientas::getX('reqart','casolart','desreq',self::getRefsol());
	}
	
	public function getRifpro()
	{
	  return Herramientas::getX('codpro','caprovee','rifpro',self::getCodpro());	 
	}
	
   public function setRifpro($val)
    {
	   $this->rifpro= $val;		
	}
	
	public function getRifpronew()
    {  		
		return $this->rifpro;
    }

    public function getHabmon()
    {
        return H::getConfApp2('habmon', 'compras', 'almcotiza');
}

    public function getModifico()
    {
      $sql="SELECT coalesce(SUM(CANORD),0) as CANORD FROM CAARTSOL WHERE REQART='".self::getRefsol()."'";
      if (Herramientas::BuscarDatos($sql,$result))
      {
      	if ($result[0]['canord']==0)
      	{
           return "S";

        }else
        {
         return "N";
        }
      }else {
          return "S";
      }
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
            $this->modifiedColumns[] = CacotizaPeer::VALMON;
          }  
    } 

  public function getMonrec($val=false)
  {

    if($val) return number_format($this->monrec,4,',','.');
    else return $this->monrec;

  }

    public function setMonrec($v)
  {

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v,4);
        $this->modifiedColumns[] = CacotizaPeer::MONREC;
      }
  
  } 

}
