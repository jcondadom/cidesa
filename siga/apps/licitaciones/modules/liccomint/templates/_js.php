<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  if($('licomint_codmon').value=='001' || $('licomint_codmon').value=='')
  {
    $('divmoncomext').hide();
    $('divmoncomextlet').hide();
  }else
  {
    $('divmoncomext').show();
    $('divmoncomextlet').show();
  }
  if($('licomint_destiplic').value=='')
    $('divdestiplic').hide();

  if($('licomint_id').value=='')
    $('licomint_numcomint').focus();
  else
    $('licomint_numcomint').readOnly=true;

  $('trigger_licomint_fecven').hide();

  if($('licomint_lisicact_id').value!='')
  {
      $$('h2')[3].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[3].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_licomint_fecdecla').hide();

  //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('licomint_coduniadm').setAttribute('readonly',true)
  $('licomint_coduniste').setAttribute('readonly',true)
  $('licomint_desuniadm').setAttribute('readonly',true)
  $('licomint_desuniste').setAttribute('readonly',true)
  $('licomint_coduniadm').setAttribute('style','border:none')
  $('licomint_coduniste').setAttribute('style','border:none')
  $('licomint_desuniadm').setAttribute('style','border:none')
  $('licomint_desuniste').setAttribute('style','border:none')
  $('licomint_coduniadm').setAttribute('onBlur','')
  $('licomint_coduniste').setAttribute('onBlur','')
  /////////////FIN//////////////////
  function Correl(id)
  {
      if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0);
  }

  function VerSolicitud(id)
  {
     var aux = id.split('_');
     var val = $('ax_'+aux[1]+'_7').value;
     var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
     pagina=getUrl()+"licsolegr/edit/id/"+val;
     window.open(pagina,1,"menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
  } 

  function CalculaFecha(v)
  {
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('licomint_fecreg').value+'&dias='+$('licomint_dias').value);
  }

  function CalcularTotal()
  {
      var tfil = obtener_filas_grid('a',1);
      var tmoncom=0;
      var tmoncomext=0;
      for(i=0;i<tfil;i++)
      {
        moncom = $('ax_'+i+'_6').toFloat();
        moncomext = $('ax_'+i+'_8').toFloat();
        if($('ax_'+i+'_2').checked==true)
        {            
            tmoncom= parseFloat(tmoncom) + parseFloat(moncom);
            tmoncomext= parseFloat(tmoncomext) + parseFloat(moncomext);
        }
      }
      toAjax('7',getUrlModulo()+'ajax','0','','&moncom='+tmoncom+'&moncomext='+tmoncomext);
  }
</script>