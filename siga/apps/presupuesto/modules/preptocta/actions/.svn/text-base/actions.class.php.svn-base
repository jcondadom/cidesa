<?php

/**
 * preptocta actions.
 *
 * @package    siga
 * @subpackage preptocta
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class preptoctaActions extends autopreptoctaActions
{

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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cpptocta/filters');

     $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
     $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preptocta');

     // 15    // pager
    $this->pager = new sfPropelPager('Cpptocta', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='cpptocta.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CpptoctaPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }


  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
   if (!$this->cpptocta->getId()){
    $this->cpptocta->setNumpta('####################');
    $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preptocta');
      if ($filsoldir=='S'){
         $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
         $t= new Criteria();
         $t->add(SegdirusuPeer::LOGUSE,$loguse);
         $t->setLimit(1);
         $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
         $regt= SegdirusuPeer::doSelectOne($t); 
         if ($regt){
          if ($this->cpptocta->getCoddirec()=='')
            $this->cpptocta->setCoddirec($regt->getCoddirec());
         }        
      }
  }
    $this->configGrid();
  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->params = array();
    $c = new Criteria();
    $c->add(CpdetptoctaPeer::NUMPTA, $this->cpptocta->getNumpta());
    $reg = CpdetptoctaPeer::doSelect($c);

    //$this->obj = H::getConfigGrid($this->cpprecom->getId()=='' ? 'grid_cpimpprc_create' : 'grid_cpimpprc_edit',$reg);
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/preptocta/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');
    $this->obj = $this->columnas[0]->getConfig($reg);
    $this->params['grid'] = $this->obj;

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato="";
    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(BnubicaPeer::CODUBI,$codigo);
        $result= BnubicaPeer::doSelectOne($c);
        if ($result)
          $dato=$result->getDesubi();
        else
          $js="alert_('La Unidad Origen no esta registrada'); $('cpptocta_codubiori').value=''; $('cpptocta_codubiori').focus(); ";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        $c= new Criteria();
        $c->add(BnubicaPeer::CODUBI,$codigo);
        $result= BnubicaPeer::doSelectOne($c);
        if ($result)
          $dato=$result->getDesubi();
        else
          $js="alert_('La Unidad Destino no esta registrada'); $('cpptocta_codubides').value=''; $('cpptocta_codubides').focus(); ";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break; 
      case '3':  
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preptocta');
        $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec'); 
        $q= new Criteria();
        if ($filsoldir=='S'){
          $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
        }else $q->add(CadefdirecPeer::CODDIREC,$codigo);
        $reg= CadefdirecPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesdirec();                     
        }else {
            $dato="";
            if ($cambiareti=='S')
            $js="alert_('El Estado no existe o no esta asociada al usuario'); $('cpptocta_coddirec').value=''; $('cpptocta_desdirec').value=''; $('cpptocta_coddirec').focus();";
          else
            $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('cpptocta_coddirec').value=''; $('cpptocta_desdirec').value=''; $('cpptocta_coddirec').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';        
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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){
        
         $this->cpptocta = $this->getCpptoctaOrCreate();
       try{ $this->updateCpptoctaFromRequest();}catch(Exception $ex){}

      $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preptocta');
       $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec'); 
       if ($filsoldir=='S'){
         if ($this->getRequestParameter('cpptocta[coddirec]')==''){
            if ($cambiareti=='S') $this->coderr=3014; else $this->coderr=3013;
            return false;
         }
       }

       $this->configGrid();
       $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

       $cpdetptocta = $grid[0];
       foreach ($cpdetptocta as $reg){
           if ($reg->getMoncod() <= 0) {
               $this->coderr = 1389;
               break;
           } 
       }
      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    if (!$clasemodelo->getId())
    {
      if ($clasemodelo->getNumpta()=='####################')
      {
        $q= new Criteria();
        $q->add(CadefdirecPeer::CODDIREC,$clasemodelo->getCoddirec());
        $regq= CadefdirecPeer::doSelectOne($q);
        if ($regq)
        {
          if ($regq->getPrepta()!='')
          {
            $valido = false;
            $anoini=H::getX_vacio('CODEMP','Contaba','Fecini','001');
            $anno=substr($anoini, 0,4);
            $cor=$regq->getCorpta();
            while(!$valido){
             $numpta = $regq->getPrepta().str_pad((string)$cor, 8, "0", STR_PAD_LEFT).$anno;

              $c = new Criteria();
              $c->add(CpptoctaPeer::NUMPTA,$numpta);
              $cpptocta = CpptoctaPeer::doSelectOne($c);
              if(!$cpptocta){
                $valido = true;
              }else { $cor=$cor +1;}
            }
          }else return 1382;

          $regq->setCorpta($cor);
          $regq->save();

          $clasemodelo->setNumpta($numpta);
        }
     }
     $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
     $clasemodelo->setLoguse($loguse);
    }

    $clasemodelo->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Presupuesto::grabaGridPtocta($clasemodelo, $grid);
    return -1;
  }
  
  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }
  
  public function executeAjaxgrid() {
        $name = $this->getRequestParameter('grid', 'a');
        $grid = $this->getRequestParameter('grid' . $name, '');
        $fila = $this->getRequestParameter('fila', '');
        $col = $this->getRequestParameter('columna', '');
        $javascript = "";
        $jsonextra = "";
        switch ($name) {
            case ('a'):
                switch ($col) {
                    case ('1'):   //Codigo Presupuestario
                        if ($grid[$fila][$col - 1] != "") {
                            $mascara = H::formatoPresupuesto();
                            $loncod = strlen($mascara);
                            if (!Hacienda::Repetido($grid, $grid[$fila][$col - 1], $fila, $col - 1)) {
                                if (strlen($grid[$fila][$col - 1]) == $loncod) {
                                    $c = new Criteria();
                                    $c->add(CpasiiniPeer::CODPRE, $grid[$fila][$col - 1]);
                                    $regs = CpasiiniPeer::doSelectOne($c);
                                    if (!$regs) {
                                        $javascript = "alert_('El C&oacute;digo Presupuestario no Existe');";
                                        $grid[$fila][$col - 1] = "";
                                    }
                                } else {
                                    $javascript = "alert_('El C&oacute;digo Presupuestario no es de &Uacute;ltimo Nivel');";
                                    $grid[$fila][$col - 1] = "";
                                }
                            } else {
                                $javascript = "alert_('El C&oacute;digo Presupuestario esta Repetido');";
                                $grid[$fila][$col - 1] = "";
                                $grid[$fila][$col] = "";
                            }
                        }
                        
                        $jsonextra = ',["javascript","' . $javascript . '",""]';
                        break;
                    default:
                        break;
                }
                break;
            default:
                break;
        }

        $output = Herramientas::grid_to_json($grid, $name, $jsonextra);
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

        return sfView::HEADER_ONLY;
    }

public function getLabels() 
  {
    $labels = parent::getLabels(); 
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['cpptocta{coddirec}'] = 'Estado';
    return $labels;
  }  
}
