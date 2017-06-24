<?
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Herramientas.class.php");


	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=T_4386_21_".date('dmY')."_01.txt");


            $bd= new basedatosAdo();
    	     $codnomdes = H::GetPost("codnomdes");
    	     $codnomhas = H::GetPost("codnomhas");
            $especial = H::GetPost("especial");
            $tipnomesp = H::GetPost("tipnomesp");
            $nomminesp = H::GetPost("nomminesp");
            $codcondes=H::GetPost("codcondes");
            $monto=H::GetPost("monto");
            $cliente = H::GetPost("cliente");
            $producto=H::GetPost("producto");
            $punto=H::GetPost("punto");
            $pedido=H::GetPost("pedido");
            $cesta=H::GetPost("cesta");
            $fecnomdes= H::GetPost("fecnomdes");
            $fecnomhas= H::GetPost("fecnomhas");

           if ($especial == 'S')
            {
            	$especial = " a.especial = 'S' AND (A.CODNOMESP) = TRIM('".$nomminesp."') AND  ";
            }
            else
            {
            	if ($especial == 'N')       	$especial = " a.especial = 'N' AND"; else
            	if ($especial == 'T')         $especial = "";
            }


	    	$sql="select b.nacemp, b.codemp, b.cedemp, b.nomemp , to_char(B.FECNAC,'dd/mm/yyyy') as fecnac, a.monto as saldo, a.cantidad as cantidad
						from
						NPHISCON a,NPHOJINT B, npcestatickets c
						where
						B.CODEMP = A.CODEMP and $especial
						A.CODNOM >= '".$codnomdes."' and 
						A.CODNOM <= '".$codnomhas."'
                      		       and a.fecnom=to_date('$fecnomhas','DD/MM/YYYY') and 
						a.codnom=c.codnom and 
						a.codcon=c.codcon
						order by cast(REPLACE(b.cedemp,'.', '') as int ) ";

			//print '<pre>'; print $sql;

$arrp=$bd->select($sql);
while(!$arrp->EOF)
{

		 $apellido=($arrp->fields["nomemp"]);
        	 $apellido2=explode(",",$apellido);
		 $nombre=$apellido2[1];
		 $nombre2=explode(" ",$nombre);
		 $apellido3=rtrim(substr($apellido2[0],0,20));
 		 $apellido4=explode(" ",$apellido3);

         //echo $cliente.';'.$producto.';'.$arrp->fields["cedemp"].';'.$arrp->fields["nomemp"].';'.$punto.';'.$pedido.';'.H::FormatoMonto($arrp->fields["saldo"]).';'.number_format((($arrp->fields["saldo"]/$monto)),0,'.',',').';'.H::FormatoMonto($monto).';'.chr(10);
	 
////////sin denominacion de ticket solo monto
	   //echo $cliente.';'.$producto.';'.$arrp->fields["cedemp"].';'.$arrp->fields["nomemp"].';'.$punto.';'.$pedido.';'.H::FormatoMonto($arrp->fields["saldo"]).';;;'.chr(10);

///////regular
		echo $arrp->fields["nacemp"].str_pad(trim(strtoupper(trim(str_replace(".","",str_replace("-","",$arrp->fields["cedemp"]))))),8,"0",STR_PAD_LEFT).';'.$nombre2[1].';'.$apellido4[0].';'.$arrp->fields["fecnac"].';'.$punto.';'.$cliente.';'.$producto.';'.'3'.';'.str_replace(".",",",$arrp->fields["saldo"]).';'.$pedido.chr(10);
		
//              echo $cliente.';'.$producto.';'.$arrp->fields["cedemp"].';'.$arrp->fields["nomemp"].';'.$punto.';'.$pedido.';'.H::FormatoMonto($arrp->fields["saldo"]).';'.H::FormatoMonto($arrp->fields["cantidad"],0).';25,00;'.chr(10);



     $arrp->MoveNext();
}
$bd->closed();
?>