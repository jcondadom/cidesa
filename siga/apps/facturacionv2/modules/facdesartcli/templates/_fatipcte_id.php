<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo select_tag('faartdtocte[fatipcte_id]', options_for_select(FatipctePeer::TiposCliente(),$faartdtocte->getFatipcteId(),'include_custom=Seleccione Uno'),array(  
   'onChange' => remote_function(array(
   'update'  => 'divgrid',
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'script'  => true,
   'with' => "'ajax=1&codigo='+this.value"
      ))
  )) ?>
