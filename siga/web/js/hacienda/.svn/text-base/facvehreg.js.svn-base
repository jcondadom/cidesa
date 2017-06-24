

function Mostrar_Negacion()
{
	$('negacion2').show();
}

function activarCont()
{
	if (confirm('El Contribuyente no Existe desea incluirlo'))
         {
             if (confirm('Solo salvara algunos datos del Contribuyente, el resto debe ser llenado en el módulo ')){
              $('fcregveh_nomcon').readOnly= false;
              $('fcregveh_nomcon').focus();
              $('fcregveh_dircon').readOnly=false;
              $('fcregveh_nacconcon_V').readOnly=false;
              $('fcregveh_nacconcon_E').readOnly=false;
              $('fcregveh_nacconcon_V').checked=true;
              $('fcregveh_tipconcon_N').readOnly=false;
              $('fcregveh_tipconcon_J').readOnly=false;
              $('fcregveh_tipconcon_N').checked=true;
          }
          }
}

function activarRep()
{
	if (confirm('El Representante no Existe desea incluirlo'))
         {
            if (confirm('Solo salvara algunos datos del Representante, el resto debe ser llenado en el módulo '))
         {
              $('fcregveh_nomconrep').readOnly= false;
              $('fcregveh_nomconrep').focus();
              $('fcregveh_dirconrep').disabled= false;
              $('fcregveh_nacconrep_V').readOnly=false;
              $('fcregveh_nacconrep_E').readOnly=false;
              $('fcregveh_nacconrep_V').checked=true;
              $('fcregveh_tipconrep_N').readOnly=false;
              $('fcregveh_tipconrep_J').readOnly=false;
              $('fcregveh_tipconrep_N').checked=true;
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
     $('fcregveh_traspaso').value='S';
     Mostrar_Negacion();

}
function calcularEdad(){
 var annio = $('fcregveh_anoveh').value;
 var todate=new Date();
 var annioact = todate.getFullYear();
 var edad =  parseInt(annioact)- parseInt(annio);
  $('fcregveh_edad').value=edad;


}