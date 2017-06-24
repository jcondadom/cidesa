<?php

/**
 * Subclass for representing a row from the 'cidefniv'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cidefniv.php 32416 2009-09-02 02:21:12Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cidefniv extends BaseCidefniv
{

  protected $grid= array();
  protected $gridper= array();
  protected $gridper2= array();

  public function getNomemp()
    {
      $c = new Criteria();
      $c->add(EmpresaPeer::CODEMP,'001');
      $nombre = EmpresaPeer::doSelectone($c);
    if ($nombre)
      return $nombre->getNomemp();
    else
      return 'No encontrado';
    }


  public function getSecing()
  {
    return H::getNextvalSecuencia('cidefniv_seq_coring');
  }

  public function getDescta()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodctarec());
  }

  public function getMascaraConta()
  {
    return Herramientas::getX('Codemp','Contaba','Forcta','001');
  }

  public function getLoncta()
  {
    return strlen(self::getMascaraConta());
  }  

     public function getDestip()
    {
      return Herramientas::getX('CODTIP','Citiping','Destip',self::getCodtip());
    }

  public function getDestipmov()
    {
      return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getTipmov());
    }    

    public function getNomcon(){
      return Herramientas::getX('RIFCON','Ciconrep','Nomcon',self::getRifcon());
    }

  public function getDescta1()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodctades());
  }  

  public function getDestipmovcom()
    {
      return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getTipmovcom());
    }   

}
