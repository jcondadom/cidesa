<script type="text/javascript">
ocultar();
function ocultar() {
var i=0;
var fil=obtener_filas_grid('a',1);
while (i<fil){
  var fec1="ax_"+i+"_2";
  var fec2="ax_"+i+"_3";
  var bt1="trigger_ax_"+i+"_2";
  var bt2="trigger_ax_"+i+"_3";
  if ($(fec1)) {
	  $(fec1).readOnly=true;
	  $(fec2).readOnly=true;
	  $(bt1).hide();
	  $(bt2).hide();
  }
  i++;
}
}
if ($('id').value!=''){
  var tiecta='<?php echo $contaba->TieneCuenta();?>';
  $('contaba_forcta').readOnly=true;
  $('contaba_fecini').readOnly=true;
  $('contaba_feccie').readOnly=true;
  $('trigger_contaba_fecini').hide();
  $('trigger_contaba_feccie').hide();
  $$('.sf_admin_action_list')[0].disabled=true;
  if (tiecta=='S')
    $$('.sf_admin_action_save')[0].hide();
}
</script>