<?php
/*
 * Created on 12/02/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>

  <?php $value = object_select_tag($radarventas, 'getRutaId', array (
  'related_class' => 'Ruta',
  'control_name' => 'radarventas[ruta_id]',
  'onchange' => 'toAjaxUpdater(\'prueba\',1,getUrlModulo()+\'ajax\',this.value,\'\',\'\')',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>
