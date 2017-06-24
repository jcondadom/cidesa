<fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
    <?  if ($ruta->getStatus()==1){
        echo radiobutton_tag('ruta[status]',1, true) .'&nbsp;&nbsp;'. "Activo"."<br>";
        echo radiobutton_tag('ruta[status]',2, false) .'&nbsp;&nbsp;'. "Inactivo"."<br>";
      }elseif ($ruta->getStatus()==2){
        echo radiobutton_tag('ruta[status]',1, false) .'&nbsp;&nbsp;'. "Activo"."<br>";
        echo radiobutton_tag('ruta[status]',2, true) .'&nbsp;&nbsp;'. "Inactivo"."<br>";
      }else{
        echo radiobutton_tag('ruta[status]',1, true) .'&nbsp;&nbsp;'. "Activo"."<br>";
        echo radiobutton_tag('ruta[status]',2, false) .'&nbsp;&nbsp;'. "Inactivo"."<br>";
      }?>
 </div> </fieldset>
