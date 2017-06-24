<div id="combocaja">
<?php
echo select_tag('faapecaj[codcaj]', options_for_select(FadefcajPeer::seleccionCaja($faapecaj->getCodalm()), $faapecaj->getCodcaj(),'include_custom=Seleccione Una...'), array());
?>
</div>