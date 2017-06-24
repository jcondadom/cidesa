<?php
echo select_tag('viasolviatra[parpercon]', options_for_select(NptipparPeer::cargarParentesco(), $viasolviatra->getParpercon(), 'include_custom=Seleccione uno ...'));
?>
