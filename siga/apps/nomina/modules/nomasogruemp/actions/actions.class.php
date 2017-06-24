<?php

/**
 * nomasogruemp actions.
 *
 * @package    siga
 * @subpackage nomasogruemp
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomasogruempActions extends autonomasogruempActions
{
    
    private $empleado="";

  public function executeIndex()
  {
    return $this->forward('nomasogruemp', 'edit');
  }    
    
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid();
  }

  public function configGrid($arreglo=array())
  {
     if (count($arreglo)>0)
     {
         $i=0;
         while ($i<count($arreglo))
         {
           $npturemp2= new Npgruemp();
           $npturemp2->setCheck($arreglo[$i]["check"]);
           $npturemp2->setCodemp($arreglo[$i]["codemp"]);
           $npturemp2->setNomemp($arreglo[$i]["nomemp"]);
           $npturemp2->setCodcar($arreglo[$i]["codcar"]);
           $npturemp2->setNomcar($arreglo[$i]["nomcar"]);
           $det[]=$npturemp2;
           $i++;
         }
     }else {
         $c= new Criteria();
         $c->add(NpgruempPeer::CODGRU,'');
         $det= NpgruempPeer::doSelect($c);
     }
     
     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomasogruemp/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

     $this->obj =$this->columnas[0]->getConfig($det);

    $this->npgruemp->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $sw=true; $dato=""; $js="";

    switch ($ajax){
      case '1':
          $t= new Criteria();
          $t->add(NpgruposPeer::CODGRU,$codigo);
          $reg= NpgruposPeer::doSelectOne($t);
          if($reg)
          {
              $dato=$reg->getDesgru();
          }else {
              $js="alert('El Grupo no se encuentra definido'); $('npgruemp_codgru').value=''; $('npgruemp_codgru').focus();";
          }         
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':        
        $grupo = $this->getRequestParameter('grupo','');
        $sw=false;  $arreglo=array();
        $c= new Criteria();
        $c->add(NpnominaPeer::CODNOM,$codigo);
        $reg= NpnominaPeer::doSelectOne($c);
        if ($reg)
        {
            if ($grupo!='')
            {
                $dato=$reg->getNomnom();
                Nomina::buscarEmpleados($grupo,$codigo,$arreglo); 
            }else {
               $js="alert('Debe Seleccionar el Grupo'); $('npgruemp_codnom').value=''; $('npgruemp_codnom').focus();"; 
            }
        }else {
           $js="alert_('La N&oacute;mina no existe'); $('npgruemp_codnom').value=''; $('npgruemp_codnom').focus();"; 
        }
        $this->params=array();
        $this->npgruemp = $this->getNpgruempOrCreate();
        $this->updateNpgruempFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($arreglo);
        
        $output = '[["javascript","'.$js.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
        break;    
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw) return sfView::HEADER_ONLY;

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
        
       $this->npgruemp = $this->getNpgruempOrCreate();
        $this->updateNpgruempFromRequest();
        
        $this->configGrid();

       $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
       
       $i=0;
       $x=$grid[0];
       while ($i<count($x))
       {
         if ($x[$i]->getCheck()=='1') {
         $l= new Criteria();
         $l->add(NpgruempPeer::CODEMP,$x[$i]->getCodemp());
         $result=  NpgruempPeer::doSelect($l);
         if ($result)
         {
             foreach ($result as $objre)
             {
                 if ($this->npgruemp->getCodgru()!=$objre->getCodgru())
                 {
                     $this->coderr=4410;
                     $this->empleado=' Empleado: '.$x[$i]->getCodemp().' Grupo: '.$objre->getCodgru();
                     break;
                 }
             }
         }
         }
           $i++;
       }

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;

  }
  
  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   *
   */
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->npgruemp = $this->getNpgruempOrCreate();
    $this->updateNpgruempFromRequest();
	$this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err.$this->empleado);
      }
    }
    return sfView::SUCCESS;
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
    Nomina::salvarGruposEmpleados($clasemodelo,$grid);
    return -1;
  }

}
