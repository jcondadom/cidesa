<?php
/*
 * Created on 12/10/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
  <?php $value = object_input_tag($occlacomp, 'getCodclacomp', array (
  'readonly'  =>  $occlacomp->getId()!='' ? true : false ,
  'size' => 10,
  'maxlength' => 5,
  'control_name' => 'occlacomp[codclacomp]',
)); echo $value ? $value : '&nbsp;' ?>