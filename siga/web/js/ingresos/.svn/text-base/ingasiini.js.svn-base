/**
 * Librerías Javascript
 *
 * @package    Roraima
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

 function cargarasignacion()
 {
    var monto=$('ciasiini_monasi').value;
    new Ajax.Updater('gridasignacion', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&monto='+monto});
 }

 function activaSaldoActual() {
	var idActual = 'ax_0_2';
	var seleccion =  $('ciasiini_asiper').value;
	i=1;

	if (seleccion=='N') {
        $('ciasiini_monasi').value="0,00";
		$('ciasiini_monasi').readOnly=true;
		while ($(idActual)) {
            $(idActual).value="0,00";
			$(idActual).readOnly=false;
			idActual = "ax_"+i+"_"+'2';
			i++;
		}
	} else {
		if (seleccion=='S') {
			$('ciasiini_monasi').readOnly=false;
			while ($(idActual)) {
				$(idActual).readOnly=true;
				idActual = "ax_"+i+"_"+'2';
				i++;
			}
		} else {
			if (seleccion=='') {
				$('ciasiini_monasi').readOnly=true;
				while ($(idActual)) {
					$(idActual).readOnly=true;
					idActual = "ax_"+i+"_"+'2';
					i++;
				}
			}
		}
	}
}