<?php
require_once("../../lib/modelo/baseClases.class.php");

class Farpedart extends baseClases
{
	function sqlp($CODDES,$CODHAS,$codclides,$codclihas,$codartdes,$codarthas,$fechades,$fechahas,$estatus)
	{

$estatuspedido='';
if ($estatuspedido =='A' OR $estatus =='N')
          {
	$estatuspedido=  "AND status ='".$estatus."' ";
          }

$sql= "SELECT DISTINCT
A.NROPED,
A.FECPED,
A.DESPED,
A.OBSPED,
A.CODCLI,
B.CODART,
B.CANORD,
B.CANAJU,
B.CANDES,
B.CANTOT,
C.DESART,
C.UNIMED,
B.PREART,
B.TOTART,
D.NOMPRO,
CASE WHEN A.STATUS='A' THEN 'Activo' WHEN
A.STATUS='N' THEN 'Anulado' ELSE 'Ambas' END
FROM FAPEDIDO A,FAARTPED B,
CAREGART C,FACLIENTE D
WHERE
B.NROPED=A.NROPED AND
C.CODART=B.CODART AND
D.CODPRO=A.CODCLI AND
A.NROPED >= '".$CODDES."' AND
A.NROPED <= '".$CODHAS."' AND
A.CODCLI >= '".$codclides."' AND
A.CODCLI <= '".$codclihas."' AND
B.CODART >= '".$codartdes."' AND
B.CODART <= '".$codarthas."' AND
A.FECPED >= to_date('".$fechades."','dd/mm/yyyy') AND
A.FECPED <= to_date('".$fechahas."','dd/mm/yyyy')
" .$estatuspedido."
ORDER BY A.NROPED,A.CODCLI";
//H::PrintR($sql);exit;
return $this->select($sql);
	}

    function sqlp2($codpro)
	  {

	$sql="SELECT  distinct A.NROPED AS NROPED,a.desped as desped,to_date(A.FECPED,'yyyy/mm/dd') as fecped,
         CASE WHEN A.STATUS='A' THEN 'Activo' WHEN
         A.STATUS='N' THEN 'Anulado' ELSE 'Ambas' END
             FROM
	       FAPEDIDO A,FAARTPED B

	    WHERE
           B.NROPED=A.NROPED AND
           A.CODCLI='".$codpro."'
	ORDER BY A.NROPED";
		//H::PrintR($sql);exit;
		return $this->select($sql);
		//print $sql; exit;
	  }

	function sqlp1($pedido)
	{

	$sql="SELECT distinct

			B.CODART,
			B.CANORD,
			B.CANAJU,
			B.CANDES,
			B.CANTOT,
			C.DESART,
			C.UNIMED,
		    B.PREART,
			B.TOTART
	    FROM
	       FAPEDIDO A,FAARTPED B,
           CAREGART C
	    WHERE
           B.NROPED=A.NROPED AND A.NROPED='".$pedido."' AND
		   C.CODART=B.CODART
	    ORDER BY B.CODART";
		//H::PrintR($sql);exit;
		return $this->select($sql);
		//print $sql; exit;
	}

}
?>
