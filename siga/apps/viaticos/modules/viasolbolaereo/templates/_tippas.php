<?php 
$ocuinfsol=H::getConfApp2('ocuinfsol', 'viaticos', 'viasolbolaereo');
if ($viasolbolaer->getTippas()=='P')  { ?>
  <?php if ($ocuinfsol!='S')echo radiobutton_tag('viasolbolaer[tippas]', 'P', true)        ."   Primera Clase".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
      echo radiobutton_tag('viasolbolaer[tippas]', 'T', false)."     Clase Turística";?>
 <?php }else{
 if ($ocuinfsol!='S') echo radiobutton_tag('viasolbolaer[tippas]', 'P', false)        ." Primera Clase".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
  echo radiobutton_tag('viasolbolaer[tippas]', 'T', true)."   Clase Turística";
} ?>