<?php echo submit_to_remote('bfiltro', 'Filtrar', array(
         'url'      => 'falisprc/ajax?ajax=4',
         'update' => 'divgrid',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         
        )) 
?>

