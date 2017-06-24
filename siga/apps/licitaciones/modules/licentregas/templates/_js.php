<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="ajaxdiv" style="visibility: hidden"></div>
<script>
  $('trigger_lientregas_fecven').hide();

    // Cerrar Grupo de datos generales
  $('divDatos Generales').toggle();

   if($('lientregas_id').value=='')
   {
        
   }
  else
   {
       $('lientregas_numcont').readOnly=true;
   }

  $('trigger_lientregas_fecdecla').hide();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('lientregas_coduniadm').setAttribute('readonly',true)
  $('lientregas_coduniste').setAttribute('readonly',true)
  $('lientregas_desuniadm').setAttribute('readonly',true)
  $('lientregas_desuniste').setAttribute('readonly',true)
  $('lientregas_coduniadm').setAttribute('style','border:none')
  $('lientregas_coduniste').setAttribute('style','border:none')
  $('lientregas_desuniadm').setAttribute('style','border:none')
  $('lientregas_desuniste').setAttribute('style','border:none')
  $('lientregas_coduniadm').setAttribute('onBlur','')
  $('lientregas_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('lientregas_fecreg').value+'&dias='+$('lientregas_dias').value);
  } 

  function getParamsTipact()
  {
    return '&numcont='+$('lientregas_numcont').value;
  }

</script>