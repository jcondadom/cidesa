<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/general/Herramientas.class.php");

  class pdfreporte extends fpdf
  {

    var $bd;
    var $titulos;
    var $titulos2;
    var $anchos;
    var $campos;
    var $sql;
    var $rif = 'G200072067';

    var $fecdes;
    var $fechas;
    var $benalterno;
    var $rifalterno;
    var $rete;
    var $notit=false;
    var $nopie=false;

    function pdfreporte()
    {
      $pag= array(280,395);
      $this->fpdf("l","mm",$pag);
      $this->bd=new basedatosAdo();
      $this->cab=new Cabecera();
      $this->bd->validar();
      $this->titulos=array();
      $this->titulos2=array();
      $this->campos=array();
      $this->anchos=array();
      $this->ancho=array();
      $this->fecdes=$_POST["fecdes"];
      $this->fechas=$_POST["fechas"];
      $this->elaborado=$_POST["elaborado"];
      $this->autorizado=$_POST["autorizado"];
      $this->revisado=$_POST["revisado"];
      $this->rete=$_POST["rete"];
      //$this->fuefin=$_POST["fuefin"];

      if ($this->rete=="V")
      {
      	$orderby="b.comret,b.fecemi";
      	$sqlfecha=" b.feccomret>=to_date('".$this->fecdes."','dd/mm/yyyy') and
              		b.feccomret<=to_date('".$this->fechas."','dd/mm/yyyy') and";
      }
      else
      {
      	$orderby="b.comretislr,b.fecemi";
      	$sqlfecha=" b.feccomretislr>=to_date('".$this->fecdes."','dd/mm/yyyy') and
              		b.feccomretislr<=to_date('".$this->fechas."','dd/mm/yyyy') and";
      }

      /*if($this->fuefin=='N'){
		$sqlfuefin="";
      }elseif($this->fuefin=='A'){
		$sqlfuefin="a.tipfin<>'F' and a.tipfin<>'L' and";
      }elseif($this->fuefin=='F'){
		$sqlfuefin="a.tipfin<>'F' and";
      }else{
		$sqlfuefin="a.tipfin<>'L' and";
      }*/


       if ($this->rete=="V")
       	$reten='001';
       elseif ($this->rete=="I")
       	$reten='002';
       	else
       	$reten='003';


      $conf = $this->getConfig();
      if($conf){
        if($conf['rif']) $this->rif = $conf['rif'];
      }
      $this->sql="select
              to_char(a.fecfac,'dd/mm/yyyy') as fecfac,
              b.cedrif,
              b.nomben,
	          b.numord,
	          b.desord,
              to_char(b.fecemi,'dd/mm/yyyy') as fecemi,
              TO_CHAR(B.FECCOMRET,'yyyymm')||LPAD(b.COMRET,8,'0') as COMPROBANTE,
              TO_CHAR(B.FECCOMRET,'yyyymm') as PERCOMPRO,
              TO_CHAR(B.FECCOMRETislr,'dd/mm/yyyy') as fecret,
              a.numfac,
              a.numctr,a.tiptra,case when a.facafe is null or trim(a.facafe)='' then '0' else a.facafe end as facafe ,
              a.totfac,
              a.exeiva,
              a.basimp,
              a.poriva,
              moniva,
              a.monret,
              b.rifalt,
              (case when b.comretislr=null then ' ' else to_char(b.feccomretislr,'yyyy')||'-'||to_char(b.feccomretislr,'mm')||'-'||lpad(b.comretislr,8,'0') end) as comprobante_islr,
              porislr,
              monislr,
              basislr,
              porltf,
              monltf,
              basltf,
	      b.ctaban
            from
              opfactur a,opordpag b,(select distinct numord, codtip from opretord ) c,tsrepret d, optipret e
            where
              a.numord=b.numord and
              $sqlfecha
              a.numord=c.numord and
              c.codtip=d.codret and
			  c.codtip=e.codtip and
			  d.codret=e.codtip and
			  trim(d.codrep)='$reten'
              group by
                a.fecfac,
                a.numfac,
                a.tiptra,
                a.facafe,
                a.numctr,
                b.cedrif,
                b.nomben,
                b.numord,
                b.desord,
                B.FECEMI,
				B.FECCOMRET,
                b.COMRET,
                a.totfac,
                a.exeiva,
                a.basimp,
                a.poriva,
                moniva,
                a.monret,
                b.rifalt,
                b.comretislr,
                b.feccomretislr,
                porislr,
                monislr,
                basislr,
                porltf,
                monltf,
                basltf,
		b.ctaban
			    order by
				$orderby,b.cedrif,b.nomben";

//print "<pre>".$this->sql;//exit();
   if ($this->rete=="V")
      {
		$this->imp="IVA";

      }
      else if ($this->rete=="I"){
      	$this->imp="ISLR";
      }
      else if ($this->rete=="L"){
      	$this->imp="LTF";
      }
      $this->llenartitulos();
    }

	function llenartitulos()
	{
		if($this->rete!="V")
		{
			$this->titulos[]="Nro de Operacion";
			$this->anchos[]=13;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
		}
		if($this->rete=="V")
		{
        $this->titulos[]="Nro Ope.";
		$this->anchos[]=10;
		$this->aliniacion[]='C';
		$this->aliniacion2[]='C';
		}
		if($this->rete!="V")
		{
	        $this->titulos[]="Nro. de Rif";
			$this->anchos[]=19;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
	        $this->titulos[]="Proveedor o Razon Social";
		}else
		{
			$this->titulos[]="FECHA FACTURA";
			$this->anchos[]=16;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
	        $this->titulos[]="Nro. Rif";
		}
		if($this->rete=="V")
		{
			$this->anchos[]=20;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
		}
		else
		{
			$this->anchos[]=60;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='L';
		}

		if($this->rete=="V")
		{
	        $this->titulos[]="Proveedor o Razon Social";
			$this->anchos[]=50;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='L';
	        $this->titulos[]="Nro Comprob.";
			$this->anchos[]=22;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
			$this->titulos[]="Fecha Aplic. Retencion";
			$this->anchos[]=17;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
	        $this->titulos[]="Nro Factura";
			$this->anchos[]=20;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
		}else
		{
			$this->titulos[]="No de Orden de Pago";
			$this->anchos[]=20;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
		}
		if($this->rete=="V")
		{
	        $this->titulos[]="Nro. Control";
			$this->anchos[]=20;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
	        $this->titulos[]="Nro Orden de Pago";
			$this->anchos[]=20;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
			$this->titulos[]="No Nota de Debito";
			$this->anchos[]=10;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
			$this->titulos[]="Tipo de Transaccion";
			$this->anchos[]=15;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
			$this->titulos[]="Nro Factura Afectada";
			$this->anchos[]=20;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
	        $this->titulos[]="Compras Internas  Incluyendo IVA";
			$this->anchos[]=20;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='R';
	        $this->titulos[]="Compras Internas Exentas o Exonerada";
			$this->anchos[]=20;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='R';
			$this->titulos[]="Base Imponible";
			$this->anchos[]=20;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='R';


		}
		else
		{
	        $this->titulos[]="Fecha Aplic. Retencion";
			$this->anchos[]=16;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
	        $this->titulos[]="Nro de Factura";
			$this->anchos[]=16;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
	        $this->titulos[]="Nro control de Factura";
			$this->anchos[]=16;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
	        $this->titulos[]="Concepto";
			$this->anchos[]=101;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='L';
		}
		if($this->rete!="V")
		{
			$this->titulos[]="Base Imponible";
			$this->anchos[]=24;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='R';
	        $this->titulos[]="% Alicuota";
			$this->anchos[]=16;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='R';
		}
		if($this->rete=="V")
		{
	        $this->titulos[]="% Alicuota";
			$this->anchos[]=13;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
		}else
		{
			$this->titulos[]=$this->imp." Retenido (al vendedor)";
			$this->anchos[]=24;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='R';
		}
		if($this->rete=="V")
		{
	        $this->titulos[]="Impuesto IVA";
			$this->anchos[]=20;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='R';
			$this->titulos[]="IVA Retenido (al vendedor)";
			$this->anchos[]=20;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='R';
			$this->titulos[]="Cuenta Bancaria";
			$this->anchos[]=20;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
		}
		else
		{
	        $this->titulos[]="Monto Total";
			$this->anchos[]=24;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='R';

	        $this->titulos[]="Cuenta Bancaria";
			$this->anchos[]=16;
			$this->aliniacion[]='C';
			$this->aliniacion2[]='C';
		}
	}


    function Header()
    {

      //configuro la pagina con Orientacion Horizontal
      //busco la descripcion y direccion de la empresa

      $this->cab->poner_cabecera($this,"","l","s");
      $this->setFont("Arial","B",9);
      $this->L1();
      $this->cell(15,10,"Desde :");$this->L2();$this->cell(25,10,$this->fecdes);
      $this->Ln(4);
      $this->L1();
      $this->cell(15,10,"Hasta :");$this->L2();$this->cell(25,10,$this->fechas);
      $this->Ln(4);
      $tb1=$this->bd->select("SELECT NOMEMP as NOMEMPRESA FROM EMPRESA");
      $this->L1();
      $this->cell(15,10,"Oficina :");$this->L2();$this->cell(25,10,strtoupper($tb1->fields["nomempresa"]));
	  $this->setFont("Arial","B",12);	
	  $this->cell(125,10,"",0,'C');  
	  $this->cell(35,10,"LIBRO DE COMPRAS ".$this->imp,0,'C');
	  $this->setFont("Arial","B",9);
      $this->SetWidths($this->anchos);
      $this->SetAligns($this->aliniacion);
      $this->SetBorder(true);
      if(!$this->notit)
      {
      	  if($this->rete=="V")
      	  {
	      $this->SetXY(234,$this->GetY()+5);
	      $this->Multicell(112,5,"",0,'C');
      	  }
      	  else
      	  {
	      $this->SetXY(279,$this->GetY()+5);
	      $this->Multicell(64,5,"INTERNAS",1,'C');
      	  }
	      $this->setFont("Arial","B",8);
	      $this->RowM($this->titulos);
      }
      $this->SetAligns($this->aliniacion2);
    }

    function Footer()
    {
    	if(!$this->nopie and $this->rete=="V")
    	{
	    	$this->SetXY(10,264);
		    $this->setFont("Arial","",8);
	      	$this->Cell(100,5,'DE = Deducibles    PD = Parcialmente Deducibles    ND = No Deducibles');
    	}
    }

    function L1()
    {
    $this->setFont("Arial","B",9);
    }
    function L2()
    {
    $this->setFont("Arial","",9);
    }
    function PutLink($URL,$txt)
    {
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }
    function SetStyle($tag,$enable)
    {
        //Modificar estilo y escoger la fuente correspondiente
        $this->$tag+=($enable ? 1 : -1);
        $style='';
        foreach(array('B','I','U') as $s)
            if($this->$s>0)
                $style.=$s;
        $this->SetFont('',$style);
    }
    function Cuerpo()
    {
      $tb=$this->bd->select($this->sql);
      $this->tb2=$tb;
      $Inicio=$this->GetY();
      $this->setFont("Arial","",7);
      $txt=$_POST["txt"];
      $rif=$this->rif;
      $cont=1;
      $existe=false;
      $numret=0;
      $cont=0;
          if ($tb->fields["fecfac"]!=""){
//----------------------------------------------------------------------------------------------------------------------- 	
		  if ($txt=='SI' and $this->rete=="V")
		  {
				$nombre_archivo="FUNDACION_TELEVISORA_DE_LA_ASAMBLEA_NACIONAL_DECLARACION_INFORMATIVA_COMPRAS".strftime('%d%m%Y',time()).".txt";
				if (!file_exists($nombre_archivo))
				{
					fopen($nombre_archivo,"w");
				}
				chmod ($nombre_archivo,0755);
				$ar_txt = fopen($nombre_archivo,'w+');
		  }
		   if ($txt=='SI' and $this->rete=="I")
		  {
		  		$nombre_archivo="FUNDACION_TELEVISORA_DE_LA_ASAMBLEA_NACIONAL_DECLARACION_INFORMATIVA_COMPRAS_ISLR".strftime('%d%m%Y',time()).".xls";
				if (!file_exists($nombre_archivo))
				{
					fopen($nombre_archivo,"w");
				}
				chmod ($nombre_archivo,0755);
				$ar_txt = fopen($nombre_archivo,'w+');
		  }
							
//-----------------------------------------------------------------------------------------------------------------------							
							
              while (!$tb->EOF)
              { $cont++;
              	$numret++;

              	  if ($this->rete=="V") //iva
     			  {
     			  	$base=$tb->fields["basimp"];
     			 	$por=$tb->fields["poriva"];
     			 	$rete=$tb->fields["monret"];
     			 	$iva=$tb->fields["moniva"];
     			 	$exe=$tb->fields["exeiva"];
     			  }
			      elseif($this->rete=="I") //islr
			      {
			      	$base=$tb->fields["basislr"];
			      	$por=$tb->fields["porislr"];
			      	$rete=$tb->fields["monislr"];
			      	$iva=0;
			      	$exe=0;
			      }
			      elseif($this->rete=="L") //ltf
			      {
			      	$base=$tb->fields["basltf"];
			      	$por=$tb->fields["porltf"];
			      	$rete=$tb->fields["monltf"];
			      	$iva=0;
			      	$exe=0;
			      }

				  if($tb->fields["rifalt"]!='')
				  { $this->rifalterno=$tb->fields["rifalt"]; }
                  else
                  { $this->rifalterno=$tb->fields["cedrif"];}

                  if($tb->fields["rifalt"]!='')
                  {
                    $tb1=$this->bd->select("select nomben as benalterno from opbenefi where rtrim(cedrif)=rtrim('".$tb->fields["rifalt"]."')");
                    $this->benalterno=$tb1->fields["benalterno"];
                  }else
                  {
                    $this->benalterno=$tb->fields["nomben"];
                  }
                  $nro=$tb->fields["numfac"];
                  if ($tb->fields["tiptra"]=='01')
                  {
					if($this->rete=="V")
					{
					$this->RowM(array($cont,$tb->fields["fecfac"],strtoupper(trim($this->rifalterno)),strtoupper(trim($this->benalterno)),
									 $tb->fields["comprobante"],"",trim($tb->fields["numfac"]),trim($tb->fields["numctr"]),trim($tb->fields["numord"]),
									 "","01 Factura",$tb->fields["facafe"],H::FormatoMonto($tb->fields["totfac"]),H::FormatoMonto($tb->fields["exeiva"]),
									 H::FormatoMonto($base),H::FormatoMonto($por),H::FormatoMonto($iva),H::FormatoMonto($rete),$tb->fields["ctaban"]));

					}
                	elseif($rete>0)
                	{
                	$this->RowM(array($cont,strtoupper(trim($this->rifalterno)),trim($this->benalterno),trim($tb->fields["numord"]),trim($tb->fields["fecret"]),trim($tb->fields["numfac"]),trim($tb->fields["numctr"]),trim($tb->fields["desord"]),H::FormatoMonto($base),H::FormatoMonto($por),H::FormatoMonto($rete),H::FormatoMonto($tb->fields["totfac"]),trim($tb->fields["ctaban"])));
                	}
                  }
                  elseif($tb->fields["tiptra"]=='02')
                  {
					if($this->rete=="V")
					{
					$this->RowM(array($cont,$tb->fields["fecfac"],strtoupper(trim($this->rifalterno)),strtoupper(trim($this->benalterno)),
									 $tb->fields["comprobante"],"",trim($tb->fields["numfac"]),trim($tb->fields["numctr"]),trim($tb->fields["numord"]),
									 "","01 Factura",$tb->fields["facafe"],H::FormatoMonto($tb->fields["totfac"]),H::FormatoMonto($tb->fields["exeiva"]),
									 H::FormatoMonto($base),H::FormatoMonto($por),H::FormatoMonto($iva),H::FormatoMonto($rete),$tb->fields["ctaban"]));
					}
                	elseif($rete>0)
                	{
                	$this->RowM(array($cont,strtoupper(trim($this->rifalterno)),trim($this->benalterno),trim($tb->fields["numord"]),trim($tb->fields["fecret"]),trim($tb->fields["numfac"]),trim($tb->fields["numctr"]),trim($tb->fields["desord"]),H::FormatoMonto($base),H::FormatoMonto($por),H::FormatoMonto($rete),H::FormatoMonto($tb->fields["totfac"]),trim($tb->fields["ctaban"])));
                	#$this->RowM(array($cont,strtoupper(trim($this->rifalterno)),trim($this->benalterno),$tb->fields["numfac"],'',H::FormatoMonto($base),H::FormatoMonto($por),H::FormatoMonto($rete),H::FormatoMonto($tb->fields["totfac"]),trim($tb->fields["ctaban"])));
                	}
                  }
                  elseif($tb->fields["tiptra"]=='03')
                  {
					if($this->rete=="V")
					{
					$this->RowM(array($cont,$tb->fields["fecfac"],strtoupper(trim($this->rifalterno)),strtoupper(trim($this->benalterno)),
									 $tb->fields["comprobante"],"",trim($tb->fields["numfac"]),trim($tb->fields["numctr"]),trim($tb->fields["numord"]),
									 "","01 Factura",$tb->fields["facafe"],H::FormatoMonto($tb->fields["totfac"]),H::FormatoMonto($tb->fields["exeiva"]),
									 H::FormatoMonto($base),H::FormatoMonto($por),H::FormatoMonto($iva),H::FormatoMonto($rete),$tb->fields["ctaban"]));
					}
                	elseif($rete>0)
                	{
                	$this->RowM(array($cont,strtoupper(trim($this->rifalterno)),trim($this->benalterno),trim($tb->fields["numord"]),trim($tb->fields["fecret"]),trim($tb->fields["numfac"]),trim($tb->fields["numctr"]),trim($tb->fields["desord"]),H::FormatoMonto($base),H::FormatoMonto($por),H::FormatoMonto($rete),H::FormatoMonto($tb->fields["totfac"]),trim($tb->fields["ctaban"])));
                	#$this->RowM(array($cont,strtoupper(trim($this->rifalterno)),trim($this->benalterno),'','',H::FormatoMonto($base),H::FormatoMonto($por),H::FormatoMonto($rete),H::FormatoMonto($tb->fields["totfac"]),trim($tb->fields["ctaban"])));
                	}
                  }
				  
//-----------------------------------------------------------------------------------------------------------------------------//

								if ($txt=='SI')
								{
									$aux=explode("/",$this->fechas);
									$col2=$aux[2].$aux[1];
									$aux='';
									$aux=explode("/",$tb->fields["fecfac"]);
									$col3=$aux[2]."-".$aux[1]."-".$aux[0];
									$col4="C";
									$col5=$tb->fields["tiptra"];
									$col6=rtrim($this->rifalterno);
									$col7=$tb->fields["numfac"];
									$col8=$tb->fields["numctr"];
									$col9=number_format($tb->fields["totfac"],2,'.','');
									$col10=number_format($tb->fields["basimp"],2,'.','');
									$col11=number_format($tb->fields["monret"],2,'.','');
									$col12=$tb->fields["facafe"];
									$col13=$tb->fields["comprobante"];
									$col14=number_format($tb->fields["exeiva"],0,'','');
									$col15=number_format($tb->fields["poriva"],0,'','');
									$col16=number_format('0',0,'','');
									

									$linea=$rif.chr(9).$col2.chr(9).$col3.chr(9).$col4.chr(9).$col5.chr(9).$col6.chr(9).$col7.chr(9).$col8.chr(9).$col9;
									$linea.=chr(9).$col10.chr(9).$col11.chr(9).$col12.chr(9).$col13.chr(9).$col14.chr(9).$col15.chr(9).$col16.chr(13).chr(10);
									fputs($ar_txt,$linea);
								}
								
								
								

//-----------------------------------------------------------------------------------------------------------------------------//


                $Tot_totfac=$Tot_totfac + $tb->fields["totfac"];
                $Tot_exeiva=$Tot_exeiva + $exe;
                $Tot_baseimp=$Tot_baseimp + $base;
                $Tot_moniva=$Tot_moniva + $iva;
                $Tot_monret=$Tot_monret + $rete;

                $cont=$cont+1;
              $tb->MoveNext();
            } //------------------------------ fin while EOF

          $this->Ln(4);

          $this->setFont("Arial","B",8);
          if($this->rete=="V")
          {
			  $this->rowm(array("","","","","","","","","","","","TOTALES",H::FormatoMonto($Tot_totfac),H::FormatoMonto($Tot_exeiva),
			  					H::FormatoMonto($Tot_baseimp),"",H::FormatoMonto($Tot_moniva),H::FormatoMonto($Tot_monret),"",""));
	          $this->SetX(200);
	          /*$this->cell(34,10,"TOTALES",1,0,'C');
	          $this->cell(24,10,number_format($Tot_totfac,2,'.',','),1,0,'R');
	          $this->cell(24,10,number_format($Tot_baseimp,2,'.',','),1,0,'R');
	          $this->cell(24,10,number_format( $Tot_moniva,2,'.',','),1,0,'R');
	          $this->cell(16,10,"---",1,0,'C');
	          $this->cell(24,10,number_format($Tot_exeiva,2,'.',','),1,0,'R');
	          //$this->cell(24,10,number_format( $Tot_monret,2,'.',','),1,0,'R');*/
          }
          else
          {
	          $this->SetX(245);
	          $this->cell(34,10,"TOTALES",1,0,'C');
	          $this->cell(24,10,number_format($Tot_baseimp,2,'.',','),1,0,'R');
	          $this->cell(16,10,"---",1,0,'C');
	          $this->cell(24,10,number_format( $Tot_monret,2,'.',','),1,0,'R');
	          $this->cell(24,10,number_format($Tot_totfac,2,'.',','),1,0,'R');
          }
          $this->Ln(7);
		  $this->setautoPagebreak(false);
          $this->cell(330,10,"Total Retencion del Periodo",0,0,'R');
          $this->cell(30,10,number_format($numret,2,'.',','),0,0,'R');
          $this->Ln(10);
          $y=$this->GetY();
          //$this->Line(106,$y,370,$y);
          //$this->Line(106,$y+1,370,$y+1);
          $this->setautoPagebreak(true,20);
          $this->notit=true;
          if($this->GetY()>160)
	  	  $this->AddPage();
          $this->nopie=true;
		  
		  
//-----------------------------------------------------------------------------------------------------------------------------//

			if ($txt=='SI')
			{
				fclose($ar_txt);
				$existe=true;
			}

//-----------------------------------------------------------------------------------------------------------------------------//
		  
		  
		  
          } //EndIf
      $this->setFont("Arial","B",8);
      $this->Ln(20);
      $this->SetX(10);
      $this->Cell(100,5,'Creditos Fiscales');
      $this->Ln();
      $y=$this->GetY();
      $y1=$y;
      $this->setFont("Arial","B",8);
      $this->Rect(10,$y,160,65);
      $this->Line(106,$y,106,$y+65);//1-48
      $this->Line(138,$y,138,$y+65);//5-16
      $this->Line(10,$y+10,170,$y+10);
      $y+=10;
      for ($i=0;$i<11;$i++){
        $y+=5;
        $this->Line(10,$y,170,$y);
      }
      $this->SetXY(10,$y1);
      $this->Cell(96,10,'RESUMEN DEL PERIODO',0,0,'C');
      $this->Cell(32,10,'BASE IMPONIBLE',0,0,'C');
      $this->Cell(32,10,'CREDITO FISCAL',0,0,'C');
      $this->setFont("Arial","B",7);
      $y1+=10;
      $this->SetXY(10,$y1);
      $this->Cell(96,5,'TOTAL COMPRAS INTERNAS AFECTADAS EN ALICUOTA GENERAL',0,0,'L');
      $this->cell(32,5,number_format('0',2,'.',','),0,0,'R');
      $this->cell(32,5,number_format('0',2,'.',','),0,0,'R');
      $y1+=5;
      $this->SetXY(10,$y1);
      $this->setFont("Arial","B",6.5);
      $this->Cell(96,5,'TOTAL COMPRAS INTERNAS AFECTADAS EN ALICUOTA GENERAL + ADICIONAL',0,0,'L');
      $this->setFont("Arial","B",7);
      $this->cell(32,5,number_format('0',2,'.',','),0,0,'R');
      $this->cell(32,5,number_format('0',2,'.',','),0,0,'R');
      $y1+=5;
      $this->SetXY(10,$y1);
      $this->Cell(96,5,'TOTAL COMPRAS INTERNAS AFECTADAS EN ALICUOTA REDUCIDA',0,0,'L');
      $this->cell(32,5,number_format('0',2,'.',','),0,0,'R');
      $this->cell(32,5,number_format('0',2,'.',','),0,0,'R');
      $y1+=5;
      $this->SetXY(10,$y1);
      $this->Cell(96,5,'TOTAL EXENTAS COMPRAS INTERNAS',0,0,'L');
      $this->cell(32,5,number_format($Tot_exeiva,2,'.',','),0,0,'R');
      $this->cell(32,5,number_format('0',2,'.',','),0,0,'R');
      $y1+=5;
      $this->SetXY(10,$y1);
      $this->Cell(96);
      $y1+=5;
      $this->SetXY(10,$y1);
      $this->Cell(96,5,'TOTALES GENERALES',0,0,'L');
      $this->cell(32);
      $this->cell(32,5,number_format($Tot_totfac,2,'.',','),0,0,'R');
      $y1+=5;
      $this->SetXY(10,$y1);
      $this->Cell(96,5,'Creditos Fiscales Totalmente Deducible',0,0,'L');
      $this->cell(32,5,number_format('0',2,'.',','),0,0,'R');
      $this->cell(32,5,number_format( $Tot_moniva,2,'.',','),0,0,'R');
      $y1+=5;
      $this->SetXY(10,$y1);
      $this->Cell(96,5,'Creditos Fiscales Parcialmente Deducible',0,0,'L');
      $this->cell(32,5,number_format('0',2,'.',','),0,0,'R');
      $this->cell(32,5,number_format('0',2,'.',','),0,0,'R');
      $y1+=5;
      $this->SetXY(10,$y1);
      $this->Cell(96,5,'Total Creditos Fiscales Deducibles',0,0,'L');
      $this->cell(32,5,number_format('0',2,'.',','),0,0,'R');
      $this->cell(32,5,number_format( $Tot_moniva,2,'.',','),0,0,'R');
      $y1+=5;
      $this->SetXY(10,$y1);
      $this->Cell(96);
      $y1+=5;
      $this->SetXY(10,$y1);
      $this->Cell(96,5,'Total ' .$this->imp. ' Retenido al Vendedor',0,0,'L');
      $this->cell(32);
      $this->cell(32,5,number_format('5',2,'.',','),0,0,'R');
	  
	  //-----------------------------------------------------------------------------------------------------------------------------//

			if (($txt=='SI') && ($existe))
			{
 				//$dir = parse_url($_SERVER['PATH_TRANSLATED']);
 				$dir = parse_url($_SERVER['HTTP_REFERER']);

				$parte = explode("/",$dir['path']);
				for($i=0;$i<count($parte)-1;$i++)
				{
					$agregar.=$parte[$i]."/";
				}

//print $agregar." ----- ".$dir['path']." ----- ".$dir['host'] ;
				$dir = $dir['scheme'].'://'.$dir['host'].$agregar;

				//print $dir;
			    $this->PutLink($dir.'descargar.php?archivo='.$nombre_archivo,'Descargar Archivo');
			}

//-----------------------------------------------------------------------------------------------------------------------------//

	  
	  /*-----------------------------------------------------------------------------------------------------------------------------
      if ($txt=='SI')
      {
			$dir = parse_url($_SERVER['HTTP_REFERER']);
			$dirpath=$dir['path'];
			if(!(strrpos($dir['path'],".php")))
				$dirpath=$dir['path'].".php";
			$dir = eregi_replace(".php","_hc.php",$dir['scheme'].'://'.$dir['host'].$dirpath);
			#$direccion= eregi_replace(" ","@#@",trim($dir).'?fecdes='.$this->fecdes.'&fechas='.$this->fechas.'&elaborado='.$this->elaborado.'&autorizado='.$this->autorizado.'&revisado='.$this->revisado.'&rete='.$this->rete);
			$this->PutLink(trim($dir).'?fecdes='.$this->fecdes.'&fechas='.$this->fechas.'&elaborado='.$this->elaborado.'&autorizado='.$this->autorizado.'&revisado='.$this->revisado.'&rete='.$this->rete,'Visualizar TXT');
      }
	  -----------------------------------------------------------------------------------------------------------------------------*/
    $this->bd->closed();

    }
}
?>
