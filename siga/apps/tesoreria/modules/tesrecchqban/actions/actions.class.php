<?php

/**
 * tesrecchqban actions.
 *
 * @package    siga
 * @subpackage tesrecchqban
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesrecchqbanActions extends autotesrecchqbanActions
{
  //public $form="sf_admin/tesrecchqban/confincomgen";

  public function executeIndex()
  {
    return $this->forward('tesrecchqban', 'edit');
  }        
    
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
  }

  public function configGrid($arreglo=array())
  {
     if (count($arreglo)>0)
     {
         $i=0;
         while ($i<count($arreglo))
         {
           $opordpag2= new Opordpag();
           $opordpag2->setCheck($arreglo[$i]["check"]);
           $opordpag2->setNumche($arreglo[$i]["numche"]);
           $opordpag2->setNombeneficiario($arreglo[$i]["nomben"]);
           $opordpag2->setCadfec($arreglo[$i]["cadfec"]);
           $opordpag2->setMonori($arreglo[$i]["monori"]);
           $opordpag2->setMonche($arreglo[$i]["monche"]);
           $opordpag2->setMoneda($arreglo[$i]["moneda"]);
           $opordpag2->setFecaju($arreglo[$i]["fecaju"]);
           $opordpag2->setMonaju($arreglo[$i]["monaju"]);
           $opordpag2->setMajust($arreglo[$i]["majust"]);
           $opordpag2->setValmon($arreglo[$i]["valmon"]);
           $opordpag2->setObserve('');
           $opordpag2->setFecemi($arreglo[$i]["fecemi"]);
           $opordpag2->setRefpag($arreglo[$i]["refpag"]);
           $opordpag2->setTipmovi($arreglo[$i]["tipmov"]);
           $det[]=$opordpag2;
           $i++;
         }
     }else {
         $c= new Criteria();
         $c->add(OpordpagPeer::NUMORD,'');
         $det= OpordpagPeer::doSelect($c);
     }
     
     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesrecchqban/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

     $this->obj =$this->columnas[0]->getConfig($det);

    $this->tsdefban->setObj($this->obj);    
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $sw=true; $dato=""; $js="";
    switch ($ajax){
      case '1':
          $t= new Criteria();
          $t->add(TsdefbanPeer::NUMCUE,$codigo);
          $reg= TsdefbanPeer::doSelectOne($t);
          if($reg)
          {
              $dato=$reg->getNomcue();
          }else {
              $js="alert('La Cuenta Bancaria no Existe'); $('tsdefban_numcue').value=''; $('tsdefban_nomcue').value=''; $('tsdefban_numcue').focus();";
          }         
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':          
          $dateFormat = new sfDateFormat('es_VE');
          $fec1 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));
          
          if (H::validarPeriodoFiscal($codigo))
          {
              if (Tesoreria::validaPeriodoCerrado($codigo))
              {
                  $js="alert('El Periodo en Presupuesto fue Cerrado'); $('tsdefban_fechades').value=''; $('tsdefban_fechades').focus();";
              }
          }
          else {
              $js="alert_('Fecha fuera del Per&iacute;odo'); $('tsdefban_fechades').value=''; $('tsdefban_fechades').focus();";
          }         
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;        
      case '3':        
        $numcue = $this->getRequestParameter('numcue','');
        $fecdes = $this->getRequestParameter('fecdes','');
        $sw=false;  $arreglo=array();

        if ($numcue!='')
        {
          if ($fecdes!="")
          {
              $dateFormat = new sfDateFormat('es_VE');
              $fec1 = $dateFormat->format($fecdes, 'i', $dateFormat->getInputPattern('d'));
              
              $dateFormat = new sfDateFormat('es_VE');
              $fec2 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));

              if (H::validarPeriodoFiscal($codigo))
              {
                  if (Tesoreria::validaPeriodoCerrado($codigo))
                  {
                      $js="alert('El Periodo en Presupuesto fue Cerrado'); $('tsdefban_fechahas').value=''; $('tsdefban_fechahas').focus();";
                  }else {
                      Tesoreria::cargarPagosAjuste($numcue,$fec1,$fec2,$arreglo); 
                  }
              }
              else {
                  $js="alert_('Fecha fuera del Per&iacuteModo'); $('tsdefban_fechahas').value=''; $('tsdefban_fechahas').focus();";
              }                  

          }else {
              $js="alert('Debe introducir la Fecha Desde'); $('tsdefban_fechahas').value=''; $('tsdefban_fechahas').focus();"; 
          }
        }else {
           $js="alert('Debe Introducir la Cuenta Bancaria'); $('tsdefban_fechahas').value=''; $('tsdefban_fechahas').focus();"; 
        }
        $this->params=array();
        $this->tsdefban = $this->getTsdefbanOrCreate();
        $this->updateTsdefbanFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($arreglo);
        
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;    
      case '4':          
        $this->getUser()->getAttributeHolder()->remove('retencion','tesrecchqban');          
        $output = '[["","",""],["","",""],["","",""]]';
        break;        
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw) return sfView::HEADER_ONLY;
  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
        $this->tsdefban = $this->getTsdefbanOrCreate();
        $this->updateTsdefbanFromRequest();
        
        $p= new Criteria();
        $p->add(CpdocajuPeer::TIPAJU,array('AJPA', 'AJCA', 'AJCO'),Criteria::IN);
        $resul=  CpdocajuPeer::doSelect($p);
        if (count($resul)<3)
        {
            $this->coderr=22;
            return false;            
        }       
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
        if (count($grid[0])==0)
        {
            $this->coderr=4;
            return false;
        }
      
          if (self::ValidarGeneroComprobantes())
          {
            $this->coderr=508;
          }

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
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
    $concom=$this->getRequestParameter('tsdefban[totalcomprobantes]');
    //Grabar el comprobante contable
    $i=0;
    $numcompag="";
    $numcom="";
    $this->form="sf_admin/tesrecchqban/confincomgen";
    while ($i<$concom)
    {
      $f[$i]=$this->form.$i;
      //voy a grabar solo los comprobantes cuyas variables de sesion traiga datos
      if ($this->getUser()->getAttribute('contabc[numcom]',null,$f[$i])!="")
      {
        $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$f[$i]);
        $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$f[$i]);
        $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$f[$i]);
        $descom=$this->getUser()->getAttribute('contabc[descom]',null,$f[$i]);
        $debito=$this->getUser()->getAttribute('debito',null,$f[$i]);
        $credito=$this->getUser()->getAttribute('credito',null,$f[$i]);
        $grid=$this->getUser()->getAttribute('grid',null,$f[$i]);

        $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$f[$i]);
        $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$f[$i]);
        $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$f[$i]);
        $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$f[$i]);
        $this->getUser()->getAttributeHolder()->remove('debito',$f[$i]);
        $this->getUser()->getAttributeHolder()->remove('credito',$f[$i]);
        $this->getUser()->getAttributeHolder()->remove('grid',$f[$i]);

        $numcom = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$f[$i]));
        $numcompag=$numcompag."_".$numcom;
      }
      else
      {
         $numcom="";
         $numcompag=$numcompag."_".$numcom;
      }
      $i++;
    }//  while ($i<$concom)
    
    $comprobante= array();
    $concom="";
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);    
    Tesoreria::ajustarPagosDiferencial($clasemodelo,$grid,"N",$numcompag,$comprobante,$concom,$cadena,$cadena1);
    if (Tesoreria::BuscarRetenciones($grid))
        $this->getUser()->setAttribute('retencion', 'S','tesrecchqban');
    
    return -1;
  }
  
    /**
   * FunciÃ³n para procesar _todas_ las funciones Ajax del formulario
   * Cada funciÃ³n esta identificada con el valor de la vista "ajax"
   * el cual traerÃ¡ el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxfila()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";

    switch ($col) {
         case ('8'):   //Fecha Ajuste
            if ($grid[$fila][7]!="")
            {
              $dateFormat = new sfDateFormat('es_VE');
              $fecant = $dateFormat->format($grid[$fila][12], 'i', $dateFormat->getInputPattern('d'));
              
              $dateFormat = new sfDateFormat('es_VE');
              $fecact = $dateFormat->format($grid[$fila][7], 'i', $dateFormat->getInputPattern('d'));
              
              if ($fecact<$fecant)
              {   
                  $javascript = "alert_('La Fecha es Inv&aacute;lida, ya que es menor que la Fecha de Emisi&oacute;n');";
                  $grid[$fila][7]=date('d/m/Y');
              }else {
                  $idfila=$name.'x_'.$fila.'_1';
                  $javascript = "$('$idfila').checked=true;";              
              }
            }else {
                $javascript = "alert_('Debe Introducir la Fecha de Ajuste');";
                $grid[$fila][7]=date('d/m/Y');
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;        
          case ('9'):  //Monto Ajuste
            if (H::toFloat($grid[$fila][8])>0)
            {
              $cal1=H::toFloat($grid[$fila][8])*H::toFloat($grid[$fila][10],6);
              $grid[$fila][11]=number_format($cal1,2,',','.');
              
              $cal2=H::toFloat($grid[$fila][11])-H::toFloat($grid[$fila][5]);
              if ($cal2<0)
              {
                 $cal2=$cal2*-1; 
                 $grid[$fila][15]="-";
              }else $grid[$fila][15]="+";
              $grid[$fila][9]=number_format($cal2,2,',','.');
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
  
  public function ValidarDatosenGrid($grid)
  {
      $x=$grid[0];
      $j=0;
      $sel=false;
      while ($j<count($x) && !$sel)
      {
        if ($x[$j]->getCheck()=="1")
        {
          $sel=true;
        }
        $j++;
      }

      if ($sel)
        return true;
      else
        return false;
  }  
  
  public function executeComprobante()  /////GENERAR COMPROBANTE CONTABLE
  {
    $this->tsdefban = $this->getTsdefbanOrCreate();
    $this->updateTsdefbanFromRequest();
    $che="";
    $this->msgerr="";
    $this->msgerr2="";
    $alerta="";
    $comprobante= array();
    $concom=1;
    //$this->form="sf_admin/tesrecchqban/confincomgen";
    $output = '[["","",""]]';
     //verificar que los datos esten completos
     if ($this->tsdefban->getNumcue()!="")
     {
       $this->configGrid();
       $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
       if ($this->ValidarDatosenGrid($grid)) {           
           Tesoreria::ajustarPagosDiferencial($this->tsdefban,$grid,"S","",$comprobante,$concom,$cadena,$cadena1);
           if ($cadena!="")
              $alerta="Los Ajustes de las siguientes Ordenes ".$cadena.", No se pueden realizar debido a que no poseen un Compromiso ";
           if ($cadena1!="")
              $alerta=$alerta." Los Ajustes de las siguientes Ordenes ".$cadena1.", No se pueden ser realizar, por falta de disponibilidad presupuestaria";
          $this->msgerr2=$alerta;
       }
       else
           $this->msgerr="Debe seleccionar al menos un Pago...";	    
     }//if  validaciones de campos distinto de vacio
     else
     {
     	$this->msgerr="La Cuenta Bancaria no puede estar en Blanco...";
     }
     
     $this->formulario=array(); 
     $this->i="";
     if (trim($this->msgerr)=="" && count($comprobante)>0)
     {
       //verificamos que se haya generado el comprobante
       if ($comprobante[0]->getError()=="S") //hubo un error al generar comprobante
       {
          $this->msgerr=$comprobante[0]->getMsgerr();
          $this->i="";
          $this->formulario=array();
          $output = '[["tsdefban_totalcomprobantes","'.$concom.'",""]]';
       }
       else
       {
        //Preparar las variables de sesion necesarias para el formulario de Comprobante CONFINCOMGEN       
        $i=0;
        $this->form="sf_admin/tesrecchqban/confincomgen";
        while ($i<$concom)
        {
          $f[$i]=$this->form.$i;
          $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
          //Cabecera del Comprobante
          $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
          $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
          $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
          $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
          //Detalle (Asientos Contables)
          $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
          $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
          $this->getUser()->setAttribute('tipmov', '');
          $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
          $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
          $i++;
        }
        $this->i=$concom-1;
        $this->formulario=$f;

        $output = '[["tsdefban_totalcomprobantes","'.$concom.'",""]]';
       }
    }//if ($this->msgerr1!="")
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }  
  
  public function ValidarGeneroComprobantes()
  {
    $i=0;
    $concom=0;
    if ($this->getRequestParameter('tsdefban[totalcomprobantes]')!="") $concom=$this->getRequestParameter('tsdefban[totalcomprobantes]');
    $sel=false;
    $this->form="sf_admin/tesrecchqban/confincomgen";
    if ($concom==0)  return true;
    while ($i<$concom && !$sel)
    {
      $f[$i]=$this->form.$i;
      //verificar si se genero comprobante
      if ($this->getUser()->getAttribute('grabo',null,$f[$i])=="")
      {
        $sel=true;
      }
       $i++;
    }// while ($i<$concom && !$sel)
    
    

     if ($sel)
        return true;
     else
        return false;

  }  
  
}
