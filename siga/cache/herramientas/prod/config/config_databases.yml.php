<?php
// auto-generated by cidesaDatabaseConfigHandler
// date: 2017/05/30 12:58:47

$database = new sfPropelDatabase();
$database->initialize(array (
  'phptype' => 'pgsql',
  'hostspec' => 'localhost',
  'database' => 'SIMA',
  'username' => 'postgres',
  'password' => 'postgres',
  'schema' => 'SIMA017',
), 'propel');
$this->databases['propel'] = $database;

$database = new sfPropelDatabase();
$database->initialize(array (
  'phptype' => 'pgsql',
  'hostspec' => 'localhost',
  'database' => 'SIMA',
  'username' => 'postgres',
  'password' => 'postgres',
  'schema' => 'SIMA_USER',
), 'sima_user');
$this->databases['sima_user'] = $database;