<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  //OCULTAR  LA REFERNCIA DE LA MONEDA
  if($('liprebas_codmon').value!='001')
  {
      $('divvalcam').show();
      $('divmonsube').show();
      $('divmonrgoe').show();
      $('divmonpreext').show();
      $('divmonpreextletras').show();      
  }else
  {
      $('divvalcam').hide();
      $('divmonsube').hide();
      $('divmonrgoe').hide();
      $('divmonpreext').hide();
      $('divmonpreextletras').hide();      
  }
  if($('liprebas_lisicact_id').value!='')
  {
      $$('h2')[6].show();
      $('sf_fieldset_declaratoria').show();
  }
  else
  {
      $$('h2')[6].hide();
      $('sf_fieldset_declaratoria').hide();
  }
  $('trigger_liprebas_fecdecla').hide();
  
  $('liprebas_valcam').readOnly=true;  
  $('trigger_liprebas_fecven').hide();    
  $('liprebas_nompre').setAttribute('size','100')
  $('divgrid_rec').hide();
  $('liprebas_numpre').focus();
  if($('liprebas_id').value!='')
      $('liprebas_numpre').readOnly=true;

  //OCULTAR CATALOGO UNIDADES
  $$('.botoncat')[1].hide();
  $$('.botoncat')[3].hide();
  $('liprebas_coduniadm').setAttribute('readonly',true)
  $('liprebas_coduniste').setAttribute('readonly',true)
  $('liprebas_desuniadm').setAttribute('readonly',true)
  $('liprebas_desuniste').setAttribute('readonly',true)
  $('liprebas_coduniadm').setAttribute('style','border:none')
  $('liprebas_coduniste').setAttribute('style','border:none')
  $('liprebas_desuniadm').setAttribute('style','border:none')
  $('liprebas_desuniste').setAttribute('style','border:none')
  $('liprebas_coduniadm').setAttribute('onBlur','')
  $('liprebas_coduniste').setAttribute('onBlur','')
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
      toAjax('4',getUrlModulo()+'ajax',v,'','&fecha='+$('liprebas_fecreg').value+'&dias='+$('liprebas_dias').value);
  }

  function CalcularTotal()
  {
      var tfil = totalregistros2('a','1', 100);
      //var tfil = obtener_filas_grid('a',1);
      var tmonpre=0;
      var tmonpreext=0;
      for(i=0;i<tfil;i++)
      {
        if($('ax_'+i+'_15'))  
        {
            monpre = $('ax_'+i+'_15').toFloat();
            monpreext = $('ax_'+i+'_16').toFloat();        
            tmonpre= parseFloat(tmonpre) + parseFloat(monpre);
            tmonpreext= parseFloat(tmonpreext) + parseFloat(monpreext);
        }
      }
      toAjax('5',getUrlModulo()+'ajax','0','','&monpre='+tmonpre+'&monpreext='+tmonpreext);
  }

  function CalculaGrid(v1,v2)
  {
      toAjaxUpdater('divgrid1','7',getUrlModulo()+'ajax',v1,'','&valmon='+v2);
  }

  function MostrarGrid(id)
  {
      var aux=id.split('_');      
      var name = aux[0];
      var fil = aux[1];
      var col = aux[2];
      var codart = $(name+'_'+fil+'_1').value;
      var codcat = $(name+'_'+fil+'_3').value;
      var subtot = $(name+'_'+fil+'_12').value;
      var idmonrec = name+'_'+fil+'_14';
      var idmontot = name+'_'+fil+'_15';
      var idcadena = name+'_'+fil+'_19';
      if(codart=='' || codcat=='' || subtot=='' || subtot=='0,00')
          alert('Debe Cargar el Articulos y la Categoria previamente');
      else
          toAjaxUpdater('divgrid_rec','8',getUrlModulo()+'ajax',id,'','&codart='+codart+'&codcat='+codcat+'&subtot='+subtot+'&idmonrec='+idmonrec+'&idcadena='+idcadena+'&idmontot='+idmontot);
  }

  function CalculaRgo(id)
  {
      var codrgo=$(id).value;
      var aux=id.split('_');
      var name = aux[0];
      var fil = aux[1];
      var col = aux[2];
      var codart = $(name+'_'+fil+'_6').value;
      var codcat = $(name+'_'+fil+'_7').value;
      var tiprgo = $(name+'_'+fil+'_4').value;
      var monrgo = $(name+'_'+fil+'_5').value;
      var subtot = $(name+'_'+fil+'_9').value
      var idcodpre = name+'_'+fil+'_8'
      var idmonto  = name+'_'+fil+'_3'

      toAjax('9',getUrlModulo()+'ajax',codrgo,'','&tiprgo='+tiprgo+'&monrgo='+monrgo+'&subtot='+subtot+'&codart='+codart+'&codcat='+codcat+'&idcodpre='+idcodpre+'&idmonto='+idmonto);
  }


  function OcultarGrid()
  {      
      var tfil = totalregistros2('b','1', 20);
      var tfil2 = totalregistros2('a','1', 100);
      var tmonrgo = 0;
      var tmontotal = 0;
      var cadena = '';
      for(i=0;i<tfil;i++)
      {
            if($('bx_'+i+'_1'))
            {
                var codart = $('bx_'+i+'_6').value;
                var codcat = $('bx_'+i+'_7').value;
                var monto  = $('bx_'+i+'_3').value;
                var codrgo = $('bx_'+i+'_1').value;            
                var monrgo = $('bx_'+i+'_3').toFloat();            
                tmonrgo = parseFloat(tmonrgo) + parseFloat(monrgo);
                cadena = cadena + codart +'_'+codcat+'_'+monto+'_'+codrgo+'!';
            }
      }      
      toAjax('10',getUrlModulo()+'ajax','0','','&monrgo='+tmonrgo+'&cadena='+cadena);
      $('divgrid_rec').hide();
      
  }

    function CalculaRecargo(id)
  {
      var aux = id.split('_');
      var idmonrgo = 'cx_'+aux[1]+'_3';
      var idmonrgoe = 'cx_'+aux[1]+'_6';
      var tiprgo = $('cx_'+aux[1]+'_4').value;
      var monto = $('cx_'+aux[1]+'_5').toFloat();
      var monofe = $('liprebas_monsub').toFloat();
      var valcam = $('liprebas_valcam').value;      

      if(tiprgo=='P')
        $(idmonrgo).value = number_format((parseFloat(monto)*parseFloat(monofe)/100),'2',',','.');
      else
        $(idmonrgo).value = number_format((parseFloat(monto)+parseFloat(monofe)),'2',',','.');

      mon = $(idmonrgo).toFloat();
      if(valcam>1 && mon>0)
      {
          $(idmonrgoe).value =  number_format(parseFloat(mon)/parseFloat(valcam),'2',',','.');
      }
      CalculaTotalRecargo();
  }
  
  function CalculaTotalRecargo()
  {
      var tfil = totalregistros2('c','1', 20);
      var tmonrecofe = 0;
      for(i=0;i<tfil;i++)
      {
        if($('cx_'+i+'_3'))
        {
            monrecofe = $('cx_'+i+'_3').toFloat();        
            tmonrecofe= parseFloat(tmonrecofe) + parseFloat(monrecofe);        
        }        
      }
      var monsub = $('liprebas_monsub').value;
      var valcam = $('liprebas_valcam').value;
      toAjax('12',getUrlModulo()+'ajax','0','','&monsub='+monsub+'&monrgo='+tmonrecofe+'&valcam='+valcam);
  }

  function InicializaRec()
  {
      var tfil = totalregistros2('c','1', 20);
      for(i=0;i<tfil;i++)
      {
        if($('cx_'+i+'_3'))  
            $('cx_'+i+'_3').value='0,00';
      }
  }

</script>