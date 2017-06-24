<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
if($ajax=='1')
    echo grid_tag_v2($liordcom->getGridart());
elseif($ajax=='7')
    echo grid_tag_v2($liordcom->getGridcroent());
elseif($ajax=='8')
    echo grid_tag_v2($liordcom->getGridforpag());
elseif($ajax=='9')
    echo grid_tag_v2($liordcom->getGridrgo());
elseif($ajax=='10')
    echo grid_tag_v2($liordcom->getGridfia());
elseif($ajax=='11')
    echo grid_tag_v2($liordcom->getGridpro());
?>
