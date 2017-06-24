<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $catparams="/param1/'+$('fcparroq_codpai').value+'/param2/'+$('fcparroq_codedo').value+'";
?>
<?php
  $ajaxparams="+'&pais='+$('fcparroq_codpai').value+'&estado='+$('fcparroq_codedo').value";
?>
<?php if (!$fcparroq->getId())
{ ?>
<?php echo Catalogo($fcparroq,3,array(
  'getprincipal' => 'getCodmun',
  'getsecundario' => 'getNommun',
  'campoprincipal' => 'codmun',
  'camposecundario' => 'nommun',
  'campobase' => 'codmun_id',
  ), 'Fcmunici_Facdefdivpar', 'Fcmunici', $catparams, $ajaxparams); ?>

<?php } else
{
	?>
<?php	$value = object_input_tag($fcparroq, 'getCodmun' , array (
  'size' => 20,
  'control_name' => 'fcparroq[codmun]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fcparroq, 'getNommun', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fcparroq[nommun]',
)); echo $value ? $value : '&nbsp;';

} ?>