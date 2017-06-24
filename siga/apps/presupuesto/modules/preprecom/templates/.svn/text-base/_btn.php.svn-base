<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if ($cpprecom->getId()) {
$nomreporte=H::getConfApp2('nomreporte', 'presupuesto', 'preprecom');
$formavieja=H::getConfApp2('forvie', 'presupuesto', 'preprecom');
 ?>
<ul class="sf_admin_actions" >
<li class="float-rigth">
<input id="formpre" class="sf_admin_action_save" type="button" value="Forma-Preimpresa" onClick="mostrarPreimpresa();">
</li>
</ul>
<?php
   $pdfjasper="N";
   $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';
   $configyml = sfYaml::load($dirrepconfig);
   if(is_array($configyml)){
     if(array_key_exists('presupuesto',$configyml)) {
       if(array_key_exists('preprecom',$configyml['presupuesto'])) {
         if(array_key_exists('parameterjasper',$configyml['presupuesto']["preprecom"]))
           $pdfjasper= $configyml["presupuesto"]["preprecom"]["parameterjasper"];
      }
    }
  }
 ?>
<script type="text/javascript">
  function mostrarPreimpresa()
  {
    var pre1=$('cpprecom_refprc').value;
    var fecprc1=$('cpprecom_fecprc').value;
    var tipprc1=$('cpprecom_tipprc').value;
    var codpre1=$('ax_0_1').value;
    var fil=obtener_filas_grid('a',1)-2;
    var filfin='ax_'+fil+'_1';
    var codpre2=$(filfin).value;
    var estado=$('cpprecom_staprc').value;
    if (estado=='A') est='Activo';
    else if (estado=='N') est='Anulado';
    else est='';
    var comodin='%%';

  var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
  var  mostrarjasper='<?php echo $pdfjasper;?>';
  var nomreporte='<?php echo $nomreporte; ?>';
  var formavieja='<?php echo $formavieja; ?>';

  if (nomreporte!=""){
    if (mostrarjasper=='S')
      pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r="+nomreporte+".php&s=<?php echo $sf_user->getAttribute('schema');?>&refpredes="+pre1+"&refprehas="+pre1;
    else
      if (formavieja=='S')
          pagina=ruta+'/reportes/reportes/presupuesto/r'+nomreporte+'.php?refpredes='+pre1+'&refprehas='+pre1;
      else
          pagina=ruta+'/reportes/reportes/presupuesto/r.php?m=presupuesto&r='+nomreporte+'.php&refpredes='+pre1+'&refprehas='+pre1;
  }
  else{
    if (mostrarjasper=='S')
      pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r=rpreprc.php&s=<?php echo $sf_user->getAttribute('schema');?>&pre1="+pre1+"&pre2="+pre1+"&fecprc1="+fecprc1+"&fecprc2="+fecprc1+"&tipprc1="+tipprc1+"&tipprc2="+tipprc1+"&codpre1="+codpre1+"&codpre2="+codpre2+"&comodin="+comodin+"&estado="+est;
    else
      pagina=ruta+'/reportes/reportes/presupuesto/rpreprc.php?pre1='+pre1+'&pre2='+pre1+'&fecprc1='+fecprc1+'&fecprc2='+fecprc1+'&tipprc1='+tipprc1+'&tipprc2='+tipprc1+'&codpre1='+codpre1+'&codpre2='+codpre2+'&comodin='+comodin+'&estado='+est;
  }
  window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")

  }
</script>
<?php }?>
