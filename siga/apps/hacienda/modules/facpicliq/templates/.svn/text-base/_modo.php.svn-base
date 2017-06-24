<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<? if ($fcdeclar->getModo()=="E")    { ?>
<?php
      echo radiobutton_tag('fcdeclar[modo]', 'E', true, array('onBlur' => "toAjax('3',getUrlModuloAjax(),this.value,'','&fecha='+$('fcdeclar_fecdec').value)")).'&nbsp;&nbsp;'."Estimada".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[modo]', 'D', false, array('onBlur' => "toAjax('3',getUrlModuloAjax(),this.value,'','&fecha='+$('fcdeclar_fecdec').value)")).'&nbsp;&nbsp;'."Definitiva".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcdeclar->getModo()=="D")
{
      echo radiobutton_tag('fcdeclar[modo]', 'E', false, array('onBlur' => "toAjax('3',getUrlModuloAjax(),this.value,'','&fecha='+$('fcdeclar_fecdec').value)")).'&nbsp;&nbsp;'."Estimada".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[modo]', 'D', true, array('onBlur' => "toAjax('3',getUrlModuloAjax(),this.value,'','&fecha='+$('fcdeclar_fecdec').value)")).'&nbsp;&nbsp;'."Definitiva".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcdeclar[modo]', 'E', false, array('onBlur' => "toAjax('3',getUrlModuloAjax(),this.value,'','&fecha='+$('fcdeclar_fecdec').value)")).'&nbsp;&nbsp;'."Estimada".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcdeclar[modo]', 'D', true, array('onBlur' => "toAjax('3',getUrlModuloAjax(),this.value,'','&fecha='+$('fcdeclar_fecdec').value)")).'&nbsp;&nbsp;'."Definitiva".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
