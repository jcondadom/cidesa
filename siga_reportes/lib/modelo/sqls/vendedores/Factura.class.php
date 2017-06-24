<?php
require_once("../../lib/modelo/baseClases.class.php");

class Factura extends baseClases
{
	function sqlp($fecdes,$fechas)
	{
	$fecdes=explode('/', $fecdes,3);
        $fecdes= $fecdes[2]."/".$fecdes[1]."/".$fecdes[0];
	$fechas=explode('/', $fechas,3);
        $fechas= $fechas[2]."/".$fechas[1]."/".$fechas[0];

	$sql= ' select count(f.codcon) as cantidad,v.percon as vendedor
	from "SIMA017".fafactur f
	inner join "SIMA017".vendedores v on v.codcon=f.codcon where ';
	$sql.=" f.fecfac >='$fecdes'";
	$sql.=" and f.fecfac <='$fechas'";	
	$sql.=' group by v.percon order by cantidad asc limit 10';
//H::PrintR($sql);
//echo $sql;
//exit();
return $this->select($sql);
	}
	
}
?>
