<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?php $value = object_input_tag($fcusoveh, 'getAnolim', array (
  'size' => 10,
  'control_name' => 'fcusoveh[anolim]',
  'maxlength' => 4,
)); echo $value ? $value : '&nbsp;' ?>

<script type="text/javascript">
  porcent='<?php echo $fcusoveh->getPorveh();?>';
  if (porcent=='S')
     valor=100;
   else
     valor=1000;

  $$('.required')[4].innerHTML = "AlÃ­cuota (X/"+valor+")";
 
</script>