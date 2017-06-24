<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  $('trigger_liplieesp_fecven').hide();
  $('liplieesp_desnumcomint').hide();

  if($('liplieesp_id').value=='')
   {
        $('liplieesp_numplie').focus();
        $('liplieesp_numexp').focus();
   }
  else
   {
       $('liplieesp_numplie').readOnly=true;
       $('liplieesp_numexp').readOnly=true;
   }

   if($('liplieesp_lisicact_id').value!='')
  {
      $$('h2')[20].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[20].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_liplieesp_fecdecla').hide();

  //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('liplieesp_coduniadm').setAttribute('readonly',true)
  $('liplieesp_coduniste').setAttribute('readonly',true)
  $('liplieesp_desuniadm').setAttribute('readonly',true)
  $('liplieesp_desuniste').setAttribute('readonly',true)
  $('liplieesp_coduniadm').setAttribute('style','border:none')
  $('liplieesp_coduniste').setAttribute('style','border:none')
  $('liplieesp_desuniadm').setAttribute('style','border:none')
  $('liplieesp_desuniste').setAttribute('style','border:none')
  $('liplieesp_coduniadm').setAttribute('onBlur','')
  $('liplieesp_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('liplieesp_fecreg').value+'&dias='+$('liplieesp_dias').value);
  }
</script>