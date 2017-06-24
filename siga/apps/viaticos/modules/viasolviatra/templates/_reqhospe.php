<?php if ($viasolviatra->getReqhospe()=='S')  { ?>
  <?php echo radiobutton_tag('viasolviatra[reqhospe]', 'S', true)        ."   Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
      echo radiobutton_tag('viasolviatra[reqhospe]', 'N', false)."     No";?>
<?php }else{
  echo radiobutton_tag('viasolviatra[reqhospe]', 'S', false)        ." Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
  echo radiobutton_tag('viasolviatra[reqhospe]', 'N', true)."   No";
} ?>