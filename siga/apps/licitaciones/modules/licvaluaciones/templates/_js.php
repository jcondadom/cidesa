<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="ajaxdiv" style="visibility: hidden"></div>
<script>
  $('trigger_livaluaciones_fecven').hide();

    // Cerrar Grupo de datos generales
  $('divDatos Generales').toggle();

   if($('livaluaciones_id').value=='')
   {
        
   }
  else
   {
       $('livaluaciones_numcont').readOnly=true;
   }

  $('trigger_livaluaciones_fecdecla').hide();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('livaluaciones_coduniadm').setAttribute('readonly',true)
  $('livaluaciones_coduniste').setAttribute('readonly',true)
  $('livaluaciones_desuniadm').setAttribute('readonly',true)
  $('livaluaciones_desuniste').setAttribute('readonly',true)
  $('livaluaciones_coduniadm').setAttribute('style','border:none')
  $('livaluaciones_coduniste').setAttribute('style','border:none')
  $('livaluaciones_desuniadm').setAttribute('style','border:none')
  $('livaluaciones_desuniste').setAttribute('style','border:none')
  $('livaluaciones_coduniadm').setAttribute('onBlur','')
  $('livaluaciones_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('livaluaciones_fecreg').value+'&dias='+$('livaluaciones_dias').value);
  } 

  function getParamsTipact()
  {
    return '&numcont='+$('livaluaciones_numcont').value;
  }

</script>