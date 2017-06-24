<?php $value = object_input_date_tag($hcliqree, 'getFechas', array (
  'control_name' => 'hcliqree[fechas]',
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onChange' => remote_function(array(
   'update'   => 'gridr',
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=1&fechas='+this.value+'&fecdes='+$('hcliqree_fecdes').value"
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
function verificar(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    if (col==1)
    {
     var colcom=col+1;
    }else var colcom=col-1;

    var compara=name+"_"+fil+"_"+colcom;

    if ($(compara).checked==true)
    {
      alert('Debe marcar solo una opcion');
      $(id).checked=false;
    }
}


 function martodos()
 {
   var filas=obtener_filas_grid('a',3);
   var check="ax_0_1";
   var check2="ax_0_2";
   if ($(check)){
      if ($(check).checked==true)
      {
        var i=1;
        while (i<filas)
        {
          var check="ax_"+i+"_1";
          if ($(check))
            $(check).checked=true;   
          i++;
        }
      }else if ($(check2).checked==true){
        var i=1;
        while (i<filas)
        {
          var check="ax_"+i+"_2";
          if ($(check))
            $(check).checked=true;   
          i++;
        }
      }else {
        var i=0;
        while (i<filas)
        {
          var check="ax_"+i+"_1";
          if ($(check))
            $(check).checked=true;   
          i++;
        }
      }
    }   
 }

 function destodos()
 {
   var filas=obtener_filas_grid('a',3);
   var check="ax_0_1";
   var check2="ax_0_2";
   if ($(check)){
      if ($(check).checked==true)
      {
        var i=1;
        while (i<filas)
        {
          var check="ax_"+i+"_1";
          if ($(check))
            $(check).checked=false;   
          i++;
        }
      }else if ($(check2).checked==true){
        var i=1;
        while (i<filas)
        {
          var check="ax_"+i+"_2";
          if ($(check))
            $(check).checked=false;   
          i++;
        }
      }var i=0;
        while (i<filas)
        {
          var check="ax_"+i+"_1";
          if ($(check))
            $(check).checked=false;   
          i++;
        }
    }
 }

</script>