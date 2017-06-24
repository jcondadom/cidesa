  <?php $value = object_input_tag($fcregveh, 'getDueant', array (
  'size' => 15,
  'control_name' => 'fcregveh[dueant]',
  'maxlength' => 50,
)); echo $value ? $value : '&nbsp;' ?>

    <?php $value = object_input_tag($fcregveh, 'getNomdueant', array (
    'size' => 15,
    'readonly'=>true,
    'control_name' => 'fcregveh[nomdueant]',
    'style' => "border-style:none;",
  )); echo $value ? $value : '&nbsp;' ?>