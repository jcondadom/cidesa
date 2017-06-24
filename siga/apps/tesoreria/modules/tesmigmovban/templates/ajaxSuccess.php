<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if($datos) {?>
<div id="divgriddatos">
    <br></br>    
	<?php echo grid_tag_v2($tsmovban->getGrid()); ?>
</div>
<?php echo javascript_tag("
    $('leer').hide();
    $('cargar').hide();
    $('salvar').show();
  "); ?>
<?php }else { ?>
<?php echo javascript_tag("
    $('leer').show();
    $('cargar').show();
    $('salvar').hide();
  "); ?>
<div id="divgriddatos">
<table width="100%" >
  <tr>
    <th><strong><font color="#CC0000" size="4" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo "No se pudo leer la Información del Archivo";?></font></strong></th>
  </tr>
</table>
</div>
<?php } ?>

