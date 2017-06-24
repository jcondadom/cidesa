
<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: amelendez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _grid.php 44785 2011-06-15 19:14:38Z amelendez $
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<?
	echo grid_tag_v2($fcreginm->getGrid());
?>
