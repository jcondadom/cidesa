<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php if ($ajaxs=='1') {?>
<?php echo grid_tag_v2($viacalviatra->getGrid());?>
<script language="Javascript">

    Calculartotal();

</script>
<?php } else if ($ajaxs=='2') {?>
<?php $value = get_partial('grid2', array('type' => 'edit', 'viacalviatra' => $viacalviatra,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }else { }?>
