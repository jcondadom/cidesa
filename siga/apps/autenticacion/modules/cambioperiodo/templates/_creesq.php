<?php if ($empresa->getCreesq()=='S')  {
  ?><?php echo radiobutton_tag('empresa[creesq]', 'S', true, array('onClick' => 'ocul_mos()'))        ."Si".'&nbsp;&nbsp;';
      echo radiobutton_tag('empresa[creesq]', 'N', false, array('onClick' => 'ocul_mos()'))."   No";?>
    <?php
}else{
  echo radiobutton_tag('empresa[creesq]', 'S', false, array('onClick' => 'ocul_mos()'))        ."Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('empresa[creesq]', 'N', true, array('onClick' => 'ocul_mos()'))."   No";
} ?>

<script type="text/javascript">
function ocul_mos(){
  if ($('empresa_creesq_S').checked==true){  
    $('info').show();  
  }else{
      $('info').hide();  
  }
}
</script>