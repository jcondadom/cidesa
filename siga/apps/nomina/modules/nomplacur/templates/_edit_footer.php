<script type="text/javascript">
$('divgridgru').hide();
$('divbtn').hide();
 function cargarPersonal()
 {
 	var cadena="";
 	var am=obtener_filas_grid('b',2);
	var j=0;
	while (j<am)
	{
      var check="bx_"+j+"_1";
      var codgru="bx_"+j+"_2";
      if ($(check).checked=="1")
    	if (cadena=="")
    	  cadena=$(codgru).value;
        else
    	  cadena=cadena+"_"+$(codgru).value;
  	  j++;
	}

    if (cadena!="")
    {
      new Ajax.Updater('divgridperpla', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json); $('divgridperpla').show();}, parameters:'ajax=4&codigo='+cadena});
    }else {
      alert("Debe seleccionar al menos un Grupo");
    }
 }
</script>