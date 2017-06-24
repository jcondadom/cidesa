<?php

/**
 * Subclass for representing a row from the 'cpadidis'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpadidis.php 58914 2014-10-08 15:30:12Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpadidis extends BaseCpadidis
{
    protected $obj=array();
    protected $longitud="";
    protected $mascara="";
    protected $etiqueta="";
    protected $cargado="N";
    protected $justificacion="";
    //protected $totmon="0,00";
    protected $obj2=array();
   protected $actualfila="";
   
  public function getEtiqueta()
    {
        if($this->getRefadi() != '')
        {
            $this->cargado="S";
            if (strtoupper($this->getStaadi()) == "A" ){
               $this->etiqueta = "Elaborado el ".$this->getFecadi('d/m/Y');
            }else if (strtoupper($this->getStaadi()) == "N" )
            {
                $this->etiqueta = "Anulado el ".$this->getFecanu('d/m/Y');
            }
        }else
        {
            $this->cargado="N";
            $this->etiqueta = "";
        }

        return $this->etiqueta;
    }

  public function getRefmov()
  {
    return parent::getRefadi();
  }

    public function getLongitud()
   {
     return strlen(H::formatoPresupuesto());
}

   public function setLongitud()
   {
     return $this->longitud;
   }

   public function getMascara()
   {
     return H::formatoPresupuesto();
   }

   public function setMascara()
   {
     return $this->mascara;
   }

   public function __toString()
  {
    return $this->refadi;
  }
   public function getJustificacion()
  {
     $c= new Criteria();
     $c->add(CpsoladidisPeer::REFADI, $this->refadi);
     $cpsol= CpsoladidisPeer::doSelectOne($c);
     if($cpsol){
        return $cpsol->getJustificacion();
     }  else {
       return '';
     }
  }

      public function getDesdirec()
    {
        return Herramientas::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
    }
}
