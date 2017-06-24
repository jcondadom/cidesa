<?php

/**
 * tesmigmovlib actions.
 *
 * @package    siga
 * @subpackage tesmigmovlib
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesmigmovlibActions extends autotesmigmovlibActions
{

  public function executeList()
  {
    $this->redirect('tesmigmovlib/create');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $currentFile = sfConfig::get('sf_upload_dir')."/assets/archivo_excel.xls";
    $arc='N';
    if (is_file($currentFile))
      $arc='S';
    $this->params=array('archivo'=>$arc);

  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el obejto del modelo base del formulario.
   *
   */
  protected function updateTsmovlibFromRequest()
  {
    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('tsmovlib[archixls]'))
    {
        $fileName = "archivo_excel.xls";     
        $this->getRequest()->moveFile('tsmovlib[archixls]', sfConfig::get('sf_upload_dir')."/assets/".$fileName);                       
    }

  }

  public function configGrid($valor='')
  {
    $per = array();
    $cad='';
    if ($valor!='')
      $per=Tesoreria::CargarMovLib($cad);

    $this->datos=$per;

    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(false);
    $opciones->setFilas(0);
    $opciones->setTabla('Tsmovlib');
    $opciones->setName('a');
    $opciones->setAnchoGrid(900);
    $opciones->setAncho(800);
    $opciones->setTitulo('Movimientos en Libros');
    $opciones->setHTMLTotalFilas(' ');

    $this->totfil=count($per);

    $this->movrep=$cad;

    // Se configuran las columnas
    $col1 = new Columna('Cuenta Bancaria');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('numcue');
    $col1->setHTML('type="text" size="20" readonly="true"');

    $col2 = new Columna('Referencia');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('reflib');
    $col2->setHTML('type="text" size="10" readonly="true"');  

    $col3 = new Columna('Fecha');
    $col3->setTipo(Columna::FECHA);
    $col3->setEsGrabable(true);        
    $col3->setNombreCampo('feclib');
    $col3->setHTML('size="10" readonly="true"');
    
    $col4 = new Columna('Tipo');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('tipmov');
    $col4->setHTML('type="text" size="10" readonly="true"');

    $col5 = new Columna('Descripción');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::IZQUIERDA);
    $col5->setAlineacionContenido(Columna::IZQUIERDA);
    $col5->setNombreCampo('deslib');
    $col5->setHTML('type="text" size="30" readonly="true"');      

    $col6 = new Columna('Monto');
    $col6->setTipo(Columna::MONTO);
    $col6->setEsGrabable(true);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setNombreCampo('monmov');
    $col6->setHTML('type="text" size="10" readonly="true"');

    $col7 = new Columna('Beneficiario');
    $col7->setTipo(Columna::TEXTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('cedrif');
    $col7->setHTML('type="text" size="10" readonly="true"');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);

    $this->tsmovlib->setGrid($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $sw=true; $js="";

    switch ($ajax){
      case '1':
        $sw=false;
        try  {
          //Verificamos si existe la tabla temporal. En caso de que no se crea
          $sql = "select id,numcue,reflib,feclib,tipmov,deslib,monmov,cedrif from tmpmovlibexc";
          if (Herramientas::BuscarDatos($sql,$result))
          {
              $tabla=true;
              if (count($result)>0) {
               $sql = "delete from tmpmovlibexc";
               Herramientas::insertarRegistros($sql);
              }
          }else
                $tabla=false;
        }catch(Exception $ex){
          $sql = "CREATE TABLE tmpmovlibexc (id int4 NOT NULL,
                                      numcue VARCHAR(20) NOT NULL,
                                      reflib VARCHAR(20) NOT NULL,                                      
                                      feclib DATE NOT NULL,
                                      tipmov VARCHAR(4) NOT NULL,
                                      deslib VARCHAR(4000) NOT NULL,
                                      cedrif VARCHAR(15) NOT NULL,
                                      monmov NUMERIC (14,2) NOT NULL
                                      ) WITHOUT OIDS";
          Herramientas::insertarRegistros($sql);
          $tabla=false;
        }

      //Se graban los datos del archivo excel a la tabla temporal
      $data = new Spreadsheet_Excel_Reader();
      $data->setOutputEncoding('CP1251'); 
      $currentFile = sfConfig::get('sf_upload_dir')."/assets/archivo_excel.xls";
      if (is_file($currentFile))
      {
        $data->read($currentFile);    
        $r=0;
        $col1="";
        $col2="";
        $col3="";     
        $cadena="";     
        $pos=0;
        $perval=array();
        foreach($data->sheets[0]['cells'] as $dat){          
          if(empty($col1) || empty($col2) || empty($col3)){             
            $col1=$dat[1];
            $col2=$dat[2];
            $col3=$dat[3];                 
          }else {
            $r++;
            $numcue=trim($dat[1]);
            $dateFormat = new sfDateFormat('es_VE');
            $feclib = $dateFormat->format($dat[2], 'i', $dateFormat->getInputPattern('d'));
            $reflib=trim($dat[6]);
            $cedrif=trim($dat[3]);
            $tipmov=trim($dat[4]);
            $deslib=$dat[5];
            $monmov=H::toFloat($dat[7]);
          
            $ctanum=H::getX_vacio('NUMCUE','Tsdefban','Codcta',$numcue);
            if ($ctanum!='') {
              $exitip=H::getX_vacio('CODTIP','Tstipmov','Codtip',$tipmov);
              if ($exitip!=''){    
                $exiben=H::getX_vacio('CEDRIF','Opbenefi','Cedrif',$cedrif);
                if ($exiben!=''){              
                  $sql="INSERT INTO tmpmovlibexc(id, numcue, reflib, feclib, tipmov, deslib, cedrif, monmov)
                        VALUES ($r, '".$numcue."', '".$reflib."', '".$feclib."', '$tipmov', '".$deslib."', '".$cedrif."', $monmov);";
                  H::insertarRegistros($sql);      
                }else {
                  print 'No bene';
                  $pos=Tesoreria::posicion_en_el_grid_lib($perval,$numcue,$tipmov,$cedrif);
                  if ($pos==0){
                    $b=count($perval)+1;
                    $perval[$b-1]["numcue"]=$numcue;
                    $perval[$b-1]["reflib"]=$reflib;   
                    $perval[$b-1]["tipmov"]=$tipmov;   
                    $perval[$b-1]["cedrif"]=$cedrif;   
                  } 
                }    
              }else {
                print 'No tipmov';
                $pos=Tesoreria::posicion_en_el_grid_lib($perval,$numcue,$tipmov,$cedrif);
                  if ($pos==0){
                    $b=count($perval)+1;
                    $perval[$b-1]["numcue"]=$numcue;
                    $perval[$b-1]["reflib"]=$reflib;   
                    $perval[$b-1]["tipmov"]=$tipmov;  
                    $perval[$b-1]["cedrif"]=$cedrif;    
                  } 
              }
            }else {
              print 'No cuenta';
              $pos=Tesoreria::posicion_en_el_grid_lib($perval,$numcue,$tipmov,$cedrif);
              if ($pos==0){
                $b=count($perval)+1;
                $perval[$b-1]["numcue"]=$numcue;
                $perval[$b-1]["reflib"]=$reflib;   
                $perval[$b-1]["tipmov"]=$tipmov;   
                $perval[$b-1]["cedrif"]=$cedrif;   
              } 
            }
          }         
        }
        unlink($currentFile);           

        if (count($perval)>0) {
          $a=0;
          while ($a<count($perval)){
            $cadena=$cadena.' '.$perval[$a]["numcue"].'-'.$perval[$a]["reflib"].'-'.$perval[$a]["tipmov"].' - '.$perval[$a]["cedrif"];
            $a++;
          }
          $js="alert('Los siguientes Movimientos en Libros no pueden ser migrados: $cadena .Revisar que las Cuentas Bancarias, Beneficiarios y Tipos de Movimientos Existan'); ";
        }
      }else {
        $js="alert('Debe existir un archivo cargado previamente');";        
      }     

      $this->tsmovlib = $this->getTsmovlibOrCreate();
      $this->updateTsmovlibFromRequest();
      $this->labels = $this->getLabels();
      $this->params=array();

      $this->configGrid('1');

      $movrepetidos=$this->movrep;
      if ($movrepetidos!='')
        $js.=" alert('Los siguientes Movimientos estaban repetidos: $movrepetidos'); ";

      $js.="$('salvar').show(); $('cargar').hide(); $('leer').hide()";

      $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if ($sw) return sfView::HEADER_ONLY;
  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
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

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
  }

  public function saving($clasemodelo)
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    Tesoreria::MigrarMovLibExcel($grid);

    try  {
    //Eliminamos la Tabla Temporal
    $sql="select numcue from tmpmovlibexc";
    if (!(Herramientas::BuscarDatos($sql,$tabla)))
    {
      $sql = "drop table tmpmovlibexc";
      Herramientas::insertarRegistros($sql);
    }
    }catch(Exception $ex){}
    return -1;
  }


}
