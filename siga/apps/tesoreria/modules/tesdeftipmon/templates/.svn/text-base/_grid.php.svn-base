<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?
	echo grid_tag_v2($tsdefmon->getObj());
?>

<script type="text/javascript" lang="JavaScript">

  var i=0;
  var am=obtener_filas_grid('a',1);
  while (i<am)
  {
      var fecha="ax_"+i+"_1";
      var valor="ax_"+i+"_2";
      
      var num1=toFloat(valor);
      
      if  ($(fecha).value!='' && num1!=0)
      {
        $(fecha).readOnly=true;  
        $(valor).readOnly=true;  
        $('trigger_'+fecha).hide();  
      }
      

    i++;
  }

</script>