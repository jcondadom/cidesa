<?php
    if ($cpsoladidis->getAdidis() == 'A'){
        echo radiobutton_tag('cpsoladidis[adidis]', 'A', true, array('disabled' => false ))        ."  Adición".'&nbsp;&nbsp;&nbsp;&nbsp;';
        echo radiobutton_tag('cpsoladidis[adidis]', 'D', false, array('disabled' => false ))."    Disminución";
    }else{
        echo radiobutton_tag('cpsoladidis[adidis]', 'A', false, array('disabled' => false ))        ."  Adición".'&nbsp;&nbsp;&nbsp;&nbsp;';
        echo radiobutton_tag('cpsoladidis[adidis]', 'D', true, array('disabled' => false ))."    Disminución";
    }
?>
