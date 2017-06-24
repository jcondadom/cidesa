<?php

/**
 * faciecaj actions.
 *
 * @package    siga
 * @subpackage faciecaj
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class faciecajActions extends autofaciecajActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $this->faciecaj->setCodusu($loguse);
        

        $c = new Criteria();
        $c->add(UsuariosPeer::LOGUSE,$loguse);
        $r = UsuariosPeer::doSelectOne($c);

        $d = new Criteria();
        $d->add(CausualmPeer::CEDEMP,$r->getCedemp());
        $x = CausualmPeer::doSelect($d);

        $opciones = array();

        foreach($x as $a){
            $opciones[$a->getCodalm()]=$a->getCodalm();
        }

        $this->configGrid();
        $this->params['opciones'] = $opciones;
  }

  public function configGrid($codcaj = 0)
  {
        $res = FadefbilPeer::doSelect(new Criteria());
        $billetes=array();

        foreach($res as $a){
            $fadefbil=new Fadefbil();
            $fadefbil->setCodbil($a->getCodbil());
            $fadefbil->setDesbil($a->getDesbil());
            $fadefbil->setDenbil($a->getDenbil());
            $billetes[]=$fadefbil;
        }

        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/faciecaj/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_efectivo');
        $this->obj = $this->columnas[0]->getConfig($billetes);
        $params['Gride'] = $this->obj;

        $sql = "select
                    a.*,coalesce(b.comision,0) as comision, 
                    trim(to_char(((a.monpag*coalesce(b.comision,0))+a.monpag), '999,999,999,999.00')) as total,
                    '' as check
                from
                    (select
                        a.id, a.reffac, c.numero, d.destippag, e.nomban, c.monpag, d.id as tippagid, e.id as codbanid
                     from
                        fafactur a, faconpag b, faforpag c, fatippag d, fabancos e
                     where
                        to_char(a.fecfac,'yyyy-mm-dd')=to_char(now(),'yyyy-mm-dd')
                        and a.codcaj=".$codcaj."
                        and b.tipconpag='C'
                        and coalesce(d.tipcan,'E')<>'E'
                        and a.codconpag=b.id
                        and c.reffac=a.reffac
                        and c.tippag=d.id
                        and c.nomban=e.codban) a left outer join facomban b on a.tippagid=b.tippag_id and a.codbanid=b.codban_id
                order by
                    a.destippag,a.reffac;";

        Herramientas::BuscarDatos($sql, &$result);

        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/faciecaj/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_movimiento');
        $this->obj = $this->columnas[0]->getConfig($result);
        $params['Gridm'] = $this->obj;
        $this->params = $params;
        
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $this->ajax = $this->getRequestParameter('ajax','');

    $sw = true;
    $js = "";

    switch ($this->ajax){
        
      case '1':
          $sw=false;
          $this->almacen=$codigo;
          $this->faciecaj = $this->getFaciecajOrCreate();
          $this->updateFaciecajFromRequest();
          $output = '[["","",""],["","",""],["","",""]]';
        break;

      case '2':
          $b=new Criteria();
          $b->add(FaapecajPeer::CODCAJ,$codigo);
          $b->add(FaapecajPeer::STACAJ,'A');
          $x = FaapecajPeer::doSelectOne($b);

          $c=new Criteria();
          $c->add(FafacturPeer::CODCAJ,$codigo);
          $c->add(FafacturPeer::FECFAC,date('Y-m-d'));
          $c->addAscendingOrderByColumn(FafacturPeer::ID);
          $m =  FafacturPeer::doSelectOne($c);

          $d=new Criteria();
          $d->add(FafacturPeer::CODCAJ,$codigo);
          $d->add(FafacturPeer::FECFAC,date('Y-m-d'));
          $d->addDescendingOrderByColumn(FafacturPeer::ID);
          $n = FafacturPeer::doSelectOne($d);

          if(!$m){
              $js="alert('La Caja no tiene Facturas Asociadas')";
              $output = '[["faciecaj_codape","",""],["faciecaj_numfacini","",""],["faciecaj_numfaccie","",""],["faciecaj_numctrini","",""],["faciecaj_numctrcie","",""],["javascript","'.$js.'",""]]';
          }
          else{
              $codape=$x->getId();
              $numfacini=$m->getReffac();
              $numfaccie=$n->getReffac();
              $numctrini=$m->getNumcontrol();
              $numctrcie=$n->getNumcontrol();
              $output = '[["faciecaj_codape","'.$codape.'",""],["faciecaj_numfacini","'.$numfacini.'",""],["faciecaj_numfaccie","'.$numfaccie.'",""],["faciecaj_numctrini","'.$numctrini.'",""],["faciecaj_numctrcie","'.$numctrcie.'",""],["javascript","'.$js.'",""]]';
          }
          $this->configGrid($codigo);
          $sw=false;
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if ($sw){
        return sfView::HEADER_ONLY;  
    }
  }

  public function executeAjaxfila(){

      $name = $this->getRequestParameter('grid','a');
      $grid = $this->getRequestParameter('grid'.$name,'');
      $fila = $this->getRequestParameter('fila','');
      $col = $this->getRequestParameter('columna', '');
      $js = "$('faciecaj_moncie').value = $('faciecaj_totalc').toFloat()+$('faciecaj_totalm').toFloat(); toFloatVE('faciecaj_moncie');";
      $jsonextra=',["javascript","javascript: ValidarMontoGridv2($('."'ax_".$fila."_5'".'),2);",""],["javascript","'.$js.'",""]';

      $grid[$fila][$col]=$grid[$fila][$col-1]*$grid[$fila][$col-2];
      
      $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }

  public function executeAjaxgrid(){

        $name = $this->getRequestParameter('grid', 'b');
        $grid = $this->getRequestParameter('grid'.$name,'');
        $fila = $this->getRequestParameter('fila', '');
        $col = $this->getRequestParameter('columna', '');
        $jsonextra = "";
        $totalm = 0;
        $i = 0;

        while($i < count($grid)){
            if(isset($grid[$i][$col-1])){
                $totalm = $totalm + $grid[$i][$col-3];

            }
         $i++;
        }

        $js = "$('faciecaj_moncie').value = $('faciecaj_totalc').toFloat()+$('faciecaj_totalm').toFloat(); toFloatVE('faciecaj_moncie');";
        $jsonextra = ',["faciecaj_totalm","' . H::FormatoMonto($totalm) . '",""],["javascript","'.$js.'",""]';
        $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
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
        
        $this->faciecaj = $this->getFaciecajOrCreate();
        $this->updateFaciecajFromRequest();
        $this->configGrid();
        $gride = Herramientas::CargarDatosGridv2($this, $this->params['Gride'],true);
        $gridm = Herramientas::CargarDatosGridv2($this, $this->params['Gridm'],true);

        $this->coderr = Facturacionv2::validarEfectivoCaja($this->faciecaj, $gride);
        $this->coderr = Facturacionv2::validarMovimientoCaja($this->faciecaj, $gridm);
        
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
    //$this->configGrid();
    $this->editing();
    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $this->configGrid();
    $gride = Herramientas::CargarDatosGridv2($this, $this->params['Gride'],true);
    $gridm = Herramientas::CargarDatosGridv2($this, $this->params['Gridm'],true);

    Facturacionv2::salvarCajaDetalles($clasemodelo, $gride, $gridm);

    return -1;
    //parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }
}
