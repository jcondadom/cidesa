<?php

/**
 * confincieper actions.
 *
 * @package    siga
 * @subpackage confincieper
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class confincieperActions extends autoconfincieperActions
{
  public function executeIndex() {
    return $this->redirect('confincieper/edit');      
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }
 }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js="";
    switch ($ajax){
      case '1':
       $q= new Criteria();
       $q->add(Contaba1Peer::PEREJE,$codigo);
       $result= Contaba1Peer::doSelectOne($q);
       if ($result){
         $output = '[["contaba1_fecdes","'.date('d/m/Y',strtotime($result->getFecdes())).'",""],["contaba1_fechas","'.date('d/m/Y',strtotime($result->getFechas())).'",""],["contaba1_status","'.$result->getStatus().'",""]]';
       }else  $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '2':
       $fecdes = $this->getRequestParameter('fecdes');
       $fechas = $this->getRequestParameter('fechas');
       $pereje = $this->getRequestParameter('pereje');
       $dateFormat = new sfDateFormat('es_VE');
       $fec1 = $dateFormat->format($fecdes, 'i', $dateFormat->getInputPattern('d'));
       $dateFormat = new sfDateFormat('es_VE');
       $fec2 = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));
       if ($codigo=='A'){  //Se va  a Cerrar
         $a= new Criteria();         
         $a->add(ContabcPeer::STACOM,'D');
         $sql="contabc.feccom>='".$fec1."' and contabc.feccom<='".$fec2."'";
         $a->add(ContabcPeer::FECCOM,$sql,Criteria::CUSTOM);
         $resul= ContabcPeer::doSelectOne($a);
         if (!$resul){
           $b= new Criteria();
           $b->add(Contaba1Peer::STATUS,'A');
           $b->add(Contaba1Peer::PEREJE,$pereje,Criteria::LESS_THAN);
           $resulb= Contaba1Peer::doSelectOne($b);
           if (!$resulb){
             $d= new Criteria();           
             $d->add(Contaba1Peer::PEREJE,$pereje);
             $resuld= Contaba1Peer::doSelectOne($d);
             if ($resuld){
                $resuld->setStatus('C');
                $resuld->save();
                $js="alert_('El Periodo se Cerr&oacute; con Exito.'); $('contaba1_pereje').value=''; $('contaba1_status').value=''; $('contaba1_fecdes').value=''; $('contaba1_fechas').value='';";
             }
           }else $js="alert('Hay Períodos Anteriores a este que están Abiertos, Ciérrelos Primero.'); $('contaba1_pereje').value=''; $('contaba1_status').value=''; $('contaba1_fecdes').value=''; $('contaba1_fechas').value='';";
         }else $js="alert('No se puede cerrar el periodo ya que contiene Comprobante DIFERIDOS.'); $('contaba1_pereje').value=''; $('contaba1_status').value=''; $('contaba1_fecdes').value=''; $('contaba1_fechas').value='';";
       }else if ($codigo=='C'){ //Se va a Abrir
         $a= new Criteria();         
         $a->add(ContabcPeer::STACOM,'D');
         $sql="contabc.feccom>='".$fec1."' and contabc.feccom<='".$fec2."'";
         $a->add(ContabcPeer::FECCOM,$sql,Criteria::CUSTOM);
         $resul= ContabcPeer::doSelectOne($a);
         if (!$resul){
             $d= new Criteria();           
             $d->add(Contaba1Peer::PEREJE,$pereje);
             $resuld= Contaba1Peer::doSelectOne($d);
             if ($resuld){
                $resuld->setStatus('A');
                $resuld->save();
                $js="alert_('El Periodo se Abrio con Exito.'); $('contaba1_pereje').value=''; $('contaba1_status').value=''; $('contaba1_fecdes').value=''; $('contaba1_fechas').value='';";
             }
         }else $js="alert('No se puede cerrar el periodo ya que contiene Comprobante DIFERIDOS.'); $('contaba1_pereje').value=''; $('contaba1_status').value=''; $('contaba1_fecdes').value=''; $('contaba1_fechas').value='';";
       }
       $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;        
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }


}
