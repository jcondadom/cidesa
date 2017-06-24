<?php
require_once("../../lib/modelo/baseClases.class.php");

class Fardefpre extends baseClases
{
	function sqlp($CODDES,$CODHAS,$CODPDES,$CODPHAS)
	{


		$sql= "SELECT
		A.CODART,
		A.ID,
		A.PVPART,
		A.DESPVP,
		B.DESART
		FROM FAARTPVP A,CAREGART B
		WHERE
		A.CODART=B.CODART AND
		A.CODART >= '".$CODDES."' AND
		A.CODART <= '".$CODHAS."' AND
		A.ID >= '".$CODPDES."' AND
		A.ID <= '".$CODPHAS."'
		ORDER BY A.CODART, A.ID";
		//H::PrintR($sql);
return $this->select($sql);
	}

}
?>
