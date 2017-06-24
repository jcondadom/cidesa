<?php

/**
 * confincue actions.
 *
 * @package    siga
 * @subpackage confincue
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class confincueActions extends autoconfincueActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    if (!$this->contabb->getId())
    {
      $q= new Criteria();
      $q->add(Contaba1Peer::PEREJE,'01');
      $resulq= Contaba1Peer::doSelectOne($q);
      if ($resulq) {
        $this->contabb->setFecini($resulq->getFecini());
        $this->contabb->setFeccie($resulq->getFeccie());
      }
    }
     $this->configGrid($this->contabb->getCodcta(),$this->contabb->getId());    
  }

  public function configGrid($codcta='', $nuevo='')
  {
    $per=array();
    if ($nuevo!=''){
      $c = new Criteria();
      $c->add(Contabb1Peer::CODCTA,$codcta);
      $c->addAscendingOrderByColumn(Contabb1Peer::PEREJE);
      $per = Contabb1Peer::doSelect($c);
    }else {
       $i=0;
       while ($i<12)
       {
         $contabb1_new= new Contabb1();
         $contabb1_new->setPereje(str_pad($i+1,2,'0',STR_PAD_LEFT));
         $contabb1_new->setTotdeb(0);
         $contabb1_new->setTotcre(0);
         $contabb1_new->setSalper(0);
         $contabb1_new->setSalact(0);
         $contabb1_new->setSalprgper(0);
         $per[]=$contabb1_new;
         $i++;
       }
        asort($per);
    }
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/confincue/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_det');

    $this->obj = $this->columnas[0]->getConfig($per);
    
    $this->contabb->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato="";

    switch ($ajax){
      case '1':
        $formato=H::ObtenerFormato('Contaba','Forcta');
        Herramientas::FormarCodigoPadre($codigo,$nivelcodigo,$ultimo,$formato);
        print $formato.' '.$ultimo;
        $c= new Criteria();
        $c->add(ContabbPeer::CODCTA,$ultimo);
        $contabb = ContabbPeer::doSelectOne($c);
        if (!$contabb)
        {
           if ($nivelcodigo == 0)
             $js="alert('El Nivel Anterior No Existe'); $('contabb_codcta').value=''; $('contabb_codcta').focus();";
        }else {
          if ($contabb->getCargab()=='C')
            $js="alert('El Código Padre de esta Cuenta ya es Cargable, no puede tener mas hijos'); $('contabb_codcta').value=''; $('contabb_codcta').focus();";
          else {
            $p= new Criteria();
            $p->add(ContabbPeer::CODCTA,$codigo);
            $resulp= ContabbPeer::doSelectOne($p);
            if (!$resulp){
              if ($contabb->getDebcre()=='D') $js="$('contabb_debcre_D').checked=true; ";
              else $js="$('contabb_debcre_C').checked=true; ";
              if ($contabb->getCargab()=='C') $js.="$('contabb_cargab_C').checked=true;";
              else $js.="$('contabb_cargab_N').checked=true;";
            }else $js="alert('La Cuenta Contable ya esta registrada'); $('contabb_codcta').value=''; $('contabb_codcta').focus();";
          }
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

        $formato=H::ObtenerFormato('Contaba','Forcta');
        Herramientas::FormarCodigoPadre($this->getRequestParameter('contabb[codcta]'),$nivelcodigo,$ultimo,$formato);
        $c= new Criteria();
        $c->add(ContabbPeer::CODCTA,$ultimo);
        $contabb = ContabbPeer::doSelectOne($c);
        if (!$contabb)
        {
           if ($nivelcodigo == 0)
             $this->coderr=100;
        }else {
          if ($contabb->getCargab()=='C')
            $this->coderr=645;
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
    $error=Contabilidad::salvarConfincue($clasemodelo, $grid);
    return $error;
  }

  public function deleting($clasemodelo)
  {
    $q= new Criteria();
    $q->add(ContabaPeer::CODEMP,'001');
    $resul=ContabaPeer::doSelectOne($q);
    if ($resul)    
      $etadef=$resul->getEtadef();

    if ($etadef=='C')
      return 635;
    elseif (H::buscarCodigoHijo('codcta', 'contabb', $clasemodelo->getCodcta()))
     return 648;
    else{
      $error=Contabilidad::verificarEliminar($clasemodelo);
      if ($error==-1){
        H::EliminarRegistro('Contabb1','CODCTA',$clasemodelo->getCodcta());
        H::EliminarRegistro('Contabb','CODCTA',$clasemodelo->getCodcta());
        return -1;
      }else return $error;
    }
  }


  public function executeCreate()
  {
    $c= new Criteria();
    $c->add(ContabaPeer::CODEMP,'001');
    $contaba=ContabaPeer::doSelectOne($c);
    if (!$contaba)
    {
      $this->getRequest()->setError('valida', 'Debe configurar las Definiciones Específicas de la Institución para poder cargar Cuentas Nuevas.');
      return $this->forward('confincue', 'list');
    }else {
      if ($contaba->getForcta()==''){
        $this->getRequest()->setError('valida', 'Debe Definir el Formato de la Cuenta Contable.');
         return $this->forward('confincue', 'list');
      }else if ($contaba->getEtadef()=='C'){
         $this->getRequest()->setError('valida', 'La Etapa de Definición está Cerrada.');
         return $this->forward('confincue', 'list');
      }
    }
    return $this->forward('confincue', 'edit');
  }


}
