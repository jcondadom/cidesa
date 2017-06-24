<?php

/**
 * Subclass for representing a row from the 'cobdetfor'.
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
class Cobdetfor extends BaseCobdetfor
{
  protected $genmov="";
  protected $gening="";
  protected $gennotcre="";
  protected $codtip="";
  protected $destippag="";
  protected $numide2="";
  protected $monnotcre=0;
  protected $gendetche="";
  protected $pagret="";

  public function getDestippag(){
     return Herramientas::getX('Id','Fatippag','Destippag',self::getFatippagId());
  }

  public function getGenmov(){
     return Herramientas::getX('Id','Fatippag','Genmov',self::getFatippagId());
  }

  public function getGening(){
     return Herramientas::getX('Id','Fatippag','Gening',self::getFatippagId());
  }

  public function getCodtip(){

    $genmov=Herramientas::getX('Id','Fatippag','Genmov',self::getFatippagId());
    if ($genmov=='S')
    {
        $longitud=explode('-', self::getNumide());
      if (count($longitud)>1)
  	 $val=$longitud[0];
      else $val="";
          
    }else $val="";

     return $val;
  }

  public function getNumide2(){
    $genmov=Herramientas::getX('Id','Fatippag','Genmov',self::getFatippagId());
    if ($genmov=='S')
    {
     $longitud=explode('-', self::getNumide());
      if (count($longitud)>1)
  	 $val=$longitud[1];
      else
          $val=self::getNumide();
    }else  $val=self::getNumide();


     return $val;
  }
 public function getDesban(){
     return Herramientas::getX_vacio('CTABAN','Faallbancos','Banco',self::getCodban());
  }  

  public function getGendetche(){
     return Herramientas::getX('Id','Fatippag','Gendetche',self::getFatippagId());
  }  

  public function getPagret(){
     return Herramientas::getX('Id','Fatippag','Pagret',self::getFatippagId());
  }
}
