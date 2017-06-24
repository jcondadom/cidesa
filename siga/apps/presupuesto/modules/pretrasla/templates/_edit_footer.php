<script type="text/javascript">
 var filsoldir='<?php echo H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');?>';
 if (filsoldir!='S')
 	$('divcoddirec').hide();
 else{
 	$$('.botoncat')[0].hide();
 	$('cptrasla_coddirec').readOnly=true;
 	$('cptrasla_desdirec').readOnly=true;
 }

 var cordissol='<?php echo H::getConfApp2('cordissol', 'presupuesto', 'PreTrasla');?>';
if (cordissol!='S')
  $('divrefsoltra').hide();

$('divgrid_perdes').hide();
$('divgrid_perhas').hide();

  var estatus='<?php echo $cptrasla->getStatra()?>';
 if (estatus=='N'){
 	$$('.sf_admin_action_delete')[0].hide();
    $$('.sf_admin_action_delete')[1].hide();
    $$('.sf_admin_action_save')[2].hide();
 }

 var mosdatgob='<?php echo H::getConfApp2('mosdatgob', 'presupuesto', 'PreTrasla');?>';
 if (mosdatgob!='S'){
   $('divnrodec').hide();
   $('divfecdec').hide();
 }

var ids='<?php echo $cptrasla->getId();?>';
 var guardo='<?php echo $sf_user->getAttribute('grabotra','','pretrasla')?>';

  if (ids!="" && guardo=='S')
{

  if(confirm("¿Desea imprimir el formato del Traslado?"))
  {
    var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
    var codtra=$('cptrasla_reftra').value;

    pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/presupuesto/r.php=?r=pretra.php&codtra1="+codtra+"&codtra2="+codtra;
            

    window.open(pagina,$('cptrasla_reftra').value,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
  }
}
</script>