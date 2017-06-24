<?php
require_once("../../lib/modelo/baseClases.class.php");

class Cobrbalpar extends baseClases
{
	function sqlp($codclides,$codclihas,$fechad,$fechah)
	{
		$sql="

SELECT  Q.CODPRO, Q.NOMCLI, '' AS RIFCLI,'' AS DIRCLI,'' AS TELCLI,
Q.REFE,
'' AS FECHA, TO_DATE('','dd/mm/yyyy') as fecha1,
'SALDO ANTERIOR' as DES,
 Q.MONTO ,
 Q.TOTDOC,
 Q.TOTTRA,
'' as CODMOV,
'' as DEBCRE,
'1' as ORDEN FROM (
select DISTINCT(codpro),NOMCLI , 'Saldo Anteriror' as REFE,sum(monto) as monto ,sum(totdoc) as TOTDOC, sum(tottra) as TOTTRA
from
(SELECT A.CODCLI as CODPRO, C.NOMPRO AS NOMCLI, C.RIFPRO AS RIFCLI,  C.DIRPRO AS DIRCLI,C.TELPRO AS TELCLI,
A.REFDOC as REFE,
to_char(A.FECEMI,'dd/mm/yyyy') AS FECHA, a.fecemi as fecha1,
A.DESDOC as DES,
coalesce(A.MONDOC,0)::numeric as MONTO ,
CASE WHEN B.DEBCRE='D' THEN (A.MONDOC+a.recdoc) else 0  END AS TOTDOC,
CASE WHEN B.DEBCRE='D' THEN 0 else (A.MONDOC+a.recdoc) END AS TOTTRA,
B.NOMABR as CODMOV,
B.DEBCRE as DEBCRE,
'1' as ORDEN
FROM COBDOCUME A,FATIPMOV B,FACLIENTE C
WHERE A.CODCLI=C.CODPRO AND
A.FATIPMOV_ID=B.ID AND
A.STADOC='A' AND
A.FECEMI < to_date('".$fechad."','dd/mm/yyyy')  AND
A.CODCLI>=('".$codclides."') AND
A.CODCLI<=('".$codclihas."')

UNION
SELECT DISTINCT(D.CODCLI) as CODPRO, B.NOMPRO AS NOMCLI, B.RIFPRO AS RIFCLI, B.DIRPRO AS DIRCLI,B.TELPRO AS TELCLI,
D.NUMTRA as REFE,
to_char(D.FECTRA,'dd/mm/yyyy') AS FECHA,d.fectra as fecha1,
D.DESTRA as DES,
coalesce(D.TOTTRA,0)::numeric as MONTO,
CASE WHEN E.DEBCRE='C' THEN 0  END AS TOTDOC,
CASE WHEN E.DEBCRE='C' THEN (D.TOTTRA+D.TOTDSC)  END AS TOTTRA,
E.NOMABR AS CODMOV,
E.DEBCRE as DEBCRE,
'4' AS ORDEN
FROM   COBTRANSA D,FATIPMOV E,
COBDETTRA C, COBDOCUME A, FACLIENTE B
WHERE D.CODCLI=B.CODPRO AND
D.FATIPMOV_ID=E.ID AND
D.STATUS='A'  AND
D.NUMTRA=C.NUMTRA AND
D.CODCLI=C.CODCLI AND
C.CODCLI=A.CODCLI AND
C.REFDOC=A.REFDOC AND
D.FECTRA < to_date('".$fechad."','dd/mm/yyyy')  AND
D.CODCLI>=('".$codclides."') AND
D.CODCLI<=('".$codclihas."')) w
group by codpro,NOMCLI
order by W.CODPRO) Q
UNION
(SELECT A.CODCLI as CODPRO, C.NOMPRO AS NOMCLI, C.RIFPRO AS RIFCLI,  C.DIRPRO AS DIRCLI,C.TELPRO AS TELCLI,
A.REFDOC as REFE,
to_char(A.FECEMI,'dd/mm/yyyy') AS FECHA, a.fecemi as fecha1,
A.DESDOC as DES,
coalesce(A.MONDOC,0)::numeric as MONTO ,
CASE WHEN B.DEBCRE='D' THEN (A.MONDOC+a.recdoc) else 0  END AS TOTDOC,
CASE WHEN B.DEBCRE='D' THEN 0 else (A.MONDOC+a.recdoc) END AS TOTTRA,
B.NOMABR as CODMOV,
B.DEBCRE as DEBCRE,
'1' as ORDEN
FROM COBDOCUME A,FATIPMOV B,FACLIENTE C
WHERE A.CODCLI=C.CODPRO AND
A.FATIPMOV_ID=B.ID AND
A.STADOC='A' AND
A.FECEMI >=to_date('".$fechad."','dd/mm/yyyy')  AND
A.FECEMI <=to_date('".$fechah."','dd/mm/yyyy') and
A.CODCLI>=('".$codclides."') AND
A.CODCLI<=('".$codclihas."')

UNION
SELECT DISTINCT(D.CODCLI) as CODPRO, B.NOMPRO AS NOMCLI, B.RIFPRO AS RIFCLI, B.DIRPRO AS DIRCLI,B.TELPRO AS TELCLI,
D.NUMTRA as REFE,
to_char(D.FECTRA,'dd/mm/yyyy') AS FECHA,d.fectra as fecha1,
D.DESTRA as DES,
coalesce(D.TOTTRA,0)::numeric as MONTO,
CASE WHEN E.DEBCRE='C' THEN 0  END AS TOTDOC,
CASE WHEN E.DEBCRE='C' THEN (D.TOTTRA+D.TOTDSC)  END AS TOTTRA,
E.NOMABR AS CODMOV,
E.DEBCRE as DEBCRE,
'4' AS ORDEN
FROM   COBTRANSA D,FATIPMOV E,
COBDETTRA C, COBDOCUME A, FACLIENTE B
WHERE D.CODCLI=B.CODPRO AND
D.FATIPMOV_ID=E.ID AND
D.STATUS='A'  AND
D.NUMTRA=C.NUMTRA AND
D.CODCLI=C.CODCLI AND
C.CODCLI=A.CODCLI AND
C.REFDOC=A.REFDOC AND
D.FECTRA >=to_date('".$fechad."','dd/mm/yyyy')  AND
D.FECTRA <=to_date('".$fechah."','dd/mm/yyyy') and
D.CODCLI>=('".$codclides."') AND
D.CODCLI<=('".$codclihas."'))

order by CODPRO,fecha1,REFE;

";
//print '<pre>';H::PrintR($sql);exit;
return $this->select($sql);
	}

	function sqlsalant($codclides,$codclihas,$fechad,$fechah)
	{
		$sql="

(SELECT A.CODCLI as CODPRO, C.NOMPRO AS NOMCLI, C.RIFPRO AS RIFCLI,  C.DIRPRO AS DIRCLI,C.TELPRO AS TELCLI,
A.REFDOC as REF,
to_char(A.FECEMI,'dd/mm/yyyy') AS FECHA, a.fecemi as fecha1,
A.DESDOC as DES,
coalesce(A.MONDOC,0)::numeric as MONTO ,
CASE WHEN B.DEBCRE='D' THEN (A.MONDOC+a.recdoc) else 0  END AS TOTDOC,
CASE WHEN B.DEBCRE='D' THEN 0 else (A.MONDOC+a.recdoc) END AS TOTTRA,
B.NOMABR as CODMOV,
B.DEBCRE as DEBCRE,
'1' as ORDEN
FROM COBDOCUME A,FATIPMOV B,FACLIENTE C
WHERE A.CODCLI=C.CODPRO AND
A.FATIPMOV_ID=B.ID AND
A.STADOC='A' AND
A.FECEMI <=to_date('".$fechad."','dd/mm/yyyy')  AND
A.CODCLI>=('".$codclides."') AND
A.CODCLI<=('".$codclihas."')

UNION
SELECT DISTINCT(D.CODCLI) as CODPRO, B.NOMPRO AS NOMCLI, B.RIFPRO AS RIFCLI, B.DIRPRO AS DIRCLI,B.TELPRO AS TELCLI,
D.NUMTRA as REF,
to_char(D.FECTRA,'dd/mm/yyyy') AS FECHA,d.fectra as fecha1,
D.DESTRA as DES,
coalesce(D.TOTTRA,0)::numeric as MONTO,
CASE WHEN E.DEBCRE='C' THEN 0  END AS TOTDOC,
CASE WHEN E.DEBCRE='C' THEN (D.TOTTRA+D.TOTDSC)  END AS TOTTRA,
E.NOMABR AS CODMOV,
E.DEBCRE as DEBCRE,
'4' AS ORDEN
FROM   COBTRANSA D,FATIPMOV E,
COBDETTRA C, COBDOCUME A, FACLIENTE B
WHERE D.CODCLI=B.CODPRO AND
D.FATIPMOV_ID=E.ID AND
D.STATUS='A'  AND
D.NUMTRA=C.NUMTRA AND
D.CODCLI=C.CODCLI AND
C.CODCLI=A.CODCLI AND
C.REFDOC=A.REFDOC AND
D.FECTRA <=to_date('".$fechad."','dd/mm/yyyy')  AND
D.CODCLI>=('".$codclides."') AND
D.CODCLI<=('".$codclihas."'))

order by CODPRO,fecha1,REF;

";
//print '<pre>';H::PrintR($sql);exit;
return $this->select($sql);
	}

}


