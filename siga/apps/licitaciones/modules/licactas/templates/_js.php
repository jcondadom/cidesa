<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<div id="ajaxdiv" style="visibility: hidden"></div>
<script>
  $('trigger_liactas_fecven').hide();

   if($('liactas_id').value=='')
   {
        $('liactas_numcont').focus();
   }
  else
   {
       $('liactas_numcont').readOnly=true;
   }

  $('trigger_liactas_fecdecla').hide();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('liactas_coduniadm').setAttribute('readonly',true)
  $('liactas_coduniste').setAttribute('readonly',true)
  $('liactas_desuniadm').setAttribute('readonly',true)
  $('liactas_desuniste').setAttribute('readonly',true)
  $('liactas_coduniadm').setAttribute('style','border:none')
  $('liactas_coduniste').setAttribute('style','border:none')
  $('liactas_desuniadm').setAttribute('style','border:none')
  $('liactas_desuniste').setAttribute('style','border:none')
  $('liactas_coduniadm').setAttribute('onBlur','')
  $('liactas_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('liactas_fecreg').value+'&dias='+$('liactas_dias').value);
  } 

  function getParamsTipact()
  {
    return '&numcont='+$('liactas_numcont').value;
  }

</script>