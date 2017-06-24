  function anular(){
	  if (confirm("Realmente desea Anular este Traslado?")) {
	    var referencia=$('cptrasla_reftra').value;
	    var fectra = $('cptrasla_fectra').value;


    	new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&referencia='+referencia+'&fectra='+fectra})
	   }
  }

  function abreAnular(referencia,fectra) {
	window.open(getUrlModulo()+'anular?referencia='+referencia+'&fectra='+fectra,'...','menubar=no,toolbar=no,scrollbars=yes,width=680,height=550,resizable=yes,left=400,top=120');
  }

function mostrargridperiodos(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  var codpre=name+"_"+fil+"_1";
  var monmov=name+"_"+fil+"_7";
  var cordissol='<?php echo H::getConfApp2('cordissol', 'presupuesto', 'PreTrasla');?>';

  if ($(codpre).value!="")
  {
    if (cordissol=='S'){
      var reftra=$('cptrasla_refsoltra').value;
    }else {
      if ($('cptrasla_reftra').value=='########') 
        var reftra=''; 
      else 
        var reftra=$('cptrasla_reftra').value;
    }
    if ($('id').value!='') var nuevo='N'; else var nuevo='S';
    var codigopre=$(codpre).value;
    
    var montomov=toFloat(monmov);
    $('cptrasla_actualfila').value=fil;

    new Ajax.Updater('divgrid_perdes', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirPeriodosenGrid(); $("divgrid_perdes").show();}, parameters:'ajax=4&codigopre='+codigopre+'&reftra='+reftra+'&montomov='+montomov+'&nuevo='+nuevo})
  }
  else
  {
    alert_("Debe introducir el C&oacute;digo Presupuestario..");
  }
}

function salvarmontoperiodosori()
{     
    $('divgrid_perdes').hide();    
}


function distribuirPeriodosenGrid()
{
  var j=$('cptrasla_actualfila').value;
  var haydist="ax"+"_"+j+"_3";
  if ($(haydist).value!="")
  {
    var distrib=$(haydist).value;
    var aux2=distrib.split("!");

    var z=0;
    while (z<((aux2.length)-1))
    {
      var reg=aux2[z];
      var aux3=reg.split("_");
      var cmes=aux3[0];
      var cmonto=aux3[1];

      var mes="ex"+"_"+z+"_1";
      var monto="ex"+"_"+z+"_2";
     
      $(mes).value=cmes;
      $(monto).value=cmonto;    
      z++;
    }
  }

}

function mostrargridperiodos2(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  var codpre=name+"_"+fil+"_4";
  var monmov=name+"_"+fil+"_7";
  var cordissol='<?php echo H::getConfApp2('cordissol', 'presupuesto', 'PreTrasla');?>';
  if ($(codpre).value!="")
  {
    if (cordissol=='S'){
      var reftra=$('cptrasla_refsoltra').value;
    }else {
      if ($('cptrasla_reftra').value=='########') 
        var reftra=''; 
      else 
        var reftra=$('cptrasla_reftra').value;
    }
    if ($('id').value!='') var nuevo='N'; else var nuevo='S';
    var codigopre=$(codpre).value;
    
    var montomov=toFloat(monmov);
    $('cptrasla_actualfila').value=fil;

    new Ajax.Updater('divgrid_perhas', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirPeriodosenGrid2(); $("divgrid_perhas").show();}, parameters:'ajax=5&codigopre='+codigopre+'&reftra='+reftra+'&montomov='+montomov+'&nuevo='+nuevo})
  }
  else
  {
    alert_("Debe introducir el C&oacute;digo Presupuestario..");
  }
}

function salvarmontoperiodoshas()
{
  $('divgrid_perhas').hide();  
}


function distribuirPeriodosenGrid2()
{
    var j=$('cptrasla_actualfila').value;
    var haydist="ax"+"_"+j+"_6";
    if ($(haydist).value!="")
    {
      var distrib=$(haydist).value;
      var aux2=distrib.split("!");

      var z=0;
      while (z<((aux2.length)-1))
      {
        var reg=aux2[z];
        var aux3=reg.split("_");
        var cmes=aux3[0];
        var cmonto=aux3[1];

        var mes="fx"+"_"+z+"_1";
        var monto="fx"+"_"+z+"_2";
       
        $(mes).value=cmes;
        $(monto).value=cmonto;
      
        z++;
      }
    }
  
}
