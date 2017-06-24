<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php
        if($fcrepfis->getIncmod()=='I'){
     	    $bandera1="";

        }else{
            $bandera1="style=\"display:none;\"";
        }
	?>
<div id="divmododec"  <?php echo $bandera1; ?>>
 <?php echo label_for('fcrepfis[mododec]', __(' Tipo de Declaración:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcrepfis{mododec}')): ?> form-error<?php endif; ?>">

<? if ($fcrepfis->getMododec()=="E")    { ?>
<?php
      echo radiobutton_tag('fcrepfis[mododec]', 'E', true).'&nbsp;&nbsp;'."Estimada".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcrepfis[mododec]', 'D', false).'&nbsp;&nbsp;'."Definitiva".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
elseif ($fcrepfis->getMododec()=="D")
{
      echo radiobutton_tag('fcrepfis[mododec]', 'E', false).'&nbsp;&nbsp;'."Estimada".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcrepfis[mododec]', 'D', true).'&nbsp;&nbsp;'."Definitiva".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
else
{
      echo radiobutton_tag('fcrepfis[mododec]', 'E', false).'&nbsp;&nbsp;'."Estimada".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('fcrepfis[mododec]', 'D', true).'&nbsp;&nbsp;'."Definitiva".'&nbsp;&nbsp;&nbsp;&nbsp;';
}
?>
  </div>
</div>