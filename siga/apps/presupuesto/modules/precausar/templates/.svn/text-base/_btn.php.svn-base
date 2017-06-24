<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if ($cpcausad->getId()) { 
$nomreporte=H::getConfApp2('nomreporte', 'presupuesto', 'precausar');
  ?>
<ul class="sf_admin_actions" >
<li class="float-rigth">
<input id="formpre" class="sf_admin_action_save" type="button" value="Forma-Preimpresa" onClick="mostrarPreimpresa();">
</li>
</ul>
<script type="text/javascript">
  function mostrarPreimpresa()
  {
    var refcau1=$('cpcausad_refcau').value;
    var feccau1=$('cpcausad_feccau').value;
    var tipcau1=$('cpcausad_tipcau').value;
    var codpre1=$('ax_0_1').value;
    var fil=obtener_filas_grid('a',1)-1;
    var filfin='ax_'+fil+'_1';
    var codpre2=$(filfin).value;
    var estado=$('cpcausad_stacau').value;
    if (estado=='A') est='Activo';
    else if (estado=='N') est='Anulado';
    else est='';
    var comodin='%%';

  var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
   var nomreporte='<?php echo $nomreporte; ?>';
  if (nomreporte!="")
    pagina=ruta+'/reportes/reportes/presupuesto/'+nomreporte+'.php?refcau1='+refcau1+'&refcau2='+refcau1+'&feccau1='+feccau1+'&feccau2='+feccau1+'&tipcau1='+tipcau1+'&tipcau2='+tipcau1+'&codpre1='+codpre1+'&codpre2='+codpre2+'&comodin='+comodin+'&estado='+est;
  else
    pagina=ruta+'/reportes/reportes/presupuesto/rprecau.php?refcau1='+refcau1+'&refcau2='+refcau1+'&feccau1='+feccau1+'&feccau2='+feccau1+'&tipcau1='+tipcau1+'&tipcau2='+tipcau1+'&codpre1='+codpre1+'&codpre2='+codpre2+'&comodin='+comodin+'&estado='+est;

  window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")

  }
</script>
<?php }?>