<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php echo grid_tag_v2($caregart->getObj1());?>

<script type="text/javascript">
function cargarComboUnidades(id){
	var aux = id.split("_");
	var name=aux[0];
	var fil=parseInt(aux[1]);
	var col=parseInt(aux[2]);

	var coluni=col+2;
	var unidad=name+"_"+fil+"_"+coluni;
	var cod=$(id).value;

	new Ajax.Updater(unidad, getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&id='+$('id').value+'&codigo='+cod});       
}
</script>
