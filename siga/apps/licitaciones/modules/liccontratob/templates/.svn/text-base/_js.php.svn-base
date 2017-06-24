<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  $('trigger_licontrat_fecven').hide();
  $('licontrat_desnumptocuecon').hide();

   if($('licontrat_id').value=='')
   {
        $('licontrat_numcont').focus();
   }
  else
   {
       $('licontrat_numcont').readOnly=true;
   }

   if($('licontrat_lisicact_id').value!='')
  {
      $$('h2')[12].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[12].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_licontrat_fecdecla').hide();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('licontrat_coduniadm').setAttribute('readonly',true)
  $('licontrat_coduniste').setAttribute('readonly',true)
  $('licontrat_desuniadm').setAttribute('readonly',true)
  $('licontrat_desuniste').setAttribute('readonly',true)
  $('licontrat_coduniadm').setAttribute('style','border:none')
  $('licontrat_coduniste').setAttribute('style','border:none')
  $('licontrat_desuniadm').setAttribute('style','border:none')
  $('licontrat_desuniste').setAttribute('style','border:none')
  $('licontrat_coduniadm').setAttribute('onBlur','')
  $('licontrat_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('licontrat_fecreg').value+'&dias='+$('licontrat_dias').value);
  } 

</script>