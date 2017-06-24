<?php

/**
 * Subclase para representar una fila de la tabla 'contabc'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.contabilidad
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Contabc.php 38596 2010-06-03 20:56:38Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Contabc extends BaseContabc
{
	protected $check="";
	protected $stapin="";
	protected $totdeb=0.00;
	protected $totcre=0.00;
  protected $totdif="0,00";
  protected $obj=array();
  protected $bloqfec="";
  protected $numfilas=50;
  protected $cuadrado="";
  protected $fecdes="";
  protected $fechas="";
  protected $check2="0";
  protected $direccion="";
  protected $cancom="0";
  protected $totcom="0,00";
  protected $numcomrev="";

    public function getStapin(){
    	switch ($this->getStacom()){
    		case "A":
    			return "ACTUALIZADO";
    			break;
    		case "D":
    			return "DIFERIDO";
    		break;
    		case "E":
    			return "DESCUADRADO";
    	    break;
    		case "N":
    			return "ANULADO";
    		break;
    		case "R":
    			return "REVERSADO";
    		break;
    	}
    }

    public function getFeccom2($format = 'd/m/Y') {
    	return parent::getFeccom($format);
    }

/*    public function getTotdeb() {
    	return 0;
    }

    public function getTotcre() {
    	return 0;
    }*/

  public function getBloqfec()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('contabilidad',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['contabilidad']))
	     if(array_key_exists('confincom',$varemp['aplicacion']['contabilidad']['modulos'])){
	       if(array_key_exists('bloqfec',$varemp['aplicacion']['contabilidad']['modulos']['confincom']))
	       {
	       	$dato=$varemp['aplicacion']['contabilidad']['modulos']['confincom']['bloqfec'];
	       }
         }
     return $dato;
  }

  public function setBloqfec()
  {
  	return $this->bloqfec;
  }

  public function getNumfilas()
  {
    $dato=50;
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('confincomgen',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('numfilas',$varemp['aplicacion']['tesoreria']['modulos']['confincomgen']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['confincomgen']['numfilas'];
	       }
         }
     return $dato;
  }

  public function setNumfilas()
  {
  	return $this->numfilas;
  }
  
  public function getDestiptra()
  {
	return Herramientas::getX('CODTIPTRA','Cotiptra','Destiptra',self::getCodtiptra());
  }  

  public function getDesdirec()
  {
      return H::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
  }    

  public function setValmon($v)
  {

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v,6);
        $this->modifiedColumns[] = ContabcPeer::VALMON;
      }
  
  }  

  public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,6,',','.');
    else return $this->valmon;

  }  
}
