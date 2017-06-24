<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php
	echo grid_tag_v2($opordpag->getObjeto());
?>

<script language="JavaScript" type="text/javascript">
  var am=parseInt('<?php echo $opordpag->getFilasord() ?>');
  var j=0;
  while (j<am)
  {
    var fecha="trigger_ax_"+j+"_5";

    $(fecha).hide();
  	j++;
  }
</script>
<div> 
<?php echo button_to_function("Marcar Todos","$$('input.acol1').each(function(i){i.checked = true});") ?> 
<?php echo button_to_function("Desmarcar Todos","$$('input.acol1').each(function(i){i.checked = false});") ?>
</div>