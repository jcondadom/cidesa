<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

 <?php echo select_tag('fcsolvencia[tipo]', options_for_select(array('L' => 'Licencia', 'I' => 'Inmueble'),$fcsolvencia->getTipo(),'include_custom=Seleccione'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'update' => 'divreferencias',
   'script' => true,
   'with' => "'ajax=1&codigo='+$('fcsolvencia_rifcon').value+'&tipo='+this.value"
      ))
  )) ?>
