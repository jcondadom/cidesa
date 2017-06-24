<?php

/**
 * Subclase para representar una fila de la tabla 'fafacturpro'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fafacturpro extends BaseFafacturpro
{
  protected $rifpro="";
  protected $nompro="";
  protected $telpro="";
  protected $dirpro="";
  protected $tipper="";
  protected $desconpag="";
  protected $grid=array();
  protected $obj2=array();
  protected $obj3=array();
  protected $obj4=array();
  protected $mancatdes="";
  protected $monto="0,00";
  protected $monrgo="0,00";
  protected $totdesc="0,00";
  protected $totrec="0,00";
  protected $apliclades="";
  protected $esretencion="";
  protected $tottotart="0,00";
  protected $totmonrgo="0,00";
  protected $trajo="";
  protected $porcentajedescto="0";
  protected $rgofijos="";
  protected $checkent="";
  protected $filactrec="";
  protected $filactdes="";
  protected $ctasociada="S";
  protected $etiqueta="";
  protected $tierecar=""; 
    
  protected function afterHydrate()
  {
    $this->rifpro=Herramientas::getX('CODPRO','Facliente','Rifpro',$this->codcli);
    $this->nompro=Herramientas::getX('CODPRO','Facliente','Nompro',$this->codcli);
    $tipper=Herramientas::getX('CODPRO','Facliente','Tipper',$this->codcli);
    $this->tipper=$tipper=='N' ? 'NATURAL' : 'JURIDICO';
    $this->telpro=Herramientas::getX('CODPRO','Facliente','Telpro',$this->codcli);
    $this->dirpro=Herramientas::getX('CODPRO','Facliente','Dirpro',$this->codcli);
  }

  public function getCodcli()
  {
   return Herramientas::getX('Rifpro','Facliente','codpro',$this->rifpro);
  }

  public function getNompro()
  {
   return Herramientas::getX('CODPRO','Facliente','Nompro',self::getCodcli());
  }


  public function getTipper()
  {
   return Herramientas::getX('CODPRO','Facliente','Tipper',self::getCodcli());
  }

  public function getTelpro()
  {
   return Herramientas::getX('CODPRO','Facliente','Telpro',self::getCodcli());
  }

  public function getDirpro()
  {
   return Herramientas::getX('CODPRO','Facliente','Dirpro',self::getCodcli());
  }

  public function getDesconpag()
  {
   return Herramientas::getX('ID','Faconpag','Desconpag',self::getCodconpag());
  }

public function getMancatdes()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('facturacion',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['facturacion']))
	     if(array_key_exists('fafacturpro',$varemp['aplicacion']['facturacion']['modulos'])){
	       if(array_key_exists('mancatdes',$varemp['aplicacion']['facturacion']['modulos']['fafacturpro']))
	       {
	       	$dato=$varemp['aplicacion']['facturacion']['modulos']['fafacturpro']['mancatdes'];
	       }
         }
     return $dato;
  }

  public function setMancatdes()
  {
  	return $this->mancatdes;
  }

  public function getDesubi()
  {
   return Herramientas::getX('CODUBI','Bnubica','Desubi',self::getCodubi());
  }
  
 public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,6,',','.');
    else return $this->valmon;

  }
  
    public function setValmon($v)
    {

        if ($this->valmon !== $v) {
            $this->valmon = Herramientas::toFloat($v,6);
            $this->modifiedColumns[] = FafacturproPeer::VALMON;
          }  
    }  

    public function getDesprod()
    {
      return Herramientas::getX('CODPROD','Fadefpro','Desprod',self::getCodprod());
    }

  public function getEtiqueta()
  {
    $eti="";
    $d= new Criteria();
    $d->add(FaartfacproPeer::REFFAC,self::getReffac());
    $resul= FaartfacproPeer::doSelect($d);
    if ($resul){
      foreach ($resul as $objr) {
        if ($objr->getNumfac()!=''){
          $eti="LA PROFORMA TIENE ASOCIADA UNA FACTURA DE N° ".$objr->getNumfac();
          BREAK;
        }
      }
    }    
    return $eti;
  }    
         
}
