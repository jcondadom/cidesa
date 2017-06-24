<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?
	echo grid_tag_v2($fafactur->getObj1());
?>

<script language="JavaScript" type="text/javascript">
  var am=obtener_filas_grid('a',2);
  var j=0;
  while (j<am)
  {
    var fecha="trigger_ax_"+j+"_3";

    $(fecha).hide();
  	j++;
  }

</script>
