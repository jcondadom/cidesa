<script language="JavaScript" type="text/javascript">
function generar(){
  new Ajax.Request(getUrlModulo()+'grid', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});
}

 function mostrar_rep(){
  var am=parseInt($('opordpag_filasord').value);
  var  ruta='http://'+'<? echo $this->getContext()->getRequest()->getHost();?>';
  var j=0;
  var cadena="";
  while (j<am)
  {
    var check="ax_"+j+"_1";
    var numord="ax_"+j+"_2";
    if ($(check).checked=="1")
    	if (cadena=="")
    	  cadena=$(numord).value;
        else
    	  cadena=cadena+","+$(numord).value;
  	j++;
  }
  if (cadena!='') {
    pagina=ruta+"/<? echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r=tsrpropag.php&ordenes="+cadena;
    window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
  }else {
    alert("Debe Seleccionar al menos una Orden de Pago");
  }

  }
</script>