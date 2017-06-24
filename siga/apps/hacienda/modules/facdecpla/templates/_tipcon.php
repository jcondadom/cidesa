<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcotring->getTipcon()=="N")    { ?>
<?php
      echo radiobutton_tag('fcotring[tipcon]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcotring[tipcon]', 'J', false).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcotring->getTipcon()=="J")
{
      echo radiobutton_tag('fcotring[tipcon]', 'N', false).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcotring[tipcon]', 'J', true).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcotring[tipcon]', 'N', true).'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcotring[tipcon]', 'J', false).'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>

<script type="text/javascript" language="JavaScript">
function enter(id)
{
    if ($(id).value=='')
      $(id).value='INCLUSIO';
    else
        $(id).value=$(id).value.pad(8, '0',0);
}
</script>
