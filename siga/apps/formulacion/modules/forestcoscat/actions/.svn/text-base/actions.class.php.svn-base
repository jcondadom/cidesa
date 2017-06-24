<?php

/**
 * forestcoscat actions.
 *
 * @package    siga
 * @subpackage forestcoscat
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class forestcoscatActions extends autoforestcoscatActions
{

   protected $act = "";

  public function executeIndex()
  {
    return $this->forward('forestcoscat', 'edit');
  }
  
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridCostos();
    $this->configGridPeriodos();
    $this->configGridFueFin();
  }
  
  public function configGridCostos($codcat='')
  {
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forestcoscat/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_costos');

    $c = new Criteria();
    $c->add(ForestcoscatPeer::CODCAT,$codcat);
    $costo = ForestcoscatPeer::doSelect($c);

    $mascaraart=$this->forestcoscat->getMascaraart();
    $lonart=strlen($mascaraart);
    
    $obj= array('codart' => 1, 'desart' => 2, 'unimed' => 3, 'codpar' => 4, 'cosult' => 7);
    $params= array('param1' => $lonart, 'val2');                                                                                                                                                                                                                                               
    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonart.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraart.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjax(\'2\',getUrlModulo()+\'ajax\',this.value,\'\',\'&cajtexmos=\'+$(this.id).up().next(0).descendants()[0].id+\'&unimed=\'+$(this.id).up().next(1).descendants()[0].id+\'&partida=\'+$(this.id).up().next(2).descendants()[0].id+\'&nompar=\'+$(this.id).up().next(3).descendants()[0].id+\'&monto=\'+$(this.id).up().next(5).descendants()[0].id+\'&ultimo=\'+$(this.id).up().next(15).descendants()[0].id+\'&relacion=\'+$(this.id).up().next(16).descendants()[0].id+\'&longitud=\'+$(\'forestcoscat_longitud\').value+\'&cajtexcom=\'+this.id)"');
    $this->columnas[1][0]->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Forestcos',$params);
    $this->columnas[1][6]->setCombo(array('U'=>'Unidad de Medida','A'=>'Unidad Alterna'));
    $this->columnas[1][6]->setHTML('onChange=Calcular(this.id);');

    $this->obj =$this->columnas[0]->getConfig($costo);

    $this->forestcoscat->setObj($this->obj);
  }

  public function configGridPeriodos($arreglo=array())
  {
    $periodos = $arreglo;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forestcoscat/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_periodos');

    $this->objper =$this->columnas[0]->getConfig($periodos);

    $this->forestcoscat->setObjper($this->objper);
  }

  public function configGridFueFin($arreglo=array())
  {
    $fuentes = $arreglo;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/forestcoscat/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_fuentefin');

    $this->objfin =$this->columnas[0]->getConfig($fuentes);

    $this->forestcoscat->setObjfin($this->objfin);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $javascript = "";  $dato="";
    $this->numajax='';

    switch ($ajax){
      case '1':
         $t=new Criteria();
         $t->add(FordefcatprePeer::CODCAT,$codigo);
         $reg= FordefcatprePeer::doSelectOne($t);
         if ($reg)
         {
           if (strlen($codigo)==$this->getRequestParameter('longitud')) {
             $dato=$reg->getNomcat();
           
             $g= new Criteria();
             $g->add(ForestcoscatPeer::CODCAT,$codigo);
             $result= ForestcoscatPeer::doSelectOne($g);
             if ($result)
             {
               $this->params=array();
               $this->forestcoscat = $this->getForestcoscatOrCreate();  
               $this->labels = $this->getLabels();
               $this->numajax='1';
               $this->configGridCostos($codigo);
               $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
               $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

             }else {
               $this->params=array();
               $this->forestcoscat = $this->getForestcoscatOrCreate();  
               $this->labels = $this->getLabels();
               $this->numajax='1';
               $this->configGridCostos();
               $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
               $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');               
             }
           }else {
               $this->params=array();
               $this->forestcoscat = $this->getForestcoscatOrCreate();  
               $this->labels = $this->getLabels();
               $this->numajax='1';
               $this->configGridCostos();
               $javascript="alert_('La Categoria debe ser de Ultimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus(); $('elimi').hide();";

             $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');             
           }
         }else {
             $this->params=array();
             $this->forestcoscat = $this->getForestcoscatOrCreate();             
             $this->updateForestcoscatFromRequest();
             $this->labels = $this->getLabels();
             $this->numajax='1';
             $this->configGridCostos();
             $javascript="alert_('La Categoria no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus(); ";
             
             $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
             $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
             return sfView::HEADER_ONLY;
         }        
        break;
      case '2':
         $unimed = $this->getRequestParameter('unimed');
         $longitud = $this->getRequestParameter('longitud');
         $partida = $this->getRequestParameter('partida');
         $nompar = $this->getRequestParameter('nompar');
         $monto = $this->getRequestParameter('monto');
         $ultimo = $this->getRequestParameter('ultimo');
         $relacion = $this->getRequestParameter('relacion');
         $dato1="";$dato2="";$dato3="0,00";$dato4="";$dato5="0,00";
         $u= new Criteria();
         $u->add(CaregartPeer::CODART,$codigo);
         $result= CaregartPeer::doSelectOne($u);
         if ($result)
         {
             if (strlen($codigo)==$longitud) {
                 $dato=$result->getDesart();
                 $dato1=$result->getUnimed();
                 $dato2=$result->getCodpar();
                 $dato3=number_format($result->getCosult(),2,',','.');
                 $dato4=H::getX('CODPAR','Nppartidas','Nompar',$dato2);
                 $dato5=number_format($result->getRelart(),2,',','.');
                 $javascript="validararticulorepetida('".$cajtexcom."')";
             }else {
               $javascript="alert_('El Articulo no es de Ultimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
             }
         }else $javascript="alert_('El Articulo no Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$unimed.'","'.$dato1.'",""],["'.$partida.'","'.$dato2.'",""],["'.$nompar.'","'.$dato4.'",""],["'.$monto.'","'.$dato3.'",""],["'.$ultimo.'","'.$dato3.'",""],["'.$relacion.'","'.$dato5.'",""],["javascript","'.$javascript.'",""],["","",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
          break;
      case '3':
          $cajtxtcom = $this->getRequestParameter('cajtxtcom','');
          $cajtxtmos = $this->getRequestParameter('cajtxtmos','');
          $g= new Criteria();
          $g->add(FortiptitPeer::CODTIP,$codigo);
          $result= FortiptitPeer::doSelectOne($g);
          if ($result)
          {
            $dato=$result->getDestip();
          }else{
            $javascript="alert('El Tipo de Gasto no existe'); $('$cajtxtcom').value=''; $('$cajtxtcom').focus(); ";
          }
          $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
          break;
      case '4':          
          $categoria=$this->getRequestParameter('categoria');
          $cadena=$this->getRequestParameter('cadena');
          $articulo=$this->getRequestParameter('articulo');
          $filper=$this->getRequestParameter('filper');
          $colmon=$this->getRequestParameter('colmon');

          $arreglo=Formulacion::cargarPeriodosCosCat($categoria,$articulo,$cadena,&$acum);
          $this->params=array();
          $this->forestcoscat = $this->getForestcoscatOrCreate();
          $this->labels = $this->getLabels();
          $this->numajax='5';

          $this->configGridPeriodos($arreglo);

          $javascript="$('divgridper').show(); $('divgrid').hide();";

          $output = '[["'.$colmon.'","'.$acum.'",""],["forestcoscat_filper","'.$filper.'",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

          break;
      case '5':
          $categoria=$this->getRequestParameter('categoria');
          $cadena=$this->getRequestParameter('cadena');
          $articulo=$this->getRequestParameter('articulo');
          $filfin=$this->getRequestParameter('filfin');

          $arreglo=Formulacion::cargarFuentesCosCat($categoria, $articulo, $cadena);
          $this->params=array();
          $this->forestcoscat = $this->getForestcoscatOrCreate();
          $this->labels = $this->getLabels();
          $this->numajax='6';

          $this->configGridFueFin($arreglo);

          $javascript="$('divgridfue').show(); $('divgrid').hide();";

          $output = '[["forestcoscat_filfin","'.$filfin.'",""],["forestcoscat_totfil","'.count($arreglo).'",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

          break;
      case '6':
          $montopre=H::toFloat($this->getRequestParameter('montopre'));
          $totfin=H::toFloat($this->getRequestParameter('totfin'));
          $monfin=H::toFloat($this->getRequestParameter('monfin'));
          $codfin=$this->getRequestParameter('codfin');
          if (Formulacion::chequearDispIngresosCos($monfin,$codfin))
          {
            if ($montopre!=$totfin)
            {
                $resta=$montopre-$totfin;
                if ($resta<0)
                {
                    $neg=$resta*-1;
                    $javascript="alert('Monto de la Fuente de Financiamiento se excede por $neg Bs. del Monto Presupuestado');  $('$codigo').value='0,00';";
                }
            }
          }else {
              $javascript="alert('Monto de la Fuente de Financiamiento se excede del Monto Disponible'); $('$codigo').value='0,00';";
          }

          $output = '[["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
          break;      
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Formulacion::grabarEstructuraCostosCat($clasemodelo,$grid);
    
    return -1;
  }

}
