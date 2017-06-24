<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>  
  $('divnumdec').hide();      
  $$('h2')[3].hide();
  $('sf_fieldset_declaratoria_del_documento').hide();    
  
  function VerDoc(id)
  {
     var modulo = $('liasigdec_tabla').value;          
     var aux = id.split('_');
     var val = $('ax_'+aux[1]+'_8').value;
     var tip = $('ax_'+aux[1]+'_9').value;
     modulo = modulo.replace('li','lic');
     if(tip=='O')
         modulo = modulo+'ob';
     var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
     pagina=getUrl()+modulo+"/edit/id/"+val;
     window.open(pagina,1,"menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
  }
  
  function BuscarDeclar(id)
  {      
      var aux = id.split('_');
      var numdoc = $('ax_'+aux[1]+'_3').value;      
      var tfil = obtener_filas_grid('a', 1);
      for(i=0;i<tfil;i++)
      {
         if($('ax_'+i+'_2').checked==true && 'ax_'+i+'_2'!='ax_'+aux[1]+'_2')
             $('ax_'+i+'_2').checked=false;
      }
      toAjax('2',getUrlModuloAjax(),numdoc,'','&tabla='+$('liasigdec_tabla').value);
  }
</script>