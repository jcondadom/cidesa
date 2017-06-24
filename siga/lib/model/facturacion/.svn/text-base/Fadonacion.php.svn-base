<?php

/**
 * Subclase para representar una fila de la tabla 'fadonacion'.
 *
 * Maestro de la Donación
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fadonacion extends BaseFadonacion
{
    protected $obj1=array();
    protected $rifpro="";
    protected $dirpro="";
    protected $telpro="";
    protected $codprg="";
    protected $conpag="";


    public function getRifpro()
  {
   return Herramientas::getX('CODPRO','Facliente','Rifpro',self::getCodpro());
  }

  public function getNompro()
  {
   return Herramientas::getX('CODPRO','Facliente','Nompro',self::getCodpro());
  }
  
  public function getTelpro()
  {
   return Herramientas::getX('CODPRO','Facliente','Telpro',self::getCodpro());
  }

  public function getDirpro()
  {
   return Herramientas::getX('CODPRO','Facliente','Dirpro',self::getCodpro());
  }
}
