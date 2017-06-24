<?php
require_once("../../lib/modelo/baseClases.class.php");

class Vendedores extends baseClases
{

/**
 *   REPORTES::nprnomdef.php y nprhisnomdef.php
 *
 * */

 	public static function catalogo_ruta($objhtml)
	{
		$sql="select id as codigo, descripcion as nombre from ruta where (id like '%V_0%' AND descripcion like '%V_1%') order by id";
		$catalogo = array(
		    $sql,
		    array('Codigo','Nombre'),
		    array($objhtml),
		    array('codigo','nombre'),
		    100
		    );
	    return $catalogo;
	}
 	public static function catalogo_metas($objhtml)
	{
		$sql="select id as codigo, cantidad from metas where (id like '%V_0%') order by id";
		$catalogo = array(
		    $sql,
		    array('Codigo','Cantidad'),
		    array($objhtml),
		    array('codigo','cantidad'),
		    100
		    );
	    return $catalogo;
	}
	public static function catalogo_fapedido($objhtml)
	{
		$sql="select nroped as codigo, nroped as numero from fapedido where (id like '%V_0%') order by id";
		$catalogo = array(
		    $sql,
		    array('Codigo','Numero'),
		    array($objhtml),
		    array('codigo','numero'),
		    100
		    );
	    return $catalogo;
	}

	 


   }
