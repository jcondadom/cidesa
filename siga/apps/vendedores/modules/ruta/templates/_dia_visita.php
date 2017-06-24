<fieldset id="sf_fieldset_none" class="">    
    <div class="form-row">
    <?  if ($ruta->getDiaVisita()==1){
        echo radiobutton_tag('ruta[dia_visita]',1, true) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_visita]',2, false) .'&nbsp;&nbsp;'. "Martes"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',3, false) .'&nbsp;&nbsp;'. "Miércoles"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',4, false) .'&nbsp;&nbsp;'. "Jueves"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',5, false) .'&nbsp;&nbsp;'. "Viernes"."<br>";

      }elseif ($ruta->getDiaVisita()==2){
        echo radiobutton_tag('ruta[dia_visita]',1, false) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_visita]',2, true) .'&nbsp;&nbsp;'. "Martes"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',3, false) .'&nbsp;&nbsp;'. "Miércoles"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',4, false) .'&nbsp;&nbsp;'. "Jueves"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',5, false) .'&nbsp;&nbsp;'. "Viernes"."<br>";
      }elseif ($ruta->getDiaVisita()==3){
        echo radiobutton_tag('ruta[dia_visita]',1, false) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_visita]',2, false) .'&nbsp;&nbsp;'. "Martes"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',3, true) .'&nbsp;&nbsp;'. "Miércoles"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',4, false) .'&nbsp;&nbsp;'. "Jueves"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',5, false) .'&nbsp;&nbsp;'. "Viernes"."<br>";
      }elseif ($ruta->getDiaVisita()==4){
        echo radiobutton_tag('ruta[dia_visita]',1, false) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_visita]',2, false) .'&nbsp;&nbsp;'. "Martes"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',3, false) .'&nbsp;&nbsp;'. "Miércoles"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',4, true) .'&nbsp;&nbsp;'. "Jueves"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',5, false) .'&nbsp;&nbsp;'. "Viernes"."<br>";
     }elseif ($ruta->getDiaVisita()==5){
        echo radiobutton_tag('ruta[dia_visita]',1, false) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_visita]',2, false) .'&nbsp;&nbsp;'. "Martes"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',3, false) .'&nbsp;&nbsp;'. "Miércoles"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',4, false) .'&nbsp;&nbsp;'. "Jueves"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',5, true) .'&nbsp;&nbsp;'. "Viernes"."<br>";
      }else{
        echo radiobutton_tag('ruta[dia_visita]',1, false) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_visita]',2, false) .'&nbsp;&nbsp;'. "Martes"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',3, false) .'&nbsp;&nbsp;'. "Miércoles"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',4, false) .'&nbsp;&nbsp;'. "Jueves"."<br>";
	echo radiobutton_tag('ruta[dia_visita]',5, false) .'&nbsp;&nbsp;'. "Viernes"."<br>";
      }?>
 </div> </fieldset>
