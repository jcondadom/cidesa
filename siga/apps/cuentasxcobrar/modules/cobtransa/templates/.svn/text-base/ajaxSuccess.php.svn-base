<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<? if ($ajax=='1') {
	$fila=$filasdet;
  include_partial('documentos', array( 'cobtransa' => $cobtransa ));
} else if ($ajax=='2'){
  $fila=$filasnotcre;
  include_partial('grid_notcre', array( 'cobtransa' => $cobtransa ));
}else {?>
<?php
$fila=$filasfor;
	include_partial('formasdepago', array( 'cobtransa' => $cobtransa ));
 }?>

 <script language="JavaScript" type="text/javascript">
  var ajax='<?php echo $ajax?>';
  if (ajax=='1')
  {
  	$('cobtransa_filasdet').value='<?php echo $fila?>';
  }else if (ajax=='2')
  {
    $('cobtransa_filasnot').value='<?php echo $fila?>';
  }
  else
  {
  	$('cobtransa_filasfor').value='<?php echo $fila?>';
  	actualizar_filas();
  }
</script>
