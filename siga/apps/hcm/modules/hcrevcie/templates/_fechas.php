<?php $value = object_input_date_tag($hccieree, 'getFechas', array (
  'control_name' => 'hcrevcie[fechas]',
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onChange' => remote_function(array(
   'update'   => 'gridr',
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=1&fechas='+this.value+'&fecdes='+$('hcrevcie_fecdes').value"
   ))
)); echo $value ? $value : '&nbsp;' ?>

<br>

<ul class="sf_admin_actions" >
<li class="float-center">
<input id="marcatodos" class="sf_admin_action_save" type="button" value="Marcar Todos" onClick="martodos();">
</li>
<li class="float-center">
<input id="desmartodos" class="sf_admin_action_cancel" type="button" value="Desmarcar Todos" onClick="destodos();">
</li>
</ul>


<script type="text/javascript">

 function martodos()
 {
   var filas=obtener_filas_grid('a',2);
    var i=0;
    while (i<filas)
    {
      var check="ax_"+i+"_1";
      if ($(check))
        $(check).checked=true;   
      i++;
    }
      
 }

 function destodos()
 {
   var filas=obtener_filas_grid('a',2);
  var i=0;
  while (i<filas)
  {
    var check="ax_"+i+"_1";
    if ($(check))
      $(check).checked=false;   
    i++;
  }      
 }

</script>