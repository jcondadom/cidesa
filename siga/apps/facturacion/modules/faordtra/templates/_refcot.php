<?php if($faordtra->getRefcot()=='S') $val = true; else $val=false; ?>
    <?php echo "Si ".radiobutton_tag('faordtra[refcot]', 'S',  $val, array('id'=>'faordtra_refcot_s' , 'onClick'=> "$('divrefpre').show();")); ?>&nbsp;
  <?php echo "No ".radiobutton_tag('faordtra[refcot]', 'N', !$val, array('id'=>'faordtra_refcot_n', 'onClick'=> "$('divrefpre').hide(); $('faordtra_refpre').value='';")) ?>