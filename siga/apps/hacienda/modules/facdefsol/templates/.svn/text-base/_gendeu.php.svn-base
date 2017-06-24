<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fctipsol->getGendeu()=="S")    { ?>
<?php
      echo radiobutton_tag('fctipsol[gendeu]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fctipsol[gendeu]', 'N', false).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fctipsol->getGendeu()=="N")
{
      echo radiobutton_tag('fctipsol[gendeu]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fctipsol[gendeu]', 'N', true).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fctipsol[gendeu]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fctipsol[gendeu]', 'N', false).'&nbsp;&nbsp;'."No".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>