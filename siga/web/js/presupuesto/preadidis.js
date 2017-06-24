  function anular(){
	  if (confirm("Realmente desea Anular este Crédito Adición / Disminución?")) {
	    var referencia=$('cpadidis_refadi').value;
	    var fecadi = $('cpadidis_fecadi').value;


    	new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&referencia='+referencia+'&fecadi='+fecadi})
	   }
  }

  function abreAnular(referencia,fecadi) {
	window.open(getUrlModulo()+'anular?referencia='+referencia+'&fecadi='+fecadi,'...','menubar=no,toolbar=no,scrollbars=yes,width=680,height=550,resizable=yes,left=400,top=120');
  }

function calculatotal()
{
    var fil=0;
     var bm=obtener_filas_grid('b',1);
     var totalmd=0;
     while (fil<bm)
     {
          var numero="bx"+"_"+fil+"_1";
           var monto="bx"+"_"+fil+"_4";
          if ($(numero).value!=""){
              totalmd=totalmd+toFloat(monto);
          }
          fil++;
     }
    $('cpadidis_totadi').value = number_format(totalmd, 2, ',', '.');
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
    if ($('cpadidis_refadi').value=='########') var refadi=''; else var refadi=$('cpadidis_refadi').value;
    if ($('id').value!='') var nuevo='N'; else var nuevo='S';
    var codigopre=$(codpre).value;
    
    var montomov=toFloat(monmov);
    $('cpadidis_actualfila').value=fil;

    new Ajax.Updater('divgrid_per', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirPeriodosenGrid(); $("divgrid_per").show();}, parameters:'ajax=4&codigopre='+codigopre+'&refadi='+refadi+'&montomov='+montomov+'&nuevo='+nuevo})
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
  var mifila=$('cpadidis_actualfila').value;
  var infperiodos="bx"+"_"+mifila+"_8";
  $(infperiodos).value=cadena;  
  $('divgrid_per').hide();  
}


function distribuirPeriodosenGrid()
{
  var j=$('cpadidis_actualfila').value;
  var haydist="bx"+"_"+j+"_8";
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

