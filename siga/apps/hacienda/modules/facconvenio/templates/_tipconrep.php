<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcconpag->getTipconrep()=="N")    { ?>
<?php
      echo radiobutton_tag('fcconpag[tipconrep]', 'N', true, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[tipconrep]', 'J', false, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcconpag->getTipconrep()=="J")
{
      echo radiobutton_tag('fcconpag[tipconrep]', 'N', false, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[tipconrep]', 'J', true, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcconpag[tipconrep]', 'N', true, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[tipconrep]', 'J', false, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>