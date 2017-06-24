<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo select_tag('viadefpri[forcal]', options_for_select(array('D' => 'Monto Diario', 'T' => 'Monto Total'),$viadefpri->getForcal()),array()) ?>