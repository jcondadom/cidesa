<?php

/**
 * pagdetbenop actions.
 *
 * @package    siga
 * @subpackage pagdetbenop
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class pagdetbenopActions extends autopagdetbenopActions
{
  public function executeIndex()
  {
    return $this->forward('pagdetbenop', 'edit');
  }


  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {

    $this->configGrid();
  }

  public function configGrid($numord='')
  {
    $q= new Criteria();
    $q->add(OpdetbenopPeer::NUMORD,$numord);
    $reg=OpdetbenopPeer::doSelect($q);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/pagdetbenop/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ben');

     $this->obj =$this->columnas[0]->getConfig($reg);

    $this->opdetbenop->setObj($this->obj);    
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js="";

    switch ($ajax){
      case '1':
        $p= new Criteria();
        $p->add(OpordpagPeer::NUMORD,$codigo);
        $regp= OpordpagPeer::doSelectOne($p);
        if ($regp){
          if ($regp->getStatus()=='N'){
            $desord=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($regp->getDesord()));
            $fecord=date('d/m/Y', strtotime($regp->getFecemi()));
            $monord=H::FormatoMonto($regp->getMonord());
          }else {
            $js="alert_('La Orden de Pago debe estar Pendiente por Pagar'); $('opdetbenop_numord').value='';";
            $codigo="";
            $desord="";
            $fecord="";
            $monord="0,00";
          } 
        }else {
          $js="alert_('La Orden de Pago no existe'); $('opdetbenop_numord').value='';";
          $codigo="";
          $desord="";
          $fecord="";
          $monord="0,00";
        }        
        $this->params=array();
        $this->opdetbenop = $this->getOpdetbenopOrCreate();
        $this->updateOpdetbenopFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($codigo);

        $output = '[["opdetbenop_desord","'.$desord.'",""],["'.$cajtexmos.'","'.$fecord.'",""],["opdetbenop_monord","'.$monord.'",""],["javascript","'.$js.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

   // return sfView::HEADER_ONLY;

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
    OrdendePago::SalvarDesgloseBenOP($clasemodelo,$grid);
    return -1;
  }

  public function executeAjaxgrid() {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";
    switch ($name) {
      case ('a'):
        switch ($col) {
         case ('1'):   //RIF Beneficiario
            if ($grid[$fila][$col-1]!="")
            {              
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                   $c = new Criteria();
                   $c->add(OpbenefiPeer::CEDRIF,$grid[$fila][$col-1]);
                   $regs = OpbenefiPeer::doSelectOne($c);
                   if ($regs)
                   {
                     $grid[$fila][$col]=$regs->getNomben();
                    }else {
                      $javascript = "alert_('El Beneficiario no Existe');";
                      $grid[$fila][$col-1]="";
                      $grid[$fila][$col]="";
                   }               
                }else {
                  $javascript = "alert_('El Beneficiario esta Repetido');";
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
              }
              }
              
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;  
          case ('3'):  //Monto Beneficiario
               $monben=$grid[$fila][$col-1];
               $monord = $this->getRequestParameter('opdetbenop_monord','');
               $i=0;
               $acum=0;
               while ($i<count($grid))
               {
                   if ($i!=$fila)
                    $acum=$acum + H::toFloat($grid[$i][$col-1]);
                  
                   $i++;
               }
               $dif=H::toFloat($monord)-$acum;
               if (H::toFloat($monben)>$dif)
               {
                  $grid[$fila][$col-1]="0,00";                        
                  $javascript="alert('El Monto sobrepasa al Monto Total de la Orden de Pago');  ActualizarSaldosGrid('a',ArrTotales_a);";
               }
               $jsonextra = ',["javascript","' . $javascript . '",""]';
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




}
