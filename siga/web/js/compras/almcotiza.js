function costocacotiza(e,id)
{
 if (e.keyCode==13)
 {
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);

  var cant=name+"_"+fil+"_"+'4';
  var costo=name+"_"+fil+"_"+'5';
  var dscto=name+"_"+fil+"_"+'6';
  var total=name+"_"+fil+"_"+'7';
  var monrgo=name+"_"+fil+"_"+'9';
  var colcodart=name+"_"+fil+"_"+'2';
  var coldesart=name+"_"+fil+"_"+'3';
  var colrecart=name+"_"+fil+"_"+'9';
  var colrecarg=name+"_"+fil+"_"+'11';

  //Obtener el valor de la cantidad
   var num1=toFloat(cant);
  //Obtener el valor del costo
   var num2=toFloat(costo);
  //Obtener el valor del Descuento
   var num3=toFloat(dscto);

   var num4=toFloat(monrgo);

   var  montotal=(num1*num2)-num3;

   var calc=num1*num2;

   $('totartsinrec').value=format(montotal.toFixed(6),'.',',','.');

   $(total).value=format(montotal.toFixed(6),'.',',','.');


/*	if ($('cacotiza_refsol').value!="")
	{
	  var reqart=$('cacotiza_refsol').value;
	  var codart=$(colcodart).value;
          var desart=$(coldesart).value;
          var rifpro=$('cacotiza_rifpro').value;
          var monart=toFloat('totartsinrec');
          var recgo=$(colrecarg).value.replace(/%/gi,'*');

      new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), ActualizarSaldosGrid("a",ArrTotales_a); total_recargos(); var num4=toFloat('cacotiza_monrec'); var num5=toFloat('totales'); var montot=num5+num4; $('cacotiza_moncot').value=format(montot.toFixed(2),'.',',','.'); contaritems();}, parameters:'ajax=7&codart='+codart+'&reqart='+reqart+'&rifpro='+rifpro+'&colrecart='+colrecart+'&desart='+desart+'&monart='+monart+'&recgo='+recgo+'&cosact='+num2})
	}
	else
	{*/
       //actualizarsaldos();
       ActualizarSaldosGrid("a",ArrTotales_a);
       total_recargos();
       contaritems()
       var num4=toFloat('cacotiza_monrec');
       var num5=toFloat('totales');
       var montot=num5+num4;
       $('cacotiza_moncot').value=format(montot.toFixed(2),'.',',','.');

	//}

	}// if (e.keyCode==13)

}

 function mostrargridrecargos(id)
 {
  	var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);


    var codart=name+"_"+fil+"_2";
    var idart=name+"_"+fil+"_3";
    var coduni=name+"_"+fil+"_5";
    var chk="ax"+"_"+fil+"_1";
    if ($(chk).checked==true)
    {
	 if ($(codart).value!="")
	 {
            var reqart=$('cacotiza_refsol').value;
   	    var modifico=$('cacotiza_modifico').value;
	    var articulo=$(codart).value;
            var codunidad=$(coduni).value;
            var desart=$(idart).value;

	    var cant="ax"+"_"+fil+"_4";
	    var cost="ax"+"_"+fil+"_5";
      var desc="ax"+"_"+fil+"_6";

	    var canti=toFloat(cant);
	    var montcos=toFloat(cost);
      var descuent=toFloat(desc);
	    var calculo= canti*montcos-descuent;
   	    $('totartsinrec').value=format(calculo.toFixed(6),'.',',','.');
            $('actualfila').value=fil;

	    new Ajax.Updater('grid_recargo', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json); distribuirRecargosenGrid(); total_recargos2(); $("recargos").show(); $("botonesmarcar").hide(); }, parameters:'ajax=8&articulo='+articulo+'&reqart='+reqart+'&desart='+desart+'&codunidad='+codunidad+'&modifico='+modifico})
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

function salvarmontorecargos()
{
  var cadena='';
  var fil=0;
  if ($('id').value!='')
      var am=totalregistros('ax',2,50);
  else
      var am=parseInt($('fila').value);
  while (fil<50)
    {
      var codrgo="bx"+"_"+fil+"_1";
      if ($(codrgo)) {
        if ($(codrgo).value!="")
        {
          var desrgo="bx"+"_"+fil+"_2";
        	var monrgoc="bx"+"_"+fil+"_3";
        	var tiprgo="bx"+"_"+fil+"_4";
        	var monrgo="bx"+"_"+fil+"_5";
    	    var cadena=cadena + $(codrgo).value+'_' + $(desrgo).value+'_' + $(monrgoc).value +'_'+ $(tiprgo).value+'_' + $(monrgo).value + '!';
          /*if (fil<am)
          am--;*/
        }
        /*else
        {
        fil=am;}*/
        
      }/*else {
        c=fil+1; 
        if (c==am)
          am++;
      }*/
      fil++;
    }


  var mifila=$('actualfila').value;
  var infrecargos="ax"+"_"+mifila+"_11";
  var cant="ax"+"_"+mifila+"_4";
  var cost="ax"+"_"+mifila+"_5";
  var descto="ax"+"_"+mifila+"_6";
  var recargo="ax"+"_"+mifila+"_9";
  var total="ax"+"_"+mifila+"_7";

  $(infrecargos).value=cadena;
  $(recargo).value=$('totrecar').value;

  var recfil=toFloat('totrecar');
  var canti=toFloat(cant);
  var moncos=toFloat(cost);
  var mondto=toFloat(descto);
  var monnet= canti*moncos;

  montottot=monnet-mondto+recfil;
  $(total).value=format(montottot.toFixed(6),'.',',','.');

  $('recargos').hide();
  $("botonesmarcar").show();
  //actualizarsaldos();
  ActualizarSaldosGrid("a",ArrTotales_a);
  total_recargos();
  var num5=toFloat('totales'); $('cacotiza_moncot').value=format(num5.toFixed(2),'.',',','.');
}


 function distribuirRecargosenGrid()
 {
     var j=$('actualfila').value;
     var haydist="ax"+"_"+j+"_11";
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
         var cdesrgo=aux3[1];
         var cmonrgoc=aux3[2];
         var ctiprgo=aux3[3];
         var cmonrgo=aux3[4];


         var codrgo="bx"+"_"+z+"_1";
         var desrgo="bx"+"_"+z+"_2";
         var monrgoc="bx"+"_"+z+"_3";
         var tiprgo="bx"+"_"+z+"_4";
         var monrgo="bx"+"_"+z+"_5";


         $(codrgo).value=ccodrgo;
         $(desrgo).value=cdesrgo;
         $(monrgoc).value=cmonrgoc;
         $(tiprgo).value=ctiprgo;
         $(monrgo).value=cmonrgo;
         //si el tipo de recargo es puntual "M" y el valor es cero (0), entonces se debe habilitar la cajita de texto del monto para que el usuario
         //pueda modificar el monto del recargo
         var monto_monrgo=toFloat2(aux3[2]);
         if (ctiprgo=="M" && monto_monrgo==0)
         {
            $(monrgo).readOnly=false;
         }
         z++;
        }
      }
 }

 function marcarTodo()
  {
   var infrecargos="ax"+"_0_11";
   var distrib=$(infrecargos).value;
   var articulo="ax"+"_0_2";
   var valorarticulo=$(articulo).value;
   if (valorarticulo!="")
   {
    if (distrib!="")
    {
     var fil=1;
     var am=parseInt($('fila').value);
     while (fil<am)
     {
      var codart="ax"+"_"+fil+"_2";
      if ($(codart).value!="")
      {
           var id="ax"+"_"+fil+"_1";
           var cost="ax"+"_"+fil+"_5";
           var cant="ax"+"_"+fil+"_4";
           var dest="ax"+"_"+fil+"_6";
           var recargo="ax"+"_"+fil+"_9";
           var total="ax"+"_"+fil+"_7";
           var haydistribucion="ax"+"_"+fil+"_11";

	   var moncant=toFloat(cant);
	   var moncos=toFloat(cost);
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
	    var cdesrgo=aux3[1];
	    var cmonrgotab=toFloat2(aux3[2]);
	    var ctiprgo=aux3[3];
	    var cmonrgo=toFloat2(aux3[4]);

		if (ctiprgo=='M')
		{
		  cmonrgo=cmonrgotab;
		 //   cmonrgo=cmonrgo;
		}
		else if (ctiprgo=='P')
		{
		 cmonrgo= ((monuni*cmonrgotab)/100);
		}
		else
		{cmonrgo=0;}

            cmonrgotabfor=format(cmonrgotab.toFixed(2),'.',',','.');
            cmonrgofor=format(cmonrgo.toFixed(4),'.',',','.');
            cadena=cadena + ccodrgo+'_' + cdesrgo+'_' + cmonrgotabfor +'_'+ ctiprgo +'_' + cmonrgofor + '!';
            monrgotot=monrgotot+cmonrgo;
	    z++;
	    }//while

	    $(haydistribucion).value=cadena;
	    $(recargo).value=format(monrgotot.toFixed(4),'.',',','.');
            montottot=monuni-mondto+monrgotot;
	    $(total).value=format(montottot.toFixed(6),'.',',','.');
	    $(id).checked=true;
      }//if ($(codart).value!="")
      else
      {
       fil=am;
      }
      fil++;
    }
    //actualizarsaldos();
    ActualizarSaldosGrid("a",ArrTotales_a);
    total_recargos();
    var num5=toFloat('totales'); $('cacotiza_moncot').value=format(num5.toFixed(2),'.',',','.');
   }// if (distrib!="")
   else
   {
    alert_("No han sido aplicados Recargos al primer Art&iacute;culo del Detalle, C&oacute;digo: "+ valorarticulo+". Deben ser definidos estos Recargos para poder replicarlos al resto de los Art&iacute;culo del Detalle de la Solicitud ")
   }
  }
  }

  function desmarcarTodo()
  {
     var fil=1;
     var am=parseInt($('fila').value);
     while (fil<am)
     {
      var codart="ax"+"_"+fil+"_2";
      if ($(codart).value!="")
      {
       var id="ax"+"_"+fil+"_1";
       var cost="ax"+"_"+fil+"_5";
       var cant="ax"+"_"+fil+"_4";
       var dest="ax"+"_"+fil+"_6";
       var recargo="ax"+"_"+fil+"_9";
       var total="ax"+"_"+fil+"_7";
       var haydistribucion="ax"+"_"+fil+"_11";

	   var moncant=toFloat(cant);
	   var moncos=toFloat(cost);
	   var mondto=toFloat(dest);
       var monuni=moncos*moncant;

	   var monrgotot=0;
	   var cadena="";

	    $(haydistribucion).value=cadena;
	    $(recargo).value=format(monrgotot.toFixed(4),'.',',','.');
        montottot=monuni-mondto;
	    $(total).value=format(montottot.toFixed(6),'.',',','.');
	    $(id).checked=false;
      }//if ($(codart).value!="")
      else
      {
       fil=am;
      }
      fil++;
    }
    //actualizarsaldos();
    ActualizarSaldosGrid("a",ArrTotales_a);
    total_recargos();
    var num5=toFloat('totales'); $('cacotiza_moncot').value=format(num5.toFixed(2),'.',',','.');

  }

  function desmarcarfila(id)
  {
      var aux = id.split("_");
      var name=aux[0];
      var fil=parseInt(aux[1]);


      var codart="ax"+"_"+fil+"_2";
      if ($(codart).value!="")
      {
       var cost="ax"+"_"+fil+"_5";
       var cant="ax"+"_"+fil+"_4";
       var dest="ax"+"_"+fil+"_6";
       var recargo="ax"+"_"+fil+"_9";
       var total="ax"+"_"+fil+"_7";
       var haydistribucion="ax"+"_"+fil+"_11";

	   var moncant=toFloat(cant);
	   var moncos=toFloat(cost);
	   var mondto=toFloat(dest);
           var monuni=moncos*moncant;

	   var monrgotot=0;
	   var cadena="";

	    $(haydistribucion).value=cadena;
	    $(recargo).value=format(monrgotot.toFixed(4),'.',',','.');
            montottot=monuni-mondto;
	    $(total).value=format(montottot.toFixed(6),'.',',','.');
	    //actualizarsaldos();
      ActualizarSaldosGrid("a",ArrTotales_a);
      total_recargos();
      var num5=toFloat('totales'); $('cacotiza_moncot').value=format(num5.toFixed(2),'.',',','.');
      }//if ($(codart).value!="")

  }

 function totalmarcadas(id)
 {
	  var aux = id.split("_");
	  var name=aux[0];
	  var fil=aux[1];
	  var col=parseInt(aux[2]);

	  var colcant=col+3;
	  var colcosto=col+4;
	  var cantidad=name+"_"+fil+"_"+colcant;
	  var costo=name+"_"+fil+"_"+colcosto;

	  var montotot=toFloat('totmarcadas');
	  var montcos=toFloat(costo);
	  var canti=parseInt($(cantidad).value);

	  calculo= canti*montcos;

	  if ($(id).checked==true)
	  {
	    acum=montotot + calculo;
	    $('totmarcadas').value=format(acum.toFixed(2),'.',',','.');
	  }
	  else
	  {
	    acum=montotot - calculo;
	    $('totmarcadas').value=format(acum.toFixed(2),'.',',','.');
	    desmarcarfila(id);
	  }

	aplicarRecanterior(id)
  }

   function aplicarRecanterior(ida)
  {
     var aux = ida.split("_");
     var name=aux[0];
     var fil=parseInt(aux[1]);

     var infrecargos="ax"+"_0_11";
     var distrib=$(infrecargos).value;
     var articulo="ax"+"_0_2";
     var valorarticulo=$(articulo).value;
     if (valorarticulo!="" && fil!=0)
     {
       if (distrib!="")
       {
        if (fil!=0)
        {
	      var codart="ax"+"_"+fil+"_2";
	      var total="ax"+"_"+fil+"_7";
	      var ntotal=toFloat(total);

	      if ($(codart).value!="" && ntotal>0)
	      {
	       var id="ax"+"_"+fil+"_1";
	       var cost="ax"+"_"+fil+"_5";
	       var cant="ax"+"_"+fil+"_4";
	       var dest="ax"+"_"+fil+"_6";
	       var recargo="ax"+"_"+fil+"_9";
	       var total="ax"+"_"+fil+"_7";
	       var haydistribucion="ax"+"_"+fil+"_11";

		   var moncant=toFloat(cant);
		   var moncos=toFloat(cost);
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
		    var cdesrgo=aux3[1];
		    var cmonrgotab=toFloat2(aux3[2]);
		    var ctiprgo=aux3[3];
		    var cmonrgo=toFloat2(aux3[4]);

			if (ctiprgo=='M')
			{
			  cmonrgo=cmonrgotab;
			 //   cmonrgo=cmonrgo;
			}
			else if (ctiprgo=='P')
			{
			 cmonrgo= ((monuni*cmonrgotab)/100);
			}
			else
			{cmonrgo=0;}

                    cmonrgotabfor=format(cmonrgotab.toFixed(2),'.',',','.');
                    cmonrgofor=format(cmonrgo.toFixed(4),'.',',','.');
                    cadena=cadena + ccodrgo+'_' + cdesrgo+'_' + cmonrgotabfor +'_'+ ctiprgo +'_' + cmonrgofor + '!';
                    monrgotot=monrgotot+cmonrgo;
		    z++;
		    }//while

	    $(haydistribucion).value=cadena;
	    $(recargo).value=format(monrgotot.toFixed(4),'.',',','.');
      montottot=monuni-mondto+monrgotot;
	    $(total).value=format(montottot.toFixed(6),'.',',','.');
	    $(id).checked=true;
      }//if ($(codart).value!="" && ntotal>0)
      else
      {
       alert_('Debe seleccionar un art&iacute;culo y el Monto Total debe ser mayor a cero');
      }
      }
    //actualizarsaldos();
    ActualizarSaldosGrid("a",ArrTotales_a);
    total_recargos();
    var num5=toFloat('totales'); $('cacotiza_moncot').value=format(num5.toFixed(2),'.',',','.');
   }// if (distrib!="")
   else
   {
    alert_("No han sido aplicados Recargos al primer Art&iacute;culo del Detalle, C&oacute;digo: "+ valorarticulo+". Deben ser definidos estos Recargos para poder replicarlos al resto de los Art&iacute;culo del Detalle de la Solicitud ")
   }
  }
  }

  function ajaxrecargo(e,id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=2;
    var colmonto=3;
    var coltipo=4;
    var colmoncal=5;

    var descripcion=name+"_"+fil+"_"+coldes;
    var monto=name+"_"+fil+"_"+colmonto;
    var tipo=name+"_"+fil+"_"+coltipo;
    var moncal=name+"_"+fil+"_"+colmoncal;

    var cod=$(id).value;
    var monart=toFloat('totartsinrec');

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json);}, parameters:'ajax=9&cajtexmos='+descripcion+'&cajtexcom='+id+'&monto='+monto+'&tipo='+tipo+'&moncal='+moncal+'&monart='+monart+'&codigo='+cod})
      }
    }
  }
  
  function contaritems()
  {
   var am=obtener_filas_grid('a',2);
   var fil=0;
   var cont=0;
   while (fil<am)
   {
    var cos="ax"+"_"+fil+"_5";
    var costo=toFloat(cos);

    if (costo>0)
    {
      cont++;
    }
   fil++;
   }
    $('cacotiza_canite').value=cont;
  }


 function total_recargos()
 {
   var am=obtener_filas_grid('a',2);
   var fil=0;
   var acumrec=0;
   while (fil<am)
   {
    var monrgo="ax"+"_"+fil+"_9";
    if ($(monrgo)) {
       var montorec=toFloat(monrgo);
       acumrec+=montorec;  
    }
   fil++;
   }

   $('cacotiza_monrec').value=format(acumrec.toFixed(4),'.',',','.');
 }

 function total_recargos2()
 {
   var cc=totalregistros2('bx',1,20);
   var t=0;
   var acum=0;
   var cx=0;
   while (t<20)
   {
      var monrgo="bx"+"_"+t+"_5";
      if ($(monrgo))
      {
        var num=toFloat(monrgo);
        acum+=num;
        /* if (t<cc && cx!=0)
          cc--;*/

      }/*else {
        cx++;
        c=t+1; 
        if (c==cc)
          cc++;
      }*/
      t++;
   }
   $('totrecar').value=format(acum.toFixed(4),'.',',','.');
 }

  function recalcularecargos(e,id)
  {
  if (e.keyCode==13 || e.keyCode==9)
   {
        var i=id.split('_');
        var fil=i[1];
        var id1="ax"+"_"+fil+"_1";
        var cost="ax"+"_"+fil+"_5";
        var cant="ax"+"_"+fil+"_4";
        var dest="ax"+"_"+fil+"_6";
        var recargo="ax"+"_"+fil+"_9";
        var total="ax"+"_"+fil+"_7";
        var infrecargos="ax"+"_"+fil+"_11";

        var moncant=toFloat(cant);
        var moncos=toFloat(cost);
        var mondto=toFloat(dest);
        var monuni=(moncos*moncant)-mondto;

        var monrgotot=0;
        var cadena="";

        if ($(id1).checked==true)
        {
      var haydist="ax"+"_"+fil+"_11";
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
        var cdesrgo=aux3[1];
        var cmonrgotab=toFloat2(aux3[2]);
        var ctiprgo=aux3[3];
        var cmonrgo=toFloat2(aux3[4]);

      if (ctiprgo=='M')
      {
        //cmonrgo=cmonrgotab;
        cmonrgo=cmonrgotab
      }
      else if (ctiprgo=='P')
      {
       cmonrgo= ((monuni*cmonrgotab)/100);
      }
      else
      {cmonrgo=0;}

            cmonrgotabfor=format(cmonrgotab.toFixed(2),'.',',','.');
            cmonrgofor=format(cmonrgo.toFixed(4),'.',',','.');
            cadena=cadena + ccodrgo+'_' + cdesrgo+'_' + cmonrgotabfor +'_'+ ctiprgo +'_' + cmonrgofor + '!';
            monrgotot=monrgotot+cmonrgo;
        z++;
        }//while
        $(infrecargos).value=cadena;
        $(recargo).value=format(monrgotot.toFixed(4),'.',',','.');
          //montottot=monuni-mondto+monrgotot;
        montottot=monuni;//-mondto;//+monrgotot;
       $(total).value=format(montottot.toFixed(6),'.',',','.');

      }//  if ($(haydist).value!="")
     }//if ($(id1).checked==true)
    ActualizarSaldosGrid("a",ArrTotales_a);
    total_recargos();
    var num5=toFloat('totales'); 
    var num4=toFloat('cacotiza_monrec'); 
    var tot=num5+num4;
    $('cacotiza_moncot').value=format(tot.toFixed(2),'.',',','.');
  }
 } 