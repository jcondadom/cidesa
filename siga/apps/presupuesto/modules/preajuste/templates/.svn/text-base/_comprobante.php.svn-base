<ul class="sf_admin_actions">
<li>
<?php
$gencomaju=H::getConfApp2('gencomaju', 'presupuesto', 'preajuste');
if ($gencomaju=='S') {
 if ($cpajuste->getId()=='') { ?>

<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comp',
         'url'      => 'preajuste/ajaxcomprobante',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_save',)) ?>
</li>
<? } else { ?>
<li><input name="Comprobante" type="button" value="Comprobantes" class="sf_admin_action_save" onClick="consultarComp()"></li>
<?php } 
}?>
</ul>

<div id="comp"></div>
<script language="JavaScript" type="text/javascript">
    function comprobante(formulario)
  {
      window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
   function consultarComp()
  {
    window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/id/'+$("cpajuste_idrefer").value,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

  function calcularTotales()
{
  var total=0;
  var i=0;
  var am=obtener_filas_grid('a',1);
  while (i<am)
  {
      var moncuo="ax_"+i+"_2";
      var num=toFloat(moncuo);
     if (num!=0)
       total=total + num;
    i++;
  }
  $('cpajuste_totaju').value=format(total.toFixed(2),'.',',','.');
}
</script>
