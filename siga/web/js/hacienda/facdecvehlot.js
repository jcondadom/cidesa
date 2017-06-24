/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function marcarTodos()
  {
     var fil=0;
     var am=obtener_filas_grid('a',1);
     while (fil<am)
     {
           var numero="ax"+"_"+fil+"_2";
           if ($(numero).value!=""){
                var id="ax"+"_"+fil+"_1";
                var colum="ax"+"_"+fil+"_1";
                  $(id).checked=true;
                  $(colum).readOnly= false;

           }
           fil=fil+1;

     }
     calcularTotales();
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
     calcularTotales();

  }
   function calcularTotales(){
       var i=0;
       var am=obtener_filas_grid('a',1); var totalcon=0;
          while (i<am)
          {
              var monafo="ax_"+i+"_7";
              var check ="ax_"+i+"_1";
              if($(check).checked){
               totalcon=totalcon + toFloat(monafo);
           }
            i++;
          }
        $('fcdeclar_mtoaforo').value=format(totalcon.toFixed(2),'.',',','.');
   }