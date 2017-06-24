
<?php
echo radiobutton_tag('marca', '1', false, array('onClick'=> 'MarcarTodos("Celular",4);'))."  Marcar Todo Opción CELULAR".'&nbsp;&nbsp;';
echo radiobutton_tag('marca', '2', false, array('onClick'=> 'MarcarTodos("Casa",4);'))."  Marcar Todo Opción CASA".'&nbsp;&nbsp;';
echo radiobutton_tag('marca', '3', false, array('onClick'=> 'MarcarTodos("Oficina",4);'))." Marcar Todo Opción OFICINA".'&nbsp;&nbsp;';
echo '<br>';
?>
<script type="text/javascript">

function MarcarTodos(variable, columna)
{
    var fil = 0;
    var existe = 2;

	while (existe > 1)
	{
	    var id = "ax"+"_"+fil+"_"+columna;
		if ($(id)){
            $(id).value=variable;
		}else{
		    existe=0;
		}
		fil ++;
	}
}



function desmarcarTodo()
{
    var fil = 0;
    var existe = 2;

	while (existe > 1)
	{
	    var id = "ax"+"_"+fil+"_3";
		if ($(id)){
            $(id).value='';
		}else{
		    existe=0;
		}
		fil ++;
	}
}
</script>