  <?php $value = object_checkbox_tag($fadefprg, 'getBtn', array (
  'control_name' => 'fadefprg[btn]',
  'onClick' => 'MarcarDesmarcar(this.id)',
)); echo $value ? $value : '&nbsp;' ?>

<script language="JavaScript" type="text/javascript">
  function MarcarDesmarcar(id)
  {
    var am=obtener_filas_grid('a',2);
    var fil=0;
    while (fil<am)
    {
      var check="ax_"+fil+"_1";

      $(check).checked=$(id).checked;
      
     fil++;
    }
  }
</script>