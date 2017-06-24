<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo $fafacturpro->getEtiqueta() ;?></font></strong></th>
  </tr>
</table>


<?php 
$botsimp=H::getConfApp2('botsimp', 'facturacion', 'fafacturpro');
if ($fafacturpro->getId() && $botsimp=='S') { ?>
<ul class="sf_admin_actions" >
<li class="float-center">
<input id="impfac1" class="sf_admin_action_list" type="button" value="Imprimir 1" onClick="FacturaImpresa1();">
</li>
<li class="float-center">
<input id="impfac2" class="sf_admin_action_list" type="button" value="Imprimir 2" onClick="FacturaImpresa2();">
</li>
</ul>
<?php } ?>

<script type="text/javascript">
  function FacturaImpresa1(){
  	if(confirm("¿Desea imprimir la Proforma?"))
    {
      var  numfacdes='<?php echo $fafacturpro->getReffac();?>';
      var  numfachas='<?php echo $fafacturpro->getReffac();?>';      
  	  var  ruta='http://'+'<?php echo $this->getContext()->getRequest()->getHost();?>';

      pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=facturacion&r=farproforpre.php&s=<?php echo $sf_user->getAttribute('schema');?>&numfacdes="+numfacdes+"&numfachas="+numfachas;
       
	    window.open(pagina,numfacdes,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
      }
  }

  function FacturaImpresa2(){
    if(confirm("¿Desea imprimir la Proforma?"))
    {
      var  numfacdes='<?php echo $fafacturpro->getReffac();?>';
      var  numfachas='<?php echo $fafacturpro->getReffac();?>';      
      var  ruta='http://'+'<?php echo $this->getContext()->getRequest()->getHost();?>';

      pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=facturacion&r=farproforpre2.php&s=<?php echo $sf_user->getAttribute('schema');?>&numfacdes="+numfacdes+"&numfachas="+numfachas;
     
     window.open(pagina,numfacdes,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
  
    }
  }  
</script>