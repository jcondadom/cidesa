<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_helper('Javascript') ?>

<?php  if ($ajax =='1'){ ?>
     <?php $value = get_partial('grid', array('type' => 'edit', 'fcconpag' => $fcconpag,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>

<?php }else if ($ajax =='2') {?>
      <?php $value = get_partial('gridconvenio', array('type' => 'edit', 'fcconpag' => $fcconpag,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } ?>

<script type="text/javascript">
   var bm=obtener_filas_grid('b',1);
  if (bm>0)
  {
    distribuirRubros();
  }


</script>