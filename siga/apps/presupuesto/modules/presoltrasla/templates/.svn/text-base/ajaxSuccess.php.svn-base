<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php if ($ajaxs=='6') {?>
<?php $value = get_partial('grid_perdes', array('type' => 'edit', 'cpsoltrasla' => $cpsoltrasla,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
 <?php }elseif ($ajaxs=='7') {?>
<?php $value = get_partial('grid_perhas', array('type' => 'edit', 'cpsoltrasla' => $cpsoltrasla,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
 <?php }else {?>
<?php $value = get_partial('detalle', array('type' => 'edit', 'cpsoltrasla' => $cpsoltrasla,'params' => $params)); echo $value ? $value : '&nbsp;' ?>

<script type="text/javascript">
  cargardatoseventos();
</script>
 <?php }?>