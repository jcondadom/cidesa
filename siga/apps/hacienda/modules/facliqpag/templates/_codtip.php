<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<?php
	echo  select_tag('fcliqpag[codtip]',
	options_for_select(Hacienda::Combo_tipo_movimiento($fcliqpag),$fcliqpag->getCodtip()));
?>