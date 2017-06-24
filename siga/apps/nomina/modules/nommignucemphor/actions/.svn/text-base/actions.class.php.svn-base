<?php

/**
 * nommignucemphor actions.
 *
 * @package    siga
 * @subpackage nommignucemphor
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nommignucemphorActions extends autonommignucemphorActions
{

   private $dir="";

  public function executeList()
  {
    $this->redirect('nommignucemphor/create');
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

  protected function updateNpnucemphorFromRequest()
  {    
      if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('npnucemphor[archixls]'))
      {
          $fileName = "archivo_excel.xls";     
          $this->getRequest()->moveFile('npnucemphor[archixls]', sfConfig::get('sf_upload_dir')."/assets/".$fileName);                        
      }
  }   

  public function configGridDatos($per=array())
  {                 
   // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setFilas(0);
    $opciones->setTabla('Npnucemphor');
    $opciones->setName('a');
    $opciones->setAnchoGrid(900);
    $opciones->setAncho(900);
    $opciones->setTitulo(' ');
    $opciones->setHTMLTotalFilas(' ');

    $this->totfil=count($per);

    // Se generan las columnas
    $col1 = new Columna('Núcleo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codniv');
    $col1->setHTML('type="text" size="10" readonly="true"');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(false);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('desniv');
    $col2->setHTML('type="text" size="30" readonly="true"');
  
    $col3 = new Columna('Código Concepto');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codcon');
    $col3->setHTML('type="text" size="10" readonly="true"');

    $col4 = new Columna('Nombre');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(false);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('nomcon');
    $col4->setHTML('type="text" size="40" readonly="true"');
    
    $col5 = new Columna('Código Empleado');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('codemp');
    $col5->setHTML('type="text" size="10" readonly="true"');

    $col6 = new Columna('Nombre');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(false);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setNombreCampo('nomemp');
    $col6->setHTML('type="text" size="40" readonly="true"');
    
    $col7 = new Columna('Cantidad');
    $col7->setTipo(Columna::MONTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('canhor');
    $col7->setHTML('type="text" size="10" readonly="true"');

    $col8 = new Columna('Fecha');
    $col8->setTipo(Columna::FECHA);
    $col8->setEsGrabable(true);
    $col8->setHTML('readonly="true"');
    $col8->setVacia(true);
    $col8->setNombreCampo('fecreg');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);

    $this->npnucemphor->setObj($this->obj);
  
  }

public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    switch ($ajax){
      case '1':
        $per=array();
        $js="";
        $emp="";
        $this->npnucemphor = $this->getNpnucemphorOrCreate();
        $this->updateNpnucemphorFromRequest();        
        
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('CP1251'); 
        $currentFile = sfConfig::get('sf_upload_dir')."/assets/archivo_excel.xls";
        if (is_file($currentFile))
        {
          $data->read($currentFile);      
      
        $r=0;
        $col1="";
        $col2=""; 
        $codnuc="";  $codcon=""; $codemp="";  $cant="";
        $cont=0;
        //H::PrintR($data->sheets[0]['cells']); exit;
        foreach($data->sheets[0]['cells'] as $dat){          
            if(empty($col1) || empty($col2))
            {             
              $col1=$dat[1];
              $col2=$dat[2];
             
              $sql1 = "select * from information_schema.columns  
              where 
              table_name='npnucemphor' and column_name='".$col1."'";
                    
                    $sql2 = "select * from information_schema.columns  
              where         
              table_name='npnucemphor' and column_name='".$col2."'";              
              
              if(!H::BuscarDatos($sql1,$rs))
              {
                $js="alert('La Columna $col1 no existe en la tabla NPNUCEMPHOR ');";
                break;  
              }
              if(!H::BuscarDatos($sql2,$rs))
              {
                $js="alert('La Columna $col2 no existe en la tabla NPNUCEMPHOR ');";
                break;  
              }             
            }           
            else
            {
              $c = new Criteria();
              $c->add(NpestorgPeer::CODNIV,$dat[1]);              
              $objnuc = NpestorgPeer::doSelectOne($c);
              if($objnuc)
              {
                $c = new Criteria();
                $c->add(NpdefcptPeer::CODCON,$dat[2]);              
                $objcon = NpdefcptPeer::doSelectOne($c);
                if($objcon)
                {
                  $c = new Criteria();
                  $c->add(NphojintPeer::CODEMP,$dat[3]);              
                  $objemp = NphojintPeer::doSelectOne($c);
                  if ($objemp) {
                    $q= new Criteria();
                    $q->add(NpasonucempPeer::CODNIV,$dat[1]);
                    $q->add(NpasonucempPeer::CODEMP,$dat[3]);
                    $regq=NpasonucempPeer::doSelectOne($q);
                    if ($regq){
                      if(is_numeric($dat[4]))
                      {
                        $c = new Criteria();
                        $c->add(NpasicarempPeer::CODEMP,$dat[3]);
                        $c->add(NpasicarempPeer::STATUS,'V');
                        $c->add(NpasiconnomPeer::CODCON,$dat[2]);
                        $c->addJoin(NpasiconnomPeer::CODNOM,NpasicarempPeer::CODNOM);
                        $objjoin = NpasicarempPeer::doSelectOne($c);
                        if($objjoin){        
                          $dateFormat = new sfDateFormat('es_VE');
                          $fec1 = $dateFormat->format($dat[5], 'i', $dateFormat->getInputPattern('d'));
                            $l= new Criteria();
                            $l->add(NpnominaPeer::CODNOM,$objjoin->getCodnom());
                            $l->add(NpnominaPeer::ULTFEC,$fec1,Criteria::LESS_EQUAL);
                            $l->add(NpnominaPeer::PROFEC,$fec1,Criteria::GREATER_EQUAL);
                            $regl= NpnominaPeer::doSelectOne($l);
                            if ($regl) {
                              $per[$r]['codniv']=$dat[1];
                              $per[$r]['desniv']=$objnuc->getDesniv();
                              $per[$r]['codcon']=$dat[2];
                              $per[$r]['nomcon']=$objcon->getNomcon();
                              $per[$r]['codemp']=$dat[3];
                              $per[$r]['nomemp']=$objemp->getNomemp();
                              $per[$r]['canhor']=H::FormatoMonto($dat[4]);                       
                              $per[$r]['fecreg']=$fec1;    
                              $per[$r]['id']=9;
                              $r++;        
                            }else {  $codcon=='' ? $codcon=$dat[1].'-'.$dat[2] : $codcon=$codcon.', '.$dat[1].'-'.$dat[2]; $fec=$dat[5]; $nom=$objjoin->getCodnom();
                              $js="alert_('La Fecha de Registro de las Horas $fec no esta dentro del rango definido de la N&oacute;mina $nom ');"; } 
                        }else {  $codcon=='' ? $codcon=$dat[1].'-'.$dat[2] : $codcon=$codcon.', '.$dat[1].'-'.$dat[2];
                          $js="alert('Algunos Conceptos no estan asociados a la nomina que pertence el empleado o el Empleado no ha sido asignado a ninguna nomina $codcon');"; }
                      }else {  $cant=='' ? $cant=$dat[3].'-'.$dat[4] : $cant=$cant.', '.$dat[3].'-'.$dat[4];
                        $js="alert_('Existen Cantidades que no cumplen con Formato Num&eacute;rico $cant');"; }
                    }else {
                      $codemp=='' ? $codemp=$dat[3] : $codemp=$codemp.', '.$dat[3];
                        $js="alert_('Existen Empleados que no tienen asociado el n&uacute;cleo $codemp');"; 
                    }

                  }else {  $codemp=='' ? $codemp=$dat[3] : $codemp=$codemp.', '.$dat[3];
                        $js="alert_('Existen Empleados Incorrectos $codemp');"; }
                }else {  $codcon=='' ? $codcon=$dat[1].'-'.$dat[2] : $codcon=$codcon.', '.$dat[1].'-'.$dat[2];
                  $js="alert_('Existen Conceptos Incorrectos $codcon');"; }
              }else {  $codnuc=='' ? $codnuc=$dat[1] : $codnuc=$codnuc.', '.$dat[1];
                $js="alert_('Existen N&uacute;cleos Incorrectos $codnuc');";  }
            }         
      }
      unlink($currentFile);     
       
      }else
      {
        $js="alert('Debe existir un archivo cargado previamente');";
        
      }
            
        $this->configGridDatos($per);
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        
        break;
      default:    
        
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->datos=$per;
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');    
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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
    $this->configGridDatos();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
  }

  public function saving($clasemodelo)
  {
    $this->configGridDatos();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    $nivel=""; $concepto=""; $id=""; $tot=0; $y=0; 
    $totreg=count($grid[0]);
    if(count($grid[0])>=1)
    {
      foreach($grid[0] as $reg)
      {         
        $y++;
        if ($nivel.'-'.$concepto!=$reg['codniv'].'-'.$reg['codcon'])
        {
            if ($id!=''){
              $ck = new Criteria();
              $ck->add(NpnucemphorPeer::ID,$id);
              $regmod=NpnucemphorPeer::doSelectOne($ck); 
              if ($regmod){
                $regmod->setTothor($tot);
                $regmod->save();
                $tot=0;
              }
            }
            $c = new Criteria();
            $c->add(NpnucemphorPeer::CODNIV,$reg['codniv']);
            $c->add(NpnucemphorPeer::CODCON,$reg['codcon']);
            //$c->add(NpnucemphorPeer::FECREG,date('Y-m-d'));
            $c->add(NpnucemphorPeer::FECREG,$reg['fecreg']);
            $obj = NpnucemphorPeer::doSelectOne($c); 
            if (!$obj)
            {
               $newreg= new Npnucemphor();
               $newreg->setCodniv($reg['codniv']);
               $newreg->setCodcon($reg['codcon']);
               $newreg->setFecreg($reg['fecreg']);
               $newreg->save();
               $id=$newreg->getId();
            }

          $nivel=$reg['codniv'];            
          $concepto=$reg['codcon'];
        }
        
        $c2 = new Criteria();
        $c2->add(NpdetnucemphorPeer::CODNIV,$reg['codniv']);
        $c2->add(NpdetnucemphorPeer::CODCON,$reg['codcon']);
        $c2->add(NpdetnucemphorPeer::CODEMP,$reg['codemp']);
//        $c2->add(NpdetnucemphorPeer::FECREG,date('Y-m-d'));
        $c2->add(NpdetnucemphorPeer::FECREG,$reg['fecreg']);
        $obj2 = NpdetnucemphorPeer::doSelectOne($c2);  
        if(!$obj2)
        {
           $newreg2= new Npdetnucemphor();
           $newreg2->setCodniv($reg['codniv']);
           $newreg2->setCodcon($reg['codcon']);
           $newreg2->setCodemp($reg['codemp']);
           $newreg2->setCanhor($reg['canhor']);
           $newreg2->setFecreg($reg['fecreg']);
           $newreg2->save();
           $tot+=H::toFloat($reg['canhor']);

        }else $this->dir=$this->dir.", ".$reg['codniv'].'-'.$reg['codcon'].'-'.$reg['codemp'];
        if ($id!='' && $totreg==$y && !($nivel.'-'.$concepto!=$reg['codniv'].'-'.$reg['codcon'])){
              $ck = new Criteria();
              $ck->add(NpnucemphorPeer::ID,$id);
              $regmod=NpnucemphorPeer::doSelectOne($ck); 
              if ($regmod){
                $regmod->setTothor($tot);
                $regmod->save();
                $tot=0;
              }
            }
      }     
      return '-1';
    }else
      return '-1';
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->npnucemphor = $this->getNpnucemphorOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpnucemphorFromRequest();

      if($this->saveNpnucemphor($this->npnucemphor) ==-1){
      {
          if ($this->dir!='')
            $this->setFlash('notice', 'Los Siguientes datos no se migraron:'. $this->dir);
          else
            $this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->npnucemphor->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('nommignucemphor/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('nommignucemphor/list');
        }
        else
        {
            return $this->redirect('nommignucemphor/edit?id='.$this->npnucemphor->getId());
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

}
