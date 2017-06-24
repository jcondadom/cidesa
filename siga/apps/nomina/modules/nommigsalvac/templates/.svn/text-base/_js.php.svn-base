<script language="Javascript"> 

  function cargararchivo(id)
  {
     if($(id).value=='')
         alert('Debe Seleccionar un Archivo');
     else{         
         var arc = $('npvacsalidas_archixls').value;
         var auxarc = arc.split('.xls');
         var lonaux = auxarc.length;
         if(lonaux>1)
            document.sf_admin_edit_form.submit();
         else    	 
        	 alert_('Debe Cargar archivos con extensi&oacute;n .xls');
     }
  }
  function leerarchivo()
  {
	  toAjaxUpdater('divgriddatos',1,getUrlModuloAjax(),'1');     
  }
</script>