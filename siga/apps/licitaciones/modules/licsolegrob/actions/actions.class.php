<?php

/**
 * licsolegrob actions.
 *
 * @package    siga
 * @subpackage licsolegrob
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licsolegrobActions extends autolicsolegrobActions
{
    
  public function listing()
  {
      $this->c = new Criteria();
      $sql = "(Lisolegr.tipconpub='O')";
      $this->c->add(LisolegrPeer::TIPCONPUB,$sql,Criteria::CUSTOM);      
  }  

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {    
    $aux=explode('-',$this->lisolegr->getCodmon());    
    $codmon=trim($aux[0]);
    $this->configGridRec();
    //$this->configGridUni();
    $this->configGridRgo();
    $this->configGrid($codmon);    
  }

  public function configGrid($codigo='',$reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      $c = new Criteria();
      $c->add(LisolegrdetPeer::NUMSOL,$this->lisolegr->getNumsol());
      $c->addAscendingOrderByColumn(LisolegrdetPeer::ID);
      $reg = LisolegrdetPeer::doSelect($c);
//      foreach($reg as $i => $r){
//        $reg->setNumpar($i+1);
//      }
      $this->obj = array();
    }
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licsolegrob/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    if($codigo=='' ||  $codigo=='001')
    {
        $this->obj[1][9]->setOculta(true);
        $this->obj[1][11]->setOculta(true);
        $this->obj[1][14]->setOculta(true);
        $this->obj[1][15]->setOculta(true);
    }else
    {
        $this->obj[1][9]->setOculta(false);
        $this->obj[1][11]->setOculta(false);
        $this->obj[1][14]->setOculta(false);
        $this->obj[1][15]->setOculta(false);

    }    
    $this->obj = $this->obj[0]->getConfig($reg);
    $this->lisolegr->setGrid($this->obj);

  }

  public function configGridRec($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
      $c = new Criteria();
      $c->add(LisolegrrgoPeer::NUMSOL,$this->lisolegr->getNumsol());
      $reg = LisolegrrgoPeer::doSelect($c);
      $this->obj2 = array();
    }
    
    $this->obj2 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licsolegrob/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_rec');

    $this->obj2 = $this->obj2[0]->getConfig($reg);
    $this->lisolegr->setGrid_rec($this->obj2);

  }

  public function configGridUni($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
      $c = new Criteria();
      $c->add(LisolegrdirPeer::NUMSOL,$this->lisolegr->getNumsol());
      $reg = LisolegrdirPeer::doSelect($c);
      $this->obj3 = array();
    }

    $this->obj3 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licsolegrob/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_uni');

    $this->obj3 = $this->obj3[0]->getConfig($reg);
    $this->lisolegr->setGrid_uni($this->obj3);

  }

  public function configGridRgo($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LisolegrrgofacPeer::NUMSOL,$this->lisolegr->getNumsol());
      $c->addAscendingOrderByColumn(LisolegrrgofacPeer::CODRGO);
      $reg = LisolegrrgofacPeer::doSelect($c);
    }
    $this->obj4 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licsolegrob/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_rgo');

    $this->obj4 = $this->obj4[0]->getConfig($reg);
    $this->lisolegr->setGrid_rgo($this->obj4);

   }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');
    $sw=true;

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $this->ajax='1';
        $this->lisolegr = $this->getLisolegrOrCreate();
        $this->updateLisolegrFromRequest();
        $c = new Criteria();
        $c->add(LiptocuePeer::NUMPTOCUE,$codigo);
        $sql = "(Liptocue.tipconpub='O')";
        $c->add(LiptocuePeer::TIPCONPUB,$sql,Criteria::CUSTOM);
        $c->addJoin(LiprebasPeer::NUMPRE,LiptocuePeer::NUMPRE);
        $per = LiprebasPeer::doSelectOne($c);
        if($per)
        {
            $numemo = H::GetX('Numptocue','Liptocue','Numemo',$codigo);
            $numpre = $per->getNumpre();
            $nomext = H::GetX('Codfin','Fortipfin','Nomext',$per->getCodfin());
            $desclacomp = H::GetX('Codclacomp','Occlacomp','Desclacomp',$per->getCodclacomp());
            $tipcom = $per->getTipcom()=='N' ? 'NACIONAL' : 'INTERNACIONAL';
            $acto = $per->getActo()=='S' ? 'SI' : 'NO';
            $nompre= H::GetX('Codpre','Cpdeftit','Nompre',$per->getCodpre());
            $desprio = H::GetX('Codprio','Lipriocon','Desprio',$per->getCodprio());
            $despro = $per->getDespro();
            $nommon = H::GetX('Codmon','Tsdesmon','Nommon',$per->getCodmon());
            $codmon = $per->getCodmon().'  -  '.$nommon;
            $valcam = $per->getValcam();
            $feccam = $per->getFeccam();
            $monsub = H::FormatoMonto($per->getMonsub());
            $monrgo = H::FormatoMonto($per->getMonrgo());
            $monsol = H::FormatoMonto($per->getMonpre());
            $monsolle = H::obtenermontoescrito($per->getMonpre());;
            if($per->getValcam()>0)
            {
                $monsolext= $per->getMonpre()/$per->getValcam();
                $monsube= $per->getMonsub()/$per->getValcam();
                $monrgoe= $per->getMonrgo()/$per->getValcam();
                $js="$('divmonsolext').show();
                     $('divmonsolextletras').show();
                     $('divvalcam').show();
                     $('divfeccam').show();
                     $('divcodmon').show();";
            }else
            {
                $monsolext=0;
                $monsube=0;
                $monrgoe=0;
                $js="$('divmonsolext').hide();
                     $('divmonsolextletras').hide();
                     $('divvalcam').hide();
                     $('divfeccam').hide();
                     $('divcodmon').hide();";
            }
            $js.="toAjaxUpdater('divgrid2','6',getUrlModulo()+'ajax','$codigo','','');";
            $js.="toAjaxUpdater('divgrid3','7',getUrlModulo()+'ajax','$codigo','','');";
            $js.="toAjaxUpdater('divgrid_rgo','9',getUrlModulo()+'ajax','$codigo','','');";
            $monsolextle = H::obtenermontoescrito($monsolext);
            $monsolext = H::FormatoMonto($monsolext);
            $monsube= H::FormatoMonto($monsube);
            $monrgoe = H::FormatoMonto($monrgoe);
            $c = new Criteria();
            $c->add(LiptocuePeer::NUMPTOCUE,$codigo);
            $c->addJoin(LiprebasdetPeer::NUMPRE,LiptocuePeer::NUMPRE);
            $reg = LiprebasdetPeer::doSelect($c);            
            $this->configGrid($per->getCodmon(),$reg);
            $output = '[["lisolegr_desclacomp","'.$desclacomp.'",""],["lisolegr_nomext","'.$nomext.'",""],["lisolegr_acto","'.$acto.'",""],
                        ["lisolegr_tipcom","'.$tipcom.'",""],["lisolegr_numpre","'.$numpre.'",""],["lisolegr_numemo","'.$numemo.'",""],
                        ["lisolegr_nompre","'.$nompre.'",""],["lisolegr_desprio","'.$desprio.'",""],["lisolegr_despro","'.$despro.'",""],
                        ["lisolegr_codmon","'.$codmon.'",""],["lisolegr_valcam","'.$valcam.'",""],["lisolegr_feccam","'.$feccam.'",""],
                        ["lisolegr_monsub","'.$monsub.'",""],["lisolegr_monsube","'.$monsube.'",""],
                        ["lisolegr_monrgo","'.$monrgo.'",""],["lisolegr_monrgoe","'.$monrgoe.'",""],
                        ["lisolegr_monsol","'.$monsol.'",""],["lisolegr_monsolext","'.$monsolext.'",""],
                        ["lisolegr_monsolletras","'.$monsolle.'",""],["lisolegr_monsolextletras","'.$monsolextle.'",""],["javascript","'.$js.'",""]]';
        }else
        {
            $this->configGrid();
            $output = '[["","",""],["","",""],["","",""]]';
        }
        $sw=false;
        break;
      case '2':
            $nomemp = '';
            $nomcar = '';
            $coduniadm = '';
            $desuniadm = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODEMP,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $nomemp = $per->getNomemp();
                $nomcar = $per->getNomcar();
                $coduniadm = $per->getCoduniste();
                $desuniadm = $per->getDesuniste();
            }
            $output = '[["lisolegr_nomempadm","'.$nomemp.'",""],["lisolegr_nomcaradm","'.$nomcar.'",""],["lisolegr_coduniadm","'.$coduniadm.'",""],["lisolegr_desuniadm","'.$desuniadm.'",""]]';
        break;
      case '3':
            $coduniadm = '';
            $desuniadm = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODUNISTE,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $coduniadm = $per->getCoduniste();
                $desuniadm = $per->getDesuniste();
            }
            $output = '[["lisolegr_coduniadm","'.$coduniadm.'",""],["lisolegr_desuniadm","'.$desuniadm.'",""],["","",""]]';
        break;
      case '4':
            $nomemp = '';
            $nomcar = '';
            $coduniste = '';
            $desuniste = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODEMP,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $nomemp = $per->getNomemp();
                $nomcar = $per->getNomcar();
                $coduniste = $per->getCoduniste();
                $desuniste = $per->getDesuniste();
            }
            $output = '[["lisolegr_nomempeje","'.$nomemp.'",""],["lisolegr_nomcareje","'.$nomcar.'",""],["lisolegr_coduniste","'.$coduniste.'",""],["lisolegr_desuniste","'.$desuniste.'",""]]';
        break;
      case '5':
            $coduniste = '';
            $desuniste = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODUNISTE,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $coduniste = $per->getCoduniste();
                $desuniste = $per->getDesuniste();
            }
            $output = '[["lisolegr_coduniste","'.$coduniste.'",""],["lisolegr_desuniste","'.$desuniste.'",""],["","",""]]';
        break;
      case '6':
          $this->ajax='6';
          $this->lisolegr = $this->getLisolegrOrCreate();
          $this->updateLisolegrFromRequest();
          $c = new Criteria();
          $c->add(LiptocuePeer::NUMPTOCUE,$codigo);
          $c->addJoin(LiprergoPeer::NUMPRE,LiptocuePeer::NUMPRE);
          $reg = LiprergoPeer::doSelect($c);
          $this->configGridRec($reg);
          $sw=false;
          $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '7':
          $this->ajax='7';
          $this->lisolegr = $this->getLisolegrOrCreate();
          $this->updateLisolegrFromRequest();
          $c = new Criteria();
          $c->add(LiptocuePeer::NUMPTOCUE,$codigo);
          $c->addJoin(LiprebasdetPeer::NUMPRE,LiptocuePeer::NUMPRE);
          $reg = LiprebasdetPeer::doSelect($c);
          $this->configGridUni($reg);
          $sw=false;
          $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '8':
          $fecha = $this->getRequestParameter('fecha','');
          $dias = $this->getRequestParameter('dias','');
          if($fecha && $dias)
          {
              $sql="select to_char(to_date('$fecha','dd/mm/yyyy')+$dias,'dd/mm/yyyy') as fecven";
              if(H::BuscarDatos($sql, $rs))
                 $fecven = $rs[0]['fecven'];
          }else
             $fecven=null;
          $output = '[["lisolegr_fecven","'.$fecven.'",""],["","",""],["","",""]]';
        break;
      case '9':
          $this->ajax='9';
          $this->lisolegr = $this->getLisolegrOrCreate();
          $this->updateLisolegrFromRequest();
          $c = new Criteria();
          $c->add(LiptocuePeer::NUMPTOCUE,$codigo);
          $c->addJoin(LiprergofacPeer::NUMPRE,LiptocuePeer::NUMPRE);
          $reg = LiprergofacPeer::doSelect($c);
          $this->configGridRgo($reg);
          $sw=false;
          $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    if($sw)
        return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

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

      $this->lisolegr = $this->getLisolegrOrCreate();
      $this->updateLisolegrFromRequest();
      $this->configGrid();
      $this->configGridUni();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
      //$griduni = Herramientas::CargarDatosGridv2($this,$this->obj3,true);
      $this->coderr = Licitacion::ValidarSolEgr($this->lisolegr,$grid);

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
    $this->configGridRec();
    $this->configGridUni();
    $this->configGridRgo();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    $gridrec = Herramientas::CargarDatosGridv2($this,$this->obj2,true);
    //$griduni = Herramientas::CargarDatosGridv2($this,$this->obj3,true);
    $gridrgo = Herramientas::CargarDatosGridv2($this,$this->obj4,true);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {    
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    $gridrec = Herramientas::CargarDatosGridv2($this,$this->obj2,true);
    //$griduni = Herramientas::CargarDatosGridv2($this,$this->obj3,true);
    $griduni = array();
    $gridrgo = Herramientas::CargarDatosGridv2($this,$this->obj4,true);
    Licitacion::SalvarSolEgr($clasemodelo, $grid, $gridrec, $griduni,$gridrgo,'O');
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    Licitacion::EliminarSolEgr($clasemodelo);
    return parent::deleting($clasemodelo);
  }


}
