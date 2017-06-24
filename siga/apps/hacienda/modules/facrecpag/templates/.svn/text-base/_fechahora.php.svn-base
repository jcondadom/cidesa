<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 if($fcpagos->getEdopag()==''&& $fcpagos->getId()!=''){
     	    $bandera1="";

        }else{
            $bandera1="style=\"display:none;\"";
        }

?>
<div id="divfechahora"  <?php echo $bandera1; ?> >
  <?php echo label_for('fcpagos[fechahora]', __('Fecha y Hora de Validación:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{fechahora}')): ?> form-error<?php endif; ?>">
  <?php
  $value = object_input_tag($fcpagos, 'getFechahora', array (
  'readonly' => true,
  'size' => 20,
   'control_name' => 'fcpagos[fechahora]',
)); echo $value ? $value : '&nbsp;';

      ?>
</div>


<script language="JavaScript" type="text/javascript">
var estatus='<?php echo $fcpagos->getEdopag();?>';
var grabo='<?echo $params[1];?>';
                totalesGeneral();
                if (grabo=='S') 
                {
                    if (estatus!='V')
                        //Mostrar_pago_preimpreso2();
                    //else
                        Mostrar_pago_preimpreso();
                    
                    calcularTotales();
                }

</script>

