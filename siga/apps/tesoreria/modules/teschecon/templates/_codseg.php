<?php
$gencodseg=H::getConfApp2('gencodseg', 'tesoreria', 'tesmovemiche');
if ($gencodseg=='S') {?>
 <?php $value = object_input_tag($tscheemi, 'getCodseg', array (
  'size' => 35,
  'readOnly' => true,
  'control_name' => 'tscheemi[codseg]',
  'maxlength' => 32,
)); echo $value ? $value : '&nbsp;' ?>
<?php }?>