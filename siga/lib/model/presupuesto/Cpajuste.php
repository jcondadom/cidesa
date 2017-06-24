<?php

/**
 * Subclass for representing a row from the 'cpajuste'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpajuste.php 52666 2013-07-15 21:06:08Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Cpajuste extends BaseCpajuste
{
    protected $afeaju="";
    protected $obj=array();
    protected $reftipaju="";
    
  public function afterHydrate()
  {
      $this->reftipaju=H::getX_vacio('TIPAJU','Cpdocaju','refier',self::getTipaju());

   
  }
    
    
    public function getNomext()
    {
        return Herramientas::getX_vacio('TIPAJU','Cpdocaju','nomext',self::getTipaju());
    }
    
    public function getFecmov()
    {
       if ($this->reftipaju=='P') {
           return date('d/m/Y',strtotime(H::getX_vacio('refprc','Cpprecom','Fecprc',self::getRefere())));
       }else if ($this->reftipaju=='C') {
           return date('d/m/Y',strtotime(H::getX_vacio('refcom','Cpcompro','Feccom',self::getRefere())));
       }else if ($this->reftipaju=='A') {
           return date('d/m/Y',strtotime(H::getX_vacio('refcau','Cpcausad','Feccau',self::getRefere())));
       }else if ($this->reftipaju=='G') {
       return date('d/m/Y',strtotime(H::getX_vacio('refpag','Cppagos','Fecpag',self::getRefere())));
       }else {
           return '';
       }
    }
    
    public function getDesmov()
    {
       if ($this->reftipaju=='P') {
           return H::getX_vacio('refprc','Cpprecom','Desprc',self::getRefere());
       }else if ($this->reftipaju=='C') {
           return H::getX_vacio('refcom','Cpcompro','Descom',self::getRefere());
       }else if ($this->reftipaju=='A') {
           return H::getX_vacio('refcau','Cpcausad','Descau',self::getRefere());
       }else if ($this->reftipaju=='G') {
       return H::getX_vacio('refpag','Cppagos','Despag',self::getRefere());
       }else {
           return '';
       }
    }    
    
     public function getIdrefer()
      {
    	return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
      }
    
}
