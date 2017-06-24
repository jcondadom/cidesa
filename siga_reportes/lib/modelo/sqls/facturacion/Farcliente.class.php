<?php
require_once("../../lib/modelo/baseClases.class.php");

class Farcliente extends baseClases
{
	function sqlp($coddes,$codhas,$rifdes,$rifhas,$nomdes,$nomhas)
	{

$sql= "SELECT A.CODPRO, A.NOMPRO,
		--DECODE(A.TIPPER,'N','Natural','J','Juridica') TIPPER, -- Aclarar como se usa el Case en Postgres
        A.RIFPRO,
		A.DIRPRO,
		A.CODCTA,
		A.TELPRO,
		A.TIPO
		--B.NOMTIPCTE
		FROM FACLIENTE A--,FATIPCTE B
	WHERE
		--A.TIPCLI=B.CODTIPCLI AND     ---La Tabla FATIPCTE no contiene el campo CODTIPCLI
		A.CODPRO >= '".$coddes."' AND
		A.CODPRO <= '".$codhas."' AND
		A.RIFPRO >= '".$rifdes."' AND
		A.RIFPRO <= '".$rifhas."' AND
		A.NOMPRO >= '".$nomdes."' AND
		A.NOMPRO <= '".$nomhas."' ";
//H::PrintR($sql);exit;
return $this->select($sql);
	}

}
?>
