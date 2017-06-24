<?php
require_once("../../lib/modelo/baseClases.class.php");

class Ruta extends baseClases
{
	function sqlp($coddes,$codhas,$diadespacho,$status)
	{

$sql= "SELECT
	r.id,
	r.descripcion as nombre, e.desest as estado
	FROM ruta r 
	inner join atestados e on e.id=r.atestados_id 
	WHERE
	r.id >= '".$coddes."' AND
	r.id <= '".$codhas."'";
	if ($diadespacho<>0)
	{
		$sql.=" and r.dia_despacho = ".$diadespacho;
	}
	if ($status<>0)
	{
		$sql.=" and r.status = '".$status."'";
	}
	$sql.=" ORDER BY r.id";
//H::PrintR($sql);
//echo $sql;
return $this->select($sql);
	}

}
?>
