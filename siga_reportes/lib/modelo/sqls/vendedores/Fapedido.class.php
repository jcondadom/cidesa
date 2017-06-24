<?php
require_once("../../lib/modelo/baseClases.class.php");

class Fapedido extends baseClases
{
	function sqlp($coddes,$codhas,$codpro)
	{

$sql= ' SELECT c.codpro,c.nompro,p.fecped,p.nroped,p.id
	FROM fapedido p
	inner join facliente c on c.codpro=p.codcli WHERE ';
	$sql.=" p.nroped >='$coddes'";
	$sql.=" and p.nroped <='$codhas'";
	if ($codpro!="")
	{
		$sql.=' AND c.id='.$codpro;
	}
	$sql.=' order by p.nroped limit 50';
//H::PrintR($sql);
//echo $sql;
//exit();
return $this->select($sql);
	}
	function sqlpf($fecdes,$fechas)
	{
	$fecdes=explode('/', $fecdes,3);
        $fecdes= $fecdes[2]."/".$fecdes[1]."/".$fecdes[0];
	$fechas=explode('/', $fechas,3);
        $fechas= $fechas[2]."/".$fechas[1]."/".$fechas[0];
	$sql= ' SELECT p.fecped,p.nroped,p.id,p.desped
	FROM fapedido p
	WHERE p.nroped not in (select reqart FROM cadphart)';
	$sql.=" and p.fecped >='$fecdes'";
	$sql.=" and p.fecped <='$fechas'";	
	$sql.=' order by p.nroped';
//H::PrintR($sql);
//echo $sql;
//exit();
return $this->select($sql);
	}

}
?>
