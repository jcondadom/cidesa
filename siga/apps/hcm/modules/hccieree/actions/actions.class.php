<?php

/**
 * hccieree actions.
 *
 * @package    siga
 * @subpackage hccieree
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class hcciereeActions extends autohcciereeActions
{
private $trab="";
private $coderror =-1;
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid($fecdes = " ", $fechas = " ")
  {
    $res=array();
    $t=0;
    $reembolsos=array();

    if($fecdes!=" " && $fechas!=" "){
        $sql = "select
                    codemp,
                    sum(monliq) as total, tipliq, fecliq, stacie
                from
                    hcliqree
                where
                        fecliq >= '".$fecdes."'
                        and fecliq <= '".$fechas."'
                        and status = 'S'
                        and stacie = 'N'
                group by
                        codemp, tipliq, fecliq, stacie
                order by
                        codemp";
        if (Herramientas::BuscarDatos($sql,$result)){
            $i=0;

            while ($i<count($result)){
                $c = new Criteria();
                $c->add(NphojintPeer::CODEMP,$result[$i]["codemp"]);
                $z = NphojintPeer::doSelectOne($c);
                if ($z) {
                
                $c = new Criteria();
                $c->add(NpasicarempPeer::CODEMP,$result[$i]["codemp"]);
                $c->add(NpasicarempPeer::STATUS,'V');
                $x = NpasicarempPeer::doSelectOne($c);
                if ($x) {
                
                $hccieree = new Hccieree();                
                /*if ($result[$i]["stacie"]=='S')
                  $hccieree->setCheck(true);
                if ($result[$i]["stacie"]=='N')
                  $hccieree->setCheck2(true);*/
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
                elseif ($result[$i]["tipliq"]=='M')
                  $hccieree->setDestipliq("Medicinas");
                elseif ($result[$i]["tipliq"]=='D')
                  $hccieree->setDestipliq("Reparo Médico");
                elseif ($result[$i]["tipliq"]=='G')
                  $hccieree->setDestipliq("Reparo Odontológico");
                $hccieree->setTipliq($result[$i]["tipliq"]);
                $hccieree->setFecliq($result[$i]["fecliq"]);
                $reembolsos[]=$hccieree;
              }
              }else {
                $t++;
                print $result[$i]["codemp"].', '; 
              }
                $i++;
              }
            }
        }
        //print $t;
    //exit;




    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/hccieree/'.sfConfig::get('sf_app_module_config_dir_name').'/gridr');
    $this->obj = $this->columnas[0]->getConfig($reembolsos);
    $params['gridr'] = $this->obj;
    $this->params = $params;
  }


/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->hccieree = $this->getHcciereeOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateHcciereeFromRequest();

      if($this->saveHccieree($this->hccieree) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->hccieree->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('hccieree/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('hccieree/list');
        }
        else
        {
            return $this->redirect('hccieree/edit?id='.$this->hccieree->getId());
        }

      }else{
          $this->labels = $this->getLabels();
          $err = Herramientas::obtenerMensajeError($this->coderror);
          $this->getRequest()->setError('',$err.': '.$this->trab);
          return sfView::SUCCESS;
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
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
                    $this->params=array();
                    $this->configGrid();
                    $js="alert('El Rango de las fechas es incorrecto')";
                    $output = '[["hccieree_fecdes","",""],["hccieree_fechas","",""],["javascript","'.$js.'",""]]';
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

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this, $this->params['gridr']);
    $trabajadores="";

    $this->coderror=Hcm::cerrarReembolso($clasemodelo,$grid,$trabajadores);
    $this->trab=$trabajadores;
    return $this->coderror;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

  public function executeList()
  {
    $this->forward('hccieree', 'create');
  }

}
