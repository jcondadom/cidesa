<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _grid.php 46861 2011-12-15 19:35:44Z dmartinez $
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<?
	echo grid_tag_v2($fcsollic->getGrid());
?>

<script type="text/javascript" language="Javascript">
if ($('id').value=="")
{
    $$('.h2')[0].hide();
    $$('.h2')[1].hide();
    $('divAutorización de Modificacion').hide();
    $('divOperaciones con Licencias').hide();
}
</script>