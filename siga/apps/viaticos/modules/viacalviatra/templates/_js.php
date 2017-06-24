<?php 
   $pdfjasper="N";
   $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';
   $configyml = sfYaml::load($dirrepconfig);
   if(is_array($configyml)){
     if(array_key_exists('viaticosv2',$configyml)) {
       if(array_key_exists('viacalviatra',$configyml['viaticosv2'])) {     
         if(array_key_exists('parameterjasper',$configyml['viaticosv2']["viacalviatra"])) 
           $pdfjasper= $configyml["viaticosv2"]["viacalviatra"]["parameterjasper"];
      }
    }
  }
 ?>

<script language="Javascript">
    var respon='<?php echo H::getConfApp2('respon', 'tesoreria', 'tesdesubi'); ?>';
    var ocuinfaco='<?php echo H::getConfApp2('ocuinfaco', 'viaticos', 'viasolviatra'); ?>';
    if (respon!='S')
    {
        $('divunidadsol').hide();
        $('divunidadeje').hide();
    }

    if (ocuinfaco=='S')
    {
        //$('divempleadoaco').hide();
        $('divgrid2').hide();
    }

    $('viacalviatra_fecha').hide();
    Calculartotal();
    
    function rellenarcorr(id)
    {
        if($(id).value=='')
            $(id).value=$(id).value.pad(10,'#',0)
        else
            $(id).value=$(id).value.pad(10,'0',0)
    }

    function bloquearcajacorr(id)
    {
        if($(id).value!='')
            $(id).readOnly=true;

    }
    function calculamontofinal(id,colu)
    {
        if($(id).readOnly==false)
        {
            var auxid=id.split('_');
            var col=auxid[2];
            var name=auxid[0];
            var fil= auxid[1];
            var valdor='<?php echo $viacalviatra->getValdolar();?>';
            if(colu=='3')
            {
                var colval = parseInt(colu)+1;
                var colotr = parseInt(colu)+2;
            }
            else
            {
                var colval = parseInt(colu)+1;
                var colotr = parseInt(colu);
            }
            var idval = name+'_'+fil+'_'+colval;
            var idotr = name+'_'+fil+'_'+colotr;
            var idmon = name+'_'+fil+'_6';
            var idcamdol = name+'_'+fil+'_9';
            var idmondol = name+'_'+fil+'_10';
            var val = $(idval).value
            val = val.replace('.','');
            val = val.replace(',','.');

            var valor = $(idotr).value
            valor = valor.replace('.','');
            valor = valor.replace(',','.');

            $(idmon).value=number_format(parseFloat(valor)*parseFloat(val),2,',','.');
            $(idcamdol).value=number_format(parseFloat(val)/valdor,2,',','.');
            $(idmondol).value=number_format((parseFloat(valor)*parseFloat(val))/valdor,2,',','.');
            Calculartotal();
        }


    }

    function Calculartotal()
    {
        var total2=0;
        var filsuple='';
        var totfil = obtener_filas_grid('a', '3');
        var valdor='<?php echo $viacalviatra->getValdolar();?>';
        for(i=0;i<totfil;i++)
        {
            if($('ax_'+i+'_2').value=='VI' && $('ax_'+i+'_7').value!='I3')
            {
                if($('ax_'+i+'_1').checked==true)
                {
                    var val2 = $('ax_'+i+'_5').value
                    val2 = val2.replace('.','');
                    val2 = val2.replace(',','.');
                    total2 = parseFloat(val2);//parseFloat(total2)+parseFloat(val2);
                }
            }
            if($('ax_'+i+'_7').value=='I3')
            {
                var filsuple =i;
            }
            if($('ax_'+i+'_1').checked==false)
            {
               $('ax_'+i+'_4').value="0,00";
               $('ax_'+i+'_5').value="0,00";
               $('ax_'+i+'_6').value="0,00";
               $('ax_'+i+'_9').value="0,00";
               $('ax_'+i+'_10').value="0,00";               
            }                      

        }
        if(filsuple!='')
        {
            cold = 'ax_'+filsuple+'_4';
            colmd = 'ax_'+filsuple+'_5';
            colt = 'ax_'+filsuple+'_6';
            colmddol = 'ax_'+filsuple+'_9';
            coltdol = 'ax_'+filsuple+'_10';
            $(colmd).value=number_format(total2*0.3,2,',','.');
            $(colmddol).value=number_format((total2*0.3)/valdor,2,',','.');
            var val3=$(colmd).value;
            val3 = val3.replace('.','');
            val3 = val3.replace(',','.');
            var val4=$(cold).value;
            val4 = val4.replace('.','');
            val4 = val4.replace(',','.');
            $(colt).value=number_format(parseFloat(val3)*parseFloat(val4),2,',','.');
            $(coltdol).value=number_format((parseFloat(val3)*parseFloat(val4))/valdor,2,',','.');
        }
        ReCalculartotal();
    }

    function ReCalculartotal()
    {
        var total=0;
        var total2=0;
        var filsuple='';
        var enc=false;
        var posi=-1;
        var totfil = obtener_filas_grid('a', '3');
        var valdor='<?php echo $viacalviatra->getValdolar();?>';
        for(i=0;i<totfil;i++)
        {

            if($('ax_'+i+'_8').value=='F')
            {
                $('ax_'+i+'_4').readOnly=false;
                $('ax_'+i+'_5').readOnly=false;
            }else
            {
                if ($('ax_'+i+'_6').value=='0,00' && $('ax_'+i+'_12').value!='K')
                   $('ax_'+i+'_1').disabled=true;
            }
            if($('ax_'+i+'_1').checked==true)
            {
                var val = $('ax_'+i+'_6').value
                val = val.replace('.','');
                val = val.replace(',','.');
                total = parseFloat(total)+parseFloat(val);
                
                /*if($('ax_'+i+'_11').value=='T')
                {
                    posi=i;
                    enc=true;
                }*/
            }
             

        }
        
        if (enc)
        {
            var calculo = toFloat('ax_'+posi+'_6');
            total=total-calculo;
            $('ax_'+posi+'_6').value=number_format(total,2,',','.');
            
            var total2=total;
            var num1=toFloat('ax_'+posi+'_4');
            var c2=total/num1
            $('ax_'+posi+'_5').value=number_format(c2,2,',','.');
            
            $('ax_'+posi+'_9').value=number_format(c2/valdor,2,',','.');
            
            var num2=toFloat('ax_'+posi+'_9');
            
            $('ax_'+posi+'_10').value=number_format(num2*num1,2,',','.');
        }else {
            total2=total;
        }
        $('viacalviatra_totvia').value=number_format(total2,2,',','.');
        $('viacalviatra_totviadol').value=number_format(total2/valdor,2,',','.');
        toAjax(2,getUrlModulo()+'ajax','1','','&monto='+total2);
    }
    if('<?php echo $viacalviatra->getTipvia()?>'=='NACIONAL' || '<?php echo $viacalviatra->getTipvia()?>'=='')
    {
        $('divtotviadol').hide();
    }else
    {
        $('divtotviadol').show();
    }
    
  function anular()
  {
    var numcalculo=$('viacalviatra_numcal').value;
    var feccalculo=$('viacalviatra_feccal').value;

    window.open(getUrlModulo()+'anular?numcalculo='+numcalculo+'&feccalculo='+feccalculo,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
  }    

  function mostrarAcompanantes(numsol)
  {
     new Ajax.Updater('divgrid2', '/viaticos'+getEnv()+'.php/viacalviatra/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&numsol='+numsol});
  }

  function Mostrar_orden_preimpresa()
  {
    if(confirm("¿Desea imprimir el Calculo de Viaticos Pre-Impreso?"))
    {
      var numcaldes=$('viacalviatra_numcal').value;
      var numcalhas=$('viacalviatra_numcal').value;

      var nombrerep='<?php echo $viacalviatra->getNomreporte();?>';
      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
      var  mostrarjasper='<?php echo $pdfjasper;?>';

      if (nombrerep!=''){     
        if (mostrarjasper=='S') 
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=viaticosv2&r="+nombrerep+".php&s=<?php echo $sf_user->getAttribute('schema');?>&numcaldes="+numcaldes+"&numcalhas="+numcalhas;
        else
          pagina=ruta+"/reportes/reportes/viaticosv2/r.php=?r="+nombrerep+".php&numcaldes="+numcaldes+"&numcalhas="+numcalhas;
      }else {
        if (mostrarjasper=='S') 
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=viaticosv2&r=viarforcal.php&s=<?php echo $sf_user->getAttribute('schema');?>&numcaldes="+numcaldes+"&numcalhas="+numcalhas;
        else
          pagina=ruta+"/reportes/reportes/viaticosv2/r.php=?r=viarforcal.php&numcaldes="+numcaldes+"&numcalhas="+numcalhas;
      }
        
        window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
      }
  }  
</script>
