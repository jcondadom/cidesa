<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php if ($caordcom->getTipo()=='A')
{
  $v1=true; $v2=false; $v3=false; $v4=false; $v5=false;
}
elseif ($caordcom->getTipo()=='L')
{
  $v1=false; $v2=true; $v3=false; $v4=false; $v5=false;
}
elseif ($caordcom->getTipo()=='C')
{
  $v1=false; $v2=false; $v3=true; $v4=false; $v5=false;
}
elseif ($caordcom->getTipo()=='E')
{
  $v1=false; $v2=false; $v3=false; $v4=true; $v5=false;
}
elseif ($caordcom->getTipo()=='T')
{
  $v1=false; $v2=false; $v3=false; $v4=false; $v5=true;
}
elseif ($caordcom->getTipo()=='P')
{
  $v1=false; $v2=true; $v3=false; $v4=false; $v5=false;
}
else
{
  $v1=false; $v2=false; $v3=true; $v4=false; $v5=false;
}?>
<?php echo __(" Adjudicación Directa ").radiobutton_tag('caordcom[tipo]', 'A', $v1) ?>&nbsp;
<?php echo __($caordcom->getEtiqtipord()).radiobutton_tag('caordcom[tipo]', 'L', $v2) ?>&nbsp;
<?php echo __(" Compra ").radiobutton_tag('caordcom[tipo]', 'C', $v3) ?>&nbsp;
<?php echo __(" Compra Eventual ").radiobutton_tag('caordcom[tipo]', 'E', $v4) ?>
<?php echo __(" Contratación ").radiobutton_tag('caordcom[tipo]', 'T', $v5) ?>
<?php echo __(" Consulta de Precio ").radiobutton_tag('caordcom[tipo]', 'P', $v2) ?>