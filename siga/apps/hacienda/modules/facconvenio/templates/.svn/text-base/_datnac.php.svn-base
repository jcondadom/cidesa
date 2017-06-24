<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<? if ($fcconpag->getDatnac()=="V")    { ?>
<?php
      echo radiobutton_tag('fcconpag[datnac]', 'V', true).'&nbsp;&nbsp;'."Venezolano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[datnac]', 'E', false).'&nbsp;&nbsp;'."Extranjero(a)";
}
else
{
      echo radiobutton_tag('fcconpag[datnac]', 'V', false).'&nbsp;&nbsp;'."Venezolano(a)".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[datnac]', 'E', true).'&nbsp;&nbsp;'."Extranjero(a)";
}?>