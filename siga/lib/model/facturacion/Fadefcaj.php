<?php

/**
 * Subclass for representing a row from the 'fadefcaj'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fadefcaj.php 51134 2013-03-06 18:40:42Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Fadefcaj extends BaseFadefcaj
{
  protected $obj=array();

  public function getSeccaj()
  {            
    return H::getNextvalSecuencia("fadefcaj_seq_".$this->id);
  }

  
  public function getSeccaj2()
  {      
    $tiposecuencia=Herramientas::getX_vacio('CODALM','cadefalm','unicor',self::getCodalm());  
    if ($tiposecuencia=='S'){
        return H::getNextvalSecuencia("alm".$this->codalm."fac_seq");
    }else{
        return H::getNextvalSecuencia("caj".$this->id.$this->codalm."fac_seq");
    }      
  }
  
  
  public function getSecctr()
  {      
    $tiposecuencia=Herramientas::getX_vacio('CODALM','cadefalm','unicor',self::getCodalm());  
    if ($tiposecuencia=='S'){
        return H::getNextvalSecuencia("alm".$this->codalm."ctr_seq");
    }else{
        return H::getNextvalSecuencia("caj".$this->id.$this->codalm."ctr_seq");
    }      
  }
  
  
  
  public function getCorfacseq()
  {
    return H::getvalSecuencia('caj'.$this->id.$this->codalm.'fac_seq');
  }
  
  public function getCornumctrseq()
  {
    return H::getvalSecuencia('caj'.$this->id.$this->codalm.'ctr_seq');
  }
  
  public function getNomalm()
  {
    return Herramientas::getX_vacio('CODALM','cadefalm','nomalm',self::getCodalm());
  }

   public function getDesconpag()
  {
    return Herramientas::getX_vacio('ID','Faconpag','desconpag',self::getConpag());
  }

}
