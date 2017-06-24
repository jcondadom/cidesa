<?php
/*
 * Created on 25/07/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php
if ($manordtra->getRefest()=='S'){
	echo radiobutton_tag('manordtra[refest]','S', true, array('onClick' => 'mostrar(this.id)')) .'  '. "Si ";
	echo radiobutton_tag('manordtra[refest]','N', false, array('onClick' => 'mostrar(this.id)')) .'  '. "No ";
}
else  {
	echo radiobutton_tag('manordtra[refest]','S', false, array('onClick' => 'mostrar(this.id)')) .'  '. "Si ";
	echo radiobutton_tag('manordtra[refest]','N', true, array('onClick' => 'mostrar(this.id)')) .'  '. "No ";
}

?>