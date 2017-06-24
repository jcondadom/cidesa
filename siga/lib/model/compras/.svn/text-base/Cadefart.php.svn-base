<?php

/**
 * Subclass for representing a row from the 'cadefart'.
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
class Cadefart extends BaseCadefart
{
   	protected $corent="";
	  protected $corsal="";
    protected $manorddon="";
    protected $obj=array();
    /*protected $nomemp="";
    protected $diremp="";
    protected $tlfemp="";
    protected $corcom="";
    protected $correc2="";
    protected $correq2="";
    protected $cordes2="";
    protected $corser="";
    protected $corsol="";
    protected $corcot2="";*/

  /*public function afterHydrate()
  {
     $q= new Criteria();
     $q->add(EmpresaPeer::CODEMP,$this->codemp);
     $regq= EmpresaPeer::doSelectOne($q);
     if ($regq){
      $this->nomemp=$regq->getNomemp();
      $this->diremp=$regq->getDiremp();
      $this->tlfemp=$regq->getTlfemp();
     }

     $c1= new Criteria();
     $datoc1= CacorrelPeer::doSelectOne($c1);
     if ($datoc1){
       $this->corcom=$datoc1->getCorcom();
       $this->correc2=$datoc1->getCorrec();
       $this->correq2=$datoc1->getCorreq();
       $this->cordes2=$datoc1->getCordes();
       $this->corser=$datoc1->getCorser();
       $this->corsol=$datoc1->getCorsol();
       $this->corcot2=$datoc1->getCorcot();
       $this->corent=$datoc1->getCorent();
       $this->corsal=$datoc1->getCorsal();
     }
  }*/
  	public function getNomemp()
	{
	  return Herramientas::getX('CODEMP','Empresa','Nomemp',self::getCodemp());
	}

	public function getDiremp()
	{
	  return Herramientas::getX('CODEMP','Empresa','Diremp',self::getCodemp());
	}

	public function getTlfemp()
	{
	  return Herramientas::getX('CODEMP','Empresa','Tlfemp',self::getCodemp());
	}



  public function getCorcom()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorcom();}else { return '';}
  }

  public function getCorrec2()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorrec();}else { return '';}
  }

  public function getCorreq2()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorreq();}else { return '';}
  }

  public function getCordes2()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCordes();}else { return '';}
  }

  public function getCorser()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorser();}else { return '';}
  }

  public function getCorsol()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorsol();}else { return '';}
  }

  public function getCorcot2()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorcot();}else { return '';}
  }

  public function getCorent()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorent();}else { return '';}
  }

   public function getCorsal()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorsal();}else { return '';}
  }

   public function getNomdocpre()
  {
  	 return Herramientas::getX('TIPPRC','Cpdocprc','Nomext',self::getTipdocpre());
  }

  public function getManorddon()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almdefart',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('manorddon',$varemp['aplicacion']['compras']['modulos']['almdefart']))
	       {
	       	$dato=$varemp['aplicacion']['compras']['modulos']['almdefart']['manorddon'];
	       }
         }
     return $dato;
  }

  public function setManorddon()
  {
  	return $this->manorddon;
  }

   public function getNomdoc()
  {
  	 return Herramientas::getX('TIPCOM','Cpdoccom','Nomext',self::getTipodoc());
  }

  public function getDesconpag()
  {
  	 return Herramientas::getX('Codconpag','Caconpag','Desconpag',self::getCodconpag());
  }

    public function getConpagfij()
  {
  	 return H::getConfApp2('conpagfij', 'compras', 'almordcom');
  }

  public function getDesforent()
  {
  	 return Herramientas::getX('Codforent','Caforent','Desforent',self::getCodforent());
  }
  public function getNomext()
  {
    return Herramientas::getX('CODFIN','Fortipfin','Nomext',self::getTipfin());
  }

  public function getSecalmcorre()
  {
    return H::getNextvalSecuencia('cadefalm_seq_almcorre');
  }

   public function getNomdoccon()
  {
     return Herramientas::getX('TIPCOM','Cpdoccom','Nomext',self::getTipdoccon());
  }

  public function getNomubi()
  {
     return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubi());
  }

}
