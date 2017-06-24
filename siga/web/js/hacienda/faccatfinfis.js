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

  function num(e)
  {
      evt = e ? e : event;
      tcl = (window.Event) ? evt.which : evt.keyCode;
      if ((tcl < 48 || tcl > 57))
      {
          return false;
      }
     return true;
  }
  
  function calcularTotales()
  {
      var filas=obtener_filas_grid('a',2);
      var l=0;
      var acum1=0;
      var acum2=0;
      while (l<filas)
      {
          var monto1="ax_"+l+"_5";
          var monto2="ax_"+l+"_6";
          
          if ($(monto1))
          {           
              var num1=toFloat(monto1);
              var num2=toFloat(monto2);
              
              acum1=acum1 + num1;
              acum2=acum2 + num2;
          }
          l++;
      }
      
      $('fcdeclar_totmon').value=format(acum1.toFixed(2),'.',',','.');
      $('fcdeclar_totmor').value=format(acum2.toFixed(2),'.',',','.');
      
      var num3=toFloat('fcdeclar_totmon');
      var num4=toFloat('fcdeclar_totmor');
      var cal=num3 + num4;
      $('fcdeclar_tottot').value=format(cal.toFixed(2),'.',',','.');
  }
  
  function eliminar()
  {
        var motivo='Motivo de la Eliminación';
        
        if(confirm('¿Desea eliminar estos Registro?'))
        {
            var valor = prompt('Datos de la Eliminación: ',motivo);
            if (valor!=null)
            {
                new Ajax.Request('/hacienda'+getEnv()+'.php/facactdat/ajax?motivo='+valor,
                {
                         asynchronous:true, evalScripts:false,
                         onComplete:function(request, json)
                                {
                                        AjaxJSON(request, json)
                                },
                         parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))
                 }
                 );
            }
        }
  }