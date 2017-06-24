<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<?php  if ($ajax =='4'){ ?>
<?php $value = get_partial('griddeuda', array('type' => 'edit', 'fcotring' => $fcotring,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } if($ajax =='3'){ ?>

<script language="javascript">
    var valor='<?php echo $vsimpre;?>';
    if (valor!="")
     {
     $('fcotring_valor').value=valor;
     $('label41').innerHTML= valor;
     $('label41').show();
     }
</script>

<?php }  ?>
