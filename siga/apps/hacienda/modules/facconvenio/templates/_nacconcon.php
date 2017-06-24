<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcconpag->getNacconcon()=="V")    { ?>
<?php
      echo radiobutton_tag('fcconpag[nacconcon]', 'V', true, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[nacconcon]', 'E', false, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcconpag->getNacconcon()=="E")
{
      echo radiobutton_tag('fcconpag[nacconcon]', 'V', false, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[nacconcon]', 'E', true, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcconpag[nacconcon]', 'V', true, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[nacconcon]', 'E', false, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>