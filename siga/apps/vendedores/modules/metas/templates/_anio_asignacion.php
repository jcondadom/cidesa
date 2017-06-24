 <?php 
$arreglo_anios = array();
for ($i=2016;$i<=date('Y');$i++)
{
	$arreglo_anios[$i]=$i;
}
echo select_tag('metas[anio_asignacion]', options_for_select($arreglo_anios,$metas->getAnioAsignacion(),'include_custom= Seleccione uno...'),array(
  )) ?>
