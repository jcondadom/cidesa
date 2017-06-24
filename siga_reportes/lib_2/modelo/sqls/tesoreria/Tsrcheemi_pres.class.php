<?php

require_once("../../lib/modelo/baseClases.class.php");

class Tsrcheemi_pres extends baseClases
{

 function sqlp($numche1,$numche2,$numcue1,$numcue2,$status,$bendes,$benhas,$fechades,$fechahas)
  {
  	$estatus='';

 /* 	if ($status=='A')
  	  	{
  		$estatus= "AND a.status ='".$status."' ";
     	}*/
    if ($status=='T')
  	  	{
  		$estatus= "";
     	}else $estatus= "AND a.status ='".$status."' ";

  	 $sql="select distinct rtrim(a.numche) as numche,to_char(a.fecemi,'dd/mm/yyyy') as fecemi1,a.fecemi,
  	 	(CASE WHEN A.STATUS='A' THEN 'ANULADO' WHEN A.STATUS='C' THEN  'CAJA' WHEN A.STATUS='E' THEN  'ENTREGADO' END) as status,
  	 	rtrim(c.nomben) as nomben,a.monche,a.numcue,b.nomcue, d.refpag, e.refere, e.refcom
        from tsdefban b, opbenefi c, tsmovlib d, tscheemi a, cpimppag e
        --left join opordpag e on rtrim(a.numche)=rtrim(e.numche)
        where
        rtrim(a.numcue)=rtrim(b.numcue) and rtrim(a.numche)=rtrim(d.reflib) and
	 rtrim(d.refpag)=rtrim(e.refpag) and
        rtrim(a.numcue)=rtrim(d.numcue) and rtrim(a.cedrif)=rtrim(c.cedrif) and
        rtrim(a.numche)>=rtrim('".trim($numche1)."') and rtrim(a.numche)<=rtrim('".trim($numche2)."') and
        rtrim(a.numcue)>=rtrim('".trim($numcue1)."') and rtrim(a.numcue)<=rtrim('".trim($numcue2)."') and
        trim(A.CEDRIF) >= trim('".$bendes."') and
        trim(A.CEDRIF) <= trim('".$benhas."') and (a.fecemi) >= to_date('".$fechades."','dd-mm-yyyy')
	 AND (a.fecemi) <= to_date('".$fechahas."','dd-mm-yyyy') " .$estatus."
        order by a.numcue,a.fecemi, rtrim(a.numche)";

//H::PrintR($sql);exit;
//print '<pre>'; print $sql;
   return $this->select($sql);
  }


  function sqlpx($numche1,$numche2,$numcue1,$numcue2)
  {
	$sql="select a.numord, b.numche, c.refpag
		from opordche a, tscheemi b, tsmovlib c
		where
		rtrim(a.numche)>=('".$numche1."') and
		rtrim(a.numche)<=('".$numche2."') and
		rtrim(a.codcta)>=rtrim('".trim($numcue1)."') and 
		rtrim(a.codcta)<=rtrim('".trim($numcue2)."') and

		rtrim(a.numche)=rtrim(b.numche)and
		rtrim(a.codcta)=rtrim(b.numcue) and
		rtrim(a.codcta)=rtrim(c.numcue)

		
		order by a.numord";
     
		//print '<pre>'; print $sql;exit;


   	return $this->select($sql);
  }
}
?>