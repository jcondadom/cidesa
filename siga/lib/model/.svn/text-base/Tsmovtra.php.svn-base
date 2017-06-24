<?php

/**
 * Subclass for representing a row from the 'tsmovtra'.
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
class Tsmovtra extends BaseTsmovtra
{
	protected $ctaconori='';
	protected $ctacondes='';
	protected $reftraanu='';
	protected $destraanu='';
	protected $numcomanu='';
        //protected $tipmovdesd="";
        //protected $tipmovhast="";
        protected $mancomban="";
        protected $codcom="";

      /*  public function afterHydrate()
      {
            $c = new Criteria();
            $c->add(TsmovlibPeer::NUMCUE,self::getCtades());
            $c->add(TsmovlibPeer::REFLIB,self::getReftra());
            $registro = TsmovlibPeer::doSelectOne($c);
            if($registro) 
            {   
              $this->tipmovdesd= $registro->getTipmov();
            }
            
            $c = new Criteria();
            $c->add(TsmovlibPeer::NUMCUE,self::getCtaori());
            $c->add(TsmovlibPeer::REFLIB,self::getReftra());
            $registro = TsmovlibPeer::doSelectOne($c);
            if($registro) 
            {
                $this->tipmovhast=$registro->getTipmov();
            }
      }*/        
        
	public function getNombancodesde()
	{
		return Herramientas::getX('numcue','tsdefban','nomcue',self::getCtaori());
	}

	public function getNombancohasta()
	{
		return Herramientas::getX('numcue','tsdefban','nomcue',self::getCtades());
	}

	/*public function getTipmovdesd()
	{
		$c = new Criteria();
		$c->add(TsmovlibPeer::NUMCUE,self::getCtades());
		$c->add(TsmovlibPeer::REFLIB,self::getReftra());
		$registro = TsmovlibPeer::doSelectOne($c);
		if($registro) return $registro->getTipmov();
		else return null;
	}

	public function getTipmovhast()
	{
		$c = new Criteria();
		$c->add(TsmovlibPeer::NUMCUE,self::getCtaori());
		$c->add(TsmovlibPeer::REFLIB,self::getReftra());
		$registro = TsmovlibPeer::doSelectOne($c);
		if($registro) return $registro->getTipmov();
		else return null;
	}*/

	public function getDestipmovdeb()
	{
		return Herramientas::getX('codtip','Tstipmov','DesTip',$this->tipmovdesd);
	}

	public function getDestipmovcre()
	{
		return Herramientas::getX('codtip','Tstipmov','DesTip',$this->tipmovhast);
	}

	public function getDesnumcom()
	{
		return self::getDestra();
	}

	public function getFectracon()
	{
		return self::getFectra();
	}

	public function getNommovim()
	{
		return Herramientas::getX('CodTip','TsTipMov','destip',self::getTipmov());
	}

	public function getIdrefer()
	{
		return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
	}
        
      public function getMancomban()
      {
            return H::getConfApp2('mancomban', 'tesoreria', 'tesmovtraban');
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
            $this->modifiedColumns[] = TsmovtraPeer::VALMON;
          }  
    } 

    public function getReftramay8()
    {
            return H::getConfApp2('reftramay8', 'tesoreria', 'tesmovtraban');
    }    
    
}
