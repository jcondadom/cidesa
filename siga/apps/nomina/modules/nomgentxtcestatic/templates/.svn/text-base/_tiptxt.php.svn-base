
<?php echo select_tag('empresa[tiptxt]', options_for_select(array('A' => 'Altas', 'B' => 'Bajas', 'R' => 'Recarga', 'D' => 'Devoluciones', 'T' => 'Activación', 'E' => 'Reemplazos', 'Q' => 'Bloqueo de Tarjeta'),$empresa->getTiptxt(),'include_custom=Seleccione uno...'),array(
  'onChange' => 'activarVista(this.value);'
  )) ?>

<script type="text/javascript">
	function activarVista(valor){
    if (valor=='A'){
      $('divopciontel').show();
    }
    else
    {
      $('divopciontel').hide();
    } 
    if (valor=='Q'){
       $('divfecnom').hide();
    }
    
    if (valor=='R' || valor=='D'){
       $('divfecnom').show();
       $('divfecefe').show();
       $('divmontot').show();
       $('divtipnom').show();
       if (valor=='D'){
          $$('.required')[3].innerHTML = 'Fecha Efectiva del Cargo';
          $$('.required')[5].innerHTML = 'Tipo de Cargo';
        }

      }

	}
	function completarlote()
	{
       var y = new Date();
       //document.write(y.getDate() + "/" + (y.getMonth() +1) + "/" + y.getFullYear());
       var fecha=y.getDate() + "/" + (y.getMonth() +1) + "/" + (y.getFullYear()+ '').substring(2, 4);
       $('empresa_numlot').value=$('empresa_codpla').value+fecha;
	}


 function recalcular()
 {
     var facart=obtener_filas_grid('a',2);
     var fil=0;
     var cont=0;
     var acum=0;
     var cant=0;
     while (fil<facart)
     {
         var fila2="ax_"+fil+"_8";
         var marcar="ax_"+fil+"_1";
         if ($(marcar).checked==true){
             num1=toFloat(fila2);
             $(fila2).value=number_format(num1,2,',','.');
             acum+=num1;    
             cant++;      
         }
       fil++;
     }
     $('empresa_canreg').value=cant;
     $('empresa_montot').value=number_format(acum,2,',','.');    
 }


  function totalmarcadas(id)
  {
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);
  var acum=0;
  var acummonto=0;
  var montogrid=0;

  var cantot=toFloat('empresa_canreg');
  var montotot=toFloat('empresa_montot');


  if ($(id).checked==true)
  {

    var id2 = "ax"+"_"+fil+"_8";
    if ($(id2)){
          montogrid=toFloat(id2);
    }else{
        montogrid=0;
    }

    acum=cantot + 1;
    $('empresa_canreg').value=acum;
    acummonto=montotot + montogrid;
    $('empresa_montot').value=number_format(acummonto,2,',','.');    
  }
  else
  {
    var id2 = "ax"+"_"+fil+"_8";
    if ($(id2)){
          montogrid=toFloat(id2);
    }else{
        montogrid=0;
    }
    
    acum=cantot - 1;
    $('empresa_canreg').value=acum;
    acummonto=montotot - montogrid;
    $('empresa_montot').value=number_format(acummonto,2,',','.');  
  }
 }	
</script>
