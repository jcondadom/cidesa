<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  $('trigger_liptocuecon_fecven').hide();
  $('liptocuecon_desnumrecofe').hide();

  if($('liptocuecon_id').value=='')
   {
        $('liptocuecon_numptocuecon').focus();
   }
  else
   {
       $('liptocuecon_numptocuecon').readOnly=true;
   }

  if($('liptocuecon_lisicact_id').value!='')
  {
      $$('h2')[3].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[3].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_liptocuecon_fecdecla').hide();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('liptocuecon_coduniadm').setAttribute('readonly',true)
  $('liptocuecon_coduniste').setAttribute('readonly',true)
  $('liptocuecon_desuniadm').setAttribute('readonly',true)
  $('liptocuecon_desuniste').setAttribute('readonly',true)
  $('liptocuecon_coduniadm').setAttribute('style','border:none')
  $('liptocuecon_coduniste').setAttribute('style','border:none')
  $('liptocuecon_desuniadm').setAttribute('style','border:none')
  $('liptocuecon_desuniste').setAttribute('style','border:none')
  $('liptocuecon_coduniadm').setAttribute('onBlur','')
  $('liptocuecon_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('liptocuecon_fecreg').value+'&dias='+$('liptocuecon_dias').value);
  }
</script>