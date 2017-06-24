<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="ajaxdiv" style="visibility: hidden"></div>
<script>
  $('trigger_liactdescont_fecven').hide();

   if($('liactdescont_id').value=='')
   {
        $('liactdescont_numcont').focus();
   }
  else
   {
       $('liactdescont_numcont').readOnly=true;
   }

  $('trigger_liactdescont_fecdecla').hide();
  // Cerrar Grupo de datos generales
  $('divDatos Generales').toggle();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('liactdescont_coduniadm').setAttribute('readonly',true)
  $('liactdescont_coduniste').setAttribute('readonly',true)
  $('liactdescont_desuniadm').setAttribute('readonly',true)
  $('liactdescont_desuniste').setAttribute('readonly',true)
  $('liactdescont_coduniadm').setAttribute('style','border:none')
  $('liactdescont_coduniste').setAttribute('style','border:none')
  $('liactdescont_desuniadm').setAttribute('style','border:none')
  $('liactdescont_desuniste').setAttribute('style','border:none')
  $('liactdescont_coduniadm').setAttribute('onBlur','')
  $('liactdescont_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('liactdescont_fecreg').value+'&dias='+$('liactdescont_dias').value);
  } 

  function getParamsTipact()
  {
    return '&numcont='+$('liactdescont_numcont').value;
  }

</script>