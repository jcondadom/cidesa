<?php
    if ($fadefprg->getStaprg()=='I')  {
  ?><?php echo radiobutton_tag('fadefprg[staprg]', 'A', false)        ."Activo".'&nbsp;&nbsp;';
      echo radiobutton_tag('fadefprg[staprg]', 'I', true)."   Inactivo";?>
    <?
}else{
  echo radiobutton_tag('fadefprg[staprg]', 'A', true)        ."Activo".'&nbsp;&nbsp;';
  echo radiobutton_tag('fadefprg[staprg]', 'I', false)."   Inactivo";
}
?>
