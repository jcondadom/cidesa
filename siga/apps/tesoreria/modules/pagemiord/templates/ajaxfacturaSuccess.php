<?php
/*
 * Created on 26/09/2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'Javascript', 'Grid', 'I18N', 'PopUp') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools') ?>
<?php if ($div=='Fac') {?>
<?php echo input_hidden_tag('eliva', '') ?>
<?php echo input_hidden_tag('elislr', '') ?>
<?php echo input_hidden_tag('eltimbre', '') ?>
<?php echo input_hidden_tag('elirs', '') ?>
<?php echo input_hidden_tag('elimn', '') ?>
<?php echo input_hidden_tag('msj', '') ?>
<?
  echo grid_tag($obj2);
?>
<br>
<?php echo label_for('',__('Total Factura') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totfac','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Exento') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totexen','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Bas Imp.') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totbas','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Impuesto') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totimp','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Iva Ret.') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totiva','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Bas Imp 1xMil') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totbasmil','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Monto 1xMil') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totmontmil','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Bas Imp ISLR') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totbasislr','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Monto ISLR') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totmontislr','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Bas Imp IRS') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totbasirs','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Monto IRS') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totmontirs','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Bas Imp IMN') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totbasimn','', 'size=15 class=grid_txtright readonly=true') ?>
<br>
<?php echo label_for('',__('Total Monto IMN') , 'class="required" Style="width:150px"') ?>
<?php echo input_tag('totmontimn','', 'size=15 class=grid_txtright readonly=true') ?>

<?php //echo input_hidden_tag('totfac', '') ?>
<?php //echo input_hidden_tag('totexen', '') ?>
<?php //echo input_hidden_tag('totbas', '') ?>
<?php //echo input_hidden_tag('totimp', '') ?>
<?php //echo input_hidden_tag('totiva', '') ?>
<?php //echo input_hidden_tag('totbasmil', '') ?>
<?php //echo input_hidden_tag('totbasislr', '') ?>
<?php //echo input_hidden_tag('totmontmil', '') ?>
<?php //echo input_hidden_tag('totmontislr', '') ?>
<? }?>
<script language="JavaScript" type="text/javascript">
if ($('msj').value!="")
{
 alert($('msj').value);
}
else
{
	$('divFac').show();
	$('botonfac').hide();
	var totalfac="bx"+"_0_9";        
   	//actualizarsaldos_b();
        actualizarTotfac();
   	var am=totalregistros('ex',1,10);
    var nfil=parseInt($('opordpag_numfilfac').value);
    var cm=totalregistros('bx',2,nfil);
    if (cm==0)
    {
      $(totalfac).value=$('opordpag_monord').value;
      
      var calcfac='<?php echo H::getConfApp2('calculafac', 'tesoreria', 'pagemiord');?>';
       if (calcfac=='S')
       {
           var aplicoiva='<?php echo $codiva; ?>';
           if (aplicoiva!="")
           {
            var porceniva="bx"+"_0_8";   
            var indiva='<?php echo $indiva; ?>';
            $(porceniva).value=indiva;        
            
            totalizar2(porceniva);  
           }

           
           var codunomil='<?php echo $codunomil; ?>';
           if (codunomil!="")
           {
            var por1xmil="bx"+"_0_16";
            var check1xmil="bx"+"_0_14";
            $(check1xmil).checked=true;
            unoxmil(check1xmil);
           }

           var aplicoislr='<?php echo $codislr; ?>';
           if (aplicoislr!='')
           {
             var porislr="bx"+"_0_20";
             var indislr='<?php echo $indislr; ?>';
             $(porislr).value=indislr;        
            
             var checkislr="bx"+"_0_18";
             $(checkislr).checked=true;
            
             islr(checkislr);        
           }

          var aplicoirs='<?php echo $codirs; ?>';
          if (aplicoirs!="")
          {
            var porirs="bx"+"_0_27";
            var indirs='<?php echo $indirs; ?>';
             $(porirs).value=indirs; 
             
            var checkirs="bx"+"_0_25";
            $(checkirs).checked=true;
            
            irs(checkirs);        
          }

          var aplicoimn='<?php echo $codimn; ?>';
          if (aplicoimn!="")
          {
            var porimn="bx"+"_0_33";
            var indimn='<?php echo $indimn; ?>';
             $(porimn).value=indimn; 
             
            var checkimn="bx"+"_0_31";
            $(checkimn).checked=true;
            
            imn(checkimn);            
          }
          actualizarTotfac2();    
       }
    }
    else{
      var p=0;
      while(p<cm)
      {
      	var numfactu="bx_"+p+"_2";
        if ($('opordpag_status').value=='N')
      	  $(numfactu).readOnly=true;
      	p++;
      }
    }
    var filas=parseInt($('numgridret').value);
   	var bm=totalregistros('dx',2,filas);
    if (($('id').value=="" && am==0 && cm==0) || ($('id').value!='' && bm==0))
    {
      var l=0;
      
      while(l<nfil)
      {
      	var basimp="bx_"+l+"_11";
		var moniva="bx_"+l+"_12";
      	var monret="bx_"+l+"_13";
      	var unomil="bx_"+l+"_14";
      	var basltf="bx_"+l+"_15";
      	var porltf="bx_"+l+"_16";
      	var monltf="bx_"+l+"_17";
      	var islr2="bx_"+l+"_18";
      	var basislr="bx_"+l+"_19";
      	var monislr="bx_"+l+"_21";
      	var basirs="bx_"+l+"_25";
      	var monirs="bx_"+l+"_27";
        var monimn="bx_"+l+"_34";

      	$(basimp).readOnly=false;
      	$(monret).readOnly=false;
      	$(moniva).readOnly=false;
      	$(unomil).disabled=true;
      	$(basltf).readOnly=false;
      	$(porltf).readOnly=false;
      	$(monltf).readOnly=false;
      	$(islr2).disabled=true;
      	$(basislr).readOnly=false;
      	$(monislr).readOnly=false;
      	$(basirs).readOnly=false;
      	$(monirs).readOnly=false;
        $(monimn).readOnly=false;

      	l++;
      }
    }
}
</script>

