function anular() {

	if (confirm("Realmente desea Anular este Compromiso?")) {
		var refcom=$('cpcompro_refcom').value;
	    var feccom=$('cpcompro_feccom').value;
    	var salcau=$('cpcompro_salcau').value;

    	new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&refcom='+refcom+'&feccom='+feccom+'&salcau='+salcau})
	}
}

function abrirAnular(refcom,feccom) {
	window.open(getUrlModulo()+'anular?refcom='+refcom+'&feccom='+feccom,'...','menubar=no,toolbar=no,scrollbars=yes,width=750,height=250,resizable=yes,left=400,top=120');
}

function rellenar() {
  if ($('cpcompro_refcom').value=='') {
    $('cpcompro_refcom').value='########';
  }else {
    $('cpcompro_refcom').value=$('cpcompro_refcom').value.pad(8,'0',0);
  }
}

function calcularTotales()
{
  var total=0;
  var i=0;
  var am=obtener_filas_grid('a',1);
  while (i<am)
  {
      var moncuo="ax_"+i+"_2";
      var num=toFloat(moncuo);
     if (num!=0)
       total=total + num;
    i++;
  }

  $('cpcompro_moncom').value=format(total.toFixed(2),'.',',','.');
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
     var totpre1="ax_"+fil+"_2";
     $(totpre).value=$(totpre1).value
   }else {
    var codipre="bx_"+fila+"_1";
    alert('El código presupuestario no se encuentra en las Imputaciones Presupuestarias');
    $(codipre).value="";
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