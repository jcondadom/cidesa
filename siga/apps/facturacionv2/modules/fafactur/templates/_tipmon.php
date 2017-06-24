 <?php if ($fafactur->getTipmon()=='') $var=H::getX_vacio('CODEMP', 'Cadefart', 'Codmon', '001'); else $var=$fafactur->getTipmon();?> 

<?php echo select_tag('fafactur[tipmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$var),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=3&codigo='+this.value+'&monant='+$('fafactur_monedaanterior').value+'&fecha='+$('fafactur_fecfac').value"
      ))
  )) ?>
