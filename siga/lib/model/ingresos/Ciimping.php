<?php

/**
 * Subclass for representing a row from the 'ciimping'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Ciimping.php 32416 2009-09-02 02:21:12Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Ciimping extends BaseCiimping
{

  public function getDestiprub()
  {
    return Herramientas::getX('codtiprub','citiprub','destiprub',self::getCodtiprub());
  }
  
public function getMoning($val=false)
  {

    if (self::getId())
    {
        $moneda=H::getX_vacio('REFING', 'Cireging', 'Codmon', self::getRefing());
        $valor=H::getX_vacio('REFING', 'Cireging', 'Valmon', self::getRefing());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->moning/$valor;
        }else $calculo=$this->moning;
        if (self::getDeving()=='S')
          $calculo=$calculo*-1; 
    }else $calculo=$this->moning;

    

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }
  
  public function getMonrec($val=false)
  {

    if (self::getId())
    {
        $moneda=H::getX_vacio('REFING', 'Cireging', 'Codmon', self::getRefing());
        $valor=H::getX_vacio('REFING', 'Cireging', 'Valmon', self::getRefing());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->monrec/$valor;
        }else $calculo=$this->monrec;
    }else $calculo=$this->monrec;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }
  
  public function getMondes($val=false)
  {

    if (self::getId())
    {
        $moneda=H::getX_vacio('REFING', 'Cireging', 'Codmon', self::getRefing());
        $valor=H::getX_vacio('REFING', 'Cireging', 'Valmon', self::getRefing());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->mondes/$valor;
        }else $calculo=$this->mondes;
    }else $calculo=$this->mondes;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }
  
  public function getMontot($val=false)
  {

    if (self::getId())
    {
        $moneda=H::getX_vacio('REFING', 'Cireging', 'Codmon', self::getRefing());
        $valor=H::getX_vacio('REFING', 'Cireging', 'Valmon', self::getRefing());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->montot/$valor;
        }else $calculo=$this->montot;
        if (self::getDeving()=='S')
          $calculo=$calculo*-1;
    }else $calculo=$this->montot;

     

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }
  
  public function setMoning($v)
	{

    if ($this->moning !== $v) {
        $this->moning = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CiimpingPeer::MONING;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CiimpingPeer::MONREC;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CiimpingPeer::MONDES;
      }
  
	} 
	
	public function setMontot($v)
	{

            if ($this->montot !== $v) {
                $this->montot = Herramientas::toFloat($v);
                $this->modifiedColumns[] = CiimpingPeer::MONTOT;
              }
  
	} 
}
