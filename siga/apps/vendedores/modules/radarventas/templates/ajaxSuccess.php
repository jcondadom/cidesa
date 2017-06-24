<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
    switch ($ajax){
      case '1':
//echo $radarventas;
        include_partial('cliente_vendedor_por_ruta', array( 'radarventas' => $radarventas,'radarventas1' => $radarventas1 ));
        break;
    }

?>
