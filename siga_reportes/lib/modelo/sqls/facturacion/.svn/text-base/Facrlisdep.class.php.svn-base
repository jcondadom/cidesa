<?php
require_once("../../lib/modelo/baseClases.class.php");

class Facrlisdep extends baseClases
{
	function sqlp($dphdes,$dphhas,$clides,$clihas,$artdes,$arthas,$fecdes,$fechas)
	{
            $sql="select c.codpro,c.nompro,to_char(b.fecdph,'dd/mm/yyyy') as fecha, a.codart,f.desart,a.candph,
                     coalesce((select x.cantot from faartfac x where x.reffac=d.reffac and x.codart=a.codart),0) as canfactot,
                     coalesce((select z.cantot from faartped z where z.nroped=e.nroped and z.codart=a.codart),0) as canpedtot
                     from caartdph a, cadphart b left outer join  fafactur d on (b.reqart=d.reffac)
                     left outer join fapedido e on(b.reqart=e.nroped), facliente c, caregart f
                    where
                    a.dphart>='$dphdes' and
                    a.dphart<='$dphhas' and
                    b.codcli>='$clides' and
                    b.codcli<='$clihas' and
                    a.codart>='$artdes' and
                    a.codart<='$arthas' and
                    b.fecdph>=to_date('$fecdes','dd/mm/yyyy') and
                    b.fecdph<=to_date('$fechas','dd/mm/yyyy') and
                    a.dphart=b.dphart and
                    b.codcli=c.codpro and
                    a.codart=f.codart and
                    b.tipref='F' and
                    f.tipo='A'
                    order by c.codpro,a.codart,b.fecdph";
            return $this->select($sql);
        }
}
?>