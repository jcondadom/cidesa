<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcfuepre,2,array(
 // SE COLOCAN LOS GETS DE LA CLASE $fcdeftip QUE HACEN
 // REFERECIA A LA TABLA CONSULTADA EN EL CATALOGO Cideftit
  'getprincipal' => 'getCodpre',
  'getsecundario' => 'getNombre',
  //cajitas abajo se colocan el indice de la tabla $fcfuepre y la descripcion del  fordefparing
  'campoprincipal' => 'codprei',
  'camposecundario' => 'nombre',
  'campobase' => 'id'
  ), 'Facfueing_Codprei', 'cideftit'); ?>