<?php
echo select_tag('lipenalizaciones[codtippen]', options_for_select($params['litippen'],$lipenalizaciones->getCodtippen(),'include_custom=Seleccione'),array(
  'onChange' => 'toAjaxUpdater(\'ajaxdiv\',11,getUrlModulo()+\'ajax\',this.value,\'\',getParamsTippen());',
)); ?>


<?php
//$value = select_tag($liactas, 'getCodtipact', array (
//  'related_class' => 'Litipact',
//  'control_name' => '',
//  'onChange' => 'toAjaxUpdater(\'ajaxdiv\',11,getUrlModulo()+\'ajax\',this.value,\'\',getParamsTipact());',
//  'include_blank' => true,
//)); echo $value ? $value : '&nbsp;'
?>