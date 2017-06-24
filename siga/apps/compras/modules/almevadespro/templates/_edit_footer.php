<script>
var nuevo='<?php echo $caevadespro->getId();?>';
if (nuevo!=''){
var t=0;  
var acumtot=0;
var ab=obtener_filas_grid('a',1);
while (t<ab)
{
    var puntu="ax"+"_"+t+"_3";
    if ($(puntu)) {
      if ($(puntu).value!="")
      {
        var num=parseInt($(puntu).value);//toFloat(puntu);              
        acumtot+=num;                
      }      
    }
    t++;
}
$('caevadespro_tocuat').value=acumtot;//format(acumtot.toFixed(2),'.',',','.');

var y=0;  
var acumy=0;
var ab=obtener_filas_grid('b',1);
while (y<ab)
{
    var puntu="bx"+"_"+y+"_3";
    if ($(puntu)) {
      if ($(puntu).value!="")
      {
        var num=parseInt($(puntu).value);//toFloat(puntu);              
        acumy+=num;                
      }      
    }
    y++;
}
$('caevadespro_tocual').value=acumy;//format(acumy.toFixed(2),'.',',','.');

monto_total_eva();
}
</script>