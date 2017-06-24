<?php

/**
 * hcrevcie actions.
 *
 * @package    siga
 * @subpackage hcrevcie
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class hcrevcieActions extends autohcrevcieActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid($fecdes = " ", $fechas = " ")
  {
    $res=array();
    $reembolsos=array();

    if($fecdes!=" " && $fechas!=" "){
        $sql = "select
                    codcie, codemp,
                    sum(monliq) as total, tipliq, stacie
                from
                    hcliqree
                where
                        fecliq >= '".$fecdes."'
                        and fecliq <= '".$fechas."'
                        --and status = 'S'
                        --and stacie = 'S'
                group by
                        codcie, codemp, tipliq, stacie
                order by
                        codcie";
        if (Herramientas::BuscarDatos($sql,$result)){
            $i=0;
            while ($i<count($result)){
                $c = new Criteria();
                $c->add(NphojintPeer::CODEMP,$result[$i]["codemp"]);
                $z = NphojintPeer::doSelectOne($c);
                
                $c = new Criteria();
                $c->add(NpasicarempPeer::CODEMP,$result[$i]["codemp"]);
                $x = NpasicarempPeer::doSelectOne($c);
                
                $hccieree = new Hccieree();
                $hccieree->setCodcie($result[$i]["codcie"]);
                $hccieree->setCodemp($z->getCodemp());
                $hccieree->setNomemp($z->getNomemp());
                $hccieree->setCedemp($z->getCedemp());
                $hccieree->setNomnom($x->getNomnom());
                $hccieree->setNomcar($x->getNomcar());
                $hccieree->setCodttrab($z->getCodtipemp());
                $hccieree->setMoncie($result[$i]["total"]);
                $hccieree->setCodcar($x->getCodcar());
                if ($result[$i]["tipliq"]=='O')
                  $hccieree->setDestipliq("Odontológicos");
                else
                  $hccieree->setDestipliq("Medicinas");
                $hccieree->setTipliq($result[$i]["tipliq"]);
                $reembolsos[]=$hccieree;
                $i++;
            }
        }
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/hcrevcie/'.sfConfig::get('sf_app_module_config_dir_name').'/gridr');
    $this->obj = $this->columnas[0]->getConfig($reembolsos);
    $params['gridr'] = $this->obj;
    $this->params = $params;
  }

  public function executeAjax()
  {
        $ajax = $this->getRequestParameter('ajax','');
        $this->fecdes = $this->getRequestParameter('fecdes','');
        $this->fechas = $this->getRequestParameter('fechas','');
        $sw = false;
        $js="";

        switch ($ajax){
          case '1':
            if($this->fecdes!='' && $this->fechas!=''){
                $dateFormat = new sfDateFormat('es_VE');
                $fecdes = $dateFormat->format($this->getRequestParameter('fecdes',''), 'i', $dateFormat->getInputPattern('d'));
                $dateFormat = new sfDateFormat('es_VE');
                $fechas = $dateFormat->format($this->getRequestParameter('fechas',''), 'i', $dateFormat->getInputPattern('d'));
                if($this->fecdes<=$this->fechas){
                    $this->params=array();
                    $this->configGrid($this->fecdes, $this->fechas);
                    $output = '[["","",""],["","",""],["","",""]]';
                }else{
                    $js="alert('El Rango de las fechas es incorrecto')";
                    $output = '[["hcrevcie_fecdes","",""],["hcrevcie_fechas","",""],["javascript","'.$js.'",""]]';
                }
            }else{
                $this->params=array();
                $this->configGrid();
                $output = '[["","",""],["","",""],["","",""]]';
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
    $this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this, $this->params['gridr']);

    Hcm::reversarReembolso($clasemodelo,$grid);

    return -1;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

  public function executeList()
  {
    $this->forward('hcrevcie', 'create');
  }

}
