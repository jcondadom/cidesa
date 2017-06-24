<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>  
  if($('limemoran_id').value=='')
    $('limemoran_numemo').focus();
  else
    $('limemoran_numemo').readOnly=true;

  $('limemoran_desnumpre').setAttribute('style','border:none');
  $('trigger_limemoran_fecven').hide();

  if($('limemoran_tipcom').value!='NACIONAL')
      $('divmonpreext').show();
  else
      $('divmonpreext').hide();

  if($('limemoran_lisicact_id').value!='')
  {
      $$('h2')[2].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[2].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_limemoran_fecdecla').hide();

  //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('limemoran_coduniadm').setAttribute('readonly',true)
  $('limemoran_coduniste').setAttribute('readonly',true)
  $('limemoran_desuniadm').setAttribute('readonly',true)
  $('limemoran_desuniste').setAttribute('readonly',true)
  $('limemoran_coduniadm').setAttribute('style','border:none')
  $('limemoran_coduniste').setAttribute('style','border:none')
  $('limemoran_desuniadm').setAttribute('style','border:none')
  $('limemoran_desuniste').setAttribute('style','border:none')
  $('limemoran_coduniadm').setAttribute('onBlur','')
  $('limemoran_coduniste').setAttribute('onBlur','')
  /////////////FIN//////////////////

  function CalculaFecha(v)
  {
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('limemoran_fecreg').value+'&dias='+$('limemoran_dias').value);
  }

  function Correl(id)
  {
      if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0);
  }
</script>