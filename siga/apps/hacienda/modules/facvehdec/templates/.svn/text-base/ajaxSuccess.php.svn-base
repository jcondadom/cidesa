
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>

<?php  if ($ajax =='1'){ ?>
     <?php $value = get_partial('grid', array('type' => 'edit', 'fcdeclar' => $fcdeclar,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
     
<?php }else  if ($ajax =='2') {?>
    <?php $value = get_partial('gridmulta', array('type' => 'edit', 'fcdeclar' => $fcdeclar,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
    
<?php }else  if ($ajax =='3') {?>

    <?php $value = get_partial('griddeuda', array('type' => 'edit', 'fcdeclar' => $fcdeclar,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }?>

