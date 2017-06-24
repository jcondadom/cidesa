<?php

/**
 * tesmovemipagele actions.
 *
 * @package    siga
 * @subpackage tesmovemipagele
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesmovemipageleActions extends autotesmovemipageleActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {    
    if (!$this->tspagele->getId())
    {
        if ($this->tspagele->getRefpag()=='')$this->tspagele->setRefpag('########');
        if ($this->tspagele->getFecpag()=='')$this->tspagele->setFecpag(date('Y-m-d'));
        $mon=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        $this->tspagele->setCodmon($mon);
        $q= new Criteria();
        $q->add(TsdesmonPeer::CODMON,$mon);
        $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
        $reg= TsdesmonPeer::doSelectOne($q);
        if ($reg)      
           $valor=number_format($reg->getValmon(),6,',','.');
        else 
           $valor=0;
        $this->tspagele->setValmon($valor);   

        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
        if ($filsoldir=='S'){
           $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
           $t= new Criteria();
           $t->add(SegdirusuPeer::LOGUSE,$loguse);
           $t->setLimit(1);
           $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
           $regt= SegdirusuPeer::doSelectOne($t); 
           if ($regt){
            if ($this->tspagele->getCoddirec()=='')
              $this->tspagele->setCoddirec($regt->getCoddirec());
           }      
        }
    }else {
      if ($this->tspagele->getEstpag()!='A' && $this->tspagele->getEstpag()!='T' && $this->tspagele->getFecpagado()=='')
        $this->tspagele->setFecpagado(date('Y-m-d'));
    }
    $this->configGrid($this->tspagele->getRefpag());

  }

   /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->listing();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/tspagele/filters');

    $loguse= $this->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');

     // 15    // pager
    $this->pager = new sfPropelPager('Tspagele', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='tspagele.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(TspagelePeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function configGrid($refpag='',$arreglo=array())
  {
     if (count($arreglo)>0)
     {
       $i=0;
       while ($i<count($arreglo))
       {
           $tsdetpagele= new Tsdetpagele();
           $tsdetpagele->setNumord($arreglo[$i]["numord"]);
           $tsdetpagele->setFecemi($arreglo[$i]["fecemi"]);
           $tsdetpagele->setTipcau($arreglo[$i]["tipcau"]);
           $tsdetpagele->setNomben($arreglo[$i]["nomben"]);
           $tsdetpagele->setCedrif($arreglo[$i]["cedrif"]);
           $tsdetpagele->setMonord($arreglo[$i]["monord"]);
           $tsdetpagele->setCheck($arreglo[$i]["check"]);
           $tsdetpagele->setFecval($arreglo[$i]["fecval"]);
           $tsdetpagele->setMonorden($arreglo[$i]["monord"]);
           $det[]=$tsdetpagele;

           $i++;
       }
     }else {
         $c= new Criteria();
         $c->add(TsdetpagelePeer::REFPAG,$refpag);
         $det= TsdetpagelePeer::doSelect($c);
     }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesmovemipagele/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ordenes');
    
    $pagelepar = H::getConfApp2('pagelepar', 'tesoreria', 'tesmovemipagele');
    if ($pagelepar=='S' && $this->tspagele->getId()=='')        
      $this->columnas[1][4]->setHTML('size="10" onBlur="ValidarMontoGridv2(this); valpago(this.id);"');
    $this->columnas[1][5]->setHTML('onClick="verificardatos(this.id)"');
    if ($refpag!="") $this->columnas[1][5]->setOculta(true);

    if ($this->tspagele->getId()){
      $this->columnas[1][7]->setOculta(false);
      $this->columnas[1][10]->setOculta(false);
    }     

    $this->obj =$this->columnas[0]->getConfig($det);

    $this->tspagele->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');    
    $ajax = $this->getRequestParameter('ajax','');
    $cajtxtmos = $this->getRequestParameter('cajtexmos','');
    $cajtxtcom = $this->getRequestParameter('cajtexcom','');
    $dato=""; $js=""; $sw=true;

    switch ($ajax){
      case '1':  //Buscamos el Tipo de Documento
        $t= new Criteria();
        $t->add(CpdocpagPeer::TIPPAG,$codigo);
        $reg= CpdocpagPeer::doSelectOne($t);
        if ($reg)
        {
            $r= new Criteria();
            $r->add(TstipmovPeer::CODTIP,$codigo);
            $reg2= TstipmovPeer::doSelectOne($r);
            if ($reg2)
            {
                $dato=$reg->getNomext();
            }
            else {
            $js="alert('Documento no se encuentra definido como un Tipo de Movimiento'); $('tspagele_tipdoc').value=''; $('$cajtxtmos').value=''; $('tspagele_tipdoc').focus(); ";
            }
        }else {
            $js="alert('El Tipo de Documento no existe'); $('tspagele_tipdoc').value=''; $('$cajtxtmos').value=''; $('tspagele_tipdoc').focus(); ";
        }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2': //Buscamos la cuenta Bancaria
        $dato2=$dato3="";
        $filbandir = H::getConfApp2('filbandir', 'tesoreria', 'tesdefcueban');        
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        
        $l= new Criteria();
        if ($filbandir=='S'){
            $sql='tsdefban.numcue=\''.$codigo.'\' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
            $l->add(TsdefbanPeer::NUMCUE, $sql, Criteria :: CUSTOM);
        }else $l->add(TsdefbanPeer::NUMCUE,$codigo);
        $reg= TsdefbanPeer::doSelectOne($l);
        if ($reg)
        {
            $dato=$reg->getNomcue();
            $dato2=$reg->getCodcta();
            $dato3=$reg->getAntlib() + $reg->getDeblib() - $reg->getCrelib();
        }else {
            $js="alert('El Cuenta Bancaria no existe'); $('tspagele_numcue').value=''; $('$cajtxtmos').value=''; $('tspagele_numcue').focus(); ";
        }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["tspagele_codcta","'.$dato2.'",""],["tspagele_disponible","'.$dato3.'",""],["javascript","'.$js.'",""]]';
        break;
      case '3':  //Busqueda del Filtro de Tipos de Ordenes
        $l= new Criteria();
        $l->add(CpdoccauPeer::TIPCAU,$codigo);
        $reg= CpdoccauPeer::doSelectOne($l);
        if ($reg)
        {
            $dato=$reg->getNomext();
        }else {
            $js="alert('El Tipo de Orden no existe'); $('$cajtxtcom').value=''; $('$cajtxtmos').value=''; $('$cajtxtcom').focus(); ";
        }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;    
      case '4':  //Busqueda del Filtro de Beneficiarios
        $l= new Criteria();
        $l->add(OpbenefiPeer::CEDRIF,$codigo);
        $reg= OpbenefiPeer::doSelectOne($l);
        if ($reg)
        {
            $dato=$reg->getNomben();
        }else {
            $js="alert('El Beneficiario no existe'); $('$cajtxtcom').value=''; $('$cajtxtmos').value=''; $('$cajtxtcom').focus(); ";
        }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;            
      case '5':  //Cargar Grid Ordenes
        $sw=false;
        $this->ajaxs=$ajax;
        $fecdes=$this->getRequestParameter('fecdes');
        $fechas=$this->getRequestParameter('fechas');
        $tipca1=$this->getRequestParameter('tipdes');
        $tipca2=$this->getRequestParameter('tiphas');
        $cedri1=$this->getRequestParameter('bendes');
        $cedri2=$this->getRequestParameter('benhas');
        $conc1=$this->getRequestParameter('concdes');
        $conc2=$this->getRequestParameter('conchas');
        $tipdoc=$this->getRequestParameter('tipdoc');
        $codmon=$this->getRequestParameter('codmon');
        $coddirec=$this->getRequestParameter('coddirec');
        
        Tesoreria::CargarOrdenes($fecdes,$fechas,$tipca1,$tipca2,$cedri1,$cedri2,$conc1,$conc2,$tipdoc,$arreglo,$codmon,$coddirec);
        
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->tspagele = $this->getTspageleOrCreate();
        if (count($arreglo)>0) {
        $this->configGrid('',$arreglo);
        }
        else{
            $js="alert('No Existen Ordenes de Pago Pendientes por Pagar'); ";
            $this->configGrid();
        }        
        $output = '[["javascript","'.$js.'",""]]';
        break;            
      case '6':  //Se valida que la fecha de anulacion no sea menor la fecha del pago
        $dateFormat = new sfDateFormat('es_VE');
        $fecha = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));

        $c= new Criteria();
        $c->add(TspagelePeer::REFPAG,$this->getRequestParameter('refpag'));
        $data=TspagelePeer::doSelectOne($c);
        if ($data)
        {
          if ($fecha<$data->getFecemi())
          {
            $js="alert('La Fecha de Anulacion no puede ser menor a la fecha del Pago Electronico'); $('tspagele_fecanu').value=''; $('tspagele_fecanu').focus();";
          }

          if ($js=="")
          {
            if (Tesoreria::validaPeriodoCerrado($codigo)==true)
            {
              $js="alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('tspagele_fecanu').value=''; $('tspagele_fecanu').focus();";
            }
          }
        }    
        $output = '[["javascript","'.$js.'",""]]';
        break;         
      case '7':  //Proceso Aprobación de OP        
        $this->tspagele = $this->getTspageleOrCreate();
        $this->updateTspageleFromRequest();
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj); 
        $id=$this->getRequestParameter('id');
        if ($this->getRequestParameter('tspagele[fecpagado]')=='')   
        {
            $js="alert_('Debe introducir la Fecha de Aprobaci&oacute;n'); ";
        }else {
           if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('tspagele[fecpagado]'))==true)
             $js="alert_('La Fecha no se encuentra de un Perido Contable Abierto.'); ";
           else{
              if (Tesoreria::validaPeriodoCerradoBanco($this->getRequestParameter('tspagele[fecpagado]'),$this->getRequestParameter('tspagele[numcue]'))==false)
              {
                $js="alert_('La Cuenta Bancaria y El Periodo se encuentran cerrado.'); ";
              }else {
                $valblocueban=H::getConfAppGen('valblocueban');
                if ($valblocueban=='S'){
                  if (Tesoreria::validaBancoBloqueado($this->getRequestParameter('tspagele[fecpagado]'),$this->getRequestParameter('tspagele[numcue]')))
                  {
                   $js="alert_(La Cuenta Bancaria se encuentran Bloqueada para esa Fecha.'); ";
                  }else {
                    $disponibilidad=Tesoreria::verificarDisponibilidad($this->getRequestParameter('tspagele[numcue]'),H::toFloat($this->getRequestParameter('tspagele[monpag]')));
                    if ($disponibilidad)
                    {
                        $tipopag=H::getX_vacio('CODEMP', 'Opdefemp', 'Tipagele', '001');
                        $comprobante= array();
                        $concom=1;
                        Tesoreria::buscarActualizarOrdpagEle($tipopag,$this->tspagele,$grid);            
                        
                        $t0= new Criteria();
                        $t0->add(TspagelePeer::REFPAG,  $this->tspagele->getRefpag());
                        $reg0= TspagelePeer::doSelectOne($t0);
                        if ($reg0)
                        {
                           if ($reg0->getNumcue()!=$this->tspagele->getNumcue())
                            $reg0->setNumcue($this->tspagele->getNumcue());
                           $reg0->setEstpag('A');   
                           $reg0->setFecpagado($this->tspagele->getFecpagado());   
                           $reg0->save();
                        }
                        
                        $t= new Criteria();
                        $t->add(TsdetpagelePeer::REFPAG,  $this->tspagele->getRefpag());
                        $reg= TsdetpagelePeer::doSelect($t);
                        if ($reg)
                        {
                          foreach ($reg as $breg) {
                            $breg->setFecval(date('Y-m-d'));   
                            $breg->save();
                          }                         
                        }
                        
                        $js="alert('El Pago Electronico fue APROBADO Satisfactoriamente'); $('divfecpagado').hide(); $$('.sf_admin_action_save')[0].hide(); f = document.sf_admin_edit_form; f.action = '/tesoreria'+getEnv()+'.php/tesmovemipagele/edit/".$id."'; f.submit();";

                    }else {
                        $js="alert_('No hay disponibilidad financiera para realizar la operaci&oacute;n'); ";
                    }
                }
              }else {
                  $disponibilidad=Tesoreria::verificarDisponibilidad($this->getRequestParameter('tspagele[numcue]'),H::toFloat($this->getRequestParameter('tspagele[monpag]')));
                  if ($disponibilidad)
                  {
                      $tipopag=H::getX_vacio('CODEMP', 'Opdefemp', 'Tipagele', '001');
                      $comprobante= array();
                      $concom=1;
                      Tesoreria::buscarActualizarOrdpagEle($tipopag,$this->tspagele,$grid);            
                      
                      $t0= new Criteria();
                      $t0->add(TspagelePeer::REFPAG,  $this->tspagele->getRefpag());
                      $reg0= TspagelePeer::doSelectOne($t0);
                      if ($reg0)
                      {
                        if ($reg0->getNumcue()!=$this->tspagele->getNumcue())
                            $reg0->setNumcue($this->tspagele->getNumcue());
                         $reg0->setEstpag('A');   
                         $reg0->setFecpagado($this->tspagele->getFecpagado());   
                         $reg0->save();
                      }
                      
                      $t= new Criteria();
                      $t->add(TsdetpagelePeer::REFPAG,  $this->tspagele->getRefpag());
                      $reg= TsdetpagelePeer::doSelect($t);
                      if ($reg)
                      {
                        foreach ($reg as $breg) {
                          $breg->setFecval(date('Y-m-d'));   
                          $breg->save();
                        }                         
                      }
                      
                      $js="alert('El Pago Electronico fue APROBADO Satisfactoriamente'); $('divfecpagado').hide(); $$('.sf_admin_action_save')[0].hide(); f = document.sf_admin_edit_form; f.action = '/tesoreria'+getEnv()+'.php/tesmovemipagele/edit/".$id."'; f.submit(); ";

                  }else {
                      $js="alert_('No hay disponibilidad financiera para realizar la operaci&oacute;n'); ";
                  }
                }
              }
           }
        }
              
        
        $output = '[["javascript","'.$js.'",""]]';        
        break;
      case '8':  //Generar TXT
        $this->ajaxs=$ajax;
        $sw=false;        
        $this->tspagele = $this->getTspageleOrCreate();
        $this->updateTspageleFromRequest();
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);  
        $this->direccion="";
        $this->direccion=Tesoreria::generarTXTPagEle($this->getRequestParameter('tspagele[tiptxt]'),$this->tspagele,$grid);
        $t0= new Criteria();
        $t0->add(TspagelePeer::REFPAG,  $this->tspagele->getRefpag());
        $reg0= TspagelePeer::doSelectOne($t0);
        if ($reg0)
        {
           $reg0->setEstpag('T');                  
           $reg0->save();
        }            
        
        $js="alert('Archivo TXT procesado satisfactoriamente'); ";
        
        $output = '[["javascript","'.$js.'",""]]';        
        break;   
      case '9':  //Busqueda del Filtro de Condición de Pago
        $l= new Criteria();
        $l->add(OpconpagPeer::CODCONCEPTO,$codigo);
        $reg= OpconpagPeer::doSelectOne($l);
        if ($reg)
        {
            $dato=$reg->getNomconcepto();
        }else {
            $js="alert('La Condici&oacute;n de Pago no existe'); $('$cajtxtcom').value=''; $('$cajtxtmos').value=''; $('$cajtxtcom').focus(); ";
        }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;  
      case '10':
          $q= new Criteria();
          $q->add(TsdesmonPeer::CODMON,$codigo);
          $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
          $reg= TsdesmonPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=number_format($reg->getValmon(),6,',','.');
          }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break; 
      case '11':
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir2=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 

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
              $js="alert_('La Estado no existe o no esta asociada al usuario'); $('tspagele_coddirec').value='';  $('$cajtxtmos').value=''; $('tspagele_coddirec').focus();";
            else
             $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('tspagele_coddirec').value='';  $('$cajtxtmos').value=''; $('tspagele_coddirec').focus();";
        }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;        
      case '12':
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
            else
              $js="totalizar('$id');";
          }
        $output = '[["javascript","'.$js.'",""]]';
        break;   
      default:
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

      $this->tspagele = $this->getTspageleOrCreate();
      try{ $this->updateTspageleFromRequest();}catch(Exception $ex){}

      $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
      $filsoldir2=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
      $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
      if ($filsoldir=='S' || $filsoldir2=='S'){
        if ($this->getRequestParameter('tspagele[coddirec]')==''){
           if ($cambiareti=='S') $this->coderr=3014; else $this->coderr=3013;
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Tesoreria::salvarPagosElectronicos($clasemodelo,$grid);
    return -1;
  }
  
  protected function deleting($tspagele)
  {
    $eligentxt=H::getConfApp2('eligentxt', 'tesoreria', 'tesmovemipagele'); 
    if ($eligentxt=='S')
    {
      $sql1="update opordpag set status='N', monpag=0, fecpag=null, numche=' ', ctaban=' ' where numord in (Select numord from tsdetpagele where refpag='".$tspagele->getRefpag()."')";
      Herramientas::insertarRegistros($sql1);
      
      $sql2="Delete from OPORdChe where numord in (Select numord from tsdetpagele where refpag='".$tspagele->getRefpag()."')";
      Herramientas::insertarRegistros($sql2);
      
      //Falta eliminar Contabilidad, Presupuesto y Mov segun Libros
      $w= new Criteria();
      $w->add(TsdetpagelePeer::REFPAG,$tspagele->getRefpag());
      $resw= TsdetpagelePeer::doSelect($w);
      if ($resw){
        foreach ($resw as $objw) {
          
          //Elimino el mov. segun libros
          $p= new Criteria();
          $p->add(TsmovlibPeer::NUMCUE,$tspagele->getNumcue());
          $p->add(TsmovlibPeer::REFLIB,$objw->getRefmovlib());
          $p->add(TsmovlibPeer::TIPMOV,$tspagele->getTipdoc());
          $p->add(TsmovlibPeer::FECLIB,$tspagele->getFecpagado());
          TsmovlibPeer::doDelete($p);
          
          //Elimino Contabilidad
          H::EliminarRegistro('Contabc1','Numcom',$objw->getNumcom());
          H::EliminarRegistro('Contabc','Numcom',$objw->getNumcom());

          //Elimino el Pagado
          H::EliminarRegistro('Cpimppag','Refpag',$objw->getRefpagpre());
          H::EliminarRegistro('Cppagos','Refpag',$objw->getRefpagpre()); 

          $objw->delete();           

        }
      }
       $tspagele->delete();
    }else {
     if ($tspagele->getEstpag()!='T')
     {
        $sql1="update opordpag set status='N', monpag=0, fecpag=null, numche=' ', ctaban=' ' where numord in (Select numord from tsdetpagele where refpag='".$tspagele->getRefpag()."')";
        Herramientas::insertarRegistros($sql1);
        
        $sql2="Delete from OPORdChe where numord in (Select numord from tsdetpagele where refpag='".$tspagele->getRefpag()."')";
        Herramientas::insertarRegistros($sql2);
        
        //Falta eliminar Contabilidad, Presupuesto y Mov segun Libros
        $w= new Criteria();
        $w->add(TsdetpagelePeer::REFPAG,$tspagele->getRefpag());
        $resw= TsdetpagelePeer::doSelect($w);
        if ($resw){
          foreach ($resw as $objw) {
            
            //Elimino el mov. segun libros
            $p= new Criteria();
            $p->add(TsmovlibPeer::NUMCUE,$tspagele->getNumcue());
            $p->add(TsmovlibPeer::REFLIB,$objw->getRefmovlib());
            $p->add(TsmovlibPeer::TIPMOV,$tspagele->getTipdoc());
            $p->add(TsmovlibPeer::FECLIB,$tspagele->getFecpagado());
            TsmovlibPeer::doDelete($p);
            
            //Elimino Contabilidad
            H::EliminarRegistro('Contabc1','Numcom',$objw->getNumcom());
            H::EliminarRegistro('Contabc','Numcom',$objw->getNumcom());

            //Elimino el Pagado
            H::EliminarRegistro('Cpimppag','Refpag',$objw->getRefpagpre());
            H::EliminarRegistro('Cppagos','Refpag',$objw->getRefpagpre()); 

            $objw->delete();           

          }
        }
         $tspagele->delete();
     }else return 5004;
   }
   
   return -1;
  }  
  
  public function executeAnular()
  {
   $this->referencia=$this->getRequestParameter('referencia');
   $refpag=$this->getRequestParameter('refpag');
   $fecemi=$this->getRequestParameter('fecemi');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fecemi, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(TspagelePeer::REFPAG,$refpag);
   $c->add(TspagelePeer::FECPAG,$fec);
   $this->tspagele = TspagelePeer::doSelectOne($c);
   sfView::SUCCESS;
   }
   
   public function executeSalvaranu()
  {
    $refpag=$this->getRequestParameter('refpag');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');
    $this->msg='';    
    $fecha_aux=split("/",$fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

    $c= new Criteria();
    $c->add(TsdetpagelePeer::REFPAG,$refpag);
    $resul= TsdetpagelePeer::doSelect($c);
    if ($resul)
    {
      foreach ($resul as $obj)
      {
          $sql1="Update OPORDPAG set Status='N',NumChe='',FecPag=null,CtaBan='',MonPag=0  where NumOrd='".$obj->getNumord()."'";
          Herramientas::insertarRegistros($sql1);
          
          $sql2="Delete  from OPORDCHE where NumOrd='".$obj->getNumord()."'";
          Herramientas::insertarRegistros($sql2);
          
          //Falta Anular Movimiento Segun Libros
      }
      
      $sql3="UPDATE TSPAGELE set ESTPAG='N',DesAnu='".$desanu."',FecAnu=to_date('".$fecanu."','dd/mm/yyyy') where refpag='".$refpag."'";
      Herramientas::insertarRegistros($sql3);
    }
    
    return sfView::SUCCESS;
  }

  public function getLabels()
  {
    $labels = parent::getLabels();
  
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['tspagele{coddirec}'] = 'Estado';
    return $labels;
  }

}
