<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table>
    <tr>
        <th>
            <?php echo label_for('opordpag[fecemi1]', __('Fecha Desde:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('opordpag{fecemi1}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('opordpag{fecemi1}')): ?>
                <?php echo form_error('opordpag{fecemi1}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_date_tag($opordpag, 'getFecemi1', array (
                  'rich' => true,
                  'calendar_button_img' => '/sf/sf_admin/images/date.png',
                  'control_name' => 'opordpag[fecemi1]',
                  'date_format' => 'dd/MM/yyyy',
                  'maxlength' => 10,
                  'onkeyup' => "javascript: mascara(this,'/',patron,true)",    
                )); echo $value ? $value : '&nbsp;' ?>
            </div>
        </th>
        <td>
            &nbsp;&nbsp;&nbsp;
        </td>
        <td>
            <?php echo label_for('opordpag[fecemi2]', __('Fecha Hasta:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('opordpag{fecemi2}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('opordpag{fecemi2}')): ?>
                <?php echo form_error('opordpag{fecemi2}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_date_tag($opordpag, 'getFecemi2', array (
                  'rich' => true,
                  'calendar_button_img' => '/sf/sf_admin/images/date.png',
                  'control_name' => 'opordpag[fecemi2]',
                  'date_format' => 'dd/MM/yyyy',
                  'maxlength' => 10,
                  'onkeyup' => "javascript: mascara(this,'/',patron,true)",    
                )); echo $value ? $value : '&nbsp;' ?>
            </div>
        </td>
    </tr>    
</table>

<script type="text/javascript">
function verificar(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    if (col==1)
    {
     var colcom=col+1;
    }else var colcom=col-1;

    var compara=name+"_"+fil+"_"+colcom;

    if ($(compara).checked==true)
    {
      alert('Debe marcar solo una opcion');
      $(id).checked=false;
    }
}
</script>