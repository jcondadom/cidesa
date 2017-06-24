<script type="text/javascript">
	var jq = jQuery.noConflict();
	jq(document).ready(function() {
	 jq("#add-row").click(function(){
		
		var cant = parseInt(jq("#cantidad").val()) + 1;	
	    var markup = "<tr class='af af"+cant+" id='fila"+cant+"'  height='15'><td class='grid_fila' height='15' align='center'><img src='/images/delete.png' id='"+cant+"' class='borrar' onclick='fun_borrar("+cant+")'></td><td class='grid_fila g_a_k ac"+cant+" height='15' align='center'><input id='ax_"+cant+"_1' class='grid_txtcenter afil"+cant+" acol1' name='grida["+cant+"][0]' value='1' style='border:none' tabindex='' onchange=' onclick='marcardesc(this.id)' type='checkbox'><input id='ax_"+cant+"_2' class='a_ids ac1' name='grida["+cant+"][1]' value='' type='hidden'></td><td class='grid_fila g_a_t ac2' height='15' align='left'><input id='ax_"+cant+"_3' class='grid_txtleft afil0 acol3' name='grida["+cant+"][2]' value='' style='border:none' tabindex='' onchange='' onblur='javascript:event.keyCode=13; ajaxarticulosfactura(event,this.id);' size='25' maxlength='14' onkeydown='javascript:return dFilter (event.keyCode, this,'###-##-##-####')' onkeypress='javascript:cadena=rayaenter2(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,21);' type='text'><input id='popup_a_"+cant+"_3' class='imagencatgrid ' value='...' onclick='abrir("+cant+");' type='button'></td><td class='grid_fila g_a_t ac3' height='15' align='left'><textarea id='ax_"+cant+"_4' class='afil0 acol4' name='grida["+cant+"][3]' style='border:none' tabindex='' onchange='' onblur='' rows='1' cols='30'></textarea></td><td class='grid_fila g_a_t ac4' height='15' align='left'><input id='ax_"+cant+"_5' class='medidas' name='grida["+cant+"][4]' value='' style='border:none' tabindex='' onchange='' onblur='recibirMedida("+cant+")' size='15' readonly='readonly' type='text'><input id='ax_"+cant+"_6' class='a_ids ac5' name='grida["+cant+"][5]' value='' type='hidden'></td><td class='grid_fila g_a_m ac6' height='25' align='right'><input id='ax_"+cant+"_7' class='grid_txtright afil0 acol7' name='grida["+cant+"][6]' value='' style='border:none' tabindex='' onchange='' onblur='javascript: obj=this; ValidarMontoGridv2(obj,2);' size='10' onkeypress='cansol(event,this.id);' type='text'></td></tr>";

		    jq("#table_articulos tbody").append(markup);
		    jq("#cantidad").val(cant);

		});
	});
function recibirMedida(pos){
	var jq = jQuery.noConflict();
	var contenedor = "muestra_medida_"+pos;
	jq(document).ready(function() {
	var art= jq('#ax_'+pos+'_3').val();
		    jq.ajax({
		      url: 'medidas',
		      data: {
			id : jq('#ax_'+pos+'_3').val()
		      },
		      type: 'GET',
		      success: function(data) {
			jq('#ax_'+pos+'_5').val(data);        
		      }
		    });
	});

}
</script>

    <table id="table_articulos">
        <thead>
            <tr>
		<th width="" align="center"></th>
		<th class="grid_titulo grid_a_col" width="400px" align="center">Marque</th>
		<th class="grid_titulo grid_a_col" width="400px" align="center">Cod. Artículo</th>
		<th class="grid_titulo grid_a_col" width="400px" align="center">Descripción</th>
		<th class="grid_titulo grid_a_col" width="400px" align="center">Unidad Medida</th>
		<th class="grid_titulo grid_a_col" width="400px" align="center">Cant. Solicitada</th>
		<input type="hidden" id="cantidad" name="cantidad" value="0">
	    </tr>
	</thead>
<tbody>
	<tr class="af af0" id="fila0" height="15">
	<td class="grid_fila" height="15" align="center">
		<img src="/images/delete.png" id="0" class="borrar">
	</td>
	<td class="grid_fila g_a_k ac0" height="15" align="center">
	<input id="ax_0_1" class="grid_txtcenter afil0 acol1" name="grida[0][0]" value="1" style="border:none" tabindex="" onchange="" onclick="marcardesc(this.id)" type="checkbox"><input id="ax_0_2" class="a_ids ac1" name="grida[0][1]" value="" type="hidden">
	</td>
	
	<td class="grid_fila g_a_t ac2" height="15" align="left">
	<input id="ax_0_3" class="grid_txtleft afil0 acol3" name="grida[0][2]" value="" style="border:none" tabindex="" onchange="" onblur="javascript:event.keyCode=13;" size="25" maxlength="'14'" onkeydown="javascript:return dFilter (event.keyCode, this,'###-##-##-####')" onkeypress="javascript:cadena=rayaenter2(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,21);" type="text">
	<input id="popup_a_0_3" class="imagencatgrid " value="..." onclick="abrir(0);" type="button">
	</td>
	<td class="grid_fila g_a_t ac3" height="15" align="left">
	<textarea id="ax_0_4" class="afil0 acol4" name="grida[0][3]" style="border:none" tabindex="" onchange="" onblur="" rows="1" cols="30"></textarea>
	</td>
	<td class="grid_fila g_a_t ac4" height="15" align="left">
	<input id="ax_0_5" class="medidas" name="grida[0][4]" value="" style="border:none" tabindex="" onchange="" onblur="recibirMedida(0)" size="15" readonly="readonly" type="text"><input id="ax_0_6" class="a_ids ac5" name="grida[0][5]" value="" type="hidden">
	
	</td>	
	<td class="grid_fila g_a_m ac6" height="25" align="right">
	<input id="ax_0_7" class="grid_txtright afil0 acol7" name="grida[0][6]" value="" style="border:none" tabindex="" onchange=""  onkeypress="cansol(event,this.id);" type="text">
	</td>
	<input id="ax_0_8" class="a_ids ac7" name="grida[0][7]" value="" type="hidden">
	<input id="ax_0_9" class="a_ids ac8" name="grida[0][8]" value="" type="hidden">
</tr>
        </tbody>
    </table>
<input class="sf_admin_action_nueva_fila" id="add-row" name="a_incluir" value=" Nueva Fila" type="button" style="padding: 5px 10px 10px 19px;">

