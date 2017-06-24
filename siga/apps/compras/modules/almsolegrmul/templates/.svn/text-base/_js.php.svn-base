<script language="JavaScript" type="text/javascript">
$('divgrid3').hide();
$('divgrid2').hide();

 function enter(valor)
 {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('casolart_reqart').value=valor; 
 }

function mostrargriddetsol(id)
{
	var aux = id.split("_");
	var name=aux[0];
	var fil=parseInt(aux[1]);
	var col=parseInt(aux[2]);

    var numreq=name+"_"+fil+"_1";
    var datart=name+"_"+fil+"_5";

	var numreq=$(numreq).value;
	var datart=$(datart).value;
	$('casolart_actualfila').value=fil;

	new Ajax.Updater('divgrid2', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json); distribuirArtenGrid();}, parameters:'ajax=4&numreq='+numreq+'&datart='+datart})
}

function distribuirArtenGrid()
{
  var j=$('casolart_actualfila').value;
  var haydist="ax"+"_"+j+"_5";
  if ($(haydist).value!="")
  {
    var distrib=$(haydist).value;
    var aux2=distrib.split("!");

    var z=0;
    while (z<((aux2.length)-1))
    {
      var reg=aux2[z];
      var aux3=reg.split("_");
      var ccodart=aux3[1];
      var ccodcat=aux3[2];
      var t=0;
      var am=$('casolart_filtotdet').value;
      while (t<am){
         var codart="bx"+"_"+t+"_1";
         var codcat="bx"+"_"+t+"_3";
         var check="bx"+"_"+t+"_10";

         if ($(codart).value==ccodart && $(codcat).value==ccodcat){
            $(check).checked=true;
            break;
         }
      	t++;
      }

      z++;
    }
  }
}

function salvararticulos()
{
  var cadena='';
  var fil=0;
  var am=obtener_filas_grid('b',1);
  while (fil<am)
  {
    var codart="bx"+"_"+fil+"_1";
    var check="bx"+"_"+fil+"_10";
    if ($(check))
    {
      if ($(check).checked==true)
      {
        var codart="bx"+"_"+fil+"_1";
        var codcat="bx"+"_"+fil+"_3";
        var numreq="bx"+"_"+fil+"_11";
        var cadena=cadena + $(numreq).value+'_' + $(codart).value+'_' + $(codcat).value + '!';
      }
    }
    fil++;
  }

  var mifila=$('casolart_actualfila').value;
  var infarticulos="ax"+"_"+mifila+"_5";
  $(infarticulos).value=cadena;
  $('divgrid2').hide();
}

function  generarDetalleSol(){
  
}


</script>