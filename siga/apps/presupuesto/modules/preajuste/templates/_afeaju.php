<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo select_tag('cpajuste[afeaju]', options_for_select(array('R' => '-','S' => '+'),$cpajuste->getAfeaju()),array()) ?>

<script type="text/javascript" language="JavaScript">
 function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('cpajuste_refaju').value=valor;
   }
 }
 
 function replaceAll( text, busca, reemplaza ){
  while (text.toString().indexOf(busca) != -1)
      text = text.toString().replace(busca,reemplaza);
  return text;
}

  function anular()
  {
   var referencia=$('cpajuste_refaju').value;
    

    var refaju=$('cpajuste_refaju').value;
    var fecaju=$('cpajuste_fecaju').value;
    window.open(getUrlModulo()+'anular?refaju='+refaju+'&referencia='+referencia+'&fecaju='+fecaju,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
  }
</script>