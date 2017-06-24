<?php
require_once("../../lib/modelo/baseClases.class.php");

class Farfactur extends baseClases
{
	function sqlp($CODDES,$CODHAS,$codfacdes,$codfachas,$codartdes,$codarthas,$FECDES,$FECHAS,$STA,$CONDI)
	{

//print $CODHAS;exit;
      $estatus='';
      $condicion='';
        if ($STA =='A' OR $STA =='N')
          {
	$estatus=  "AND status ='".$STA."' ";

           }

		if ($CONDI =='C' OR $CONDI =='R')
          {
		    $condicion=  "AND TIPCONPAG ='".$CONDI."' ";

           }

					$sql= "SELECT
					A.REFFAC,
					A.FecAnu,
					to_char(A.FECFAC,'dd/mm/yyyy') as fecfac,
					A.CODCLI,
					A.DESFAC,
					A.MONFAC,
					CASE WHEN A.TIPREF='V' THEN 'Venta Directa' WHEN
					A.TIPREF='P' THEN 'Pedido' ELSE 'Despacho' END as tiporeferencia,
					A.MONDESC,
					--B.CODART,
					B.CANTOT,
					B.PRECIO,
					B.MONRGO,
					B.TOTART,
					C.DESART,
					CASE WHEN A.STATUS='A' THEN 'Activo' WHEN
					A.STATUS='N' THEN 'Anulado' END as estatus,
					D.NOMPRO,
					F.DESCONPAG
					FROM
					FAFACTUR A,
					FAARTFAC B,
					CAREGART C,
					FACLIENTE D,
					FACONPAG F

					WHERE
					A.CODCLI=D.CODPRO AND
					B.REFFAC=A.REFFAC AND
					B.CODART=C.CODART AND
					A.CODCONPAG=F.ID AND
					A.REFFAC >= '".$CODDES."'  AND
					A.REFFAC <= '".$CODHAS."' AND
					A.CODCLI >= '".$codfacdes."' AND
					A.CODCLI <= '".$codfachas."' AND
					B.CODART >= '".$codartdes."' AND
					B.CODART <= '".$codarthas."' AND
					A.FECFAC >= to_date('".$FECDES."','dd/mm/yyyy')  AND
					A.FECFAC <= to_date('".$FECHAS."','dd/mm/yyyy')
					" .$estatus."" .$condicion."
					ORDER BY A.REFFAC,A.CODCLI  ";
//H::PrintR($sql);exit;
return $this->select($sql);
	}

	function sqlp1($codpro, $reffac)
	{

					$sql="SELECT
					A.MONFAC,
					A.REFFAC as reffac,
					A.tipref,
					B.codart as codart,
					C.DESART,
					B.MONRGO,
					B.PRECIO,
					B.CANTOT,
					B.TOTART

					FROM
					FAFACTUR A,
					FAARTFAC B,
					CAREGART C,
					FACLIENTE D,
					FACONPAG F
					WHERE
					A.CODCLI=D.CODPRO AND
					B.REFFAC=A.REFFAC AND
					A.REFFAC='".$reffac."' AND
					B.CODART=C.CODART AND
					A.CODCONPAG=F.ID AND
					D.CODPRO= '".$codpro."'
					ORDER BY B.codart";

		//H::PrintR($sql);
		return $this->select($sql);
		//print $sql; exit;
	}
/*
	function sqlp2($codart,$reffac)
	{

			$sql="SELECT
					B.CANORD,A.CANTOT
				FROM FAARTFAC A,FAARTPED B
				WHERE
			         B.CODART='".$codart."' AND
			         --A.REFFAC='".$reffac."' AND
			         A.REFFAC=B.NROPED AND
			         A.CODART=B.CODART


				ORDER BY a.codart";
					//H::PrintR($sql);exit;
					return $this->select($sql);
					//print $sql; exit;
	}*/

		function sqlp2($CODIGO)
	{

$sql= "select    e.codart as codart, e.desart as articulo,
          sum(f.cantot) as cantidad, f.precio as precio, sum(f.monrgo) as recargo
         from
         caregart e,
         faartfac f
         where
         e.codart=f.codart and
         f.reffac = '".$CODIGO."'
        group by e.codart,e.desart,f.precio
          order by codart" ;

//H::PrintR($sql);exit;
return $this->select($sql);
	}

	function sqlp3($reffac,$codarticulo)
	{

			$sql="SELECT SUM(C.CANDES) as VALOR
			   FROM FAFACTUR A,
			        FANOTENT B,
			        FAARTNOT C
			   WHERE A.REFFAC='".$reffac."' AND
			         B.CODREF='".$reffac."' AND
			         C.CODART='".$codarticulo."' AND
			         B.TIPREF='FD' AND
			         C.NRONOT=B.NRONOT
				ORDER BY a.codart";
					//H::PrintR($sql);exit;
					return $this->select($sql);
		//print $sql; exit;
	}
}
?>
