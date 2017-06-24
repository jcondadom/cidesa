<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if ($cpadidis->getId()) { 
  $pdfjasper="N";

  $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';

  $configyml = sfYaml::load($dirrepconfig);
  $nomrep2=H::getX_vacio('CODEMP','Cpdefniv','Repsoladidis2','001');


  if(is_array($configyml)){
    if(array_key_exists('presupuesto',$configyml)) {
        if(array_key_exists('preadidis',$configyml['presupuesto'])) {          
          if(array_key_exists('parameterjasper',$configyml['presupuesto']["preadidis"])) 
            $pdfjasper= $configyml["presupuesto"]["preadidis"]["parameterjasper"];
      }
    }
  }
?>
<ul class="sf_admin_actions" >
<li class="float-rigth">
<input id="formpre" class="sf_admin_action_save" type="button" value="Forma-Preimpresa Crédito/Adición" onClick="mostrarPreimpresacre();">
</li>
</ul>
<script type="text/javascript">
  function mostrarPreimpresacre()
  {
     var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
        var  repimpjas='<? print $pdfjasper;?>'; 
        var  nomrep='<? print $nomrep2;?>'; 

        if (nomrep!=''){
          if (repimpjas=='S') 
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r="+nomrep+".php&s=<?php echo $sf_user->getAttribute('schema');?>&refdes="+$('cpadidis_refadi').value+"&refhas="+$('cpadidis_refadi').value;
          else
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/presupuesto/r.php=?r="+nomrep+".php&refdes="+$('cpadidis_refadi').value+"&refhas="+$('cpadidis_refadi').value;

        }else {
          if (repimpjas=='S') 
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r=preadidispre.php&s=<?php echo $sf_user->getAttribute('schema');?>&refdes="+$('cpadidis_refadi').value+"&refhas="+$('cpadidis_refadi').value;
          else
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/presupuesto/r.php=?r=preadidispre.php&refdes="+$('cpadidis_refadi').value+"&refhas="+$('cpadidis_refadi').value;
        }
        window.open(pagina,$('cpadidis_refadi').value,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
  }
</script>
<?php }?>
