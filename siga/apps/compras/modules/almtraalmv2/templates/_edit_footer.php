<script type="text/javascript">
  var id='<?php echo $catraalm->getId()?>';
    if (id!=''){  
    var  estatus='<? echo $catraalm->getStatra();?>';
    if (estatus=='N'){
      $$('.sf_admin_action_delete')[0].hide();
      $$('.sf_admin_action_save')[1].hide();
    }
  }
  </script>