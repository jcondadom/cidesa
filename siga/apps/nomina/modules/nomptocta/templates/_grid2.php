<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<ul class="sf_admin_actions">
<li>
<input id="marrec" class="sf_admin_action_save" type="button" value="Marcar" onClick="marcarTodo();">
</li>
<li>
<input id="desmar" class="sf_admin_action_save" type="button" value="Desmarcar" onClick="desmarcarTodo();">
</li>
</ul>

<?php echo grid_tag_v2($npptocta->getObj2());?>

<script type="text/javascript" language="Javascript">

function marcarTodo()
{
    var facart=obtener_filas_grid('b',1);
    var fil=0;
    var acum=0;
    while (fil<facart)
    {
        var marcar="bx_"+fil+"_1";
        if ($(marcar)){
            $(marcar).checked=true;
        }
      fil++;
    }
}
  function desmarcarTodo()
  {
    var facart=obtener_filas_grid('b',1);
    var fil=0;
    while (fil<facart)
    {
      var marcar="bx_"+fil+"_1";
      if ($(marcar)){
          $(marcar).checked=false;
      }
      fil++;
    }
  }
</script>