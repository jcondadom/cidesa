<?php 
   $pdfjasper="N";
   $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';
   $configyml = sfYaml::load($dirrepconfig);
   if(is_array($configyml)){
     if(array_key_exists('tesoreria',$configyml)) {
       if(array_key_exists('pagemiord',$configyml['tesoreria'])) {     
         if(array_key_exists('parameterjasper',$configyml['tesoreria']["pagemiord"])) 
           $pdfjasper= $configyml["tesoreria"]["pagemiord"]["parameterjasper"];
      }
    }
  }
 ?>


<script language="JavaScript" type="text/javascript">
    //$$('.sf_admin_action_delete')[0].hide();
    $('trigger_opordpag_fecemi').hide();
    $('divgrid_ret').hide();
    montoTotal();
    DeshabilitarIVA();
    TotalRetencion();
    TotalFacturas();

  function montoTotal(){
   var moncau=toFloat('opordpag_monord');
   var monret=toFloat('opordpag_monret');
   var mondes=toFloat('opordpag_mondes');

   var neto= moncau-(monret+mondes);

   $('opordpag_neto').value=format(neto.toFixed(2),'.',',','.');
  }

  function  salvarretenciones(){
    TotalRetencion();
  	var totret=toFloat('totalmontorete');
  	$('opordpag_monret').value=format(totret.toFixed(2),'.',',','.');
  	if ($('opordpag_afectapresup').value=='S'){
  	  $('ax_0_4').value=format(totret.toFixed(2),'.',',','.');
  	}
    montoTotal();
    $('divgrid_ret').hide();
  }

  function TotalRetencion(){
    var acum=0;
    var retenciones="";
    var j=0;
    var totfilret=obtener_filas_grid('b',1);
    while (j<totfilret){
      var cod="bx_"+j+"_1";
      if ($(cod)){
        if ($(cod).value!='') {
          var monto="bx_"+j+"_11";
          var estaiva="bx_"+j+"_9";
          var basimp="bx_"+j+"_10";
          var estaislr="bx_"+j+"_12";
          var esta1xmil="bx_"+j+"_13";
          var estairs="bx_"+j+"_15";
          var estaimn="bx_"+j+"_17";
          var base="bx_"+j+"_4";
          var porret="bx_"+j+"_5";
          var factor="bx_"+j+"_6";
          var porsus="bx_"+j+"_7";
          var unitri="bx_"+j+"_8";
          var num=toFloat(monto);
          acum+=num;
          if (retenciones=='')
            retenciones=$(cod).value+'*'+$(monto).value+'*'+$(estaiva).value+'*'+$(basimp).value+'*'+$(estaislr).value+'*'+$(esta1xmil).value+'*'+$(estairs).value+'*'+$(estaimn).value+'*'+$(base).value+'*'+$(porret).value+'*'+$(factor).value+'*'+$(porsus).value+'*'+$(unitri).value;
          else
            retenciones=retenciones+'!'+$(cod).value+'*'+$(monto).value+'*'+$(estaiva).value+'*'+$(basimp).value+'*'+$(estaislr).value+'*'+$(esta1xmil).value+'*'+$(estairs).value+'*'+$(estaimn).value+'*'+$(base).value+'*'+$(porret).value+'*'+$(factor).value+'*'+$(porsus).value+'*'+$(unitri).value;
        }
      }
      j++;
    }

    $('totalmontorete').value=format(acum.toFixed(2),'.',',','.');
    $('opordpag_retenapli').value=retenciones;
  }

  function TotalFacturas(){
    var acum=acum1=acum2=acum3=acum4=acum5=acum6=0;
    var j=0;
    var totfilfac=obtener_filas_grid('c',1);
    while (j<totfilfac){
      var fec="cx_"+j+"_1";
      if ($(fec)){
        if ($(fec).value!='') {
          var monto="cx_"+j+"_9";
          var exe="cx_"+j+"_10";
          var iva="cx_"+j+"_13";
          var mil="cx_"+j+"_17";
          var islr="cx_"+j+"_21";
          var irs="cx_"+j+"_28";
          var imn="cx_"+j+"_34";
          
          var num=toFloat(monto);
          var num1=toFloat(exe);
          var num2=toFloat(iva);
          var num3=toFloat(mil);
          var num4=toFloat(islr);
          var num5=toFloat(irs);
          var num6=toFloat(imn);
          acum+=num;
          acum1+=num1;
          acum2+=num2;
          acum3+=num3;
          acum4+=num4;
          acum5+=num5;
          acum6+=num6;
        }
      }
      j++;
    }

    $('opordpag_totfac').value=format(acum.toFixed(2),'.',',','.');
    $('opordpag_totexe').value=format(acum1.toFixed(2),'.',',','.');
    $('opordpag_totiva').value=format(acum2.toFixed(2),'.',',','.');
    $('opordpag_totmontmil').value=format(acum3.toFixed(2),'.',',','.');
    $('opordpag_totmontislr').value=format(acum4.toFixed(2),'.',',','.');
    $('opordpag_totmontirs').value=format(acum5.toFixed(2),'.',',','.');
    $('opordpag_totmontimn').value=format(acum6.toFixed(2),'.',',','.');
  }  

  function Mostrar_orden_preimpresa()
  {
    f=0;
    i=0;
    if(confirm("¿Desea imprimir la orden Pre-Impresa?"))
    {
        var ordpagdes=$('opordpag_numord').value;
        var ordpaghas=$('opordpag_numord').value;

        var codprodes=$('opordpag_cedrif').value;
        var codprohas=$('opordpag_cedrif').value;

        var tiporddes=$('opordpag_tipcau').value;
        var tipordhas=$('opordpag_tipcau').value;

        var fecorddes=$('opordpag_fecemi').value;
        var fecordhas=$('opordpag_fecemi').value;

        var status='Todas';

        var  ruta='http://'+'<? echo $this->getContext()->getRequest()->getHost();?>';
        var  mostrarjasper='<?php echo $pdfjasper;?>';
        var nombrerep='<?php echo $opordpag->getNomreporte();?>';
        if (nombrerep!='')
        {
          if (mostrarjasper=='S') 
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=tesoreria&r="+nombrerep+".php&s=<?php echo $sf_user->getAttribute('schema');?>&ordpagdes="+ordpagdes+"&ordpaghas="+ordpaghas;
          else
            pagina=ruta+"/<? echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r="+nombrerep+".php&ordpagdes="+ordpagdes+"&ordpaghas="+ordpaghas;
        }else {
          if (mostrarjasper=='S') 
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=tesoreria&r=oprordpre.php&s=<?php echo $sf_user->getAttribute('schema');?>&ordpagdes="+ordpagdes+"&ordpaghas="+ordpaghas;
          else
            pagina=ruta+"/<? echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r=oprordpre.php&ordpagdes="+ordpagdes+"&ordpaghas="+ordpaghas;
        }

        window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
    }
  }  

  function DeshabilitarIVA(){
    var j=0;
    var totfilret=obtener_filas_grid('a',2);
    while (j<totfilret){
      var cod="ax_"+j+"_1";
      var iva="ax_"+j+"_6";
      if ($(cod)){
        if ($(iva).value=='S')
          $(cod).disabled=true;
      }
      j++;
    }
  }  

function CargarComboIva(id){
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  var colali=col+7;
  var alicuota=name+"_"+fil+"_"+colali;
  var cod=$(id).value;

  new Ajax.Updater(alicuota, getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&retenciones='+$('opordpag_retenapli').value+'&referencias='+$('opordpag_comaso').value+'&codigo='+cod});       
}


function CargarComboIslr(id){
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  var colislr=col+19;
  var islr=name+"_"+fil+"_"+colislr;
  var cod=$(id).value;

  new Ajax.Updater(islr, getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&retenciones='+$('opordpag_retenapli').value+'&codigo='+cod});       
}

function CargarComboIrs(id){
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  var colirs=col+26;
  var irs=name+"_"+fil+"_"+colirs;
  var cod=$(id).value;

  new Ajax.Updater(irs, getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&retenciones='+$('opordpag_retenapli').value+'&codigo='+cod});       
}

function CargarComboImn(id){
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  var colimn=col+32;
  var imn=name+"_"+fil+"_"+colimn;
  var cod=$(id).value;

  new Ajax.Updater(imn, getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&retenciones='+$('opordpag_retenapli').value+'&codigo='+cod});       
}
</script>