<?php echo input_tag('filhas', '', array(
    'size' => 20,
    'onkeyDown' => "javascript: return dFilter(event.keyCode, this, '".$params['mascara']."')",
)) ?>
