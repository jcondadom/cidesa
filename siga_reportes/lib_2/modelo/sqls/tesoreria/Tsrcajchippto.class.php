<?php

require_once("../../lib/modelo/baseClases.class.php");

class Tsrcajchippto extends baseClases
{

 function sqlp($mincodpre,$maxcodpre,$fecmin,$fecmax)
  {
  	    $sql="
		select (c.codcat||'-'||d.codpar) as codpre, b.nompre, sum (c.monsal ) as monto
		from
		tsdetsal c, caregart d, tssalcaj a, cpdeftit b
		where 
		a.refsal=c.refsal and
		c.codart=d.codart and
		(c.codcat||'-'||d.codpar)=b.codpre and
		
		(c.codcat||'-'||d.codpar)>='$mincodpre'		and (c.codcat||'-'||d.codpar)<='$maxcodpre'  and
		a.fecsal>=to_date('".$fecmin."','dd/mm/yyyy') and
    	a.fecsal<=to_date('".$fecmax."','dd/mm/yyyy')
		group by (c.codcat||'-'||d.codpar),b.nompre
		order by
		(c.codcat||'-'||d.codpar)";
       //H::PrintR($sql);exit;

   return $this->select($sql);
  }


 function disponibilidad($codpre)
  {
  	    $sql="select mondis as saldo from cpasiini where codpre='$codpre' and perpre='00' ";
  	    //$sql="select sum(mondis) as saldo from cpasiini where codpre='$codpre' and perpre='00' group by codpre";
   //   H::PrintR($sql);exit;

   return $this->select($sql);
  }

}
?>