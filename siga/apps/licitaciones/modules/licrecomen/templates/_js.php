<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  $('trigger_lirecomen_fecven').hide();
  $('lirecomen_desnumexp').hide();

  if($('lirecomen_id').value=='')
   {
        $('lirecomen_numrecofe').focus();
   }
  else
   {
       $('lirecomen_numrecofe').readOnly=true;
   }

  if($('lirecomen_lisicact_id').value!='')
  {
      $$('h2')[4].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[4].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_lirecomen_fecdecla').hide();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('lirecomen_coduniadm').setAttribute('readonly',true)
  $('lirecomen_coduniste').setAttribute('readonly',true)
  $('lirecomen_desuniadm').setAttribute('readonly',true)
  $('lirecomen_desuniste').setAttribute('readonly',true)
  $('lirecomen_coduniadm').setAttribute('style','border:none')
  $('lirecomen_coduniste').setAttribute('style','border:none')
  $('lirecomen_desuniadm').setAttribute('style','border:none')
  $('lirecomen_desuniste').setAttribute('style','border:none')
  $('lirecomen_coduniadm').setAttribute('onBlur','')
  $('lirecomen_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('lirecomen_fecreg').value+'&dias='+$('lirecomen_dias').value);
  }
</script>