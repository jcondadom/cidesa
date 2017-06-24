<?php

/**
 * contxtibs actions.
 *
 * @package    siga
 * @subpackage contxtibs
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class contxtibsActions extends autocontxtibsActions
{
  private $dir="";
  
  public function executeIndex()
  {
    return $this->forward('contxtibs', 'edit');
  }
  
  public function executeEdit()
  {
    $this->params=array();
    $this->contabc = $this->getContabcOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateContabcFromRequest();

      if($this->saveContabc($this->contabc) ==-1){
        {$this->setFlash('notice', 'El Archivo TXT ha sido generado Satisfactoriamente.');

         $id= $this->contabc->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('contxtibs/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('contxtibs/list');
        }
        else
        {            
            return $this->redirect('contxtibs/edit?direc='.$this->dir);
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
  
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->contabc->setDireccion($this->getRequestParameter('direc'));
    $this->configGrid();
  }

  public function configGrid($tipcom="", $fecdes="", $fechas="")
  {
     $t= new Criteria();
     if ($tipcom=="" && $fecdes=="" && $fechas=="")
     {
        $t->add(ContabcPeer::NUMCOM,'');
     }
     else
     {
         if ($tipcom!="") $t->add(ContabcPeer::TIPCOM,$tipcom);
         if ($fecdes!="" && $fechas!="")
         {
             $t->add(ContabcPeer::FECCOM,$fecdes,Criteria::GREATER_EQUAL);
             $t->add(ContabcPeer::FECCOM,$fechas,Criteria::LESS_EQUAL);
         }else if ($fecdes!="")
         {
            $t->add(ContabcPeer::FECCOM,$fecdes);
         }else if ($fechas!="")
         {
             $t->add(ContabcPeer::FECCOM,$fechas);
         }         
     }
     $result=  ContabcPeer::doSelect($t);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/contxtibs/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_comprobantes');

     $this->columnas[1][0]->setHTML('onClick="verificar(this.id)"');
     
     $this->obj =$this->columnas[0]->getConfig($result);

     $this->contabc->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    switch ($ajax){
      case '1':
          $this->contabc = $this->getContabcOrCreate();
          $this->params=array();
          $this->labels = $this->getLabels();
          $tipcom=$this->getRequestParameter('tipcom');
          $fecha1=$this->getRequestParameter('fecdes');
          if ($fecha1!="")
          {
            $dateFormat = new sfDateFormat('es_VE');
            $fecdes = $dateFormat->format($fecha1, 'i', $dateFormat->getInputPattern('d'));
          }else $fecdes="";
          $fecha2=$this->getRequestParameter('fechas');
          if ($fecha2!="")
          {
            $dateFormat = new sfDateFormat('es_VE');
            $fechas = $dateFormat->format($fecha2, 'i', $dateFormat->getInputPattern('d'));
          }else $fechas="";
          
          $this->configGrid($tipcom,$fecdes,$fechas);
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

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

    if($this->getRequest()->getMethod() == sfRequest::POST){
        
        $this->contabc = $this->getContabcOrCreate();
        $this->updateContabcFromRequest();
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);       

        $x=$grid[0];
        if (count($x)>0) {
            $j=0;
            $cont=0;
            while ($j<count($x))
            {
               if ($x[$j]->getCheck2()=="1")
               {
                $cont++;  
               }
               $j++;
            }
            if ($cont==0)
            {
               $this->coderr=215;   
            }
        }else {
            $this->coderr=437;   
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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    
    $this->dir=Contabilidad::generarTxtComprobantesIBS($clasemodelo,$grid);

    return -1;
  }

}
