<script type="text/javascript" languaje="Javascript">
if ($('npasicaremp_mancencos').value!='S')
	$('divcodcen').hide();

if ($('npasicaremp_tiene_dedicacion').value!='S')
	$('divcodtipded').hide();

if ($('npasicaremp_varforma').value!='S')
{
   $('divcodtipded').hide();
   $('divcodtie').hide();
   $('divcodtipcat').hide();
}else {	
	$('npasicaremp_paso').hide();
    if ($('npasicaremp_varcodcar').value!="" && $('npasicaremp_varcodcar').value==$('npasicaremp_codtipcar').value)
    {         
    }else {    	
    	$('divcodtipded').hide();
    	$('divcodtipcat').hide();
    }
}



function eliminar()
{
    if (confirm('¿Esta seguro de eliminar?'))
    {
	  if (confirm('¿Desea Grabar en Histórico esta Información?'))
        $('npasicaremp_explab').value='S';
	  else
	    $('npasicaremp_explab').value='N';
    }
}

</script>