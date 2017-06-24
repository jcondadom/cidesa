<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<? if ($fordefmet->getInvfun()=='I')  {
  ?><?php echo radiobutton_tag('fordefmet[invfun]', 'I', true)        ."Inversión".'&nbsp;&nbsp;';
          echo radiobutton_tag('fordefmet[invfun]', 'F', false)."   Funcionamiento";?>
    <?
}else{
  echo radiobutton_tag('fordefmet[invfun]', 'I', false)        ."Inversión".'&nbsp;&nbsp;';
  echo radiobutton_tag('fordefmet[invfun]', 'F', true)."   Funcionamiento";
} ?>