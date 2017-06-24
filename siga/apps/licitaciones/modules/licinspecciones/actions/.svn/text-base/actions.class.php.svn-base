<?php

/**
 * licinspeciones actions.
 *
 * @package    siga
 * @subpackage licinspeciones
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licinspeccionesActions extends autolicinspeccionesActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridArt();

  }

  public function configGridArt($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      $c = new Criteria();
      if(!$this->liinspecciones->getId()){

        // Aquí va el código para traernos los registros que contendrá el grid
        if($this->liinspecciones->getLivaluaciones()){
          $c->add(LidetparvalPeer::NUMVAL,$this->liinspecciones->getLivaluaciones()->getNumval());
          $where = "Lidetparval.ID NOT IN (SELECT Lidetparins.LIDETPARVAL_ID FROM Lidetparins INNER JOIN Liinspecciones ON Lidetparins.NUMINS=liinspecciones.NUMINS WHERE Liinspecciones.NUMVAL='".$this->liinspecciones->getNumval()."' )";
          $c->add(LidetparvalPeer::CODART,$where,Criteria::CUSTOM);
          $reg_lidetparval = LidetparvalPeer::doSelect($c);

          foreach ($reg_lidetparval as $lidetparval){
            $lidetparins = new Lidetparins();
            $lidetparins->setLidetparval($lidetparval);

            $reg[] = $lidetparins;

          }
        }else $reg=array();
      }else{
        $c->add(LidetparinsPeer::NUMINS,$this->liinspecciones->getNumins());
        $reg = LidetparinsPeer::doSelect($c);
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/liinspecciones/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Liinspecciones', 15);
    $c = new Criteria();
    $this->c ? $c=$this->c : '';
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPeerMethod('doSelect');
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
           $c->add(LivaluacionesPeer::NUMVAL,$codigo);
           $c->addJoin(LivaluacionesPeer::NUMCONT,LicontratPeer::NUMCONT);
           $c->add(LicontratPeer::TIPCONPUB,'O');
           $licontrat = LivaluacionesPeer::doSelectOne($c);
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
             $output = '[["liinspecciones_tipcom","'.$compra.'",""],["liinspecciones_destiplic","'.$modcon.'",""],
                         ["liinspecciones_desclacomp","'.$desclacomp.'",""],["liinspecciones_numrecofe","'.$numrecofe.'",""],["liinspecciones_numexp","'.$numexp.'",""],
                         ["liinspecciones_codpro","'.$codpro.'",""],["liinspecciones_nompro","'.$nompro.'",""],["liinspecciones_rifpro","'.$rifpro.'",""],["liinspecciones_nomrepleg","'.$nomrepleg.'",""],
                         ["liinspecciones_dirpro","'.$direccion.'",""],["liinspecciones_numofe","'.$numofe.'",""],["liinspecciones_fecofe","'.$fecofe.'",""],
                         ["liinspecciones_monofe","'.H::FormatoMonto($monofe).'",""],["liinspecciones_monofelet","'.H::obtenermontoescrito($monofe).'",""],
                         ["liinspecciones_monart","'.H::FormatoMonto($monsubofe).'",""],["liinspecciones_monrec","'.H::FormatoMonto($monrecofe).'",""],
                         ["liinspecciones_objcontcat","'.$licontrat->getObjcont().'",""],
                         ["liinspecciones_objcont","'.$licontrat->getObjcont().'",""],
                         ["liinspecciones_resolu","'.$licontrat->getResolu().'",""],
                         ["liinspecciones_fecrel","'.$licontrat->getFecrel('d/m/Y').'",""],
                         ["liinspecciones_numptocuecon","'.$licontrat->getNumptocuecon().'",""],
                         ["liinspecciones_numcont","'.$licontrat->getNumcont().'",""],
                         ["javascript","updateVarsGrida();",""],
                         ["","",""]]';

            $this->liinspecciones = $this->getLiinspeccionesOrCreate();
            $this->liinspecciones->setNumval($codigo);

            $this->configGridArt();
           }else{
             $output = '[["javascript","'."alert('La valuación no existe')".'",""]]';
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
            $output = '[["liinspecciones_nomempadm","'.$nomemp.'",""],["liinspecciones_nomcaradm","'.$nomcar.'",""],["liinspecciones_coduniadm","'.$coduniadm.'",""],["liinspecciones_desuniadm","'.$desuniadm.'",""]]';
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
            $output = '[["liinspecciones_coduniadm","'.$coduniadm.'",""],["liinspecciones_desuniadm","'.$desuniadm.'",""],["","",""]]';
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
            $output = '[["liinspecciones_nomempeje","'.$nomemp.'",""],["liinspecciones_nomcareje","'.$nomcar.'",""],["liinspecciones_coduniste","'.$coduniste.'",""],["liinspecciones_desuniste","'.$desuniste.'",""]]';
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
            $output = '[["liinspecciones_coduniste","'.$coduniste.'",""],["liinspecciones_desuniste","'.$desuniste.'",""],["","",""]]';
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
          $output = '[["liinspecciones_fecven","'.$fecven.'",""],["","",""],["","",""]]';
        break;
      case '7':
           $sw=false;
           $this->ajax='7';
           $numofe= $this->getRequestParameter('numofe','');
           $this->licontrat = $this->getliinspeccionesOrCreate();
           $this->licontrat->setNumofe($numofe);
           $this->configGridCroEnt();
           $js="toAjaxUpdater('divgridforpag','8',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '8':
           $sw=false;
           $this->ajax='8';
           $numofe= $this->getRequestParameter('numofe','');
           $this->licontrat = $this->getliinspeccionesOrCreate();
           $this->licontrat->setNumofe($numofe);
           $this->configGridForpag();
           $js="toAjaxUpdater('divgridrgo','9',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '9':
           $sw=false;
           $this->ajax='9';
           $numofe= $this->getRequestParameter('numofe','');
           $this->licontrat = $this->getliinspeccionesOrCreate();
           $this->licontrat->setNumofe($numofe);
           $this->configGridRgo();
           $js="toAjaxUpdater('divgridfia','10',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '10':
           $sw=false;
           $this->ajax='10';
           $numofe= $this->getRequestParameter('numofe','');
           $this->licontrat = $this->getliinspeccionesOrCreate();
           $this->licontrat->setNumofe($numofe);
           $this->configGridFia();
           $js="";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '11':

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

    $lidetparval = LidetparvalPeer::retrieveByPK($grid[$fila][12]);
    if($lidetparval){
      if( H::toFloat($grid[$fila][8])>$lidetparval->getCantid()) {
        $grid[$fila][8] = '0,0';
        $jsonextra = ',["javascript","alert('."'La cantidad de la valuación no puede ser mayor a la de la partida'".')",""]';
      }else{
        $grid[$fila][9] = number_format((H::toFloat($grid[$fila][8])* $lidetparval->getPreuni()), 2) ;
        $grid[$fila][10] = number_format((H::toFloat($grid[$fila][6]) - H::toFloat($grid[$fila][8])), 2) ;
        $grid[$fila][11] = number_format((H::toFloat($grid[$fila][7]) - H::toFloat($grid[$fila][9])), 2) ;

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

      $this->liinspecciones = $this->getliinspeccionesOrCreate();
      $this->updateliinspeccionesFromRequest();

      $this->configGridArt();
      $gridval = Herramientas::CargarDatosGridv2($this,$this->obj);

      $this->coderr = Licitacion::ValidarGridRegInsVal($this->liinspecciones,$gridval);

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
      $this->liinspecciones = $this->getliinspeccionesOrCreate();
      $this->updateliinspeccionesFromRequest();

      $this->configGridArt();

  }

  public function saving($clasemodelo)
  {
    if(!$clasemodelo->getId()){

      $gridparins = Herramientas::CargarDatosGridv2($this, $this->obj);

      Licitacion::SalvarGeneral($clasemodelo,'liinspecciones','Numins','Obinspecciones','O');
      parent::saving($clasemodelo);
      Licitacion::SalvarGridRegInsVal($clasemodelo, $gridparins);

      return -1;
    }else return -1;  }

  public function deleting($clasemodelo)
  {
    $lidetparinss = $clasemodelo->getLidetparinss();
    foreach($lidetparinss as $reg) $reg->delete();

    return parent::deleting($clasemodelo);
  }

}
