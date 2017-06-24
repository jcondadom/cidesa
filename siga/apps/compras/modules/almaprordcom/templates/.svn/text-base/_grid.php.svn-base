<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid', 'Validation') ?>

<?php echo grid_tag_v2($caordcom->getObj()); ?>

<div id="gendet"></div>

<script type="text/javascript">
function validar(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

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
  }
}

function verificar(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    if (col==1)
    {
     var colcom=col+1;
    }else var colcom=col-1;

    var compara=name+"_"+fil+"_"+colcom;

    if ($(compara).checked==true)
    {
      alert('Debe marcar solo una opcion');
      $(id).checked=false;
    }
}

function ajaxmostrardetalle(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colord=col-5;
    var ordcom=name+"_"+fil+"_"+colord;

    var codigo=$(ordcom).value;

  //if(confirm("¿Desea visualizar el detalle de la Orden De Compra?"))
  //{


      if ($(ordcom).value!="")
      {
       new Ajax.Updater('gendet', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&codigo='+codigo});
      }
    
  //}
}

 function detalle(formulario)
 {
   window.open('/compras'+getEnv()+'.php/almdetoc/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
 }
</script>