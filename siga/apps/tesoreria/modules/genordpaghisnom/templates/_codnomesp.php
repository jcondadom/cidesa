<?php
   $ajaxparams="+'&codnom='+$('npnomina_codnom').value";
 ?>

<?php
echo Catalogo($npnomina,3,array(
  'getprincipal' => 'getCodnomesp',
  'getsecundario' => 'getDesnomesp',
  'campoprincipal' => 'codnomesp',
  'camposecundario' => 'desnomesp',
  'campobase' => 'id',
  ), 'Npnomesptipos_Nomespcalculo', 'npnomesptipos','',$ajaxparams); 


?>


<script type="text/javascript">
$('divcodnomesp').hide();

function ocultar(id){
	if (id=='npnomina_especial_S')
		$('divcodnomesp').show();
	else
		$('divcodnomesp').hide();
  
}
</script>      