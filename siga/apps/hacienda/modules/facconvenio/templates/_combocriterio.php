  <?php
  if($fcconpag->getId()==""){ ?>
   <?php echo label_for('fcconpag[criterio]', __('Criterio de Búsqueda:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcconpag{criterio}')): ?> form-error<?php endif; ?>">

 <?php
 echo select_tag('fcconpag[criterio]',
         options_for_select(
                 Constantes::ListadeCriterioConstribuyente(),
                 $fcconpag->getCriterio(),
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
            $('fcconpag_seleccion').value = prompt('Ingrese el # de Licencia: ','').pad(10, '0',0);
              if($('fcconpag_seleccion').value==''){
                 alert('Debe Ingresar el  # de Licencia');
                 $('fcconpag_criterio').value='';
            }
            break;
   case 'V':
            $('fcconpag_seleccion').value = prompt('Ingrese el # de Placa: ','');
              if($('fcconpag_seleccion').value==''){
                 alert('Debe Ingresar el  # de Placa');
                 $('fcconpag_criterio').value='';
            }
            break;
   case 'U':
            $('fcconpag_seleccion').value = prompt('Ingrese el # de Registro de Inmueble: ','').pad(15, '0',0);
              if($('fcconpag_seleccion').value==''){
                 alert('Debe Ingresar el  # de Registro de Inmueble');
                 $('fcconpag_criterio').value='';
            }
            break;
   case 'A':
            $('fcconpag_seleccion').value = prompt('Ingrese el # de Expediente: ','').pad(10, '0',0);
              if($('fcconpag_seleccion').value==''){
                     alert('Debe Ingresar el  # de Expediente');
                 $('fcconpag_criterio').value='';
            }
            break;
   case 'O':
            $('fcconpag_seleccion').value = prompt('Ingrese el # de Ingreso: ','');
              if($('fcconpag_seleccion').value==''){
                 alert('Debe Ingresar el  # de Ingreso');
                 $('fcconpag_criterio').value='';
            }
            break;
   case 'P':
            $('fcconpag_seleccion').value = prompt('Ingrese el # de Control: ','');
              if($('fcconpag_seleccion').value==''){
                 alert('Debe Ingresar el  # de Control');
                 $('fcconpag_criterio').value='';
            }
            break;
   case 'E':
            $('fcconpag_seleccion').value = prompt('Ingrese el # de Control: ','');
              if($('fcconpag_seleccion').value==''){
                 alert('Debe Ingresar el  # de Control');
                 $('fcconpag_criterio').value='';
            }
            break;
   default:
            $('fcconpag_seleccion').value ='';
            break;
  }

  }
</script>

 