<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<?php echo select_tag('cobtransa[estado]', options_for_select(Ocestado::getEstados(),'','include_custom=Seleccione...'),array()); ?>
