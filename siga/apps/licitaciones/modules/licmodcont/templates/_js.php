<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  $('trigger_limodcont_fecven').hide();
 

   if($('limodcont_id').value=='')
   {
        $('limodcont_numcont').focus();
   }
  else
   {
       $('limodcont_numcont').readOnly=true;
   }

    // Cerrar Grupo de datos generales
  $('divDatos Generales').toggle();
  
  $('trigger_limodcont_fecdecla').hide();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('limodcont_coduniadm').setAttribute('readonly',true)
  $('limodcont_coduniste').setAttribute('readonly',true)
  $('limodcont_desuniadm').setAttribute('readonly',true)
  $('limodcont_desuniste').setAttribute('readonly',true)
  $('limodcont_coduniadm').setAttribute('style','border:none')
  $('limodcont_coduniste').setAttribute('style','border:none')
  $('limodcont_desuniadm').setAttribute('style','border:none')
  $('limodcont_desuniste').setAttribute('style','border:none')
  $('limodcont_coduniadm').setAttribute('onBlur','')
  $('limodcont_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('limodcont_fecreg').value+'&dias='+$('limodcont_dias').value);
  } 

</script>