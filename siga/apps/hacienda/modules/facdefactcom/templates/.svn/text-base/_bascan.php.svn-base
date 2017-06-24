<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcactcom->getBascan()=="S")    { ?>
<?php
      echo radiobutton_tag('fcactcom[bascan]', 'S', true).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[bascan]', 'N', false).'&nbsp;&nbsp;'."No";
}
elseif ($fcactcom->getBascan()=="N")
{
      echo radiobutton_tag('fcactcom[bascan]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[bascan]', 'N', true).'&nbsp;&nbsp;'."No";
}
else
{
      echo radiobutton_tag('fcactcom[bascan]', 'S', false).'&nbsp;&nbsp;'."Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcactcom[bascan]', 'N', true).'&nbsp;&nbsp;'."No";
}
?>