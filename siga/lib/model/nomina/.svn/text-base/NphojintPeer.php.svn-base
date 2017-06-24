<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'nphojint'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class NphojintPeer extends BaseNphojintPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (NphojintPeer::CODEMP => 'Código', NphojintPeer::NOMEMP => 'Descripción', ),);


	static public function getColumName($colum)
	{
		return self::$columsname[self::COLUMNS][$colum];
	}

	static public function getColumsNames()
	{
		return self::$columsname[self::COLUMNS];
	}


	static public function getArrayFieldsNames()
	{
		$col = self::$columsname[self::COLUMNS];
		$columnas = array();
		foreach($col as $key => $value)
		{
			$punto = strpos($key,'.');
			$tabla = substr($key,0,$punto);
			$campo = substr($key,$punto+1);
			$columnas[] = ucfirst(strtolower($campo));

		}
		return $columnas;
	}

   public static function getNomemp($codigo)
   {
     return Herramientas::getX_vacio('CODEMP','Nphojint','Nomemp',$codigo);
   }

   public static function getCodnom($codigo)
   {
   	 $r= new Criteria();
   	 $r->add(NpasicarempPeer::CODEMP,$codigo);
   	 $r->add(NpasicarempPeer::STATUS,'V');
   	 $reg= NpasicarempPeer::doSelectOne($r);
   	 if ($reg)
   	 	return $reg->getCodnom();
   	 else return '';
   }

   public static function getCodcar($codigo)
   {
     $r= new Criteria();
   	 $r->add(NpasicarempPeer::CODEMP,$codigo);
   	 $r->add(NpasicarempPeer::STATUS,'V');
   	 $reg= NpasicarempPeer::doSelectOne($r);
   	 if ($reg)
   	 	return $reg->getCodcar();
   	 else return '';
   }

   public static function getNomnom($codigo)
   {
     return Herramientas::getX_vacio('CODNOM','Npnomina','Nomnom',$codigo);
   }

   public static function getNomcar($codigo)
   {
     return Herramientas::getX_vacio('CODCAR','Npcargos','Nomcar',$codigo);
   }

   public static function getCedemp($codigo)
   {
     return Herramientas::getX_vacio('CODEMP','Nphojint','Cedemp',$codigo);
   }

   public static function getFecing($codigo,$format="d/m/Y")
   {
 		$c = new Criteria();
	  	$c->add(NpasiempcontPeer::CODEMP,$codigo);
	    $datos = NpasiempcontPeer::doSelectOne($c);
	    if ($datos)
	    {
	       return date($format,strtotime($datos->getFeccal()));
	    }
	    else
	    {
			$cr = new Criteria();
		  	$cr->add(NphojintPeer::CODEMP,$codigo);
		    $resul = NphojintPeer::doSelectOne($cr);
		    if ($resul)
				return date($format,strtotime($resul->getFecing()));
		    else
		        return "";
	    }
  }

   public static function getFecRet($codigo)
   {
     return Herramientas::getX_vacio('CODEMP','Nphojint','Fecret',$codigo);
   }
}
