<?php 
   $pdfjasper="N";
   $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';
   $configyml = sfYaml::load($dirrepconfig);
   if(is_array($configyml)){
     if(array_key_exists('viaticosv2',$configyml)) {
       if(array_key_exists('viasolbolaereo',$configyml['viaticosv2'])) {     
         if(array_key_exists('parameterjasper',$configyml['viaticosv2']["viasolbolaereo"])) 
           $pdfjasper= $configyml["viaticosv2"]["viasolbolaereo"]["parameterjasper"];
      }
    }
  }
 ?>
<script type="text/javascript">
 function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('viasolbolaer_numsol').value=valor;
   }
 }

 var numsolvi='<?php echo $viasolbolaer->getNumsolvi()?>';
 if (numsolvi=='')
 {
 	$('divnumsolvi').hide();
 }

if ($('id').value=='') {
	var mansolcor='<?php echo H::getConfApp2('mansolcor', 'viaticos', 'viasolbolaereo');?>';
	if (mansolcor=='S')
	{
	  $('viasolbolaer_numsol').value='########';
	  $('viasolbolaer_numsol').readOnly=true;
	}
  $('divfecreg').hide();
  $('divhorreg').hide();
}else {
  $('viasolbolaer_numsol').readOnly=true;
}

var idavuel='<?php echo $viasolbolaer->getIdavue()?>';
if (idavuel=='V') {
  $('divfecreg').show();
  $('divhorreg').show();
}else {
  $('divfecreg').hide();
 $('divhorreg').hide();
}


var oculinfo='<?php echo H::getConfApp2('ocuinfsol', 'viaticos', 'viasolbolaereo'); ?>';
if (oculinfo=='S')
  $('divcodniv').hide();


function Mostrar_orden_preimpresa()
{
  if(confirm("¿Desea imprimir la Solicitud Pre-Impresa?"))
  {

    var numsoldes=$('viasolbolaer_numsol').value;
    var numsolhas=$('viasolbolaer_numsol').value;
    var fecsoldes=$('viasolbolaer_fecsol').value;
    var fecsolhas=$('viasolbolaer_fecsol').value;

    var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
    var  mostrarjasper='<?php echo $pdfjasper;?>';

    if (mostrarjasper=='S') 
        pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=viaticosv2&r=viarsolpasaer.php&s=<?php echo $sf_user->getAttribute('schema');?>&numsoldes="+numsoldes+"&numsolhas="+numsolhas+"&fecsoldes="+fecsoldes+"&fecsolhas="+fecsolhas;
    else
     pagina=ruta+"/reportes/reportes/viaticosv2/r.php=?r=viarsolpasaer.php&numsoldes="+numsoldes+"&numsolhas="+numsolhas+"&fecsoldes="+fecsoldes+"&fecsolhas="+fecsolhas;
    
    window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
  }
} 

</script>