<?php
require_once("../../lib/modelo/baseClases.class.php");

class Metas extends baseClases
{
	function sqlp($coddes,$codhas,$mesasignacion,$status)
	{

$sql= "SELECT
	m.id,
	m.cantidad, v.nomcon as vendedor, p.desart as producto
	FROM metas m
	inner join vendedores v on v.id=m.vendedores_id  
	inner join catproductos p on p.id=m.catproductos_id	
	WHERE
	m.id >= '".$coddes."' AND
	m.id <= '".$codhas."'";
	if ($mesasignacion<>0)
	{
		$sql.=" and m.mes_asignacion = ".$mesasignacion;
	}
	if ($status<>0)
	{
		$sql.=" and m.status = '".$status."'";
	}
	$sql.=" ORDER BY m.id";
//H::PrintR($sql);
//echo $sql;
return $this->select($sql);
	}

}
?>
