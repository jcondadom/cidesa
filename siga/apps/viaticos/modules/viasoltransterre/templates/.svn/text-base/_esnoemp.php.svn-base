<?php if ($npsolayueco->getEsnoemp()=='S')  { ?>
  <?php echo radiobutton_tag('npsolayueco[esnoemp]', 'S', true)        ."   Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
      echo radiobutton_tag('npsolayueco[esnoemp]', 'N', false)."     No";?>
<?php } elseif ($npsolayueco->getEsnoemp()=='N')  { ?>
  echo radiobutton_tag('npsolayueco[esnoemp]', 'S', false)        ." Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
  echo radiobutton_tag('npsolayueco[esnoemp]', 'N', true)."   No";
<?php }else{
  echo radiobutton_tag('npsolayueco[esnoemp]', 'S', false,array('onClick' => 'MostraCat()'))        ." Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
  echo radiobutton_tag('npsolayueco[esnoemp]', 'N', false,array('onClick' => 'MostraCat()'))."   No";
} ?>