<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if ($cpsoltrasla->getId()) { 
  $pdfnomrep="";
  $pdfjasper="N";

  $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';

  $nomrep=H::getX_vacio('CODEMP','Cpdefniv','Repsoltrasla1','001');

  $configyml = sfYaml::load($dirrepconfig);


  if(is_array($configyml)){
    if(array_key_exists('presupuesto',$configyml)) {
        if(array_key_exists('presoltrasla',$configyml['presupuesto'])) {
          if(array_key_exists('nombrereporte',$configyml['presupuesto']["presoltrasla"])) 
            $pdfnomrep = $configyml["presupuesto"]["presoltrasla"]["nombrereporte"];
          if(array_key_exists('parameterjasper',$configyml['presupuesto']["presoltrasla"])) 
            $pdfjasper= $configyml["presupuesto"]["presoltrasla"]["parameterjasper"];
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
        var  nomrepimp='<? print $pdfnomrep;?>';
        var  repimpjas='<? print $pdfjasper;?>'; 
        var fecdes=$('cpsoltrasla_fectra').value;
        var pertrades= $('cpsoltrasla_pertra').value;
        var combodes= $('cpsoltrasla_statra').value;
        var codtrades=$('cpsoltrasla_reftra').value;
        var  nomrepdef='<? print $nomrep;?>';


        if (nomrepimp!=''){         
          if (repimpjas=='S') 
              pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r="+nomrepimp+".php&s=<?php echo $sf_user->getAttribute('schema');?>&codtrades="+codtrades+"&codtrahas="+codtrades+"&fecdes="+fecdes+"&fechas="+fecdes+"&pertrades="+pertrades+"&pertrahas="+pertrades+"&combodes="+combodes;
          else
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/presupuesto/r.php=?r="+nomrepimp+".php&codtrades="+codtrades+"&codtrahas="+codtrades+"&fecdes="+fecdes+"&fechas="+fecdes+"&pertrades="+pertrades+"&pertrahas="+pertrades+"&combodes="+combodes;
        }else if (nomrepdef!=''){         
          if (repimpjas=='S') 
              pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r="+nomrepdef+".php&s=<?php echo $sf_user->getAttribute('schema');?>&codtrades="+codtrades+"&codtrahas="+codtrades+"&fecdes="+fecdes+"&fechas="+fecdes+"&pertrades="+pertrades+"&pertrahas="+pertrades+"&combodes="+combodes;
          else
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/presupuesto/r.php=?r="+nomrepdef+".php&codtrades="+codtrades+"&codtrahas="+codtrades+"&fecdes="+fecdes+"&fechas="+fecdes+"&pertrades="+pertrades+"&pertrahas="+pertrades+"&combodes="+combodes;
        }else {
          if (repimpjas=='S') 
              pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r=pretra2.php&s=<?php echo $sf_user->getAttribute('schema');?>&codtrades="+codtrades+"&codtrahas="+codtrades+"&fecdes="+fecdes+"&fechas="+fecdes+"&pertrades="+pertrades+"&pertrahas="+pertrades+"&combodes="+combodes;
          else
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/presupuesto/r.php=?r=pretra2.php&codtrades="+codtrades+"&codtrahas="+codtrades+'&fecdes='+fecdes+'&fechas='+fecdes+'&pertrades='+pertrades+'&pertrahas='+pertrades+'&combodes='+combodes;
        }        

        window.open(pagina,$('cpsoltrasla_reftra').value,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
  }
</script>
<?php }?>
