<? if ($fatippag->getTipcan()=='E')  {
  ?><?php echo radiobutton_tag('fatippag[tipcan]', 'E', true)."Efectivo".'&nbsp;&nbsp;&nbsp;&nbsp;';      
      echo radiobutton_tag('fatippag[tipcan]', 'O', false)."Carta Orden".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fatippag[tipcan]', 'D', false)."Donación".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fatippag[tipcan]', 'C', false)."Nota de Crédito".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fatippag[tipcan]', 'R', false)."Otro";?>
    <?
}elseif ($fatippag->getTipcan()=='O')  {
  ?><?php echo radiobutton_tag('fatippag[tipcan]', 'E', false)."Efectivo".'&nbsp;&nbsp;&nbsp;&nbsp;';      
      echo radiobutton_tag('fatippag[tipcan]', 'O', true)."Carta Orden".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fatippag[tipcan]', 'D', false)."Donación".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fatippag[tipcan]', 'C', false)."Nota de Crédito".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fatippag[tipcan]', 'R', false)."Otro";?>
    <?
}elseif ($fatippag->getTipcan()=='D')  {
  ?><?php echo radiobutton_tag('fatippag[tipcan]', 'E', false)."Efectivo".'&nbsp;&nbsp;&nbsp;&nbsp;';      
      echo radiobutton_tag('fatippag[tipcan]', 'O', false)."Carta Orden".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fatippag[tipcan]', 'D', true)."Donación".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fatippag[tipcan]', 'C', false)."Nota de Crédito".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fatippag[tipcan]', 'R', false)."Otro";?>
    <?
}elseif ($fatippag->getTipcan()=='C')  {
  echo radiobutton_tag('fatippag[tipcan]', 'E', false)."Efectivo".'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('fatippag[tipcan]', 'O', false)."Carta Orden".'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('fatippag[tipcan]', 'D', false)."Donación".'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('fatippag[tipcan]', 'C', true)."Nota de Crédito".'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('fatippag[tipcan]', 'R', false)."Otro";

}else{
  echo radiobutton_tag('fatippag[tipcan]', 'E', false)."Efectivo".'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('fatippag[tipcan]', 'O', false)."Carta Orden".'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('fatippag[tipcan]', 'D', false)."Donación".'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('fatippag[tipcan]', 'C', false)."Nota de Crédito".'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('fatippag[tipcan]', 'R', true)."Otro";

} ?>