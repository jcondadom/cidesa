<?php 
$ocuinfsol=H::getConfApp2('ocuinfsol', 'viaticos', 'viasolviatra');
if ($viasolviatra->getTippas()=='P')  { ?>
  <?php if ($ocuinfsol!='S')echo radiobutton_tag('viasolviatra[tippas]', 'P', true)        ."   Primera Clase".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
      echo radiobutton_tag('viasolviatra[tippas]', 'T', false)."     Clase Turística";?>
 <?php }else{
 if ($ocuinfsol!='S') echo radiobutton_tag('viasolviatra[tippas]', 'P', false)        ." Primera Clase".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
  echo radiobutton_tag('viasolviatra[tippas]', 'T', true)."   Clase Turística";
} ?>