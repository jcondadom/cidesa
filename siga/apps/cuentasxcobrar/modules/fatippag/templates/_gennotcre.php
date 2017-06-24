<?php
/*
 * Created on 25/07/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($fatippag->getGennotcre()=='S'){
	echo radiobutton_tag('fatippag[gennotcre]','S', true) .'  '. "Si ";
	echo radiobutton_tag('fatippag[gennotcre]','N', false) .'  '. "No ";
}
else  {
	echo radiobutton_tag('fatippag[gennotcre]','S', false) .'  '. "Si ";
	echo radiobutton_tag('fatippag[gennotcre]','N', true) .'  '. "No ";
}

?>