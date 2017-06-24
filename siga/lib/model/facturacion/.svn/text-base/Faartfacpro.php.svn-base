<?php

/**
 * Subclase para representar una fila de la tabla 'faartfacpro'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faartfacpro extends BaseFaartfacpro
{
    protected $rifpro='';
    protected $check='';
    protected $precioe="0,00";
    protected $estatus2="";
    protected $recargos="";
    protected $descuentos="";
    protected $anadirrec="";
    protected $anadirdes="";
    protected $canent=0.00;
    protected $candesp=0.00;

    public function getEstatus()
    {
        if($this->estatus=='')
          $sta='N';
        else
          $sta=$this->estatus;
        return $sta;
    }
    public function afterHydrate()
    {
        /*if($this->codart!='')
            $this->check=true;
        else
            $this->check=false;*/

        if (self::getPrecio()!=0)
        {
          $this->precioe=number_format(self::getPrecio(), 2, ',', '.');
        }

        $this->estatus2=self::getEstatus();
        
         if (self::getMonrgo()>0 || self::getMondes()>0)
         $this->check='1';
         
         $a= new Criteria();
	 $a->add(FargoartproPeer::REFDOC,self::getReffac());
	 $a->add(FargoartproPeer::CODART,self::getCodart());
	 $result=FargoartproPeer::doSelect($a);
	 if ($result)
	 {
            foreach ($result as $datos)
            {
               $monrgo=number_format($datos->getMonrgo(),2,',','.');
               $monrgoc=$datos->getMonrgo2(); //Ya viene con formato
               $this->recargos=$this->recargos.$datos->getCodrgo().'_'.$datos->getNomrgo().'_'.$datos->getRecfij().'_' .$monrgo.'_'.$datos->getCodcta().'_'.$datos->getTipo().'_'.$monrgoc.'!';
            }
	 }
         
         $b= new Criteria();
	 $b->add(FadescartproPeer::REFDOC,self::getReffac());
	 $b->add(FadescartproPeer::CODART,self::getCodart());
	 $result2=FadescartproPeer::doSelect($b);
	 if ($result2)
	 {
            foreach ($result2 as $datos2)
            {
               $mondesc=number_format($datos2->getMondesc(),2,',','.');
               $montdesc=number_format($datos2->getMontdesc(),2,',','.');
               $this->descuentos=$this->descuentos.$datos2->getCoddesc().'_'.$datos2->getDesdesc().'_'.$mondesc.'_'.$datos2->getCodcta().'_'.$datos2->getCantidad().'_'.$montdesc.'_'.$datos2->getTipdesc().'_'.$datos2->getTipret().'!';
            }
	 }
    }

    public function getNomots()
    {
      return Herramientas::getX('CEDRIF','Faregots','Nomots',self::getCedrif());
    }

    public function getNompro()
    {
      return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
    }

    public function getDesprod()
    {
      return Herramientas::getX('CODPROD','Fadefpro','Desprod',self::getCodprod());
    }

    public function getCanent($val=false)
  {
    if (self::getId())
    {
        $this->canent=$this->cantot;
    }
    if($val) return number_format($this->canent,2,',','.');
    else return $this->canent;

  }
  
    public function setCanent($v)
    {

    if ($this->canent !== $v) {
        $this->canent = Herramientas::toFloat($v);
      }

    }

}
