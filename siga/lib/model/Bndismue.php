<?php

/**
 * Subclass for representing a row from the 'bndismue'.
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
class Bndismue extends BaseBndismue
{
  protected $obj=array();

  public function getDesmue()
  {
    return Herramientas::getXx('Bnregmue', array('CODMUE','CODACT'), array(self::getCodmue(),self::getCodact()), 'Desmue');
   }

  public function getDesmot()
  {
      return Herramientas::getX('Codmot','Bnmotdis','Desmot',self::getCodmot());
   }

  public function getDesubiori()
  {
      return Herramientas::getX('Codubi','Bnubibie','Desubi',self::getCodubiori());
   }

  public function getDesubides()
  {
    return Herramientas::getX('Codubi','Bnubibie','Desubi',self::getCodubides());
  }

  public function getIdrefer()
  {
    //$numerocomprobante="ACM".substr(self::getNrodismue(),-5,10);
    return Herramientas::getX_vacio('Numcom','contabc','id',self::getNumcom());
  }


  public function getNomuse()
  {
   return Herramientas::getX('loguse','Usuarios','Nomuse',trim(self::getLogusu()));
  }
  
  public function getCodalt()
  {
    return Herramientas::getXx('Bnregmue', array('CODMUE','CODACT'), array(self::getCodmue(),self::getCodact()), 'Codalt');
   }

  public function getNomrespat()
  {
     return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodrespat());
  }

  public function getNomresuso()
  {
      $respusoben=H::getConfApp2('respusoben', 'bienes', 'bieregactmued');
      if ($respusoben=='S')      
     return Herramientas::getX('CEDRIF','Opbenefi','Nomben',self::getCodresuso());
      else
          return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodresuso());
  }
  
    public function getNomapeest()
  {
      return Herramientas::getX_vacio('cedest','Bncatest','Nomapeest',self::getCedest());
  } 

  public function getCedrep()
  {
      return Herramientas::getX_vacio('cedest','Bncatest','Cedrep',self::getCedest());
  }    

  public function getNomaperep()
  {
      return Herramientas::getX_vacio('cedest','Bncatest','Nomaperep',self::getCedest());
  }  

  public function getDesestori()
    {
        return Herramientas::getX_vacio('codest','Bnestcon','Desest',self::getCodestori());
    } 

  public function getDesestdes()
    {
        return Herramientas::getX_vacio('codest','Bnestcon','Desest',self::getCodestdes());
    }     

}


