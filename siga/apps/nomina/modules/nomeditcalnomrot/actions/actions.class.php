<?php

/**
 * nomeditcalnomrot actions.
 *
 * @package    siga
 * @subpackage nomeditcalnomrot
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomeditcalnomrotActions extends autonomeditcalnomrotActions
{
  public function executeIndex()
  {
    return $this->forward('nomeditcalnomrot', 'edit');
  }    
    
    
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
  }

  public function configGrid($codtur='', $codnom='', $codgru='', $fecini='', $fecfin='')
  {
     $c= new Criteria();
     $grid=array();
     if($codtur && $codnom && $codgru && $fecini!="" && $fecfin!=""){
       $c->add(NpcalnomrotPeer::CODTUR,$codtur);
       $c->add(NpcalnomrotPeer::CODNOM,$codnom);
       $c->add(NpcalnomrotPeer::CODGRU,$codgru);
       $c->add(NpcalnomrotPeer::FECJOR, NpcalnomrotPeer::FECJOR." >= '$fecini' AND ".NpcalnomrotPeer::FECJOR." <= '$fecfin'",Criteria::CUSTOM);
     }else{
       $c->add(NpcalnomrotPeer::ID,0);
     }
     $det= NpcalnomrotPeer::doSelect($c);
     $this->columnas = Herramientas::getConfigGrid('grid');
     
     $this->columnas[1][0]->setCombo(NpjorturPeer::getJornadas());
     
     $obj =$this->columnas[0]->getConfig($det);
     $grid['grid'] = $obj;

     $this->params = $grid;
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
              $js="alert('El Turno no se encuentra definido'); $('npcalnomrot_codtur').value=''; $('npcalnomrot_codtur').focus();";
          }         
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        $c= new Criteria();
        $c->add(NpnominaPeer::CODNOM,$codigo);
        $reg= NpnominaPeer::doSelectOne($c);
        if ($reg)
        {
            $dato=$reg->getNomnom();
        }else {
           $js="alert_('La N&oacute;mina no existe'); $('npcalnomrot_codnom').value=''; $('npcalnomrot_codnom').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
        $turno = $this->getRequestParameter('turno','');
        $nomina = $this->getRequestParameter('nomina','');
        $fecini = $this->getRequestParameter('fecini','');
        $grupo = $this->getRequestParameter('grupo','');
        if ($turno!='')
        {
          if ($nomina!='')
          {
              if ($fecini!="")
              {
                if($grupo!='')
                {
                  $dateFormat = new sfDateFormat('es_VE');
                  $fec1 = $dateFormat->format($fecini, 'i', $dateFormat->getInputPattern('d'));

                  $dateFormat = new sfDateFormat('es_VE');
                  $fec2 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));

                  $sw=false;
                  $this->params=array();
                  $this->npcalnomrot = $this->getNpcalnomrotOrCreate();
                  $this->updateNpcalnomrotFromRequest();
                  $this->labels = $this->getLabels();
                  $this->configGrid($turno,$nomina, $grupo,$fec1,$fec2);

                }else{
                  $js="alert('Debe introducir el grupo'); $('npcalnomrot_codgru').value=''; $('npcalnomrot_codgru').focus();";
                }
              }else {
                  $js="alert('Debe introducir la Fecha Inicio'); $('npcalnomrot_fecfin').value=''; $('npcalnomrot_fecfin').focus();";
              }
          }else {
           $js="alert_('Debe Introducir la N&oacute;mina'); $('npcalnomrot_fecfin').value=''; $('npcalnomrot_fecfin').focus();";
          }
        }else {
           $js="alert('Debe Introducir el Turno'); $('npcalnomrot_fecfin').value=''; $('npcalnomrot_fecfin').focus();";
        }
       
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;    
      case '4':
        $c= new Criteria();
        $c->add(NpgruposPeer::CODGRU,$codigo);
        $reg= NpgruposPeer::doSelectOne($c);
        if ($reg)
        {
            $dato=$reg->getDesgru();
        }else {
           $js="alert_('El grupo no existe'); $('npcalnomrot_codgru').value=''; $('npcalnomrot_codgru').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
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

      $this->npcalnomrot = $this->getNpcalnomrotOrCreate();
      $this->updateNpcalnomrotFromRequest();
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridv2($this,$this->params['grid']);
	  
      if(count($grid[0])==0)
      {
            $this->coderr=4;
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

    $grid = Herramientas::CargarDatosGridv2($this,$this->params['grid']);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->params['grid']);
    Nomina::salvarNominasRorativas($clasemodelo,$grid);
    //Nomina::crearCalendarios($clasemodelo,$grid);
      return -1;
  }

}
