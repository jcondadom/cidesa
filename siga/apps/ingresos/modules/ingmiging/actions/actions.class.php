<?php

/**
 * ingmiging actions.
 *
 * @package    siga
 * @subpackage ingmiging
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class ingmigingActions extends autoingmigingActions
{

  public function executeList()
  {
    $this->redirect('ingmiging/create');
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

  protected function updateCiregingFromRequest()
  {    
    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('cireging[archixls]'))
    {
        $fileName = "archivo_excel.xls";     
        $this->getRequest()->moveFile('cireging[archixls]', sfConfig::get('sf_upload_dir')."/assets/".$fileName);                       
    }
  } 

  public function configGrid($valor='')
  {
    $per = array();
    if ($valor!='')
      $per=Ingresos::CargarIngresos();

    $this->datos=$per;

    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(false);
    $opciones->setFilas(0);
    $opciones->setTabla('Cireging');
    $opciones->setName('a');
    $opciones->setAnchoGrid(900);
    $opciones->setAncho(800);
    $opciones->setTitulo('Ingresos');
    $opciones->setHTMLTotalFilas(' ');

    $this->totfil=count($per);
  
    // Se configuran las columnas
    $col1 = new Columna('Fecha de Ingreso');
    $col1->setTipo(Columna::FECHA);
    $col1->setEsGrabable(true);        
    $col1->setNombreCampo('fecing');
    $col1->setHTML('readonly="true"');
    
    $col2 = new Columna('Parque');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('codpar');
    $col2->setHTML('type="text" size="5" readonly="true"');

    $col3 = new Columna('Descripción');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(false);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('despar');
    $col3->setHTML('type="text" size="30" readonly="true"');      

    $col4 = new Columna('Monto Ingreso');
    $col4->setTipo(Columna::MONTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('moning');
    $col4->setHTML('type="text" size="10" readonly="true"');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);

    $this->cireging->setGrid($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $sw=true; $js="";

    switch ($ajax){
      case '2':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '1':
        $sw=false;
        try  {
          //Verifcamos si existe la tabla temporal. En caso de que no se crea
          $sql = "select id,mes,codpar,codrub,fecdep,numdep,codban,monmov, region, fecren, funcionario from tmpingresos";
          if (Herramientas::BuscarDatos($sql,$npnomina))
          {
              $tabla=true;
              if (count($npnomina)>0) {
               $sql = "delete from tmpingresos";
               Herramientas::insertarRegistros($sql);
              }
          }else
                $tabla=false;
        }catch(Exception $ex){
          $sql = "CREATE TABLE tmpingresos (id int4 NOT NULL,
                                      mes VARCHAR(2) NOT NULL,
                                      codpar VARCHAR(5) NOT NULL,
                                      codrub VARCHAR(6) NOT NULL,
                                      fecdep DATE NOT NULL,
                                      numdep VARCHAR(20) NOT NULL,
                                      codban VARCHAR(30) NOT NULL,
                                      monmov NUMERIC (14,2) NOT NULL,
                                      region VARCHAR(50) NOT NULL,
                                      fecren DATE NOT NULL,
                                      funcionario VARCHAR(50) NOT NULL
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
            $col2=$dat[4];
            $col3=$dat[11];                 
          }else {
            $r++;
            $mes=H::ObtenerMesenNumero($dat[1]);
            $codpar=$dat[4];
            $codrub=substr($dat[11],3,3);
            //$dateFormat = new sfDateFormat('es_VE');
            //$fecdep = $dateFormat->format($dat[13], 'i', $dateFormat->getInputPattern('d'));
            $numdep=$dat[14];
            $codban=$dat[15];
            $region=$dat[3];
//            $dateFormat = new sfDateFormat('es_VE');
            //$fecren = $dateFormat->format($dat[7], 'i', $dateFormat->getInputPattern('d'));
            $monmov=H::toFloat($dat[16]);
            $fun=$dat[2];

            $fecdep=date('Y-m-d');
            $fecren=date('Y-m-d');

            $exipar=H::getX_vacio('CODPAR', 'Cidefpar', 'DESPAR', $codpar);
            if ($exipar!='') {
              $exirub=H::getX_vacio('CODTIPRUB','Citiprub','Codpre',$codrub);
              if ($exirub!=''){
                $exicodpre=H::getX_vacio('CODPRE','Cideftit','Codcta',$exirub);
                if ($exicodpre!=''){
                  $exicodcta=H::getX_vacio('CODCTA','Contabb','Codcta',$exicodpre);
                  if ($exicodcta!=''){
                    $numcue=H::getX_vacio('CODBAN','Cibanco','Numcue',$codban);
                    if ($numcue!=''){
                      $ctanum=H::getX_vacio('NUMCUE','Tsdefban','Codcta',$numcue);
                      if ($ctanum!=''){
                        $exictanum=H::getX_vacio('CODCTA','Contabb','Codcta',$ctanum);
                        if ($exictanum!=''){
                          $sql="INSERT INTO tmpingresos(id, mes, codpar, codrub, fecdep, numdep, codban, monmov, region, fecren, funcionario)
                                VALUES ($r, '".$mes."', '".$codpar."', '".$codrub."', '$fecdep', '".$numdep."', '".$codban."', $monmov,'".$region."','$fecren','".$fun."');";
                          H::insertarRegistros($sql);

                        }else {
                          $pos=Ingresos::posicion_en_el_grid($perval,$mes,$codpar);
                          if ($pos==0){
                            $b=count($perval)+1;
                            $perval[$b-1]["fecing"]=$mes;
                            $perval[$b-1]["codpar"]=$codpar;   
                          }                  
                        }
                      }else {
                        $pos=Ingresos::posicion_en_el_grid($perval,$mes,$codpar);
                          if ($pos==0){
                            $b=count($perval)+1;
                            $perval[$b-1]["fecing"]=$mes;
                            $perval[$b-1]["codpar"]=$codpar;   
                          } 
                      }
                    }else {
                      $pos=Ingresos::posicion_en_el_grid($perval,$mes,$codpar);
                      if ($pos==0){
                        $b=count($perval)+1;
                        $perval[$b-1]["fecing"]=$mes;
                        $perval[$b-1]["codpar"]=$codpar;   
                      } 
                    }
                  }else {
                    $pos=Ingresos::posicion_en_el_grid($perval,$mes,$codpar);
                    if ($pos==0){
                      $b=count($perval)+1;
                      $perval[$b-1]["fecing"]=$mes;
                      $perval[$b-1]["codpar"]=$codpar;   
                    } 
                  }
                }else {
                  $pos=Ingresos::posicion_en_el_grid($perval,$mes,$codpar);
                  if ($pos==0){
                    $b=count($perval)+1;
                    $perval[$b-1]["fecing"]=$mes;
                    $perval[$b-1]["codpar"]=$codpar;   
                  } 
                }
              }else {
                $pos=Ingresos::posicion_en_el_grid($perval,$mes,$codpar);
                if ($pos==0){
                  $b=count($perval)+1;
                  $perval[$b-1]["fecing"]=$mes;
                  $perval[$b-1]["codpar"]=$codpar;   
                } 
              }
            }else {
              $pos=Ingresos::posicion_en_el_grid($perval,$mes,$codpar);
              if ($pos==0){
                $b=count($perval)+1;
                $perval[$b-1]["fecing"]=$mes;
                $perval[$b-1]["codpar"]=$codpar;   
              } 
            }
          }         
        }
        unlink($currentFile);           

        if (count($perval)>0) {
          $a=0;
          while ($a<count($perval)){
            $cadena=$cadena.' '.$perval[$a]["mes"].'-'.$perval[$a]["codpar"];
            $a++;
          }
          $js="alert('Los siguientes ingresos no pueden ser migrados: $cadena .Revisar que los Titulos Presupuestarios y Cuentas Bancarias Existan y tengan asociados Cuentas Contables que existan')";
        }
      }else {
        $js="alert('Debe existir un archivo cargado previamente');";        
      }     

      $this->cireging = $this->getCiregingOrCreate();
      $this->updateCiregingFromRequest();
      $this->labels = $this->getLabels();
      $this->params=array();

      $this->configGrid('1');

      //Eliminamos la Tabla Temporal
      /*$sql="select codpar from tmpingresos";
      if (!(Herramientas::BuscarDatos($sql,$tabla)))
      {
        $sql = "drop table tmpingresos";
        Herramientas::insertarRegistros($sql);
      }*/
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

      $p= new Criteria();
      $p->add(CidefnivPeer::CODEMP,'001');
      $regp= CidefnivPeer::doSelectOne($p);
      if ($regp){
        if ($regp->getRifcon()=='' || $regp->getTipmov()=='' || $regp->getCodtip()==''){
           $this->coderr=1521;
           return false;
        }        
      }
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
    Ingresos::MigrarIngresos($grid);

    //Eliminamos la Tabla Temporal
    $sql="select codpar from tmpingresos";
    if (!(Herramientas::BuscarDatos($sql,$tabla)))
    {
      $sql = "drop table tmpingresos";
      Herramientas::insertarRegistros($sql);
    }
    return -1;
  }
}
