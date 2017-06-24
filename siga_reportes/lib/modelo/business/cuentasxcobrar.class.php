<?php
require_once("../../lib/modelo/baseClases.class.php");

class Cuentasxcobrar extends baseClases
{
	public static function catalogo_clientes($objhtml)
	{
		$sql="select distinct A.codpro as codigo, A.NOMpro AS nombre from facliente A, COBDOCUME B
        where A. codpro = B.CODCLI and (A.codpro like '%V_0%' AND A.NOMpro like '%V_1%') order by A.codpro";

		$catalogo = array(
		    $sql,
		    array('Codigo','Nombre'),
		    array($objhtml),
		    array('codigo','Nombre'),
		    100
		    );

	    return $catalogo;
	}
        
         public static function catalogo_facliente($objhtml)
	{
		$sql="select distinct  codpro as codigo, nompro as nombre from facliente WHERE (codpro like '%V_0%' AND nompro like '%V_1%') order by codpro";

		$catalogo = array(
		    $sql,
		    array('Codigo','Nombre'),
		    array($objhtml),
		    array('codigo','nombre'),
		    450
		    );

	    return $catalogo;
	}
        
        public static function catalogo_tipoclientesid($objhtml)
	{
		$sql="select distinct id as codigo, nomtipcte as descripcion from FATIPCTE where (nomtipcte like '%V_0%') order by id";

		$catalogo = array(
		    $sql,
		    array('Descripcion'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
        
        public static function catalogo_documentos($objhtml)
	{
		$sql="select distinct REFDOC as codigo, desdoc as descripcion from COBDOCUME WHERE STADOC='A' and (REFDOC like '%V_0%' AND desdoc like '%V_1%') order by REFDOC";

		$catalogo = array(
		    $sql,
		    array('Codigo','Descripcion'),
		    array($objhtml),
		    array('codigo','descripcion'),
		    100
		    );

	    return $catalogo;
	}
        
        public static function catalogo_client($objhtml)
	{
		$sql="SELECT codpro as codigo,nompro as nombre FROM facliente order by codpro";

		$catalogo = array(
		    $sql,
		    array('Codigo','Nombre'),
		    array($objhtml),
		    array('codigo','nombre'),
		    100
		    );

	    return $catalogo;
	}
        

   	public static function catalogo_factur($objhtml)
	{
		$sql="SELECT reffac as codigo,desfac as descripcion FROM fafactur";

		$catalogo = array(
		    $sql,
		    array('Codigo','Descripcion'),
		    array($objhtml),
		    array('codigo','descripcion'),
		    100
		    );

	    return $catalogo;
	}

		public static function catalogo_tipoclientes($objhtml)
	{
		$sql="select distinct codtipcli as codigo, nomtipcte as descripcion from FATIPCTE where (CODTIPCLI like '%V_0%' AND nomtipcte like '%V_1%') order by CODTIPCLI";

		$catalogo = array(
		    $sql,
		    array('Codigo','Descripcion'),
		    array($objhtml),
		    array('codigo','descripcion'),
		    100
		    );

	    return $catalogo;
	}

	   	public static function catalogo_abono($objhtml)
	{
		$sql="select distinct  NUMTRA as codigo, DESTRA as descripcion from COBTRANSA WHERE STATUS='A' and (NUMTRA like '%V_0%' AND DESTRA like '%V_1%') order by NUMTRA";

		$catalogo = array(
		    $sql,
		    array('Codigo','Descripcion'),
		    array($objhtml),
		    array('codigo','descripcion'),
		    100
		    );

	    return $catalogo;
	}


	public static function catalogo_factura($objhtml)
	{
		$sql="select distinct REFFAC as factura from COBDOCUME where (REFFAC like '%V_0%') order by REFFAC";

		$catalogo = array(
		    $sql,
		    array('Factura'),
		    array($objhtml),
		    array('factura'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_abonoclientes($objhtml)
	{
		$sql="select distinct (A.CODCLI) as codigo, A.NOMCLI as nombre from cobclient A, COBTRANSA B
        where A.CODCLI=B.CODCLI AND (A.CODCLI like '%V_0%' AND A.NOMCLI like '%V_1%') order by A.CODCLI";

		$catalogo = array(
		    $sql,
		    array('Codigo','Nombre'),
		    array($objhtml),
		    array('codigo','Nombre'),
		    100
		    );

	    return $catalogo;
	}

	   	public static function catalogo_transaccion($objhtml)
	{
		$sql="select distinct NUMTRA as codigo, destra as descripcion from COBTRANSA where (NUMTRA like '%V_0%' AND destra like '%V_1%') order by NUMTRA";

		$catalogo = array(
		    $sql,
		    array('Codigo','Descripcion'),
		    array($objhtml),
		    array('codigo','descripcion'),
		    100
		    );

	    return $catalogo;
	}
      	public static function catalogo_movimiento($objhtml)
	{
		$sql="select distinct codmov as codigo, desmov as descripcion from COBTIPMOV where (codmov like '%V_0%' AND desmov like '%V_1%') order by codmov";

		$catalogo = array(
		    $sql,
		    array('Codigo','Descripcion'),
		    array($objhtml),
		    array('codigo','descripcion'),
		    100
		    );

	    return $catalogo;
	}
        
        public static function catalogo_tipomovimiento($objhtml)
	{
		$sql="select distinct(id) as codigo, desmov as descripcion from FATIPMOV where (desmov like '%V_1%') order by id";

		$catalogo = array(
		    $sql,
		    array('Codigo','Descripcion'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}

        
         public static function catalogo_tipcte($objhtml)
	{
		$sql="select ID as codigo, nomtipcte as nombre from FATIPCTE where (nomtipcte like '%V_1%') order by ID";

		$catalogo = array(
		    $sql,
		   array('CODIGO','TIPO DE CLIENTE'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
   	public static function catalogo_tipomov($objhtml)
	{
		$sql="select  distinct codmov as codigo, desmov as descripcion from COBTIPMOV where (codmov like '%V_0%' AND desmov like '%V_1%') order by codmov";

		$catalogo = array(
		    $sql,
		    array('Codigo','Descripcion'),
		    array($objhtml),
		    array('codigo','descripcion'),
		    100
		    );

	    return $catalogo;
	}
        
        public static function catalogo_fecha($objhtml)
	{
		$sql="select to_char(fectra,'mm') || '/' || to_char(fectra,'yyyy')as fecha from cobtransa group by to_char(fectra,'yyyy'), to_char(fectra,'mm') order by to_char(fectra,'yyyy'), to_char(fectra,'mm')";

		$catalogo = array(
		    $sql,
		    array('Fecha Transacción'),
		    array($objhtml),
		    array('fecha'),
		    100
		    );

	    return $catalogo;
	}
        
        public static function catalogo_fechadoc($objhtml)
	{
		$sql="select to_char(fecemi,'dd/mm/yyyy') as fecha from cobdocume order by fecemi";

		$catalogo = array(
		    $sql,
		    array('Fecha Emision'),
		    array($objhtml),
		    array('fecha'),
		    100
		    );

	    return $catalogo;
	}
        
        public static function catalogo_recibo($objhtml)
	{
		$sql="select distinct numtra as recibo from cobtransa order by numtra";

		$catalogo = array(
		    $sql,
		    array('Recibo'),
		    array($objhtml),
		    array('recibo'),
		    100
		    );

	    return $catalogo;
	}
        
        public static function catalogo_codclientetra($objhtml)
	{
		$sql="select distinct codcli as cliente from cobtransa order by codcli";

		$catalogo = array(
		    $sql,
		    array('Cliente'),
		    array($objhtml),
		    array('cliente'),
		    100
		    );

	    return $catalogo;
	}
        
        public static function catalogo_fectran($objhtml)
	{
		$sql="select distinct fectra as fecha from cobtransa order by fectra";

		$catalogo = array(
		    $sql,
		    array('Fecha'),
		    array($objhtml),
		    array('fecha'),
		    100
		    );

	    return $catalogo;
	}
        
        public static function catalogo_nrofactura($objhtml)
	{
		$sql="select refdoc as codigo from cobdocume where (refdoc like '%V_0%') order by refdoc";

		$catalogo = array(
		    $sql,
		    array('Codigo'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
        
   	public static function catalogo_codcliente($objhtml)
	{
		$sql="select distinct codcli as cliente from cobdocume order by codcli";

		$catalogo = array(
		    $sql,
		    array('Cliente'),
		    array($objhtml),
		    array('cliente'),
		    100
		    );

	    return $catalogo;
	}
        
        public static function catalogo_fecfactura($objhtml)
	{
		$sql="select distinct fecemi as fecha from cobdocume order by fecemi";

		$catalogo = array(
		    $sql,
		    array('Fecha'),
		    array($objhtml),
		    array('fecha'),
		    100
		    );

	    return $catalogo;
	}

}

