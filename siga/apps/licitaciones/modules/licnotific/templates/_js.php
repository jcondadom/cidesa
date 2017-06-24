<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  $('trigger_linotific_fecven').hide();
  $('linotific_desnumptocuecon').hide();

  if($('linotific_id').value=='')
   {
        $('linotific_numnotif').focus();
   }
  else
   {
       $('linotific_numnotif').readOnly=true;
   }

  if($('linotific_lisicact_id').value!='')
  {
      $$('h2')[3].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[3].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_linotific_fecdecla').hide();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('linotific_coduniadm').setAttribute('readonly',true)
  $('linotific_coduniste').setAttribute('readonly',true)
  $('linotific_desuniadm').setAttribute('readonly',true)
  $('linotific_desuniste').setAttribute('readonly',true)
  $('linotific_coduniadm').setAttribute('style','border:none')
  $('linotific_coduniste').setAttribute('style','border:none')
  $('linotific_desuniadm').setAttribute('style','border:none')
  $('linotific_desuniste').setAttribute('style','border:none')
  $('linotific_coduniadm').setAttribute('onBlur','')
  $('linotific_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('linotific_fecreg').value+'&dias='+$('linotific_dias').value);
  }
</script>