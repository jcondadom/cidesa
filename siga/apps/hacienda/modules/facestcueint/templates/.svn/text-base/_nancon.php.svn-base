<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?
if ($fcconrep->getNaccon()=='V' || $fcconrep->getNaccon()=='')	{
  ?><?php
        echo radiobutton_tag('fcconrep[naccon]', 'V', true,array('readonly'=>'true'))        ."Venezonalo(a)".'&nbsp;&nbsp;';
        echo radiobutton_tag('fcconrep[naccon]', 'E', false,array('readonly'=>'true'))        ."Extranjero(a)".'&nbsp;&nbsp;';
    ?>
   <?

}else{
        echo radiobutton_tag('fcconrep[naccon]', 'V', false,array('readonly'=>'true'))        ."Venezonalo(a)".'&nbsp;&nbsp;';
	echo radiobutton_tag('fcconrep[naccon]', 'E', true,array('readonly'=>'true'))        ."Extranjero(a)".'&nbsp;&nbsp;';

} ?>