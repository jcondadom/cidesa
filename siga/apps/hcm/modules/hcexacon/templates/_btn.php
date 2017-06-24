<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<ul class="sf_admin_actions" >
<li class="float-rigth">
<input id="formpre" class="sf_admin_action_save" type="button" value="Autorización" onClick="GenerarPdf();">
</li>
</ul>
<script type="text/javascript">
  function GenerarPdf(){
    var refexacon=$('hcexacon_refexacon').value;
    var ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
    pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=hcm&r=hcrconexaaut.php&s=<?php echo $sf_user->getAttribute('schema');?>&exacondes="+refexacon+"&exaconhas="+refexacon;
    window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
  }
</script>