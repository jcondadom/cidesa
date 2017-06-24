<?php echo input_tag('monglo', '', array(
    'size' => 10,
    'onKeyPress' => 'return validaDecimal(event)',
    'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
)) ?>
