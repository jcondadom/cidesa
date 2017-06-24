<?php

/**
 * nomdatrelemp actions.
 *
 * @package    siga
 * @subpackage nomdatrelemp
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomdatrelempActions extends autonomdatrelempActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid();
  }

  public function configGrid()
  {
      $this->configGridJuguetes($this->nphojint->getCodemp());
      $this->configGridUtiles($this->nphojint->getCodemp());
      $this->configGridBecas($this->nphojint->getCodemp());
      $this->configGridAportes($this->nphojint->getCodemp());
      $this->configGridReembolsos($this->nphojint->getCodemp());
      $this->configGridRegimen($this->nphojint->getCodemp());
      $this->configGridEmbargos($this->nphojint->getCodemp());
      $this->configGridEvaluacion($this->nphojint->getCodemp());
      $this->configGridViaticos($this->nphojint->getCodemp());
      $this->configGridCapacitacion($this->nphojint->getCodemp());
      $this->configGridReconocimientos($this->nphojint->getCodemp());
      $this->configGridActosAdministrativos($this->nphojint->getCodemp());
      $this->configGridRetenciones($this->nphojint->getCodemp());
      $this->configGridDesLaboral($this->nphojint->getCodemp());
      $this->configGridCambioDedic($this->nphojint->getCodemp());
      $this->configGridAnticipoPrest($this->nphojint->getCodemp());
      $this->configGridInteresesAnt($this->nphojint->getCodemp());
  }

  public function configGridJuguetes($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfjugPeer::CODEMP,$codemp);
     $reg= NpinfjugPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_juguetes');
     $denominacion=H::getConfApp2('denominacion', 'nomina', 'nomhojint');
     if ($denominacion!="")
        $this->columnas[1][2]->setTitulo('Monto Pagado Según Nómina '.$denominacion);  
     
     $this->grid1 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridjug($this->grid1);
  }

  public function configGridUtiles($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfutiPeer::CODEMP,$codemp);
     $reg= NpinfutiPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_utiles');
     $denominacion=H::getConfApp2('denominacion', 'nomina', 'nomhojint');
     if ($denominacion!="")
        $this->columnas[1][2]->setTitulo('Monto Pagado Según Nómina '.$denominacion); 
     
     $this->grid2 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGriduti($this->grid2);
  }

  public function configGridBecas($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfbecPeer::CODEMP,$codemp);
     $reg= NpinfbecPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_becas');
     $denominacion=H::getConfApp2('denominacion', 'nomina', 'nomhojint');
     if ($denominacion!="")
        $this->columnas[1][2]->setTitulo('Monto Pagado Según Nómina '.$denominacion);     
     
     $this->grid3 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridbec($this->grid3);
  }

  public function configGridAportes($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfapoPeer::CODEMP,$codemp);
     $reg= NpinfapoPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_aportes');
     $this->columnas[1][0]->setCombo(Constantes::listaBeneficios());
     
     $denominacion=H::getConfApp2('denominacion', 'nomina', 'nomhojint');
     if ($denominacion!="")
        $this->columnas[1][2]->setTitulo('Monto Pagado Según Nómina '.$denominacion);
     $this->grid4 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridapo($this->grid4);
  }

  public function configGridReembolsos($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfremPeer::CODEMP,$codemp);
     $reg= NpinfremPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_reembolsos');
     $this->columnas[1][3]->setCombo(array('R' => 'Recibo', 'N' => 'Nómina'));
     $denominacion=H::getConfApp2('denominacion', 'nomina', 'nomhojint');
     if ($denominacion!="")
        $this->columnas[1][2]->setTitulo('Monto Pagado '.$denominacion);  
     
     $this->grid5 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridrem($this->grid5);
  }

  public function configGridRegimen($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfregPeer::CODEMP,$codemp);
     $reg= NpinfregPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_regimen');
     $this->columnas[1][1]->setCombo(Constantes::listaSanciones());
     $this->grid6 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridreg($this->grid6);
  }

  public function configGridEmbargos($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfembPeer::CODEMP,$codemp);
     $reg= NpinfembPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_embargos');
     $denominacion=H::getConfApp2('denominacion', 'nomina', 'nomhojint');
     if ($denominacion!="")
        $this->columnas[1][4]->setTitulo('Monto a Embargar '.$denominacion);
     
     $this->grid7 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridemb($this->grid7);
  }

  public function configGridEvaluacion($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfevaPeer::CODEMP,$codemp);
     $reg= NpinfevaPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_evaluacion');

     $this->grid8 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGrideva($this->grid8);
  }

  public function configGridViaticos($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfviaPeer::CODEMP,$codemp);
     $reg= NpinfviaPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_viaticos');
     $this->columnas[1][3]->setCombo(array('N' => 'Nómina', 'R' => 'Recibo'));
     $denominacion=H::getConfApp2('denominacion', 'nomina', 'nomhojint');
     if ($denominacion!="")
        $this->columnas[1][2]->setTitulo('Monto Pagado '.$denominacion);  
     
     $this->grid9 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridvia($this->grid9);
  }

  public function configGridCapacitacion($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfcapPeer::CODEMP,$codemp);
     $reg= NpinfcapPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_capacitacion');
     $this->columnas[1][4]->setCombo(array('S' => 'SI', 'N' => 'NO'));
     
     $this->grid10 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridcap($this->grid10);
  }
  
  public function configGridReconocimientos($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfrecPeer::CODEMP,$codemp);
     $reg= NpinfrecPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_reconocimiento');
     
     $this->grid11 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridrec($this->grid11);
  }  

  public function configGridActosAdministrativos($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfadmPeer::CODEMP,$codemp);
     $reg= NpinfadmPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_actosadm');
     
     $this->grid12 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridact($this->grid12);
  }
  
  public function configGridRetenciones($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfretPeer::CODEMP,$codemp);
     $reg= NpinfretPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_retenciones');
     $denominacion=H::getConfApp2('denominacion', 'nomina', 'nomhojint');
     if ($denominacion!="")
        $this->columnas[1][2]->setTitulo('Monto '.$denominacion);  
     
     $this->grid13 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridret($this->grid13);
  }  

  public function configGridDesLaboral($codemp='')
  {
     $c= new Criteria();
     $c->add(NpinfescPeer::CODEMP,$codemp);
     $reg= NpinfescPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_deslaboral');
     
     $this->grid14 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridlab($this->grid14);
  }  

  public function configGridCambioDedic($codemp='')
  {
     $c= new Criteria();
     $c->add(NpcamdedPeer::CODEMP,$codemp);
     $reg= NpcamdedPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_dedicacion');
     
     $this->grid15 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridded($this->grid15);
  }   

  public function configGridAnticipoPrest($codemp='')
  {
     $c= new Criteria();
     $c->add(NpantprePeer::CODEMP,$codemp);
     $reg= NpantprePeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_anticipo');
     
     $this->grid16 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridant($this->grid16);
  } 

  public function configGridInteresesAnt($codemp='')
  {
     $c= new Criteria();
     $c->add(NpadeintPeer::CODEMP,$codemp);
     $reg= NpadeintPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomdatrelemp/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_interesesant');
     
     $this->grid17 = $this->columnas[0]->getConfig($reg);

     $this->nphojint->setGridint($this->grid17);
  } 


  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;

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
    $grida = Herramientas::CargarDatosGridv2($this,$this->grid1);
    $gridb = Herramientas::CargarDatosGridv2($this,$this->grid2);
    $gridc = Herramientas::CargarDatosGridv2($this,$this->grid3);
    $gridd = Herramientas::CargarDatosGridv2($this,$this->grid4);
    $gride = Herramientas::CargarDatosGridv2($this,$this->grid5);
    $gridf = Herramientas::CargarDatosGridv2($this,$this->grid6);
    $gridg = Herramientas::CargarDatosGridv2($this,$this->grid7);
    $gridh = Herramientas::CargarDatosGridv2($this,$this->grid8);
    $gridk = Herramientas::CargarDatosGridv2($this,$this->grid9);
    $gridl = Herramientas::CargarDatosGridv2($this,$this->grid10);
    $gridm = Herramientas::CargarDatosGridv2($this,$this->grid11);
    $gridn = Herramientas::CargarDatosGridv2($this,$this->grid12);
    $grido = Herramientas::CargarDatosGridv2($this,$this->grid13);
    $gridp = Herramientas::CargarDatosGridv2($this,$this->grid14);
    $gridq = Herramientas::CargarDatosGridv2($this,$this->grid15);
    $gridr = Herramientas::CargarDatosGridv2($this,$this->grid16);
    $grids = Herramientas::CargarDatosGridv2($this,$this->grid17);    
  }

  public function saving($clasemodelo)
  {
    $grida = Herramientas::CargarDatosGridv2($this,$this->grid1);
    $gridb = Herramientas::CargarDatosGridv2($this,$this->grid2);
    $gridc = Herramientas::CargarDatosGridv2($this,$this->grid3);
    $gridd = Herramientas::CargarDatosGridv2($this,$this->grid4);
    $gride = Herramientas::CargarDatosGridv2($this,$this->grid5);
    $gridf = Herramientas::CargarDatosGridv2($this,$this->grid6);
    $gridg = Herramientas::CargarDatosGridv2($this,$this->grid7);
    $gridh = Herramientas::CargarDatosGridv2($this,$this->grid8);
    $gridk = Herramientas::CargarDatosGridv2($this,$this->grid9);
    $gridl = Herramientas::CargarDatosGridv2($this,$this->grid10);
    $gridm = Herramientas::CargarDatosGridv2($this,$this->grid11);
    $gridn = Herramientas::CargarDatosGridv2($this,$this->grid12);
    $grido = Herramientas::CargarDatosGridv2($this,$this->grid13);
    $gridp = Herramientas::CargarDatosGridv2($this,$this->grid14);
    $gridq = Herramientas::CargarDatosGridv2($this,$this->grid15);

    Nomina::salvarDatosSocioEconomicos($clasemodelo,$grida,$gridb,$gridc,$gridd,$gride,$gridf,$gridg,$gridh,$gridk,$gridl,$gridm,$gridn,$grido,$gridp,$gridq);
    return -1;
  }
}
