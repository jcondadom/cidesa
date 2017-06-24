<?php

/**
 * Subclase para representar una fila de la tabla 'nptabsfn'.
 *
 * Tabla que graba la Tabla de Montos de la Cuota de Servicios Funerarios
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Nptabsfn extends BaseNptabsfn
{
	protected $obj=array();
	
	public function Parentescos()
	{
		$resp=array();
		$c=new Criteria();
        $datos= NptipparPeer::doSelect($c);
        if($datos){
	      	foreach($datos as $reg)
	      	{
	        	$resp[$reg->getTippar()] = $reg->getTippar()." - ".$reg->getDespar();
	        }
       }
	  return $resp;
	}
}
