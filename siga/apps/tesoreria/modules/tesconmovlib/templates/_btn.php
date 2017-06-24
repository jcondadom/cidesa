<ul class="sf_admin_actions">
<li>
<input id="marcar" class="sf_admin_action_save" type="button" value="Marcar Todos" onClick="marcarTodo();">
</li>
<li>
<input id="desmar" class="sf_admin_action_save" type="button" value="Desmarcar Todos" onClick="desmarcarTodo();">
</li>
</ul>

<script type="text/javascript" language="Javascript">

function marcarTodo()
{
    var facart=obtener_filas_grid('a',2);
    var fil=0;
    var acum=0;
    while (fil<facart)
    {
        var fila2="ax_"+fil+"_6";
        var marcar="ax_"+fil+"_1";
        if ($(marcar)){
            $(marcar).checked=true;
            num1=toFloat(fila2);
            acum+=num1;    

        }
      fil++;
    }
    $('tsdefban_totmov').value=number_format(acum,2,',','.');    
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
    $('tsdefban_totmov').value="0,00";  
  }


  function totalmarcadas(id)
  {
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);
  var colmonto=col+5;
  var monto=name+"_"+fil+"_"+colmonto;
  var acum=0;

  var montotot=toFloat('tsdefban_totmov');
  var montomov=toFloat(monto);

  if ($(id).checked==true)
  {
    acum=montotot + montomov;
    $('tsdefban_totmov').value=format(acum.toFixed(2),'.',',','.');
  }
  else
  {
    acum=montotot - montomov;
    $('tsdefban_totmov').value=format(acum.toFixed(2),'.',',','.');
  }
 }
</script>