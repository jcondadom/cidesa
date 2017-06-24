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

function Ver_opcionbuttons()
{
  var modo=$('fcdefrecint_modo').value;
  if (modo=='P')
  {
  	$('divperiodo').hide();
  	$('divpromedio').hide();
  	$('gridout').show();
  }
  else if (modo=='M')
  {
  	$('divperiodo').hide();
  	$('divpromedio').hide();
  	$('gridout').show();
  }
  else if (modo=='T')
  {
  	$('divperiodo').show();
  	$('divpromedio').show();
  	$('gridout').hide();
  }
}


function Sumar_dias(id)
{
    var aux  = id.split("_");
    var name = aux[0];//ax
    var datos = 0;
    var fil  = parseInt(aux[1]);
    var filsig  = parseInt(aux[1])+1;
    var filant  = parseInt(aux[1])-1;
    var col  = parseInt(aux[2])+1;
    if (fil==0)
    {
		var dia = name+"_"+fil+"_"+2;
    }
    else
    {
		var dia = name+"_"+filant+"_"+2;
    }
    var dia_siguiente = name+"_"+fil+"_"+1;
    var dia=toFloat(dia);
    if (dia!="")
    {
	    dias = 1 + dia;
	    $(dia_siguiente).value = dias;
    }
}

function ChequearRango(id)
{
    if (!validarnumero(id)) {
     alert_('Monto Inv&aacute;lido');
     $(id).value='0,00';
   }else {
       var aux = id.split("_");
       var name=aux[0];
       var fil=aux[1];
       var col=parseInt(aux[2]);

       coldes=col-2;
       colhas=col-1;

       var diades=name+"_"+fil+"_"+coldes;
       var diahas=name+"_"+fil+"_"+colhas;

       var num1=toFloat(diades);
       var num2=toFloat(diahas);

       if (num1>num2)
       {
           alert_('Rango Inv&aacute;lido');
           $(id).value='0,00';
       }

   }
}

function fuepre_repetida(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var compara=$(id).value;

   var fueprerepetido=false;
   var am=obtener_filas_grid('b',1);
   var i=0;
   while (i<am)
   {
    var codigo="bx"+"_"+i+"_1";

    var compara2=$(codigo).value;

    if (i!=fila)
    {
      if (compara==compara2)
      {
        fueprerepetido=true;
        break;
      }
    }
   i++;
   }
   return fueprerepetido;
 }

function validarfueprerepetida(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes= col + 1;
   var descripcion=name+"_"+fila+"_"+coldes;
 if ($(id).value!="") {
   if (fuepre_repetida(id))
   {
      alert_('El C&oacute;digo Fuente esta repetido');
      $(id).value="";
      $(descripcion).value="";
      $(id).focus();
   }else {
       var fuente1=name+"_"+fila+"_1";
       var fuente2=name+"_"+fila+"_3";
       if ($(fuente1).value==$(fuente2).value)
       {
          alert_('La Fuente de Ingreso no puede ser Igual a la Fuente a Generar');
          $(id).value="";
          $(descripcion).value="";
          $(id).focus();
       }else {

          toAjax(1,getUrlModuloAjax(),$(id).value,'','&cajtexmos='+descripcion+'&cajtexcom='+id+'');
       }
   }
 }

}
