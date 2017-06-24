<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<? if ($tscheemi->getConformado()=='S')  {
  ?><?php echo radiobutton_tag('tscheemi[conformado]', 'S', true)        ."   Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
      echo radiobutton_tag('tscheemi[conformado]', 'N', false)."     No";?>
    <?
}else{
  echo radiobutton_tag('tscheemi[conformado]', 'S', false, array('onClick' => "$$('.sf_admin_action_save')[0].show();"))        ." Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
  echo radiobutton_tag('tscheemi[conformado]', 'N', true, array('onClick' => "$$('.sf_admin_action_save')[0].hide();"))."   No";

} ?>