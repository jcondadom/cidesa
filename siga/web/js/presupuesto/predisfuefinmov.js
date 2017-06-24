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

  function actualizarsaldos(id)
   {
	  var name = id[0];
	  var fil  = id[3];
	  var id2  = name+"x_"+fil+"_"+'4';       //Monto
	  var i    = 0;
	  var acum = 0;
	  if ($(id2)){
	  	  while ((i <= 10000))
		  {
			var id1 = name+"x_"+i+"_"+'4';       //Monto
      if (($F(id1)!='') && ($F(id1)!=0) ) {

				num  = toFloat($(id1));
	   		    acum = acum + num;
			  }
			  i = i + 1;
	      }
      }
	$('cpmovfuefin_monmov').value = format(acum.toFixed(2),'.',',','.');//FloattoFloatVE(acum);
	$(id).value = FloattoFloatVE($F(id));
	}


  function actualizarsaldosTotal()
  {
    var acum=0;
    var acum2=0;
    var am=obtener_filas_grid('a',1);
    var i=0;
    while (i<am)
    {
        var id1="ax"+"_"+i+"_4";
        var id2="ax"+"_"+i+"_13";
        if ($(id1)){
            if ($(id1).value!="")
            {
                tot=toFloat(id1);
                acum=acum + tot;

                tot2=toFloat(id2);

                acum2=acum2 + tot2;
            }
       }
     i++;
    }
    $('cpmovfuefin_monmov').value = 0;
 
    $('cpmovfuefin_monmov').value = format(acum.toFixed(2),'.',',','.');
   }