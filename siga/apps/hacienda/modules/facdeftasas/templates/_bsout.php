<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<? if ($fcdeftasas->getBsout()=='B')  {
  ?><?php echo radiobutton_tag('fcdeftasas[bsout]', 'B', true)        ."Bolívares".'&nbsp;&nbsp;';
          echo radiobutton_tag('fcdeftasas[bsout]', 'U', false)."   Unidad Tributaria";?>
    <?
}else{
  echo radiobutton_tag('fcdeftasas[bsout]', 'B', false)        ."Bolí­vares".'&nbsp;&nbsp;';
  echo radiobutton_tag('fcdeftasas[bsout]', 'U', true)."   Unidad Tributaria";
} ?>