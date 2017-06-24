<?php echo radiobutton_tag('seggruapl[marca]', '1', false, array('onClick'=> 'marcarTodo(1);'))."Marcar Todo Opción 1".'&nbsp;&nbsp;';
      echo radiobutton_tag('seggruapl[marca]', '2', false, array('onClick'=> 'marcarTodo(2);'))."Marcar Todo Opción 2".'&nbsp;&nbsp;';
      echo radiobutton_tag('seggruapl[marca]', '3', false, array('onClick'=> 'marcarTodo(3);'))."Marcar Todo Opción 3".'&nbsp;&nbsp;';
      echo radiobutton_tag('seggruapl[marca]', '4', false, array('onClick'=> 'desmarcarTodo();'))."Desmarcar Todo".'&nbsp;&nbsp;';	?>

<script language="JavaScript" type="text/javascript">
  function marcarTodo(valor)
  {
    var am=obtener_filas_grid('a',2); //parseInt($('totalfilas').value);
    if (valor==1)
    {
     var fil=0;
	 while (fil<am)
	 {
	  var id="ax"+"_"+fil+"_3";
	  $(id).value='15';
	  fil++;
	 }
    }
    else if (valor==2)
    {
	   var fil=0;
	   while (fil<am)
	   {
	     var id="ax"+"_"+fil+"_3";
	     $(id).value='11';

	     fil++;
	   }
   }
   else
   {
	 var fil=0;
	 while (fil<am)
	 {
	  var id="ax"+"_"+fil+"_3";
	  $(id).value='8';
	  fil++;
	 }
   }
  }

  function desmarcarTodo()
  {
    var am=obtener_filas_grid('a',2); //parseInt($('totalfilas').value);
    fil=0;
    while (fil<am)
    {
     var id="ax"+"_"+fil+"_3";
     $(id).value="";
     fil++;
    }
  }
</script>