<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>


<?php  if($ajax =='7'){ ?>

<script language="javascript">
    var valor='<?php echo $vestatus;?>';
    if (valor!='')
     {
      var div = document.getElementById('viejo');

       div.style.display='none';

     $('label41').innerHTML= valor;
     $('label41').show();
     }
</script>

<?php }else { ?>
<?php echo options_for_select($lotes,$numlot,'include_custom=Seleccione...');?>
<?php } ?>