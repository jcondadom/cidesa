<?php

/**
 * Subclase para representar una fila de la tabla 'forestcoscat'.
 *
 * null
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Forestcoscat extends BaseForestcoscat
{
    protected $obj=array();
    protected $objper=array();
    protected $objfin=array();
    protected $cadenaper="";
    protected $cadenafin="";
    protected $filper="";
    protected $filfin="";
    protected $totfil="0,00";
    protected $mascaraart="";
    protected $longitud="";
    protected $longitud2="";
    protected $desact="";
    protected $tipuni="";

   public function getLongitud()
   {
     return strlen(Herramientas::getMascaraArticulo());
   }

   public function setLongitud()
   {
     return $this->longitud;
   }

   public function getMascaraart()
   {
     return Herramientas::getMascaraArticulo();
   }

   public function setMascaraart()
   {
     return $this->mascaraart;
   }
   
    public function getLongitud2()
   {
     return strlen(H::getObtener_FormatoCategoria_Formulacion());
   }

   public function setLongitud2()
   {
     return $this->longitud2;
   }

   public function getMascara()
   {
     return H::getObtener_FormatoCategoria_Formulacion();
   }

   public function setMascara()
   {
     return $this->mascara;
   }   

    public function getDesart()
    {
      return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    }
    
    public function getUnimed()
    {
      return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
    }

    public function getCodpar()
    {
      return Herramientas::getX('CODART','Caregart','Codpar',self::getCodart());
    }

    public function getNompar()
    {
      return Herramientas::getX('CODPAR','Nppartidas','Nompar',self::getCodpar());
    }

    public function getDestip()
    {
      return Herramientas::getX('CODTIP','Fortiptit','Destip',self::getCodtip());
    }

    public function getNomparing()
    {
      if (self::getCodfin()=='Mixtos')
          return "Diversos";
      else return Herramientas::getX('CODPARING','Fordefparing','Nomparing',self::getCodfin());
    }
}
