<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>


<?php
if($ajax=='1')
    echo grid_tag_v2($lianaemp->getGridleg());
elseif($ajax=='8')
    echo grid_tag_v2($lianaemp->getGridtec());
elseif($ajax=='9')
    echo grid_tag_v2($lianaemp->getGridfin());
