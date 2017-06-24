<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?
	echo grid_tag_v2($npnucemphor->getObj());
?>

<script type="text/javascript">
var nuevo='<?php echo $npnucemphor->getId();?>';
if (nuevo!='')
{
	$('npnucemphor_codniv').readOnly=true;
	$$('.botoncat')[0].disabled=true;
	$('npnucemphor_codcon').readOnly=true;
	$$('.botoncat')[1].disabled=true;
	$('trigger_npnucemphor_fecreg').hide();
    $('npnucemphor_fecreg').readOnly=true;
}
</script>