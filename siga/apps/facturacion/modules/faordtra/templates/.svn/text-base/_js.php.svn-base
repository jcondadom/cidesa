<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript" lang="JavaScript">
 if ($('faordtra_refcot_n').checked==true)
    $('divrefpre').hide();

   if ($('id').value=='')
  ColocarNumeracionItem();

  function ColocarNumeracionItem()
  {
    var i=0;
    var regart=obtener_filas_grid('a',1);
    while (i<regart)
    {
     var id1="ax"+"_"+i+"_5";
     if ($(id1))
     {
       $(id1).value=i+1;
     }
     i++;
    }   
  }

  function montoTotal()
  {
    var regart=obtener_filas_grid('a',1);
    var fil=0;
    var totmonto=0;
    var totporcen=0;
    
    while (fil<regart)
    {
      var porcen="ax_"+fil+"_5";
      var monant="ax_"+fil+"_6";

       var nporcen= toFloat(porcen);
       var nmonant= toFloat(monant);

        totporcen= totporcen+ nporcen;
        totmonto=totmonto + nmonant;     
     fil++;
    }
    $('faantcli_totant').value=format(totmonto.toFixed(2),'.',',','.');
    $('faantcli_totxan').value= format(totporcen.toFixed(2),'.',',','.');
  }

function rellenarcorr(id)
    {
        if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0)
    }
</script>