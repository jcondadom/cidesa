<?php
require_once("../../lib/modelo/baseClases.class.php");
class Federal extends BaseClases {

	public function sqlp($coddes,$codhas,$codespdes,$codesphas,$banco,$especial)
    {




	if ($especial == 'S')
		{


			$especialc = "'S' AND (A.CODNOMESP) ='".$codespdes."' AND (A.CODNOMESP) = '".$codesphas."'";
		}

               else 

		{


			$especialc = "'N'";



					


		}
              
		

			$sql= "select distinct a.codemp, a.codcar, 
			cast(a.codemp as int) AS cedemp,
			(sum(CASE WHEN a.asided='A' THEN coalesce(a.saldo,0) ELSE 0 END) - sum(CASE WHEN a.asided='D' THEN coalesce(a.saldo,0) ELSE 0 END)) AS monto,
			c.nomemp,replace(c.numcue,'-', '' ) as cuenta_banco
			from
			npnomcal a, nphojint c
			where
			c.codtippag='01' and
                   	a.codnom >=trim('".$coddes."') and 
			a.codnom <= trim('".$codhas."')  and 
			c.codban = '".$banco."' and
			c.codemp=a.codemp and
			A.ESPECIAL = ".$especialc."  AND 
			C.STAEMP IN (SELECT CODSITEMP FROM NPSITEMP WHERE CALNOM='S')
			group by  a.codemp,a.codcar, c.nomemp, c.numcue order by a.codcar,cedemp";

//print $sql;
//H::PrintR($sql);exit;

		
	//H::PrintR($sql);exit;
		
	    return $this->select($sql);

    }


    public function nomina($coddes,$codhas,$banco,$especial,$codespdes,$codesphas)
    {

	if ($especial == 'S')
		{
                 $sql= "SELECT sum (a.monto) as nomina from(SELECT A.NACEMP,
		       SUBSTR(A.CODEMP,2,8) as CODEMP,
		       A.cedemp as cedemp,
		       A.FECNAC,A.NOMEMP,
		       A.NUMCUE as cuenta_banco,
		       A.TIPCUE,
		       COALESCE(E.SALDO,0) as montox,
			(sum(CASE WHEN e.asided='A' THEN coalesce(e.saldo,0) ELSE 0 END) - sum(CASE WHEN e.asided='D' THEN coalesce(e.saldo,0) ELSE 0 END)) AS monto,
		       B.CODNOM
			FROM
			   NPHOJINT A,
			   NPASICAREMP B,
			   NPCARGOS C,
			   NPBANCOS D,
			   NPNOMCAL	E
			WHERE
			   B.CODNOM>=('".$coddes."')  AND
			   B.CODNOM<=('".$codhas."')  AND
			   A.CODBAN=D.CODBAN AND
			   B.CODEMP = A.CODEMP AND
			   B.CODCAR=C.CODCAR AND
			   D.CODBAN='".$banco."' AND A.codemp = E.codemp and E.especial = '".$especial."' AND
			   E.CODNOMESP>=('".$codespdes."') AND
			   E.CODNOMESP<=('".$codesphas."') AND
			   STATUS='V' AND
			   A.STAEMP IN (SELECT CODSITEMP FROM NPSITEMP WHERE CALNOM='S')-- AND
			  -- MONTONOMINA>0
			   AND RTRIM(COALESCE(A.NUMCUE,' '))<>''
			GROUP BY B.CODNOM,D.CODBAN,A.CEDEMP,A.CODEMP,SUBSTR(A.CODEMP,2,8),A.NOMEMP,B.CODCAR,C.NOMCAR,A.NUMCUE,A.TIPCUE,A.NACEMP,A.FECNAC,E.SALDO
			ORDER BY RTRIM(A.cedemp)) a";

//print $sql;
//H::PrintR($sql);exit;


			


		}
		else
		{
			$sql= "SELECT sum (a.monto) as nomina from(SELECT A.NACEMP,
		       SUBSTR(A.CODEMP,2,8) as CODEMP,
		       A.cedemp as cedemp,
		       A.FECNAC,A.NOMEMP,
		       A.NUMCUE as cuenta_banco,
		       A.TIPCUE,
		       COALESCE(B.MONTONOMINA,0) as montox,
			(sum(CASE WHEN e.asided='A' THEN coalesce(e.saldo,0) ELSE 0 END) - sum(CASE WHEN e.asided='D' THEN coalesce(e.saldo,0) ELSE 0 END)) AS monto,
		       B.CODNOM
			FROM
			   NPHOJINT A,
			   NPASICAREMP B,
			   NPCARGOS C,
			   NPBANCOS D,
			   NPNOMCAL	E
			WHERE
			   B.CODNOM>=('".$coddes."')  AND
			   B.CODNOM<=('".$codhas."')  AND
			   A.CODBAN=D.CODBAN AND
			   B.CODEMP = A.CODEMP AND
			   B.CODCAR=C.CODCAR AND
			   D.CODBAN='".$banco."' AND A.codemp = E.codemp and E.especial = '".$especial."' AND
			   STATUS='V' AND
			   A.STAEMP IN (SELECT CODSITEMP FROM NPSITEMP WHERE CALNOM='S') --AND
			 --  MONTONOMINA>0
			   AND RTRIM(COALESCE(A.NUMCUE,' '))<>''
			GROUP BY B.CODNOM,D.CODBAN,A.CEDEMP,A.CODEMP,SUBSTR(A.CODEMP,2,8),A.NOMEMP,B.CODCAR,C.NOMCAR,A.NUMCUE,A.TIPCUE,A.NACEMP,A.FECNAC,MONTONOMINA
			ORDER BY RTRIM(A.cedemp)) a";


		}

		//H::PrintR($sql);exit;
	    return $this->select($sql);

    }//
}
?>