<?php
/*
 * Created on 25/07/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($manordtra->getIncree()=='S'){
	echo radiobutton_tag('manordtra[incree]','S', true) .'  '. "Si ";
	echo radiobutton_tag('manordtra[incree]','N', false) .'  '. "No ";
}
else  {
	echo radiobutton_tag('manordtra[incree]','S', false) .'  '. "Si ";
	echo radiobutton_tag('manordtra[incree]','N', true) .'  '. "No ";
}

?>