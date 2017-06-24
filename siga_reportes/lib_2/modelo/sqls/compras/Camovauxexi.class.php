<?php

require_once("../../lib/modelo/baseClases.class.php");

class Camovauxexi extends baseClases
{

  function sqlp($almdes,$almhas)
  {
  	 $sql="SELECT A.DPHART, A.FECDPH, A.CODORI,  B.DPHART, B.CODART, C.CODART, C.DESART,d.codubi, d.desubi
			FROM CADPHART A, CAARTDPH B, CAREGART c, bnubibie d
			WHERE
			b.codart>='".$codartdes."' and
			b.codart<='".$codarthas."' and
			a.fecdph>=to_date('".$fecdphdes."','dd/mm/yyyy') and 
			a.fecdph<=to_date('".$fecdphhas."','dd/mm/yyyy') and
			A.DPHART=B.dphart AND
			B.CODART=C.CODART and
			a.codori=d.codubi
			ORDER BY A.DPHART";
	H::printR($sql);exit;
   	 return $this->select($sql);
  }

}

?>