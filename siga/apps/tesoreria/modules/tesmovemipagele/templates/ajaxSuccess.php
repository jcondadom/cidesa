<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if ($ajaxs=='5') { ?>
<?php $value = get_partial('grid', array('type' => 'edit', 'tspagele' => $tspagele,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($ajaxs=='8') {  ?>
<?php if ($direccion!='') {?>
<div style='width:450px; color: #c11b17; font-size: 14px; font-weight: bold;' >
<ul>
  <li>
      <?php $hosts=$this->getContext()->getRequest()->getHost();?>
    <?php echo link_to('Descargar Txt Generado => '.$direccion,'http://'.$hosts.'/uploads/pagoselectronicos/'.$direccion); ?>
  </li>
</ul>
</div>
<?php }  ?>
<?php }  ?>
