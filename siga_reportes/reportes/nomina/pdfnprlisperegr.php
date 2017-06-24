<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $i=0;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->fecretdes=$_POST["fecretdes"];
			$this->fecrethas=$_POST["fecrethas"];
			$this->tipnom=$_POST["tipnom"];




		 $this->sql="select a.codemp, b.nomemp, to_char(a.fecing,'dd/mm/yyyy') as fecing, to_char(a.fecret,'dd/mm/yyyy') as fecret, f.nomcar, g.desniv, b.nomnom
 			from
 		nphojint a
 		inner join
       	(select distinct codemp, nomemp, codnom, nomnom,
       	(select codcar from npasicaremp np where np.codemp=npasicaremp.codemp order by id desc limit 1) as codcar
       	from npasicaremp ) b on a.codemp=b.codemp
 		inner join npcargos f on b.codcar=f.codcar
 		inner join npestorg g on a.codniv=g.codniv
		where
		a.codemp>=('$this->codempdes') and
		a.codemp<=('$this->codemphas') and
		a.fecret>=to_date('$this->fecretdes','dd/mm/yyyy') and
		a.fecret<=to_date('$this->fecrethas','dd/mm/yyyy') and
		b.codnom='".$this->tipnom."'
		order by a.fecret";












		//print "<pre>".$this->sql;exit;

						$arrp=$this->bd->select($this->sql);
						$this->arrp= $arrp->GetArray();

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",8);
			$this->cell(60,5,'DESDE EL: '.$this->fecretdes.' HASTA '.$this->fecrethas);
			$this->setFont("Arial","B",8);
			$this->ln(5);
			$this->setTextColor(0,0,255);
			$this->setwidths(array(18,60,20,20,50,60,30));
			$this->setAligns('C');
			$this->setborder(true);
			$this->rowm(array("CÉDULA","NOMBRE","FECHA DE INGRESO","FECHA DE EGRESO","CARGO","DEPENDENCIA","NÓMINA"));
			$this->setwidths(array(18,60,20,20,50,60,30));
			$this->setAligns(array('C','L','C','C','L','L','C'));
			$this->setborder(true);
			$this->setFont("Arial","",7);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","",7);
			$totemp=0;
			foreach($this->arrp as $reg)
			{
				$this->setAligns(array('L','L','C','L','L','L','L'));
				$this->rowm($reg);
				$totemp++;
			}
			//TOTALES
			$this->setFont("Arial","B",8);
			$this->setautopagebreak(false);
			$this->rowm(array("","","","","","TOTAL EMPLEADOS",$totemp));
		}
	}
?>