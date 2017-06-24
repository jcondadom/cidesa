<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if ($cpcompro->getId()) {
$nomreporte=H::getConfApp2('nomreporte', 'presupuesto', 'precompro');
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
       if(array_key_exists('precompro',$configyml['presupuesto'])) {
         if(array_key_exists('parameterjasper',$configyml['presupuesto']["precompro"]))
           $pdfjasper= $configyml["presupuesto"]["precompro"]["parameterjasper"];
      }
    }
  }
 ?>
<script type="text/javascript">
  function mostrarPreimpresa()
  {
    var numcom1=$('cpcompro_refcom').value;
    var feccom1=$('cpcompro_feccom').value;
    var tipcom1=$('cpcompro_tipcom').value;
    var codpre1=$('ax_0_1').value;
    var fil=obtener_filas_grid('a',1)-1;
    var filfin='ax_'+fil+'_1';
    var codpre2=$(filfin).value;
    var combodes=$('cpcompro_stacom').value;
    var comodin='%%';

    var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
    var nomreporte='<?php echo $nomreporte; ?>';
    var  mostrarjasper='<?php echo $pdfjasper;?>';
  if (nomreporte!="")

        if (mostrarjasper=='S')
            pagina=ruta+"/reportes/reportes/jasper.php?m=presupuesto&r="+nomreporte+".php&s=<?php echo $sf_user->getAttribute('schema');?>&refcomdes="+numcom1+"&refcomhas="+numcom1;
        else
            pagina=ruta+'/reportes/reportes/presupuesto/r.php=?r=<?php echo $nomreporte ?>.php&refcomdes='+numcom1+'&refcomhas='+numcom1;
  else
      pagina=ruta+'/reportes/reportes/presupuesto/r.php=?r=precom.php&pre1='+numcom1+'&pre2='+numcom1+'&fecprc1='+feccom1+'&fecprc2='+feccom1+'&tipprc1='+tipcom1+'&tipprc2='+tipcom1+'&codpre1='+codpre1+'&codpre2='+codpre2+'&comodin='+comodin+'&combodes='+combodes;


  window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")

  }
</script>
<?php }?>
