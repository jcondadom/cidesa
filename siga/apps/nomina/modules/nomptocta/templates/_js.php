<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if ($npptocta->getId()) { ?>
<ul class="sf_admin_actions" >
<li class="float-center">
<input id="impri" class="sf_admin_action_list" type="button" value="Imprimir" onClick="mostrar_reporte();">
</li>
</ul>
<?php } ?>

<script type="text/javascript">
function mostrar_reporte()
{
	var numptodes=$('npptocta_numpta').value;
	var numptohas=$('npptocta_numpta').value;
	var tippto=$('npptocta_tippto').value;
	var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
	if (tippto=='A')
	  pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/nomina/nprptoctaaltniv.php?numptodes="+numptodes+"&numptohas="+numptohas;
	else
	  pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/nomina/nprptocta.php?numptodes="+numptodes+"&numptohas="+numptohas;

	window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
}
</script>