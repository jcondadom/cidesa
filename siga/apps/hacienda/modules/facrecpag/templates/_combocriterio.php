  <?php
  if($fcpagos->getId()==""){ ?>
   <?php echo label_for('fcpagos[criterio]', __('Criterio de Búsqueda:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{criterio}')): ?> form-error<?php endif; ?>">

 <?php
 echo select_tag('fcpagos[criterio]',
         options_for_select(
                 Constantes::ListadeCriterioConstribuyente(),
                 $fcpagos->getCriterio(),
                 'include_custom=Seleccione'),
                 array( 'onchange' => "Busqueda(this.id);")) ?>
</div>
 <?php } ?>
<script  language="JavaScript" type="text/javascript">
  function Busqueda(id)
  {

  switch ($(id).value)
  {
   case 'I':
            $('fcpagos_seleccion').value = prompt('Ingrese el # de Licencia: ','').pad(10, '0',0);
              if($('fcpagos_seleccion').value==''){
                 alert('Debe Ingresar el  # de Licencia');
                 $('fcpagos_criterio').value='';
            }
            break;
   case 'V':
            $('fcpagos_seleccion').value = prompt('Ingrese el # de Placa: ','');
              if($('fcpagos_seleccion').value==''){
                 alert('Debe Ingresar el  # de Placa');
                 $('fcpagos_criterio').value='';
            }
            break;
   case 'U':
            $('fcpagos_seleccion').value = prompt('Ingrese el # de Registro de Inmueble: ','').pad(15, '0',0);
              if($('fcpagos_seleccion').value==''){
                 alert('Debe Ingresar el  # de Registro de Inmueble');
                 $('fcpagos_criterio').value='';
            }
            break;
   case 'A':
            $('fcpagos_seleccion').value = prompt('Ingrese el # de Expediente: ','').pad(10, '0',0);
              if($('fcpagos_seleccion').value==''){
                     alert('Debe Ingresar el  # de Expediente');
                 $('fcpagos_criterio').value='';
            }
            break;
   case 'O':
            $('fcpagos_seleccion').value = prompt('Ingrese el # de Ingreso: ','');
              if($('fcpagos_seleccion').value==''){
                 alert('Debe Ingresar el  # de Ingreso');
                 $('fcpagos_criterio').value='';
            }
            break;
   case 'P':
            $('fcpagos_seleccion').value = prompt('Ingrese el # de Control: ','');
              if($('fcpagos_seleccion').value==''){
                 alert('Debe Ingresar el  # de Control');
                 $('fcpagos_criterio').value='';
            }
            break;
   case 'E':
            $('fcpagos_seleccion').value = prompt('Ingrese el # de Control: ','');
              if($('fcpagos_seleccion').value==''){
                 alert('Debe Ingresar el  # de Control');
                 $('fcpagos_criterio').value='';
            }
            break;
   default:
            $('fcpagos_seleccion').value ='';
            break;
  }

  }
</script>

 
