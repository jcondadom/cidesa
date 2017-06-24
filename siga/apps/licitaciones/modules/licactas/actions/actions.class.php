<?php

/**
 * licactini actions.
 *
 * @package    siga
 * @subpackage licactini
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licactasActions extends autolicactasActions
{

  public function listing()
  {
    
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->listing();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/liactas/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Liactas', 15);
    $c = new Criteria();
    $this->c ? $c=$this->c : '';
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPeerMethod('doSelectJoinLicontrat');
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {

    $litipact = LitipactPeer::doSelect(new Criteria());
    $arrtipact = array();
    foreach($litipact as $tipact){
      $arrtipact[$tipact->getCodtipact()] = $tipact->__toString();
    }

    $this->params['litipact'] = $arrtipact;

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
             $output = '[["liactas_tipcom","'.$compra.'",""],["liactas_destiplic","'.$modcon.'",""],
                         ["liactas_desclacomp","'.$desclacomp.'",""],["liactas_numrecofe","'.$numrecofe.'",""],["liactas_numexp","'.$numexp.'",""],
                         ["liactas_codpro","'.$codpro.'",""],["liactas_nompro","'.$nompro.'",""],["liactas_rifpro","'.$rifpro.'",""],["liactas_nomrepleg","'.$nomrepleg.'",""],
                         ["liactas_dirpro","'.$direccion.'",""],["liactas_numofe","'.$numofe.'",""],["liactas_fecofe","'.$fecofe.'",""],
                         ["liactas_monofe","'.H::FormatoMonto($monofe).'",""],["liactas_monofelet","'.H::obtenermontoescrito($monofe).'",""],
                         ["liactas_monart","'.H::FormatoMonto($monsubofe).'",""],["liactas_monrec","'.H::FormatoMonto($monrecofe).'",""],
                         ["liactas_objcontcat","'.$licontrat->getObjcont().'",""],
                         ["liactas_objcont","'.$licontrat->getObjcont().'",""],
                         ["liactas_resolu","'.$licontrat->getResolu().'",""],
                         ["liactas_fecrel","'.$licontrat->getFecrel('d/m/Y').'",""],
                         ["liactas_numptocuecon","'.$licontrat->getNumptocuecon().'",""],
                         ["","",""]]';
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
            $output = '[["liactas_nomempadm","'.$nomemp.'",""],["liactas_nomcaradm","'.$nomcar.'",""],["liactas_coduniadm","'.$coduniadm.'",""],["liactas_desuniadm","'.$desuniadm.'",""]]';
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
            $output = '[["liactas_coduniadm","'.$coduniadm.'",""],["liactas_desuniadm","'.$desuniadm.'",""],["","",""]]';
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
            $output = '[["liactas_nomempeje","'.$nomemp.'",""],["liactas_nomcareje","'.$nomcar.'",""],["liactas_coduniste","'.$coduniste.'",""],["liactas_desuniste","'.$desuniste.'",""]]';
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
            $output = '[["liactas_coduniste","'.$coduniste.'",""],["liactas_desuniste","'.$desuniste.'",""],["","",""]]';
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
          $output = '[["liactas_fecven","'.$fecven.'",""],["","",""],["","",""]]';
        break;
      case '7':
           $sw=false;
           $this->ajax='7';
           $numofe= $this->getRequestParameter('numofe','');
           $this->licontrat = $this->getLiactasOrCreate();
           $this->licontrat->setNumofe($numofe);
           $this->configGridCroEnt();
           $js="toAjaxUpdater('divgridforpag','8',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '8':
           $sw=false;
           $this->ajax='8';
           $numofe= $this->getRequestParameter('numofe','');
           $this->licontrat = $this->getLiactasOrCreate();
           $this->licontrat->setNumofe($numofe);
           $this->configGridForpag();
           $js="toAjaxUpdater('divgridrgo','9',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '9':
           $sw=false;
           $this->ajax='9';
           $numofe= $this->getRequestParameter('numofe','');
           $this->licontrat = $this->getLiactasOrCreate();
           $this->licontrat->setNumofe($numofe);
           $this->configGridRgo();
           $js="toAjaxUpdater('divgridfia','10',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '10':
           $sw=false;
           $this->ajax='10';
           $numofe= $this->getRequestParameter('numofe','');
           $this->licontrat = $this->getLiactasOrCreate();
           $this->licontrat->setNumofe($numofe);
           $this->configGridFia();
           $js="";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '11':
        $numcont= $this->getRequestParameter('numcont','');
        $c = new Criteria();
        $c->add(LitipactPeer::CODTIPACT,$codigo);
        $litipact = LitipactPeer::doSelectOne($c);
        $content = $litipact->getdettipact();
        $sustituye = array("(\r\n)", "(\n\r)", "(\n)", "(\r)");
        $content = preg_replace($sustituye, "", $content);
        $sw = false;
        if($litipact) {
          $this->js = "tinyMCE.activeEditor.dom.setHTML(tinyMCE.activeEditor.dom.select('p'), '".$content."');";
        }
        else $this->js=null;
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
    $this->editing();

  }

  public function saving($clasemodelo)
  {
    if(!$clasemodelo->getId()){
      Licitacion::SalvarGeneral($clasemodelo,'Liactas','Numact','Obactas','O');
      return parent::saving($clasemodelo);
    }else return -1;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
