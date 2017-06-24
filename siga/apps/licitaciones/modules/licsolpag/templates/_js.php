<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="ajaxdiv" style="visibility: hidden"></div>
<script>
  $('trigger_lisolpag_fecven').hide();

  $('trigger_lisolpag_fecdecla').hide();
  $('lisolpag_objvalcat').hide();


  // Cerrar Grupo de datos generales
  $('divDatos Generales').toggle();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('lisolpag_coduniadm').setAttribute('readonly',true)
  $('lisolpag_coduniste').setAttribute('readonly',true)
  $('lisolpag_desuniadm').setAttribute('readonly',true)
  $('lisolpag_desuniste').setAttribute('readonly',true)
  $('lisolpag_coduniadm').setAttribute('style','border:none')
  $('lisolpag_coduniste').setAttribute('style','border:none')
  $('lisolpag_desuniadm').setAttribute('style','border:none')
  $('lisolpag_desuniste').setAttribute('style','border:none')
  $('lisolpag_coduniadm').setAttribute('onBlur','')
  $('lisolpag_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('lisolpag_fecreg').value+'&dias='+$('lisolpag_dias').value);
  } 

  function getParamsTipact()
  {
    return '&numcont='+$('lisolpag_numcont').value;
  }

</script>