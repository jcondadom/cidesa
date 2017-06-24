<?php

/**
 * Subclass for representing a row from the 'opfactur' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Opfactur extends BaseOpfactur
{
  private $notdeb = '';
  private $notcrd = '';
  private $unocien = '';
  private $impusob = '';
  protected $poriva2='';
  protected $impmn="0";
  protected $imprs="0";
  protected $porislr2='';
  protected $porirs2='';
  protected $porimn2='';
  
  public function setNotdeb($val)
  {
	$this->notdeb = $val;		
  }
	
  public function getNotdeb()
  {
	return $this->notdeb;		
  }
  
  public function setNotcrd($val)
  {
	$this->notcrd = $val;		
  }
	
  public function getNotcrd()
  {
	return $this->notcrd;		
  }
  
  public function setUnocien($val)
  {
	$this->unocien = $val;		
  }
	
  public function getUnocien()
  {
	return $this->unocien;		
  }
  
  public function setImpusob($val)
  {
	$this->impusob = $val;		
  }
	
  public function getImpusob()
  {
	return $this->impusob;		
  }

  public function getNomben()
  {
  return Herramientas::getX('CEDRIF','Opbenefi','Nomben',self::getRifalt());
  }

  public function afterHydrate()
  {
      if (self::getId())
      {
          $this->poriva2=self::getCodiva().'_'.self::getPoriva();
          $this->porislr2=self::getCodislr().'_'.self::getPorislr();
          $this->porirs2=self::getCodirs().'_'.self::getPorirs();
          $this->porimn2=self::getCodimn().'_'.self::getPorimn();
               
      }
  }
}
