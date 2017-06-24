<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  var val = $('lisolegr_codmon').value;
  val = val.split(' - ');
  val = val[0];
  if(val!='001')
  {
      $('divcodmon').show();
      $('divvalcam').show();
      $('divfeccam').show();
      $('divmonsube').show();
      $('divmonrgoe').show();
      $('divmonsolext').show();
      $('divmonsolextletras').show();
  }else
  {
      $('divcodmon').hide();
      $('divvalcam').hide();
      $('divfeccam').hide();
      $('divmonsube').hide();
      $('divmonrgoe').hide();
      $('divmonsolext').hide();
      $('divmonsolextletras').hide();
  }
  $('lisolegr_codmon').readOnly=true;
  $('lisolegr_valcam').readOnly=true;
  $('lisolegr_feccam').readOnly=true;
  $('lisolegr_nompre').setAttribute('size','100')
  $('lisolegr_desnumptocue').setAttribute('style','border:none');
  $('trigger_lisolegr_fecven').hide();
  $('divgrid_rec').hide();
  $('trigger_lisolegr_feccam').hide();
  if($('lisolegr_id').value=='')
    $('lisolegr_numsol').focus();
  else
    $('lisolegr_numsol').readOnly=true;

  if($('lisolegr_lisicact_id').value!='')
  {
      $$('h2')[8].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[8].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_lisolegr_fecdecla').hide();

//OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('lisolegr_coduniadm').setAttribute('readonly',true)
  $('lisolegr_coduniste').setAttribute('readonly',true)
  $('lisolegr_desuniadm').setAttribute('readonly',true)
  $('lisolegr_desuniste').setAttribute('readonly',true)
  $('lisolegr_coduniadm').setAttribute('style','border:none')
  $('lisolegr_coduniste').setAttribute('style','border:none')
  $('lisolegr_desuniadm').setAttribute('style','border:none')
  $('lisolegr_desuniste').setAttribute('style','border:none')
  $('lisolegr_coduniadm').setAttribute('onBlur','')
  $('lisolegr_coduniste').setAttribute('onBlur','')
  /////////////FIN//////////////////

  function CalculaFecha(v)
  {
      toAjax('8',getUrlModulo()+'ajax',v,'','&fecha='+$('lisolegr_fecreg').value+'&dias='+$('lisolegr_dias').value);
  }
  
  function Correl(id)
  {
      if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0);
  }

  function OcultarGrid()
  {
     $('divgrid_rec').hide();
  }

  function MostrarGrid()
  {
      $('divgrid_rec').show();
  }
</script>