<?php

/**
 * viasoltransterre actions.
 *
 * @package    siga
 * @subpackage viasoltransterre
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class viasoltransterreActions extends autoviasoltransterreActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
   $this->configGrid($this->viasoltraterre->getNumsol());

  }

  public function configGrid($numsol='')
  {
    $c = new Criteria();
    $c->add(ViarutsoltranPeer :: NUMSOL, $numsol);
    $c->addAscendingOrderByColumn(ViarutsoltranPeer::DIA);
    $c->addAscendingOrderByColumn(ViarutsoltranPeer::MES);
    $result = ViarutsoltranPeer :: doSelect($c);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/viasoltransterre/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_rutas');
    
    $this->obj = $this->columnas[0]->getConfig($result);

    $this->viasoltraterre->setObj($this->obj);
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
           $js="alert_('La Direcci&oacute;n no existe'); $('viasoltraterre_coddirec').value=''; $('viasoltraterre_coddirec').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
        $p= new Criteria();
        $p->add(CpeveprePeer::CODEVE,$codigo);
        $result= CpeveprePeer::doSelectOne($p);
        if ($result)
          $dato=$result->getDeseve();
        else
          $js="alert('El Evento no existe'); $('viasoltraterre_codeve').value=''; $('viasoltraterre_codeve').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
        $p= new Criteria();
        $p->add(NpestorgPeer::CODNIV,$codigo);
        $result= NpestorgPeer::doSelectOne($p);
        if ($result)
          $dato=$result->getDesniv();
        else
          $js="alert('La Unidad Solicitante no existe'); $('viasoltraterre_codniv').value=''; $('viasoltraterre_codniv').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;  
      case '4':
        $esnoemp=$this->getRequestParameter('esnoemp');
        $telemp="";
        $c = new Criteria();
        if($esnoemp=='true'){
            $c->add(VianoempPeer::RIFNEMP,$codigo);
            $per = VianoempPeer::doSelectOne($c);
            if($per){
              $dato = $per->getNomnemp();
              $telemp= $per->getTelnemp();           
            }else $js="alert('El Usuario no existe'); $('viasoltraterre_codempusu').value=''; $('viasoltraterre_nomemp').value=''; $('viasoltraterre_codempusu').focus();";

        }else{
            $c->add(NphojintPeer::CODEMP,$codigo);
            $per = NphojintPeer::doSelectOne($c);
            if($per)
            {
               $dato = $per->getNomemp();
               $telemp= $per->getCelemp();         
            }else $js="alert('El Usuario no existe'); $('viasoltraterre_codempusu').value=''; $('viasoltraterre_nomemp').value=''; $('viasoltraterre_codempusu').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["viasoltraterre_telempusu","'.$telemp.'",""],["javascript","'.$js.'",""],["","",""]]';
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
      $this->viasoltraterre = $this->getViasoltraterreOrCreate();
        $this->updateViasoltraterreFromRequest();

       $novalevedir=H::getConfApp2('novalevedir', 'viaticos', 'viasoltransterre');
        if ($novalevedir!='S'){
          if ($this->viasoltraterre->getCoddirec()==''){
            $this->coderr=1631;
            return false;
          }
          if ($this->viasoltraterre->getCodeve()==''){
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
      if (Herramientas::getVerCorrelativo('corsoltra', 'viadefgen', $r)) {
        if ($clasemodelo->getNumsol() == '########') {
          $tienecorrelativo = true;
          $encontrado = false;
          while (!$encontrado) {
            $numero = str_pad($r, 8, '0', STR_PAD_LEFT);

            $sql = "select numsol from viasoltraterre where numsol='" . $numero . "'";
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
      Herramientas::getSalvarCorrelativo('corsoltra', 'viadefgen', 'Solicitud de Transporte Terrestre', $r, $msg);    
    }
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Viaticos::salvarGridRutasSolTra($clasemodelo,$grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    if ($clasemodelo->getNumsolvi()!='')
      return 1621;
    else {
      Herramientas::EliminarRegistro('Viarutsoltran','Numsol',$clasemodelo->getNumsol());
      return parent::deleting($clasemodelo);
    }
  }


}
