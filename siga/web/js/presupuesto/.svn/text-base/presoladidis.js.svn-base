  function anular(){
	  if (confirm("Realmente desea Anular esta Solicitud?")) {
	    var referencia=$('cpsoladidis_refadi').value;
	    var fecadi = $('cpsoladidis_fecadi').value;


    	new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&referencia='+referencia+'&fecadi='+fecadi})
	   }
  }

  function abreAnular(referencia,fecadi) {
	window.open(getUrlModulo()+'anular?referencia='+referencia+'&fecadi='+fecadi,'...','menubar=no,toolbar=no,scrollbars=yes,width=680,height=550,resizable=yes,left=400,top=120');
  }

  function Aprobar_Solicitud(sw){
    var nivel = sw;
    var referencia=$('cpsoladidis_refadi').value;
    var fecadi = $('cpsoladidis_fecadi').value;
    new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&referencia='+referencia+'&fecadi='+fecadi+'&nivel='+nivel})
  }

  function abreAprobar(referencia,fecadi, nivel) {
	window.open(getUrlModulo()+'aprobar?referencia='+referencia+'&fecadi='+fecadi+'&nivel='+nivel,'...','menubar=no,toolbar=no,scrollbars=yes,width=680,height=550,resizable=yes,left=400,top=120');
  }

  function CalcularMtoadic(codpre,ides,iva,dis,vdis,codigo,idm){
    var tipo=$('cpsoladidis_adidis_D').checked;
    var fecadi=$('cpsoladidis_fecadi').value;

    new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&codigo='+codigo+'&codpre='+codpre+'&ides='+ides+'&iva='+iva+'&dis='+dis+'&vdis='+vdis+'&tipo='+tipo+'&fecha='+fecadi+'&idm='+idm})
  }

function BuscarCodpre(valor,fila)
{
   var colart=obtener_filas_grid('a',1);
   var fil=0;
   var enc=false;
   while (fil<colart)
   {
     var codpre="ax_"+fil+"_1";
     if ($(codpre).value==valor) {
      enc=true;
      break;
    }
     fil++;
   }
   if (enc)
   {
     var totpre="bx_"+fila+"_2";
     var totpre1="bx_"+fil+"_2";
     $(totpre).value=$(totpre1).value
   }else {
    var codipre="bx_"+fila+"_1";
    alert('El código presupuestario no se encuentra en las Imputaciones Presupuestarias');
    $(codipre).value="";
   }
}

function colocarEvento(valor,fil,col)
{
  if (!BuscarCodpre2(valor,col,fil))
  {
    BuscarCodpre3();
     var fr=(obtener_filas_grid('b',1)-1);   
     var filact=fr;
     var fildoc='bx_'+filact+'_'+col;   

      if ($(fildoc)) {
          if ($(fildoc).value!="")
          {
           NuevaFilaGrid('b');
           var fildoc='bx_'+(filact+1)+'_'+col;
          }
        }else {
          filact=-1;
          NuevaFilaGrid('b');
           var fildoc='bx_'+(filact+1)+'_'+col;
        }
        $(fildoc).value=valor;
    }
}

function BuscarCodpre2(valor,col,fila)
{
   var colart=obtener_filas_grid('b',1);
   var fil=0;   
   if (col==2) {
     var codpreq="ax_"+fila+"_1";
     valor2=$(codpreq).value;
   }
   var enc=false;
   while (fil<colart)
   {
     if (col==1) {
     var codpre="bx_"+fil+"_"+col;
     if ($(codpre).value==valor) {
      enc=true;
      break;
     }
   }else {
    var codpre="bx_"+fil+"_1";
    var monimp="bx_"+fil+"_2";
     if ($(codpre).value==valor2 && $(monimp).value==valor) {
      enc=true;
      break;
     }else if ($(codpre).value==valor2 && ($(monimp).value!=valor && $(monimp).value!='' && $(monimp).value!='0,00')) {
      enc=true;
      var totpre="ax_"+fila+"_2";
      var monimp="bx_"+fil+"_2";
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
   var colart=obtener_filas_grid('b',1);
   var fil=0;
   var enc=false;
   while (fil<colart)
   {
     var codpre="bx_"+fil+"_1";
     if (!BuscarEstaGrida($(codpre).value))      
        EliminarFilaGrid('b',fil,',');
     fil++;
   }
}

function BuscarEstaGrida(valor)
{
   var colart=obtener_filas_grid('a',1);
   var fil=0;
   var enc=false;
   while (fil<colart)
   {
     var codpre="ax_"+fil+"_1";
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
    if ($('cpsoladidis_refadi').value=='########') var refadi=''; else var refadi=$('cpsoladidis_refadi').value;
    if ($('id').value!='') var nuevo='N'; else var nuevo='S';
    var codigopre=$(codpre).value;
    
    var montomov=toFloat(monmov);
    $('cpsoladidis_actualfila').value=fil;

    new Ajax.Updater('divgrid_per', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirPeriodosenGrid(); $("divgrid_per").show();}, parameters:'ajax=6&codigopre='+codigopre+'&refadi='+refadi+'&montomov='+montomov+'&nuevo='+nuevo})
  }
  else
  {
    alert_("Debe introducir el C&oacute;digo Presupuestario y el Monto debe ser mayor a cero..");
  }
}

function salvarmontoperiodos()
{
  var cadena='';
  var fil=0;
  while (fil<12)
  {
    var mes="cx"+"_"+fil+"_1";
    var monto="cx"+"_"+fil+"_2";
    if ($(mes))
    {
      if ($(mes).value!="" && toFloat(monto)>0)
      {
        var cadena=cadena + $(mes).value+'_' + $(monto).value + '!';
      }
    }
    fil++;
  }
  var mifila=$('cpsoladidis_actualfila').value;
  var infperiodos="ax"+"_"+mifila+"_10";
  $(infperiodos).value=cadena;  
  $('divgrid_per').hide();  
}


function distribuirPeriodosenGrid()
{
  var j=$('cpsoladidis_actualfila').value;
  var haydist="ax"+"_"+j+"_10";
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

      var mes="cx"+"_"+z+"_1";
      var monto="cx"+"_"+z+"_2";
      var montoori="cx"+"_"+z+"_3";
     
      $(mes).value=cmes;
      $(monto).value=cmonto;
      $(montoori).value=$(mondist).value;
     
      z++;
    }
  }else {
    var z=0;
    var montoori="cx"+"_"+z+"_3";
    $(montoori).value=$(mondist).value;
  }
}