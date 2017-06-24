<?php

/**
 * facdecpla actions.
 *
 * @package    siga
 * @subpackage facdecpla
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facdecplaActions extends autofacdecplaActions
{

  public function editing()
  {
      if (!$this->fcotring->getId())
          $this->fcotring->setFunrec(sfContext::getInstance()->getUser()->getAttribute('usuario'));

     // $this->setVars();
      $this->configGrid($this->fcotring->getNrocon());
  }

  public function configGrid($nrocon='',$arreglo= array())
  {
     $reg=array();
    if (count($arreglo)>0)
    {
       $i=0;
       while ($i<count($arreglo))
       {
           $fcdeclar2= new Fcdeclar();
           $fcdeclar2->setNumero($i+1);
           $fcdeclar2->setFecven($arreglo[$i]["fecven"]);
           $fcdeclar2->setNombre($arreglo[$i]["nombre"]);
           $fcdeclar2->setTipo($arreglo[$i]["tipo"]);
           $fcdeclar2->setMondec($arreglo[$i]["mondec"]);
           $fcdeclar2->setEdodecstatus($arreglo[$i]["edodecstatus"]);
           $fcdeclar2->setFueing($arreglo[$i]["fueing"]);
           $reg[]=$fcdeclar2;
           $i++;
       }
    }else {
       $t= new Criteria();
       $t->add(FcdeclarPeer::NUMDEC,$nrocon);
       $reg= FcdeclarPeer::doSelect($t);
    }

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facdecpla/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_deuda');

    $this->grid = $this->columnas[0]->getConfig($reg);
    
    $this->fcotring->setGrid($this->grid);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato="";

    switch ($ajax){
      case '1':
         $rubros="";
         $montototal=0;
         $rubro = $this->getRequestParameter('rubro','');
         $c= new Criteria();
         $c->add(FcdefplaPeer::CODPLA,$codigo);
         $c->add(FcdeftasasPeer::CODFUE,$rubro);
         $c->addJoin(FcplatasPeer::CODTAS,FcdeftasasPeer::CODTAS);
         $c->addJoin(FcdefplaPeer::CODPLA,FcplatasPeer::CODPLA);
         $reg= FcdefplaPeer::doSelectOne($c);
         if ($reg) {
             $dato=$reg->getDespla();
             $rubros=Hacienda::llenarGridTasas($reg->getCodpla(),$montototal);
             
         }else {
             $js="alert('El Tipo de Planilla no Existe o no esta asociado al Rubro seleccionado'); $('fcotring_codpla').value=''; $('fcotring_codpla').focus();";
         }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["fcotring_rubros","'.$rubros.'",""],["fcotring_monimp","'.number_format($montototal,2,',','.').'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        $t= new Criteria();
        $t->add(FcconrepPeer::RIFCON,$codigo);
        $reg= FcconrepPeer::doSelectOne($t);
        if ($reg)
        {
           $nomcon=$reg->getNomcon();
           $dircon=$reg->getDircon();
          if ($reg->getNaccon()=='V')
             $js= $js."$('fcotring_naccon_V').checked=true; ";
          else
             $js= $js."$('fcotring_naccon_E').checked=true; ";
          
          if ($reg->getTipcon()=='N')
             $js= $js."$('fcotring_tipcon_N').checked=true; ";
          else
             $js= $js."$('fcotring_tipcon_J').checked=true; ";

        }else {
            $js="if (confirm('El Contribuyente no Existe. ¿Desea Incluirlo?')) { $('fcotring_nomcon').disabled=false;
                 $('fcotring_dircon').readOnly=false;
                 $('fcotring_naccon_V').disabled=false;
                 $('fcotring_naccon_E').disabled=false;
                 $('fcotring_tipcon_N').disabled=false;
                 $('fcotring_tipcon_J').disabled=false;
                 $('fcotring_incluircontribuyente').value='S';}";
        }

        $output = '[["'.$cajtexmos.'","'.$nomcon.'",""],["fcotring_dircon","'.$dircon.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
        $t= new Criteria();
        $t->add(FcconrepPeer::RIFCON,$codigo);
        $reg= FcconrepPeer::doSelectOne($t);
        if ($reg)
        {
           $nomconr=$reg->getNomcon();
           $dirconr=$reg->getDircon();
          if ($reg->getNaccon()=='V')
             $js= $js."$('fcotring_nacconr_V').checked=true; ";
          else
             $js= $js."$('fcotring_nacconr_E').checked=true; ";

          if ($reg->getTipcon()=='N')
             $js= $js."$('fcotring_tipconr_N').checked=true; ";
          else
             $js= $js."$('fcotring_tipconr_J').checked=true; ";

        }else {
             $js="if (confirm('El Respresentante no Existe. ¿Desea Incluirlo?')) { $('fcotring_nomconr').disabled=false;
                 $('fcotring_dirconr').readOnly=false;
                 $('fcotring_nacconr_V').disabled=false;
                 $('fcotring_nacconr_E').disabled=false;
                 $('fcotring_tipconr_N').disabled=false;
                 $('fcotring_tipconr_J').disabled=false;
                 $('fcotring_incluirrepresentante').value='S';}";
        }

        $output = '[["fcotring_nomconr","'.$nomconr.'",""],["fcotring_dirconr","'.$dirconr.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '4':
        $fecha = $this->getRequestParameter('fecha','');
        if($fecha !=""){
        $rubros = $this->getRequestParameter('rubros','');
        $dateFormat = new sfDateFormat('es_VE');
        $fec1 = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
        $this->params=array();
        $this->fcotring = $this->getFcotringOrCreate();
        $this->updateFcotringFromRequest();
        $this->labels = $this->getLabels();
        Hacienda::calcularDeclaracionPlanilla($fecha,$rubros,$arreglo);
        $this->configGrid('', $arreglo);

        //$js=$js." calcularTotales();";

        }else{
            $this->params=array();
            $this->fcotring = $this->getFcotringOrCreate();
            $this->updateFcotringFromRequest();
            $this->labels = $this->getLabels();
            $this->configGrid();
            $js="alert('La fecha de registro no puede estar en Blanco')";
        }

        $output = '[["javascript","'.$js.'",""],["","",""]]';
        break;
      case '5':          
         $c= new Criteria();
         $c->add(FcfueprePeer::CODFUE,$codigo);
         $reg= FcfueprePeer::doSelectOne($c);
         if ($reg) {
             $dato=$reg->getNomfue();            
         }else {
             $js="alert('El Rubro no Existe'); $('fcotring_codfue2').value=''; $('fcotring_codfue2').focus();";
         }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;        
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($ajax!='4') return sfView::HEADER_ONLY;
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
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Hacienda::salvarDeclaracionPlanillas($clasemodelo,$grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    $datos=H::getX_vacio('NUMPAG', 'Fcpagos', 'Numpag', $clasemodelo->getNrocon());
    if ($datos){
      return 737;}
    else {
        //H::EliminarRegistro('Fcdeclar', 'NUMDEC', $clasemodelo->getNrocon());
            $t = new Criteria();
            $t->add(FcdeclarPeer::NUMDEC, $clasemodelo->getNrocon());
            $t->add(FcdeclarPeer::RIFCON, $clasemodelo->getRifcon());
            $t->add(FcdeclarPeer::NUMREF, $clasemodelo->getCodpla());
            FcdeclarPeer::doDelete($t);
            
        $clasemodelo->delete();
        return -1;
    }
    
  }
}
