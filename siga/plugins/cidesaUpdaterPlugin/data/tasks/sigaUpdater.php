<?php 
/**
 * Funciones para chequear el modelo de datos
 *
 * @package    Roraima
 * @subpackage checkdatabase
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
?>

<?php

include_once SF_ROOT_DIR.'/lib/cidesaDatabaseConfigHandler.class.php';
include_once 'creole/Creole.php';

$check = false;
$checktablas = array();
$tablasschemas = array();
$trim = false;
$seq = false;

pake_desc('update all app (source, model)');
pake_task('propel-siga-updater', 'project_exists');

pake_desc('update all app (source, model) version 2');
pake_task('propel-siga-updater-v2', 'project_exists');

pake_desc('Rollback app (source)');
pake_task('propel-siga-rollback', 'project_exists');

pake_desc('Svn info');
pake_task('siga-svn-info', 'project_exists');

function run_siga_svn_info($task, $args)
{
  pake_echo_action('siga_svn_info', 'Obteniendo la información de subversion del proyecto');  

  $svn_version = shell_exec('svn --version ');

  pake_echo_action("siga_svn_info",  "Cliente Subversion: ".strstr($svn_version,"\n",true));

  $svn = shell_exec('svn info ' . SF_ROOT_DIR);
  $svn = explode(PHP_EOL, $svn);
  $svnrev = $svn[5];

  pake_echo_action("siga_svn_info",  "Actual ".$svnrev);

  $rev = last_revision();    

  pake_echo_action("siga_svn_info",  "Revisión Anterior: ".$rev);

}

function run_propel_siga_updater($task, $args)
{
  global $checktablas;
  global $tablasschemas;  
  global $check;
  $check = true;
  $ymlsremoto = array();

  pake_echo_action('siga_updater', 'Limpiando entorno de analisis');

  $finder = pakeFinder::type('file')->ignore_version_control()->name('*.*');
  pake_remove($finder, 'data/sql');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.xml');
  pake_remove($finder, 'config');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.yml');
  pake_remove($finder, 'config');

  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config/schemas');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config');

  pake_echo_action('siga_updater', 'Actualizando Código Fuente');

  $rev = cidesa_update_sources($task,$args);

  if($rev){


    $dsn = config_schema("sima_user","SIMA_USER");

    pake_echo_action('siga_updater', "Actualizando SIMA_USER");

    run_propel_check_database($task,$args);

    write_sqldbmap('sima_user');

    run_propel_insert_sql($task,$args);

    $database = new sfPropelDatabase();
    $database->initialize($dsn, 'sima_user');

    Propel::setConfiguration(sfPropelDatabase::getConfiguration());
    Propel::initialize();

    $con = Propel::getConnection('sima_user');

    $empresas = EmpresaUserPeer::doSelect(new Criteria(),$con);

    foreach($empresas as $emp){

      pake_echo_action('siga_updater', "Actualizando SIMA".$emp->getCodemp());

      config_schema("propel","SIMA".$emp->getCodemp());

      run_propel_check_database($task,$args);

      write_sqldbmap('propel', true);

      run_propel_insert_sql($task,$args);
      
    }

    pake_echo_action('siga_updater', "Eliminando Cache");

    run_clear_cache($task,$args);

    pake_echo_action('siga_updater', "Proceso Completado");


  }else{
    $exception = new Exception("No se pudo actualizar el código fuente. Verifique la conectividad a Internet y la salida hacia el mismo de su red. Configure la conexión al repositorio por consola antes de usar esta herramienta");
    pake_exception_default_handler($exception);
  }

}

function run_propel_siga_updater_v2($task, $args)
{
  global $checktablas;
  global $tablasschemas;  
  global $check;
  $check = true;
  $ymlsremoto = array();

  pake_echo_action('siga_updater_v2', 'Limpiando entorno de analisis');

  $finder = pakeFinder::type('file')->ignore_version_control()->name('*.*');
  pake_remove($finder, 'data/sql');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.xml');
  pake_remove($finder, 'config');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.yml');
  pake_remove($finder, 'config');

  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config/schemas');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config');

  pake_echo_action('siga_updater_v2', 'Actualizando Código Fuente');

  $rev = cidesa_update_sources_v2($task,$args);

  if($rev){


    $dsn = config_schema("sima_user","SIMA_USER");

    pake_echo_action('siga_updater_v2', "Actualizando SIMA_USER");

    run_propel_check_database($task,$args);

    write_sqldbmap('sima_user');

    run_propel_insert_sql($task,$args);

    $database = new sfPropelDatabase();
    $database->initialize($dsn, 'sima_user');

    Propel::setConfiguration(sfPropelDatabase::getConfiguration());
    Propel::initialize();

    $con = Propel::getConnection('sima_user');

    $empresas = EmpresaUserPeer::doSelect(new Criteria(),$con);

    foreach($empresas as $emp){

      pake_echo_action('siga_updater_v2', "Actualizando SIMA".$emp->getCodemp());

      config_schema("propel","SIMA".$emp->getCodemp());

      run_propel_check_database($task,$args);

      write_sqldbmap('propel', true);

      run_propel_insert_sql($task,$args);
      
    }

    pake_echo_action('siga_updater_v2', "Eliminando Cache");

    run_clear_cache($task,$args);

    pake_echo_action('siga_updater_v2', "Proceso Completado");


  }else{
    $exception = new Exception("No se pudo actualizar el código fuente. Verifique la conectividad a Internet y la salida hacia el mismo de su red. Configure la conexión al repositorio por consola antes de usar esta herramienta");
    pake_exception_default_handler($exception);
  }

}


function run_propel_siga_rollback($task, $args)
{
  global $checktablas;
  global $tablasschemas;  
  global $check;
  $check = true;
  $ymlsremoto = array();

  pake_echo_action('siga_rollback', 'Limpiando entorno de analisis');

  $finder = pakeFinder::type('file')->ignore_version_control()->name('*.*');
  pake_remove($finder, 'data/sql');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.xml');
  pake_remove($finder, 'config');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('generated-*schema*.yml');
  pake_remove($finder, 'config');

  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config/schemas');
  $finder = pakeFinder::type('file')->ignore_version_control()->name('*schema*.xml');
  pake_remove($finder, 'config');

  pake_echo_action('siga_rollback', 'Actualizando Código Fuente');

  $rev = cidesa_update_sources_v2($task,$args,true);

  if($rev){

    pake_echo_action('siga_rollback', "Eliminando Cache");

    run_clear_cache($task,$args);

    pake_echo_action('siga_rollback', "Proceso Completado");


  }else{
    $exception = new Exception("No se pudo actualizar el código fuente. Verifique la conectividad a Internet y la salida hacia el mismo de su red. Configure la conexión al repositorio por consola antes de usar esta herramienta");
    pake_exception_default_handler($exception);
  }

}

function cidesa_update_sources($task,$args)
{
  pake_echo_action("siga_updater",  "Cliente Subversion: ".svn_client_version());

  $svn = File(SF_ROOT_DIR.'/.svn/entries');
  $svnrev = $svn[3];
  unset($svn);

  pake_echo_action("siga_updater",  "Revisión Actual: ".$svnrev);

  $revnew = svn_update(SF_ROOT_DIR);

  pake_echo_action("siga_updater",  "Revisión Actualizada: ".$revnew);

  return $revnew;
}


function cidesa_update_sources_v2($task,$args,$rollback=false)
{
  $svn_version = shell_exec('svn --version ');

  pake_echo_action("siga_updater_v2",  "Cliente Subversion: ".strstr($svn_version,"\n",true));

  $svn = shell_exec('svn info ' . SF_ROOT_DIR);
  $svn = explode(PHP_EOL, $svn);
  $svnrev = $svn[5];
  unset($svn);

  $svninfo = getInfoSvn();

//  print_r($svninfo);

  if (isset($svninfo['username']) and isset($svninfo['password'])){
    $svn_username = $svninfo['username'];
    $svn_password = $svninfo['password'];
  }else{
    $msj = "No se pudo encontra los datos de conexión a subversion (username, password)";
    pake_echo_action("siga_updater_v2", $msj);
    $exception = new Exception($msj);
    pake_exception_default_handler($exception);
  }

  if(!$rollback){
    pake_echo_action("siga_updater_v2",  "Actual ".$svnrev);
    $rev = explode(':', $svnrev);

    $cmmd = "export LC_CTYPE=en_US.UTF-8; yes 't' | 2>&1 svn update --username ". $svn_username ." --password ". $svn_password ." --no-auth-cache " . SF_ROOT_DIR;
    print("Comando: ".$cmmd.PHP_EOL);
    // Actualizar con subversion
    $revnew = shell_exec($cmmd);

    print_r($revnew);

    if (strstr($revnew,'En la revisión') == '' && strstr($revnew,'Updated to revision') == '' && strstr($revnew,'At revision')== '') {
      $msj = "no se pudo actualizar el código fuente, se aborta la actualización";
      pake_echo_action("siga_updater_v2", $msj);
      $exception = new Exception($msj);
      pake_exception_default_handler($exception);        
    }

    file_put_contents(SF_ROOT_DIR . "/.svn/updates", trim($rev[1]).PHP_EOL , FILE_APPEND | LOCK_EX);
    pake_echo_action("siga_updater_v2",  "Guardada ".$svnrev);

    //pake_echo_action("siga_updater_v2", $revnew);
  }else{
    $rev = last_revision();    

    if(is_numeric($rev)){
      pake_echo_action("siga_updater_v2",  "Actual ".$svnrev);
      pake_echo_action("siga_updater_v2",  "Devolviendo a la revisión: ".$rev);

      $cmmd = "export LC_CTYPE=en_US.UTF-8; yes 't' | 2>&1 svn update --revision ". $rev . " --username lhernandez --password cidesa0951 --no-auth-cache " . SF_ROOT_DIR;
      print("Comando: ".$cmmd.PHP_EOL);

      // Actualizar con subversion
      $revnew = shell_exec($cmmd);

      print_r($revnew);
      //pake_echo_action("siga_updater_v2", $revnew);

    }else{
      pake_echo_action("siga_updater_v2",  "Sin Revisión Previa ");
    }
  }

  // $revnew = svn_update(SF_ROOT_DIR);
  $svn = shell_exec('svn info ' . SF_ROOT_DIR);
  $svn = explode(PHP_EOL, $svn);
  $revnew = $svn[5];
  unset($svn);

  pake_echo_action("siga_updater",  "Actualizada a la ".$revnew);

  return $revnew;
}

function last_revision()
{
   $f = file_get_contents(SF_ROOT_DIR."/.svn/updates");
   $ff = explode(PHP_EOL,trim($f));
   return $ff[count($ff)-1];
}

function config_schema($connection, $schema)
{

  $conn = getInfoConnection($connection);

  $usuario = $conn['username'];
  $password = $conn['password'];
  $host = $conn['hostspec'];
  $database = $conn['database'];
  //$schema = $conn['schema'];

  $data = SF_ROOT_DIR.'/config/propel.ini';
  $propel = file($data);

  foreach ($propel as $i => $line){
    if(strstr($line, 'propel.database.url')) $propel[$i] = "propel.database.url        = pgsql://$usuario:$password@$host/$database?schema=$schema\n";
  }

  $content = implode("",$propel);
  $open = fopen($data,"w");
  fwrite($open,$content);

  return $conn;
}


function getInfoConnection($config = "propel")
{

  if(file_exists(SF_ROOT_DIR."/../configurations/databases.yml")) $database_config = SF_ROOT_DIR."/../configurations/databases.yml";
  else $database_config = SF_ROOT_DIR."/config/databases.yml";

  $database_config_yml = sfYamlNew::load($database_config);

  if(isset($database_config_yml['all'][$config])){
    return $database_config_yml['all'][$config]['param'];
  }else{
    $msj = "No se pudo encontra el databases.yml para obtener la información de conexión";
    $exception = new Exception($msj);
    pake_exception_default_handler($exception);
  }

}


function getInfoSvn()
{

  if(file_exists(SF_ROOT_DIR."/../configurations/app.yml")) $svn_config = SF_ROOT_DIR."/../configurations/app.yml";
  else $svn_config = SF_ROOT_DIR."/apps/autenticacion/config/app.yml";

  $svn_config_yml = sfYamlNew::load($svn_config);

  if(isset($svn_config_yml['all']['.apps']['svn'])){
    return $svn_config_yml['all']['.apps']['svn'];
  }else{
    $msj = "No se pudo encontra el app.yml para obtener la información de conexión svn";
    pake_echo_action("get-info-svn", $msj);
    $exception = new Exception($msj);
    pake_exception_default_handler($exception);
  }

}


function write_sqldbmap($conn = 'propel',  $addscrips = false)
{

  pake_echo_action('siga_updater', "Ajustando sqldb.map");

  $data = SF_ROOT_DIR.'/data/sql/sqldb.map';
  $propel = file($data);

  foreach ($propel as $i => $line){
    if($conn=='sima_user'){
      if(!strstr($line, 'sima_user')) $propel[$i] = "# ".$propel[$i]."\n";
      else $propel[$i] = $propel[$i]."\n";
    }else{
      if(strstr($line, 'sima_user')) $propel[$i] = "# ".$propel[$i]."\n";
      else $propel[$i] = $propel[$i]."\n";
    }
  }

  if($conn=='propel'){
    foreach (glob(SF_ROOT_DIR."/scripts/*.sql") as $filename) {
      copy($filename, SF_ROOT_DIR."/data/sql/".basename($filename));
      $propel[] = basename($filename). "=propel\n";
    }
  }

  $content = implode("",$propel);
  $open = fopen($data,"w");
  fwrite($open,$content);

}
