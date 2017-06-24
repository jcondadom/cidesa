<script type="text/javascript">
var cordissol='<?php echo H::getConfApp2('cordissol', 'presupuesto', 'PreAdiDis');?>';
if (cordissol!='S')
  $('divrefsoladi').hide();

ActualizarSaldosGrid("b",ArrTotales_b);

 var filsoldir='<?php echo H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');?>';
 if (filsoldir!='S')
 	$('divcoddirec').hide();
 else{
 	$$('.botoncat')[0].hide();
 	$('cpadidis_coddirec').readOnly=true;
 	$('cpadidis_desdirec').readOnly=true;
 }
 $('divgrid_per').hide();
 
 var mosdatgob='<?php echo H::getConfApp2('mosdatgob', 'presupuesto', 'PreAdiDis');?>';
 if (mosdatgob!='S'){
   $('divnrodec').hide();
   $('divfecdec').hide();
 }


 var estatus='<?php echo $cpadidis->getStaadi()?>';
 if (estatus=='N'){
 	$$('.sf_admin_action_delete')[0].hide();
    $$('.sf_admin_action_delete')[1].hide();
    $$('.sf_admin_action_save')[1].hide();
 }
</script>


