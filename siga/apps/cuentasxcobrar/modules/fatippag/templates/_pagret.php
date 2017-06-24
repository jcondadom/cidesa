<?php
/*
 * Created on 25/07/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($fatippag->getPagret()=="S"){
	echo radiobutton_tag('fatippag[pagret]','S', true) .'  '. "Si ";
	echo radiobutton_tag('fatippag[pagret]','N', false) .'  '. "No ";
}
else  {
	echo radiobutton_tag('fatippag[pagret]','S', false) .'  '. "Si ";
	echo radiobutton_tag('fatippag[pagret]','N', true) .'  '. "No ";
}

?>