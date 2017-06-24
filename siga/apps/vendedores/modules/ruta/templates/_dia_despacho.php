<fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
    <?  if ($ruta->getDiaDespacho()==1){
        echo radiobutton_tag('ruta[dia_despacho]',1, true) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_despacho]',2, false) .'&nbsp;&nbsp;'. "Martes"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',3, false) .'&nbsp;&nbsp;'. "Miércoles"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',4, false) .'&nbsp;&nbsp;'. "Jueves"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',5, false) .'&nbsp;&nbsp;'. "Viernes"."<br>";

      }elseif ($ruta->getDiaDespacho()==2){
        echo radiobutton_tag('ruta[dia_despacho]',1, false) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_despacho]',2, true) .'&nbsp;&nbsp;'. "Martes"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',3, false) .'&nbsp;&nbsp;'. "Miércoles"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',4, false) .'&nbsp;&nbsp;'. "Jueves"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',5, false) .'&nbsp;&nbsp;'. "Viernes"."<br>";
      }elseif ($ruta->getDiaDespacho()==3){
        echo radiobutton_tag('ruta[dia_despacho]',1, false) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_despacho]',2, false) .'&nbsp;&nbsp;'. "Martes"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',3, true) .'&nbsp;&nbsp;'. "Miércoles"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',4, false) .'&nbsp;&nbsp;'. "Jueves"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',5, false) .'&nbsp;&nbsp;'. "Viernes"."<br>";
      }elseif ($ruta->getDiaDespacho()==4){
        echo radiobutton_tag('ruta[dia_despacho]',1, false) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_despacho]',2, false) .'&nbsp;&nbsp;'. "Martes"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',3, false) .'&nbsp;&nbsp;'. "Miércoles"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',4, true) .'&nbsp;&nbsp;'. "Jueves"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',5, false) .'&nbsp;&nbsp;'. "Viernes"."<br>";
     }elseif ($ruta->getDiaDespacho()==5){
        echo radiobutton_tag('ruta[dia_despacho]',1, false) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_despacho]',2, false) .'&nbsp;&nbsp;'. "Martes"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',3, false) .'&nbsp;&nbsp;'. "Miércoles"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',4, false) .'&nbsp;&nbsp;'. "Jueves"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',5, true) .'&nbsp;&nbsp;'. "Viernes"."<br>";
      }else{
        echo radiobutton_tag('ruta[dia_despacho]',1, false) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_despacho]',2, false) .'&nbsp;&nbsp;'. "Martes"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',3, false) .'&nbsp;&nbsp;'. "Miércoles"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',4, false) .'&nbsp;&nbsp;'. "Jueves"."<br>";
	echo radiobutton_tag('ruta[dia_despacho]',5, false) .'&nbsp;&nbsp;'. "Viernes"."<br>";
      }?>
 </div> </fieldset>
