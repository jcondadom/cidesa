<?php

/**
 *
 * @package    Roraima
 * @subpackage autoNomfalpersal 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: editSuccess.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1>
  <?php if(H::getConfApp('titulo', 'nomina', 'nomfalpersal')) : ?>
    <?php echo __(H::getConfApp('titulo', 'nomina', 'nomfalpersal'), array()) ?>
  <?php else : ?>
    <?php echo __('Edición de Salida', array()) ?>
  <?php endif; ?>
</h1>

<div id="sf_admin_header">
<?php include_partial('nomfalpersal/edit_header', array('npfalper' => $npfalper)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomfalpersal/edit_messages', array('npfalper' => $npfalper, 'labels' => $labels)) ?>
<?php include_partial('nomfalpersal/edit_form', array('npfalper' => $npfalper, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomfalpersal/edit_footer', array('npfalper' => $npfalper)) ?>
</div>

</div>
