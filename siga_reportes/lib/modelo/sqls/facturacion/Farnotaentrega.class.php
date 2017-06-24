<?php
require_once("../../lib/modelo/baseClases.class.php");

class Farnotaentrega extends baseClases
{
	function sqlp($CODDES,$CODHAS)
	{
		//// RECORDAR QUE CONTIEN EL SAL DE LA NOTA DE ENTRAGA ORIGINAL...

$sql= "SELECT
		a.reqart,a.dphart as numero,to_char(a.fecdph,'dd/mm/yyyy') as fecha,a.tipdph,a.desdph as descripcion,
                (select desped from fapedido where nroped=a.reqart limit 1) as desped,
		e.nompro as cliente,e.dirpro as direccion, e.telpro as telefono, e.rifpro as rif, e.nitpro as nit
		FROM
		CADPHART A,
		FACLIENTE E

		WHERE
		A.CODCLI=E.CODPRO AND
		A.DPHART >= '".$CODDES."' AND
		A.DPHART <= '".$CODHAS."'
		ORDER BY A.DPHART,A.CODCLI, A.fecdph";
		//H::PrintR($sql);exit;
		return $this->select($sql);
	}
	function sqlp1($CODIGO)
	{

$sql= "select   b.codart as codart, b.desart as articulo,
          a.candph as cantidad, a.preart as precio--, a.monrgo as recargo
         from
         CAARTDPH a,
         caregart b
         where
         a.codart=b.codart       and
         a.dphart= '".$CODIGO."' and
         b.tipo ='A'
         order by a.codart" ;

//H::PrintR($sql);exit;
return $this->select($sql);
	}

		function sqlpdesfac($reffac)
	{

$sql= "select desfac as descripcion from fafactur where reffac= '".$reffac."' " ;

//H::PrintR($sql);exit;
return $this->select($sql);
	}

}
?>
