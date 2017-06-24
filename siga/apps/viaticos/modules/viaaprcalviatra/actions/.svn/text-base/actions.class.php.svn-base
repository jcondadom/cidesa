<?php

/**
 * viaaprcalviatra actions.
 *
 * @package    siga
 * @subpackage viaaprcalviatra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class viaaprcalviatraActions extends autoviaaprcalviatraActions
{
  private $dir="";
  
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function executeList()
  {
    return $this->forward('viaaprcalviatra', 'edit');
  }

  public function executeCreate()
  {
    return $this->forward('viaaprcalviatra', 'edit');
  }

  public function executedelete()
  {
    return $this->forward('viaaprcalviatra', 'edit');
  }
  public function configGrid($fecdes="", $fechas="", $reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'viaticos', 'viasolviatra');
     
     if ($fecdes!="" && $fechas!="") {
         $c = new Criteria();     
         $c->add(ViacalviatraPeer::STATUS,'P');
         $c->add(ViacalviatraPeer::VERIFICADO,'S');
         if ($filsoldir=='S'){
           $this->sql='viacalviatra.feccal>=\''.$fecdes.'\' and viacalviatra.feccal<=\''.$fechas.'\' and viasolviatra.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
           $c->add(ViacalviatraPeer::FECCAL,$this->sql,Criteria::CUSTOM); 
           $c->addJoin(ViacalviatraPeer::REFSOL,ViasolviatraPeer::NUMSOL); 
         }else {
          $this->sql="viacalviatra.feccal>='".$fecdes."' and viacalviatra.feccal<='".$fechas."'";
          $c->add(ViacalviatraPeer::FECCAL,$this->sql, Criteria::CUSTOM);
         }
         $c->addAscendingOrderByColumn(ViacalviatraPeer::NUMCAL);
         $reg = ViacalviatraPeer::doSelect($c);
     }
     
     //$this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viaaprcalviatra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
     #$this->obj[1][1]->setHtml('size=40 maxlength=250 onBlur="if($(id).value!=\'\')cambiardescripcion(this.id)"');
     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/viaaprcalviatra/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');
     $cambiareti=H::getConfApp2('cameti', 'viaticos', 'viacalviatra');
     if ($cambiareti=='S'){
      $this->columnas[0]->setTitulo('Lista de Solicitudes por Aprobar');
      $this->columnas[1][1]->setTitulo('Nro. Solicitud');
      $this->columnas[1][2]->setTitulo('Fecha Solicitud');
      $this->columnas[1][3]->setTitulo('Ref. de Orden Comisión');
     }


     $this->obj = $this->columnas[0]->getConfig($reg); //$this->obj[0]->getConfig($reg);
     $this->viacalviatra->setGrid($this->obj);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos= $this->getRequestParameter('cajtexmos','');
    $js=""; $dato=""; $sw=true;
    
    switch ($ajax){
      case '1':            
          $sw=false;
          if ($cajtexmos=='viacalviatra_fechas')
          {
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

                if ($this->getRequestParameter('fecha')!="") {
                $dateFormat = new sfDateFormat('es_VE');
                $fec2 = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
                
                if ($fec1>$fec2)
                {
                    $js="alert('La fechas Desde no puede ser mayor la Fecha Hasta'); $('viacalviatra_fecdes').value=''; $('viacalviatra_fecdes').focus();";
                     $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->viacalviatra = $this->getViacalviatraOrCreate();
                    $this->configGrid();
                }else {
                    $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->viacalviatra = $this->getViacalviatraOrCreate();
                    $this->configGrid($fec1, $fec2);
                }
                }else { $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->viacalviatra = $this->getViacalviatraOrCreate();
                    $this->configGrid();}
          }else {
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

                $dateFormat = new sfDateFormat('es_VE');
                $fec2 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
                
                if ($fec1>$fec2)
                {
                    $js="alert('La fechas Desde no puede ser mayor la Fecha Hasta'); $('viacalviatra_fechas').value=''; $('viacalviatra_fechas').focus();";
                     $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->viacalviatra = $this->getViacalviatraOrCreate();
                    $this->configGrid();
                }else {
                    $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->viacalviatra = $this->getViacalviatraOrCreate();
                    $this->configGrid($fec1, $fec2);
                }
          }
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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $gencomxacom=H::getConfApp2('gencomxacom', 'viaticos', 'viaaprcalviatra');
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    foreach($grid[0] as $dat)
    {
        if($dat->getCheck()=='1')
        {
            $refcom="";
            $c = new Criteria();
            $c->add(ViacalviatraPeer::NUMCAL,$dat->getNumcal());
            $per = ViacalviatraPeer::doSelectOne($c);            
            if($per)
            {
                $rifemp=H::getX_vacio('CODEMP','Nphojint','Rifemp',$dat->getCodemp());
                if ($rifemp!=""){
                    $cedrif=$rifemp;
                    if (H::getX_vacio('CEDRIF','Opbenefi','Cedrif',$cedrif)=='')
                      $cedrif=H::getX_vacio('CODEMP','Nphojint','Cedemp',$dat->getCodemp());
                }else
                    $cedrif=H::getX_vacio('CODEMP','Nphojint','Cedemp',$dat->getCodemp());

                if ($cedrif=='')
                   $cedrif=H::getX_vacio('RIFNEMP','Vianoemp','Rifnemp',$dat->getCodemp()); 

                if (H::getX_vacio('CEDRIF','Opbenefi','Cedrif',$cedrif)=='')
                   return 1623;
                if ($gencomxacom=='S'){
                  $p = new Criteria();
                  $p->add(ViadetsolacoempPeer::NUMSOL, $clasemodelo->getRefsol());
                  $regis = ViadetsolacoempPeer::doSelect($p);
                  if ($regis) {
                     foreach ($regis as $objq) {
                       $rifemp1=H::getX_vacio('CODEMP','Nphojint','Rifemp',$objq->getCodempaco());
                      if ($rifemp1!="")
                          $cedrif1=$rifemp1;
                      else
                          $cedrif1=H::getX_vacio('CODEMP','Nphojint','Cedemp',$objq->getCodempaco());

                      if ($cedrif1=='')
                         $cedrif1=H::getX_vacio('RIFNEMP','Vianoemp','Rifnemp',$objq->getCodempaco()); 

                      if (H::getX_vacio('CEDRIF','Opbenefi','Cedrif',$cedrif1)=='')
                         return 1623;
                     }
                  }
                  #GENERAMOS COMPROMISO                 
                  $valor=Viaticos::GenerarCompromisov3($per,H::toFloat($dat->getMontot()),$cedrif,$refcom);
                }else {              
                   $valor=Viaticos::GenerarCompromisov2($per,H::toFloat($dat->getMontot()),$cedrif,$refcom);
                  }
                  if ($valor==-1)
                  {
                      if($refcom!="")
                      {
                          if ($gencomxacom=='S')
                            $per->setRefcomvar($refcom);
                          else
                            $per->setRefcom($refcom);
                          $per->setStatus('A');
                          $per->setUsuapr($loguse);
                          $per->setFecapr(date('Y-m-d'));
                          $per->save();
                      }else {
                          $this->dir=$this->dir."-".$dat->getNumcal();
                      }
                  }else {
                      return $valor;
                  }
            }
        }
    }

    return -1;
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
    $this->viacalviatra = $this->getViacalviatraOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateViacalviatraFromRequest();

      if($this->saveViacalviatra($this->viacalviatra) ==-1){
      {
         if ($this->dir!="")                 
             $this->setFlash('notice', 'Todos los Cálculos de Viáticos fueron Aprobados. Excepto lo siguientes Viáticos por falta de disponibilidad '.$this->dir);
         else
             $this->setFlash('notice', 'Todos los Cálculos de Viáticos fueron Aprobados.');

         $id= $this->viacalviatra->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('viaaprcalviatra/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('viaaprcalviatra/list');
        }
        else
        {
            return $this->redirect('viaaprcalviatra/edit?id='.$this->viacalviatra->getId());
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
