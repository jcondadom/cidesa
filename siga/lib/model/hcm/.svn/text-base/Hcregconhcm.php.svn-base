<?php

/**
 * Subclase para representar una fila de la tabla 'hcregconhcm'.
 *
 * Contiene los Registros de Consumo de HCM
 *
 * @package    Roraima
 * @subpackage lib.model.hcm
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Hcregconhcm extends BaseHcregconhcm
{
  protected $misben=false;
  protected $obj=array();
  protected $codramhcm="";
  protected $check="";


  public function getCedemp()
  {
   return Herramientas::getX_vacio('CODEMP','Nphojint','Cedemp',self::getCodemp());
  }

  public function getNomemp()
  {
   return Herramientas::getX_vacio('CODEMP','Npasicaremp','Nomemp',self::getCodemp());
  }

  public function getNomnom()
  {
   return Herramientas::getX_vacio('CODEMP','Npasicaremp','Nomnom',self::getCodemp());
  }

  public function getCodttrab()
  {
   return Herramientas::getX_vacio('CODEMP','Nphojint','Codtipemp',self::getCodemp());
  }

  public function getNomfam()
  {
      if(self::getCedemp()==self::getCedfam())
        return Herramientas::getX_vacio('CODEMP','Npasicaremp','Nomemp',self::getCodemp());
      else
        return Herramientas::getX_vacio('CEDFAM','Npinffam','Nomfam',self::getCedfam());
  }

  public function getParfam()
  {
      if((self::getCedemp()==self::getCedfam()) and (self::getCedfam()!=""))
        return "TITULAR";
      else
        return Herramientas::getX_vacio('TIPPAR','NpTippar','DESPAR',Herramientas::getX('CEDFAM','Npinffam','Parfam',self::getCedfam()));
  }

  public function getNompro()
  {
   return Herramientas::getX_vacio('RIFPRO','Caprovee','Nompro',self::getRifpro());
  }

  public function getDirpro()
  {
   return Herramientas::getX_vacio('RIFPRO','Caprovee','Dirpro',self::getRifpro());
  }

  public function getTelpro()
  {
   return Herramientas::getX_vacio('RIFPRO','Caprovee','Telpro',self::getRifpro());
  }

  public function getNumche()
  {
  return Herramientas::getX('NUMORD','Opordpag','Numche',self::getNumord());
  }  
}
