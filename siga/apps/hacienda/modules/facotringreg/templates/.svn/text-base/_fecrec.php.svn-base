<?php

  $value = object_input_date_tag($fcotring, 'getFecrec', array (
  'readonly' => true,
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'date_format' => 'dd/MM/yyyy',

  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcotring[fecrec]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;';

?>

<script language="javascript">
    
</script>


<script language="javascript">
 $('numref').hide();
 $('nombrecont').hide();
 $('dircont').hide();
 $('divrefic').hide();
 $('divrefvehiculo').hide();
 $('divrefinmueble').hide();
 $$('.h2')[4].hide();
 $('divDatos de Referencias').hide();


 function habilitar(id)
 {   $('fcotring_numref').value='';
     $('fcotring_nombrecont').value='';
     $('fcotring_dircont').value='';
	 var neww='<?php echo $fcotring->getId()?>';
	 if ($(id).value!="" && neww=="")
	 {

	 	if ($(id).value=='IC')
	 	{
                  $('numref').show();
                  $('nombrecont').show();
                  $('dircont').show();
		  $('divrefinmueble').hide();
		  $('divrefvehiculo').hide();
		  $('divrefic').show();
	 	}
	 	else if ($(id).value=='V')
	 	{
                  $('numref').show();
                  $('nombrecont').show();
                  $('dircont').show();
		  $('divrefvehiculo').show();
		  $('divrefinmueble').hide();
		  $('divrefic').hide();
	 	}
	 	else if ($(id).value=='I')
	 	{
                  $('numref').show();
                  $('nombrecont').show();
                  $('dircont').show();
		  $('divrefinmueble').show();
		  $('divrefvehiculo').hide();
		  $('divrefic').hide();
	 	}
	 	else
	 	{
	          $('fcotring_numref').value='';
                  $('numref').hide();
                  $('nombrecont').hide();
                  $('dircont').hide();
                  $('divrefic').hide();
                  $('divrefvehiculo').hide();
                  $('divrefinmueble').hide();

	 	}
	 }else{
                 $('numref').hide();
                  $('nombrecont').hide();
                  $('dircont').hide();
                  $('divrefic').hide();
                  $('divrefvehiculo').hide();
                  $('divrefinmueble').hide();

         }

 }

</script>