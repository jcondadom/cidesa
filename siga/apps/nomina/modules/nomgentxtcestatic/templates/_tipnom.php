
<?php echo select_tag('empresa[tipnom]', options_for_select(array('T' => 'Total', 'P' => 'Parcial'),$empresa->getTipnom(),'include_custom=Seleccione uno...'),array( 
  )) ?>
