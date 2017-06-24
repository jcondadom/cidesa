
<script type="text/javascript">
  var aprcom='<?php echo $cpcompro->getAprcom(); ?>';
  var causado='<?php echo $cpcompro->getCausado(); ?>';
  var anulado='<?php echo $cpcompro->getStacom(); ?>';
  var reqaut='<?php echo H::getX_vacio('TIPCOM','Cpdoccom','Reqaut',$cpcompro->getTipcom()); ?>'
  if ((aprcom=='S' && reqaut=='S') || causado=='S' || anulado=='N')
  {
    $$('.sf_admin_action_delete')[0].hide();
    $$('.sf_admin_action_delete')[1].hide();
    if (anulado=='N')
    	$$('.sf_admin_action_save')[1].hide();
  }

  var filsoldir='<?php echo H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');?>';
 if (filsoldir!='S')
    $('divcoddirec').hide();

</script>