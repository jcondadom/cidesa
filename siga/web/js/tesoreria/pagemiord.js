/**
 * Librerías Javascript
 *
 * @package    Roraima
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

  function mostrar(item,item2)
  {
    obj=$(item);
    obj.style.display="block";
    obj2=$(item2);
    obj2.style.display="none";
  }

  function mostrar2(item,item2)
  {
    obj=$(item);
    obj.style.display="block";
    obj2=$(item2);
    obj2.style.display="block";
  }

  function mostrar3(item)
  {
    obj=$(item);
    obj.style.display="block";
  }

  function sumardatosgrid()
 {
   actualizarsaldos();
   actualizarsaldos_e();
   var diferencia=0;
   var monto1=toFloat('totalmontorete');
   var monto2=toFloat('opordpag_monret');

   if (monto1> 0)
   {
      diferencia= monto1 - monto2;
   }

   var montos=toFloat('opordpag_monret');
   var cal=montos+diferencia;

   $('opordpag_monret').value=format(cal.toFixed(2),'.',',','.');
   var nfil=parseInt($('opordpag_numfilas').value);
   var y=totalregistros('ax',2,nfil);
   if (($('opordpag_presiono').value=='S') && (verificarmarcas('ax',1)))
   {
     var y=verificarultimomarcado('ax',2,nfil,1);
     if (y>=0)
     {
       var otro="ax"+"_"+y+"_4";
       if ($(otro)) {
       var monto3=toFloat(otro);
       var suma=monto3 + diferencia;

       $(otro).value=format(suma.toFixed(2),'.',',','.');
     }
    }
   }
   else
   {
     var y=y-1;
     if (y>=0) {
     var otro="ax"+"_"+y+"_4";
      if ($(otro)) {
       var monto3=toFloat(otro);
       var suma=monto3 + diferencia;

       $(otro).value=format(suma.toFixed(2),'.',',','.');
     }
   }
   }
   var y=y;
   var otro="ax"+"_"+y+"_4";
    if ($(otro)) 
      $(otro).value=$(otro).value;
   $('opordpag_monret').value=$('opordpag_monret').value;



   if ($('opordpag_afectapre').value==1)
   {
     var monto4=toFloat('opordpag_monord');
     var monto5=toFloat('opordpag_monret');
     var monto6=toFloat('opordpag_mondes');

     if ($('opordpag_comnoiva').value=='S' && $('opordpag_documento').value!='N')
     {
         monrecfaltante=toFloat('opordpag_monorddisrgo');
         if (monrecfaltante==0)
           monrecfaltante=toFloat('opordpag_monrgo');
         monto4=monto4 + monrecfaltante;
         
         $('opordpag_monord').value=format(monto4.toFixed(2),'.',',','.');
     }

     if ($('opordpag_aplrecop').value=='S' && $('opordpag_documento').value=='N')
     {
         monrecfaltante=toFloat('opordpag_monrgo');
         monto4=monto4 + monrecfaltante;
         $('opordpag_monord').value=format(monto4.toFixed(2),'.',',','.');
     }

     var calculos=(monto4 - ((monto5)+ monto6));
     $('opordpag_neto').value=format(calculos.toFixed(2),'.',',','.');
   }
 }

 function netos()
 {

   var monto4=toFloat('opordpag_monord');
   var monto5=toFloat('opordpag_monret');
   var monto6=toFloat('opordpag_mondes');

   if ($('opordpag_comnoiva').value=='S' && $('opordpag_documento').value!='N')
   {
       monrecfaltante=toFloat('opordpag_monorddisrgo');
       if (monrecfaltante==0)
        monrecfaltante=toFloat('opordpag_monrgo');
       monto4=monto4 + monrecfaltante;
       
       $('opordpag_monord').value=format(monto4.toFixed(2),'.',',','.');
   }

    if ($('opordpag_aplrecop').value=='S' && $('opordpag_documento').value=='N')
    {
         monrecfaltante=toFloat('opordpag_monrgo');
         monto4=monto4 + monrecfaltante;
         $('opordpag_monord').value=format(monto4.toFixed(2),'.',',','.');
    }

   var calculos=(monto4 - (monto5 + monto6));
   $('opordpag_neto').value=format(calculos.toFixed(2),'.',',','.');

 }

  function sumardatosgrid2(e)
  {
    if (e.keyCode==13)
   {    

      actualizarsaldos();
      actualizarsaldos_e();
      var diferencia=0;
      var monto1=toFloat('totalmontorete');
       var monto2=toFloat('opordpag_monret');
      if (monto1 > 0)
      {
        diferencia= monto1 - monto2;
     }

      var montos=toFloat('opordpag_monret');

      var cal=montos+diferencia;
      $('opordpag_monret').value=format(cal.toFixed(2),'.',',','.');
      var nfil=parseInt($('opordpag_numfilas').value);
      var y=totalregistros('ax',2,nfil);
      if (y!=0)
      {
      if (($('opordpag_presiono').value=='S') && (verificarmarcas('ax',1)))
      {
        var y=verificarultimomarcado('ax',2,nfil,1);
        var otro="ax"+"_"+y+"_4";

        var monto3=toFloat(otro);
        var suma=monto3 + diferencia;
        $(otro).value=format(suma.toFixed(2),'.',',','.');
      }
      else
      {
        var y=y-1;
        var otro="ax"+"_"+y+"_4";

        var monto3=toFloat(otro);
        var suma=monto3 + diferencia;

        $(otro).value=format(suma.toFixed(2),'.',',','.');
      }
      var y=y;
      var otro="ax"+"_"+y+"_4";
      $(otro).value=$(otro).value;
      }
      $('opordpag_monret').value=$('opordpag_monret').value;

      if ($('opordpag_afectapre').value==1)
      {
        var monto4=toFloat('opordpag_monord');
        var monto5=toFloat('opordpag_monret');
        var monto6=toFloat('opordpag_mondes');

        var calculos=(monto4 - ((monto5 +diferencia)+ monto6));
        $('opordpag_neto').value=format(calculos.toFixed(2),'.',',','.');
      }
      else
      {
       var montcau=toFloat('opordpag_monord');
       var montrete=toFloat('opordpag_monret');
       var monto6=toFloat('opordpag_mondes');

       if ($('opordpag_comnoiva').value=='S' && $('opordpag_documento').value!='N')
       {
           monrecfaltante=toFloat('opordpag_monorddisrgo');
           if (monrecfaltante==0)
            monrecfaltante=toFloat('opordpag_monrgo');
           montcau=montcau + monrecfaltante;
           $('opordpag_monord').value=format(montcau.toFixed(2),'.',',','.');
       }

       if ($('opordpag_aplrecop').value=='S' && $('opordpag_documento').value=='N')
      {
           monrecfaltante=toFloat('opordpag_monrgo');
           montcau=montcau + monrecfaltante;
           $('opordpag_monord').value=format(montcau.toFixed(2),'.',',','.');
      }

       var calculo= montcau-(montrete+monto6);

       $('opordpag_neto').value=format(calculo.toFixed(2),'.',',','.');
      }
    }
 }

  function salva(item)
  {
    var fil=0;
    if ($('opordpag_observe').value==""){
      $('opordpag_observe').value='N';
      new Ajax.Request('/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=33&codigo='+$('refere').value})
    }
    var numfil=parseInt($('fila').value);
    var nfil=parseInt($('opordpag_numfilas').value);
    while (fil<numfil)
    {
      var id1="cx"+"_"+fil+"_1";
      var id2="cx"+"_"+fil+"_5";
      var id6="cx"+"_"+fil+"_7";
      var idr1="cx"+"_"+fil+"_8";
      var idr10="cx"+"_"+fil+"_10";
      if ($(id2).value!="0,00")
      {
       var fil2=0;
       var cuentafil=0;
       while (fil2<nfil)
       {
        var ida="ax"+"_"+fil2+"_2";
        if ($(ida).value=="")
        {
         cuentafil=fil2;
         fil2=nfil;
        }
       fil2++;
       }

       var id3="ax"+"_"+cuentafil+"_2";
       var id4="ax"+"_"+cuentafil+"_3";
       var idr="ax"+"_"+cuentafil+"_4";
       var id5="ax"+"_"+cuentafil+"_6";
       var id7="ax"+"_"+cuentafil+"_1";
       var id8="ax"+"_"+cuentafil+"_8";

       $(id3).value=$(id1).value;
       $(id4).value=$(id2).value;
       $(id5).value=$(id6).value;
       $(idr).value=$(idr1).value;
       $(id8).value=$(idr10).value;

       if ($(id5).value=='S')
       {
         $(id7).disabled=true;
       }
     $('opordpag_referencias').value=$('opordpag_referencias').value+"_"+$('refere').value;
     }
      fil++;
    }
    $('referencia2').value=$('referencia2').value+"_"+$('refere').value
   sumardatosgrid();

   $('refere').value="";
   $('fecha').value="";
   $('descripcion').value="";
   $('tipo').value="";
   $('destipo').value="";
   $('ajaxs').value="";
   $('mensaje').value="";
   var fil=0;
   var numfil=parseInt($('fila').value);
   while (fil<numfil)
   {
     var caj1="cx"+"_"+fil+"_1";
     var caj2="cx"+"_"+fil+"_2";
     var caj3="cx"+"_"+fil+"_3";
     var caj4="cx"+"_"+fil+"_4";
     var caj5="cx"+"_"+fil+"_5";
     var caj6="cx"+"_"+fil+"_6";
     var caj7="cx"+"_"+fil+"_7";
     var caj8="cx"+"_"+fil+"_8";
     var caj8="cx"+"_"+fil+"_9";
     var caj8="cx"+"_"+fil+"_10";

     $(caj1).value="";
     $(caj2).value="0,00";
     $(caj3).value="0,00";
     $(caj4).value="0,00";
     $(caj5).value="0,00";
     $(caj6).value="0,00";
     $(caj7).value="";
     $(caj8).value="0,00";
     $(caj9).value="0,00";
     $(caj10).value="";
    fil++;
   }
   if ($('opordpag_gencomnom').value=='S' || $('opordpag_gencomnom').value=='A')
   {
       mostrar('divDatos','ref');
       $('refcompr').hide();
       $('btnrete').hide();
  }
  }

  function calculoCompro(e,id)
  {
   if (e.keyCode==13)
   {

    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colcomprc=col-3;
    var colcausa=col-1;
    var colajus=col+1;
    var comprc=name+"_"+fil+"_"+colcomprc;
    var causa=name+"_"+fil+"_"+colcausa;
    var ajusta=name+"_"+fil+"_"+colajus;

    var num3=toFloat(comprc);
    var num4=toFloat(causa);
    var num5=toFloat(id);
    var num6=toFloat(ajusta);
    var calculo= num6;

    if (num5>calculo)
    {
      alert('El Monto a causar no puede ser mayor al compromiso');
      $(id).value="0,00";
    }
    else
    {
	    var num1=toFloat('totalcau');
	    var num2=toFloat('opordpag_monord');
	    var calcu=num1+num2;
	    $('total').value=format(calcu.toFixed(2),'.',',','.');
    }
   }
  }

  function deshabilitariva(e,id)
  {
   if (e.keyCode==13)
   {
	 var aux = id.split("_");
	 var name=aux[0];
	 var fil=aux[1];
	 var col=parseInt(aux[2]);

     var coliva=col+4;
	 var colcheck=col-1;
	 var tieneiva=name+"_"+fil+"_"+coliva;
	 var check=name+"_"+fil+"_"+colcheck;

     if ($(tieneiva).value=='S')
     {
      $(check).disabled=true;
     }
   }
 }

  function totalmarcadas(id)
  {
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);
  var colmonto=col+2;
  var monto=name+"_"+fil+"_"+colmonto;
  var acum=0;

  var montotot=toFloat('totmarcadas');
  var montocausar=toFloat(monto);

  if ($(id).checked==true)
  {
    acum=montotot + montocausar;
    $('totmarcadas').value=format(acum.toFixed(2),'.',',','.');
  }
  else
  {
    acum=montotot - montocausar;
    $('totmarcadas').value=format(acum.toFixed(2),'.',',','.');
  }
 }

  function modifico(e)
  {
   if (e.keyCode==13)
   { document.getElementById('modifico1').value=false; }
  }

  function modificar(e)
  {
   if (e.keyCode==13)
   { document.getElementById('modifico2').value=false;}
  }

  function verificarmarcas(letra,posicion)
  {
   var nfil=parseInt($('opordpag_numfilas').value);
   var am=totalregistros('ax',2,nfil);
   var fil=0;
   while (fil<am)
   {
    var chk=letra+"_"+fil+"_"+posicion;
    if ($(chk).checked==true)
    { return true;
        break;
    }
   fil++;
   }
  }

  function totalregistros(letra,posicion,filas)
  {
    var fil=0;
    var total=0;
    while (fil<filas)
    {
      var chk=letra+"_"+fil+"_"+posicion;
      if ($(chk).value!="")
      { total=total + 1; }
     fil++;
    }
    return total;
  }

  function posicionretencion(codret,codpre,fila,referencia,tot)
  {
    var ind=0;
    var enc=false;
    var nfil=parseInt($('opordpag_numfilas').value);
    while ((ind<tot) && (!enc)) // grid retenciones
    {
      var id1="fx"+"_"+ind+"_1";
      var id2="fx"+"_"+ind+"_2";
      var id4="fx"+"_"+ind+"_4";
      if (referencia!="")
      {
       var tot2=totalregistros('ax',2,nfil);
       if (ind<tot2)//grid imputaciones
       { i=ind;}
       else { i=1;}
       if (($(id1).value==codpre) && ($(id2).value==codret) && ($(id4).value==referencia) && (fila!=ind))
       { enc=true;}
      }
      else
      {
       if (($(id1).value==codpre) && ($(id2).value==codret) && (fila!=ind))
       { enc=true;}
      }
      ind++;
    }
    if (enc)
    { return ind; }
    else {return 0;}
  }

  function posicionenelgrid(codpre,referencia,aw)
  {
    var q=0;
    var enc=false;
    while ((q<aw) && (!enc)) // grid imputaciones
    {
      var id1="ax"+"_"+q+"_2";
      if ($('opordpag_referencias').value=='')
      { $('opordpag_referencias').value='_';}
      var referencias=$('opordpag_referencias').value;
      var ref=referencias.split("_");
      if (referencia=="")
      {
       if ($(id1).value==codpre)
       {
        enc=true; }
      }
      else
      {
       if (($(id1).value==codpre) && (ref[q+1]==referencia))
       { enc=true;}
      }
      q++;
    }
    if (enc)
    { return q-1;}
    else {return 0;}
  }

  function posiciontiporetencion(codret,fila)
  {
    var ind=0;
    var enc=false;
    var total=parseInt($('opordpag_numfilret').value);//totalregistros('ex',1,30);
    while ((ind<total) && (!enc)) //grid aplicaret
    {
      var id="ex"+"_"+ind+"_1";
      if (($(id).value==codret) && (fila!=ind))
      { enc=true;}
     ind++;
    }
   if (enc)
   {return ind;}
   else {return 0;}
  }

  function calcularporcentajeretencion(fila)
  {
    var id1="ex"+"_"+fila+"_10";
    var id2="ex"+"_"+fila+"_11";
    var id3="ex"+"_"+fila+"_5";

    var col10=toFloat(id1);
    var col11=toFloat(id2);
    var col5=toFloat(id3);
    var totord=toFloat('opordpag_monord');

    var valorcalculo= (col10*(col5/100));
    var valorlegal= (totord*(col5/100));

    if (valorcalculo!=col11)
    {
      var cal=(col11/(col10*100));
      var porccalc=redondear(cal,8);
    }
    else
    {
     var cal=((col11/col10)*100);
     var porccalc=redondear(col5,8);
    }

    if (totord!=col10)
    {
      var cal=(col11/totord)*100;
      var porccalc=redondear(cal,8);
    }
    return porccalc;
  }

  function sumarbase(marcasinmarca)
  {
    var nfil=parseInt($('opordpag_numfilas').value);
    if (marcasinmarca)
    {
     if (verificarmarcas('ax',1))
     {
      var monto4=toFloat('totmarcadas');

      var monbase=format(monto4.toFixed(2),'.',',','.');
      return monbase;
     }
    }
   else
   {
    var montbase=0;
    var ac=totalregistros('ax',2,nfil);
  var fil=0;
  while (fil<ac)
  {
   var id4="ax"+"_"+fil+"_2";
   var id3="ax"+"_"+fil+"_3";

   var montcau=toFloat(id3);

   var esrecargo=false;
   var parti=$('partidas').value;
   var aux2=parti.split("_");

   if ($('partidas').value!="")
   {
    var j=0;
    while ((j<(aux2.length)-1) && (!esrecargo))
    {
     var enc=false;
     if (($('afectarec').value=='R') || ($('afectarec').value=='S'))
     {var z=0;
      while ((z<((aux2.length)-1)) && (!enc))
      {
       if (($(id4).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length)))==aux2[z+1])
       {
        esrecargo=true;
        enc=true;
       }
       z++;
      }
     }
     else if (($('afectarec').value=='P'))
     {
      var z=0;
      while ((z<((aux2.length)-1)) && (!enc))
      {
       if ($(id4).value==aux2[z+1])
       {
        esrecargo=true;
        enc=true;
       }
       z++;
      }
     }
      j++;
     }
    }

    if (!esrecargo)
    {
     montbase=montbase + montcau;
    }
   fil++;
   var monbase=format(montbase.toFixed(2),'.',',','.');
  }
  return monbase;
  }
 }

  function calcularetencion(fil) //en VB se usaba dos parametros
  {
    var aux1="ex"+"_"+fil+"_4";
    var aux2="ex"+"_"+fil+"_5";
    var aux3="ex"+"_"+fil+"_10";
    var aux4="ex"+"_"+fil+"_11";
    var aux7="ex"+"_"+fil+"_1";
    var aux15="ex"+"_"+fil+"_7";
    var aux16="ex"+"_"+fil+"_8";
    var aux17="ex"+"_"+fil+"_6";
    var auxmil="ex"+"_"+fil+"_13";

    var base=toFloat(aux3);
    var monreten=toFloat(aux4);
    var porcen=toFloat(aux2);
    var porsus=toFloat(aux15);
    var basimp=toFloat(aux1);
    var unitri=toFloat(aux16);
    var factor=toFloat(aux17);
    var nfil=parseInt($('opordpag_numfilas').value);

    if (porcen!=0)
    {
      if ($('modifico2').value=="true")
      {
        var cal=((porcen/100)*base); //((porcen/100)*(basimp/100)*base);
        $(aux4).value=format(cal.toFixed(2),'.',',','.');
      }
      var totalfilas=totalregistros('ax',2,nfil);
      var i=0;
      while (i<totalfilas) //Grid Detalle
      {
       var aux8="ax"+"_"+i+"_2";
       var aux5="ax"+"_"+i+"_3";
       var aux6="ax"+"_"+i+"_4";
       //var aux7="ex"+"_"+fil+"_1";

      /* nret=parseInt($('opordpag_numfilret').value);
       var tot=totalregistros('fx',1,nret);*/

      var retenc=toFloat(aux6);
      var causado=toFloat(aux5);


     var Montobase= ((causado*basimp)/100);
     var porcent=calcularporcentajeretencion(fil); //se pasaban 3 parametros y se utiliza uno soloen VB
     var cal2=((porcent/100)*Montobase); //((porcent/100)*(basimp/100)*Montobase);
     var retencion=redondear(cal2,8);
     var sustraendo=0;
     var suma=retenc+retencion;
     var calculo=redondear(suma,8);
     $(aux6).value=format(calculo.toFixed(2),'.',',','.');

      /*if ($('opordpag_referencias').value=='')
      { $('opordpag_referencias').value='_';}
     var referencias=$('opordpag_referencias').value;
     var ref=referencias.split("_");
     var posenc=0;
       if (ref[1]=="")
       {  posenc=posicionretencion($(aux7).value,$(aux8).value,-1,"",tot);}
       else {posenc=posicionretencion($(aux7).value,$(aux8).value,-1,ref[i+1],tot);}
       if (posenc==0)
       {
         nret=parseInt($('opordpag_numfilret').value);
         var filaret=totalregistros('fx',1,nret);
         posenc=filaret;
       }
       var aux9="fx"+"_"+posenc+"_1";
       var aux10="fx"+"_"+posenc+"_2";
       var aux11="fx"+"_"+posenc+"_3";
       var aux12="fx"+"_"+posenc+"_4";
       var aux13="fx"+"_"+posenc+"_5";

       $(aux9).value=$(aux8).value;
       $(aux10).value=$(aux7).value;
       $(aux13).value=$(auxmil).value;
       var resta=retencion-sustraendo;
       var calculo1=redondear(resta,8);
       $(aux11).value=format(calculo1.toFixed(2),'.',',','.');
       if (ref[1]!="")
       {$(aux12).value=ref[i+1];}
              */
      i++;
      }

     /* var monto=0;
      var otromonto=0;
      var marcas=0;
      var totreg=totalregistros('ax',2,nfil);
      var l=0;
      while (l<totreg)
      {
       var chk="ax"+"_"+l+"_1";
       if ($(chk).checked==true)
       {marcas=marcas  + 1;}
      l++;
     }
     var desde=(((((fil+1)-1)*marcas)-1)+1);
     var hasta=((fil+1)*marcas);
     while (desde<hasta)
     {
      var aux13="fx"+"_"+desde+"_3";

      var montorete=toFloat(aux13);

      var monto=montorete + monto;
       desde++;
     }

     var aux4="ex"+"_"+fil+"_11";

     var monreten=toFloat(aux4);

     if ((desde)>1)
     {
      var aux14="fx"+"_"+desde+"_3";
      var montorete2=toFloat(aux14);

      otromonto=monreten - monto;
      var cal3=montorete2+otromonto;
      $(aux14).value=format(cal3.toFixed(2),'.',',','.');
     }*/
     }
   else
   {
    var totcau=toFloat('opordpag_monord');

    var porcbase=((base*100)/totcau);
    if ($('monofi').value!=$('opordpag_codmon').value)
        var sustraendo=(unitri*factor)/toFloat('opordpag_valmon');
    else var sustraendo=((porsus/100)*unitri*factor);
    var retencion=((porsus/100)*base); //((porsus/100)*(basimp/100)*base);

     if (retencion>sustraendo)
     {
       var cal4=retencion-sustraendo;
       $(aux4).value=format(cal4.toFixed(2),'.',',','.');
     }
     else { $(aux4).value=format(sustraendo.toFixed(2),'.',',','.');}
     var total=totalregistros('ax',2,nfil);
     var posenc=0;
     var i=0;
      while (i<total)
      {
        var aux8="ax"+"_"+i+"_2";
        var aux5="ax"+"_"+i+"_3";
        var aux6="ax"+"_"+i+"_4";

        var retenc=toFloat(aux6);
        var causado=toFloat(aux5);

        /*nret=parseInt($('opordpag_numfilret').value);
        var tot=totalregistros('fx',1,nret);*/

        var Montobase= ((causado*porcbase)/100);
        var retencion=((porsus/100)*Montobase);//((porsus/100)*(basimp/100)*Montobase);
        var sustraendo=(((porsus/100)*unitri*factor)/total);
        var varia=retenc+(retencion-sustraendo);
        $(aux6).value=format(varia.toFixed(2),'.',',','.');

        /*if ($('opordpag_referencias').value=='')
        { $('opordpag_referencias').value='_';}
        var referencias=$('opordpag_referencias').value;
        var ref=referencias.split("_");
        if (ref[1]=="")
        { posenc=posicionretencion($(aux7).value,$(aux8).value,-1,"",tot);}
        else { posenc=posicionretencion($(aux7).value,$(aux8).value,-1,ref[i+1],tot);}
        if (posenc==0)
        {
            nret=parseInt($('opordpag_numfilret').value);
         var filaret=totalregistros('fx',1,nret);
         posenc=filaret;
        }
        var aux9="fx"+"_"+posenc+"_1";
        var aux10="fx"+"_"+posenc+"_2";
        var aux11="fx"+"_"+posenc+"_3";
        var aux12="fx"+"_"+posenc+"_4";
        var aux13="fx"+"_"+posenc+"_5";
        $(aux9).value=$(aux8).value;
        $(aux10).value=$(aux7).value;
        $(aux13).value=$(auxmil).value;
        if (retencion>sustraendo)
        {
          var calculo1=(retencion-sustraendo);
          $(aux11).value=format(calculo1.toFixed(2),'.',',','.');
        }else {$(aux11).value=format(sustraendo.toFixed(2),'.',',','.');}
              */

      i++;
      }
   }
     actualizarsaldos();
 }

 function calcularretenciones(e,id)
 {
  if (e.keyCode==13)
  {
      var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);
    var colbase=col+9;
    var colmonret=col+10;
    var colesta=col+8;
    var colmonbasmin=col+15; //monto base minimo a utilizar para la retencion
    var colmonbasmax=col+17; //monto base maximo a utilizar para la retencion
    var colbaseim=col+3;
    var coldescrip=col+1;
    var base=name+"_"+fil+"_"+colbase;
    var montoret=name+"_"+fil+"_"+colmonret;
    var esta=name+"_"+fil+"_"+colesta;
    var monbasmin=name+"_"+fil+"_"+colmonbasmin;
    var monbasmax=name+"_"+fil+"_"+colmonbasmax;
    var descrip=name+"_"+fil+"_"+coldescrip;
    var baseim=name+"_"+fil+"_"+colbaseim;
    var sigue=true;
    var nfil=parseInt($('opordpag_numfilas').value);
    var nbase=toFloat(baseim);

  if ($('opordpag_afectapre').value==1)
  {
    if ($(esta).value!="N")
    {
      var tota=totalregistros('ax',2,nfil);
      var monbase=0;
      var fila=0;
      while (fila<tota)
      {
        var id2="ax"+"_"+fila+"_2";
        var id3="ax"+"_"+fila+"_3";

        var montcau=toFloat(id3);

        var enc=false;
        var sesta=$(esta).value;
        var auxi=sesta.split("_");
        if (($('afectarec').value=='R') || ($('afectarec').value=='S'))
        {
         var j=0;
         while ((j<((auxi.length)-1)) && (!enc))
         {
          if (($(id2).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length)))==auxi[j+1])
          {
            monbase=monbase + montcau;
            enc=true;
          }
          j++;
         }
        }
        else if (($('afectarec').value=='P'))
        {
         var j=0;
         while ((j<((auxi.length)-1)) && (!enc))
         {
          if ($(id2).value==auxi[j+1])
          {
           monbase=monbase + montcau;
           enc=true;
          }
          j++;
         }
        }
       fila++;
      }
      if ($('opordpag_comnoiva').value=='S' && $('opordpag_documento').value!='N')
      {
         monbase=toFloat('opordpag_monorddisrgo');
         if (monbase==0)
          monbase=toFloat('opordpag_monrgo');
      }
      if ($('opordpag_aplrecop').value=='S' && $('opordpag_documento').value=='N')
      {
           monbase=toFloat('opordpag_monrgo');
      }

      
      monbase=monbase*(nbase/100);
      if ($('opordpag_limbaseret').value=='S') // Configuracion para validar que monto base sea mayor al dfinido para la retencion
      {
         var monbasemin=toFloat(monbasmin);
         var monbasemax=toFloat(monbasmax);
         if ($('ranminmax').value=='S')
         {
             if (((monbase*toFloat('opordpag_valmon')) >= monbasemin)  && ((monbase*toFloat('opordpag_valmon')) <= monbasemax))
             {
                 $(base).value=format(monbase.toFixed(2),'.',',','.');

             }else {
               alert('El Monto Base para el Calculo no es el mínimo requerido para esta retención.');
               sigue=false;
            }
         }else  {
             if ((monbase*toFloat('opordpag_valmon')) >= monbasemin)
             {
                 $(base).value=format(monbase.toFixed(2),'.',',','.');

             }else {
               alert('El Monto Base para el Calculo no es el mínimo requerido para esta retención.');
               sigue=false;
            }
      }
      }else {          
       $(base).value=format(monbase.toFixed(2),'.',',','.');
      }
    }
    else
    {
      if (verificarmarcas('ax',1))
      {
        var montbase=sumarbase(true);
        var cabase=toFloat2(montbase)*(nbase/100);
        montbase=format(cabase.toFixed(2),'.',',','.');
        if ($('opordpag_limbaseret').value=='S') // Configuracion para validar que monto base sea mayor al dfinido para la retencion
        {
             var formontbase=toFloat2(montbase)*toFloat('opordpag_valmon');
             var monbasemin=toFloat(monbasmin);
             var monbasemax=toFloat(monbasmax);
             if ($('ranminmax').value=='S')
             {
                  if (formontbase >= monbasemin  && formontbase <= monbasemax)
                 {
                    $(base).value=montbase;
                 }else {
                   alert('El Monto Base para el Calculo no es el mínimo requerido para esta retención.');
                   sigue=false;
                  }
             }else  {             
             if (formontbase >= monbasemin)
             {
                $(base).value=montbase;
             }else {
               alert('El Monto Base para el Calculo no es el mínimo requerido para esta retención.');
               sigue=false;
              }
            }
        }else {
              $(base).value=montbase;
        }
      }
      else
      {
        if (($('afectarec').value=='R') || ($('afectarec').value=='S') || ($('afectarec').value=='P'))
        {
          var montbase=sumarbase(false);
          var cabase=toFloat2(montbase)*(nbase/100);
          montbase=format(cabase.toFixed(2),'.',',','.');
          if ($('opordpag_limbaseret').value=='S') // Configuracion para validar que monto base sea mayor al dfinido para la retencion
            {
                 var formontbase=toFloat2(montbase)*toFloat('opordpag_valmon');
                 var monbasemin=toFloat(monbasmin);
                 var monbasemax=toFloat(monbasmax);
                 if ($('ranminmax').value=='S')
                 {
                     if (formontbase >= monbasemin  && formontbase <= monbasemax)
                     {
                          $(base).value=montbase;
                     }else {
                       alert('El Monto Base para el Calculo no es el mínimo requerido para esta retención.');
                       sigue=false;
                        }
                 }else {
                     if (formontbase >= monbasemin)
                     {
                          $(base).value=montbase;
                     }else {
                       alert('El Monto Base para el Calculo no es el mínimo requerido para esta retención.');
                       sigue=false;
                        }
                 }
            }else {
                  $(base).value=montbase;
            }
        }
        else
        {
            var calbase=toFloat('opordpag_monord')*(nbase/100);
            var montobase=format(calbase.toFixed(2),'.',',','.');
          if ($('opordpag_limbaseret').value=='S') // Configuracion para validar que monto base sea mayor al dfinido para la retencion
            {
                 var formontbase=toFloat('opordpag_monord')*toFloat('opordpag_valmon');
                 var monbasemin=toFloat(monbasmin);
                 var monbasemax=toFloat(monbasmax);
               if ($('ranminmax').value=='S')
               {
                   if (formontbase >= monbasemin && formontbase <= monbasemax)
                 {
                   $(base).value=format(montobase.toFixed(2),'.',',','.');//$('opordpag_monord').value;
                 }else {
                   alert('El Monto Base para el Calculo no es el mínimo requerido para esta retención.');
                   sigue=false;
                  }
               }else {
                 if (formontbase >= monbasemin)
                 {
                   $(base).value=format(montobase.toFixed(2),'.',',','.'); //$('opordpag_monord').value;
                 }else {
                   alert('El Monto Base para el Calculo no es el mínimo requerido para esta retención.');
                   sigue=false;
                  }
               }
            }else {
                  $(base).value=format(montobase.toFixed(2),'.',',','.'); //$('opordpag_monord').value;
    }
        }
      }
    }
  }else {
    var calbase=toFloat('opordpag_neto')*(nbase/100);
            var montobase=format(calbase.toFixed(2),'.',',','.');
    if ($('opordpag_limbaseret').value=='S') // Configuracion para validar que monto base sea mayor al dfinido para la retencion
    {
         var formontbase=toFloat('opordpag_neto')*toFloat('opordpag_valmon');
         var monbasemin=toFloat(monbasmin);
         var monbasemax=toFloat(monbasmax);
       if ($('ranminmax').value=='S')
       {
         if (formontbase >= monbasemin  && formontbase <= monbasemax)
         {
           $(base).value=format(montobase.toFixed(2),'.',',','.'); //$('opordpag_neto').value;
         }else {
           alert('El Monto Base para el Calculo no es el mínimo requerido para esta retención.');
           sigue=false;
         }
       }else  {
         if (formontbase >= monbasemin)
         {
           $(base).value=format(montobase.toFixed(2),'.',',','.'); //$('opordpag_neto').value;
         }else {
           alert('El Monto Base para el Calculo no es el mínimo requerido para esta retención.');
           sigue=false;
         }
       }

    }else {
          $(base).value=format(montobase.toFixed(2),'.',',','.'); //$('opordpag_neto').value;
    }
  }
  if ($('opordpag_limbaseret').value=='S') // Configuracion para validar que monto base sea mayor al dfinido para la retencion
  {
    if (sigue)
    {
   if (posiciontiporetencion($(id).value,fil)!=0)
   { alert('El Tipo de Retencion ya fue Registrado');}
   else
       {
           if ($('opordpag_sincalret').value=='S') {
               calcularetencion2(fil);
    }else {
               calcularetencion(fil); actualizarsaldos();
           }

       }
    }else {
        $(id).value='';
        $(descrip).value='';
        $(base).value='0,00';
        $(motoret).value='0,00';
  }
  }else {
   if (posiciontiporetencion($(id).value,fil)!=0)
   { alert('El Tipo de Retencion ya fue Registrado');}
   else
   {
       if ($('opordpag_sincalret').value=='S') {
               calcularetencion2(fil);
           }else {
               calcularetencion(fil); actualizarsaldos();
 }
  }
 }
  }
 }

 function distribuyeretenciones()
 {
   nret=parseInt($('opordpag_numfilret').value);
   var tot2=totalregistros('fx',1,nret);
   var g=0;
   while (g<tot2)
   {
     caj1="fx"+"_"+g+"_1";
     caj2="fx"+"_"+g+"_2";
     caj3="fx"+"_"+g+"_3";
     caj4="fx"+"_"+g+"_4";
     caj5="fx"+"_"+g+"_5";

     $(caj1).value="";
     $(caj2).value="";
     $(caj3).value="0,00";
     $(caj4).value="";
     $(caj5).value="";
     g++;
   }
   var cienxcien=0;
   if (verificarmarcas('ax',1))
   {
    var xcien=toFloat('totmarcadas');
    cienxcien=xcien;
   }
   else
   {
    var montobas=sumarbase(false);
    var valor=String(montobas);
    var xcien=toFloat2(valor);

    cienxcien=xcien;
   }
   var nfil=parseInt($('opordpag_numfilas').value);

  var ww=parseInt($('opordpag_numfilret').value);//totalregistros('ex',1,30);
  var ab=totalregistros('ax',2,nfil);
  var fil=0;
  while (fil<ww)
  {
    var base="ex"+"_"+fil+"_10";
    var montoret="ex"+"_"+fil+"_11";
    var unomil="ex"+"_"+fil+"_13";
    var esta="ex"+"_"+fil+"_9";
    var tipret="ex"+"_"+fil+"_1";

    var montorete=toFloat(montoret);

    if ($(esta).value!="N")
   {
    var baseretiva=0;
    var fila=0;
    while (fila<ab)
    {
      var id2="ax"+"_"+fila+"_2";
      var id3="ax"+"_"+fila+"_3";

      var montcau=toFloat(id3);

      var enc=false;
      var estan=$(esta).value;
      var auxi=estan.split("_");

      if (($('afectarec').value=='R') || ($('afectarec').value=='S'))
      {
        var j=0;
        while ((j<((auxi.length)-1)) && (!enc))
        {
         if (($(id2).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length)))==auxi[j+1])
         {
           baseretiva=baseretiva + montcau;
           enc=true;
          }
        j++;
        }
      }
      else if (($('afectarec').value=='P'))
      {
        var j=0;
        while ((j<((auxi.length)-1)) && (!enc))
        {
        if ($(id2).value==auxi[j+1])
        {
          baseretiva=baseretiva + montcau;
          enc=true;
        }
        j++;
       }
      }
     fila++;
   }
   if ($('opordpag_comnoiva').value=='S' && $('opordpag_documento').value!='N')
   {
      baseretiva=toFloat('opordpag_monorddisrgo');
      if (baseretiva==0)
        baseretiva=toFloat('opordpag_monrgo');
   }
   if ($('opordpag_aplrecop').value=='S' && $('opordpag_documento').value=='N')
   {
       baseretiva=toFloat('opordpag_monrgo');
   }

   if ($('opordpag_referencias').value=='')
   { $('opordpag_referencias').value='_';}
   var referencias=$('opordpag_referencias').value;
   var ref=referencias.split("_");
   var l=0;
   while (l<ab)
   {
      var id4="ax"+"_"+l+"_2";
      var id5="ax"+"_"+l+"_3";

      nret=parseInt($('opordpag_numfilret').value);
      var total=totalregistros('fx',1,nret);
      var causado=toFloat(id5);

      var enc=false;
      var estas=$(esta).value;
      var auxil=estas.split("_");
      var posenc=0;
      var x=0;
      while ((x<((auxil.length)-1)) && (!enc))
      {
       if ((($('afectarec').value=='R') && ($(id4).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length))==auxil[x+1])) || (($('afectarec').value=='P') && ($(id4).value==auxil[x+1])) || (($('afectarec').value=='S') && (($(id4).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length)))==auxil[x+1])))
       {
        var por=((causado*100)/baseretiva);
        var porcentaje=redondear(por,8);
        if ($('opordpag_documento').value!='N')
        {
          posenc=posicionretencion($(tipret).value,$(id4).value,-1,ref[l+1],total);
        }
        else
        {
          posenc=posicionretencion($(tipret).value,$(id4).value,-1,"",total);
        }

        if (posenc==0)
          {
           nret=parseInt($('opordpag_numfilret').value);
           var filaret=totalregistros('fx',1,nret);
           posenc=filaret;
          }

          var aux9="fx"+"_"+posenc+"_1";
          var aux10="fx"+"_"+posenc+"_2";
          var aux11="fx"+"_"+posenc+"_3";
          var aux12="fx"+"_"+posenc+"_4";
          var aux13="fx"+"_"+posenc+"_5";

          $(aux9).value=$(id4).value;
          $(aux10).value=$(tipret).value;
          $(aux13).value=$(unomil).value;
          var multi=0;
          if ($(montoret).value!="")
          {
            multi=redondear(((montorete*porcentaje)/100),8);
            $(aux11).value=format(multi.toFixed(2),'.',',','.');
          }
          else
          {
            multi=((0*porcentaje)/100);
            $(aux11).value=format(multi.toFixed(2),'.',',','.');
          }

         if (ref[1]!="")
         {
          $(aux12).value=ref[l+1];
         }
       enc=true;
      }
      if ($('opordpag_comnoiva').value=='S' && $('opordpag_documento').value!='N')
      {
        var por=((causado*100)/baseretiva);
        var porcentaje=redondear(por,8);
        posenc=posicionretencion($(tipret).value,$(id4).value,-1,ref[l+1],total);

        if (posenc==0)
        {
         nret=parseInt($('opordpag_numfilret').value);
         var filaret=totalregistros('fx',1,nret);
         posenc=filaret;
        }
        var aux9="fx"+"_"+posenc+"_1";
        var aux10="fx"+"_"+posenc+"_2";
        var aux11="fx"+"_"+posenc+"_3";
        var aux12="fx"+"_"+posenc+"_4";
        var aux13="fx"+"_"+posenc+"_5";

        $(aux9).value=$(id4).value;
        $(aux10).value=$(tipret).value;
        $(aux13).value=$(unomil).value;
        var multi=0;
        if ($(montoret).value!="")
        {
          multi=redondear(((montorete*porcentaje)/100),8);
          $(aux11).value=format(multi.toFixed(2),'.',',','.');
        }
        else
        {
          multi=((0*porcentaje)/100);
          $(aux11).value=format(multi.toFixed(2),'.',',','.');
        }

       if (ref[1]!="")
       {
        $(aux12).value=ref[l+1];
       }
       enc=true;
      }
      if ($('opordpag_aplrecop').value=='S' && $('opordpag_documento').value=='N')
      {
        var por=((causado*100)/baseretiva);
        var porcentaje=redondear(por,8);
        posenc=posicionretencion($(tipret).value,$(id4).value,-1,"",total);      

        if (posenc==0)
        {
         nret=parseInt($('opordpag_numfilret').value);
         var filaret=totalregistros('fx',1,nret);
         posenc=filaret;
        }
        var aux9="fx"+"_"+posenc+"_1";
        var aux10="fx"+"_"+posenc+"_2";
        var aux11="fx"+"_"+posenc+"_3";
        var aux12="fx"+"_"+posenc+"_4";
        var aux13="fx"+"_"+posenc+"_5";

        $(aux9).value=$(id4).value;
        $(aux10).value=$(tipret).value;
        $(aux13).value=$(unomil).value;
        var multi=0;
        if ($(montoret).value!="")
        {
          multi=redondear(((montorete*porcentaje)/100),8);
          $(aux11).value=format(multi.toFixed(2),'.',',','.');
        }
        else
        {
          multi=((0*porcentaje)/100);
          $(aux11).value=format(multi.toFixed(2),'.',',','.');
        }
        enc=true;
      }
     x++;
     }
     l++;
    }
   }
   else
   {
    if ($('opordpag_referencias').value=='')
    { $('opordpag_referencias').value='_';}
    var referencias=$('opordpag_referencias').value;
   var ref=referencias.split("_");
    if (!verificarmarcas('ax',1))
  {
    var fi=0;
    while (fi<ab)
    {
      var id4="ax"+"_"+fi+"_2";
      var id3="ax"+"_"+fi+"_3";
      nret=parseInt($('opordpag_numfilret').value);
      var total=totalregistros('fx',1,nret);

      var montcau=toFloat(id3);

      var esrecargo=false;
      var parti=$('partidas').value;
      var aux2=parti.split("_");
      var posenc=0;

      if ($('partidas').value!="")
      {
        var j=0;
        while ((j<((aux2.length)-1)) && (!esrecargo))
        {
          enc=false;
          if (($('afectarec').value=='R') || ($('afectarec').value=='S'))
          {
            var z=0;
            while ((z<((aux2.length)-1)) && (!enc))
            {
              if (($(id4).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length)))==aux2[z+1])
              {
                esrecargo=true;
                enc=true;
              }
              z++;
            }
         }
         else if (($('afectarec').value=='P'))
         {
           var z=0;
           while ((z<((aux2.length)-1)) && (!enc))
           {
             if ($(id4).value==aux2[z+1])
             {
               esrecargo=true;
               enc=true;
             }
             z++;
           }
         }
          j++;
         }
       }

      if (!esrecargo)
      {
        if (cienxcien>0)
        {
          var porcentaje=redondear(((montcau*100)/cienxcien),8);
        }
        else{ var porcentaje=0;}

        var monto=0;
        var resta=0;
        if ($('opordpag_documento').value!='N')
      {
        posenc=posicionretencion($(tipret).value,$(id4).value,-1,ref[fi+1],total);
      }
      else
      {
       posenc=posicionretencion($(tipret).value,$(id4).value,-1,"",total);
      }

      if (posenc==0)
        {
         nret=parseInt($('opordpag_numfilret').value);
         var filaret=totalregistros('fx',1,nret);
         posenc=filaret;
        }

        var aux9="fx"+"_"+posenc+"_1";
        var aux10="fx"+"_"+posenc+"_2";
        var aux11="fx"+"_"+posenc+"_3";
        var aux12="fx"+"_"+posenc+"_4";
        var aux13="fx"+"_"+posenc+"_5";

        $(aux9).value=$(id4).value;
        $(aux10).value=$(tipret).value;
        $(aux13).value=$(unomil).value;
        var multi=0;
        if ($(montoret).value!="")
        {
          multi=redondear(((montorete*porcentaje)/100),8);
          $(aux11).value=format(multi.toFixed(2),'.',',','.');
        }
        else
        {
          multi=((0*porcentaje)/100);
          $(aux11).value=format(multi.toFixed(2),'.',',','.');
        }

       if (ref[1]!="")
       { $(aux12).value=ref[fi+1]; }
      }
     fi++;
    }
  }
  else
  {
    var montototal=toFloat('opordpag_monord');

   if ((montototal> 0) && $(tipret).value!="" && $(montoret).value!="")
     { var porcentaje=redondear(((montorete*100)/cienxcien),8);}
     else{ var porcentaje=0;}
     var monto=0;
     var resta=0;
     var fi=0;
     while (fi<ab)
   {
    var id1="ax"+"_"+fi+"_1";
    var id4="ax"+"_"+fi+"_2";
    var id3="ax"+"_"+fi+"_3";
    nret=parseInt($('opordpag_numfilret').value);
    var total=totalregistros('fx',1,nret);

    var montcau=toFloat(id3);

    var posenc=0;
      if ($(id1).checked==true)
      {
        if ($('opordpag_documento').value!='N')
      { posenc=posicionretencion($(tipret).value,$(id4).value,-1,ref[fi+1],total);}
      else
      { posenc=posicionretencion($(tipret).value,$(id4).value,-1,"",total);}

      if (posenc==0)
        {
         nret=parseInt($('opordpag_numfilret').value);
         var filaret=totalregistros('fx',1,nret);
         posenc=filaret;
        }
        var aux9="fx"+"_"+posenc+"_1";
        var aux10="fx"+"_"+posenc+"_2";
        var aux11="fx"+"_"+posenc+"_3";
        var aux12="fx"+"_"+posenc+"_4";
        var aux13="fx"+"_"+posenc+"_5";

        $(aux9).value=$(id4).value;
        $(aux10).value=$(tipret).value;
        $(aux13).value=$(unomil).value;
        var multi=0;
        if ($(montoret).value!="")
        {
          multi=redondear(((montcau*porcentaje)/100),8);
          $(aux11).value=format(multi.toFixed(2),'.',',','.');
          monto= multi + monto;
          if (ref[1]!="")
          { $(aux12).value=ref[fi+1];}
        }
        else
        {
          multi=((0*porcentaje)/100);
          $(aux11).value=format(multi.toFixed(2),'.',',','.');

        }
       }
       fi++;
   }

   var resta=montorete - monto;
   var aux11="fx"+"_"+posenc+"_3";
   var montoretec=toFloat(aux11);


  var cal2= montoretec +resta;
   $(aux11).value=format(cal2.toFixed(2),'.',',','.');
  }
   }
  fil++;
  }
 }

 function verificarultimomarcado(letra,fila,posicion1,posicion2)
 {
   var total=totalregistros(letra,fila,posicion1);
   var ultimo=0;
   var fil=0;
   while (fil<total)
   {
     var chk=letra+"_"+fil+"_"+posicion2;
     if ($(chk).checked==true)
     { ultimo=fil;}
    fil++;
   }
   return ultimo;
  }

 function sumarretenciones()
 {
  var nfil=parseInt($('opordpag_numfilas').value);
  var aw=totalregistros('ax',2,nfil);
  var ind=0;
  while (ind<aw)
  {
   var aux="ax"+"_"+ind+"_4";
   $(aux).value="0,00";
  ind++;
  }

  nret=parseInt($('opordpag_numfilret').value);
  var zz=totalregistros('fx',1,nret);
  var inc=0;
  var p=0;
  var fildondesta=0;
  while (p<zz)
  {
    var aux1="fx"+"_"+p+"_1";
    var aux2="fx"+"_"+p+"_4";
    var aux4="fx"+"_"+p+"_3";

    var monto=toFloat(aux4);

  if ($('opordpag_referencias').value=='')
  { $('opordpag_referencias').value='_';}
  var referencias=$('opordpag_referencias').value;
  var ref=referencias.split("_");
    if (ref[1]!="")
    {
      if (p<=aw)
      { i=p; }
      else
      {
        i=inc;
        inc=inc+1;
        if (inc>aw)
        {
         inc=0;
        }
      }
    fildondesta=posicionenelgrid($(aux1).value,$(aux2).value,aw);
   }
   else {fildondesta=posicionenelgrid($(aux1).value,"",aw);}
   if (fildondesta!=-1)
   {
     var aux3="ax"+"_"+fildondesta+"_4";
     var retencion=toFloat(aux3);

   var calculo=retencion + monto;
     $(aux3).value=format(calculo.toFixed(2),'.',',','.');
   }
   p++;
  }
  sumardatosgrid();
 }

 function salvarretenciones()
 {
  var formulario='sf_admin/pagemiord';
  new Ajax.Request('/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=17&formulario='+formulario})

  $('opordpag_presiono').value='S';
 /* nret=parseInt($('opordpag_numfilret').value);
  var tot1=totalregistros('fx',1,nret);
  var fi=0;
   while (fi<tot1)
   {
     var caj1="fx"+"_"+fi+"_1";
     var caj2="fx"+"_"+fi+"_2";
     var caj3="fx"+"_"+fi+"_3";
     var caj4="fx"+"_"+fi+"_4";

     $(caj1).value="";
     $(caj2).value="";
     $(caj3).value="0,00";
     $(caj4).value="";
     fi++;
   }*/

  var axx=parseInt($('opordpag_numfilret').value);//totalregistros('ex',1,30);
  var o=0;
  while (o<axx)
  {
    calcularetencion(o);
  o++;
  }
  //distribuyeretenciones();
  //sumarretenciones();
  sumardatosgrid();
  if ($('opordpag_afectapre').value==0)
  {
   var montcau=toFloat('opordpag_monord');
   var montrete=toFloat('opordpag_monret');
   var monto6=toFloat('opordpag_mondes');

   var calculo= montcau-(montrete+monto6);

    $('opordpag_neto').value=format(calculo.toFixed(2),'.',',','.');
  }
  $('reten').hide();
 }

 function porcentajeISLRN(tipo,campo)
 {
   porcentajeislr=0;
   total=parseInt($('opordpag_numfilret').value);//totalregistros('ex',1,30);
   j=0;
   while (j<total)
   {
     var islr="ex"+"_"+j+"_12";
     var unoxmil="ex"+"_"+j+"_13";
     var base="ex"+"_"+j+"_4";
     var porcen="ex"+"_"+j+"_5";
     var codret="ex"+"_"+j+"_1";

     switch(tipo)
     {
       case "ISLR":
       trajo=$(islr).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;
     }
    if (trajo=="S")
    {
       if (campo=="BasImp")
       {
         porcentajeislr=$(base).value;
       }else { 
        if (tipo=="ISLR")
          porcentajeislr=parseInt($(porcen).value)+"_"+$(codret).value;
        else
          porcentajeislr=$(porcen).value;
      }
     break;
    }
    j++;
  }
  return porcentajeislr;
 }

  function porcentajeISLRC(tipo,campo, codigo)
 {
   var porcentajeislr=0;
   var total=$('numgridret').value;
   var j=0;
   var trajo="";
   while (j<total)
   {
     var islr="dx"+"_"+j+"_10";
     var unoxmil="dx"+"_"+j+"_11";
     var base="dx"+"_"+j+"_4";
     var porcen="dx"+"_"+j+"_5";
     var codret="dx"+"_"+j+"_2";
     
     var codigo2=$(codret).value;

     switch(tipo)
     {
       case "ISLR":
           if (codigo2==codigo) {
               trajo=$(islr).value;
           }
       break;
       case "1*MIL":
       trajo=$(unoxmil).value;
       break;
     }
    if (trajo=="S")
    {
       if (campo=="BasImp")
       {
         porcentajeislr=$(base).value;
       }else { 

        if (tipo=="ISLR")
        porcentajeislr=parseInt($(porcen).value)+"_"+$(codret).value;
      else
        porcentajeislr=$(porcen).value;
     }
     break;
    }
    j++;
  }
  return porcentajeislr;
 }

 function porcentajeIRSN(tipo,campo)
 {
   porcentajeirs=0;
   total=parseInt($('opordpag_numfilret').value);//totalregistros('ex',1,30);
   j=0;
   while (j<total)
   {
     var irs="ex"+"_"+j+"_15";
     var imn="ex"+"_"+j+"_17";
     var unoxmil="ex"+"_"+j+"_13";
     var base="ex"+"_"+j+"_4";
     var porcen="ex"+"_"+j+"_5";

     switch(tipo)
     {
       case "IRS":
       trajo=$(irs).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;
       
       case "IMN":
       trajo=$(imn).value;
       break;       
     }
    if (trajo=="S")
    {
       if (campo=="BasImp")
       {
         porcentajeirs=$(base).value;
       }else { porcentajeirs=$(porcen).value;}
     break;
    }
    j++;
  }
  return porcentajeirs;
 }

  function porcentajeIRSC(tipo,campo)
 {
   var porcentajeirs=0;
   var total=$('numgridret').value;
   var j=0;
   while (j<total)
   {
     var irs="dx"+"_"+j+"_13";
     var imn="dx"+"_"+j+"_14";
     var unoxmil="dx"+"_"+j+"_11";
     var base="dx"+"_"+j+"_4";
     var porcen="dx"+"_"+j+"_5";

     switch(tipo)
     {
       case "IRS":
       trajo=$(irs).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;
       
       case "IMN":
       trajo=$(imn).value;
       break;       
     }
    if (trajo=="S")
    {
       if (campo=="BasImp")
       {
         porcentajeirs=$(base).value;
       }else { porcentajeirs=$(porcen).value;}
     break;
    }
    j++;
  }
  return porcentajeirs;
 }

/* function encontrarIva()
 {
   encontrariva=0;
   total=totalregistros('ex',1,20);
   j=0;
   while (j<total)
   {
     var monto="ex"+"_"+j+"_14";
     if ($(monto).value!="")
     {
       encontrariva=$(monto).value;
       break;
     }
    j++;
   }
  return encontrariva;
 }*/

 function encontrarISLRC(tipo,codigo)
 {
    index=$(codigo).selectedIndex;
    var cod=$(codigo).options[index].text;
    var codret2=cod.split("_");     
     
   encontrarislr=0;
   
   if ($('id').value=="")
  {
    total=parseInt($('opordpag_numfilret').value);//totalregistros('ex',1,30);
    j=0;
    while (j<total)
    {
     var islr="ex"+"_"+j+"_12";
     var unoxmil="ex"+"_"+j+"_13";
     var codret="ex"+"_"+j+"_1";
     var monto="ex"+"_"+j+"_11";
     
     switch(tipo)
     {
       case "ISLR":
          if ($(codret).value==codret2[0])
               trajo=$(islr).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;
     }
    if (trajo=="S")
    {
     encontrarislr=$(monto).value;
     break;
    }
    j++;
  }
     
    }else  {
   
   var total=$('numgridret').value;
    var j=0;
    var trajo="";
    while (j<total)
    {
     var islr="dx"+"_"+j+"_10";
     var unoxmil="dx"+"_"+j+"_11";
     var mont="dx"+"_"+j+"_12";
     var codret="dx"+"_"+j+"_2";

     switch(tipo)
     {
       case "ISLR":
          if ($(codret).value==codret2[0])
               trajo=$(islr).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;
     }
    if (trajo=="S")
    {
     encontrarislr=$(mont).value;
     break;
    }
    j++;
  }
    }
    $('elislr').value=toFloat2(encontrarislr);
  return encontrarislr;
  }

 /*function factura()
 {
   if ($('opordpag_numord').value!="")
   {
    if ($('id').value=="")
    {
       eliva=encontrarIva();
       $('eliva').value=eliva;
       elislr=encontrarISLR("ISLR");
       $('elislr').value=elislr;
       eltimbre=encontrarISLR("1*MIL");
       $('eltimbre').value=eltimbre;
    }
    else
    {

    }

    if ((eliva!=0) || (elislr!=0) || (eltimbre!=0))
    {
      $('verfac').show();
       n=0;
       while (n<10)
       {
         var alicuota="bx"+"_"+n+"_11";
         for(i=8;i<=21;i++)
         {
         var campo="bx"+"_"+n+"_"+i;
         if ((i!=11) && (i!=14) && (i!=15))
         {
          if ($(campo).value=="")
          {
            $(campo).value="0,00";
          }
         }

         if (($(alicuota).value="0,00") || ($(alicuota).value=""))
         {
          $(alicuota).value=eliva;
         }
        }
         n++;
       }
    }
    else { alert('No hay Retenciones que generen comprobante');}
   }
 }*/



  function nrofacturadeshabilitar(e,id)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var debito=col+2;
     var credito=col+3;
     var tipo=col+4;
     var afectada=col+5;

     var notdeb=name+"_"+fil+"_"+debito;
     var notcre=name+"_"+fil+"_"+credito;
     var tipotrans=name+"_"+fil+"_"+tipo;
     var facafect=name+"_"+fil+"_"+afectada;
   if ($(id).value!="") {
     if (!numfac_repetido(id))
     {
       $(notdeb).disabled=true;
       $(notcre).disabled=true;
       $(tipotrans).value="01";
       $(facafect).disabled=true;
       new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=99&cedrif='+$('opordpag_cedrif').value+'&id='+id+'&cajtexmos='+facafect+'&codigo='+$(id).value})
     }else{
      alert_('El N&uacute;mero de Factura esta Repetido para ese mismo Proveedor');
      $(id).value="";
      $(id).focus();
     }
   }
   }
 }

  function numfac_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var rifalt=name+"_"+fila+"_23";

   var numfac=$(id).value+"-"+$(rifalt).value;

   var numfacrepetido=false;
   if ($('valnumfac').value=='S') {
   var nfil=parseInt($('opordpag_numfilfac').value);
   var am=totalregistros('bx',2,nfil);
   var i=0;
   while (i<am)
   {
    var codigo="bx"+"_"+i+"_2";
    var rifalt2="bx"+"_"+i+"_23";

    var numfac2=$(codigo).value+"-"+$(rifalt2).value;

    if (i!=fila)
    {
      if (numfac==numfac2)
      {
        numfacrepetido=true;
        break;
      }
    }
   i++;
   }
 }
   return numfacrepetido;
 }

 function debitodeshabilitar(e,id)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var factura=col-2;
     var credito=col+1;
     var tipo=col+2;

     var notcre=name+"_"+fil+"_"+credito;
     var tipotrans=name+"_"+fil+"_"+tipo;
     var nrofac=name+"_"+fil+"_"+factura;

    if ($(id).value!="") {
     $(notcre).disabled=true;
     $(tipotrans).value="02";
     $(nrofac).disabled=true;
     new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=99&codigo='+id})
   }
   }
 }

  function creditodeshabilitar(e,id)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var factura=col-3;
     var debito=col-1;
     var tipo=col+1;

     var notdeb=name+"_"+fil+"_"+debito;
     var tipotrans=name+"_"+fil+"_"+tipo;
     var nrofac=name+"_"+fil+"_"+factura;

   if ($(id).value!="") {
     $(notdeb).disabled=true;
     $(tipotrans).value="03";
     $(nrofac).disabled=true;
     new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=99&codigo='+id})
   }
   }
 }

 function recalculaRetencion(fila,monto)
 {
    var codtip="dx"+"_"+fila+"_2";
    var porret="dx"+"_"+fila+"_5";
    var baseimp="dx"+"_"+fila+"_4";
    var porsus="dx"+"_"+fila+"_7";
    var unitri="dx"+"_"+fila+"_8";
    var factor="dx"+"_"+fila+"_6";

    var porcentaje=toFloat(porret);
    var base=toFloat(baseimp);
    var unidad=toFloat(unitri);
    var sus=toFloat(porsus);
   // var fact=toFloat('fac');
    var fact=toFloat(factor);

    if (porcentaje!=0)
    {
      cals=((porcentaje/100)*monto); //((porcentaje/100)*(base/100)*monto);
      recalcularetencion=format(cals.toFixed(2),'.',',','.');
    }
    else
    {
       if ($('monofi').value!=$('opordpag_codmon').value)
        var sust=(unidad*fact)/toFloat('opordpag_valmon');
       else
         var  sust=((sus/100)*unidad*fact);
      reten=((sus/100)*monto); //((sus/100)*(base/100)*monto);
      if (reten > sust)
      {
        calc=reten - sust;
        recalcularetencion=format(calc.toFixed(2),'.',',','.');
      }
      else
      {
        recalcularetencion=format(sust.toFixed(2),'.',',','.');
      }
    }

  return recalcularetencion;
 }

 function calcularBaseImponible(tipo,codigo)
 {
 var calcularbaseimponible=0;
 var trajo=""; 
  if ($('id').value=="")
  {
    total=parseInt($('opordpag_numfilret').value);//totalregistros('ex',1,30);
    j=0;
    while (j<total)
    {
     var baseimp="ex"+"_"+j+"_10";
     var islr="ex"+"_"+j+"_12";
     var unoxmil="ex"+"_"+j+"_13";
     var irs="ex"+"_"+j+"_15";
     var imn="ex"+"_"+j+"_17";
     var codret="ex"+"_"+j+"_1";

     switch(tipo)
     {
       case "ISLR":
           if ($(codret).value==codigo)
               trajo=$(islr).value;
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;

       case "IRS":
       trajo=$(irs).value;
       break;
       
       case "IMN":
       trajo=$(imn).value;
       break;
     }
    if (trajo=="S")
    {
      calcularbaseimponible=$(baseimp).value;
     break;
    }
    j++;
   }
  }
  else
  {
    var fila=0;
    var tota=$('numgridconsulta').value;
    if ($('opordpag_afectapre').value=='S') {
    while (fila<tota)
    {
      var id2="ax"+"_"+fila+"_2";
      var id3="ax"+"_"+fila+"_3";
      var id4="ax"+"_"+fila+"_4";
      var id6="ax"+"_"+fila+"_7";

     var montcau=toFloat(id3);
     var montret=toFloat(id4);
     var apliva=$(id6).value;

     var enc=false;
     var sesta=$('esta').value;
     var auxi=sesta.split("_");
     //if (montret > 0)
     //{
        if (($('afectarec').value=='R') || ($('afectarec').value=='S'))
        {
         var j=0;
         while ((j<((auxi.length)-1)) && (!enc))
         {
          if (!(($(id2).value.substring(parseInt($('inicio').value),parseInt($('formato').value.length)))==auxi[j+1]))
          {
            if (tipo=='ISLR'){

              if (apliva!='S') {
               calcularbaseimponible=calcularbaseimponible + montcau;              
               enc=true;
             }
           }else {
            calcularbaseimponible=calcularbaseimponible + montcau;
            enc=true;
          }
          }
          j++;
         }
        }
        else if (($('afectarec').value=='P'))
        {
         var j=0;
         while ((j<((auxi.length)-1)) && (!enc))
         {
          if (!($(id2).value==auxi[j+1]))
          {
           calcularbaseimponible=calcularbaseimponible + montcau;
           enc=true;
          }
          j++;
         }
        }
      //}
       fila++;
    }
  }else {
    calcularbaseimponible=toFloat('opordpag_neto');
  }
    var total=$('numgridret').value;
    var j=0;
    while (j<total)
    {
     var islr="dx"+"_"+j+"_10";
     var unoxmil="dx"+"_"+j+"_11";
     var irs="dx"+"_"+j+"_13";
     var imn="dx"+"_"+j+"_14";
     var codret="dx"+"_"+j+"_2";
     var baim="dx"+"_"+j+"_4";
     var monbas="dx"+"_"+j+"_15";
     var nbaseim=toFloat(baim);
     var nmonbas=toFloat(monbas);
     
     var codigo2=$(codret).value;

     switch(tipo)
     {
       case "ISLR":
           if (codigo2==codigo) {
               trajo=$(islr).value;
           }
       break;

       case "1*MIL":
       trajo=$(unoxmil).value;
       break;

       case "IRS":
       trajo=$(irs).value;
       break;
       
       case "IMN":
       trajo=$(imn).value;
       break;       
     }
    if (trajo=="S")
    {
      if (calcularbaseimponible==0)
        calcularbaseimponible=nmonbas;
      else
        calcularbaseimponible=calcularbaseimponible*(nbaseim/100);
      montorecal=recalculaRetencion(j,calcularbaseimponible);
      var valor=String(montorecal);

      var montorecalculado=toFloat2(valor);
      if (tipo=="ISLR")
      {
        if (montorecalculado!=$('elislr').value)
        {
         calcularbaseimponible=redondear(((calcularbaseimponible*$('elislr').value)/montorecalculado),2);
        }
      }
      else if (tipo=="1*MIL")
      {
        if (montorecalculado!=$('eltimbre').value)
        {
         calcularbaseimponible=((calcularbaseimponible*$('eltimbre').value)/montorecalculado);
        }
      }else if (tipo=="IRS")
      {
        if (montorecalculado!=$('elirs').value)
        {
         calcularbaseimponible=redondear(((calcularbaseimponible*$('elirs').value)/montorecalculado),2);
        }
      }
      else if (tipo=="IMN")
      {
        if (montorecalculado!=$('elimn').value)
        {
         calcularbaseimponible=redondear(((calcularbaseimponible*$('elimn').value)/montorecalculado),2);
        }
      }
     break;
    }
    j++;
   }

  }
   return calcularbaseimponible;
 }

  function unoxmil(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var bas=col+1;
   var porcent=col+2;
   var monto=col+3;
   var total=col-5;
   var imp=col-2;

   var basemil=name+"_"+fil+"_15";
   var porcentmil=name+"_"+fil+"_16";
   var montomil=name+"_"+fil+"_17";
   var totalfac=name+"_"+fil+"_9";
   var impuesto=name+"_"+fil+"_12";

   var montotfac=toFloat(totalfac);
   var monimpuesto=toFloat(impuesto);

    var calcular=calcularBaseImponible('1*MIL');
    var valor=String(calcular);

    var calcularbi=toFloat2(valor);


		if ($('eltimbre').value == 0) {
			alert('No hay Retencion de Ley de Timbre Fiscal');
			$(id).checked = false;
		}
		else {
			if ($('id').value == "") {
				var baseimponible = porcentajeISLRN("1*MIL", "BasImp");
				var valor = String(baseimponible);
				var porislr = toFloat2(valor);

				var porcentaje = porcentajeISLRN("1*MIL", "PorRet");

                var baseiniunomil=toFloat(basemil);
                if (baseiniunomil>0)
                {
                 $(basemil).value = format(baseiniunomil.toFixed(2), '.', ',', '.');
                }else {
				var calculo = ((montotfac - monimpuesto) * porislr / 100);
				$(basemil).value = format(calculo.toFixed(2), '.', ',', '.');
				}
				$(basemil).disabled = false;

				$(porcentmil).value = format(porcentaje, '.', ',', '.');
				var cal2 = monto1XMILN();
			}
			else {
				var baseimponible2 = porcentajeISLRC("1*MIL", "BasImp");
				var valor = String(baseimponible2);
				var porislr2 = toFloat2(valor);
				var porcentaje2 = porcentajeISLRC("1*MIL", "PorRet");

                 var baseiniunomil=toFloat(basemil);
                if (baseiniunomil>0)
                {
                 $(basemil).value = format(baseiniunomil.toFixed(2), '.', ',', '.');
                }else {
				var calculo = ((montotfac - monimpuesto) * porislr2 / 100);
				$(basemil).value = format(calculo.toFixed(2), '.', ',', '.');
				}
				$(basemil).disabled = false;
				$(porcentmil).value = format(porcentaje2, '.', ',', '.');
				var cal2 = monto1XMILC();
			}
			var base = toFloat(basemil);
			var cal = ((base * ($('eltimbre').value)) / calcularbi);
			if (cal == cal2) {
				var calfin = cal;
			}
			else
				if (cal2 > cal) {
					var rest = cal2 - cal;
					var calfin = cal2 - rest;
				}
				else {
					var calfin = cal2;
				}

			$(montomil).value = format(calfin.toFixed(2), '.', ',', '.');
		}
 }

  function recalunoxmil(id)
  {
   var am=parseInt($('opordpag_numfilret').value);//totalregistros('ex',2,30);
   var filas=parseInt($('numgridret').value);
   var bm=totalregistros('dx',12,filas);
   if (($('id').value=='' && am!=0) || ($('id').value!='' && bm!=0))
   {
	   var aux = id.split("_");
	   var name=aux[0];
	   var fil=aux[1];
	   var col=parseInt(aux[2]);

	   var bas=col;
	   var porcent=col+1;
	   var monto=col+2;
	   var total=col-6;
	   var imp=col-2;

	   var basemil=name+"_"+fil+"_"+bas;
	   var porcentmil=name+"_"+fil+"_"+porcent;
	   var montomil=name+"_"+fil+"_"+monto;
	   var totalfac=name+"_"+fil+"_"+total;
	   var impuesto=name+"_"+fil+"_"+imp;

	   var montotfac=toFloat(totalfac);
	   var monimpuesto=toFloat(impuesto);
	   var montobasemil = toFloat(basemil);
     var calcular=calcularBaseImponible('1*MIL');
    var valor=String(calcular);
    var calcularbi=toFloat2(valor);

	   if ($('id').value=="")
	   {
  	     var porcentaje = porcentajeISLRN("1*MIL", "PorRet");
         var cal2 = monto1XMILN();
	   }
	   else
	   {
	     var porcentaje = porcentajeISLRC("1*MIL", "PorRet");
       var cal2 = monto1XMILC();
	   }

       var valor=String(porcentaje);
       var num1=toFloat2(valor);

	   //var num2=(montobasemil*(num1/100));
     var base = montobasemil;
      var cal = ((base * ($('eltimbre').value)) / calcularbi);
      if (cal == cal2) {
        var calfin = cal;
      }
      else
        if (cal2 > cal) {
          var rest = cal2 - cal;
          var calfin = cal2 - rest;
        }
        else {
          var calfin = cal2;
        }


	   $(basemil).value = format(montobasemil.toFixed(2),'.',',','.');
	   $(porcentmil).value = format(num1.toFixed(2),'.',',','.');
	   $(montomil).value = format(calfin.toFixed(2),'.',',','.');
   }
  }

  function islr(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var bas=col+1;
   var porcent=col+2;
   var monto=col+3;
   var total=col-9;
   var imp=col-6;
   var cod=col+4;

   var baseislr=name+"_"+fil+"_19";
   var porcentislr=name+"_"+fil+"_20";
   var montoislr=name+"_"+fil+"_21";
   var totalfac=name+"_"+fil+"_9";
   var impuesto=name+"_"+fil+"_12";
   var codislr=name+"_"+fil+"_22";

  var montotfac=toFloat(totalfac);
   if (montotfac>0)
   {
    if ($(porcentislr).value!='')
    {
   var monimpuesto=toFloat(impuesto);

    index=$(porcentislr).selectedIndex;
    var cod=$(porcentislr).options[index].text;
    var codigo=cod.split("_");
    
   var calcular=calcularBaseImponible('ISLR',codigo[0]);
   var valor=String(calcular);
    var calcularbi=toFloat2(valor);
    


   if ($('elislr').value==0)
   {
     alert('No hay Retenci�n de I.S.L.R');
     $(id).checked=false;
   }
   else
   {
      if ($('id').value=="")
      {
        var baseimponible=porcentajeISLRN("ISLR","BasImp");
        var valor=String(baseimponible);
        var basip=toFloat2(valor);
        var porcentaje=porcentajeISLRN("ISLR","PorRet");
        //var valor2=String(porcentaje);
        //var porcentajes=toFloat2(valor2);

        var basiniislr=toFloat(baseislr);
         if (basiniislr>0)
         {
           $(baseislr).value=format(basiniislr.toFixed(2),'.',',','.');
         }else{
         var calculo=(((montotfac-monimpuesto)*basip)/100);
         $(baseislr).value=format(calculo.toFixed(2),'.',',','.');
         }
         $(baseislr).disabled=false;
         $(porcentislr).value=porcentaje; //format(porcentajes.toFixed(2),'.',',','.');
      }
      else
      {
         
        var baseimponible2=porcentajeISLRC("ISLR","BasImp",codigo[0]);
        var valor=String(baseimponible2);
        var basip=toFloat2(valor);

        var porcentaje2=porcentajeISLRC("ISLR","PorRet",codigo[0]);

        //var valor2=String(porcentaje2);
        //var porcentajes=toFloat2(valor2);
         var basiniislr=toFloat(baseislr);
         if (basiniislr>0)
         {
           $(baseislr).value=format(basiniislr.toFixed(2),'.',',','.');
         }else{
         var calculo=(((montotfac-monimpuesto)*basip)/100);
         $(baseislr).value=format(calculo.toFixed(2),'.',',','.');
         }
         $(baseislr).disabled=false;
         $(porcentislr).value=porcentaje2;//format(porcentajes.toFixed(2),'.',',','.');
      }
      var base=toFloat(baseislr);

      cal=((base*($('elislr').value))/calcularbi);
      $(montoislr).value=format(cal.toFixed(2),'.',',','.');
     
      $(codislr).value=codigo[0];
   }
   }
   else
   {
    alert('Debe Seleccionar el Porcentaje de ISLR a aplicar');
     $(id).checked=false;
   }
   }
   else
   {
    alert('El Total de la Factura debe ser mayor que cero');
     $(id).checked=false;
   }
  }

  function recalislr(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var bas=col;
   var porcent=col+1;
   var monto=col+2;
   var total=col-9;
   var imp=col-6;
   var codi=col+3;

   var baseislr=name+"_"+fil+"_"+bas;
   var porcentislr=name+"_"+fil+"_"+porcent;
   var montoislr=name+"_"+fil+"_"+monto;
   var totalfac=name+"_"+fil+"_"+total;
   var impuesto=name+"_"+fil+"_"+imp;
   var codislr=name+"_"+fil+"_"+codi;
   
   index=$(porcentislr).selectedIndex;
    var cod=$(porcentislr).options[index].text;
    var codigo=cod.split("_");
   
   
   var calcular=calcularBaseImponible('ISLR',codigo[0]);
   var valor=String(calcular);
    var calcularbi=toFloat2(valor);

   var montobaseislr = toFloat(baseislr);
   var cal=((montobaseislr*($('elislr').value))/calcularbi)

   $(id).value = format(montobaseislr.toFixed(2),'.',',','.');

   $(montoislr).value = format(cal.toFixed(2),'.',',','.');
   
   $(codislr).value=codigo[0];

  }

   function calculaRetiva(monto,codigo)
   {
     var calcularetiva=0;
     var ax=parseInt($('opordpag_numfilret').value);//totalregistros('ex',1,30);
     var i=0;
     while (i<ax)
     {
      var codi="ex"+"_"+i+"_1";
      var basimp="ex"+"_"+i+"_4";
      var porret="ex"+"_"+i+"_5";
      var factor="ex"+"_"+i+"_6";
      var porsus="ex"+"_"+i+"_7";
      var cuantas="ex"+"_"+i+"_8";
      var esta="ex"+"_"+i+"_9";

      var base=toFloat(basimp);
      var porcenret=toFloat(porret);
      var monfactor=toFloat(factor);
      var porcensus=toFloat(porsus);
      var moncuantas=toFloat(cuantas);
      var monunitri=toFloat('unidad');

    if ($(codi).value==codigo)
    {
      if ($(esta).value!="N")
      {
       if ($(porret).value!=0)
       {
         cal=((porcenret/100)*((base/100)*monto));
         calcularetiva=format(cal.toFixed(2),'.',',','.');
       }
       else
       {
         sust=((porcensus/100)*(monunitri*moncuantas)*monfactor);
         reten=((porcensus/100)*(base/100)*monto);
         if (reten > sust)
         {
           calcu=reten-sust;
           calcularetiva=format(calcu.toFixed(2),'.',',','.');
         }
         else
         {
           calcularetiva=format(sust.toFixed(2),'.',',','.');
         }
       }
       break;
      }
    }
     i++;
    }

    return calcularetiva;
  }

  function calculaRetivac(monto,codigo)
   {
     var calcularetiva=0;
     var ax=$('numgridret').value;
     var i=0;
     while (i<ax)
     {
      var codi="dx"+"_"+i+"_2";
      var basimp="dx"+"_"+i+"_4";
      var porret="dx"+"_"+i+"_5";
      var factor="dx"+"_"+i+"_6";
      var porsus="dx"+"_"+i+"_7";
      var cuantas="dx"+"_"+i+"_8";
      var esta="dx"+"_"+i+"_9";

      var base=toFloat(basimp);
      var porcenret=toFloat(porret);
      var monfactor=toFloat(factor);
      var porcensus=toFloat(porsus);
      var moncuantas=toFloat(cuantas);
      var monunitri=toFloat('unidad');

    if ($(codi).value==codigo)
    {
      if ($(esta).value!="N")
      {
       if ($(porret).value!=0)
       {
         cal=((porcenret/100)*((base/100)*monto));
         calcularetiva=format(cal.toFixed(2),'.',',','.');
       }
       else
       {
         sust=((porcensus/100)*(monunitri*moncuantas)*monfactor);
         reten=((porcensus/100)*(base/100)*monto);
         if (reten > sust)
         {
           calcu=reten-sust;
           calcularetiva=format(calcu.toFixed(2),'.',',','.');
         }
         else
         {
           calcularetiva=format(sust.toFixed(2),'.',',','.');
         }
       }
       break;
      }
    }
     i++;
    }

    return calcularetiva;
  }

function totalizar(e,id)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var colum=col-1;
     var colum2=col;

    var totalfac=name+"_"+fil+"_9";
    var exen=name+"_"+fil+"_10";
    var alic=name+"_"+fil+"_8";
    var retenido=name+"_"+fil+"_13";
    var porivaocul=name+"_"+fil+"_30";

    var montotfac=toFloat(totalfac);
    var monexento=toFloat(exen);
    var monto=toFloat(name+"_"+fil+"_"+colum);
    var monto2=toFloat(name+"_"+fil+"_"+colum2);
    var index1=$(alic).selectedIndex;
    var cod1=$(alic).options[index1].text;
    var codi1=cod1.split("_");
    $(porivaocul).value=codi1[2];

    var alicuota=toFloat(porivaocul);
    cal=(monto*(-1));

     if (!validarnumero(id))
     {
       alert('Monto Inv�lido');
       $(id).value="0,00";
     }

     if (col==10)
     {
       if (monto2 > monto)
       {
         alert('El Monto no puede ser Mayor al Total de la factura');
         $(name+"_"+fil+"_"+colum2).value="0,00";
       }
     }
	 if (col==11)
	 {
	 	$('opordpag_modbasimpiva').value='S';
	 }

    if (($(name+"_"+fil+"_6").value=="03") && ($(name+"_"+fil+"_"+colum).value > 0))
    {
      $(name+"_"+fil+"_"+colum).value=format(cal.toFixed(2),'.',',','.');
    }
    var am=parseInt($('opordpag_numfilret').value);//totalregistros('ex',2,30);
    var filas=parseInt($('numgridret').value);
    var bm=totalregistros('dx',12,filas);
    if (($('id').value=='' && am!=0) || ($('id').value!='' && bm!=0))
    {
      if ($(alic).value!="")
      {
        var basiniiva=toFloat(name+"_"+fil+"_11");
        if ($('opordpag_modbasimpiva').value=='S')
        {
         $(name+"_"+fil+"_11").value=format(basiniiva.toFixed(2),'.',',','.');
        }
        else
        {
        var calculos=(((montotfac-monexento)/(100+alicuota))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');
        }

        var baseimpo=toFloat(name+"_"+fil+"_11");


        calc=((baseimpo*alicuota)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');

        if ($('id').value=="")
        {
          //num=((baseimpo*alicuota)/100);
          num=toFloat(name+"_"+fil+"_12");
          index=$(alic).selectedIndex;
          var cod=$(alic).options[index].text;
          var codigo=cod.split("_");
          $(retenido).value= calculaRetiva(num,codigo[0]);
        }
        else
        {
         // num=((baseimpo*alicuota)/100);
          num=toFloat(name+"_"+fil+"_12");
          index=$(alic).selectedIndex;
          var cod=$(alic).options[index].text;
          var codigo=cod.split("_");
          $(retenido).value= calculaRetivac(num,codigo[0]);
        }
      }
      else
      {
        var basiniiva=toFloat(name+"_"+fil+"_11");
        if ($('opordpag_modbasimpiva').value=='S')
        {
         $(name+"_"+fil+"_11").value=format(basiniiva.toFixed(2),'.',',','.');
        }
        else
        {
        var calculos=(((montotfac-monexento)/(100+0))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');
        }

        var baseimpo=toFloat(name+"_"+fil+"_11");

        calc=((baseimpo*0)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');

        if ($('id').value=="")
        {
         $(retenido).value= "0,00";
        }
        else
        {
         $(retenido).value= "0,00";
        }
      }
   }else{
       var calculos=(((montotfac-monexento)/(100+alicuota))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');


        var baseimpo=toFloat(name+"_"+fil+"_11");

        calc=((baseimpo*alicuota)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');

   }
   actualizarTotfac();
  }
 }

 function actualizarTotfac()
 {
   var nfil=parseInt($('opordpag_numfilfac').value);
     var am=totalregistros('bx',3,nfil);
   var i=0;
   var acum=0;
   var acume=0;
   var acumb=0;
   var acumi=0;
   var acumv=0;
   var acumm=0;
   var acuml=0;
   var acums=0;
   var acumr=0;
   var acuma=0;
   var acumh=0;
   var acump=0;
   while (i<am)
   {
    var montot="bx"+"_"+i+"_9";
    var monexe="bx"+"_"+i+"_10";
    var monbas="bx"+"_"+i+"_11";
    var monimp="bx"+"_"+i+"_12";
    var moniva="bx"+"_"+i+"_13";
    var monbm="bx"+"_"+i+"_15";
    var monmm="bx"+"_"+i+"_17";
    var monbr="bx"+"_"+i+"_19";
    var monir="bx"+"_"+i+"_21";
    var monibr="bx"+"_"+i+"_26";
    var monisr="bx"+"_"+i+"_28";
    var numcre="bx"+"_"+i+"_5";
    var monimn="bx"+"_"+i+"_34";

    var num1=toFloat(montot);
    var num2=toFloat(monexe);
    var num3=toFloat(monbas);
    var num4=toFloat(monimp);
    var num5=toFloat(moniva);
    var num6=toFloat(monbm);
    var num7=toFloat(monmm);
    var num8=toFloat(monbr);
    var num9=toFloat(monir);
    var num10=toFloat(monibr);
    var num11=toFloat(monisr);
    var num12=toFloat(monimn);

    if ($(numcre).value!="")
    {
        acum=acum-num1;
        acume=acume-num2;
        acumb=acumb-num3;
        acumi=acumi-num4;
        acumv=acumv-num5;
        acumm=acumm-num6;
        acuml=acuml-num7;
        acums=acums-num8;
        acumr=acumr-num9;
        acuma=acuma-num10;
        acumh=acumh-num11;
        acump=acump-num12;
    }else {
       acum=acum+num1;
       acume=acume+num2;
       acumb=acumb+num3;
       acumi=acumi+num4;
       acumv=acumv+num5;
       acumm=acumm+num6;
       acuml=acuml+num7;
       acums=acums+num8;
       acumr=acumr+num9;
       acuma=acuma+num10;
       acumh=acumh+num11;
       acump=acump+num12;
    }
   i++;
   }
   $('totfac').value=format(acum.toFixed(2),'.',',','.');
   $('totexen').value=format(acume.toFixed(2),'.',',','.');
   $('totbas').value=format(acumb.toFixed(2),'.',',','.');
   $('totimp').value=format(acumi.toFixed(2),'.',',','.');
   $('totiva').value=format(acumv.toFixed(2),'.',',','.');
   $('totbasmil').value=format(acumm.toFixed(2),'.',',','.');
   $('totmontmil').value=format(acuml.toFixed(2),'.',',','.');
   $('totbasislr').value=format(acums.toFixed(2),'.',',','.');
   $('totmontislr').value=format(acumr.toFixed(2),'.',',','.');
   $('totbasirs').value=format(acuma.toFixed(2),'.',',','.');
   $('totmontirs').value=format(acumh.toFixed(2),'.',',','.');
   $('totmontimn').value=format(acump.toFixed(2),'.',',','.');
 }

 function validacau(id)
 {
   var tofac=toFloat('totfac');
    var totcau=toFloat('opordpag_monord');
   /* if (tofac>totcau)
    {
    alert('El Monto Total de la factura no puede ser Mayor al Monto Total a Causar');
    $(id).value='0,00';
   }*/

 }

   function mensajes()
  {
   if (($('ajaxs').value=='6') && ($('mensaje').value!=""))
   {
    alert($('mensaje').value);
   }
  }


  function ajax(e,id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);
    var coliva= col +4;
    var iva=name+"_"+fil+"_"+coliva;

    var colnom= col +6;
    var nombre=name+"_"+fil+"_"+colnom;
    var cod=$(id).value;

    $('opordpag_neto').readOnly=true;


    if (e.keyCode==13 || e.keyCode==9)
   {
    new Ajax.Request('/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validar(e,id);}, parameters:'ajax=7&nombre='+colnom+'&cajtexmos='+iva+'&tipcau='+$('opordpag_tipcau').value+'&codigo='+cod})
   }
  }

  function validar(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coliva= col +6;
   var iva=name+"_"+fil+"_"+coliva;

  if (codpresu_repetido(id))
  {
  alert_('El C&oacute;digo Presupuestario se encuentra repetido');
  $(id).value="";
  }
  else
  {
   if ($('noexiste').value=='N' &&  $(id).value!="")
   {
      alert_('El C&oacute;digo Presupuestario no Existe');
    $(id).value="";
    $(iva).value="";
   }
   else if ($('nonivel').value=='N' &&  $(id).value!="")
   {
      alert_('El C&oacute;digo Presupuestario no es de &Uacute;ltimo Nivel');
    $(id).value="";
    $(iva).value="";
   }
   else if ($('noasigna').value=='N' &&  $(id).value!="")
   {
      alert_('El C&oacute;digo Presupuestario no tiene Asignaci&oacute;n Inicial');
    $(id).value="";
    $(iva).value="";
   }
   else if ($('nopar411').value=='S' &&  $(id).value!="")
   {
      alert_('El C&oacute;digo Presupuestario no esta asociado a una Partida de Deudas Anteriores');
      $(id).value="";
      $(iva).value="";
   }
   else
   {
   deshabilitariva(e,id);
   }
   }

 }



 function disponibilidad(e,id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colcod= col-1;
    var colamo= col+2;
    var codigo=name+"_"+fil+"_"+colcod;
    var monamor=name+"_"+fil+"_"+colamo;
    var codpre=$(codigo).value;
    var afecta=$('opordpag_afectapre').value;
    var letra='N';
    var monto=$(id).value;
    var numcau=toFloat(id);
    var numamo=toFloat(monamor);
    if (numamo>0 && numcau<numamo)
    {
      alert('El Monto a Causar debe ser Mayor o igual al Monto a Amortizar . Por favor, ajuste el Monto a Causar');
      $(id).value='0,00';      
      sumardatosgrid2(e);
      $(id).focus();
    }else {
       if (e.keyCode==13 || e.keyCode==9)
       {
        new Ajax.Request('/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), chequeardisponibilidad(e,id);}, parameters:'ajax=9&fila='+fil+'&monto='+monto+'&letra='+letra+'&codmon='+$('opordpag_codmon').value+'&valmon='+$('opordpag_valmon').value+'&codigo='+codpre+'&afecta='+afecta})
       }   
    }   
  }

  function chequeardisponibilidad(e,id)
  {
    var aux = id.split("_");
     var name=aux[0];
     var fil=parseInt(aux[1]);
     var col=parseInt(aux[2]);

     var colcod= col-1;
     var codigo=name+"_"+fil+"_"+colcod;

   if ($('errormonto').value=='511' && $(id).value!="0,00")
   {
      alert('Monto Introducido debe ser menor al Monto Disponible que es:  '+$('montodisponible').value);
    $(id).value="0,00";
    sumardatosgrid2(e);
   }

   if ($('errormonto').value=='512' && $(id).value!="0,00")
   {
      alert('El Titulo Presupuestario no tiene Asignaci�n Inicial');
    $(id).value="0,00";
    sumardatosgrid2(e);

   }

  }

   function codpresu_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var codpre=$(id).value;
   var nfil=parseInt($('opordpag_numfilas').value);

   var codprerepetido=false;
   var am=totalregistros('ax',2,nfil);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_2";

    var codpre2=$(codigo).value;

    if (i!=fila)
    {
      if (codpre==codpre2)
      {
        codprerepetido=true;
        break;
      }
    }
   i++;
   }
   return codprerepetido;
 }

function ajaxretenciones(e,id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);
   if ($(id).value!="")
   {
    var coldes= col+1;
    var colcon= col+2;
    var colbas= col+3;
    var colpor= col+4;
    var colfac= col+5;
    var colsus= col+6;
    var coluni= col+7;
    var colest= col+8;
    var colestislr= col+11;
    var colest1xmil= col+12;
    var colmont= col+13;
    var colestirs= col+14;
    var colestimn= col+16;
    var colmonbasmin= col+15;
    var colmonbasmax= col+17;

    var descripcion=name+"_"+fil+"_"+coldes;
    var contable=name+"_"+fil+"_"+colcon;
    var base=name+"_"+fil+"_"+colbas;
    var porretencion=name+"_"+fil+"_"+colpor;
    var factor=name+"_"+fil+"_"+colfac;
    var porsustra=name+"_"+fil+"_"+colsus;
    var unidad=name+"_"+fil+"_"+coluni;
    var esta=name+"_"+fil+"_"+colest;
    var estaislr=name+"_"+fil+"_"+colestislr;
    var estairs=name+"_"+fil+"_"+colestirs;
    var estaimn=name+"_"+fil+"_"+colestimn;
    var esta1xmil=name+"_"+fil+"_"+colest1xmil;
    var montoiva=name+"_"+fil+"_"+colmont;
    var monbasmin=name+"_"+fil+"_"+colmonbasmin;
    var monbasmax=name+"_"+fil+"_"+colmonbasmax;
    var cod=$(id).value;
    var proveedor=$('opordpag_cedrif').value

     document.getElementById('modifico2').value=true;

     if (e.keyCode==13 || e.keyCode==9)
     {
      new Ajax.Request('/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validaretencion(e,id);}, parameters:'ajax=10&cajtexmos='+descripcion+'&contable='+contable+'&base='+base+'&porretencion='+porretencion+'&factor='+factor+'&porsustra='+porsustra+'&unidad='+unidad+'&esta='+esta+'&estaislr='+estaislr+'&estairs='+estairs+'&esta1xmil='+esta1xmil+'&montoiva='+montoiva+'&codprovee='+proveedor+'&monbasmin='+monbasmin+'&estaimn='+estaimn+'&monbasmax='+monbasmax+'&refecom='+$('opordpag_referencias').value+'&docume='+$('opordpag_documento').value+'&codigo='+cod})
     }
   }//if ($(id).value1="")
  }

  function validaretencion(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coldes= col +1;
   var descripcion=name+"_"+fil+"_"+coldes;

  if ($('existeretencion').value!='S' && $(id).value!="")
  {
    alert('El Codigo de la Retencion no Existe. Si es su caso el Beneficiario no tiene retenciones asociadas (Proveedores)');
  $(id).value="";
  $(descripcion).value="";

  }
  else
  {
  if (codret_repetido(id))
    {
  alert('El Codigo de la Retencion se encuentra repetido');
  $(id).value="";
  $(descripcion).value="";
    }
    else
    {
     calcularretenciones(e,id);
    }
  }
 }

 function codret_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var codret=$(id).value;

   var codretrepetido=false;
   var am=parseInt($('opordpag_numfilret').value);//totalregistros('ex',1,30);
   var i=0;
   while (i<am)
   {
    var codigo="ex"+"_"+i+"_1";

    var codret2=$(codigo).value;

    if (i!=fila)
    {
      if (codret==codret2)
      {
        codretrepetido=true;
        break;
      }
    }
   i++;
   }
   return codretrepetido;
 }

  function cargar1()
  {
    if ($('tipnom').value!="")
    {
      if(confirm("Se Generara la Orden de Pago de Nomina  "+$('tipnom').value+" correspondiente a "+$('nomina').value))
      {
        var tipnom=$('tipnom').value;
        var gasto=$('gasto').value;
        var banco=$('banco').value;
        var nomespecial=$('nomespecial').value;
        var codnomesp=$('codnomesp').value;
        var fecha=$('fechanomina').value;
        if ($('opordpag_referencias').value=='')
        { $('opordpag_referencias').value='_';}
        var referencias=$('opordpag_referencias').value;
        new Ajax.Updater('divGrid', '/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=11&tipnom='+tipnom+'&fecha='+fecha+'&gasto='+gasto+'&divu=1&referencias='+referencias+'&nomespecial='+nomespecial+'&codnomesp='+codnomesp+'&banco='+banco});
        new Ajax.Updater('reten', '/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=11&tipnom='+tipnom+'&fecha='+fecha+'&gasto='+gasto+'&divu=2&referencias='+referencias+'&nomespecial='+nomespecial+'&codnomesp='+codnomesp+'&banco='+banco});

      }
      else
      {
        $('opordpag_tipcau').value="";
        $('opordpag_nomext').value="";
      }
    }
    /*else
    {
      $('opordpag_tipcau').value="";
      $('opordpag_nomext').value="";
    }*/
  }


   function cargar2()
  {
    if ($('codigoaporte').value!="" && $('fecnom').value!="")
    {
     var aux=$('fecnom').value;
     var aux2=aux.split("-");
     var formato=aux2[2]+"/"+aux2[1]+"/"+aux2[0];
      if(confirm("Se Generara la Orden de Pago para el Aporte  "+$('codigoaporte').value+" correspondiente a la fecha "+formato))
      {
        var codigoaporte=$('codigoaporte').value;
        var fecnom=$('fecnom').value;
        var gasto2=$('gasto2').value;
        var codnom=$('codnom').value;
        var especial=$('nomespecial').value;
        var codnomesp=$('codnomesp').value;
        if ($('opordpag_referencias').value=='')
        { $('opordpag_referencias').value='_';}
        var referencias=$('opordpag_referencias').value;
        new Ajax.Updater('divGrid', '/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&codigoaporte='+codigoaporte+'&fecnom='+fecnom+'&gasto2='+gasto2+'&codnom='+codnom+'&especial='+especial+'&codnomesp='+codnomesp+'&referencias='+referencias});

      }
      else
      {
        $('opordpag_tipcau').value="";
        $('opordpag_nomext').value="";
      }
    }
    /*else
    {
      $('opordpag_tipcau').value="";
      $('opordpag_nomext').value="";
    }*/
  }

  function cargar21()
  {
    if ($('codigoaported').value!="" && $('codigoaporteh').value!="" && $('fecnom').value!="")
    {
     var aux=$('fecnom').value;
     var aux2=aux.split("/");
     var formato=aux2[2]+"-"+aux2[1]+"-"+aux2[0];

      if(confirm("Se Generara la Orden de Pago para los Aportes entre el rango  "+$('codigoaported').value+" y "+$('codigoaporteh').value+" correspondiente a la fecha "+aux))
      {
        var codigoaported=$('codigoaported').value;
        var codigoaporteh=$('codigoaporteh').value;
        var fecnom=formato;//$('fecnom').value;
        var gasto2=$('gasto2').value;
        if ($('opordpag_referencias').value=='')
        { $('opordpag_referencias').value='_';}
        var referencias=$('opordpag_referencias').value;
        new Ajax.Updater('divGrid', '/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&codigoaported='+codigoaported+'&codigoaporteh='+codigoaporteh+'&fecnom='+fecnom+'&gasto2='+gasto2+'&referencias='+referencias});
      }
      else
      {
        $('opordpag_tipcau').value="";
        $('opordpag_nomext').value="";;
      }
    }
    /*else
    {
      $('opordpag_tipcau').value="";
      $('opordpag_nomext').value="";
    }*/
  }

  function cargar3()
  {
    if ($('codigoemp').value!="")
    {
      if(confirm("Se Generara la Orden de Pago para la Liquidacion de  "+$('empleado').value))
      {
        var codemp=$('codigoemp').value;
        var nomemp=$('empleado').value;
        var cedemp=$('cedula').value;
        if ($('opordpag_referencias').value=='')
        { $('opordpag_referencias').value='_';}
        var referencias=$('opordpag_referencias').value;
        new Ajax.Updater('divGrid', '/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=13&codemp='+codemp+'&nomemp='+nomemp+'&cedemp='+cedemp+'&divu=1&referencias='+referencias});
        new Ajax.Updater('reten', '/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=13&codemp='+codemp+'&nomemp='+nomemp+'&cedemp='+cedemp+'&divu=2&referencias='+referencias});

      }
      else
      {
        $('opordpag_tipcau').value="";
        $('opordpag_nomext').value="";
      }
    }
    /*else
    {
      $('opordpag_tipcau').value="";
      $('opordpag_nomext').value="";
    }*/
  }

  function cargar4()
  {
    if ($('lanomina').value!="")
    {
      if(confirm("Se Generara la Orden de Pago para el Fideicomiso de  "+$('elnombre').value))
      {
        var codnom=$('lanomina').value;
        var nomnom=$('elnombre').value;
        var fecha=$('lafecha').value;
        if ($('opordpag_referencias').value=='')
        { $('opordpag_referencias').value='_';}
        var referencias=$('opordpag_referencias').value;
        new Ajax.Updater('divGrid', '/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=14&codnom='+codnom+'&nomnom='+nomnom+'&fecha='+fecha+'&referencias='+referencias});

      }
      else
      {
        $('opordpag_tipcau').value="";
        $('opordpag_nomext').value="";
      }
    }
    /*else
    {
      $('opordpag_tipcau').value="";
      $('opordpag_nomext').value="";
    }*/
  }

  function chequeadisponibilidad()
  {
    var afecta=$('opordpag_afectapre').value;
    new Ajax.Request('/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), errores();}, parameters:'ajax=15&afecta='+afecta})
  }

  function errores()
  {
   if ($('errormonto').value=='511')
   {
      alert('Monto Introducido para el Codigo Presupuestario '+$('codigopresupuestario').value+'debe ser menor al Monto Disponible que es:  '+$('montodisponible').value);
   }

   if ($('errormonto').value=='512')
   {
    alert('El Titulo Presupuestario no tiene Asignaci�n Inicial');
   }
  }

  function cambioBase(id)
  {
    var aux = id.split("_");
    var name=aux[0];
    var fil=aux[1];
    var col=parseInt(aux[2]);

    calcularetencion(fil);
  }

  function cargar5()
  {
    if ($('opordpag_referencias').value=='')
    { $('opordpag_referencias').value='_';}
    var referencias=$('opordpag_referencias').value;
    var contrato=$('tipcon').value;
    new Ajax.Updater('divGrid', '/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=20&contrato='+contrato+'&referencias='+referencias});
  }

  function cargar6()
  {
    if ($('refcomv').value!="")
    {
      if(confirm("Se Generara la Orden de Pago para la Valuaci�n de  "+$('refcomv').value)+" Correspondiente al Contrato "+$('tipcon').value)
      {
        var monval=$('monval').value;
        var refcom=$('refcomv').value;
        if ($('opordpag_referencias').value=='')
        { $('opordpag_referencias').value='_';}
        var referencias=$('opordpag_referencias').value;
        new Ajax.Updater('divGrid', '/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=21&refcom='+refcom+'&monval='+monval+'&referencias='+referencias});

      }
      else
      {
        $('opordpag_tipcau').value="";
        $('opordpag_nomext').value="";
      }
    }
    else
    {
      $('opordpag_tipcau').value="";
      $('opordpag_nomext').value="";
    }
  }


/*function monto1XMILN()
 {
   montounomil=0;
   nret=parseInt($('opordpag_numfilret').value);
   total=totalregistros('fx',2,nret);
   j=0;
   while (j<total)
   {
     var monto1="fx"+"_"+j+"_3";
     var unoxmil="fx"+"_"+j+"_5";
     var num1=toFloat(monto1);

    if ($(unoxmil).value=="S")
    {
      montounomil= montounomil + num1;
    }
    j++;
  }
  return montounomil;
 }*/

function monto1XMILN()
 {
   montounomil=0;
   var am=parseInt($('opordpag_numfilret').value);//totalregistros('ex',2,30);
   j=0;
   while (j<total)
   {
     var monto1="ex"+"_"+j+"_11";
     var unoxmil="ex"+"_"+j+"_13";
     var num1=toFloat(monto1);

    if ($(unoxmil).value=="S")
    {
      montounomil= montounomil + num1;
 }
    j++;
  }
  return montounomil;
 }

  function monto1XMILC()
 {
   var montounomil=0;
   var total=$('numgridret').value;
   var j=0;
   while (j<total)
   {
     var monto1="dx"+"_"+j+"_12";
     var unoxmil="dx"+"_"+j+"_11";
     var num1=toFloat(monto1);

    if ($(unoxmil).value=="S")
    {
      montounomil = montounomil +num1;
    }
    j++;
  }
  return montounomil;
 }

 function colocarmonto(id)
 {
    var totalfac="bx_0_9";
    if (id=='x00')
    {
      $(totalfac).value=$('opordpag_monord').value;
    }
    actualizarTotfac();
 }

 function totalizar2(id)
  {
     var aux = id.split("_");
     var name=aux[0];
     var fil=aux[1];
     var col=parseInt(aux[2]);

     var colum=col+1;
     var colum2=col;

    var totalfac=name+"_"+fil+"_9";
    var exen=name+"_"+fil+"_10";
    var alic=name+"_"+fil+"_8";
    var retenido=name+"_"+fil+"_13";
    var porivaocul=name+"_"+fil+"_30";

    var montotfac=toFloat(totalfac);
    var monexento=toFloat(exen);
    var monto=toFloat(name+"_"+fil+"_"+colum);
    var monto2=toFloat(name+"_"+fil+"_"+colum2);
    var index1=$(alic).selectedIndex;
    var cod1=$(alic).options[index1].text;
    var codi1=cod1.split("_");
    $(porivaocul).value=codi1[2];
    var alicuota=toFloat(porivaocul);
    cal=(monto*(-1));

     if (!validarnumero(porivaocul))
     {
       alert('Monto Inv�lido');
       $(id).value="";
     }

     if (col==10)
     {
       if (monto2 > monto)
       {
         alert('El Monto no puede ser Mayor al Total de la factura');
         $(name+"_"+fil+"_"+colum2).value="0,00";
       }
     }
	 if (col==11)
	 {
	 	$('opordpag_modbasimpiva').value='S';
	 }

    if (($(name+"_"+fil+"_6").value=="03") && ($(name+"_"+fil+"_"+colum).value > 0))
    {
      $(name+"_"+fil+"_"+colum).value=format(cal.toFixed(2),'.',',','.');
    }
    var am=parseInt($('opordpag_numfilret').value);//totalregistros('ex',2,30);
    var filas=parseInt($('numgridret').value);
    var bm=totalregistros('dx',12,filas);
    if (($('id').value=='' && am!=0) || ($('id').value!='' && bm!=0))
    {
      if ($(alic).value!="")
      {
        var basiniiva=toFloat(name+"_"+fil+"_11");
        if ($('opordpag_modbasimpiva').value=='S')
        {
         $(name+"_"+fil+"_11").value=format(basiniiva.toFixed(2),'.',',','.');
        }
        else
        {
        var calculos=(((montotfac-monexento)/(100+alicuota))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');
        }

        var baseimpo=toFloat(name+"_"+fil+"_11");

        calc=((baseimpo*alicuota)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');

        if ($('id').value=="")
        {
          //num=((baseimpo*alicuota)/100);
          num=toFloat(name+"_"+fil+"_12");
          index=$(alic).selectedIndex;
          var cod=$(alic).options[index].text;
          var codigo=cod.split("_");
          $(retenido).value= calculaRetiva(num,codigo[0]);
        }
        else
        {
         // num=((baseimpo*alicuota)/100);
          num=toFloat(name+"_"+fil+"_12");
          index=$(alic).selectedIndex;
          var cod=$(alic).options[index].text;
          var codigo=cod.split("_");
          $(retenido).value= calculaRetivac(num,codigo[0]);
        }
      }
      else
      {
        var basiniiva=toFloat(name+"_"+fil+"_11");
        if ($('opordpag_modbasimpiva').value=='S')
        {
         $(name+"_"+fil+"_11").value=format(basiniiva.toFixed(2),'.',',','.');
        }
        else
        {
        var calculos=(((montotfac-monexento)/(100+0))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');
        }

        var baseimpo=toFloat(name+"_"+fil+"_11");

        calc=((baseimpo*0)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');

        if ($('id').value=="")
        {
         $(retenido).value= "0,00";
        }
        else
        {
         $(retenido).value= "0,00";
        }
      }
   }else{
       var calculos=(((montotfac-monexento)/(100+alicuota))*100);
        $(name+"_"+fil+"_11").value=format(calculos.toFixed(2),'.',',','.');


        var baseimpo=toFloat(name+"_"+fil+"_11");

        calc=((baseimpo*alicuota)/100);
        $(name+"_"+fil+"_12").value=format(calc.toFixed(2),'.',',','.');
   }
  }

  function irs(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var bas=col+1;
   var porcent=col+2;
   var monto=col+3;
   var total=col-16;
   var imp=col-11;
   var cod=col+4;

   var baseirs=name+"_"+fil+"_26";
   var porcentirs=name+"_"+fil+"_27";
   var montoirs=name+"_"+fil+"_28";
   var totalfac=name+"_"+fil+"_9";
   var impuesto=name+"_"+fil+"_12";
   var codirs=name+"_"+fil+"_29";

  var montotfac=toFloat(totalfac);
   if (montotfac>0)
   {
    if ($(porcentirs).value!='')
    {
   var monimpuesto=toFloat(impuesto);

   var calcular=calcularBaseImponible('IRS');
   var valor=String(calcular);
    var calcularbi=toFloat2(valor);

   if ($('elirs').value==0)
   {
     alert_('No hay Retenci&oacute;n de I.R.S');
     $(id).checked=false;
   }
   else
   {
      if ($('id').value=="")
      {
        var baseimponible=porcentajeIRSN("IRS","BasImp");
        var valor=String(baseimponible);
        var basip=toFloat2(valor);
        var porcentaje=porcentajeIRSN("IRS","PorRet");
        var valor2=String(porcentaje);
        var porcentajes=toFloat2(valor2);

        var basiniislr=toFloat(baseirs);
         if (basiniislr>0)
         {
           $(baseirs).value=format(basiniislr.toFixed(2),'.',',','.');
         }else{
         var calculo=(((montotfac-monimpuesto)*basip)/100);
         $(baseirs).value=format(calculo.toFixed(2),'.',',','.');
         }
         $(baseirs).disabled=false;
         $(porcentirs).value=format(porcentajes.toFixed(2),'.',',','.');
      }
      else
      {
        var baseimponible2=porcentajeIRSC("IRS","BasImp");
        var valor=String(baseimponible2);
        var basip=toFloat2(valor);

        var porcentaje2=porcentajeIRSC("IRS","PorRet");

        var valor2=String(porcentaje2);
        var porcentajes=toFloat2(valor2);
         var basiniislr=toFloat(baseirs);
         if (basiniislr>0)
         {
           $(baseirs).value=format(basiniislr.toFixed(2),'.',',','.');
         }else{
         var calculo=(((montotfac-monimpuesto)*basip)/100);
         $(baseirs).value=format(calculo.toFixed(2),'.',',','.');
         }
         $(baseirs).disabled=false;
         $(porcentirs).value=format(porcentajes.toFixed(2),'.',',','.');
      }
      var base=toFloat(baseirs);

      cal=((base*($('elirs').value))/calcularbi);
      $(montoirs).value=format(cal.toFixed(2),'.',',','.');
      index=$(porcentirs).selectedIndex;
      var cod=$(porcentirs).options[index].text;
      var codigo=cod.split("_");
      $(codirs).value=codigo[0];
      //actualizarsaldos_b();
      actualizarTotfac();
   }
   }
   else
   {
    alert('Debe Seleccionar el Porcentaje de IRS a aplicar');
     $(id).checked=false;
   }
   }
   else
   {
    alert('El Total de la Factura debe ser mayor que cero');
     $(id).checked=false;
   }
  }

  function recalirs(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var bas=col;
   var porcent=col+1;
   var monto=col+2;
   var total=col-17;
   var imp=col-14;
   var cod=col+4;

   var baseirs=name+"_"+fil+"_"+bas;
   var porcentirs=name+"_"+fil+"_"+porcent;
   var montoirs=name+"_"+fil+"_"+monto;
   var totalfac=name+"_"+fil+"_"+total;
   var impuesto=name+"_"+fil+"_"+imp;
   var codirs=name+"_"+fil+"_"+cod;

   var montobaseirs = toFloat(baseirs);
   var montoporcentirs = toFloat(porcentirs);
   var cal=montobaseirs*(montoporcentirs/100);

   $(id).value = format(montobaseirs.toFixed(2),'.',',','.');

   $(montoirs).value = format(cal.toFixed(2),'.',',','.');

   //actualizarsaldos_b();
   actualizarTotfac();
  }

function calcularetencion2(fil) //en VB se usaba dos parametros
  {
    var aux1="ex"+"_"+fil+"_4";
    var aux2="ex"+"_"+fil+"_5";
    var aux3="ex"+"_"+fil+"_10";
    var aux4="ex"+"_"+fil+"_11";
    var aux7="ex"+"_"+fil+"_1";
    var aux15="ex"+"_"+fil+"_7";
    var aux16="ex"+"_"+fil+"_8";
    var aux17="ex"+"_"+fil+"_6";
    var auxmil="ex"+"_"+fil+"_13";

    var base=toFloat(aux3);
    var monreten=toFloat(aux4);
    var porcen=toFloat(aux2);
    var porsus=toFloat(aux15);
    var basimp=toFloat(aux1);
    var unitri=toFloat(aux16);
    var factor=toFloat(aux17);
    var nfil=parseInt($('opordpag_numfilas').value);

    if (porcen!=0)
    {
      if ($('modifico2').value=="true")
      {
        var cal=((porcen/100)*base); //((porcen/100)*(basimp/100)*base);
        $(aux4).value=format(cal.toFixed(2),'.',',','.');
      }
   }
   else
   {
    var totcau=toFloat('opordpag_monord');

    var porcbase=((base*100)/totcau);
    var sustraendo=((porsus/100)*unitri*factor);
    var retencion=((porsus/100)*base); //((porsus/100)*(basimp/100)*base);

     if (retencion>sustraendo)
     {
       var cal4=retencion-sustraendo;
       $(aux4).value=format(cal4.toFixed(2),'.',',','.');
     }
     else { $(aux4).value=format(sustraendo.toFixed(2),'.',',','.');}

   }

 }
 
   function imn(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var cod=col+4;

   var baseimn=name+"_"+fil+"_32";
   var porcentimn=name+"_"+fil+"_33";
   var montoimn=name+"_"+fil+"_34";
   var totalfac=name+"_"+fil+"_9";
   var impuesto=name+"_"+fil+"_12";
   var codimn=name+"_"+fil+"_35";

  var montotfac=toFloat(totalfac);
   if (montotfac>0)
   {
    if ($(porcentimn).value!='')
    {
   var monimpuesto=toFloat(impuesto);

   var calcular=calcularBaseImponible('IMN');
   var valor=String(calcular);
    var calcularbi=toFloat2(valor);

   if ($('elimn').value==0)
   {
     alert_('No hay Retenci&oacute;n de I.Municipal');
     $(id).checked=false;
   }
   else
   {
      if ($('id').value=="")
      {
        var baseimponible=porcentajeIRSN("IMN","BasImp");
        var valor=String(baseimponible);
        var basip=toFloat2(valor);
        var porcentaje=porcentajeIRSN("IMN","PorRet");
        var valor2=String(porcentaje);
        var porcentajes=toFloat2(valor2);

        var basiniimn=toFloat(baseimn);
         if (basiniimn>0)
         {
           $(baseimn).value=format(basiniimn.toFixed(2),'.',',','.');
         }else{
         var calculo=(((montotfac-monimpuesto)*basip)/100);
         $(baseimn).value=format(calculo.toFixed(2),'.',',','.');
         }
         $(baseimn).disabled=false;
         $(porcentimn).value=format(porcentajes.toFixed(2),'.',',','.');
      }
      else
      {
        var baseimponible2=porcentajeIRSC("IMN","BasImp");
        var valor=String(baseimponible2);
        var basip=toFloat2(valor);

        var porcentaje2=porcentajeIRSC("IMN","PorRet");

        var valor2=String(porcentaje2);
        var porcentajes=toFloat2(valor2);
         var basiniimn=toFloat(baseimn);
         if (basiniimn>0)
         {
           $(baseimn).value=format(basiniimn.toFixed(2),'.',',','.');
         }else{
         var calculo=(((montotfac-monimpuesto)*basip)/100);
         $(baseimn).value=format(calculo.toFixed(2),'.',',','.');
         }
         $(baseimn).disabled=false;
         $(porcentimn).value=format(porcentajes.toFixed(2),'.',',','.');
      }
      var base=toFloat(baseimn);

      cal=((base*($('elimn').value))/calcularbi);
      $(montoimn).value=format(cal.toFixed(2),'.',',','.');
      index=$(porcentimn).selectedIndex;
      var cod=$(porcentimn).options[index].text;
      var codigo=cod.split("_");
      $(codimn).value=codigo[0];

      actualizarTotfac();
   }
   }
   else
   {
    alert('Debe Seleccionar el Porcentaje de IMunicipal a aplicar');
     $(id).checked=false;
   }
   }
   else
   {
    alert('El Total de la Factura debe ser mayor que cero');
     $(id).checked=false;
   }
  }
 
  function recalimn(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var bas=col;
   var porcent=col+1;
   var monto=col+2;

   var baseimn=name+"_"+fil+"_"+bas;
   var porcentimn=name+"_"+fil+"_"+porcent;
   var montoimn=name+"_"+fil+"_"+monto;

   var montobaseimn = toFloat(baseimn);
   
   var calcular=calcularBaseImponible('IMN');
   var valor=String(calcular);
   var calcularbi=toFloat2(valor);
   
   var cal=((montobaseimn*($('elimn').value))/calcularbi);

   $(id).value = format(montobaseimn.toFixed(2),'.',',','.');

   $(montoimn).value = format(cal.toFixed(2),'.',',','.');

   actualizarTotfac();
  } 
  
 function actualizarTotfac2()
 {
     var am=1;
   var i=0;
   var acum=0;
   var acume=0;
   var acumb=0;
   var acumi=0;
   var acumv=0;
   var acumm=0;
   var acuml=0;
   var acums=0;
   var acumr=0;
   var acuma=0;
   var acumh=0;
   var acump=0;
   while (i<am)
   {
    var montot="bx"+"_"+i+"_9";
    var monexe="bx"+"_"+i+"_10";
    var monbas="bx"+"_"+i+"_11";
    var monimp="bx"+"_"+i+"_12";
    var moniva="bx"+"_"+i+"_13";
    var monbm="bx"+"_"+i+"_15";
    var monmm="bx"+"_"+i+"_17";
    var monbr="bx"+"_"+i+"_19";
    var monir="bx"+"_"+i+"_21";
    var monibr="bx"+"_"+i+"_26";
    var monisr="bx"+"_"+i+"_28";
    var numcre="bx"+"_"+i+"_5";
    var monimn="bx"+"_"+i+"_34";

    var num1=toFloat(montot);
    var num2=toFloat(monexe);
    var num3=toFloat(monbas);
    var num4=toFloat(monimp);
    var num5=toFloat(moniva);
    var num6=toFloat(monbm);
    var num7=toFloat(monmm);
    var num8=toFloat(monbr);
    var num9=toFloat(monir);
    var num10=toFloat(monibr);
    var num11=toFloat(monisr);
    var num12=toFloat(monimn);

    if ($(numcre).value!="")
    {
        acum=acum-num1;
        acume=acume-num2;
        acumb=acumb-num3;
        acumi=acumi-num4;
        acumv=acumv-num5;
        acumm=acumm-num6;
        acuml=acuml-num7;
        acums=acums-num8;
        acumr=acumr-num9;
        acuma=acuma-num10;
        acumh=acumh-num11;
        acump=acump-num12;
    }else {
       acum=acum+num1;
       acume=acume+num2;
       acumb=acumb+num3;
       acumi=acumi+num4;
       acumv=acumv+num5;
       acumm=acumm+num6;
       acuml=acuml+num7;
       acums=acums+num8;
       acumr=acumr+num9;
       acuma=acuma+num10;
       acumh=acumh+num11;
       acump=acump+num12;
    }
   i++;
   }
   $('totfac').value=format(acum.toFixed(2),'.',',','.');
   $('totexen').value=format(acume.toFixed(2),'.',',','.');
   $('totbas').value=format(acumb.toFixed(2),'.',',','.');
   $('totimp').value=format(acumi.toFixed(2),'.',',','.');
   $('totiva').value=format(acumv.toFixed(2),'.',',','.');
   $('totbasmil').value=format(acumm.toFixed(2),'.',',','.');
   $('totmontmil').value=format(acuml.toFixed(2),'.',',','.');
   $('totbasislr').value=format(acums.toFixed(2),'.',',','.');
   $('totmontislr').value=format(acumr.toFixed(2),'.',',','.');
   $('totbasirs').value=format(acuma.toFixed(2),'.',',','.');
   $('totmontirs').value=format(acumh.toFixed(2),'.',',','.');
   $('totmontimn').value=format(acump.toFixed(2),'.',',','.');
 }  
 
 function colocarRetenciones(arreglo)
 {   
   var aux=arreglo.split('!');   
   var i=0;
   while (i< (aux.length-1))
   {
     var filastot=i+1;
      
     var aux2=aux[i].split('_');
     var codtip="ex"+"_"+filastot+"_1";
     var destip="ex"+"_"+filastot+"_2";
     var codcon="ex"+"_"+filastot+"_3";
     var basimp="ex"+"_"+filastot+"_4";
     var porret="ex"+"_"+filastot+"_5";
     var factor="ex"+"_"+filastot+"_6";
     var porsus="ex"+"_"+filastot+"_7";
     var unitri="ex"+"_"+filastot+"_8";
     var esta="ex"+"_"+filastot+"_9";
     var base="ex"+"_"+filastot+"_10";
     var montorete="ex"+"_"+filastot+"_11";
     var estaislr="ex"+"_"+filastot+"_12";
     var esta1xmil="ex"+"_"+filastot+"_13";
     var montoiva="ex"+"_"+filastot+"_14";
     var estairs="ex"+"_"+filastot+"_15";
     var monbasmin="ex"+"_"+filastot+"_16";
     var estamin="ex"+"_"+filastot+"_17";

     $(codtip).value=aux2[0];
     $(destip).value=aux2[1];
     $(codcon).value=aux2[2];
     $(basimp).value=aux2[3];
     $(porret).value=aux2[4];
     $(factor).value=aux2[5];
     $(porsus).value=aux2[6];
     $(unitri).value=aux2[7];
     $(esta).value=aux2[8];
     $(base).value=aux2[9];
     $(montorete).value=aux2[10];
     $(estaislr).value=aux2[11];
     $(esta1xmil).value=aux2[12];
     $(montoiva).value=aux2[13];
     $(estairs).value=aux2[14];
     $(monbasmin).value=aux2[15];
     $(estamin).value=aux2[16];
     i++;
   }
   $('opordpag_presiono').value='S';
 } 

 function validaAmo(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var colcau=col-2;
   var montocausar=name+"_"+fil+"_"+colcau;
   var num1=toFloat(montocausar);
   var num2=toFloat(id);

   if (num2>num1){
      alert('El Monto a Amortizar debe ser Menor o igual al Monto a Causar. Por favor, ajuste el Monto a Amortizar');
      $(id).value='0,00';
      $(id).focus();

   }else {
      if ($('opordpag_numordamo').value!='')
        new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=31&cajtexcom='+id+'&monamo='+$(id).value+'&codigo='+$('opordpag_numordamo').value})
   }
 }

  function salvahcm()
  {
    var fil=0;
    var acum=0;
    var numfil=parseInt($('fila').value);
    while (fil<numfil)
    {
      var check="mx"+"_"+fil+"_1";
      var camunico="mx"+"_"+fil+"_8";
      var montcon="mx"+"_"+fil+"_7";
      if ($(check).checked=='1')
      {         
        var num2=toFloat(montcon);
        acum+=num2;

       $('opordpag_referenciashcm').value=$('opordpag_referenciashcm').value+"_"+$(camunico).value;
      }
      fil++;
    }
    var id3="ax"+"_0_2";
    var id4="ax"+"_0_3";

    $(id3).value=$('opordpag_codprehcm').value;
    $(id4).value=format(acum.toFixed(2),'.',',','.');   

    $('opordpag_cedrif').value=$('rifclini').value;
    $('opordpag_nomben').value=$('nomclini').value;

    sumardatosgrid();  

    mostrar('divDatos','ref');
    $('refcompr').hide();
}

  function martodoshcm()
  {
    var fil=0;
    var numfil=parseInt($('fila').value);
    while (fil<numfil)
    {
      var check="mx"+"_"+fil+"_1";
      if ($(check))
      {         
        $(check).checked=true;      
      }
      fil++;
    }   
}

  function destodoshcm()
  {
    var fil=0;
    var numfil=parseInt($('fila').value);
    while (fil<numfil)
    {
      var check="mx"+"_"+fil+"_1";
      if ($(check))
      {         
        $(check).checked=false;      
      }
      fil++;
    }   
}

function cargar_aportes()
{
  var fil=0;
  var aportes="";
  var cadenas="";
  var numfil=parseInt($('numfilapo').value);
  while (fil<numfil)
  {
    var check="qx"+"_"+fil+"_1";
    var codigoaporte="qx"+"_"+fil+"_3";
    var gasto="qx"+"_"+fil+"_4";
    var fecnom="qx"+"_"+fil+"_5";
    var codnom="qx"+"_"+fil+"_6";
    var especial="qx"+"_"+fil+"_7";
    var codnomesp="qx"+"_"+fil+"_8";
    if ($(check))
    {         
      if ($(check).checked==true){
        aportes=aportes+$(codigoaporte).value+"_"+$(gasto).value+"_"+$(fecnom).value+"_"+$(codnom).value+"_"+$(especial).value+"_"+$(codnomesp).value+"!";
        cadenas=cadenas+$(codigoaporte).value+"_"+$(gasto).value+"_"+$(fecnom).value+"_"+$(codnom).value+"_"+$(especial).value+"_"+$(codnomesp).value+",";
      }
    }
    fil++;
  }   
  if (aportes!='')
  {
    $('opordpag_datosaporte').value=aportes;
    if(confirm("Se Generara la Orden de Pago para los siguientes Aportes "+cadenas))
    {
      if ($('opordpag_referencias').value=='')
      { $('opordpag_referencias').value='_';}
      var referencias=$('opordpag_referencias').value;
      new Ajax.Updater('divGrid', '/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&aportes='+aportes+'&referencias='+referencias});
    }
    else
    {
      $('opordpag_tipcau').value="";
      $('opordpag_nomext').value="";
    }
  }  
}

function cargarnominas()
{
  new Ajax.Updater('divGrid10', '/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=37&codnom='+$('codnom').value+'&fecnom='+$('fecnom').value+'&especial_S='+$('especial_S').checked+'&codban='+$('codban').value+'&codnomesp='+$('codnomesp').value}); 
}

function cargar11()
{
  $('filtronom').hide();
  $('datfilnom').hide();
  var fil=0;
  var nomina="";
  var cadena="";
  var numfil=parseInt($('numfilnom').value);
  while (fil<numfil)
  {
    var check="sx"+"_"+fil+"_1";
    var codigonomina="sx"+"_"+fil+"_3";
    var banco="sx"+"_"+fil+"_6";
    var gasto="sx"+"_"+fil+"_5";
    var fecnom="sx"+"_"+fil+"_4";
    var especial="sx"+"_"+fil+"_7";
    var codnomesp="sx"+"_"+fil+"_8";
    if ($(check))
    {         
      if ($(check).checked==true){
        fecaux=$(fecnom).value.split('/');
        fecnom1=fecaux[2]+'-'+fecaux[1]+'-'+fecaux[0];
        nomina=$(codigonomina).value+"_"+$(gasto).value+"_"+$(banco).value+"_"+fecnom1+"_"+$(especial).value+"_"+$(codnomesp).value;
        cadena=$(codigonomina).value+" de fecha "+$(fecnom).value;
        break;
      }
    }
    fil++;
  }  


  if (nomina!="")
  {
    if(confirm("Se Generara la Orden de Pago de Nomina correspondiente a la Nómina "+cadena))
    {
      if ($('opordpag_referencias').value=='')
      { $('opordpag_referencias').value='_';}
      var referencias=$('opordpag_referencias').value;
      new Ajax.Updater('divGrid', '/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=11&nomina='+nomina+'&divu=1&referencias='+referencias});
      new Ajax.Updater('reten', '/tesoreria'+getEnv()+'.php/pagemiord/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=11&nomina='+nomina+'&divu=2&referencias='+referencias});

    }
    else
    {
      $('opordpag_tipcau').value="";
      $('opordpag_nomext').value="";
    }
  }
}

function validarNominaUnica(id)
{
var aux = id.split("_");
var name=aux[0];
var fil=parseInt(aux[1]);
var col=parseInt(aux[2]);

  var q=0;
  var enc=false;
  var am=parseInt($('numfilnom').value);
  while (q<am && (!enc))
  {
      var act="sx_"+q+"_1";
      if (fil!=q)
      {
          if ($(act).checked==true)
          {
           enc=true;
          }
      }
      q++;
  }
  if (enc)
  {
      alert('Marque solo uno...');
      $(id).checked=false;
  }
}
