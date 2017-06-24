<?php

/**
 * ingreging actions.
 *
 * @package    Roraima
 * @subpackage ingreging
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32380 2009-09-01 17:11:59Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingregingActions extends autoingregingActions
{
    protected $codigo="";

  // Para incluir funcionalidades al executeEdit()
  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
    $this->setVars();
    $this->configGrid();
    $this->configGrid2($this->cireging->getRefing());
    if ($this->cireging->getId())
    {
        $this->cireging->setNumdep2($this->cireging->getNumdep());
        $this->cireging->setFecdep2($this->cireging->getFecdep());
    }
  }

  public function setVars()
  {
    $this->mascarapresupuesto = Herramientas::getX('Codemp','Cidefniv','Forpre','001');
    $this->longpre=strlen($this->mascarapresupuesto);
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCiregingFromRequest()
  {
    $cireging = $this->getRequestParameter('cireging');

    if (isset($cireging['refing']))
    {
      $this->cireging->setRefing($cireging['refing']);
    }
    if (isset($cireging['fecing']))
    {
      if ($cireging['fecing'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cireging['fecing']))
          {
            $value = $dateFormat->format($cireging['fecing'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cireging['fecing'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cireging->setFecing($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cireging->setFecing(null);
      }
    }
    if (isset($cireging['desing']))
    {
      $this->cireging->setDesing($cireging['desing']);
    }
    if (isset($cireging['codtip']))
    {
      $this->cireging->setCodtip($cireging['codtip']);
    }
    if (isset($cireging['rifcon']))
    {
      $this->cireging->setRifcon($cireging['rifcon']);
    }
    if (isset($cireging['nomcon']))
    {
      $this->cireging->setNomcon($cireging['nomcon']);
    }
    if (isset($cireging['numcue']))
    {
      $this->cireging->setCtaban($cireging['numcue']);
    }
    if (isset($cireging['numcue']))
    {
      $this->cireging->setNumcue($cireging['numcue']);
    }
    if (isset($cireging['tipmov']))
    {
      $this->cireging->setTipmov($cireging['tipmov']);
    }
    if (isset($cireging['numdep']))
    {
      $this->cireging->setNumdep($cireging['numdep']);
    }
    if (isset($cireging['numofi']))
    {
      $this->cireging->setNumofi($cireging['numofi']);
    }
    if (isset($cireging['previs']))
    {
      $this->cireging->setPrevis($cireging['previs']);
    }
    if (isset($cireging['grid']))
    {
      $this->cireging->setGrid($cireging['grid']);
    }
    if (isset($cireging['moning']))
    {
      $this->cireging->setMoning($cireging['moning']);
    }
    if (isset($cireging['monrec']))
    {
      $this->cireging->setMonrec($cireging['monrec']);
    }
    if (isset($cireging['mondes']))
    {
      $this->cireging->setMondes($cireging['mondes']);
    }
    if (isset($cireging['montot']))
    {
      $this->cireging->setMontot($cireging['montot']);
    }
  if (isset($cireging['fecdep']))
    {
      if ($cireging['fecdep'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cireging['fecdep']))
          {
            $value = $dateFormat->format($cireging['fecdep'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cireging['fecdep'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cireging->setFecdep($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cireging->setFecdep(null);
      }
    }
    if (isset($cireging['codtipper']))
    {
      $this->cireging->setCodtipper($cireging['codtipper']);
    }
    if (isset($cireging['banco']))
    {
      $this->cireging->setBanco($cireging['banco']);
    }
    if (isset($cireging['cheque']))
    {
      $this->cireging->setCheque($cireging['cheque']);
    }
    if (isset($cireging['agencia']))
    {
      $this->cireging->setAgencia($cireging['agencia']);
    }
    if (isset($cireging['fecha']))
    {
      if ($cireging['fecha'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cireging['fecha']))
          {
            $value = $dateFormat->format($cireging['fecha'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cireging['fecha'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cireging->setFecha($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cireging->setFecha(null);
      }
    }
    if (isset($cireging['numdep2']))
    {
      $this->cireging->setNumdep2($cireging['numdep2']);
    }
    if (isset($cireging['fecdep2']))
    {
      $this->cireging->setFecdep2($cireging['fecdep2']);
    }
    if (isset($cireging['tipliq']))
    {
      $this->cireging->setTipliq($cireging['tipliq']);
    }
    if (isset($cireging['codmon']))
    {
      $this->cireging->setCodmon($cireging['codmon']);
    }
    if (isset($cireging['valmon']))
    {
      $this->cireging->setValmon($cireging['valmon']);
    }
    if (isset($cireging['perpre']))
    {
      $this->cireging->setPerpre($cireging['perpre']);
    }
    if (isset($cireging['grid2']))
    {
      $this->cireging->setGrid2($cireging['grid2']);
    }
    if (isset($cireging['codpar']))
    {
      $this->cireging->setCodpar($cireging['codpar']);
    }

  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(CiimpingPeer::REFING,$this->cireging->getRefing());
    $per = CiimpingPeer::doSelect($c);

    $mascara  = $this->mascarapresupuesto;
    $longitud = $this->longpre;
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingreging/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $c1= new Criteria();
    $c1->add(CiregingPeer::REFING,$this->cireging->getRefing());
    $p= CiregingPeer::doSelectOne($c1);

    $obj= array('codpre' => 1);
    $params= array('param1' => $longitud, 'val2');
    $this->columnas[1][0]->setCatalogo('Cideftit','sf_admin_edit_form',$obj,'Ingreging_cideftit',$params);
    $this->columnas[1][0]->setHTML('type="text" size="'.chr(39).$longitud.chr(39).'" maxlength="'.chr(39).$longitud.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="if (vallong(event,this.id,"'.$longitud.'")){ ajaxcodpre(event,this.id),repetido(event,this.id) }"');
    $this->columnas[1][1]->setHTML('size="10" onBlur="event.keyCode=13;return formatoDecimal(event,this.id),valcod(event,this.id), calcularneto();"');
    $this->columnas[1][1]->setEsTotal(true,'cireging_moning');
    $this->columnas[1][3]->setHTML('size="10" onBlur="event.keyCode=13;return formatoDecimal(event,this.id),calculardcto(),calcularneto()"');
    $this->columnas[1][2]->setEsTotal(true,'cireging_monrec');
    $this->columnas[1][3]->setEsTotal(true,'cireging_mondes');
    $this->columnas[1][5]->setCatalogo('Citiprub','sf_admin_edit_form',array('destiprub'=>'8','codtiprub'=>'7'),'Ingreging_citiprub');
    //$this->columnas[1][5]->setAjax('ingreging',3,7);
    $this->columnas[1][7]->setCombo(array('S' =>'Si', 'N' => 'No'));

    $mandev=H::getConfApp2('mandev', 'ingresos', 'ingreging');
    if ($mandev=='S')
      $this->columnas[1][7]->setOculta(false);
    

  if ($p!=''){
//  if ($this->cireging->getId()){
    $this->columnas[1][0]->setHTML('readonly=true');
    $this->columnas[1][1]->setHTML('readonly=true');
    $this->columnas[1][2]->setHTML('readonly=true');
    $this->columnas[1][3]->setHTML('readonly=true');
    $this->columnas[1][4]->setHTML('readonly=true');
  }

    $this->grid = $this->columnas[0]->getConfig($per);
    $this->cireging->setGrid($this->grid);

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid2($refing='')
  {
    $c = new Criteria();
    $c->add(CidepingPeer::REFING,$refing);
    $per = CidepingPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingreging/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_depositos');

    $this->grid2 = $this->columnas[0]->getConfig($per);

    $this->cireging->setGrid2($this->grid2);

  }  

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {

    $codigo    = $this->getRequestParameter('codigo','');
    $ajax      = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom');

    switch ($ajax){
      case '1':
        $destip = Herramientas::getX('codtip','tstipmov','destip',$codigo);

        $output = '[["cireging_destipmov","'.$destip.'",""]]';
        break;
      case '2':

        $c= new Criteria();
        $c->add(CideftitPeer::CODPRE,$codigo);
        $reg=CideftitPeer::doSelectOne($c);
        if ($reg)
        {
          $cc= new Criteria();
          $cc->add(CiasiiniPeer::CODPRE,$codigo);
          $reg2=CiasiiniPeer::doSelect($cc);
            if ($reg2){
                $javascript="";
            }else{
                $javascript="alert('Código presupuestario no tiene asignacion inicial');$('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }
        }
        else
        {
          $javascript="alert('Código presupuestario no existe');$('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

      break;

      case '3':
        $dato=""; $js="";
        $c= new Criteria();
        $c->add(CitiprubPeer::CODTIPRUB,$codigo);
        $reg= CitiprubPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getDestiprub();
          $dato3=$reg->getCodpre();
        }else {
            $js="alert('El Tipo de Rubro no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '4':
        $dato=""; $js="";
        $c= new Criteria();
        $c->add(CiconrepPeer::RIFCON,$codigo);
        $reg= CiconrepPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getNomcon();
        }else {
            $js="
             if(confirm('El Contribuyente no esta registrado Desea Registrarlo ?'))
             {
               $('cireging_nomcon').readOnly=false;
             }";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '5':
          $js=""; $dato="";
           if  ($this->getRequestParameter('nuevo')=='')
           {
            $q= new Criteria();
            $q->add(TsdesmonPeer::CODMON,$codigo);
            $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
            $reg= TsdesmonPeer::doSelectOne($q);
            if ($reg)
            {
               $dato=number_format($reg->getValmon(),6,',','.');
            }
           }else {
              $js="$('cireging_codmon').value='".$this->getRequestParameter('variable')."'";   
              $dato=$this->getRequestParameter('valmone');
           }
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
          break;
      case '6':
        $dato=""; $js="";
        $c= new Criteria();
        $c->add(CidefparPeer::CODPAR,$codigo);
        $reg= CidefparPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getDespar();
        }else {
            $js="alert('El Parque no esta Definido'); $('cireging_codpar').value=''; $('cireging_despar').value=''; $('cireging_codpar').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
          break;    
      case '7':
        $filbandir = H::getConfApp2('filbandir', 'tesoreria', 'tesdefcueban');
        $loguse= $this->getUser()->getAttribute('loguse');
        $t= new Criteria();                
        $t->add(TsdefbanPeer::NUMCUE,$codigo);
        if ($filbandir=='S') {                      
          $sql=' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $t->add(TsdefbanPeer::CODDIREC,$sql,Criteria::CUSTOM);
        }
        $reg= TsdefbanPeer::doSelectOne($t);
        if ($reg)
        {              
          $dato=$reg->getNomcue();            
        } else {
          $js="alert('La Cuenta Bancaria no esta Registrado'); $('cireging_numcue').value=''; $('cireging_nomcue').value=''; $('cireging_numcue').focus();";
        }          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;       
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

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
    $this->codigo ="";
    if($this->getRequest()->getMethod() == sfRequest::POST){

       $this->cireging  =  $this->getCiregingOrCreate();
       $this->updateCiregingFromRequest();
       $this->editing();
       
       $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
       $grid2 = Herramientas::CargarDatosGridv2($this,$this->grid2);

       $this->coderr = Herramientas::ValidarGrid($grid);

       $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
           if ($x[$j]->getCodpre()!="")
           {
              $this->codigo=$x[$j]->getCodpre();
              $c= new Criteria();
              $c->add(CideftitPeer::CODPRE,$x[$j]->getCodpre());
              $c->addJoin(CideftitPeer::CODPRE,CiasiiniPeer::CODPRE);
              $reg=CideftitPeer::doSelectOne($c);
              if (!$reg)
              {
                $this->coderr=1509;
                return false;
                break;
              }
              $tieperdev=H::getConfApp2('tiepd', 'ingresos', 'ingreging');
              if ($tieperdev=='S')
              {               
                  $monasig=0;
                  $e= new Criteria();
                  $e->add(CiasiiniPeer::CODPRE,$x[$j]->getCodpre());
                  $e->add(CiasiiniPeer::PERPRE,$this->getRequestParameter('cireging[perpre]'));
                  $result= CiasiiniPeer::doSelectOne($e);
                  if ($result)
                  {
                      $monasig=$result->getMonasi();                      
                  }
                  
                  $montodev=Ingresos::MontoDevengado($x[$j]->getCodpre(),$this->getRequestParameter('cireging[perpre]'));
                  $resta=$monasig-$montodev;
                  if ($x[$j]->getMoning()>$resta)
                  {
                      $this->coderr=1513;
                      return false;
                      break;
                  }
              }
           }
           $j++;
        }

        if (!$this->cireging->getId())
        {
          if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('cireging[fecing]'))==true)
          {
            $this->coderr=529;
            return false;
          }
            
            if (!H::validarPeriodoFiscal($this->getRequestParameter('cireging[fecing]')))
            {
                $this->coderr=1333;
                return false;
            }else {  
                if ($this->getRequestParameter('cireging[fecdep]')!="") {
                if (!H::validarPeriodoFiscal($this->getRequestParameter('cireging[fecdep]')))
                {
                    $this->coderr=1333;
                    return false;
                }else  {
                    if ($this->cireging->getFecdep()>$this->cireging->getFecing())
                    {
                        $this->coderr=1512;
                        return false;
                    }
                }
                }
            }
            $nogenmovcom=H::getConfApp2('nogenmovcom', 'ingresos', 'ingreging');

            if (self::validarGeneraComprobante() && $nogenmovcom!='S')
            {
              $this->coderr=508;
              return false;
            }       


            $cardeplot=H::getConfApp2('cardeplot', 'ingresos', 'ingreging');
            $valblocueban=H::getConfAppGen('valblocueban');
            if ($cardeplot=='S')
            {
              $l=$grid2[0];
              if (count($l)==0)
              {
                $this->coderr=496;  
                return false;
              }else {
                $y=0;
                $acum=0;
                while ($y<count($l))
                {
                    if ($l[$y]->getNumdep()=="")
                    {
                      $this->coderr=1520;  
                      return false;
                    }
                    if ($l[$y]->getNumcue()=="")
                    {
                      $this->coderr=1518;  
                      return false;
                    }
                    if ($l[$y]->getTipmov()=="")
                    {
                      $this->coderr=1519;  
                      return false;
                    } 

                    $v= new Criteria();
                    $v->add(TsmovlibPeer::NUMCUE,$l[$y]->getNumcue());
                    $v->add(TsmovlibPeer::REFLIB,$l[$y]->getNumdep());
                    $v->add(TsmovlibPeer::TIPMOV,$l[$y]->getTipmov());
                    $regv= TsmovlibPeer::doSelectOne($v);
                    if ($regv)
                    {
                      $this->coderr=1805;  
                      return false;
                    }

                    if (Tesoreria::validaPeriodoCerradoBanco($this->getRequestParameter('cireging[fecing]'),$l[$y]->getNumcue())==false)
                    {
                      $this->coderr=537;
                      return false;
                    }

                    if ($valblocueban=='S'){
                      if (Tesoreria::validaBancoBloqueado($this->getRequestParameter('cireging[fecing]'),$l[$y]->getNumcue()))
                      {
                        $this->coderr=5007;
                        return false;
                      }
                    }

                    if ($l[$y]->getFecha()!="") {                    
                      if (!H::validarPeriodoFiscal(date('d/m/Y',strtotime($l[$y]->getFecha()))))
                      {
                          $this->coderr=1333;
                          return false;
                      }else  {
                          if ($l[$y]->getFecha()>$this->cireging->getFecing())
                          {
                              $this->coderr=1512;
                              return false;
                          }
                      }
                      $this->coderr =Ingresos::validarFechaIngresos($l[$y]->getFecha());
                      if($this->coderr!=-1)
                        return false;
                    }
                    $acum+=H::toFloat($l[$y]->getMondep());
                  $y++;
                }
                $moningr=H::toFloat($this->getRequestParameter('cireging[montot]'));
                if (H::toFloat($acum)!=$moningr)
                   $this->coderr=1516;  
             }

            }else {
              if ($this->getRequestParameter('cireging[numdep]')=="")
              {
                $this->coderr=1520;  
                return false;
              }
              if ($this->getRequestParameter('cireging[numcue]')=="")
              {
                $this->coderr=1518;  
                return false;
              }
              if ($this->getRequestParameter('cireging[tipmov]')=="")
              {
                $this->coderr=1519;  
                return false;
              } 

               if (Tesoreria::validaPeriodoCerradoBanco($this->getRequestParameter('cireging[fecing]'),$this->cireging->getCtaban())==false)
              {
                $this->coderr=537;
                return false;
              }

              if ($valblocueban=='S'){
                if (Tesoreria::validaBancoBloqueado($this->getRequestParameter('cireging[fecing]'),$this->cireging->getCtaban()))
                {
                  $this->coderr=5007;
                  return false;
                }
              }

              $this->coderr =Ingresos::validarFechaIngresos($this->cireging->getFecdep());
              if($this->coderr!=-1)
                return false;
              $t= new Criteria();
              $t->add(TsmovlibPeer::NUMCUE,$this->cireging->getCtaban());
              $t->add(TsmovlibPeer::REFLIB,$this->cireging->getNumdep());
              $t->add(TsmovlibPeer::TIPMOV,$this->cireging->getTipmov());
              $reg= TsmovlibPeer::doSelectOne($t);
              if ($reg)
              {
                $this->coderr=1805;  
                return false;
              }             
            }
        }

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->cireging = $this->getCiregingOrCreate();
    $this->updateCiregingFromRequest();
	$this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        if($this->coderr==1509) $this->getRequest()->setError('',$err.' '.$this->codigo);
        else $this->getRequest()->setError('',$err);
  }
    }
    return sfView::SUCCESS;
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->editing();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->grid2);
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
     $this->cireging = $this->getCiregingOrCreate();
     $this->updateCiregingFromRequest();
     $this->editing();
     $detalle=Herramientas::CargarDatosGridv2($this,$this->grid);
     $depositos=Herramientas::CargarDatosGridv2($this,$this->grid2);
     $cardeplot=H::getConfApp2('cardeplot', 'ingresos', 'ingreging');
     $concom   = 0;
     $mensaje1 = "";
     $msj1     = "";
     $msj2     = "";
     $cuentaporpagarrendicion = "";
     $mensajeuno  = "";
     $msjuno      = "";
     $msjdos      = "";
     $msjtres     = "";
     $comprobante = "";
     $this->mensajeuno = "";
     $this->msj1     = "";
     $this->msj2     = "";
     $this->mensaje1 = "";
     $this->msjuno   = "";
     $this->msjdos   = "";
     $this->msjtres  = "";
     $this->i        = "";
     $this->formulario = array();

     if ($cardeplot=='S') {
      if ($this->cireging->getRifcon()=="" || count($detalle[0])==0)
      {
        $this->msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Beneficiario y las Imputaciones Presupuestarias, para luego generar el comprobante";
      }else {
       if (count($depositos[0])==0)
        $this->msjtres="No se puede Generar el Comprobante, Verique si introdujo los Depositos, para luego generar el comprobante";
       else {
          $l=$depositos[0];
          $y=0;
          $acum=0;
          while ($y<count($l))
          {
              $acum+=H::toFloat($l[$y]->getMondep());
            $y++;
          }
          $moningr=H::toFloat($this->getRequestParameter('cireging[montot]'));
          if (H::toFloat($acum)!=$moningr)
             $this->msjtres="No se puede Generar el Comprobante, El Monto Total de los Depositos no es igual al Montotal del Ingreso";
      }
    }
     }else {

     if ($this->cireging->getRifcon()=="" || $this->cireging->getCtaban()=="" || count($detalle[0])==0)
     {
       $this->msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Beneficiario, el Código Contable y las Imputaciones Presupuestarias, para luego generar el comprobante";

     }else{
       if ($this->cireging->getRifcon()=="" || $this->cireging->getCtaban()=="")
       {
         $this->msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Beneficiario y el Código Contable, para luego generar el comprobante";
       }else {

       }
     }
   }

     if ($this->msjtres=="")
     {
      $x = Ingresos::grabarComprobante($this->cireging,$detalle,$depositos,$comprobante,$msjuno);
      if ($msjuno=="") {
      $concom = $concom + 1;

      $form = "sf_admin/ingreging/confincomgen";
      $i    = 0;
      while ($i < $concom)
      {
       $f[$i] = $form.$i;
       $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
       $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
       $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
       $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
       $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
       $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
       $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
       $this->getUser()->setAttribute('tipmov', '');
       $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
       $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
       $i++;
      }
      $this->i = $concom - 1;
      $this->formulario = $f;
      }else {
        $this->msjtres=$msjuno;
      }
     }

      $output =  '[["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

  public function executeAnular()
  {
    $refing = $this->getRequestParameter('refing');
    $fecing = $this->getRequestParameter('fecing');
    
    $fectra = split('/', $fecing);
    $fectra = $fectra[2] . "-" . $fectra[1] . "-" . $fectra[0];

    //Buscamos el movimiento a anular
    $c = new Criteria();
    $c->add(CiregingPeer::REFING,$refing);
    $c->add(CiregingPeer::FECING,$fectra);
    $this->cireging = CiregingPeer::doSelectOne($c);

    sfView::SUCCESS;

  }

  public function executeSalvaranu()
  {
    $refanu=$this->getRequestParameter('refanu');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');
    $fecing=$this->getRequestParameter('fecing');
    
    $fectra = split('/', $fecanu);
    $fectra = $fectra[2] . "-" . $fectra[1] . "-" . $fectra[0];    

    $this->msg =Ingresos::validarFechaIngresos($fectra);
    if ($this->msg==-1) {    
      //Buscamo el registro para su anulacion
        $c = new Criteria();
        $c->add(CiregingPeer::REFING,$refanu);
        $c->add(CiregingPeer::FECING,$fecing);
        $this->cireging = CiregingPeer::doSelectOne($c);
         if ($this->cireging) {
          $this->cireging->setDesanu($desanu);
          $this->cireging->setFecanu($fectra);
          $this->cireging->setStaing('N');
          $this->cireging->save();
         }

      //Anular el detalle del movimiento Imp_Prc
        $c = new Criteria();
        $c->add(CiimpingPeer::REFING,$refanu);
        $c->add(CiimpingPeer::FECING,$fecing);
        $detalle= CiimpingPeer::doSelect($c);
         if ($detalle) {
    	    foreach ($detalle as $imping){
    	      $imping->setStaimp('N');
    	      $imping->save();
    	    }
         }

       ////////////////////////////

      $this->msg=Ingresos::buscar_comprobante($this->cireging,'A',$fectra);
      if ($this->msg==-1)
      {
        //Anulamos el comprobante
        $this->msg = Ingresos::generar_msl_anulado($this->cireging);
      }
    }else {
      $this->msg=Herramientas::obtenerMensajeError($this->msg);
    }

    sfView::SUCCESS;
  }


  /**
   * Función para colocar el codigo necesario para 
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($cireging)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->grid2);
    $nogenmovcom=H::getConfApp2('nogenmovcom', 'ingresos', 'ingreging');
    if ($cireging->getId())   //Modificaciones
    {
      return Ingresos::SalvarIngreging($cireging, $grid, $grid2);
    }else {   //Nuevo
      $cireging->setStaliq('N');
      if ($nogenmovcom!='S')
        self::GenerarComprobante($cireging, $grid);
      return Ingresos::SalvarIngreging($cireging, $grid, $grid2);
    }
  }

  public function GenerarComprobante($cireging, $grid)
  {
      $concom=1;
      $form="sf_admin/ingreging/confincomgen";
      $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
      $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'0');
      if ($grabo=='S')
      {
        $i=0;
        while ($i<$concom)
        {
         $formulario[$i]=$form.$i;
         if ($this->getUser()->getAttribute('grabo',null,$formulario[$i])=='S')
         {
          $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formulario[$i]);
          $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formulario[$i]);
          $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formulario[$i]);
          $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formulario[$i]);
          $debito=$this->getUser()->getAttribute('debito',null,$formulario[$i]);
          $credito=$this->getUser()->getAttribute('credito',null,$formulario[$i]);
          $grid=$this->getUser()->getAttribute('grid',null,$formulario[$i]);

          $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('debito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('credito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('grid',$formulario[$i]);

          $this->numero = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]));

          $cireging->setNumcom($this->numero);
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');

     // $grid=Herramientas::CargarDatosGridv2($this,$this->objeto,true);

  }



  /**
   * Función para colocar el codigo necesario para 
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($cireging)
  {
    try{
      $cardeplot=H::getConfApp2('cardeplot', 'ingresos', 'ingreging');
      if ($cardeplot=='S')
      {
        $c = new Criteria();
        $c->add(CidepingPeer::REFING,$cireging->getRefing());
        $per = CidepingPeer::doSelect($c);
        if ($per)
        {
          $enc=false;
          foreach ($per as $obj) {
            $c1= new Criteria();
            $c1->add(TsmovlibPeer::NUMCUE,$obj->getNumcue());
            $c1->add(TsmovlibPeer::REFLIB,$obj->getNumdep());
            $c1->add(TsmovlibPeer::TIPMOV,$obj->getTipmov());
            $mov=TsmovlibPeer::doSelectOne($c1);
            if ($mov){
              if ($mov->getStacon()=='C') {
                  $enc=true;
                  break;
              }     
              $sql="select * from tsmovban where numcue='".$obj->getNumcue()."' and refban='".$obj->getNumdep()."' and tipmov= '".$obj->getTipmov()."'";
              if (Herramientas::BuscarDatos($sql,$tsmovban)){
                return 1522;
              }        
            }else return 1505;      
          }        
          if ($enc)
            return 1506;
          else{
            foreach ($per as $obj2) {
              $c1= new Criteria();
              $c1->add(TsmovlibPeer::NUMCUE,$obj2->getNumcue());
              $c1->add(TsmovlibPeer::REFLIB,$obj2->getNumdep());
              $c1->add(TsmovlibPeer::TIPMOV,$obj2->getTipmov());
              $mov=TsmovlibPeer::doSelectOne($c1);
              if ($mov){
                $mov->delete();
              }
              $obj2->delete();
            }
          }
        }
      }else {
        $c1= new Criteria();
        $c1->add(TsmovlibPeer::NUMCUE,$cireging->getCtaban());
        $c1->add(TsmovlibPeer::REFLIB,$cireging->getNumdep());
        $c1->add(TsmovlibPeer::TIPMOV,$cireging->getTipmov());
        $mov=TsmovlibPeer::doSelectOne($c1);

        if ($mov){
          if ($mov->getStacon()!='C'){
            $sql="select * from tsmovban where numcue='".$cireging->getCtaban()."' and refban='".$cireging->getNumdep()."' and tipmov= '".$cireging->getTipmov()."'";
              if (Herramientas::BuscarDatos($sql,$tsmovban)){
                return 1522;
              }else {
              $mov->delete();
            }

            }else{
              return 1506;
            }
        }else{
            return 1505;
        }
    }

  //Eliminacion del Comprobante
    $c= new Criteria();
    $c->add(Contabc1Peer::NUMCOM,$cireging->getNumcom());
    Contabc1Peer::doDelete($c);

    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$cireging->getNumcom());
    ContabcPeer::doDelete($c);       

    $c= new Criteria();
    $c->add(CiimpingPeer::REFING,$cireging->getRefing());
    //$c->add(CiimpingPeer::FECING,$cireging->getFecing());
    CiimpingPeer::doDelete($c);

    $cireging->delete();

        return -1;

    } catch (Exception $ex){
      return 0;
    }
  }

  /**
   * Función para retornar las etiquetas del formulario
   *
   */
  protected function getLabels()
  {
   $cameti=H::getConfApp2('cametiq', 'ingresos', 'ingreging');
   if ($cameti=="") $cameti='C.I/R.I.F Contribuyente';
   $cametino=H::getConfApp2('cametiqno', 'ingresos', 'ingreging');
   if ($cametino=="") $cametino='Número de Oficio';

    $arreglo=array(
                  'cireging{estatus}' => '.:',
              'cireging{refing}' => 'Referencia:',
              'cireging{fecing}' => 'Fecha:',
              'cireging{codmon}' => 'Moneda:',
              'cireging{valmon}' => 'Valor:',
              'cireging{desing}' => 'Descripción:',
              'cireging{codtip}' => 'Tipo:',
              'cireging{rifcon}' => 'C.I/R.I.F Contribuyente:',
              'cireging{ctaban}' => 'Cuenta Bancaria Nro.:',
              'cireging{tipmov}' => 'Tipo de Movimiento:',
              'cireging{numdep}' => 'Nro. Depósito / Nro. Factura:',
              'cireging{fecdep}' => 'Fecha del Deposito:',
              'cireging{codtipper}' => 'Tipo de Persona a Depositar:',
              'cireging{numofi}' => $cametino.':',
              'cireging{previs}' => 'Previsto:',
                      'cireging{grid}' => '.:',
              'cireging{moning}' => 'Ingreso:',
              'cireging{monrec}' => 'Recargo:',
              'cireging{mondes}' => 'Descuento:',
              'cireging{montot}' => 'Neto:',
              'cireging{comprobante}' => '.:',
              'cireging{reflib}' => 'Reflib:',
              'cireging{staliq}' => 'Staliq:',
              'cireging{fecliq}' => 'Fecliq:',
              'cireging{refliq}' => 'Refliq:',
              'cireging{desliq}' => 'Desliq:',
              'cireging{fecdep}' => 'Fecha del Deposito:',
               'cireging{banco}' => 'Banco:',
               'cireging{cheque}' => 'Cheque:',
               'cireging{agencia}' => 'Agencia:',
               'cireging{fecha}' => 'Fecha:',
               'cireging{tipliq}' => 'Tipo de Liquidación:',
               'cireging{perpre}' => 'Período Devengado:',
               'cireging{numliq}' => 'N° Liquidación:',
               'cireging{grid2}' => '.:',
               'cireging{codpar}' => 'Parque:',
              'cireging{id}' => 'Id:',
            );


   return $arreglo;
  }

  public function validarGeneraComprobante()
  {
    $form="sf_admin/ingreging/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');

    if ($grabo=='')
    { return true;}
    else { return false;}
}

 /**
   * Función para manejar los filtros de búsqueda
   * de la lista
   *
   */
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['refing_is_empty']))
    {
      $criterion = $c->getNewCriterion(CiregingPeer::REFING, '');
      $criterion->addOr($c->getNewCriterion(CiregingPeer::REFING, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['refing']) && $this->filters['refing'] !== '')
    {
      $c->add(CiregingPeer::REFING, strtr("%".$this->filters['refing']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['desing_is_empty']))
    {
      $criterion = $c->getNewCriterion(CiregingPeer::DESING, '');
      $criterion->addOr($c->getNewCriterion(CiregingPeer::DESING, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desing']) && $this->filters['desing'] !== '')
    {
      $c->add(CiregingPeer::DESING, strtr("%".$this->filters['desing']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['rifcon_is_empty']))
    {
      $criterion = $c->getNewCriterion(CiregingPeer::RIFCON, '');
      $criterion->addOr($c->getNewCriterion(CiregingPeer::RIFCON, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['rifcon']) && $this->filters['rifcon'] !== '')
    {
      $c->add(CiregingPeer::RIFCON, strtr("%".$this->filters['rifcon']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomcon_is_empty']))
    {
      $criterion = $c->getNewCriterion(CiregingPeer::NOMCON, '');
      $criterion->addOr($c->getNewCriterion(CiregingPeer::NOMCON, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomcon']) && $this->filters['nomcon'] !== '')
    {
      $c->add(CiconrepPeer::NOMCON, strtr("%".$this->filters['nomcon']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(CiregingPeer::RIFCON, CiconrepPeer::RIFCON);
    }
    if (isset($this->filters['fecing_is_empty']))
    {
      $criterion = $c->getNewCriterion(CiregingPeer::FECING, '');
      $criterion->addOr($c->getNewCriterion(CiregingPeer::FECING, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecing']))
    {
      if (isset($this->filters['fecing']['from']) && $this->filters['fecing']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(CiregingPeer::FECING, date('Y-m-d', $this->filters['fecing']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecing']['to']) && $this->filters['fecing']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(CiregingPeer::FECING, date('Y-m-d', $this->filters['fecing']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(CiregingPeer::FECING, date('Y-m-d', $this->filters['fecing']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['ctaban_is_empty']))
    {
      $criterion = $c->getNewCriterion(CiregingPeer::CTABAN, '');
      $criterion->addOr($c->getNewCriterion(CiregingPeer::CTABAN, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['ctaban']) && $this->filters['ctaban'] !== '')
    {
      $c->add(CiregingPeer::CTABAN, strtr("%".$this->filters['ctaban']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['numdep_is_empty']))
    {
      $criterion = $c->getNewCriterion(CiregingPeer::NUMDEP, '');
      $criterion->addOr($c->getNewCriterion(CiregingPeer::NUMDEP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['numdep']) && $this->filters['numdep'] !== '')
    {
      $c->add(CiregingPeer::NUMDEP, strtr("%".$this->filters['numdep']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fecdep_is_empty']))
    {
      $criterion = $c->getNewCriterion(CiregingPeer::FECDEP, '');
      $criterion->addOr($c->getNewCriterion(CiregingPeer::FECDEP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecdep']))
    {
      if (isset($this->filters['fecdep']['from']) && $this->filters['fecdep']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(CiregingPeer::FECDEP, date('Y-m-d', $this->filters['fecdep']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecdep']['to']) && $this->filters['fecdep']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(CiregingPeer::FECDEP, date('Y-m-d', $this->filters['fecdep']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(CiregingPeer::FECDEP, date('Y-m-d', $this->filters['fecdep']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['numofi_is_empty']))
    {
      $criterion = $c->getNewCriterion(CiregingPeer::NUMOFI, '');
      $criterion->addOr($c->getNewCriterion(CiregingPeer::NUMOFI, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['numofi']) && $this->filters['numofi'] !== '')
    {
      $c->add(CiregingPeer::NUMOFI, strtr("%".$this->filters['numofi']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
  }

    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";
    switch ($name) {
      case 'a':
         switch ($col) {
            case '7':
              $t= new Criteria();                
              $t->add(CitiprubPeer::CODTIPRUB,$grid[$fila][$col-1]);
              $reg= CitiprubPeer::doSelectOne($t);
              if ($reg)
              {              
                $grid[$fila][$col]=$reg->getDestiprub();  
                $tracodpre=H::getConfApp2('tracodpre', 'ingresos', 'ingreging');  
                if ($tracodpre=='S') {       
                  $grid[$fila][0]=$reg->getCodpre();  
                  $id1=$name.'x_'.$fila.'_1';
                  $id2=$name.'x_'.$fila.'_2';
                  $javascript="$('$id1').focus(); $('$id2').focus();";
                }
              } else {
                $grid[$fila][$col-1]="";
                $grid[$fila][$col]="";
                $javascript="alert_('El Tipo de Rubro no esta Registrado');";
              }          
              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;                    
            default:
              break;
         }
        break;
      case 'b':
         switch ($col) {
            case '2':
              $filbandir = H::getConfApp2('filbandir', 'tesoreria', 'tesdefcueban');
              $loguse= $this->getUser()->getAttribute('loguse');
              $t= new Criteria();                
              $t->add(TsdefbanPeer::NUMCUE,$grid[$fila][$col-1]);
              if ($filbandir=='S') {                      
                $sql=' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
                $t->add(TsdefbanPeer::CODDIREC,$sql,Criteria::CUSTOM);
              }
              $reg= TsdefbanPeer::doSelectOne($t);
              if ($reg)
              {              
                $grid[$fila][$col]=$reg->getNomcue();            
              } else {
                $grid[$fila][$col-1]="";
                $grid[$fila][$col]="";
                $javascript="alert_('La Cuenta Bancaria no esta Registrado');";
              }          
              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;    
            case '4':
              $t= new Criteria();                
              $t->add(TstipmovPeer::CODTIP,$grid[$fila][$col-1]);
              $reg= TstipmovPeer::doSelectOne($t);
              if ($reg)
              {              
                $grid[$fila][$col]=$reg->getDestip();                  
              } else {
                $grid[$fila][$col-1]="";
                $grid[$fila][$col]="";
                $javascript="alert_('El Tipo de Movimiento no esta Registrado');";
              }          
              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;  
            case '6':
              $fecing = $this->getRequestParameter('cireging_fecing', '');
              $dateFormat = new sfDateFormat('es_VE');
              $fec2 = $dateFormat->format($fecing, 'i', $dateFormat->getInputPattern('d'));
              $dateFormat = new sfDateFormat('es_VE');
              $fec1 = $dateFormat->format($grid[$fila][$col-1], 'i', $dateFormat->getInputPattern('d'));
              if (!H::validarPeriodoFiscal($grid[$fila][$col-1]))
              {
                $grid[$fila][$col-1]="";
                $javascript="alert_('La Fecha del Dep&oacute;sito est&aacute; fuera del Ejercicio Fiscal');";
              }else  {
                  if ($fec1>$fec2)
                  {
                      $grid[$fila][$col-1]="";
                      $javascript="alert_('La Fecha del Deposito no puede ser mayor a la Fecha del Ingreso');";
                  }
              }         
              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;                                                
            default:
              break;
        }
        break;      
      default:
        # code...
        break;
    }


    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }    

}
