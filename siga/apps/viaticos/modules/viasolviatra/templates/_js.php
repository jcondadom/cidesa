<?php 
   $pdfjasper="N";
   $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';
   $configyml = sfYaml::load($dirrepconfig);
   if(is_array($configyml)){
     if(array_key_exists('viaticosv2',$configyml)) {
       if(array_key_exists('viasolviatra',$configyml['viaticosv2'])) {     
         if(array_key_exists('parameterjasper',$configyml['viaticosv2']["viasolviatra"])) 
           $pdfjasper= $configyml["viaticosv2"]["viasolviatra"]["parameterjasper"];
      }
    }
  }
 ?>

<script type="text/javascript"language="Javascript">

  var nuevo='<?php echo $viasolviatra->getId(); ?>';
  if (nuevo=='') {
      $('divgridbolaer').hide();   
      $('divtippas').hide();
      $('divfecsal').hide();
      $('divhorsalb').hide();
      $('divfecreg').hide();
      $('divhorreg').hide();
      $('divrutbolaer').hide();
      $('divmotviabol').hide();
      $('divgridtrater').hide();   
      $('divcodempusu').hide();   
      $('divcelemp').hide();   
      $('divtipserv').hide();   
      $('divcanvehi').hide();   
      $('divtipvehi').hide();   
      $('divcandias').hide();   
      $('divcanpasaj').hide();   
      $('divequipaj').hide();
      $('divinstrum').hide();
      $('divbultos').hide();
      $('divconesper').hide();
      $('divadisposi').hide();
  }else {
    var boleto='<?php echo $viasolviatra->getReqbolaer(); ?>';
    var transporte='<?php echo $viasolviatra->getReqtrater(); ?>';
    if (boleto=='S')
        MostrarBol();
      else
        OcultarBol();
    if (transporte=='S')
        MostrarTrans();
    else
      OcultarTrans();
  }

   var mosproy='<?php echo H::getConfApp2('mosproy', 'viaticos', 'viasolviatra');?>';
  if (mosproy=='S')
    $('divcodpro').show();
  else
    $('divcodpro').hide();
 
    var beneficiario='<?php echo H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra'); ?>';
    var respon='<?php echo H::getConfApp2('respon', 'tesoreria', 'tesdesubi'); ?>';
    var ocuinfaco='<?php echo H::getConfApp2('ocuinfaco', 'viaticos', 'viasolviatra'); ?>';
    if (respon!='S')
    {
        $('divcodubi').hide();
        $('divcodcen').hide();
    }

    if($('viasolviatra_tipvia').value=='N')
        $('divcodpai').hide();
    else
        $('divcodpai').show();

    if (ocuinfaco=='S')
    {
        /*$('divcodempaco').hide();
        $('divcedempaco').hide();
        $('divcargoaco').hide();
        $('divnivelaco').hide();*/
        $('divgrid').hide();
    }

    function rellenar(id)
    {
        if($(id).value=='')
            $(id).value=$(id).value.pad(10,'#',0)
        else
            $(id).value=$(id).value.pad(10,'0',0)
    }

    function CalculaDias(id)
    {
            toAjax(4,getUrlModulo()+'ajax',$(id).value,'','&fecdes='+$('viasolviatra_fecdes').value+'&codemp='+$('viasolviatra_codemp').value+'&fechas='+$('viasolviatra_fechas').value+'&id='+id);
    }

    function bloquearcaja(id)
    {
        if($(id).value!='')
            $(id).readOnly=true;

    }
    //$('divcodcat').hide();

    function anular()
  {
    var numsoli=$('viasolviatra_numsol').value;
    var fecsoli=$('viasolviatra_fecsol').value;

    window.open(getUrlModulo()+'anular?numsoli='+numsoli+'&fecsoli='+fecsoli,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
  }  

  function MostrarBol()
  {
    $('divgridbolaer').show();   
    $('divtippas').show();
    $('divfecsal').show();
    $('divhorsalb').show();
    $('divfecreg').show();
    $('divhorreg').show();
    $('divrutbolaer').show();
    $('divmotviabol').show();
    agregarEmpleado();
    agregarAcompanantes();
  }

  function OcultarBol()
  {
    $('divgridbolaer').hide();   
    $('divtippas').hide();
    $('divfecsal').hide();
    $('divhorsalb').hide();
    $('divfecreg').hide();
    $('divhorreg').hide();
    $('divrutbolaer').hide();
    $('divmotviabol').hide();
    $('viasolviatra_rutbolaer').value='';

    $('viasolviatra_motviabol').value='';
    limpiarAcompanantes();
  }

  function MostrarTrans()
  {
      $('divgridtrater').show();   
      $('divcodempusu').show();   
      $('divcelemp').show();   
      $('divtipserv').show();   
      $('divcanvehi').show();   
      $('divtipvehi').show();   
      $('divcandias').show();   
      $('divcanpasaj').show();   
      $('divequipaj').show();
      $('divinstrum').show();
      $('divbultos').show();
      $('divconesper').show();
      $('divadisposi').show();
  }

  function OcultarTrans()
  {
      $('divgridtrater').hide();   
      $('divcodempusu').hide();   
      $('divcelemp').hide();   
      $('divtipserv').hide();   
      $('divcanvehi').hide();   
      $('divtipvehi').hide();   
      $('divcandias').hide();   
      $('divcanpasaj').hide();   
      $('divequipaj').hide();
      $('divinstrum').hide();
      $('divbultos').hide();
      $('divconesper').hide();
      $('divadisposi').hide();
      $('viasolviatra_codempusu').value='';
      $('viasolviatra_celemp').value='';
      $('viasolviatra_tipserv').value='';
      $('viasolviatra_canvehi').value='';
      $('viasolviatra_tipvehi').value='';
      $('viasolviatra_candias').value='';
      $('viasolviatra_canpasaj').value='';
      $('viasolviatra_equipaj').checked=false;
      $('viasolviatra_instrum').checked=false;
      $('viasolviatra_bultos').checked=false;
      $('viasolviatra_conesper').checked=false;
      $('viasolviatra_adisposi').checked=false;
  }

  function Mostrar_orden_preimpresa()
  {
    if(confirm("¿Desea imprimir la Solicitud Pre-Impresa?"))
    {

      var numsoldes=$('viasolviatra_numsol').value;
      var numsolhas=$('viasolviatra_numsol').value;
      var codemp=$('viasolviatra_codemp').value;

      var codcat=$('viasolviatra_codcat').value;
      var codniv=$('viasolviatra_codniv').value;
      var codciu=$('viasolviatra_codciu').value;
      var codpro=$('viasolviatra_codproced').value;
      var codfor=$('viasolviatra_codfortra').value;
      var fecsol=$('viasolviatra_fecsol').value;


      var nombrerep='<?php echo $viasolviatra->getNomreporte();?>';
      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
      var  mostrarjasper='<?php echo $pdfjasper;?>';

      if (nombrerep!=''){     
        if (mostrarjasper=='S') 
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=viaticosv2&r="+nombrerep+".php&s=<?php echo $sf_user->getAttribute('schema');?>&numsoldes="+numsoldes+"&numsolhas="+numsolhas;
        else
          pagina=ruta+"/reportes/reportes/viaticosv2/r.php=?r="+nombrerep+".php&numsoldes="+numsoldes+"&numsolhas="+numsolhas;
      }else {
        if (mostrarjasper=='S') 
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=viaticosv2&r=viarforsol.php&s=<?php echo $sf_user->getAttribute('schema');?>&numsoldes="+numsoldes+"&numsolhas="+numsolhas;
        else{
	  pagina=ruta+"/reportes/reportes/viaticosv2/r.php=?r=viarforsol.php&numsoldes="+numsoldes+"&numsolhas="+numsolhas+"&codempdes="+codemp+"&codemphas="+codemp+"&codcatdes="+codcat+"&codcathas="+codcat+"&codnivdes="+codniv+"&codnivhas="+codniv+"&codciudes="+codciu+"&codciuhas="+codciu+"&codprodes="+codpro+"&codprohas="+codpro+"&codfordes="+codfor+"&codforhas="+codfor+"&fecdes="+fecsol+"&fechas="+fecsol+"&tipvia=G";
          //pagina=ruta+"/reportes/reportes/viaticosv2/r.php=?r=viarforsol.php&numsoldes=0000000001&numsolhas=0000000001&codempdes=001&codemphas=EXT000559&codcatdes=1&codcathas=4-01-08&codnivdes=01&codnivhas=06&codciudes=0001&codciuhas=0400&codprodes=01&codprohas=03&codfordes=01&codforhas=06&fecdes=11/01/2013&fechas=19/07/2013&tipvia=G";
}
      }
        
        window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
      }
  }

  function agregarAcompanantes(){
    var z=0;
    var totreg=totalregistros2('bx',1,obtener_filas_grid('b',1));
    while (z<totreg)
    {
       var cedaco="bx"+"_"+z+"_3";
       var nomaco="bx"+"_"+z+"_2";

       if ($(cedaco)){
        if ($(cedaco).value!='') {
         var fil=obtener_filas_grid('c',1)-1;
         var cedbol="cx"+"_"+fil+"_1";
         if ($(cedbol)) {
          if ($(cedbol).value!=''){
            NuevaFilaGrid('c');
            var fil=obtener_filas_grid('c',1)-1;
          }
         }else {
            NuevaFilaGrid('c');
            var fil=obtener_filas_grid('c',1)-1;
        }
         
         var cedbol="cx"+"_"+fil+"_1";
         var apebol="cx"+"_"+fil+"_2";
         var nombol="cx"+"_"+fil+"_3";
         var aux3=$(nomaco).value.split(",");  
         var ape=aux3[0];
         var nom=aux3[1].replace(/^\s+/,'').replace(/\s+$/,'');       
         $(cedbol).value=$(cedaco).value;
         $(apebol).value=ape;
         $(nombol).value=nom; 
        }
       }      
     z++;
    }
  }

  function limpiarAcompanantes(){
    var z=0;
    var totreg=totalregistros2('cx',1,obtener_filas_grid('c',1));
    while (z<totreg)
    {
       var cedbol="cx"+"_"+z+"_1";
       var apebol="cx"+"_"+z+"_2";
       var nombol="cx"+"_"+z+"_3";     
       $(cedbol).value="";
       $(apebol).value="";
       $(nombol).value=""; 
     
     z++;
    }
  }

function agregarEmpleado(){
  var cedbol="cx"+"_0"+"_1";
  var apebol="cx"+"_0"+"_2";
  var nombol="cx"+"_0"+"_3";
  
  $(cedbol).value=$('viasolviatra_cedemp').value;
  var aux3=$('viasolviatra_nomemp').value.split(",");  
  var ape=aux3[0];
  var nom=aux3[1].replace(/^\s+/,'').replace(/\s+$/,'');     
  $(apebol).value=ape;
  $(nombol).value=nom;
}
</script>
