<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php 	echo grid_tag_v2($usuarios->getGrid()); ?>

<script language="JavaScript" type="text/javascript">
  var cameti="<?php echo H::getConfApp2('cameti', 'compras', 'almdefdirec')?>";
  if (cameti=='S')
  {
  	$$('.h2')[1].innerHTML='Estados';
  }
  
</script>
<div> <?php echo button_to_function("Marcar Todos","$$('input.acol1').each(function(i){i.checked = true});") ?> <?php echo button_to_function("Desmarcar Todos","$$('input.acol1').each(function(i){i.checked = false});") ?></div>
