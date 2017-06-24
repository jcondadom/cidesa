<?

	require_once("pdfhistnptxtprestamos2.php");
	$obj= new pdfreporte();
	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>