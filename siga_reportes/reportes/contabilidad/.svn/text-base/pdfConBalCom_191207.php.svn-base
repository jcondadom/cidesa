<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funcionescontabilidad.php");		

/*
AYUDA:
Cell(with,healt,Texto,border,linea,align,fillm-Fondo,link)
AddFont(family,style,file)
ln() -> Salto de Linea
*/
	
	class pdfreporte extends fpdf
	{		
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $ancho;
		var $campos;
	
		var $codcta1;
		var $codcta2;
		var $periodo;
 		var $auxnivel;
		var $comodin;	
		var $archtxt;
		var $nrorup;			
		
		var $fecperdes;
		var $feccie;
		
		var $cuenta;
		var $perant;
		var $salant;
				
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->campos=array();
			$this->anchos=array();
			$this->titulos=array();						
			$this->codcta1=$_POST["CODCTA"];
			$this->codcta2=$_POST["CODCTA1"];
			$this->periodo=$_POST["periodo"];
			$this->auxnivel=$_POST["auxnivel"];
			$this->comodin=$_POST["comodin"];
			$this->archtxt=$_POST["archtxt"];	
			$this->nrorup=$_POST["nrorup"];			
			//$this->ChequearActualizar();
			$this->obtenerFecha();
			$this->sql="SELECT ORDEN,
								RTRIM(TITULO) as TITULO,
								RTRIM(CUENTA) as CUENTA,
								RTRIM(NOMBRE) as NOMBRE,
								DEBITO,
								CREDITO,
								SALDO,
								(DEBITO-CREDITO) AS SALPER,
								CARGABLE 
						FROM 
							(SELECT RTRIM(A.CODCTA) AS ORDEN,
									A.CODCTA AS TITULO,
									A.CODCTA AS CUENTA,						 	
									B.DESCTA AS NOMBRE,
									A.TOTDEB AS DEBITO,
									A.TOTCRE AS CREDITO,
									 A.SALACT AS SALDO,
									B.CARGAB AS CARGABLE,'C'
								 FROM 
									CONTABB1 A,
									CONTABB B
								 WHERE 
									A.CODCTA=B.CODCTA AND
									A.PEREJE = ('".$this->periodo."') AND
									A.FECINI = ('".$this->fecha_ini."') AND
									A.FECCIE = ('".$this->fecha_cie."') 
								UNION ALL 
								SELECT RTRIM(A.CODCTA)||'T' AS ORDEN,'TOTAL' AS TITULO,
									A.CODCTA AS CUENTA,						 	
									B.DESCTA AS NOMBRE,
									A.TOTDEB AS DEBITO,
									A.TOTCRE AS CREDITO,
									 A.SALACT AS SALDO,
									B.CARGAB AS CARGABLE,'C'
								 FROM 
									CONTABB1 A,
									CONTABB B
									
								 WHERE A.CODCTA=B.CODCTA AND
									   A.PEREJE = ('".$this->periodo."') AND
									   A.FECINI = ('".$this->fecha_ini."') AND
									   A.FECCIE = ('".$this->fecha_cie."') AND
									   B.CARGAB<>'C') as A
						WHERE 
								LENGTH(RTRIM(SUBSTR(CUENTA,1,32))) <= ('".$this->nivel."')  AND
								RTRIM(SUBSTR(CUENTA,1,32)) >= RTRIM('".$this->codcta1."') AND
								RTRIM(SUBSTR(CUENTA,1,32)) <=RTRIM('".$this->codcta2."')  AND  
								RTRIM(SUBSTR(CUENTA,1,32)) LIKE RTRIM('".$this->comodin."')  AND
								(((SALDO<>0  OR DEBITO<>0 OR CREDITO<> 0) AND CUENTA NOT LIKE '7%') OR CUENTA LIKE '7%')
								ORDER BY ORDEN";
			//print $this->sql;
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();		
		}
		
		function ChequearActualizar(){
		  if ('".$this->actualizar."'=='SI'){
			 $this->ReactualizarSaldosAnteriores();
			 $this->ActualizarMaestro;
		  } //EndIf;					
		} //Return

		function ReactualizarSaldoAnteriores(){
			$tb30->$this->bd->select("SELECT 
										   SUBSTR(CODCTA,1,17) AS CUENTA,
										   SUM(NVL(SALANT,0)) AS SALDO 
									FROM 
										CONTABB 
									WHERE 
										upper(CARGAB)='C' 
									GROUP BY SUBSTR(CODCTA,1,17)");
															
					while(!$tb30->EOF){
						$this->bd->actualizar("update contabb set salant=coalesce('".$tb30->fields["deb"]."',0) where codcta=rpad(coalesce('".$tb30->fields["cuenta"]."',32,' '))"); 
					$tb30->MoveNext(); }	
				//--------------
								
			   $tb30->$this->bd->select("SELECT SUBSTR(CODCTA,1,13) as CUENTA,SUM(NVL(SALANT,0)) as SALDO FROM CONTABB WHERE upper(CARGAB)='C' GROUP BY SUBSTR(CODCTA,1,13)");
					while(!$tb30->EOF){
						$this->bd->actualizar("update contabb set salant=coalesce('".$tb30->fields["deb"]."',0) where codcta=rpad(coalesce('".$tb30->fields["cuenta"]."',32,' '))"); 
					$tb30->MoveNext(); }	
				//--------------

			   $tb30->$this->bd->select("SELECT SUBSTR(CODCTA,1,10) as CUENTA,SUM(NVL(SALANT,0)) as SALDO FROM CONTABB WHERE upper(CARGAB)='C' GROUP BY SUBSTR(CODCTA,1,10)");
					while(!$tb30->EOF){
						$this->bd->actualizar("update contabb set salant=coalesce('".$tb30->fields["deb"]."',0) where codcta=rpad(coalesce('".$tb30->fields["cuenta"]."',32,' '))"); 
					$tb30->MoveNext(); }	
				//--------------
			   
			   $tb30->$this->bd->select("SELECT SUBSTR(CODCTA,1,07) as CUENTA,SUM(NVL(SALANT,0)) as SALDO FROM CONTABB WHERE upper(CARGAB)='C' GROUP BY SUBSTR(CODCTA,1,07)");
					while(!$tb30->EOF){
						$this->bd->actualizar("update contabb set salant=coalesce('".$tb30->fields["deb"]."',0) where codcta=rpad(coalesce('".$tb30->fields["cuenta"]."',32,' '))"); 
					$tb30->MoveNext(); }	
				//--------------

			   $tb30->$this->bd->select("SELECT SUBSTR(CODCTA,1,04) as CUENTA,SUM(NVL(SALANT,0)) as SALDO FROM CONTABB WHERE upper(CARGAB)='C' GROUP BY SUBSTR(CODCTA,1,04)");
					while(!$tb30->EOF){
						$this->bd->actualizar("update contabb set salant=coalesce('".$tb30->fields["deb"]."',0) where codcta=rpad(coalesce('".$tb30->fields["cuenta"]."',32,' '))"); 
					$tb30->MoveNext(); }	
				//--------------

			   $tb30->$this->bd->select("SELECT SUBSTR(CODCTA,1,01) as CUENTA,SUM(NVL(SALANT,0)) as SALDO FROM CONTABB WHERE upper(CARGAB)='C' GROUP BY SUBSTR(CODCTA,1,01)");
					while(!$tb30->EOF){
						$this->bd->actualizar("update contabb set salant=coalesce('".$tb30->fields["deb"]."',0) where codcta=rpad(coalesce('".$tb30->fields["cuenta"]."',32,' '))"); 
					$tb30->MoveNext(); }	
				//--------------			
		} //Fin Return
		

		function ActualizarMaestro(){
			$tb06->$this->bd->select("select substr(codcta,1,17) as codcta,
											 RTRIM(to_char(a.feccom,'MM')) as mes,
											 sum(decode(a.debcre,'D',a.monasi,0)) AS DEB,
											 sum(decode(a.debcre,'C',a.monasi,0)) as CRE
									  from 
									  		contabc1 a,
											contabc b
									where 
											a.numcom=b.numcom and
											a.feccom = b.feccom and
											b.stacom='A'
									group by substr(codcta,1,17),RTRIM(to_char(a.feccom,'MM'))");				
				//--------------			
			$tb05->$this->bd->select("select substr(codcta,1,13) as codcta, RTRIM(to_char(a.feccom,'MM')) as mes,sum(decode(a.debcre,'D',a.monasi,0)) AS DEB,sum(decode(a.debcre,'C',a.monasi,0)) as CRE from contabc1 a, contabc b where a.feccom = b.feccom and b.stacom='A' group by substr(codcta,1,13),RTRIM(to_char(a.feccom,'MM'))");				
				//--------------			
			$tb04->$this->bd->select("select substr(codcta,1,10) as codcta, RTRIM(to_char(a.feccom,'MM')) as mes,sum(decode(a.debcre,'D',a.monasi,0)) AS DEB,sum(decode(a.debcre,'C',a.monasi,0)) as CRE from contabc1 a, contabc b where a.feccom = b.feccom and b.stacom='A' group by substr(codcta,1,10),RTRIM(to_char(a.feccom,'MM'))");				
				//--------------			
			$tb03->$this->bd->select("select substr(codcta,1,7) as codcta, RTRIM(to_char(a.feccom,'MM')) as mes,sum(decode(a.debcre,'D',a.monasi,0)) AS DEB,sum(decode(a.debcre,'C',a.monasi,0)) as CRE from contabc1 a, contabc b where a.feccom = b.feccom and b.stacom='A' group by substr(codcta,1,7),RTRIM(to_char(a.feccom,'MM'))");				
				//--------------			
			$tb02->$this->bd->select("select substr(codcta,1,4) as codcta, RTRIM(to_char(a.feccom,'MM')) as mes,sum(decode(a.debcre,'D',a.monasi,0)) AS DEB,sum(decode(a.debcre,'C',a.monasi,0)) as CRE from contabc1 a, contabc b where a.feccom = b.feccom and b.stacom='A' group by substr(codcta,1,4),RTRIM(to_char(a.feccom,'MM'))");				
				//--------------			
			$tb01->$this->bd->select("select substr(codcta,1,1) as codcta, RTRIM(to_char(a.feccom,'MM')) as mes,sum(decode(a.debcre,'D',a.monasi,0)) AS DEB,sum(decode(a.debcre,'C',a.monasi,0)) as CRE from contabc1 a, contabc b where a.feccom = b.feccom and b.stacom='A' group by substr(codcta,1,1),RTRIM(to_char(a.feccom,'MM'))");				
				//--------------			
			$cuentas->$this->bd->select("select * from contabb");
				//--------------						
			//cursor cuentas is (select * from contabb);				
			$this->bd->actualizar("update contabb1 set totdeb=0,totcre=0,salact=0");						
			//------ 06 --------						
			while(!$tb06->EOF){						
				$this->bd->actualizar("update contabb1 set totdeb=nvl('".$tb30->fields["deb"]."',0),totcre=nvl('".$tb30->fields["cre"]."',0) where codcta=rpad('".$tb30->fields["codcta"]."',32,' ') and pereje='".$tb30->fields["mes"]."'");
			$tb30->MoveNext(); }	
			//------ 05 --------											
			while(!$tb05->EOF){						
				$this->bd->actualizar("update contabb1 set totdeb=nvl('".$tb30->fields["deb"]."',0),totcre=nvl('".$tb30->fields["cre"]."',0) where codcta=rpad('".$tb30->fields["codcta"]."',32,' ') and pereje='".$tb30->fields["mes"]."'");
			$tb30->MoveNext(); }	
			//------ 04 --------										
			while(!$tb04->EOF){						
				$this->bd->actualizar("update contabb1 set totdeb=nvl('".$tb30->fields["deb"]."',0),totcre=nvl('".$tb30->fields["cre"]."',0) where codcta=rpad('".$tb30->fields["codcta"]."',32,' ') and pereje='".$tb30->fields["mes"]."'");
			$tb30->MoveNext(); }	
			//------ 03 --------											
			while(!$tb03->EOF){						
				$this->bd->actualizar("update contabb1 set totdeb=nvl('".$tb30->fields["deb"]."',0),totcre=nvl('".$tb30->fields["cre"]."',0) where codcta=rpad('".$tb30->fields["codcta"]."',32,' ') and pereje='".$tb30->fields["mes"]."'");
			$tb30->MoveNext(); }	
			//------ 02 --------											
			while(!$tb02->EOF){						
				$this->bd->actualizar("update contabb1 set totdeb=nvl('".$tb30->fields["deb"]."',0),totcre=nvl('".$tb30->fields["cre"]."',0) where codcta=rpad('".$tb30->fields["codcta"]."',32,' ') and pereje='".$tb30->fields["mes"]."'");
			$tb30->MoveNext(); }	
			//------ 01 --------											
			while(!$tb01->EOF){						
				$this->bd->actualizar("update contabb1 set totdeb=nvl('".$tb30->fields["deb"]."',0),totcre=nvl('".$tb30->fields["cre"]."',0) where codcta=rpad('".$tb30->fields["codcta"]."',32,' ') and pereje='".$tb30->fields["mes"]."'");
			$tb30->MoveNext(); }	
			//-----------------//   			 			   
						
			  while(!$cuentas->EOF){ 
				  $this->ActualizarSaldos($cuentas->fields["codcta"],$cuentas->fields["fecini"],$cuentas->fields["feccie"]);
				$this->MoveNext(); }
		} //Return
				
		//------------------------------------------------------------------------------------------------------//
		function ActualizarSaldos($codigo_cta,$fecha_ini,$fecha_cie){

  			 $tb10->$this->bd->select("SELECT * 
										 FROM CONTABB1 
										 WHERE CODCTA = rpad($codigo_cta,32,' ')
												 AND FECINI = ($fecha_ini')
												 AND FECCIE = ($fecha_cie')
										 ORDER BY PEREJE");

   			 $tb11->$this->bd->select("SELECT 
										    SALANT as SALDO_ANT
									   FROM CONTABB
									   WHERE CODCTA = rpad(($codigo_cta),32,' ') AND
											FECINI = ($fecha_ini) AND
											FECCIE = ($fecha_cie)");
			$periodo_ant = '00';
			   while(!$tb10->EOF){
				   $this->bd->actualizar("UPDATE CONTABB1
						SET SALACT = ('".$tb10->fields["totdeb"]."')  + ('".$tb11->fields["saldo_ant"]."') - ('".$tb10->fields["totcre"]."')
					  WHERE CODCTA = ('".$tb10->fields["codcta"]."') AND
							PEREJE = ('".$tb10->fields["pereje"]."') AND
							FECINI = ('".$tb10->fields["fecini"]."') AND
							FECCIE = ('".$tb10->fields["feccie"]."')");
					 
					 
					   $periodo_ant = str_pad(to_char(to_numer($periodo_ant)+1),2,'0',STR_PAD_LEFT);
		   
					   $tb11->$this->bd->select("SELECT SALACT as SALDO_ANT
												 FROM CONTABB1
												 WHERE CODCTA = rpad($codigo_cta,32,' ') AND
														FECINI = ($fec_ini) AND
														FECCIE = ($fec_cie) AND
														PEREJE = $periodo_ant");												
				$this->MoveNext(); }								
		}		// Return
		
		
		function obtenerFecha()
		{					
		  $tb3=$this->bd->select("select fecini as fechainic, forcta as forcta from contaba");
			if (!$tb3->EOF){
				$this->fechainicio=$tb3->fields["fechainic"];
				$this->forcta=$tb3->fields["forcta"];	
				}										
				
			$this->valor=instr($this->forcta,'-',0,1);						              			
  		   $tb4=$this->bd->select("SELECT coalesce(coalesce(LENGTH(SUBSTR(FORCTA,1,$this->valor))-1, 0), 0) as LONIV1,
		   								FECINI as fecha_ini,
										FECCIE as fecha_cie					 
								   FROM 
										CONTABA");
									
				if (!$tb4->EOF)
				{
					$this->loniv1=$tb4->fields["loniv1"];
					$this->fecha_ini=$tb4->fields["fecha_ini"];
					$this->fecha_cie=$tb4->fields["fecha_cie"];					
				} //EndIf
  		   							
			////// AUXNIVEL 1   ////////

			  if ($this->auxnivel==$this->nrorup) 
			   {
					$tb5=$this->bd->select("SELECT coalesce(LENGTH(RTRIM(FORCTA)), 0) as nivel FROM contaba"); 								
						if (!$tb5->EOF)
						{
							$this->nivel=$tb5->fields["nivel"];
						}			 //EndIf	
			   }	  //EndIf 
			   else
			   {
	 			    $this->valor=instr($this->forcta,'-',0,$this->auxnivel);					   
 				    $tb5=$this->bd->select("SELECT coalesce(coalesce(LENGTH(SUBSTR(FORCTA,1,'".$this->valor."'))-1, 0), 0) as nivel FROM contaba");					
						if (!$tb5->EOF)
						{
							$this->nivel=$tb5->fields["nivel"];								
						}					//EndIf
			   } //EndIf	   
		}	//Return



		function llenartitulosmaestro()
		{
				$this->anchos[0]=120;
				$this->anchos[1]=40;
				$this->anchos[2]=40;
				$this->anchos[3]=45;				
				$this->anchos[4]=75;								
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->setFont("Arial","B",9);
			$this->cell(30,5,'                                                                                                                                     Expresado en Bolivares');
			$this->SetX(10);
			$this->fecha();
			$this->cell(40,10,"Desde: ".$this->fecperdes."  ");
			$this->cell(20,10,"Hasta: ".$this->fecperhas);
			$this->ln(5);
			$this->cell($this->anchos[1],10,"CÃ³digo de Cuenta");
			$this->cell($this->anchos[4],10,"DescripciÃ³n de Cuenta");
			$this->cell(35,10,"Saldo Anterior",0,0,'R');			 				
			$this->cell(35,10,"Debe",0,0,'R');			 				
			$this->cell(35,10,"Haber",0,0,'R');			 				
 			$this->cell(40,10,"Saldo Actual",0,0,'R');			 				
			$this->Line(10,49,270,49);
			$this->ln(); 
		}
		
		function fecha(){
			  $tb36=$this->bd->select("SELECT to_char(B.FECDES,'dd/mm/yyyy') as fecperdes
									  FROM 
									  	CONTABA A, CONTABA1 B
									  WHERE A.FECINI = B.FECINI AND
											A.FECCIE = B.FECCIE AND
											B.PEREJE = '".$this->periodo."'");
					if (!$tb36->EOF){  $this->fecperdes=$tb36->fields["fecperdes"]; }
					
				 $tb36=$this->bd->select("SELECT to_char(B.FECHAS,'dd/mm/yyyy') as fecperhas
									FROM CONTABA A, CONTABA1 B
									WHERE A.FECINI = B.FECINI AND
											A.FECCIE = B.FECCIE AND
											B.PEREJE = '".$this->periodo."'");
											
					if (!$tb36->EOF){  $this->fecperhas=$tb36->fields["fecperhas"]; }
	         //Calcular el Periodo Anterior = perant
					  if($this->periodo=='01'){  $this->perant='12'; }
					  if($this->periodo=='02'){  $this->perant='01'; }
					  if($this->periodo=='03'){  $this->perant='02'; }					
					  if($this->periodo=='04'){  $this->perant='03'; }					
					  if($this->periodo=='05'){  $this->perant='04'; }					
					  if($this->periodo=='06'){  $this->perant='05'; }					
					  if($this->periodo=='07'){  $this->perant='06'; }					
					  if($this->periodo=='08'){  $this->perant='07'; }					
					  if($this->periodo=='09'){  $this->perant='08'; }					
					  if($this->periodo=='10'){  $this->perant='09'; }					
					  if($this->periodo=='11'){  $this->perant='10'; }					
					  if($this->periodo=='12'){  $this->perant='11'; }					
  			  ///////////////////		  
		} // Return
		
		function Cuerpo()
		{
			$tb=$this->bd->select($this->sql);
			//$sw=0;
			$acum_saldo_ant=0;
			$acum_debe=0;
			$acum_haber=0;
			$acum_saldo_act=0;
  		    $this->setFont("Arial","",8);			
			while(!$tb->EOF)			
			{			
				if ($tb->fields["titulo"]!=" "){
 				     $this->cuenta=$tb->fields["cuenta"];
					$this->Buscar_Saldo_Anterior();
					 if (ltrim(rtrim($tb->fields["titulo"]))=='TOTAL')
					 {  	 
 					    $this->Line(119,$this->GetY()+3,270,$this->GetY()+3);
						$this->cell($this->anchos[1],4," ");
						$this->setFont("Arial","B",8);	
						$y=$this->GetY();
						$x=$this->GetX()+$this->anchos[4];					
						$this->Multicell($this->anchos[4],4,strtoupper($tb->fields["titulo"]." ".$tb->fields["nombre"]));
						$y1=$this->GetY();
						$this->SetXY($x,$y);
						$this->cell(35,4,number_format(abs($this->salant),2,',','.'),0,0,'R');
						$this->cell(35,4,number_format(abs($tb->fields["debito"]),2,',','.'),0,0,'R');
						$this->cell(35,4,number_format(abs($tb->fields["credito"]),2,',','.'),0,0,'R');
						$this->cell(40,4,number_format(abs($tb->fields["saldo"]),2,',','.'),0,0,'R');																		

					$this->setFont("Arial","",8);
					 }
					 else
					 {  $sw=0;
  					    $this->cell($this->anchos[1],4,$this->cuenta);
						$y=$this->GetY();
						$x=$this->GetX()+$this->anchos[4];
						$this->MultiCell($this->anchos[4],4,strtoupper($tb->fields["nombre"]));
						$y1=$this->GetY();
					 }   //EndIF				
					 
					if ($tb->fields["cargable"]=='C')
					{   
						$this->SetXY($x,$y);
						$this->cell(35,4,number_format(abs($this->salant),2,',','.'),0,0,'R');						
						$this->cell(35,4,number_format($tb->fields["debito"],2,',','.'),0,0,'R'); 
						$this->cell(35,4,number_format($tb->fields["credito"],2,',','.'),0,0,'R'); 
						//$this->cell(40,10,number_format(abs($tb->fields["saldo"]),2,',','.'),0,0,'R'); 						
						$this->cell(40,4,number_format(abs($tb->fields["saldo"]),2,',','.'),0,0,'R'); 						
					}
					$this->SetY($y1);
					//$this->ln();
				}  //EndIf
			$tb->MoveNext();
			} //End While
			$tb_temp=$this->bd->select("SELECT SUM(B.TOTDEB)
										 AS TOTAL_DEB, SUM(B.TOTCRE) AS TOTAL_CRE
										 FROM CONTABB A,
											  CONTABB1 B,
											  CONTABA C 
										WHERE A.CODCTA = B.CODCTA AND
											  A.CARGAB = 'C' AND
											  B.PEREJE = '".$this->periodo."' AND
											  B.FECINI = C.FECINI AND
											  B.FECCIE = C.FECCIE AND
											  RTRIM(SUBSTR(A.CODCTA,1,23)) >= RTRIM('".$this->codcta1."') AND
											  RTRIM(SUBSTR(A.CODCTA,1,23)) <= RTRIM('".$this->codcta2."')"); 
					if (!empty($tb_temp->fields["total_deb"])){						  		  			
							$this->setFont("Arial","B",9);	
							$this->ln();
							$this->cell($this->anchos[1],10," ");
							 $this->cell($this->anchos[4],10,"TOTAL DEBITO  :");
							 $this->cell(35,10,number_format($tb_temp->fields["total_deb"],2,',','.'),0,0,'R');
							 $this->ln(4);
							 $this->cell($this->anchos[1],10," ");			 
							 $this->cell($this->anchos[4],10,"TOTAL CREDITO:");			
							 $this->cell(35,10,number_format($tb_temp->fields["total_cre"],2,',','.'),0,0,'R');
							 }
		}
		

	function Buscar_Saldo_Anterior(){
			  if (('".$this->periodo."') == '01'){
					$tb999=$this->bd->select("SELECT A.SALANT as salant 
												FROM 
													CONTABB A, CONTABA B
												WHERE 
													A.CODCTA=rpad('".$this->cuenta."',32,' ') AND
													A.FECINI = B.FECINI AND
													A.FECCIE = B.FECCIE AND
													B.CODEMP='001'"); 
		  	  }else{
					$tb999=$this->bd->select("SELECT B.SALACT as salant 
												FROM 
													CONTABB1 B, CONTABA C
												WHERE 
													B.CODCTA = rpad('".$this->cuenta."',32,' ') AND
													B.PEREJE = '".$this->perant."' AND
													B.FECINI = C.FECINI AND
													B.FECCIE = C.FECCIE AND
													C.CODEMP='001'"); }
					if (!$tb999->EOF){	$this->salant=$tb999->fields["salant"];	}else{  $this->salant=0; }
	}  //Fin Return
		
	function CalcularResultado(){
	
	  $tb99=$this->bd->select("SELECT 
	  							CODTESPAS as CUENTA_PASIVOS,
						        CODCTA as CUENTA_CAPITAL,
								CODRESANT as CUENTA_RESULTADO
							FROM 
								CONTABA
						   WHERE
						   		CODEMP= '001'");
					if (!$tb99->EOF){  
							$cuenta_pasivo=$tb99->fields["cuenta_pasivo"];
							$cuenta_capital=$tb99->fields["cuenta_capital"];
							$cuenta_resultado=$tb99->fields["cuenta_resultado"];	}			 
							
		$tb990=$this->bd->select("SELECT 
									(A.SALACT) as PASIVO
								FROM 
									CONTABB1 A, 
								    CONTABA B
						   		WHERE 
								 	RTRIM(A.CODCTA)=RTRIM(B.CODTESPAS) AND
								    A.PEREJE = ('".$this->periodo."') AND
									A.FECINI = B.FECINI AND
								    A.FECCIE = B.FECCIE");
								 
							if (!$tb990->EOF)
							{  							 
								   if (rtrim($cuenta_capital)==rtrim($cuenta_pasivo)) { $capital= 0;  }
								   	else {  $tb99=$this->bd->select("SELECT 
									  								A.SALACT as capital										   
															   FROM 
															   		CONTABB1 A,	
																	CONTABA B
															   WHERE
															   		A.CODCTA=rpad(B.CODCTA,32,' ') AND
																	A.PEREJE = ('".$this->periodo."') AND
																	A.FECINI = B.FECINI AND
																	A.FECCIE = B.FECCIE"); 
																																		
											$capital=$tb99->fields["capital"]; } 
								$tb99=$this->bd->select("SELECT A.SALACT as INGRESO
														 FROM 
															CONTABB1 A, 
															CONTABA B
														 WHERE 
															A.CODCTA=rpad(B.CODIND,32,' ') AND
															A.PEREJE = ('".$this->periodo."') AND
															A.FECINI = B.FECINI AND
															A.FECCIE = B.FECCIE");
															
												$ingreso=$tb99->fields["ingreso"];			
						   
								 $tb99=$this->bd->select("SELECT (A.SALACT) as EGRESO
														  FROM 
															CONTABB1 A, 
															CONTABA B
														  WHERE 
															A.CODCTA=rpad(B.CODEGD,32,' ') AND
															A.PEREJE = ('".$this->periodo."') AND
															A.FECINI = B.FECINI AND
															A.FECCIE = B.FECCIE");
															
												$egreso=$tb99->fields["egreso"];
												
						   if ((rtrim($cuenta_capital)==rtrim($cuenta_pasivo))) { $resultado = 0;  } 
						   else {  $tb99=$this->bd->select("SELECT A.SALACT as resultado
														   FROM
															 CONTABB1 A, 
															 CONTABA B
														   WHERE 
																A.CODCTA=rpad(B.CODCTD,32,' ') AND
																A.PEREJE = ('".$this->periodo."') AND
																A.FECINI = B.FECINI AND
																A.FECCIE = B.FECCIE"); 
											
												$resultado=$tb99->fields["resultado"]; }
						   
						   if (abs($ingreso) > abs($egreso)) 
						   {  $this->Total_Resultado=(abs($pasivo+$capital+$resultado-(abs($ingreso)-abs($egreso))));   } 
						   else { $this->Total_Resultado=(abs($pasivo+$capital+$resultado-(abs($ingreso)-abs($egreso)))); }
						} 
				}
	
	function CalcularIngresoYEgreso(){

			$tb50=$this->bd->select("SELECT A.SALACT as INGRESO
									FROM 
										CONTABB1 A, 
										CONTABA B
								   WHERE 
										 RTRIM(A.CODCTA) = RTRIM(B.CODIND) AND
										 A.PEREJE = '".$this->periodo."' AND
										 A.FECINI = B.FECINI AND
										 A.FECCIE = B.FECCIE");
			if (!$tb50->EOF){
				$Tingreso=$tb50->fields["ingreso"]; 
				}		 			

			$tb50=$this->bd->select("SELECT A.SALACT as EGRESO
									FROM 
										CONTABB1 A, 
										CONTABA B
								   WHERE 
										 RTRIM(A.CODCTA) = RTRIM(B.CODEGD) AND
										 A.PEREJE = '".$this->periodo."' AND
										 A.FECINI = B.FECINI AND
										 A.FECCIE = B.FECCIE");
			if (!$tb50->EOF){
				$Tegreso=$tb50->fields["egreso"]; 
				}		 			
				
			$this->total=(abs((abs($Tingreso)-abs($Tegreso))*-1));		
			$this->saldo=$this->saldo + ((abs($Tingreso)-abs($Tegreso))*-1);  
		/*  SET SALDO = SALDO + (ABS(INGRESOS) - ABS(EGRESOS))*(-1)
		 WHERE RTRIM(CUENTA)>=SUBSTR(CUENTA_RESULTADO,1,INSTR(CUENTA_RESULTADO,'-',1,1)-1) AND
			   RTRIM(CUENTA)<=RTRIM(CUENTA_RESULTADO) AND
			   INSTR(RTRIM(CUENTA_RESULTADO),RTRIM(CUENTA))<>0;				*/											
		
			}			//Return
	} //	Fin
?>