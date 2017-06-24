<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if ($ajaxs=='7') { ?>
<?php $value = get_partial('grid', array('type' => 'edit', 'manordtra' => $manordtra,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($ajaxs=='8') {  ?>
<?php $value = get_partial('grid1', array('type' => 'edit', 'manordtra' => $manordtra,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($ajaxs=='9') {  ?>
<form name="form1" id="form1">
<?php
  $x=0;
  $formu='';
  while ($x<count($formulario))
  {
    $formu=$formu.$formulario[$x].'*';
    $x++;
  }
 ?>
<script type="text/javascript">
 var j=0;
 var i='<?php print $i; ?>';
 i=parseInt(i);
 var formu='<?php print $formu; ?>';
 var idfila='<?php print $idfilareq; ?>';
 var formulario=formu.split('*');
 while (j<=i)
 {
   requisicion(formulario[j],idfila);
   j++;
 }
</script>
</form>
<?php }  ?>
