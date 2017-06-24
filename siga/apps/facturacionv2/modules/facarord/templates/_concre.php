<?php echo radiobutton_tag('facarord[concre]', 'C', false,array('onClick'=> remote_function(array(
    'update'   => 'comboconpag',
    'url'      => 'facarord/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'script'   => true,
    'with'   => "'ajax=6&codprg='+$('facarord_codprg').value+'&cliente='+$('facarord_rifpro').value+'&codigo='+this.value"
    ))))        ."Contado".'&nbsp;&nbsp;';
    echo radiobutton_tag('facarord[concre]', 'R', false,array('onClick'=> remote_function(array(
    'update'   => 'comboconpag',
    'url'      => 'facarord/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'script'   => true,
    'with'   => "'ajax=6&codprg='+$('facarord_codprg').value+'&cliente='+$('facarord_rifpro').value+'&codigo='+this.value"
    ))))."   Crédito";?>