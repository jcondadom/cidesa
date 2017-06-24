<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<div id="divGridrs">
<?
	echo grid_tag_v2($fcsolvencia->getGridrs());
?>
</div>

