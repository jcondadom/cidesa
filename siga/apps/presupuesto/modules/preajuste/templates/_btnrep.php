<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if ($cpajuste->getId()) { 
?>
<ul class="sf_admin_actions" >
<li class="float-rigth">
<input id="formpre" class="sf_admin_action_save" type="button" value="Forma-Preimpresa" onClick="mostrarPreimpresa();">
</li>
</ul>
<script type="text/javascript">
  function mostrarPreimpresa()
  {
    var aju1=$('cpajuste_refaju').value;

  var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';

  pagina=ruta+'/reportes/reportes/presupuesto/r.php=?r=preaju.php&aju1='+aju1+'&aju2='+aju1;

  window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")

  }
</script>
<?php }?>
