<?php
echo select_tag('hcregconhcm[geneop]', options_for_select(Array('N' => 'NO', 'S' => 'SI'), $hcregconhcm->getGeneop()));
?>
<script type="text/javascript">
function colocarDatosBen(){
   if ($('hcregconhcm_misben').checked==true) {
	$('hcregconhcm_cedfam').value=$('hcregconhcm_cedemp').value;
	$('hcregconhcm_nomfam').value=$('hcregconhcm_nomemp').value;
	$('hcregconhcm_parfam').value="TITULAR";
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