<?php if ($viasolviatra->getReqtrater()=='S')  { ?>
  <?php echo radiobutton_tag('viasolviatra[reqtrater]', 'S', true)        ."   Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
      echo radiobutton_tag('viasolviatra[reqtrater]', 'N', false)."     No";?>
<?php }else{
  echo radiobutton_tag('viasolviatra[reqtrater]', 'S', false, array('onClick' => 'MostrarTrans()'))        ." Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
  echo radiobutton_tag('viasolviatra[reqtrater]', 'N', true, array('onClick' => 'OcultarTrans()'))."   No";
} ?>