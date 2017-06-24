

  function validarNomina()
  {
	var valaux = $('cajocuaux').value;

	if (valaux=='' && $('npnomina_codnom').value!='')
	{
		alert('Codigo de Nomina no tiene movimientos, intente de nuevo...');
		$('npnomina_codnom').value='';
		$('npnomina_nomnom').value='';
		$('npnomina_codnom').focus();
	}

	if (valaux.toUpperCase()=='S')
	{
		$('numsemanas').show();
		$('ultimasemana').hide();
		$('numsemanas2').hide();
		$('msem').focus();

	}
	if (valaux.toUpperCase()=='Q' || valaux.toUpperCase()=='M' )
	{
		$('numsemanas').hide();
		$('numsemanas2').show();
	}
  }

  function validaMsem()
  {
  	if ($('msem2').value!='__' && $('msem2').value!='0')
  	{
		$('ultimasemana').show();
		$('opsi_SI').setAttribute('checked','checked');
  	}else
  	{
  	    $('ultimasemana').hide();
  	    $('opsi_NO').setAttribute('checked','checked');
  	}
  }

  function validarCalculo()
  {
  	if ($('controlador').value=='vacio')
  	{
		alert('Debe Colocar un Codigo de Nomina');
  	}else
  	{
  		if ($('controlador').value=='si')
	  	{
	  		alert('Esta Nomina se esta Calculando...');
	  		    /* location=('/nomina'+$("entorno").value+'.php/nomnomcalnom');*/
	  	}
	  	if ($('controlador').value=='no')
	  	{
	  		var tiempo = $('tiempo').value;
	  		alert('Está en proceso el Calculo de la Nomina '+$('npnomina_codnom').value);
        var check_progres = new Ajax.PeriodicalUpdater('grid1', '/nomina'+$("entorno").value+'.php/nomnomcalnomasinc/ajax', {asynchronous:true, evalScripts:true, onSuccess:function(request, json){AjaxJSON(request, json);}, parameters:'ajax=3&codnom='+$('npnomina_codnom').value+'&numsem='+$('npnomina_numsem').value+'&desde='+$('npnomina_ultfec').value+'&hasta='+$('npnomina_profec').value+'&opsi='+$('opsi_SI').checked+'&msem2='+$('msem2').value+'&nomnom='+$('npnomina_nomnom').value});
	  	}
  	}
  }
