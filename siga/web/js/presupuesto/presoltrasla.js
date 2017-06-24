  function anular(){
	  if (confirm("Realmente desea Anular esta Solicitud?")) {
	    var referencia=$('cpsoltrasla_reftra').value;
	    var fectra = $('cpsoltrasla_fectra').value;
            var id = $('cpsoltrasla_id').value;

    	new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&referencia='+referencia+'&fectra='+fectra+'&id='+id})
	   }
  }

  function abreAnular(referencia,fectra) {
	window.open(getUrlModulo()+'anular?referencia='+referencia+'&fectra='+fectra,'...','menubar=no,toolbar=no,scrollbars=yes,width=680,height=550,resizable=yes,left=400,top=120');
  }

  function Aprobar_Solicitud(sw){
    var nivel = sw;
    var referencia=$('cpsoltrasla_reftra').value;
    var fectra = $('cpsoltrasla_fectra').value;
    new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&referencia='+referencia+'&fectra='+fectra+'&nivel='+nivel})
  }

  function abreAprobar(referencia,fectra, nivel) {
	window.open(getUrlModulo()+'aprobar?referencia='+referencia+'&fectra='+fectra+'&nivel='+nivel,'...','menubar=no,toolbar=no,scrollbars=yes,width=680,height=550,resizable=yes,left=400,top=120');
  }  
function colocarEvento(valor,fil,col)
{
  if (!BuscarCodpre2(valor,col,fil))
  {
    BuscarCodpre3();
     var fr=(obtener_filas_grid('d',1)-1);   
     var filact=fr;
     var fildoc='dx_'+filact+'_'+col;   

      if ($(fildoc)) {
          if ($(fildoc).value!="")
          {
           NuevaFilaGrid('d');
           var fildoc='dx_'+(filact+1)+'_'+col;
          }
        }else {
          filact=-1;
          NuevaFilaGrid('d');
           var fildoc='dx_'+(filact+1)+'_'+col;
        }
        $(fildoc).value=valor;
    }
}

function BuscarCodpre(valor,fila)
{
   var colart=obtener_filas_grid('c',1);
   var fil=0;
   var enc=false;
   while (fil<colart)
   {
     var codpre="cx_"+fil+"_2";
     if ($(codpre).value==valor) {
      enc=true;
      break;
    }
     fil++;
   }
   if (enc)
   {
     var totpre="dx_"+fila+"_2";
     var totpre1="dx_"+fil+"_2";
     $(totpre).value=$(totpre1).value
   }else {
    var codipre="dx_"+fila+"_1";
    alert('El código presupuestario no se encuentra en las Imputaciones Presupuestarias');
    $(codipre).value="";
   }
}

function BuscarCodpre2(valor,col,fila)
{
   var colart=obtener_filas_grid('d',1);
   var fil=0;   
   if (col==2) {
     var codpreq="cx_"+fila+"_2";
     valor2=$(codpreq).value;
   }
   var enc=false;
   while (fil<colart)
   {
     if (col==1) {
     var codpre="dx_"+fil+"_"+col;
     if ($(codpre).value==valor) {
      enc=true;
      break;
     }
   }else {
    var codpre="dx_"+fil+"_1";
    var monimp="dx_"+fil+"_2";
     if ($(codpre).value==valor2 && $(monimp).value==valor) {
      enc=true;
      break;
     }else if ($(codpre).value==valor2 && ($(monimp).value!=valor && $(monimp).value!='' && $(monimp).value!='0,00')) {
      enc=true;
      var totpre="cx_"+fila+"_3";
      var monimp="dx_"+fil+"_2";
      $(monimp).value=$(totpre).value
      break;
     }
   }
     fil++;
   }   
   return enc;
}

function BuscarCodpre3()
{
   var colart=obtener_filas_grid('d',1);
   var fil=0;
   var enc=false;
   while (fil<colart)
   {
     var codpre="dx_"+fil+"_1";
     if (!BuscarEstaGrida($(codpre).value))      
        EliminarFilaGrid('d',fil,',');
     fil++;
   }
}

function BuscarEstaGrida(valor)
{
   var colart=obtener_filas_grid('c',1);
   var fil=0;
   var enc=false;
   while (fil<colart)
   {
     var codpre="cx_"+fil+"_2";
     if ($(codpre).value==valor) {
      enc=true;
      break;
    }
     fil++;
   }
   return enc;   
}


function mostrargridperiodos(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  var codpre=name+"_"+fil+"_1";
  var monmov=name+"_"+fil+"_2";
  if ($(codpre).value!="" && toFloat(monmov)>0)
  {
    if ($('cpsoltrasla_reftra').value=='########') var reftra=''; else var reftra=$('cpsoltrasla_reftra').value;
    if ($('id').value!='') var nuevo='S'; else var nuevo='N';
    var codigopre=$(codpre).value;
    
    var montomov=toFloat(monmov);
    $('cpsoltrasla_actualfila').value=fil;

    new Ajax.Updater('divgrid_perdes', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirPeriodosenGrid(); $("divgrid_perdes").show();}, parameters:'ajax=6&codigopre='+codigopre+'&reftra='+reftra+'&montomov='+montomov+'&nuevo='+nuevo})
  }
  else
  {
    alert_("Debe introducir el C&oacute;digo Presupuestario y el Monto debe ser mayor a cero..");
  }
}

function salvarmontoperiodosori()
{
  if ($('id').value=='') {
    var cadena='';
    var fil=0;
    while (fil<12)
    {
      var mes="ex"+"_"+fil+"_1";
      var monto="ex"+"_"+fil+"_2";
      if ($(mes))
      {
        if ($(mes).value!="" && toFloat(monto)>0)
        {
          var cadena=cadena + $(mes).value+'_' + $(monto).value + '!';
        }
      }
      fil++;
    }
    var mifila=$('cpsoltrasla_actualfila').value;
    var infperiodos="ax"+"_"+mifila+"_4";
    $(infperiodos).value=cadena;  
  }
    $('divgrid_perdes').hide();
    
}


function distribuirPeriodosenGrid()
{
  if ($('id').value=='') {
  var j=$('cpsoltrasla_actualfila').value;
  var haydist="ax"+"_"+j+"_4";
  var mondist="ax"+"_"+j+"_2";
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
      var montoori="ex"+"_"+z+"_3";
      if (!$(mes)){
        NuevaFilaGrid('e');
      }
      $(mes).value=cmes;
      $(monto).value=cmonto;
      $(montoori).value=$(mondist).value;
     
      z++;
    }
  }else {
    var z=0;
    var montoori="ex"+"_"+z+"_3";
    $(montoori).value=$(mondist).value;
  }
}
}

function mostrargridperiodos2(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  var codpre=name+"_"+fil+"_1";
  var monmov=name+"_"+fil+"_2";
  if ($(codpre).value!="" && toFloat(monmov)>0)
  {
    if ($('cpsoltrasla_reftra').value=='########') var reftra=''; else var reftra=$('cpsoltrasla_reftra').value;
    if ($('id').value!='') var nuevo='S'; else var nuevo='N';
    var codigopre=$(codpre).value;
    
    var montomov=toFloat(monmov);
    $('cpsoltrasla_actualfila').value=fil;

    new Ajax.Updater('divgrid_perhas', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirPeriodosenGrid2(); $("divgrid_perhas").show();}, parameters:'ajax=7&codigopre='+codigopre+'&reftra='+reftra+'&montomov='+montomov+'&nuevo='+nuevo})
  }
  else
  {
    alert_("Debe introducir el C&oacute;digo Presupuestario y el Monto debe ser mayor a cero..");
  }
}

function salvarmontoperiodoshas()
{
  if ($('id').value=='') {
    var cadena='';
    var fil=0;
    while (fil<12)
    {
      var mes="fx"+"_"+fil+"_1";
      var monto="fx"+"_"+fil+"_2";
      if ($(mes))
      {
        if ($(mes).value!="" && toFloat(monto)>0)
        {
          var cadena=cadena + $(mes).value+'_' + $(monto).value + '!';
        }
      }
      fil++;
    }
    var mifila=$('cpsoltrasla_actualfila').value;
    var infperiodos="bx"+"_"+mifila+"_4";
    $(infperiodos).value=cadena;  
  }
  $('divgrid_perhas').hide();  
}


function distribuirPeriodosenGrid2()
{
  if ($('id').value=='') {
    var j=$('cpsoltrasla_actualfila').value;
    var haydist="bx"+"_"+j+"_4";
    var mondist="bx"+"_"+j+"_2";
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
        var montoori="fx"+"_"+z+"_3";
        if (!$(mes)){
          NuevaFilaGrid('f');
      }
       
        $(mes).value=cmes;
        $(monto).value=cmonto;
        $(montoori).value=$(mondist).value;
       
        z++;
      }
    }else {
      var z=0;
      var montoori="fx"+"_"+z+"_3";
      $(montoori).value=$(mondist).value;
    }
  }
}

function mostrargridperiodosoricon(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  var codpre=name+"_"+fil+"_1";
  var monmov=name+"_"+fil+"_7";
  if ($(codpre).value!="")
  {
    if ($('cpsoltrasla_reftra').value=='########') var reftra=''; else var reftra=$('cpsoltrasla_reftra').value;
    if ($('id').value!='') var nuevo='N'; else var nuevo='S';
    var codigopre=$(codpre).value;
    
    var montomov=toFloat(monmov);
    $('cpsoltrasla_actualfila').value=fil;

    new Ajax.Updater('divgrid_perdes', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json); $("divgrid_perdes").show();}, parameters:'ajax=6&codigopre='+codigopre+'&reftra='+reftra+'&montomov='+montomov+'&nuevo='+nuevo})
  }
  else
  {
    alert_("Debe introducir el C&oacute;digo Presupuestario..");
  }
}

function mostrargridperiodosdescon(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  var codpre=name+"_"+fil+"_4";
  var monmov=name+"_"+fil+"_7";
  if ($(codpre).value!="")
  {
    if ($('cpsoltrasla_reftra').value=='########') var reftra=''; else var reftra=$('cpsoltrasla_reftra').value;
    if ($('id').value!='') var nuevo='N'; else var nuevo='S';
    var codigopre=$(codpre).value;
    
    var montomov=toFloat(monmov);
    $('cpsoltrasla_actualfila').value=fil;

    new Ajax.Updater('divgrid_perhas', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json); $("divgrid_perhas").show();}, parameters:'ajax=7&codigopre='+codigopre+'&reftra='+reftra+'&montomov='+montomov+'&nuevo='+nuevo})
  }
  else
  {
    alert_("Debe introducir el C&oacute;digo Presupuestario y el Monto debe ser mayor a cero..");
  }
}




