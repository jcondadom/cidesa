

function enter(e,valor)
 {
	 if (valor!='')
	 { valor=valor.pad(20, '0',0);}
	 else
	 {valor=valor.pad(20, '#',0);}

	 $('bnsolpolcer_numsol').value=valor;
   
 }

 function mostrar(){
 	if ($('bnsolpolcer_tipsol').value=='C')
 		$('divnumref').show();
 	else
 		$('divnumref').hide();
 }