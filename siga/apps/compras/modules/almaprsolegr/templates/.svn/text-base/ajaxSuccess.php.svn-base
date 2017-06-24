
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php if ($ajax=='2' || $ajax=='3') {?>

<?php $value = get_partial('grip', array('type' => 'edit', 'casolart' => $casolart,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>

<?php }else  {?>
<form name="form1" id="form1">
<?
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
 i='<? print $i; ?>';
 i=parseInt(i);
 var formu='<? print $formu; ?>';
 var formulario=formu.split('*');
 while (j<=i)
 {
   detalle(formulario[j]);
   j++;
 }
</script>
</form>

<?php }?>
