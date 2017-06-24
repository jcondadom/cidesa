<?php

/**
 * manregequ actions.
 *
 * @package    siga
 * @subpackage manregequ
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class manregequActions extends automanregequActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
     if ($this->manregequ->getLoguse()==''){
      $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
      $this->manregequ->setLoguse($loguse);
     }

  }

  public function configGrid(){
    $this->configGridNombres($this->manregequ->getNumequ());
    $this->configGridComponentes($this->manregequ->getNumequ());
  }

  public function configGridNombres($numequ='')
  {
   $c= new Criteria();
   $c->add(MannomequPeer::NUMEQU,$numequ);
   $det= MannomequPeer::doSelect($c);
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/manregequ/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_nom');
    
    $this->obj =$this->columnas[0]->getConfig($det);

    $this->manregequ->setObjnom($this->obj);
  }

  public function configGridComponentes($numequ='',$otro='')
  {
   $c= new Criteria();
   $c->add(MancomequPeer::NUMEQU,$numequ);
   $reg= MancomequPeer::doSelect($c);
   if ($otro=='S'){
     foreach ($reg as $objdet) {
       $objdet->setNumser('');
       $det[]=$objdet;
     }
   }else $det=$reg;
     

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/manregequ/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_com');
    
    $this->columnas[1][8]->setCombo(array('C' => 'CARBOZULIA', 'V' => 'VENEQUIT', 'O' => 'OTRO'));

    $this->obj2 =$this->columnas[0]->getConfig($det);

    $this->manregequ->setObjcom($this->obj2);   
  }  

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=$js=""; $sw=true; 
    $this->ajaxs=$ajax;

    switch ($ajax){
      case '1':
        $q= new Criteria();
          $q->add(TsdesmonPeer::CODMON,$codigo);
          $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
          $reg= TsdesmonPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=number_format($reg->getValmon(),6,',','.');
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
          $q= new Criteria();
          $q->add(ManregequPeer::NUMEQU,$codigo);
          $reg= ManregequPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=$reg->getNomequ();
             $tipequ=$reg->getCodteq();
             $deseq=H::getX_vacio('codteq','Mantipequ','Desteq',$tipequ);

             $codide=$reg->getCodide();
             $deside=H::getX_vacio('codide','Manidegru','Deside',$codide);

             $codcla=$reg->getCodcla();
             $descla=H::getX_vacio('codcla','Manclaequ','Descla',$codcla);

             $codali=$reg->getCodtal();
             $desali=H::getX_vacio('codtal','Mantipali','Destal',$codali);

             $codtra=$reg->getCodtta();
             $destra=H::getX_vacio('codtta','Mantiptra','Destta',$codtra);

             $codfab=$reg->getCodfab();
             $desfab=H::getX_vacio('codfab','mandeffab','Desfab',$codfab);
             $fecfab=date('d/m/Y',strtotime($reg->getFecfab()));

             $coddis=$reg->getCoddis();
             $desdis=H::getX_vacio('coddis','Bndisbie','Desdis',$coddis);
             
             $codmon=$reg->getCodmon();
             $valmon=H::FormatoMonto($reg->getValmon(),6);
             $costo=H::FormatoMonto($reg->getCosequ());

             $codtga=$reg->getCodtga();
             $destga=H::getX_vacio('codtga','Mantipgar','Destga',$codtga);
             $valgar=H::FormatoMonto($reg->getValgar());
             $fecgar=date('d/m/Y',strtotime($reg->getFecgar()));

             $codume=$reg->getCodume();
             $desume=H::getX_vacio('codume','Manunimed','Desume',$codume);

             $lubric=$reg->getLubric();
             $combus=$reg->getCombus();

             $codest=$reg->getCodest();
             $desest=H::getX_vacio('codest','Manestequ','Desest',$codest);

             $codubi=$reg->getCodubi();
             $desubi=H::getX_vacio('codubi','Bnubibie','Desubi',$codubi);

             $codniv=$reg->getCodniv();
             $desniv=H::getX_vacio('codniv','Npestorg','Desniv',$codniv);

             $coduni=$reg->getCoduni();
             $desuni=H::getX_vacio('coduni','Manunipro','Desuni',$coduni);

             $codcen=$reg->getCodcencos();
             $descen=H::getX_vacio('codcencos','Codefcencos','Descencos',$codcen);

             $carcos=$reg->getCarcos();

             $codcar=$reg->getCodcar();
             $nomcar=H::getX_vacio('codcar','Npcargos','Nomcar',$codcar);

             $peso=H::FormatoMonto($reg->getPeso());
             $longit=H::FormatoMonto($reg->getLongit());
             $altura=H::FormatoMonto($reg->getAltura());
             $ancho=H::FormatoMonto($reg->getAncho());

             $balde=H::FormatoMonto($reg->getBalde());
             $tolba=H::FormatoMonto($reg->getTolba());
             $llenad=H::FormatoMonto($reg->getLlenad());


             $js="$('manregequ_numequ').value=''; $('manregequ_serequ').value=''; CargarNombres('$codigo'); CargarComponentes('$codigo');";
             $output = '[["'.$cajtexmos.'","'.$dato.'",""],["manregequ_codteq","'.$tipequ.'",""],["manregequ_desteq","'.$deseq.'",""],
             ["manregequ_codide","'.$codide.'",""],["manregequ_deside","'.$deside.'",""],
             ["manregequ_codcla","'.$codcla.'",""],["manregequ_descla","'.$descla.'",""],
             ["manregequ_codtal","'.$codali.'",""],["manregequ_destal","'.$desali.'",""],
             ["manregequ_codtta","'.$codtra.'",""],["manregequ_destta","'.$destra.'",""],
             ["manregequ_codfab","'.$codfab.'",""],["manregequ_desfab","'.$desfab.'",""],["manregequ_fecfab","'.$fecfab.'",""],
             ["manregequ_coddis","'.$coddis.'",""],["manregequ_desdis","'.$desdis.'",""],
             ["manregequ_codmon","'.$codmon.'",""],["manregequ_valmon","'.$valmon.'",""],["manregequ_cosequ","'.$costo.'",""],
             ["manregequ_codtga","'.$codtga.'",""],["manregequ_destga","'.$destga.'",""],["manregequ_valgar","'.$valgar.'",""],["manregequ_fecgar","'.$fecgar.'",""],
             ["manregequ_codume","'.$codume.'",""],["manregequ_desume","'.$desume.'",""],
             ["manregequ_lubric","'.$lubric.'",""],["manregequ_combus","'.$combus.'",""],
             ["manregequ_codest","'.$codest.'",""],["manregequ_desest","'.$desest.'",""],
             ["manregequ_codubi","'.$codubi.'",""],["manregequ_desubi","'.$desubi.'",""],
             ["manregequ_codniv","'.$codniv.'",""],["manregequ_desniv","'.$desniv.'",""],
             ["manregequ_coduni","'.$coduni.'",""],["manregequ_desuni","'.$desuni.'",""],
             ["manregequ_codcencos","'.$codcen.'",""],["manregequ_descencos","'.$descen.'",""],["manregequ_carcos","'.$carcos.'",""],
             ["manregequ_codcar","'.$codcar.'",""],["manregequ_nomcar","'.$nomcar.'",""],
             ["manregequ_peso","'.$peso.'",""],["manregequ_longit","'.$longit.'",""],["manregequ_altura","'.$altura.'",""],["manregequ_ancho","'.$ancho.'",""],
             ["manregequ_balde","'.$balde.'",""],["manregequ_tolba","'.$tolba.'",""],["manregequ_llenad","'.$llenad.'",""],["javascript","'.$js.'",""]]';
          }else
            $output = '[["","",""]]';        
        break;
      case '3':
        $sw=false;
        $codigo=$this->getRequestParameter('codigo');    
      
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->manregequ = $this->getManregequOrCreate();
        $this->configGridNombres($codigo);
        $output = '[["javascript","'.$js.'",""]]';
        break;
      case '4':
        $sw=false;
        $codigo=$this->getRequestParameter('codigo');    
      
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->manregequ = $this->getManregequOrCreate();
        $this->configGridComponentes($codigo,'S');
        $output = '[["javascript","'.$js.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if ($sw) return sfView::HEADER_ONLY;
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
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    Mantenimiento::salvarEquipo($clasemodelo,$grid,$grid2);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Mannomequ','Numequ',$clasemodelo->getNumequ());
    H::EliminarRegistro('Mancomequ','Numequ',$clasemodelo->getNumequ());
    parent::deleting($clasemodelo);
  }

   /**
 * Función para procesar _todas_ las funciones Ajax del formulario
 * Cada función esta identificada con el valor de la vista "ajax"
 * el cual traerá el indice de lo que se quiere procesar.
 *
 */
  public function executeAjaxgrid() {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');    
    $idfila = $this->getRequestParameter('this[id]', '');    
    $valuefila = $this->getRequestParameter('this[value]', ''); 
    $javascript="";  $jsonextra="";
      switch ($name) {
        case ('b'):   //grid Componentes 
            switch ($col) { 
              case ('3'):  //Tipo de componente
                $c= new Criteria();
                $c->add(MantipcomPeer::CODTCO,$grid[$fila][$col-1]);
                $reg= MantipcomPeer::doSelectOne($c);
                if ($reg)
                  $grid[$fila][$col]=$reg->getDestco();
                else {
                  $javascript = "alert_('El Tipo de Componente no Existe');";
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
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
