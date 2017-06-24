<?php

/**
 * nomasonomcptgru actions.
 *
 * @package    siga
 * @subpackage nomasonomcptgru
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomasonomcptgruActions extends autonomasonomcptgruActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid($this->npgrucon->getCodgrucpt());

  }

      public function configGrid($codgrucpt = '') {
        
        $c = new Criteria();
        $c->add(NpasonomcptgruPeer::CODGRUCPT, $codgrucpt);
        $reg = NpasonomcptgruPeer :: doSelect($c);
        

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomasonomcptgru/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detalle');
        
        $params = array('param1' => "'+$(this.id).up().previous(1).descendants()[0].value+'",'val2');
        $this->columnas[1][2]->setCatalogo('npdefcpt', 'sf_admin_edit_form', array('Codcon' => 3, 'Nomcon' => 4), 'Npdefcpt_Vacdefgen', $params);
        
        $this->obj = $this->columnas[0]->getConfig($reg);

        $this->npgrucon->setObj($this->obj);
    }    

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

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
        
        $this->npgrucon = $this->getNpgruconOrCreate();
      $this->updateNpgruconFromRequest();
      $this->configGrid();	  
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	  
      if(count($grid[0])==0)
      {
            $this->coderr=4;
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
    Nomina::salvarGruposConceptos($clasemodelo,$grid);
    return -1;
  }

    /**
   * FunciÃ³n para procesar _todas_ las funciones Ajax del formulario
   * Cada funciÃ³n esta identificada con el valor de la vista "ajax"
   * el cual traerÃ¡ el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra=""; $com='';

    switch ($col) {
          case '1':              
                 $w= new Criteria();
                 $w->add(NpnominaPeer::CODNOM,$grid[$fila][$col-1]);
                 $reg= NpnominaPeer::doSelectOne($w);
                 if ($reg)
                 {                    
                    $grid[$fila][1]=$reg->getNomnom();                       
                 }else {
                    $grid[$fila][$col-1]="";
                    $grid[$fila][1]="";
                    $javascript="alert_('La N&oacute;mina no existe');";
                 }                                   
            $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
            break;
          case '3':
              if (!Hacienda::Repetido2($grid,$grid[$fila][$col-1].'-'.$grid[$fila][$col-3],$fila,$col-1,$col-3))
              {
                 $w= new Criteria();
                 $w->add(NpdefcptPeer::CODCON,$grid[$fila][$col-1]);
                 $reg= NpdefcptPeer::doSelectOne($w);
                 if ($reg)
                 {
                    $q= new Criteria();
                    $q->add(NpasiconnomPeer::CODNOM,$grid[$fila][$col-3]);
                    $q->add(NpasiconnomPeer::CODCON,$grid[$fila][$col-1]);
                    $result = NpasiconnomPeer::doSelectOne($q);
                    if ($result)
                    {
                       $grid[$fila][3]=$reg->getNomcon();   
                    }else {
                         $grid[$fila][$col-1]="";
                         $grid[$fila][3]="";
                         $javascript="alert_('El Concepto no esta Asociado a esa N&oacute;mina');";
                    }
                 }else {
                     $grid[$fila][$col-1]="";
                     $grid[$fila][3]="";
                     $javascript="alert('El Concepto no existe');";
                 }                     
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][3]="";
                 $javascript="alert('El Concepto esta Repetido');";
              }
            $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
            break;            
          default:
            break;
        }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }  


}
