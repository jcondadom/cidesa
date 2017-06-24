<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<?
	echo grid_tag_v2($cpcomext->getObj());
?>
<script type="text/javascript" lang="JavaScript">
 function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('cpcomext_refcomext').value=valor;
   }
 }
var nuevo='<?php echo $cpcomext->getId()?>';
if (nuevo=='')
{
  var valor='<?php echo H::getX_vacio('CODMON','Tsdesmon','Valmon',H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'));?>';
  if (valor!="")
  {
      calculo=toFloat2(valor);
      var num2=toFloat('cpcomext_valmon');
      if (num2==0)
         $('cpcomext_valmon').value=format(calculo.toFixed(6),'.',',','.');
  }
}

   function anular() {

  if (confirm("Realmente desea Anular este Compromiso?")) {
    var refcomext=$('cpcomext_refcomext').value;
      var feccom=$('cpcomext_feccom').value;

      new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&refcomext='+refcomext+'&feccom='+feccom})
  }
}

function abrirAnular(refcom,feccom) {
  window.open(getUrlModulo()+'anular?refcomext='+refcom+'&feccom='+feccom,'...','menubar=no,toolbar=no,scrollbars=yes,width=750,height=250,resizable=yes,left=400,top=120');
}

</script>