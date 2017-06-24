<?
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Herramientas.class.php");


	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=/NOMINA_PRESUPUESTO_".date('d/m/Y').".xls");


         $bd= new basedatosAdo();

	     $tipnomdes = H::GetPost("tipnomdes");
    	     $condes = H::GetPost("condes");
            $conhas = H::GetPost("conhas");
            $especial = H::GetPost("especial");
            $codnomesp = H::GetPost("codnomesp");
	     $codnomesp2 = H::GetPost("codnomesp2");
            $codpre=H::GetPost("codpre");
            $fechades= H::GetPost("fechades");
            $fechahas= H::GetPost("fechahas");
	     $tipnomesp= H::GetPost("tipnomesp");



   	       if ($especial == 'S')            {
                $especial = " a.especial = 'S' AND
                             (A.CODNOMESP) = TRIM('".$codnomesp1."') AND ";
             }
            else
            { 	if ($especial == 'N')          $especial = " a.especial = 'N' AND";
            }

	

		$sql="SELECT distinct A.CODPRE,b.nompre,A.ASIGNA as ASIGNA,A.DEDUCI as DEDUCI, A.APORTE as APORTE,a.codtipgas,a.destipgas FROM
		        (
		        SELECT (TRIM(a.CODCAT)||'-'||TRIM(C.CODPAR)) as CODPRE,
		        a.codnom as codnom,
		        SUM(case when C.OPECON = 'A' then A.MONTO else 0 end) as ASIGNA,
		        SUM(case when C.OPECON = 'D' then A.MONTO else 0 end ) as DEDUCI,
		        SUM(case when C.OPECON = 'P' then A.MONTO else 0 end) as APORTE,
		        a.codtipgas,d.destipgas
		        FROM NPHISCON A,NPDEFCPT C,nptipgas d
		        WHERE
		        A.CODNOM = ('".$tipnomdes."') AND
		        trim(A.CODCON) >= trim('".$condes."') AND
		        trim(A.CODCON) <= trim('".$conhas."') AND  A.CODCON<>trim('995') and A.CODCON<>trim('006') and ".$especial."
		        --trim(B.CODEMP)=trim(A.CODEMP) AND
		        --trim(B.CODCAR)=trim(A.CODCAR) AND
                a.fecnomdes>=to_date('".$fechades."','dd/mm/yyyy') and
				a.fecnom<=to_date('".$fechahas."','dd/mm/yyyy') and
		       -- B.CODNOM=A.CODNOM AND
		        a.CODTIPGAS=D.CODTIPGAS AND
		        C.CODCON=A.CODCON AND
		        --B.STATUS='V' AND
		        A.MONTO>0 AND
		        A.CODCON NOT IN (SELECT CODCON FROM npconceptoscategoria) and
                A.CODCON NOT IN (SELECT CODCON FROM npasiparcon)
		        GROUP BY  (TRIM(a.CODCAT)||'-'||TRIM(C.CODPAR)),a.codnom,a.codtipgas,d.destipgas
		        UNION
		        SELECT trim(RTRIM(D.CODCAT)||'-'||RTRIM(C.CODPAR)) as CODPRE,
		        a.codnom as codnom,
		        SUM(case when C.OPECON='A' then A.MONTO else 0 end) as ASIGNA,
		        SUM(case when C.OPECON='D' then A.MONTO else 0 end) as DEDUCI,
		        SUM(case when C.OPECON='P' then A.MONTO else 0 end) as APORTE,
		        a.codtipgas,e.destipgas
                FROM NPHISCON A,NPDEFCPT C, npconceptoscategoria D, nptipgas e
                WHERE
                a.codcon=d.codcon and
		        A.CODNOM = ('".$tipnomdes."') AND
		        trim(A.CODCON) >= trim('".$condes."') AND
		        trim(A.CODCON) <= trim('".$conhas."') AND  A.CODCON<>trim('995') and A.CODCON<>trim('006') and  ".$especial."
		      --  trim(B.CODEMP)=trim(A.CODEMP) AND
		       -- trim(B.CODCAR)=trim(A.CODCAR) AND
                a.fecnomdes>=to_date('".$fechades."','dd/mm/yyyy') and
			    a.fecnom<=to_date('".$fechahas."','dd/mm/yyyy') and
		     --   B.CODNOM=A.CODNOM AND
		        a.CODTIPGAS=E.CODTIPGAS AND
		        C.CODCON=A.CODCON AND
		     --   B.STATUS='V' AND
		        A.MONTO>0
		        GROUP BY trim(RTRIM(D.CODCAT)||'-'||RTRIM(C.CODPAR)),a.codnom,a.codtipgas,e.destipgas
				UNION
				SELECT trim(RTRIM(a.CODCAT)||'-'||RTRIM(D.CODPar)) as CODPRE,
				a.codnom as codnom,
				SUM(case when C.OPECON='A' then A.MONTO else 0 end) as ASIGNA,
				SUM(case when C.OPECON='D' then A.MONTO else 0 end) as DEDUCI,
				SUM(case when C.OPECON='P' then A.MONTO else 0 end) as APORTE,
				a.codtipgas,e.destipgas
				FROM NPHISCON A,NPDEFCPT C, npasiparcon D, nptipgas E
				WHERE
				a.codnom=d.codnom and
				a.codcon=d.codcon and
				a.codcar=d.codcar and A.CODCON<>trim('995') and  A.CODCON<>trim('006') and
				A.CODNOM = ('".$tipnomdes."') AND  ".$especial."
				--trim(B.CODEMP)=trim(A.CODEMP) AND
			--	trim(B.CODCAR)=trim(A.CODCAR) AND
				a.fecnomdes>=to_date('".$fechades."','dd/mm/yyyy') and
				a.fecnom<=to_date('".$fechahas."','dd/mm/yyyy') and
			--	B.CODNOM=A.CODNOM AND
				a.CODTIPGAS=E.CODTIPGAS AND
				C.CODCON=A.CODCON AND
			--	B.STATUS='V' AND
				A.MONTO>0
				GROUP BY trim(RTRIM(a.CODCAT)||'-'||RTRIM(D.CODPar)),a.codnom,a.codtipgas,e.destipgas
		        ) A left outer join  CPDEFTIT B on (trim(A.CODPRE)=trim(B.CODPRE))  left outer join CONTABB C  on (trim(B.CODCTA)=trim(C.CODCTA))
		         where
		         (a.asigna>0 OR A.APORTE>0) AND
		         a.codpre is not null
		         order by a.codtipgas,a.codpre";
  	$tb=$bd->select($sql);
		echo "<table>";
    		echo "<tr>";
    		echo "</tr>";
        	echo "<tr>";
    		echo "</tr>";
		echo "</table>";

		///cabecera
		echo "<table>";
		echo "<tr>";
	      	echo "<td>"."CODIGO PRESUPUESTARIO                "."</td>";
		echo "<td>"."DESRIPCION                                             "."</td>";
		echo "<td>"."ASIGNACION       "."</td>";
	    	echo "<td>"."DEDUCCION         "."</td>";
	    	echo "<td>"."APORTE            "."</td>";
		
// print '<pre>'; print $sql;
while(!$tb->EOF)
{
         
              $asigna=$tb->fields["asigna"];
		$deduci=$tb->fields["deduci"];
		$aporte=$tb->fields["aporte"];
	echo "<table>";
		echo "<tr>";
		echo "<td>".$tb->fields["codpre"]."</td>";
		echo "<td>".$tb->fields["nompre"]."</td>";
		echo "<td>".number_format($asigna,2,',','.')."</td>";
		echo "<td>".number_format($deduci,2,',','.')."</td>";
		echo "<td>".number_format($aporte,2,',','.')."</td>";
	$tb->MoveNext();
}
$bd->closed();
?>