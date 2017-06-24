<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<ul class="sf_admin_actions">
<li>
<?php if(!$caordcom->getId() ||  $caordcom->getAprobacion()=='S') : ?>
    <?php echo button_to_function('Generar Resumen', "generarResumen()", array('class' => 'sf_admin_action_save')); ?>
  <?php endif; ?>
</li>
</ul>
<br>