<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?
if ($fcconrep->getTipcon()=='N' || $fcconrep->getTipcon()=='')	{
  ?><?php
      echo radiobutton_tag('fcconrep[tipcon]', 'N', true,array('readonly'=>'true'))        ."Natural".'&nbsp;&nbsp;';
      echo radiobutton_tag('fcconrep[tipcon]', 'J', false,array('readonly'=>'true'))        ."Juridica".'&nbsp;&nbsp;';
    ?>
   <?

}else{
     echo radiobutton_tag('fcconrep[tipcon]', 'N', false,array('readonly'=>'true'))        ."Natural".'&nbsp;&nbsp;';
     echo radiobutton_tag('fcconrep[tipcon]', 'J', true,array('readonly'=>'true'))        ."Juridica".'&nbsp;&nbsp;';

} ?>