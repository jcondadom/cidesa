!function ($) {

etiqueta_total = function(){

	diff = jQuery('#facarord_moncar')[0].toFloat() - jQuery('#facarord_totdetped')[0].toFloat()
	jQuery('#totalinfo').empty();
	if(diff==0.0){
		jQuery('#totalinfo').removeClass('label-warning');
		jQuery('#totalinfo').addClass('label-success');
		jQuery('#totalinfo').append('Sin Diferencias');
	}else{
		jQuery('#totalinfo').removeClass('label-success');
		jQuery('#totalinfo').addClass('label-warning');
		jQuery('#totalinfo').append('Diferencia de '+FloattoFloatVE(diff)+' Bsf.');
	}

}

}(window.jQuery);