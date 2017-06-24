<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
 if($ajax==7)
    echo grid_tag_v2($liprebas->getGrid());
 elseif($ajax==8){
    echo grid_tag_v2($liprebas->getGrid_rec());
    echo link_to_function(image_tag('/images/salir.gif'), "OcultarGrid()");
 }elseif($ajax==13){   
     echo select_tag('liprebas[codedo]', options_for_select($arr,$liprebas->getCodedo()), array (
      'onChange'=> remote_function(array(
      'update'   => 'divmun',
      'url'      => 'licprebasob/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=14&codpai='+$('liprebas_codpai').value+'&codigo='+this.value",
           )),
  ));
 }elseif($ajax==14){   
     echo select_tag('liprebas[codmun]', options_for_select($arr,$liprebas->getCodmun()), array (
      'onChange'=> remote_function(array(
      'update'   => 'divpar',
      'url'      => 'licprebasob/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=15&codpai='+$('liprebas_codpai').value+'&codedo='+$('liprebas_codedo').value+'&codigo='+this.value",
          )),
  ));
 }elseif($ajax==15){   
     echo select_tag('liprebas[codpar]', options_for_select($arr,$liprebas->getCodpar()), array (
      'onChange'=> remote_function(array(
      'update'   => 'divsec',
      'url'      => 'licprebasob/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=16&codpai='+$('liprebas_codpai').value+'&codedo='+$('liprebas_codedo').value+'&codmun='+$('liprebas_codmun').value+'&codigo='+this.value",
          )),
  ));
 }elseif($ajax==16){   
     echo select_tag('liprebas[codsec]', options_for_select($arr,$liprebas->getCodsec()), array (      
  ));
 }
?>
