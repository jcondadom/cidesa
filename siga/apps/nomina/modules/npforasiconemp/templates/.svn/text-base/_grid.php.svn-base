<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<strong><font color="#CC0000" size="3" face="Verdana, Arial, Helvetica, sans-serif"> <? echo __('Si el Empleado no tiene asociado ningun concepto el sistema por defecto traera marcado todos los conceptos')?></font></strong>
<?php 	echo grid_tag_v2($npasicaremp->getObj()); ?>

<script type="text/javascript" languaje="Javascript">
  function verificarCestaticket(id) {
    var valcodconct='<?php echo H::getConfApp2('valcodconct', 'nomina', 'nomnomasiconnom');?>';
    if (valcodconct=='S') {
        var aux = id.split("_");
        var name=aux[0];
        var fil=aux[1];
        var col=parseInt(aux[2]);

        var colcodcon=col+1;
        var cedemp=$('npasicaremp_cedemp').value;
        var codemp=$('npasicaremp_codemp').value;
        var codnom=$('npasicaremp_codnom').value;
        var codcon=name+"_"+fil+"_"+colcodcon;
        var codcar=$('npasicaremp_codcar').value;

        if ($(id).checked==true)
        {
          new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codcon='+$(codcon).value+'&codcar='+codcar+'&codnom='+codnom+'&id='+id+'&cedemp='+cedemp+'&codemp='+codemp})
        }        
    }
  }
</script>