!function( $ ){

mask_numeral = function(obj){
  if(obj.value!='') obj.value = obj.value.pad(8, '0',0);
  else if(obj.value=='') obj.value = '########';
  return true;
}

}( window.jQuery || window.ender );