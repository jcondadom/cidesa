<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php echo __("Porcentaje ").radiobutton_tag('caordcom[tipdes]', 'p', 'true', array('onClick'=> "inizializo_descuentos();")) ?>
<?php echo __("Monto ").radiobutton_tag('caordcom[tipdes]', 'm', 'false', array('onClick'=> "inizializo_descuentos();")) ?>
<?php echo __("Total ").radiobutton_tag('caordcom[tipdes]', 't', 'false', array('onClick'=> "inizializo_descuentos();")) ?>