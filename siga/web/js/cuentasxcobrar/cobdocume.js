
function CalculaRecargos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colmonrec=col+1;
    var monrec=name+"_"+fil+"_"+colmonrec;
    var mondoc=$('cobdocume_mondoc').value;
    var monexo=$('cobdocume_monexo').value;
	toAjax(3,getUrlModulo()+'ajax',$(id).value,'ActualizarSaldosGrid("a",new Array("cobdocume_recdoc"));totalizar()','&monrec='+monrec+'&monexo='+monexo+'&mondoc='+mondoc+'');
}

function totalizar()
{
  var monrec=toFloat('cobdocume_recdoc');
  var dscdoc=toFloat('cobdocume_dscdoc');
  var abodoc=toFloat('cobdocume_abodoc');
  var mondoc=toFloat('cobdocume_mondoc');

   var tototal= mondoc+monrec-dscdoc+abodoc;

   $('cobdocume_saldoc').value=format(tototal.toFixed(2),'.',',','.');

}

function CalculaDescuentos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colmondes=col+1;
    var mondes=name+"_"+fil+"_"+colmondes;
    var mondoc=$('cobdocume_mondoc').value;
    var monrec=$('cobdocume_recdoc').value;

	toAjax(4,getUrlModulo()+'ajax',$(id).value,'ActualizarSaldosGrid("b",new Array("cobdocume_dscdoc"));totalizar()','&mondes='+mondes+'&mondoc='+mondoc+'&monrec='+monrec+'');
}

function cargardatosfor()
{
  toAjaxUpdater('gridfor',2,getUrlModuloAjax(),'valor','ActualizarSaldosGrid("b",new Array("cobtransa_tottra"));','');
}

 function apagar(e,id)
 {
  if (e.keyCode==13 || e.keyCode==9)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   if ($('cobtransa_intercamfil').value=='S')
     var colsaldoc=col+2;
   else
     var colsaldoc=col-1;
   var colmarca=col+6;
   var saldoc=name+"_"+fil+"_"+colsaldoc;
   var marca=name+"_"+fil+"_"+colmarca;
   var recar=name+"_"+fil+"_8";
   var desc=name+"_"+fil+"_9";

   var montoant=0;
   montoant=toFloat(saldoc);
   var num1=toFloat(id);
   var num2=toFloat(recar);
   var num3=toFloat(desc);
   if ($(id).value!="-")
   {
      if (validarnumero(id))
	  {
        if (num1>montoant)
        {
          alert('El Monto a Pagar No Puede ser Mayor a la Diferencia del Monto del Documento Con el Monto Pagado');         
          $(id).value=format(montoant.toFixed(2),'.',',','.');
          $(marca).value="O";
        }

        if (num1<montoant)
        {           
          $(id).value=format(num1.toFixed(2),'.',',','.');
          $(marca).value="O";
        }

        if ($(id).value=='0,00')
        {          
          $(id).value=format(montoant.toFixed(2),'.',',','.');
          $(marca).value="O";
        }
	    sumar_datos_grid();
	  }
	  else
	  {
        alert_('El Dato debe ser n&uacute;merico');
	    $(id).value="0,00";
	    if($(marca).value=="O")
	    {
          $(marca).value="";
	    }
	    sumar_datos_grid();
	  }
   }
   else
   {
    $(id).value="0,00";
    if($(marca).value=="O")
    {
      $(marca).value="";
    }
    sumar_datos_grid();
   }
   $(id).value=$(id).value;
  }
  }

  function sumar_datos_grid()
  {
    var totmonpag=0;
    var totmonrec=0;
    var totmondes=0;
    var totmonnet=0;

    var i=0;
    var filas=parseInt($('cobtransa_filasdet').value);
    while (i<filas)
    {
      if ($('cobtransa_intercamfil').value=='S')
        var col6="ax_"+i+"_5";
      else
        var col6="ax_"+i+"_6";
      var col8="ax_"+i+"_8";
      var col9="ax_"+i+"_9";

      var num1=toFloat(col6);
      var num2=toFloat(col8);
      var num3=toFloat(col9);


      if (num1!=0 || num2!=0 || num3!=0)
      {
        totmonpag= totmonpag + num1;
        totmonrec= totmonrec + num2;
        totmondes= totmondes + num3;
        totmonnet= totmonnet + (num1 + num2 - num3);
      }
     i++;
    }

    $('cobtransa_totmonpag').value=format(totmonpag.toFixed(2),'.',',','.');
    $('cobtransa_totmonrec').value=format(totmonrec.toFixed(2),'.',',','.');
    $('cobtransa_totmondes').value=format(totmondes.toFixed(2),'.',',','.');
    $('cobtransa_totret').value=format(totmondes.toFixed(2),'.',',','.');
    var cal= totmonpag + totmonrec - totmondes;
    $('cobtransa_tottra').value=format(cal.toFixed(2),'.',',','.');
  }

  function montopagar(e,id)
  {
    if (e.keyCode==13 || e.keyCode==9)
    {
	   var aux = id.split("_");
	   var name=aux[0];
	   var fil=aux[1];
	   var col=parseInt(aux[2]);

	   var colgenmov=col+5;
	   var genmov=name+"_"+fil+"_"+colgenmov;
	   var colgening=col+6;
	   var gening=name+"_"+fil+"_"+colgening;
     var colgennotcre=col+8;
     var gennotcre=name+"_"+fil+"_"+colgennotcre;
     var colgendetche=col+11;
     var gendetche=name+"_"+fil+"_"+colgendetche;

	   var num1=toFloat(id);
	   var num2=toFloat('cobtransa_tottra'); 
	   var num3=toFloat('cobtransa_monpagado');


     if (validarnumero(id))
	   {
       if ($('cobtransa_pagmaytra').value=='S'){
         if ($(gennotcre).value=='S') {
            if (num1==0)
            {
              var cal=num2 - num3;
              $(id).value=format(cal.toFixed(2),'.',',','.');
            }

            $(id).value=$(id).value;
            new Ajax.Updater('divgrid_notcre', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&codcli='+$('cobtransa_codcli').value});
            $('divgrid_notcre').show();
            $('gridfor').hide();
            $('cobtransa_filgennotcre').value=fil;         
         }else {
            if (num1==0)
            {
              var cal=num2 - num3;
              $(id).value=format(cal.toFixed(2),'.',',','.');
            }

            $(id).value=$(id).value;
            if ($(genmov).value=='S')
            {
              $('divcodtip').show();
              $('gridfor').hide();
              $('cobtransa_filgenmov').value=fil;
            }
         }
       }else {
           if (num1>num2)
           {
              alert('El Monto a Pagar No Puede ser Mayor al Monto Neto a Pagar');
              $(id).value="0,00";
           }
           else
           {              
              if (num1==0)
              {
                var cal=num2 - num3;
                $(id).value=format(cal.toFixed(2),'.',',','.');
              }

              if (num3 <= num2)
              {
                $(id).value=$(id).value;
                if ($(genmov).value=='S')
                {
                  $('divcodtip').show();
                  $('gridfor').hide();
                  $('cobtransa_filgenmov').value=fil;
                }
                if ($(gendetche).value=='S') {
                  $('divgrid_detche').show();
                  $('gridfor').hide();
                  $('cobtransa_filgenmov').value=fil;
                  if ($(genmov).value=='S')
                    $('acepta').hide();
                }
              }
              else
              {
                alert('El Monto a Pagado Sobrepasa el Neto a Pagar');
                $(id).value="0,00";
              }              
           }
       }	     
	   }
	   else
	   {
	     alert('El Monto Del Pago tiene que ser Numerico');
         $(id).value="0,00";
	   }
	   if ($(gening).value=='S' && num1>0)
	   {
         $('cobtransa_hayingreso').value='S';
	   }else  $('cobtransa_hayingreso').value='N';

       sumar_pagos();
    }
  }

  function sumar_pagos()
  {
    var monpago=0;
    var i=0;
    var filas=parseInt($('cobtransa_filasfor').value);
    while (i<filas)
    {
      var col2="bx_"+i+"_2";
      var num1=toFloat(col2);

      if (num1>0)
      {
        monpago= monpago + num1;
      }
      i++;
    }

    $('cobtransa_monpagado').value=format(monpago.toFixed(2),'.',',','.');
  }

function recargos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldoc=col-1;
    var colmonrec=col+1;
    var colcodcta=col+2;
    var colmonori=col+3;
    var monrec=name+"_"+fil+"_"+colmonrec;
    var codcta=name+"_"+fil+"_"+colcodcta;
    var monori=name+"_"+fil+"_"+colmonori;
    var doc=name+"_"+fil+"_"+coldoc;
    valmonori=toFloat(monori);
    valdoc=$(doc).value;
    var fila=parseInt($('cobtransa_fildet').value);
    var idfilrec="ax_"+fila+"_20";
    var monrecfil=toFloat(idfilrec);

    if ($(id).value!="")
    {
	    toAjax(3,getUrlModuloAjax(),$(id).value,'','&monrec='+monrec+'&monori='+valmonori+'&doc='+valdoc+'&monrecfil='+monrecfil+'&codcta='+codcta+'');      
	  }
}

 function sumar_recargos(documento)
 {
   var mon_recargo=0;
   var recargo_fila=0;

   var am=obtener_filas_grid('c',2);
   if (am>0) {
   var l=0;
   while (l<am)
   {
    var coldoc="cx_"+l+"_1";
    var colmonrec="cx_"+l+"_3";
    if ($(colmonrec))
    {
    if ($(colmonrec).value!="")
    {
      var num1=toFloat(colmonrec);
      if ($(colmonrec).value!='0,00' && $(coldoc).value==documento)
      {
        mon_recargo= mon_recargo + num1;
      }
    }
    }
    l++;
   }

   if (am==0)
   {
     $('cx_0_1').value=documento;
   }

    var recargo_fila= recargo_fila + mon_recargo;
  }

    return  recargo_fila;
 }

  function montorecarg(e,id)
  {
    if (e.keyCode==13 || e.keyCode==9)
    {
	   var aux = id.split("_");
	   var name=aux[0];
	   var fil=aux[1];
	   var col=parseInt(aux[2]);

	   var coldoc=col-2;
	   var colmonori=col+2;
	   var monori=name+"_"+fil+"_"+colmonori;
	   var doc=name+"_"+fil+"_"+coldoc;
	   var num1=toFloat(id);
	   var num2=toFloat(monori);

       if (validarnumero(id))
	   {
         if (num1>num2)
         {
           alert('El Monto Del Recargo No Puede ser Mayor al Monto del Documento');
           $(id).value="0,00";
         }

         if (num1<num2)
         {
          sumar_recargos($(doc).value);
         }
	   }
	   else
	   {
         alert('El Monto Del Recargo tiene que ser Numerico');
         $(id).value="0,00";
	   }
	}
  }

  function descuentos(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldoc=col-1;
    var colmondes=col+1;
    var colcodcon=col+2;
    var colmonori=col+3;
    var mondes=name+"_"+fil+"_"+colmondes;
    var codcon=name+"_"+fil+"_"+colcodcon;
    var monori=name+"_"+fil+"_"+colmonori;
    var doc=name+"_"+fil+"_"+coldoc;
    valmonori=toFloat(monori);
    valdoc=$(doc).value;
    var fila=parseInt($('cobtransa_fildet').value);
    var idfilrec="ax_"+fila+"_20";
    var monrecfil=toFloat(idfilrec);

    if ($(id).value!="")
    {
	  toAjax(4,getUrlModuloAjax(),$(id).value,'','&mondes='+mondes+'&monori='+valmonori+'&doc='+valdoc+'&monrecfil='+monrecfil+'&codcon='+codcon+'');
	  }
  }

 function sumar_descuentos(documento)
 {
   var mon_descuento=0;
   var descuento_fila=0;

   var am=obtener_filas_grid('d',2);
   if (am>0) {
   var l=0;
   while (l<am)
   {
    var coldoc="dx_"+l+"_1";
    var colmondes="dx_"+l+"_3";

    if ($(colmondes))
    {
    if ($(colmondes).value!="")
    {
      var num1=toFloat(colmondes);
      if ($(colmondes).value!='0,00' && $(coldoc).value==documento)
      {
        mon_descuento= mon_descuento + num1;
      }
    }
    }
    l++;
   }
   if (am==0)
   {
     $('dx_0_1').value=documento;
   }

    descuento_fila= descuento_fila + mon_descuento;
  }

    return descuento_fila;
 }

  function montodescuentos(e,id)
  {
    if (e.keyCode==13 || e.keyCode==9)
    {
	   var aux = id.split("_");
	   var name=aux[0];
	   var fil=aux[1];
	   var col=parseInt(aux[2]);

	   var coldoc=col-2;
	   var colmonori=col+2;
	   var monori=name+"_"+fil+"_"+colmonori;
	   var doc=name+"_"+fil+"_"+coldoc;
	   var num1=toFloat(id);
	   var num2=toFloat(monori);

       if (validarnumero(id))
	   {
         if (num1>num2)
         {
           alert('El Monto Del Descuento No Puede ser Mayor al Monto del Documento');
           $(id).value="0,00";
         }

         if (num1<num2)
         {
          sumar_descuentos($(doc).value);
         }
	   }
	   else
	   {
         alert('El Monto Del Descuento tiene que ser Numerico');
         $(id).value="0,00";
	   }
	}
  }

  function mostrar1(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var coldoc=col-7;
    var colmontotfor=col-4;
    if ($('cobtransa_intercamfil').value=='S')
      var colmonpagad=col-2;
    else
      var colmonpagad=col-1;
    var doc=name+"_"+fil+"_"+coldoc;
    var montotfor=name+"_"+fil+"_"+colmontotfor;
    var monpagado=name+"_"+fil+"_"+colmonpagad;

    var num1=toFloat(montotfor);
    var num2=toFloat(monpagado);
    var monori=num1 - num2;

    var montoori=format(monori.toFixed(2),'.',',','.');
    var documento=$(doc).value;
    var rec_vie=$(id).value;

    $('cobtransa_docfil').value=documento;
    $('cobtransa_orifil').value=montoori;
    $('cobtransa_recvie').value=rec_vie;
    $('cobtransa_fildet').value=fil;

    var num3=toFloat(id);
     if (num3==0)
       insertar_fila(documento,monori,'R');

    $('divgrid_descuentos').hide();
    $('sf_fieldset_none').show();
    $('divgrid_recargos').show();

  }


  function mostrar2(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var coldoc=col-8;
    var colmontotfor=col-5;
    if ($('cobtransa_intercamfil').value=='S')
      var colmonpagad=col-3;
    else
      var colmonpagad=col-2;
    var doc=name+"_"+fil+"_"+coldoc;
    var montotfor=name+"_"+fil+"_"+colmontotfor;
    var monpagado=name+"_"+fil+"_"+colmonpagad;

    var num1=toFloat(montotfor);
    var num2=toFloat(monpagado);
    var monori=num1;// - num2;

    var montoori=format(monori.toFixed(2),'.',',','.');
    var documento=$(doc).value;
    var des_vie=$(id).value;

    $('cobtransa_docfil').value=documento;
    $('cobtransa_orifil').value=montoori;
    $('cobtransa_desvie').value=des_vie;
    $('cobtransa_fildet').value=fil;
    
    var num3=toFloat(id);
    if (num3==0)
      insertar_fila(documento,monori,'D');
    
    $('divgrid_recargos').hide();
    $('sf_fieldset_none').show();
    $('divgrid_descuentos').show();

  }

  function insertar_fila(doc,monto,div)
  {
    if (div=='R')
    {
      var fr=(obtener_filas_grid('c',1)-1);
      var filact=fr;
      var fildoc='cx_'+filact+'_1';
      var fildesc='cx_'+filact+'_2';
      var filmonori='cx_'+filact+'_5';

      if ($(fildoc)) {
        if ($(fildoc).value!="" && $(fildesc).value!="")
        {
         NuevaFilaGrid('c');
         var ultima_fila = $$('.cf').last();
         descendientes = ultima_fila.descendants();
         ultimo = descendientes[1];
         array_ultimo = ultimo.id.split('_');
         filact = parseFloat(array_ultimo[1]);
         var fildoc='cx_'+filact+'_1';
         var filmonori='cx_'+filact+'_5';
        }
      }else {
        filact=-1;
        NuevaFilaGrid('c');
        var ultima_fila = $$('.cf').last();
         descendientes = ultima_fila.descendants();
         ultimo = descendientes[1];
         array_ultimo = ultimo.id.split('_');
         filact = parseFloat(array_ultimo[1]);
         var fildoc='cx_'+filact+'_1';
         var filmonori='cx_'+filact+'_5';
      }

      $(fildoc).value=doc;
      $(filmonori).value=monto;
    }
    else
    {
      var fd=(obtener_filas_grid('d',1)-1);
      var filact=fd;
      var fildoc='dx_'+filact+'_1';
      var filretsc='dx_'+filact+'_2';
      var filmonori='dx_'+filact+'_5';
      if ($(fildoc)) {
        if ($(fildoc).value!="" && $(filretsc).value!="")
        {
         NuevaFilaGrid('d');
         var ultima_fila = $$('.df').last();
         descendientes = ultima_fila.descendants();
         ultimo = descendientes[1];
         array_ultimo = ultimo.id.split('_');
         filact = parseFloat(array_ultimo[1]);
         var fildoc='dx_'+filact+'_1';
         var filmonori='dx_'+filact+'_5';
        }
      }else {
        filact=-1;
        NuevaFilaGrid('d');
        var ultima_fila = $$('.df').last();
         descendientes = ultima_fila.descendants();
         ultimo = descendientes[1];
         array_ultimo = ultimo.id.split('_');
         filact = parseFloat(array_ultimo[1]);
         var fildoc='dx_'+filact+'_1';
         var filmonori='dx_'+filact+'_5';
      }

      $(fildoc).value=doc;
      $(filmonori).value=monto;
    }
  }

  function actualiza()
  {
    var recfil=sumar_recargos($('cobtransa_docfil').value);
    var descfil=sumar_descuentos($('cobtransa_docfil').value);

    $('sf_fieldset_none').hide();

    if (recfil>=0)
    {
      var fila=parseInt($('cobtransa_fildet').value);
      var idfil="ax_"+fila+"_8";

      $(idfil).value=format(recfil.toFixed(2),'.',',','.');
    }

    if (descfil>=0)
    {
      var fila=parseInt($('cobtransa_fildet').value);
      var idfil="ax_"+fila+"_9";

      $(idfil).value=format(descfil.toFixed(2),'.',',','.');
    }

    sumar_datos_grid();

    limpiar();
  }

  function cancelar()
  {
    limpiar();
  }

  function limpiar()
  {
    $('cobtransa_docfil').value="";
    $('cobtransa_orifil').value="";
    $('cobtransa_recvie').value="";
    $('cobtransa_desvie').value="";
    $('cobtransa_fildet').value="";
  }

  function actualizar_filas()
  {
    var i=0;
    var filas=parseInt($('cobtransa_filasfor').value);
    while (i<filas)
    {
      var monto="bx_"+i+"_2";
      var numero="bx_"+i+"_3";
      var banco="bx_"+i+"_5";
      var gening="bx_"+i+"_8";
      var genmov="bx_"+i+"_7";

      var num1=toFloat('cobtransa_monpagado');
      //en caso de que se la columna 2
      if ($('cobtransa_hayingreso').value=='N')
      {
        $(monto).readOnly=false;
        if ($(gening).value=='S' && num1>0)
        {
          $(monto).readOnly=true;
        }

      }
      else
      {
        if ($(gening).value=='S' && num1>0)
        {
          $(monto).readOnly=false;
        }
        else
        {
          $(monto).readOnly=true;
        }
      }

      //en caso de que se la columna 3
       //$(numero).readOnly=true;
//       if ($(genmov).value=='S')
//       {
  //      $(numero).readOnly=false;
    //   }

       //en caso de que se la columna 4
      //  $(banco).disabled=true;
      //  if ($(genmov).value=='S')
       //{
        //$(banco).disabled=false;
       //}
     i++;
    }
  }


  function anular()
  {
    var referencia="RC"+$('cobtransa_numcom').value.substr(2,6);
    var numtra=$('cobtransa_numtra').value;
    var fectra=$('cobtransa_fectra').value;

    window.open(getUrlModulo()+'anular?numtra='+numtra+'&referencia='+referencia+'&fectra='+fectra,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
  }

  function aceptartip()
  {
    if ($('cobtransa_codtip').value!="")
    {
      $('divcodtip').hide();
      $('gridfor').show();
      var l=parseInt($('cobtransa_filgenmov').value);
      var filcodtip="bx_"+l+"_9"
      $(filcodtip).value=$('cobtransa_codtip').value;
      $('cobtransa_filgenmov').value="";
    }
    else
    {
      alert('Tipee el Tipo de Movimiento');
      $('cobtransa_codtip').focus();
      $('gridfor').hide();
      $('acepta').show();
    }
  }

  function aceptarnotcre(){
    var i=0;
    var acum_notcre=0;
    var cade="";
    var sigue=true;
    var filas=parseInt($('cobtransa_filasnot').value);
    while (i<filas)
    {
      var col1="ex_"+i+"_1";
      if ($(col1).checked==true){
         var col2="ex_"+i+"_2";
         var col4="ex_"+i+"_5";
         var num1=toFloat(col4);
         if (num1==0){
           alert_('El Saldo a Abonar de la Nota de Cr&eacute;dito: '+$(col2).value+' debe ser mayor a 0. Por favor, Desmarquelo o Coloque un Monto Mayor a Cero');
           sigue=false;
           break;
         }else {
           cade=cade+$(col2).value+"_"+$(col4).value+"!";
           acum_notcre+=num1;
         }
      }
     i++;
    }    
    if (sigue) {
      var l=parseInt($('cobtransa_filgennotcre').value);
      var filnotcres="bx_"+l+"_11"
      var filmonnotcre="bx_"+l+"_12"
      var monpagar="bx_"+l+"_2"
      var num2=toFloat(monpagar);
      if (acum_notcre>num2){
         alert_('El Monto Total de las Notas de Cr&eacute;dito no puede ser mayor al Monto a Pagar');
      }else {
        $('divgrid_notcre').hide();
        $('gridfor').show();
        $(filnotcres).value=cade;
        $(filmonnotcre).value=format(acum_notcre.toFixed(2),'.',',','.');
        //var cal=num2- acum_notcre;
        $(monpagar).value=format(acum_notcre.toFixed(2),'.',',','.');
        $('cobtransa_filgennotcre').value="";
        sumar_pagos();
      }
    }
  }

  function colocadoc(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    var colmonto=col+4;
    var monto=name+"_"+fil+"_"+colmonto;

    $(id).value=$('cobtransa_docfil').value;
    $(monto).value=$('cobtransa_orifil').value;
  }

  function anularDocumento()
  {
    var refdoc=$('cobdocume_refdoc').value;
    var fecdoc=$('cobdocume_fecemi').value;
    var abodoc=$('cobdocume_abodoc').value;

    window.open(getUrlModulo()+'anular?refdoc='+refdoc+'&abodoc='+abodoc+'&fecdoc='+fecdoc,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
  }
  
function colocarmontopag(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   if ($('cobtransa_intercamfil').value=='S'){
     var colsaldoc=col-12;
     var colmontopagar=col-14; 
   }else {
    var colsaldoc=col-14;
     var colmontopagar=col-13; 
   }
   
   var saldoc=name+"_"+fil+"_"+colsaldoc;   
   var montopagar=name+"_"+fil+"_"+colmontopagar;

   var montoant=0;
   montoant=toFloat(saldoc);
   if ($(id).checked==true)
   {       
      $(montopagar).value=format(montoant.toFixed(2),'.',',','.');
      sumar_datos_grid();	  
   }else {
       $(montopagar).value="0,00";
      sumar_datos_grid();	  
   }
   toAjax(99,getUrlModuloAjax(),'10','','');
  }  

function ajaxbancos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var descrip=name+"_"+fil+"_"+coldes;
    var valor=$(id).value;

    if ($(id).value!="")
    {
      toAjax(8,getUrlModuloAjax(),$(id).value,'','&cajtexmos='+descrip+'&idcaj='+id+'');
    }
}

function  AplicaroNoRecargos()
{
   if ($('cobtransa_btnrec').checked==true)
   {       
      AplicarRecargosTodos();
   }else {
      QuitarRecargosTodos();
   }
}

function  AplicaroNoDescuentos()
{
   if ($('cobtransa_btndes').checked==true)
   {       
      AplicarDescuentosTodos();      
   }else {
      QuitarDescuentosTodos();
   }   
}

function AplicarRecargosTodos(){
  var totfil=obtener_filas_grid('c',1);
  if (totfil==1) {
    var fildoc='cx_'+(totfil-1)+'_1';
    var filrec='cx_'+(totfil-1)+'_2';
    var filmonrec='cx_'+(totfil-1)+'_3';
    if ($(fildoc)) {
      if ($(fildoc).value!="" && $(filrec).value!="" && toFloat(filmonrec)>0)
      {
        var i=1;
        var filas=parseInt($('cobtransa_filasdet').value);
        while (i<filas)
        {
          var col1="ax_"+i+"_1"; //Documento
          var col8="ax_"+i+"_8";  //Recargo                 
          var col4="ax_"+i+"_4";  //Monto Total  
          if ($('cobtransa_intercamfil').value=='S')   
            var col7="ax_"+i+"_6";  //Monto Pagado    
          else
            var col7="ax_"+i+"_7";  //Monto Pagado    
          var doc=$(col1).value;
          var num1=toFloat(col4);
          var num2=toFloat(col7);
          var monori=num1 - num2;

          var montoori=format(monori.toFixed(2),'.',',','.');
          var rec_vie=$(col8).value;
          $('cobtransa_docfil').value=doc;
          $('cobtransa_orifil').value=montoori;
          $('cobtransa_recvie').value=rec_vie;
          $('cobtransa_fildet').value=i;

          insertar_fila(doc,monori,'R');
          var finsert=(obtener_filas_grid('c',1)-1);
          var filrecinsert='cx_'+finsert+'_2';
          $(filrecinsert).value=$(filrec).value;
          recargos2(filrecinsert,doc,i);          
          i++;
        }   
      }
    }  
  }  
}

function AplicarDescuentosTodos()
{
  var totfil=obtener_filas_grid('d',1);
  if (totfil==1) {
    var fildoc='dx_'+(totfil-1)+'_1';
    var fildes='dx_'+(totfil-1)+'_2';
    var filmondes='dx_'+(totfil-1)+'_3';
    if ($(fildoc)) {
      if ($(fildoc).value!="" && $(fildes).value!="" && toFloat(filmondes)>0)
      {
        var i=1;
        var filas=parseInt($('cobtransa_filasdet').value);
        while (i<filas)
        {
          var col1="ax_"+i+"_1"; //Documento
          var col9="ax_"+i+"_9";  //Descuento        
          var col4="ax_"+i+"_4";  //Monto Total  
          if ($('cobtransa_intercamfil').value=='S')  
            var col7="ax_"+i+"_6";  //Monto Pagado    
          else
            var col7="ax_"+i+"_7";  //Monto Pagado    
          var doc=$(col1).value;
          var num1=toFloat(col4);
          var num2=toFloat(col7);
          var monori=num1 - num2;

          var montoori=format(monori.toFixed(2),'.',',','.');
          var des_vie=$(col9).value;
          $('cobtransa_docfil').value=doc;
          $('cobtransa_orifil').value=montoori;
          $('cobtransa_recvie').value=des_vie;
          $('cobtransa_fildet').value=i;

          if (insertar_fila2(doc,monori,'D')) {
            var finsert=(obtener_filas_grid('d',1)-1);
            var fildesinsert='dx_'+finsert+'_2';
            $(fildesinsert).value=$(fildes).value;
            descuentos2(fildesinsert,doc,i);            
          }
         i++;
        }
      }
    }  
  } 
}

function BuscarEstaGridc(doc) {
  var ultima_fila = $$('.cf').last();
   descendientes = ultima_fila.descendants();
   ultimo = descendientes[1];
   array_ultimo = ultimo.id.split('_');
   var colart = parseFloat(array_ultimo[1])+1;
  var i=0;
  while (i<colart)
  {
     var col1="cx_"+i+"_1"; //Documento
     if ($(col1)) {
       if ($(col1).value==doc) {
          EliminarFilaGrid('c',i,',');
       }   
     }     
     i++;
  }
}

function QuitarRecargosTodos()
{  
  var fil=1;
  var filas=parseInt($('cobtransa_filasdet').value);
  while (fil<filas)
  {
    var col1="ax_"+fil+"_1"; //Documento
    BuscarEstaGridc($(col1).value);     
    TotalizarRecargos($(col1).value,fil);
    fil++;
  }
  sumar_datos_grid(); 
}

function BuscarEstaGridd(doc) {
  var ultima_fila = $$('.df').last();
   descendientes = ultima_fila.descendants();
   ultimo = descendientes[1];
   array_ultimo = ultimo.id.split('_');
  var colart = parseFloat(array_ultimo[1])+1;
  var i=0;
  while (i<colart)
  {
     var col1="dx_"+i+"_1"; //Documento
     if ($(col1)) {
       if ($(col1).value==doc) {
          EliminarFilaGrid('d',i,',');
       }   
     }     
     i++;
  }
}

function QuitarDescuentosTodos()
{  
  var fil=1;
  var filas=parseInt($('cobtransa_filasdet').value);
  while (fil<filas)
  {
    var col1="ax_"+fil+"_1"; //Documento
    BuscarEstaGridd($(col1).value);      
    TotalizarRecargos($(col1).value,fil);
    fil++;
  }
  sumar_datos_grid(); 
}

  function insertar_fila2(doc,monto,div)
  {
    if (div=='R')
    {
      var fr=(obtener_filas_grid('c',1)-1);
      var filact=fr;
      var fildoc='cx_'+filact+'_1';
      var filmonori='cx_'+filact+'_5';

      if ($(fildoc)) {
        if ($(fildoc).value!="")
        {
         NuevaFilaGrid('c');
         var ultima_fila = $$('.cf').last();
         descendientes = ultima_fila.descendants();
         ultimo = descendientes[1];
         array_ultimo = ultimo.id.split('_');
         filact = parseFloat(array_ultimo[1]);
         var fildoc='cx_'+filact+'_1';
         var filmonori='cx_'+filact+'_5';
        }
      }else {
        filact=-1;
        NuevaFilaGrid('c');
        var ultima_fila = $$('.cf').last();
         descendientes = ultima_fila.descendants();
         ultimo = descendientes[1];
         array_ultimo = ultimo.id.split('_');
         filact = parseFloat(array_ultimo[1]);
         var fildoc='cx_'+filact+'_1';
         var filmonori='cx_'+filact+'_5';
      }

      $(fildoc).value=doc;
      $(filmonori).value=monto;
    }
    else
    {
      var fd=(obtener_filas_grid('d',1)-1);
      var filact=fd;
      var fildoc='dx_'+filact+'_1';
      var filmonori='dx_'+filact+'_5';
      if ($(fildoc)) {
        if ($(fildoc).value!="")
        {
         NuevaFilaGrid('d');
         var ultima_fila = $$('.df').last();
         descendientes = ultima_fila.descendants();
         ultimo = descendientes[1];
         array_ultimo = ultimo.id.split('_');
         filact = parseFloat(array_ultimo[1]);
         var fildoc='dx_'+filact+'_1';
         var filmonori='dx_'+filact+'_5';
        }
      }else {
        filact=-1;
        NuevaFilaGrid('d');
         var ultima_fila = $$('.df').last();
         descendientes = ultima_fila.descendants();
         ultimo = descendientes[1];
         array_ultimo = ultimo.id.split('_');
         filact = parseFloat(array_ultimo[1]);
         var fildoc='dx_'+filact+'_1';
         var filmonori='dx_'+filact+'_5';
      }

      $(fildoc).value=doc;
      $(filmonori).value=monto;
    }
    return true;
  }

  function TotalizarRecargos(docume,filai)
  {
      $('cobtransa_docfil').value=docume;
      $('cobtransa_fildet').value=filai;
      actualiza();          
  }

function recargos2(id, docume, fila)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldoc=col-1;
    var colmonrec=col+1;
    var colcodcta=col+2;
    var colmonori=col+3;
    var monrec=name+"_"+fil+"_"+colmonrec;
    var codcta=name+"_"+fil+"_"+colcodcta;
    var monori=name+"_"+fil+"_"+colmonori;
    var doc=name+"_"+fil+"_"+coldoc;
    valmonori=toFloat(monori);
    valdoc=$(doc).value;

    if ($(id).value!="")
    {
      toAjax(10,getUrlModuloAjax(),$(id).value,'','&monrec='+monrec+'&monori='+valmonori+'&doc='+valdoc+'&docume='+docume+'&fila='+fila+'&codcta='+codcta+'');      
    }
}

  function descuentos2(id, docume, filai)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldoc=col-1;
    var colmondes=col+1;
    var colcodcon=col+2;
    var colmonori=col+3;
    var mondes=name+"_"+fil+"_"+colmondes;
    var codcon=name+"_"+fil+"_"+colcodcon;
    var monori=name+"_"+fil+"_"+colmonori;
    var doc=name+"_"+fil+"_"+coldoc;
    valmonori=toFloat(monori);
    valdoc=$(doc).value;
    var fila=parseInt($('cobtransa_fildet').value);
    var idfilrec="ax_"+fila+"_8";
    var monrecfil=toFloat(idfilrec);

    if ($(id).value!="")
    {
    toAjax(11,getUrlModuloAjax(),$(id).value,'','&mondes='+mondes+'&monori='+valmonori+'&doc='+valdoc+'&monrecfil='+monrecfil+'&docume='+docume+'&filai='+filai+'&codcon='+codcon+'');
  }
  }

   function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(10, '0',0);}
     else{valor=valor.pad(10, '#',0);}

     $('cobtransa_numtra').value=valor;
   }
 }

  function montoabonar(e,id)
  {
    if (e.keyCode==13 || e.keyCode==9)
    {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var colsaldoc=col-1;
     var saldoc=name+"_"+fil+"_"+colsaldoc;

     var num1=toFloat(id);
     var num2=toFloat(saldoc); 

     if (validarnumero(id))
     {
       if (num1>num2)
       {
          alert('El Saldo a Abonar No Puede ser Mayor al Saldo Actual');
          $(id).value="0,00";
       }                    
     }
     else
     {
       alert('El Saldo a Abonar tiene que ser Numerico');
       $(id).value="0,00";
     }
    }
  }

function validamontoche(e,id){
    if (e.keyCode==13 || e.keyCode==9)
    {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var fila= parseInt($('cobtransa_filgenmov').value);

     var montopag="bx_"+fila+"_2";

     var num1=toFloat(id);
     var num2=toFloat(montopag); 

     if (validarnumero(id))
     {
       if (num1>num2)
       {
          alert('El Monto del Cheque No Puede ser Mayor al Monto Pagar');
          $(id).value="0,00";
       }    

       var num3=toFloat('cobtransa_montotche')+num1;
       var num4=toFloat('cobtransa_montotche');
       if (num3>num2)
        {
          alert('El Monto del Cheque sobrepasa el Monto Total a Pagar');
          $(id).value="0,00";
          //$('cobtransa_montotche').value=format(num4.toFixed(2),'.',',','.');
          ActualizarSaldosGrid("k",new Array("cobtransa_montotche"));
       }
     }
     else
     {
       alert('El Monto del Cheque tiene que ser Numerico');
       $(id).value="0,00";
     }
    }
}

  function aceptardetche(){
    if ($('id').value=='') {
    var fila= parseInt($('cobtransa_filgenmov').value);
    $('divgrid_detche').hide();
    $('gridfor').show();
    var acum_notcre=toFloat('cobtransa_montotche');
    var montopag="bx_"+fila+"_2";
    var genmov="bx_"+fila+"_7";
    $(montopag).value=format(acum_notcre.toFixed(2),'.',',','.');    
    if ($(genmov).value=='S')
      aceptartip();
    else $('cobtransa_filgenmov').value="";
    sumar_pagos();
  }else {
    $('divgrid_detche').hide();
  }

  }

  function mostrardetche(id){
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var colgendetche=col-1;
     var gendetche=name+"_"+fil+"_"+colgendetche;
     if ($(gendetche).value=='S'){
       $('divgrid_detche').show();
       ActualizarSaldosGrid("k",new Array("cobtransa_montotche"));
     }    
  }