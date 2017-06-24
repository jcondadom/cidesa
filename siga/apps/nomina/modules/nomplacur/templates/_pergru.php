<?php if ($rhplacur->getPergru()=='S')  {
  ?><?php echo radiobutton_tag('rhplacur[pergru]', 'S', true, array('onClick' => 'ocul_mos()'))        ."Si".'&nbsp;&nbsp;';
      echo radiobutton_tag('rhplacur[pergru]', 'N', false, array('onClick' => 'ocul_mos()'))."   No";?>
    <?php
}else{
  echo radiobutton_tag('rhplacur[pergru]', 'S', false, array('onClick' => 'ocul_mos()'))        ."Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('rhplacur[pergru]', 'N', true, array('onClick' => 'ocul_mos()'))."   No";
} ?>

<script type="text/javascript">
function ocul_mos(){
  if ($('rhplacur_pergru_S').checked==true){  
    $('divgridgru').show();
    $('divbtn').show();
    $('divgridperpla').hide();
    new Ajax.Updater('divgridgru', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&pergru=S'});
  }else{
      $('divgridgru').hide();
      $('divbtn').hide();
      $('divgridperpla').show();
  }
}
</script>