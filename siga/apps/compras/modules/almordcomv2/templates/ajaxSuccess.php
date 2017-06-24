<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: gridSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<?php if ($ajaxs=='20') {?>

<?php
echo options_for_select($unidades,'');
 ?>
<?php }else {?> 
<?php
  echo grid_tag_v2($obj);
?>
<?php }?> 




