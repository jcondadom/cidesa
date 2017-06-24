<?php 
   $pdfjasper="N";
   $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';
   $configyml = sfYaml::load($dirrepconfig);
   if(is_array($configyml)){
     if(array_key_exists('viaticosv2',$configyml)) {
       if(array_key_exists('viasoltransterre',$configyml['viaticosv2'])) {     
         if(array_key_exists('parameterjasper',$configyml['viaticosv2']["viasoltransterre"])) 
           $pdfjasper= $configyml["viaticosv2"]["viasoltransterre"]["parameterjasper"];
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

     $('viasoltraterre_numsol').value=valor;
   }
 }

  var numsolvi='<?php echo $viasoltraterre->getNumsolvi()?>';
 if (numsolvi=='')
 {
 	$('divnumsolvi').hide();
 }

 if ($('id').value=='') {
	var mansolcor='<?php echo H::getConfApp2('mansolcor', 'viaticos', 'viasoltransterre');?>';
	if (mansolcor=='S')
	{
	  $('viasoltraterre_numsol').value='########';
	  $('viasoltraterre_numsol').readOnly=true;
	}
}else $('viasoltraterre_numsol').readOnly=true;

var oculinfo='<?php echo H::getConfApp2('ocuinfsol', 'viaticos', 'viasoltransterre'); ?>';
if (oculinfo=='S')
  $('divcodniv').hide();


function Mostrar_orden_preimpresa()
{
  if(confirm("¿Desea imprimir la Solicitud Pre-Impresa?"))
  {

    var numsoldes=$('viasoltraterre_numsol').value;
    var numsolhas=$('viasoltraterre_numsol').value;
    var fecsoldes=$('viasoltraterre_fecsol').value;
    var fecsolhas=$('viasoltraterre_fecsol').value;

    var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
    var  mostrarjasper='<?php echo $pdfjasper;?>';

    if (mostrarjasper=='S') 
        pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=viaticosv2&r=viarsoltrater.php&s=<?php echo $sf_user->getAttribute('schema');?>&numsoldes="+numsoldes+"&numsolhas="+numsolhas+"&fecsoldes="+fecsoldes+"&fecsolhas="+fecsolhas;
    else
     pagina=ruta+"/reportes/reportes/viaticosv2/r.php=?r=viarsoltrater.php&numsoldes="+numsoldes+"&numsolhas="+numsolhas+"&fecsoldes="+fecsoldes+"&fecsolhas="+fecsolhas;
    
    window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
  }
} 
</script>