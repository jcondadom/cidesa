<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript" lang="JavaScript">
function calcularAnticipo(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

   var coltot=col-1;
   var colant=col+1;

   var montot=name+"_"+fil+"_"+coltot;   
   var montant=name+"_"+fil+"_"+colant;

   var num1=toFloat(id);
   var num2=toFloat(montot);

 if ($(id).value!="")
 {
   if (!validarnumero(id))
   {
    alert_('El Dato debe ser n&uacute;merico');
    $(id).value="0,00";
   }
   else if (num1<0)
   {
    alert('El valor debe ser mayor que cero');
    $(id).value="0,00";
   }
   else
   {
      var calculo=num2*num1/100;
      $(montant).value=format(calculo.toFixed(2),'.',',','.');
      montoTotal();
   }     
  }
  else
  {
    $(id).value="0,00";
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