$(document).ready(function()
{
  // show/hide filters
  var filter_show_hide = $('<a>') // create a DOM element
    .attr('href','#')
    .attr('id','filter-show-hide')
    .html('toggle filters ∇')
    .css('fontWeight', 'bold') // some styling
    .css('margin', '5px')
    .click(function(){
      $('#sf_admin_bar').toggle();
      if( $("#filter-show-hide").html() == 'toggle filters ∇' ) // change the link text
        $("#filter-show-hide").html('toggle filters Δ');
      else
        $("#filter-show-hide").html("toggle filters ∇");
      return false;
    });
});
