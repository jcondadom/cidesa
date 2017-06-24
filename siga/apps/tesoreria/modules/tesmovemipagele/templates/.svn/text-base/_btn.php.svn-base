<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if ($tspagele->getId()){ ?>
<ul class="sf_admin_actions" >
    <?php if ($tspagele->getEstpag()!='A' && $tspagele->getEstpag()!='T') { ?>
<li class="float-center">
<?php echo submit_to_remote('Submit2', 'Aprobación OP', array(
         'url'      => 'tesmovemipagele/ajax?ajax=7',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_save')) ?>
</li>
<?php } ?>
<?php 
if ($tspagele->getEstpag()=='A' || $tspagele->getEstpag()=='T'){ ?>
<li class="float-center">
<?php echo submit_to_remote('Submit2', 'Generar TXT', array(
         'url'      => 'tesmovemipagele/ajax?ajax=8',
         'script'   => true,
         'update'   => 'txtgen',
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_list')) ?>
</li>
<?php } ?>
</ul>
<?php } ?>
<div id="txtgen">
    
</div>

<script type="text/javascript" lang="JavaScript"> 
var nuevo='<?php echo $tspagele->getId();?>';  
if (nuevo=='')
  $('divfecpagado').hide();
else {
    var estapaga='<?php echo $tspagele->getEstpag();?>';
    if (estapaga!='A' && estapaga!='T')
        $('divfecpagado').show();
    else
        $('divfecpagado').hide();
}
 function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('tspagele_refpag').value=valor;
   }
 }
 
 function aceptar()
 {
    $('divFiltros de Órdenes de Pago').hide();    
    $('tspagele_monpag').value='0,00';
    toAjaxUpdater('divgrid',5,getUrlModuloAjax(),'valor','','&tipdoc='+$('tspagele_tipdoc').value+'&fecdes='+$('tspagele_fecdes').value+'&fechas='+$('tspagele_fechas').value+'&tipdes='+$('tspagele_tipca1').value+'&tiphas='+$('tspagele_tipca2').value+'&bendes='+$('tspagele_cedri1').value+'&benhas='+$('tspagele_cedri2').value+'&concdes='+$('tspagele_codconcepto1').value+'&codmon='+$('tspagele_codmon').value+'&coddirec='+$('tspagele_coddirec').value+'&conchas='+$('tspagele_codconcepto2').value+'');    
 }
 
  function anular()
  {
   var referencia=$('tspagele_refpag').value;

    var refpag=$('tspagele_refpag').value;
    var fecemi=$('tspagele_fecpag').value;
    window.open('/tesoreria_dev.php/tesmovemipagele/anular?refpag='+refpag+'&referencia='+referencia+'&fecemi='+fecemi,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
  }

  function verificardatos(id){
    if ($('tspagele_valdatben').value=='S'){
        var aux = id.split("_");
        var name=aux[0];
        var fil=parseInt(aux[1]);
        var col=parseInt(aux[2]);

         var colben=col-2;
        var bene=name+"_"+fil+"_"+colben;

      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&cedrif='+$(bene).value+'&id='+id})
    }else totalizar(id);
  }
  
function totalizar(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

     var colmon=col-1;
     var calculo=0;

    var monto=name+"_"+fil+"_"+colmon;
    var num1=toFloat(monto);
    var total=toFloat('tspagele_monpag');

    if ($(id).checked==true)
    {      
      calculo=total+num1;
    }else {
      calculo=total-num1;  
    }    
    $('tspagele_monpag').value=format(calculo.toFixed(2),'.',',','.');
    
}

function valpago(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

     var colmonporpagar=col+4;

    var monto=name+"_"+fil+"_"+colmonporpagar;
    var num1=toFloat(monto);
    var num2=toFloat(id);
    if (num2>num1){
        alert('El Monto a Pagar sobrepasa al monto pendiente por pagar');
        $(id).value=format(num1.toFixed(2),'.',',','.');
    }
}
</script>
