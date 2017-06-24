<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcpreing->getEstima()=="S")    { ?>
<?php
      echo radiobutton_tag('fcpreing[estima]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcpreing[estima]', 'N', false).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcpreing[estima]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcpreing[estima]', 'N', true).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>