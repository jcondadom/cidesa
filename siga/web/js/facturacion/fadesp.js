  function actualiza(id)
  {
    if (id!="")
    {
      $('trigger_cadphart_fecdph').hide();
      monto_totalConsulta();
     //$$('.botoncat')[0].disabled=true;
  	 //$$('.botoncat')[1].disabled=true;
     //$$('.botoncat')[2].disabled=true;
  	 //$$('.botoncat')[3].disabled=true;
   }
  }


 function verificar()
 {
 	if ($('verificaexisydisp').value=="N")
	{
		alert($('mensaje').value);
	}
 }

 function verexisteubicacion()
 {
 	if ($('existeubicacion').value=="N")
	{
		alert('La ubicacion : '+$('cadphart_codubi').value+', no existe para el almacen seleccionado...');
		$('cadphart_codubi').value="";
		$('cadphart_desubi').value="";
		$('cadphart_codubi').select();
		$('cadphart_codubi').focus();
	}
 }

 function Cantidad(id)
 {
   var diferencia = 0;
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcandes=col;
   var colcannodes=col+1;
   var colcannodesaux=col+4;
   var colprecio=col+2;
   var coltotal=col+3;
   var colcodalm=col-8;
   var colcodubi=col-6;
   var colcodart=col-3;

   var cantto=name+"_"+fil+"_"+colcandes;
   var cannodes=name+"_"+fil+"_"+colcannodes;
   var cannodesaux=name+"_"+fil+"_"+colcannodesaux;
   var precio=name+"_"+fil+"_"+colprecio;
   var total=name+"_"+fil+"_"+coltotal;
   var alm=name+"_"+fil+"_"+colcodalm;
   var ubi=name+"_"+fil+"_"+colcodubi;
   var art=name+"_"+fil+"_"+colcodart;

   //Obtener el valor del precio
   var num1=toFloat(precio);
   //Obtener el valor de la cantidad
   var num2=toFloat(id);
   //Obtener el valor de la cantidad no despchada
   var num3=toFloat(cannodesaux);
   if (!validarnumero(id))
   {
    alert_('Monto Inv&aacute;lido');
    $(id).value="0,00";
    $(total).value="0,00";
   }
   else
   {
     if (($(art).value != '')&&($(alm).value == '')){
	 	alert_('Debe seleccionar el almac&eacute;n');
	    $(id).value="0,00";
	    $(total).value="0,00";
	    return false;
	 }
     if (($(art).value != '')&&($(alm).value != '')&&($(ubi).value == '')){
	 	alert_('Debe seleccionar la ubicaci&oacute;n');
	    $(id).value="0,00";
	    $(total).value="0,00";
	    return false;
	 }
	 if (num2 == 0){
	    $(cannodes).value = $(cannodesaux).value;
	 }
     else if (num2 > 0){
	    diferencia = parseFloat(num3) - parseFloat(num2);
	    $(cannodes).value=format(diferencia.toFixed(2),'.',',','.');
	    if (diferencia < 0){
	    	alert('La Cantidad a Despachar no puede ser mayor a '+ $(cannodesaux).value);
		    $(id).value="0,00";
		    $(total).value="0,00";
		    $(cannodes).value = $(cannodesaux).value;
		    return false;
	    }

	    $(cantto).value=format(num2.toFixed(2),'.',',','.');
	    if ((validarnumero(precio))&&(num1 > 0))
	    {

	     var costototal=parseFloat(num2)*parseFloat(num1);
	     if (costototal < 0)
	     	costototal = 0;
	     $(total).value=format(costototal.toFixed(2),'.',',','.');
	     monto_total();

	    }

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
        var id1="ax"+"_"+i+"_12";
	      if ($(id1).value!="" && validarnumero(id1))
	      {
	         tot=toFloat(id1);
	         acum=acum + tot;
	      }
     i++;
    }
    $('cadphart_mondph').value=format(acum.toFixed(2),'.',',','.');
  }


  function monto_totalConsulta()
  {
    var acum=0;
    var fil=obtener_filas_grid('b',1);
    var i=0;
    while (i<fil)
    {
        var id1="bx"+"_"+i+"_11";
        if ($(id1).value!="" && validarnumero(id1))
        {
           tot=toFloat(id1);
           acum=acum + tot;
        }
     i++;
    }
    $('cadphart_mondph').value=format(acum.toFixed(2),'.',',','.');
  }  

 function enter(valor)
 {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}
     $('cadphart_dphart').value=valor;
 }

  function distribuiralmacen()
  {
    var fil=totalregistros('ax',6,30);
    var i=0;
    while (i<fil)
    {
        var id1="ax"+"_"+i+"_1";
        var id2="ax"+"_"+i+"_2";

        var id3="ax"+"_"+i+"_3";
        var id4="ax"+"_"+i+"_4";
        var cat1="popup_a_"+i+"_1";
        var cat2="popup_a_"+i+"_3";
        if ($(id1))
        {
            $(id1).value=$('cadphart_codalm').value;
            $(id2).value=$('cadphart_nomalm').value;
            $(id3).value=$('cadphart_codubi').value;
            $(id4).value=$('cadphart_nomubi').value;

            if ($('cadphart_espae').value=='S')
            {
               $(id1).readOnly=true;
               $(id2).readOnly=true;
               $(id3).readOnly=true;
               $(id4).readOnly=true;
               $(cat1).hide();
               $(cat2).hide();

            }
        }
     i++;
    }
    /*$('cadphart_codalm').value='';
    $('cadphart_nomalm').value='';
    $('cadphart_codubi').value='';
    $('cadphart_nomubi').value='';*/
  }
