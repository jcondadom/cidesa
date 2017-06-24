<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: listSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/03/26 15:03:59
?>
<?php use_helper('I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Reposos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomfalperrep/list_header', array('pager' => $pager)) ?>
<?php include_partial('nomfalperrep/list_messages', array('pager' => $pager)) ?>
</div>

<div id="sf_admin_bar">
<?php include_partial('filters', array('filters' => $filters)) ?>
</div>

<div id="sf_admin_content">
<?php if (!$pager->getNbResults()): ?>
<?php echo __('no result') ?>
<?php else: ?>
<?php include_partial('nomfalperrep/list', array('pager' => $pager)) ?>
<?php endif; ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomfalperrep/list_footer', array('pager' => $pager)) ?>
</div>

</div>
