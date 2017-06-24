<?php
/*
 * Created on 25/07/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($manordtra->getDemcie()=='S'){
	echo radiobutton_tag('manordtra[demcie]','S', true, array('onClick' => 'mostrar2(this.id)')) .'  '. "Si ";
	echo radiobutton_tag('manordtra[demcie]','N', false, array('onClick' => 'mostrar2(this.id)')) .'  '. "No ";
}
else  {
	echo radiobutton_tag('manordtra[demcie]','S', false, array('onClick' => 'mostrar2(this.id)')) .'  '. "Si ";
	echo radiobutton_tag('manordtra[demcie]','N', true, array('onClick' => 'mostrar2(this.id)')) .'  '. "No ";
}

?>


