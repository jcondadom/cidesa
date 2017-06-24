<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
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
 i='<? print $i; ?>';
 i=parseInt(i);
 var formu='<? print $formu; ?>';
 var formulario=formu.split('*');
 while (j<=i)
 {
   retenciones(formulario[j]);
   j++;
 }
</script>
