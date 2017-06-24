<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  $('trigger_liordcom_fecven').hide();
  $('liordcom_desnumptocuecon').hide();

   if($('liordcom_id').value=='')
   {
        $('liordcom_numord').focus();
   }
  else
   {
       $('liordcom_numord').readOnly=true;
   }

   if($('liordcom_lisicact_id').value!='')
  {
      $$('h2')[15].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[15].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_liordcom_fecdecla').hide();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('liordcom_coduniadm').setAttribute('readonly',true)
  $('liordcom_coduniste').setAttribute('readonly',true)
  $('liordcom_desuniadm').setAttribute('readonly',true)
  $('liordcom_desuniste').setAttribute('readonly',true)
  $('liordcom_coduniadm').setAttribute('style','border:none')
  $('liordcom_coduniste').setAttribute('style','border:none')
  $('liordcom_desuniadm').setAttribute('style','border:none')
  $('liordcom_desuniste').setAttribute('style','border:none')
  $('liordcom_coduniadm').setAttribute('onBlur','')
  $('liordcom_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('liordcom_fecreg').value+'&dias='+$('liordcom_dias').value);
  } 

</script>