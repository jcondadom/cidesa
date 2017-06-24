<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php echo select_tag('caordcom[serdon]', options_for_select(array('M' => 'Medicina', 'T' => 'Materiales', 'O' => 'Otro'),$caordcom->getSerdon(),'include_custom=Seleccione Uno')) ?>

<div id="anul">
    
</div>

