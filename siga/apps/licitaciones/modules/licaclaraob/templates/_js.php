<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  
  if($('liaclara_id').value=='')
    $('liaclara_numacla').focus();
  else
    $('liaclara_numacla').readOnly=true;
  $('trigger_liaclara_fecven').hide();
  $('liaclara_desnumexp').hide();

  //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('liaclara_coduniadm').setAttribute('readonly',true)
  $('liaclara_coduniste').setAttribute('readonly',true)
  $('liaclara_desuniadm').setAttribute('readonly',true)
  $('liaclara_desuniste').setAttribute('readonly',true)
  $('liaclara_coduniadm').setAttribute('style','border:none')
  $('liaclara_coduniste').setAttribute('style','border:none')
  $('liaclara_desuniadm').setAttribute('style','border:none')
  $('liaclara_desuniste').setAttribute('style','border:none')
  $('liaclara_coduniadm').setAttribute('onBlur','')
  $('liaclara_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('liaclara_fecreg').value+'&dias='+$('liaclara_dias').value);
  }
</script>