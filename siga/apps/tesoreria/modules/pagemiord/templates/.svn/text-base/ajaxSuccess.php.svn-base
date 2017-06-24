<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'Javascript', 'Grid', 'I18N', 'PopUp', 'Linktoapp') ?>
<?php echo javascript_include_tag('ajax','tesoreria/pagemiord','tools') ?>

<?php if ($div=='TIPCAU') { ?>
<?php if ($tipcau==$ordpagnom || $tipcau=="OPNN") { 
$filopnom=H::getConfApp2('filopnom', 'tesoreria', 'pagemiord');
if ($filopnom=='S') { ?>
<?php $opnn= "<div id='filtronom'><fieldset><legend><b>Filtros N&oacute;mina</b></legend><div class='form-row' id='filtronom'>".label_for('', __('Nómina: '), 'class="required" style="width:100px "')?>
<?php $opnn .= input_tag('codnom', '', 'size=7 maxlength=3') ?> 
<?php $opnn .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Empleadobanco_Npnomina/clase/Npnomina/frame/sf_admin_edit_form/obj1/codnom/obj2/nomnom/campo1/codnom/campo2/nomnom')?>
<?php $opnn .= '&nbsp;&nbsp;&nbsp;'.input_tag('nomnom', '', 'size=40 readonly=true')."<Br><Br>" ?>

<?php $opnn.= label_for('', __('Fecha Nómina'), 'class="required" style="width:100px "')?>
<?php $opnn .= input_tag('fecnom', '', 'size=10 maxlength=10 onkeyup=javascript: mascara(this,"/",patron,true)')."<Br><Br>" ?>

<?php $opnn.= label_for('', __('Banco'), 'class="required" style="width:100px "')?>
<?php $opnn .= input_tag('codban', '', 'size=20 maxlength=16')."<Br><Br>" ?> 


<?php $opnn.= label_for('', __('Especial'), 'class="required" style="width:100px "')?>
<?php $opnn .= radiobutton_tag('especial', 'S', false, array('onClick' => 'ocultar(this.id)'))."Si".'&nbsp;&nbsp;' ?>
<?php $opnn .= radiobutton_tag('especial', 'N', true, array('onClick' => 'ocultar(this.id)'))."   No"."<Br><Br>" ?>

<?php $opnn.= label_for('', __('Nómina Especial'), 'class="required" style="width:100px "')?>
<?php $opnn .= input_tag('codnomesp', '', 'size=7 maxlength=3') ?> 
<?php $opnn .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npnomesptipos_nomespdefinicion/clase/Npnomesptipos/frame/sf_admin_edit_form/obj1/codnomesp/obj2/desnomesp/campo1/codnomesp/campo2/desnomesp')?>
<?php $opnn .= '&nbsp;&nbsp;&nbsp;'.input_tag('desnomesp', '', 'size=40 readonly=true') ?>
<?php $opnn.= "<br><ul class='sf_admin_actions'><li class='float-rigth'><input id='cargarnom' class='sf_admin_action_list' type='button' value='Cargar Nómina' onClick='cargarnominas();'></li></ul></div></fieldset></div>"?>
<div id="divGrid10">
<?php echo grid_tag($obj10);?>
</div>
<?php }else { ?>
<?php $opnn= label_for('', __('Por favor, seleccione la Nómina a Pagar'), 'class="required" style="width:220px "')?>
<?php $opnn .= input_tag('tipnom', '', 'size=7; onBlur=javascript:cargar1();') ?>
<?php $opnn .= input_hidden_tag('nomina', '') ?><?php $opnn .= input_hidden_tag('fechanomina', '') ?><?php $opnn .= input_hidden_tag('gasto', '') ?><?php $opnn .= input_hidden_tag('banco', '') ?><?php $opnn .= input_hidden_tag('nomespecial', '') ?>
<?php $opnn .= input_hidden_tag('codnomesp', '') ?>
<?php 
$agropnomesp=H::getX_vacio('CODEMP','Opdefemp','Agropnomesp','001');
if ($agropnomesp=='N'){
 $sql="Select distinct(case when 'S'='S' and A.especial='S' then (select desnomesp from npnomesptipos x where x.codnomesp=A.codnomesp) else (CASE when c.cedemp is null THEN b.nomnom else C.NOMEMP||' ('||B.NOMNOM||')' END) end)
 as nomina,(case when 'S'='S' and A.especial='S' then 'XXX' else A.CODNOM end) as codigo,A.FECNOM as fecha,a.codtipgas as gasto,(case when 'S'='S' and A.especial='S' then 'AAA' else A.CODBAN end) as codban, A.ESPECIAL as especial, A.CODNOMESP as nominaesp
         FROM NPNOMINA B,NPCIENOM A left outer join NPHOJINT C on A.CODBAN=C.CEDEMP
         WHERE A.CODNOM=B.CODNOM AND A.ASIDED<>'P' order by nomina,fecha;";
}else {
 $sql="Select distinct((CASE when c.cedemp is null THEN b.nomnom else C.NOMEMP||' ('||B.NOMNOM||')' END)) as nomina,
         A.CODNOM as codigo,A.FECNOM as fecha,a.codtipgas as gasto,A.CODBAN as codban, A.ESPECIAL as especial, A.CODNOMESP as nominaesp
         FROM NPNOMINA B,NPCIENOM A left outer join NPHOJINT C on A.CODBAN=C.CEDEMP
         WHERE A.CODNOM=B.CODNOM AND A.ASIDED<>'P' order by nomina,fecha;";
}
   $url=cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/tipnom-nomina-fechanomina-gasto-banco-nomespecial-codnomesp/campos/codigo-nomina-fecha-gasto-codban-especial-nominaesp'; ?>
<?php $opnn .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',$url,$sql,'catalogo1')?>


<?php }?>
<?php  echo javascript_tag(
  update_element_function('divAdi', array(
    'content'  => $opnn,
  ))) ?>
  <? echo grid_tag($obj);?>
<?php }else if ($tipcau==$ordpagapo || $tipcau=="APOR") { 
  $ranconapo=H::getConfApp2('ranconapo', 'tesoreria', 'pagemiord');
  $opmulapo=H::getConfApp2('opmulapo', 'tesoreria', 'pagemiord'); //OP de multiples Aportes
  if ($ranconapo=='S') { //OP de Rango Aportes para una fecha dada?>
  <?php $apor= label_for('', __('Aporte Desde: '), 'class="required" style="width:220px "')?>
  <?php $apor .= input_tag('codigoaported', '', 'size=7') ?>  
    <?php $fechanew = "<script> $('fecnom').value </script>";?>

  <?php $apor .= input_hidden_tag('gasto2', '') ?>
  <?php $sql="SELECT DISTINCT B.NOMCON,A.CODCON as codigoaporte, A.FECNOM as fecnom,A.CODTIPGAS AS GASTO, A.CODNOM AS NOMINA  FROM NPCIENOM A, NPDEFCPT B
           Where A.CODCON = B.CODCON AND A.ASIDED='P' AND A.ESPECIAL='N'";
   $url=cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/codigoaported-gasto2/campos/codigoaporte-gasto-fecnom-nomina';
 ?>
 <?php $apor .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',$url,$sql,'catalogo1')."<Br><Br>"?>

 <?php $apor.= label_for('', __('Aporte Hasta: '), 'class="required" style="width:220px "')?>
 <?php $apor .= input_tag('codigoaporteh', '', 'size=7 ') ?>
   <? $sql1="SELECT DISTINCT B.NOMCON,A.CODCON as codigoaporte,A.CODTIPGAS AS GASTO, A.FECNOM as fecnom, A.CODNOM AS NOMINA FROM NPCIENOM A, NPDEFCPT B
           Where A.CODCON = B.CODCON AND A.ASIDED='P' AND A.ESPECIAL='N'";
   $url1=cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/codigoaporteh-gasto2/campos/codigoaporte-gasto-fecnom-nomina';
 ?>
 <?php $apor .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',$url1,$sql1,'catalogo1').'<Br> <Br>'?>
<?php $apor.= label_for('', __('Fecha del Aporte a Pagar'), 'class="required" style="width:220px "')?>
  <?php $apor .= input_tag('fecnom', '', 'size=10 maxlength=10 onkeyup=javascript: mascara(this,"/",patron,true) onBlur=javascript:cargar21();') ?>
<?php }else if ($opmulapo=='S'){ //OP de Aportes Multiples?>
<?php echo input_hidden_tag('numfilapo', '') ?>
<?php $apor=""; ?>
<div id="divGrid9">
<?php echo grid_tag($obj9);?>
</div>
<br>
<ul class="sf_admin_actions">
<li class="float-rigth">
<input id="cargarapo" class="sf_admin_action_list" type="button" value="Cargar Aportes" onClick="cargar_aportes();">
</li>
</ul>
<?php }else { ?>
<?php $apor= label_for('', __('Por favor, seleccione el Aporte a Pagar'), 'class="required" style="width:220px "')?>
  <?php $apor .= input_tag('codigoaporte', '', 'size=7; onBlur=javascript:cargar2();') ?>
<?php $apor .= input_hidden_tag('fecnom', '') ?><?php $apor .= input_hidden_tag('gasto2', '') ?><?php $apor .= input_hidden_tag('codnom', '') ?><?php $apor .= input_hidden_tag('nomespecial', '') ?>
<?php $apor .= input_hidden_tag('codnomesp', '') ?>
  <? $sql="SELECT DISTINCT B.NOMCON,A.CODCON as codigoaporte, A.FECNOM as fecnom,A.CODTIPGAS AS GASTO, A.CODNOM AS NOMINA, A.ESPECIAL AS NOMESPECIAL, A.CODNOMESP AS CODNOMESP   FROM NPCIENOM A, NPDEFCPT B
           Where A.CODCON = B.CODCON AND A.ASIDED='P'";
   $url=cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/codigoaporte-fecnom-gasto2-codnom-nomespecial-codnomesp/campos/codigoaporte-fecnom-gasto-nomina-nomespecial-codnomesp';
 ?>
 <?php $apor .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',$url,$sql,'catalogo1')?>

<?php }?>
<?php  echo javascript_tag(
  update_element_function('divAdi', array(
    'content'  => $apor,
  ))) ?>

<? echo grid_tag($obj);?>
<?php }else if ($tipcau==$ordpagliq || $tipcau=="LIQU") { ?>
<?php $liqu= label_for('', __('Por favor, seleccione la Liquidación Pendiente por Pagar'), 'class="required" style="width:220px "')?>
  <?php $liqu .= input_tag('codigoemp', '', 'size=7; onBlur=javascript:cargar3();') ?>
  <?php $liqu .= input_hidden_tag('empleado', '') ?><?php $liqu .= input_hidden_tag('cedula', '') ?>
  <? $sql="select distinct(c.nomemp) as empleado, a.codemp as codigo, c.cedemp as cedula
           from NPLIQUIDACION_DET a left outer join NPHOJINT c on a.codemp=c.codemp
           where  coalesce(a.numord,'')='' order by empleado;";
  $url=cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/codigoemp-empleado-cedula/campos/codigo-empleado-cedula'; ?>
  <?php $liqu .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',$url,$sql,'catalogo1')?>

  <?php  echo javascript_tag(
  update_element_function('divAdi', array(
    'content'  => $liqu,
  ))
) ?>
<? echo grid_tag($obj);?>
<?php }else if ($tipcau==$ordpagfid || $tipcau=="OPFD") { ?>
<?php $opfd= label_for('', __('Por favor, seleccione el Fideicomiso Pendiente por Pagar'), 'class="required" style="width:220px "')?>
  <?php $opfd .= input_tag('lanomina', '', 'size=7; onBlur=javascript:cargar4();') ?>
  <?php $opfd .= input_hidden_tag('lafecha', '') ?><?php $opfd .= input_hidden_tag('elnombre', '') ?>
  <? $sql="Select B.NomNom as nomnom,A.CodNom as codnom,A.Fecha as fecha from NPOrdFid A,NPNomina B Where A.CodNom=B.CodNom Group By B.NomNom,A.CodNom,A.Fecha";
  $url=cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/lanomina-lafecha-elnombre/campos/codnom-fecnom-nomnom'; ?>
  <?php $opfd .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',$url,$sql,'catalogo1')?>

    <?php  echo javascript_tag(
  update_element_function('divAdi', array(
    'content'  => $opfd,
  ))
) ?>

<div id="carga4">
<? echo grid_tag($obj);?>
</div>
<?php }else if ($tipcau==$ordpagval || $tipcau=="OPVA") { ?>
<?php echo label_for('', __('Por favor, seleccione el Contrato a Pagar'), 'class="required" style="width:220px "')?>
<?php echo input_tag('tipcon', '', 'size=7; onBlur=javascript:cargar5();') ?>
<?php echo input_hidden_tag('refcomv', '') ?><?php echo  input_hidden_tag('rifcon', '') ?>
<?php echo '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ocregcon_Pagemiord/clase/Ocregcon/frame/sf_admin_edit_form/obj1/refcomv/obj2/rifcon/campo1/refcom/campo2/cedrif')?>
<?php }else if ($tipcau==$ordpaghcm || $tipcau=="OHCM") { ?> 
<div id="divDatos">
    <input type="button" id="refcompr" name="Submit" value="Consumos" onClick="javascript:$('divDatos').hide();$('ref').show();"/>

<ul class="sf_admin_actions">
<li class="float-rigth">
    <input type="button" name="Submit" id="btnrete" value="Retenciones" onClick="javascript:$('reten').toggle();"/>
</li>
</ul>
<? echo grid_tag($obj);?>
</div>

<div id="ref" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
  <tr>
    <th>
  <?php echo label_for('rifclini',__('Rif Clínica') , 'class="required" Style="width:100px"') ?>
  <?php $value = input_tag('rifclini', '', array (
  'size' => 20,
  'maxlength' => 15,
  'onBlur'=> remote_function(array(
       'url'      => 'pagemiord/ajax',
       'condition' => "$('rifclini').value != ''",
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=35&codigo='+this.value+'&cajtexmos=nomclini'"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </th>
<th>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Pagemiord_Hcregconhcm/clase/Caprovee/frame/sf_admin_edit_form/obj1/rifclini/obj2/nomclini/campo1/rifpro/campo2/nompro')?>
</th>
<th> <?php echo input_tag('nomclini', '', 'size=60 readonly=true') ?></th>
<th>&nbsp;</th><th><?php echo input_hidden_tag('fila', '') ?>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
<th>
  <?php echo link_to_function(image_tag('/images/Save.png'), "salvahcm('ref')") ?>
</th>
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
</tr>
<tr>
<th><?php echo label_for('',__('Fecha Desde') , 'class="required" Style="width:50px"') ?>
<?php echo input_date_tag('feccondes', '', array(
'size'=> 10,
'maxlength'=> 10,
'rich' => true,
'calendar_button_img' => '/sf/sf_admin/images/date.png',
'date_format' => 'dd/MM/yyyy',
'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)) ?></th>
<th>&nbsp;&nbsp;&nbsp;</th>
<th><?php echo label_for('',__('Fecha Hasta') , 'class="required" Style="width:50px"') ?>
<?php echo input_date_tag('fecconhas', '', array(
'size'=> 10,
'maxlength'=> 10,
'rich' => true,
'calendar_button_img' => '/sf/sf_admin/images/date.png',
'date_format' => 'dd/MM/yyyy',
'onkeyup' => "javascript: mascara(this,'/',patron,true)",
'onBlur'=> remote_function(array(
       'update'   => 'divGrid2',
       'url'      => 'pagemiord/ajax',
       'condition' => "$('rifclini').value != '' && $('feccondes').value != '' && $('fecconhas').value != ''",
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=36&fechades='+$('feccondes').value+'&rifclini='+$('rifclini').value+'&codigo='+this.value"
        ))
)) ?></th>
</tr>
</table>

<ul class="sf_admin_actions" >
<li class="float-center">
<input id="marcatodos" class="sf_admin_action_save" type="button" value="Marcar Todos" onClick="martodoshcm();">
</li>
<li class="float-center">
<input id="desmartodos" class="sf_admin_action_cancel" type="button" value="Desmarcar Todos" onClick="destodoshcm();">
</li>
</ul>
<div id="divGrid2">
<?php echo grid_tag($obj8);?>
</div>
</div>
</fieldset>
</div>
<?php }else { ?>
<?php if ($docrefiere=='N') { ?>
<ul class="sf_admin_actions">
<li class="float-rigth">
<input type="button" name="Submit" id="btnrete" value="Retenciones" onClick="javascript:$('reten').toggle();"/>
</li>
</ul>
<? echo grid_tag($obj);?>
<?php }else { ?>
<div id="divDatos">
    <input type="button" id="refcompr" name="Submit" value="R" onClick="javascript:$('divDatos').hide();$('ref').show();"/>

<ul class="sf_admin_actions">
<li class="float-rigth">
    <input type="button" name="Submit" id="btnrete" value="Retenciones" onClick="javascript:$('reten').toggle();"/>
</li>
</ul>
<? echo grid_tag($obj);?>
</div>
<div id="ref" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Referencia')?></legend>
<div class="form-row">
<table>
  <tr>
    <th><?php echo label_for('refere',__('Referencia') , 'class="required" Style="width:100px"') ?>
  <?php $value = input_tag('refere', '', array (
  'size' => 20,
  'maxlength' => 8,
  'onBlur'=> remote_function(array(
       'update'   => 'divGrid2',
       'url'      => 'pagemiord/ajax',
       'condition' => "$('refere').value != ''",
       'script'   => true,
       'complete' => 'AjaxJSON(request, json),actualizarsaldos(), mensajes();',
       'with' => "'ajax=6&codigo='+this.value+'&fecha='+$('fecha').value+'&arreglo='+$('opordpag_referencias').value+'&indice='+$('indref').value+'&tipcau='+$('opordpag_tipcau').value+'&fecha2='+$('opordpag_fecemi').value+'&observe='+$('opordpag_observe').value+'&causado='+$('total').value+'&moneda='+$('opordpag_codmon').value+'&valmon='+$('opordpag_valmon').value+'&refcre='+$('opordpag_refcre').value+'&refsolpag='+$('opordpag_refsolpag').value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </th>
<th>
<div id="cpprecom" style="display:none">
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpprecom_Pagemiord/clase/Cpprecom/frame/sf_admin_edit_form/obj1/refere/campo1/refprc')?>
</div>
<div id="cpcompro" style="display:none">
    <?php if($tipcau==$ordpagcre) { // Orden de pago de creditos ?>
        <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ccsoldescuades_Pagemiord/clase/Ccdetcuades/frame/sf_admin_edit_form/obj1/refere/campo1/refcom/obj2/opordpag_refcre/campo2/codigo')?>
    <?php } elseif($tipcau==$ordpagsolpag) { ?>
        <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opsolpag_Pagemiord/clase/Opsolpag/frame/sf_admin_edit_form/obj1/refere/campo1/refcom/obj2/opordpag_refsolpag/campo2/refsol')?>
    <?php } else { ?>
        <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpcompro_Pagemiord/clase/Cpcompro/frame/sf_admin_edit_form/obj1/refere/campo1/refcom')?>
    <?php } ?>

</div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th><?php echo label_for('',__('Fecha') , 'class="required" Style="width:100px"') ?>
<?php echo input_tag('fecha', '', array(
'readonly'=> true,
'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)) ?></th>
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
<th>
  <?php echo link_to_function(image_tag('/images/Save.png'), "salva('ref')") ?>
</th>
<th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
<th>
  <?php echo link_to_function(image_tag('/images/salir.gif'), "mostrar('divDatos','ref')") ?>
</th>
</tr>

</table>

<br>

<?php echo label_for('',__('Descripción') , 'class="required" Style="width:100px"') ?>
<div>
<?php echo textarea_tag('descripcion', '', 'size=80x5 readonly=true') ?>
</div>

<br>

<table>
<tr>
 <th>
 <?php echo label_for('',__('Código') , 'class="required" Style="width:100px"') ?>
 <?php echo input_tag('tipo', '', 'size=5 readonly=true') ?>
</th>
<th><?php echo input_tag('destipo', '', 'size=50 readonly=true') ?></th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo input_hidden_tag('fila', '') ?>
<?php echo input_hidden_tag('indref', '') ?>
 <?php echo input_hidden_tag('totalcomprometido', '') ?><?php echo input_hidden_tag('totalcau', '') ?><?php echo input_hidden_tag('mensaje', '') ?>
<?php echo input_hidden_tag('ajaxs', '') ?>
</th>
 <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
 <th>
<?php echo label_for('',__('Total Causado') , 'class="required" Style="width:100px"') ?>
<?php echo input_tag('total','0,00', 'size=15 class=grid_txtright readonly=true') ?></th>
</tr>
</table>

<script type="text/javascript">
causado();

  function mostrar(item,item2)
  {
    obj=$(item);
    obj.style.display="block";
    obj2=$(item2);
    obj2.style.display="none";
  }

  function causado()
   {

  str1= $('opordpag_monord').value.toString();
  str1= str1.replace('.','') ;
  str1= str1.replace('.','') ;
  str1= str1.replace('.','') ;
  str1= str1.replace('.','') ;
  str1= str1.replace('.','') ;
  str1= str1.replace('.','') ;
  str1= str1.replace(',','.');
  var totord=parseFloat(str1);

  str2= $('totalcau').value.toString();
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace('.','') ;
  str2= str2.replace(',','.');
  var totacausar=parseFloat(str2);

  var calcul= totord+totacausar;

    $('total').value=format(calcul.toFixed(2),'.',',','.');
   }

   function modifico1(e)
    {
     if (e.keyCode==13)
     {
     $('modifico1').value=false;
   }
    }

    function modifico2(e)
    {
     if (e.keyCode==13)
     {
     $('modifico2').value=false;
   }
    }
</script>

<div id="divGrid2">
<? echo grid_tag($obj4);?>
</div>
</div>
</fieldset>
</div>
<?php } ?>
<?php } ?>
<?php }else if ($div=='OPNN') {?>
<?php if ($divu==1) {?>
<? echo grid_tag($obj);?>
<?php } else {?>
<?  echo grid_tag($obj5); ?>
<?php }?>
<script language="JavaScript" type="text/javascript">
  netos();
  chequeadisponibilidad();
</script>
<?php }else if ($div=='APOR') { ?>
<? echo grid_tag($obj);?>
<script language="JavaScript" type="text/javascript">
  netos();
  chequeadisponibilidad();
</script>
<?php }else if ($div=='LIQU') { ?>
<?php if ($divu==1) {?>
<? echo grid_tag($obj);?>
<?php } else {?>
<?  echo grid_tag($obj5); ?>
<?php }?>
<script language="JavaScript" type="text/javascript">
  netos();
  chequeadisponibilidad();
</script>
<?php }else if ($div=='OPFD') { ?>
<? echo grid_tag($obj);?>
<script language="JavaScript" type="text/javascript">
  netos();
  chequeadisponibilidad();
</script>
<?php }else if ($div=='OPVA') { ?>
<? echo grid_tag($obj);?>
<script language="JavaScript" type="text/javascript">
  netos();
</script>
<?php }else if ($div=='VAL') { ?>
<?php $opval= label_for('', __('Por favor, seleccione la Valuación a Pagar'), 'class="required" style="width:220px "')?>
<?php $opval .= input_tag('tipval', '', 'size=7; onBlur=javascript:cargar6();') ?>
<?php $opval .= input_hidden_tag('monval', '') ?>
<?php $opval .=  '&nbsp;&nbsp;&nbsp;'.button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ocregval_Pagemiord/clase/Ocregval/frame/sf_admin_edit_form/obj1/monval/obj2/opordpag_desord/campo1/monval/campo2/obsval')?>

<?php  echo javascript_tag(
  update_element_function('divCon', array(
    'content'  => $opva,
  ))) ?>
  <? echo grid_tag($obj);?>
<?}else if ($div=='CIRIF') {?>
<?php echo label_for('Tipobenef', __('Elija un Tipo de Beneficiario'), 'class="required" style="width:200px "') ?>
<?php echo select_tag('tipoben', options_for_select(array('P'=>'Proveedor','C'=>'Contratista'),'','include_blank=true')) ?>
<?}else if ($div=='REFHCM'){?>
<? echo grid_tag($obj8);?>
<?}else if ($div=='CARNOM'){?>
<div id='datfilnom'>
<?php echo input_hidden_tag('numfilnom', '') ?>
<? echo grid_tag($obj10);?>
<br>
<ul class="sf_admin_actions">
<li class="float-rigth">
<input id="cargarimpnom" class="sf_admin_action_list" type="button" value="Cargar Imputaciones" onClick="cargar11();">
</li>
</ul>
</div>
<?}else if ($div=='REF'){?>
<? echo grid_tag($obj4);?>
</div>
<?php }?>

<? if ($ajax=='8') { ?>


<? } ?>
<script language="JavaScript" type="text/javascript">
  function mensajes()
  {
   if (($('ajaxs').value=='6') && ($('mensaje').value!=""))
   {
    alert_($('mensaje').value);
   }

  }
  var ocubtnret='<?php echo H::getConfApp2('ocubtnret', 'tesoreria', 'pagemiord');?>';
  if (ocubtnret=='S')
    $('btnrete').hide();
</script>
