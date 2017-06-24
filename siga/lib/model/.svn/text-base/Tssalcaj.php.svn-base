<?php

/**
 * Subclass for representing a row from the 'tssalcaj'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Tssalcaj extends BaseTssalcaj
{
  protected $obj=array();
  protected $nomben="";
  protected $ctapag="";
  protected $agregabenefi="N";
  protected $numcue="";
  protected $tipdoc="";
  protected $check="";

  public function getNomben()
  {
   return Herramientas::getX('CEDRIF','Opbenefi','Nomben',self::getCedrif());
  }

  public function getCtapag()
  {
   return Herramientas::getX('CEDRIF','Opbenefi','Codcta',self::getCedrif());
  }

  public function getDesdirec()
  {
      return H::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
  }  

   public function getDeseve()
  {
    return H::getX_vacio('CODEVE','Cpevepre','Deseve',self::getCodeve());
  } 

  public function getDescaj()
  {
    return H::getX_vacio('CODCAJ','Tsdefcajchi','Descaj',self::getCodcaj());
  } 
    
}
