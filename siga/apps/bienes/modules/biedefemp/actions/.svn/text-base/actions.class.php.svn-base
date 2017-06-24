<?php

/**
 * biedefemp actions.
 *
 * @package    Roraima
 * @subpackage biedefemp
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class biedefempActions extends autobiedefempActions
{
  public function editing()
  {	
	$c = new Criteria();
	$objact = BndefactPeer::doSelect($c);
	if($objact)
	   $this->defact=true;
	else   
	   $this->defact=false;
	 
	$c1 = new Criteria();
	$objubi = BnubibiePeer::doSelect($c1);
	
	if($objubi)
	   $this->ubibie=true;
	else   
	   $this->ubibie=false;  
	
	   
  }	
	
  protected function getBndefinsOrCreate($id = 'id')
  {
  	$this->new=false;
  	$c = new Criteria();
	$reg = BnubibiePeer::doSelect($c);
	if (count($reg)) $this->new=true;

    if (!$this->getRequestParameter($id))
    {
      $bndefins = new Bndefins();
    }
    else
    {
      $bndefins = BndefinsPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($bndefins);
    }

    return $bndefins;
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
    $this->bndefins = $this->getBndefinsOrCreate();
    try{
    	$this->updateBndefinsFromRequest();
    }
    catch(Exception $ex){}

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

    public function executeIndex()
  {
    $id=Herramientas::getX_vacio('CODINS','Bndefins','Id','001');
    if ($id!="")
    {
    return $this->redirect('biedefemp/edit?id='.$id);
    }
    else { return $this->redirect('biedefemp/edit');}
  }


  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateBndefinsFromRequest()
  {
    $bndefins = $this->getRequestParameter('bndefins');

    $lonubi=strlen($bndefins['forubi']);
    $this->bndefins->setLonubi($lonubi);
    $lonact=strlen($bndefins['foract']);
    $this->bndefins->setLonact($lonact);

    if (isset($bndefins['codins']))
    {
      $this->bndefins->setCodins($bndefins['codins']);
    }
    if (isset($bndefins['nomins']))
    {
      $this->bndefins->setNomins($bndefins['nomins']);
    }
    if (isset($bndefins['dirins']))
    {
      $this->bndefins->setDirins($bndefins['dirins']);
    }
    if (isset($bndefins['telins']))
    {
      $this->bndefins->setTelins($bndefins['telins']);
    }
    if (isset($bndefins['faxins']))
    {
      $this->bndefins->setFaxins($bndefins['faxins']);
    }
    if (isset($bndefins['email']))
    {
      $this->bndefins->setEmail($bndefins['email']);
    }
    if (isset($bndefins['edoins']))
    {
      $this->bndefins->setEdoins($bndefins['edoins']);
    }
    if (isset($bndefins['munins']))
    {
      $this->bndefins->setMunins($bndefins['munins']);
    }
    if (isset($bndefins['paqins']))
    {
      $this->bndefins->setPaqins($bndefins['paqins']);
    }
    if (isset($bndefins['foract']))
    {
      $this->bndefins->setForact($bndefins['foract']);
    }
    if (isset($bndefins['desact']))
    {
      $this->bndefins->setDesact($bndefins['desact']);
    }
    if (isset($bndefins['forubi']))
    {
      $this->bndefins->setForubi($bndefins['forubi']);
    }
    if (isset($bndefins['desubi']))
    {
      $this->bndefins->setDesubi($bndefins['desubi']);
    }
    if (isset($bndefins['fecper']))
    {
      if ($bndefins['fecper'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndefins['fecper']))
          {
            $value = $dateFormat->format($bndefins['fecper'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndefins['fecper'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndefins->setFecper($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndefins->setFecper(null);
      }
    }
    if (isset($bndefins['feceje']))
    {
      if ($bndefins['feceje'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndefins['feceje']))
          {
            $value = $dateFormat->format($bndefins['feceje'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndefins['feceje'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndefins->setFeceje($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndefins->setFeceje(null);
      }
    }
    if (isset($bndefins['coddes']))
    {
      $this->bndefins->setCoddes($bndefins['coddes']);
    }
    if (isset($bndefins['porrev']))
    {
      $this->bndefins->setPorrev($bndefins['porrev']);
    }
    if (isset($bndefins['corrmue']))
    {
      $this->bndefins->setCorrmue($bndefins['corrmue']);
    }
    if (isset($bndefins['corrinm']))
    {
      $this->bndefins->setCorrinm($bndefins['corrinm']);
    }
    if (isset($bndefins['corrsem']))
    {
      $this->bndefins->setCorrsem($bndefins['corrsem']);
    }

    if (isset($bndefins['codinc']))
    {
      $this->bndefins->setCodinc($bndefins['codinc']);
    }
    if (isset($bndefins['coractmue']))
    {
      $this->bndefins->setCoractmue($bndefins['coractmue']);
    }
    
    if (isset($bndefins['coractinm']))
    {
      $this->bndefins->setCoractinm($bndefins['coractinm']);
    }
    if (isset($bndefins['porpri']))
    {
      $this->bndefins->setPorpri($bndefins['porpri']);
    } 
    if (isset($bndefins['codtiptra']))
    {
      $this->bndefins->setCodtiptra($bndefins['codtiptra']);
    }
    if (isset($bndefins['cormuenacd']))
    {
      $this->bndefins->setCormuenacd($bndefins['cormuenacd']);
    }
    if (isset($bndefins['cormueregd']))
    {
      $this->bndefins->setCormueregd($bndefins['cormueregd']);
    }
    if (isset($bndefins['cormuenach']))
    {
      $this->bndefins->setCormuenach($bndefins['cormuenach']);
    }
    if (isset($bndefins['cormueregh']))
    {
      $this->bndefins->setCormueregh($bndefins['cormueregh']);
    }
    $this->bndefins->setModcormue(isset($bndefins['modcormue']) ? $bndefins['modcormue'] : 0);
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
   $javascript=""; $dato="";
    if ($this->getRequestParameter('ajax')=='1')
    {
        $a= new Criteria();
        $a->add(CotiptraPeer::CODTIPTRA,$this->getRequestParameter('codigo'));
        $reg= CotiptraPeer::doSelectOne($a);
        if ($reg)
        {
          $dato=$reg->getDestiptra();        
        }else{
          $javascript="alert_('El Tipo de Transacci&oacute;n no existe'); $('bndefins_codtiptra').value=''; $('bndefins_codtiptra').focus();";
        }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
    }else if ($this->getRequestParameter('ajax')=='2'){
      $hasta1=$this->getRequestParameter('hasta1');  
      $desde2=$this->getRequestParameter('desde2');  
      $hasta2=$this->getRequestParameter('hasta2');
      $codigo=$this->getRequestParameter('codigo');
      $js="";
      if ($hasta1!='')        
        if (H::toFloat($hasta1)<H::toFloat($codigo))
          $js="alert_('El Correlativo Desde debe ser Menor al Correlativo Hasta'); $('bndefins_cormuenacd').value=''; $('bndefins_cormuenacd').focus();";
       
      if ($desde2!='' && $hasta2!='')
        if (H::toFloat($desde2)<=H::toFloat($codigo) && H::toFloat($hasta2)>=H::toFloat($codigo))
         $js="alert_('El Correlativo Desde no debe estar en el Rango de Muebles Regionales'); $('bndefins_cormuenacd').value=''; $('bndefins_cormuenacd').focus();";
        
       $output = '[["javascript","'.$js.'",""]]';
    }else if ($this->getRequestParameter('ajax')=='3'){
      $desde1=$this->getRequestParameter('desde1');  
      $desde2=$this->getRequestParameter('desde2');  
      $hasta2=$this->getRequestParameter('hasta2');
      $codigo=$this->getRequestParameter('codigo');
      $js="";
      if ($desde1!='')        
        if (H::toFloat($desde1)>H::toFloat($codigo))
          $js="alert_('El Correlativo Hasta debe ser mayor al Correlativo Desde'); $('bndefins_cormuenach').value=''; $('bndefins_cormuenach').focus();";
       
      if ($desde2!='' && $hasta2!='')
        if (H::toFloat($desde2)<=H::toFloat($codigo) && H::toFloat($hasta2)>=H::toFloat($codigo))
         $js="alert_('El Correlativo Hasta no debe estar en el Rango de Muebles Regionales'); $('bndefins_cormuenach').value=''; $('bndefins_cormuenach').focus();";
        
       $output = '[["javascript","'.$js.'",""]]';
    }else if ($this->getRequestParameter('ajax')=='4'){
      $hasta2=$this->getRequestParameter('hasta2');  
      $desde1=$this->getRequestParameter('desde1');  
      $hasta1=$this->getRequestParameter('hasta1');
      $codigo=$this->getRequestParameter('codigo');
      $js="";
      if ($hasta2!='')        
        if (H::toFloat($hasta2)<H::toFloat($codigo))
          $js="alert_('El Correlativo Desde debe ser menor al Correlativo Hasta'); $('bndefins_cormueregd').value=''; $('bndefins_cormueregd').focus();";
       
      if ($desde1!='' && $hasta1!='')
        if (H::toFloat($desde1)<=H::toFloat($codigo) && H::toFloat($hasta1)>=H::toFloat($codigo))
         $js="alert_('El Correlativo Desde no debe estar en el Rango de Muebles Nacionales'); $('bndefins_cormueregd').value=''; $('bndefins_cormueregd').focus();";
        
       $output = '[["javascript","'.$js.'",""]]';
    }else if ($this->getRequestParameter('ajax')=='5'){
      $desde2=$this->getRequestParameter('desde2');  
      $desde1=$this->getRequestParameter('desde1');  
      $hasta1=$this->getRequestParameter('hasta1');
      $codigo=$this->getRequestParameter('codigo');
      $js="";
      if ($desde2!='')        
        if (H::toFloat($desde2)>H::toFloat($codigo))
          $js="alert_('El Correlativo Hasta debe ser mayor al Correlativo Desde'); $('bndefins_cormueregh').value=''; $('bndefins_cormueregh').focus();";
       
      if ($desde1!='' && $hasta1!='')
        if (H::toFloat($desde1)<=H::toFloat($codigo) && H::toFloat($hasta1)>=H::toFloat($codigo))
         $js="alert_('El Correlativo Hasta no debe estar en el Rango de Muebles Nacionales'); $('bndefins_cormueregh').value=''; $('bndefins_cormueregh').focus();";
        
       $output = '[["javascript","'.$js.'",""]]';
    }else if ($this->getRequestParameter('ajax')=='6')
    {
        $a= new Criteria();
        $a->add(BnregmuePeer::CODMUE,str_pad($this->getRequestParameter('codigo'), 8, '0', STR_PAD_LEFT));
        $reg= BnregmuePeer::doSelectOne($a);
        if ($reg)
        {
          $javascript="alert_('Ya existe un Mueble con ese Correlativo'); $('bndefins_corrmue').value=''; $('bndefins_corrmue').focus();";
        }else{
          $javascript="";
        }
       $output = '[["javascript","'.$javascript.'",""]]';
    }


    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }  

}
