<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php echo select_tag('caordcom[codpai]', options_for_select(OcpaisPeer::getEstados(),$caordcom->getCodpai(),'include_custom=Seleccione uno...'),array('onChange'=> remote_function(array(
    'update'   => 'divCodedo',
    'url'      => 'almordmul/ajax?ajax=12',
    'with' => "'codigo='+this.value"
  ))));?>