
<?php

  $value = object_input_date_tag($fcpagos, 'getFeccor', array (
  'readonly' => true,
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'date_format' => 'dd/mm/yyyy',

  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcpagos[feccor]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;';

?>
