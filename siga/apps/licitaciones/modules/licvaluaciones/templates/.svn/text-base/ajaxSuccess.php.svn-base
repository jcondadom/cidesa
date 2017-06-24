<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>


<?php if($ajax=='11') : ?>
<?php echo grid_tag_v2($params['gridart']); ?>
<?php elseif($ajax=='1') : ?>
<?php echo select_tag('livaluaciones_fecdes', options_for_select($combolicroent, '','include_custom=Seleccione'), array(
    'name' => 'livaluaciones[numval]',
    'onChange'=> remote_function(array(
      'url'      => 'licvaluaciones/ajax',
      'update'   => 'divgridart',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=11&codigo='+this.value+'&numcont='+$('livaluaciones_numcont').value+''"
      ))
)) ?>
<?php endif; ?>