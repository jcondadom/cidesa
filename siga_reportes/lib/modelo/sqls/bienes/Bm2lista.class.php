<?php
require_once("../../lib/modelo/baseClases.class.php");

class Bm2lista extends baseClases
{
    function SQLp($ubiorides,$ubiorihas,$fecdes,$fechas,$codactmin,$codactmax, $codmuemin, $codmuemax,$coddisdes,$coddishas,$nrodismuemin,$nrodismuemax)

    {
    	$sql="select
    		 count(codact) as numero, tipdismue as tipdismue 
		from bndismue
    		 where
    		 codubiori>='".$ubiorides."' and
    		 codubiori<='".$ubiorihas."' and
    		 codact>='".$codactmin."' and
    		 codact<='".$codactmax."' and
    		 codmue>='".$codmuemin."' and
    		 codmue<='".$codmuemax."' and
    		 substr(tipdismue,0,7)>='".$coddisdes."' and  substr(tipdismue,0,7)<='".$coddishas."' and
    		 nrodismue>='".$nrodismuemin."' and
    		 nrodismue<='".$nrodismuemax."' and
    		 fecdismue>=to_date('".$fecdes."','dd/mm/yyyy') and
    		 fecdismue<=to_date('".$fechas."','dd/mm/yyyy') 
    		 group by tipdismue  	";
    	//H::printR($sql);exit;
    	return $this->select($sql);
    }

  	
 }
?>