<?php

/**
 * Subclase para representar una fila de la tabla 'caevadespro'.
 *
 * Tabla para guardar la Evaluación y desempeño del Proveedor
 *
 * @package    Roraima
 * @subpackage lib.model.compras
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Caevadespro extends BaseCaevadespro
{
	protected $objl=array();
	protected $objt=array();
	protected $rifpro="";
	protected $nompro="";
	protected $dirpro="";
	protected $telpro="";
	protected $email="";
  protected $longitud="";

  public function afterHydrate()
  {
     $q= new Criteria();
     $q->add(CaproveePeer::CODPRO,self::getCodpro());
     $resulq= CaproveePeer::doSelectOne($q);
     if ($resulq){
     	$this->rifpro=$resulq->getRifpro();
     	$this->nompro=$resulq->getNompro();
     	$this->dirpro=$resulq->getDirpro();
     	$this->telpro=$resulq->getTelpro();
     	$this->email=$resulq->getEmail();
     }
  }

public function getClapro2() 
{
	if (self::getClapro()=='P')
		return "Productos";
	elseif (self::getClapro()=='I')
		return "Instructores";
	elseif (self::getClapro()=='S')
		return "Productos y Servicios";
    else return "";
}

public function getLongitud()
  {
    $mascara = H::ObtenerFormato('Npdefgen', 'Fororg');
         $lonniv = strlen($mascara);
    return $lonniv;
  }
  
  public function getDesniv()
  {
    return H::getX_vacio('CODNIV', 'Npestorg', 'Desniv',self::getCodniv());

  }  
}
