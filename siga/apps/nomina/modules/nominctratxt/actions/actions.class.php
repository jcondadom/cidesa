<?php

/**
 * nominctratxt actions.
 *
 * @package    siga
 * @subpackage nominctratxt
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nominctratxtActions extends autonominctratxtActions
{
  private $dir="";

  public function executeIndex()
  {
    return $this->forward('nominctratxt', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->npinctratxt->setDireccion($this->getRequestParameter('direc'));
     $this->configGrid($this->npinctratxt->getFecinc());
  }

  public function configGrid($fecinc='', $status='')
  {  
    $c = new Criteria();
    $c->add(NpinctratxtPeer :: FECINC, $fecinc);
    $result = NpinctratxtPeer :: doSelect($c);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nominctratxt/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detalle');
    
    
    $this->obj = $this->columnas[0]->getConfig($result);

    $this->npinctratxt->setObj($this->obj);
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->npinctratxt = $this->getNpinctratxtOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpinctratxtFromRequest();

      if($this->saveNpinctratxt($this->npinctratxt) ==-1){
        {$this->setFlash('notice', 'El Archivo Txt ha sido generado Satisfactoriamente.');

         $id= $this->npinctratxt->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('nominctratxt/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('nominctratxt/list');
        }
        else
        {
            return $this->redirect('nominctratxt/edit?direc='.$this->dir);
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
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $sw=true; $js=""; $dato="";


    switch ($ajax){
      case '1':
        $status = $this->getRequestParameter('status','');
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));

        $this->params=array();
        $this->npinctratxt = $this->getNpinctratxtOrCreate();
        $this->labels = $this->getLabels();

        $this->configGrid($fec2,$status);
        $sw=false;
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if ($sw) return sfView::HEADER_ONLY;


  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
    public function executeAjaxgrid() {
      $name = $this->getRequestParameter('grid','a');
      $grid = $this->getRequestParameter('grid'.$name,'');
      $fila = $this->getRequestParameter('fila','');
      $col = $this->getRequestParameter('columna', '');
      $javascript="";  $jsonextra="";
      switch ($name) {
         case ('a'):   //grid a detalle 
            switch ($col) {
             case ('2'):   //Cedula Empleado
                if ($grid[$fila][$col-1]!="")
                {                  
                  if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
                  {
                       $c = new Criteria();
                       $c->add(NpasicarempPeer::STATUS,'V');
                       $c->add(NphojintPeer::CEDEMP,$grid[$fila][$col-1]);
                       $c->addJoin(NphojintPeer::CODEMP,NpasicarempPeer::CODEMP);
                       $regs= NphojintPeer::doSelectOne($c);
                       if ($regs)
                       {
                          $sueldo = str_replace(",","",str_replace(".","", $regs->getSueldo()));
                          $grid[$fila][0] = "02";
                          $grid[$fila][2] = substr(trim(H::stripAccents($regs->getPriape())),0,15);
                          $grid[$fila][3] = substr(trim(H::stripAccents($regs->getSegape())),0,15);
                          $grid[$fila][4] = substr(trim(H::stripAccents($regs->getPrinom())),0,15);
                          $grid[$fila][5] = substr(trim(H::stripAccents($regs->getSegnom())),0,15);
                          $grid[$fila][6] = $regs->getNacemp();
                          $grid[$fila][7] = date('Ymd',strtotime($regs->getFecnac()));
                          $grid[$fila][8] = str_pad($sueldo,12,"0",STR_PAD_LEFT);
                          $grid[$fila][9] = date('Ymd',strtotime($regs->getFecing()));
                          $grid[$fila][10] = "00000900";
                          $grid[$fila][11] = strtoupper(substr(H::stripAccents($regs->getNomcar()),0,30));
                          $grid[$fila][12] = $regs->getSexemp();
                          $grid[$fila][13] = $regs->getEdociv();
                          $grid[$fila][19] = substr(H::getX_vacio('CODPAI','Nppais','Nompai',$regs->getCodpai()),0,30);
                          $grid[$fila][20] = substr(H::getX_vacio('CODPAI','Ocpais','Nompai',$regs->getCodpainac()),0,30);
                          $grid[$fila][21] = substr(str_replace("-", "", $regs->getTelhab()),0,11);
                          $grid[$fila][23] = substr(str_replace("-", "", $regs->getCelemp()),0,11);
                          $grid[$fila][25] = substr($regs->getCodpos(),0,5);
                          $grid[$fila][26] = "I";
                          $grid[$fila][27] = "EM";
                          $grid[$fila][28] = "212";
                          $grid[$fila][29] = "";
                          $grid[$fila][30] = "00";
                          $grid[$fila][31] = "501";
                          $grid[$fila][32] = substr("00000000000000000000",0,20);
                       }else {
                          $javascript = "alert_('El Empleado no esta registrado &oacute no est&aacute vigente');";
                          $grid[$fila][$col-1]="";
                       }                                   
                  }else {
                      $javascript = "alert_('El Empleado se encuentra Repetido');";
                      $grid[$fila][$col-1]="";
                  }
                }                  
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;        
              default:
                break;
            }
          break;
        default:
          break;
        }

      $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $this->dir=Nomina::generarTxtIncEmp($clasemodelo,$grid);

    return -1;
  }  

}
