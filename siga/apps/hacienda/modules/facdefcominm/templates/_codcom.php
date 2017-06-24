  <?php $value = object_input_tag($fccominm, 'getCodcom', array (
  'readonly'  =>  $fccominm->getId()!='' ? true : false ,
  'size' => 12,
  'maxlength' => 6,
  'control_name' => 'fccominm[codcom]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(6,'0',0);document.getElementById('fccominm_codcom').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>