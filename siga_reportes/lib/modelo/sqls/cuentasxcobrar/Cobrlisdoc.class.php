<?php
require_once("../../lib/modelo/baseClases.class.php");

class Cobrlisdoc extends baseClases
{
	function sqlp($coddes,$codhas,$codctedes,$codctehas,$fechades,$fechahas,$tipmovdes,$tipmovhas)
	{

$sql= " SELECT A.REFDOC, to_char(A.FECEMI,'dd/mm/yyyy') as FECEMI, A.FATIPMOV_ID AS CODMOV, A.CODCLI as CODPRO,
B.NOMPRO as NOMPRO,
A.DESDOC, A.MONDOC,
A.MONDOC*(CASE WHEN C.DEBCRE='D' THEN 1 ELSE -1 END) as montoafe,
A.RECDOC,
A.RECDOC*(CASE WHEN C.DEBCRE='D' THEN 1 ELSE -1 END) AS RECDOCAFE,
A.DSCDOC,
A.DSCDOC *(CASE WHEN C.DEBCRE='D' THEN 1 ELSE -1 END) AS DSCDOCAFE,
A.SALDOC,
(A.MONDOC+A.RECDOC-A.DSCDOC) *(CASE WHEN C.DEBCRE='D' THEN 1 ELSE -1 END) AS SALDOCAFE
FROM COBDOCUME A,
FACLIENTE B,FATIPMOV C
WHERE A.CODCLI >= '".$codctedes."' AND
A.CODCLI <= '".$codctehas."' AND
A.REFDOC >= '".$coddes."' AND
A.REFDOC <= '".$codhas."' AND
A.FATIPMOV_ID >= '".$tipmovdes."' AND
A.FATIPMOV_ID <= '".$tipmovhas."' AND
A.FECEMI >= to_date('".$fechades."','dd/mm/yyyy') AND
A.FECEMI <= to_date('".$fechahas."','dd/mm/yyyy') AND
A.STADOC='A' AND
A.FATIPMOV_ID=C.ID AND
A.CODCLI=B.CODPRO
GROUP BY
A.REFDOC, A.FECEMI, A.FATIPMOV_ID, A.CODCLI, B.NOMPRO,
A.DESDOC, A.MONDOC, A.RECDOC, A.DSCDOC, A.SALDOC,C.DEBCRE
ORDER BY A.FECEMI,A.REFDOC, CODMOV";
//print '<pre>';H::PrintR($sql);exit;
return $this->select($sql);
	}

}
