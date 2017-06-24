<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script type="text/Javascript" language="JavaScript">
    var modo='<?php echo $fcdeclar->getModo();?>'
if ($('id').value!="")
    new Ajax.Updater('divgridactcom', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&numref='+$('fcdeclar_numref').value+'&numdec='+$('fcdeclar_numdec').value+'&modo='+modo+'&anodec='+$('fcdeclar_anodec').value+'&id='+$('fcdeclar_id').value});
</script>