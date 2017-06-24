<?php 
  $idcom=H::getX_vacio('NUMCOM','Contabc','Id',$contabc->getNumcomrev()); 
  if ($idcom!="") { ?>

<input name="Comprobante Reverso" type="button" value="Comprobantes" onClick="consultarComp()">
<?php }?>
<script type="text/javascript">
  var idcom='<?php echo $idcom; ?>'
  function consultarComp()
  {
    window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/id/'+idcom,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
</script>