<?php use_helper('Grid') ?>

<?php if($cpsoltrasla->getId()=='') : ?>

<div  style="width: 1100px; height: 350px">
  <div style="width: 500px; float: left;">
<?php echo grid_tag_v2($params['objdesde']) ?>
      <label> Total Origen </label>
<?php $value = object_input_tag($cpsoltrasla, array('gettotori',true), array (
  'size' => 10,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'cpsoltrasla[totori]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
  </div>
  <div style="width: 40px; float: left;">
    <br>
  </div>
  <div style="width: 370px; float: left;">
<?php echo grid_tag_v2($params['objhasta']) ?>
<label> Total Destino </label>
<?php $value2 = object_input_tag($cpsoltrasla, array('gettotdes',true), array (
  'size' => 10,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'cpsoltrasla[totdes]',
  'readonly' => true,
)); echo $value2 ? $value2 : '&nbsp;' ?>

  </div>
  <div style="width: 800px; height: 200px; text-align:center; padding-top: 15px; clear: both;">
    <?php //echo button_to_function('Agregar',"alert('Hola Mundo')",array('style' => 'width:150px'))
        echo submit_to_remote('Submit2', '      Distribuir', array(
         'update'   => 'divdetalle',
         'url'      => 'presoltrasla/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_save',)) ?>
  </div>
</div>

<?php endif; ?>
<?php
  $pdfnomrep="";
  $pdfjasper="N";

  $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';

  $configyml = sfYaml::load($dirrepconfig);


  if(is_array($configyml)){
    if(array_key_exists('presupuesto',$configyml)) {
        if(array_key_exists('presoltrasla',$configyml['presupuesto'])) {
          if(array_key_exists('nombrereporte',$configyml['presupuesto']["presoltrasla"])) 
            $pdfnomrep = $configyml["presupuesto"]["presoltrasla"]["nombrereporte"];
          if(array_key_exists('parameterjasper',$configyml['presupuesto']["presoltrasla"])) 
            $pdfjasper= $configyml["presupuesto"]["presoltrasla"]["parameterjasper"];
      }
    }
  }

?>

<script>
 var ids='<?php echo $cpsoltrasla->getId();?>';
 var guardo='<?php echo $sf_user->getAttribute('grabosol','','presoltrasla')?>';

  if (ids!="" && guardo=='S')
    {

      if(confirm("¿Desea imprimir la Solicitud de Traslado Pre-Impresa?"))
      {
        var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
        var  nomrepimp='<? print $pdfnomrep;?>';
        var  repimpjas='<? print $pdfjasper;?>'; 
        var fecdes=$('cpsoltrasla_fectra').value;
        var pertrades= $('cpsoltrasla_pertra').value;
        var combodes= $('cpsoltrasla_statra').value;
        var codtrades=$('cpsoltrasla_reftra').value;


        if (nomrepimp!=''){         
          if (repimpjas=='S') 
              pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r="+nomrepimp+".php&s=<?php echo $sf_user->getAttribute('schema');?>&codtrades="+codtrades+"&codtrahas="+codtrades+"&fecdes="+fecdes+"&fechas="+fecdes+"&pertrades="+pertrades+"&pertrahas="+pertrades+"&combodes="+combodes;
          else
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/presupuesto/r.php=?r="+nomrepimp+".php&codtrades="+codtrades+"&codtrahas="+codtrades+"&fecdes="+fecdes+"&fechas="+fecdes+"&pertrades="+pertrades+"&pertrahas="+pertrades+"&combodes="+combodes;
        }else {
          if (repimpjas=='S') 
              pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=presupuesto&r=pretra2.php&s=<?php echo $sf_user->getAttribute('schema');?>&codtrades="+codtrades+"&codtrahas="+codtrades+"&fecdes="+fecdes+"&fechas="+fecdes+"&pertrades="+pertrades+"&pertrahas="+pertrades+"&combodes="+combodes;
          else
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/presupuesto/r.php=?r=pretra2.php&codtrades="+codtrades+"&codtrahas="+codtrades+'&fecdes='+fecdes+'&fechas='+fecdes+'&pertrades='+pertrades+'&pertrahas='+pertrades+'&combodes='+combodes;
        }        

        window.open(pagina,$('cpsoltrasla_reftra').value,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
      }
    }
  function CalcularTotalDist()
  {
     var fil=0;
     var am=obtener_filas_grid2('a',1);
     var bm=obtener_filas_grid2('b',1);
     var monto='';var totalmd=0;
     var montob='';var totalb=0;
     while (fil<am)
     {
           var cod="ax"+"_"+fil+"_1";
           if ($(cod)){
           if ($(cod).value!=""){

              monto= "ax"+"_"+fil+"_2";
              totalmd=totalmd+toFloat(monto);
           }
         }else am=am+1;
           fil=fil+1;

     }
     fil=0;cod='';
      while (fil<bm)
     {
            cod="bx"+"_"+fil+"_1";
            if ($(cod)){
           if ($(cod).value!=""){

              montob= "bx"+"_"+fil+"_2";
              totalb=totalb+toFloat(montob);
           }
         }else bm=bm+1;
           fil=fil+1;

     }
      $('cpsoltrasla_totori').value= number_format(totalmd, 2, ',', '.');
      $('cpsoltrasla_totdes').value= number_format(totalb, 2, ',', '.');
      var total = totalmd - totalb;
      $('cpsoltrasla_diftra').value = number_format(total, 2, ',', '.');

    /*if (total == 0){
        $('cpsoltrasla_tottra').value =  number_format(totalmd, 2, ',', '.');
    }else{
        $('cpsoltrasla_tottra').value = number_format(0, 2, ',', '.');
    }*/

  }
function validarNoRepetido(id)
{
    var codigo = id.split('_');
    
    nombre = codigo[0];
    fila = codigo[1];
    columna = codigo[2];
   
    if (nombre == 'ax')
        tabla = 'Origen';
    else
        tabla = 'Destino';

    var contFila = 0;

    while (contFila < 500)
    {
        if ($(nombre+'_'+contFila+'_'+columna))
        {

            if ((contFila != fila) && ( $(id).value == $(nombre+'_'+contFila+'_'+columna).value ) && ($(nombre+'_'+contFila+'_'+columna).value != ''))
            {
                alert('El Titulo Presupuestario '+tabla+' ya esta incluido.');
                $(nombre+'_'+fila+'_'+columna).value = '';
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

function validarOrigenDestino(id)
{
    var codigo = id.split('_');

    nombre = codigo[0];
    fila = codigo[1];
    columna = codigo[2];

    if (nombre == 'ax')
    {
        tablaOp = 'bx';
        msj = 'El Titulo Presupuestario no puede ser Origen.';
    }else
    {
        tablaOp = 'ax';
        msj = 'El Titulo Presupuestario no puede ser Destino.';
    }

    var contFila = 0;
    
    while (contFila < 500)
    {
        if ($(tablaOp+'_'+contFila+'_'+columna))
        {
            if (($(id).value == $(tablaOp+'_'+contFila+'_'+columna).value) && ($(tablaOp+'_'+contFila+'_'+columna).value != ''))
            {
                alert(msj);
                $(nombre+'_'+fila+'_'+columna).value = '';
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

function borrar(msj)
{
    tablaO = 'ax';
    tablaD = 'bx';
    
    if (msj == 1)
    {
        /*
        var contFila = 0;

        while (contFila < 500)
        {
            if ($(tablaO+'_'+contFila+'_1'))
            {
                $(tablaO+'_'+contFila+'_1').value = '';
                $(tablaO+'_'+contFila+'_2').value = '';
            }

            if ($(tablaD+'_'+contFila+'_1'))
            {
                $(tablaD+'_'+contFila+'_1').value = '';
                $(tablaD+'_'+contFila+'_2').value = '';
            }

            contFila++;
        }
        */
        alert("La Distribución se realizo Exitosamente.");
    }else
    {
        alert("Aún existen diferencias entre los totales.");
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

function BuscarCodpre(valor,fila)
{
   var colart=obtener_filas_grid('c',1);
   var fil=0;
   var enc=false;
   while (fil<colart)
   {
     var codpre="cx_"+fil+"_2";
     if ($(codpre).value==valor) {
      enc=true;
      break;
    }
     fil++;
   }
   if (enc)
   {
     var totpre="dx_"+fila+"_2";
     var totpre1="dx_"+fil+"_2";
     $(totpre).value=$(totpre1).value
   }else {
    var codipre="dx_"+fila+"_1";
    alert('El código presupuestario no se encuentra en las Imputaciones Presupuestarias');
    $(codipre).value="";
   }
}

function limpiarGridEventos()
{
  var colart=obtener_filas_grid('d',1);
   var fil=0;
   while (fil<colart)
   {
     var codpre="dx_"+fil+"_1";
     var monimp="dx_"+fil+"_2";
     var codeve="dx_"+fil+"_3";
     var deseve="dx_"+fil+"_4";
     var moneve="dx_"+fil+"_5";     
     if ($(codpre)) {
      $(codpre).value="";
      $(monimp).value="0,00";
      $(codeve).value="";
      $(deseve).value="";
      $(moneve).value="0,00";
    }
     fil++;
   }
}

function cargardatoseventos()
{
  var colart=obtener_filas_grid('c',1);
  limpiarGridEventos();
   var fil=0;
   while (fil<colart)
   {
     var codpre="cx_"+fil+"_2";
     var monimp="cx_"+fil+"_3";
     if ($(codpre).value!="") {
       var fr=(obtener_filas_grid('d',1)-1);   
       var filact=fr;
       var fildoc='dx_'+filact+'_1';
       var filmon='dx_'+filact+'_2';
       if ($(fildoc)) {
          if ($(fildoc).value!="")
          {
           NuevaFilaGrid('d');
           var fildoc='dx_'+(filact+1)+'_1';
           var filmon='dx_'+(filact+1)+'_2';
          }
        }else {
          filact=-1;
          NuevaFilaGrid('d');
          var fildoc='dx_'+(filact+1)+'_1';
          var filmon='dx_'+(filact+1)+'_2';
        }
        $(fildoc).value=$(codpre).value;
        $(filmon).value=$(monimp).value;
    }
     fil++;
   }
}


</script>