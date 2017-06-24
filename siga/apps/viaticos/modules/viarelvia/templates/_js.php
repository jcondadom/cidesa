<script language="Javascript">    
var nuevo='<?php echo $viarelvia->getId()?>';
if (nuevo=='')
{
  var valor='<?php echo H::getX_vacio('CODMON','Tsdesmon','Valmon',H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'));?>';
  if (valor!="")
  {
      calculo=toFloat2(valor);
      var num2=toFloat('viarelvia_valmon');
      if (num2==0)
         $('viarelvia_valmon').value=format(calculo.toFixed(6),'.',',','.');
  }
}
    function rellenarcorr(id)
    {
        if($(id).value=='')
            $(id).value=$(id).value.pad(10,'#',0)
        else
            $(id).value=$(id).value.pad(10,'0',0)
    }
    
    function bloquearcajacorr(id)
    {
        if($(id).value!='')
            $(id).readOnly=true;

    }
    var totfil = obtener_filas_grid('a', '1');
    for(i=0;i<totfil;i++)
    {
        if($('ax_'+i+'_1').value=='')
        {
           $('ax_'+i+'_4').value='';
        }
    }
function calculardif(id){
  var num1=toFloat('viarelvia_monbol');
  var num2=toFloat('viarelvia_totfac');

  var resta=num1-num2;

  $('viarelvia_mondif').value=resta;

  if (resta>0)
    $('viarelvia_intemb').value="Reintegro";
  else
    $('viarelvia_intemb').value="Reembolsable";

}

 function totalizar()
 {
     var mon_total=0;
     var am=obtener_filas_grid('a',1);
     if (am>0) {
       var l=0;
       while (l<am)
       {
        var colnet="ax_"+l+"_5";
        var colrec="ax_"+l+"_6";
        if ($(colnet))
        {
            var num1=toFloat(colnet);
            var num2=toFloat(colrec);
            mon_total= mon_total + (num1+num2);         
          
        }
        l++;
       }
       $('viarelvia_totfac').value=format(mon_total.toFixed(2),'.',',','.');
   }
   }
</script>
