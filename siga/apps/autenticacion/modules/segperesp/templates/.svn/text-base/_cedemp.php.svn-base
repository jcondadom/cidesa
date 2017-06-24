
 <?php $value = object_input_tag($segperesp, 'getCedemp', array (
  'size' => 20,
  'control_name' => 'segperesp[cedemp]',
  'maxlength' => 10,
  'onBlur' => remote_function(array(
         'url'      => sfContext::getInstance()->getModuleName().'/ajax',
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=1&codigo='+this.value",
         'script' => true,
      ))
)); echo $value ? $value : '&nbsp;' ?>