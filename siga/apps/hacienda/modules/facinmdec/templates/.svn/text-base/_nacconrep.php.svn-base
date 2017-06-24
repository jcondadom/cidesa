<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcdeclar->getNacconrep()=="V")    { ?>
<?php
      echo radiobutton_tag('fcdeclar[nacconrep]', 'V', true,array('disabled' => true)).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[nacconrep]', 'E', false,array('disabled' => true)).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcdeclar->getNacconrep()=="E")
{
      echo radiobutton_tag('fcdeclar[nacconrep]', 'V', false,array('disabled' => true)).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[nacconrep]', 'E', true,array('disabled' => true)).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcdeclar[nacconrep]', 'V', true,array('disabled' => true)).'&nbsp;&nbsp;'."Venelozano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[nacconrep]', 'E', false,array('disabled' => true)).'&nbsp;&nbsp;'."Extranjero(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>