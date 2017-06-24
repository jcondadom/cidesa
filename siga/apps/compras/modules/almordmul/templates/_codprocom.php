<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php echo select_tag('caordcom[codprocom]', objects_for_select(CaprocomPeer::doSelect(new Criteria()),'getCodprocom','getDesprocom',$caordcom->getCodprocom(),'include_custom=Seleccione uno ...')) ?>