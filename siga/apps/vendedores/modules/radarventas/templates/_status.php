<fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
    <?  if ($radarventas->getStatus()==1){
        echo radiobutton_tag('radarventas[status]',2, true) .'&nbsp;&nbsp;'. "Facturado"."<br>";
        echo radiobutton_tag('radarventas[status]',3, false) .'&nbsp;&nbsp;'. "Cancelado"."<br>";
        echo radiobutton_tag('radarventas[status]',4, false) .'&nbsp;&nbsp;'. "Anulado por el Cliente"."<br>";
      }elseif ($radarventas->getStatus()==2){
        echo radiobutton_tag('radarventas[status]',2, false) .'&nbsp;&nbsp;'. "Facturado"."<br>";
        echo radiobutton_tag('radarventas[status]',3, true) .'&nbsp;&nbsp;'. "Cancelado"."<br>";
        echo radiobutton_tag('radarventas[status]',4, false) .'&nbsp;&nbsp;'. "Anulado por el Cliente"."<br>";
      }
      elseif ($radarventas->getStatus()==2){
        echo radiobutton_tag('radarventas[status]',2, false) .'&nbsp;&nbsp;'. "Facturado"."<br>";
        echo radiobutton_tag('radarventas[status]',3, false) .'&nbsp;&nbsp;'. "Cancelado"."<br>";
        echo radiobutton_tag('radarventas[status]',4, false) .'&nbsp;&nbsp;'. "Anulado por el Cliente"."<br>";
      }else{
        echo radiobutton_tag('radarventas[status]',1, true) .'&nbsp;&nbsp;'. "Pendiente"."<br>";        
      }?>
 </div> </fieldset>
