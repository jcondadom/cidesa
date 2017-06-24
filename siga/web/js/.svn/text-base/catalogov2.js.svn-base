
Event.observe(window, 'load',
  function() {

  var catologos = new Array();
  var catologos_url = new Array();
  var obj_actual = null;

  jQuery('#catalogo').modal({
    keyboard: true,
    backdrop: 'static',
    show: false
  });


  jQuery('.selected').click(function (){
    objCat = jQuery('.selected').attr('objCat');
    if(objCat!=''){
      jQuery('#'+objCat)[0].value=jQuery(this).html();
    }
  });

  catalogo = function(catalogo, url, html_obj, campo, visible) {

    jQuery.each(catologos, function(index, cat){
      jQuery('#'+cat).hide();
    });

    jQuery('#loading_catalogo').hide();

    index_params = url.indexOf('param');
    if(index_params!=-1) url_diff = url.substring(index_params);
    else url_diff = url;

    cat_index = jQuery.inArray(catalogo,catologos);
    cat_url = jQuery.inArray(url_diff,catologos_url);
    var columnas='';
    obj_actual = html_obj;

    if(cat_index==-1){

      catologos.push(catalogo);
      catologos_url.push(url_diff);
      catalogo_load(catalogo, url, html_obj, campo, visible);

    }else {

      if(cat_url==-1){
        catologos_url[cat_index] = url_diff;
        catalogo_load(catalogo, url, html_obj, campo, visible);
      }

      jQuery('#'+catalogo).show();
    }

    if(visible) jQuery('#catalogo').modal('show');

    //jQuery('#grid-ajax').load('/index.php/ajax/grid?module='+module+'&report='+report+'&index='+index+'&obj='+obj+'&page=1');

    return true;

  };

  catalogo_load = function (catalogo, url, html_obj, campo, visible) {

    jQuery('#' + catalogo).remove();
    jQuery('#loading_catalogo').show();
    
    jQuery.getJSON(url, '', function(data){

      jQuery('#grid-search').append('<div class="row" id="' + catalogo + '">');
      jQuery('#' + catalogo).append('<table cellpadding="0" cellspacing="0" border="0" class="display" id="table_' + catalogo + '">');

      html_thead='';

      jQuery.each(data.Labels[0], function(index, value){
        html_thead+='<th>'+value+'</th>';
      });

      html_tbody='';
      jQuery.each(data.Catalogo, function(index, obj){
        html_tbody+='<tr>';
        index_obj = index;
        jQuery.each(obj, function(index, value){
          html_tbody+='<th><a onClick="javascriṕt:row_selected(this);" href="">'+value+'</a></th>';
        });
        html_tbody+='</tr>';
      });

      jQuery('#table_' + catalogo).append('<thead><tr>'+html_thead+'</tr></thead><tbody>'+html_tbody+'</tbody>');

      //jQuery('#table_' + catalogo + ' a').click(function(obj){
      //  jQuery('#'+obj_actual)[0].value=this.innerHTML;
      //  jQuery('#catalogo').modal('hide');
      //});

      oTable=jQuery('#table_' + catalogo).dataTable( {
        "sDom": "<'row'<'span4'l><'span6'f>r>t<'row'<'span4'i><'span6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
          "sLengthMenu": "_MENU_ records per page"
        },
      });

      oTable.fnLengthChange( 5 );

      jQuery('#loading_catalogo').hide();

      delete data;
    });    

  };

  row_selected = function(obj){
    jQuery('#'+obj_actual)[0].value=obj.innerHTML;
    jQuery('#catalogo').modal('hide');
    jQuery('#'+obj_actual)[0].focus();
  };

  jQuery('#close-catalogo').click(function (){
    jQuery('#catalogo').modal('hide');
  });


  /* Update datepicker plugin so that MM/DD/YYYY format is used. */
  jQuery.extend(jQuery.fn.datepicker.defaults, {
    parse: function (string) {
      var matches;
      if ((matches = string.match(/^(\d{2,2})\/(\d{2,2})\/(\d{4,4})jQuery/))) {
        return new Date(matches[3], matches[1] - 1, matches[2]);
      } else {
        return null;
      }
    },
    format: function (date) {
      var
      month = (date.getMonth() + 1).toString(),
      dom = date.getDate().toString();
      if (month.length === 1) {
        month = "0" + month;
      }
      if (dom.length === 1) {
        dom = "0" + dom;
      }
      return month + "/" + dom + "/" + date.getFullYear();
    }
  });

});
