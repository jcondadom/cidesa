<?php $value = object_input_date_tag($hccarava, 'getFeccar', array (
  'control_name' => 'hccarava[feccar]',
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",)
  ,date('Y-m-d')
); echo $value ? $value : '&nbsp;' ?>

<script type="text/javascript">
function colocarDatosBen(){
   if ($('hccarava_misben').checked==true) {
	$('hccarava_cedfam').value=$('hccarava_cedemp').value;
	$('hccarava_nomfam').value=$('hccarava_nomemp').value;
	$('hccarava_parfam').value="TITULAR";
   }else {
   	 $('hccarava_cedfam').value="";
	 $('hccarava_nomfam').value="";
	 $('hccarava_parfam').value="";
   }
}
function Seleccionarfam(id)
{
  var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colced=col+1;
    var colnom=col+2;    
    var cedfam=name+"_"+fil+"_"+colced;
    var nomfam=name+"_"+fil+"_"+colnom;

    var q=0;
    var enc=false;
    var am=obtener_filas_grid('a',2);
    while (q<am && (!enc))
    {
        var act="ax_"+q+"_1";
        if (fil!=q)
        {
            if ($(act).checked==true)
            {
             enc=true;
            }
        }
        q++;
    }
    if (enc)
    {
        alert('Marque solo uno...');
        $(id).checked=false;
    }else {
      if ($(id).checked==true) {
        $('hccarava_cedfam').value=$(cedfam).value;
        $('hccarava_nomfam').value=$(nomfam).value;
        $('hccarava_cedfam').focus();
        $('hccarava_rifpro').focus();
       }else {
         $('hccarava_cedfam').value="";
         $('hccarava_nomfam').value="";
         $('hccarava_parfam').value="";
       }
    }
}
</script>