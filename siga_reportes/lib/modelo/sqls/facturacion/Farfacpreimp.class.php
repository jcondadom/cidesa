<?php
require_once("../../lib/modelo/baseClases.class.php");

class Farfacpreimp extends baseClases
{
	function sqlp($CODDES,$CODHAS)
	{

$sql= "select distinct (a.reffac) as reffac, to_char(a.fecfac,'dd/mm/yyyy') as fecha, to_char(a.fecfindesc,'dd/mm/yyyy') as fechaven, 
          b.nompro as cliente,b.dirpro as direccion, b.telpro as telefono, b.rifpro as rif, b.nitpro as nit,
          h.desconpag as forma, c.destippag as pago,
          d.monpag as monto,g.banco as banco,
          d.numero as numero,a.observ as observacion, a.obstra as nota, mondesc as descuento, u.nomcon

         from fafactur a
         left outer join faconpag h on (a.codconpag=h.id)
         left outer join faforpag d on (a.reffac=d.reffac)
         left outer join faallbancos g on (d.nomban=g.ctaban)
         left outer join fatippag c on (d.tippag::integer=c.id)
		 left outer join faconsignatario u ON (a.codcon=u.codcon),
         facliente b,

         faartfac f
         where
         a.codcli=b.codpro and
         f.reffac=a.reffac and
         a.reffac >= '".$CODDES."' and
         a.reffac <= '".$CODHAS."'
          order by reffac ";
//H::PrintR($sql);exit;
return $this->select($sql);
	}

	function sqlp1($CODIGO)
	{

$sql= "select    e.codart as codart, f.desart as articulo,
          sum(f.cantot) as cantidad, f.precio as precio, sum(f.monrgo) as recargo
         from
         caregart e,
         faartfac f
         where
         e.codart=f.codart and
         f.reffac = '".$CODIGO."'
        group by e.codart,f.desart,f.precio
          order by codart" ;

//H::PrintR($sql);exit;
return $this->select($sql);
	}
		function sqlp2($CODIGO)  /// Este SQL se usará si se decide que pueda sumarse los montos parciales de la Factura
	{

       $sql= "select SUM(monpag) as monto
         from faforpag
           where
            reffac = '".$CODIGO."'
             group by reffac
             order by reffac " ;

//H::PrintR($sql);exit;
return $this->select($sql);
	}

		function sqlp5($REFFAC)
	{

$sql= "select   DISTINCT A.REFFAC, h.desconpag as forma, c.destippag as pago,
          d.monpag as monto,g.banco as banco,
          d.numero as numero

         from fafactur a
         left outer join faconpag h on (a.codconpag=h.id)
         left outer join faforpag d on (a.reffac=d.reffac)
         left outer join faallbancos g on (d.nomban=g.ctaban)
         left outer join fatippag c on (d.tippag=c.id),
         facliente b,

         faartfac f
         where
         a.codcli=b.codpro and
         f.reffac=a.reffac and
         a.reffac = '".$REFFAC."'
          order by A.reffac  ";
//H::PrintR($sql);exit;
return $this->select($sql);
	}

}
?>