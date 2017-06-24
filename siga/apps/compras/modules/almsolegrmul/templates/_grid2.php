<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<? echo grid_tag_v2($casolart->getGrid2());?>

<div align="center">
<table>
<tr>
<th>
  <div align="right">
    <?php echo link_to_function(image_tag('/images/salir.gif'), "salvararticulos()")?>
  </div>
</th>
</tr>
</table>
</div>