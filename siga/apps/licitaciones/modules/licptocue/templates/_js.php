<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  if($('liptocue_id').value=='')
    $('liptocue_numptocue').focus();
  else
    $('liptocue_numptocue').readOnly=true;

  $('liptocue_desnumemo').setAttribute('style','border:none');
  $('trigger_liptocue_fecven').hide();

  if($('liptocue_tipcom').value!='NACIONAL')
      $('divmonpreext').show();
  else
      $('divmonpreext').hide();

  if($('liptocue_lisicact_id').value!='')
  {
      $$('h2')[2].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[2].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_liptocue_fecdecla').hide();

  //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('liptocue_coduniadm').setAttribute('readonly',true)
  $('liptocue_coduniste').setAttribute('readonly',true)
  $('liptocue_desuniadm').setAttribute('readonly',true)
  $('liptocue_desuniste').setAttribute('readonly',true)
  $('liptocue_coduniadm').setAttribute('style','border:none')
  $('liptocue_coduniste').setAttribute('style','border:none')
  $('liptocue_desuniadm').setAttribute('style','border:none')
  $('liptocue_desuniste').setAttribute('style','border:none')
  $('liptocue_coduniadm').setAttribute('onBlur','')
  $('liptocue_coduniste').setAttribute('onBlur','')
  /////////////FIN//////////////////

  function CalculaFecha(v)
  {
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('liptocue_fecreg').value+'&dias='+$('liptocue_dias').value);
  }

  function Correl(id)
  {
      if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0);
  }
</script>