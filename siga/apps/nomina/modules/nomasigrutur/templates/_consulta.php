<ul class="sf_admin_actions" >
<li class="float-center">
<?php 
$sql="select distinct a.codtur as turno, c.destur as descripcion, a.codnom as nomina, b.nomnom as nombre, to_char(a.fecini,'dd/mm/yyyy') as fecini, to_char(a.fecfin,'dd/mm/yyyy') as fecfin  from npgrutur a, npnomina b, npturnos c where a.codnom=b.codnom and a.codtur=c.codtur";

echo  button_to_popup('Lista',cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/npgrutur_fecfin-npgrutur_fecini-npgrutur_codnom-npgrutur_nomnom-npgrutur_codtur-npgrutur_destur/campos/fecfin-fecini-nomina-nombre-turno-descripcion',$sql,'catalogo1','sf_admin_action_list')?>
</li>
</ul>