  <?php $value = object_input_tag($fcconpag, 'getRefcon', array (
  'readonly'  =>  $fcconpag->getId()!='' ? true : false ,
  'size' => 10,
  'maxlength' => 10,
  'control_name' => 'fcconpag[refcon]',
  'onBlur'  => "javascript: valor=this.value; valor=this.value.pad(10, '#',0);document.getElementById('fcconpag_refcon').value=valor;document.getElementById('fcconpag_refcon').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>