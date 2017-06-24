function mostrargridapu(id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codart=name+"_"+fil+"_2";
    var tieneanmat=name+"_"+fil+"_8";
    var tieneanman=name+"_"+fil+"_9";
    if ($(codart).value!="")
    {
        if ($('fatartra_reftar').value=='########') var reftar=''; else var reftar=$('fatartra_reftar').value;
        var refpre=$('fatartra_refpre').value;
        var articulo=$(codart).value;
        $('fatartra_filactapu').value=fil;

        if ($(tieneanmat).value!=''){
          var distrib=$(tieneanmat).value;
          var aux2=distrib.split("!");
          var anamat=aux2.length;
        }
        else var anamat=0;

        if ($(tieneanman).value!=''){
          var distrib=$(tieneanman).value;
          var aux2=distrib.split("!");
          var anaman=aux2.length;
        }
        else var anaman=0;

        new Ajax.Updater('divgrid_mat', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirApuMatenGrid(); $("divgrid_mat").show(); }, parameters:'ajax=3&articulo='+articulo+'&reftar='+reftar+'&refpre='+refpre+'&datmat='+anamat})
        new Ajax.Updater('divgrid_man', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirApuManenGrid(); $("divgrid_man").show(); }, parameters:'ajax=4&articulo='+articulo+'&reftar='+reftar+'&refpre='+refpre+'&datman='+anaman})

    }
    else
    {
      alert_("Debe introducir el Art&iacute;culo antes de agregar Materiales y Personal");
    }
  }

 function distribuirApuMatenGrid()
 {
    var j=$('fatartra_filactapu').value;
    var haydist="ax"+"_"+j+"_8";
    if ($(haydist).value!="" )
    {
        var distrib=$(haydist).value;
        var aux2=distrib.split("!");

        var z=0;
        while (z<((aux2.length)-1))
        {
         var reg=aux2[z];
         var aux3=reg.split("_");
         var ccodmat=aux3[0];
         var cdesmat=aux3[1];
         var cnumpla=aux3[2];
         var crefdoc=aux3[3];

         var codmat="bx"+"_"+z+"_1";
         var desmat="bx"+"_"+z+"_2";
         var numpla="bx"+"_"+z+"_3";
         var refdoc="bx"+"_"+z+"_4";

         if (!$(codmat)) {
           NuevaFilaGrid('b');
        }
           $(codmat).value=ccodmat;
           $(desmat).value=cdesmat;
           $(numpla).value=cnumpla;
           $(refdoc).value=crefdoc;       
         z++;
        }
    }
 }

  function distribuirApuManenGrid()
 {
    var j=$('fatartra_filactapu').value;
    var haydist="ax"+"_"+j+"_9";
    if ($(haydist).value!="" )
    {
        var distrib=$(haydist).value;
        var aux2=distrib.split("!");
        var z=0;
        while (z<((aux2.length)-1))
        {
         var reg=aux2[z];
         var aux3=reg.split("_");
         var ccodman=aux3[0];
         var cdesman=aux3[1];
         var ccodemp=aux3[2];
         var cnomemp=aux3[3];
         var chorpla=aux3[4];
         var choreje=aux3[5];

         var codman="cx"+"_"+z+"_1";
         var desman="cx"+"_"+z+"_2";
         var codemp="cx"+"_"+z+"_3";
         var nomemp="cx"+"_"+z+"_4";
         var horpla="cx"+"_"+z+"_5";
         var horeje="cx"+"_"+z+"_6";

          if (!$(codman)) {
           NuevaFilaGrid('c');
         }

         $(codman).value=ccodman;
         $(desman).value=cdesman;
         $(codemp).value=ccodemp;
         $(nomemp).value=cnomemp;
         $(horpla).value=chorpla;
         $(horeje).value=choreje;
         z++;
        }
    }
 } 

function salvarAnalisisprecio(){
  var cadenamat='';
  var cadenaman='';

  //Materiales
  var fil=0;  
  var ab=obtener_filas_grid('b',1);
  while (fil<ab)
  {
      var codmat="bx"+"_"+fil+"_1";
      if ($(codmat)) {
        if ($(codmat).value!="")
        {
          var desmat="bx"+"_"+fil+"_2";
          var numpla="bx"+"_"+fil+"_3";
          var refdoc="bx"+"_"+fil+"_4";

          cadenamat=cadenamat + $(codmat).value+'_' + $(desmat).value+'_' + $(numpla).value +'_'+ $(refdoc).value + '!';
        }      
      }
      fil++;
  }

  //Mano de Obra
  var fil=0;  
  var ab=obtener_filas_grid('c',1);
  while (fil<ab)
  {
      var codman="cx"+"_"+fil+"_1";
      if ($(codman)) {
        if ($(codman).value!="")
        {
          var desman="cx"+"_"+fil+"_2";
          var codemp="cx"+"_"+fil+"_3";
          var nomemp="cx"+"_"+fil+"_4";
          var horpla="cx"+"_"+fil+"_5";
          var horeje="cx"+"_"+fil+"_6";

          cadenaman=cadenaman + $(codman).value+'_' + $(desman).value+'_' + $(codemp).value +'_'+ $(nomemp).value +'_'+ $(horpla).value +'_'+ $(horeje).value + '!';
        }      
      }
      fil++;
  }

  var mifila=$('fatartra_filactapu').value;
  var infmateriales="ax"+"_"+mifila+"_8";
  var infmanoobra="ax"+"_"+mifila+"_9";
  $(infmateriales).value=cadenamat;
  $(infmanoobra).value=cadenaman;

  $('divgrid_man').hide();
  $('divgrid_mat').hide();

}