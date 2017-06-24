
<?php
  if($fcpagos->getId()==""){
       $bandera1="style=\"display:none;\"";
  }else if(($fcpagos->getEdopag()=='V'||$fcpagos->getEdopag()=='A') && $fcpagos->getId()!=''&& !$fcpagos->getHab()){
       $bandera1="style=\"display:none;\"";

   }else{
       $bandera1="";
       $bandera2="style=\"display:none;\"";
   }
 
   if($fcpagos->getEdopag()=='V' && $fcpagos->getId()!=''){
     	    $bandera2="";

        }else{
            $bandera2="style=\"display:none;\"";

        }

    if(($fcpagos->getEdopag()=='' || $fcpagos->getEdopag()=='L')=='' && $fcpagos->getId()!=''){
        $bandera4="";
    }else{
        $bandera4="style=\"display:none;\"";
    }
    
    if($fcpagos->getEdopag()!='A' && $fcpagos->getId()!=''){
         $bandera3="";
    }else{
         $bandera3="style=\"display:none;\"";
    }
?>
<div>
<table>
<tr>
    <th>
		<ul  class="sf_admin_actions" >
                <div id="divvalidar"  <?php echo $bandera1; ?> >
                <?php
                  
                echo submit_to_remote('Submit2', 'Validar', array(
                     'url'      => 'facrecpag/ajax',
                     'script'   => true,
                     'complete' => 'AjaxJSON(request, json)',
                     'condition' => 'confirm("¿Desea Validar el Pago?")',
                     'before'  => 'valor = prompt("Ingrese password para validar: ","")',
                     'with' => "'ajax=2&codigo='+$('fcpagos_numpag').value+'&password='+valor+'&funval='+$('fcpagos_funval').value"
                     ), array('class' => 'sf_admin_action_create'));
                  ?>
                </div>
                 </ul>
    </th>
    <th>
		<ul  class="sf_admin_actions" >
                      
                    <div id="divactualizar"  <?php echo $bandera3; ?> >
			 <input type="button" name="Submit" value="Actualizar Nro Factura" class="sf_admin_action_create" onclick="javascript:actualizar();" />
                      </div>
		</ul>
    </th>
      <th>
		<ul  class="sf_admin_actions" >
                <div id="divinvalidar"  <?php echo $bandera2; ?> >
                     <input type="button" name="Submit" value="Invalidar" class="sf_admin_action_delete" onclick="javascript:invalidar();" />
                </div>
                 </ul>

    </th>
      <th>
		<ul  class="sf_admin_actions" >
                      <div id="divanular"  <?php echo $bandera4; ?> >
			 <input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:anular();" />
                      </div>
		</ul>
    </th>
</tr>
</table>
</div>

<script type="text/javascript" lang="JavaScript">
  function Mostrar_pago_preimpreso()
  {
      var  codempdes='<? echo $fcpagos->getNumpag();?>';
      var  codemphas='<? echo $fcpagos->getNumpag();?>';
      var titulo='RECIBO DE PAGO';
      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
      
    pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/hacienda/r.php?r=fcrrecpagval.php&codempdes="+codempdes+"&codemphas="+codemphas+"&titulo="+titulo;

    window.open(pagina,codempdes,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");

      
  }
  
    function Mostrar_pago_preimpreso2()
  {
      var  codempdes='<? echo $fcpagos->getNumpag();?>';
      var  codemphas='<? echo $fcpagos->getNumpag();?>';
      var titulo='RECIBO DE PAGO';
      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
      
    pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/hacienda/r.php?r=fcrrecpagval.php&codempdes="+codempdes+"&codemphas="+codemphas+"&titulo="+titulo;

    window.open(pagina,codempdes,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");

      
  }
</script>
    
    