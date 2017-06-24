<?php
require_once("../../lib/modelo/baseClases.class.php");

class Facrlibventas extends baseClases
{
   function sqlp($numfacdes,$numfachas,$fecfacdes,$fecfachas,$codclides,$codclihas)
	{

		$sql= "select to_char(a.fecfac, 'dd/mm/yyyy') as fecha, a.numfac,a.numctr as control, b.nompro as nombre,b.rifpro as rif,b.escontrib,
        a.totfac as totalventas, a.valfob,a.venexec as ventasexcentas, a.venexon, a.basimp,a.poriva, a.crefis, a.moniva, a.numcom 
       from fafaclib a, facliente b
           where
           a.codcli=b.codpro and
           a.numfac >= '".$numfacdes."' and 
           a.numfac <= '".$numfachas."' and
           a.codcli >= '".$codclides."' and
           a.codcli <= '".$codclihas."' and
		   to_date(to_char(a.fecfac,'yyyy'),'yyyy') = to_date('".$fecfacdes."','yyyy') and
		   to_date(to_char(a.fecfac,'mm'),'mm') <= to_date('".$fecfachas."','mm') order by a.numfac " ;
	//H::PrintR($sql);exit;
		return $this->select($sql);
			}

}
?>
