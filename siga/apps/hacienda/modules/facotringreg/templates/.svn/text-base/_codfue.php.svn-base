

<?php echo select_tag('fcotring[codfue]', options_for_select(Fcotring::ListFueIng(),$fcotring->getCodfue(),'include_custom=Seleccione uno ...'),array('onChange'=> remote_function(array(
			    'update' => 'vacio',
			    'url'      => 'facotringreg/ajax',
                            'script' => true,
                            'complete' => 'AjaxJSON(request, json)',
                            'with' => "'ajax=3&codigo='+this.value"
			  ))));?>
