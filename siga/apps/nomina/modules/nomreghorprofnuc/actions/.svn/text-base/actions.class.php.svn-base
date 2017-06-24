<?php

/**
 * nomreghorprofnuc actions.
 *
 * @package    siga
 * @subpackage nomreghorprofnuc
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomreghorprofnucActions extends autonomreghorprofnucActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid($this->npemphor->getCodemp());
    if (!$this->npemphor->getId())
      $this->npemphor->setFecreg(date('Y-m-d'));

  }

  /**
   * Esta funciÃ³n permite definir la configuraciÃ³n del grid de datos
   * que contiene el formulario. Esta funciÃ³n debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codemp='')
  {
    $detalle=array();
    if (!$this->npemphor->getId())
    {
      $n= new Criteria();
      $n->add(NpasonucempPeer::CODEMP,$codemp);
      $resultados= NpasonucempPeer::doSelect($n);
      if ($resultados)
      {
        foreach ($resultados as $obj) {
          $npempnuc= new Npempnuc();
          $npempnuc->setCodniv($obj->getCodniv());
          $detalle[]=$npempnuc;
        }
      }
    }else {
      $c = new Criteria();
      $c->add(NpempnucPeer::CODEMP,$codemp);
      $detalle = NpempnucPeer::doSelect($c);
    }


    //$mascara = Herramientas::ObtenerFormato('Npdefgen', 'Fororg');
    //$lonniv = strlen($mascara);
    
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomreghorprofnuc/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');


    /*$obj= array('codniv' => 1, 'desniv' => 2);
    $params= array('param1' => $lonniv, 'param2' => "'+$('npemphor_codemp').value+'", 'val2');

    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonniv.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][0]->setCatalogo('npestorg','sf_admin_edit_form',$obj,'Npestorg_Nomreghorprofnuc',$params);
*/
    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->npemphor->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js=""; $sw=true;

    switch ($ajax){
     case '1':
        $sw=false;
        $l= new Criteria();
        $l->add(NphojintPeer::CODEMP,$codigo);
        $reg= NphojintPeer::doSelectOne($l);
        if ($reg)
        {
           if ($reg->getStaemp()!='R')
            {
               $dato=$reg->getNomemp();
            }else {
              $codigo='';
              $js="alert('El Empleado se encuentra Retirado'); $('npemphor_codemp').value=''; $('npemphor_codemp').focus();";
            }
            
        }else{
          $codigo='';
          $js="alert('El Empleado no existe'); $('npemphor_codemp').value=''; $('npemphor_codemp').focus();";
        }
        $this->params=array();
        $this->npemphor = $this->getNpemphorOrCreate();
        $this->updateNpemphorFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($codigo);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
        $c = new Criteria();
        $c->add(NpcargosPeer::CODCAR,$codigo);
        $c->add(NpasicarempPeer::CODEMP,$this->getRequestParameter('empleado'));
        $c->addJoin(NpcargosPeer::CODCAR,NpasicarempPeer::CODCAR);
        $npcargos = NpcargosPeer::doSelectOne($c);
        if($npcargos){
          $dato=$npcargos->getNomcar();         
        }else{
           $js="alert_('El Cargo no existe &oacute; no esta asignado a este empleado'); $('npemphor_codcar').value=''; $('npemphor_codcar').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '3':
        $l= new Criteria();
        $l->add(NpdefcptPeer::CODCON,$codigo);
        $reg= NpdefcptPeer::doSelectOne($l);
        if ($reg)
        {
          $dato=$reg->getNomcon(); 
        }else{
           $js="alert_('El Concepto no existe'); $('npemphor_codcon').value=''; $('npemphor_codcon').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;      
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if ($sw) return sfView::HEADER_ONLY;
  }

public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra=""; $com='';

    switch ($name) {
          case 'a': 
              switch ($col) {
                  case '1': 
                    if ($grid[$fila][$col-1]!="")
                    {
                     if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
                     {
                         $lonniv = strlen(H::ObtenerFormato('Npdefgen', 'Fororg'));
                         if (strlen($grid[$fila][$col-1])==$lonniv)
                         {    
                            $c = new Criteria();                            
                            $c->add(NpestorgPeer::CODNIV,$grid[$fila][$col-1]);                            
                            $alm = NpestorgPeer::doSelectOne($c);
                             if ($alm)
                             {
                                $grid[$fila][1]=$alm->getDesniv();                       
                             }else {
                                $grid[$fila][$col-1]="";
                                $grid[$fila][1]="";
                                $javascript="alert_('La Ubicaci&oacute;n no esta asociada a este almac&eacute;n');";
                             }
                         }else {
                            $grid[$fila][$col-1]="";
                            $grid[$fila][1]="";
                            $javascript="alert_('La Ubicaci&oacute;n no es de &uacute;ltimo nivel');";
                         }
                     }else {
                        $grid[$fila][$col-1]="";
                        $grid[$fila][1]="";
                        $javascript="alert_('La Ubicaci&oacute;n esta repetida');";
                     }
                    $jsonextra = ',["javascript","' . $javascript . '",""]';
                    }                        
                    break;    
                default:
                    break;
              }
            break;              
          default:
            break;
        }

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
      $this->npemphor = $this->getNpemphorOrCreate();
      $this->updateNpemphorFromRequest();

      if (!$this->npemphor->getId()) {

        $q= new Criteria();
        $q->add(NpemphorPeer::CODEMP,$this->getRequestParameter('npemphor[codemp]'));
        $q->add(NpemphorPeer::CODCAR,$this->getRequestParameter('npemphor[codcar]'));
        $q->add(NpemphorPeer::CODCON,$this->getRequestParameter('npemphor[codcon]'));
        $result= NpemphorPeer::doSelectOne($q);
        if ($result)
          $this->coderr=2406;
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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Nomina::salvarHorasEmpNucleo($clasemodelo, $grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    //Actualizo en Npasiconemp
    $q= new Criteria();
    $q->add(NpasiconempPeer::CODEMP,$clasemodelo->getCodemp());
    $q->add(NpasiconempPeer::CODCAR,$clasemodelo->getCodcar());
    $q->add(NpasiconempPeer::CODCON,$clasemodelo->getCodcon());
    $result= NpasiconempPeer::doSelectOne($q);
    if ($result)
    {
      $result->setCantidad(0);
      $result->save();
    }
    H::EliminarRegistro('Npempnuc','CODEMP',$clasemodelo->getCodemp());
    return parent::deleting($clasemodelo);
  }


}
