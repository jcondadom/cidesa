<?php

/**
 * Subclass for representing a row from the 'tsmovban'.
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
class Tsmovban extends BaseTsmovban
{
	protected $check='';
  protected $tipmovdesd="";
  protected $tipmovhast="";
  protected $grid= array();
  
	public function getNombanco()
	{
		return Herramientas::getX('NumCue','tsdefban','nomcue',self::getNumcue());
	}

	public function getNommovim()
	{
		return Herramientas::getX('CodTip','TsTipMov','destip',self::getTipmov());
	}


	public function getCuentas()
	{
         $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
         $filbandir = H::getConfApp2('filbandir', 'tesoreria', 'tesdefcueban');

		$c = new Criteria();
         if ($filbandir=='S'){
          $this->sql='tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $c->add(TsdefbanPeer::CODDIREC,$this->sql,Criteria::CUSTOM);
        }
        $c->addAscendingOrderByColumn(TsdefbanPeer::NUMCUE);
		$obj = TsdefbanPeer::doSelect($c);
		$objban=array();

		foreach ($obj as $o)
		{
			$objban[$o->getNumcue()]=$o->getNumcue();

		}

		return $objban;

	}

    public function getRefbanmay8()
    {
            return H::getConfApp2('refbanmay8', 'tesoreria', 'tesmovsegban');
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
            $this->modifiedColumns[] = TsmovbanPeer::VALMON;
          }  
    }     


public function getMonmov($val=false)
  {
    if (self::getId())
    {
        $moneda=self::getCodmon();
        $valor=self::getValmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            if($valor >0){
            $calculo=$this->monmov/$valor;
            }else{
                $calculo=0;
            }
        }else $calculo=$this->monmov;
    }else $calculo=$this->monmov;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

    public function setMonmov($v)
    {
        if ($this->monmov !== $v) {
            $this->monmov = Herramientas::toFloat($v);
            $this->modifiedColumns[] = TsmovbanPeer::MONMOV;
          }
    }

      public function getDesdirec()
  {
      return H::getX_vacio('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
  }
}
