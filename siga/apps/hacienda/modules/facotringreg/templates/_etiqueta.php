<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<table width="100%">
  <tr>
    <th>
<div id="etiqueta"  class="form-error" align="center">
<h3 align="center">

     <?php echo label_for('fcotring[etiqueta]', __(''), 'class="required" id="label41" Style="width:150px"') ?>

</h3>

</div>
    </th>
     </tr>
</table>

<?php $eti = $fcotring->getEtiqueta(); ?>

<table width="100%">
  <tr>
    <th><strong><font  size="2" face="Verdana, Arial, Helvetica, sans-serif"> <? print $eti;?></font></strong></th>
  </tr>
</table>

    <div id="vacio" align="center">

    </div>
