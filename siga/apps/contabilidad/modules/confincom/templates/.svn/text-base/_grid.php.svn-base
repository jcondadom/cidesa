<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'tabs', 'Javascript', 'PopUp', 'Grid') ?>
<?php echo grid_tag_v2($params['grid']);?>
<script language="Javascript">
  var ids='<?php echo $contabc->getId();?>';
  if (ids!="")
  {
    if($('status').value=='A')
    {    	
    	disableAllObjetos_(a=new Array(''),true);		    	
    }
  }else {

    var valor='<?php echo H::getX_vacio('CODMON','Tsdesmon','Valmon',H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'));?>';
    if (valor!="")
    {
        calculo=toFloat2(valor);
       var num2=toFloat('contabc_valmon');
       if (num2==0)
         $('contabc_valmon').value=format(calculo.toFixed(6),'.',',','.');
    }      
  }

   var mosmon='<?php echo H::getConfApp2('mosmon', 'contabilidad', 'confincom');?>';
  if (mosmon!='S'){
    $('divcodmon').hide();
    $('divvalmon').hide();
  }
  
 function validarrepetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var descripcion=name+"_"+fila+"_"+coldes;

   if (centrocosto_repetido(id))
   {
     alert('El Centro de Costo ya esta asociado a esa Cuenta Contable');
     $(id).value="";
     $(descripcion).value="";
   }
 }

 function centrocosto_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var colcta=col-6;

   var cuenta=name+"_"+fila+"_"+colcta;
   var cuenta_centrocosto=$(cuenta).value+$(id).value;

   var centrocostorepetido=false;
   var am=obtener_filas_grid('a',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";
    var centrocos="ax"+"_"+i+"_7";

    var cuenta_centrocosto2=$(codigo).value+$(centrocos).value;

    if (i!=fila)
    {
      if (cuenta_centrocosto==cuenta_centrocosto2)
      {
        centrocostorepetido=true;
        break;
      }
    }
   i++;
   }
   return centrocostorepetido;
 }  
    
</script>

