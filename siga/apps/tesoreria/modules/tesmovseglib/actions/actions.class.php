<?php

/**
 * tesmovseglib actions.
 *
 * @package    Roraima
 * @subpackage tesmovseglib
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesmovseglibActions extends autotesmovseglibActions
{

  private $coderror = -1;
  public  $coderror1=-1;
  public  $coderror2=-1;
  public  $coderror4=-1;
  public  $coderror5=-1;
  public  $coderror6=-1;

 
    public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/tsmovlib/filters');

    $loguse= $this->getUser()->getAttribute('loguse');
    $filbandir = H::getConfApp2('filbandir', 'tesoreria', 'tesdefcueban');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 

     // 15    // pager
    $this->pager = new sfPropelPager('Tsmovlib', 15);
    $c = new Criteria();
    if ($filbandir=='S'){
      $this->sql='tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(TsmovlibPeer::NUMCUE,$this->sql,Criteria::CUSTOM);
      $c->addJoin(TsmovlibPeer::NUMCUE,TsdefbanPeer::NUMCUE); 
    }else if ($filsoldir=='S'){
      $this->sql='tsmovlib.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(TsmovlibPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
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
      $this->tsmovlib = $this->getTsmovlibOrCreate();
      try{ $this->updateTsmovlibFromRequest();}catch(Exception $ex){}
    if ($this->tsmovlib->getId()=="")
    {
      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('tsmovlib[feclib]'))==true)
  	{
      $this->coderror6=529;
      return false;
  	}

      if (Tesoreria::validaPeriodoCerradoBanco($this->getRequestParameter('tsmovlib[feclib]'),$this->getRequestParameter('tsmovlib[numcue]'))==false)
  	{
      $this->coderror6=537;
      return false;
  	}

    $valblocueban=H::getConfAppGen('valblocueban');
    if ($valblocueban=='S'){
      if (Tesoreria::validaBancoBloqueado($this->getRequestParameter('tsmovlib[feclib]'),$this->getRequestParameter('tsmovlib[numcue]')))
      {
        $this->coderror6=5007;
        return false;
      }
    }

    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($filsoldir=='S'){
      if ($this->getRequestParameter('tsmovlib[coddirec]')==''){
         if ($cambiareti=='S') $this->coderror4=3014; else $this->coderror4=3013;
         return false;
      }
    }


      $c = new Criteria();
      $c->add(TstipmovPeer::CODTIP,$this->tsmovlib->getTipmov());

      $tstipmov = TstipmovPeer::doSelectOne($c);

      if($tstipmov){
        if($tstipmov->getDebcre()=='C'){
          $contaba = ContabaPeer::doSelectOne(new Criteria());
          $saldo=0;
          if(!Tesoreria::chequear_disponibilidad_financiera($this->tsmovlib->getNumcue(),$this->tsmovlib->getMonmov(),$contaba->getFecini(),$this->tsmovlib->getFeclib(),$saldo)){
            $this->coderror5 = 195;
            return false;
          }
        }
      }


      if (Tesoreria::validarFechaPerContable($this->getRequestParameter('tsmovlib[feclib]')))
      {
    $this->coderror1=521;
    return false;
    }

    if (Tesoreria::validarFechaMayorMenor($this->getRequestParameter('tsmovlib[feclib]'),$this->getRequestParameter('tsmovlib[fecing]'),'>'))
      {
    $this->coderror2=523;
    return false;
    }

    if ($this->getRequestParameter('tsmovlib[savemovcero]')!='S' || (H::toFloat($this->getRequestParameter('tsmovlib[monmov]'))>0))
    {
      if (self::validarGeneraComprobante())
      {
        $this->coderror4=508;
        return false;
      }
    }
      $mostabrei=H::getConfApp2('mostabrei', 'tesoreria', 'tesmovseglib');
      if ($mostabrei=='S'){
        if ($this->getRequestParameter('tsmovlib[refrei]')!=''){
          $e=new Criteria();
          $e->add(TsmovlibPeer::REFREI,$this->getRequestParameter('tsmovlib[refrei]'));
          $rege= TsmovlibPeer::doSelectOne($e);
          if ($rege){
            $this->coderror4=5013;
            return false;
          }
        }
      }

    }
      return true;
    }else return true;
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
    $this->tsmovlib = $this->getTsmovlibOrCreate();
    try{ $this->updateTsmovlibFromRequest();}catch(Exception $ex){}

    $this->gencorrel=$this->getUser()->getAttribute('confcorcom','S');
    $this->labels = $this->getLabels();

    if($this->coderror1!=-1)
     {
       $err1 = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('tsmovlib{feclib}',$err1);
     }
     if($this->coderror2!=-1)
     {
       $err = Herramientas::obtenerMensajeError($this->coderror2);
       $this->getRequest()->setError('tsmovlib{feclib}',$err);
     }
     if($this->coderror5!=-1)
     {
       $err = Herramientas::obtenerMensajeError($this->coderror5);
       $this->getRequest()->setError('tsmovlib{monmov}',$err);
     }
     if($this->coderror6!=-1)
     {
       $err = Herramientas::obtenerMensajeError($this->coderror6);
       $this->getRequest()->setError('tsmovlib{feclib}',$err);
     }

    if($this->coderror4!=-1)
     {
       $err2 = Herramientas::obtenerMensajeError($this->coderror4);
       $this->getRequest()->setError('',$err2);
     }


    return sfView::SUCCESS;
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
  protected function saveTsmovlib($tsmovlib)
  {
    $gridrei = Herramientas::CargarDatosGridv2($this,$this->obj2);
    if ($tsmovlib->getId())
    {
      Tesoreria::salvarTesmovseglib($tsmovlib,"",$gridrei);
    }
    else
    {
      $moneda=$tsmovlib->getCodmon();
      $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      if ($moneda2!=$moneda)
              $valor=$tsmovlib->getValmon();
      else
          $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
      
       $tsmovlib->setMonmov($tsmovlib->getMonmov()*$valor);

      if ($this->getUser()->getAttribute('grabo',null,$this->getUser()->getAttribute('formulario'))=='S')
      {
        $numcom='';
        if ($tsmovlib->getSavemovcero()!='S' || $tsmovlib->getMonmov()>0) {
        $getform=$this->getRequestParameter('formulario');
        $formulario=split('!',$getform);

        $this->getUser()->setAttribute('space',$formulario[0]);
        $i=0;
        while ($i<count($formulario)-1)
        {
          //print 'Entro';exit();
          $formcont="sf_admin/tesmovseglib/confincomgen".$i;
          $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formcont);
          $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formcont);
          $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formcont);
          $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formcont);
          $debito=$this->getUser()->getAttribute('debito',null,$formcont);
          $credito=$this->getUser()->getAttribute('credito',null,$formcont);
          $grid=$this->getUser()->getAttribute('grid',null,$formcont);

          $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formcont);
          $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formcont);
          $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formcont);
          $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formcont);
          $this->getUser()->getAttributeHolder()->remove('debito',$formcont);
          $this->getUser()->getAttributeHolder()->remove('credito',$formcont);
          $this->getUser()->getAttributeHolder()->remove('grid',$formcont);
          
           $forconuney="";
            $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
            if ($varemp)
            if(array_key_exists('generales',$varemp)) {
               if(array_key_exists('forconuney',$varemp['generales']))
               {
                $forconuney=$varemp['generales']['forconuney'];
               }
           }   
           if ($forconuney=='S')
           {
                $nroorden7='########';
                $tipo=H::getX_vacio('CODTIP', 'Tstipmov', 'Tipo', $tsmovlib->getTipmov());
                $formato = substr($tsmovlib->getFeclib(),5,2).'-'.$tipo.'-'; 
                $longitud='3';       
                $valido=false;
                $mes=substr($tsmovlib->getFeclib(),5,2);//date('m');
                $sql="Select Max(Numcom) as correl from Contabc where Numcom Like '".$mes."-".$tipo."-%'";
                if (Herramientas::BuscarDatos($sql,$result))
                {
                  $cor=substr($result[0]["correl"],5,3)+1;
                }else $cor=1;

                while(!$valido){
                     $nroorden7 = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

                      $c = new Criteria();
                      $c->add(ContabcPeer::NUMCOM,$nroorden7);
                      $clase = ContabcPeer::doSelectOne($c);
                      if(!$clase){
                        $valido = true;
                      }else { $cor=$cor +1;}
                }
                $numcom=$nroorden7;
           }
           $tiptramov=H::getConfApp2('tiptramov', 'tesoreria', 'tesmovseglib');
           if ($tiptramov=='S')
             $tiptra=H::getX_vacio('CODTIP','Tstipmov','Codtiptra',$tsmovlib->getTipmov());
           else
             $tiptra=H::getX_vacio('NUMCUE','Tsdefban','Codtiptra',$tsmovlib->getNumcue());
          $numcom = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formcont),'TES',$tiptra,$tsmovlib->getCoddirec());
          $tsmovlib->setNumcom($numcom);
          //Tesoreria::Salvarconfincomgen($numcom,$reftra,$feccom,$descom,$debito,$credito);
          //Tesoreria::Salvar_asientosconfincomgen($numcom,$reftra,$feccom,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[0]));
          $i++;
        }

        $this->getUser()->getAttributeHolder()->remove('grabo',$this->getUser()->getAttribute('formulario'));
        }
        Tesoreria::salvarTesmovseglib($tsmovlib,$numcom,$gridrei);
        Tesoreria::actualiza_Bancos('A', $tsmovlib->getDebcre(), $tsmovlib->getNumcue(), ($tsmovlib->getMonmov()*$valor));

      }else {
        if ($tsmovlib->getSavemovcero()=='S') {
          Tesoreria::salvarTesmovseglib($tsmovlib,"",$gridrei);
          Tesoreria::actualiza_Bancos('A', $tsmovlib->getDebcre(), $tsmovlib->getNumcue(), ($tsmovlib->getMonmov()*$valor));
      }
    }
    }

  }


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->tsmovlib = $this->getTsmovlibOrCreate();
    $this->cuentamov="";
    $this->oculeli="";
    $this->bloqfec="";
    $this->configGrid();
    $this->configGrid2();
	$varemp = $this->getUser()->getAttribute('configemp');
	if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesmovseglib',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('cuentamov',$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']))
	       {
	       	$this->cuentamov=$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']['cuentamov'];
	       }
	     	 if(array_key_exists('oculeli',$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']))
	       {
	       	$this->oculeli=$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']['oculeli'];
	       }
	       if(array_key_exists('bloqfec',$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']))
	       {
	       	$this->bloqfec=$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']['bloqfec'];
	       } 
	     }

    ///////////////////////////////////
    /* CHEQUEO PARA VER SI PUEDE O NO ANU/ELIMINAR */

    $sql="select * from tsmovban where numcue='".$this->tsmovlib->getNumcue()."' and refban='".$this->tsmovlib->getReflib()."' and tipmov= '".$this->tsmovlib->getTipmov()."'";
    if (!Herramientas::BuscarDatos($sql,$tsmovban))
    {
      $this->anular='S';
    }
    else
    {
      $this->anular='N';
    }
     $this->gencorrel=$this->getUser()->getAttribute('confcorcom','S');
    ////////////////////////////////////
    /* activate form */

    $sql="select CodCtaPagEje,CodCtaIngDevN,codctaingdev from contaba";
    if (Herramientas::BuscarDatos($sql,$contaba))
    {
      $this->ctaeje=$contaba[0]["codctapageje"];
      $sql2="select descta from contabb where codcta='".$this->ctaeje."'";
      if (Herramientas::BuscarDatos($sql2,$contabb))
      {
        $this->desctaeje=$contabb[0]["descta"];
      }
      else{$this->desctaeje='';}

      $this->ctaingdif=$contaba[0]["codctaingdevn"];
      $sql2="select descta from contabb where codcta='".$this->ctaingdif."'";
      if (Herramientas::BuscarDatos($sql2,$contabb))
      {
        $this->desctaingdif=$contabb[0]["descta"];
      }
      else{$this->desctaingdif='';}

      $this->ctaing=$contaba[0]["codctaingdev"];
      $sql2="select descta from contabb where codcta='".$this->ctaing."'";
      if (Herramientas::BuscarDatos($sql2,$contabb))
      {
        $this->desctaing=$contabb[0]["descta"];
      }
      else{$this->desctaing='';}
    }
    else
    {
      $this->ctaeje='';
      $this->desctaeje='';
      $this->ctaingdif='';
      $this->desctaingdif='';
      $this->ctaing='';
      $this->desctaing='';
    }
    /* activate form */
    ////////////////////////////////////


    if ($this->tsmovlib->getId()!='')
    {
       $agreeti=H::getConfApp('agrstausu', 'tesoreria', 'tesmovseglib');
       $nomusu=H::getX('LOGUSE','Usuarios','Nomuse',$this->tsmovlib->getLoguse());
      if (strtoupper($this->tsmovlib->getStatus())=='A')
      {        
        $this->eti="ANULADO";
        $this->color='#CC0000';
        $this->anular='N';
      }
      else
      {
        if (strtoupper($this->tsmovlib->getStacon())=='C')
        {
          if ($agreeti=='S') $this->eti="CONCILIADO. REALIZADO POR EL USUARIO ".$nomusu;
          else $this->eti="CONCILIADO";
          $this->color='#0000CC';
        }
        if (strtoupper($this->tsmovlib->getStacon())=='N')
        {
          if ($agreeti=='S') $this->eti="NO CONCILIADO. REALIZADO POR EL USUARIO ".$nomusu;
          else  $this->eti="NO CONCILIADO";
          $this->color='#0000CC';
        }
      }

      if ($this->tsmovlib->getTipmov()!='')
      {
        if ($this->tsmovlib->getTipmov()=='ANUC' && $this->tsmovlib->getTipmovpad()!='')
        {
          $criterio="SELECT to_char(feclib,'dd/mm/yyyy') as feclib, motanu as motanu FROM TSMOVLIB WHERE NUMCUE='".$this->tsmovlib->getNumcue()."' AND REFLIB='A".substr($this->tsmovlib->getReflib(),1,7)."' and tipmovPAD='".$this->tsmovlib->getTipmovpad()."'";
        }
        else
        {
          $sql2="SELECT tipmovpad FROM TSMOVLIB WHERE REFLIBPAD='".$this->tsmovlib->getReflib()."' AND TIPMOVPAD= '".$this->tsmovlib->getTipmov()."'";
          if (Herramientas::BuscarDatos($sql2,$tsmovlibA))
            {
              $criterio="SELECT to_char(feclib,'dd/mm/yyyy') as feclib, motanu as motanu FROM TSMOVLIB WHERE NUMCUE='".$this->tsmovlib->getNumcue()."' AND REFLIB='A".substr($this->tsmovlib->getReflib(),1,7)."' and tipmovPAD='".$tsmovlibA[0]["tipmovpad"]."' ";

            }
            else
            {
              $criterio="SELECT to_char(feclib,'dd/mm/yyyy') as feclib, motanu as motanu FROM TSMOVLIB WHERE NUMCUE='".$this->tsmovlib->getNumcue()."' AND REFLIB='A".$this->tsmovlib->getReflib()."' and tipmov = 'ANUC'";
            }
        }

        if (Herramientas::BuscarDatos($criterio,$tsmovlibA))
        {
          $this->color='#CC0000';
          $this->eti='ANULADO EL '.$tsmovlibA[0]["feclib"].' POR '.$tsmovlibA[0]["motanu"];
          $this->anular='N';
        }

      }


      $sql="select gencomadi from opdefemp";
      if (Herramientas::BuscarDatos($sql,$opdefemp))
        {
          $this->compadic=$opdefemp[0]["gencomadi"];
        }
        else
        {
          $this->compadic='';
        }
    }
    else
    {
      $this->compadic='';
      $this->eti='';
      $this->color='';

	  $cadcorcomcont="";
      if ($this->gencorrel=='S')  $cadcorcomcont = "########";
   	  $this->tsmovlib->setNumcom($cadcorcomcont);

      $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
      if ($filsoldir=='S'){
         $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
         $t= new Criteria();
         $t->add(SegdirusuPeer::LOGUSE,$loguse);
         $t->setLimit(1);
         $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
         $regt= SegdirusuPeer::doSelectOne($t); 
         if ($regt){
          if ($this->tsmovlib->getCoddirec()=='')
            $this->tsmovlib->setCoddirec($regt->getCoddirec());
         }        
      }
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsmovlibFromRequest();

      $this->saveTsmovlib($this->tsmovlib);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesmovseglib/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesmovseglib/list');
      }
      else
      {
        return $this->redirect('tesmovseglib/edit?id='.$this->tsmovlib->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  /*protected function getTsmovlibOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $tsmovlib = new Tsmovlib();
      $this->configGrid();      
    }
    else
    {
      $tsmovlib = TsmovlibPeer::retrieveByPk($this->getRequestParameter($id));
      $this->forward404Unless($tsmovlib);

    $this->configGrid($tsmovlib->getReflib(),$tsmovlib->getNumcue(),$tsmovlib->getTipmov());
    }

    return $tsmovlib;
  }*/

    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
  $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
    if ($this->getRequestParameter('ajax')=='1')
      {
        $filbandir = H::getConfApp2('filbandir', 'tesoreria', 'tesdefcueban');        
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $codigo=$this->getRequestParameter('codigo');
        if ($filbandir=='S')           
          $sql='select numcue,codcta from tsdefban where numcue=\''.$codigo.'\' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
        else 
          $sql="select numcue,codcta from tsdefban where numcue='".$this->getRequestParameter('codigo')."'";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $ctacon=$result[0]["codcta"];

          $dato=TsdefbanPeer::getNomcue($this->getRequestParameter('codigo'));
              $output = '[["'.$cajtexmos.'","'.$dato.'",""],["tsmovlib_ctacon","'.$ctacon.'",""]]';
        }
        else
        {
          $dato="alert('Banco No Definido'); $('tsmovlib_numcue').value=''; $('tsmovlib_numcue').focus(); $('tsmovlib_nomcue').value=''; ";
              $output = '[["javascript","'.$dato.'",""],["tsmovlib_ctacon","",""]]';
        }

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
        $mostabrei=H::getConfApp2('mostabrei', 'tesoreria', 'tesmovseglib');
        $js="";
        $dato=TstipmovPeer::getDestip($this->getRequestParameter('codigo'));
        $dato2=TstipmovPeer::getDebcre($this->getRequestParameter('codigo'));
        $dato3=Herramientas::getX('CODTIP','Tstipmov','Codcon',strtoupper($this->getRequestParameter('codigo')));
  	    $this->cuentamov="";
    		$varemp = $this->getUser()->getAttribute('configemp');
    		if ($varemp)
    		if(array_key_exists('aplicacion',$varemp))
    		 if(array_key_exists('tesoreria',$varemp['aplicacion']))
    		   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
    		     if(array_key_exists('tesmovseglib',$varemp['aplicacion']['tesoreria']['modulos']))
    		       if(array_key_exists('cuentamov',$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']))
    		       {
    		       	$this->cuentamov=$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']['cuentamov'];
    		       }

        if ($mostabrei=='S'){
          $esrein=Herramientas::getX('CODTIP','Tstipmov','Esrein',strtoupper($this->getRequestParameter('codigo')));
          if ($esrein=='S')
            $js="$('infreintegro').show(); $('tsmovlib_esrein').value='S'";
          else
            $js="$('infreintegro').hide(); $('tsmovlib_esrein').value='N'; $('tsmovlib_refrei').value=''; $('tsmovlib_rifcon').value=''; $('tsmovlib_codtipgas').value=''; ";
        }

         if ($this->cuentamov=='S')
           $output = '[["'.$cajtexmos.'","'.$dato.'",""],["tsmovlib_debcre","'.$dato2.'",""],["tsmovlib_ctaeje","'.$dato3.'",""],["javascript","'.$js.'",""]]';
          else $output = '[["'.$cajtexmos.'","'.$dato.'",""],["tsmovlib_debcre","'.$dato2.'",""],["tsmovlib_codcon","'.$dato3.'",""],["javascript","'.$js.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
      else  if ($this->getRequestParameter('ajax')=='3')
      {
      	  $valida=true;
          $this->error='';
          $reftra=$this->getRequestParameter('reftra');
          if ($reftra=='')
          {$valida=false;}
          $fectra=$this->getRequestParameter('fectra');
          if ($fectra=='')
          {$valida=false;}
          $tipmov=$this->getRequestParameter('tipo');
          if ($tipmov=='')
          {$valida=false;}
          $numcom=$this->getRequestParameter('numcom');
          if($numcom=='********') $numcom='########';
          if ($numcom=='')
          {$valida=false;}
          $cedrif=$this->getRequestParameter('cedrif');
          
          $reflibmay8=H::getConfApp2('reflibmay8', 'tesoreria', 'tesmovseglib');
          $cedrifcom=H::getConfApp2('cedrifcom', 'tesoreria', 'tesmovseglib');
          $cuentaben='';
          if ($cedrifcom=='S'){
            $cuentaben=H::getX_vacio('CEDRIF','Opbenefi','Codcta',$cedrif);
          }

          $moneda=$this->getRequestParameter('codmon');
          $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
          if ($moneda2!=$moneda)
                  $valor=H::toFloat($this->getRequestParameter('valmon'),6);
          else
              $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);


          if($valida){
          	 //////// SI ES TIPO EJECUTIVO
          	if ($this->esTipoEjecutivo($this->getRequestParameter('tipo')))
          {
          $f=array();
          $this->error='';
          $this->formulario='';
          $this->i=0;
          if ($this->getRequestParameter('ctaeje')!='' && $this->getRequestParameter('ctaingdif')!='' && $this->getRequestParameter('ctaing')!='')
          {
            $this->getUser()->getAttributeHolder()->remove('formulario');
            $grabar=$this->getRequestParameter('grabar');
            $reftra=substr($this->getRequestParameter('reftra'),0,8);
            //$numcom=$this->getRequestParameter('numcom');
            $fectra=$this->getRequestParameter('fectra');
            $destra= str_replace('*','%',$this->getRequestParameter('destra'));
            if ($cuentaben!='') {
              $ctas=H::getX_vacio('NUMCUE','Tsdefban','codcta',$this->getRequestParameter('numcue')).'_'.$cuentaben;
              if ($this->getRequestParameter('debcre')=='C')
                 $mov=$this->getRequestParameter('debcre').'_D';
               else
                $mov=$this->getRequestParameter('debcre').'_C';
            }else {
              $ctas=$this->getRequestParameter('ctas');
              $mov=$this->getRequestParameter('mov');
            }
            $divmont=split('_',$this->getRequestParameter('montos'));
            $monto1=Herramientas::toFloat($divmont[0])*$valor;
            $monto2=Herramientas::toFloat($divmont[1])*$valor;
            $montos=$monto1.'_'.$monto2;

              $i=0;
              while ($i<=1)
              {
              $f[$i]=$this->getRequestParameter('formulario').$i;

                $this->getUser()->setAttribute('grabar', $grabar,$f[$i]);
                $this->getUser()->setAttribute('reftra', $reftra,$f[$i]);
                $this->getUser()->setAttribute('numcomp', $numcom,$f[$i]);
                $this->getUser()->setAttribute('fectra', $fectra,$f[$i]);
                $this->getUser()->setAttribute('destra', $destra,$f[$i]);
                $this->getUser()->setAttribute('ctas', $ctas,$f[$i]);
                $this->getUser()->setAttribute('tipmov', '',$f[$i]);
                $this->getUser()->setAttribute('mov', $mov,$f[$i]);
                $this->getUser()->setAttribute('montos', $montos,$f[$i]);

              $i++;
              }
              $this->i=$i-1;
              $this->formulario=$f;

              $form_build='';
              foreach ($this->formulario as $valor)
              {
                $form_build=$form_build.$valor.'!';
              }
              $output = '[["formulario","'.$form_build.'",""]]';
                  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

            }
        //////// SI ES NORMAL
        }
        else
        {
            $this->getUser()->getAttributeHolder()->remove('formulario');
            $grabar=$this->getRequestParameter('grabar');
            $reftra=substr($this->getRequestParameter('reftra'),0,8);
            //$numcom=$this->getRequestParameter('numcom');
            $fectra=$this->getRequestParameter('fectra');
            $destra= str_replace('*','%',$this->getRequestParameter('destra'));
            if ($cuentaben!='') {
               $ctas=H::getX_vacio('NUMCUE','Tsdefban','codcta',$this->getRequestParameter('numcue')).'_'.$cuentaben;
               if ($this->getRequestParameter('debcre')=='C')
                 $mov=$this->getRequestParameter('debcre').'_D';
               else
                $mov=$this->getRequestParameter('debcre').'_C';
            }              
            else{
              $ctas=$this->getRequestParameter('ctas');
              $mov=$this->getRequestParameter('mov');
            }
            $divmont=split('_',$this->getRequestParameter('montos'));
            $monto1=Herramientas::toFloat($divmont[0])*$valor;
            $monto2=Herramientas::toFloat($divmont[1])*$valor;
            $montos=$monto1.'_'.$monto2;

              $i=0;
            $f[$i]=$this->getRequestParameter('formulario').$i;

            $this->getUser()->setAttribute('grabar', $grabar,$f[$i]);
            $this->getUser()->setAttribute('reftra', $reftra,$f[$i]);
            $this->getUser()->setAttribute('numcomp', $numcom,$f[$i]);
            $this->getUser()->setAttribute('fectra', $fectra,$f[$i]);
            $this->getUser()->setAttribute('destra', $destra,$f[$i]);
            $this->getUser()->setAttribute('ctas', $ctas,$f[$i]);
            $this->getUser()->setAttribute('tipmov', '',$f[$i]);
            $this->getUser()->setAttribute('mov', $mov,$f[$i]);
            $this->getUser()->setAttribute('montos', $montos,$f[$i]);

            $this->i=0;
            $this->formulario=$f;

            $form_build='';
            $form_build=$form_build.$this->formulario[$this->i].'!';

            $output = '[["formulario","'.$form_build.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');


        }
          }else
          {
            $this->error='El Comprobante no se puede generar debido a que faltan campos por llenar';
            $this->i='';
            $this->formu='';
            $output = '[["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          }


        $this->ajax='3';
    }
    else  if ($this->getRequestParameter('ajax')=='4')
    {
      $numcue=$this->getRequestParameter('numcue');
      $reflib=$this->getRequestParameter('reflib');
      $refpag=$this->getRequestParameter('refpag');
      $tipmov=$this->getRequestParameter('tipmov');

      $id="";
      $c = new Criteria();
      $c->add(TsmovlibPeer::NUMCUE,$numcue);
      $c->add(TsmovlibPeer::REFLIB,$reflib);
      $c->add(TsmovlibPeer::TIPMOV,$tipmov);
      $tsmovlib=TsmovlibPeer::doSelectOne($c);
      if ($tsmovlib)     $id=$tsmovlib->getId();

      $msg = $this->executeEliminar();
      $this->ajax='4';

      if ($msg=='')
      {
          $this->setFlash('notice','Registro Eliminado exitosamente');
          return $this->redirect('tesmovseglib/edit');
      }
      else
      {
        $this->setFlash('notice',$msg);
        return $this->redirect('tesmovseglib/edit?id='.$id);
      }
        return sfView::HEADER_ONLY;

    }elseif($this->getRequestParameter('ajax')=='5'){

      $numcue=$this->getRequestParameter('numcue');
      $feclib=$this->getRequestParameter('feclib');
      $monmov=H::toFloat($this->getRequestParameter('monmov'));
      $tipmov=$this->getRequestParameter('tipmov');
      $javascript="";
      $output = '[["","",""]]';
      if ($numcue!="" && $feclib!="" && $monmov>0)
      {
      $c = new Criteria();
      $c->add(TstipmovPeer::CODTIP,$tipmov);
      $tstipmov = TstipmovPeer::doSelectOne($c);

      if($tstipmov){
        if($tstipmov->getDebcre()=='C'){
          $contaba = ContabaPeer::doSelectOne(new Criteria());
          $saldo=0;
      	  $dateFormat = new sfDateFormat('es_VE');
          $feclib = $dateFormat->format($feclib, 'i', $dateFormat->getInputPattern('d'));
          if(!Tesoreria::chequear_disponibilidad_financiera($numcue,$monmov,$contaba->getFecini(),$feclib,$saldo)){
            $coderr = 195;
            $output = '[["javascript","alert(\''.H::obtenerMensajeError($coderr).'\')",""],["tsmovlib_monmov","0,00",""]]';
          }
        }
      }
      else {
      	$javascript="alert('Tipo de Movimiento no existe'); $('tsmovlib_monmov').value='0,00';";
      	$output = '[["javascript","'.$javascript.'",""]]';
      }
      }else{
      	$javascript="alert('Verifique si introdujo el N° de Cuenta Bancaria, Fecha del Movimiento Valida o si el monto es mayor a cero'); $('tsmovlib_monmov').value='0,00';";
      	$output = '[["javascript","'.$javascript.'",""]]';
      }



      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }elseif ($this->getRequestParameter('ajax')=='6'){

      $javascript=""; $dato="";
      $q= new Criteria();
      $q->add(OpbenefiPeer::CEDRIF,$this->getRequestParameter('codigo'));
      $result= OpbenefiPeer::doSelectOne($q);
      if ($result)
       {
         $dato=$result->getNomben();
       }else{
           $javascript="alert('El Beneficiario no existe'); $('tsmovlib_cedrif').value=''; $('tsmovlib_cedrif').focus();";
       }

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }elseif ($this->getRequestParameter('ajax')=='7'){
      $dato="";
      $js="";
      if ($this->getRequestParameter('nuevo')=='')
      {
        $q= new Criteria();
        $q->add(TsdesmonPeer::CODMON,$this->getRequestParameter('codigo'));
        $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
        $reg= TsdesmonPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=number_format($reg->getValmon(),6,',','.');
        }    
      }else {
          $js="$('tsmovlib_codmon').value='".$this->getRequestParameter('moneref')."'";   
          $dato=$this->getRequestParameter('valmone');
      }

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }elseif ($this->getRequestParameter('ajax')=='8'){
      $javascript="";
      $codigo=$this->getRequestParameter('codigo');
      $catprofor=H::getConfApp2('catprofor', 'compras', 'almordcom');
      if ($catprofor=='S'){
        $c= new Criteria();
       $c->add(FordefpryPeer::CODPRO,$codigo);
       $datos= FordefpryPeer::doselectOne($c);
       if ($datos)
       {      
        $dato=$datos->getNompro();      
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
       }else {
        $javascript="alert('El Proyecto no Existe'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";
        $output = '[["javascript","'.$javascript.'",""]]';
       }
      }else {
       $c= new Criteria();
       $c->add(CatipproPeer::CODPRO,$codigo);
       $datos= CatipproPeer::doselectOne($c);
       if ($datos)
       {      
        $dato=$datos->getDespro();      
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
       }else {
        $javascript="alert('El Proyecto no Existe'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";
        $output = '[["javascript","'.$javascript.'",""]]';
       }
     }
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }elseif ($this->getRequestParameter('ajax')=='9'){
       $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir2=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
        $codigo=$this->getRequestParameter('codigo'); $js="";

      $q= new Criteria();
      if ($filsoldir2=='S'){
        $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
        $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
      }else $q->add(CadefdirecPeer::CODDIREC,$codigo);
      $reg= CadefdirecPeer::doSelectOne($q);
      if ($reg)
      {
         $dato=$reg->getDesdirec();         
      }else {
          $dato="";
          $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
          if ($cambiareti=='S')
            $js="alert_('La Estado no existe o no esta asociada al usuario'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
          else
           $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
      }
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }elseif ($this->getRequestParameter('ajax')=='10'){
      $javascript="";
      $codigo=$this->getRequestParameter('codigo');

      $c= new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$codigo);
      $reg= OpbenefiPeer::doSelectOne($c);
      if ($reg)
      {
        $dato=$reg->getNomben();
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }else {
        $javascript="alert('El Contribuyente no esta registrado'); $('tsmovlib_rifcon').value=''; $('tsmovlib_nomcon').value=''; $('tsmovlib_rifcon').focus(); ";
        $output = '[["javascript","'.$javascript.'",""]]';
      }
     
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }elseif ($this->getRequestParameter('ajax')=='11'){
      $javascript="";
      $codigo=$this->getRequestParameter('codigo');

      $c= new Criteria();
      $c->add(NptipgasPeer::CODTIPGAS,$codigo);
      $reg= NptipgasPeer::doSelectOne($c);
      if ($reg)
      {
        $dato=$reg->getDestipgas();
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }else {
        $javascript="alert('El Tipo de Gasto no esta registrado'); $('tsmovlib_codtipgas').value=''; $('tsmovlib_destipgas').value=''; $('tsmovlib_codtipgas').focus(); ";
        $output = '[["javascript","'.$javascript.'",""]]';
      }
     
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }

  }


  public function esTipoEjecutivo($tipo)
  {
    $sql="select tipeje from opdefemp";
    if (Herramientas::BuscarDatos($sql,$opdefemp))
      {
        if ($opdefemp[0]["tipeje"]== $tipo)
        {
          return true;
        }
        else
        {
          return false;
        }
      }
      else
      {
        return false;
      }
  }

  public function LlenarAttribute($nombre,$nombreformulario)
  {
    $this->getUser()->getAttributeHolder()->remove($nombre);
      $this->getUser()->setAttribute($nombre, $this->getRequestParameter($nombre),$nombreformulario);
  }

    public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
      $this->tags=Herramientas::autocompleteAjax('NUMCUE','Tsdefban','Numcue',trim($this->getRequestParameter('tsmovlib[numcue]')));
      }
      else if ($this->getRequestParameter('ajax')=='2')
      {
      $this->tags=Herramientas::autocompleteAjax('CODTIP','Tstipmov','Codtip',trim(strtoupper($this->getRequestParameter('tsmovlib[tipmov]'))));
      }
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($numche='',$numcue='',$tipmov='')
  {

      $c = new Criteria();
    $c->add(OpordchePeer::NUMCHE,$this->tsmovlib->getReflib());//$numche);
    $c->add(OpordchePeer::CODCTA,$this->tsmovlib->getNumcue()); //$numcue);
    $c->add(OpordchePeer::TIPMOV,$this->tsmovlib->getTipmov());//$tipmov);
    $c->addJoin(OpordpagPeer::NUMORD,OpordchePeer::NUMORD);
    $obj = OpordpagPeer::doSelect($c);

      $opciones = new OpcionesGrid();
      // Se configuran las opciones globales del Grid
        $opciones->setTabla('Opordpag');
        $opciones->setAnchoGrid(600);
        $opciones->setTitulo('Ordenes de Pago Canceladas');
        $opciones->setName('a');
        $opciones->setHTMLTotalFilas(' ');
        $opciones->setFilas(0);
        $opciones->setEliminar(false);

        // Se generan las columnas
        $col1 = new Columna('Número');
        $col1->setTipo(Columna::TEXTO);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('Numord');
        $col1->setHTML('type="text" size="10" readonly=true');

        $col2 = new Columna('Fecha');
        $col2->setTipo(Columna::FECHA);
        $col2->setAlineacionObjeto(Columna::CENTRO);
        $col2->setAlineacionContenido(Columna::CENTRO);
        $col2->setNombreCampo('Fecemi');
        $col2->setHTML('type="text" size="8" readonly=true');

        $col3 = new Columna('Beneficiario');
        $col3->setNombreCampo('Nomben');
        $col3->setTipo(Columna::TEXTO);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setHTML('type="text" size=40');

        $col4 = new Columna('Descripción');
        $col4->setNombreCampo('Desord');
        $col4->setTipo(Columna::TEXTO);
        $col4->setAlineacionObjeto(Columna::IZQUIERDA);
        $col4->setAlineacionContenido(Columna::IZQUIERDA);
        $col4->setHTML('type="text" size=50 ');

    $col5 = new Columna('Monto');
        $col5->setTipo(Columna::MONTO);
        $col5->setAlineacionObjeto(Columna::DERECHA);
        $col5->setAlineacionContenido(Columna::DERECHA);
        $col5->setHTML('type="text" size=12 readonly=true');
        $col5->setNombreCampo('Monord');

        $col6 = new Columna('Compromisos Asociados');
        $col6->setTipo(Columna::TEXTO);
        $col6->setAlineacionObjeto(Columna::CENTRO);
        $col6->setAlineacionContenido(Columna::CENTRO);
        $col6->setNombreCampo('comaso');
        $col6->setHTML('type="text" size="25" readonly=true');

        // Se guardan las columnas en el objetos de opciones
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
      // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($obj);

  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateTsmovlibFromRequest()
  {
    $tsmovlib = $this->getRequestParameter('tsmovlib');
    $this->configGrid();
    $this->configGrid2();
    $this->compadic='';
    $this->eti='';
    $this->color='';
  $this->cuentamov="";
    $this->oculeli="";
    $this->bloqfec="";
	$varemp = $this->getUser()->getAttribute('configemp');
	if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesmovseglib',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('cuentamov',$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']))
	       {
	       	$this->cuentamov=$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']['cuentamov'];
	       }
	     	 if(array_key_exists('oculeli',$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']))
	       {
	       	$this->oculeli=$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']['oculeli'];
	       }
	       if(array_key_exists('bloqfec',$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']))
	       {
	       	$this->bloqfec=$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']['bloqfec'];
	       } 	        
	     }
      $sql="select * from tsmovban where numcue='".$this->tsmovlib->getNumcue()."' and refban='".$this->tsmovlib->getReflib()."' and tipmov= '".$this->tsmovlib->getTipmov()."'";
    if (!Herramientas::BuscarDatos($sql,$tsmovban))
  {
    $this->anular='S';
  }
  else
  {
    $this->anular='N';
  }

    $sql="select CodCtaPagEje,CodCtaIngDevN,codctaingdev from contaba";
    if (Herramientas::BuscarDatos($sql,$contaba))
  {
    $this->ctaeje=$contaba[0]["codctapageje"];
    $sql2="select descta from contabb where codcta='".$this->ctaeje."'";
    if (Herramientas::BuscarDatos($sql2,$contabb))
    {
      $this->desctaeje=$contabb[0]["descta"];
    }
    else{$this->desctaeje='';}

    $this->ctaingdif=$contaba[0]["codctaingdevn"];
    $sql2="select descta from contabb where codcta='".$this->ctaingdif."'";
    if (Herramientas::BuscarDatos($sql2,$contabb))
    {
      $this->desctaingdif=$contabb[0]["descta"];
    }
    else{$this->desctaingdif='';}

    $this->ctaing=$contaba[0]["codctaingdev"];
    $sql2="select descta from contabb where codcta='".$this->ctaing."'";
    if (Herramientas::BuscarDatos($sql2,$contabb))
    {
      $this->desctaing=$contabb[0]["descta"];
    }
    else{$this->desctaing='';}
  }
  else
  {
    $this->ctaeje='';
    $this->desctaeje='';
    $this->ctaingdif='';
    $this->desctaingdif='';
    $this->ctaing='';
    $this->desctaing='';
  }

  if (isset($tsmovlib['numcue']))
    {
      $this->tsmovlib->setNumcue($tsmovlib['numcue']);
    }
    if (isset($tsmovlib['nomcue']))
    {
      $this->tsmovlib->setNomcue($tsmovlib['nomcue']);
    }
    if (isset($tsmovlib['reflib']))
    {
      $this->tsmovlib->setReflib($tsmovlib['reflib']);
    }
    if (isset($tsmovlib['feclib']))
    {
      if ($tsmovlib['feclib'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsmovlib['feclib']))
          {
            $value = $dateFormat->format($tsmovlib['feclib'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsmovlib['feclib'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsmovlib->setFeclib($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsmovlib->setFeclib(null);
      }
    }
    if (isset($tsmovlib['tipmov']))
    {
      $this->tsmovlib->setTipmov($tsmovlib['tipmov']);
    }
    if (isset($tsmovlib['destip']))
    {
      $this->tsmovlib->setDestip($tsmovlib['destip']);
    }
    if (isset($tsmovlib['deslib']))
    {
      $this->tsmovlib->setDeslib($tsmovlib['deslib']);
    }
    if (isset($tsmovlib['monmov']))
    {
      $this->tsmovlib->setMonmov($tsmovlib['monmov']);
    }
    if (isset($tsmovlib['fecing']))
    {
      if ($tsmovlib['fecing'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsmovlib['fecing']))
          {
            $value = $dateFormat->format($tsmovlib['fecing'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsmovlib['fecing'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsmovlib->setFecing($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsmovlib->setFecing(null);
      }
    }
    if (isset($tsmovlib['numcom']))
    {
      $this->tsmovlib->setNumcom($tsmovlib['numcom']);
    }
    if (isset($tsmovlib['feccom']))
    {
      if ($tsmovlib['feccom'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsmovlib['feccom']))
          {
            $value = $dateFormat->format($tsmovlib['feccom'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsmovlib['feccom'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsmovlib->setFeccom($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsmovlib->setFeccom(null);
      }
    }
    if (isset($tsmovlib['debcre']))
    {
      $this->tsmovlib->setDebcre($tsmovlib['debcre']);
    }
    if (isset($tsmovlib['codcta']))
    {
      $this->tsmovlib->setCodcta($tsmovlib['codcta']);
    }
    if (isset($tsmovlib['status']))
    {
      $this->tsmovlib->setStatus($tsmovlib['status']);
    }
    if (isset($tsmovlib['stacon']))
    {
      $this->tsmovlib->setStacon($tsmovlib['stacon']);
    }
    if (isset($tsmovlib['ctacon']))
    {
      $this->tsmovlib->setCtacon($tsmovlib['ctacon']);
    }
    if (isset($tsmovlib['debcre']))
    {
      $this->tsmovlib->setDebcre($tsmovlib['debcre']);
    }
    if (isset($tsmovlib['cedrif']))
    {
      $this->tsmovlib->setCedrif($tsmovlib['cedrif']);
    }
    if (isset($tsmovlib['ctaeje']))
    {
      $this->tsmovlib->setCtaeje($tsmovlib['ctaeje']);
    }
    if (isset($tsmovlib['savemovcero']))
    {
      $this->tsmovlib->setSavemovcero($tsmovlib['savemovcero']);
    }
    if (isset($tsmovlib['codmon']))
    {
      $this->tsmovlib->setCodmon($tsmovlib['codmon']);
    }
    if (isset($tsmovlib['valmon']))
    {
      $this->tsmovlib->setValmon($tsmovlib['valmon']);
    }
    if (isset($tsmovlib['codpro']))
    {
      $this->tsmovlib->setCodpro($tsmovlib['codpro']);
    }
    if (isset($tsmovlib['coddirec']))
    {
      $this->tsmovlib->setCoddirec($tsmovlib['coddirec']);
    }
    if (isset($tsmovlib['refrei']))
    {
      $this->tsmovlib->setRefrei($tsmovlib['refrei']);
    }
    if (isset($tsmovlib['rifcon']))
    {
      $this->tsmovlib->setRifcon($tsmovlib['rifcon']);
    }
    if (isset($tsmovlib['codtipgas']))
    {
      $this->tsmovlib->setCodtipgas($tsmovlib['codtipgas']);
    }    
  }

  public function executeEliminar()
  {
    $numcue=$this->getRequestParameter('numcue');
    $reflib=$this->getRequestParameter('reflib');
    $refpag=$this->getRequestParameter('refpag');
    $feclib=$this->getRequestParameter('feclib');
    $numcom=$this->getRequestParameter('numcom');
    $feccom=$this->getRequestParameter('feccom');
    $tipmov=$this->getRequestParameter('tipmov');
    $debcre=$this->getRequestParameter('debcre');
    $monmov=$this->getRequestParameter('monmov');
    $numcomadi=$this->getRequestParameter('numcomadi');
    $feccomadi=$this->getRequestParameter('feccomadi');
    $compadic=$this->getRequestParameter('compadic');
    $this->msg='';
    $ideeli=0;
    $mes = substr($feclib,3,2);
    $ano = substr($feclib,6,4);
    $afepag=H::getX_vacio('TIPPAG','Cpdocpag','Afepag',$tipmov);
    $anoactual=substr(H::getX_vacio('CODEMP', 'Contaba', 'Feccie', '001'),0,4);

    $f= new Criteria();
    $f->add(TsdetpagelePeer::REFMOVLIB,$reflib);
    $f->add(TspagelePeer::NUMCUE,$numcue);   
    $f->add(TspagelePeer::TIPDOC,$tipmov);   
    $f->add(TspagelePeer::ESTPAG,'N',Criteria::NOT_EQUAL);        
    $f->addJoin(TsdetpagelePeer::REFPAG,TspagelePeer::REFPAG);
    $estpagele= TsdetpagelePeer::doSelectOne($f);

    if (Tesoreria::el_Banco_Esta_Cerrado($numcue,$mes,$ano))
    {
      return 'El Movimiento no puede ser Eliminado ya que el periodo se encuentra cerrado';
    }else if (Tesoreria::validaPeriodoCerrado($feccom)==true)
   {
     $coderror=529;
     return Herramientas::obtenerMensajeError($coderror);
   }else if (Tesoreria::validaPeriodoCerradoBanco($feccom,$numcue)==false)
    {
      $coderror=537;
      return Herramientas::obtenerMensajeError($coderror);
    }else if (Tesoreria::verificarTransferencia($numcue,$reflib,$tipmov))
    {
      $coderror=1387;
      return Herramientas::obtenerMensajeError($coderror);
    }else if ($afepag=='S' && (!Herramientas::validarPeriodoPresuesto($feclib)) && $ano==$anoactual){
      $coderror=142;
      return Herramientas::obtenerMensajeError($coderror);
    }else if ($estpagele){
      $coderror=1386;
      return Herramientas::obtenerMensajeError($coderror);
    }
    else
    {
      if ($numcom!='')
      {
        $sql="Select * From Contabc Where NumCom='".$numcom."' And STACOM='D'";
        $puedeeliminar=Herramientas::BuscarDatos($sql,$contabc);
        
      }
      else
      {
        $puedeeliminar=true;
      }

      if ($puedeeliminar)
      {
        $sql="Select status,stacon,tipmov, reflibaju, tipmovaju From TsMovLib Where NumCue = '".$numcue."' And RefLib = '".$reflib."' and TipMov = '".$tipmov."'";
        if (Herramientas::BuscarDatos($sql,$tsmovlib))
          {
            if ($tsmovlib[0]["status"]=='A')
            {
              return $this->msg='No se puede eliminar un movimiento Anulado';
            }          
            
            if ($tsmovlib[0]["stacon"]!='C')
            {
              if ($tsmovlib[0]["reflibaju"]!='' && $tsmovlib[0]["tipmovaju"]!=''){
              //Movimiento según libro de Ajuste Diferencial
              $t = new Criteria();
              $t->add(TsmovlibPeer::NUMCUE,$numcue);
              $t->add(TsmovlibPeer::REFLIB,$tsmovlib[0]["reflibaju"]);
              $t->add(TsmovlibPeer::TIPMOV,$tsmovlib[0]["tipmovaju"]);
              $regt=TsmovlibPeer::doSelectOne($t);
              if ($regt){
                $regt->setStadif(null);
                $regt->save();
              }

              $refaju=substr($reflib,2,6);

              //Elimina Ajuste Pagados
              $q1= new Criteria();
              $q1->add(CpmovajuPeer::REFAJU,'AP'.$refaju);
              CpmovajuPeer::doDelete($q1);

              $q= new Criteria();
              $q->add(CpajustePeer::REFAJU,'AP'.$refaju);
              CpajustePeer::doDelete($q);

              //Elimina Ajuste Causados
              $q1= new Criteria();
              $q1->add(CpmovajuPeer::REFAJU,'AA'.$refaju);
              CpmovajuPeer::doDelete($q1);

              $q= new Criteria();
              $q->add(CpajustePeer::REFAJU,'AA'.$refaju);
              CpajustePeer::doDelete($q);

              //Elimina Ajuste Compromisos
              $q1= new Criteria();
              $q1->add(CpmovajuPeer::REFAJU,'AC'.$refaju);
              CpmovajuPeer::doDelete($q1);

              $q= new Criteria();
              $q->add(CpajustePeer::REFAJU,'AC'.$refaju);
              CpajustePeer::doDelete($q);              

              $c = new Criteria();
              $c->add(TsmovlibPeer::NUMCUE,$numcue);
              $c->add(TsmovlibPeer::REFLIB,$reflib);
              $c->add(TsmovlibPeer::TIPMOV,$tipmov);
              $crieli=TsmovlibPeer::doSelectOne($c);
              if ($crieli) $ideeli=$crieli->getId();
              TsmovlibPeer::doDelete($c);

              Tesoreria::actualiza_Bancos('E',$debcre,$numcue,$monmov);
              Tesoreria::anular_Eliminar('E',$numcomadi,$feccomadi,$compadic,$feccom,$numcom,$numcom,$feclib);
              $this->SalvarBitacora($ideeli ,'Elimino');
            }else {
                $escheque=H::getX('CODTIP','Tstipmov','Escheque',$tsmovlib[0]["tipmov"]);
                if ($escheque==1)
                {
                  $this->msg=$this->msg.Tesoreria::anular_Eliminar_Cheque('E',$numcue,$reflib);
                  if ($this->msg==''){
                  $this->msg=$this->msg.Tesoreria::actualiza_Orden_De_Pago($reflib,$numcue,$tipmov);
                  if ($this->msg==''){
                  $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('E',$reflib,$numcue,$feclib,$refpag);
                  }
                  }

                }
                else
                {
                  $sql2="Select refier From CPDocPag Where TipPag = '".$tsmovlib[0]["tipmov"]."' ";
                  if (Herramientas::BuscarDatos($sql2,$tabla))
                  {
                    if ($tabla[0]["refier"]=='A')
                    {
                      $this->msg=$this->msg.Tesoreria::actualiza_Orden_De_Pago($reflib,$numcue,$tipmov);
                      if ($this->msg==''){
                      $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('E',$reflib,$numcue,$feclib,$refpag);
                      }
                    }
                    else
                    {
                      $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('E',$reflib,$numcue,$feclib,$refpag);
                      if ($this->msg==''){
                    $c = new Criteria();
                    $c->add(OpdetperPeer::NUMCHE,$reflib);
                    $c->add(OpdetperPeer::CTABAN,$numcue);
                    $c->add(OpdetperPeer::TIPMOV,$tipmov);
                    $opdetper = OpdetperPeer::doSelectOne($c);
                    if ($opdetper)
                    {
                      $opdetper->setFecpag(null);
                      $opdetper->setNumche(null);
                      $opdetper->save();
                    }
                      }
                    }
                  }
                }
              if ($this->msg==''){
                $c = new Criteria();
              $c->add(TsmovlibPeer::NUMCUE,$numcue);
              $c->add(TsmovlibPeer::REFLIB,$reflib);
              $c->add(TsmovlibPeer::TIPMOV,$tipmov);
              $crieli=TsmovlibPeer::doSelectOne($c);
              if ($crieli) $ideeli=$crieli->getId();
              TsmovlibPeer::doDelete($c);

              Tesoreria::actualiza_Bancos('E',$debcre,$numcue,$monmov);
              Tesoreria::anular_Eliminar('E',$numcomadi,$feccomadi,$compadic,$feccom,$numcom,$numcom,$feclib);
              $this->SalvarBitacora($ideeli ,'Elimino');
              } else { return $this->msg; }
             }
            }
            else
            {
               $savemovcero=H::getConfApp('savemovcero', 'tesoreria', 'tesmovseglib');
              if ($tsmovlib[0]["tipmov"]=='ANUC' || $savemovcero=='S')
              {

              $c = new Criteria();
              $c->add(TsmovlibPeer::NUMCUE,$numcue);
              $c->add(TsmovlibPeer::REFLIB,$reflib);
              $c->add(TsmovlibPeer::TIPMOV,$tipmov);
              $crieli=TsmovlibPeer::doSelectOne($c);
              if ($crieli) $ideeli=$crieli->getId();
              TsmovlibPeer::doDelete($c);

              Tesoreria::anular_Eliminar('E',$numcomadi,$feccomadi,$compadic,$feccom,$numcom,$numcom,$feclib);
              $this->SalvarBitacora($ideeli ,'Elimino');
              }
              else
              {
                return $this->msg=$this->msg.'El Movimiento está Conciliado y No puede ser Eliminado';
              }
            }
           
          }
      }
      else
      {
        return $this->msg=$this->msg.'El Movimiento no puede ser Eliminado ya que el comprobante contable asociado, No Existe o se encuentra actualizado en Contabilidad';
      }
    }

  }

  public function executeAnular()
  {
    $numcue=$this->getRequestParameter('numcue');
    $reflib=$this->getRequestParameter('reflib');
    $refpag=$this->getRequestParameter('refpag');
    $feclib=$this->getRequestParameter('feclib');
    $this->compadic=$this->getRequestParameter('compadic');

    $dateFormat = new sfDateFormat($this->getUser()->getCulture());
    $fec = $dateFormat->format($feclib, 'i', $dateFormat->getInputPattern('d'));
    
   $this->bloqfec="";
		$varemp = $this->getUser()->getAttribute('configemp');
		if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('tesoreria',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
		     if(array_key_exists('tesmovseglib',$varemp['aplicacion']['tesoreria']['modulos'])){
		       if(array_key_exists('bloqfec',$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']))
		       {
		       	$this->bloqfec=$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']['bloqfec'];
		       } 
		     }    
    

    $c = new Criteria();
    $c->add(TsmovlibPeer::NUMCUE,$numcue);
    $c->add(TsmovlibPeer::REFLIB,$reflib);
    $c->add(TsmovlibPeer::FECLIB,$fec);
    $this->tsmovlib = TsmovlibPeer::doSelectOne($c);
    sfView::SUCCESS;
  }


  public function executeSalvaranu()
  {
    $numcue=$this->getRequestParameter('numcue');
    $reflib=$this->getRequestParameter('reflib');
    $reflib2=$this->getRequestParameter('reflib2');
    $refpag=$this->getRequestParameter('refpag');
    $feclib_m=$this->getRequestParameter('feclib');
    $aux=split("-",$feclib_m);
    $feclib=$aux[2].'/'.$aux[1].'/'.$aux[0];
    $fecanu=$this->getRequestParameter('fecanu');
    $dateFormat = new sfDateFormat('es_VE');
    $fecanu_m= $dateFormat->format($this->getRequestParameter('fecanu'), 'i', $dateFormat->getInputPattern('d'));

    $tipmov=$this->getRequestParameter('tipmov');
    $numcom=$this->getRequestParameter('numcom');
    $desanu=$this->getRequestParameter('desanu');
    $monmov=$this->getRequestParameter('monmov');
    $numcomadi=$this->getRequestParameter('numcomadi');
    $feccomadi=$this->getRequestParameter('feccomadi');
    $compadic=$this->getRequestParameter('compadic');
    $fechacom=$this->getRequestParameter('fechacom');
    $numcom=$this->getRequestParameter('numcom');
    $numcom2=$this->getRequestParameter('numcom2');
    $existecomprobante=false;
    if($numcom2=='********')
       $numcom2 = "########";
    if($numcom=='********') $numcom = "########";
    $sqlcom="Select numcom From contabc Where Numcom = '".$numcom."' And feccom = To_date('".$fechacom."','YYYY-MM-DD' ) ";
    if (Herramientas::BuscarDatos($sqlcom,$tabla))
      {
        $existecomprobante=true;
      }    
    $this->msgpercer="";
    $idmovseglib=$this->getRequestParameter('id');
    $this->id=$idmovseglib;
    $this->msg='';

    $anoactual=substr(H::getX_vacio('CODEMP', 'Contaba', 'Feccie', '001'),0,4);//date('Y');
    $afepag=H::getX_vacio('TIPPAG','Cpdocpag','Afepag',$tipmov);
    $anofeclib=substr($feclib_m,0,4);
   if ($fecanu_m>date('Y-m-d'))
   {
       $coderror=565;
     $this->msgpercer = Herramientas::obtenerMensajeError($coderror);
   }
   elseif ($fecanu_m<$feclib_m)
   {
       $coderror=571;
     $this->msgpercer = Herramientas::obtenerMensajeError($coderror);
   }else if ($afepag=='S' && (!Herramientas::validarPeriodoPresuesto($this->getRequestParameter('fecanu')))){
      $coderror=142;
     $this->msgpercer = Herramientas::obtenerMensajeError($coderror);
   }else {
  if (($anofeclib==$anoactual) or ($existecomprobante==true) )
  {
   if (Tesoreria::validaPeriodoCerrado($fecanu)==true)
   {
     $coderror=529;
     $this->msgpercer = Herramientas::obtenerMensajeError($coderror);
   }else if (Tesoreria::validaPeriodoCerradoBanco($fecanu,$numcue)==false)
    {
      $coderror=537;
      $this->msgpercer = Herramientas::obtenerMensajeError($coderror);
    }
    else if (Tesoreria::verificarTransferencia($numcue,$reflib,$tipmov))
    {
      $coderror=1387;
      $this->msgpercer = Herramientas::obtenerMensajeError($coderror);
    }
   else
   {
    $sql="Select stacon,tipmov,monmov,codcta,numcue,cedrif, codmon, valmon, reflibaju, tipmovaju From TsMovLib Where NumCue = '".$numcue."' And RefLib = '".$reflib."' and TipMov = '".$tipmov."' ";
    if (Herramientas::BuscarDatos($sql,$tsmovlib))
      {
        if ($tsmovlib[0]["stacon"]!='C')
        {
          if ($tsmovlib[0]["reflibaju"]!='' && $tsmovlib[0]["tipmovaju"]!=''){
              //Movimiento según libro de Ajuste Diferencial
              $t = new Criteria();
              $t->add(TsmovlibPeer::NUMCUE,$numcue);
              $t->add(TsmovlibPeer::REFLIB,$tsmovlib[0]["reflibaju"]);
              $t->add(TsmovlibPeer::TIPMOV,$tsmovlib[0]["tipmovaju"]);
              $regt=TsmovlibPeer::doSelectOne($t);
              if ($regt){
                $regt->setStadif(null);
                $regt->save();
              }

              $refaju=substr($reflib,2,6);

              //Anula Ajuste Pagados
              Presupuesto::AnularAjustePresupuesto('AP'.$refaju, $fecanu_m,$desanu);

              //Anula Ajuste Causados
              Presupuesto::AnularAjustePresupuesto('AA'.$refaju, $fecanu_m,$desanu);

              //Anula Ajuste Compromisos
              Presupuesto::AnularAjustePresupuesto('AC'.$refaju, $fecanu_m,$desanu);            
              
              $sql3="select debcre from tstipmov where codtip='".$tipmov."'";
              if (Herramientas::BuscarDatos($sql3,$tstipmov))
              {
                $afecta=$tstipmov[0]["debcre"];
              }

              $this->msg=Tesoreria::anular_Eliminar('A',$numcomadi,$feccomadi,$compadic,$fechacom,$numcom,$numcom2,$fecanu,$reflib2,$desanu);
              if ($this->msg==''){
              // GENERAR NUEVO MOVIMIENTO SEGUN LIBRO
              $tsmovlibA= new Tsmovlib();
              $dateFormat = new sfDateFormat($this->getUser()->getCulture());
              $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

              $tsmovlibA->setNumcue($tsmovlib[0]["numcue"]);
              $tsmovlibA->setReflib($reflib2);
              $tsmovlibA->setRefpag($refpag);
              $tsmovlibA->setFeclib($fec);
              $tsmovlibA->setFecing(date('Y-m-d'));
              if ($afecta=='C')
              {
                $tsmovlibA->setTipmov('ANUC');
              }
              else if ($afecta=='D')
              {
                $tsmovlibA->setTipmov('ANUD');
              }
              $tsmovlibA->setMonmov($tsmovlib[0]["monmov"]);
              $tsmovlibA->setNumcom($numcom2);
              $tsmovlibA->setMotanu($desanu);
              $tsmovlibA->setCodcta($tsmovlib[0]["codcta"]);
              $tsmovlibA->setFeccom($fec);
              $tsmovlibA->setStatus('C');
              $tsmovlibA->setStacon('C');
              $tsmovlibA->setDeslib('Movimiento Anulado');
              $tsmovlibA->setReflibpad($reflib);
              $tsmovlibA->setTipmovpad($tipmov);
              $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
              $tsmovlibA->setLoguse($loguse);
              $tsmovlibA->setCedrif($tsmovlib[0]["cedrif"]);
              $tsmovlibA->setCodmon($tsmovlib[0]["codmon"]);
              $tsmovlibA->setValmon($tsmovlib[0]["valmon"]);
              $tsmovlibA->save();

              Tesoreria::actualiza_Bancos('A','D',$numcue,$monmov);
              }
            }else {
              $escheque=H::getX('CODTIP','Tstipmov','Escheque',$tsmovlib[0]["tipmov"]);
              if ($escheque==1)
              {
                $this->msg=$this->msg.Tesoreria::anular_Eliminar_Cheque('A',$numcue,$reflib);
                if ($this->msg==''){
                $this->msg=$this->msg.Tesoreria::actualiza_Orden_De_Pago($reflib,$numcue,$tipmov);
                if ($this->msg==''){
                $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('A',$reflib,$numcue,$fecanu, $refpag);
              }
                }
              }
              else
              {
                $sql2="select refier from cpdocpag where tippag='".$tsmovlib[0]["tipmov"]."' ";
                if (Herramientas::BuscarDatos($sql2,$tabla))
                {
                  if ($tabla[0]["refier"]=='A')
                  {
                    $this->msg=$this->msg.Tesoreria::actualiza_Orden_De_Pago($reflib,$numcue,$tipmov);
                    if ($this->msg==''){
                    $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('A',$reflib,$numcue,$fecanu,$refpag);
                  }
                  }
                  else
                  {
                    $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('A',$reflib,$numcue,$fecanu,$refpag);
                 if ($this->msg==''){
                  $c = new Criteria();
                  $c->add(OpdetperPeer::NUMCHE,$reflib);
                  $c->add(OpdetperPeer::CTABAN,$numcue);
                  $c->add(OpdetperPeer::TIPMOV,$tipmov);
                  $opdetper = OpdetperPeer::doSelectOne($c);
                  if ($opdetper)
                  {
                    $opdetper->setFecpag(null);
                    $opdetper->setNumche(null);
                    $opdetper->save();
                  }
                  }
                }
              }
              }
              $sql3="select debcre from tstipmov where codtip='".$tipmov."'";
              if (Herramientas::BuscarDatos($sql3,$tstipmov))
              {
                $afecta=$tstipmov[0]["debcre"];
              }
              if ($this->msg==''){
              // Generar Nuevo comprobante contable
              //if($numcom2=='########') $numcom2=Comprobante::Buscar_Correlativo();
              $this->msg=$this->msg.Tesoreria::anular_Eliminar('A',$numcomadi,$feccomadi,$compadic,$fechacom,$numcom,$numcom2,$fecanu,$reflib2,$desanu);
              if ($this->msg==''){
              // GENERAR NUEVO MOVIMIENTO SEGUN LIBRO
              $tsmovlibA= new Tsmovlib();
              $dateFormat = new sfDateFormat($this->getUser()->getCulture());
              $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

              $tsmovlibA->setNumcue($tsmovlib[0]["numcue"]);
              $tsmovlibA->setReflib($reflib2);
              $tsmovlibA->setRefpag($refpag);
              $tsmovlibA->setFeclib($fec);
              $tsmovlibA->setFecing(date('Y-m-d'));
              if ($afecta=='C')
              {
                $tsmovlibA->setTipmov('ANUC');
              }
              else if ($afecta=='D')
              {
                $tsmovlibA->setTipmov('ANUD');
              }
              $tsmovlibA->setMonmov($tsmovlib[0]["monmov"]);
              $tsmovlibA->setNumcom($numcom2);
              $tsmovlibA->setMotanu($desanu);
              $tsmovlibA->setCodcta($tsmovlib[0]["codcta"]);
              $tsmovlibA->setFeccom($fec);
              $tsmovlibA->setStatus('C');
              $tsmovlibA->setStacon('C');
              $tsmovlibA->setDeslib('Movimiento Anulado');
              $tsmovlibA->setReflibpad($reflib);
              $tsmovlibA->setTipmovpad($tipmov);
              $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
              $tsmovlibA->setLoguse($loguse);
              $tsmovlibA->setCedrif($tsmovlib[0]["cedrif"]);
              $tsmovlibA->setCodmon($tsmovlib[0]["codmon"]);
              $tsmovlibA->setValmon($tsmovlib[0]["valmon"]);
              $tsmovlibA->save();

              Tesoreria::actualiza_Bancos('A','D',$numcue,$monmov);
              }
          }
        }
        }//if (!$tsmovlib[0]["stacon"]!='C')
      }//  if (Herramientas::BuscarDatos($sql,&$tsmovlib))
     }//else if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('tsmovlib[feclib]'))==true)
  }
  else{
  	$form="sf_admin/tesmovseglib/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
    if ($grabo=='') {
    $this->msg=1; ///Generar el Comprobante
    Tesoreria::grabarCompAnulacionMovLibAnoANt($numcue,$reflib,$tipmov,$fecanu,$msjuno,$comprobante);
    $concom=1;
    $this->msjuno="";
    if ($msjuno=="")
    {
      $i=0;
      while ($i<$concom)
      {
       $f[$i]=$form.$i;
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
      $this->i=$concom-1;
      $this->formulario=$f;
      }else
      {
        $this->msjuno=$msjuno;
      }
    }else{ ///Grabar el comprobante y generar la anulacion

    $sql="Select stacon,tipmov,monmov,codcta,numcue,cedrif, codmon, valmon From TsMovLib Where NumCue = '".$numcue."' And RefLib = '".$reflib."' and TipMov = '".$tipmov."' ";
    if (Herramientas::BuscarDatos($sql,$tsmovlib))
      {
        if ($tsmovlib[0]["stacon"]!='C')
        {
          if ($tsmovlib[0]["reflibaju"]!='' && $tsmovlib[0]["tipmovaju"]!=''){
              //Movimiento según libro de Ajuste Diferencial
              $t = new Criteria();
              $t->add(TsmovlibPeer::NUMCUE,$numcue);
              $t->add(TsmovlibPeer::REFLIB,$tsmovlib[0]["reflibaju"]);
              $t->add(TsmovlibPeer::TIPMOV,$tsmovlib[0]["tipmovaju"]);
              $regt=TsmovlibPeer::doSelectOne($t);
              if ($regt){
                $regt->setStadif(null);
                $regt->save();
              }

              $refaju=substr($reflib,2,6);
              //Anula los Pagados
              Presupuesto::salvarAnuPrepagar('AP'.$refaju,$fecanu_m,$desanu);

              //Anula los Causados
              Presupuesto::salvarAnuCausado('AA'.$refaju,$fecanu_m,$desanu);

              //Anula los Compromisos
              Presupuesto::salvarAnuPrecompro('AC'.$refaju,$fecanu_m,$desanu);             

              $this->msg=Tesoreria::anular_Eliminar('A',$numcomadi,$feccomadi,$compadic,$fechacom,$numcom,$numcom2,$fecanu,$reflib2,$desanu);
              if ($this->msg==''){
              // GENERAR NUEVO MOVIMIENTO SEGUN LIBRO
              $tsmovlibA= new Tsmovlib();
              $dateFormat = new sfDateFormat($this->getUser()->getCulture());
              $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

              $tsmovlibA->setNumcue($tsmovlib[0]["numcue"]);
              $tsmovlibA->setReflib($reflib2);
              $tsmovlibA->setRefpag($refpag);
              $tsmovlibA->setFeclib($fec);
              $tsmovlibA->setFecing(date('Y-m-d'));
              if ($afecta=='C')
              {
                $tsmovlibA->setTipmov('ANUC');
              }
              else if ($afecta=='D')
              {
                $tsmovlibA->setTipmov('ANUD');
              }
              $tsmovlibA->setMonmov($tsmovlib[0]["monmov"]);
              $tsmovlibA->setNumcom($numcom2);
              $tsmovlibA->setMotanu($desanu);
              $tsmovlibA->setCodcta($tsmovlib[0]["codcta"]);
              $tsmovlibA->setFeccom($fec);
              $tsmovlibA->setStatus('C');
              $tsmovlibA->setStacon('C');
              $tsmovlibA->setDeslib('Movimiento Anulado');
              $tsmovlibA->setReflibpad($reflib);
              $tsmovlibA->setTipmovpad($tipmov);
              $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
              $tsmovlibA->setLoguse($loguse);
              $tsmovlibA->setCedrif($tsmovlib[0]["cedrif"]);
              $tsmovlibA->setCodmon($tsmovlib[0]["codmon"]);
              $tsmovlibA->setValmon($tsmovlib[0]["valmon"]);
              $tsmovlibA->save();

              Tesoreria::actualiza_Bancos('A','D',$numcue,$monmov);
              }
          }else {
              $escheque=H::getX('CODTIP','Tstipmov','Escheque',$tsmovlib[0]["tipmov"]);
              if ($escheque==1)
              {
                $this->msg=$this->msg.Tesoreria::anular_Eliminar_Cheque('A',$numcue,$reflib);
                if ($this->msg==''){
                $this->msg=$this->msg.Tesoreria::actualiza_Orden_De_Pago($reflib,$numcue,$tipmov);
                if ($this->msg==''){
                $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('A',$reflib,$numcue,$fecanu, $refpag);
              }
                }
              }
              else
              {
                $sql2="select refier from cpdocpag where tippag='".$tsmovlib[0]["tipmov"]."' ";
                if (Herramientas::BuscarDatos($sql2,$tabla))
                {
                  if ($tabla[0]["refier"]=='A')
                  {
                    $this->msg=$this->msg.Tesoreria::actualiza_Orden_De_Pago($reflib,$numcue,$tipmov);
                    if ($this->msg==''){
                    $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('A',$reflib,$numcue,$fecanu,$refpag);
                  }
                  }
                  else
                  {
                    $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('A',$reflib,$numcue,$fecanu,$refpag);
                  if ($this->msg==''){
                  $c = new Criteria();
                  $c->add(OpdetperPeer::NUMCHE,$reflib);
                  $c->add(OpdetperPeer::CTABAN,$numcue);
                  $c->add(OpdetperPeer::TIPMOV,$tipmov);
                  $opdetper = OpdetperPeer::doSelectOne($c);
                  if ($opdetper)
                  {
                    $opdetper->setFecpag(null);
                    $opdetper->setNumche(null);
                    $opdetper->save();
                  }
                  }
                }
              }
              }
              $sql3="select debcre from tstipmov where codtip='".$tipmov."'";
              if (Herramientas::BuscarDatos($sql3,$tstipmov))
              {
                $afecta=$tstipmov[0]["debcre"];
              }
             if ($this->msg==''){
              // Grabar Nuevo comprobante contable
              if ($this->getUser()->getAttribute('grabo',null,$this->getUser()->getAttribute('formulario'))=='S')
    	      {
    	        $numcomq='';
    	        $concom=1;
    	        $i=0;
    	        while ($i<$concom)
    	        {
    	          $formcont="sf_admin/tesmovseglib/confincomgen".$i;
    	          $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formcont);
    	          $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formcont);
    	          $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formcont);
    	          $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formcont);
    	          $debito=$this->getUser()->getAttribute('debito',null,$formcont);
    	          $credito=$this->getUser()->getAttribute('credito',null,$formcont);
    	          $grid=$this->getUser()->getAttribute('grid',null,$formcont);

    	          $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formcont);
    	          $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formcont);
    	          $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formcont);
    	          $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formcont);
    	          $this->getUser()->getAttributeHolder()->remove('debito',$formcont);
    	          $this->getUser()->getAttributeHolder()->remove('credito',$formcont);
    	          $this->getUser()->getAttributeHolder()->remove('grid',$formcont);

    	          $numcomq = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formcont));
    	          $i++;
    	        }
    	        $this->getUser()->getAttributeHolder()->remove('grabo',$this->getUser()->getAttribute('formulario'));

              // GENERAR NUEVO MOVIMIENTO SEGUN LIBRO
              $tsmovlibA= new Tsmovlib();
              $dateFormat = new sfDateFormat($this->getUser()->getCulture());
              $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

              $tsmovlibA->setNumcue($tsmovlib[0]["numcue"]);
              $tsmovlibA->setReflib($reflib2);
              $tsmovlibA->setRefpag($refpag);
              $tsmovlibA->setFeclib($fec);
              $tsmovlibA->setFecing(date('Y-m-d'));
              if ($afecta=='C')
              {
                $tsmovlibA->setTipmov('ANUC');
              }
              else if ($afecta=='D')
              {
                $tsmovlibA->setTipmov('ANUD');
              }
              $tsmovlibA->setMonmov($tsmovlib[0]["monmov"]);
              $tsmovlibA->setNumcom($numcomq);
              $tsmovlibA->setMotanu($desanu);
              $tsmovlibA->setCodcta($tsmovlib[0]["codcta"]);
              $tsmovlibA->setFeccom($fec);
              $tsmovlibA->setStatus('C');
              $tsmovlibA->setStacon('C');
              $tsmovlibA->setDeslib('Cheque Anulado');
              $tsmovlibA->setReflibpad($reflib);
              $tsmovlibA->setTipmovpad($tipmov);
              $tsmovlibA->setCedrif($tsmovlib[0]["cedrif"]);
              $tsmovlibA->setCodmon($tsmovlib[0]["codmon"]);
              $tsmovlibA->setValmon($tsmovlib[0]["valmon"]);
              $tsmovlibA->save();

              Tesoreria::actualiza_Bancos('A','D',$numcue,$monmov);
              }
        }//if (!$tsmovlib[0]["stacon"]!='C')
      }
      }//  if (Herramientas::BuscarDatos($sql,&$tsmovlib))
    }
    }
  }
   }
    return sfView::SUCCESS;
  }


  public function validarGeneraComprobante()
  {
    if ($this->getUser()->getAttribute('grabo',null,$this->getUser()->getAttribute('formulario'))=='S' && $this->getRequestParameter('formulario')!='')
    { return false;}
    else { return true;}
  }

  public function executeCreate()
  {
    $this->getUser()->getAttributeHolder()->remove('grabo',$this->getUser()->getAttribute('formulario'));
    return $this->forward('tesmovseglib', 'edit');
  }

  public function getLabels()
  {
    $labels = parent::getLabels();
   
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['tsmovlib{coddirec}'] = 'Estado';
    return $labels;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid2()
  {
    $c = new Criteria();
    $c->add(TsdetreiPeer::REFREI,$this->tsmovlib->getRefrei());
    $per = TsdetreiPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesmovseglib/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_rei');
    
    $mascara = H::getX('Codemp','Cpdefniv','Forpre','001');
    $longitud=strlen($mascara);

    $obj2= array('codpre' => 1, 'nompre' => 2);
    $params= array('param1' => $longitud, 'val2');
    $this->columnas[1][0]->setCatalogo('Cpdeftit','sf_admin_edit_form',$obj2,'Cpdeftit_Almregrgo',$params);
    $this->columnas[1][0]->setHTML('type="text" size="'.chr(39).$longitud.chr(39).'" maxlength="'.chr(39).$longitud.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');

    $this->obj2 = $this->columnas[0]->getConfig($per);
  }   

     /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traer el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";

    switch ($col) {
          case '1':
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                $longitud = strlen(H::getX('Codemp','Cpdefniv','Forpre','001'));
                if (strlen($grid[$fila][$col-1])==$longitud) {
                  $t= new Criteria();
                  $t->add(CpasiiniPeer::PERPRE,'00');
                  $t->add(CpasiiniPeer::CODPRE,$grid[$fila][$col-1]);
                  $reg= CpasiiniPeer::doSelectOne($t);
                  if (!$reg)
                  {
                      $grid[$fila][$col-1]="";
                      $grid[$fila][$col]="";
                      $javascript="alert('El Código Presupuestario de Gasto no existe');";
                  }else {
                    $grid[$fila][$col]=$reg->getNompre();
                  } 
                }else {                
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
                  $javascript="alert_('El Código Presupuestario de Gasto no es de &Uacute;ltimo Nivel');";
                }                 
              }else {
                  
                 $grid[$fila][$col-1]="";
                 $grid[$fila][$col]="";
                 $javascript="alert('El Código Presupuestario de Gasto esta repetido');";
              }   

       
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;
          case '2':    
              /*$monimp=H::toFloat($grid[$fila][$col-1])*$valmon;
              $codpre=H::getCodPreDis($grid[$fila][$col-2]);
              if($monimp>0){
                $mondis = H::Monto_disponible($codpre,$fec2);
                if($mondis<$monimp){
                   $grid[$fila][$col-1]="0,00";
                   $javascript="alert('El Código Presupuestario no tiene Disponibilidad.');";
                }                
              }*/
              $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;  
          default:
            break;
        }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }  

}

