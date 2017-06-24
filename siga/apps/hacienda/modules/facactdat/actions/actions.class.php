<?php

/**
 * facactdat actions.
 *
 * @package    siga
 * @subpackage facactdat
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facactdatActions extends autofacactdatActions
{
    
 public function executeIndex()
  {
    return $this->forward('facactdat', 'edit');
  }    

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid();
  }

  public function configGrid($rifcon='')
  {
    $c = new Criteria();
    $c->add(FcdeclarPeer::RIFCON,$rifcon);
    $c->add(FcdeclarPeer::EDODEC,'P',Criteria::NOT_EQUAL);
    $c->add(FcdeclarPeer::EDODEC,'X',Criteria::NOT_EQUAL);
    $c->addAscendingOrderByColumn(FcdeclarPeer::NUMDEC);
    $c->addAscendingOrderByColumn(FcdeclarPeer::FECVEN);
    $c->addAscendingOrderByColumn(FcdeclarPeer::FUEING);
    $declaracion = FcdeclarPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facactdat/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_deuda');

    $this->columnas[1][7]->setCombo(array('PAGADA' => 'Pagada', 'VENCIDA' => 'Vencida', 'VIGENTE' => 'Pendiente'));
    
    $this->grid =$this->columnas[0]->getConfig($declaracion);

    $this->fcdeclar->setGrid($this->grid);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato=""; $sw=true;

    switch ($ajax){
      case '1':
        $sw=false;
        $c = new Criteria();
        $c->add(FcdeclarPeer::RIFCON,$codigo);
        $c->add(FcdeclarPeer::EDODEC,'P',Criteria::NOT_EQUAL);
        $c->add(FcdeclarPeer::EDODEC,'X',Criteria::NOT_EQUAL);
        $c->addAscendingOrderByColumn(FcdeclarPeer::NUMDEC);
        $c->addAscendingOrderByColumn(FcdeclarPeer::FECVEN);
        $c->addAscendingOrderByColumn(FcdeclarPeer::FUEING);
        $tiedeu = FcdeclarPeer::doSelect($c);
        if ($tiedeu)
        {
            $dato=H::getX_vacio('RIFCON', 'Fcconrep', 'Nomcon', $codigo);
        }else {
            $codigo='';
            $js="alert('El contribuyente no tiene deuda'); $('fcdeclar_rifcon').value=''; $('fcdeclar_rifcon').focus();";
        }
        $this->params=array();
        $this->fcdeclar = $this->getFcdeclarOrCreate();
        $this->labels = $this->getLabels();
        
        $this->configGrid($codigo);
        $js.= " calcularTotales()";
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      default:
        if ($this->getRequestParameter('motivo')!="")
        {
            $this->fcdeclar = $this->getFcdeclarOrCreate();
            $this->updateFcdeclarFromRequest();
            $this->configGrid();
            $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
            $j=0;
            $x=$grid[0];
            while ($j<count($x))
            {
                if ($x[$j]->getCheck()=="1")
                {
                   $e= new Criteria();
                   $e->add(FcdeclarPeer::RIFCON,$this->fcdeclar->getRifcon());
                   $e->add(FcdeclarPeer::FECVEN,$x[$j]->getFecven());
                   $e->add(FcdeclarPeer::NUMDEC,$x[$j]->getNumdec());
                   $e->add(FcdeclarPeer::NUMERO,$x[$j]->getNumero());
                   $e->add(FcdeclarPeer::NUMREF,$x[$j]->getNumref());
                   $e->add(FcdeclarPeer::TIPO,$x[$j]->getTipo());
                   $e->add(FcdeclarPeer::FUEING,$x[$j]->getFueing());
                   $result= FcdeclarPeer::doSelectOne($e);
                   if ($result)
                   {
                       $fcelideclar= new Fcelideclar();
                       $fcelideclar->setNumdec($result->getNumdec());
                       $fcelideclar->setFecven($result->getFecven());
                       $fcelideclar->setFueing($result->getFueing());
                       $fcelideclar->setFecdec($result->getFecdec());
                       $fcelideclar->setRifcon($result->getRifcon());
                       $fcelideclar->setTipo($result->getTipo());
                       $fcelideclar->setNumref($result->getNumref());
                       $fcelideclar->setMondec($result->getMondec());
                       $fcelideclar->setEdodec($result->getEdodec());
                       $nomuse= sfContext::getInstance()->getUser()->getAttribute('usuario');   
                       $fcelideclar->setFunrec($nomuse);
                       $fcelideclar->setModo($result->getModo());
                       $fcelideclar->setNumero($result->getNumero());
                       $fcelideclar->setNomcon($result->getNomcon());
                       $fcelideclar->setAnodec($result->getAnodec());
                       $fcelideclar->setMotivo($this->getRequestParameter('motivo'));
                       $fcelideclar->save();
                       
                       $result->delete();
                   }
                }
                $j++;
            }
            
        }
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw) return sfView::HEADER_ONLY;

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
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
  }

  public function saving($clasemodelo)
  {
     $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
     Hacienda::actualizarDatos($clasemodelo,$grid);
    return -1;
  }
}
