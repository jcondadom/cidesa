<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php echo grid_tag_v2($bnsolpolcer->getObj()); ?>

<script type="text/javascript">
if ($('bnsolpolcer_tipsol').value=='C')
	$('divnumref').show();
else
	$('divnumref').hide();
</script>

