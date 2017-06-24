  <?php $value = object_input_tag($fcliqpag, 'getNumliq', array (
  'readonly'  =>  $fcliqpag->getId()!='' ? true : false ,
  'size' => 20,
  'maxlength' => 20,
  'control_name' => 'fcliqpag[numliq]',
)); echo $value ? $value : '&nbsp;' ?>