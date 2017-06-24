<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcsollic[tipest]', options_for_select(Constantes::Tipest_Facpicsollic(),$fcsollic->getTipest()),array(
   'onchange' => "toAjax(4,getUrlModuloAjax(),this.value,'','')",
)); ?>