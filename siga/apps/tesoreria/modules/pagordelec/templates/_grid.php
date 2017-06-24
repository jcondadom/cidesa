<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?
	echo grid_tag_v2($opordpag->getObjeto());
?>

<script language="JavaScript" type="text/javascript">
  var am=parseInt('<?php echo $opordpag->getFilasord() ?>');
  var j=0;
  while (j<am)
  {
    var fecha="trigger_ax_"+j+"_4";

    $(fecha).hide();
  	j++;
  }

    function verificardatos(id){
    if ($('opordpag_valdatben').value=='S'){
        var aux = id.split("_");
        var name=aux[0];
        var fil=parseInt(aux[1]);
        var col=parseInt(aux[2]);

         var colben=col+7;
        var bene=name+"_"+fil+"_"+colben;

      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&cedrif='+$(bene).value+'&id='+id})
    }
  }
</script>
