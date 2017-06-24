<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcconpag->getTipconcon()=="N")    { ?>
<?php
      echo radiobutton_tag('fcconpag[tipconcon]', 'N', true, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[tipconcon]', 'J', false, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcconpag->getTipconcon()=="J")
{
      echo radiobutton_tag('fcconpag[tipconcon]', 'N', false, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[tipconcon]', 'J', true, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcconpag[tipconcon]', 'N', true, 'readOnly=true').'&nbsp;&nbsp;'."Natural".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcconpag[tipconcon]', 'J', false, 'readOnly=true').'&nbsp;&nbsp;'."Juridica".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>