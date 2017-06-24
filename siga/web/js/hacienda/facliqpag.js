/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function Totalizar(){
  var am=obtener_filas_grid('a',1);
  var monto=0;
  var total=0;var check;
  var i=0;
  while (i<am)
  {
      monto="ax_"+i+"_7";
      check ="ax_"+i+"_1";
        if($(check).checked){
          total=total+toFloat(monto);
        }
        i++;
}
 $('fcliqpag_monliq').value=format(total.toFixed(2),'.',',','.');
}

  function marcarTodos()
  {
     var fil=0;
     var am=obtener_filas_grid('a',1);
     while (fil<am)
     {
           var numero="ax"+"_"+fil+"_2";
           if ($(numero).value!=""){
                var id="ax"+"_"+fil+"_1";
                  $(id).checked=true;

           }
           fil=fil+1;

     }
     Totalizar();
  }
  function desmarcarTodos(){
     var fil=0;
     var am=obtener_filas_grid('a',1);
     while (fil<am)
     {
           var numero="ax"+"_"+fil+"_2";

           if ($(numero).value!=""){
                var id="ax"+"_"+fil+"_1";
                 $(id).checked=false;
           }
           fil=fil+1;

     }
     Totalizar();

  }