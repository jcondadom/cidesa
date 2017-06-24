  function anular(){
	  if (confirm("Realmente desea Anular este PreCompromiso?")) {
	    var referencia=$('cpprecom_refprc').value;
	    var fecprc=$('cpprecom_fecprc').value;
	    var salcom=$('cpprecom_salcom').value;

    	new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&referencia='+referencia+'&fecprc='+fecprc+'&salcom='+salcom})
	   }
  }

  function abreAnular(referencia,fecprc) {
	window.open(getUrlModulo()+'anular?referencia='+referencia+'&fecprc='+fecprc,'...','menubar=no,toolbar=no,scrollbars=yes,width=680,height=550,resizable=yes,left=400,top=120');
  }

function rellenar() {
  if ($('cpprecom_refprc').value=='') {
    $('cpprecom_refprc').value='########';
  }else {
    $('cpprecom_refprc').value=$('cpprecom_refprc').value.pad(8,'0',0);
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