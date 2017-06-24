<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<? if ($npjortur->getJorlab()=='N')  {
  ?><?php echo radiobutton_tag('npjortur[jorlab]', 'S', false)        ."   Si".'&nbsp;&nbsp;';
      echo radiobutton_tag('npjortur[jorlab]', 'N', true)."     No";?>
    <?
}else{
  echo radiobutton_tag('npjortur[jorlab]', 'S', true)        ."Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npjortur[jorlab]', 'N', false)."   No";

} ?>
