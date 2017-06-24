<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if ($cptrasla->getId()) { 
  $pdfjasper="N";

  $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';

  $nomrep=H::getX_vacio('CODEMP','Cpdefniv','Repsoltrasla2','001');

  $configyml = sfYaml::load($dirrepconfig);


  if(is_array($configyml)){
    if(array_key_exists('presupuesto',$configyml)) {
        if(array_key_exists('pretrasla',$configyml['presupuesto'])) {
          if(array_key_exists('parameterjasper',$configyml['presupuesto']["pretrasla"])) 
            $pdfjasper= $configyml["presupuesto"]["pretrasla"]["parameterjasper"];
      }
    }
  }

?>
<ul class="sf_admin_actions" >
<li class="float-rigth">
<input id="formpre" class="sf_admin_action_save" type="button" value="Forma-Preimpresa" onClick="mostrarPreimpresa();">
</li>
</ul>
<script type="text/javascript">
  function mostrarPreimpresa()
  {
     var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
      var codtra=$('cptrasla_reftra').value;
      var  nomrepimp='<? print $nomrep;?>';
        var  repimpjas='<? print $pdfjasper;?>'; 

        if (nomrepimp!=''){         
          if (repimpjas=='S') 
              pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r="+nomrepimp+".php&s=<?php echo $sf_user->getAttribute('schema');?>&codtra1="+codtra+"&codtra2="+codtra;
          else
          	pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/presupuesto/r.php=?r="+nomrepimp+".php&codtra1="+codtra+"&codtra2="+codtra;
        }else {
          if (repimpjas=='S') 
              pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r=pretra.php&s=<?php echo $sf_user->getAttribute('schema');?>&codtra1="+codtra+"&codtra2="+codtra;
          else
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/presupuesto/r.php=?r=pretra.php&codtra1="+codtra+"&codtra2="+codtra;
        }              

    window.open(pagina,$('cptrasla_reftra').value,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
  }
</script>
<?php }?>
