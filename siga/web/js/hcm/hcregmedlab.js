function enter(valor)
 {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('hcregmedlab_codmedlab').value=valor;
 }
