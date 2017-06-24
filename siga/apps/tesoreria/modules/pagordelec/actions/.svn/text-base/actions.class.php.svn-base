<?php

/**
 * pagordelec actions.
 *
 * @package    siga
 * @subpackage pagordelec
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class pagordelecActions extends autopagordelecActions
{
    
  public function executeIndex()
  {
    return $this->forward('pagordelec', 'edit');
  }    

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridOrdenes();
    //$this->opordpag->setFilasord($this->filas);
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
    if ($filsoldir=='S'){
       $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
       $t= new Criteria();
       $t->add(SegdirusuPeer::LOGUSE,$loguse);
       $t->setLimit(1);
       $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
       $regt= SegdirusuPeer::doSelectOne($t); 
       if ($regt){
        if ($this->opordpag->getCoddirec()=='')
          $this->opordpag->setCoddirec($regt->getCoddirec());
       }      
    }
  }

  public function configGridOrdenes($n1="", $n2="", $fec1="", $fec2="", $tip1="", $tip2="", $ced1="", $ced2="", $conc1="", $conc2="", $coddirec='')
  {
    $sql="";
    $tippagele=H::getX_vacio('CODEMP','Opdefemp','Tipagele','001');

    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
    if ($n1=="" && $n2=="" && $fec1=="" && $fec2=="" && $tip1=="" && $tip2=="" && $ced1=="" && $ced2==""  && $conc1=="" && $conc2=="")
    {
        $c = new Criteria();
        $c->add(OpordpagPeer::NUMORD,null);
        $detalle = OpordpagPeer::doSelect($c);
    }else {      
        $c = new Criteria();
        $c->add(OpordpagPeer::STATUS,'N');
        if ($filsoldir=='S') $c->add(OpordpagPeer::CODDIREC,$coddirec);
        if ($n1!="" && $n2!="") //Filtro Numero de Orden
        {
            //$c->add(OpordpagPeer::NUMORD,$n1,Criteria::GREATER_EQUAL);
            //$c->add(OpordpagPeer::NUMORD,$n2,Criteria::LESS_EQUAL);
            $sql="(opordpag.numord>='$n1' and opordpag.numord<='$n2') and ";
        }
        
        if ($fec1!="" && $fec2!="") //Filtro Fecha de Orden
        {
            //$c->add(OpordpagPeer::FECEMI,$fec1,Criteria::GREATER_EQUAL);
            //$c->add(OpordpagPeer::FECEMI,$fec2,Criteria::LESS_EQUAL);
            $sql.="(opordpag.fecemi>='$fec1' and opordpag.fecemi<='$fec2') and ";
        }
        
        if ($tip1!="" && $tip2!="") //Filtro Tipo de Orden
        {
            //$c->add(OpordpagPeer::TIPCAU,$tip1,Criteria::GREATER_EQUAL);
            //$c->add(OpordpagPeer::TIPCAU,$tip2,Criteria::LESS_EQUAL);
            $sql.="(opordpag.tipcau>='$tip1' and opordpag.tipcau<='$tip2') and ";

        }
        
        if ($ced1!="" && $ced2!="") //Filtro Beneficiario de Orden
        {
            //$c->add(OpordpagPeer::CEDRIF,$ced1,Criteria::GREATER_EQUAL);
            //$c->add(OpordpagPeer::CEDRIF,$ced2,Criteria::LESS_EQUAL);
            $sql.="(opordpag.cedrif>='$ced1' and opordpag.cedrif<='$ced2') and ";
        }

        if ($conc1!="" && $conc2!="") //Filtro Concepto de Pago de la Orden
        {
            $sql.="(opordpag.codconcepto>='$conc1' and opordpag.codconcepto<='$conc2') and ";
        }        
        $filopext=H::getConfApp2('filopext', 'tesoreria', 'tesmovemipagele');        
        if ($filopext=='S')
          $sql.= "(opordpag.STAELE isnull or opordpag.STAELE='S')";
        else{
          if ($tippagele=='S')
            $sql.="(opordpag.STAELE isnull or opordpag.STAELE='S')";
          else
            $sql.= "(opordpag.STAELE isnull or opordpag.STAELE='S') and opordpag.tipcau not in (select tipcau from cpdoccau where refier='N' and afeprc='N' and afecom='N' and afecau='N' and afedis='N')";
        }

        $loguse= $this->getUser()->getAttribute('loguse');
        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
        if ($filsoldir=='S') $sql.=' and opordpag.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';

        $c->add(OpordpagPeer::STAELE, $sql, Criteria :: CUSTOM);
        $c->add(OpordpagPeer::NUMCHE,null);  
        $c->addAscendingOrderByColumn(OpordpagPeer::NUMORD);
        $detalle = OpordpagPeer::doSelect($c);
    }

    $this->filas=count($detalle);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/pagordelec/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ordenes');

    $this->columnas[1][0]->setHTML('onClick="verificardatos(this.id)"');

    $this->objeto =$this->columnas[0]->getConfig($detalle);

    $this->opordpag->setObjeto($this->objeto);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato="";

    switch ($ajax){
      case '1':                  
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir2=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
        $codigo=$this->getRequestParameter('codigo');

        $q= new Criteria();
        if ($filsoldir2=='S'){
          $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
        }else $q->add(CadefdirecPeer::CODDIREC,$codigo);
        $reg= CadefdirecPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesdirec();         
        }else {
            $dato="";
            $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
            if ($cambiareti=='S')
              $js="alert_('La Estado no existe o no esta asociada al usuario'); $('opordpag_coddirec').value='';  $('$cajtexmos').value=''; $('opordpag_coddirec').focus();";
            else
             $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('opordpag_coddirec').value='';  $('$cajtexmos').value=''; $('opordpag_coddirec').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '2':
          $id=$this->getRequestParameter('id','');
          $js="";
          $q= new Criteria();
          $q->add(OpbenefiPeer::CEDRIF,$this->getRequestParameter('cedrif',''));
          $reg= OpbenefiPeer::doSelectOne($q);
          if ($reg)
          {
             if ($reg->getNumcueb()=='' || strlen($reg->getNumcueb())<20)
              $js="alert_('El Beneficiario no tiene Cuenta Bancaria asociada o no es v&aacute;lida'); $('$id').checked=false;";
            else if ($reg->getCodban()=='')
              $js="alert_('El Beneficiario no tiene Banco asociado'); $('$id').checked=false;";
            else if ($reg->getCodtipban()=='')
              $js="alert_('El Beneficiario no tiene Tipo de Cuenta asociado'); $('$id').checked=false;";
            
          }
        $output = '[["javascript","'.$js.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;   
      default:
          $numord1 = $this->getRequestParameter('opordpag[numord1]','');
          $numord2 = $this->getRequestParameter('opordpag[numord2]','');
          $fecord1 = $this->getRequestParameter('opordpag[fecemi1]');  $fecemi1="";
          if ($fecord1!=""){
            $dateFormat = new sfDateFormat('es_VE');
            $fecemi1 = $dateFormat->format($fecord1, 'i', $dateFormat->getInputPattern('d'));
          }
          $fecord2 = $this->getRequestParameter('opordpag[fecemi2]'); $fecemi2="";
          if ($fecord2!=""){
              $dateFormat = new sfDateFormat('es_VE');
              $fecemi2 = $dateFormat->format($fecord2, 'i', $dateFormat->getInputPattern('d'));
          }    
          $tipord1 = $this->getRequestParameter('opordpag[tipcau1]','');
          $tipord2 = $this->getRequestParameter('opordpag[tipcau2]','');
          $cedrif1 = $this->getRequestParameter('opordpag[cedrif1]','');
          $cedrif2 = $this->getRequestParameter('opordpag[cedrif2]','');
          $concepto1 = $this->getRequestParameter('opordpag[codconcepto1]','');
          $concepto2 = $this->getRequestParameter('opordpag[codconcepto2]','');
          $coddirec = $this->getRequestParameter('opordpag[coddirec]','');
          
          $this->params=array();
          $this->opordpag = $this->getOpordpagOrCreate();
          $this->updateOpordpagFromRequest();
          $this->labels = $this->getLabels();
          $this->configGridOrdenes($numord1, $numord2, $fecemi1, $fecemi2, $tipord1, $tipord2, $cedrif1, $cedrif2, $concepto1, $concepto2,$coddirec);
          $this->opordpag->setFilasord($this->filas);
          $numfilas=$this->filas;
          
        $output = '[["opordpag_filasord","'.$numfilas.'",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

//    return sfView::HEADER_ONLY;

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
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);

  }

  public function saving($clasemodelo)
  {
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
    OrdendePago::SalvarOrdenesPagoElectronicos($clasemodelo,$grid);
    return -1;
  }

  public function getLabels()
  {
    $labels = parent::getLabels();
  
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['opordpag{coddirec}'] = 'Estado';
    return $labels;
  }
}
