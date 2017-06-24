<?php

/**
 * tesmovemiche actions.
 *
 * @package    Roraima
 * @subpackage tesmovemiche
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesmovemicheActions extends autotesmovemicheActions
{
 private $coderror1 =-1;
 private $coderror2 =-1;
 private $coderror3 =-1;
 private $coderror4 =-1;
 private $coderror5 =-1;
 private $coderror6 =-1;
 private $arraynumche="";
 private $arraynumcue="";
 private $form="sf_admin/tesmovemiche/confincomgen";
 private $infogebos='';

  public function executeIndex()
  {
    return $this->redirect('tesmovemiche/create');
  }

  protected function getTscheemiOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $tscheemi = new Tscheemi();
      if ($this->getRequestParameter('tscheemi[operacion]')!='') {
        if ($this->getRequestParameter('tscheemi[operacion]')=='ordpag') {
           $this->configGridOrdPag('S',$this->getRequestParameter('tscheemi[cedrif]'),$this->getRequestParameter('tscheemi[fecemi]'),$this->getRequestParameter('tscheemi[numeroord]'),$this->getRequestParameter('tscheemi[fecord]'),$this->getRequestParameter('tscheemi[numcue]'),$this->getRequestParameter('tscheemi[tipdoc]'),$this->getRequestParameter('tscheemi[codadiban]'),$this->getRequestParameter('tscheemi[coddirec]'));
           $this->configGridCompro('');
           $this->configGridPrecom('');
        }elseif ($this->getRequestParameter('tscheemi[operacion]')=='compro') {
          $this->configGridCompro('S',$this->getRequestParameter('tscheemi[cedrif]'),$this->getRequestParameter('tscheemi[coddirec]'));
          $this->configGridOrdPag('');
          $this->configGridPrecom('');
        }elseif ($this->getRequestParameter('tscheemi[operacion]')=='precom') {
          $this->configGridPrecom('S',$this->getRequestParameter('tscheemi[cedrif]'),$this->getRequestParameter('tscheemi[coddirec]'));
          $this->configGridOrdPag('');
          $this->configGridCompro('');
        }else {
          $this->configGridPrecom('');
          $this->configGridOrdPag('');
          $this->configGridCompro('');
        }        
      }else {
        $this->configGridOrdPag('S',$this->getRequestParameter('tscheemi[cedrif]'),$this->getRequestParameter('tscheemi[fecemi]'),$this->getRequestParameter('tscheemi[numeroord]'),$this->getRequestParameter('tscheemi[fecord]'),$this->getRequestParameter('tscheemi[numcue]'),$this->getRequestParameter('tscheemi[tipdoc]'),$this->getRequestParameter('tscheemi[codadiban]'),$this->getRequestParameter('tscheemi[coddirec]'));
        $this->configGridCompro('S',$this->getRequestParameter('tscheemi[cedrif]'),$this->getRequestParameter('tscheemi[coddirec]'));
        $this->configGridPrecom('S',$this->getRequestParameter('tscheemi[cedrif]'),$this->getRequestParameter('tscheemi[coddirec]'));
      }

      $this->configGridPagDir();
    }
    else
    {
      $tscheemi = TscheemiPeer::retrieveByPk($this->getRequestParameter($id));
      if ($tscheemi) {
          $this->configGridOrdPag('S',$tscheemi->getCedrif(),$tscheemi->getFecemi());
          $this->configGridCompro('S',$tscheemi->getCedrif());
          $this->configGridPrecom('S',$tscheemi->getCedrif());
          $this->configGridPagDir();
      }
      $this->forward404Unless($tscheemi);
    }
    return $tscheemi;
  }



  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->tscheemi = $this->getTscheemiOrCreate();
    $this->impche=$this->getRequestParameter('impche');
    $this->numcomegr=$this->getRequestParameter('numcomegr');
    $this->numches=$this->getRequestParameter('numches');
    $this->scheque=$this->getRequestParameter('scheque');
    $this->numcues=$this->getRequestParameter('numcues');
    $this->getUser()->setAttribute('tschemi_operacion',"");
    $this->comprobaut="";
    if (!$this->tscheemi->getId()){        
        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
        if ($filsoldir=='S'){
           $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
           $t= new Criteria();
           $t->add(SegdirusuPeer::LOGUSE,$loguse);
           $t->setLimit(1);
           $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
           $regt= SegdirusuPeer::doSelectOne($t); 
           if ($regt){
            if ($this->tscheemi->getCoddirec()=='')
              $this->tscheemi->setCoddirec($regt->getCoddirec());
           }
          
        }
      }
    $this->gencomaut=H::getConfApp2('gencomaut', 'tesoreria', 'tesmovemiche');
    $this->bloqfec="";
    $mismactaban=H::getConfApp2('mismactaban', 'tesoreria', 'tesmovemiche');
    if ($mismactaban=='S')
    {
        $this->tscheemi->setNumcue($this->getUser()->getAttribute('cuentabancaria',null,'tesmovemiche'));
        $this->tscheemi->setNomcue(H::getX_vacio('NUMCUE', 'Tsdefban', 'Nomcue', $this->tscheemi->getNumcue()));
        $this->tscheemi->setTipdoc($this->getUser()->getAttribute('tipodocumento',null,'tesmovemiche'));
        $this->tscheemi->setDestip(H::getX_vacio('TIPPAG', 'Cpdocpag', 'Nomext', $this->tscheemi->getTipdoc()));
        $this->tscheemi->setNumche($this->getUser()->getAttribute('numerocheque',null,'tesmovemiche'));
    }
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp) {
			if(array_key_exists('generales',$varemp)) {
		     if(array_key_exists('comprobaut',$varemp['generales']))
				 {
				   $this->comprobaut=$varemp['generales']['comprobaut'];
				 }
			}
	    if(array_key_exists('aplicacion',$varemp))
			 if(array_key_exists('tesoreria',$varemp['aplicacion']))
			   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
			     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos'])){
			       if(array_key_exists('bloqfec',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
			       {
			       	$this->bloqfec=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['bloqfec'];
			       }
			     }
    }
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
         $this->updateTscheemiFromRequest();

         $this->saveTscheemi($this->tscheemi);
         $trajo=H::getX_vacio('CODTIP','Tstipmov','Escheque',$this->tscheemi->getTipdoc());
         if ($trajo)
          $scheque='S';
        else $scheque='N';

         //buscar el ID del cheque q acabo de emitir
          /*$c = new Criteria();
          $c->add(TscheemiPeer::NUMCHE,$this->tscheemi->getNumche());
          $c->add(TscheemiPeer::NUMCUE,$this->tscheemi->getNumcue());
          $r = TscheemiPeer::doSelectOne($c);
          if ($r) {$this->tscheemi->setId($r->getId()); $this->tscheemi->setNumcomegr($r->getNumcomegr());}*/
          $sqlq="select id, numcomegr from tscheemi where numche='".$this->tscheemi->getNumche()."' and numcue='".$this->tscheemi->getNumcue()."'";
          if (Herramientas::BuscarDatos($sqlq,$resultq))
          {
            $idb=$resultq[0]['id'];
            $numcomegr2=$resultq[0]['numcomegr'];
            //$this->tscheemi->setId($resultq[0]['id']);
            //$this->tscheemi->setNumcomegr($resultq[0]['numcomegr']);
          }
          if ($this->arraynumche!=""){
              $this->setFlash('notice', 'Tus modificaciones han sido guardadas. '.$this->infogebos);
              $this->Bitacora('Guardo');
          }else {
          	  $this->setFlash('notice', $this->arraynumcue);
              $this->Bitacora('Guardo');
          }

          if ($this->getRequestParameter('save_and_list'))
          {
            return $this->redirect('tesmovemiche/list');
          }
          else
          {
          	if ($this->tscheemi->getId())
            return $this->redirect('tesmovemiche/edit?impche=S&numches='.$this->arraynumche.'&numcues='.$this->arraynumcue.'&id='.$idb.'&scheque='.$scheque.'&numcomegr='.$numcomegr2);
            else return $this->redirect('tesmovemiche/edit?impche=S&numches='.$this->arraynumche.'&numcues='.$this->arraynumcue.'&scheque='.$scheque.'&numcomegr='.$numcomegr2);
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
  protected function updateTscheemiFromRequest()
  {
    $tscheemi = $this->getRequestParameter('tscheemi');

    if (isset($tscheemi['tipdoc']))
    {
      $this->tscheemi->setTipdoc($tscheemi['tipdoc']);
    }
    if (isset($tscheemi['numche']))
    {
      $this->tscheemi->setNumche($tscheemi['numche']);
    }
    if (isset($tscheemi['numcue']))
    {
      $this->tscheemi->setNumcue($tscheemi['numcue']);
    }
    if (isset($tscheemi['nomcue']))
    {
      $this->tscheemi->setNomcue($tscheemi['nomcue']);
    }
    if (isset($tscheemi['cedrif']))
    {
      $this->tscheemi->setCedrif($tscheemi['cedrif']);
    }
    if (isset($tscheemi['nomben']))
    {
      $this->tscheemi->setNomben($tscheemi['nomben']);
    }
    if (isset($tscheemi['fecemi']))
    {
      if ($tscheemi['fecemi'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($tscheemi['fecemi']))
          {
            $value = $dateFormat->format($tscheemi['fecemi'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tscheemi['fecemi'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tscheemi->setFecemi($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tscheemi->setFecemi(null);
      }
    }
    if (isset($tscheemi['monche']))
    {
      $this->tscheemi->setMonche($tscheemi['monche']);
    }
       if (isset($tscheemi['tippagordpag']))
    {
      $this->tscheemi->setTippagordpag($tscheemi['tippagordpag']);
    }
    if (isset($tscheemi['descriordpag']))
    {
      $this->tscheemi->setDescriordpag($tscheemi['descriordpag']);
    }
    if (isset($tscheemi['montotordpag']))
    {
      $this->tscheemi->setMontotordpag($tscheemi['montotordpag']);
    }
    if (isset($tscheemi['montotcompro']))
    {
      $this->tscheemi->setMontotcompro($tscheemi['montotcompro']);
    }
    if (isset($tscheemi['montotprecom']))
    {
      $this->tscheemi->setMontotprecom($tscheemi['montotprecom']);
    }
    if (isset($tscheemi['conceppagnap']))
    {
      $this->tscheemi->setConceppagnap($tscheemi['conceppagnap']);
    }
    if (isset($tscheemi['montotpagnap']))
    {
      $this->tscheemi->setMontotpagnap($tscheemi['montotpagnap']);
    }
    if (isset($tscheemi['mondtopagnap']))
    {
      $this->tscheemi->setMondtopagnap($tscheemi['mondtopagnap']);
    }
    if (isset($tscheemi['condtopagnap']))
    {
      $this->tscheemi->setCondtopagnap($tscheemi['condtopagnap']);
    }
    if (isset($tscheemi['totnetpagnap']))
    {
      $this->tscheemi->setTotnetpagnap($tscheemi['totnetpagnap']);
    }
    if (isset($tscheemi['conceppagdir']))
    {
      $this->tscheemi->setConceppagdir($tscheemi['conceppagdir']);
    }
    if (isset($tscheemi['totnetpagdir']))
    {
      $this->tscheemi->setTotnetpagdir($tscheemi['totnetpagdir']);
    }
    if (isset($tscheemi['mondtopagdir']))
    {
      $this->tscheemi->setMondtopagdir($tscheemi['mondtopagdir']);
    }
    if (isset($tscheemi['condtopagdir']))
    {
      $this->tscheemi->setCondtopagdir($tscheemi['condtopagdir']);
    }
    if (isset($tscheemi['operacion']))
    {
      $this->tscheemi->setOperacion($tscheemi['operacion']);
    }
    if (isset($tscheemi['bloqueado']))
    {
      $this->tscheemi->setBloqueado($tscheemi['bloqueado']);
    }
    if (isset($tscheemi['nombensus']))
    {
      $this->tscheemi->setNombensus($tscheemi['nombensus']);
    }
     if (isset($tscheemi['numeroord']))
    {
      $this->tscheemi->setNumeroord($tscheemi['numeroord']);
    }
     if (isset($tscheemi['fecord']))
    {
      $this->tscheemi->setFecord($tscheemi['fecord']);
    }
    if (isset($tscheemi['codmon']))
    {
      $this->tscheemi->setCodmon($tscheemi['codmon']);
    }
    if (isset($tscheemi['valmon']))
    {
      $this->tscheemi->setValmon($tscheemi['valmon']);
    }
    if (isset($tscheemi['codconcepto']))
    {
      $this->tscheemi->setCodconcepto($tscheemi['codconcepto']);
    }
    if (isset($tscheemi['compret']))
    {
      $this->tscheemi->setCompret($tscheemi['compret']);
    }
    if (isset($tscheemi['coddirec']))
    {
      $this->tscheemi->setCoddirec($tscheemi['coddirec']);
    }
    if (isset($tscheemi['codadiban']))
    {
      $this->tscheemi->setCodadiban($tscheemi['codadiban']);
    }
    if (isset($tscheemi['codpro']))
    {
      $this->tscheemi->setCodpro($tscheemi['codpro']);
    }
    if (isset($tscheemi['cedrifsus']))
    {
      $this->tscheemi->setCedrifsus($tscheemi['cedrifsus']);
    }
    if (isset($tscheemi['numcomegr']))
    {
      $this->tscheemi->setNumcomegr($tscheemi['numcomegr']);
    }

     //Se guarda el nombre del usuario actual del sistema
     $this->tscheemi->setCodemi($this->getUser()->getAttribute('usuario'));
  }

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
    $mostrardato=$this->getRequestParameter('mostrardato');
    $output='';
    $jstscheemi='';
    $javascript="";

    if ($this->getRequestParameter('ajax')=='1')//TIPO DE DOCUMENTO
    {
      //verificar si el documento existe en la Tabla TSTIPMOV
      $c = new Criteria();
        $c->add(TstipmovPeer::CODTIP,strtoupper($this->getRequestParameter('tipdoc')));
        $tipmov = TstipmovPeer::doSelectOne($c);
          if ($tipmov)
          {
            $dato=CpdocpagPeer::getNomext(strtoupper($this->getRequestParameter('tipdoc')));
            $valormayuscula=strtoupper($this->getRequestParameter('tipdoc'));
            /*if($tipmov->getEscheque()){
              $javascript="$('divnumche').show();$('tscheemi_numche').value='';";
            }else{
              $javascript="$('divnumche').hide();$('tscheemi_numche').value='XXXXXXX';";
            }
            $jstscheemi = ',["javascript","'.$javascript.'",""]';*/
            $comegrseq=H::getConfApp2('comegrseq', 'tesoreria', 'tesmovemiche');
            $mancomegr=H::getConfApp2('mancomegr', 'tesoreria', 'tesmovemiche');
            $mosnumcomegr=H::getConfApp2('mosnumcomegr', 'tesoreria', 'tesmovemiche');
            if  ($mancomegr=='S' && $mosnumcomegr=='S') {
              if ($this->getRequestParameter('numcomegr')==''){
              if($tipmov->getEscheque()){
                $numegr='';
                if ($comegrseq=='S'){
                  $valido = false;
                  while(!$valido){
                    $r = H::getNextvalSecuencia('com_egr_seq');
                    $numcomegr=str_pad($r, 8, '0', STR_PAD_LEFT);

                    $c = new Criteria();
                    $c->add(TscheemiPeer::NUMCOMEGR,$numcomegr);
                    $regt = TscheemiPeer::doSelectOne($c);
                    if(!$regt){
                      $valido = true;
                    }
                  }
                  $numegr=$numcomegr;
                }
                $javascript="$('divnumcomegr').show();$('tscheemi_numcomegr').value='$numegr';";
              }else{
                $javascript="$('divnumcomegr').hide();$('tscheemi_numcomegr').value='';";
              }
            }
            }
            $jstscheemi = ',["javascript","'.$javascript.'",""]';
          }
          else
          {
          	$javascript="alert('Documento no se encuentra definido como Tipo de Movimiento');$('tscheemi_tipdoc').value='';$('tscheemi_tipdoc').focus();";
            $output = '[["javascript","'.$javascript.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            return sfView::HEADER_ONLY;
          }
        }
        else if ($this->getRequestParameter('ajax')=='2')//BENEFICIARIO
        {
        //  $dato=OpbenefiPeer::getCedula(strtoupper($this->getRequestParameter('cedrif')));
          $dato=OpbenefiPeer::getDato($this->getRequestParameter('cedrif'), 'Nomben');
          $desctacre=OpbenefiPeer::getDato($this->getRequestParameter('cedrif'), 'Nomben');
          $codcta=OpbenefiPeer::getDato($this->getRequestParameter('cedrif'), 'codcta');
          $valormayuscula=$this->getRequestParameter('cedrif');
        }

      else if ($this->getRequestParameter('ajax')=='3')//NRO CUENTA BANCARIA
      {
      	$javascript=""; $nomrep=""; $dato2="";
      	$bloqueado=$this->getRequestParameter('bloq');
        $loguse= $this->getUser()->getAttribute('loguse');
        $filubiadm=H::getConfApp2('filubiadm', 'tesoreria', 'pagemiord');     
        $filbandir = H::getConfApp2('filbandir', 'tesoreria', 'tesdefcueban');
        $gennumche=H::getConfApp2('gennumche', 'tesoreria', 'tesmovemiche');
        $sql='';
          if (trim($this->getRequestParameter('codigo'))!='')
          {
          	$q= new  Criteria();
          	$result=OpdefempPeer::doSelectOne($q);
          	if ($result)
          	{
              if ($result->getManbloqban()=='S')
              {
                  $t= new Criteria();
                  $t->add(TsbloqbanPeer::NUMCUE,$this->getRequestParameter('codigo'));
                  $resultado=TsbloqbanPeer::doSelectOne($t);
                  if (!$resultado)
                  {
                     if ($bloqueado=="")
                     {
                      $w= new Criteria();
                      if ($filubiadm=='S' || $filbandir=='S') {
                        $codigo=$this->getRequestParameter('codigo');
                        if ($filubiadm=='S')
                          $sql='tsdefban.numcue=\''.$codigo.'\' and tsdefban.codubi in (select codubi from "SIMA_USER".segubausu where loguse=\''.$loguse.'\')';
                        if ($filbandir=='S'){                          
                          if ($sql!='')
                            $sql.=' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
                          else
                            $sql='tsdefban.numcue=\''.$codigo.'\' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
                        }
                        $w->add(TsdefbanPeer::CODUBI,$sql,Criteria::CUSTOM);
                      }else $w->add(TsdefbanPeer::NUMCUE,$this->getRequestParameter('codigo'));
                      $trajo= TsdefbanPeer::doSelectOne($w);
                      if ($trajo) {
                        $dato=$trajo->getNomcue();
                        $dato2=$trajo->getCodadi();
                        $nomrep=$trajo->getNomrep();
      		              $numche=$trajo->getNumche();
      		              $numche=str_pad($numche,8,"0",STR_PAD_LEFT);
      		              
                        $c = new Criteria();
      		              $c->add(TstipmovPeer::CODTIP,strtoupper($this->getRequestParameter('tipdoc')));
      		              $tipmov = TstipmovPeer::doSelectOne($c);
      		              if ($tipmov)
      		              {
                          if($tipmov->getEscheque()==false){
                              $numche=''; 
                              if ($tipmov->getEstran()=='S'){
                                 $numche=str_pad($trajo->getCorchetran(),8,"0",STR_PAD_LEFT);
                              }
                          }else {
                             $ca = new Criteria();
                             $ca->add(TsdefchequeraPeer::NUMCUE,$this->getRequestParameter('codigo'));
                             $ca->add(TsdefchequeraPeer::ACTIVA,'SI');                         
                             $objp = TsdefchequeraPeer::doSelectOne($ca);
                             if($objp)
                             {
                                if ($numche==$objp->getNumchehas())
                                  $javascript="alert_('Este es el &Uacute;ltimo Cheque de la Chequera Activa');";
                             }
                          }
                        }

                            //Para Bloquear la cuenta mientras este usuario la esta usando al grabar se desbloquea
      		              $tsbloqban= new Tsbloqban();
      		              $tsbloqban->setNumcue($this->getRequestParameter('codigo'));
      		              $tsbloqban->save(); ////////////////////
      		              $bloqueado=$this->getRequestParameter('codigo');
                      }else {
                         $numche='';
                         $dato="";
                         $javascript="alert('La Cuenta Bancaria no Existe'); $('$cajtexcom').value='';";
                      }
                     }
                     else
                     {
                        $t1= new Criteria();
                        $t1->add(TsbloqbanPeer::NUMCUE,$bloqueado);
                        TsbloqbanPeer::doDelete($t1);
                        
                        $w= new Criteria();
                        if ($filubiadm=='S' || $filbandir=='S') {
                          $codigo=$this->getRequestParameter('codigo');
                          if ($filubiadm=='S')
                            $sql='tsdefban.numcue=\''.$codigo.'\' and tsdefban.codubi in (select codubi from "SIMA_USER".segubausu where loguse=\''.$loguse.'\')';
                          if ($filbandir=='S'){                          
                            if ($sql!='')
                              $sql.=' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
                            else
                              $sql='tsdefban.numcue=\''.$codigo.'\' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
                          }
                          $w->add(TsdefbanPeer::CODUBI,$sql,Criteria::CUSTOM);
                        }else $w->add(TsdefbanPeer::NUMCUE,$this->getRequestParameter('codigo'));
                        $trajo= TsdefbanPeer::doSelectOne($w);
                        if ($trajo) {
                          $dato=$trajo->getNomcue();
                          $dato2=$trajo->getCodadi();
                          $nomrep=$trajo->getNomrep();
                          $numche=$trajo->getNumche();
                          $numche=str_pad($numche,8,"0",STR_PAD_LEFT);
                          
      		                $c = new Criteria();
      		                $c->add(TstipmovPeer::CODTIP,strtoupper($this->getRequestParameter('tipdoc')));
      		                $tipmov = TstipmovPeer::doSelectOne($c);
      		                if ($tipmov)
      		                {
                            if($tipmov->getEscheque()==false) {
                              $numche=''; 
                              if ($tipmov->getEstran()=='S'){
                                 $numche=str_pad($trajo->getCorchetran(),8,"0",STR_PAD_LEFT);
                              }
                            }else {
                               $ca = new Criteria();
                               $ca->add(TsdefchequeraPeer::NUMCUE,$this->getRequestParameter('codigo'));
                               $ca->add(TsdefchequeraPeer::ACTIVA,'SI');                         
                               $objp = TsdefchequeraPeer::doSelectOne($ca);
                               if($objp)
                               {
                                  if ($numche==$objp->getNumchehas())
                                    $javascript="alert_('Este es el &Uacute;ltimo Cheque de la Chequera Activa');";
                               }
                            }
                          }

                              //Para Bloquear la cuenta mientras este usuario la esta usando al grabar se desbloquea
      		                $tsbloqban= new Tsbloqban();
      		                $tsbloqban->setNumcue($this->getRequestParameter('codigo'));
      		                $tsbloqban->save(); ////////////////////
                        }else{
                           $numche='';
                           $dato="";
                           $javascript="alert('La Cuenta Bancaria no Existe'); $('$cajtexcom').value='';";
                        }

                     }
                  }
                  else
                  {
                  	if ($bloqueado!=$this->getRequestParameter('codigo'))
                  	{
                  	 $numche='';
                  	 $dato="";
                  	 $javascript="alert('La Cuenta Bancaria se encuentra Bloqueada'); $('$cajtexcom').value='';";
                  	}
                  	else
                  	{
                        $w= new Criteria();
                        if ($filubiadm=='S' || $filbandir=='S') {
                          $codigo=$this->getRequestParameter('codigo');
                          if ($filubiadm=='S')
                            $sql='tsdefban.numcue=\''.$codigo.'\' and tsdefban.codubi in (select codubi from "SIMA_USER".segubausu where loguse=\''.$loguse.'\')';
                          if ($filbandir=='S'){                          
                            if ($sql!='')
                              $sql.=' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
                            else
                              $sql='tsdefban.numcue=\''.$codigo.'\' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
                          }                          
                          $w->add(TsdefbanPeer::CODUBI,$sql,Criteria::CUSTOM);
                        }else $w->add(TsdefbanPeer::NUMCUE,$this->getRequestParameter('codigo'));
                        $trajo= TsdefbanPeer::doSelectOne($w);
                        if ($trajo) {
                          $dato=$trajo->getNomcue();
                          $dato2=$trajo->getCodadi();
                          $nomrep=$trajo->getNomrep();
                          $numche=$trajo->getNumche();
                          $numche=str_pad($numche,8,"0",STR_PAD_LEFT);
                  	
      		                $c = new Criteria();
      		                $c->add(TstipmovPeer::CODTIP,strtoupper($this->getRequestParameter('tipdoc')));
      		                $tipmov = TstipmovPeer::doSelectOne($c);
      		                if ($tipmov)
      		                {
                            if($tipmov->getEscheque()==false){
                              $numche=''; 
                              if ($tipmov->getEstran()=='S'){
                                 $numche=str_pad($trajo->getCorchetran(),8,"0",STR_PAD_LEFT);
                              }
                            }else {
                               $ca = new Criteria();
                               $ca->add(TsdefchequeraPeer::NUMCUE,$this->getRequestParameter('codigo'));
                               $ca->add(TsdefchequeraPeer::ACTIVA,'SI');                         
                               $objp = TsdefchequeraPeer::doSelectOne($ca);
                               if($objp)
                               {
                                  if ($numche==$objp->getNumchehas())
                                    $javascript="alert_('Este es el &Uacute;ltimo Cheque de la Chequera Activa');";
                               }
                            }
                          }
                      }else {
                         $numche='';
                           $dato="";
                           $javascript="alert('La Cuenta Bancaria no Existe'); $('$cajtexcom').value='';";
                      }
                  	}
                  }

              }else
              {
                $w= new Criteria();
                if ($filubiadm=='S' || $filbandir=='S') {
                  $codigo=$this->getRequestParameter('codigo');
                  if ($filubiadm=='S')
                    $sql='tsdefban.numcue=\''.$codigo.'\' and tsdefban.codubi in (select codubi from "SIMA_USER".segubausu where loguse=\''.$loguse.'\')';
                  if ($filbandir=='S'){                          
                    if ($sql!='')
                      $sql.=' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
                    else
                      $sql='tsdefban.numcue=\''.$codigo.'\' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
                  }
                  $w->add(TsdefbanPeer::CODUBI,$sql,Criteria::CUSTOM);
                }else $w->add(TsdefbanPeer::NUMCUE,$this->getRequestParameter('codigo'));
                $trajo= TsdefbanPeer::doSelectOne($w);
                if ($trajo) {
                  $dato=$trajo->getNomcue();
                  $dato2=$trajo->getCodadi();
                  $nomrep=$trajo->getNomrep();
                  $numche=$trajo->getNumche();
                  $numche=str_pad($numche,8,"0",STR_PAD_LEFT);
	             
  	              $c = new Criteria();
  	              $c->add(TstipmovPeer::CODTIP,strtoupper($this->getRequestParameter('tipdoc')));
  	              $tipmov = TstipmovPeer::doSelectOne($c);
  	              if ($tipmov)
  	              {
                    if($tipmov->getEscheque()==false){
                      $numche=''; 
                      if ($tipmov->getEstran()=='S'){
                         $numche=str_pad($trajo->getCorchetran(),8,"0",STR_PAD_LEFT);
                      }
                    }else {
                       $ca = new Criteria();
                       $ca->add(TsdefchequeraPeer::NUMCUE,$this->getRequestParameter('codigo'));
                       $ca->add(TsdefchequeraPeer::ACTIVA,'SI');                         
                       $objp = TsdefchequeraPeer::doSelectOne($ca);
                       if($objp)
                       {
                          if ($numche==$objp->getNumchehas())
                            $javascript="alert_('Este es el &Uacute;ltimo Cheque de la Chequera Activa');";
                       }
                    }
                  }
                }else {
                   $numche='';
                   $dato="";
                   $javascript="alert('La Cuenta Bancaria no Existe'); $('$cajtexcom').value='';";
                }
              }
          	}
          	else
          	{
               $w= new Criteria();
                if ($filubiadm=='S' || $filbandir=='S') {
                  $codigo=$this->getRequestParameter('codigo');
                  if ($filubiadm=='S')
                    $sql='tsdefban.numcue=\''.$codigo.'\' and tsdefban.codubi in (select codubi from "SIMA_USER".segubausu where loguse=\''.$loguse.'\')';
                  if ($filbandir=='S'){                          
                    if ($sql!='')
                      $sql.=' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
                    else
                      $sql='tsdefban.numcue=\''.$codigo.'\' and tsdefban.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
                  }
                  $w->add(TsdefbanPeer::CODUBI,$sql,Criteria::CUSTOM);
                }else $w->add(TsdefbanPeer::NUMCUE,$this->getRequestParameter('codigo'));
                $trajo= TsdefbanPeer::doSelectOne($w);
                if ($trajo) {
                  $dato=$trajo->getNomcue();
                  $dato2=$trajo->getCodadi();
                  $nomrep=$trajo->getNomrep();
                  $numche=$trajo->getNumche();
                  $numche=str_pad($numche,8,"0",STR_PAD_LEFT);
          	
                  $c = new Criteria();
                  $c->add(TstipmovPeer::CODTIP,strtoupper($this->getRequestParameter('tipdoc')));
                  $tipmov = TstipmovPeer::doSelectOne($c);
                  if ($tipmov)
                  {
                    if($tipmov->getEscheque()==false){
                      $numche=''; 
                      if ($tipmov->getEstran()=='S'){
                         $numche=str_pad($trajo->getCorchetran(),8,"0",STR_PAD_LEFT);
                      }
                    }else {
                       $ca = new Criteria();
                       $ca->add(TsdefchequeraPeer::NUMCUE,$this->getRequestParameter('codigo'));
                       $ca->add(TsdefchequeraPeer::ACTIVA,'SI');                         
                       $objp = TsdefchequeraPeer::doSelectOne($ca);
                       if($objp)
                       {
                          if ($numche==$objp->getNumchehas())
                            $javascript="alert_('Este es el &Uacute;ltimo Cheque de la Chequera Activa');";
                       }
                    }
                  }
                }else {
                   $numche='';
                   $dato="";
                   $javascript="alert('La Cuenta Bancaria no Existe'); $('$cajtexcom').value='';";
                }
          	}
          	$this->numchedesh="";
            $varemp = $this->getUser()->getAttribute('configemp');
      			if ($varemp)
      			if(array_key_exists('aplicacion',$varemp))
      			 if(array_key_exists('tesoreria',$varemp['aplicacion']))
      			   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
      			     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos'])){
      			       if(array_key_exists('numchedesh',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
      			       {
      			       	$this->numchedesh=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['numchedesh'];
      			       }
      			     }
    			 if ($this->numchedesh=='S')
    			 {
    			 	$javascript=$javascript." $('tscheemi_numche').readOnly=true;";
    			 }

           if ($gennumche=='S'){
            $numocul=$numche;
            $numche='';
            $javascript.="$('tscheemi_chequegen').value='$numocul';";
           }

          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["tscheemi_codadiban","'.$dato2.'",""],["tscheemi_numche","'.$numche.'",""],["tscheemi_bloqueado","'.$bloqueado.'",""],["javascript","'.$javascript.'",""],["tscheemi_nomrep","'.$nomrep.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
          }//if ($this->getRequestParameter('codigo')!='')
      }
      else  if ($this->getRequestParameter('ajax')=='4')//GRID DE PAGOS DIRECTOS, CODIGO PRESUPUESTARIO
      {
            $dato=CpdeftitPeer::getNompre($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            return sfView::HEADER_ONLY;
      }
      else if ($this->getRequestParameter('ajax')=='10')
      {
          $javascript="";
          $c= new Criteria();
          $c->add(OpconpagPeer::CODCONCEPTO,$this->getRequestParameter('codigo'));
          $reg= OpconpagPeer::doSelectOne($c);
        if ($reg)
        {
            $dato=$reg->getNomconcepto();
          }else $javascript="alert('El Concepto de Pago no Existe'); $('$cajtexcom').value=''; ";
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
      else if ($this->getRequestParameter('ajax')=='11')
      {
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
      }
      else if ($this->getRequestParameter('ajax')=='5')
      {
        $canord = $this->getRequestParameter('canord');  // Cantidad a Pagar
        $desord = $this->getRequestParameter('desord');  // Descuento de la cantidad a pagar
        $montotordpag = $this->getRequestParameter('tscheemi_montotordpag');  // Monto parcial a pagar
        $numcue = $this->getRequestParameter('tscheemi_numcue');  // Numero de Cuenta
        $fecemi = $this->getRequestParameter('tscheemi_fecemi');  // Fecha del movimiento
        $tipomoneda = $this->getRequestParameter('moneda');  // Moneda del movimiento
        $fecemi = $this->getRequestParameter('tscheemi_fecemi');
        $nombresus = $this->getRequestParameter('nombensus');
        $valori = $this->getRequestParameter('valori');
        $id=$this->getRequestParameter('id');
        $nombensus="";
        
        $montoavalidar = H::toFloat($montotordpag) -H::toFloat($desord);
        $contaba = ContabaPeer::doSelectOne(new Criteria());

        $codmon="";
        $js="";
        $dato=""; $valmon="0,000000"; $saldo=0;     	
        
      	$c= new Criteria();
      	$c->add(OpordpagPeer::NUMORD,$this->getRequestParameter('numord'));
      	$resul=OpordpagPeer::doSelectOne($c);      	
      	if ($resul)
      	{ 
          $dato=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($resul->getDesord()));
          $codmon=$resul->getCodmon();
          $valmon=number_format($resul->getValmon(),6,',','.');
          $nombensus=$resul->getNombensus();
          
          $dateFormat = new sfDateFormat('es_VE');
          $fecemi = $dateFormat->format($fecemi, 'i', $dateFormat->getInputPattern('d'));
          
          if(strtotime($resul->getFecemi()) > strtotime($fecemi)) 
          {
              $js= "alert_('La fecha de emisi&oacute;n del cheque es menor a la de la orden de pago seleccionada...'); $('$id').checked=false; $('tscheemi_montotordpag').value='$valori';";
          }else {
              if ($tipomoneda!=$codmon) { 
                  $valmon=$this->getRequestParameter('valmone'); 
                  $js= "alert('La Moneda de la Orden Seleccionada no corresponde con la Moneda del Pago'); $('$id').checked=false; $('tscheemi_montotordpag').value='$valori';";
              }
              else {
                  if(!Tesoreria::chequear_disponibilidad_financiera($numcue,$montoavalidar,$contaba->getFecini(),$fecemi,$saldo))
                  {
                      $js="alert('No existe disponibilidad financiera en la cuenta seleccionada'); $('$id').checked=false; $('tscheemi_montotordpag').value='$valori';";
                  }               
                  
                  $js .= "$('tscheemi_valmon').readOnly=true; $('moneref').value='$codmon';";
                 }
          }
        }else{ 
            $dato=""; $valmon="0,000000";            
        }       
        if ($nombresus!='')
          $nombensus=$nombresus;
        
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["tscheemi_valmon","'.$valmon.'",""],["tscheemi_nombensus","'.$nombensus.'",""],["saldo","'.$saldo.'",""],["javascript","'.$js.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }elseif($this->getRequestParameter('ajax')=='6'){
        $canord = $this->getRequestParameter('canord');  // Cantidad a Pagar
        $numcue = $this->getRequestParameter('numcue');  // Numero de Cuenta
        $fecemi = $this->getRequestParameter('fecemi');  // Fecha del movimiento
        $obj = $this->getRequestParameter('obj');  // input a borrar en caso de error
        $obj1 = $this->getRequestParameter('obj1');  // input a borrar en caso de error
        $tipord = $this->getRequestParameter('tipord');  // tipo de orden, para saber si se valida disponibilidad presupuestaria o financiera o las 2
        $codpre = $this->getRequestParameter('codpre'); // Codigo presupuestario
        $codmon = $this->getRequestParameter('codmon'); // Codigo Moneda
        $valmon = H::toFloat($this->getRequestParameter('valmon'),6); // Valor Moneda
        $contaba = ContabaPeer::doSelectOne(new Criteria());
        $saldo=0;
      	$dateFormat = new sfDateFormat('es_VE');
        $fecemi = $dateFormat->format($fecemi, 'i', $dateFormat->getInputPattern('d'));
        $msj = '';

        if(!Tesoreria::chequear_disponibilidad_financiera($numcue,H::toFloat($canord),$contaba->getFecini(),$fecemi,$saldo))
          $msj = '[["javascript","$(\''.$obj.'\').value=\'0,0\'; $(\''.$obj1.'\').value=\'0,0\'; mens=\'No existe disponibilidad financiera en la cuenta seleccionada\';alert(mens);",""]]';

        if($tipord=='ordpagdir' && $msj==''){
          $monto=H::toFloat($canord)*$valmon;
          if(!OrdendePago::montoValido(1,$monto,'N',$codpre,1,$msj,$mondis,$sobregiro))
          {
            $msj = '[["javascript","$(\''.$obj.'\').value=\'0,0\'; $(\''.$obj1.'\').value=\'0,0\'; mens=\''.Herramientas::obtenerMensajeError($msj).'\';alert(mens);",""]]';
          }//else $msj = '[["javascript","alert(\''.$mondis.'\');",""]]';;
        }

        if($msj=='') $msj = '[["javascript","true;",""]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$msj.')');
        return sfView::HEADER_ONLY;

      }
	  else if ($this->getRequestParameter('ajax')=='7')//Filtro por NUMERO DE ORDEN
	  {
         $dato=$this->getRequestParameter('cedrif');
         $valormayuscula=$this->getRequestParameter('cedrif');
         $t= new Criteria();
         $t->add(OpordpagPeer::NUMORD,$this->getRequestParameter('numord'));
         $reg= OpordpagPeer::doSelectOne($t);
         if ($reg)
         {
             $crif=$reg->getCedrif();
             $drif=H::getX_vacio('CEDRIF', 'Opbenefi', 'Nomben', $crif);
         }else {
            $crif='';
            $drif='';
	  }

         $jstscheemi = ',["tscheemi_numeroord","'.$this->getRequestParameter('numord').'",""],["tscheemi_fecord","'.$this->getRequestParameter('fecord').'",""],["tscheemi_cedrif","'.$crif.'",""],["tscheemi_nomben","'.$drif.'",""]';
	  }
          else  if ($this->getRequestParameter('ajax')=='8')//Cambio de Moneda
          {
              $js="";
              if ($this->getRequestParameter('operacion')=='ordpag')  
              {
                if ($this->getRequestParameter('moneref')!='')
                {
                  if ($this->getRequestParameter('codigo')==$this->getRequestParameter('moneref'))
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
                      $js="alert('La Moneda debe ser la misma de la Orden de Pago'); $('tscheemi_codmon').value='".$this->getRequestParameter('moneref')."'";   
                      $dato=$this->getRequestParameter('valmone');
                  }
                }else {
                    $q= new Criteria();
                    $q->add(TsdesmonPeer::CODMON,$this->getRequestParameter('codigo'));
                    $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
                    $reg= TsdesmonPeer::doSelectOne($q);
                    if ($reg)
                    {
                       $dato=number_format($reg->getValmon(),6,',','.');
                    }
                }
              }else {
                    $q= new Criteria();
                    $q->add(TsdesmonPeer::CODMON,$this->getRequestParameter('codigo'));
                    $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
                    $reg= TsdesmonPeer::doSelectOne($q);
                    if ($reg)
                    {
                       $dato=number_format($reg->getValmon(),6,',','.');
                    }
              }
                $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                return sfView::HEADER_ONLY;
          }
          else if ($this->getRequestParameter('ajax')=='9')
          {
              $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
              $filsoldir2=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
              $codigo=$this->getRequestParameter('codigo');

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
          }else if ($this->getRequestParameter('ajax')=='12')
          {
            $codigo=$this->getRequestParameter('codigo');
            $chegen=$this->getRequestParameter('chegen');

            $dato=str_pad(substr($codigo,0,4),4,"0",STR_PAD_LEFT).str_pad(substr($chegen,-4),4,"0",STR_PAD_LEFT);

            $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            return sfView::HEADER_ONLY;
          }



      $refiere="";
      $operacion="";
      $c = new Criteria();
      $c->add(CpdocpagPeer::TIPPAG,strtoupper($this->getRequestParameter('tipdoc')));
      $datos = CpdocpagPeer::doSelectOne($c);
      if ($datos)
          {
               $refiere=$datos->getRefier();
               $refprc=$datos->getAfeprc();
               $refcom=$datos->getAfecom();
               $refcau=$datos->getAfecau();
               $refpag=$datos->getAfepag();
               $aumdis=$datos->getAfedis();
          }

        if ($refiere=="A")
          {
             $operacion="ordpag";
             $this->configGridOrdPag($mostrardato,$this->getRequestParameter('cedrif'),$this->getRequestParameter('fecemi'),$this->getRequestParameter('numord'),$this->getRequestParameter('fecord'),$this->getRequestParameter('numcue'),$this->getRequestParameter('tipdoc'),$this->getRequestParameter('codadiban'),$this->getRequestParameter('coddirec'));
          }

          if ($refiere=="C")
          {
            $operacion="compro";
            $this->configGridCompro($mostrardato,$this->getRequestParameter('cedrif'),$this->getRequestParameter('coddirec'));
          }

          if ($refiere=="P")
          {
             $operacion="precom";
             $this->configGridPrecom($mostrardato,$this->getRequestParameter('cedrif'),$this->getRequestParameter('coddirec'));
          }

          if ($refiere == "N")
          {
             if (($refprc=="N") and ($refcom=="N") and ($refcau=="N") and ($refpag=="N") and ($aumdis=="N"))
             {
                 $operacion="pagnopre";
             }
            else
             {
                $operacion="pagdir";
                $this->configGridPagDir();
              }
          }//if ($refprc=="N") and ($refcom=="N") and ($refcau=="N") and ($refpag=="N") and ($aumdis=="N")

          //CREA LA VARIABLE DE SESION QUE INDICARA QUE OPERACION SE SELECCIONO Y CUAL GRID SE DEBE CARGAR EN EL PARCIAL
          /////////////////////////////////////////////////////////////////////////////////////////////////////////////
          $this->getUser()->setAttribute('tschemi_operacion',$operacion);
          $this->tscheemi= new Tscheemi();
           if ($this->valoropc!="") $this->tscheemi->setTippagordpag($this->valoropc);
          /////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //AJAX-JSON
          if ($this->getRequestParameter('ajax')=='2')//BENEFICIARIO
                $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","'.$valormayuscula.'",""],["javascript","'.$javascript.'",""],["tscheemi_operacion","'.$operacion.'",""],["ctapag","'.$codcta.'",""],["desctacre","'.$desctacre.'",""]'.$jstscheemi.']';
          else
                $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","'.$valormayuscula.'",""],["javascript","'.$javascript.'",""],["tscheemi_operacion","'.$operacion.'",""]'.$jstscheemi.']';

          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

  public function executeComprobante()
   {
   /////GENERAR COMPROBANTE CONTABLE
      $this->tscheemi = $this->getTscheemiOrCreate();
      $this->updateTscheemiFromRequest();
      $che="";
      $this->msgerr="";
        $this->reqfirma="";
        $this->mancomegr="";
		$varemp = $this->getUser()->getAttribute('configemp');
		if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('tesoreria',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
		     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos'])){
		       if(array_key_exists('reqfirma',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
		       {
		       	$this->reqfirma=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['reqfirma'];
		       }
		       if(array_key_exists('mancomegr',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
		       {
		       	$this->mancomegr=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['mancomegr'];
		       }
		       if(array_key_exists('bloqfec',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
		       {
		       	$this->bloqfec=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['bloqfec'];
		       }
		     }

	  	$this->comprobaut="";
	    $varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		if(array_key_exists('generales',$varemp))
	     if(array_key_exists('comprobaut',$varemp['generales']))
		 {
		   $this->comprobaut=$varemp['generales']['comprobaut'];
		 }
      $comprobante= array();
      $concom=1;
      $compret="";
      $output = '[["","",""]]';
      //verificar que los datos esten completos
      if ($this->tscheemi->getTipdoc()!="" and $this->tscheemi->getNumcue()!=""  and $this->tscheemi->getFecemi()!=""  and $this->tscheemi->getNumche()!=""  )
      {
	     //Ordenes de Pago
	      $ctapag=$this->getRequestParameter('ctapag');
	      $desctacre=$this->getRequestParameter('desctacre');

	      if ($this->tscheemi->getOperacion()=='ordpag')
	      {
	         $tippag=$this->getRequestParameter('tscheemi[tippagordpag]');
             $despag=$this->getRequestParameter('tscheemi[descriordpag]');
             //print_r($this->gridOrdPag);print 'SSS';exit;
             $compret='N';
	         $grid=Herramientas::CargarDatosGrid($this,$this->gridOrdPag);
	         if ($this->ValidarDatosenGrid($grid))
	            Cheques::ActualizaOrdPag($this->tscheemi,$grid,$tippag,$despag,"","S",$che,$concom,$comprobante,$this->reqfirma,$this->mancomegr,$this->comprobaut,$che,$compret);
	         else
	            $this->msgerr="Debe seleccionar al menos una orden de pago...";
	      }
	    //compromisos
	      else if ($this->tscheemi->getOperacion()=='compro')
	      {
	           $grid=Herramientas::CargarDatosGrid($this,$this->gridCompro);
	           if ($this->ValidarDatosenGrid($grid))
	             Cheques::ActualizaCompro($this->tscheemi,$grid,"",$ctapag,$desctacre,$che,"S",$comprobante,$this->reqfirma,$this->mancomegr,$this->comprobaut,$che);
	           else
	            $this->msgerr="Debe seleccionar al menos un compromiso...";
	      }
	      //precompromisos
	      else if ($this->tscheemi->getOperacion()=='precom')
	      {
	           $grid=Herramientas::CargarDatosGrid($this,$this->gridPrecom);
	           if ($this->ValidarDatosenGrid($grid))
	               Cheques::ActualizaPrecom($this->tscheemi,$grid,"",$ctapag,$desctacre,$che,"S",$comprobante,$this->reqfirma,$this->mancomegr,$this->comprobaut,$che);
	           else
	            $this->msgerr="Debe seleccionar al menos un precompromiso...";
	      }
	      //Pagos Directos
	      else if ($this->tscheemi->getOperacion()=='pagdir')
	        {
	           $concep=$this->getRequestParameter('tscheemi[conceppagdir]');
           	   $descue=$this->getRequestParameter('tscheemi[mondtopagdir]');
           	   $condto=$this->getRequestParameter('tscheemi[condtopagdir]');
	           $grid=Herramientas::CargarDatosGrid($this,$this->gridPagdir);
	           $x=$grid[0];
	           if (count($x)>0)
	           {
	              Cheques::ActualizaPagDir($this->tscheemi,$grid,"",$concep,$descue,$condto,$ctapag,$desctacre,$che,"S",$comprobante,$this->reqfirma,$this->mancomegr,$this->comprobaut,$che);
	           }
	           else
	           {
	               $this->msgerr="Debe introducir al menos un código presupuestario";
	           }
	        }
	        //pagos Extrapresupuesto
	        else if ($this->tscheemi->getOperacion()=='pagnopre')
	        {
	           $concpnrn=$this->getRequestParameter('tscheemi[conceppagnap]');
	           $montpnrn=$this->getRequestParameter('tscheemi[montotpagnap]');
	           $dctopnrn=$this->getRequestParameter('tscheemi[mondtopagnap]');
           	   $condpnrn=$this->getRequestParameter('tscheemi[condtopagnap]');
	           Cheques::ActualizaPagExtPre($this->tscheemi,"",$concpnrn,$montpnrn,$dctopnrn,$condpnrn,$ctapag,$desctacre,$che,"S",$comprobante,$this->reqfirma,$this->mancomegr,$this->comprobaut,$che);
	        }
     }//if  validaciones de campos distinto de vacio
     else
     {
     	$this->msgerr="Existen datos incompletos, debe llenar el Tipo de Documento, la Cuenta Bancaria, el Número de Cheque y la Fecha de Emisión del Cheque antes de Generar el Comprobante...";
     }
       $this->formulario=array(); //Ojo
       $this->i="";
       if (trim($this->msgerr)=="" && count($comprobante)>0) //ojo nada mas el count
       {
         //verificamos que se haya generado el comprobante
         if ($comprobante[0]->getError()=="S") //hubo un error al generar comprobante
         {
            $this->msgerr=$comprobante[0]->getMsgerr();
            $this->i="";
            $this->formulario=array();

            $output = '[["totalcomprobantes","'.$concom.'",""],["tscheemi_compret","'.$compret.'",""]]';
         }
         else
         {
            //Preparar las variables de sesion necesarias para el formulario de Comprobante CONFINCOMGEN
           // $form="sf_admin/tesmovemiche/confincomgen";
            $i=0;
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

            $output = '[["totalcomprobantes","'.$concom.'",""],["tscheemi_compret","'.$compret.'",""]]';


         }//else

      }//if ($this->msgerr1!="")
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('TIPPAG','Cpdocpag','Tippag',$this->getRequestParameter('tscheemi[tipdoc]'));
      }
      else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('NUMCUE','Tsdefban','Numcue',$this->getRequestParameter('tscheemi[numcue]'));
      }
       else if ($this->getRequestParameter('ajax')=='3')
      {
       $this->tags=Herramientas::autocompleteAjax('CEDRIF','Opbenefi','Cedrif',$this->getRequestParameter('tscheemi[cedrif]'));
      }
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridOrdPag($mostrardatos, $cedrif=' ', $fecemi='31/12/2020', $numord='', $fecord='31/12/2020', $numcue='',$tipdoc='', $codadiban='', $coddirec='')
   {
  //////////////////////
  //GRID
    $filubiadm=H::getConfApp2('filubiadm', 'tesoreria', 'pagemiord');
    $loguse= $this->getUser()->getAttribute('loguse');     
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
    $filcomact=H::getConfApp2('filcomact', 'tesoreria', 'tesmovemiche'); 
    $this->mensajeBen="";
    $this->bloqueaopc="N";
    $this->valoropc="S";
    if ($mostrardatos=='S')
    {

        //darle formato a la fecha
        $valor=explode("/",$fecemi);
        if (count($valor)>1)
        {
	        if (trim($fecemi)!="")
	        {
	            $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	            $fecemi = $dateFormat->format($fecemi, 'i', $dateFormat->getInputPattern('d'));
	        }
        }

        $tiecodadi=H::getConfApp2('tiecodadi', 'tesoreria', 'tesdefcueban');
            /////////////////////////////////
        $c = new Criteria();
        
        if ($codadiban!="" && $tiecodadi=='S') { $c->add(OpordpagPeer::CODADI,$codadiban);}
        
        if (trim($cedrif)!="") { $c->add(OpordpagPeer::CEDRIF,$cedrif);}
        if (trim($fecemi)!="") { $c->add(OpordpagPeer::FECEMI,$fecemi,Criteria::LESS_EQUAL);}

        //////////////SE  agrego para el caso que las ordenes requieran aprobacion//////////////
        $e= new Criteria();
        $ooo= OpdefempPeer::doSelectOne($e);
        if ($ooo)
        {
          if ($ooo->getReqaprord()=='S')
          {
          	$c->add(OpordpagPeer::APROBADOTES,'A');
          }
        }//////////////////////

        $this->aprorddir="";
        $this->filnumordfec="";
        $this->filordcbtp="";
    		$varemp = $this->getUser()->getAttribute('configemp');
    		if ($varemp)
    		if(array_key_exists('aplicacion',$varemp))
    		 if(array_key_exists('tesoreria',$varemp['aplicacion']))
    		   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria'])) {
    		     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos'])){
    		       if(array_key_exists('aprorddirec',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
    		       {
    		       	$this->aprorddir=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['aprorddirec'];
    		       }
    		       if(array_key_exists('filnumordfec',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
    		       {
    		       	$this->filnumordfec=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['filnumordfec'];
    		     }
    		     }
    		     if(array_key_exists('pagemiord',$varemp['aplicacion']['tesoreria']['modulos'])){
    		       if(array_key_exists('filordcbtp',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
    		       {
    		       	$this->filordcbtp=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['filordcbtp'];
    		       }
    		     }
    		   }
            if ($this->filnumordfec=='S'){
		        //darle formato a la fecha de la orden de pago
		        $valor=split("/",$fecord);
		        if (count($valor)>1)
		        {
			        if (trim($fecord)!="")
			        {
			            $dateFormat = new sfDateFormat($this->getUser()->getCulture());
			            $fecord = $dateFormat->format($fecord, 'i', $dateFormat->getInputPattern('d'));
			        }
		        }

		        if (trim($numord)!="") { $c->add(OpordpagPeer::NUMORD,$numord);};
		        if (trim($fecord)!="") { $c->add(OpordpagPeer::FECEMI,$fecord);}
            }

           if ($this->filordcbtp=='S')
           {
           	 if (trim($numcue)!="") { $c->add(OpordpagPeer::NUMCTA,$numcue);};
		         if (trim($tipdoc)!="") { $c->add(OpordpagPeer::TIPDOC,$tipdoc);}
           }

    $c->add(OpordpagPeer::STATUS,"N");
    $c->add(OpordpagPeer::STAELE,null);

		if ($this->aprorddir=="S")
		{
      $sql3="";
      if ($filubiadm=='S') 
        $sql3=' and opordpag.coduni in (select codubi from "SIMA_USER".segubausu where loguse=\''.$loguse.'\')';
      if ($filsoldir=='S' && $coddirec!='') 
        //$sql3.=' and opordpag.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
        $sql3.=' and opordpag.coddirec=\''.$coddirec.'\'';

      if ($filcomact=='S') {
        $ordret=H::getX('codemp','Opdefemp','Ordret','001');
        $sql3.=" and (opordpag.numcom in (select numcom from contabc where stacom='A') or (opordpag.tipcau='".$ordret."'))";
      }
		  if (trim($cedrif)!="") {

		  $this->sql2="((opordpag.tipcau in (select tipcau from cpdoccau where
                       cpdoccau.refier='N' and cpdoccau.afeprc='S' and cpdoccau.afecom='S' and cpdoccau.afecau='S' and cpdoccau.afedis='R') AND opordpag.aprorddir='A')
                       or opordpag.tipcau not in (select tipcau from cpdoccau where
                       cpdoccau.refier='N' and cpdoccau.afeprc='S' and cpdoccau.afecom='S' and cpdoccau.afecau='S' and cpdoccau.afedis='R')
                       and opordpag.CEDRIF='".$cedrif."' AND opordpag.FECEMI<='".$fecemi."') ".$sql3." ";
		  }else{
		  	$this->sql2=" ((opordpag.tipcau in (select tipcau from cpdoccau where
                       cpdoccau.refier='N' and cpdoccau.afeprc='S' and cpdoccau.afecom='S' and cpdoccau.afecau='S' and cpdoccau.afedis='R') AND opordpag.aprorddir='A')
                       or opordpag.tipcau not in (select tipcau from cpdoccau where
                       cpdoccau.refier='N' and cpdoccau.afeprc='S' and cpdoccau.afecom='S' and cpdoccau.afecau='S' and cpdoccau.afedis='R')) ".$sql3."";
		  }
		  $c->add(OpordpagPeer::APRORDDIR,$this->sql2,Criteria::CUSTOM);
		}else{      
      if ($filcomact=='S'){
        $ordret=H::getX('codemp','Opdefemp','Ordret','001');
        $sql3='and (opordpag.numcom in (select numcom from contabc where stacom=\'A\') or (opordpag.tipcau=\''.$ordret.'\')) ';
      }
      else
        $sql3="";
      
      if ($filubiadm=='S' && ($filsoldir=='S' && $coddirec!='')){
        $this->sql2='opordpag.coduni in (select codubi from "SIMA_USER".segubausu where loguse=\''.$loguse.'\') and opordpag.coddirec=\''.$coddirec.'\' '.$sql3.'';
        $c->add(OpordpagPeer::CODUNI,$this->sql2,Criteria::CUSTOM);
      }elseif ($filubiadm=='S') {
        $this->sql2=' coduni in (select codubi from "SIMA_USER".segubausu where loguse=\''.$loguse.'\') '.$sql3.'';
        $c->add(OpordpagPeer::CODUNI,$this->sql2,Criteria::CUSTOM);
      }else if ($filsoldir=='S' && $coddirec!='') {
        $this->sql2='opordpag.coddirec=\''.$coddirec.'\' '.$sql3.'';
         $c->add(OpordpagPeer::CODDIREC,$this->sql2,Criteria::CUSTOM); 
      }else {
        if ($filcomact=='S'){  
           $ordret=H::getX('codemp','Opdefemp','Ordret','001'); 
           $sql3='(opordpag.numcom in (select numcom from contabc where stacom=\'A\') or (opordpag.tipcau=\''.$ordret.'\'))';       
          $c->add(OpordpagPeer::NUMCOM,$sql3,Criteria::CUSTOM); 
        }
      }      
    }
    $c->addAscendingOrderByColumn(OpordpagPeer::FECEMI);
    $c->addAscendingOrderByColumn(OpordpagPeer::NUMORD);    

    $per = OpordpagPeer::doSelect($c);
    if (!$per)
    {
       $this->mensajeBen="No Existen Ordenes de Pago Pendientes por pagar al Beneficiario";
    }
    else
    {
      if (trim($cedrif )=="")
         {$this->bloqueaopc="S";}
      else
         {if (count($per)>1) $this->valoropc="C";;}
    }
    }
    else
    {
        $c = new Criteria();
        $c->add(OpordpagPeer::NUMORD,"");
        $per = OpordpagPeer::doSelect($c);
    }

  $opciones = new OpcionesGrid();
  // Se configuran las opciones globales del Grid
  $opciones->setEliminar(false);
  $opciones->setTabla('Opordpag');
  $opciones->setAnchoGrid(600);
  $opciones->setAncho(850);
  $opciones->setTitulo('Ordenes de Pago');
  $opciones->setName('a');
  $opciones->setFilas(0);
  $opciones->setHTMLTotalFilas(' ');

  // Se generan las columnas
  $col1 = new Columna('Num. Orden');
  $col1->setTipo(Columna::TEXTO);
  $col1->setEsGrabable(true);
  $col1->setNombreCampo('numord');
  $col1->setAlineacionObjeto(Columna::IZQUIERDA);
  $col1->setAlineacionContenido(Columna::IZQUIERDA);
  $col1->setHTML('type="text" size="10" readonly=true');

  $col2 = new Columna('Fec. Emisión');
  $col2->setTipo(Columna::FECHA);
  $col2->setEsGrabable(true);
  $col2->setNombreCampo('fecemi');
  $col2->setAlineacionObjeto(Columna::CENTRO);
  $col2->setAlineacionContenido(Columna::CENTRO);
  $col2->setHTML('type="text" size="8" readonly=true');

  $col3 = new Columna('Beneficiario');
  $col3->setTipo(Columna::TEXTO);
  $col3->setEsGrabable(true);
  $col3->setNombreCampo('nombeneficiario');
  $col3->setAlineacionObjeto(Columna::IZQUIERDA);
  $col3->setAlineacionContenido(Columna::IZQUIERDA);
  $col3->setHTML('type="text" size=45" readonly=true');

    $col4 = new Columna('Descuento');
    $col4->setTipo(Columna::MONTO);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('mondes');
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setEsNumerico(true);
    $col4->setHTML('type="text" size="10" readonly=true');

    $col5 = clone $col4;
    $col5->setTitulo('Monto');
    $col5->setNombreCampo('montotal');
    $col5->setHTML('type="text" size="10" ');
    $col5->setJScript('onBlur="validarmonto(this.id)"');

    $col6 = new Columna('Seleccione');
    $col6->setTipo(Columna::CHECK);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('check');
    $col6->setHTML(' ');
    $col6->setJScript('onClick="ajaxdescripcion(this.id)"');

    //Columnas Ocultas
    $col7 = clone $col4;
    $col7->setTitulo('monord');
    $col7->setNombreCampo('monord');
    $col7->setOculta(true);
    $col7->setEsGrabable(false);

    $col8 = clone $col4;
    $col8->setTitulo('monret');
    $col8->setNombreCampo('monret');
    $col8->setOculta(true);
    $col8->setEsGrabable(false);

    $col9 = clone $col4;
    $col9->setTitulo('monpag');
    $col9->setNombreCampo('monpag');
    $col9->setOculta(true);
    $col9->setEsGrabable(true);

    $col10 = new Columna('descripcion');
    $col10->setTipo(Columna::TEXTO);
    $col10->setNombreCampo('desorden');
    $col10->setOculta(true);
    $col10->setEsGrabable(true);
    $col10->setHTML('type="text" size=100" ');

  	$col11 = new Columna('cedula');
  	$col11->setTipo(Columna::TEXTO);
  	$col11->setNombreCampo('cedrif');
  	$col11->setOculta(true);
  	$col11->setEsGrabable(true);

    $col12 = clone $col4;
    $col12->setTitulo('montotal');
    $col12->setNombreCampo('montotaltotal');
    $col12->setOculta(true);
    $col12->setEsGrabable(true);


	  // Se guardan las columnas en el objetos de opciones
	  $opciones->addColumna($col1);
	  $opciones->addColumna($col2);
	  $opciones->addColumna($col3);
	  $opciones->addColumna($col4);
	  $opciones->addColumna($col5);
	  $opciones->addColumna($col6);
	  $opciones->addColumna($col7);
	  $opciones->addColumna($col8);
	  $opciones->addColumna($col9);
	  $opciones->addColumna($col10);
	  $opciones->addColumna($col11);
	  $opciones->addColumna($col12);


  // Ee genera el arreglo de opciones necesario para generar el grid
  $this->gridOrdPag = $opciones->getConfig($per);

  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridPagDir($codigo='')
   {
  //////////////////////
  //GRID
     $c = new Criteria();
  $c->add(CpimppagPeer::REFPAG,$codigo);
  $per = CpimppagPeer::doSelect($c);

  $this->mascarapresupuesto = Herramientas::formatoPresupuesto();
  $mascaraformato=$this->mascarapresupuesto;
  $loncodpre=strlen($mascaraformato);


  $opciones = new OpcionesGrid();
  // Se configuran las opciones globales del Grid
  $opciones->setEliminar(true);
  $opciones->setTabla('Cpimppag');
  $opciones->setAnchoGrid(820);
  $opciones->setAncho(850);
  $opciones->setTitulo('Pago Directo');
  $opciones->setFilas(100);
  $opciones->setName('b');
  $opciones->setHTMLTotalFilas(' ');

  // Se generan las columnas
  $obj=ARRAY('CODPRE' => 1, 'NOMPRE' => 2);
  $params= array('param1' => $loncodpre);

  $col1 = new Columna('Código Presupuestario');
  $col1->setTipo(Columna::TEXTO);
  $col1->setEsGrabable(true);
  $col1->setNombreCampo('codpre');
  $col1->setAlineacionObjeto(Columna::IZQUIERDA);
  $col1->setAlineacionContenido(Columna::IZQUIERDA);
  $col1->setAjax('tesmovemiche',4,2);
  $col1->setHTML('type="text" size="30"');
  $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraformato.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
  $col1->setHTML('type="text" size="30" maxlength="'.chr(39).$loncodpre.chr(39).'"');
  //$col1->setCatalogo('Cpdeftit','sf_admin_edit_form',$obj,'Cpdeftit_Almregrgo',$params);
  $col1->setCatalogo('Cpasiini','sf_admin_edit_form',$obj,'Cpasiini_PagemiordNew');



  $col2 = new Columna('Descripción');
  $col2->setTipo(Columna::TEXTO);
  $col2->setNombreCampo('descodpre');
  $col2->setAlineacionObjeto(Columna::IZQUIERDA);
  $col2->setAlineacionContenido(Columna::IZQUIERDA);
  $col2->setEsGrabable(true);
  $col2->setHTML('type="text" size="50" readonly=true');

  $col3 = new Columna('Monto');
  $col3->setTipo(Columna::MONTO);
  $col3->setEsGrabable(true);
  $col3->setNombreCampo('monimp');
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="10"');
    $col3->setJScript('onKeypress="entermontoordpagdir(event,this.id)"');
    $col3->setEsTotal(true,'tscheemi_totnetpagdir');

  // Se guardan las columnas en el objetos de opciones
  $opciones->addColumna($col1);
  $opciones->addColumna($col2);
  $opciones->addColumna($col3);


  // genera el arreglo de opciones necesario para generar el grid
  $this->gridPagdir = $opciones->getConfig($per);

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridCompro($mostrardatos,$cedrif='',$coddirec='')
   {
  //////////////////////
  //GRID
   $this->mensajeBen="";
   $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
    if ($mostrardatos=='S' and trim($cedrif)!='')
    {
        $c = new Criteria();
        $c->addJoin(CpimpcomPeer::REFCOM, CpcomproPeer::REFCOM);
        $c->add(CpcomproPeer::CEDRIF,$cedrif);
        if ($filsoldir=='S' && $coddirec!='')
          $c->add(CpcomproPeer::CODDIREC,$coddirec);
    $this->sql = "Cpimpcom.monimp-Cpimpcom.monpag-Cpimpcom.monaju>0 and Cpimpcom.staimp='A'";
        $c->add(CpimpcomPeer::MONIMP, $this->sql, Criteria::CUSTOM);
        $c->addAscendingOrderByColumn(CpimpcomPeer::REFCOM);
    $per = CpimpcomPeer::doSelect($c);
    if (!$per)  $this->mensajeBen="No Existen Compromisos Pendientes por pagar al Beneficiario";
    }
    else
    {
    $c = new Criteria();
    $c->add(CpimpcomPeer::REFCOM,"");
    $per = CpimpcomPeer::doSelect($c);
    }

  $opciones = new OpcionesGrid();
  // Se configuran las opciones globales del Grid
  $opciones->setEliminar(false);
  $opciones->setTabla('Cpimpcom');
  $opciones->setAnchoGrid(850);
  $opciones->setTitulo('');
  $opciones->setName('c');
  $opciones->setFilas(0);
  $opciones->setHTMLTotalFilas(' ');
  // Se generan las columnas
  $col1 = new Columna('Compromiso');
  $col1->setTipo(Columna::TEXTO);
  $col1->setEsGrabable(true);
  $col1->setNombreCampo('refcom');
  $col1->setAlineacionObjeto(Columna::IZQUIERDA);
  $col1->setAlineacionContenido(Columna::IZQUIERDA);
  $col1->setHTML('type="text" size="10" readonly=true');

  $col2 = new Columna('Cod. Presupuestario');
  $col2->setTipo(Columna::TEXTO);
  $col2->setEsGrabable(true);
  $col2->setNombreCampo('codpre');
  $col2->setAlineacionObjeto(Columna::CENTRO);
  $col2->setAlineacionContenido(Columna::CENTRO);
  $col2->setHTML('type="text" size="32" readonly=true');


  $col3 = new Columna('Comprometido');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('monimp');
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="15" readonly=true');

    $col4 = clone $col3;
    $col4->setTitulo('Por Pagar');
    $col4->setNombreCampo('monporpag');

    $col5 = clone $col3;
    $col5->setTitulo('Pagado');
    $col5->setNombreCampo('monpag');

    $col6 = new Columna('Seleccione');
    $col6->setTipo(Columna::CHECK);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('check');
    $col6->setHTML(' ');
    $col6->setJScript('onClick="actualizarsaldocheck(this.id,"tscheemi_montotcompro",2,"")"');

  // Se guardan las columnas en el objetos de opciones
  $opciones->addColumna($col1);
  $opciones->addColumna($col2);
  $opciones->addColumna($col3);
  $opciones->addColumna($col4);
  $opciones->addColumna($col5);
  $opciones->addColumna($col6);

  // Ee genera el arreglo de opciones necesario para generar el grid
  $this->gridCompro = $opciones->getConfig($per);

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridPrecom($mostrardatos,$cedrif='',$coddirec='')
   {
  //////////////////////
  //GRID
  $this->mensajeBen="";
  $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
    if ($mostrardatos=='S' and trim($cedrif)!='')
    {
        $c = new Criteria();
        $c->addJoin(CpimpprcPeer::REFPRC, CpprecomPeer::REFPRC);
        $c->add(CpprecomPeer::CEDRIF,$cedrif);
        if ($filsoldir=='S' && $coddirec!='')
          $c->add(CpprecomPeer::CODDIREC,$coddirec);
        $this->sql = "Cpimpprc.monimp-Cpimpprc.monpag-Cpimpprc.monaju>0 and Cpimpprc.staimp='A'";
        $c->add(CpimpprcPeer::MONIMP, $this->sql, Criteria::CUSTOM);
        $c->addAscendingOrderByColumn(CpimpprcPeer::REFPRC);
    $per = CpimpprcPeer::doSelect($c);
    if (!$per) $this->mensajeBen="No Existen Precompromisos Pendientes por pagar al Beneficiario";
    }
    else
    {
    $c = new Criteria();
    $c->add(CpimpprcPeer::REFPRC,"");
    $per = CpimpprcPeer::doSelect($c);
    }

  $opciones = new OpcionesGrid();
  // Se configuran las opciones globales del Grid
  $opciones->setEliminar(false);
  $opciones->setTabla('Cpimpprc');
  $opciones->setAnchoGrid(850);
  $opciones->setTitulo('');
  $opciones->setName('c');
  $opciones->setFilas(0);
  $opciones->setHTMLTotalFilas(' ');

  // Se generan las columnas
  $col1 = new Columna('Precompromiso');
  $col1->setTipo(Columna::TEXTO);
  $col1->setEsGrabable(true);
  $col1->setNombreCampo('refprc');
  $col1->setAlineacionObjeto(Columna::IZQUIERDA);
  $col1->setAlineacionContenido(Columna::IZQUIERDA);
  $col1->setHTML('type="text" size="10" readonly=true');

  $col2 = new Columna('Cod. Presupuestario');
  $col2->setTipo(Columna::TEXTO);
  $col2->setEsGrabable(true);
  $col2->setNombreCampo('codpre');
  $col2->setAlineacionObjeto(Columna::CENTRO);
  $col2->setAlineacionContenido(Columna::CENTRO);
  $col2->setHTML('type="text" size="32" readonly=true');

    $col3 = new Columna('Precomprometido');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('monimp');
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="15" readonly=true');

    $col4 = clone $col3;
    $col4->setTitulo('Por Pagar');
    $col4->setNombreCampo('monporpag');

    $col5 = clone $col3;
    $col5->setTitulo('Pagado');
    $col5->setNombreCampo('monpag');

    $col6 = new Columna('Seleccione');
    $col6->setTipo(Columna::CHECK);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('check');
    $col6->setHTML(' ');
    $col6->setJScript('onClick="actualizarsaldocheck(this.id,"tscheemi_montotprecom",2,"")"');

  // Se guardan las columnas en el objetos de opciones
  $opciones->addColumna($col1);
  $opciones->addColumna($col2);
  $opciones->addColumna($col3);
  $opciones->addColumna($col4);
  $opciones->addColumna($col5);
  $opciones->addColumna($col6);

  // Ee genera el arreglo de opciones necesario para generar el grid
  $this->gridPrecom = $opciones->getConfig($per);

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
  protected function saveTscheemi($tscheemi)
    {   // H::PrintR($tscheemi);exit;
        $concom=$this->getRequestParameter('totalcomprobantes');
        //Grabar el comprobante contable
        $i=0;
        $numcomche="";
        $numcom="";
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

            $codtiptra=H::getX_vacio('NUMCUE','Tsdefban','Codtiptra',$tscheemi->getNumcue());
            $numcom = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$f[$i]),'TES',$codtiptra,$tscheemi->getCoddirec(),$tscheemi->getCodmon(),$tscheemi->getValmon());
            $numcomche=$numcomche."_".$numcom;

            //Tesoreria::Salvarconfincomgen($numcom,$reftra,$feccom,$descom,$debito,$credito);
            //Tesoreria::Salvar_asientosconfincomgen($numcom,$reftra,$feccom,$grid,$this->getUser()->getAttribute('grabar',null,$f[$i]));
          }
          else
          {
             $numcom="";
             $numcomche=$numcomche."_".$numcom;
          }

          $i++;
        }//  while ($i<$concom)

        //Salvar el resto de la información

        $this->reqfirma="";
        $this->mancomegr="";
		$varemp = $this->getUser()->getAttribute('configemp');
		if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('tesoreria',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
		     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos'])){
		       if(array_key_exists('reqfirma',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
		       {
		       	$this->reqfirma=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['reqfirma'];

		       }
		       if(array_key_exists('mancomegr',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
		       {
		       	$this->mancomegr=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['mancomegr'];
		       }
		     }

	  	$this->comprobaut="";
	    $varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		if(array_key_exists('generales',$varemp))
	     if(array_key_exists('comprobaut',$varemp['generales']))
		 {
		   $this->comprobaut=$varemp['generales']['comprobaut'];
		 }

        //Ordenes de Pago
        $ctapag=$this->getRequestParameter('ctapag');
        $desctacre=$this->getRequestParameter('desctacre');
        $comprobante= array();


        if ($tscheemi->getOperacion()=='ordpag')
        {
           $tippag=$this->getRequestParameter('tscheemi[tippagordpag]');
           $despag=$this->getRequestParameter('tscheemi[descriordpag]');
           $concom="";
           $grid=Herramientas::CargarDatosGrid($this,$this->gridOrdPag);
           Cheques::ActualizaOrdPag($tscheemi,$grid,$tippag,$despag,$numcomche,"N",$this->arraynumche,$concom,$comprobante,$this->reqfirma,$this->mancomegr,$this->comprobaut,$this->arraynumcue);
           if(H::getConfApp('entpaggebos', 'tesoreria', 'tsmovemiche')=='S'){
             $this->infogebos = Cheques::EnterarPagoGeBOS($tscheemi,$grid);
           }
        }
        //compromisos
      else if ($tscheemi->getOperacion()=='compro')
      {
           $grid=Herramientas::CargarDatosGrid($this,$this->gridCompro);
           Cheques::ActualizaCompro($tscheemi,$grid,$numcom,$ctapag,$desctacre,$this->arraynumche,"N",$comprobante,$this->reqfirma,$this->mancomegr,$this->comprobaut,$this->arraynumcue);
      }
      //precompromisos
      else if ($tscheemi->getOperacion()=='precom')
      {
           $grid=Herramientas::CargarDatosGrid($this,$this->gridPrecom);
           Cheques::ActualizaPrecom($tscheemi,$grid,$numcom,$ctapag,$desctacre,$this->arraynumche,"N",$comprobante,$this->reqfirma,$this->mancomegr,$this->comprobaut,$this->arraynumcue);
      }
      //Pagos Directos
        else if ($tscheemi->getOperacion()=='pagdir')
        {
           $concep=$this->getRequestParameter('tscheemi[conceppagdir]');
           $descue=$this->getRequestParameter('tscheemi[mondtopagdir]');
           $condto=$this->getRequestParameter('tscheemi[condtopagdir]');
           $grid=Herramientas::CargarDatosGrid($this,$this->gridPagdir);
           Cheques::ActualizaPagDir($tscheemi,$grid,$numcom,$concep,$descue,$condto,$ctapag,$desctacre,$this->arraynumche,"N",$comprobante,$this->reqfirma,$this->mancomegr,$this->comprobaut,$this->arraynumcue);
        }
        //pagos Extrapresupuesto
        else if ($tscheemi->getOperacion()=='pagnopre')
        {
           $concpnrn=$this->getRequestParameter('tscheemi[conceppagnap]');
           $montpnrn=$this->getRequestParameter('tscheemi[montotpagnap]');
           $dctopnrn=$this->getRequestParameter('tscheemi[mondtopagnap]');
           $condpnrn=$this->getRequestParameter('tscheemi[condtopagnap]');
           Cheques::ActualizaPagExtPre($tscheemi,$numcom,$concpnrn,$montpnrn,$dctopnrn,$condpnrn,$ctapag,$desctacre,$this->arraynumche,"N",$comprobante,$this->reqfirma,$this->mancomegr,$this->comprobaut,$this->arraynumcue);
        }


      while ($i<$concom)
      {
          $f[$i]=$this->form.$i;
          $this->getUser()->getAttributeHolder()->remove('grabo',$f[$i]);
          $i++;
       }
      $this->getUser()->getAttributeHolder()->remove('tschemi_operacion');

      $mismactaban=H::getConfApp2('mismactaban', 'tesoreria', 'tesmovemiche');
      if ($mismactaban=='S') {
          $this->getUser()->setAttribute('cuentabancaria', $tscheemi->getNumcue(),'tesmovemiche');
          $this->getUser()->setAttribute('tipodocumento', $tscheemi->getTipdoc(),'tesmovemiche');
          $numche=TsdefbanPeer::getNumche($tscheemi->getNumcue());
          $numche=str_pad($numche,8,"0",STR_PAD_LEFT);
          $this->getUser()->setAttribute('numerocheque', $numche,'tesmovemiche');
      }

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
    $this->tscheemi = $this->getTscheemiOrCreate();
    try{ $this->updateTscheemiFromRequest();}catch(Exception $ex){}
    $this->impche="";
    $this->scheque="";
    $this->numcomegr="";
    $this->numches="";
    $this->numcues="";
    $this->comprobaut="";
    $this->gencomaut=H::getConfApp2('gencomaut', 'tesoreria', 'tesmovemiche');
    $this->bloqfec="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp) {
			if(array_key_exists('generales',$varemp)) {
     if(array_key_exists('comprobaut',$varemp['generales']))
	 {
	   $this->comprobaut=$varemp['generales']['comprobaut'];
	 }
			}
	    if(array_key_exists('aplicacion',$varemp))
			 if(array_key_exists('tesoreria',$varemp['aplicacion']))
			   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
			     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos'])){
			       if(array_key_exists('bloqfec',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
			       {
			       	$this->bloqfec=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['bloqfec'];
			       }
			     }
    }

    $this->labels = $this->getLabels();


    if(!$this->validateEdit())
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('tscheemi{cedrif}',$err);
      }

      if($this->coderror2!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror2);
       $this->getRequest()->setError('',$err);
      }

      if($this->coderror3!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror3);
       $this->getRequest()->setError('',$err);
      }

      if($this->coderror4!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror4);
       $this->getRequest()->setError('',$err);
      }

      if($this->coderror5!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror5);
       $this->getRequest()->setError('tscheemi{fecemi}',$err);
      }

      if($this->coderror6!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror6);
       $this->getRequest()->setError('tscheemi{fecemi}',$err);
      }
    }
    return sfView::SUCCESS;
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
      $this->tscheemi = $this->getTscheemiOrCreate();
      try{ $this->updateTscheemiFromRequest();}catch(Exception $ex){}

      if ($this->tscheemi->getFecemi()>date('Y-m-d'))
      {
            $this->coderror6=564;
            return false;
      }

      $c = new Criteria();
      $c->add(CpdocpagPeer::TIPPAG,strtoupper($this->getRequestParameter('tscheemi[tipdoc]')));
      $datos = CpdocpagPeer::doSelectOne($c);
      if ($datos)
      {
        $afepag=$datos->getAfepag();
        if ($afepag=='S'){
          if (!Herramientas::validarPeriodoPresuesto($this->getRequestParameter('tscheemi[fecemi]')))
          {
            $this->coderror5=142;
            return false;
          }
        }
      }

      if ($this->getRequestParameter('tscheemi[numcomegr]')!='')
      {
        $c = new Criteria();
        $c->add(TscheemiPeer::NUMCOMEGR,$this->getRequestParameter('tscheemi[numcomegr]'));
        $regt = TscheemiPeer::doSelectOne($c);
        if($regt){
          $this->coderror2=5012;
          return false;
        }
      }

      $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
      $filsoldir2=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
      $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
      if ($filsoldir=='S' || $filsoldir2=='S'){
        if ($this->getRequestParameter('tscheemi[coddirec]')==''){
           if ($cambiareti=='S') $this->coderror3=3014; else $this->coderror3=3013;
           return false;
        }
      }

  	  
     /* $aprmonche=H::getConfApp('aprmonche','tesoreria','tesmovemiche');
      if ($aprmonche=='S')
      {
        $t= new Criteria();
        $reg= OpdefempPeer::doSelectOne($t);
        if ($reg)
        {
        	if ($this->getUser()->getAttribute('tschemi_operacion','vacio')=='ordpag')
        	  $monto=H::toFloat($this->getRequestParameter('tscheemi[montotordpag]'));
        	else if ($this->getUser()->getAttribute('tschemi_operacion','vacio')=='compro')
        	   $monto=H::toFloat($this->getRequestParameter('tscheemi[montotcompro]'));
        	else if ($this->getUser()->getAttribute('tschemi_operacion','vacio')=='precom')
        	  $monto=H::toFloat($this->getRequestParameter('tscheemi[montotprecom]'));
        	else if ($this->getUser()->getAttribute('tschemi_operacion','vacio')=='pagdir')
              $monto=H::toFloat($this->getRequestParameter('tscheemi[totnetpagdir]'));
            else if ($this->getUser()->getAttribute('tschemi_operacion','vacio')=='pagnopre')
              $monto=H::toFloat($this->getRequestParameter('tscheemi[totnetpagnap]'));

        	if ($monto > H::toFloat($reg->getMonche()))
        	{
               $this->coderror4=553;
               return false;
        	}
        }
      }*/


      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('tscheemi[fecemi]'))==true)
  	  {
        $this->coderror6=529;
        return false;
  	  }

      if (Tesoreria::validaPeriodoCerradoBanco($this->getRequestParameter('tscheemi[fecemi]'),$this->getRequestParameter('tscheemi[numcue]'))==false)
      {
       $this->coderror6=537;
        return false;
      } 

      $valblocueban=H::getConfAppGen('valblocueban');
      if ($valblocueban=='S'){
        if (Tesoreria::validaBancoBloqueado($this->getRequestParameter('tscheemi[fecemi]'),$this->getRequestParameter('tscheemi[numcue]')))
        {
         $this->coderror6=5007;
          return false;
        }
      }



  	  $r= new Criteria();
  	  $r->add(TsmovlibPeer::NUMCUE,$this->getRequestParameter('tscheemi[numcue]'));
  	  $r->add(TsmovlibPeer::REFLIB,$this->getRequestParameter('tscheemi[numche]'));
  	  $r->add(TsmovlibPeer::TIPMOV,$this->getRequestParameter('tscheemi[tipdoc]'));
  	  $reg= TsmovlibPeer::doSelectOne($r);
  	  if ($reg)
  	  {
  	  	$this->coderror6=538;
        return false;
  	  }


      $contaba = ContabaPeer::doSelectOne(new Criteria());
      $saldo=0;
      if(!Tesoreria::chequear_disponibilidad_financiera($this->tscheemi->getNumcue(),$this->tscheemi->getMonche(),$contaba->getFecini(),$this->tscheemi->getFecemi(),$saldo)){
        $this->coderror2 = 195; 
        return false;
      }

      if ($this->getUser()->getAttribute('tschemi_operacion','vacio')!='ordpag')//CHEQUE DE ORDEN DE PAGO
      {
        if (trim($this->getRequestParameter('tscheemi[cedrif]'))=="")
        {
          $this->coderror1=502;
          return false;
        }
      }
      //orden de pago
      if ($this->getUser()->getAttribute('tschemi_operacion','vacio')=='ordpag')
      {
         $grid=Herramientas::CargarDatosGrid($this,$this->gridOrdPag);
         if (!$this->ValidarDatosenGrid($grid))
         {
           $this->coderror3=505;
           return false;
         }
      }

    //compromisos
      else if ($this->getUser()->getAttribute('tschemi_operacion','vacio')=='compro')
      {
           $grid=Herramientas::CargarDatosGrid($this,$this->gridCompro);
           if (!$this->ValidarDatosenGrid($grid))
           {
              $this->coderror3=506;
              return false;
           }
      }
      //precompromisos
      else if ($this->getUser()->getAttribute('tschemi_operacion','vacio')=='precom')
      {
           $grid=Herramientas::CargarDatosGrid($this,$this->gridPrecom);
           if (!$this->ValidarDatosenGrid($grid))
           {
              $this->coderror3=507;
              return false;
           }
      }

       //pagos directos
      else if ($this->getUser()->getAttribute('tschemi_operacion','vacio')=='pagdir')
      {
           $grid=Herramientas::CargarDatosGrid($this,$this->gridPagdir);
           $x=$grid[0];
           if (count($x)>0)
           {
           	if (!Cheques::validarDisponibilidadPresu($grid,$errcodigo,$this->getRequestParameter('tscheemi[codmon]'),$this->getRequestParameter('tscheemi[valmon]'),$this->tscheemi->getFecemi()))
		        {
		          $this->coderror3=$errcodigo;
		          return false;
		        }
           }
           else
           {
              $this->coderror3=503;
              return false;
           }
      }

  	$this->comprobaut="";
    $this->gencomaut=H::getConfApp2('gencomaut', 'tesoreria', 'tesmovemiche');
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('generales',$varemp))
     if(array_key_exists('comprobaut',$varemp['generales']))
	 {
	   $this->comprobaut=$varemp['generales']['comprobaut'];
	 }

     if ($this->comprobaut!='S' && $this->gencomaut!='S'){
      if (!$this->ValidarGeneroComprobantes())
      {
          $this->coderror2=508;
          return false;
       }else {
          $concom=$this->getRequestParameter('totalcomprobantes');        
          $i=0;
          $numcom="";
          while ($i<$concom)
          {
            $f[$i]=$this->form.$i;
            if ($this->getUser()->getAttribute('contabc[numcom]',null,$f[$i])!="")
            {
              $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$f[$i]);           
              $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$f[$i]);
               $c = new Criteria();
               $c->add(ContabaPeer::CODEMP,'001');
               $per = ContabaPeer::doSelectOne($c);
               if ($per) {
                  if ($per->getCorcomp()!=''){
                    if($numcom=='########'){
                        $numcom = Comprobante::Buscar_Correlativo($feccom);
                        if (strlen($numcom)>8){
                          $this->coderror2=5003;
                          return false;
                        }
                    }
                  }
               }
            }        
            $i++;
          }//  while ($i<$concom)
       }
     }
	 
	 $c = new Criteria();
	 $c->add(TstipmovPeer::CODTIP,$this->getRequestParameter('tscheemi[tipdoc]'));
	 $rsc = TstipmovPeer::doSelectOne($c);
	 if($rsc)
	 	if($rsc->getEscheque()==true &&  $rsc->getPagnom()==false)
		{
			 $c = new Criteria();
			 $c->add(TsdefchequeraPeer::NUMCUE,$this->tscheemi->getNumcue());
			 $c->add(TsdefchequeraPeer::ACTIVA,'SI');                         
			 $objp = TsdefchequeraPeer::doSelectOne($c);
			 if($objp)
			 {
          $c2 = new Criteria();
          $c2->add(TsdefbanPeer::NUMCUE,$this->tscheemi->getNumcue());                                
          $objdigitos = TsdefbanPeer::doSelectOne($c2);
          if ($objdigitos){
              $digitos = $objdigitos->getCantdig()*-1;
          }else{
              $digitos = 0;
          }

  			 	if(substr($objp->getNumchedes(),$digitos)>substr($this->tscheemi->getNumche(),$digitos) || substr($objp->getNumchehas(),$digitos)<substr($this->tscheemi->getNumche(),$digitos))
  				{
  					$this->coderror2=547;
  					return false;
  				}		
			 }		
		}
	 
	 

      return true;
    }else return true;
  }

  public function ValidarDatosenGrid($grid)
  {
      $x=$grid[0];
      $j=0;
      $sel=false;
      //print_r($grid);
      //exit;
      while ($j<count($x) && !$sel)
      {
        if ($x[$j]->getCheck()=="1")
        {
          $sel=true;
        }
        $j++;
      } //while ($j<count($x))

      if ($sel)
        return true;
      else
        return false;
  }


   public function ValidarGeneroComprobantes()
  {
        $i=0;
        $concom=0;
        if ($this->getRequestParameter('totalcomprobantes')!="") $concom=$this->getRequestParameter('totalcomprobantes');
        $sel=false;
        while ($i<$concom && !$sel)
        {
          $f[$i]=$this->form.$i;
          //verificar si se genero comprobante
          if ($this->getUser()->getAttribute('contabc[numcom]',null,$f[$i])!="")
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

  public function getLabels()
  {
    $labels = parent::getLabels();
  
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['tscheemi{coddirec}'] = 'Estado';
    return $labels;
  }

}
