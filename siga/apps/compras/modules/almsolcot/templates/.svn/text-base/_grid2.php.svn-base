<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<? echo grid_tag_v2($casolcot->getGrid2());?>

<script type="text/javascript">
 function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('casolcot_numsolcot').value=valor;
   }
 }
</script>