<?php
$connection = Propel::getConnection();
$query = "select c.codart as codigo,c.desart as descripcion,d.cantot as cantidad,c.unimed as unidad 
from detradarventas d
inner join caregart c on c.codart=d.codart
where radarventas_id=".$radarventas->getId();	
$statement = $connection->prepareStatement($query);
$resultset = $statement->executeQuery();
?>

    <table id="table_articulos">
        <thead>
            <tr>
		<th width="200px">Descripción</th>
		<th class="grid_titulo grid_a_col" width="30px" align="center">Cant.</th>
	    </tr>
	</thead>
        <tbody>
	    <?php
	    foreach($resultset as $value): 	
	    ?>
            <tr>
		<td><?php echo $value['codigo']."<br>".$value['descripcion']."<br>".$value['unidad'];?></td>
		<td align="center"><?php echo $value['cantidad']?></td>
	    </tr>
	    <?php
	    endforeach;
	    ?>
	</tbody>
    </table>
