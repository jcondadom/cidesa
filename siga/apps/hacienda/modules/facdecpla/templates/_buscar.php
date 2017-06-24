<?php echo button_to_remote('Distribuir', array(
        'url'      => 'facdecpla/ajax',
        'update'   => 'divgrid',
        'script'  => 'true',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('id').value == '' && $('fcotring_monimp').value!=''",
        'with' => "'ajax=4&fecha='+$('fcotring_fecreg').value+'&rubros='+$('fcotring_rubros').value+'&codigo='+this.value"
        )) ?>
