<?php
require_once("../../lib/modelo/baseClases.class.php");

class Fardphart extends baseClases
{
	function sqlp($CODDES,$CODHAS,$codclides,$codclihas,$codartdes,$codarthas,$codalmdes,$codalmhas,$fechades,$fechahas,$estatus,$tiprefe)
	{


$tiporefe='';
$estatusdesp='';
if ($estatus =='A' OR $estatus =='N')
          {
	$estatusdesp=  "AND STADPH ='".$estatus."' ";
          }
/*if ($tiprefe =='NE' OR $tiprefe =='D' OR $tiprefe =='R')
          {
	$tiporefe=  "AND TIPNOT ='".$tiporefe."' ";

          }*/

				$sql= "SELECT DISTINCT
				A.DPHART,
				A.DESDPH,
				to_char(A.FECDPH,'dd/mm/yyyy') as fecdph,
				A.MONDPH,
				A.CODALM,
				A.OBSDPH,
				A.CODCLI,
				A.FORDESP,
				G.NOMPRO,
				--B.CODART,
				--C.DESART,
				--C.UNIMED,
				--B.NUMLOT,
				--B.CANDPH,
				--B.CANDEV,
				--C.COSPRO,
				--B.MONTOT,
                                case when a.tipref='F' then a.reqart else '' end as factura,
                                case when a.tipref='P' then a.reqart else '' end as pedido,
				CASE WHEN A.STADPH='A' THEN 'Activo' WHEN
				A.STADPH='N' THEN 'Anulado' ELSE 'Ambas' END,
				TRIM(E.NOMALM) as NOMALM,
				(select F.NOMDES from FAFORDES F where F.ID=A.FORDESP::numeric) as nomdes
				--F.NOMDES
				FROM CADPHART A,CAARTDPH B,CAREGART C,CADEFALM E,FAFORDES F,FACLIENTE G
				WHERE
				B.DPHART=A.DPHART AND
				C.CODART=B.CODART AND
				E.CODALM=B.CODALM AND
				--F.ID=A.FORDESP AND
				G.CODPRO=A.CODCLI AND
				A.DPHART >= '".$CODDES."' AND
				A.DPHART <= '".$CODHAS."' AND
				A.CODCLI >= '".$codclides."' AND
				A.CODCLI <= '".$codclihas."' AND
				B.CODART >= '".$codartdes."' AND
				B.CODART <= '".$codarthas."' AND
				B.CODALM >= '".$codalmdes."' AND
				B.CODALM <= '".$codalmhas."' AND
				A.FECDPH >= to_date('".$fechades."','dd/mm/yyyy')  AND
				A.FECDPH <= to_date('".$fechahas."','dd/mm/yyyy')
				".$estatusdesp."" .$tiporefe."
				ORDER BY A.DPHART";
				#H::PrintR($sql);exit;
				return $this->select($sql);
	}

	function sqlp1($coddph)
	{

	$sql="SELECT
B.CODART,B.MONTOT as montot,
C.DESART,
CASE WHEN A.TIPDPH='NE' THEN 'Entrega' WHEN
A.TIPDPH='D' THEN 'Devolucion' WHEN
A.TIPDPH='R' THEN 'Requisicion' END,
C.UNIMED,
B.NUMLOT,
B.CANDPH,
B.CANDEV,
C.COSPRO,
A.REQART,C.tipo,
B.MONTOT,(select F.NOMDES from FAFORDES F where F.ID=A.FORDESP::integer) as nomdes
	    FROM CADPHART A,CAARTDPH B,CAREGART C,CADEFALM E,FACLIENTE G
	    WHERE
           B.DPHART=A.DPHART AND
		   C.CODART=B.CODART AND
           E.CODALM=B.CODALM AND --c.tipo ='A' and
           --F.ID=A.FORDESP AND
           G.CODPRO=A.CODCLI AND B.DPHART='".$coddph."'
	      ORDER BY B.CODART";
//H::PrintR($sql);exit;
		return $this->select($sql);


	}
	function sqlp2($codart,$tipdph,$reg)
	{

$sql="";
if ($tipdph == 'Entrega')
      {
     $sql= "SELECT CANSOL as CANTIDAD FROM FAARTNOT WHERE NRONOT='".$reg."' AND CODART='".$codart."'";
      }
else if ($tipdph == 'Requisicion')
       {
  	    $sql= "SELECT CANREQ as CANTIDAD FROM CAARTREQ WHERE REQART='".$reg."' AND CODART='".$codart."'";
       }
       //H::PrintR($sql);exit;
		return $this->select($sql);

	}
	}

?>
