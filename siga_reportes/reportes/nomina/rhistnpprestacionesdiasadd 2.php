<?

	require_once("pdfhistnpprestacionesdiasadd2.php");
	$obj= new pdfreporte();
	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>