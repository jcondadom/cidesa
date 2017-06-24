<script language="Javascript">

  function cargararchivo(id)
  {
     if($(id).value=='')
         alert('Debe Seleccionar un Archivo');
     else{
         var arc = $('tsmovban_archixls').value;
         var auxarc = arc.split('.xls');
         var lonaux = auxarc.length;
         if(lonaux>1)
            document.sf_admin_edit_form.submit();         
         else
        	 alert('Debe Cargar archivos con extensión .xls');
     }
  }
  
  function leerarchivo(id)
  {
	  toAjaxUpdater('divgriddatos',1,getUrlModuloAjax(),'1');
  }
</script>