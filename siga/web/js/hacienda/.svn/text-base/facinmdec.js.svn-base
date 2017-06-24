function verificarRegInmueble(){
     var nroinm    = $('fcdeclar_numref').value;
     new Ajax.Updater('divgrid', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codigo='+nroinm});
}
 function rellenar(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(10, '0',0);}
     else{valor=valor.pad(10, '#',0);}


   }}

 function Deuda()
 {
    var exipaguni;
    var fecfin    = $('fcdeclar_fecfin').value;
    var fecini    = $('fcdeclar_fecini').value;
    var fecdec    = $('fcdeclar_fecdec').value;
    var fuente    = $('fcdeclar_fuentef').value;
     if ($('fcdeclar_exipaguni_S').checked){
         exipaguni='S';
     }else{
         exipaguni='N';
     }

    var numref  = $('fcdeclar_numref').value;
    var codcarinm  = $('fcdeclar_codcarinm').value;
    var bster  = $('fcdeclar_bster').value;
    var bscon = $('fcdeclar_bscon').value;
    var coduso = $('fcdeclar_coduso').value;
    new Ajax.Updater('divgriddeuda', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&codigo='+numref+'&fecfin='+fecfin+'&fecini='+fecini+'&fecdec='+fecdec+'&exipaguni='+exipaguni+'&codcarinm='+codcarinm+'&bster='+bster+'&bscon='+bscon+'&fuente='+fuente+'&coduso='+coduso});

}