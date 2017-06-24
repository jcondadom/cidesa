<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<ul class="sf_admin_actions">
 <?php if ($caentalm->getId()) {?>
    <li class="float-rigth">
        <input name="Forma" type="button" value="Forma-Preimpresa" class="sf_admin_action_save" onClick="formapreimpresa()">
    </li>
    <?php }?>
</ul>
<?
	echo grid_tag_v2($caentalm->getObj());
?>

<script type="text/javascript">
  var id="";
  var id='<?php echo $caentalm->getId()?>';
  actualiza(id);
  if (id=='')
  {
	var manesolcorr='<?php echo $caentalm->getMansolocor(); ?>';
     if (manesolcorr=='S')
     {
        $('caentalm_rcpart').value='########';
     	$('caentalm_rcpart').readOnly=true;
        $('caentalm_codpro').focus();
     }
  }else{
    var  estatus='<? echo $caentalm->getStarcp();?>';
    if (estatus=='N'){
      $$('.sf_admin_action_delete')[0].hide();
      $$('.sf_admin_action_delete')[1].hide();
    }
  }

  var deshab='<?php echo $caentalm->getBloqfec(); ?>';
  if (deshab=='S')
  {
  	$('trigger_caentalm_fecrcp').hide();
  	$('caentalm_fecrcp').readOnly=true;
  }
  
  function formapreimpresa()
  {
      var  rcpart='<? echo $caentalm->getRcpart();?>';

      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
      
      pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/compras/r.php?r=carentalm.php&codentdes="+rcpart+"&codenthas="+rcpart;

      window.open(pagina,rcpart,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");      
  }

  function anular()
  {
    var rcpart=$('caentalm_rcpart').value;
    var fecrcp=$('caentalm_fecrcp').value;
    var  estatus='<? echo $caentalm->getStarcp();?>';

    if (estatus!='N')
      window.open(getUrlModulo()+'anular?rcpart='+rcpart+'&fecrcp='+fecrcp,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=400,resizable=yes,left=400,top=120');
  }
</script>