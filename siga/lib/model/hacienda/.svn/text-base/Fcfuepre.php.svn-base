<?php

/**
 * Subclass for representing a row from the 'fcfuepre'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcfuepre.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcfuepre extends BaseFcfuepre
{
  protected $deufec1="0,00";
  protected $recfec1="0,00";
  protected $totdeu="0,00";
  protected $codpre="";
  protected $nombre="";


  public function getDescta()
  {
    return Herramientas::getX_vacio('codcta','contabb','descta',self::getIngrec());
  }

  public function getDescta1()
  {
    return Herramientas::getX_vacio('codcta','contabb','descta',self::getFueing());
  }

  public function getDescta2()
  {
    return Herramientas::getX_vacio('codpar','fcpreing','nompar',self::getCodprei());
  }

  public function getCodcta()
  {
    return self::getIngrec();
  }

  public function getCodparing()
  {
    return self::getCodprei();
  }

  public function getNomparing()
  {
    return Herramientas::getX_vacio('codpre','cideftit','nombre',self::getCodprei());
  }

  public function getCodrede()
  {
    return self::getFueing();
  }

  public function getDesrede()
  {
    return Herramientas::getX_vacio('codcta','contabb','descta',self::getFueing());
  }

  public function getDescripcioncodpic()
  {
    return Herramientas::getX_vacio('CODFUE','Fcfuepre','Nomfue',self::getCodfue());
  }

  public function getDescripcioncodveh()
  {
    return Herramientas::getX_vacio('CODFUE','Fcfuepre','Nomfue',self::getCodfue());
  }

  public function getDescripcioncodinm()
  {
    return Herramientas::getX_vacio('CODFUE','Fcfuepre','Nomfue',self::getCodfue());
  }

  public function getDescripcioncodpro()
  {
  	return Herramientas::getX_vacio('CODFUE','Fcfuepre','Nomfue',self::getCodfue());
  }

  public function getDescripcioncodesp()
  {
    return Herramientas::getX_vacio('CODFUE','Fcfuepre','Nomfue',self::getCodfue());
  }

  public function getDescripcioncodapu()
  {
  	return Herramientas::getX_vacio('CODFUE','Fcfuepre','Nomfue',self::getCodfue());
  }

  public function getCodveh()
  {
    return self::getCodfue();
  }

  public function getCodinm()
  {
  	return self::getCodfue();
  }

  public function getCodpro()
  {
  	return self::getCodfue();
  }

  public function getCodapu()
  {
  	return self::getCodfue();
  }

  public function getCodajupic()
  {
  	return self::getCodfue();
  }

   public function getCodpic()
  {
  	return self::getCodfue();
  }

   public function getCodesp()
  {
  	return self::getCodfue();
}

  public function getDeufec1()
  {
      $monto="0,00";
      $sql="select coalesce(Sum(mondec),0) as monto From Fcdeclar where fueing='".$this->codfue."'";
      if (Herramientas::BuscarDatos($sql,$result))
      {
          $monto=number_format($result[0]["monto"],2,',','.');
      }

      return $monto;
}

  public function getRecfec1()
  {
      $monto="0,00";
      $sql="select coalesce(Sum(mondec),0) as monto From Fcdeclar where fueing='".$this->codfue."' and edodec='P'";
      if (Herramientas::BuscarDatos($sql,$result))
      {
          $monto=number_format($result[0]["monto"],2,',','.');
      }

      return $monto;
  }

  public function getTotdeu()
  {
      $calculo=H::toFloat(self::getDeufec1()-self::getRecfec1());

      $monto=number_format($calculo,2,',','.');

      return $monto;
  }
 public function getCodpre()
  {
    return self::getCodprei();
  }

  public function getNombre()
  {
    return Herramientas::getX_vacio('codpre','cideftit','nompre',self::getCodprei());
  }
  
   public function getCodfue2()
  {
  	return self::getCodfue();
  }


}
