<?php

/**
 * viasolbolaereo actions.
 *
 * @package    siga
 * @subpackage viasolbolaereo
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class viasolbolaereoActions extends autoviasolbolaereoActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
   $this->configGrid($this->viasolbolaer->getNumsol());

  }

  public function configGrid($numsol='')
  {
    $c = new Criteria();
    $c->add(ViadetsolbolaerPeer :: NUMSOL, $numsol);
    $result = ViadetsolbolaerPeer :: doSelect($c);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/viasolbolaereo/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_personas');
    
    $this->obj = $this->columnas[0]->getConfig($result);

    $this->viasolbolaer->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js="";

    switch ($ajax){
      case '1':
        $q= new Criteria();
        $q->add(CadefdirecPeer::CODDIREC,$codigo);
        $reg= CadefdirecPeer::doSelectOne($q);
        if ($reg)
           $dato=$reg->getDesdirec();                     
        else
           $js="alert_('La Direcci&oacute;n no existe'); $('viasolbolaer_coddirec').value=''; $('viasolbolaer_coddirec').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
        $p= new Criteria();
        $p->add(CpeveprePeer::CODEVE,$codigo);
        $result= CpeveprePeer::doSelectOne($p);
        if ($result)
          $dato=$result->getDeseve();
        else
          $js="alert('El Evento no existe'); $('viasolbolaer_codeve').value=''; $('viasolbolaer_codeve').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
        $p= new Criteria();
        $p->add(NpestorgPeer::CODNIV,$codigo);
        $result= NpestorgPeer::doSelectOne($p);
        if ($result)
          $dato=$result->getDesniv();
        else
          $js="alert('La Unidad Solicitante no existe'); $('viasolbolaer_codniv').value=''; $('viasolbolaer_codniv').focus();";

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
        $this->viasolbolaer = $this->getViasolbolaerOrCreate();
        $this->updateViasolbolaerFromRequest();

        if ($this->viasolbolaer->getIdavue()=='V') //Ida y Vuelta
        {
          if ($this->viasolbolaer->getFecreg()==''){
            $this->coderr=1625;
            return false;
          }
          if ($this->viasolbolaer->getFecsal()>$this->viasolbolaer->getFecreg()){
            $this->coderr=1626;
            return false;
          }
        }

        $novalevedir=H::getConfApp2('novalevedir', 'viaticos', 'viasolbolaereo');
        if ($novalevedir!='S'){
          if ($this->viasolbolaer->getCoddirec()==''){
            $this->coderr=1631;
            return false;
          }
          if ($this->viasolbolaer->getCodeve()==''){
            $this->coderr=1632;
            return false;
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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    if ($clasemodelo->getId())
      $clasemodelo->save();
    else {
      $tienecorrelativo = false;
      if (Herramientas::getVerCorrelativo('corsolbol', 'viadefgen', $r)) {
        if ($clasemodelo->getNumsol() == '########') {
          $tienecorrelativo = true;
          $encontrado = false;
          while (!$encontrado) {
            $numero = str_pad($r, 8, '0', STR_PAD_LEFT);

            $sql = "select numsol from viasolbolaer where numsol='" . $numero . "'";
            if (Herramientas::BuscarDatos($sql, $result)) {
              $r = $r + 1;
            } else {
              $encontrado = true;
            }
          }          
          $clasemodelo->setNumsol($numero);
        }
     }
    $clasemodelo->setLogusu(sfContext::getInstance()->getUser()->getAttribute('loguse'));
    $clasemodelo->save();
    if ($tienecorrelativo)
      Herramientas::getSalvarCorrelativo('corsolbol', 'viadefgen', 'Solicitud de Boleto Áereo', $r, $msg);    
    }
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Viaticos::salvarGridPersonasSolBol($clasemodelo,$grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    if ($clasemodelo->getNumsolvi()!='') {
      $q= new Criteria();
      $q->add(ViasolviatraPeer::NUMSOL,$clasemodelo->getNumsolvi());
      $regq= ViasolviatraPeer::doSelectOne($q);
      if ($regq){
        if ($regq->getStatus()=='N'){
          Herramientas::EliminarRegistro('viadetsolbolaer','Numsol',$clasemodelo->getNumsol());
          return parent::deleting($clasemodelo);
        }else {
          return 1620;
        }
      }else {
         Herramientas::EliminarRegistro('viadetsolbolaer','Numsol',$clasemodelo->getNumsol());
         return parent::deleting($clasemodelo);
      }
    }
    else {
      Herramientas::EliminarRegistro('viadetsolbolaer','Numsol',$clasemodelo->getNumsol());
      return parent::deleting($clasemodelo);
    }
  }

   /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerÃ¡ el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $idfila = $this->getRequestParameter('this[id]', '');    
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";

    switch ($col) {
          case '1':
            if (Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
            {
               $grid[$fila][$col-1]="";
               $grid[$fila][1]="";
               $javascript="alert('El Pasajero esta Repetido'); $('$idfila').focus()";
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


}
