<ul class="sf_admin_actions" >
<li class="float-left">
<?php echo submit_to_remote('Submit2', 'Distribuir', array(
         'update'   => 'divgrid',
         'url'      => 'confinins/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_list',)) ?>
</li>
</ul>

<script type="text/javascript">

function validarFecini() {
	var fecini=$('contaba_fecini').value;
	var fecper=$('contaba_feccie').value;

	if (fecini!='' && fecper!='') {
		array_fecini = fecini.split("/");

		var diaini=array_fecini[0];
		var mesini=(array_fecini[1]-1);
		var anoini=(array_fecini[2]);
		var fechaini = new Date(anoini,mesini,diaini);

		array_fecper = fecper.split("/");

		var diaper=array_fecper[0];
		var mesper=(array_fecper[1]-1);
		var anoper=(array_fecper[2]);
		var fechaper = new Date(anoper,mesper,diaper);
		if (fechaini>fechaper) {
			alert_('La Fecha de Inicio debe ser menor a la Fecha de Cierre');
			$('contaba_fecini').value='';
		}
  }
}

function validarFeccie(){
	var fecini=$('contaba_fecini').value;
	var feccie=$('contaba_feccie').value;

if (fecini!='' && feccie!='') {
	array_fecini = fecini.split("/");

	var diaini=array_fecini[0];
	var mesini=(array_fecini[1]-1);
	var anoini=(array_fecini[2]);
	var fechaini = new Date(anoini,mesini,diaini);

	array_feccie = feccie.split("/");

	var diacie=array_feccie[0];
	var mescie=(array_feccie[1]-1);
	var anocie=(array_feccie[2]);
	var fechacie = new Date(anocie,mescie,diacie);

	if (fechacie<fechaini){
		alert('La Fecha de Cierre debe ser mayor que la Fecha de Inicio');
		$('contaba_feccie').value='';
	}
  }
}


</script>