<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if ($cppagos->getId()) { 
$nomreporte=H::getConfApp2('nomreporte', 'presupuesto', 'prepagar');
  ?>
<ul class="sf_admin_actions" >
<li class="float-rigth">
<input id="formpre" class="sf_admin_action_save" type="button" value="Forma-Preimpresa" onClick="mostrarPreimpresa();">
</li>
</ul>
<script type="text/javascript">
  function mostrarPreimpresa()
  {
    var refpag1=$('cppagos_refpag').value;
    var fecpag1=$('cppagos_fecpag').value;
    var tippag1=$('cppagos_tippag').value;
    var codpre1=$('ax_0_1').value;
    var fil=obtener_filas_grid('a',1)-1;
    var filfin='ax_'+fil+'_1';
    var codpre2=$(filfin).value;
    var estado=$('cppagos_stapag').value;
    if (estado=='A') est='Activo';
    else if (estado=='N') est='Anulado';
    else est='';
    var comodin='%%';

  var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
  var nomreporte='<?php echo $nomreporte; ?>';
  if (nomreporte!="")
    pagina=ruta+'/reportes/reportes/presupuesto/'+nomreporte+'.php?refpag1='+refpag1+'&refpag2='+refpag1+'&fecpag1='+fecpag1+'&fecpag2='+fecpag1+'&tippag1='+tippag1+'&tippag2='+tippag1+'&codpre1='+codpre1+'&codpre2='+codpre2+'&comodin='+comodin+'&estado='+est;
  else
   pagina=ruta+'/reportes/reportes/presupuesto/rprepag.php?refpag1='+refpag1+'&refpag2='+refpag1+'&fecpag1='+fecpag1+'&fecpag2='+fecpag1+'&tippag1='+tippag1+'&tippag2='+tippag1+'&codpre1='+codpre1+'&codpre2='+codpre2+'&comodin='+comodin+'&estado='+est;
  window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")

  }
</script>
<?php }?>