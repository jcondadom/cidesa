<?php

if(defined('SF_ROOT_DIR')){
  if(file_exists(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'adodb-time.inc.php'))
    include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'adodb-time.inc.php');

  if(file_exists(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'XlsReader/XlsReader.class.php'))
    include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'XlsReader/XlsReader.class.php');
}else{
  define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/..'));
}


//$so = 'Windows';
$so = 'Linux';
$auxdir = implode("/",explode("/",SF_ROOT_DIR,-1));
if(!defined('CIDESA_CONFIG')) define('CIDESA_CONFIG', $auxdir."/".'configurations');
if(!defined('CIDESA_CONFIG_NAME')) define('CIDESA_CONFIG_NAME', 'configurations');
  // directorios symfony para Linux
$sf_symfony_lib_dir  = SF_ROOT_DIR.DIRECTORY_SEPARATOR.'/lib/vendor/symfony/lib';
$sf_symfony_data_dir = SF_ROOT_DIR.DIRECTORY_SEPARATOR.'/lib/vendor/symfony/data';
