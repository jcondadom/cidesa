function datosavaluo()
{
  var nroinm    = $('fcreginm_nroinm').value;
  var anoava    = $('fcreginm_anoava').value;

 new Ajax.Updater('complemento', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&anoava='+anoava+'&nroinm='+nroinm});

 }

function STerreno(id,objeto)
{

		var colum6 = obtenerColumna(id,'','');
		var colum4 = obtenerColumna(id,'2','-');
		var total = obtenerColumnaSiguiente(id);
                 if(($(colum6).toFloat() > 0) && ($(colum4).toFloat() > 0)){
                     $(total).value = toFloat(colum4)*toFloat(colum6);
                     $(total).valueToFloatVE();
                 }


		ValidarMontoGridv2(objeto);
		TotalAvaluo();

 }



function SConstruccion(id,objeto)
{
		var colum8 = obtenerColumna(id,'','');
		var colum5 = obtenerColumna(id,'3','-');
		var total = obtenerColumnaSiguiente(id);

		if (($(colum8).toFloat() > 0) && ($(colum5).toFloat() > 0))
		{
				$(total).value =	$(colum5).toFloat() * $(colum8).toFloat();
				$(total).valueToFloatVE();
                                $('fcreginm_bscon').value = $(colum5).toFloat() * $(colum8).toFloat();
                                $('fcreginm_bscon').valueToFloatVE();
		}

		CalculoDeprec(id,total);
		ValidarMontoGridv2(objeto);
		TotalAvaluo();
 }

function CalculoDeprec(id,total)
{
	var codestinm = $F('fcreginm_codestinm');
	var colum12 = obtenerColumna(id,'3','+');
	var total = obtenerColumnaSiguiente(id);

	if (codestinm!=''){
	}else{
				$(colum12).value =	$F(total);
				$(colum12).valueToFloatVE();

	}
}


function TotalAvaluo()
{
	var bsft= $('fcreginm_bster').toFloat();
	var bsfc= $('fcreginm_bscon').toFloat();
        $('fcreginm_totalavaluo').value = bsft + bsfc
        $('fcreginm_totalavaluo').valueToFloatVE();

}


function Mostrar_Negacion()
{
	$('negacion2').show();
}

function activarCont()
{
	if (confirm('El Contribuyente no Existe desea incluirlo'))
         {
             if (confirm('Solo salvara algunos datos del Contribuyente, el resto debe ser llenado en el módulo ')){
              $('fcreginm_nomcon').readOnly= false;
              $('fcreginm_nomcon').focus();
              $('fcreginm_dirconcon').disabled=false;
              $('fcreginm_nacconcon_V').disabled=false;
              $('fcreginm_nacconcon_E').disabled=false;
              $('fcreginm_nacconcon_V').checked=true;
              $('fcreginm_tipconcon_N').disabled=false;
              $('fcreginm_tipconcon_J').disabled=false;
              $('fcreginm_tipconcon_N').checked=true;
          }
          }
}

function activarRep()
{
	if (confirm('El Representante no Existe desea incluirlo'))
         {
            if (confirm('Solo salvara algunos datos del Representante, el resto debe ser llenado en el módulo '))
         {
              $('fcreginm_nomconrep').readOnly= false;
              $('fcreginm_nomconrep').focus();
              $('fcreginm_dirconrep').disabled= false;
              $('fcreginm_nacconrep_V').disabled=false;
              $('fcreginm_nacconrep_E').disabled=false;
              $('fcreginm_nacconrep_V').checked=true;
              $('fcreginm_tipconrep_N').disabled=false;
              $('fcreginm_tipconrep_J').disabled=false;
              $('fcreginm_tipconrep_N').checked=true;
          }
          }
}
  function rellenar(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(10, '0',0);}
     else{valor=valor.pad(10, '#',0);}


   }}
function verificarTraspaso(){
     var nroinm    = $('fcreginm_nroinm').value;
     new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=11&codigo='+nroinm})
}
