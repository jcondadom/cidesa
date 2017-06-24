<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php echo grid_tag_v2($cpsoladidis->getMovimiento()); ?>
<?php
  $pdfjasper="N";

  $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';

  $configyml = sfYaml::load($dirrepconfig);

  $nomrep=H::getX_vacio('CODEMP','Cpdefniv','Repsoladidis1','001');


  if(is_array($configyml)){
    if(array_key_exists('presupuesto',$configyml)) {
        if(array_key_exists('presoladidis',$configyml['presupuesto'])) {          
          if(array_key_exists('parameterjasper',$configyml['presupuesto']["presoladidis"])) 
            $pdfjasper= $configyml["presupuesto"]["presoladidis"]["parameterjasper"];
      }
    }
  }

?>
<script>

 var ids='<?php echo $cpsoladidis->getId();?>';
 var guardo='<?php echo $sf_user->getAttribute('grabosol','','presoladidis')?>';

  if (ids!="" && guardo=='S')
    {

      if(confirm("¿Desea imprimir la Orden Pre-Impresa?"))
      {
        var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
        var  repimpjas='<? print $pdfjasper;?>'; 
        var  nomrep='<? print $nomrep;?>'; 

        if (nomrep!=''){
          if (repimpjas=='S') 
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r="+nomrep+".php&s=<?php echo $sf_user->getAttribute('schema');?>&refdes="+$('cpsoladidis_refadi').value+"&refhas="+$('cpsoladidis_refadi').value;
          else
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/presupuesto/r.php=?r="+nomrep+".php&refdes="+$('cpsoladidis_refadi').value+"&refhas="+$('cpsoladidis_refadi').value;

        }else {
          if (repimpjas=='S') 
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r=preadidispre.php&s=<?php echo $sf_user->getAttribute('schema');?>&refdes="+$('cpsoladidis_refadi').value+"&refhas="+$('cpsoladidis_refadi').value;
          else
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/presupuesto/r.php=?r=preadidispre.php&refdes="+$('cpsoladidis_refadi').value+"&refhas="+$('cpsoladidis_refadi').value;
        }
        window.open(pagina,$('cpsoladidis_refadi').value,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
        }
    }
function calculatotal()
{
    var fil=0;
     var am=obtener_filas_grid('a',1);
     var totalmd=0;
     while (fil<am)
     {
          var numero="ax"+"_"+fil+"_1";
           var monto="ax"+"_"+fil+"_2";
          if ($(numero).value!=""){
              totalmd=totalmd+toFloat(monto);
          }
          fil++;
     }
    $('cpsoladidis_totadi').value = number_format(totalmd, 2, ',', '.');
}

function validarNoRepetido(id)
{
    var codigo = id.split('_');

    nombre = codigo[0];
    fila = codigo[1];
    columna = codigo[2];


    var contFila = 0;

    while (contFila < 500)
    {
        if ($(nombre+'_'+contFila+'_'+columna))
        {

            if ((contFila != fila) && ( $(id).value == $(nombre+'_'+contFila+'_'+columna).value ) && ($(nombre+'_'+contFila+'_'+columna).value != ''))
            {
                alert('El Titulo Presupuestario ya esta incluido.');
                $(nombre+'_'+fila+'_'+columna).value = '';
                $(nombre+'_'+fila+'_2').value = '';
                $(nombre+'_'+fila+'_3').value = '';
                break;
            }else
            {
                contFila++;
            }
        }else
        {
            contFila++;
        }
    }
}



function montoVerificado(msj, id, monto)
{
    if (msj != '')
    {
        $(id).value = number_format(monto, 2, ',', '.');
        alert(msj);
    }else
    {
        $(id).value = number_format(monto, 2, ',', '.');
    }

}

function rellenar(id)
{
    if ($(id).value == ''){
        $(id).value = $(id).value.pad(8,'#',0);
    }else if ($(id).value.length != 8)
    {
        $(id).value = $(id).value.pad(8,'0',0);
    }
}
</script>