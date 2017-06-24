<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
 <?php echo select_tag('caordcom[enviad]', options_for_select(array('R' => 'Recepción', 'E' => 'Envío'),$caordcom->getEnviad(),'include_custom=Seleccione'),array(
  'onChange' => remote_function(array(
   'update' => 'divgrid',
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'script' => true,
   'with' => "'ajax=1&codigo='+this.value"
      ))     
  )) ?>