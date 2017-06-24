<?php

/**
 * nomasigrutur actions.
 *
 * @package    siga
 * @subpackage nomasigrutur
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomasigruturActions extends autonomasigruturActions
{
  public function executeIndex()
  {
    return $this->forward('nomasigrutur', 'edit');
  }    
    
    
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
  }

  public function configGrid($codtur='', $codnom='', $fecini='', $fecfin='')
  {
     $c= new Criteria();
     $c->add(NpgruturPeer::CODTUR,$codtur);
     $c->add(NpgruturPeer::CODNOM,$codnom);
     if ($fecini!="" && $fecfin!="")
     {
         $c->add(NpgruturPeer::FECINI,$fecini);
         $c->add(NpgruturPeer::FECFIN,$fecfin);
     }
     $det= NpgruturPeer::doSelect($c);
     
     $this->columnas = Herramientas::getConfigGrid('grid');

     if ($fecini!="" && $fecfin!="")
     {
         $this->columnas[1][1]->setTitulo('Lunes '.date('d/m/Y', strtotime($fecini)));
         $this->columnas[1][2]->setTitulo('Martes '.date('d/m/Y', strtotime(H::dateAdd('d',1,$fecini,'+'))));
         $this->columnas[1][3]->setTitulo('Miércoles '.date('d/m/Y', strtotime(H::dateAdd('d',2,$fecini,'+'))));
         $this->columnas[1][4]->setTitulo('Jueves '.date('d/m/Y', strtotime(H::dateAdd('d',3,$fecini,'+'))));
         $this->columnas[1][5]->setTitulo('Viernes '.date('d/m/Y', strtotime(H::dateAdd('d',4,$fecini,'+'))));
         $this->columnas[1][6]->setTitulo('Sábado '.date('d/m/Y', strtotime(H::dateAdd('d',5,$fecini,'+'))));
         $this->columnas[1][7]->setTitulo('Domingo '.date('d/m/Y', strtotime(H::dateAdd('d',6,$fecini,'+'))));
     }
     
     $this->columnas[1][0]->setCombo(NpgruposPeer::getGrupos());
     $this->columnas[1][0]->setHTML('onChange=validarepetido(this.id);');
     
     $this->columnas[1][1]->setCombo(NpjorturPeer::getJornadas());
     $this->columnas[1][2]->setCombo(NpjorturPeer::getJornadas());
     $this->columnas[1][3]->setCombo(NpjorturPeer::getJornadas());
     $this->columnas[1][4]->setCombo(NpjorturPeer::getJornadas());
     $this->columnas[1][5]->setCombo(NpjorturPeer::getJornadas());
     $this->columnas[1][6]->setCombo(NpjorturPeer::getJornadas());
     $this->columnas[1][7]->setCombo(NpjorturPeer::getJornadas());
     
     $this->obj =$this->columnas[0]->getConfig($det);

     $this->npgrutur->setObj($this->obj);
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
              $js="alert('El Turno no se encuentra definido'); $('npgrutur_codtur').value=''; $('npgrutur_codtur').focus();";
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
           $js="alert_('La N&oacute;mina no existe'); $('npgrutur_codnom').value=''; $('npgrutur_codnom').focus();"; 
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
        $turno = $this->getRequestParameter('turno','');
        $nomina = $this->getRequestParameter('nomina','');
        $fecini = $this->getRequestParameter('fecini','');
        if ($turno!='')
        {
          if ($nomina!='')
          {
              if ($fecini!="")
              {
                  $dateFormat = new sfDateFormat('es_VE');
                  $fec1 = $dateFormat->format($fecini, 'i', $dateFormat->getInputPattern('d'));

                  $dateFormat = new sfDateFormat('es_VE');
                  $fec2 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));

                    $sw=false;
                    $this->params=array();
                    $this->npgrutur = $this->getNpgruturOrCreate();
                    $this->updateNpgruturFromRequest();
                    $this->labels = $this->getLabels();
                    $this->configGrid($turno,$nomina,$fec1,$fec2);                 

              }else {
                  $js="alert('Debe introducir la Fecha Inicio'); $('npgrutur_fecfin').value=''; $('npgrutur_fecfin').focus();"; 
              }
          }else {
           $js="alert_('Debe Introducir la N&oacute;mina'); $('npgrutur_fecfin').value=''; $('npgrutur_fecfin').focus();"; 
          }
        }else {
           $js="alert('Debe Introducir el Turno'); $('npgrutur_fecfin').value=''; $('npgrutur_fecfin').focus();"; 
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

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->npgrutur = $this->getNpgruturOrCreate();
      $this->updateNpgruturFromRequest();
      $this->configGrid();	  
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	  
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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Nomina::salvarGruposTurnos($clasemodelo,$grid);
    Nomina::crearCalendarios($clasemodelo,$grid);
      return -1;
  }

}
