<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<? if ($tsdefcajchi->getSujren()=='S')  {
  ?><?php echo radiobutton_tag('tsdefcajchi[sujren]', 'S', true)        ."   Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
      echo radiobutton_tag('tsdefcajchi[sujren]', 'N', false)."     No";?>
    <?
}else{
  echo radiobutton_tag('tsdefcajchi[sujren]', 'S', false)        ." Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
  echo radiobutton_tag('tsdefcajchi[sujren]', 'N', true)."   No";

} ?>