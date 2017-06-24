<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo select_tag('viadefpri[sumres]', options_for_select(array('S' => 'SUMA', 'R' => 'RESTA'),$viadefpri->getSumres()),array()) ?>