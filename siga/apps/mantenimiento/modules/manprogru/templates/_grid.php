<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php
	echo grid_tag_v2($manprogru->getObj());
?>

<script type="text/javascript" lang="JavaScript"> 
$('trigger_manprogru_fecult').hide();
$('trigger_manprogru_fecprx').hide();

for (var i = 0; i < 10; i++) {
	$('ax_'+i+'_2').readOnly=true;
	$('trigger_ax_'+i+'_2').hide();
};
</script>
