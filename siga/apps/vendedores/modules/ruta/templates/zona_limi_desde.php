<fieldset id="sf_fieldset_none" class="">
    <legend><strong><?php echo  __('Dia Visita :') ?></strong></legend>
    <div class="form-row">
    <?  if ($ruta->getDiaVisita()==1){

        echo radiobutton_tag('ruta[dia_visita]','1', true) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_visita]','2', false) .'&nbsp;&nbsp;'. "Martes"."<br>";

      }elseif ($ruta->getDiaVisita()==2){
        echo radiobutton_tag('ruta[dia_visita]','1', false) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_visita]','2', true) .'&nbsp;&nbsp;'. "Martes"."<br>";

      }else{
        echo radiobutton_tag('ruta[dia_visita]','1', false) .'&nbsp;&nbsp;'. "Lunes"."<br>";
        echo radiobutton_tag('ruta[dia_visita]','2', false) .'&nbsp;&nbsp;'. "Martes"."<br>";
      }?>
 </div> </fieldset>
