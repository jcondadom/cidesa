<script type="text/javascript" lang="JavaScript"> 
if ($('manordtra_refest_N').checked==true){
	$('divcodact').hide();
	$('divgrid').hide();
	$('divgrid1').hide();
}
if ($('manordtra_demcie_N').checked==true)
 $('divcodcfc').hide();


function mostrar(id){
	if (id=='manordtra_refest_S'){
		$('divcodact').show();
		$('divgrid').show();
		$('divgrid1').show();
	}
	else{
		$('manordtra_codact').value='';
		$('divcodact').hide();
		$('divgrid').hide();
		$('divgrid1').hide();
	}  
}

function mostrar2(id){
	if (id=='manordtra_demcie_S'){
		$('divcodcfc').show();
	}
	else{
		$('manordtra_codcfc').value='';
		$('divcodcfc').hide();
	}  
}
function CargarTareas(codact)
 {
    toAjaxUpdater('divgrid',7,getUrlModuloAjax(),'valor','','&codigo='+codact+'');    
 }

function CargarRRHH(codact)
 {
    toAjaxUpdater('divgrid1',8,getUrlModuloAjax(),'valor','','&codigo='+codact+'');    
 } 

 function buscarRequisicion(id){
  if ($(id))
  {
   new Ajax.Updater('genreq', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=9&codigo='+id});
  }
 }

 function requisicion(formulario,id)
 {
 	var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colreq=col-1;
    var idfila=name+"_"+fil+"_"+colreq;

   window.open('/compras'+getEnv()+'.php/almreq/list/?formulario='+formulario+'&idfilareq='+idfila,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
 }
   
</script>