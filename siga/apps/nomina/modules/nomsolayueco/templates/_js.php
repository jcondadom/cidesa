<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if ($npsolayueco->getId()) { ?>
<ul class="sf_admin_actions" >
<li class="float-center">
<input id="impri" class="sf_admin_action_list" type="button" value="Imprimir" onClick="mostrar_reporte();">
</li>
</ul>
<?php } ?>

<script type="text/javascript">
function mostrar_reporte()
{
	var numsolayudes=$('npsolayueco_numsolayu').value;
	var numsolayuhas=$('npsolayueco_numsolayu').value;
	var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';

	pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=nomina&r=nprsolpagayu.php&s=<?php echo $sf_user->getAttribute('schema');?>&numsolayudes="+numsolayudes+"&numsolayuhas="+numsolayuhas;
	    
	window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
}

  function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('npsolayueco_numsolayu').value=valor;
   }
 }

  function MostraCat()
 {
 	new Ajax.Updater('divgrid', '/nomina'+getEnv()+'.php/nomsolayueco/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=8&esnoemp='+$('npsolayueco_esnoemp_N').checked});
 }
</script>