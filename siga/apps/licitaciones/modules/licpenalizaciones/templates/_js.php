<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="ajaxdiv" style="visibility: hidden"></div>
<script>
  $('trigger_lipenalizaciones_fecven').hide();

   if($('lipenalizaciones_id').value=='')
   {
        $('lipenalizaciones_numcont').focus();
   }
  else
   {
       $('lipenalizaciones_numcont').readOnly=true;
   }

  $('trigger_lipenalizaciones_fecdecla').hide();

  // Cerrar Grupo de datos generales
  $('divDatos Generales').toggle();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('lipenalizaciones_coduniadm').setAttribute('readonly',true)
  $('lipenalizaciones_coduniste').setAttribute('readonly',true)
  $('lipenalizaciones_desuniadm').setAttribute('readonly',true)
  $('lipenalizaciones_desuniste').setAttribute('readonly',true)
  $('lipenalizaciones_coduniadm').setAttribute('style','border:none')
  $('lipenalizaciones_coduniste').setAttribute('style','border:none')
  $('lipenalizaciones_desuniadm').setAttribute('style','border:none')
  $('lipenalizaciones_desuniste').setAttribute('style','border:none')
  $('lipenalizaciones_coduniadm').setAttribute('onBlur','')
  $('lipenalizaciones_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('lipenalizaciones_fecreg').value+'&dias='+$('lipenalizaciones_dias').value);
  } 

  function getParamsTippen()
  {
    return '&numcont='+$('lipenalizaciones_numcont').value;
  }

</script>