<?php
require_once("../../lib/modelo/baseClases.class.php");

class Cobrlistra extends baseClases
{
	function sqlp($coddes,$codhas,$codctedes,$codctehas,$fechades,$fechahas,$tipmovdes,$tipmovhas,$tipctedes,$tipctehas) //
	{

$sql= "SELECT distinct
A.NUMTRA,to_char(A.FECTRA,'dd/mm/yyyy') as fectra, A.DESTRA,C.CODPRO as CODPRO , C.NOMPRO AS NOMPRO,
B.DESMOV, F.REFDOC, D.MONPAG AS PAGO, D.MONDSC AS DESCUENTO, D.MONREC AS RECARGO, D.TOTPAG AS TOTPAG, a.montra, g.numcom, g.feccom, g.moncom
FROM COBTRANSA A,
FATIPMOV B,
FACLIENTE C,
COBDETTRA D,
FATIPCTE E ,
COBDOCUME F,
contabc G		
WHERE A.NUMTRA >= '".$coddes."' AND
A.NUMTRA <= '".$codhas."' AND
A.CODCLI >=  '".$codctedes."' AND
A.CODCLI <= '".$codctehas."' AND
A.FATIPMOV_ID >= '".$tipmovdes."' AND
A.FATIPMOV_ID <= '".$tipmovhas."' AND
A.FECTRA >= to_date('".$fechades."','dd/mm/yyyy') AND
A.FECTRA <=to_date('".$fechahas."','dd/mm/yyyy') AND
C.FATIPCTE_ID >= '".$tipctedes."' AND
C.FATIPCTE_ID <= '".$tipctehas."' AND
STATUS='A' AND
C.FATIPCTE_ID=E.ID AND
A.NUMTRA=D.NUMTRA AND
D.CODCLI=C.CODPRO AND
A.FATIPMOV_ID=B.ID and
C.CODPRO = F.CODCLI AND
D.REFDOC = F.REFDOC  and a.numcom=g.numcom
ORDER BY A.NUMTRA";
//H::PrintR($sql);exit;
return $this->select($sql);
	}

}
