<?php

/**
 * nomgentxtcestatic actions.
 *
 * @package    siga
 * @subpackage nomgentxtcestatic
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomgentxtcestaticActions extends autonomgentxtcestaticActions
{
  private $dir="";

  public function executeIndex()
  {
    return $this->forward('nomgentxtcestatic', 'edit');
  }


  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->empresa->setDireccion($this->getRequestParameter('direc')); 
     $this->configGrid();     
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {	  
    $this->params=array();
    $this->empresa = $this->getEmpresaOrCreate();
	
    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateEmpresaFromRequest();

      if($this->saveEmpresa($this->empresa) ==-1){
        {$this->setFlash('notice', 'El Archivo Txt ha sido generado Satisfactoriamente.');

         $id= $this->empresa->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('nomgentxtcestatic/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('nomgentxtcestatic/list');
        }
        else
        {
            return $this->redirect('nomgentxtcestatic/edit?direc='.$this->dir);
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

  public function configGrid($codnomesp='', $tiptxt='', $fecnom='')
  {	 
    $per=array();
    if ($tiptxt=='R' || $tiptxt=='D') {
     //$codcon=H::getX_vacio('CODNOM','Npcestatickets','Codcon',$codnom);	 
	 //$codnomesp = '013';
     $c= new Criteria();
     //$c->add(NphisconPeer::CODNOM,$codnom);
     $c->add(NphisconPeer::CODNOMESP,$codnomesp);
	 //$c->add(NphisconPeer::FECNOM,$fecnom);
     //$c->add(NphisconPeer::CODCON,$codcon);
     $per2= NphisconPeer::doSelect($c);
     if  ($per2){
      foreach ($per2 as $objde) {
        $npasi= new Npasicaremp();		
        $npasi->setCodemp($objde->getCodemp());
        $npasi->setNomemp(H::getX_vacio('CODEMP','Nphojint','Nomemp',$objde->getCodemp()));
        $npasi->setMontra(H::FormatoMonto($objde->getMonto()));
        $per[]=$npasi;
      }
     }
   }else
   {	   
     $c= new Criteria();
	 //$c->add(NpasicarempPeer::CODNOM,$codnom);
     $c->add(NpasicarempPeer::STATUS,'E');
	 $c->add(NpasicarempPeer::STATUS,'V');
     $per= NpasicarempPeer::doSelect($c);
	  foreach ($per as $objde) 
	  {
        $npasi= new Npasicaremp();		
        $npasi->setCodemp($objde->getCodemp());
        $npasi->setNomemp(H::getX_vacio('CODEMP','Nphojint','Nomemp',$objde->getCodemp()));
        //$npasi->setMontra(H::FormatoMonto($objde->getMonto()));
        $per[]=$npasi;
      }
   }

     //$this->filas=count($per);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomgentxtcestatic/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
     
     $this->columnas[1][0]->setHTML('onClick="totalmarcadas(this.id)"');
     $this->columnas[1][3]->setCombo(array('Celular' => 'Celular', 'Casa' => 'Casa', 'Oficina' => 'Oficina'));
     if ($tiptxt=='Q')
       $this->columnas[1][5]->setCombo(array('01'=> 'Bloqueo por fraude', '02' => 'Bloqueo por Robo', '04' => 'Cliente no la Desea', '05' => 'Cliente Ilocalizable', '09' => 'Bloqueo Preven. Tarj.Transito', '10' => 'Bloq. Definitivo Clte. Difunto', '11' => 'Bloq.Preventivo Solic. Cliente', '13' => ' Tarj. Reportada Por Extravio', '19' => 'Bloqueo Por Deterioro'));
     else
       $this->columnas[1][5]->setCombo(array('CA'=> 'Cancelación', 'RE' => 'Retención', '06' => 'Defunción', '07' => 'Cuenta Inoperante'));
     $this->columnas[1][6]->setCombo(array('1' => 'Bolsillo Empleado (Nomina, Misiones)', '2' => 'Bolsillo Encapsulado (Cesta Ticket, Bono Alimentación)', '3' => 'Bolsillo Patrón (Caja Chica, Viaticos)'));
     if ($tiptxt=='B' || $tiptxt=='T'){
       $this->columnas[1][4]->setOculta(true);
       //$this->columnas[1][5]->setOculta(false);           
       $this->columnas[1][3]->setOculta(true);
     }else if ($tiptxt=='R' || $tiptxt=='D') {
        $this->columnas[1][6]->setOculta(true);
        $this->columnas[1][7]->setHTML('onBlur="recalcular()"');
        $this->columnas[1][7]->setOculta(false); 
        $this->columnas[1][3]->setOculta(true); 
     }else if ($tiptxt=='E'){
       $this->columnas[1][4]->setOculta(false);
       $this->columnas[1][5]->setOculta(true);           
       $this->columnas[1][3]->setOculta(true); 
     }else if ($tiptxt=='Q'){    
       $this->columnas[1][5]->setTitulo('Motivo');  
       $this->columnas[1][5]->setOculta(false);
        $this->columnas[1][3]->setOculta(true);           
     }

     $this->obj =$this->columnas[0]->getConfig($per);
     $this->empresa->setObj($this->obj);     

  }
  
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js="";

    switch ($ajax){
      case '1':
        $tiptxt = $this->getRequestParameter('tiptxt','');
        $c= new Criteria();
        $c->add(NpnomesptiposPeer::CODNOMESP,$codigo);
        $reg= NpnomesptiposPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getDesnomesp();
        }else {
          $codigo="";
          $js="alert_('La N&oacute;mina no esta registrada'); $('empresa_codnom').value=''; $('empresa_nomnom').value=''; $('empresa_codnom').focus();";
        }
        $this->params=array();
        $this->empresa = $this->getEmpresaOrCreate();
        $this->labels = $this->getLabels();

        $fecnom = $this->getRequestParameter('fecnom','');		
        $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($fecnom, 'i', $dateFormat->getInputPattern('d'));

        $this->configGrid($codigo,$tiptxt,$fec);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    //return sfView::HEADER_ONLY;

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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {	
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);	
    $this->dir=NominaConceptos::generarTxtCestatickets($clasemodelo,$grid);

    return -1;
  }
}
