<?php

/**
 * Subclase para representar una fila de la tabla 'hcdefgen'.
 *
 * Contiene las definiciones generales del modulo HCM
 *
 * @package    Roraima
 * @subpackage lib.model.hcm
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Hcdefgen extends BaseHcdefgen
{
  public function getNomcon()
  {
   return Herramientas::getX_vacio('CODCON','Npdefcpt','Nomcon',self::getCodreem());
  }

   public function getNomcono()
  {
   return Herramientas::getX_vacio('CODCON','Npdefcpt','Nomcon',self::getCodreeo());
  }

   public function getNomram()
  {
   return Herramientas::getX_vacio('RAMART','Caramart','Nomram',self::getCodramhcm());
  }

   public function getNomram2()
  {
   return Herramientas::getX_vacio('RAMART','Caramart','Nomram',self::getCodramgasfun());
  }

  public function getNomemp()
  {
   return Herramientas::getX_vacio('CODEMP','Nphojint','Nomemp',self::getFiremp1());
  }

   public function getNomemp2()
  {
   return Herramientas::getX_vacio('CODEMP','Nphojint','Nomemp',self::getFiremp2());
  }

   public function getNompre()
  {
   return Herramientas::getX_vacio('CODPRE','Cpasiini','Nompre',self::getCodpre());
  }
}
