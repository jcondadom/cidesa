<?php

/**
 * ingasipar actions.
 *
 * @package    siga
 * @subpackage ingasipar
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class ingasiparActions extends autoingasiparActions
{
   public function executeIndex(){
      return $this->redirect('ingasipar/edit');
   }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->Longitudes($LonCat,$LonPar);
      $this->setVars($LonCat);
      $this->configGrid(array(),$LonCat,$LonPar);

  }

  public function Longitudes(&$LonCat,&$LonPar){

  $LonCat=0;
  $LonPar=0;
  $regs = CinivelesPeer::doSelect(new Criteria());
  if($regs){
    foreach ($regs as $datos){
      if($datos->getCatpar()=='C'){
        $LonCat+=$datos->getLonniv() + 1;
      }else{
        if($datos->getCatpar()=='P'){
          $LonPar+=$datos->getLonniv() + 1;
        }
      }
    }
  }
}

  public function configGrid($reg,$LonPar,$LonCat){

     $this->obj = H::getConfigGrid('grid_cideftit_edit',$reg);
     $params=$this->params;
     $params['grid'] = $this->obj;
     $this->params =$params;

  }

  public function executeAjax(){

    $codpre = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
  $reg=array(); $js="";
    switch ($ajax){
      case '1':
        $this->cideftit = $this->getCideftitOrCreate();
        $this->updateCideftitFromRequest();
      $this->Longitudes($LonCat,$LonPar);
        $this->setVars($LonCat);
      if (strlen($codpre)==($LonCat-1)){
      $sql= "select substr(codpre,($LonCat+1),($LonPar - 1)) as codpre, nompre  from cideftit where length(rtrim(codpre))=($LonCat + $LonPar - 1) and substr(codpre,1,($LonCat - 1))=trim('$codpre') order by codpre";
      if(H::BuscarDatos($sql,$regs)){
        $sqlgrip="select id, substr(codpre,($LonCat+1),($LonPar - 1)) as codpre, nompre  from cideftit where length(rtrim(codpre))=($LonCat + $LonPar - 1) and substr(codpre,1,($LonCat - 1))=trim('$codpre') order by codpre";
        H::BuscarDatos($sqlgrip,$reg);
      }
      }else{
        $js="alert_('La Categoria Presupuestaria no es de &Uacute;ltimo Nivel'); $('cideftit_codpre').value=''; $('cideftit_codpre').focus();";
      }
        $this->configGrid($reg,$LonCat,$LonPar);
        $nompre = H::getX_vacio('Codcat','cicatpre','nomcat',$codpre);

        $output = '[["cideftit_codpre","'.$codpre.'",""],["cideftit_nompre","'.$nompre.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
        default:
        $output = '[["","",""],["","",""],["","",""]]';
       case '2':
          $nompre = H::getX_vacio('Codcat','cicatpre','nomcat',$codpre);
          if ($nompre==''){
            $error=H::obtenerMensajeError(1325);
             $js="alert('$error'); $('cideftit_codigo11').value=''; $('cideftit_codigo11').focus();";
          }else {
            $this->Longitudes($LonCat,$LonPar);
            $this->setVars($LonCat);
          if (strlen($codpre)==($LonCat-1)){
          $sql= "select substr(codpre,($LonCat+1),($LonPar - 1)) as codpre, nompre  from cideftit where length(rtrim(codpre))=($LonCat + $LonPar - 1) and substr(codpre,1,($LonCat - 1))=trim('$codpre') order by codpre";
          if(H::BuscarDatos($sql,$regs)){
            $sqlgrip="select id, substr(codpre,($LonCat+1),($LonPar - 1)) as codpre, nompre  from cideftit where length(rtrim(codpre))=($LonCat + $LonPar - 1) and substr(codpre,1,($LonCat - 1))=trim('$codpre') order by codpre";
            H::BuscarDatos($sqlgrip,$reg);
          }
          }else{
            $js="alert_('La Categoria Presupuestaria no es de &Uacute;ltimo Nivel'); $('cideftit_codigo11').value=''; $('cideftit_codigo11').focus();";
          }
          }

      $output = '[["cideftit_nombre1","'.$nompre.'",""],["javascript","'.$js.'",""],["","",""]]';
      break;
          
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
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
    $this->configGrid(array(),'','');
    $grid = Herramientas::CargarDatosGrid($this,$this->obj);
    $this->Longitudes($LonCat,$LonPar);
    $this->setVars($LonCat);
    $this->configGrid(array(),$LonCat,$LonPar);

  }

 public function saving($cideftit){
  $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    return Ingresos::salvarIngasipar($cideftit,$grid);
  }

    public function setVars($LonCat){
      $params = $this->params;
      $params[0] =$LonCat;
      $this->params =$params;

  }


}
