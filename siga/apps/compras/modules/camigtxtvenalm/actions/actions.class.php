<?php

/**
 * camigtxtvenalm actions.
 *
 * @package    siga
 * @subpackage camigtxtvenalm
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class camigtxtvenalmActions extends autocamigtxtvenalmActions
{

  public function executeIndex()
  {
    return $this->forward('camigtxtvenalm', 'edit');
  }

  public function editing()
  {

  }

  /**
   * FunciÃ³n principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->camigtxtven = $this->getCamigtxtvenOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCamigtxtvenFromRequest();

      if($this->saveCamigtxtven($this->camigtxtven) ==-1){
        {
          if ($this->cad=="")
             $this->setFlash('notice', 'Archivo fue Migrado Satisfactoriamente.');
          else $this->setFlash('notice', 'Archivo fue Migrado Parcialmente. Los Siguientes ArtÃ­culos no poseen equivalencia: '.$this->cad);

         $id= $this->camigtxtven->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('camigtxtvenalm/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('camigtxtvenalm/list');
        }
        else
        {
            return $this->redirect('camigtxtvenalm/edit?id='.$this->camigtxtven->getId());
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js=""; $dato="";
    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(CadefalmPeer::CODALM,$codigo);
        $reg= CadefalmPeer::doSelectOne($c);
        if ($reg)
        {
          if ($reg->getEsptoven())
            $dato=$reg->getNomalm();
          else
            $js="alert('El Almacen no esta clasificado como un Punto de Venta'); $('camigtxtven_codalm').value=''; $('camigtxtven_codalm').focus();";
        }else {
            $js="alert('El Almacen no existe'); $('camigtxtven_codalm').value=''; $('camigtxtven_codalm').focus();";
        }


        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;
    if($this->getRequest()->getMethod() == sfRequest::POST){
      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  protected function updateError()
  {
    $this->cad="";
    return true;
  }

  public function saving($clasemodelo)
  {
    $error=Compras::MigrarVentas($clasemodelo,$cadena, $caderr);
    $this->setFlash('error',$caderr);

    if($error==-1){
      if(count($caderr)>0){
        // Migrado con errores
        // Se genera el archivo .log
        $url = sfConfig::get('sf_upload_dir') . "//" . $clasemodelo->getArchivo();
        $md5arch = md5_file($url);
        if(!is_dir(sfConfig::get('sf_upload_dir') . '/errores')) mkdir(sfConfig::get('sf_upload_dir') . '/errores/');

        $this->setFlash('urlerror','http://'.$_SERVER['HTTP_HOST'].'/'.sfConfig::get('sf_upload_dir_name') . '/errores/'.$md5arch.'.err');
        $this->generarLog(sfConfig::get('sf_upload_dir') . '/errores/'.$md5arch.'.err',$caderr);
      }
    }

    $this->cad=$cadena;
    return $error;
  }


  public function executeAuto(){

    // Se busca la direccion base de las carpetas con la informacion a migrar
    $dirbase = sfConfig::get('app_dirbasemig');
    $nomarch = sfConfig::get('app_nomarchbase');
    $email = sfConfig::get('app_emailinfo');
    $urlbaseinfo = sfConfig::get('app_urlbaseinfo');

    $almcod = $this->getRequestParameter('codalm','000000');

    $log = array();
    $caderr = array();

    $id_err = 0;

    // Notas:
    // - El usuario www-data debe tener acceso de lectura y escritura en la carpeta $dirbase.
    // - Se buscaran en la direccion base por cada carpeta nombrada.
    // - La fecha de venta de la tabla Camigtxtven, será la fecha de creación del archivo a migrar.
    // - Se debe configurar en el archivo database.yml (configuration) el esquema correcto al cual se conectara la funcionalidad
    // - 

    if($dirbase && file_exists($dirbase)){

      if(mkdir($dirbase.'/test')){

        rmdir($dirbase.'/test');

        // Sin limite de uso de memoria
		    $limit_mem=-1;
        ini_set("memory_limit",$limit_mem);

        $c = new Criteria();
        $c->add(CadefalmPeer::ESPTOVEN,true);
        if($almcod!='000000') $c->add(CadefalmPeer::CODALM,$almcod);
        $almacenes = CadefalmPeer::doSelect($c);
        foreach($almacenes as $alm){

          $log[] = "";
          $log[] = "Procesando el almacen ".$alm->getCodalm().'-'.$alm->getNomalm();
          $codalm = $alm->getCodalm();
          $dir = $dirbase.'/'.$codalm;
          if(file_exists($dir)){

            $files = array();
            H::search_files($dir, $files, '.csv');

            foreach($files as $f){
              $archmig = $f;

              if(file_exists($archmig)){
                $caderr = array();
                $camigtxtven = new Camigtxtven();

                $camigtxtven->setCodalm($codalm);
                $camigtxtven->setFecven(filemtime($archmig));

                // Buscamos el nombre del archivo
                $arr_name = H::f_name($archmig);

                // buscamos la direcci�n del archivo
                $dir_name = H::d_name($archmig);

                $id_err++;

                $archlog = date('dmyhi').'_'.$id_err;

                // Renombramos el archivo procesado
                copy($archmig, $dir_name.$arr_name[0].'_'.$archlog.'.pro');

                $caderr[] = "Registros Sin Codigo SIGA\r\n";
                $caderr[] = "Archivo: ".$archmig."\r\n";
                $caderr[] = "Fecha: ".$camigtxtven->getFecven()."\r\n";
                $caderr[] = "Almacen: ".$codalm."\r\n";
                $error=Compras::MigrarVentas($camigtxtven,$cadena, $caderr, $archmig);

                if($error==-1){
                  if(count($caderr)>4){
                    // Migrado con errores
                    // Se genera el archivo .log
                    $log[] = "Archivo ".$arr_name[0].".".$arr_name[1]." Migrado con errores. Verifique el Archivo  <a href='$urlbaseinfo/$codalm/$arr_name[0]_$archlog.err'> $arr_name[0]_$archlog.err </a> para mayor detalle";
                    $this->generarLog($dir.'/'.$arr_name[0].'_'.$archlog.'.err',$caderr);

                  }else{
                    // Migrado Sin Errores. No se genera el archivo .log
                    $log[] = "Archivo ".$arr_name[0].".".$arr_name[1]." Migrado/Analizado sin errores.";
                  }
                }else{
                  // No se pudo migrar
                  // Se genera el archivo .log
                  $log[] = "Error al Migrar un articulo. Verifique el Archivo <a href='$urlbaseinfo/$codalm/$arr_name[0].'_'.$archlog.log'> $arr_name[0]_$archlog.log </a> para mayor detalle";
                  $this->generarLog($dir.'/'.$arr_name[0].'_'.$archlog.'.log', array(H::obtenerMensajeError($error)));
                  unlink($dir.'/'.$arr_name[0].'_'.$archlog.'.pro');
                }

                unset($archmig);
                unset($caderr);
                unset($camigtxtven);
                unset($dir_relativa);
                unset($arr_name);
                unset($dir_name);
                unset($archlog);
                unset($error);


              }else {
                $log[] = "No existe información en la carpeta $dir que migrar para el almacen $codalm.";
                $log[] = "Almacen $codalm procesado.";
              }


            }
            $log[] = "Almacen $codalm procesado.";
          }else{
            $log[] = "No existe información en la carpeta $dir que migrar para el almacen $codalm.";
            $log[] = "Almacen $codalm procesado.";
            mkdir ($dir);
          }

          unset($codalm);
          unset($dir);
          unset($files);
        }

      }else{
        $log[] = 'El usuario de apache (www-data) no tiene permiso para escribir en la carpeta base ('.$dirbase.')';
        $log[] = 'Se aborto el proceso de migración.';
      }


    }
    else{
      $log[] = 'No se encontro la dirección/nombre base para procesar la migración';
      $log[] = 'Se aborto el proceso de migración.';
    }

    // Creamos el archivo .html
    
    // Se verifica la carpeta de informenes
    if(!file_exists($dirbase.'/informes')) mkdir ($dirbase.'/informes');

    $respuesta = $this->getResponse();

    $id_err++;

    $respuesta->setHttpHeader('Content-Disposition', 'attachment; filename='.$almcod.'_'.date('dmyhi').'_'.$id_err.'.html');

    $this->log = $log;

  }

  private function generarLog($archivo, $info){
    $ddf = fopen($archivo,'a');
    foreach ($info as $inf){
      fwrite($ddf,$inf);
    }
    fclose($ddf);
  }

}
