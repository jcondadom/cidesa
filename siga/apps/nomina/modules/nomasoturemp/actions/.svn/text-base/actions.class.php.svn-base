<?php

/**
 * nomasoturemp actions.
 *
 * @package    siga
 * @subpackage nomasoturemp
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomasoturempActions extends autonomasoturempActions
{

  public function executeIndex()
  {
    return $this->forward('nomasoturemp', 'edit');
  }    
    
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid();
  }

  public function configGrid($arreglo=array())
  {
     if (count($arreglo)>0)
     {
         $i=0;
         while ($i<count($arreglo))
         {
           $npturemp2= new Npturemp();
           $npturemp2->setCheck($arreglo[$i]["check"]);
           $npturemp2->setCodemp($arreglo[$i]["codemp"]);
           $npturemp2->setNomemp($arreglo[$i]["nomemp"]);
           $npturemp2->setCodcar($arreglo[$i]["codcar"]);
           $npturemp2->setNomcar($arreglo[$i]["nomcar"]);
           $det[]=$npturemp2;
           $i++;
         }
     }else {
         $c= new Criteria();
         $c->add(NpturempPeer::CODTUR,'');
         $det= NpturempPeer::doSelect($c);
     }
     
     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomasoturemp/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

     $this->obj =$this->columnas[0]->getConfig($det);

    $this->npturemp->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $sw=true; $dato=""; $js="";

    switch ($ajax){
      case '1':
          $t= new Criteria();
          $t->add(NpturnosPeer::CODTUR,$codigo);
          $reg= NpturnosPeer::doSelectOne($t);
          if($reg)
          {
              $dato=$reg->getDestur();
          }else {
              $js="alert('El Turno no se encuentra definido') $('npturemp_codtur').value=''; $('npturemp_codtur').focus();";
          }         
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        
        $turno = $this->getRequestParameter('turno','');
        $fecini = $this->getRequestParameter('fecini','');
        $fecfin = $this->getRequestParameter('fecfin','');
        $sw=false;  $arreglo=array();
        $c= new Criteria();
        $c->add(NpnominaPeer::CODNOM,$codigo);
        $reg= NpnominaPeer::doSelectOne($c);
        if ($reg)
        {
            if ($turno!='')
            {
              if ($fecini!="")
              {
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($fecini, 'i', $dateFormat->getInputPattern('d'));

                if ($fecfin!="")
                {
                    $dateFormat = new sfDateFormat('es_VE');
                    $fec2 = $dateFormat->format($fecfin, 'i', $dateFormat->getInputPattern('d'));

                    Nomina::buscarEmpleados($turno,$fec1,$fec2,$codigo,$arreglo);                  
                    
                }else {
                    $js="alert('Debe introducir la Fecha Fin'); $('npturemp_codnom').value=''; $('npturemp_codnom').focus();";             }
              }else {
                  $js="alert('Debe introducir la Fecha Inicio'); $('npturemp_codnom').value=''; $('npturemp_codnom').focus();"; 
              }
            }else {
               $js="alert('Debe Seleccionar el Turno'); $('npturemp_codnom').value=''; $('npturemp_codnom').focus();"; 
            }
        }else {
           $js="alert_('La N&oacute;mina no existe'); $('npturemp_codnom').value=''; $('npturemp_codnom').focus();"; 
        }
        $this->params=array();
        $this->npturemp = $this->getNpturempOrCreate();
        $this->updateNpturempFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($arreglo);
        
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
    Nomina::salvarTurnosEmpleados($clasemodelo,$grid);
    return -1;
  }

}
