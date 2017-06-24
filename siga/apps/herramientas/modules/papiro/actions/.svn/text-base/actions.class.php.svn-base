<?php

/**
 * papiro actions.
 *
 * @package    siga
 * @subpackage papiro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class papiroActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {

    $module = $this->getRequestParameter('m', null);
    $app = $this->getRequestParameter('a', null);
    $peer_class = $this->getRequestParameter('p', null);
    $id = $this->getRequestParameter('id', null);
    $expediente = $this->getRequestParameter('expediente', null);
    $fileName = $this->getRequest()->getFileName('uploaded_data');
    if($fileName){
      $this->getRequest()->moveFile('uploaded_data', '/tmp/'.$fileName);  
    }
    

    $request_params = $this->getPostParams($peer_class, $app, $module, $id, $expediente);

    if($request_params){
      $api = new RestClient(array(
          'base_url' => $request_params['url'], 
          'headers' => array("Content-Type" => "multipart/form-data"), 
      ));

      $result = $api->post("api_documentos", array(
            "usuario[cedula]" => $request_params['cedula'],
            "documento[nombre]" => $request_params['nombre'],
            "revision[numero_revision]" => $request_params['numero_revision'],
            "revision[titulo]" => $request_params['titulo'],
            "revision[carpeta_id]" => $request_params['carpeta_id'],
            "revision[palabras_clave]" => $request_params['palabras_clave'],
            "revision[tipo_documento_id]" => $request_params['tipo_documento_id'],
            "revision[formato_id]" => $request_params['formato_id'],
            "revision[extension_id]" => $request_params['extension_id'],
            "revision[numero_expediente]" => isset($request_params['numero_expediente']) ? $request_params['numero_expediente'] : "" , 
            "revision[uploaded_data]" => "@/tmp/".$fileName
            )
      );

      $response = $this->parse_response($result);

      if(isset($response['error'])){
        $this->setFlash('notice', $response['error']);
      }else{
        if($this->saveDocumentoPapiro($response, $request_params['nombre'])){
          $this->setFlash('notice', 'El documento fue guardado en papiro satisfactoriamente');
        }else{
          $this->getRequest()->setError('uploaded_data',"Error al guardar el documento en Papiro, comuniquese con el administrador del sistema");
        }
      }

    }else{
      $this->result = null;
    }

    return $this->redirect($this->getRequest()->getReferer());
    
  }

  public function getPostParams($peer_class, $app, $module, $id, $expediente)
  {
    $result = array();
    
    $url = H::getConfApp2('url', 'herramientas', 'papiro');
    if($url) $result['url'] = $url;

    $usuario = H::getUsuarioActual();
    if($usuario) $result['cedula'] = $usuario->getCedemp();

    $c = new Criteria();
    $c->add($peer_class::ID, $id);
    $documento = $peer_class::doSelectOne($c);
    if($documento){
      $get_nombre = H::getConfApp2('papiro_get_nombre', $app, $module);
      $get_titulo = H::getConfApp2('papiro_get_titulo', $app, $module);
      $get_fecha_revision = H::getConfApp2('papiro_get_fecha_revision', $app, $module);
      $get_numero_expediente = H::getConfApp2('papiro_get_numero_expediente', $app, $module);
      $papiro_numero_revision = H::getConfApp2('papiro_numero_revision', $app, $module);
      $papiro_carpeta_id = H::getConfApp2('papiro_carpeta_id', $app, $module);
      $papiro_palabras_clave = H::getConfApp2('papiro_palabras_clave', $app, $module);
      $papiro_tipo_documento_id = H::getConfApp2('papiro_tipo_documento_id', $app, $module);
      $papiro_formato_id = H::getConfApp2('papiro_formato_id', $app, $module);
      $papiro_extension_id = H::getConfApp2('papiro_extension_id', $app, $module);

      if($url && $get_nombre && $get_titulo && $get_fecha_revision && $papiro_numero_revision && $papiro_carpeta_id && $papiro_palabras_clave && $papiro_tipo_documento_id && $papiro_formato_id && $papiro_extension_id){
        try{
          $get_nombre = "get".ucfirst($get_nombre);
          $result['nombre'] = $documento->$get_nombre();

          $get_titulo = "get".ucfirst($get_titulo);
          $result['titulo'] = substr($documento->$get_titulo(), 0, 255);

          $get_fecha_revision = "get".ucfirst($get_fecha_revision);
          $result['fecha_revision'] = $documento->$get_fecha_revision();

          if($expediente) $result['numero_expediente'] = $expediente;
          elseif($get_numero_expediente){
            $get_numero_expediente = "get".ucfirst($get_numero_expediente);
            $result['numero_expediente'] = $documento->$get_numero_expediente();
          }

          $result['numero_revision'] = $papiro_numero_revision;
          $result['carpeta_id'] = $papiro_carpeta_id;
          $result['palabras_clave'] = $papiro_palabras_clave;
          $result['tipo_documento_id'] = $papiro_tipo_documento_id;
          $result['formato_id'] = $papiro_formato_id;
          $result['extension_id'] = $papiro_extension_id;

          return $result;

        }catch(Exception $e){
          return false;
        }
      }else return false;
      
    }else return false;
  }

  public function parse_response($result)
  {

    $r = array();
    $response = (array)$result->response;
    $header = $response[0];


    $parsed = array_map(function($x) { return array_map("trim", explode(":", $x, 2)); }, array_filter(array_map("trim", explode("\n", $header))));
    //$parsed = $this->parseHeaders($header);
    $status = '';
    $download = '';
    $id = '';
    $show = '';
    $error = '';

    foreach($parsed as $p){
      if(isset($p[0])){
        if($p[0]=='Status'){
          $status = $p[1];
        }
        if($p[0]=='Dowload'){
          $download = $p[1];
        }
        if($p[0]=='Id'){
          $id = $p[1];
        }
        if($p[0]=='Show'){
          $show = $p[1];
        }
      }
    }
    if(isset($parsed[14])) $error = $parsed[14][0];


    if($status=='201 Created'){
      $r['download'] = $download;
      $r['show'] = $show;
      $r['id'] = $id;
    }else{
      $r['error'] = "Error al generar el documento en Papiro, comuniquese con el administrador del sistema";
      $r['mensaje'] = $error;
    }

//    print('<pre>');var_dump($parsed);
//    print('<pre>');var_dump($status);
//    print('<pre>');var_dump($error);
//    print('<pre>');var_dump($download);
//exit;


    return $r;
  }


function parseHeaders(array $headers, $header = null)
{
    $output = array();

    if ('HTTP' === substr($headers[0], 0, 4)) {
        list(, $output['status'], $output['status_text']) = explode(' ', $headers[0]);
        unset($headers[0]);
    }

    foreach ($headers as $v) {
        $h = preg_split('/:\s*/', $v);
        $output[strtolower($h[0])] = $h[1];
    }

    if (null !== $header) {
        if (isset($output[strtolower($header)])) {
            return $output[strtolower($header)];
        }

        return;
    }

    return $output;
}

  public function saveDocumentoPapiro($response, $coddoc){
    if(isset($response['id'])){
      $papiro = new Papiro();
      $papiro->setCoddoc($coddoc);
      $papiro->setDocumento($response['id']);
      if(isset($response['download'])) $papiro->setDownload($response['download']);
      if(isset($response['show'])) $papiro->setShow($response['show']);
      return $papiro->save();
    }else return false;
  }
}
