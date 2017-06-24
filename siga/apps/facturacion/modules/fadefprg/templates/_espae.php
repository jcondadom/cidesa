<?php

if ($fadefprg->getEspae() == 'S') { ?>
    <?php echo radiobutton_tag('fadefprg[espae]', 'S', true) . "Si" . '&nbsp;&nbsp;';
    echo radiobutton_tag('fadefprg[espae]', 'N', false) . "   No"; ?>
<? } else {
echo radiobutton_tag('fadefprg[espae]', 'S', false) . "Si" . '&nbsp;&nbsp;';
echo radiobutton_tag('fadefprg[espae]', 'N', true) . "   No";
}
?>