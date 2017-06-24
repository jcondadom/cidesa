<?php

/**
 *
 * @package    Roraima
 * @subpackage autoNomfalpersal 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: listSuccess.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?>

<?php use_helper('I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1>
  <?php if(H::getConfApp('titulo', 'nomina', 'nomfalpersal')) : ?>
    <?php echo __(H::getConfApp('titulo', 'nomina', 'nomfalpersal'), array()) ?>
  <?php else : ?>
    <?php echo __('Definicion de Salida', array()) ?>
  <?php endif; ?>
</h1>

<div id="sf_admin_header">
<?php include_partial('nomfalpersal/list_header', array('pager' => $pager)) ?>
<?php include_partial('nomfalpersal/list_messages', array('pager' => $pager)) ?>
</div>

<div id="sf_admin_bar">
<?php include_partial('filters', array('filters' => $filters)) ?>
</div>

<div id="sf_admin_content">
<?php if (!$pager->getNbResults()): ?>
<?php echo __('no result') ?>
<?php else: ?>
<?php include_partial('nomfalpersal/list', array('pager' => $pager)) ?>
<?php endif; ?>
<?php include_partial('list_actions') ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomfalpersal/list_footer', array('pager' => $pager)) ?>
</div>

</div>
