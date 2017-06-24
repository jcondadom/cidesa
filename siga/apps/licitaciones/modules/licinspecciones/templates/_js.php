<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="ajaxdiv" style="visibility: hidden"></div>
<script>
  $('trigger_liinspecciones_fecven').hide();

    // Cerrar Grupo de datos generales
  $('divDatos Generales').toggle();

   if($('liinspecciones_id').value=='')
   {
        
   }
  else
   {
       $('liinspecciones_numcont').readOnly=true;
   }

  $('trigger_liinspecciones_fecdecla').hide();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('liinspecciones_coduniadm').setAttribute('readonly',true)
  $('liinspecciones_coduniste').setAttribute('readonly',true)
  $('liinspecciones_desuniadm').setAttribute('readonly',true)
  $('liinspecciones_desuniste').setAttribute('readonly',true)
  $('liinspecciones_coduniadm').setAttribute('style','border:none')
  $('liinspecciones_coduniste').setAttribute('style','border:none')
  $('liinspecciones_desuniadm').setAttribute('style','border:none')
  $('liinspecciones_desuniste').setAttribute('style','border:none')
  $('liinspecciones_coduniadm').setAttribute('onBlur','')
  $('liinspecciones_coduniste').setAttribute('onBlur','')
  /////////////FIN//////////////////

  function Correl(id)
  {
      if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0);
  }
  function CalculaFecha(v)
  {
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('liinspecciones_fecreg').value+'&dias='+$('liinspecciones_dias').value);
  } 

  function getParamsTipact()
  {
    return '&numcont='+$('liinspecciones_numcont').value;
  }

</script>