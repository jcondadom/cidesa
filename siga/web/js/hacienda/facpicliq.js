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

function calcularTotales()
{
  var total=0;
  var i=0;
  var am=obtener_filas_grid('b',1);
  while (i<am)
  {
      var moncuo="bx_"+i+"_5";
      var num=toFloat(moncuo);

      total=total + num;
    i++;
  }

  $('fcdeclar_montodcl').value=format(total.toFixed(2),'.',',','.');

  if ($('fcdeclar_modo_E').ckecked==true && total>0)
  {
      var num1=toFloat('fcdeclar_montodcl');
      var num2=toFloat('fcdeclar_montoimp');
      var num3=toFloat('fcdeclar_montoreb');
      var num4=toFloat('fcdeclar_montoexo');

      if (num1!=(num2+num3+num4))
      {
        var dif=(num2+num3+num4)-num1;
        var moncuota="bx_0_4";
        var num5=toFloat(moncuota);
        var calculo=num5+dif;
        $(moncuota).value=format(calculo.toFixed(2),'.',',','.');
        var sumatoria=(num2+num3+num4)
        $('fcdeclar_montodcl').value=format(sumatoria.toFixed(2),'.',',','.');
      }
  }
}

function calcularTotalesSinRedondeo()
{
  var total=0;
  var i=0;
  var am=obtener_filas_grid('b',1);
  while (i<am)
  {
      var moncuo="bx_"+i+"_5";
      var num=toFloat(moncuo);
     if (num!=0)
       total=total + num;
    i++;
  }

  $('fcdeclar_montodcl').value=format(total.toFixed(2),'.',',','.');
}

function Recalcular()
{
    new Ajax.Updater('divgridactcom', '/hacienda'+getEnv()+'.php/facpicliq/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});
}

function Otro()
{
    new Ajax.Updater('divgridactcom', '/hacienda_dev.php/facpicliq/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});
}