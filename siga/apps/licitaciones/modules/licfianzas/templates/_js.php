<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid') ?>
<script>
  $('trigger_licontrat_fecven').hide();
  /////////////FIN//////////////////

  // Cerrar Grupo de datos generales
  $('divDatos Generales').toggle();

  function Correl(id)
  {
      if($(id).value=='')
            $(id).value=$(id).value.pad(8,'#',0)
        else
            $(id).value=$(id).value.pad(8,'0',0);
  }
  function CalculaFecha(v)
  {
      toAjax('6',getUrlModulo()+'ajax',v,'','&fecha='+$('licontrat_fecreg').value+'&dias='+$('licontrat_dias').value);
  }

  // Coloreo la columna de estado del grid
  Event.observe(window, 'load',
    function() {

      // Ciclo para recorrer todos los objetos del Grid
      inputs_filas_h.each(function(elemento) {
        if($(elemento[0]).value=='Vigente')
          $(elemento[0]).addClassName('vigente');
        else if($(elemento[0]).value=='Vencido') $(elemento[0]).addClassName('vencido');
      });

    }
  );


</script>