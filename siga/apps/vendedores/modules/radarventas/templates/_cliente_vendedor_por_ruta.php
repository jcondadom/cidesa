<div id="prueba">
<select id="radarventas_facliente_id" name="radarventas[facliente_id]">
	<?php
	foreach ($radarventas as $value)
	{
	?>
		<option value="<?php echo $value->getId()?>"><?php echo $value->getNompro()?></option>
	<?php }?>
</select>
<br>
<br>
<div id="divvendedores_id" style="margin-left: -100px;">
	<label class="required" for="radarventas_vendedores_id" style="text-align:left; width:150px">Nombre y Apellidos del Vendedor:</label>
	<div class="content">
		<select id="radarventas_vendedores_id" name="radarventas[vendedores_id]">
			<?php		
			foreach ($radarventas1 as $value)
			{
			?>
				<option value="<?php echo $value->getId()?>"><?php echo $value->getNomcon()?></option>
			<?php }?>
		</select>
	</div>
</div>
</div>
