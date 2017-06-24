<?php if(is_array($pager)) : ?>
{ "Catalogo": [ <?php $count = count($pager);
	foreach($pager as $key => $value){
		echo json_encode($value);
		if($key<($count-1)) echo ',';
	}
?> ], "Labels": [ <?php echo json_encode($columnas) ?> ]}	
<?php else: ?>
<?php $objs = $pager->getResults(); $json=array(); $json_obj=array(); ?>
<?php foreach ($objs as $obj) : ?>
	<?php foreach ($columnas as $campo => $etiqueta) : ?>
		<?php $metodo = 'get'.ucfirst($campo); ?>		
		<?php $json_obj[strtolower($campo)] = $obj->$metodo(); ?>
	<?php endforeach; ?>
	<?php  $json[] = json_encode($json_obj) ?>
<?php endforeach; ?>
{ "Catalogo": [ <?php echo implode(',', $json) ?> ], "Labels": [ <?php echo json_encode($columnas) ?> ]}
<?php endif; ?>
