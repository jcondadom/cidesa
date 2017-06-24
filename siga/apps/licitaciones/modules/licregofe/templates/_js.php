<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  $('trigger_liregofe_fecven').hide();
  $('liregofe_desnumexp').hide();

   if($('liregofe_id').value=='')
   {
        $('liregofe_numofe').focus();
   }
  else
   {
       $('liregofe_numofe').readOnly=true;
   }

   if($('liregofe_lisicact_id').value!='')
  {
      $$('h2')[17].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[17].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_liregofe_fecdecla').hide();

   //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('liregofe_coduniadm').setAttribute('readonly',true)
  $('liregofe_coduniste').setAttribute('readonly',true)
  $('liregofe_desuniadm').setAttribute('readonly',true)
  $('liregofe_desuniste').setAttribute('readonly',true)
  $('liregofe_coduniadm').setAttribute('style','border:none')
  $('liregofe_coduniste').setAttribute('style','border:none')
  $('liregofe_desuniadm').setAttribute('style','border:none')
  $('liregofe_desuniste').setAttribute('style','border:none')
  $('liregofe_coduniadm').setAttribute('onBlur','')
  $('liregofe_coduniste').setAttribute('onBlur','')
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
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('liregofe_fecreg').value+'&dias='+$('liregofe_dias').value);
  }
  function CalculaTotal(id)
  {
    var aux = id.split('_');
    var cantid = $('ax_'+aux[1]+'_4').toFloat();
    var preuni = $('ax_'+aux[1]+'_5').toFloat();
    var monrec = $('ax_'+aux[1]+'_6').toFloat();
    var idsubtot = 'ax_'+aux[1]+'_7';
    var tmonofe = 0;
    

    $(idsubtot).value = number_format((parseFloat(cantid)*parseFloat(preuni))+parseFloat(monrec),'2',',','.');

    var tfil = obtener_filas_grid('a',1);
    for(i=0;i<tfil;i++)
    {
        monofe = $('ax_'+i+'_7').toFloat();
        tmonofe= parseFloat(tmonofe) + parseFloat(monofe);
    }
    toAjax('13',getUrlModulo()+'ajax','0','','&monofe='+tmonofe);
  }

  function CalculaRecargo(id)
  {
      var aux = id.split('_');
      var idmonrgo = 'bx_'+aux[1]+'_3';
      var tiprgo = $('bx_'+aux[1]+'_4').value;
      var monto = $('bx_'+aux[1]+'_5').toFloat();
      var monofe = $('liregofe_monofe').toFloat();      
      
      if(tiprgo=='P')
        $(idmonrgo).value = number_format((parseFloat(monto)*parseFloat(monofe)/100),'2',',','.');
      else
        $(idmonrgo).value = number_format((parseFloat(monto)+parseFloat(monofe)),'2',',','.');      
      
      CalculaTotalRecargo();
  }
  
  function CalculaTotalRecargo()
  {
      var tfil = totalregistros2('b', '1', 20);
      var tmonrecofe = 0;
      for(i=0;i<tfil;i++)
      {
        if($('bx_'+i+'_3'))
        {
            monrecofe = $('bx_'+i+'_3').toFloat();        
            tmonrecofe= parseFloat(tmonrecofe) + parseFloat(monrecofe);
        }
      }
      toAjax('14',getUrlModulo()+'ajax','0','','&monrecofe='+tmonrecofe+'&monofe='+$('liregofe_monofe').value);
  }

</script>