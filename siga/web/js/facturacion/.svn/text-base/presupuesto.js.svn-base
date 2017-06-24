 function Cantidad(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcant=col;
   var colprecio=col+1;
   var colrgo=col+2;
   var coldescto=col+3;
   var coltotal=col+4;
   //var colporcrgo=col+6;
   var colart=col-2;

   var cantto=name+"_"+fil+"_"+colcant;
   var precio=name+"_"+fil+"_"+colprecio;
   var recargo=name+"_"+fil+"_"+colrgo;
   var descto=name+"_"+fil+"_"+coldescto;
   var total=name+"_"+fil+"_"+coltotal;
   //var porcrgo=name+"_"+fil+"_"+colporcrgo;
   var arti=name+"_"+fil+"_"+colart;

   if ($('fapresup_manapu').value=='S'){
       var num1=toFloat(precio);
   }else {
     var index=$(precio).selectedIndex;
     //Obtener el valor del precio
     var num1=toFloat2($(precio).options[index].text);
   }

   var num2=toFloat(id);

   //Obtener el valor del descuento
   var num4=toFloat(descto);
   //Obtener el valor del porcentaje de recargo
   //var num5=toFloat(porcrgo);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
    $(recargo).value="0,00";
    $(descto).value="0,00";
    $(total).value="0,00";
   }
   else if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   else
   {
    $(cantto).value=format(num2.toFixed(2),'.',',','.');
    $(descto).value=format(num4.toFixed(2),'.',',','.');
    if ((validarnumero(precio))&&(num1 > 0))
    {

     //$(recargo).value = (num2*num1)*(num5/100);
     //Obtener el valor del recargo
     recalcularecargos(id);
     var num3=toFloat(recargo);
     $(recargo).value=format(num3.toFixed(2),'.',',','.');
     var costototal=((parseFloat(num2)*parseFloat(num1))+parseFloat(num3))-parseFloat(num4);
     if (costototal < 0)
     	costototal = 0;
     $(total).value=format(costototal.toFixed(2),'.',',','.');     
     monto_recargo()
     monto_descto();
     monto_total();
     /*if ($('fapresup_tippre').value=='C'){
       colocarContrato($(id).value,fil,col);
     }*/
    }
   }
  }

 function Descuento(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcant=col-3;
   var colprecio=col-2;
   var colrgo=col-1;
   var coldescto=col;
   var coltotal=col+1;
   //var colporcrgo=col+3;


   var cantto=name+"_"+fil+"_"+colcant;
   var precio=name+"_"+fil+"_"+colprecio;
   var recargo=name+"_"+fil+"_"+colrgo;
   var descto=name+"_"+fil+"_"+coldescto;
   var total=name+"_"+fil+"_"+coltotal;
   //var porcrgo=name+"_"+fil+"_"+colporcrgo;

   if ($('fapresup_manapu').value=='S'){
     var num1=toFloat(precio);
   }else {
   var index=$(precio).selectedIndex;
   //Obtener el valor del precio
   var num1=toFloat2($(precio).options[index].text);
   } 

   //Obtener el valor de la cantidad
   var num2=toFloat(cantto);

   //Obtener el valor del descuento
   var num4=toFloat(id);
   //Obtener el valor del porcentaje de recargo
   //var num5=toFloat(porcrgo);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
   }
   else if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   else
   {
    $(cantto).value=format(num2.toFixed(2),'.',',','.');
    $(descto).value=format(num4.toFixed(2),'.',',','.');
    if ((validarnumero(precio))&&(num1 > 0))
    {
     //$(recargo).value = (num2*num1)*(num5/100);
     //Obtener el valor del recargo
     var num3=toFloat(recargo);
     $(recargo).value=format(num3.toFixed(2),'.',',','.');

     var costototal=((parseFloat(num2)*parseFloat(num1))+parseFloat(num3))-parseFloat(num4);
     if (costototal < 0)
     	costototal = 0;
     $(total).value=format(costototal.toFixed(2),'.',',','.');
     monto_recargo()
     monto_descto();
     monto_total();
    }
   }
  }

  function monto_total()
  {
    var acum=0;
    var fil=totalregistros('ax',1,30);
    var i=0;
    while (i<fil)
    {
     var id1="ax"+"_"+i+"_7";
     if ($(id1).value!="" && validarnumero(id1))
     {
       tot=toFloat(id1);
       acum=acum + tot;
     }
     i++;
    }
    $('fapresup_monpre').value=format(acum.toFixed(2),'.',',','.');
  }

  function monto_descto()
  {
    var acum=0;
    var fil=totalregistros('ax',1,30);
    var i=0;
    while (i<fil)
    {
     var id1="ax"+"_"+i+"_6";
     if ($(id1).value!="" && validarnumero(id1))
     {
       tot=toFloat(id1);
       acum=acum + tot;
     }
     i++;
    }
    $('fapresup_mondesc').value=format(acum.toFixed(2),'.',',','.');
  }

  function monto_recargo()
  {
    var acum=0;
    var fil=totalregistros('ax',1,30);
    var i=0;
    while (i<fil)
    {
     var id1="ax"+"_"+i+"_5";
     if ($(id1).value!="" && validarnumero(id1))
     {
       tot=toFloat(id1);
       acum=acum + tot;
     }
     i++;
    }
    $('fapresup_monrgo').value=format(acum.toFixed(2),'.',',','.');
  }

 function Precio(id)
 {

   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcant=col-1;
   var coltotal=col+3;
   var coldescto=col+2;
   var colrgo=col+1;
   var colporcrgo=col+5;
   var colpresel=col+6;

   var cant=name+"_"+fil+"_"+colcant;
   var total=name+"_"+fil+"_"+coltotal;
   var descto=name+"_"+fil+"_"+coldescto;
   var recargo=name+"_"+fil+"_"+colrgo;
   //var porcrgo=name+"_"+fil+"_"+colporcrgo;
   var presel=name+"_"+fil+"_"+colpresel;

   if ($('fapresup_manapu').value=='S'){
     var num1=toFloat(id);
     $(id).value=format(num1.toFixed(2),'.',',','.');
   }else {
     var index=$(id).selectedIndex;
     //Obtener el valor del precio
     var num1=toFloat2($(id).options[index].text);
   }

   //Obtener el valor de la cantidad
   var num2=toFloat(cant);
   //Obtener el valor del descuento
   var num4=toFloat(descto);
   //Obtener el valor del porcentaje de recargo
   //var num5=toFloat(porcrgo);

   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
   }
   else if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
   }
   else
   {
    if (validarnumero(id))
    {
     //$(presel).value = num1;
     //$(recargo).value = (num2*num1)*(num5/100);
     //Obtener el valor del recargo
     recalcularecargos(id);
     var num3=toFloat(recargo);
     $(recargo).value=format(num3.toFixed(2),'.',',','.');

     var costototal=((parseFloat(num2)*parseFloat(num1))+parseFloat(num3))-parseFloat(num4);
     if (costototal < 0)
     	costototal = 0;
     $(total).value=format(costototal.toFixed(2),'.',',','.');     
     monto_recargo()
     monto_descto();
     monto_total();
    }
   }
  }


 function ajaxarticulos(e,id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var colpre=col+3;
    var colporcrgo=col+10;
    var coluni=col+15;
    var descripcion=name+"_"+fil+"_"+coldes;
    var precio=name+"_"+fil+"_"+colpre;
    var porcrecargo=name+"_"+fil+"_"+colporcrgo;
    var unidad=name+"_"+fil+"_"+coluni;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
        new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos='+descripcion+'&fil='+fil+'&col='+col+'&tippre='+$('fapresup_tippre').value+'&cajtexcom='+id+'&codigo='+cod})
        new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&cajtexmos='+porcrecargo+'&cajtexcom='+id+'&codigo='+cod})
        if ($('fapresup_manapu').value!='S')
          new Ajax.Updater(precio, getUrlModulo()+'ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&id='+$('id').value+'&codigo='+cod});

        if ($('fapresup_manunialt').value=='S')
        {
            new Ajax.Updater(unidad, getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&id='+$('id').value+'&idcos='+precio+'&codigo='+cod});

        }
      }
    }
 }

 function BuscarCosuni(id){
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colart=col-15;
    var colpre=col-12;
   
    var idart=name+"_"+fil+"_"+colart;
    var precio=name+"_"+fil+"_"+colpre;
    var cod=$(id).value;
    var articulo=$(idart).value;

    if ($(id).value!="")
    {
      if ($('fapresup_manunialt').value=='S')
      {
          new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=21&idcos='+precio+'&codart='+articulo+'&codigo='+cod})
      }     
    }
 }

 function cargaprecio()
 {
    var colart = '';
    var colpre = '';
    //var colpresel = '';
    var colrgo = '';
    var cod = '';
    var precio = '';
    var nrofilas = 0;
    if (($('nrofilas').value != '')&&($('nrofilas').value != 'NaN'))
    	nrofilas = parseInt($('nrofilas').value);
    for (fil=0 ;fil<= nrofilas;fil++){
		colart = "ax_"+fil+"_1";
		colpre = "ax_"+fil+"_4";
		//colpresel = "ax_"+fil+"_10";
		colrgo = "ax_"+fil+"_9";
		if ($(colart).value != ''){
			cod = $(colart).value;
			//precio = $(colpresel).value;
	        new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&cajtexmos='+colrgo+'&codigo='+cod})
	        new Ajax.Updater(colpre, getUrlModulo()+'ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&id='+precio+'&codigo='+cod});
		}
    }
  }

 function marcarrecarg(id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    if ($(id).checked==false)
    {
        desmarcarfilaMod(id);
    }else {
        aplicarRecanterior(id)
    }
     monto_recargo()
     monto_descto();
     monto_total();
 }  

  function desmarcarfilaMod(id)
  {
      var aux = id.split("_");
      var name=aux[0];
      var fil=parseInt(aux[1]);      
      var codart="ax"+"_"+fil+"_1";
      if ($(codart).value!="")
      {
       var precio="ax_"+fil+"_4";
       var cant="ax"+"_"+fil+"_3";
       var dest="ax"+"_"+fil+"_6";
       var recargo="ax"+"_"+fil+"_5";
       var total="ax"+"_"+fil+"_7";
       var haydistribucion="ax"+"_"+fil+"_12";

       if ($('fapresup_manapu').value=='S'){
         var moncos=toFloat(precio);
       }else {
          var index=$(precio).selectedIndex;
          //Obtener el valor del precio
          var moncos=toFloat2($(precio).options[index].text);
       }

       var moncant=toFloat(cant);
       var mondto=toFloat(dest);
       var monuni=moncos*moncant;

       var monrgotot=0;
       var cadena="";

        $(haydistribucion).value=cadena;
        $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
        montottot=monuni-mondto;
        $(total).value=format(montottot.toFixed(2),'.',',','.');
        monto_recargo();
        monto_descto();
        monto_total();
      }//if ($(codart).value!="")
  }

  function aplicarRecanterior(ida)
  {
     var aux = ida.split("_");
     var name=aux[0];
     var fil=parseInt(aux[1]);

     var infrecargos="ax"+"_0_12";
     var distrib=$(infrecargos).value;
     var articulo="ax"+"_0_1";
     var valorarticulo=$(articulo).value;
     if (valorarticulo!="" && fil!=0)
     {
       if (distrib!="")
       {
        if (fil!=0)
        {
        var codart="ax"+"_"+fil+"_1";
        var total="ax"+"_"+fil+"_7";
        var ntotal=toFloat(total);

        if ($(codart).value!="" && ntotal>0)
        {
          var id="ax"+"_"+fil+"_1";
          var precio="ax_"+fil+"_4";
          if ($('fapresup_manapu').value=='S'){
             var moncos=toFloat(precio);
          }else {
            var index=$(precio).selectedIndex;
            //Obtener el valor del precio
            var moncos=toFloat2($(precio).options[index].text);
          }

         var cant="ax"+"_"+fil+"_3";
         var dest="ax"+"_"+fil+"_6";
         var recargo="ax"+"_"+fil+"_5";
         var haydistribucion="ax"+"_"+fil+"_12";

         var moncant=toFloat(cant);
         var mondto=toFloat(dest);
         var monuni=moncos*moncant;

         var monrgotot=0;
         var cadena="";

       var z=0;
       var aux2=distrib.split("!");
       while (z<((aux2.length)-1))
       {
         var reg=aux2[z];
         var aux3=reg.split("_");
         var ccodrgo=aux3[0];
         var cnomrgo=aux3[1];
         var crecfij=aux3[2];
         var cmonrgo=toFloat2(aux3[3]);
         var ccodcta=aux3[4];
         var ctipo=aux3[5];
         var cmonrgo2=toFloat2(aux3[6]);

        if (ctipo=='M')
        {
          cmonrgo=cmonrgo2;
        }
        else if (ctipo=='P')
        {
         cmonrgo= ((monuni*cmonrgo2)/100);
        }
        else
        {cmonrgo=0;}

         cmonrgofor=format(cmonrgo.toFixed(2),'.',',','.');
         cmonrgo2=format(cmonrgo2.toFixed(2),'.',',','.');
         cadena=cadena + ccodrgo+'_' + cnomrgo+'_' + crecfij +'_'+ cmonrgofor +'_'+ ccodcta +'_'+ ctipo+'_' + cmonrgo2 + '!';
         monrgotot=monrgotot+cmonrgo;
        z++;
        }//while

      $(haydistribucion).value=cadena;
      $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
      montottot=monuni-mondto+monrgotot;
      $(total).value=format(montottot.toFixed(2),'.',',','.');
      $(id).checked=true;
      }//if ($(codart).value!="" && ntotal>0)
      else
      {
       alert_('Debe seleccionar un art&iacute;culo y el Monto Total debe ser mayor a cero');
      }
      }
      monto_recargo();
      monto_descto();
      monto_total();
   }// if (distrib!="")
   else
   {
    alert_("No han sido aplicados Recargos al primer Art&iacute;culo del Detalle, C&oacute;digo: "+ valorarticulo+". Deben ser definidos estos Recargos para poder replicarlos al resto de los Art&iacute;culo del Presupuesto ")
   }
  }
  }

 function mostrargridrecargos(id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codart=name+"_"+fil+"_1";
    var chk="ax"+"_"+fil+"_8";
    if ($(chk).checked==true)
    {
     if ($(codart).value!="")
     {
        if ($('fapresup_refpre').value=='########') var refpre=''; else var refpre=$('fapresup_refpre').value;
        var articulo=$(codart).value;
        $('fapresup_filactrec').value=fil;

        new Ajax.Updater('divgrid_fargopre', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirRecargosenGrid();$("datosRecarg").show();}, parameters:'ajax=6&articulo='+articulo+'&refpre='+refpre})
    }
    else
    {
      alert_("Debe introducir el Art&iacute;culo antes de los cargar los Recargos..");
    }
   }
   else
   {
     alert("Debe marcar la primera casilla (Marque) antes de cargar los Recargos..");
   }
  }

  function distribuirRecargosenGrid()
 {
     var j=$('fapresup_filactrec').value;
     var haydist="ax"+"_"+j+"_12";
     if ($(haydist).value!="")
      {
        var distrib=$(haydist).value;
        var aux2=distrib.split("!");

        var z=0;
        while (z<((aux2.length)-1))
        {
         var reg=aux2[z];
         var aux3=reg.split("_");
         var ccodrgo=aux3[0];
         var cnomrgo=aux3[1];
         var crecfij=aux3[2];
         var cmonrgo=aux3[3];
         var ccodcta=aux3[4];
         var ctipo=aux3[5];
         var cmonrgo2=aux3[6];

         var codrgo="cx"+"_"+z+"_1";
         var nomrgo="cx"+"_"+z+"_2";
         var recfij="cx"+"_"+z+"_3";
         var monrgo="cx"+"_"+z+"_4";
         var codcta="cx"+"_"+z+"_5";
         var tipo="cx"+"_"+z+"_6";
         var monrgo2="cx"+"_"+z+"_7";

         if (!$(codrgo))
           NuevaFilaGrid('c');

         $(codrgo).value=ccodrgo;
         $(nomrgo).value=cnomrgo;
         $(recfij).value=crecfij;
         $(monrgo).value=cmonrgo;
         $(codcta).value=ccodcta;
         $(tipo).value=ctipo;
         $(monrgo2).value=cmonrgo2;
         //si el tipo de recargo es puntual "M" y el valor es cero (0), entonces se debe habilitar la cajita de texto del monto para que el usuario
         //pueda modificar el monto del recargo
         var monto_monrgo=toFloat2(aux3[6]);
         if (ctipo=="M" && monto_monrgo==0)
         {
            $(monrgo).readOnly=false;
         }
         z++;
        }
        calcularTotalRecargos();
      }
 }
 
function salvarmontorecargos()
{
  var cadena='';
  var fil=0;
  var ab=totalregistros2('cx',1,10);
  while (fil<ab)
  {
      var codrgo="cx"+"_"+fil+"_1";
      if ($(codrgo)) {
      if ($(codrgo).value!="")
      {
        var nomrgo="cx"+"_"+fil+"_2";
        var recfij="cx"+"_"+fil+"_3";
        var monrgo="cx"+"_"+fil+"_4";
        var codcta="cx"+"_"+fil+"_5";
        var tipo="cx"+"_"+fil+"_6";
        var monrgo2="cx"+"_"+fil+"_7";
        cadena=cadena + $(codrgo).value+'_' + $(nomrgo).value+'_' + $(recfij).value +'_'+ $(monrgo).value+'_' + $(codcta).value+'_' + $(tipo).value+'_' + $(monrgo2).value + '!';
      }   
      }   
      fil++;
  }

  var moncos=0;
  var mifila=$('fapresup_filactrec').value;
  var infrecargos="ax"+"_"+mifila+"_12";
  var cant="ax"+"_"+mifila+"_3";
  var precio="ax_"+mifila+"_4";
  if ($('id').value=="") {
     if ($('fapresup_manapu').value=='S'){
       var moncos=toFloat(precio);
     }else {
        var index=$(precio).selectedIndex;
        //Obtener el valor del precio
        var moncos=toFloat2($(precio).options[index].text);
     }
 }else {
  var moncos=toFloat(precio);
 }
  var descto="ax"+"_"+mifila+"_6";
  var recargo="ax"+"_"+mifila+"_5";
  var total="ax"+"_"+mifila+"_7";

  $(infrecargos).value=cadena;
  $(recargo).value=$('fapresup_totrec').value;

  var recfil=toFloat('fapresup_totrec');
  var canti=toFloat(cant);
  var mondto=toFloat(descto);
  var monnet= canti*moncos;

  montottot=monnet-mondto+recfil;
  $(total).value=format(montottot.toFixed(2),'.',',','.');

  $('datosRecarg').hide();
  monto_recargo();
  monto_descto();
  monto_total();
}

function CalculoMontoRgo(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var colrgo=col-3;
   var coltipo=col+2;
   var colnom=col-2;
   var colrefij=col-1;
   var colcta=col+1;
   var colmonto2=col+3;

   var codrgo=name+"_"+fil+"_"+colrgo;
   var nombre=name+"_"+fil+"_"+colnom;
   var recfij=name+"_"+fil+"_"+colrefij;
   var cta=name+"_"+fil+"_"+colcta;
   var tipo=name+"_"+fil+"_"+coltipo;
   var monto2=name+"_"+fil+"_"+colmonto2;

   var nmonto= toFloat(id);
   var nmonpre= toFloat('fapresup_monpre');

   if ($(id).value!="")
   {
      if (!ValidarNumeroV2VE(id))
      {
        alert_('El Dato debe ser N&uacute;merico');
        $(id).value="0,00";
      }
      else if (nmonto<0)
      {
        alert('El Valor debe ser mayor que Cero');
        $(id).value="0,00";
      }
      else
      {
        $(id).value=$(id).value;
      }
   }
   calcularTotalRecargos();

   if ($(codrgo).value!="")
   {
     if ($(tipo).value=='P')
     {
       if (nmonto>nmonpre)
       {
         alert('El Recargo no puede ser aplicado debido a que sobrepasa el Monto Total del Presupuesto');
         $(codrgo).value="";
         $(nombre).value="";
         $(recfij).value="";
         $(id).value="0,00";
         $(cta).value="";
         $(tipo).value="";
         $(monto2).value="0,00";
       }
       else
       {
         $(id).value=$(id).value;
         calcularTotalRecargos();
         monto_recargo();
         monto_descto();
         monto_total();
       }
     }
   }
 }

  function calcularTotalRecargos()
  {
    var mitot=0;
    var regrgo=totalregistros2('cx',1,10);
    var j=0;
    while (j<regrgo)
    {
       var monrgo="cx_"+j+"_4";
       if ($(monrgo)){
       var nmonto=toFloat(monrgo);
       if ($(monrgo).value!="")
       {
         mitot= mitot + nmonto;
       }
       }
     j++;
    }
    $('fapresup_totrec').value=format(mitot.toFixed(2),'.',',','.');

  }

function ajaxrecargos(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

    var colnom=col+1;
    var colrefij=col+2;
    var colmonto=col+3;
    var colcta=col+4;
    var coltipo=col+5;
    var colmonto2=col+6;

    var nombre=name+"_"+fil+"_"+colnom;
    var recfij=name+"_"+fil+"_"+colrefij;
    var monto=name+"_"+fil+"_"+colmonto;
    var cta=name+"_"+fil+"_"+colcta;
    var tipo=name+"_"+fil+"_"+coltipo;
    var monto2=name+"_"+fil+"_"+colmonto2;
    var cod=$(id).value;
    var montot=retornaMontoMod(cod);
    var montot1=retornaMontoMod(cod);   
    var valmonto=$(monto).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
        if (!recargo_repetido(id))
        {
         new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=8&cajtexmos='+nombre+'&cajtexcom='+id+'&recfij='+recfij+'&monto='+monto+'&cta='+cta+'&tipo='+tipo+'&monto2='+monto2+'&montot='+montot+'&montot1='+montot1+'&valmonto='+valmonto+'&codigo='+cod})
        }
        else
        {
         alert('El Recargo ya fue asignado');
         $(id).value="";
        }
      }
    }
 }  

  function calcularMontTotMod()
  {
    var calcularmonto=0;
    var mifila=$('fapresup_filactrec').value;        
    var cant="ax"+"_"+mifila+"_3";
    var precio="ax_"+mifila+"_4";
    if ($('fapresup_manapu').value=='S'){
       var nprecio=toFloat(precio);
    }else {
      var index=$(precio).selectedIndex;
          //Obtener el valor del precio
      var nprecio=toFloat2($(precio).options[index].text);
    }

       var ncant= toFloat(cant);

       if ($(precio).value!=""  && $(cant).value!="")
       {
         calcularmonto= calcularmonto + ( nprecio * ncant);
       }

    return calcularmonto;
  }  

function retornaMontoMod(codrgo)
 {
    var monTot=calcularMontTotMod();
    if (monTot!=0)
    {
        var mifila=$('fapresup_filactrec').value;        
        var cant="ax"+"_"+mifila+"_3";
        var precio="ax_"+mifila+"_4";
        var codart="ax"+"_"+mifila+"_1";

        if ($(codart)){
          if ($('fapresup_manapu').value=='S'){
             var nprecio2=toFloat(precio);
          }else {
             var index=$(precio).selectedIndex;
            //Obtener el valor del precio
            var nprecio2=toFloat2($(precio).options[index].text);
          }
        var ncant2= toFloat(cant);

        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&articulo='+codart+'&recargo='+codrgo})
        if ($('fapresup_trajo').value=='S')
        {
         if ($(cant).value!="" && $(precio).value!="")
         {
           monTot= monTot - (nprecio2 * ncant2);
         }
       }
       }
   }
    return monTot;
 } 

function recargo_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var recargo=$(id).value;

   var recargorepetido=false;
   var am=totalregistros2('cx',1,10);
   var i=0;
   while (i<am)
   {
    var codigo="cx"+"_"+i+"_1";
   if ($(codigo))
   {
    var recargo2=$(codigo).value;

    if (i!=fila)
    {
      if (recargo==recargo2)
      {
        recargorepetido=true;
        break;
      }
    }
    }
   i++;
   }
   return recargorepetido;
 }

function colocarContrato(valor,fil,col)
{
  if (!BuscarCodart2(valor,col,fil))
  {
    BuscarCodart3();
    if (col==3)
      col=col+3;
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

function BuscarCodart(valor,fila)
{
   var colart=obtener_filas_grid('a',1);
   var fil=0;
   var enc=false;
   while (fil<colart)
   {
     var codart="ax_"+fil+"_1";
     if ($(codart).value==valor) {
      enc=true;
      break;
    }
     fil++;
   }
   if (enc)
   {
     var totart="bx_"+fila+"_6";
     var totart1="ax_"+fil+"_3";
     $(totart).value=$(totart1).value
   }else {
    var codiart="bx_"+fila+"_1";
    alert_('El C&oacute;digo del Art&iacute;culo no se encuentra en Detalle del Presupuesto');
    $(codiart).value="";
   }
}

function BuscarCodart2(valor,col,fila)
{
   var colart=obtener_filas_grid('b',1);
   var fil=0;   
   if (col==3) {
     var codartq="ax_"+fila+"_1";
     valor2=$(codartq).value;
   }
   var enc=false;
   while (fil<colart)
   {
     if (col==1) {
     var codart="bx_"+fil+"_"+col;
     if ($(codart).value==valor) {
      enc=true;
      break;
     }
   }else {
    var codart="bx_"+fil+"_1";
    var canart="bx_"+fil+"_6";
     if ($(codart).value==valor2 && $(canart).value==valor) {
      enc=true;
      break;
     }else if ($(codart).value==valor2 && ($(canart).value!=valor && $(canart).value!='' && $(canart).value!='0,00')) {
      enc=true;
      var totart="ax_"+fila+"_4";
      var canart="bx_"+fil+"_6";
      $(canart).value=$(totart).value
      break;
     }
   }
     fil++;
   }   
   return enc;
}

function BuscarCodart3()
{
   var colart=obtener_filas_grid('b',1);
   var fil=0;
   var enc=false;
   while (fil<colart)
   {
     var codart="bx_"+fil+"_1";
     if (!BuscarEstaGrida($(codart).value))      
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
     var codart="ax_"+fil+"_1";
     if ($(codart).value==valor) {
      enc=true;
      break;
    }
     fil++;
   }

   return enc;   
} 

function ValidarRepetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var colart="1";
   var colper="2";
var colper2="7";   

   var art=name+"_"+fila+"_"+colart;
   var per=name+"_"+fila+"_"+colper;
   var id2=name+"_"+fila+"_"+colper2;

   var articulo_periodo=$(art).value+$(per).value;

   var articulorepetido=false;
   var am=obtener_filas_grid('b',1);
   var i=0;
   while (i<am)
   {
    var codigo="bx"+"_"+i+"_1"
    var periodo="bx"+"_"+i+"_2";

    var articulo_periodo2=$(codigo).value+$(periodo).value;
    if (i!=fila)
    {
      if (articulo_periodo==articulo_periodo2)
      {
        articulorepetido=true;
        break;
      }
    }
   i++;
   }
   
   if (articulorepetido)
   {
     alert_('El Per&iacute;odo ya esta repetido con ese mismo Art&iacute;culo');
     $(id).value='';
   }else {
       $(id2).value= $(id).value;
   }
 }

 function mostrargridcontratos(id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codart=name+"_"+fil+"_1";
    var cansol=name+"_"+fil+"_3";
    var datcon=name+"_"+fil+"_14";
    var tipcon1=name+"_"+fil+"_15";
    if ($(codart).value!="")
    {
        if ($('fapresup_refpre').value=='########') var refpre=''; else var refpre=$('fapresup_refpre').value;
        var articulo=$(codart).value;
        var canti=$(cansol).value;
        $('fapresup_filactcon').value=fil;
        var fecini=$('fapresup_feciniper').value;
        var periodo=$('fapresup_percon').value;
        if ($(datcon).value!='')
        var discon='S';
        else var discon='';

        new Ajax.Updater('divgridcon', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirConstratosenGrid(); $("divcontratos").show();}, parameters:'ajax=10&articulo='+articulo+'&refpre='+refpre+'&percon='+periodo+'&fecini='+fecini+'&cansol='+canti+'&tipconfil='+$(tipcon1).value+'&discon='+discon})
    }
    else
    {
      alert_("Debe introducir el Art&iacute;culo antes de realizar la Distribución..");
    }
  }

 function distribuirConstratosenGrid()
 {
     var j=$('fapresup_filactcon').value;
     var haydist="ax"+"_"+j+"_14";
     var cansoli="ax"+"_"+j+"_3";
     var tconf="ax"+"_"+j+"_15";
     if ($(haydist).value!="" && $(tconf).value==$('fapresup_percon').value)
      {
        var distrib=$(haydist).value;
        var aux2=distrib.split("!");

        var z=0;
        while (z<((aux2.length)-1))
        {
         var reg=aux2[z];
         var aux3=reg.split("_");
         var cfecini=aux3[0];
         var cfecfin=aux3[1];
         var ccancon=aux3[2];
         var ccansol=$(cansoli).value;

         var fecini="bx"+"_"+z+"_1";
         var fecfin="bx"+"_"+z+"_2";
         var cancon="bx"+"_"+z+"_3";
         var cansol="bx"+"_"+z+"_4";

         $(fecini).value=cfecini;
         $(fecfin).value=cfecfin;
         $(cancon).value=ccancon;
         $(cansol).value=ccansol;
         z++;
        }
      }
 }
 
function salvarmontocontratos()
{
  var cadena='';
  var fil=0;
  //var ab=totalregistros2('bx',1,10);
  var ab=obtener_filas_grid('b',1);
  while (fil<ab)
  {
      var fecini="bx"+"_"+fil+"_1";
      if ($(fecini)) {
        if ($(fecini).value!="")
        {
          var fecfin="bx"+"_"+fil+"_2";
          var cancon="bx"+"_"+fil+"_3";
          var cansol="bx"+"_"+fil+"_4";
          cadena=cadena + $(fecini).value+'_' + $(fecfin).value+'_' + $(cancon).value +'_'+ $(cansol).value + '!';
        }      
      }
      fil++;
  }
  var mifila=$('fapresup_filactcon').value;
  var infrecargos="ax"+"_"+mifila+"_14";
  var tipcon1="ax"+"_"+mifila+"_15";
  if ($(tipcon1).value=='' || $(tipcon1).value!=$('fapresup_percon').value)
    $(tipcon1).value=$('fapresup_percon').value;
  $(infrecargos).value=cadena;
  $('divcontratos').hide();
} 

  function recalcularecargos(id)
  {
    var i=id.split('_');
    var fil=i[1];
    var id1="ax"+"_"+fil+"_8";
    var precio="ax_"+fil+"_4";
    var cant="ax"+"_"+fil+"_3";
    var dest="ax"+"_"+fil+"_6";
    var recargo="ax"+"_"+fil+"_5";
    var total="ax"+"_"+fil+"_7";
    var infrecargos="ax"+"_"+fil+"_12";

    if ($('fapresup_manapu').value=='S'){
       var moncos=toFloat(precio);
    }else {
      var index=$(precio).selectedIndex;
      //Obtener el valor del precio
      var moncos=toFloat2($(precio).options[index].text);
    }

        var moncant=toFloat(cant);
        var mondto=toFloat(dest);
        var monuni=moncos*moncant;

        var monrgotot=0;
        var cadena="";

        if ($(id1).checked==true)
        {
          var haydist="ax"+"_"+fil+"_12";
          if ($(haydist).value!="")
          {
           var distrib=$(haydist).value;
           var aux2=distrib.split("!");
           var z=0;
           while (z<((aux2.length)-1))
           {
            var reg=aux2[z];
            var aux3=reg.split("_");
            var ccodrgo=aux3[0];
           var cnomrgo=aux3[1];
           var crecfij=aux3[2];
           var cmonrgo=toFloat2(aux3[3]);
           var ccodcta=aux3[4];
           var ctipo=aux3[5];
           var cmonrgo2=toFloat2(aux3[6]);

          if (ctipo=='M')
          {
            cmonrgo=cmonrgo2;
          }
          else if (ctipo=='P')
          {
           cmonrgo= ((monuni*cmonrgo2)/100);
          }else {cmonrgo=0;}

          cmonrgofor=format(cmonrgo.toFixed(2),'.',',','.');
          cmonrgo2=format(cmonrgo2.toFixed(2),'.',',','.');
          cadena=cadena + ccodrgo+'_' + cnomrgo+'_' + crecfij+'_' + cmonrgofor+'_' + ccodcta+'_' + ctipo +'_'+ cmonrgo2+ '!';
          monrgotot=monrgotot+cmonrgo;
            z++;
        }//while
        $(infrecargos).value=cadena;
        $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
        montottot=monuni-mondto+monrgotot;
        $(total).value=format(montottot.toFixed(2),'.',',','.');

      }//  if ($(haydist).value!="")
     }//if ($(id1).checked==true)
 }

 function mostrargridapu(id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codart=name+"_"+fil+"_1";
    var tieneanmat=name+"_"+fil+"_18";
    var tieneanequ=name+"_"+fil+"_19";
    var tieneanman=name+"_"+fil+"_20";
    var tieneanser=name+"_"+fil+"_21";
    if ($(codart).value!="")
    {
        if ($('fapresup_refpre').value=='########') var refpre=''; else var refpre=$('fapresup_refpre').value;
        var articulo=$(codart).value;
        $('fapresup_filactapu').value=fil;
        if ($(tieneanmat).value!=''){
          var distrib=$(tieneanmat).value;
          var aux2=distrib.split("!");
          var anamat=aux2.length;
        }
        else var anamat=0;

        if ($(tieneanequ).value!=''){
           var distrib=$(tieneanequ).value;
          var aux2=distrib.split("!");
          var anaequ=aux2.length;
        }
        else var anaequ=0;

        if ($(tieneanman).value!=''){
          var distrib=$(tieneanman).value;
          var aux2=distrib.split("!");
          var anaman=aux2.length;
        }
        else var anaman=0;

        if ($(tieneanser).value!=''){
          var distrib=$(tieneanser).value;
          var aux2=distrib.split("!");
          var anaser=aux2.length;
        }
        else var anaser=0;

        new Ajax.Updater('divgridmat', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirApuMatenGrid(); $("datosAPU").show(); monto_total_apu();}, parameters:'ajax=15&articulo='+articulo+'&refpre='+refpre+'&anamat='+anamat})
        new Ajax.Updater('divgridequ', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirApuEquenGrid(); $("datosAPU").show(); monto_total_apu();}, parameters:'ajax=16&articulo='+articulo+'&refpre='+refpre+'&anaequ='+anaequ})
        new Ajax.Updater('divgridman', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirApuManenGrid(); $("datosAPU").show(); monto_total_apu();}, parameters:'ajax=17&articulo='+articulo+'&refpre='+refpre+'&anaman='+anaman})
        new Ajax.Updater('divgridser', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirApuSerenGrid(); $("datosAPU").show(); monto_total_apu();}, parameters:'ajax=22&articulo='+articulo+'&refpre='+refpre+'&anaser='+anaser})
    }
    else
    {
      alert_("Debe introducir el Art&iacute;culo antes de realizar el An&aacute;lisis de Precio Unitario");
    }
  }

 function distribuirApuMatenGrid()
 {
    var j=$('fapresup_filactapu').value;
    var haydist="ax"+"_"+j+"_18";
    if ($(haydist).value!="" )
    {
        var distrib=$(haydist).value;
        var aux2=distrib.split("!");

        var z=0;
        while (z<((aux2.length)-1))
        {
         var reg=aux2[z];
         var aux3=reg.split("_");
         var ccodmat=aux3[0];
         var cdesmat=aux3[1];
         var cunimat=aux3[2];
         var ccanmat=aux3[3];
         var ccosmat=aux3[4];
         var ctotmat=aux3[5];

         var codmat="fx"+"_"+z+"_1";
         var desmat="fx"+"_"+z+"_2";
         var unimat="fx"+"_"+z+"_3";
         var canmat="fx"+"_"+z+"_4";
         var cosmat="fx"+"_"+z+"_5";
         var totmat="fx"+"_"+z+"_6";

         if (!$(codmat)) {
           NuevaFilaGrid('f');
        }
           $(codmat).value=ccodmat;
           $(desmat).value=cdesmat;
           $(unimat).value=cunimat;
           $(canmat).value=ccanmat;
           $(cosmat).value=ccosmat;
           $(totmat).value=ctotmat;
         
        
         z++;
        }
    }
 }

 function distribuirApuEquenGrid()
 {
    var j=$('fapresup_filactapu').value;
    var haydist="ax"+"_"+j+"_19";
    if ($(haydist).value!="" )
    {
        var distrib=$(haydist).value;
        var aux2=distrib.split("!");
        var z=0;
        while (z<((aux2.length)-1))
        {
         var reg=aux2[z];
         var aux3=reg.split("_");
         var ccodequ=aux3[0];
         var cdesequ=aux3[1];
         var cuniequ=aux3[2];
         var ccanequ=aux3[3];
         var ccosequ=aux3[4];
         var ctotequ=aux3[5];

         var codequ="gx"+"_"+z+"_1";
         var desequ="gx"+"_"+z+"_2";
         var uniequ="gx"+"_"+z+"_3";
         var canequ="gx"+"_"+z+"_4";
         var cosequ="gx"+"_"+z+"_5";
         var totequ="gx"+"_"+z+"_6";

          if (!$(codequ)) {
           NuevaFilaGrid('g');
         }

         $(codequ).value=ccodequ;
         $(desequ).value=cdesequ;
         $(uniequ).value=cuniequ;
         $(canequ).value=ccanequ;
         $(cosequ).value=ccosequ;
         $(totequ).value=ctotequ;
         z++;
        }
    }
 }

  function distribuirApuManenGrid()
 {
    var j=$('fapresup_filactapu').value;
    var haydist="ax"+"_"+j+"_20";
    if ($(haydist).value!="" )
    {
        var distrib=$(haydist).value;
        var aux2=distrib.split("!");
        var z=0;
        while (z<((aux2.length)-1))
        {
         var reg=aux2[z];
         var aux3=reg.split("_");
         var ccodman=aux3[0];
         var cdesman=aux3[1];
         var cuniman=aux3[2];
         var ccanman=aux3[3];
         var ccosman=aux3[4];
         var ctotman=aux3[5];

         var codman="hx"+"_"+z+"_1";
         var desman="hx"+"_"+z+"_2";
         var uniman="hx"+"_"+z+"_3";
         var canman="hx"+"_"+z+"_4";
         var cosman="hx"+"_"+z+"_5";
         var totman="hx"+"_"+z+"_6";

          if (!$(codman)) {
           NuevaFilaGrid('h');
         }

         $(codman).value=ccodman;
         $(desman).value=cdesman;
         $(uniman).value=cuniman;
         $(canman).value=ccanman;
         $(cosman).value=ccosman;
         $(totman).value=ctotman;
         z++;
        }
    }
 } 

function distribuirApuSerenGrid()
 {
    var j=$('fapresup_filactapu').value;
    var haydist="ax"+"_"+j+"_21";
    if ($(haydist).value!="" )
    {
        var distrib=$(haydist).value;
        var aux2=distrib.split("!");

        var z=0;
        while (z<((aux2.length)-1))
        {
         var reg=aux2[z];
         var aux3=reg.split("_");
         var ccodser=aux3[0];
         var cdesser=aux3[1];
         var cuniser=aux3[2];
         var ccanser=aux3[3];
         var ccosser=aux3[4];
         var ctotser=aux3[5];

         var codser="kx"+"_"+z+"_1";
         var desser="kx"+"_"+z+"_2";
         var uniser="kx"+"_"+z+"_3";
         var canser="kx"+"_"+z+"_4";
         var cosser="kx"+"_"+z+"_5";
         var totser="kx"+"_"+z+"_6";

         if (!$(codser)) {
           NuevaFilaGrid('k');
        }
           $(codser).value=ccodser;
           $(desser).value=cdesser;
           $(uniser).value=cuniser;
           $(canser).value=ccanser;
           $(cosser).value=ccosser;
           $(totser).value=ctotser;
         
        
         z++;
        }
    }
 } 

function salvarAnalisisprecio(){
  var cadenamat='';
  var cadenaequ='';
  var cadenaman='';
  var cadenaser='';
  var acumtot=0;
  var acumcos=0;
  acumcan=0;
  //Materiales
  var fil=0;  
  var ab=obtener_filas_grid('f',1);
  while (fil<ab)
  {
      var codmat="fx"+"_"+fil+"_1";
      if ($(codmat)) {
        if ($(codmat).value!="")
        {
          var desmat="fx"+"_"+fil+"_2";
          var unimat="fx"+"_"+fil+"_3";
          var canmat="fx"+"_"+fil+"_4";
          var cosmat="fx"+"_"+fil+"_5";
          var totmat="fx"+"_"+fil+"_6";
          var num=toFloat(totmat);
          var num2=toFloat(cosmat);
          var num3=toFloat(canmat);
          acumtot+=num;
          acumcos+=num2;
          acumcan+=num3;
          cadenamat=cadenamat + $(codmat).value+'_' + $(desmat).value+'_' + $(unimat).value +'_'+ $(canmat).value +'_'+ $(cosmat).value +'_'+ $(totmat).value + '!';
        }      
      }
      fil++;
  }

  //Maquinaria y Equipos
  var fil=0;  
  var ab=obtener_filas_grid('g',1);
  while (fil<ab)
  {
      var codequ="gx"+"_"+fil+"_1";
      if ($(codequ)) {
        if ($(codequ).value!="")
        {
          var desequ="gx"+"_"+fil+"_2";
          var uniequ="gx"+"_"+fil+"_3";
          var canequ="gx"+"_"+fil+"_4";
          var cosequ="gx"+"_"+fil+"_5";
          var totequ="gx"+"_"+fil+"_6";
          var num=toFloat(totequ);
          var num2=toFloat(cosequ);
          var num3=toFloat(canequ);
          acumtot+=num;
          acumcos+=num2;
          acumcan+=num3;
          cadenaequ=cadenaequ + $(codequ).value+'_' + $(desequ).value+'_' + $(uniequ).value +'_'+ $(canequ).value +'_'+ $(cosequ).value +'_'+ $(totequ).value + '!';
        }      
      }
      fil++;
  }

  //Mano de Obra
  var fil=0;  
  var ab=obtener_filas_grid('h',1);
  while (fil<ab)
  {
      var codman="hx"+"_"+fil+"_1";
      if ($(codman)) {
        if ($(codman).value!="")
        {
          var desman="hx"+"_"+fil+"_2";
          var uniman="hx"+"_"+fil+"_3";
          var canman="hx"+"_"+fil+"_4";
          var cosman="hx"+"_"+fil+"_5";
          var totman="hx"+"_"+fil+"_6";
          var num=toFloat(totman);
          var num2=toFloat(cosman);
          var num3=toFloat(canman);
          acumtot+=num;
          acumcos+=num2;
          acumcan+=num3;
          cadenaman=cadenaman + $(codman).value+'_' + $(desman).value+'_' + $(uniman).value +'_'+ $(canman).value +'_'+ $(cosman).value +'_'+ $(totman).value + '!';
        }      
      }
      fil++;
  }

   //Servicios Externos
  var fil=0;  
  var ab=obtener_filas_grid('k',1);
  while (fil<ab)
  {
      var codser="kx"+"_"+fil+"_1";
      if ($(codser)) {
        if ($(codser).value!="")
        {
          var desser="kx"+"_"+fil+"_2";
          var uniser="kx"+"_"+fil+"_3";
          var canser="kx"+"_"+fil+"_4";
          var cosser="kx"+"_"+fil+"_5";
          var totser="kx"+"_"+fil+"_6";
          var num=toFloat(totser);
          var num2=toFloat(cosser);
          var num3=toFloat(canser);
          acumtot+=num;
          acumcos+=num2;
          acumcan+=num3;
          cadenaser=cadenaser + $(codser).value+'_' + $(desser).value+'_' + $(uniser).value +'_'+ $(canser).value +'_'+ $(cosser).value +'_'+ $(totser).value + '!';
        }      
      }
      fil++;
  }

  var mifila=$('fapresup_filactapu').value;
  var infmateriales="ax"+"_"+mifila+"_18";
  var infequipos="ax"+"_"+mifila+"_19";
  var infmanoobra="ax"+"_"+mifila+"_20";
  var infservicios="ax"+"_"+mifila+"_21";
  var totcan="ax"+"_"+mifila+"_3";
  var totpre="ax"+"_"+mifila+"_4";
  var totart="ax"+"_"+mifila+"_7";
  $(infmateriales).value=cadenamat;
  $(infequipos).value=cadenaequ;
  $(infmanoobra).value=cadenaman;
  $(infservicios).value=cadenaser;
  //$(totcan).value=format(acumcan.toFixed(2),'.',',','.');
  var porg=toFloat('fapresup_porgasadm');
  var poru=toFloat('fapresup_porutilid');
  var porc=toFloat('fapresup_porcarfab');

  var totg=acumtot*porg/100;
  var totc=acumtot*porc/100;
  var totu=(acumtot+totg+totc)*poru/100;
  var totp= acumtot + totg + totc +totu;


  $(totpre).value=format(totp.toFixed(2),'.',',','.');
  $(totart).value=format(totp.toFixed(2),'.',',','.');
  $('datosAPU').hide();

}

  function monto_total_apu()
  {
    var acummat=toFloat('fapresup_totmat');
    var acumequ=toFloat('fapresup_totequ');
    var acumman=toFloat('fapresup_totman');
    var acumser=toFloat('fapresup_totser');
       
    var sumatoria=acummat + acumequ + acumman+ acumser;

    var num1=toFloat('fapresup_porgasadm');
    var num2=toFloat('fapresup_porutilid');
    var num3=toFloat('fapresup_porcarfab');

    var totg=(sumatoria/((100-num1)/100))-sumatoria;//sumatoria*num1/100;
    var totc=(sumatoria/((100-num3)/100))- sumatoria;//sumatoria*num3/100;
    var totu=((sumatoria+totg+totc)/((100-num2)/100)) -(sumatoria+totg+totc);//(sumatoria+totg+totc)*num2/100;
    var totp= sumatoria + totg +totc + totu;
    


    $('fapresup_totapu').value=format(sumatoria.toFixed(2),'.',',','.');
    $('fapresup_totgasadm').value=format(totg.toFixed(2),'.',',','.');
    $('fapresup_totcarfab').value=format(totc.toFixed(2),'.',',','.');
    $('fapresup_totuti').value=format(totu.toFixed(2),'.',',','.');
    $('fapresup_totpreuni').value=format(totp.toFixed(2),'.',',','.');
  }

 function TraerValor(id){
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colval=col+1;
   
    var idvalmon=name+"_"+fil+"_"+colval;

    var cod=$(id).value;

    if ($(id).value!="")
    {
      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=23&idvalmon='+idvalmon+'&codigo='+cod}) 
    }
 }

  function ColocarNumeracionItem()
  {
    var i=0;
    while (i<30)
    {
     var id1="ax"+"_"+i+"_24";
     if ($(id1))
     {
       $(id1).value=i+1;
     }
     i++;
    }   
  }