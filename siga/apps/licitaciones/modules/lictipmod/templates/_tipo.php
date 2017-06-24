<?php
  echo select_tag('litipmod_tipo',options_for_select(array('E' => 'Obras Extras', 'N' => 'Obras Nuevas', 'C' => 'Obras Complementarias'),$litipmod->getTipo(),'include_blank=true'), array(
      'name' => 'litipmod[tipo]',
  ));
?>
