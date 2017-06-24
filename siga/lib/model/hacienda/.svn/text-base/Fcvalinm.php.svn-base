<?php

/**
 * Subclass for representing a row from the 'fcvalinm'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcvalinm.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcvalinm extends BaseFcvalinm
{
	protected $grid= array();
        protected $totalanualt="";
        protected $totalanual="";


  // Bs. M Anual Terreno
    public function getTotalanualt()
    {
      $valor=0;
      $c= new Criteria();
      $c= addJoin(FcdeclarPeer::NUMREF, FcdetinmPeer::NROINM);
      $c= addJoin(FcvalinmPeer::CODZON, FcdetinmPeer::CODZON);
      $c= addJoin(FcvalinmPeer::CODTIP, FcdetinmPeer::CODTIP);
      $c= add(FcvalinmPeer::CODZON, self::getCodzon());
      $c= add(FcvalinmPeer::CODTIP, self::getCodtip());
      $per = FcdeclarPeer::doSelect($c);
      if($per){
          $valor=$per->getMtrter();
      }
      return H::FormatoMonto(self::getAnualt()* $valor);
    }

   // Bs. M Anual Cons.
    public function getTotalanual()
    {
      $valor=0;
      $c= new Criteria();
      $c= addJoin(FcdeclarPeer::NUMREF, FcdetinmPeer::NROINM);
      $c= addJoin(FcvalinmPeer::CODZON, FcdetinmPeer::CODZON);
      $c= addJoin(FcvalinmPeer::CODTIP, FcdetinmPeer::CODTIP);
      $c= add(FcvalinmPeer::CODZON, self::getCodzon());
      $c= add(FcvalinmPeer::CODTIP, self::getCodtip());
      $per = FcdeclarPeer::doSelect($c);
      if($per){
          $valor=$per->getMtrcon();
      }
      return H::FormatoMonto(self::getAnual()* $valor);
    }

}
