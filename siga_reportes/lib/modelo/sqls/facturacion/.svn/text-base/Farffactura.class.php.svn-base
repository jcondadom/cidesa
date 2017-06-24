<?php
require_once("../../lib/modelo/baseClases.class.php");

class Farffactura extends baseClases
{
	// ($this->fechades,$this->fechahas,$this->status,$this->codfacdes,$this->codfachas,$this->plazo,$this->codclides,$this->codclihas);
	function sqlp($FECDES,$FECHAS,$STA,$codfacdes,$codfachas,$PLAZO,$codclides,$codclihas)
	{
      $estatus='';
        if ($STA =='A' OR $STA =='C')
          {
	$estatus=  "AND TIPCONPAG ='".$STA."' ";

           }
$sql= "SELECT
A.REFFAC,b.monrgo as montorecargo,
to_char(A.FECFAC,'dd/mm/yyyy') as fecfac,
A.DESFAC,
A.MONFAC,
A.MONDESC,
CASE WHEN A.STATUS='A' THEN 'Contado' WHEN
A.STATUS='C' THEN 'Credito' ELSE 'Ambas' END,
A.OBSERV,
A.TIPREF,
B.CODART,
B.CODREF,
B.CANTOT,
B.PRECIO,
B.MONRGO,
B.TOTART,
RTRIM(C.DESART) as DESART,
C.UNIMED,
D.CODPRO,
D.NOMPRO,
D.RIFPRO,
D.NITPRO,
D.DIRPRO,
D.TIPO, g.banco as banco,e.numero as numero,
f.destippag as pago,h.desconpag as forma
FROM FAFACTUR A  left outer join faconpag h on (a.codconpag=h.id),
FAARTFAC B,
CAREGART C,
FACLIENTE D,
faforpag e left outer join faallbancos g on (e.nomban=g.ctaban),
fatippag f
WHERE
f.id=e.tippag::integer     and
A.REFFAC=e.REFFAC AND B.REFFAC=A.REFFAC AND
A.CODCLI=D.CODPRO AND
B.CODART=C.CODART AND
A.REFFAC >= '".$codfacdes."' and
A.REFFAC <= '".$codfachas."' AND
A.CODCLI >='".$codclides."' AND
A.CODCLI <= '".$codclihas."' AND
A.FECFAC >= to_date('".$FECDES."','dd/mm/yyyy') AND
A.FECFAC <= to_date('".$FECHAS."','dd/mm/yyyy') --AND
--A.CODCONPAG=E.id
ORDER BY A.REFFAC ";
//H::PrintR($sql);exit;
return $this->select($sql);
	}

	function sqlp1($codpro)
	{

	$sql=" select  c.codart, c.desart, b.cantot,b.precio,b.monrgo as recargo
      from FAFACTUR A,
           FAARTFAC B,
           CAREGART C
         --FACLIENTE D,
         --CACONPAG E
      where
            a.reffac = b.reffac and
            b.codart = c.codart and
            a.codcli='".$codpro."' order by b.codart";
		//H::PrintR($sql);exit;
		return $this->select($sql);
		//print $sql; exit;
	}




}
?>
