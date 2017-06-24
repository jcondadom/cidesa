<?php

/**
 * Subclass for representing a row from the 'fcconrep'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcconrep.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcconrep extends BaseFcconrep
{
   protected $codpar1="";
   protected $rifrep="";
   protected $grid= array();
   protected $feccor="";
   protected $rifconant="";
   protected $feccon="";
   protected $criterio="";
   protected $rifrepant="";
   protected $nomrepant="";
   protected $nomconant="";
   protected $dirconcon="";
   protected $dirconrep="";
   protected $nomconrep="";
   protected $rifrepcon="";

   public function getCodpar1()
   {  $var="";
       if(self::getCodpar()!=''){
   	   $var=self::getCodpar()."-".self::getCodmun()."-".self::getCodedo()."-".self::getCodpai();

           }else{
               $var="";
           }
       return $var;
   }

   public function getNomconrep()
   {
      return Herramientas::getX('rifcon','fcconrep','nomcon',self::getRifcon());
   }

   public function getRifrep()
   {
      return self::getRifcon();
   }

   public function getRifrepant()
   {
      return self::getRifcon();
   }
  public function getRifconant()
   {
      return self::getRifcon();
   }

  public function getNomrepant()
   {
      return Herramientas::getX('rifcon','fcconrep','nomcon',self::getRifrepant());
   }
  public function getNomconant()
   {
      return Herramientas::getX('rifcon','fcconrep','nomcon',self::getRifconant());
   }

   public function setRifrep()
   {
      return $this->rifrep();
   }

   public function getNomconr()
   {
      return self::getNomcon();
}

}
