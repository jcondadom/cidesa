<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php echo button_to_popup('Ver Histórico de Anticipo de Intereses de Prestaciones Sociales',cross_app_link_to('nomina','/presnomreghisadeint/edit'),'','','','1000','800')?>

<?php echo grid_tag_v2($nphojint->getGridint()); ?>