<ul class="sf_admin_actions">
<li>
<?php if ($cireging->getId()=='') { ?>
<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comp',
         'url'      => 'ingreging/ajaxcomprobante',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_save',)) ?>
</li>
<?php } else { ?>
<li><input name="Comprobante" type="button" value="Comprobantes" class="sf_admin_action_save" onClick="consultarComp()"></li>
<?php } ?>
</ul>

<div id="comp"></div>
<script language="JavaScript" type="text/javascript">
    function comprobante(formulario)
  {
      window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
   function consultarComp()
  {
    window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/id/'+$("cireging_idrefer").value,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
  
  if ($('id').value=='') {
  var valor='<?php echo H::getX_vacio('CODMON','Tsdesmon','Valmon',H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'));?>';
      if (valor!="")
      {
          calculo=toFloat2(valor);
         var num2=toFloat('cireging_valmon');
         if (num2==0)
           $('cireging_valmon').value=format(calculo.toFixed(6),'.',',','.');
      }
      }
</script>
