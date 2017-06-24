<?php

/**
 * biedisactmuenew actions.
 *
 * @package    Roraima
 * @subpackage biedisactmuenew
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class biedisactmuenewActions extends autobiedisactmuenewActions
{
   // variable donde se debe colocar el código de error generado en el validateEdit
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;
   public  $coderror1=-1;

  public function CargarTipos()
  {
  $c = new Criteria();
  $lista_tip = BndisbiePeer::doSelect($c);

  $tipos = array();

  foreach($lista_tip as $obj_tip)
  {
    $tipos += array($obj_tip->getCoddis()." - ".$obj_tip->getDesdis() => $obj_tip->getCoddis()." - ".$obj_tip->getDesdis());
  }
  return $tipos;
    }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->bndismue = $this->getBndismueOrCreate();

    $this->tipos = $this->CargarTipos();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBndismueFromRequest();

     if ($this->saveBndismue($this->bndismue)==-1)
      {

        $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('biedisactmuenew/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('biedisactmuenew/list');
        }
        else
        {
          return $this->redirect('biedisactmuenew/edit?id='.$this->bndismue->getId());
        }
     }
      else
        {
              $this->labels = $this->getLabels();
              $err = Herramientas::obtenerMensajeError($this->coderror);
               $this->getRequest()->setError('',$err);
              return sfView::SUCCESS;
        }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateBndismueFromRequest()
  {
    $bndismue = $this->getRequestParameter('bndismue');

    if (isset($bndismue['codact']))
    {
      $this->bndismue->setCodact($bndismue['codact']);
    }
    if (isset($bndismue['codmue']))
    {
      $this->bndismue->setCodmue($bndismue['codmue']);
    }
    if (isset($bndismue['desmue']))
    {
      $this->bndismue->setDesmue($bndismue['desmue']);
    }
    if (isset($bndismue['nrodismue']))
    {
      $this->bndismue->setNrodismue($bndismue['nrodismue']);
    }
    if (isset($bndismue['tipdismue']))
    {
      $this->bndismue->setTipdismue($bndismue['tipdismue']);
    }
    if (isset($bndismue['codmot']))
    {
      $this->bndismue->setCodmot($bndismue['codmot']);
    }
    if (isset($bndismue['desmot']))
    {
      $this->bndismue->setDesmot($bndismue['desmot']);
    }
    if (isset($bndismue['fecdismue']))
    {
      if ($bndismue['fecdismue'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndismue['fecdismue']))
          {
            $value = $dateFormat->format($bndismue['fecdismue'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndismue['fecdismue'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndismue->setFecdismue($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndismue->setFecdismue(null);
      }
    }
    if (isset($bndismue['fecdevdis']))
    {
      if ($bndismue['fecdevdis'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndismue['fecdevdis']))
          {
            $value = $dateFormat->format($bndismue['fecdevdis'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndismue['fecdevdis'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndismue->setFecdevdis($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndismue->setFecdevdis(null);
      }
    }
    if (isset($bndismue['mondismue']))
    {
      $this->bndismue->setMondismue($bndismue['mondismue']);
    }
    if (isset($bndismue['vidutil']))
    {
      $this->bndismue->setVidutil($bndismue['vidutil']);
    }
    if (isset($bndismue['detdismue']))
    {
      $this->bndismue->setDetdismue($bndismue['detdismue']);
    }
    if (isset($bndismue['codubiori']))
    {
      $this->bndismue->setCodubiori($bndismue['codubiori']);
    }
    if (isset($bndismue['desubiori']))
    {
      $this->bndismue->setDesubiori($bndismue['desubiori']);
    }
    if (isset($bndismue['codubides']))
    {
      $this->bndismue->setCodubides($bndismue['codubides']);
    }
    if (isset($bndismue['desubides']))
    {
      $this->bndismue->setDesubides($bndismue['desubides']);
    }
    if (isset($bndismue['obsdismue']))
    {
      $this->bndismue->setObsdismue($bndismue['obsdismue']);
    }
    if (isset($bndismue['codrespat']))
    {
      $this->bndismue->setCodrespat($bndismue['codrespat']);
    }
    if (isset($bndismue['codresuso']))
    {
      $this->bndismue->setCodresuso($bndismue['codresuso']);
    }
    if (isset($bndismue['cedest']))
    {
      $this->bndismue->setCedest($bndismue['cedest']);
    }
    $this->bndismue->setStadismue('A');
    if (isset($bndismue['codestori']))
    {
      $this->bndismue->setCodestori($bndismue['codestori']);
    }
    if (isset($bndismue['codestdes']))
    {
      $this->bndismue->setCodestdes($bndismue['codestdes']);
    }

  }

  public function setVars()
  {
      $this->mascaracatalogo = Herramientas::getX_vacio('codins','bndefins','ForAct','001');
      $this->mascaraformatoubi = Herramientas::getX_vacio('codins','bndefins','ForUbi','001');
      $this->mascaralonformato = Herramientas::getX_vacio('codins','bndefins','LonAct','001');
      $this->mascaralonubicacion = Herramientas::getX_vacio('codins','bndefins','LonUbi','001');
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
     $cajtexmos    = $this->getRequestParameter('cajtexmos');
     $cajtexcom    = $this->getRequestParameter('cajtexcom');
     $cajtexubi    = $this->getRequestParameter('cajtexubi');
     $cajtexdesubi = $this->getRequestParameter('cajtexdesubi');
     $codigo = $this->getRequestParameter('codigo');
     $this->setVars();

     if ($this->getRequestParameter('ajax')=='0')
      {
        $codmue=Herramientas::getX('codact','Bnregmue','codmue',$this->getRequestParameter('codigo'));
        $desmue=Herramientas::getX('codmue','Bnregmue','desmue',$codmue);
        $output = '[["'.$cajtexmos.'","'.$codmue.'",""],["'.$cajtexcom.'","'.$desmue.'"]]';
      }

    elseif ($this->getRequestParameter('ajax')=='1')
      {
        $js=""; $codact=$desmue=$codubi=$desubi=""; $valini="0,00";
        $codrespat=$desrespat=$codresuso=$desresuso=$cedest=$nomapeest=$codestori=$desestori="";
        $t= new Criteria();
        $t->add(BnregmuePeer::CODACT,$this->getRequestParameter('codact'));
        $t->add(BnregmuePeer::CODMUE,$this->getRequestParameter('codigo'));
        $trajo= BnregmuePeer::doSelectOne($t);
        if ($trajo)
        {
          if ($trajo->getStamue()!="D") {
            $codact=$trajo->getCodact();
            $desmue=$trajo->getDesmue();
            $codubi=$trajo->getCodubi();
            $desubi=H::getX_vacio('codubi','Bnubibie','desubi',$codubi);
            $valini=H::FormatoMonto($trajo->getValini());
            $codrespat=$trajo->getCodrespat();
            $desrespat=$trajo->getNomrespat();
            $codresuso=$trajo->getCodresuso();
            $desresuso=$trajo->getNomresuso();
            $cedest=$trajo->getCedest();
            $nomapeest=$trajo->getNomapeest();
            $codestori=$trajo->getCodest();
            $desestori=$trajo->getDesest();
          }else $js="alert('El Bien Mueble esta Desincorporado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }else $js="alert('El Bien Mueble no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";

        $output = '[["javascript","'.$js.'",""],["'.$cajtexmos.'","'.$desmue.'"],["'.$cajtexubi.'","'.$codubi.'"],["'.$cajtexdesubi.'","'.$desubi.'"],["bndismue_mondismue","'.$valini.'"],["bndismue_codrespat","'.$codrespat.'"],["bndismue_nomresppat","'.$desrespat.'"],["bndismue_codresuso","'.$codresuso.'"],["bndismue_nomresuso","'.$desresuso.'"],["bndismue_cedest","'.$cedest.'"],["bndismue_nomapeest","'.$nomapeest.'"],["bndismue_codestori","'.$codestori.'"],["bndismue_desestori","'.$desestori.'"]]';

      }
      elseif ($this->getRequestParameter('ajax')=='2')
      {
        $codigo=str_pad($this->getRequestParameter('codigo'),4,"0",STR_PAD_LEFT);
        $dato=BnmotdisPeer::getDesmot($codigo);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      }
    elseif ($this->getRequestParameter('ajax')=='3')
      {
      	if (strlen($this->mascaraformatoubi)!=strlen($this->getRequestParameter('codigo')))
      	{
      	  $javascript="alert_('El C&oacute;digo de Ubicaci&oacute;n debe ser de &uacute;ltimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();"; $dato="";
      	}else{
        $dato=BnubibiePeer::getDesubicacion($this->getRequestParameter('codigo')); $javascript="";
      	}
        $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
      }
      elseif ($this->getRequestParameter('ajax')=='4')
      {
        $js=""; $codact=$desmue=$codubi=$desubi=$codest=$desest=""; $valini="0,00";
        if (strlen($this->mascaracatalogo)!=strlen($this->getRequestParameter('codigo')))
      	{
      		$js="alert_('El Nivel de Activo debe ser de &uacute;ltimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      	}else {
         if ($this->getRequestParameter('codmue')!="")
         {            
            $t= new Criteria();
            $t->add(BnregmuePeer::CODACT,$this->getRequestParameter('codigo'));
            $t->add(BnregmuePeer::CODMUE,$this->getRequestParameter('codmue'));
            $trajo= BnregmuePeer::doSelectOne($t);
            if ($trajo)
            {
              if ($trajo->getStamue()!="D") {
                $desmue=$trajo->getDesmue();
                $codubi=$trajo->getCodubi();
                $desubi=H::getX_vacio('codubi','Bnubibie','desubi',$codubi);
                $valini=H::FormatoMonto($trajo->getValini());
                $codest=$trajo->getCodest();
                $desest=H::getX_vacio('codest','Bnestcon','desest',$codest);
              }else $js="alert('El Bien Mueble esta Desincorporado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
            }else $js="alert('El Bien Mueble no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
         }else {
            $t= new Criteria();
            $t->add(BnregmuePeer::CODACT,$this->getRequestParameter('codigo'));
            $trajo= BnregmuePeer::doSelectOne($t);
            if (!$trajo)
             $js="alert('El Código de activo no esta registrado con un Bien Mueble'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
         }
      	}

        $output = '[["javascript","'.$js.'",""],["'.$cajtexmos.'","'.$desmue.'"],["'.$cajtexubi.'","'.$codubi.'"],["'.$cajtexdesubi.'","'.$desubi.'"],["bndismue_codestori","'.$codest.'"],["bndismue_desestori","'.$desest.'"],["bndismue_mondismue","'.$valini.'"]]';
      }
      elseif ($this->getRequestParameter('ajax')=='5')
      {
        $javascript="";
        $t= new Criteria();
        $t->add(BndisbiePeer::CODDIS,substr($codigo,0,6));
        $data= BndisbiePeer::doSelectOne($t);
        if ($data)
        {
          if ($data->getDesinc()=='S')
          {
              $e= new Criteria();
              $e->add(BnregmuePeer::CODACT,$this->getRequestParameter('codact'));
              $e->add(BnregmuePeer::CODMUE,$this->getRequestParameter('codmue'));
              $resultado=BnreginmPeer::doSelectOne($e);
              if ($resultado)
              {
                  if ($resultado->getEstatus()=='D')
                  {
                    $javascript="alert('El Bien ya fue Desincorporado');";
                  }
              }
          }

          if ($data->getViduti()!='N'){
            if ($data->getViduti()=='S'){
               $javascript="$('label16').innerHTML = 'Vida Util (+)'; $('vidautil').show()";
             }else{
               $javascript="$('label16').innerHTML = 'Vida Util (-)'; $('vidautil').show()";
             }
          }
          else{
            $javascript="$('vidautil').hide()";
        }
        }
        
        $output = '[["javascript","'.$javascript.'",""]]';
      }
      elseif ($this->getRequestParameter('ajax')=='6')
      {
        $output = '[["","",""],["",""]]';
        $cajtexmos=$this->getRequestParameter('cajtexmos');
        $codigo=$this->getRequestParameter('codigo');
        if ($codigo!="")
        {
          $c= new Criteria();
          $c->add(NphojintPeer::CODEMP,$codigo);
          $result=NphojintPeer::doSelectOne($c);
          if ($result)
          {
            $dato=$result->getNomemp();
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
          }
          else
          {
            if ($cajtexmos=="bndismue_nomrespat") $cajita="bndismue_codrespat"; else $cajita="bndismue_codresuso";
            $javascript="alert('El código del empleado no existe...');$('$cajita').value=''";
            $dato="";
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
          }        
        }
      } 
      elseif ($this->getRequestParameter('ajax')=='7')
   {
    $output = '[["","",""],["",""]]';
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo=$this->getRequestParameter('codigo');
    $respusoben=H::getConfApp2('respusoben', 'bienes', 'bieregactmued');
    if ($codigo!="")
    {
        if ($respusoben=='S')
        {
      $c= new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$codigo);
      $result=OpbenefiPeer::doSelectOne($c);
      if ($result)
      {
        $dato=$result->getNomben();
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }
      else
      {
        if ($cajtexmos=="bndismue_nomrespat") $cajita="bndismue_codrespat"; else $cajita="bndismue_codresuso";
        $javascript="alert('El código del Beneficiario no existe...');$('$cajita').value=''";
        $dato="";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }            
        }else {
      $c= new Criteria();
      $c->add(NphojintPeer::CODEMP,$codigo);
      $result=NphojintPeer::doSelectOne($c);
      if ($result)
      {
        $dato=$result->getNomemp();
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }
      else
      {
        if ($cajtexmos=="bndismue_nomrespat") $cajita="bndismue_codrespat"; else $cajita="bndismue_codresuso";
        $javascript="alert('El código del empleado no existe...');$('$cajita').value=''";
        $dato="";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
        }
    }
   }
    elseif ($this->getRequestParameter('ajax')=='8')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $js="";
    $dato=""; $dato1=""; $dato2="";
    
    $r= new Criteria();
    $r->add(BncatestPeer::CEDEST,$this->getRequestParameter('codigo'));
    $reg= BncatestPeer::doSelectOne($r);
    if ($reg) {
        $dato=$reg->getNomapeest();
        $dato1=$reg->getCedrep();
        $dato2=$reg->getNomaperep();
    }
    else
        $js="alert('El Estudiante no existe'); $('bndismue_cedest').value='', $('bndismue_cedest').focus();";
    
    $output = '[["'.$cajtexcom.'","'.$dato.'",""],["bndismue_cedrep","'.$dato1.'",""],["bndismue_nomaperep","'.$dato2.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   } 
   elseif ($this->getRequestParameter('ajax')=='9')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $js="";
    $dato="";
    
    $r= new Criteria();
    $r->add(BnestconPeer::CODEST,$this->getRequestParameter('codigo'));
    $reg= BnestconPeer::doSelectOne($r);
    if ($reg)
        $dato=$reg->getDesest();
    else
        $js="alert('El Estado de Conservación no existe'); $('$cajtexmos').value=''; $('$cajtexcom').value=''; $('$cajtexmos').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   } 


        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }


  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
    $this->bndismue = $this->getBndismueOrCreate();
    $this->updateBndismueFromRequest();

    $c = new Criteria();
    $c->add(BndisbiePeer::CODDIS,substr($this->bndismue->getTipdismue(),0,6));
    $bndisbie = BndisbiePeer::doSelectOne($c);

    if ($bndisbie){
      if ($bndisbie->getDesinc()=='S'){

        $desincorpora = true;
      }else{
        $desincorpora = false;
      }

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

      if ($bndisbie->getAfecon()=='S'){
        $c = new Criteria();
        $c->add(BndefconPeer::CODACT,$this->bndismue->getCodact());
        $c->add(BndefconPeer::CODMUE,$this->bndismue->getCodmue());
        $bndefcon = BndefconPeer::doSelectOne($c);

          if ($bndefcon){
            $c = new Criteria();
            $c->add(BnregmuePeer::CODACT,$this->bndismue->getCodact());
            $c->add(BnregmuePeer::CODMUE,$this->bndismue->getCodmue());
            $bnregmue = BnregmuePeer::doSelectOne($c);
              if ($bnregmue)
              {
                  $x = Muebles::grabarComprobante($this->bndismue,$bnregmue,$comprobante,$desincorpora,$bndefcon);
                  $concom = $concom + 1;

                  $form = "sf_admin/biedisactmuenew/confincomgen";
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

              // }
              }
            }else{
              $this->msjtres="El Activo de esta Disposicion genera un Movimiento contable, pero este no puede ser realizado ya que dicho Activo no tiene Definicion Contable";
            }
          }else{
            $this->msjtres="No se Puede Generar el Movimiento Contable por el Tipo de Definicion de este Movimiento.";
        }
    }else{
      $this->msjtres="Este movimiento esta definido, que no se pueda generar movimiento contable";
    }

      $output =  '[["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }


 /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveBndismue($bndismue)
  {

    $this->coderror = Muebles::Validar_biedisactmuenew($bndismue->getFecdismue(),$bndismue->getFecdevdis());
    if ($this->coderror==-1)
    {
      if (!$bndismue->getId())
      {
        self::GenerarComprobante($bndismue, array());
        return Muebles::SalvarBiedisactmuenew($bndismue);
      }else{
        $c = new Criteria();
        $c->add(BnregmuePeer::CODACT,$bndismue->getCodact());
        $c->add(BnregmuePeer::CODMUE,$bndismue->getCodmue());
        $bnregmue = BnregmuePeer::doSelectOne($c);
        if ($bnregmue)
        {
          if ($bndismue->getCodrespat()!='' && $bndismue->getCodrespat()!=$bnregmue->getCodrespat())
          {
            $bnregmue->setCodrespat($bndismue->getCodrespat());
          }
          if ($bndismue->getCodresuso()!='' && $bndismue->getCodresuso()!=$bnregmue->getCodresuso())
          {
            $bnregmue->setCodresuso($bndismue->getCodresuso());
          }
          if ($bndismue->getCedest()!='' && $bndismue->getCedest()!=$bnregmue->getCedest())
          {
            $bnregmue->setCedest($bndismue->getCedest());
          }
          if ($bndismue->getCodestdes()!='' && $bndismue->getCodestdes()!=$bnregmue->getCodest())
          {
            $bnregmue->setCodest($bndismue->getCodestdes());
          }
          $bnregmue->save();
        }
      	$bndismue->save();
      }
    }
    return $this->coderror;
  }


  public function GenerarComprobante(&$bndismue, $grid)
  {
      $concom=1;
      $form="sf_admin/biedisactmuenew/confincomgen";
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

          $tiptra=H::getX_vacio('CODINS','Bndefins','Codtiptra','001');
          $this->numero = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]),'BIE',$tiptra);

          $bndismue->setNumcom($this->numero);
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');

     // $grid=Herramientas::CargarDatosGridv2($this,$this->objeto,true);

  }

/**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->bndismue = $this->getBndismueOrCreate();
    $this->setVars();
    $this->tipos = $this->CargarTipos();
    $this->updateBndismueFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
      	if($this->coderror1==529)
      	{
      	  $err = Herramientas::obtenerMensajeError($this->coderror1);
          $this->getRequest()->setError('bndismue{fecdismue}',$err);
      	}
      	if($this->coderror1==521)
      	{
      	  $err = Herramientas::obtenerMensajeError($this->coderror1);
          $this->getRequest()->setError('bndismue{fecdismue}',$err);
      	}
      	if($this->coderror1==530)
      	{
      	  $err = Herramientas::obtenerMensajeError($this->coderror1);
          $this->getRequest()->setError('bndismue{fecdevdis}',$err);
      	}
        if($this->coderror1==508)
      	{
      	  $err = Herramientas::obtenerMensajeError($this->coderror1);
          $this->getRequest()->setError('',$err);
      	}
      }
    }

    return sfView::SUCCESS;
  }

  protected function deleteBndismue($bndismue)
  {
    return Muebles::EliminarBiedisactmuenew($bndismue);
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
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->bndismue = $this->getBndismueOrCreate();
      try{ $this->updateBndismueFromRequest();}catch(Exception $ex){}
       
        $t= new Criteria();
        $t->add(BnregmuePeer::CODACT,$this->getRequestParameter('bndismue[codact]'));
        $t->add(BnregmuePeer::CODMUE,$this->getRequestParameter('bndismue[codmue]'));
        $t->add(BnregmuePeer::STAMUE,'D');
        $trajo= BnregmuePeer::doSelectOne($t);
        if ($trajo)
        {
          $this->coderror1=219;
          return false;
        }

      if ($this->getRequestParameter('bndismue[fecdismue]')!="")
      {
      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('bndismue[fecdismue]'))==true)
  	  {
        $this->coderror1=529;
        return false;
  	  }

      if (Tesoreria::validarFechaPerContable($this->getRequestParameter('bndismue[fecdismue]')))
      {
	    $this->coderror1=521;
	    return false;
	    }
       if ($this->getRequestParameter('bndismue[fecdevdis]')!=""){
    		if (Tesoreria::validarFechaMayorMenor($this->getRequestParameter('bndismue[fecdismue]'),$this->getRequestParameter('bndismue[fecdevdis]'),'>'))
    		{
    		  $this->coderror1=530;
    		  return false;
    		}
       }
      }
      if ($this->getRequestParameter('id')=='') {
        $cq = new Criteria();
        $cq->add(BndisbiePeer::CODDIS,substr($this->getRequestParameter('bndismue[tipdismue]'),0,6));
        $resq = BndisbiePeer::doSelectOne($cq);
        if ($resq){
          if ($resq->getAfecon()=='S')
    	      if (self::validarGeneraComprobante())
    	      {
      		    $this->coderror1=508;
      		    return false;
    		    }
        }
      }

      return true;
    }else return true;
  }

  public function validarGeneraComprobante()
  {
    $form="sf_admin/biedisactmuenew/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');

    if ($grabo=='')
    { return true;}
    else { return false;}
  }

     protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codact_is_empty']))
    {
      $criterion = $c->getNewCriterion(BndismuePeer::CODACT, '');
      $criterion->addOr($c->getNewCriterion(BndismuePeer::CODACT, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codact']) && $this->filters['codact'] !== '')
    {
      $c->add(BndismuePeer::CODACT, '%'.strtr($this->filters['codact'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codmue_is_empty']))
    {
      $criterion = $c->getNewCriterion(BndismuePeer::CODMUE, '');
      $criterion->addOr($c->getNewCriterion(BndismuePeer::CODMUE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codmue']) && $this->filters['codmue'] !== '')
    {
      $c->add(BndismuePeer::CODMUE, '%'.strtr($this->filters['codmue'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['desmue_is_empty']))
    {
      $criterion = $c->getNewCriterion(BndismuePeer::DESMUE, '');
      $criterion->addOr($c->getNewCriterion(BndismuePeer::DESMUE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desmue']) && $this->filters['desmue'] !== '')
    {
      $c->add(BnregmuePeer::DESMUE, '%'.strtr($this->filters['desmue'], '*', '%').'%', Criteria::LIKE);
      $c->addJoin(BndismuePeer::CODACT, BnregmuePeer::CODACT);
      $c->addJoin(BndismuePeer::CODMUE, BnregmuePeer::CODMUE);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fecdismue_is_empty']))
    {
      $criterion = $c->getNewCriterion(BndismuePeer::FECDISMUE, '');
      $criterion->addOr($c->getNewCriterion(BndismuePeer::FECDISMUE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecdismue']))
    {
      if (isset($this->filters['fecdismue']['from']) && $this->filters['fecdismue']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(BndismuePeer::FECDISMUE, date('Y-m-d', $this->filters['fecdismue']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecdismue']['to']) && $this->filters['fecdismue']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(BndismuePeer::FECDISMUE, date('Y-m-d', $this->filters['fecdismue']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(BndismuePeer::FECDISMUE, date('Y-m-d', $this->filters['fecdismue']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['stadismue_is_empty']))
    {
      $criterion = $c->getNewCriterion(BndismuePeer::STADISMUE, '');
      $criterion->addOr($c->getNewCriterion(BndismuePeer::STADISMUE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['stadismue']) && $this->filters['stadismue'] !== '')
    {
      $c->add(BndismuePeer::STADISMUE, '%'.strtr($this->filters['stadismue'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nrodismue_is_empty']))
    {
      $criterion = $c->getNewCriterion(BndismuePeer::NRODISMUE, '');
      $criterion->addOr($c->getNewCriterion(BndismuePeer::NRODISMUE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nrodismue']) && $this->filters['nrodismue'] !== '')
    {
      $c->add(BndismuePeer::NRODISMUE, '%'.strtr($this->filters['nrodismue'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codalt_is_empty']))
    {
      $criterion = $c->getNewCriterion(BndismuePeer::CODALT, '');
      $criterion->addOr($c->getNewCriterion(BndismuePeer::CODALT, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codalt']) && $this->filters['codalt'] !== '')
    {
      $c->add(BnregmuePeer::CODALT, strtr("%".$this->filters['codalt']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(BndismuePeer::CODMUE, BnregmuePeer::CODMUE);
      $c->addJoin(BndismuePeer::CODACT, BnregmuePeer::CODACT);
      $c->setIgnoreCase(true);
    }
  }
}
