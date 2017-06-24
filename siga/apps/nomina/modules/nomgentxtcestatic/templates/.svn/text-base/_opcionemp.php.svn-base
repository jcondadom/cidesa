
<?php
echo radiobutton_tag('marca', '1', false, array('onClick'=> 'marcarTodo();'))."  Marcar Todos".'&nbsp;&nbsp;';
echo radiobutton_tag('marca', '2', false, array('onClick'=> 'desmarcarTodo();'))."  Desmarcar Todos ".'&nbsp;&nbsp;';
echo '<br>';
?>
<script type="text/javascript">

 
function marcarTodo()
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
        if ($(marcar)){
            $(marcar).checked=true;
            num1=toFloat(fila2);
            acum+=num1;    
            cant++;      
        }
      fil++;
    }
    $('empresa_canreg').value=cant;
    $('empresa_montot').value=number_format(acum,2,',','.');    
}
  function desmarcarTodo()
  {
    var facart=obtener_filas_grid('a',2);
    var fil=0;
    while (fil<facart)
    {
      var marcar="ax_"+fil+"_1";
      if ($(marcar)){
          $(marcar).checked=false;
      }
      fil++;
    }
    $('empresa_canreg').value=0;
    $('empresa_montot').value="0,00";  
  }
</script>