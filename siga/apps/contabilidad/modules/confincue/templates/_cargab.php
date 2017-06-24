<?php
if ($contabb->getCargab()=="C"){
	echo radiobutton_tag('contabb[cargab]','C', true) .'  '. "Si ";
	echo radiobutton_tag('contabb[cargab]','N', false) .'  '. "No "."<br>";
}else{
	echo radiobutton_tag('contabb[cargab]','C', false, array('onClick' =>'$("contabb_salant").readOnly=false')) .'  '. "Si ";
	echo radiobutton_tag('contabb[cargab]','N', true, array('onClick' =>'$("contabb_salant").value="0,00"; $("contabb_salant").readOnly=true')) .'  '. "No "."<br>";
}
?>


