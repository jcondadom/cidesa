<?php

/**
 * almentdes actions.
 *
 * @package    siga
 * @subpackage almentdes
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almentdesActions extends autoalmentdesActions
{

  public function editing()
  {
    $this->configGrid($this->caentalm->getRcpart());

  }

  public function configGrid($rcpart='',$dphart='')
  {
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almentdes/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_detalle');

    if ($dphart!="")
    {
        $c = new Criteria();
        $c->add(CaartdphPeer::DPHART,$dphart);
        $det = CaartdphPeer::doSelect($c);
        if ($det)
        {
            foreach ($det as $obj)
            {
              $cadetent2= new Cadetent();
              $cadetent2->setCodart($obj->getCodart());
              $cadetent2->setDesart(H::getX('CODART','Caregart','Desart',$obj->getCodart()));
              $cadetent2->setCanrec($obj->getCandph());
              $cadetent2->setCosart($obj->getPreart());
              $cadetent2->setMontot($obj->getMontot());
              $cadetent2->setCodalm($obj->getCodalm());
              $cadetent2->setNomalm(H::getX('CODALM','Cadefalm','Nomalm',$obj->getCodalm()));
              $cadetent2->setCodubi($obj->getCodubi());
              $cadetent2->setNomubi(H::getX('CODUBI','Cadefubi','Nomubi',$obj->getCodubi()));              
              $cadetent2->setNumlot($obj->getNumlot());
              $detalle[]=$cadetent2;
            }
        } 
    }else {
        $c = new Criteria();
        $c->add(CadetentPeer::RCPART,$rcpart);
        $detalle = CadetentPeer::doSelect($c);
    }

    $mascaraart=Herramientas::getMascaraArticulo();
    $lonart=strlen($mascaraart);

    $obj= array('codart' => 1, 'desart' => 2);                                                                                                                                                                                                                                                   
    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonart.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraart.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjax(\'5\',getUrlModulo()+\'ajax\',this.value,\'\',\'&cajtexmos=\'+$(this.id).up().next(0).descendants()[0].id+\'&cajtexcom=\'+this.id)"');
    $this->columnas[1][0]->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Almentalm');
    
    $objubi= array ('codubi' => '8','nomubi' =>'9');
    $params = array('param1' => "'+$(this.id).up().previous(1).descendants()[0].value+'");
    $mascaraubi=Herramientas::ObtenerFormato('Cadefart','Forubi');
    $lonubi=strlen($mascaraubi);
    $this->columnas[1][7]->setHTML('type="text" size="10" maxlength="'.chr(39).$lonubi.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubi.chr(39).')" onBlur="toAjax(\'7\',getUrlModulo()+\'ajax\',this.value,\'\',\'&cajtexmos=\'+$(this.id).up().next(0).descendants()[0].id+\'&codart=\'+$(this.id).up().previous(6).descendants()[0].value+\'&codalm=\'+$(this.id).up().previous(1).descendants()[0].value+\'&numlot=\'+$(this.id).up().next(3).descendants()[0].id+\'&cajtexcom=\'+this.id)"');
    $this->columnas[1][7]->setCatalogo('Cadefubi','sf_admin_edit_form',$objubi,'Cadefubi_Almdes',$params);

    $recmer=H::getConfApp2('recmer', 'compras', 'almentalm');
    if ($recmer=='S')
    {
        $this->columnas[1][10]->setOculta(false);
        $this->columnas[1][11]->setOculta(false);
    }
    $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
    if ($manartlot=='S')
    {
      $this->columnas[1][12]->setOculta(false);
    }

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->caentalm->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $js=""; $dato="";

    switch ($ajax){
      case '1':
          $t= new Criteria();
          $t->add(CaproveePeer::CODPRO,$codigo);
          $t->add(CaproveePeer::ESTPRO,'A');
          $reg= CaproveePeer::doSelectOne($t);
          if ($reg)
          {
            $dato=eregi_replace("[\n|\r|\n\r]", "", $reg->getNompro());
          }else {
              $js="alert('La Contratistas de Bienes o Servicio y Cooperativas No Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
          $t= new Criteria();
          $t->add(CatipentPeer::CODTIPENT,$codigo);
          $reg= CatipentPeer::doSelectOne($t);
          if ($reg)
          {
            $dato=$reg->getDestipent();
          }else {
              $js="alert('El Tipo Movimiento No Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
          $q= new Criteria();
          $q->add(CadefcenPeer::CODCEN,$codigo);
          $reg= CadefcenPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=$reg->getDescen();
          }else {
             $js="alert('El Centro de Costo no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '4':
          $q= new Criteria();
          $q->add(CadphartPeer::DPHART,$codigo);
          $reg= CadphartPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=$reg->getDesdph();
             $this->params=array();
             $this->caentalm = $this->getCaentalmOrCreate();
             $this->updateCaentalmFromRequest();
             $this->labels = $this->getLabels();

             $this->configGrid('',$codigo);
          }else {
              $js="alert('El Despacho no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '5':
          $mascaraart=Herramientas::getMascaraArticulo();
          $lonart=strlen($mascaraart);
          $q= new Criteria();
          $q->add(CaregartPeer::CODART,$codigo);
          $reg= CaregartPeer::doSelectOne($q);
          if ($reg)
          {
             if ($lonart==strlen($codigo))
             {
                 $dato=eregi_replace("[\n|\r|\n\r]", "", $reg->getDesart());
             }else {
                 $js="alert_('El C&oacute;digo del Art&iacute;culo No es de Ultimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
             }
          }else {
             $js="alert_('El C&oacute;digo del Art&iacute;culo no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '6':
          $codart=$this->getRequestParameter('codart');
          $idcodubi=$this->getRequestParameter('codubi');
          $iddesubi=$this->getRequestParameter('desubi');
          $idnumlot=$this->getRequestParameter('numlot');
          $com="";
          $q= new Criteria();
          $q->add(CadefalmPeer::CODALM,$codigo);
          $reg= CadefalmPeer::doSelectOne($q);
          if ($reg)
          {
             $manaartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
             $dato=$reg->getNomalm();

             $d = new Criteria();
             $d->add(CaartalmubiPeer::CODALM,$codigo);
             $d->add(CaartalmubiPeer::CODART,$codart);
             $d->addAscendingOrderByColumn(CaartalmubiPeer::CODUBI);
             $alm = CaartalmubiPeer::doSelectOne($d);
             if ($alm)
             {
                 $codubi=$alm->getCodubi();
             	 $nomubi=CadefubiPeer::getDesubicacion($codubi);
                 if ($manaartlot=='S')
                   $numlot=$alm->getNumlot();
                 else $numlot="";

                 $com=',["'.$idcodubi.'","'.$codubi.'",""],["'.$iddesubi.'","'.$nomubi.'",""],["'.$idnumlot.'","'.$numlot.'",""]';
             }else {
                 $js="alert('El articulo : ".$codart.", no existe en el Almacen seleccionado: ".$codigo." ');  $('$cajtexcom').value=''; $('$cajtexcom').focus();";
             }
             
          }else {
             $js="alert_('El Almace&eacute;n no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]'.$com.']';
        break;
      case '7':
          $codart=$this->getRequestParameter('codart');
          $codalm=$this->getRequestParameter('codalm');
          $idnumlot=$this->getRequestParameter('numlot');
          $com='';

          if ($codalm!="")
          {
               $c = new Criteria();
               $c->add(CaartalmubiPeer::CODALM,$codalm);
               $c->add(CaartalmubiPeer::CODUBI,$codigo);
               $c->add(CaartalmubiPeer::CODART,$codart);
               $alm = CaartalmubiPeer::doSelectOne($c);
               if ($alm)
               {
                  $dato=CadefubiPeer::getDesubicacion($codigo);
                  if ($manaartlot=='S')
                     $numlot=$alm->getNumlot();
                  else $numlot="";

                  $com=',["'.$idnumlot.'","'.$numlot.'",""]';

               }else {
                   $js="alert_('La Ubicaci&oacute;n : ".$codigo.", no existe para el Almac&eacute;n seleccionado: ".$codalm." y el Art&iacute;culo ".$codart." '); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
               }
          }else {
              $js="alert_('Primero debe seleccionar un Almac&eacute;n...'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]'.$com.']';
        break;
        case '8':
          $dateFormat = new sfDateFormat('es_VE');
        $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

        $c = new Criteria();
        $c->add(CaentalmPeer::RCPART, $this->getRequestParameter('rcpart'));
        $data = CaentalmPeer::doSelectOne($c);
        if ($data) {
          if ($fecha < $data->getFecrcp()) {
            $msj = "alert_('La Fecha de Anulaci&oacute;n no puede ser menor a la fecha de la Entrada'); $('caentalm_fecanu').value=''";
          } else {
            $msj = "";
          }
        } else {
          $msj = "";
        }
        $output = '[["javascript","' . $msj . '",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($ajax!='4') return sfView::HEADER_ONLY;
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

      $this->caentalm = $this->getCaentalmOrCreate();
       try{
	    $this->updateCaentalmFromRequest();
          }
        catch(Exception $ex){}
        
      if (Tesoreria::validarFechaPerContable($this->getRequestParameter('caentalm[fecrcp]')))
      {
        $this->coderr=521;
        return false;
      }          

        $this->configGrid($this->caentalm->getRcpart());
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

         if (!$this->caentalm->getId())
         {
            $caentalm = $this->getRequestParameter('caentalm');

            //verificar en el grid de articulos que todos los articulos pertenezcan al almacen y ubicacion indicada
            //y verificar que al menos un articulo del grid tenga cantidad mayo que cero.
              $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
              $msg  = "";
              $x    = $grid[0];
              $j    = 0;
              $h    = 0;
              $encontro = false;
              while ($j<count($x))
              {
                 if ($x[$j]->getCanrec()>0)
                 {
                    $encontro=true;
                    if ($manartlot=='S')
                    {
                        if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="" or $x[$j]->getNumlot()=="" )
                         {
                                 $this->coderr=574;
                                 break;

                         }
                    }else {
                         if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="" )
                         {
                                 $this->coderr=575;
                                 break;
                         }
                    }
                 }
                 $j++;
              }
           if (!$encontro)
           {
                $this->coderr=162;
           }
         }

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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    if ($clasemodelo->getId())
        $grid=array();
    else
        $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

    $clasemodelo->setStarcp('A');
    $coderr=Articulos::salvarAlmentalm($clasemodelo,$grid);

    return $coderr;
  }

  public function deleting($clasemodelo)
  {
    /*if (Articulos::Hay_DevolucionRCP($clasemodelo))
    {         
        return 573;
    }else {*/
      if (Articulos::validaDispoEntrada($clasemodelo)==-1) {
        Articulos::eliminarAlmentalm($clasemodelo);
        return -1;
      }else return 3016;
    //}
    
  }

  /**
   * Función para manejar los filtros de búsqueda
   * de la lista
   *
   */
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['rcpart_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaentalmPeer::RCPART, '');
      $criterion->addOr($c->getNewCriterion(CaentalmPeer::RCPART, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['rcpart']) && $this->filters['rcpart'] !== '')
    {
      $c->add(CaentalmPeer::RCPART, strtr("%".$this->filters['rcpart']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fecrcp_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaentalmPeer::FECRCP, '');
      $criterion->addOr($c->getNewCriterion(CaentalmPeer::FECRCP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecrcp']))
    {
      if (isset($this->filters['fecrcp']['from']) && $this->filters['fecrcp']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(CaentalmPeer::FECRCP, date('Y-m-d', $this->filters['fecrcp']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecrcp']['to']) && $this->filters['fecrcp']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(CaentalmPeer::FECRCP, date('Y-m-d', $this->filters['fecrcp']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(CaentalmPeer::FECRCP, date('Y-m-d', $this->filters['fecrcp']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['codcen_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaentalmPeer::CODCEN, '');
      $criterion->addOr($c->getNewCriterion(CaentalmPeer::CODCEN, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcen']) && $this->filters['codcen'] !== '')
    {
      $c->add(CaentalmPeer::CODCEN, strtr("%".$this->filters['codcen']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['descen_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaentalmPeer::DESCEN, '');
      $criterion->addOr($c->getNewCriterion(CaentalmPeer::DESCEN, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['descen']) && $this->filters['descen'] !== '')
    {
      $c->add(CadefcenPeer::DESCEN, strtr("%".$this->filters['descen']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(CaentalmPeer::CODCEN,  CadefcenPeer::CODCEN);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['dphart_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaentalmPeer::DPHART, '');
      $criterion->addOr($c->getNewCriterion(CaentalmPeer::DPHART, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['dphart']) && $this->filters['dphart'] !== '')
    {
      $c->add(CaentalmPeer::DPHART, strtr("%".$this->filters['dphart']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codalm_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaentalmPeer::RCPART, '');
      $criterion->addOr($c->getNewCriterion(CaentalmPeer::RCPART, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codalm']) && $this->filters['codalm'] !== '')
    {
      $c->add(CadetentPeer::CODALM, strtr("%".$this->filters['codalm']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(CaentalmPeer::RCPART,  CadetentPeer::RCPART);
      $c->setIgnoreCase(true);
    }  
    if (isset($this->filters['nomalm_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaentalmPeer::NOMALM, '');
      $criterion->addOr($c->getNewCriterion(CaentalmPeer::NOMALM, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomalm']) && $this->filters['nomalm'] !== '')
    {
      $c->add(CadefalmPeer::NOMALM, strtr("%".$this->filters['nomalm']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(CadetentPeer::CODALM,CadefalmPeer::CODALM);
      $c->addJoin(CaentalmPeer::RCPART,  CadetentPeer::RCPART);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaentalmPeer::CODEDO, '');
      $criterion->addOr($c->getNewCriterion(CaentalmPeer::CODEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codedo']) && $this->filters['codedo'] !== '')
    {
      $c->add(CadefalmPeer::CODEDO, $this->filters['codedo']);
      $c->addJoin(CadetentPeer::CODALM,CadefalmPeer::CODALM);
      $c->addJoin(CaentalmPeer::RCPART,  CadetentPeer::RCPART);
    }
    if (isset($this->filters['nomedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaentalmPeer::NOMEDO, '');
      $criterion->addOr($c->getNewCriterion(CaentalmPeer::NOMEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomedo']) && $this->filters['nomedo'] !== '')
    {
        $c->add(OcestadoPeer::NOMEDO, strtr("%".$this->filters['nomedo']."%", '*', '%'), Criteria::LIKE);
        $c->addJoin(CadefalmPeer::CODEDO,  OcestadoPeer::CODEDO); 
        $c->addJoin(CadetentPeer::CODALM,CadefalmPeer::CODALM);
        $c->addJoin(CaentalmPeer::RCPART,  CadetentPeer::RCPART);
        $c->setIgnoreCase(true);
    }
    $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
            
    if (isset($this->filters['rifpro_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaentalmPeer::RIFPRO, '');
      $criterion->addOr($c->getNewCriterion(CaentalmPeer::RIFPRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['rifpro']) && $this->filters['rifpro'] !== '')
    {
      if ($modulo=='facturacion')
      {
          $c->add(FaclientePeer::RIFPRO, strtr("%".$this->filters['rifpro']."%", '*', '%'), Criteria::LIKE);
          $c->addJoin(CaentalmPeer::CODPRO,  FaclientePeer::CODPRO); 
      }else {      
          $c->add(CaproveePeer::RIFPRO, strtr("%".$this->filters['rifpro']."%", '*', '%'), Criteria::LIKE);
          $c->addJoin(CaentalmPeer::CODPRO,  CaproveePeer::CODPRO); 
      }
    }
    if (isset($this->filters['nompro_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaentalmPeer::NOMPRO, '');
      $criterion->addOr($c->getNewCriterion(CaentalmPeer::NOMPRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nompro']) && $this->filters['nompro'] !== '')
    {
      if ($modulo=='facturacion')
      {
          $c->add(FaclientePeer::NOMPRO, strtr("%".$this->filters['nompro']."%", '*', '%'), Criteria::LIKE);
          $c->addJoin(CaentalmPeer::CODPRO,  FaclientePeer::CODPRO); 
      }else {      
          $c->add(CaproveePeer::NOMPRO, strtr("%".$this->filters['nompro']."%", '*', '%'), Criteria::LIKE);
          $c->addJoin(CaentalmPeer::CODPRO,  CaproveePeer::CODPRO); 
      }
    }
     if (isset($this->filters['codpro_is_empty']))
    {
      $criterion = $c->getNewCriterion(CaentalmPeer::CODPRO, '');
      $criterion->addOr($c->getNewCriterion(CaentalmPeer::CODPRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codpro']) && $this->filters['codpro'] !== '')
    {
      $c->add(CaentalmPeer::CODPRO, '%'.strtr($this->filters['codpro'], '*', '%').'%', Criteria::LIKE);
      $c->setIgnoreCase(true);
    }
  }


  public function executeAnular() {
    $rcpart = $this->getRequestParameter('rcpart');
    $fecrcp = $this->getRequestParameter('fecrcp');

    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecrcp, 'i', $dateFormat->getInputPattern('d'));

    $c = new Criteria();
    $c->add(CaentalmPeer::RCPART, $rcpart);
    $c->add(CaentalmPeer::FECRCP, $fec);
    $this->caentalm = CaentalmPeer::doSelectOne($c);
    sfView :: SUCCESS;
  }  

  public function executeSalvaranu() {
    $rcpart = $this->getRequestParameter('rcpart');
    $desanu = $this->getRequestParameter('desanu');
    $fecanu = $this->getRequestParameter('fecanu');
    $fecha_aux = split("/", $fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
    $this->msg = "";
    $this->mensaje2="";

    $c = new Criteria();
    $c->add(CaentalmPeer::RCPART, $rcpart);
    $resul = CaentalmPeer::doSelectOne($c);
    if ($resul) {           
      $error=Articulos::validaDispoEntrada($resul);
      if ($error==-1) {
        $resul->setFecanu($fec);
        $resul->setDesanu($desanu);
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $resul->setUsuanu($loguse);
        $resul->setStarcp('N');
        $resul->save();        
        Articulos::Devolver_Articulos($resul);
      }else {
        $this->mensaje2 = Herramientas::obtenerMensajeError($error);
        return sfView::SUCCESS;
      }
    }    
    return sfView :: SUCCESS;
  }
}
