<?php
require_once("../../lib/modelo/baseClases.class.php");

class Cobrdoccli extends baseClases
{
	function sqlp($coddes,$codhas,$codctedes,$codctehas,$fechades,$fechahas,$tipctedes,$tipctehas)
	{
		$sql="SELECT distinct (A.CODCLI ) as CODPRO,
C.ID as codtipo,C.NOMTIPCTE as tipo
FROM COBDOCUME A,
FACLIENTE B,
FATIPCTE C
WHERE A.CODCLI >= '".$codctedes."' AND
A.CODCLI <= '".$codctehas."' AND
A.REFDOC >= '".$coddes."' AND
A.REFDOC <= '".$codhas."' AND
A.FECEMI >= to_date('".$fechades."','dd/mm/yyyy') AND
A.FECEMI <= to_date('".$fechahas."','dd/mm/yyyy') AND
B.FATIPCTE_ID >= '".$tipctedes."' AND
B.FATIPCTE_ID <= '".$tipctehas."' AND
A.STADOC='A' AND
B.FATIPCTE_ID=C.ID AND
A.CODCLI=B.CODPRO
ORDER BY C.ID, A.CODCLI, C.NOMTIPCTE";

$sql2= " SELECT A.REFDOC,
C.NOMTIPCTE as tipo,C.ID as codtipo, A.CODCLI as CODPRO

FROM COBDOCUME A,
FACLIENTE B,
FATIPCTE C

WHERE A.CODCLI >= '".$codctedes."' AND
A.CODCLI <= '".$codctehas."' AND
A.REFDOC >= '".$coddes."' AND
A.REFDOC <= '".$codhas."' AND
A.FECEMI >= to_date('".$fechades."','dd/mm/yyyy') AND
A.FECEMI <= to_date('".$fechahas."','dd/mm/yyyy') AND
B.FATIPCTE_ID >= '".$tipctedes."' AND
B.FATIPCTE_ID <= '".$tipctehas."' AND
A.STADOC='A' AND
B.FATIPCTE_ID=C.ID AND
A.CODCLI=B.CODPRO
GROUP BY A.REFDOC,
A.FECEMI,C.ID,
A.DESDOC,
A.MONDOC,
A.SALDOC,
B.NOMPRO,
B.RIFPRO,
B.NITPRO,
B.LIMCRE,
C.NOMTIPCTE, A.CODCLI

ORDER BY C.ID, A.CODCLI,A.FECEMI";
//H::PrintR($sql);
return $this->select($sql);
	}

  function sqlp1($codcli,$tipo,$fechades,$fechahas)
	{

$sql= " SELECT A.REFDOC as referencia,
B.NOMPRO as nompro,
B.RIFPRO as rifpro,
B.NITPRO as nitpro,
B.CODPRO as codpro
FROM COBDOCUME A,
FACLIENTE B,
FATIPCTE C

WHERE
B.CODPRO      ='".$codcli."' AND
B.FATIPCTE_ID ='".$tipo."' AND
A.FECEMI >= to_date('".$fechades."','dd/mm/yyyy') AND
A.FECEMI <= to_date('".$fechahas."','dd/mm/yyyy') AND
A.STADOC      ='A' AND
B.FATIPCTE_ID =C.ID AND
A.CODCLI      =B.CODPRO
GROUP BY A.REFDOC,C.ID,
A.FECEMI,
A.DESDOC,
A.MONDOC,
A.SALDOC,
B.NOMPRO,
B.RIFPRO,
B.NITPRO,
B.LIMCRE,B.CODPRO,
C.NOMTIPCTE ORDER BY B.NOMPRO, A.REFDOC, A.FECEMI";
//H::PrintR($sql);exit;
return $this->select($sql);
	}
  function sqlp2($codcli,$refdoc,$fechades,$fechahas)
	{

$sql= " SELECT A.REFDOC as referencia,
to_char(A.FECEMI,'dd/mm/yyyy') as fecha,
A.DESDOC as descripcion,
A.MONDOC*(CASE WHEN D.DEBCRE='D' THEN 1 ELSE -1 END) AS MONDOC,
a.recdoc*(CASE WHEN D.DEBCRE='D' THEN 1 ELSE -1 END ) AS RECDOC,
(A.MONDOC + a.recdoc)*(CASE WHEN D.DEBCRE='D' THEN 1 ELSE -1 END) as total,
A.SALDOC*(CASE WHEN D.DEBCRE='D' THEN 1 ELSE -1 END) as saldoactual,
SUM(A.SALDOC*(CASE WHEN D.DEBCRE='D' THEN 1 ELSE -1 END)) AS MONTO,
B.NOMPRO as nombre, B.CODPRO as codigo,
B.RIFPRO AS RIFCLI,
B.NITPRO AS NITCLI,
B.LIMCRE
FROM COBDOCUME A,
FACLIENTE B,
FATIPCTE C,FATIPMOV D
WHERE
B.CODPRO='".$codcli."' AND
A.REFDOC='".$refdoc."' AND
A.FECEMI >= to_date('".$fechades."','dd/mm/yyyy') AND
A.FECEMI <= to_date('".$fechahas."','dd/mm/yyyy') AND
A.STADOC='A' AND
A.FATIPMOV_ID=D.ID AND
B.FATIPCTE_ID=C.ID AND
A.CODCLI=B.CODPRO
GROUP BY A.REFDOC,C.ID,D.DEBCRE,
A.FECEMI,
A.DESDOC,
A.MONDOC,a.recdoc,
A.SALDOC,
B.NOMPRO,
B.RIFPRO,
B.NITPRO,
B.LIMCRE, B.CODPRO,
C.NOMTIPCTE ORDER BY  A.REFDOC, A.FECEMI";
//H::PrintR($sql); exit;
return $this->select($sql);
	}


}
