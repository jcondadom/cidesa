<?php echo button_to_function('Buscar',remote_function(array(
     'update'   => 'divgrid',
     'url'      => 'nomeditcalnomrot/ajax',
     'condition' => "$('npcalnomrot_fecfin').value != ''",
     'script'   => true,
     'complete' => 'AjaxJSON(request, json)',
     'with' => "'ajax=3&codigo='+$('npcalnomrot_fecfin').value+'&fecini='+$('npcalnomrot_fecini').value+'&turno='+$('npcalnomrot_codtur').value+'&nomina='+$('npcalnomrot_codnom').value+'&grupo='+$('npcalnomrot_codgru').value"
 ))) ?>
