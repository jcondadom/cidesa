<ul class="sf_admin_actions">
<li>
<?php 
$gencomcon=H::getConfApp2('gencomcon', 'presupuesto', 'precausar');
$idcom=H::getX_vacio('NUMCOM','Contabc','Id',$cpcausad->getNumcom());
if ($gencomcon=='S') {
if ($cpcausad->getId()=='') { ?>
<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comp',
         'url'      => 'precausar/ajaxcomprobante',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_save',)) ?>
</li>
<? } else { ?>
<li><input name="Comprobante" type="button" value="Comprobantes" class="sf_admin_action_save" onClick="consultarComp()"></li>
<?php } }?>
</ul>

<div id="comp"></div>


<script type="text/javascript">

  function comprobante(formulario)
  {
     window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

  function consultarComp()
  {
  	var id='<?php echo $idcom; ?>';
    window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/id/'+id,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
</script>