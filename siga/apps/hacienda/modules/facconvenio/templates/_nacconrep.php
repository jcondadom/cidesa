<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcconpag->getNacconrep()=="V")    { ?>
<?php
      echo radiobutton_tag('fcconpag[nacconrep]', 'V', true, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[nacconrep]', 'E', false, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcconpag->getNacconrep()=="E")
{
      echo radiobutton_tag('fcconpag[nacconrep]', 'V', false, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[nacconrep]', 'E', true, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcconpag[nacconrep]', 'V', true, 'readOnly=true').'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[nacconrep]', 'E', false, 'readOnly=true').'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>