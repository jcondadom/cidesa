<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<?php echo select_tag('caordcom[codedo]', options_for_select(Ocestado::getEstados($caordcom->getCodpai()),$caordcom->getCodedo(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
    'update'   => 'divCodmun',
    'url'      => 'almordmul/ajax?ajax=13',
    'with' => "'pais='+$('caordcom_codpai').value+'&codigo='+this.value"
  ))));?>
