<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php 
$pdfjasper="N";
if ($fafactur->getId()) : ?>
  <ul class="sf_admin_actions" >
    <li class="float-center">
      <input id="impfac" class="sf_admin_action_list" type="button" value="Imprimir Preimpreso" onClick="FacturaImpresa();">
    </li>
  </ul>
  <?php    
     $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';
     $configyml = sfYaml::load($dirrepconfig);
     if(is_array($configyml)){
       if(array_key_exists('facturacion',$configyml)) {
         if(array_key_exists('farfacpreimp',$configyml['facturacion'])) {     
           if(array_key_exists('parameterjasper',$configyml['facturacion']["farfacpreimp"])) 
             $pdfjasper= $configyml["facturacion"]["farfacpreimp"]["parameterjasper"];
        }
      }
    }
  ?>

<?php endif; ?>


<script type="text/javascript">
  function FacturaImpresa(){
  	if(confirm("¿Desea imprimir la Factura?"))
    {
      var  codfacdes='<?php echo $fafactur->getReffac();?>';
      var  codfachas='<?php echo $fafactur->getReffac();?>';      
      var  fecfacdes='<?php echo $fafactur->getFecemi();?>';      
      var  mostrarjasper='<?php echo $pdfjasper;?>';
  	  var  ruta='http://'+'<?php echo $this->getContext()->getRequest()->getHost();?>';

      if (mostrarjasper=='S') 
        pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=facturacion&r=farfacpreimp.php&s=<?php echo $sf_user->getAttribute('schema');?>&reffacdes="+codfacdes+"&reffachas="+codfachas+"&fecfacdes="+fecfacdes+"&fecfachas="+fecfacdes;
      else
        pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/facturacion/r.php?r=farfacpreimp.php&codfacdes="+codfacdes+"&codfachas="+codfachas;

	window.open(pagina,codfacdes,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
    }
  }
</script>

  <?php $impfis = H::getConfApp2('impfis', 'facturacion', 'fafactur'); ?>

  <?php if($impfis == 'S' && $fafactur->getId()) : ?>
  <ul class="sf_admin_actions" >
    <li class="float-center">

      <?php include_partial('fafactur/impfis', array('fafactur' => $fafactur, 'labels' => $labels, 'params' => $params)) ?>

    </li>
  </ul>

  <?php endif; ?>
