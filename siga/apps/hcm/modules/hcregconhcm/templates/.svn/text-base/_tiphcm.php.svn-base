<?php
echo select_tag('hcregconhcm[tiphcm]', options_for_select(Array('H' => 'Hospitalización', 'M' => 'Maternidad', 'L' => 'Laboratorios y Doctores'), $hcregconhcm->getTiphcm()),array(
	'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=4&cedemp='+$('hcregconhcm_cedemp').value+'&cedfam='+$('hcregconhcm_cedfam').value+'&codigo='+this.value"
))));
?>

