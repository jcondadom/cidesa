
<script type="text/javascript">
  var aprcom='<?php echo $caordcom->getComproaprob(); ?>';
  var ocudelanu='<?php echo H::getConfApp2('ocudelanu', 'compras', 'almordcom'); ?>';
  if (aprcom=='S' && ocudelanu=='S')
  {
    $$('.sf_admin_action_delete')[0].hide();
    $$('.sf_admin_action_delete')[1].hide();
  }
</script>