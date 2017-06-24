<ul class="sf_admin_actions">
<li>
<input id="marcom" class="sf_admin_action_save" type="button" value="Marcar Todos" onClick="marcarTodo();">
</li>
<li>
<input id="desmarcom" class="sf_admin_action_save" type="button" value="Desmarcar Todos" onClick="desmarcarTodo();">
</li>
</ul>

<script type="text/javascript" language="Javascript">
 function marcarTodo()
  {
   var am=obtener_filas_grid('a',2);
   var fil=0;
    while (fil<am)
    {
       var check="ax_"+fil+"_1";
       if ($(check))
         $(check).checked=true;       
       fil++;
    }
  }

  function desmarcarTodo()
  {
   var am=obtener_filas_grid('a',2);
   var fil=0;
    while (fil<am)
    {
       var check="ax_"+fil+"_1";
       if ($(check))
         $(check).checked=false;       
       fil++;
    }
  }  

</script>