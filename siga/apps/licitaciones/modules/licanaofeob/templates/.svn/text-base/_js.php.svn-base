<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  $('trigger_lianaofe_fecven').hide();
  $('lianaofe_desnumofe').hide();

  if($('lianaofe_id').value=='')
   {
        $('lianaofe_numanaofe').focus();
   }
  else
   {
       $('lianaofe_numanaofe').readOnly=true;
   }

   if($('lianaofe_lisicact_id').value!='')
  {
      $$('h2')[10].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[10].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_lianaofe_fecdecla').hide();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('lianaofe_coduniadm').setAttribute('readonly',true)
  $('lianaofe_coduniste').setAttribute('readonly',true)
  $('lianaofe_desuniadm').setAttribute('readonly',true)
  $('lianaofe_desuniste').setAttribute('readonly',true)
  $('lianaofe_coduniadm').setAttribute('style','border:none')
  $('lianaofe_coduniste').setAttribute('style','border:none')
  $('lianaofe_desuniadm').setAttribute('style','border:none')
  $('lianaofe_desuniste').setAttribute('style','border:none')
  $('lianaofe_coduniadm').setAttribute('onBlur','')
  $('lianaofe_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('lianaofe_fecreg').value+'&dias='+$('lianaofe_dias').value);
  }

  function CalcularPorcen(id,idporcri)
  {
      var val = $(id).value;
      var aux = id.split('_');
      var name = aux[0];
      var fil = aux[1];
      var col = aux[2];
      var punplie = $(name+'_'+fil+'_3').toFloat();
      var porplie = $(name+'_'+fil+'_4').toFloat();
      var idporemp = name+'_'+fil+'_6';

      toAjax('11',getUrlModulo()+'ajax','0','','&punemp='+val+'&punplie='+punplie+'&porplie='+porplie+'&idporemp='+idporemp+'&idpunemp='+id+'&idporcri='+idporcri);

  }
  function CalculaTotal(idporemp, idporcri)
  {
      
      var aux = idporemp.split('_');
      var name = aux[0];
      var fil = aux[1];
      var col = aux[2];
      var tfil = obtener_filas_grid(name.substring(0,1), 1);
      var tporemp=0;
      for(i=0;i<tfil;i++)
      {
         poremp = $(name+'_'+i+'_'+col).toFloat();

         tporemp = parseFloat(tporemp) + parseFloat(poremp);
         
      }
      toAjax('12',getUrlModulo()+'ajax','0','','&idporcri='+idporcri+'&tporemp='+tporemp+'&numplie='+$('lianaofe_numplie').value);
      //$(idporcri).value=number_format(tporemp,'2',',','.');
  }
  function SumarPortot()
  {
      
         porleg = $('lianaofe_porleg').toFloat();
         
         portec = $('lianaofe_portec').toFloat();
         
         porfin = $('lianaofe_porfin').toFloat();
         
         porfia = $('lianaofe_porfia').toFloat();
         
         portipemp = $('lianaofe_portipemp').toFloat();

         var total = parseFloat(porleg) + parseFloat(portec) + parseFloat(porfin) + parseFloat(porfia) + parseFloat(portipemp);
         $('lianaofe_portot').value=number_format(total,'2',',','.');

  }
</script>