<script type="text/javascript">
var nuevo='<?php echo $cpsoladidis->getId()?>';
 if (nuevo) 
   ActualizarSaldosGrid("b",ArrTotales_b);
ActualizarSaldosGrid("a",ArrTotales_a);

var aprob='<?php echo $cpsoladidis->getEtiqueta()?>';
if (nuevo!='' && aprob.substring(0,3)=='Con')
	$$('.sf_admin_action_save')[2].hide();

 var filsoldir='<?php echo H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');?>';
 if (filsoldir!='S')
 	$('divcoddirec').hide();

 $('divgrid_per').hide();

 var mosdatana='<?php echo H::getConfApp2('mosdatana', 'presupuesto', 'PreSolAdiDis');?>';
 if (mosdatana!='S')
   $('diviniana').hide();

 var estatus='<?php echo $cpsoladidis->getStaadi()?>';
 if (estatus=='N'){
 	$$('.sf_admin_action_delete')[0].hide();
    $$('.sf_admin_action_delete')[1].hide();
    $$('.sf_admin_action_save')[2].hide();
 }
</script>