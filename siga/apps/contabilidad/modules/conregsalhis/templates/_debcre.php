<?php

if ($contabbhis->getDebcre() == 'D') {
?><?php echo radiobutton_tag('contabbhis[debcre]', 'D', false) . "Débito" . '&nbsp;&nbsp;';
    echo radiobutton_tag('contabbhis[debcre]', 'C', true) . "   Crédito"; ?>
<?

} else {
echo radiobutton_tag('contabbhis[debcre]', 'D', true) . "Débito" . '&nbsp;&nbsp;';
echo radiobutton_tag('contabbhis[debcre]', 'C', false) . "   Crédito";
}
?>