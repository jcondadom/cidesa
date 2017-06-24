<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
$msg='';
$msg2='';
$js='';
if ($fcsollic->getId()!='')
{
  if ($fcsollic->getStalic()=='V')
  {
    $msg="VIGENTE";
    $js="$$('.sf_admin_action_create')[0].disabled=true; $$('.sf_admin_action_save_and_add')[0].disabled=true; $$('.sf_admin_action_delete')[0].disabled=false; $$('.sf_admin_action_cancel')[0].disabled=false;";
  }else {
    $js="$$('.sf_admin_action_create')[0].disabled=true; $$('.sf_admin_action_save_and_add')[0].disabled=true; $$('.sf_admin_action_delete')[0].disabled=true; $$('.sf_admin_action_cancel')[0].disabled=false;";
    switch ($fcsollic->getStalic())
    {
        case 'E':
           $msg="VENCIDA";
           $js="$$('.sf_admin_action_create')[0].disabled=true; $$('.sf_admin_action_save_and_add')[0].disabled=false; $$('.sf_admin_action_delete')[0].disabled=true; $$('.sf_admin_action_cancel')[0].disabled=true;";
          break;
        case 'C':
            $msg="CANCELADA";
            $js="$$('.sf_admin_action_create')[0].disabled=true; $$('.sf_admin_action_save_and_add')[0].disabled=true; $$('.sf_admin_action_delete')[0].disabled=true; $$('.sf_admin_action_cancel')[0].disabled=true;";
          break;
        case 'S':
            $msg="SUSPENDIDA";
            $js="$$('.sf_admin_action_create')[0].disabled=false; $$('.sf_admin_action_save_and_add')[0].disabled=true; $$('.sf_admin_action_delete')[0].disabled=true; $$('.sf_admin_action_cancel')[0].disabled=true;";
          break;
        case 'N':
            $msg="NEGADA";
            $js="$$('.sf_admin_action_create')[0].disabled=true; $$('.sf_admin_action_save_and_add')[0].disabled=true; $$('.sf_admin_action_delete')[0].disabled=true; $$('.sf_admin_action_cancel')[0].disabled=true;";
          break;
    }
  }
  if (H::dateDiff('d', $fcsollic->getFecven(), date('Y-m-d'))>0)
  {
      if ($msg=='VIGENTE' || $msg=='VENCIDA')
      {
         $msg='VIGENTE';
      }else {
          $msg=$msg.' - VENCIDA';
      }
      $js="$$('.sf_admin_action_create')[0].disabled=true; $$('.sf_admin_action_save_and_add')[0].disabled=false; $$('.sf_admin_action_delete')[0].disabled=false; $$('.sf_admin_action_cancel')[0].disabled=true;";
  }

?>

<div id="estado" style="color:#E06C6C;">
<?php echo "<strong>".$msg."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$msg2."</strong>"; ?>
</div>

<script type="text/javascript" language="JavaScript">
 <?php echo $js; ?>;
 

 var funcionario='<?php echo $sf_user->getAttribute('usuario')?>';
 $('fcsollic_funres').value=funcionario;

</script>

<?php
}


