<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  $('trigger_lianaemp_fecven').hide();
  $('lianaemp_desnumexp').hide();

  if($('lianaemp_id').value=='')
   {
        $('lianaemp_numanaemp').focus();
   }
  else
   {
       $('lianaemp_numanaemp').readOnly=true;
   }

   if($('lianaemp_lisicact_id').value!='')
  {
      $$('h2')[6].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[6].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_lianaemp_fecdecla').hide();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('lianaemp_coduniadm').setAttribute('readonly',true)
  $('lianaemp_coduniste').setAttribute('readonly',true)
  $('lianaemp_desuniadm').setAttribute('readonly',true)
  $('lianaemp_desuniste').setAttribute('readonly',true)
  $('lianaemp_coduniadm').setAttribute('style','border:none')
  $('lianaemp_coduniste').setAttribute('style','border:none')
  $('lianaemp_desuniadm').setAttribute('style','border:none')
  $('lianaemp_desuniste').setAttribute('style','border:none')
  $('lianaemp_coduniadm').setAttribute('onBlur','')
  $('lianaemp_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('lianaemp_fecreg').value+'&dias='+$('lianaemp_dias').value);
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
      toAjax('12',getUrlModulo()+'ajax','0','','&idporcri='+idporcri+'&tporemp='+tporemp+'&numplie='+$('lianaemp_numplie').value);
      //$(idporcri).value=number_format(tporemp,'2',',','.');
  }
  function SumarPortot()
  {
      
         porleg = $('lianaemp_porleg').toFloat();
         
         portec = $('lianaemp_portec').toFloat();
         
         porfin = $('lianaemp_porfin').toFloat();

         var total = parseFloat(porleg) + parseFloat(portec) + parseFloat(porfin);
         $('lianaemp_portot').value=number_format(total,'2',',','.');

  }
</script>