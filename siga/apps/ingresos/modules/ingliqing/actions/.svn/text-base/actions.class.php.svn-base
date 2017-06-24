<?php

/**
 * ingliqing actions.
 *
 * @package    siga
 * @subpackage ingliqing
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class ingliqingActions extends autoingliqingActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid($this->ciliqing->getRefliq());
 
  }

  public function configGrid($refliq='', $fecdes='', $fechas='')
  {
    $reg=array();
    if ($fecdes!='' && $fechas!='')
    {
        $t= new Criteria();
        //$t->add(CiregingPeer::STAING,'L',Criteria::NOT_EQUAL);
        $sql="cireging.staing!='L' and (cireging.fecing>='$fecdes' and cireging.fecing<='$fechas')";
        $t->add(CiregingPeer::FECING,$sql,Criteria::CUSTOM);
        $t->addAscendingOrderByColumn(CiregingPeer::REFING);
        $t->addAscendingOrderByColumn(CiregingPeer::FECING);
        $resul= CiregingPeer::doSelect($t);
        if ($resul)
        {
            foreach ($resul as $objeto)
            {
                $cidetliq2= new Cidetliq();
                $cidetliq2->setCheck('0');
                $cidetliq2->setRefing($objeto->getRefing());
                $cidetliq2->setFecing(date('d/m/Y',  strtotime($objeto->getFecing())));
                $cidetliq2->setDestip($objeto->getDestip());
                $cidetliq2->setNomcon($objeto->getNomcon());
                $cidetliq2->setDesing($objeto->getDesing());
                $cidetliq2->setMoning(number_format($objeto->getMoning(),2,',','.'));
                $reg[]=$cidetliq2;                
            }
        }
        
    }else {
        $c= new Criteria();
        $c->add(CidetliqPeer::REFLIQ,$refliq);
        $reg= CidetliqPeer::doSelect($c);
    }
     
        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/ingliqing/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');

        if ($this->ciliqing->getId()!='')  $this->columnas[1][0]->setOculta(true);
        $this->obj = $this->columnas[0]->getConfig($reg);

        $this->ciliqing->setObj($this->obj);

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
          if ($cajtexmos=='ciliqing_fechas')
          {
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

                if ($this->getRequestParameter('fecha')!="") {
                  $dateFormat = new sfDateFormat('es_VE');
                  $fec2 = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
                  
                  if ($fec1>$fec2)
                  {
                      $js="alert('La fechas Desde no puede ser mayor la Fecha Hasta'); $('ciliqing_fecdes').value=''; $('ciliqing_fecdes').focus();";
                      $this->params=array();
                      $this->labels = $this->getLabels();
                      $this->ciliqing = $this->getCiliqingOrCreate();
                      $this->configGrid();
                  }else {
                      $this->params=array();
                      $this->labels = $this->getLabels();
                      $this->ciliqing = $this->getCiliqingOrCreate();
                      $this->configGrid('',$fec1, $fec2);
                  }
                }else { $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->ciliqing = $this->getCiliqingOrCreate();
                    $this->configGrid();
                }
          }else {
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

                $dateFormat = new sfDateFormat('es_VE');
                $fec2 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
                
                if ($fec1>$fec2)
                {
                    $js="alert('La fechas Desde no puede ser mayor la Fecha Hasta'); $('ciliqing_fechas').value=''; $('ciliqing_fechas').focus();";
                    $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->ciliqing = $this->getCiliqingOrCreate();
                    $this->configGrid();
                }else {
                    $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->ciliqing = $this->getCiliqingOrCreate();
                    $this->configGrid('',$fec1, $fec2);
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
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
        
       $this->ciliqing  =  $this->getCiliqingOrCreate();
       $this->updateCiliqingFromRequest();
       $this->configGrid();
       $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

      if (!$this->ciliqing->getId())
      {
       $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
           $this->coderr=333;
           if ($x[$j]->getCheck()=="1")
           {
                $this->coderr=-1;
                break;
           }
           
           $j++;
        }
      }
        
      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    
    foreach($grid[0] as  $dat)
    {
        if($dat->getCheck()=='1')
        {
            $c = new Criteria();
            $c->add(CiregingPeer::REFING,$dat->getRefing());
            $per = CiregingPeer::doSelectOne($c);            
            if($per)
            {
               $per->setStaing('L');
               $per->save();
            }
            $dat->setRefliq($clasemodelo->getRefliq());
            $dat->save();
        }
    }
    $clasemodelo->save();
    return -1;
  }

  public function deleting($clasemodelo)
  {
    $c= new Criteria();
    $c->add(CidetliqPeer::REFLIQ,$clasemodelo->getRefliq());
    $result= CidetliqPeer::doSelect($c);
    if ($result)
    {
        foreach ($result as $obj)
        {
            $e= new Criteria();
            $e->add(CiregingPeer::REFING,$obj->getRefing());
            $ret= CiregingPeer::doSelectOne($e);
            if ($ret)
            {
                $ret->setStaing('A');
                $ret->save();
            }
            
            $obj->delete();
        }
        
    }
    $clasemodelo->delete();
    
    return -1;
  }


}
