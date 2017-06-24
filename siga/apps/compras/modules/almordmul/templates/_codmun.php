<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<?php echo select_tag('caordcom[codmun]', options_for_select(Ocmunici::getMunicipios($caordcom->getCodpai(), $caordcom->getCodedo()),$caordcom->getCodmun(),'include_custom=Seleccione uno...'),array());?>