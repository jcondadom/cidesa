<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php  $value = object_input_date_tag($cpptocta, 'getFecdes', array (
	'rich' => true,
	'calendar_button_img' => '/sf/sf_admin/images/date.png',
	'control_name' => 'cpptocta[fecdes]',
	'date_format' => 'dd/MM/yyyy',
	'size' => 10,
	'maxlength' => 10,
	'onkeyup' => "javascript: mascara(this,'/',patron,true)",
        'onBlur'=> remote_function(array(
         'update'   => 'divgrid',
         'url'      => 'preaprptocta/ajax',
         'script'   => true,
         'condition' => "$('cpptocta_fecdes').value != ''",
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=1&cajtexmos=cpptocta_fechas&fecha='+$('cpptocta_fechas').value+'&codigo='+this.value"
     ))
)); echo $value ? $value : '&nbsp;'
?>    

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
</script>