<script language="Javascript"> 

  function cargararchivo(id)
  {
     if($(id).value=='')
         alert('Debe Seleccionar un Archivo');
     else{         
         var arc = $('npnucemphor_archixls').value;
         var auxarc = arc.split('.xls');
         var lonaux = auxarc.length;
         if(lonaux>1)
            document.sf_admin_edit_form.submit();
         else    	 
        	 alert_('Debe Cargar archivos con extensi&oacute;n .xls');
    	 //new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});//return false;
     }
  }
  function leerarchivo(id)
  {
	  toAjaxUpdater('divgriddatos',1,getUrlModuloAjax(),'1');     
  }
</script>