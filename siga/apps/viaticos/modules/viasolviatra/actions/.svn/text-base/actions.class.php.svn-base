<?php

/**
 * viasolviatra actions.
 *
 * @package    siga
 * @subpackage viasolviatra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class viasolviatraActions extends autoviasolviatraActions
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/viasolviatra/filters');

    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'viaticos', 'viasolviatra');

     // 15    // pager
    $this->pager = new sfPropelPager('Viasolviatra', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $esgerente=H::getX_vacio('LOGUSE','Usuarios','Esgeren',$loguse);
      if ($esgerente=='N')
        $this->sql='viasolviatra.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\') and viasolviatra.logusu=\''.$loguse.'\'';
      else  
        $this->sql='viasolviatra.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(ViasolviatraPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
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
    $tipvia=array('N'=>'NACIONAL','I'=>'INTERNACIONAL');
    $this->params=array('tipvia'=>$tipvia);
    if (!$this->viasolviatra->getId()) {
       $c = new Criteria();
       $c->addAscendingOrderByColumn(ViapaisPeer::CODPAI);
       $perq = ViapaisPeer::doSelectOne($c);
       if($perq)
        if ($this->viasolviatra->getCodpai()=='')
         $this->viasolviatra->setCodpai($perq->getCodpai());

      $filsoldir=H::getConfApp2('filsoldir', 'viaticos', 'viasolviatra');
      if ($filsoldir=='S'){
         $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
         $t= new Criteria();
         $t->add(SegdirusuPeer::LOGUSE,$loguse);
         $t->setLimit(1);
         $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
         $regt= SegdirusuPeer::doSelectOne($t); 
         if ($regt){
          if ($this->viasolviatra->getCoddirec()=='')
            $this->viasolviatra->setCoddirec($regt->getCoddirec());
         }        
      }
   }

    $c = new Criteria();
    $x = CpeveprePeer::doSelect($c);

    $opciones = array();

    foreach($x as $a){
        $opciones[$a->getCodeve()]=$a->getCodeve()." - ".$a->getDeseve();
    }

    $this->params['opciones'] = $opciones;

    $this->configGrid($this->viasolviatra->getNumsol());
    $this->configGridBoletos($this->viasolviatra->getNumsol());
    $this->configGridTransportes($this->viasolviatra->getNumsol());

  }

    /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->viasolviatra = $this->getViasolviatraOrCreate();
    $this->grabo=$this->getRequestParameter('grabo');

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateViasolviatraFromRequest();

      if($this->saveViasolviatra($this->viasolviatra) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->viasolviatra->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('viasolviatra/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('viasolviatra/list');
        }
        else
        {
            return $this->redirect('viasolviatra/edit?id='.$this->viasolviatra->getId().'&grabo=S');
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function configGrid($numsol='')
  {
    $beneficiario=H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra');

    $c = new Criteria();
    $c->add(ViadetsolacoempPeer :: NUMSOL, $numsol);
    $result = ViadetsolacoempPeer :: doSelect($c);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/viasolviatra/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_acompanantes');
    if ($beneficiario=='S')
    {
       $this->columnas[1][0]->setCatalogo('opbenefi','sf_admin_edit_form',array('codempaco' => 1,'nomempaco' => 2),'Viasolviatra_empleado');
    }else {
       $this->columnas[1][0]->setCatalogo('nphojint','sf_admin_edit_form',array('codempaco' => 1,'nomempaco' => 2),'Viasolviatra_empleado');
    }
    
    $this->obj = $this->columnas[0]->getConfig($result);

    $this->viasolviatra->setGrid($this->obj);
  }

  public function configGridBoletos($numsol='')
  {
    $c = new Criteria();
    $c->add(ViasolviabolPeer :: NUMSOL, $numsol);
    $result = ViasolviabolPeer :: doSelect($c);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/viasolviatra/' . sfConfig :: get('sf_app_module_config_dir_name') . '/gridboletos');
    
    $this->obj2 = $this->columnas[0]->getConfig($result);

    $this->viasolviatra->setGridbolaer($this->obj2);
  }

  public function configGridTransportes($numsol='')
  {
    $c = new Criteria();
    $c->add(ViasolviatranPeer :: NUMSOL, $numsol);
    $result = ViasolviatranPeer :: doSelect($c);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/viasolviatra/' . sfConfig :: get('sf_app_module_config_dir_name') . '/gridtransportes');
    
    $this->obj3 = $this->columnas[0]->getConfig($result);

    $this->viasolviatra->setGridtrater($this->obj3);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $beneficiario=H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra');
    $valinfcal=H::getConfApp2('valinfcal', 'viaticos', 'viasolviatra');
    $valtieren=H::getConfApp2('valtieren', 'viaticos', 'viasolviatra');
    switch ($ajax){
      case '1':
        $nomemp = '';
        $cedemp = '';
        $codniv = '';
        $nomniv = '';
        $codcar = '';
        $nomcar = '';
        $codcat = '';
        $nomcat = '';
        $js="";
        $traeempaut=H::getConfApp2('traeempaut', 'viaticos', 'viasolviatra');
        $esnoemp=$this->getRequestParameter('esnoemp');
        $c = new Criteria();
        if($esnoemp=='true'){
            $c->add(VianoempPeer::RIFNEMP,$codigo);
            $per = VianoempPeer::doSelectOne($c);
            if($per){
            $nomemp = $per->getNomnemp();
            $cedemp = $per->getRifnemp();
            $codniv=$per->getCodniv();
            $nomniv=H::getX_vacio('CODNIV','Npestorg','Desniv',$codniv);
            $codnivtra=$per->getCodnivnemp();
            $desnivtra=H::getX_vacio('CODNIV','Viadefniv','Desniv',$codnivtra);
            if ($codnivtra!='')
              $js="$('viasolviatra_codniv').readOnly=true; $$('.botoncat')[5].disabled=true; ";
            $output = '[["viasolviatra_nomben","'.$nomemp.'",""],["viasolviatra_cedemp","'.$cedemp.'",""],["viasolviatra_cargo","'.$codcar.' - '.$nomcar.'",""],
                   ["viasolviatra_nivel","'.$codniv.' - '.$nomniv.'",""],["viasolviatra_codnivorg","'.$codniv.'",""],["viasolviatra_codniv","'.$codnivtra.'",""],["viasolviatra_desniv","'.$desnivtra.'",""],["javascript","'.$js.'",""]]';
            }else{
              $js="alert_('El Personal no Empleado no esta registrado'); $('viasolviatra_codemp').value=''; $('viasolviatra_codemp').focus();";
            $output = '[["viasolviatra_cedrif","",""],["viasolviatra_nomben","'.$nomemp.'",""],["viasolviatra_cedemp","'.$cedemp.'",""],["viasolviatra_cargo","'.$codcar.' - '.$nomcar.'",""],
                   ["viasolviatra_nivel","'.$codniv.' - '.$nomniv.'",""],["viasolviatra_codnivorg","'.$codniv.'",""],["javascript","'.$js.'",""]]';
            }
        }else{
            $c->add(NphojintPeer::CODEMP,$codigo);
            $c->add(NphojintPeer::STAEMP,'A');
            $per = NphojintPeer::doSelectOne($c);
            if($per)
            {
             $nomemp = $per->getNomemp();
             $cedemp = $per->getCedemp();
             $codniv = $per->getCodniv();
             $codcar = NphojintPeer::getCodcar($codigo);
             $nomcar = eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars(NphojintPeer::getNomcar($codcar)));
             $codnivtra=H::getX_vacio('CODCAR','Npcargos','Codniv',$codcar);
             $desnivtra=H::getX_vacio('CODNIV','Viadefniv','Desniv',$codnivtra);
             if ($codnivtra!='')
              $js="$('viasolviatra_codniv').readOnly=true; $$('.botoncat')[5].disabled=true; ";
            
             if ($traeempaut=='S') {
               $codempaut=H::getX_vacio('CODEMP','Viaasoempaut','Codempaut',$codigo);
               $nomempaut=H::getX_vacio('CODEMP','Nphojint','Nomemp',$codempaut);
               if ($codempaut!='')
                $js.=" $('viasolviatra_codempaut').value='$codempaut';  $('viasolviatra_nomempaut').value='$nomempaut'; ";
             }

             $c2 = new Criteria();
             $c2->add(NpestorgPeer::CODNIV,$codniv);
             $per2 = NpestorgPeer::doSelectOne($c2);
             if($per2)
                 $nomniv=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($per2->getDesniv()));

             if ($valinfcal=='S')
             {
               $sql="select a.stainf from viacalviatra a, viasolviatra b where a.refsol=b.numsol and (a.stainf is null or a.stainf='' or stainf<>'S') limit 1";
               if (Herramientas::BuscarDatos($sql,$result))
               {
                   if (count($result)>0) {
                     $js="alert_('El Empleado tiene Informe pendientes por entregar'); $('viasolviatra_codemp').value=''; $('viasolviatra_codemp').focus();";
                     $output = '[["javascript","'.$js.'",""]]';
                   }
                   else {
                    $output = '[["viasolviatra_nomemp","'.$nomemp.'",""],["viasolviatra_cedemp","'.$cedemp.'",""],["viasolviatra_cargo","'.$codcar.' - '.$nomcar.'",""],
                      ["viasolviatra_nivel","'.$codniv.' - '.$nomniv.'",""],["viasolviatra_codnivorg","'.$codniv.'",""],["viasolviatra_codniv","'.$codnivtra.'",""],["viasolviatra_desniv","'.$desnivtra.'",""],["javascript","'.$js.'",""]]';
                   }

               }else {
                  $output = '[["viasolviatra_nomemp","'.$nomemp.'",""],["viasolviatra_cedemp","'.$cedemp.'",""],["viasolviatra_cargo","'.$codcar.' - '.$nomcar.'",""],
                   ["viasolviatra_nivel","'.$codniv.' - '.$nomniv.'",""],["viasolviatra_codnivorg","'.$codniv.'",""],["viasolviatra_codniv","'.$codnivtra.'",""],["viasolviatra_desniv","'.$desnivtra.'",""],["javascript","'.$js.'",""]]';
                 }

             }else {
                if ($valtieren=='S'){
                  $e= new Criteria();
                  $e->add(ViasolviatraPeer::CODEMP,$codigo);
                  $e->add(ViasolviatraPeer::STAREN,'N');
                  $rege= ViasolviatraPeer::doSelectOne($e);
                  if ($rege){
                    $js="alert_('El Empleado tiene una Solicitud por Rendir'); $('viasolviatra_codemp').value=''; $('viasolviatra_codemp').focus();";
                     $output = '[["javascript","'.$js.'",""]]';
                  }else {
                     $output = '[["viasolviatra_nomemp","'.$nomemp.'",""],["viasolviatra_cedemp","'.$cedemp.'",""],["viasolviatra_cargo","'.$codcar.' - '.$nomcar.'",""],
                      ["viasolviatra_nivel","'.$codniv.' - '.$nomniv.'",""],["viasolviatra_codnivorg","'.$codniv.'",""],["viasolviatra_codniv","'.$codnivtra.'",""],["viasolviatra_desniv","'.$desnivtra.'",""],["javascript","'.$js.'",""]]';
                  }

                }else {
               $output = '[["viasolviatra_nomemp","'.$nomemp.'",""],["viasolviatra_cedemp","'.$cedemp.'",""],["viasolviatra_cargo","'.$codcar.' - '.$nomcar.'",""],
                     ["viasolviatra_nivel","'.$codniv.' - '.$nomniv.'",""],["viasolviatra_codnivorg","'.$codniv.'",""],["viasolviatra_codniv","'.$codnivtra.'",""],["viasolviatra_desniv","'.$desnivtra.'",""],["javascript","'.$js.'",""]]';
                 }
               }
            }else{
              $js="alert_('El Empleado no esta registrado o no esta Activo'); $('viasolviatra_codemp').value=''; $('viasolviatra_codemp').focus();";
                $output = '[["viasolviatra_codemp","",""],["viasolviatra_nomemp","'.$nomemp.'",""],["viasolviatra_cedemp","'.$cedemp.'",""],["viasolviatra_cargo","'.$codcar.' - '.$nomcar.'",""],
                   ["viasolviatra_nivel","'.$codniv.' - '.$nomniv.'",""],["viasolviatra_codnivorg","'.$codniv.'",""],["viasolviatra_codniv","'.$codnivtra.'",""],["viasolviatra_desniv","'.$desnivtra.'",""],["javascript","'.$js.'",""]]';
            }
        }
        break;
      case '2':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $nomemp = '';
        $cedemp = '';
        $codniv = '';
        $nomniv = '';
        $codcar = '';
        $nomcar = '';
        $c = new Criteria();
        if($beneficiario=='S'){
            $c->add(OpbenefiPeer::CEDRIF,$codigo);
            $per = OpbenefiPeer::doSelectOne($c);
            if($per){
            $nomemp = $per->getNomben();
            $cedemp = $per->getCedrif();
            $output = '[["viasolviatra_nombenaco","'.$nomemp.'",""],["viasolviatra_cedempaco","'.$cedemp.'",""],["viasolviatra_cargoaco","'.$codcar.' - '.$nomcar.'",""],
                   ["viasolviatra_nivelaco","'.$codniv.' - '.$nomniv.'",""]]';
            }else{
            $output = '[["viasolviatra_cedrifaco","",""],["viasolviatra_nombenaco","'.$nomemp.'",""],["viasolviatra_cedempaco","'.$cedemp.'",""],["viasolviatra_cargoaco","'.$codcar.' - '.$nomcar.'",""],
                   ["viasolviatra_nivelaco","'.$codniv.' - '.$nomniv.'",""]]';
            }
        }else{
            $c->add(NphojintPeer::CODEMP,$codigo);
            $c->add(NphojintPeer::STAEMP,'A');
            $per = NphojintPeer::doSelectOne($c);
            if($per)
            {
             $nomemp = $per->getNomemp();
             $cedemp = $per->getCedemp();
             $codniv = $per->getCodniv();
             $codcar = NphojintPeer::getCodcar($codigo);
             $nomcar = NphojintPeer::getNomcar($codcar);
             $c2 = new Criteria();
             $c2->add(NpestorgPeer::CODNIV,$codniv);
             $per2 = NpestorgPeer::doSelectOne($c2);
             if($per2)
                 $nomniv=$per2->getDesniv();

             $output = '[["viasolviatra_nomempaco","'.$nomemp.'",""],["viasolviatra_cedempaco","'.$cedemp.'",""],["viasolviatra_cargoaco","'.$codcar.' - '.$nomcar.'",""],
                   ["viasolviatra_nivelaco","'.$codniv.' - '.$nomniv.'",""]]';
            }else{
                $output = '[["viasolviatra_codnivaco","",""],["viasolviatra_nomempaco","'.$nomemp.'",""],["viasolviatra_cedempaco","'.$cedemp.'",""],["viasolviatra_cargoaco","'.$codcar.' - '.$nomcar.'",""],
                   ["viasolviatra_nivelaco","'.$codniv.' - '.$nomniv.'",""]]';
            }
        }
        break;
      case '3';
         $nomniv='';
         $c = new Criteria();
         $c->add(ViadefnivPeer::CODNIV,$codigo);
         $per = ViadefnivPeer::doSelectOne($c);
         if($per)
             $desniv=$per->getDesniv();
         $output = '[["viasolviatra_desnivaco","'.$desniv.'",""]]';
        break;
      case '4';
         $numdia=0;
         $fecdes = $this->getRequestParameter('fecdes','');
         $fechas = $this->getRequestParameter('fechas','');
         $codemp = $this->getRequestParameter('codemp','');
         $id = $this->getRequestParameter('id','');
         $auxfecd = split("/",$fecdes);
         $auxfech = split("/",$fechas);
         $js="";
         $encon=false;
         if ($id=='viasolviatra_fecdes')
         {
             if(count($auxfecd)==3)
             {
                  if(strtotime($auxfecd[2].'-'.$auxfecd[1].'-'.$auxfecd[0]))
                  {
                      $dateFormat = new sfDateFormat('es_VE');
                      $fec1 = $dateFormat->format($fecdes, 'i', $dateFormat->getInputPattern('d'));

                       $result=array();
                       $sql="select * from (
                        select b.fecha as fecha from viasolviatra a, npfechas b where a.codemp='".$codemp."' and a.status<>'N' and b.fecha between fecdes and fechas
                        ) z where fecha='".$fec1."'";
                      if (Herramientas::BuscarDatos($sql,$result)){
                        $encon=true;
                      }
                  }else $js="alert('Fecha Inv&aacute;lida'); $('".$id."').value='';";
             }else $js="alert('Fecha Inv&aacute;lida'); $('".$id."').value='';";
         }else {
             if(count($auxfech)==3)
             {
                  if(strtotime($auxfech[2].'-'.$auxfech[1].'-'.$auxfech[0]))
                  {
                      $dateFormat = new sfDateFormat('es_VE');
                      $fec2 = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));

                       $resu=array();
                       $sql="select * from (
                        select b.fecha as fecha from viasolviatra a, npfechas b where a.codemp='".$codemp."' and a.status<>'N' and b.fecha between fecdes and fechas
                        ) z where fecha='".$fec2."'";
                      if (Herramientas::BuscarDatos($sql,$resu)){
                        $encon=true;
                      }
                  }else $js="alert('Fecha Inv&aacute;lida'); $('".$id."').value='';";
             }else $js="alert('Fecha Inv&aacute;lida'); $('".$id."').value='';";
         }
         
         if (!$encon)
         {
             if ($fecdes!="" && $fechas!="")
             {
                 $dateFormat = new sfDateFormat('es_VE');
                 $feca = $dateFormat->format($fecdes, 'i', $dateFormat->getInputPattern('d'));
                 $fecb = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));
                 
                  if ($fecb>=$feca) {
                      $sql="select (to_date('$fechas','dd/mm/yyyy')-to_date('$fecdes','dd/mm/yyyy'))+1 as dias";
                      if(H::BuscarDatos($sql, $rs))
                        $numdia=$rs[0]['dias'];
                  }else $js="alert('La Fecha Hasta no puede ser menor a la Fecha Desde'); $('viasolviatra_fechas').value=''";
                 
             }
         }else $js="alert_('El Solicitante del Vi&aacute;tico ya tiene un vi&aacute;tico entre esa fecha'); $('".$id."').value=''";        
         
        
         $output = '[["viasolviatra_numdia","'.$numdia.'",""],["javascript","'.$js.'",""]]';
        break;
      case '5';
        $nomemp = '';
        $cedemp = '';
        $codniv = '';
        $nomniv = '';
        $c = new Criteria();
        $c->add(NphojintPeer::CODEMP,$codigo);
        $per = NphojintPeer::doSelectOne($c);
        if($per)
        {
         $nomemp = $per->getNomemp();
         $cedemp = $per->getCedemp();
         $codniv = $per->getCodniv();
         $c2 = new Criteria();
         $c2->add(NpestorgPeer::CODNIV,$codniv);
         $per2 = NpestorgPeer::doSelectOne($c2);
         if($per2)
             $nomniv=$per2->getDesniv();
        }
        $output = '[["viasolviatra_nomempaut","'.$nomemp.'",""],["viasolviatra_cedempaut","'.$cedemp.'",""],
                   ["viasolviatra_nivelaut","'.$codniv.' - '.$nomniv.'",""]]';
        break;
      case '6':
          $js="$('viasolviatra_codciu').value='';";
          $dato=H::GetX('Codest','Viaestado','Nomest',$codigo);
          $output = '[["javascript","'.$js.'",""],["viasolviatra_nomest","'.$dato.'",""],["","",""]]';
        break;
      case '7':
          $js="$('viasolviatra_codciu').value='';
               $('viasolviatra_codest').value='';";
          $dato=H::GetX('Codpai','Viapais','Nompai',$codigo);
          $output = '[["javascript","'.$js.'",""],["viasolviatra_nompai","'.$dato.'",""],["","",""]]';
        break;
      case '8':
          $t= new Criteria();
          $t->add(BnubicaPeer::CODUBI,$codigo);
          $reg=BnubicaPeer::doSelectOne($t);
          if ($reg)
          {
              $dato=$reg->getDesubi();
              $dato2=$reg->getCedemp();
              $dato3=$reg->getNomemp();
              $js="";
          }else {
            $js="alert('La Unidad Solicitante no existe;'); $('viasolviatra_codubi').focus();";
            $dato2=""; $dato3=""; $dato="";
          }
          $output = '[["javascript","'.$js.'",""],["viasolviatra_desubi","'.$dato.'",""],["viasolviatra_codempaut","'.$dato2.'",""],["viasolviatra_nomempaut","'.$dato3.'",""],["viasolviatra_nomempe","'.$dato3.'",""]]';
        break;
     case '9':
          $c= new Criteria();
          $c->add(CadefcenPeer::CODCEN,$codigo);
          $reg= CadefcenPeer::doSelectOne($c);
          if ($reg)
          {
            $dato=$reg->getDescen();
            $js="";
          }else {
              $js="alert('La Unidad Ejecutora no existe'); $('viasolviatra_codcen').focus();";
              $dato="";
          }
          $output = '[["javascript","'.$js.'",""],["viasolviatra_descen","'.$dato.'",""],["","",""]]';
        break;
      case '10':
        $dateFormat = new sfDateFormat('es_VE');
        $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

        $msj="";
        $c= new Criteria();
        $c->add(ViasolviatraPeer::NUMSOL,$this->getRequestParameter('numsol'));
        $data=ViasolviatraPeer::doSelectOne($c);
        if ($data)
        {
          if ($fecha<$data->getFecsol())
          {
            $msj="alert('La Fecha de Anulacion no puede ser menor a la Fecha de la Solicitud'); $('viasolviatra_fecanu').value=''";
          }          
        }        
        $output = '[["javascript","'.$msj.'",""]]';
        break;     
      case '11':  
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir=H::getConfApp2('filsoldir', 'viaticos', 'viasolviatra');
   
        $q= new Criteria();
        if ($filsoldir=='S'){
          $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
        }else $q->add(CadefdirecPeer::CODDIREC,$codigo);
        $reg= CadefdirecPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesdirec(); 
           $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
           if ($categoriasusu!='')
           {
             $codcat=$reg->getCodcat();
             $nomcat=H::getX_vacio('CODCAT','Npcatpre','Nomcat',$codcat);
             $js="$('viasolviatra_codcat').value='".$codcat."'; $('viasolviatra_nomcat').value='".$nomcat."';";
           }          
        }else {
            $dato="";
            $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('viasolviatra_coddirec').value=''; $('viasolviatra_desdirec').value=''; $('viasolviatra_coddirec').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';        
        break; 
      case '12';
        $nomemp = '';
        $celemp = '';
        $js='';
        $c = new Criteria();
        $c->add(NphojintPeer::CODEMP,$codigo);
        $per = NphojintPeer::doSelectOne($c);
        if($per)
        {
         $nomemp = $per->getNomemp();
         $celemp = $per->getCelemp();
        }else $js="alert_('La Contacto no existe'); $('viasolviatra_codempusu').value=''; $('viasolviatra_codempusu').focus();";
        $output = '[["viasolviatra_nomempusu","'.$nomemp.'",""],["viasolviatra_celemp","'.$celemp.'",""],["javascript","'.$js.'",""]]';
        break;     
      case '13':
        $cajtexmos=$this->getRequestParameter('cajtexmos');
        $js=""; $dato="";

        $r= new Criteria();
        $r->add(ViamunicipPeer::CODMUN,$this->getRequestParameter('codigo'));
        $r->add(ViamunicipPeer::VIAESTADO_CODEST,$this->getRequestParameter('estado'));
        $reg= ViamunicipPeer::doSelectOne($r);
        if ($reg) 
            $dato=$reg->getNommun();        
        else
            $js="alert('El Municipio no existe o no esta asociado al Estado'); $('viasolviatra_codmun').value=''; $('viasolviatra_nommun').value=''; $('viasolviatra_codmun').focus();";
        
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;    
      case '14':
          $t= new Criteria();
          $t->add(CpeveprePeer::CODEVE,$codigo);
          $reg=CpeveprePeer::doSelectOne($t);
          if ($reg)
          {
              $dato=$reg->getDeseve();
              $js="";
          }else {
            $js="alert('El Evento no existe'); $('viasolviatra_codeve').value='';  $('viasolviatra_deseve').value=''; $('viasolviatra_codeve').focus();";
            $dato="";
          }
          $output = '[["javascript","'.$js.'",""],["viasolviatra_deseve","'.$dato.'",""]]';
        break;     
      case '15':
        $dato="";
        $js="";
        $t= new Criteria();
        $t->add(NpcatprePeer::CODCAT,$codigo);
        $resp= NpcatprePeer::doSelectOne($t);
        if ($resp) {
          $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
          $loguse = sfContext::getInstance()->getUser()->getAttribute('loguse');
          if ($categoriasusu!='')
          {
            $y = new Criteria();
            $y->add(SegcatusuPeer::LOGUSE,$loguse);
            $y->add(SegcatusuPeer::CODCAT,$codigo);                        
            $regs2 = SegcatusuPeer::doSelectOne($y);
            if ($regs2) {
              $dato=$resp->getNomcat();
            }else {
              $js = "alert_('La Categoria Presupuestaria no esta asociada a este Usuario'); $('viasolviatra_codcat').value=''; $('viasolviatra_codcat').focus();";             
            }
          }else $dato=$resp->getNomcat();          
        }else
          $js="alert_('El C&oacute;digo de la Categoria no esta registrado'); $('viasolviatra_codcat').value=''; $('viasolviatra_codcat').focus();";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '16':
        $dato="";
        $js="";
        $catprofor=H::getConfApp2('catprofor', 'compras', 'almordcom');
        if ($catprofor=='S'){
           $c= new Criteria();
           $c->add(FordefpryPeer::CODPRO,$codigo);
           $datos= FordefpryPeer::doselectOne($c);
           if ($datos)
           {      
              $dato=$datos->getNompro();      
              $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
           }else {
              $js="alert('El Proyecto no Existe'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";
              $output = '[["javascript","'.$js.'",""]]';
           }
        }else {
           $c= new Criteria();
           $c->add(CatipproPeer::CODPRO,$codigo);
           $datos= CatipproPeer::doselectOne($c);
           if ($datos)
           {      
            $dato=$datos->getDespro();      
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
           }else {
            $js="alert('El Proyecto no Existe'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";
            $output = '[["javascript","'.$js.'",""]]';
           }
        }
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
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

    if($this->getRequest()->getMethod() == sfRequest::POST){
        $this->viasolviatra = $this->getViasolviatraOrCreate();
        $this->updateViasolviatraFromRequest();

      $valotrocampos=H::getConfApp2('valotrocampos', 'viaticos', 'viasolviatra');
      if (!$this->viasolviatra->getId() && $valotrocampos=='S') {
        if ($this->viasolviatra->getNumpas()==''){
           $this->coderr=1607;
            return false;
        }
        if ($this->viasolviatra->getNumvis()==''){
           $this->coderr=1608;
            return false;
        }
        if ($this->viasolviatra->getNumcel()==''){
           $this->coderr=1609;
            return false;
        }
        if ($this->viasolviatra->getNumext()==''){
           $this->coderr=1610;
            return false;
        }
        if ($this->viasolviatra->getApepercon()==''){
           $this->coderr=1611;
            return false;
        }
        if ($this->viasolviatra->getNompercon()==''){
           $this->coderr=1612;
            return false;
        }
        if ($this->viasolviatra->getParpercon()==''){
           $this->coderr=1613;
            return false;
        }
        if ($this->viasolviatra->getNumhabpercon()==''){
           $this->coderr=1614;
            return false;
        }
        if ($this->viasolviatra->getNumcelpercon()==''){
           $this->coderr=1615;
            return false;
        }
      }

      $valitinerario=H::getConfApp2('valitinerario', 'viaticos', 'viasolviatra');
      if ($valitinerario=='S' && !$this->viasolviatra->getId()){
         if ($this->viasolviatra->getItinerario()==''){
           $this->coderr=1627;
            return false;
        }
      }
      
      $filsoldir=H::getConfApp2('filsoldir', 'viaticos', 'viasolviatra');
      if ($filsoldir=='S' && !$this->viasolviatra->getId()){
         if ($this->viasolviatra->getCoddirec()==''){
           $this->coderr=1633;
            return false;
        }
      }

      $novalestciu=H::getConfApp2('novalestciu', 'viaticos', 'viasolviatra');
      if ($novalestciu!='S'){
         if ($this->viasolviatra->getCodest()==''){
           $this->coderr=1628;
            return false;
        }
        if ($this->viasolviatra->getCodciu()==''){
           $this->coderr=1629;
            return false;
        }
      }
     if (!$this->viasolviatra->getId()) {
     $result=array();
     $sql="select * from (
      select b.fecha as fecha from viasolviatra a, npfechas b where a.codemp='".$this->viasolviatra->getCodemp()."' and a.status<>'N' and b.fecha between fecdes and fechas
      ) z where fecha between  '".$this->viasolviatra->getFecdes()."' and '".$this->viasolviatra->getFechas()."'";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $this->coderr=1630;
      return false;
    }   
  }else {
    $result=array();
     $sql="select * from (
      select b.fecha as fecha from viasolviatra a, npfechas b where a.numsol!='".$this->viasolviatra->getNumsol()."' and a.codemp='".$this->viasolviatra->getCodemp()."' and a.status<>'N' and b.fecha between fecdes and fechas
      ) z where fecha between  '".$this->viasolviatra->getFecdes()."' and '".$this->viasolviatra->getFechas()."'";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $this->coderr=1630;
      return false;
    }   
  }

        
        $e= new Criteria();
        if ($this->viasolviatra->getEsnoemp()) {
          $e->add(VianoempPeer::RIFNEMP,$this->viasolviatra->getCodemp());
          $reg= VianoempPeer::doSelectOne($e);
        }else {
          $e->add(NphojintPeer::CODEMP,$this->viasolviatra->getCodemp());
          $reg= NphojintPeer::doSelectOne($e);

          if ($this->viasolviatra->getCodniv()=='')
          {
            $this->coderr=1606;
            return false;
          }
        }
        if (!$reg)
          $this->coderr=1806;        

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
    //$this->configGrid();
      $this->grabo="";

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);

    //$this->configGrid($grid[0],$grid[1])

  }

  public function saving($clasemodelo)
  {
    $valtieren=H::getConfApp2('valtieren', 'viaticos', 'viasolviatra');
    if ($clasemodelo->getId())
    {
      $clasemodelo->save();
    }else {
      if($clasemodelo->getNumsol()=='##########')
      {
          $c = new Criteria();
          $per = ViadefgenPeer::doSelectOne($c);
          if(!$per) $per = new Viadefgen();
          $numsol = str_pad($per->getSecsolvia(),10,'0',STR_PAD_LEFT);
          $val = H::GetX('Numsol','Viasolviatra','Numsol',$numsol);
          if($val==$numsol)
              return 'V008';
          $clasemodelo->setNumsol($numsol);
          $sql="update viadefgen set numsolvia='".($per->getNumsolvia()+1)."'";
          H::insertarRegistros($sql);
      }
      $codnivapr='';
      $aprob='';
      $sql="select b.codnivapr, b.prioriapr, a.aprobacion from viadefproced a, viaasoproniv b
              where
              a.codproced='".$clasemodelo->getCodproced()."' and
              a.codproced=b.codproced and
              a.aprobacion='S'
              order by prioriapr";
      if(H::BuscarDatos($sql, $rs))
      {
          $codnivapr=$rs[0]['codnivapr'];
          $aprob=$rs[0]['aprobacion'];
      }
      $clasemodelo->setCodnivapr($codnivapr);
      if ($valtieren=='S')
        $clasemodelo->setStaren('N');

      if($codnivapr!='')
          $clasemodelo->setStatus('P');
      else
          $clasemodelo->setStatus('A');

      $clasemodelo->setStaren('N');
      $clasemodelo->setLogusu(sfContext::getInstance()->getUser()->getAttribute('loguse'));
      $clasemodelo->setNumsol(str_pad($clasemodelo->getNumsol(),10,'0',STR_PAD_LEFT));
      $clasemodelo->save();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
      $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
      Viaticos::salvarAcompanantes($clasemodelo, $grid);
      if ($clasemodelo->getReqbolaer()=='S')
        Viaticos::salvarBoletosAereos($clasemodelo, $grid2);
      if ($clasemodelo->getReqtrater()=='S')
        Viaticos::salvarTransporteTerrestre($clasemodelo, $grid3);
  }
    return -1;
  }

  public function deleting($clasemodelo)
  {
    if($clasemodelo->getStatus()=='P') {
        H::EliminarRegistro('Viadetsolacoemp','NUMSOL',$clasemodelo->getNumsol());
        if ($clasemodelo->getReqbolaer()=='S') {
          H::EliminarRegistro('Viasolviabol','NUMSOL',$clasemodelo->getNumsol());
          $numsolbolaer=H::getX_vacio('NUMSOLVI','Viasolbolaer','Numsol',$clasemodelo->getNumsol());
          H::EliminarRegistro('viadetsolbolaer','NUMSOL',$numsolbolaer);
          H::EliminarRegistro('Viasolbolaer','NUMSOLVI',$clasemodelo->getNumsol());
        }
        if ($clasemodelo->getReqtrater()=='S') {
          H::EliminarRegistro('Viasolviatran','NUMSOL',$clasemodelo->getNumsol());
          $numsoltraterr=H::getX_vacio('NUMSOLVI','Viasoltraterre','Numsol',$clasemodelo->getNumsol());
          H::EliminarRegistro('viarutsoltran','NUMSOL',$numsoltraterr);
          H::EliminarRegistro('Viasoltraterre','NUMSOLVI',$clasemodelo->getNumsol());
        }
        return parent::deleting($clasemodelo);
    }else {
      $tiecal=H::getX_vacio('REFSOL','Viacalviatra','Status',$clasemodelo->getNumsol());
      if ($tiecal=='') {
        H::EliminarRegistro('Viadetsolacoemp','NUMSOL',$clasemodelo->getNumsol());
        if ($clasemodelo->getReqbolaer()=='S') {
          H::EliminarRegistro('Viasolviabol','NUMSOL',$clasemodelo->getNumsol());
          $numsolbolaer=H::getX_vacio('NUMSOLVI','Viasolbolaer','Numsol',$clasemodelo->getNumsol());
          H::EliminarRegistro('viadetsolbolaer','NUMSOL',$numsolbolaer);
          H::EliminarRegistro('Viasolbolaer','NUMSOLVI',$clasemodelo->getNumsol());
        }
        if ($clasemodelo->getReqtrater()=='S') {
          H::EliminarRegistro('Viasolviatran','NUMSOL',$clasemodelo->getNumsol());
          $numsoltraterr=H::getX_vacio('NUMSOLVI','Viasoltraterre','Numsol',$clasemodelo->getNumsol());
          H::EliminarRegistro('viarutsoltran','NUMSOL',$numsoltraterr);
          H::EliminarRegistro('Viasoltraterre','NUMSOLVI',$clasemodelo->getNumsol());
        }
        return parent::deleting($clasemodelo);
      }
      else return 'V009';
    }        
  }

  public function executeAnular()
  {
   $numsol=$this->getRequestParameter('numsoli');
   $fecsol=$this->getRequestParameter('fecsoli');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fecsol, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(ViasolviatraPeer::NUMSOL,$numsol);
   $c->add(ViasolviatraPeer::FECSOL,$fec);
   $this->viasolviatra = ViasolviatraPeer::doSelectOne($c);
   sfView::SUCCESS;
  }

  public function executeSalvaranu()
  {
    $numsol=$this->getRequestParameter('numsol');
    $fecanu=$this->getRequestParameter('fecanu');
    $motanu=$this->getRequestParameter('motanu');
    $this->msg='';
    $this->mensaje2="";

    $fecha_aux=split("/",$fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

    $c= new Criteria();
    $c->add(ViasolviatraPeer::NUMSOL,$numsol);
    $resul= ViasolviatraPeer::doSelectOne($c);
    if ($resul)
    {
      if ($fec>=$resul->getFecsol())
      {
        $rb= new Criteria();
        $rb->add(ViacalviatraPeer::REFSOL,$resul->getNumsol());
        $rb->add(ViacalviatraPeer::STATUS,'N',Criteria::NOT_EQUAL);
        $regb= ViacalviatraPeer::doSelectOne($rb);        
        if (!$regb)
        {
          $resul->setFecanu($fec);
          $resul->setDesanu($motanu);
          $resul->setStatus('N');
          $resul->save();
        }
        else
        {
          $this->msg="La Solicitud de Viáticos no se puede Anular porque esta asociada a un Cálculo";
          return sfView::SUCCESS;
        }
      }
      else
      {
        $this->msg="La Solicitud de Viáticos no se puede Anular con una Fecha Menor a la Fecha de Emisión";
        return sfView::SUCCESS;
      }
    }
   
    return sfView::SUCCESS;
  }

    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
    public function executeAjaxgrid() {
      $name = $this->getRequestParameter('grid','a');
      $grid = $this->getRequestParameter('grid'.$name,'');
      $fila = $this->getRequestParameter('fila','');
      $col = $this->getRequestParameter('columna', '');
      $javascript="";  $jsonextra="";
      $beneficiario=H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra');
      switch ($col) {
       case ('1'):   //Código Empleado
          if ($grid[$fila][$col-1]!="")
          {                  
            if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
            {
              $codniv = '';
              $nomniv = '';
              $codcar = '';
              $nomcar = '';
              $c = new Criteria();
              if($beneficiario=='S'){
                  $c->add(OpbenefiPeer::CEDRIF,$grid[$fila][$col-1]);
                  $per = OpbenefiPeer::doSelectOne($c);
                  if($per){
                   $grid[$fila][1] = $per->getNomben();
                   $grid[$fila][2] = $per->getCedrif();
                   $grid[$fila][3] = $codcar.' - '.$nomcar;
                   $grid[$fila][4] =$codniv.' - '.$nomniv;
                  }else {
                     $javascript = "alert_('El Empleado no esta registrado');";
                    $grid[$fila][$col-1]="";
                  }
              }else{
                  $c->add(NphojintPeer::CODEMP,$grid[$fila][$col-1]);
                  $c->add(NphojintPeer::STAEMP,'A');
                  $per = NphojintPeer::doSelectOne($c);
                  if($per)
                  {
                   $grid[$fila][1] = $per->getNomemp();
                   $grid[$fila][2] = $per->getCedemp();
                   $codniv = $per->getCodniv();
                   $codcar = NphojintPeer::getCodcar($codigo);
                   $nomcar = NphojintPeer::getNomcar($codcar);
                   $c2 = new Criteria();
                   $c2->add(NpestorgPeer::CODNIV,$codniv);
                   $per2 = NpestorgPeer::doSelectOne($c2);
                   if($per2)
                       $nomniv=$per2->getDesniv();
                   $grid[$fila][3] = $codcar.' - '.$nomcar;
                   $grid[$fila][4] =$codniv.' - '.$nomniv;
                  }else{
                      $javascript = "alert_('El Empleado no esta registrado o no esta Activo');";
                      $grid[$fila][$col-1]="";
                  }
              }                               
            }else {
                $javascript = "alert_('El Empleado se encuentra Repetido');";
                $grid[$fila][$col-1]="";
            }
          }                  
          $jsonextra = ',["javascript","' . $javascript . '",""]';
          break;    
        case ('6'): //Nivel de Empleado
         $c = new Criteria();
         $c->add(ViadefnivPeer::CODNIV,$grid[$fila][$col-1]);
         $per = ViadefnivPeer::doSelectOne($c);
         if($per)
             $grid[$fila][$col]=$per->getDesniv();
           else {
                $javascript = "alert_('El Nivel del Empleado no esta registrado');";
                $grid[$fila][$col-1]="";
            }
         $jsonextra = ',["javascript","' . $javascript . '",""]';
         break;    
        default:
          break;
      }


      $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }

public function getLabels()
  {
    $labels = parent::getLabels();
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['viasolviatra{coddirec}'] = 'Estado';

    $cambiareti2=H::getConfApp2('cameti', 'viaticos', 'viasolviatra');
    if ($cambiareti2=='S'){
      $labels['viasolviatra{numsol}'] = 'Nro Orden';
      $labels['viasolviatra{fecsol}'] = 'Fecha Orden';
    }

    return $labels;
  }      

}
