<?php

/**
 * hcexacon actions.
 *
 * @package    siga
 * @subpackage hcexacon
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class hcexaconActions extends autohcexaconActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


  }

  public function configGrid($codemp='')
  {
     $c= new Criteria();
     /*$c->add(NpinffamPeer::CODEMP,$codemp);
     $c->add(NpinffamPeer::STATUS,'I',Criteria::NOT_EQUAL);*/
     $sql="npinffam.codemp='".$codemp."' and npinffam.seghcm='S' and (npinffam.status<>'I' or npinffam.status='' or npinffam.status is null)";
     $c->add(NpinffamPeer::STATUS,$sql,Criteria::CUSTOM);
     $reg= NpinffamPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/hcexacon/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fam');

     $this->obj = $this->columnas[0]->getConfig($reg);

     $this->hcexacon->setObj($this->obj);

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $sw = true;
    $js="";

    switch ($ajax){
      case '1':
        $c=new Criteria();
        $c->add(NphojintPeer::CEDEMP,$codigo);
        $c->add(NphojintPeer::STAEMP,'A');
        $c->add(NphojintPeer::SEGHCM,'S');
        $res=NphojintPeer::doSelectOne($c);

        if($res){
            $c=new Criteria();
            $c->add(NpasicarempPeer::CODEMP,$res->getCodemp());
            $m =  NpasicarempPeer::doSelectOne($c);
            if($m){
                $this->hcexacon= $this->getHcexaconOrCreate();
                $this->configGrid($res->getCodemp());
                $output = '[["hcexacon_codemp","'.$m->getCodemp().'",""],["hcexacon_nomemp","'.$m->getNomemp().'",""],["hcexacon_nomnom","'.$m->getNomnom().'",""],["hcexacon_codttrab","'.$res->getCodtipemp().'",""],["hcexacon_cedfam","",""],["hcexacon_nomfam","",""],["hcexacon_parfam","",""],["javascript","'.$js.'",""]]';
            }else {
              $this->hcexacon= $this->getHcexaconOrCreate();
              $this->configGrid();
              $js="alert('El Empleado no tiene cargo asociado')";
            $output = '[["hcexacon_codemp","",""],["hcexacon_cedemp","",""],["hcexacon_nomemp","",""],["hcexacon_nomnom","",""],["hcexacon_codttrab","",""],["hcexacon_cedfam","",""],["hcexacon_nomfam","",""],["hcexacon_parfam","",""],["javascript","'.$js.'",""]]';
            }
        }else{
          $this->hcexacon= $this->getHcexaconOrCreate();
              $this->configGrid();
            $js="alert('El Empleado no se encuentra registrado ó no esta afiliado al HCM')";
            $output = '[["hcexacon_codemp","",""],["hcexacon_cedemp","",""],["hcexacon_nomemp","",""],["hcexacon_nomnom","",""],["hcexacon_codttrab","",""],["hcexacon_cedfam","",""],["hcexacon_nomfam","",""],["hcexacon_parfam","",""],["javascript","'.$js.'",""]]';
        }
        $sw=false;
        break;
      case '2':
        $misben = $this->getRequestParameter('misben');
        $cedemp = $this->getRequestParameter('cedemp');
        if ($misben=='true')
        {
          if ($codigo!=$cedemp)
          {
             $js="alert('El Beneficiario no es el mismo Titular')";
              $output = '[["hcexacon_cedfam","",""],["hcexacon_nomfam","",""],["hcexacon_parfam","",""],["javascript","'.$js.'",""]]';
          }else {
            $output = '[["javascript","'.$js.'",""]]';
          }
        }else {
          /*$c=new Criteria();
          $c->add(NphojintPeer::CEDEMP,$codigo);
          $m=NphojintPeer::doSelectOne($c);*/

          $c=new Criteria();
          $c->add(NpinffamPeer::CODEMP,$this->getRequestParameter('codemp'));
          $c->add(NpinffamPeer::CEDFAM,$codigo);
          $c->add(NpinffamPeer::SEGHCM,'S');
          $n =  NpinffamPeer::doSelectOne($c);
          /*if($m){
              $output = '[["hcexacon_cedfam","'.$m->getCedemp().'",""],["hcexacon_nomfam","'.$m->getNomemp().'",""],["hcexacon_parfam","TITULAR",""],["javascript","'.$js.'",""]]';
          }else*/ if($n){
              $c=new Criteria();
              $c->add(NptipparPeer::TIPPAR,$n->getParfam());
              $x =  NptipparPeer::doSelectOne($c);
              $output = '[["hcexacon_cedfam","'.$n->getCedfam().'",""],["hcexacon_nomfam","'.$n->getNomfam().'",""],["hcexacon_parfam","'.$x->getDespar().'",""],["javascript","'.$js.'",""]]';
          }else{
              $js="alert('El Beneficiario no se encuentra registrado')";
              $output = '[["hcexacon_cedfam","",""],["hcexacon_nomfam","",""],["hcexacon_parfam","",""],["javascript","'.$js.'",""]]';
          }
        }
        break;
      case '3':
        $c=new Criteria();
        $c->add(HcregmedlabPeer::CODMEDLAB,$codigo);
        $m =  HcregmedlabPeer::doSelectOne($c);
        if($m){
            $output = '[["hcexacon_nommedlab","'.$m->getNommedlab().'",""],["javascript","'.$js.'",""]]';
        }else{
            $js="alert('La Clinica no se encuentra registrada')";
            $output = '[["hcexacon_codmedlab","",""],["hcexacon_nommedlab","",""],["javascript","'.$js.'",""]]';
        }
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if($sw){
        return sfView::HEADER_ONLY;
    }
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

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    Hcm::grabarExaCon($clasemodelo);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
