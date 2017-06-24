<?php $value = object_input_date_tag($hcregconhcm, 'getFeccon', array (
  'control_name' => 'hcregconhcm[feccon]',
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",)
  ,date('Y-m-d')
); echo $value ? $value : '&nbsp;' ?>
<script type="text/javascript">
function colocarDatosBen(){
   if ($('hcregconhcm_misben').checked==true) {
	$('hcregconhcm_cedfam').value=$('hcregconhcm_cedemp').value;
	$('hcregconhcm_nomfam').value=$('hcregconhcm_nomemp').value;
	$('hcregconhcm_parfam').value="TITULAR";
	$('hcregconhcm_cedfam').focus();
    $('hcregconhcm_rifpro').focus();
   }else {
   	 $('hcregconhcm_cedfam').value="";
	 $('hcregconhcm_nomfam').value="";
	 $('hcregconhcm_parfam').value="";
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
      	$('hcregconhcm_cedfam').value=$(cedfam).value;
      	$('hcregconhcm_nomfam').value=$(nomfam).value;
      	$('hcregconhcm_cedfam').focus();
      	$('hcregconhcm_rifpro').focus();
       }else {
       	 $('hcregconhcm_cedfam').value="";
    	 $('hcregconhcm_nomfam').value="";
    	 $('hcregconhcm_parfam').value="";
       }
   }
}
</script>
