<?php

/**
 * Subclass for representing a row from the 'cpprecom'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpprecom.php 57592 2014-07-03 18:24:50Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpprecom extends BaseCpprecom
{
  protected $salpre = 0;
  protected $msganulado="";
  protected $nomext="";
  protected $nomben="";
  protected $obj2=array();
  protected $toteve = "0,00";

   public function getMsganulado(){
     if (self::getStaprc()=='N')
      return "ANULADO EL ".$this->getFecanu2();
     else 
      return "";
  }

   public function afterHydrate(){
   	$this->nomext=H::getX('TIPPRC','Cpdocprc','Nomext',$this->getTipprc());
   	$this->nomben=H::getX('CEDRIF','Opbenefi','Nomben',$this->getCedrif());
    $this->salpre = H::FormatoMonto($this->getMonprc() - $this->getSalaju());
  }

  public function getRefmov()
  {
    return self::getRefprc();
  }

  public function getFecanu2($format = 'd/m/Y') {
    	return parent::getFecanu($format);
    }

    public function getDesdirec()
    {
        return Herramientas::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
    }

    public function TieCompromiso(){
      $tiecom=H::getX_vacio('REFERE','Cpimpcom','Refcom',self::getRefprc());
      if ($tiecom!='')
        return 'S';
      else
        return 'N';
    }

    public function PrecomOtroModulo(){
      $esomod=H::getX_vacio('REQART','Casolart','Reqart',self::getRefprc());
      if ($esomod!='' || substr(self::getRefprc(), 0,2)=='TR')
        return 'S';
      else
        return 'N';
    }
}
