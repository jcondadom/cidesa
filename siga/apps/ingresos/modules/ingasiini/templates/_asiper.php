<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<?php echo select_tag('ciasiini[asiper]', options_for_select(Array(''=>'Seleccione..','S'=>'Si','N'=>'No'),$ciasiini->getAsiper()),array(
 					  'onchange' => "javascript: activaSaldoActual()",
 					  'onclick' => "javascript: activaSaldoActual()")); ?>

