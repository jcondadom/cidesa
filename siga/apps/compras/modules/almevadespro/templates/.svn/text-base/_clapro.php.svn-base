 <?php echo select_tag('caevadespro[clapro]', options_for_select(array('P' => 'Productos', 'I' => ' Empresa Didáctica', 'S' => 'Productos y Servicios'),$caevadespro->getClapro(),'include_custom=Seleccione uno'),array( 
  'onChange' => remote_function(array(
  	   'update' => 'divgridt',
	   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
	   'complete' => 'AjaxJSON(request, json)',
	   'with' => "'ajax=2&codigo='+this.value"
      ))
  )) ?>

<script>
function monto_total_eva()
  {
    var acumt=parseInt($('caevadespro_tocuat').value);//toFloat('caevadespro_tocuat');
    var acuml=parseInt($('caevadespro_tocual').value);//toFloat('caevadespro_tocual');
       
    var sumatoria=acumt + acuml;

    $('caevadespro_totpun').value=sumatoria;//format(sumatoria.toFixed(2),'.',',','.');
  }

function validarPuntuacion(e,id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=aux[1];
   var col=parseInt(aux[2]);

  var num1=toFloat(id);

   if (num1>=1 && num1<=10)
   {     
     if (name=='ax'){
        var t=0;  
        var acumtot=0;
        var ab=obtener_filas_grid('a',1);
        while (t<ab)
        {
            var puntu="ax"+"_"+t+"_3";
            if ($(puntu)) {
              if ($(puntu).value!="")
              {
                var num=parseInt($(puntu).value);//toFloat(puntu);              
                acumtot+=num;                
              }      
            }
            t++;
        }
        $('caevadespro_tocuat').value=acumtot//format(acumtot.toFixed(2),'.',',','.');
     }else{
        var t=0;  
        var acumtot=0;
        var ab=obtener_filas_grid('b',1);
        while (t<ab)
        {
            var puntu="bx"+"_"+t+"_3";
            if ($(puntu)) {
              if ($(puntu).value!="")
              {
                var num=parseInt($(puntu).value);//toFloat(puntu);              
                acumtot+=num;                
              }      
            }
            t++;
        }
        $('caevadespro_tocual').value=acumtot;//format(acumtot.toFixed(2),'.',',','.');
    }
    monto_total_eva();  
   }
   else
   {
      alert_('La Puntuaci&oacute;n debe estar en un rango entre 1 y 10');
      $(id).value="1";
   }
  }



</script>