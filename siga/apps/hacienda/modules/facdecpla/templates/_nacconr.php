<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcotring->getNacconr()=="V")    { ?>
<?php
      echo radiobutton_tag('fcotring[nacconr]', 'V', true).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcotring[nacconr]', 'E', false).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcotring->getNacconr()=="E")
{
      echo radiobutton_tag('fcotring[nacconr]', 'V', false).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcotring[nacconr]', 'E', true).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcotring[nacconr]', 'V', true).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcotring[nacconr]', 'E', false).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>