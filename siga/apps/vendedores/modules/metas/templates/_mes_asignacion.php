 <?php echo select_tag('metas[mes_asignacion]', options_for_select(array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'),$metas->getMesAsignacion(),'include_custom= Seleccione uno...'),array(
  )) ?>
