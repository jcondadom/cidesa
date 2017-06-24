<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');
include(dirname(__FILE__).'/../../bootstrap/cidesaBrowser.php');
ini_set("memory_limit",'-1');
ini_set("max_execution_time",'1000');
$b = new cidesaTestBrowser();   //Crea el objeto del navegador
$b->initialize();   //Inicializa el explorador de pruebas!!

///////////////CARGA DE LOS MODULOS////////////////////////////
$app='nomina';

include_once(dirname(__FILE__).'/../../obtenermenu.php');

include_once(dirname(__FILE__).'/../../cargamodulo.php');

foreach ($mod as  $m => $objm){
  $modulo=strtolower($objm);
  genericTest($b, $modulo, $solo, $m, $app, $hostname);
  unset($modulo);

}

//////////////////////RECORRIDO//////////////////////////////////

?>

