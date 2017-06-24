<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if ($cpptocta->getId()) { ?>
<ul class="sf_admin_actions" >
<li class="float-center">
<input id="impri" class="sf_admin_action_list" type="button" value="Imprimir" onClick="mostrar_reporte();">
</li>
</ul>
<?php } ?>

<script type="text/javascript">
function mostrar_reporte()
{
	var numptades=$('cpptocta_numpta').value;
	var numptahas=$('cpptocta_numpta').value;
	var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';

	pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r=prerptocta.php&s=<?php echo $sf_user->getAttribute('schema');?>&numptades="+numptades+"&numptahas="+numptahas;
	    
	window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
}
</script>