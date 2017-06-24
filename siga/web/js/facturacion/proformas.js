function cansol(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   
   var coltotal=col+6;   
   var colexis=col-1;
   var colblanco=col+14;
   var colart=col-4;
   var colprec=col+3;
   var colprec2=col+4;
   var coldistot=col+7;

   
   var total=name+"_"+fil+"_"+coltotal;
   var distot=name+"_"+fil+"_"+coldistot;
   var exist=name+"_"+fil+"_"+colexis;   
   var blanco=name+"_"+fil+"_"+colblanco;
   var codart=name+"_"+fil+"_"+colart;
   var cod=$(codart).value;
   var precio=name+"_"+fil+"_"+colprec;
   var precioe=name+"_"+fil+"_"+colprec2;

   var am=obtener_filas_grid('a',3);

     if ($(precio).value!="") {var num4= toFloat(precio);}else {var num4= toFloat(precioe);}
     var num1=toFloat(id);
     var num3=toFloat(distot);
 if (am>0)
 {
   if ($(id).value!="")
   {
	   if (!validarnumero(id))
	   {
	    alert_('El Dato debe ser n&uacute;merico');
	    $(id).value="0,00";	    
	    $(total).value="0,00";	    

	   }
	   else if (num1<0)
	   {
	    alert('El valor debe ser mayor que cero');
	    $(id).value="0,00";
	    $(total).value="0,00";
	    
	   }
	   else
	   {
	    //$(exist).value=$(distot).value;
	    var num2=toFloat(exist);
        if ($(blanco).value=='S' || num1<=num2)
        {
          var canent=cantidadEntregarArt(fil,cod);
          if (num1<=(num3-canent))
          {
           if ($(id).value!="")
           {
             var cal=num3-num1-canent;
             $(exist).value=format(cal.toFixed(2),'.',',','.');
             distribuirexistencia(fil,cod);
             if ($(precio).value!="")
             {
               var producto= num4*num1;              

               var calmontot=calcularMontTot();
               if (calmontot>0)
               {
                  var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);

				    var colart=obtener_filas_grid('a',3);
				    var fi=0;
					while (fi<colart)
					{				      
				      var totales="ax_"+fi+"_13";
				      var precios="ax_"+fi+"_10";
				      var precios2="ax_"+fi+"_11";
				      var cant="ax_"+fi+"_"+colum;

                    if ($(precios)){
				      if ($(precios).value!="") {var nprecio=toFloat(precios);}else {var nprecio=toFloat(precios2);}
				      var ncant=toFloat(cant);

				     var sumtot=nprecio*ncant;
                      $(totales).value=format(sumtot.toFixed(2),'.',',','.');
                      }
					 fi++;
					}
               }
               recalcularecargos(id);
               var calculo=producto+num5;
               $(total).value=format(calculo.toFixed(2),'.',',','.');
             }
           }
          }
        }
        else
        {
         alert_('La Cantidad Solicitada excede de la existencia del Art&iacute;culo');
         $(id).value="0,00";
 	     $(total).value="0,00";
        }
	   }
    }
    else
    {
      $(id).value="0,00";
    }
  }
 }
}

function cantidadEntregarArt(fil,codart)
 {
   var cant_entreg=0;
   var am=obtener_filas_grid('a',3);
   var i=0;
   while (i<am)
   {
    var codart1="ax"+"_"+i+"_3";
    var cansol="ax"+"_"+i+"_7";
    var canent="ax"+"_"+i+"_8";
    if ($(codart1)){
    var ncanent=toFloat(canent);

     if (i!=fil)
     {
       if ($(codart1).value==codart)
       {
         if ($(cansol).value!="")
         {
           cant_entreg= cant_entreg + ncanent;
         }
       }
     }
     }
    i++;
   }

   return cant_entreg;
 }

function distribuirexistencia(fila,dato)
 {
   var colart=obtener_filas_grid('a',3);
   var exis2="ax_"+fila+"_6";
    var fi=0;
	while (fi<colart)
	{
      var exis="ax_"+fi+"_6";
      var codart="ax_"+fi+"_3";
     if ($(codart)){
      if (fi!=fila)
      {
        if ($(codart).value==dato)
        {
         $(exis).value=$(exis2).value;
        }
      }
      }
	 fi++;
	}
 }

  function calcularMontTot()
  {
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    var calcularmonto=0;

     var regart=obtener_filas_grid('a',3);
     var fil=0;
     while (fil<regart)
     {
       var precio="ax_"+fil+"_10";
       var precioe="ax_"+fil+"_11";
       var cant="ax_"+fil+"_"+colum;

      if ($(precio)){
       if ($(precio).value!="")
       {var nprecio= toFloat(precio);}
       else {var nprecio= toFloat(precioe);}

       var ncant= toFloat(cant);

       if (($(precio).value!="" || $(precioe).value!="0,00") && $(cant).value!="")
       {
         calcularmonto= calcularmonto + ( nprecio * ncant);
       }
       }
       fil++;
     }
    return calcularmonto;
  }


  function calcularMontTotMod()
  {
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    var calcularmonto=0;

    var mifila=$('fafacturpro_filactrec').value;        
    var cant="ax"+"_"+mifila+"_"+colum;
    var precio="ax_"+mifila+"_10";
    var precioe="ax_"+mifila+"_11";
    
      if ($(precio)){
       if ($(precio).value!="")
       {var nprecio= toFloat(precio);}
       else {var nprecio= toFloat(precioe);}

       var ncant= toFloat(cant);

       if (($(precio).value!="" || $(precioe).value!="0,00") && $(cant).value!="")
       {
         calcularmonto= calcularmonto + ( nprecio * ncant);
       }
       }

    return calcularmonto;
  }
  
  
  function determinarReferenciaDoc(tipo)
  {
    if (tipo=='V')
    {
      col=7;
    }

    if (tipo=='P')
    {
      col=8;
    }

    if (tipo=='D' || tipo=='VC')
    {
      col=9;
    }

    return col;
  }

  function marcardesc(id)
 {
  	var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

	var coldesc=col+19;
	var mdesc=name+"_"+fil+"_"+coldesc;

    $(mdesc).checked=true;
    if ($(id).checked==false)
    {
        desmarcarfilaMod(id);
    }else {
        aplicarRecanterior(id);
    }
    montoTotal();

 }
 
  function desmarcarfilaMod(id)
  {
      var aux = id.split("_");
      var name=aux[0];
      var fil=parseInt(aux[1]);
      var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);  
      var codart="ax"+"_"+fil+"_2";
      if ($(codart).value!="")
      {
       var precio="ax_"+fil+"_10";
       var precioe="ax_"+fil+"_11";
       var cant="ax"+"_"+fil+"_"+colum;
       var dest="ax"+"_"+fil+"_18";
       var recargo="ax"+"_"+fil+"_12";
       var total="ax"+"_"+fil+"_13";
       var haydistribucion="ax"+"_"+fil+"_61";

         if ($(precio)){
	     if ($(precio).value!="") {var moncos=toFloat(precio);}else {var moncos=toFloat(precioe);}
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
        montoTotal();
      }//if ($(codart).value!="")
  }  

 function perderfocus(e,id,totcol)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   if (col!=totcol)
   {
    var colsig=col+1;
    var siguiente=name+"_"+fil+"_"+colsig;
   }
   else
   {
    var fila=fil+1;
    var siguiente=name+"_"+fila+"_2";
   }

   if (e.keyCode==13 || e.keyCode==9)
   {
    $(siguiente).focus();
   }
  }

  function ajaxarticulosfactura(e,id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var colpre=col+7;
    var colpre2=col+8;
    var colcta=col+14;
    var colblan2=col+19;
    var coluni= col + 2;
    var colcant= col + 11;
    var colexis= col+3;
    var colcantot= col+4;
    var coltoto=col+10;
    var colblan=col+18;

    var descripcion=name+"_"+fil+"_"+coldes;
    var precio=name+"_"+fil+"_"+colpre;
    var precio2=name+"_"+fil+"_"+colpre2;
    var ctaprove=name+"_"+fil+"_"+colcta;
    var blanco2=name+"_"+fil+"_"+colblan2;
    var unidad=name+"_"+fil+"_"+coluni;
    var cantidad=name+"_"+fil+"_"+colcant;
    var existencia=name+"_"+fil+"_"+colexis;  
    var cantot=name+"_"+fil+"_"+colcantot;
    var total=name+"_"+fil+"_"+coltoto;
    var blanco=name+"_"+fil+"_"+colblan;

    var cod=$(id).value;

    var londefart=$('fafacturpro_lonart').value;
    var lonart=$(id).value.length;
    var canent=cantidadEntregarArt(fil,cod);
    var docrefiere=$('fafacturpro_tipref').value;
    var filagrid= fil;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
       if (londefart <= lonart)
       {
        if (!articulo_repetido(id))
        {
          new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&cajtexmos='+descripcion+'&cajtexcom='+id+'&canent='+canent+'&docref='+docrefiere+'&ctaprove='+ctaprove+'&blanco2='+blanco2+'&unidad='+unidad+'&cantidad='+cantidad+'&existencia='+existencia+'&cantot='+cantot+'&total='+total+'&filagrid='+filagrid+'&blanco='+blanco+'&precio='+precio+'&precio2='+precio2+'&codigo='+cod})
          //if (docrefiere=='V')
          //{
            //new Ajax.Updater(precio, getUrlModulo()+'ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&id='+$('id').value+'&desc='+descripcion+'&precio2='+precio2+'&codigo='+cod});

          //}
        }
        else
        {
          alert('C�digo del Art�culo est� Repetido');
          $(id).value="";
        }
      }
      else
      {
        alert('El Articulo debe ser de Ultimo Nivel');
        $(id).value="";
      }
      }
    }
 }

 function articulo_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var articulo=$(id).value;

   var articulorepetido=false;
   var am=totalregistros2('ax',1,25);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";
    if ($(codigo)){
    var articulo2=$(codigo).value;

    if (i!=fila)
    {
      if (articulo==articulo2)
      {
        articulorepetido=true;
        break;
      }
    }
    }
   i++;
   }
   return articulorepetido;
 }

 function Precio3(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);
 
   var coltotal=col+3;
   var colprecioart=col+5;
   var colprenext=col+1;

   var total=name+"_"+fil+"_"+coltotal;
   var precioart=name+"_"+fil+"_"+colprecioart;
   var precionext=name+"_"+fil+"_"+colprenext;

   var num1=toFloat(id);
   var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
   var canti=name+"_"+fil+"_"+colum;   
   var num2=toFloat(canti);

   if ($(id).value!="")
   {
     $(precionext).value="";
     if (validarnumero(id))
     {
       if (num1>0)
       {
         //cambio de moneda
         if ($(id).value!="")
         {
           var producto=num1*num2;           

            var calmontot=calcularMontTot();
            if (calmontot>0)
            {
		       var colart=obtener_filas_grid('a',3);
		       var fi=0;
			   while (fi<colart)
			   {		         
		         var totales="ax_"+fi+"_13";
		         var precio="ax_"+fi+"_10";
		         var precio2="ax_"+fi+"_11";
		         var cant="ax_"+fi+"_"+colum;
                 if ($(precio)){
		         if ($(precio).value!="") {var nprecio=toFloat(precio);}else {var nprecio=toFloat(precio2);}
		         var ncant=toFloat(cant);

 		         var sumtot=nprecio*ncant;	             
	             $(totales).value=format(sumtot.toFixed(2),'.',',','.');
	             }
			    fi++;
			   }
            }           
           recalcularecargos(id);
            var calculo=producto;
            $(total).value=format(calculo.toFixed(2),'.',',','.');
            montoTotal();
          }
         }
         else
         {
           alert('El valor debe ser mayor que cero');
           if ($(precioart).value!="")
           {
             $(id).value=$(precioart).value;
             $(totales).value='0,00';             
           }
           else
           {
             $(id).value="0,00";
           }
           if ($('fafacturpro_tipref').value=='V')
           {             
             $(total).value="0,00";            
           }
         }
       }
       else
       {
         alert_('El Dato debe ser n&uacute;merico');
         if ($(precioart).value!="")
         {
           $(id).value=$(precioart).value;
           $(totales).value='0,00';
         }
         else
         {
           $(id).value="0,00";
         }
         if ($('fafacturpro_tipref').value=='V')
         {           
           $(total).value="0,00";
         }        
       }
     }
     else
     {
       alert_('El Dato debe ser n&uacute;merico');
       $(id).value=$(precioart).value;
       $(total).value="0,00";
     }     
 }

 function Precio2(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {

   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var coltot=col+2;
   var colrec=col+1;
   var colpreprev=col-1;

   var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
   var canti=name+"_"+fil+"_"+colum;   
   var total=name+"_"+fil+"_"+coltot;
   var precioprev=name+"_"+fil+"_"+colpreprev;

   var num1=toFloat(id);
   var num2=toFloat(canti);

 if ($(id).value!="")
 {
   if($(id).value!="0,00")
    $(precioprev).value="";

   if (!validarnumero(id))
   {
    alert_('El Dato debe ser n&uacute;merico');
    $(id).value="0,00";
   }
   else if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
    $(id).value="0,00";
   }
   else
   {
     //cambio moneda
     if ($(id).value!="" && $(id).value!="0,00")
     {
          var producto= num1*num2;          
          var calculo=producto;
          recalcularecargos(id);
          $(total).value=format(calculo.toFixed(2),'.',',','.');
          montoTotal();
     }
   }     
  }
  else
  {
    $(id).value="0,00";
  }
 } 
}

  function montoTotal()
  {
    var montot=0;
    var regart=obtener_filas_grid('a',3);
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    var fil=0;
    var totmonrec=0;
    var tottotal=0;
    var totaldesc=0;
    
    while (fil<regart)
    {
      var precio="ax_"+fil+"_10";
      var precioe="ax_"+fil+"_11";
      var cant="ax_"+fil+"_"+colum;
      var montrec="ax_"+fil+"_12";
      var totart="ax_"+fil+"_13";
      var mondesc="ax_"+fil+"_18";

      if ($(precio)){

      if ($(totart).value!="" && (ValidarNumeroV2VE(totart)==true))
      {
       if (!ValidarNumeroV2VE(cant)) {$(cant).value="0,00";}
       if (!ValidarNumeroV2VE(precio)) {$(precio).value="0,00";}
       if (!ValidarNumeroV2VE(precioe)) {$(precioe).value="0,00";}
       if (!ValidarNumeroV2VE(montrec)) {$(montrec).value="0,00";}

       if ($(precio).value!="" && $(precio).value!="0,00")
       {var nprecio= toFloat(precio);}
       else {var nprecio= toFloat(precioe);}

       var ncant= toFloat(cant);
       var nmonrec= toFloat(montrec);
       var ntotart= toFloat(totart);
       var ndesc=toFloat(mondesc);
        montot= montot + ((nprecio * ncant) +  nmonrec);
        totmonrec= totmonrec+ nmonrec;
        tottotal=tottotal + ntotart;
        totaldesc= totaldesc + ndesc;
      }
      }
     fil++;
    }

    //var cuantos=marcados("D");

    if (montot>0)
    {
      /*var totaldesc=0;
      if (cuantos>0)
      {
        var regdesc=obtener_filas_grid('b',1);
      if (regdesc>0){
        var i=0;
        while (i<regdesc)
        {
          var mondesc="bx_"+i+"_3";
          if ($(mondesc)){
          var ndesc=toFloat(mondesc);

          totaldesc= totaldesc + ndesc;
          }
         i++;
        }
      }
      }*/
      montot= montot - totaldesc;
    }else {montot=0;}

    $('fafacturpro_monfac').value=format(montot.toFixed(2),'.',',','.');
    var ntotmonrgo=toFloat('fafacturpro_totmonrgo');
    var ntottotart=toFloat('fafacturpro_tottotart');

    var cal= tottotal - totmonrec + totaldesc;
    $('fafacturpro_monto').value=format(cal.toFixed(2),'.',',','.');
    $('fafacturpro_monrgo').value= format(totmonrec.toFixed(2),'.',',','.');
    $('fafacturpro_mondesc').value= format(totaldesc.toFixed(2),'.',',','.');
    $('fafacturpro_totmonrgo').value= format(totmonrec.toFixed(2),'.',',','.');
    $('fafacturpro_tottotart').value=format(montot.toFixed(2),'.',',','.');
  }

 function recargos()
 {
   $('divgrid_fargoartpro').show();
   $('divtotrec').show();
 }

  function marcados(tipo)
  {
    var marcado=0;
    if (tipo=='R')
    {
      var indice='1';
    } else {var indice='20';}

    var regart=obtener_filas_grid('a',3);
    var fil=0;
    while (fil<regart)
    {
      var campo="ax_"+fil+"_"+indice;
      if ($(campo)){
      if ($(campo).checked==true)
      {
       marcado= marcado + 1;
      }
      }
      fil++;
    }
    return marcado;
  }

  function marcar()
  {
      alert('hola mundo');
  }


 function ocultar(div,div2)
 {
 	$(div).hide();
        $(div2).hide();
 	var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
 	if (div=='divgrid_fargoartpro')
 	{
          if ($('recarg').visible() && $('id').value=='')
          {
            var fil=0;
            var facart=obtener_filas_grid('a',3);
                while (fil<facart)
                {
                 var recargo="ax_"+fil+"_12";
                 var check="ax_"+fil+"_1";
                 var totart="ax_"+fil+"_13";
                 var precio="ax_"+fil+"_10";
                 var precioe="ax_"+fil+"_11";
                 var cant="ax_"+fil+"_"+colum;

               if ($(precio)){
                 if ($(precio).value!="") {var col9=toFloat(precio);}else {var col9=toFloat(precioe);}

               var colcant=toFloat(cant);
               var calculo= colcant * col9;

                 $(recargo).value='0,00';
                 $(totart).value=format(calculo.toFixed(2),'.',',','.');

                 if ($(check).checked==false)
                 {
                   marcarArtRep(fil,false)
                 }
                 else
                 {
                  $(check).ckecked=true;
                  marcarArtRep(fil,true)
                 }
                 }
               fil++;
               }
               actualizarRecargos();
               recalcularRecargos();
               montoTotal();
          }
 	}
 }

 function descuentos()
 {
   $('divgrid_fadescartpro').show();
   $('divtotdesc').show();
 }

  function marcarArtRep(fila,valor)
  {
    var facart=obtener_filas_grid('a',3);
    var fil=0;
    var fila1="ax_"+fila+"_3";
	while (fil<facart)
	{
          var fila2="ax_"+fil+"_3";
          var marcar="ax_"+fil+"_1";
          if ($(fila2)){
              if ($(fila1).value==$(fila2).value)
              {
                $(marcar).checked=valor;
              }
          }
	  fil++;
	}
  }

  function montoMarcados()
  {
    var monto_marcados=0;
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);

    var colart=obtener_filas_grid('a',3);
    var fil=0;
    while (fil<colart)
    {
      var check="ax_"+fil+"_1";
      var precio="ax_"+fil+"_10";
      var precioe="ax_"+fil+"_11";
      var cant="ax_"+fil+"_"+colum;
      if ($(precio)){
      if ($(precio).value!="")
      {
        var nprecio=toFloat(precio);
      }
      else
      {
        var nprecio=toFloat(precioe);
      }
         ncant=toFloat(cant);
      if ($(check).checked==true)
      {
        if ($(cant).value!="")
        {
          monto_marcados=monto_marcados + (nprecio*ncant);
        }
      }
      }
     fil++;
    }

    if (monto_marcados>0)
    {
      var totaldesc=0;
        var regdesc=obtener_filas_grid('b',1);
        if (regdesc>0){
            var i=0;
            while (i<regdesc)
            {
              var mondesc="bx_"+i+"_3";
              if ($(mondesc)){
              var ndesc=toFloat(mondesc);

              totaldesc= totaldesc + ndesc;
              }
             i++;
            }
      }
      if ($('fafacturpro_esretencion').value=='N')
      {
        monto_marcados= monto_marcados - totaldesc
      }
    }
   return monto_marcados;
  }

  function actualizarRecargos()
  {
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    var montoArt= montoMarcados();

    var regrgo=obtener_filas_grid('c',1);
    var regart=obtener_filas_grid('a',3);
    var j=0;
    while (j<regrgo)
    {
      var codrgo="cx_"+j+"_1";
      var tiprgo="cx_"+j+"_6";
      var monrgo="cx_"+j+"_4";
      var monrgo2="cx_"+j+"_7";
     if ($(codrgo)){
      if ($(codrgo).value!="")
      {
        monArt=0;
        var fil=0;
        while (fil<regart)
        {
         var codart="ax_"+fil+"_3";
         var cant="ax_"+fil+"_"+colum;
         var precio="ax_"+fil+"_10";
         var precioe="ax_"+fil+"_11";
         if ($(precio)){
              if ($(precio).value!="")
              {
                var nprecio=toFloat(precio);
              }
              else
              {
                var nprecio=toFloat(precioe);
              }
             var ncant=toFloat(cant);
             new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&articulo='+codart+'&recargo='+codrgo})
             if ($('fafacturpro_trajo').value=='S')
             {
                if ($(cant).value!="")
                {
                  montoArt= montoArt - (nprecio * ncant);
                }
             }
             }
         fil++;
        }
        var monrgoori=toFloat(monrgo2);
        if ($(tiprgo).value=='P')
        {
          $(monrgo).value=format(montoArt.toFixed(2),'.',',','.');
          var recarg= $(monrgo).value;
          var cal= ((montoArt * monrgoori)/100);
          $(monrgo).value=format(cal.toFixed(2),'.',',','.');
        }
        else
        {
         $(monrgo).value=$(monrgo).value;
        }
      }
      }
      j++;
    }

    calcularTotalRecargos();
  }

  function calcularTotalRecargos()
  {
    var mitot=0;
    var regrgo=obtener_filas_grid('c',1);
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
    $('fafacturpro_totrec').value=format(mitot.toFixed(2),'.',',','.');
  }

  function recalcularRecargos()
  {
    var regrgo=obtener_filas_grid('c',1);
    if (regrgo>0)
    {
      var regart=obtener_filas_grid('a',3);
      var fil=0;
      while (fil<regart)
      {
        var montotrgo="ax_"+fil+"_12";
        var totart="ax_"+fil+"_13";
        if ($(montotrgo)){
            $(montotrgo).value="0,00";
            $(totart).value="0,00";
        }
        fil++;
      }

      var j=0;
      while (j<regrgo)
      {
        var codrgo="cx_"+j+"_1";
        if ($(codrgo)){
        if ($(codrgo).value!="")
        {
         grid_recargos_lost_focus(codrgo)
          distribuirRecargos(j,"S");
        }
        }
	   j++;
	  }
	  calcularTotalRecargos();
    }
  }



  function montosMarcadosSinDescuento()
  {
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    var monmarsindesc=0;

    var regart=obtener_filas_grid('a',3);
     var fil=0;
     while (fil<regart)
     {
       var check="ax_"+fil+"_1";
       var precio="ax_"+fil+"_10";
       var precioe="ax_"+fil+"_11";
       var cant="ax_"+fil+"_"+colum;
      if ($(precio)){
       if ($(precio).value!="")
       {var nprecio= toFloat(precio);}
       else {var nprecio= toFloat(precioe);}

       var ncant= toFloat(cant);

       if ($(check).checked==true)
       {
           if ($(cant).value!="")
           {
             monmarsindesc= monmarsindesc + (nprecio*ncant);
           }
       }
       }
       fil++;
     }
    return monmarsindesc;
  }

  function mostrarPromedio()
  {
    $('fafacturpro_tottotart').value="0,00";
    $('fafacturpro_totmonrgo').value="0,00";

    var recar=0;
    var solic=0;
    var precios=0;
    var montota=0;

    var regart=obtener_filas_grid('a',3);
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    var fil=0;
    while (fil<regart)
    {
      var precio="ax_"+fil+"_10";
      var precioe="ax_"+fil+"_11";
      var cant="ax_"+fil+"_"+colum;
      var montrec="ax_"+fil+"_12";
      var totart="ax_"+fil+"_13";

      if ($(cant)){
      if ($(cant).value!="" && (ValidarNumeroV2VE(cant)==true))
      {
        var ncant= toFloat(cant);
        if (ncant>0)
        {
         solic= solic + ncant;
        }
      }

      if (($(precio).value!="" || $(precio).value!="0,00") && (ValidarNumeroV2VE(precio)==true || ValidarNumeroV2VE(precioe)==true))
      {
        if ($(precio).value!="" && $(precio).value!="0,00") {var nprecio= toFloat(precio);} else {var nprecio= toFloat(precioe);}
        if (nprecio>0)
        {
         precios= precios + nprecio;
        }
      }

      if ($(montrec).value!="" && (ValidarNumeroV2VE(montrec)==true))
      {
        var nmontrec= toFloat(montrec);
        if (nmontrec>0)
        {
         recar= recar + nmontrec;
        }
      }

      if ($(totart).value!="" && (ValidarNumeroV2VE(totart)==true))
      {
        var ntotart= toFloat(totart);
        if (ntotart>0)
        {
         montota= montota + ntotart;
        }
      }
      }
      fil++;
    }

    $('fafacturpro_totmonrgo').value=format(recar.toFixed(2),'.',',','.');
    var montota2=montota;
    $('fafacturpro_tottotart').value=format(montota.toFixed(2),'.',',','.');

    var ntotaldesc= toFloat('fafacturpro_mondesc');
    var calcu= montota - ntotaldesc;
    $('fafacturpro_monfac').value=format(calcu.toFixed(2),'.',',','.');

    var variable1= toFloat('fafacturpro_totmonrgo');
    var variable2= toFloat('fafacturpro_tottotart');
    var calcul= variable2 - variable1;
    $('fafacturpro_monto').value=format(calcul.toFixed(2),'.',',','.');
    $('fafacturpro_monrgo').value=format(variable1.toFixed(2),'.',',','.');
  }

  function distribuirRecargos(fila,suma_resta)
  {
      var totregrgo=obtener_filas_grid('c',1);
    if (totregrgo>0)
    {
      var monTot= montoMarcados();
      var monTot2= calcularMontTot();
      var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);

      if (monTot>0 || monTot2>0)
      {
	     var regart=obtener_filas_grid('a',3);
	     var fil=0;
	     while (fil<regart)
	     {
	       var check="ax_"+fil+"_1";
	       var codart2="ax_"+fil+"_3";
	       var precio="ax_"+fil+"_10";
	       var precioe="ax_"+fil+"_11";
	       var cant="ax_"+fil+"_"+colum;
	       var montorgo="ax_"+fil+"_12";
	       var totrgo="ax_"+fil+"_13";
	       var codrgo="cx_"+fila+"_1";
	       var fijovar="cx_"+fila+"_3";
	       var monrecar="cx_"+fila+"_4";
              if ($(precio)){
	       if ($(precio).value!="")
	       {var nprecio= toFloat(precio);}
	       else {var nprecio= toFloat(precioe);}
               var ncant= toFloat(cant);

	       if ($(precio).value!="" || $(precioe).value!="0,00")
	       {
	         if ($(fijovar).value=="No")
	         {
	           if ($(check).checked==true)
	           {
	             if (monTot!=0)
	             {
                   if (($(precio).value!="" || $(precioe).value!="0,00") && $(cant).value!="" && $(monrecar).value!="")
                   {
                     var encontro=false;
                     var i=0;
       	             while (i<regart)
	                 {
	                  var codart="ax_"+i+"_3";
	                  var check2="ax_"+i+"_1";
	                  var precio2="ax_"+i+"_10";
	                  var precioe2="ax_"+i+"_11";
	                  var cant2="ax_"+i+"_"+colum;
                     if ($(precio2)){
	                  if ($(precio2).value!="")
	                  {var nprecio2= toFloat(precio2);}
	                  else {nprecio2= toFloat(precioe2);}
	                  var ncant2= toFloat(cant2);

	                  new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&articulo='+codart+'&recargo='+codrgo})
                          if ($('fafacturpro_trajo').value=='S')
                          {
                            if ($(check2).checked==true && $(cant2).value!="" && $(precio2).value!="")
                            {
                              monTot= monTot - (nprecio2 * ncant2);
                            }
                            else
                            {
                              if ($(codart).value==$(codart2).value)
                              {
                                encontro=true;
                              }
                            }
                          }
               	      }
	                  i++;
	                 }
	                 if (monTot!=0)
	                 {
	                   if ($('fafacturpro_mondesc').value!="")
	                   {
                              var totaldesc=0;
	                      var regdesc=obtener_filas_grid('b',1);
	                      if (regdesc>0){
                                  var z=0;
                                  while (z<regdesc)
                                  {
                                    var mondesc="bx_"+z+"_3";
                                    if ($(mondesc)){
                                    var ndesc=toFloat(mondesc);

                                    totaldesc= totaldesc + ndesc;
                                    }
                                   z++;
                                  }
                                }
                                if ($('fafacturpro_esretencion').value=="N")
                                {
                                 var monsindesc=montosMarcadosSinDescuento();
                                 var pordescto= (((nprecio*ncant)*totaldesc)/monsindesc);
                                }
                                else
                                {
                                  var monsindesc=montosMarcadosSinDescuento();
                                  var pordescto= (((nprecio*ncant)*totaldesc)/monsindesc);
                                }

                                if ($('fafacturpro_esretencion').value=="N")
                                {
                                 var nmonrec= toFloat(monrecar);
                                 var monuni=((((nprecio*ncant)-pordescto)/monTot)* nmonrec);
                                }
                                else
                                {
                                  var nmonrec= toFloat(monrecar);
                                  var monuni=(((nprecio*ncant)/monTot)* nmonrec);
                                }
	                   }
	                 }

                   }
	             } else {monuni=0;}
	           }else {monuni=0;}
	         }
	         else
	         {
               if (($(precio).value!="" || $(precioe).value!="0,00") && $(cant).value!="" && $(monrecar).value!="")
               {
                 monTot=calcularMontTot();
                 var encontro=false;
                 var i=0;
      	         while (i<regart)
                 {
                  var codart="ax_"+i+"_3";
                  var precio2="ax_"+i+"_10";
                  var precioe2="ax_"+i+"_11";
                  var cant2="ax_"+i+"_"+colum;
                  if ($(precio2)){
                  if ($(precio2).value!="")
                  {var nprecio2= toFloat(precio2);}
                  else {nprecio2= toFloat(precioe2);}
                  var ncant2= toFloat(cant2);

                  new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&articulo='+codart+'&recargo='+codrgo})
           	      if ($('fafacturpro_trajo').value=='S')
           	      {
           	        if ($(cant2).value!="" && $(precio2).value!="")
           	        {
           	          monTot= monTot - (nprecio2 * ncant2);
           	        }
           	        else
           	        {
           	          if ($(codart).value==$(codart2).value)
           	          {
           	            encontro=true;
           	          }
           	        }
           	      }
           	      }
                  i++;
                 }

                 if (monTot>0)
                 {
                   var nmonrec= toFloat(monrecar);
                   var monuni= redondear((((nprecio * ncant)/monTot)* (nmonrec)),4);
                 }
                 else
                 {
                   monuni=0;
                 }
               }
	         }
	         if (!encontro)
	         {
	           if (suma_resta=='S')
	           {
	             var nmottotrgo= toFloat(totrgo);
	             var calculo= nmottotrgo + monuni;
	             $(montorgo).value=format(calculo.toFixed(2),'.',',','.');
	             var calculo2= (ncant* nprecio) + monuni;
	             $(totrgo).value=format(calculo2.toFixed(2),'.',',','.');
	           }
	           else if (suma_resta=='R')
	           {
	             $(montorgo).value="0,00";
  	             var nmottotrgo= toFloat(totrgo);
   	             var nmonrec= toFloat(montorgo);
   	             var calculo2= nmottotrgo - nmonrec;
	             $(totrgo).value=format(calculo2.toFixed(2),'.',',','.');
	           }
	         }
	       }
	       }
	       fil++;
	     }
      }
      montoTotal();
      mostrarPromedio();
    }
    else
    {
       var regart=obtener_filas_grid('a',3);
       var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
       var j=0;
	   while (j<regart)
	   {
             var precio="ax_"+fil+"_10";
             var precioe="ax_"+fil+"_11";
	     var cant="ax_"+fil+"_"+colum;
	     var montorgo="ax_"+fil+"_12";
	     var totrgo="ax_"+fil+"_13";

             if ($(precio)){
             if ($(precio).value!="")
             {var nprecio= toFloat(precio);}
             else {var nprecio= toFloat(precioe);}

             var ncant= toFloat(cant);

             $(montorgo).value="0,00";
             if ($(cant).value!="")
             {
               var calc=cant*precio;
               $(totrgo).value=format(calc.toFixed(2),'.',',','.');
             }
             }
        j++;
       }
    }
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
   var nmonfac= toFloat('fafacturpro_monfac');

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
       if (nmonto>nmonfac)
       {
         alert('El Recargo no puede ser aplicado debido a que sobrepasa el Monto Total de la Factura');
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
         montoTotal();
       }
     }
   }
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
         new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=10&cajtexmos='+nombre+'&cajtexcom='+id+'&recfij='+recfij+'&monto='+monto+'&cta='+cta+'&tipo='+tipo+'&monto2='+monto2+'&montot='+montot+'&montot1='+montot1+'&valmonto='+valmonto+'&codigo='+cod})
        }
        else
        {
         alert('El Recargo ya fue asignado');
         $(id).value="";
        }
      }
    }
 }

 function recargo_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var recargo=$(id).value;

   var recargorepetido=false;
   var am=obtener_filas_grid('c',1);
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

  function totalFactura()
  {
    var montot=0;
    var regart=obtener_filas_grid('a',3);
    var fil=0;
    while (fil<regart)
    {
      var precio="ax_"+fil+"_10";
      var precioe="ax_"+fil+"_11";
      var cant="ax_"+fil+"_9";
      var totart="ax_"+fil+"_13";
     if ($(totart)){
      if ($(totart).value!="" && (ValidarNumeroV2VE(totart)==true))
      {
       if (!ValidarNumeroV2VE(cant)) {$(cant).value="0,00";}

       if ($(precio).value!="") {var nprecio= toFloat(precio);}else {var nprecio= toFloat(precioe);}
       var ncant= toFloat(cant);
        montot= montot + (nprecio * cant);
      }
      }
     fil++;
    }

    var totfactura=montot;

    return totfactura;
  }

  function ultimoMarcado()
  {
    var regart=obtener_filas_grid('a',3);
    var fil=0;
    var ultimo=-1;
    while (fil<regart)
    {
      var apldsec="ax_"+fil+"_20";
      if ($(apldsec)){
      if ($(apldsec).checked==true)
      {
        ultimo=fil;
      }
      }
      fil++;
    }
    return ultimo;
  }

  function ajustarDescuento()
  {
    var acumulador=0;
    var diferencia=0
    var regart=obtener_filas_grid('a',3);
    var fil=0;
    while (fil<regart)
    {
      var apldsec="ax_"+fil+"_20";
      var mondesc="ax_"+fil+"_18";
      if ($(mondesc)){
      var nmondesc= toFloat(mondesc);

      if ($(apldsec).checked==true)
      {
        acumulador= acumulador + nmondesc;
      }
      }
      fil++;
    }

    var ndescuento= toFloat('fafacturpro_mondesc');
    var diferencia= redondear((ndescuento - (redondear(acumulador,2))),2);
    var ult=ultimoMarcado();
    var mondesc2="ax_"+ult+"_18";
    if (diferencia!=0 && ult!=-1)
    {
      var nmondesc2=toFloat(mondesc2);
      var mdesc2=nmondesc2 + diferencia;
      $(mondesc2).value=format(mdesc2.toFixed(2),'.',',','.');
    }
  }

 /* function calcularTotalDescuento()
  {
    var miTot=0;
    var regart=obtener_filas_grid('a',3);
    var fil=0;
    while (fil<regart)
    {
      var montodescto="ax_"+fil+"_18";
      if ($(montodescto)){
      $(montodescto).value="0,00";
      }
      fil++;
    }

    var cuantos=marcados("D");
    var regdesc=obtener_filas_grid('b',1);
    if (regdesc>0){
	  var i=0;
	  while (i<regdesc)
	  {
		var tipo="bx_"+i+"_7";
		var mondescto="bx_"+i+"_3";
		var descue="bx_"+i+"_6";
		if ($(tipo)){
		var nmondescto= toFloat(mondescto);
		var ndescue= toFloat(descue);
	    if (cuantos>0)
	    {
	      var j=0;
		  while (j<regart)
		  {
                    var montodescto="ax_"+j+"_18";
		    var apldescto="ax_"+j+"_20";
		    var cant="ax_"+j+"_7";
		    var precio="ax_"+j+"_10";
		    var precioe="ax_"+j+"_11";
		    var montrgo="ax_"+j+"_12";
                   if ($(cant)){
		    var ncant= toFloat(cant);
		    if ($(precio).value!="")
		    {
    	      var nprecio= toFloat(precio);
    	    }
    	    else
    	    {
     	      var nprecio= toFloat(precioe);
    	    }
    	    var nmontodesc= toFloat(montodescto);
            var nmontrgo= toFloat(montrgo);

		    if ($(apldescto).checked==true)
		    {
		      if ($(tipo).value=='M')
		      {
                        var calculo= ncant*nprecio;
                        if (calculo>0)
                        {
                          var propor=Proporcion(j);
                          var cal=nmontodesc + ((nmondescto * propor)/100);
                          $(montodescto).value=format(cal.toFixed(2),'.',',','.');
                        }
		      }
		      else
		      {
		         if ($('fafacturpro_esretencion').value=='N')
	             {
	               var cal=nmontodesc + ((ndescue/100)*(ncant*nprecio));
                       $(montodescto).value=format(cal.toFixed(2),'.',',','.');
	             }
	             else
	             {
	               var cal=nmontodesc + ((ndescue/100)*nmontrgo);
                       $(montodescto).value=format(cal.toFixed(2),'.',',','.');
	             }
		      }
		    }
		    }
		   j++;
		  }
	    }
	     miTot= miTot + nmondescto;
	     }
		i++;
	  }
    }

    if (cuantos>0)
    {
      $('fafacturpro_totdesc').value=format(miTot.toFixed(2),'.',',','.');
    }else {$('fafacturpro_totdesc').value="0,00";}



    $('fafacturpro_mondesc').value=$('fafacturpro_totdesc').value;
    var totadesc= toFloat('fafacturpro_mondesc');
    if ($('fafacturpro_tottotart').value!="")
    {
      var totaltotarti= toFloat('fafacturpro_tottotart');
      var montota= totaltotarti -totadesc;
      $('fafacturpro_monfac').value=format(montota.toFixed(2),'.',',','.');
    }
    ajustarDescuento();
  }*/
  
  function calcularTotalDescuento()
  {
    var miTot=0;
    var regdesc=obtener_filas_grid('b',1);
    if (regdesc>0){
      var i=0;
      while (i<regdesc)
      {
            var tipo="bx_"+i+"_7";
            var mondescto="bx_"+i+"_3";
            if ($(tipo)){
               var nmondescto= toFloat(mondescto);
               miTot= miTot + nmondescto;
            }
            i++;
      }
    }

    $('fafacturpro_totdesc').value=format(miTot.toFixed(2),'.',',','.');
  }  

 function calcularMondesc(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcoddes=col-1;
   var coltipdesc=col+4;
   var colcant=col+2;
   var coldes=col-2;
   var colcuen=col+1;
   var coldesc=col+3;
   var coltipret=col+5;

   var coddes=name+"_"+fil+"_"+colcoddes;
   var tipdesc=name+"_"+fil+"_"+coltipdesc;
   var cant=name+"_"+fil+"_"+colcant;
   var descripcion=name+"_"+fil+"_"+coldes;
   var cuenta=name+"_"+fil+"_"+colcuen;
   var descue=name+"_"+fil+"_"+coldesc;
   var tiporet=name+"_"+fil+"_"+coltipret;

   var monto= toFloat(id);
   var nmonto= toFloat('fafacturpro_monto');
   var nporcdesc= toFloat('fafacturpro_porcentajedescto');
   var calculo= ((nmonto * nporcdesc)/100);

    if ($(id).value=="")
    {
      $(id).value="0,00";
    }

    if ($(coddes).value!="")
    {
      if ($(tipdesc).value=='M')
      {
        //if ((monto > calculo) && $('fafactur_apliclades').value=='S')
        //{
          //alert('El Porcentaje del Descuento sobrepasa el lï¿½mite permitido para el Usuario');
          //$(id).value="0,00";
        //}
      }
      var cuantos=marcados("D");

      if (cuantos==0) {cuantos=1;}
      if ($(tipdesc).value=='M')
      {
        var totfac=totalFactura();
        var totdesct=toFloat('fafacturpro_mondesc');
        if ((monto> totfac) || (totdesct>totfac))
        {
          alert('El Descuento no puede ser aplicado debido a que sobrepasa el Monto Total de la Factura');
          var ntotdesc= toFloat('fafacturpro_totdesc');
          var cal=ntotdesc - monto;

          $('fafacturpro_totdesc').value=format(cal.toFixed(2),'.',',','.');
          $(coddes).value="";
          $(descripcion).value="";
          $(tipdes).value="";
          $(cant).value="1";
          $(id).value="0,00";
          $(cuenta).value="";
          $(descue).value="";
          $(tiporet).value="";
        }
        else
        {
         $(id).value=$(id).value;
         calcularTotalDescuento();
         montoTotal();
         /*actualizarRecargos();
         recalcularRecargos();
         montoTotal();*/
        }
      }
    }
   }
  }

  function descuento_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var descuento=$(id).value;

   var descuentorepetido=false;
   var am=obtener_filas_grid('b',1);
   var i=0;
   while (i<am)
   {
    var codigo="bx"+"_"+i+"_1";
    if ($(codigo))
    {
    var descuento2=$(codigo).value;

    if (i!=fila)
    {
      if (descuento==descuento2)
      {
        descuentorepetido=true;
        break;
      }
    }
    }
   i++;
   }
   return descuentorepetido;
 }

 function ajaxdescuentos(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

    var coldes=col+1;
    var colmonto=col+2;
    var colcta=col+3;
    var colcant=col+4;
    var coldescto=col+5;
    var coltipo=col+6;
    var coltiporet=col+7;
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);

    var descripcion=name+"_"+fil+"_"+coldes;
    var montodesc=name+"_"+fil+"_"+colmonto;
    var cuenta=name+"_"+fil+"_"+colcta;
    var cantidad=name+"_"+fil+"_"+colcant;
    var descuento=name+"_"+fil+"_"+coldescto;
    var tipo=name+"_"+fil+"_"+coltipo;
    var tiporet=name+"_"+fil+"_"+coltiporet;
    var cod=$(id).value;

    var eldesc= "";//montoDescuento(fil);
    /*var nmonfac= toFloat('fafacturpro_monfac');
	var ntotmonrgo= toFloat('fafacturpro_totmonrgo');
	var ntotdesc= toFloat('fafacturpro_totdesc');
	var porcentajedesc=toFloat('fafacturpro_porcentajedescto');
	var monto=toFloat('fafacturpro_monto');
	var aplicaclades=''; //$('fafacturpro_apliclades').value;
	var valmontodesc= toFloat(montodesc);
	var valcant=toFloat(cantidad);
	var totaltotarti= toFloat('fafacturpro_tottotart');*/
        
        var mifila=$('fafacturpro_filactdes').value;        
        var cant="ax"+"_"+mifila+"_"+colum;
          var precio="ax_"+mifila+"_10";
          var precioe="ax_"+mifila+"_11";
          if ($(precio)){
             if ($(precio).value!="") {var moncos=toFloat(precio);}else {var moncos=toFloat(precioe);}
          }  
          var descto="ax"+"_"+mifila+"_18";
          var recargo="ax"+"_"+mifila+"_12";
          
         var cal=(toFloat(cant)*moncos)+toFloat(recargo)-toFloat(descto);
         var nmonfac=cal;
	 var ntotmonrgo= toFloat(recargo);
	 var ntotdesc= toFloat(descto);
	 var porcentajedesc=toFloat('fafacturpro_porcentajedescto');
	 var monto=toFloat(cant)*moncos;
	 var aplicaclades=""; //$('fafacturpro_apliclades').value;
	 var valmontodesc= toFloat(montodesc);
	 var valcant=toFloat(cantidad);
	 var totaltotarti= toFloat('fafacturpro_tottotart');          


    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
        if (!descuento_repetido(id))
       {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=11&cajtexmos='+descripcion+'&cajtexcom='+id+'&montodesc='+montodesc+'&cuenta='+cuenta+'&cantidad='+cantidad+'&tipo='+tipo+'&tiporet='+tiporet+'&descuento='+descuento+'&eldescuento='+eldesc+'&monfac='+nmonfac+'&totalrgo='+ntotmonrgo+'&totaldesc='+ntotdesc+'&porcentajedesc='+porcentajedesc+'&monto14='+monto+'&aplicaclades='+aplicaclades+'&valmontodesc='+valmontodesc+'&valcant='+valcant+'&totaltotarti='+totaltotarti+'&codigo='+cod})
       }
       else
       {
         alert('El Descuento ya fue asignado');
         $(id).value="";
       }
      }
    }
 }



function rellenarcorr(id)
    {
        if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0)
    }

function aplicarBL(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

   if (fil==0) {
       reg=obtener_filas_grid('a',2);
        var j=1;
        while (j<reg)
        {
          var billindg="ax_"+j+"_30";
          $(billindg).value=$(id).value;
         j++;
        }
   }
  }

  function calculardif(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var num=toFloat(id);

    if (num>0) {

    if (col==47 || col==48)
    {
        var ko=name+"_"+fil+"_47";
        var ke=name+"_"+fil+"_48";
        var dk=name+"_"+fil+"_49";
        var to=name+"_"+fil+"_53";
        var te=name+"_"+fil+"_54";
        var dt=name+"_"+fil+"_55";

        var num1=toFloat(ko);
        var num2=toFloat(ke);
        var resta= num1 - num2;
        if (col==47)
        {
            var cal=num1/1000;
            $(to).value=format(cal.toFixed(2),'.',',','.');
        }

        if (col==48)
        {
          var cal2=num2/1000;
            $(te).value=format(cal2.toFixed(2),'.',',','.');
        }

        var num5=toFloat(to);
        var num6=toFloat(te);
        var resta2= num5 - num6;

        $(dt).value=format(resta2.toFixed(2),'.',',','.'); //diferencia Toneladas
        $(dk).value=format(resta.toFixed(2),'.',',','.'); //diferencia kilogramos
    }

    if (col==50 || col==51)
    {
        var co=name+"_"+fil+"_50";
        var ce=name+"_"+fil+"_51";
        var dc=name+"_"+fil+"_52";

        var num3=toFloat(co);
        var num4=toFloat(ce);
        var resta1= num3 - num4;

        $(dc).value=format(resta1.toFixed(2),'.',',','.');
    }

    if (col==53 || col==54)
    {
        var to=name+"_"+fil+"_53";
        var te=name+"_"+fil+"_54";
        var dt=name+"_"+fil+"_55";
        var ko=name+"_"+fil+"_47";
        var ke=name+"_"+fil+"_48";
        var dk=name+"_"+fil+"_49";

        var num5=toFloat(to);
        var num6=toFloat(te);
        var resta2= num5 - num6;

        if (col==53)
        {
            var cal=num5*1000;
            $(ko).value=format(cal.toFixed(2),'.',',','.');
        }
        if (col==54)
        {
            var cal2=num6*1000;
            $(ke).value=format(cal2.toFixed(2),'.',',','.');
        }

        var num1=toFloat(ko);
        var num2=toFloat(ke);
        var resta= num1 - num2;

        $(dk).value=format(resta.toFixed(2),'.',',','.'); //diferencia kilogramos
        $(dt).value=format(resta2.toFixed(2),'.',',','.'); //diferencia Toneladas
    }
  }else {
      alert("El Valor introducido debe ser mayor a cero");
      $(id).value="0,00";
  }

}

function validarEstatus(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var estreal=col+3;
    var idestreal=name+"_"+fil+"_"+estreal;

    if ($(idestreal).value=='P')
    {
      alert("Este estatus es solo de consulta, no se puede modificar");
      $(id).value=$(idestreal).value;
    }else {
        if ($(id).value=='P')
        {
          alert("Este estatus es solo de consulta, no se puede utilizar");
          $(id).value=$(idestreal).value;
        }
    }
}

 function retornaMonto(codrgo)
 {
    var monTot=calcularMontTot();
        var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    if (monTot!=0)
    {
	    var regart=obtener_filas_grid('a',3);
	    var i=0;
	    while (i<regart)
	    {
	      var codart="ax_"+i+"_3";
	      var precio2="ax_"+i+"_10";
	      var precioe2="ax_"+i+"_11";
	      var cant2="ax_"+i+"_"+colum;
	      if ($(codart)){

	      if ($(precio2).value!="") {var nprecio2= toFloat(precio2);}else {nprecio2= toFloat(precioe2);}
	      var ncant2= toFloat(cant2);

	      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&articulo='+codart+'&recargo='+codrgo})
	      if ($('fafacturpro_trajo').value=='S')
	      {
	       if ($(cant2).value!="" && $(precio2).value!="")
	       {
	         monTot= monTot - (nprecio2 * ncant2);
	       }
	     }
	     }
	     i++;
	    }
	 }
    return monTot;
 }

function retornaMontoMod(codrgo)
 {
    var monTot=calcularMontTotMod();
        var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    if (monTot!=0)
    {
	    var mifila=$('fafacturpro_filactrec').value;        
            var cant2="ax"+"_"+mifila+"_"+colum;
            var precio2="ax_"+mifila+"_10";
            var precioe2="ax_"+mifila+"_11";
            var codart="ax"+"_"+mifila+"_3";
	      if ($(codart)){

	      if ($(precio2).value!="") {var nprecio2= toFloat(precio2);}else {nprecio2= toFloat(precioe2);}
	      var ncant2= toFloat(cant2);

	      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&articulo='+codart+'&recargo='+codrgo})
	      if ($('fafacturpro_trajo').value=='S')
	      {
	       if ($(cant2).value!="" && $(precio2).value!="")
	       {
	         monTot= monTot - (nprecio2 * ncant2);
	       }
	     }
	     }
         }
    return monTot;
 }

 function retornaMonto2(codrgo)
 {
    var monTot=montoMarcados();
    var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
    var regart=obtener_filas_grid('a',3);
    var i=0;
    while (i<regart)
    {
      var check="ax_"+i+"_1";
      var codart="ax_"+i+"_3";
      var precio2="ax_"+i+"_10";
      var precioe2="ax_"+i+"_11";
      var cant2="ax_"+i+"_"+colum;

     if ($(codart)){
      if ($(precio2).value!="") {var nprecio2= toFloat(precio2);}else {nprecio2= toFloat(precioe2);}
      var ncant2= toFloat(cant2);

      if ($(check).checked==true)
      {
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&articulo='+codart+'&recargo='+codrgo})
        if ($('fafacturpro_trajo').value=='S')
        {
         if ($(cant2).value!="" && $(precio2).value!="")
         {
           monTot= monTot - redondear((nprecio2 * ncant2),2);
          }
        }
      }
      }
       i++;
    }
    return monTot;
 }

 function grid_recargos_lost_focus(id)
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
    var montot=retornaMonto(cod);
    var montot1=retornaMonto2(cod);
    var valmonto=$(monto).value;

      if ($(id).value!="")
      {
        if (!recargo_repetido(id))
        {
         new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=10&cajtexmos='+nombre+'&cajtexcom='+id+'&recfij='+recfij+'&monto='+monto+'&cta='+cta+'&tipo='+tipo+'&monto2='+monto2+'&montot='+montot+'&montot1='+montot1+'&valmonto='+valmonto+'&codigo='+cod})
        }
        else
        {
         alert('El Recargo ya fue asignado');
         $(id).value="";
        }
      }
  }
  
 function mostrargridrecargos(id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codart=name+"_"+fil+"_3";
    var chk="ax"+"_"+fil+"_1";
    if ($(chk).checked==true)
    {
	 if ($(codart).value!="")
	 {
	    if ($('fafacturpro_reffac').value=='########') var reffac=''; else var reffac=$('fafacturpro_reffac').value;
	    var articulo=$(codart).value;
            $('fafacturpro_filactrec').value=fil;

	    new Ajax.Updater('divgrid_fargoartpro', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirRecargosenGrid(); $('divgrid_fargoartpro').show(); $('divtotrec').show();}, parameters:'ajax=12&articulo='+articulo+'&reffac='+reffac})
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
     var j=$('fafacturpro_filactrec').value;
     var haydist="ax"+"_"+j+"_61";
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
         NuevaFilaGrid('c');
         z++;
        }
        calcularTotalRecargos();
      }
 }
 
function salvarmontorecargos()
{
  var cadena='';
  var fil=0;
  var ab=obtener_filas_grid('c',1);
  while (fil<ab)
  {
      var codrgo="cx"+"_"+fil+"_1";
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
      fil++;
  }

  var moncos=0;
  var mifila=$('fafacturpro_filactrec').value;
  var infrecargos="ax"+"_"+mifila+"_61";
  var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);  
  var cant="ax"+"_"+mifila+"_"+colum;
  var precio="ax_"+mifila+"_10";
  var precioe="ax_"+mifila+"_11";
  if ($(precio)){
     if ($(precio).value!="") { moncos=toFloat(precio);}else { moncos=toFloat(precioe);}
  }  
  var descto="ax"+"_"+mifila+"_18";
  var recargo="ax"+"_"+mifila+"_12";
  var total="ax"+"_"+mifila+"_13";

  $(infrecargos).value=cadena;
  $(recargo).value=$('fafacturpro_totrec').value;

  var recfil=toFloat('fafacturpro_totrec');
  var canti=toFloat(cant);
  var mondto=toFloat(descto);
  var monnet= canti*moncos;

  montottot=monnet-mondto+recfil;
  $(total).value=format(montottot.toFixed(2),'.',',','.');

  $('divgrid_fargoartpro').hide();
  $('divtotrec').hide();
  montoTotal();
} 
 
 function mostrargriddescuentos(id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codart=name+"_"+fil+"_3";
    var chk="ax"+"_"+fil+"_1";
    if ($(chk).checked==true)
    {
	 if ($(codart).value!="")
	 {
	    if ($('fafacturpro_reffac').value=='########') var reffac=''; else var reffac=$('fafacturpro_reffac').value;
	    var articulo=$(codart).value;
            $('fafacturpro_filactdes').value=fil;

	    new Ajax.Updater('grid_fadescartpro', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirDescuentosenGrid(); $('divgrid_fadescartpro').show(); $('divtotdesc').show();}, parameters:'ajax=13&articulo='+articulo+'&reffac='+reffac})
 	}
	else
	{
		alert_("Debe introducir el Art&iacute;culo antes de los cargar los Descuentos..");
	}
   }
   else
   {
     alert("Debe marcar la primera casilla (Marque) antes de cargar los Descuentos..");
   }
}

 function distribuirDescuentosenGrid()
 {
     var j=$('fafacturpro_filactdes').value;
     var haydist="ax"+"_"+j+"_62";
     if ($(haydist).value!="")
      {
        var distrib=$(haydist).value;
        var aux2=distrib.split("!");

        var z=0;
        while (z<((aux2.length)-1))
        {
         var reg=aux2[z];
         var aux3=reg.split("_");
         var ccoddesc=aux3[0];
         var cdesdesc=aux3[1];
         var cmondesc=aux3[2];
         var ccodcta=aux3[3];
         var ccantidad=aux3[4];
         var cmontdesc=aux3[5];
         var ctipdesc=aux3[6];
         var ctipret=aux3[7];


         var coddesc="bx"+"_"+z+"_1";
         var desdesc="bx"+"_"+z+"_2";
         var mondesc="bx"+"_"+z+"_3";
         var codcta="bx"+"_"+z+"_4";
         var cantidad="bx"+"_"+z+"_5";
         var montdesc="bx"+"_"+z+"_6";
         var tipdesc="bx"+"_"+z+"_7";
         var tipret="bx"+"_"+z+"_8";


         $(coddesc).value=ccoddesc;
         $(desdesc).value=cdesdesc;
         $(mondesc).value=cmondesc;
         $(codcta).value=ccodcta;
         $(cantidad).value=ccantidad;
         $(montdesc).value=cmontdesc;
         $(tipdesc).value=ctipdesc;
         $(tipret).value=ctipret;
         NuevaFilaGrid('b');
         z++;
        }
        ActualizarSaldosGrid("b",ArrTotales_b);

      }
 }

function salvarmontodescuentos()
{
  var cadena='';
  var fil=0;
  var ab=obtener_filas_grid('b',1);
  while (fil<ab)
  {
      var coddesc="bx"+"_"+fil+"_1";
      if ($(coddesc).value!="")
      {
	var desdesc="bx"+"_"+fil+"_2";
    	var mondesc="bx"+"_"+fil+"_3";
    	var codcta="bx"+"_"+fil+"_4";
    	var cantidad="bx"+"_"+fil+"_5";
        var montdesc="bx"+"_"+fil+"_6";
        var tipdesc="bx"+"_"+fil+"_7";
        var tipret="bx"+"_"+fil+"_8";
        
	cadena=cadena + $(coddesc).value+'_' + $(desdesc).value+'_' + $(mondesc).value +'_'+ $(codcta).value+'_' + $(cantidad).value+'_' + $(montdesc).value+'_' + $(tipdesc).value + '_' + $(tipret).value + '!';
      }      
      fil++;
  }


  var mifila=$('fafacturpro_filactdes').value;
  var infdescuentos="ax"+"_"+mifila+"_62";
  var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);  
  var cant="ax"+"_"+mifila+"_"+colum;
  var precio="ax_"+mifila+"_10";
  var precioe="ax_"+mifila+"_11";
  if ($(precio)){
     if ($(precio).value!="") {var moncos=toFloat(precio);}else {var moncos=toFloat(precioe);}
  }  
  var descto="ax"+"_"+mifila+"_18";
  var recargo="ax"+"_"+mifila+"_12";
  var total="ax"+"_"+mifila+"_13";

  $(infdescuentos).value=cadena;
  $(descto).value=$('fafacturpro_totdesc').value;

  var recfil=toFloat(recargo);
  var canti=toFloat(cant);
  var mondto=toFloat('fafacturpro_totdesc');
  var monnet= canti*moncos;

  montottot=monnet-mondto+recfil;
  $(total).value=format(montottot.toFixed(2),'.',',','.');

  $('divgrid_fadescartpro').hide();
  $('divtotdesc').hide();
  montoTotal();
}

function marcarTodoMod()
  {
   $('fafactur_marrec').checked=false;
   var colum=determinarReferenciaDoc($('fafactur_tipref').value);  
   var infrecargos="ax"+"_0_61";
   var motrecargos="ax"+"_0_12";
   var distrib2=toFloat(motrecargos);
   var distrib=$(infrecargos).value;
   var articulo="ax"+"_0_3";
   var valorarticulo=$(articulo).value;
   if (valorarticulo!="")
   {
    if (distrib!="" && distrib2>0)
    {
        var fil=1;
        var facart=obtener_filas_grid('a',3);
        while (fil<facart)
        {
          var codart="ax_"+fil+"_3";
          if ($(codart).value!="")
          {
           var check="ax"+"_"+fil+"_1";
           var precio="ax_"+fil+"_10";
           var precioe="ax_"+fil+"_11";
           if ($(precio)){
             if ($(precio).value!="") {var moncos=toFloat(precio);}else {var moncos=toFloat(precioe);}
           }  
           var cant="ax"+"_"+fil+"_"+colum;
           var dest="ax"+"_"+fil+"_18";
           var recargo="ax"+"_"+fil+"_12";
           var total="ax"+"_"+fil+"_13";
           var haydistribucion="ax"+"_"+fil+"_61";

           var moncant=toFloat(cant);
           var mondto=toFloat(dest);
           var monuni=moncos*moncant;
           var monrgotot=0;
           var cadena="";

           var z=0;
           var aux2= distrib.split("!");
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

                if (ctipo=='M')
                {
                  cmonrgo=toFloat2(cmonrgo2);
                }
                else if (ctipo=='P')
                {
                 cmonrgo= ((monuni*toFloat2(cmonrgo2))/100);
                }
                else
                {cmonrgo=0;}

                cmonrgofor=format(cmonrgo.toFixed(2),'.',',','.');
                cadena=cadena + ccodrgo+'_' + cnomrgo+'_' + crecfij +'_'+ cmonrgofor +'_'+ ccodcta +'_'+ ctipo+'_' + cmonrgo2 + '!';
                monrgotot=monrgotot+cmonrgo;
            z++;
            }//while

                $(haydistribucion).value=cadena;
                $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
                montottot=monuni-mondto+monrgotot;
                $(total).value=format(montottot.toFixed(2),'.',',','.');
                $(check).checked=true;
          }
	   fil++;
	}        
        montoTotal();
	   
   }// if (distrib!="")
   else
   {
    alert_("No han sido aplicados Recargos al primer Art&iacute;culo del Detalle, C&oacute;digo: "+ valorarticulo+". Deben ser definidos estos Recargos para poder replicarlos al resto de los Art&iacute;culo del Detalle de la Factura ")
   }
  }
  }

  function desmarcarTodoMod()
  {
     $('fafactur_desrec').checked=false;
     var fil=1;
     var facart=obtener_filas_grid('a',3);
     var colum=determinarReferenciaDoc($('fafactur_tipref').value);
     while (fil<facart)
     {
      var codart="ax"+"_"+fil+"_3";
      if ($(codart).value!="")
      {
       var id="ax"+"_"+fil+"_1";
       var precio="ax_"+fil+"_10";
       var precioe="ax_"+fil+"_11";
       var cant="ax_"+fil+"_"+colum;
       var dest="ax"+"_"+fil+"_18";
       var recargo="ax_"+fil+"_12";
       var total="ax"+"_"+fil+"_13";
       var datrec="ax"+"_"+fil+"_61";

         if ($(precio)){
	     if ($(precio).value!="") {var col9=toFloat(precio);}else {var col9=toFloat(precioe);}
         }
         var colcant=toFloat(cant);

         var monuni= colcant * col9;
	 var mondto=toFloat(dest);

	 var monrgotot=0;

         $(recargo).value=format(monrgotot.toFixed(2),'.',',','.');
         montottot=monuni-mondto;
	 $(total).value=format(montottot.toFixed(2),'.',',','.');
         $(datrec).value="";
	 $(id).checked=false;

      }//if ($(codart).value!="")
      else
      {
       fil=facart;
      }
      fil++;
    }//while (fil<facart)
    montoTotal();

  }  
  
   function aplicarRecanterior(ida)
  {
     var aux = ida.split("_");
     var name=aux[0];
     var fil=parseInt(aux[1]);
     var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);  

     var infrecargos="ax"+"_0_61";
     var distrib=$(infrecargos).value;
     var articulo="ax"+"_0_3";
     var valorarticulo=$(articulo).value;
     if (valorarticulo!="" && fil!=0)
     {
       if (distrib!="")
       {
        if (fil!=0)
        {
	      var codart="ax"+"_"+fil+"_3";
	      var total="ax"+"_"+fil+"_13";
	      var ntotal=toFloat(total);

	      if ($(codart).value!="" && ntotal>0)
	      {
	        var id="ax"+"_"+fil+"_1";
	        var precio="ax_"+fil+"_10";
          var precioe="ax_"+fil+"_11";
          if ($(precio)){
           if ($(precio).value!="") {var moncos=toFloat(precio);}else {var moncos=toFloat(precioe);}
          }
	       var cant="ax"+"_"+fil+"_"+colum;
	       var dest="ax"+"_"+fil+"_18";
	       var recargo="ax"+"_"+fil+"_12";
	       var haydistribucion="ax"+"_"+fil+"_61";

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
         var cmonrgo=aux3[3];
         var ccodcta=aux3[4];
         var ctipo=aux3[5];
         var cmonrgo2=aux3[6];

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
    montoTotal();
   }// if (distrib!="")
   else
   {
    alert_("No han sido aplicados Recargos al primer Art&iacute;culo del Detalle, C&oacute;digo: "+ valorarticulo+". Deben ser definidos estos Recargos para poder replicarlos al resto de los Art&iacute;culo de la Factura ")
   }
  }
  }    
  
  function cambios()
 {
   if ($('fafacturpro_tipref').value=='P')
   {
   	     //$$('.botoncat')[2].hide();
         $('pedid').show();
   }
   if ($('fafacturpro_tipref').value=='V')
   {
   	     $$('.botoncat')[2].show();
         $('pedid').hide();
   }

   var tipref=$('fafacturpro_tipref').value;
   new Ajax.Updater('divgrid_faartfacpro',getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=14&tipref='+tipref})
 }  
 
   function canentregar(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colmonrgo=col+4;
   var coltotal=col+5;
   var coldistot=col+6;
   var colcanpreart=col+8;
   var colcansol=col-1;
   var colblanco=col+13;
   var colart=col-5;
   var colprec=col+2;
   var colprec2=col+3;
   var colexis=col-2;


   var canpreart=name+"_"+fil+"_"+colcanpreart;
   var monrgo=name+"_"+fil+"_"+colmonrgo;
   var total=name+"_"+fil+"_"+coltotal;
   var cansol=name+"_"+fil+"_"+colcansol;
   var distot=name+"_"+fil+"_"+coldistot;
   var blanco=name+"_"+fil+"_"+colblanco;
   var codart=name+"_"+fil+"_"+colart;
   var exist=name+"_"+fil+"_"+colexis;
   var cod=$(codart).value;
   var precio=name+"_"+fil+"_"+colprec;
   var precio2=name+"_"+fil+"_"+colprec2;

//var nf=parseInt($('fafactur_numfilas').value);
   var am=obtener_filas_grid('a',3);//totalregistros('ax',3,nf);

   if ($(precio).value!="") {var num4=toFloat(precio);}else {var num4=toFloat(precio2);}
   var num1=toFloat(id);
   var num0=toFloat(cansol);
   var num3=toFloat(distot);
   var num6=toFloat(canpreart);

  if (am>0 && $(id).value!="")
  {
   if ($(id).value!="")
   {
	   if (!validarnumero(id))
	   {
	    alert_('El Dato debe ser n&uacute;merico');
	    $(id).value="0,00";
	    $(total).value="0,00";
	   }
	   else if (num1<0)
	   {
	    alert('El valor debe ser mayor que cero');
	    $(id).value="0,00";
	    $(total).value="0,00";
	   }
	   else
	   {
	     if ($(distot).value!="" && $(canpreart).value!="")
	     {
           if ($(blanco).value=='S' || num3>0)
           {
             if (num1<=num6)
             {
               var canent=cantidadEntregarArt(fil,cod);
               if ($(blanco).value=='S' || (num1<=(num3-canent)))
               {
                 if(num1<=num0)
                 {
                    var cal=num3-num1-canent;
                    $(exist).value=format(cal.toFixed(2),'.',',','.');
                    distribuirexistencia(fil,cod);
                 }
                 else
                 {
                   alert_('La Cantidad a Entregar excede a la Cantidad Solicitada del Art&iacute;culo');
                   $(id).value="0,00";
                   $(total).value="0,00";
                 }
               }
               else
               {
                 alert_('La Cantidad Solicitada excede de la existencia del Art&iacute;culo');
                 $(id).value="0,00";
                 $(total).value="0,00";
               }
             }
             else
             {
               alert('La Cantidad a Entregar excede a la Cantidad Solicitada del Articulo');
               if (num6<num1)
               {
                $(id).value=$(colcanpreart).value;
               }
               else
               {
                 $(id).value="0,00";
        	     $(monrgo).value="0,00";
           	     $(total).value="0,00";
               }
             }

             if ($(precio).value!="" || $(precio2).value!="")
             {
               var producto= num4*num1;
               if (!validarnumero(monrgo))
               {
                 if ($('id').value=="")
                 {
                   $(monrgo).value="0,00";
                 }
                 recalcularecargos(id);
	       }

               var calmontot=calcularMontTot();
               if (calmontot>0)
               {
                  var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);

                    //var nf=parseInt($('fafactur_numfilas').value);
                    var colart=obtener_filas_grid('a',3);//totalregistros2('ax',3,nf);
                    var fi=0;
                        while (fi<colart)
                        {
                          var monreg="ax_"+fi+"_12";
                          var totales="ax_"+fi+"_13";
                          var precios="ax_"+fi+"_10";
                          var precios2="ax_"+fi+"_11";
                          var cant="ax_"+fi+"_"+colum;

                         if ($(precios)){
                              if ($(precios).value!="") {var nprecio=toFloat(precios);}else{var nprecio=toFloat(precios2);}
                              var ncant=toFloat(cant);

                          var sumtot=nprecio*ncant;
                          $(monreg).value="0,00";
                          $(totales).value=format(sumtot.toFixed(2),'.',',','.');
                          }
                         fi++;
                        }
               }
               recalcularecargos(id);
               var num5=toFloat(monrgo);
               var calculo=producto+num5;
               $(total).value=format(calculo.toFixed(2),'.',',','.');
             }
           }
           else
           {
             alert_('No Hay Disponibilidad para el Art&iacute;culo: '+cod);
             $(id).value="0,00";
           }
         }
       }
    }
    else
    {
      $(id).value="0,00";
    }
    mostrarPromedio();
  }
    mostrarPromedio();
 }
}
 
function despachos_pedido()
 {
   if ($('fafacturpro_rifpro').value!="")
   {
     var cirif=$('fafacturpro_codcli').value;
     var tipref=$('fafacturpro_tipref').value;
     new Ajax.Updater('divgrid_fapedartpro',getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=15&tipref='+tipref+'&cedula='+cirif})
   }
   else
   {
     alert_('Debe Introducir la C.I/R.I.F del Cliente');
   }
 } 
 
 function ocul_ped_des()
 {
   $('fafacturpro_rgofijos').value='S';
   var am=obtener_filas_grid('e',2);
   if (am>0)
   {
       var fil=0;
       var filrow=0;
       while (fil<am)
       {
        var chk="ex_"+fil+"_1";
        var codref="ex_"+fil+"_2";
        var desref="ex_"+fil+"_3";        
        if ($(chk)){
            if ($(chk).checked==true)
            {
             var codigoref= $(codref).value;
             $('fafacturpro_desfac').value=$('fafacturpro_desfac').value+$(desref).value+", ";
             var bc=totalregistros2('ax',3,obtener_filas_grid('a',3));
             var codart="ax_0_3";
             if (bc>=1 &&  $(codart).value!="")
             {
               var filrow=bc;
             }
             else
             {
               if (bc==0)
               {
                var filrow=bc;
               }
             }
             var codart2="ax_"+filrow+"_3";
             if ($(codart2).value=="")
             {
               gridarticulosfocus(filrow,codigoref);
             }
            }
        }
       fil++;
       }
   }
   else
   {
     $('divgrid_fapedartpro').hide();
   }
 } 
 
   function referencia_repetida(codrefe,fila)
 {
   var referenciarepetida=false;
   var am=obtener_filas_grid('a',3);//totalregistros2('ax',3,nf);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_2";
    if ($(codigo))
    {
    var codrefe2=$(codigo).value;

    if (i!=fila)
    {
      if (codrefe==codrefe2)
      {
        referenciarepetida=true;
        break;
      }
    }
    }
   i++;
   }
   return referenciarepetida;
 }
 
 function gridarticulosfocus(filrow,codigoref)
 {
   var codrefe="ax_"+filrow+"_2";
   if ($(codrefe).value!="")
   {
    $(codrefe).value=$(codrefe).value.pad(8, '0',0);
    var codigoref=$(codrefe).value;
   }
   var tipref=$('fafacturpro_tipref').value;
   if (!referencia_repetida(codigoref,filrow))
   {
     new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=16&codrefer='+codigoref+'&tipref='+tipref})
   }
   else
   {
    if (tipref=='P')
    {
      alert('El Pedido ya fue Seleccionado');
    }    
    $('divgrid_fapedartpro').hide();
    var aux=$('fafacturpro_desfac').value.split(',');
    $('fafacturpro_desfac').value="";
    var j=0;
    while (j<((aux.length)-2))
    {
     $('fafacturpro_desfac').value=$('fafacturpro_desfac').value+aux[j]+",";
     j++;
    }
   }
 }

 function colocarArticulos(arreglo)
 {
   var filastot=totalregistros('ax',3,obtener_filas_grid('a',3));//totalregistros('ax',3,nf);
   var aux=arreglo.split('!');   
   var i=0;
   while (i< (aux.length-1))
   {
     var aux2=aux[i].split('_');
     var check="ax"+"_"+filastot+"_1";
     var codref="ax"+"_"+filastot+"_2";
     var codart="ax"+"_"+filastot+"_3";
     var desart="ax"+"_"+filastot+"_4";
     var unimed="ax"+"_"+filastot+"_5";
     var exiart="ax"+"_"+filastot+"_6";
     var cansol="ax"+"_"+filastot+"_7";
     var canent="ax"+"_"+filastot+"_8";
     var candes="ax"+"_"+filastot+"_9";
     var precio="ax"+"_"+filastot+"_10";
     var precio2="ax"+"_"+filastot+"_11";
     var monrgo="ax"+"_"+filastot+"_12";
     var total="ax"+"_"+filastot+"_13";
     var cant="ax"+"_"+filastot+"_14";
     var preant="ax"+"_"+filastot+"_15";
     var canentart="ax"+"_"+filastot+"_16";
     var ctapro="ax"+"_"+filastot+"_17";
     var mondes="ax"+"_"+filastot+"_18";
     var r="ax"+"_"+filastot+"_19";
     var d="ax"+"_"+filastot+"_20";
     var blanco1="ax"+"_"+filastot+"_21";
     var blanco2="ax"+"_"+filastot+"_22";

   if (aux2[0]=='0')
     $(check).checked=false;
   else
     $(check).checked=true;
     $(codref).value=aux2[1];
     $(codart).value=aux2[2];
     $(desart).value=aux2[3];
     $(unimed).value=aux2[4];
     $(exiart).value=aux2[5];
     $(cansol).value=aux2[6];
     $(canent).value=aux2[7];
     $(candes).value=aux2[8];
     $(precio).value=aux2[9];
     $(precio2).value=aux2[10];
     $(monrgo).value=aux2[11];
     $(total).value=aux2[12];
     $(cant).value=aux2[13];
     $(preant).value=aux2[14];
     $(canentart).value=aux2[15];
     $(ctapro).value=aux2[16];
     $(mondes).value=aux2[17];
     $(r).value=aux2[18];
     if (aux2[19]=='0')
       $(d).checked=false;
     else $(d).checked=true;
     $(blanco1).value=aux2[20];
     $(blanco2).value=aux2[21];

    if ($('fafacturpro_tierecar').value=='S')
     {
       new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=19&referencia='+$(codref).value+'&tipref='+$('fafacturpro_tipref').value+'&fila='+filastot+'&ida='+codart+'&codart='+$(codart).value})
     }
    
     filastot=filastot + 1;
     NuevaFilaGrid('a');
     i++;
   }
 } 
 
function recalcularecargos(id)
  {
      var colum=determinarReferenciaDoc($('fafacturpro_tipref').value);
        var i=id.split('_');
        var fil=i[1];
        var id1="ax"+"_"+fil+"_1";
        var precio="ax_"+fil+"_10";
       var precioe="ax_"+fil+"_11";
        var cant="ax"+"_"+fil+"_"+colum;
        var dest="ax"+"_"+fil+"_18";
        var recargo="ax"+"_"+fil+"_12";
        var total="ax"+"_"+fil+"_13";
        var infrecargos="ax"+"_"+fil+"_61";

         if ($(precio)){
	     if ($(precio).value!="") {var moncos=toFloat(precio);}else {var moncos=toFloat(precioe);}
         }

        var moncant=toFloat(cant);
        var mondto=toFloat(dest);
        var monuni=moncos*moncant;

        var monrgotot=0;
        var cadena="";

        if ($(id1).checked==true)
        {
		  var haydist="ax"+"_"+fil+"_61";
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

			if (ctipo=='M')
			{
			  cmonrgo=toFloat2(cmonrgo2);
			}
			else if (ctipo=='P')
			{
			 cmonrgo= ((monuni*toFloat2(cmonrgo2))/100);
			}
			else
			{cmonrgo=0;}

                        cmonrgofor=format(cmonrgo.toFixed(2),'.',',','.');
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
		 montoTotal();
 } 

 function colocarRecargosgrid(cadena,fila1,ida)  
{
     var aux = ida.split("_");
     var name=aux[0];
     var fil=parseInt(aux[1]);

     var distrib=cadena;
     var articulo="ax"+"_"+fila1+"_3";
     var valorarticulo=$(articulo).value;
     if (valorarticulo!="")
     {
       if (distrib!="")
       {
         var haydistribucion="ax"+"_"+fil+"_61";

         $(haydistribucion).value=distrib;
       }
     }     
} 