<script type="text/javascript">
var nuevo='<?php echo $cpsoltrasla->getId()?>';
 if (nuevo)
   ActualizarSaldosGrid("d",ArrTotales_d);

 var filsoldir='<?php echo H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');?>';
 if (filsoldir!='S')
 	$('divcoddirec').hide();

var aprob='<?php echo $cpsoltrasla->getEtiqueta()?>';
if (nuevo!='' && aprob.substring(0,3)=='Con')
	$$('.sf_admin_action_save')[3].hide();

 $('divgrid_perdes').hide();
 $('divgrid_perhas').hide();
  var estatus='<?php echo $cpsoltrasla->getStatra()?>';
 if (estatus=='N'){
 	$$('.sf_admin_action_delete')[0].hide();
    $$('.sf_admin_action_delete')[1].hide();
    $$('.sf_admin_action_save')[3].hide();
 }

 var mosdatana='<?php echo H::getConfApp2('mosdatana', 'presupuesto', 'PreSolTrasla');?>';
 if (mosdatana!='S')
   $('diviniana').hide();

 var mosbascal='<?php echo H::getConfApp2('mosbascal', 'presupuesto', 'PreSolTrasla');?>';
 if (mosbascal!='S')
 	$('divbascal').hide();
</script>