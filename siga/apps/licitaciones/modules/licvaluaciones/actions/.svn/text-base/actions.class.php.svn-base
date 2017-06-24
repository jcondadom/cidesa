<?php

/**
 * licvaluaciones actions.
 *
 * @package    siga
 * @subpackage licvaluaciones
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licvaluacionesActions extends autolicvaluacionesActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridArt();

  }

  public function configGridArt($reg = array(),$regelim = array(),$numval='')
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      $c = new Criteria();
      if(!$this->livaluaciones->getId()){

        // Aquí va el código para traernos los registros que contendrá el grid
        if($this->livaluaciones->getLicontrat()){
          $c->add(LiregofedetPeer::NUMCONT,$this->livaluaciones->getNumcont());
          $reg_liregcondet = LiregcondetPeer::doSelect($c);

          foreach ($reg_liregcondet as $liregcondet){
            $lidetparval = new Lidetparval();
            $lidetparval->setCodart($liregcondet->getCodart());
            $lidetparval->setUnimed($liregcondet->getUnimed());
            $lidetparval->setCantid($liregcondet->getCantid());
            $lidetparval->setPreuni($liregcondet->getPreuni());
            $lidetparval->setMonrec($liregcondet->getMonrec());
            $lidetparval->setSubtot($liregcondet->getSubtot());
            $lidetparval->setLiregcondetId($liregcondet->getId());
            $lidetparval->setNumval($numval);

            $reg[] = $lidetparval;

          }
        }else $reg=array();
      }else{
        $c->add(LidetparvalPeer::NUMVAL,$this->livaluaciones->getNumval());
        $reg = LidetparvalPeer::doSelect($c);
      }
    }
    $this->obj = Herramientas::getConfigGrid('gridart');

    $this->obj = $this->obj[0]->getConfig($reg);
    $gridart['gridart'] = $this->obj;
    $this->params = $gridart;

  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->listing();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/livaluaciones/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Livaluaciones', 15);
    $c = new Criteria();
    $this->c ? $c=$this->c : '';
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPeerMethod('doSelectJoinLicontrat');
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
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
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');
    $this->ajax = $this->getRequestParameter('ajax','');
    $sw=true;

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
           $sw=false;
           $this->ajax='1';
           $bieser = '';
           $compra = '';
           $modcon = '';
           $desclacomp = '';
           $numrecofe= '';
           $numexp = '';
           $codpro = '';
           $numofe = '';
           $fecofe = '';
           $monofe = '';
           $nompro = '';
           $rifpro = '';
           $nomrepleg = '';
           $direccion = '';
           $monsubofe = '';
           $monrecofe = '';
           $c = new Criteria();
           $c->add(LicontratPeer::NUMCONT,$codigo);
           $c->add(LicontratPeer::TIPCONPUB,'O');
           $licontrat = LicontratPeer::doSelectOne($c);
           if($licontrat)
           {

             $c = new Criteria();
             $c->add(LiptocueconPeer::NUMPTOCUECON,$licontrat->getNumptocuecon());
             $sql = "(Liptocuecon.tipconpub='O')";
             $c->add(LiptocueconPeer::TIPCONPUB,$sql,Criteria::CUSTOM);
             $c->addJoin(LiplieespPeer::NUMEXP,LiptocueconPeer::NUMEXP);
             $c->addJoin(LiplieespPeer::NUMCOMINT,  LisolegrPeer::NUMSOL);
             $per = LisolegrPeer::doSelectOne($c);
             if($per)
             {
                 $compra = $per->getTipcom();
                 $modcon = H::GetX('Codtiplic','Litiplic','Destiplic',$per->getCodtiplic());
                 $desclacomp = $per->getDesclacomp();
                 $numplie = H::GetX('Numexp','Liplieesp','Numplie',$codigo);
             }
             $numrecofe = H::GetX('Numptocuecon','Liptocuecon','Numrecofe',$codigo);
             $c = new Criteria();
             $c->add(LirecomenPeer::NUMRECOFE,  $numrecofe);
             $c->addJoin(LiregofePeer::NUMEXP,LirecomenPeer::NUMEXP);
             $c->addJoin(LirecomenPeer::NUMRECOFE,LirecomendetPeer::NUMRECOFE);
             $c->addJoin(LiregofePeer::CODPRO,LirecomendetPeer::CODPRO);
             $c->addDescendingOrderByColumn(LirecomendetPeer::PUNTOT);
             $per = LiregofePeer::doSelectOne($c);
             if($per)
             {
                  $numexp = $per->getNumexp();
                  $codpro = $per->getCodpro();
                  $numofe = $per->getNumofe();
                  $fecofe = $per->getFecofe('d/m/Y');
                  $monsubofe = $per->getMonofe();
                  $monrecofe = $per->getMonrecofe();
                  $monofe = $per->getMonofetot();
             }
             $c = new Criteria();
             $c->add(LiregofePeer::NUMOFE,$numofe);
             $c->addJoin(LiempparPeer::NUMEXP,LiregofePeer::NUMEXP);
             $c->addJoin(LiregofePeer::CODPRO,LiempparPeer::CODPRO);
             $per = LiempparPeer::doSelectOne($c);
             if($per)
             {
                 $nompro=$per->getNompro();
                 $rifpro=$per->getrifpro();
                 $nomrepleg=$per->getNomrepleg();
                 $direccion=H::GetX('Codpro','Caprovee','Dirpro',$per->getCodpro());
             }

             $js="";
             $output = '[["livaluaciones_tipcom","'.$compra.'",""],["livaluaciones_destiplic","'.$modcon.'",""],
                         ["livaluaciones_desclacomp","'.$desclacomp.'",""],["livaluaciones_numrecofe","'.$numrecofe.'",""],["livaluaciones_numexp","'.$numexp.'",""],
                         ["livaluaciones_codpro","'.$codpro.'",""],["livaluaciones_nompro","'.$nompro.'",""],["livaluaciones_rifpro","'.$rifpro.'",""],["livaluaciones_nomrepleg","'.$nomrepleg.'",""],
                         ["livaluaciones_dirpro","'.$direccion.'",""],["livaluaciones_numofe","'.$numofe.'",""],["livaluaciones_fecofe","'.$fecofe.'",""],
                         ["livaluaciones_monofe","'.H::FormatoMonto($monofe).'",""],["livaluaciones_monofelet","'.H::obtenermontoescrito($monofe).'",""],
                         ["livaluaciones_monart","'.H::FormatoMonto($monsubofe).'",""],["livaluaciones_monrec","'.H::FormatoMonto($monrecofe).'",""],
                         ["livaluaciones_objcontcat","'.$licontrat->getObjcont().'",""],
                         ["livaluaciones_objcont","'.$licontrat->getObjcont().'",""],
                         ["livaluaciones_resolu","'.$licontrat->getResolu().'",""],
                         ["livaluaciones_fecrel","'.$licontrat->getFecrel('d/m/Y').'",""],
                         ["livaluaciones_numptocuecon","'.$licontrat->getNumptocuecon().'",""],
                         ["javascript","updateVarsGrida();",""],
                         ["","",""]]';

             $combolicroent = array();
             $c = new Criteria();
             $c->add(LiforpagPeer::NUMOFE, $numofe);
             $c->add(LiforpagPeer::NUMVAL,0,Criteria::NOT_EQUAL);
             $liforpag = LiforpagPeer::doSelect($c);
             if($liforpag ){
              foreach($liforpag as $forpag ){
                $combolicroent[$forpag->getNumval()] = 'Valuación '.$forpag->getNumval();
              }
              $this->combolicroent = $combolicroent;
             }else $this->combolicroent = array();
             
           }else{
             $output = '[["javascript","'."alert('El contrato no existe')".'",""]]';
           }
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
            $output = '[["livaluaciones_nomempadm","'.$nomemp.'",""],["livaluaciones_nomcaradm","'.$nomcar.'",""],["livaluaciones_coduniadm","'.$coduniadm.'",""],["livaluaciones_desuniadm","'.$desuniadm.'",""]]';
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
            $output = '[["livaluaciones_coduniadm","'.$coduniadm.'",""],["livaluaciones_desuniadm","'.$desuniadm.'",""],["","",""]]';
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
            $output = '[["livaluaciones_nomempeje","'.$nomemp.'",""],["livaluaciones_nomcareje","'.$nomcar.'",""],["livaluaciones_coduniste","'.$coduniste.'",""],["livaluaciones_desuniste","'.$desuniste.'",""]]';
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
            $output = '[["livaluaciones_coduniste","'.$coduniste.'",""],["livaluaciones_desuniste","'.$desuniste.'",""],["","",""]]';
        break;
      case '6':
          $fecha = $this->getRequestParameter('fecha','');
          $dias = $this->getRequestParameter('dias','');
          if($fecha && $dias)
          {
              $sql="select to_char(to_date('$fecha','dd/mm/yyyy')+$dias,'dd/mm/yyyy') as fecven";
              if(H::BuscarDatos($sql, $rs))
                 $fecven = $rs[0]['fecven'];
          }else
             $fecven=null;
          $output = '[["livaluaciones_fecven","'.$fecven.'",""],["","",""],["","",""]]';
        break;
      case '7':
           $sw=false;
           $this->ajax='7';
           $numofe= $this->getRequestParameter('numofe','');
           $this->licontrat = $this->getlivaluacionesOrCreate();
           $this->licontrat->setNumofe($numofe);
           $this->configGridCroEnt();
           $js="toAjaxUpdater('divgridforpag','8',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '8':
           $sw=false;
           $this->ajax='8';
           $numofe= $this->getRequestParameter('numofe','');
           $this->licontrat = $this->getlivaluacionesOrCreate();
           $this->licontrat->setNumofe($numofe);
           $this->configGridForpag();
           $js="toAjaxUpdater('divgridrgo','9',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '9':
           $sw=false;
           $this->ajax='9';
           $numofe= $this->getRequestParameter('numofe','');
           $this->licontrat = $this->getlivaluacionesOrCreate();
           $this->licontrat->setNumofe($numofe);
           $this->configGridRgo();
           $js="toAjaxUpdater('divgridfia','10',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '10':
           $sw=false;
           $this->ajax='10';
           $numofe= $this->getRequestParameter('numofe','');
           $this->licontrat = $this->getlivaluacionesOrCreate();
           $this->licontrat->setNumofe($numofe);
           $this->configGridFia();
           $js="";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '11':
        $sw=false;
        $this->livaluaciones = $this->getLivaluacionesOrCreate();
        $this->livaluaciones->setNumcont($this->getRequestParameter('numcont',''));

        $this->configGridArt(array(),array(),$codigo);

        $output = '[["","",""],["","",""]]';
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

  }

  public function executeAjaxfila()
  {
    $name = $this->getRequestParameter('grid', 'a');
    $grid = $this->getRequestParameter('grid' . $name, '');

    $fila = $this->getRequestParameter('fila', '');
    $columna = $this->getRequestParameter('columna', '');

    $jsonextra = '';

    $liregofedet = LiregofedetPeer::retrieveByPK($grid[$fila][9]);
    if($liregofedet){
      if( H::toFloat($grid[$fila][6])>$liregofedet->getCantid()) {
        $grid[$fila][6] = '0,0';
        $jsonextra = ',["javascript","alert('."'La cantidad de la valuación no puede ser mayor a la de la partida'".')",""]';
      }else{
        $grid[$fila][7] = number_format((H::toFloat($grid[$fila][6])* $liregofedet->getPreuni()), 2) ;

        $jsonextra = ',["javascript","ActualizarSaldosGrid('."'a'".',ArrTotales_a);",""]';

      }

    }else{

      $jsonextra = ',["javascript","alert('."'La partida no pertenece a este contrato'".')",""]';
    }

    

    $output = Herramientas::grid_to_json($grid, $name, $jsonextra);

    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->livaluaciones = $this->getLivaluacionesOrCreate();
      $this->updateLivaluacionesFromRequest();

      $this->configGridArt();
      $gridval = Herramientas::CargarDatosGridv2($this,$this->obj);

      $this->coderr = Licitacion::ValidarGridRegValCont($this->livaluaciones,$gridval);

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
      $this->livaluaciones = $this->getLivaluacionesOrCreate();
      $this->updateLivaluacionesFromRequest();

      $this->configGridArt();

  }

  public function saving($clasemodelo)
  {
    if(!$clasemodelo->getId()){

      $gridparval = Herramientas::CargarDatosGridv2($this, $this->obj);

      Licitacion::SalvarGeneral($clasemodelo,'Livaluaciones','Numval','Obvaluaciones','O');
      parent::saving($clasemodelo);
      Licitacion::SalvarGridRegValCont($clasemodelo, $gridparval);
      
      return -1;
    }else return -1;  }

  public function deleting($clasemodelo)
  {
    $lidetparvals = $clasemodelo->getLidetparvals();
    foreach($lidetparvals as $reg) $reg->delete();

    return parent::deleting($clasemodelo);
  }


}
