<?php if ($viasolbolaer->getIdavue()=='V')  { ?>
  <?php echo radiobutton_tag('viasolbolaer[idavue]', 'V', true, array('onClick' => '$("divfecreg").show(); $("divhorreg").show();'))        ."   Ida y Vuelta".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
      echo radiobutton_tag('viasolbolaer[idavue]', 'I', false, array('onClick' => '$("divfecreg").hide(); $("divhorreg").hide(); $("viasolbolaer_fecreg").value=""; $("viasolbolaer_horreg").value="";'))."     Solo Ida";?>
 <?php }else{
  echo radiobutton_tag('viasolbolaer[idavue]', 'V', false, array('onClick' => '$("divfecreg").show(); $("divhorreg").show();'))        ." Ida y Vuelta".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
  echo radiobutton_tag('viasolbolaer[idavue]', 'I', true, array('onClick' => '$("divfecreg").hide(); $("divhorreg").hide(); $("viasolbolaer_fecreg").value=""; $("viasolbolaer_horreg").value="";'))."   Solo Ida";
} ?>