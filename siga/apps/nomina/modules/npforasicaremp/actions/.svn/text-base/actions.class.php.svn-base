<?php

/**
 * npforasicaremp actions.
 *
 * @package    siga
 * @subpackage npforasicaremp
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class npforasicarempActions extends autonpforasicarempActions
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npasicaremp/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Npasicaremp', 15);
    $c = new Criteria();
    $c->add(NpasicarempPeer::STATUS,'V');
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


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

    // Insertar el criterio de la busqueda de registros del Grid
    // Por ejemplo:

    // $c = new Criteria();
    // $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
    // $reg = CaartaocPeer::doSelect($c);

    // De esta forma se carga la configuración del grid de un archivo yml
    // y se le pasa el parámetro de los registros encontrados ($reg)
    //                                                                            /nombreformulario/
    // $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formulario/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    // Si no se quiere cargar la configuración del grid de un .yml, sedebe hacer a pie.
    // Por ejemplo:

    /*
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Caartalm');
    $opciones->setAnchoGrid(1150);
    $opciones->setTitulo('Existencia por Almacenes');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Cod. Almacen');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codalm');
    $col1->setCatalogo('cadefalm','sf_admin_edit_form','2');
    $col1->setAjax(2,2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('codalm');
    $col2->setHTML('type="text" size="25" disabled=true');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
     */


  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js="";

    switch ($ajax){
      case '1':
        $l= new Criteria();
        $l->add(NphojintPeer::CODEMP,$codigo);
        $reg= NphojintPeer::doSelectOne($l);
        if ($reg)
        {
           if ($reg->getStaemp()!='R')
            {
               $dato=$reg->getNomemp(); 
               $codniv =$reg->getCodniv(); 
               $nomniv = H::getX_vacio('Codniv','Npestorg','Desniv',$codniv);
               $dato2 = $codniv.'  '.$nomniv;
            }else {
              $dato2=""; $js="alert('El Empleado se encuentra Retirado'); $('npasicaremp_codemp').value=''; $('npasicaremp_codemp').focus();";
            }
            
        }else{
           $dato2="";$js="alert('El Empleado no existe'); $('npasicaremp_codemp').value=''; $('npasicaremp_codemp').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["npasicaremp_nivel","'.$dato2.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
        $l= new Criteria();
        $l->add(NpnominaPeer::CODNOM,$codigo);
        $reg= NpnominaPeer::doSelectOne($l);
        if ($reg)
        {
               $dato=$reg->getNomnom(); 
               $dato2 = $reg->getFrecal();
        }else{
           $dato2="";$js="alert_('El N&oacute;mina no existe'); $('npasicaremp_codnom').value=''; $('npasicaremp_codnom').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["npasicaremp_frecal","'.$dato2.'",""],["javascript","'.$js.'",""]]';
        break;
      case '3':
        $c = new Criteria();
        $c->add(NpcargosPeer::CODCAR,$codigo);
        $c->addJoin(NpcargosPeer::CODCAR,NpasicarnomPeer::CODCAR);
        $npcargos = NpcargosPeer::doSelectOne($c);
        if($npcargos){
          $filvac=$this->getRequestParameter('filvac','');
            if ($filvac=='S')
            {
               if (H::toFloat($npcargos->getCanvmix())>0){
                  $dato=$npcargos->getNomcar();
                  $codtipcar=$npcargos->getCodtip();
                  if($this->getUser()->getAttribute('codcar','','nomasicarconnom')!='')
                  {
                    if($this->getUser()->getAttribute('codcar','','nomasicarconnom')==$codtipcar)
                      $js.="$('gridcatded').show()";
                    else
                      $js.="$('gridcatded').hide()";
                  }
               }else {
                  $js="alert_('El numero de Vacantes para este cargo es Igual a cero'); $('npasicaremp_codcar').value=''; $('npasicaremp_codcar').focus();";
               }
            }else {
                 $dato=$npcargos->getNomcar();
                 $codtipcar=$npcargos->getCodtip();
                 if($this->getUser()->getAttribute('codcar','','nomasicarconnom')!='')
                 {
                    if($this->getUser()->getAttribute('codcar','','nomasicarconnom')==$codtipcar)
                      $js.="$('gridcatded').show()";
                    else
                      $js.="$('gridcatded').hide()";
                 }
            }
        }else{
           $js="alert_('El Cargo no existe &oacute; no esta asignado a ninguna n&oacute;mina'); $('npasicaremp_codcar').value=''; $('npasicaremp_codcar').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '4':
        $l= new Criteria();
        $l->add(NpcatprePeer::CODCAT,$codigo);
        $reg= NpcatprePeer::doSelectOne($l);
        if ($reg)
        {
               $dato=$reg->getNomcat(); 
        }else{
           $js="alert_('La Categoria no existe'); $('npasicaremp_codcat').value=''; $('npasicaremp_codcat').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '5':
        $l= new Criteria();
        $l->add(NpdefttrabPeer::CODTTRAB,$codigo);
        $reg= NpdefttrabPeer::doSelectOne($l);
        if ($reg)
        {
               $dato=$reg->getDesttrab(); 
        }else{
           $js="alert_('El Tipo de Trabajador no existe'); $('npasicaremp_codttrab').value=''; $('npasicaremp_codttrab').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '6':
        $l= new Criteria();
        $l->add(CadefcenPeer::CODCEN,$codigo);
        $reg= CadefcenPeer::doSelectOne($l);
        if ($reg)
        {
               $dato=$reg->getDescen(); 
        }else{
           $js="alert_('El Centro de Costo no existe'); $('npasicaremp_codcen').value=''; $('npasicaremp_codcen').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;    
      case '7':
        $p= new Criteria();
        $p->add(CpeveprePeer::CODEVE,$codigo);
        $result= CpeveprePeer::doSelectOne($p);
        if ($result)
          $dato=$result->getDeseve();
        else
          $js="alert('El Evento no existe'); $('npasicaremp_codeve').value=''; $('npasicaremp_codeve').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
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

       $this->npasicaremp = $this->getNpasicarempOrCreate();
       $this->updateNpasicarempFromRequest();

      if (!$this->npasicaremp->getId()) {
        $c = new Criteria();
        $c->add(NpasicarempPeer :: CODEMP, $this->npasicaremp->getCodemp());
        $c->add(NpasicarempPeer :: CODCAR, $this->npasicaremp->getCodcar());
        $c->add(NpasicarempPeer :: CODNOM, $this->npasicaremp->getCodnom());
        $c->add(NpasicarempPeer :: FECASI, $this->npasicaremp->getFecasi());
        $c->add(NpasicarempPeer :: STATUS, 'V');
        $reg = NpasicarempPeer :: doSelectOne($c);
        if ($reg) {
          $this->coderr= 434;
        }
        $mascar=H::getConfApp2('mascar', 'nomina', 'nomasicarconnom');
        if ($mascar!='S') {     
          $cc = new Criteria();
          $cc->add(NpasicarempPeer :: CODEMP, $this->npasicaremp->getCodemp());
          $cc->add(NpasicarempPeer :: STATUS, 'V');
          $r = NpasicarempPeer :: doSelectOne($cc);
          if ($r)
          {
              $this->coderr=4413;
          }
        }
        $filvac=H::getConfApp2('filvac', 'nomina', 'nomasicarconnom');
        if ($filvac=='S') {
          $cw = new Criteria();
          $cw->add(NpcargosPeer::CODCAR,$this->npasicaremp->getCodcar());
          $p = NpcargosPeer::doSelectOne($cw);
          if($p)
          {
              if($p->getCanphom()+$p->getCanpmuj()>0)
              {
                  $c = new Criteria();
                  $c->add(NphojintPeer::CODEMP,$this->npasicaremp->getCodemp());
                  $r = NphojintPeer::doSelectOne($c);
                  if($r)
                  {
                      if($r->getSexemp()=='M')
                      {
                          if($p->getCanvhom()<=0)
                                  $this->coderr='N0003';
                      }else
                      {
                          if($p->getCanvmuj()<=0)
                                  $this->coderr='N0003';
                      }
                  }
              }
          }
      }
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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    Nomina::salvarAsigCarNomUnico($clasemodelo);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    if($clasemodelo->getExplab()=='S')
    {
      //Actualizar Npexplab
      $t= new Criteria();
      $t->add(NpexplabPeer::CODEMP,$clasemodelo->getCodemp());
      $t->add(NpexplabPeer::CODCAR,$clasemodelo->getCodcar());
      $t->add(NpexplabPeer::FECINI,$clasemodelo->getFecasi());
      $t->add(NpexplabPeer::STACAR,'D');
      $trajo= NpexplabPeer::doSelectOne($t);
      if ($trajo)
      {
        $trajo->setFecter(date('Y-m-d'));
        $trajo->save();
      }
      // se graba en el histórico de Cargos
      $nphisasicaremp = new Nphisasicaremp();
      $nphisasicaremp->setCodemp($clasemodelo->getCodemp());
      $nphisasicaremp->setCodcar($clasemodelo->getCodcar());
      $nphisasicaremp->setCodnom($clasemodelo->getCodnom());
      $nphisasicaremp->setCodcat($clasemodelo->getCodcat());
      $nphisasicaremp->setFecasi($clasemodelo->getFecasi());
      $nphisasicaremp->setNomemp($clasemodelo->getNomemp());
      $nphisasicaremp->setNomcar($clasemodelo->getNomcar());
      $nphisasicaremp->setNomnom($clasemodelo->getNomnom());
      $nphisasicaremp->setNomcat($clasemodelo->getNomcat());
      $nphisasicaremp->setUnieje(null);
      $nphisasicaremp->setSueldo($clasemodelo->getSueldo());
      $nphisasicaremp->setStatus($clasemodelo->getStatus());
      if ($clasemodelo->getMontonomina() != "") {
        $nphisasicaremp->setMontonomina($clasemodelo->getMontonomina());
      } else {
        $nphisasicaremp->setMontonomina(0);
      }
      $nphisasicaremp->save();
    }
    
    $clasemodelo->delete();
    return -1;
  }

/**
   * Función para manejar los filtros de búsqueda
   * de la lista
   *
   */
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasicarempPeer::CODEMP, '');
      $criterion->addOr($c->getNewCriterion(NpasicarempPeer::CODEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codemp']) && $this->filters['codemp'] !== '')
    {
      $c->add(NpasicarempPeer::CODEMP, strtr("%".$this->filters['codemp']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codnom_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasicarempPeer::CODNOM, '');
      $criterion->addOr($c->getNewCriterion(NpasicarempPeer::CODNOM, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codnom']) && $this->filters['codnom'] !== '')
    {
      $c->add(NpasicarempPeer::CODNOM, strtr("%".$this->filters['codnom']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasicarempPeer::NOMEMP, '');
      $criterion->addOr($c->getNewCriterion(NpasicarempPeer::NOMEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomemp']) && $this->filters['nomemp'] !== '')
    {
      $c->add(NpasicarempPeer::NOMEMP, strtr("%".$this->filters['nomemp']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codcar_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasicarempPeer::CODCAR, '');
      $criterion->addOr($c->getNewCriterion(NpasicarempPeer::CODCAR, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcar']) && $this->filters['codcar'] !== '')
    {
      $c->add(NpasicarempPeer::CODCAR, strtr("%".$this->filters['codcar']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codcen_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasicarempPeer::CODCEN, '');
      $criterion->addOr($c->getNewCriterion(NpasicarempPeer::CODCEN, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcen']) && $this->filters['codcen'] !== '')
    {
      $c->add(NpasicarempPeer::CODCEN, strtr("%".$this->filters['codcen']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codniv2_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasicarempPeer::CODNIV2, '');
      $criterion->addOr($c->getNewCriterion(NpasicarempPeer::CODNIV2, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codniv2']) && $this->filters['codniv2'] !== '')
    {
      $c->add(NphojintPeer::CODNIV, strtr("%".$this->filters['codniv2']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(NpasicarempPeer::CODEMP,  NphojintPeer::CODEMP);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['desniv_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasicarempPeer::DESNIV, '');
      $criterion->addOr($c->getNewCriterion(NpasicarempPeer::DESNIV, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desniv']) && $this->filters['desniv'] !== '')
    {
      $c->add(NpestorgPeer::DESNIV, strtr("%".$this->filters['desniv']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(NphojintPeer::CODNIV,  NpestorgPeer::CODNIV);
      $c->addJoin(NpasicarempPeer::CODEMP,  NphojintPeer::CODEMP);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codtipemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasicarempPeer::CODTIPEMP, '');
      $criterion->addOr($c->getNewCriterion(NpasicarempPeer::CODTIPEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codtipemp']) && $this->filters['codtipemp'] !== '')
    {
      $c->add(NphojintPeer::CODTIPEMP, strtr("%".$this->filters['codtipemp']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(NpasicarempPeer::CODEMP,  NphojintPeer::CODEMP);
      $c->setIgnoreCase(true);
    }
  }

}
