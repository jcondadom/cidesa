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

function Mostrar_Negacion()
{
  $('negacion2').show();
  $('btnneg').hide();
//  $('ocultar').show();
  $('fcsollic_licnegada').value='I';
}

function Ocultar_Negacion()
{
  $('negacion2').hide();
  $('ocultar').hide();
  $('mostrar').show();
  $('fcsollic_licnegada').value='';
}


 function validargridAct(e,id)
 {
   if ($(id).value!="")
   {
	if (actividad_repetida(id))
	{
		alert_('La Actividad esta repetida');
                $(id).value="";
	}
	else
	{
       ajaxactividad(e,id)
	}
   }
 }

  function actividad_repetida(id)
  {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var actividad=$(id).value;

   var actividadrepetida=false;
   var am=obtener_filas_grid('a',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";
    if($(codigo))
    {
	    var actividad2=$(codigo).value;

	    if (i!=fila)
	    {
	      if (actividad==actividad2)
	      {
	        actividadrepetida=true;
	        break;
	      }
	    }
    }
   i++;
   }
   return actividadrepetida;
 }

 function ajaxactividad(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var colexo1=col+3;
   var colexo2=col+4;
   var descripcion=name+"_"+fil+"_"+coldes;
   var exonerable=name+"_"+fil+"_"+colexo1;
   var exonerada=name+"_"+fil+"_"+colexo2;
   var cod=$(id).value;

   if (e.keyCode==13 || e.keyCode==9)
   {
    if ($(id).value!="")
    {
     new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&cajtexmos='+descripcion+'&cajtexcom='+id+'&exo='+exonerable+'&exonerada='+exonerada+'&codigo='+cod})
    }
   }
 }

 function exonerado(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var porexo=name+"_"+fil+"_"+6;

 	if ($F(id)=="S")
 	{
//		$(porexo).disabled=false;

 	}else{
               $(porexo).value="0,00";
 	}
 }

function Ocultar_suspencion()
{
  $('suspencion').hide();
  $('fcsollic_operacion').value='';
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
   	var siguiente=name+"_"+fila+"_1";
   }

   if (e.keyCode==13 || e.keyCode==9)
   {
     if($(siguiente))
     {
      if (!$(siguiente).readOnly) $(siguiente).focus();
     }
   }
  }