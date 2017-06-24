<?php

/**
 * pagemiord actions.
 *
 * @package    Roraima
 * @subpackage pagemiord
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 46009 2011-09-22 14:17:44Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pagemiordActions extends autopagemiordActions
{
  public  $coderror1=-1;
  public  $coderror2=-1;
  public  $coderror3=-1;
  public  $coderror4=-1;
  public  $coderror5=-1;
  public  $coderror6=-1;
  public  $coderror7=-1;
  public  $codigo="";
  public  $monto="";
  public  $salvarretencion=-1;

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/opordpag/filters');

    $filubiadm=H::getConfApp2('filubiadm', 'tesoreria', 'pagemiord');
    $loguse= $this->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 

     // 15    // pager
    $this->pager = new sfPropelPager('Opordpag', 15);
    $c = new Criteria();
    if ($filubiadm=='S' && $filsoldir=='S'){
      $this->sql='opordpag.coduni in (select codubi from "SIMA_USER".segubausu where loguse=\''.$loguse.'\') and opordpag.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(OpordpagPeer::CODUNI,$this->sql,Criteria::CUSTOM);

    }else if ($filubiadm=='S'){
      $this->sql='opordpag.coduni in (select codubi from "SIMA_USER".segubausu where loguse=\''.$loguse.'\')';
      $c->add(OpordpagPeer::CODUNI,$this->sql,Criteria::CUSTOM);
    }else if ($filsoldir=='S'){
      $this->sql='opordpag.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(OpordpagPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
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
      $this->opordpag = $this->getOpordpagOrCreate();
      try{ $this->updateOpordpagFromRequest();}catch(Exception $ex){}
      #SE AGREGO MOMENTANEAMENTE
	  if ($this->opordpag->getId()=="")
      {
        $cc = new Criteria();
        $cc->add(OpordpagPeer::NUMORD,$this->opordpag->getNumord());
        $percc = OpordpagPeer::doSelectOne($cc);
			  if($percc)
			  {
          $this->coderror5="99999999";
          return false;
        }
      }
      ##FIN##
      $this->setVars();
      if ($this->opordpag->getId()=="")
      {
        $this->configGridFactura();
        $factura=Herramientas::CargarDatosGrid($this,$this->obj2,true);
        $this->mannivelapr="";
        $this->comprobaut="";
        $varemp = $this->getUser()->getAttribute('configemp');
        if ($varemp)
          if(array_key_exists('generales',$varemp))
		   if(array_key_exists('mannivapr',$varemp['generales']))
		   {
              $this->mannivelapr=$varemp['generales']['mannivapr'];
		   	if(array_key_exists('comprobaut',$varemp['generales']))
		   	{
                $this->comprobaut=$varemp['generales']['comprobaut'];
              }
            }

        if ($this->mannivelapr=='S')
        {
          $login=$this->getUser()->getAttribute('loguse');
          Autenticacion::validadNivelAprobacion($login,H::tofloat($this->getRequestParameter('opordpag[monord]')),$erro);
          if ($erro!=-1)
          {
            $this->coderror5=$erro;
            return false;
          }
        }
        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
        $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
        $filsoldir2=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
        if ($filsoldir=='S' || $filsoldir2=='S'){
          if ($this->getRequestParameter('opordpag[coddirec]')==''){
             if ($cambiareti=='S') $this->coderror3=3014; else $this->coderror3=3013;
             return false;
          }
        }

        $valuniori=H::getConfApp2('valuniori', 'tesoreria', 'pagemiord');   
        if ($valuniori=='S'){
          if ($this->getRequestParameter('opordpag[coduni]')==''){
             $this->coderror3=3028;
             return false;
          }
        }

        $valtipfin=H::getConfApp2('valtipfin', 'tesoreria', 'pagemiord');   
        if ($valtipfin=='S'){
          if ($this->getRequestParameter('opordpag[tipfin]')==''){
             $this->coderror3=3029;
             return false;
          }
        }

        $valconpag=H::getConfApp2('valconpag', 'tesoreria', 'pagemiord');   
        if ($valconpag=='S'){
          if ($this->getRequestParameter('opordpag[codconcepto]')==''){
             $this->coderror3=3027;
             return false;
          }
        }

        

        if ($this->opordpag->getTipcau()!=$this->ordpagnom && $this->opordpag->getTipcau()!=$this->ordpagapo && $this->opordpag->getTipcau()!=$this->ordpagliq && $this->opordpag->getTipcau()!=$this->ordpagfid)
        {
          $this->configGridApliret();
          $grid2 = Herramientas::CargarDatosGrid($this,$this->obj5);
          //$grid3 = Herramientas::CargarDatosGrid($this,$this->obj6);
          if ((count($grid2[0])>0) && ($this->getRequestParameter('opordpag[presiono]')!='S'))
          {
            $this->salvarretencion=516;
            return false;
          }

          $valretfac=H::getConfApp2('valretfac', 'tesoreria', 'pagemiord');
          $genlibcom=H::getX_vacio('TIPCAU','Cpdoccau','Genlibcom',$this->getRequestParameter('opordpag[tipcau]'));
          if ($valretfac=='S' && $genlibcom==true)
          {
            if (count($grid2[0])>0 && count($factura[0])==0) {
              $this->coderror5=1189;
              return false;
            }

            $acumtotfac=0;
            $j=0;
            $x=$factura[0];
            while ($j<count($x))
            {
              if (($x[$j]['fecfac']!='') and ($x[$j]['numctr']!='') and (($x[$j]['numfac']!='') or ($x[$j]['notdeb']!='') or ($x[$j]['notcrd']!='')))
              {
                 $acumtotfac+=H::toFloat($x[$j]['totfac']);
              }
              $j++;
            }
            if (H::toFloat($this->getRequestParameter('opordpag[monord]'))!=$acumtotfac)
            {
              $this->coderror5=1192;
              return false;
            }
              
          }


        }
        if ($this->getRequestParameter('opordpag[numordamo]')!='')
        {
           $ordamo=H::getX_vacio('CODEMP','Opdefemp','Ordamo','001');
            $q= new Criteria();
            $q->add(OpordpagPeer::NUMORD,$this->getRequestParameter('opordpag[numordamo]'));
            $q->add(OpordpagPeer::CEDRIF,$this->getRequestParameter('opordpag[cedrif]'));
            $q->add(OpordpagPeer::TIPCAU,$ordamo);
            $reg= OpordpagPeer::doSelectOne($q);
            if ($reg){
              $fecha=$this->getRequestParameter('opordpag[fecemi]');
              $dateFormat = new sfDateFormat('es_VE');
              $fec1 = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
              if ($fec1<$reg->getFecemi())
              {
                $this->coderror6=1193;
                 return false;
              }
            }
        }

        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('opordpag[fecemi]'))==true)
      	{
          $this->coderror6=529;
          return false;
        }

        $c = new Criteria();
        $c->add(CpdoccauPeer::TIPCAU,strtoupper($this->getRequestParameter('opordpag[tipcau]')));
        $datos = CpdoccauPeer::doSelectOne($c);
        if ($datos)
        {
          $afecau=$datos->getAfecau();
          if ($afecau=='S'){
            if (!Herramientas::validarPeriodoPresuesto($this->getRequestParameter('opordpag[fecemi]')))
            {
              $this->coderror5=142;
              return false;
            }
          }
        }
        if ($this->comprobaut!="S"){
            $orddea=H::getX_vacio('CODEMP','Opdefemp','Ordant','001');
            $orddeacom=H::getX_vacio('CODEMP','Opdefemp','Ordantcom','001');
            $opsincom411=H::getConfApp2('opsincom411', 'tesoreria', 'pagemiord');
            $tipcau=$this->getRequestParameter('opordpag[tipcau]');
            if ($opsincom411=='S')
            {
              if (($orddea!='' && $orddea!=$tipcau) && ($orddeacom!='' && $orddeacom!=$tipcau)){
                if (self::validarGeneraComprobante())
      	        {
                  $this->coderror4=508;
                  return false;
                }
              }
            }else {
              if (self::validarGeneraComprobante())
              {
                $this->coderror4=508;
                return false;
              }
            }
        }
        if ($this->getRequestParameter('opordpag[referencias]')!="")
        {
            $refere=split('_',$this->getRequestParameter('opordpag[referencias]'));
            $docref=CpdoccauPeer::getRefier($this->getRequestParameter('opordpag[tipcau]'));
            $dateFormat = new sfDateFormat('es_VE');
            $fec = $dateFormat->format($this->getRequestParameter('opordpag[fecemi]'), 'i', $dateFormat->getInputPattern('d'));

            $i=0;
            while ($i<count($refere)) {
                $w= new Criteria();
                if ($docref=='P')
                {
                  $w->add(CpprecomPeer::REFPRC,$refere[$i]);
                  $regw= CpprecomPeer::doSelectOne($w);
                  if ($regw)
                  {
                      if ($regw->getFecprc()>$fec)
                      {
                          $this->coderror4=593;
                          return false;
                      }
                  }
                }else {
                  $w->add(CpcomproPeer::REFCOM,$refere[$i]);
                  $regw= CpcomproPeer::doSelectOne($w);
                  if ($regw)
                  {
                      if ($regw->getFeccom()>$fec)
                      {
                          $this->coderror4=594;
                          return false;
                      }
                  }
                }
            $i++;
            }


        }

        $this->configGridFactura();
        $factura=Herramientas::CargarDatosGrid($this,$this->obj2,true);
        $x=$factura[0];
        if (count($x)!=0)
        {
          $j=0;
          while ($j<count($x))
          {
            if (($x[$j]['fecfac']=='') or ($x[$j]['numctr']==''))
            {
               $this->coderror4=599;
               return false;
            }
            if ($x[$j]['tiptra']=='01' && $x[$j]['numfac']=='')
            {
              $this->coderror4=599;
               return false;
            }
            else if ($x[$j]['tiptra']=='02' && $x[$j]['notdeb']=='')
            {
              $this->coderror4=599;
               return false;
            }
            else if ($x[$j]['tiptra']=='03' && $x[$j]['notcrd']=='')
            {
              $this->coderror4=599;
               return false;
            }
            $j++;
          }
        }
        $cedrif=$this->getRequestParameter('opordpag[cedrif]');
        $valnumfac=H::getConfApp2('valnumfac', 'tesoreria', 'pagemiord');
      if ($valnumfac=='S') {
        $l= new Criteria();
        $l->add(OpordpagPeer::CEDRIF,$cedrif);
        $benefi= OpordpagPeer::doSelect($l);
    if ($benefi)
    {
      foreach ($benefi as $provee)
      {
            $y= new Criteria();
            $y->add(OpfacturPeer::NUMORD,$provee->getNumord());
            $resul= OpfacturPeer::doSelect($y);
      	if ($resul)
      	{
           foreach ($resul as $factur)
           {
                $t=0;
                $u=$factura[0];
		     while ($t<count($u))
		     {
               if ($factur->getNumfac()==$u[$t]["numfac"])
               {
                    $this->coderror7=532;
                    $this->codigo=$u[$t]["numfac"];
                    return false;
                    break;
                  }
                  $t++;
                }
              }
            }
          }
        }
      }

      if ($this->getRequestParameter('opordpag[afectapre]')==1)
      {
          $this->configGrid();
          $grid = Herramientas::CargarDatosGrid($this,$this->obj);
          if (count($grid[0])==0)
          {
            $this->coderror5=510;//508;
            return false;
          }

      if ($this->opordpag->getTipcau()==$this->ordpagnom || $this->opordpag->getTipcau()==$this->ordpagapo || $this->opordpag->getTipcau()==$this->ordpagliq || $this->opordpag->getTipcau()==$this->ordpagfid)
      {
        if (!OrdendePago::validarDisponibilidadPresu($grid,$this->getRequestParameter('opordpag[afectapre]'),$cod,$this->getRequestParameter('opordpag[codmon]'),$this->getRequestParameter('opordpag[valmon]'),$this->opordpag->getFecemi()))
        {
              $this->codigo=$cod;
              $this->coderror1=513;
              return false;
            }
        else
        {
              return true;
            }
      }
      else
      {
        if (!($this->getRequestParameter('opordpag[documento]')=='C' || $this->getRequestParameter('opordpag[documento]')=='P'))
        {
          $orddea=H::getX_vacio('CODEMP','Opdefemp','Ordant','001');
          if ($orddea!='' && $orddea==$this->getRequestParameter('opordpag[tipcau]'))
          {
             $this->coderror1=OrdendePago::validarPartidaDeuAnt($grid,$cod);
             $this->codigo=$cod;
              if ($this->coderror1<>-1)
                return false;
              else
                return true;
          }
              OrdendePago::validarPagemiord($grid,$this->getRequestParameter('opordpag[afectapre]'),$cod,$msj,$monto,$this->getRequestParameter('opordpag[codmon]'),$this->getRequestParameter('opordpag[valmon]'),$this->opordpag->getFecemi());
              $this->codigo=$cod;
              $this->monto=$monto;
              $this->coderror2=$msj;
              if ($this->coderror2<>-1)
              {
                    return false;
              }else return true;
        }
      }
       }else
       {
       	if (H::tofloat($this->getRequestParameter('opordpag[neto]'))<=0)
      	{
            $this->coderror4=535;
            return false;
          }
        }
      }else
      {

        $this->configGridFactura();
        $factura=Herramientas::CargarDatosGrid($this,$this->obj2,true);
        $x=$factura[0];
        if (count($x)!=0)
        {
          $j=0;
          while ($j<count($x))
          {
            if (($x[$j]['fecfac']=='') or ($x[$j]['numctr']==''))
            {
               $this->coderror4=599;
               return false;
            }
            if ($x[$j]['tiptra']=='01' && $x[$j]['numfac']=='')
            {
              $this->coderror4=599;
               return false;
            }
            else if ($x[$j]['tiptra']=='02' && $x[$j]['notdeb']=='')
            {
              $this->coderror4=599;
               return false;
            }
            else if ($x[$j]['tiptra']=='03' && $x[$j]['notcrd']=='')
            {
              $this->coderror4=599;
               return false;
            }
            $j++;
          }
        }
        
        $cedrif=$this->opordpag->getCedrif();
      $valnumfac=H::getConfApp2('valnumfac', 'compras', 'pagemiord');
      if ($valnumfac!='N') {
        $l= new Criteria();
        $l->add(OpordpagPeer::CEDRIF,$cedrif);
        $benefi= OpordpagPeer::doSelect($l);
	    if ($benefi)
	    {
	      foreach ($benefi as $provee)
	      {
            $y= new Criteria();
            $y->add(OpfacturPeer::NUMORD,$provee->getNumord());
            $resul= OpfacturPeer::doSelect($y);
	      	if ($resul)
	      	{
	           foreach ($resul as $factur)
	           {
                $t=0;
                $u=$factura[0];
			     while ($t<count($u))
			     {
	               if ($factur->getNumfac()==$u[$t]["numfac"] && $u[$t]["id"]=="")
	               {
                    $this->coderror7=532;
                    $this->codigo=$u[$t]["numfac"];
                    return false;
                    break;
                  }
                  $t++;
                }
              }
            }
          }
        }
      }

      }
      return true;
    }else return true;
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->opordpag = $this->getOpordpagOrCreate();
    $this->grabo=$this->getRequestParameter('grabo');
    $this->setVars();
    $agreeti=H::getConfApp('agrstausu', 'tesoreria', 'pagemiord');
    $nomusu=H::getX('LOGUSE','Usuarios','Nomuse',$this->opordpag->getLoguse());
    if ($this->opordpag->getId()!='')
    {
      switch ($this->opordpag->getStatus()) {
        case 'A':
          $this->color='#CC0000';
          $c = new Criteria();
          $c->add(UsuariosPeer::LOGUSE,$this->opordpag->getUsuanu());
          $objUsuario = UsuariosPeer::doSelectOne($c);
           if ($objUsuario)
           {
            $nombre=$objUsuario->getNomuse();
          }else $nombre="";

          $q= new Criteria();
          $regi= OpdefempPeer::doSelectOne($q);
			if ($regi)
			{
            $tmot=$regi->getOrdmotanu();
          }else $tmot="";
			if ($tmot=='S')
			{
               if ($this->opordpag->getFecanu()!="")
	           { $this->eti="ANULADA EL ".date('d/m/Y',strtotime($this->opordpag->getFecanu()))." .CON MOTIVO " .$this->opordpag->getDesanu()." POR EL USUARIO ".$nombre;}
	           else { $this->eti="ANULADA CON MOTIVO " .$this->opordpag->getDesanu()." POR EL USUARIO ".$nombre;}
          }else {
	           if ($this->opordpag->getFecanu()!="")
	           { $this->eti="ANULADA EL ".date('d/m/Y',strtotime($this->opordpag->getFecanu()));}
	           else { $this->eti="ANULADA";}
            }
          break;
        case 'E':
          $this->color='#CC0000';
          if ($agreeti=='S') $this->eti="ELABORADA POR EL USUARIO ".$nomusu;
          else $this->eti="ELABORADA";
          break;
        case 'C':
          $this->color='#CC0000';
          if ($agreeti=='S') $this->eti="EN CONTRALORIA. REALIZADO POR EL USUARIO ".$nomusu;
          else $this->eti="EN CONTRALORIA";
          break;
        case ('I' || 'N'):
          $sql="select a.numche as numche,b.feclib as fecemi,b.tipmov as tipo,d.destip as destip,c.nomcue as nomcue, a.tipmov as tipmovche
                 from opordche a, tsmovlib b, tsdefban c,tstipmov d
                 where a.numche=b.reflib and a.codcta=b.numcue and
                 b.numcue=c.numcue and
                 b.tipmov=d.codtip and d.debcre='C' and
                 a.numord='".$this->opordpag->getNumord()."'";
          $result=array();
           if (Herramientas::BuscarDatos($sql,$result))
           {
             if ($this->opordpag->getStatus()=='N')
             {
              $this->color='#CC0000';
              $this->eti="PAGADA PARCIALMENTE CON ";
             }
             else
             {
              $this->color='#0000CC';
              $this->eti="PAGADA CON ";
             }

             if ($result[0]["tipmovche"]!="")
             {
              ///////////////////////////////////////
              $sql="select a.numche as numche,b.feclib as fecemi,b.tipmov as tipo,d.destip as destip,c.nomcue as nomcue, a.tipmov as tipmovche
                 from opordche a, tsmovlib b, tsdefban c,tstipmov d
                 where a.numche=b.reflib and a.codcta=b.numcue and a.tipmov=b.tipmov and
                 b.numcue=c.numcue and
                 b.tipmov=d.codtip and d.debcre='C' and
                 a.numord='".$this->opordpag->getNumord()."'";
                  $resultad=array();
              		if (Herramientas::BuscarDatos($sql,$resultad))
               		{
               		     foreach ($resultad as $datos)
    		             {
                      $this->eti=$this->eti.$datos["destip"]." N° ".$datos["numche"]." EL ".date('d/m/Y',strtotime($datos["fecemi"]))." - ".$datos["nomcue"].", ";
                    }
                  }
                  else $this->eti="";              
            }
      			else
      			{
               foreach ($result as $datos)
               {
                $this->eti=$this->eti.$datos["destip"]." N° ".$datos["numche"]." EL ".date('d/m/Y',strtotime($datos["fecemi"]))." - ".$datos["nomcue"].", ";
               }
            }
            if ($agreeti=='S') $this->eti=substr($this->eti,0,strlen($this->eti)-2).' REALIZADO POR '.$nomusu;
            else $this->eti=substr($this->eti,0,strlen($this->eti)-2);

            $q=new Criteria();
            $q->add(TsdetpagelePeer::NUMORD,$this->opordpag->getNumord());
            $regq= TsdetpagelePeer::doSelectOne($q);
            if ($regq){
              $this->eti.=". Pago Electrónico N° ".$regq->getRefpag();
            }
          }
           else
           {
              if ($this->opordpag->getStatus()=='I')
              {
              $sql1="select a.tipmov as tipmov,a.reflib as reflib,a.feclib as feclib,a.numcue as numcue,b.nomcue as nomcue,c.destip as destip
                from  tsmovlib a, tsdefban b,tstipmov c
                where a.numcue=b.numcue and
                a.tipmov=c.codtip and
                a.numcue='".$this->opordpag->getCtaban()."' and
                a.reflib='".$this->opordpag->getNumche()."'";
              $result2=array();
                if(Herramientas::BuscarDatos($sql1,$result2))
                {
                $this->color='#0000CC';
                if ($agreeti=='S')  $this->eti="PAGADA CON ".$result2[0]["destip"]." N° ".$result2[0]["reflib"]." EL ".date('d/m/Y',strtotime($result2[0]["feclib"]))." - ".$result2[0]["nomcue"].' REALIZADO POR '.$nomusu;
                else $this->eti="PAGADA CON ".$result2[0]["destip"]." N° ".$result2[0]["reflib"]." EL ".date('d/m/Y',strtotime($result2[0]["feclib"]))." - ".$result2[0]["nomcue"];

                  $q=new Criteria();
                  $q->add(TsdetpagelePeer::NUMORD,$this->opordpag->getNumord());
                  $regq= TsdetpagelePeer::doSelectOne($q);
                  if ($regq){
                    $this->eti.=". Con Pago Electrónico N° ".$regq->getRefpag();
                  }
              }
                else
                {
                $this->color='#0000CC';
                if ($agreeti=='S') $this->eti="PAGADA SIN CHEQUE ASOCIADO. REALIZADO POR ".$nomusu;
                else $this->eti="PAGADA SIN CHEQUE ASOCIADO";
              }
            }
              else
              {
              $this->color='#CC0000';
              if ($agreeti=='S') $this->eti="PENDIENTE POR PAGAR. REALIZADO POR ".$nomusu;
              else $this->eti="PENDIENTE POR PAGAR";
            }
          }
      }
      $this->opordpag->setAfectapre($this->opordpag->getAfectapresup());

    }
    else
    {
      $this->color='';
      $this->eti='';
 
      $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
      if ($filsoldir=='S'){
         $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
         $t= new Criteria();
         $t->add(SegdirusuPeer::LOGUSE,$loguse);
         $t->setLimit(1);
         $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
         $regt= SegdirusuPeer::doSelectOne($t); 
         if ($regt){
          if ($this->opordpag->getCoddirec()=='')
            $this->opordpag->setCoddirec($regt->getCoddirec());
         }
        
      }
      
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpordpagFromRequest();

      $coderr=$this->saveOpordpag($this->opordpag);
      if ($coderr==-1)
      {
          $this->opordpag->setId(Herramientas::getX_vacio('numord','opordpag','id',$this->opordpag->getNumord()));

          $this->setFlash('notice', 'Your modifications have been saved');
          $this->Bitacora('Guardo');

          if ($this->getRequestParameter('save_and_add'))
          {
            return $this->redirect('pagemiord/create');
          }
          else if ($this->getRequestParameter('save_and_list'))
          {
            return $this->redirect('pagemiord/list');
          }
          else
          {
            return $this->redirect('pagemiord/edit?id='.$this->opordpag->getId().'&grabo=S');
          }
      }else {
          $err = Herramientas::obtenerMensajeError($coderr);
          $this->getRequest()->setError('',$err);     	

           $this->labels = $this->getLabels();
           return sfView::SUCCESS;
        }
    }
    else
    {
      $this->labels = $this->getLabels();
      $this->getUser()->getAttributeHolder()->remove('presiona','pagemiord');
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
    $this->opordpag = $this->getOpordpagOrCreate();
    try{ $this->updateOpordpagFromRequest();}catch(Exception $ex){}
    $this->grabo="";
    Herramientas::CargarDatosGrid($this,$this->obj);
    if ($this->getRequestParameter('opordpag[documento]')=='N')
      { $this->configGrid();}
      else { $this->configGrid2();}
    $this->configGridEmpresas();
    Herramientas::CargarDatosGrid($this,$this->obj7);

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
        $err = Herramientas::obtenerMensajeError($this->coderror1);
        $this->getRequest()->setError('',$err.' para los siguientes Códigos Presupuestarios '.$this->codigo);
      }

     if($this->coderror2!=-1)
     {
        $err1 = Herramientas::obtenerMensajeError($this->coderror2);
        //$this->getRequest()->setError('',$err1.' del Codigo Presupuestario '.$this->codigo.'el Monto disponible es '.$this->monto);
        $this->getRequest()->setError('',$err1.' para los siguientes Códigos Presupuestarios: '.$this->codigo);
      }

      if($this->coderror3!=-1)
     {
        $err1 = Herramientas::obtenerMensajeError($this->coderror3);
        $this->getRequest()->setError('',$err1);
      }

     if($this->coderror4!=-1)
     {
        $err2 = Herramientas::obtenerMensajeError($this->coderror4);
        $this->getRequest()->setError('',$err2);
      }

      if($this->coderror5!=-1)
     {
        $err3 = Herramientas::obtenerMensajeError($this->coderror5);
        $this->getRequest()->setError('',$err3);
      }
     if($this->coderror6!=-1)
     {
        $err3 = Herramientas::obtenerMensajeError($this->coderror6);
        $this->getRequest()->setError('opordpag{fecemi}',$err3);
      }
     if($this->salvarretencion!=-1)
     {
        $err4 = Herramientas::obtenerMensajeError($this->salvarretencion);
        $this->getRequest()->setError('',$err4);
      }
      if($this->coderror7!=-1)
     {
        $err3 = Herramientas::obtenerMensajeError($this->coderror7);
        $this->getRequest()->setError('',$err3.' -> '.$this->codigo);
      }
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
  protected function saveOpordpag($opordpag)
  {
    $numerocomp="";
    if ($opordpag->getId())
    {
      $factura=Herramientas::CargarDatosGrid($this,$this->obj2,true);
      $empresas=Herramientas::CargarDatosGrid($this,$this->obj7);
      OrdendePago::actualizarPagemiord($opordpag,$factura,$empresas);
    }
    else
    {
      $concom=$this->getRequestParameter('opordpag[totalcomprobantes]');
      $form="sf_admin/pagemiord/confincomgen";
      if ($concom!=1)
      {
        $grabo=$this->getUser()->getAttribute('grabo',null,$form.'1');
        $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'1');
      }
      else
      {
        $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
        $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'0');
      }

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

            //Verificamos el formato del correlativo,
            //ya que es parametrizable
            $c = new Criteria();
            $c->add(OpdefempPeer::CODEMP,'001');
            $per = OpdefempPeer::doSelectOne($c);
            if ($this->getUser()->getAttribute('confcorcom')=='N') {
                if ($per->getOrdconpre()=='t'){
                    $numcom=$reftra;
                }else {
                    $numcom=$numcom;
                }
              //$numcom = H::iif($per->getOrdconpre()=='t',$reftra,$numcom);
            }
            else {
                $formatcont="";
                $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
                if ($varemp)
                if(array_key_exists('generales',$varemp)) {
                   if(array_key_exists('formatcont',$varemp['generales']))
                   {
                    $formatcont=$varemp['generales']['formatcont'];
                   }
               }
              if ($formatcont!='S') {
                  if ($per->getOrdconpre()=='t')
                  {
                      $numcom2 = Comprobante::Buscar_Correlativo2();
                      $numcom='OP'.substr($numcom2,2,strlen($numcom2));
                  }else {
                      $numcom=$numcom;
                  }
                    //$numcom = H::iif($per->getOrdconpre()=='t','OP'.substr($numcom2 = Comprobante::Buscar_Correlativo2(),2,strlen($numcom2)),$numcom);
              }
              else {
                  if ($per->getOrdconpre()=='t')
                  {
                      $numcom2=$numcom2 = Comprobante::Buscar_Correlativo($feccom);
                      $numcom='OP'.substr($numcom2,2,strlen($numcom2));
                  }else {
                   $numcom=$numcom;   
                  }
                  //$numcom = H::iif($per->getOrdconpre()=='t','OP'.substr($numcom2 = Comprobante::Buscar_Correlativo($feccom),2,strlen($numcom2)),$numcom);
              }
            }
            $codtiptra=H::getX_vacio('TIPCAU','Cpdoccau','Codtiptra',$opordpag->getTipcau());
            $numcom = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]),'TES',$codtiptra,$opordpag->getCoddirec(),$opordpag->getCodmon(),$opordpag->getValmon());
            $opordpag->setNumcom($numcom);
            $numerocomp = $numcom;
          }
          $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'1');
      $this->comprobaut="";
      $varemp = $this->getUser()->getAttribute('configemp');
      if ($varemp)
        if(array_key_exists('generales',$varemp))
  	   	  if(array_key_exists('comprobaut',$varemp['generales']))
		  {
            $this->comprobaut=$varemp['generales']['comprobaut'];
          }

      $detalle=Herramientas::CargarDatosGrid($this,$this->obj);
     if ($this->getRequestParameter('opordpag[vacio]')=='1')
     { $factura=Herramientas::CargarDatosGrid($this,$this->obj2,true);}
     else { $factura=Herramientas::CargarDatosGrid($this,$this->obj2,true);}
      //$retenc=Herramientas::CargarDatosGrid($this,$this->obj6,true);
     $retenc=Herramientas::CargarDatosGrid($this,$this->obj5,true);
     $empresas=Herramientas::CargarDatosGrid($this,$this->obj7);
    if (OrdendePago::salvarPagemiord($opordpag,$detalle,$factura,$retenc,$opordpag->getReferencias(),$opordpag->getCuentarendicion(),$numerocomp,$this->comprobaut,$empresas,$mentxt))
    {
     if (($opordpag->getTipcau()==$this->ordpagnom) || $opordpag->getGencomnom()=='S')
     {
         if ($opordpag->getGencomnom()=='S')
         {
             $refere=explode('_',$opordpag->getReferencias());
             $r = new Criteria();
             $r->add(NpcienomPeer::REFCOM,$refere[1]);
             NpcienomPeer::doDelete($r);
         }else {
            $agropnomesp=H::getX_vacio('CODEMP','Opdefemp','Agropnomesp','001');
            $aux=split('_',$opordpag->getDatosnomina());
            if ($aux[4]!='N'){
              if ($agropnomesp=='N'){
                $sql="DELETE FROM NPCIENOM WHERE CODNOM like '%%%' And CODTIPGAS='".$aux[1]."' And CODBAN like '%%%' And (ASIDED='A' OR ASIDED='D') And FECNOM=TO_DATE('".$aux[3]."','YYYY-MM-DD') AND ESPECIAL='".$aux[4]."' AND CODNOMESP='".$aux[5]."'";
                $sql2="UPDATE NPHISCON SET NUMORD='".$opordpag->getNumord()."' WHERE CODNOM like '%%%' And CODTIPGAS='".$aux[1]."' And CODBAN like '%%%' And (ASIDED='A' OR ASIDED='D') And FECNOM=TO_DATE('".$aux[3]."','YYYY-MM-DD') AND ESPECIAL='".$aux[4]."' AND CODNOMESP='".$aux[5]."'";
              }
              else{
                $sql="DELETE FROM NPCIENOM WHERE CODNOM='".$aux[0]."' And CODTIPGAS='".$aux[1]."' And CODBAN='".$aux[2]."' And (ASIDED='A' OR ASIDED='D') And FECNOM=TO_DATE('".$aux[3]."','YYYY-MM-DD') AND ESPECIAL='".$aux[4]."' AND CODNOMESP='".$aux[5]."'";
                $sql2="UPDATE NPHISCON SET NUMORD='".$opordpag->getNumord()."' WHERE CODNOM='".$aux[0]."' And CODTIPGAS='".$aux[1]."' And CODBAN='".$aux[2]."' And (ASIDED='A' OR ASIDED='D') And FECNOM=TO_DATE('".$aux[3]."','YYYY-MM-DD') AND ESPECIAL='".$aux[4]."' AND CODNOMESP='".$aux[5]."'";
              }
            }
            else {
              $sql="DELETE FROM NPCIENOM WHERE CODNOM='".$aux[0]."' And CODTIPGAS='".$aux[1]."' And CODBAN='".$aux[2]."' And (ASIDED='A' OR ASIDED='D') And FECNOM=TO_DATE('".$aux[3]."','YYYY-MM-DD') AND ESPECIAL='".$aux[4]."'";
              $sql2="UPDATE NPHISCON SET NUMORD='".$opordpag->getNumord()."' WHERE CODNOM='".$aux[0]."' And CODTIPGAS='".$aux[1]."' And CODBAN='".$aux[2]."' And (ASIDED='A' OR ASIDED='D') And FECNOM=TO_DATE('".$aux[3]."','YYYY-MM-DD') AND ESPECIAL='".$aux[4]."'";
//              $sql2="UPDATE NPHISCON SET NUMORD='".$opordpag->getNumord()."' WHERE CODNOM='".$aux[0]."' And CODTIPGAS='".$aux[1]."' And FECNOM=TO_DATE('".$aux[3]."','YYYY-MM-DD') AND ESPECIAL='".$aux[4]."'";
            }
            Herramientas::insertarRegistros($sql);
            Herramientas::insertarRegistros($sql2);
         }
      }
      //aportes
     if ($opordpag->getTipcau()==$this->ordpagapo || $opordpag->getGencomnom()=='A')
     {
         if ($opordpag->getGencomnom()=='A')
         {
             $refere=explode('_',$opordpag->getReferencias());
             $r = new Criteria();
             $r->add(NpcienomPeer::REFCOM,$refere[1]);
             NpcienomPeer::doDelete($r);
         }else {
            $cadenaapo=split('!',$opordpag->getDatosaporte());
            $r=0;
            while ($r<(count($cadenaapo)-1))
            {
              $aux=$cadenaapo[$r];
              $aux2=split('_',$aux);
              if ($aux2[4]=='S')
                $sql="DELETE FROM NPCIENOM WHERE  CODCON='".$aux2[0]."' And CodTipGas='".$aux2[1]."' AND FECNOM=TO_DATE('".$aux2[2]."','dd/MM/YYYY') and Codnom='".$aux2[3]."' and especial='".$aux2[4]."' and codnomesp='".$aux2[5]."'";
              else
                $sql="DELETE FROM NPCIENOM WHERE  CODCON='".$aux2[0]."' And CodTipGas='".$aux2[1]."' AND FECNOM=TO_DATE('".$aux2[2]."','dd/MM/YYYY') and Codnom='".$aux2[3]."' and especial='".$aux2[4]."'";
              Herramientas::insertarRegistros($sql);
              $r++;
            }
         }
     }
      //liquidacion
     if ($opordpag->getTipcau()==$this->ordpagliq)
     {
      if ($this->getRequestParameter('codigoemp')!="")
      {
          $sql="UPDATE NPLiquidacion_det set NumOrd='".$opordpag->getNumord()."' where CodEmp='".$this->getRequestParameter('codigoemp')."'";
          Herramientas::insertarRegistros($sql);
        }
      }
      //fideicomiso
     if ($opordpag->getTipcau()==$this->ordpagfid)
     {
       if ($this->getRequestParameter('lanomina')!="" && $this->getRequestParameter('lafecha')!="")
       {
          $sql="UPDATE npordfid set NumOrd='".$opordpag->getNumord()."' where Codnom='".$this->getRequestParameter('lanomina')."' And Fecha='".$this->getRequestParameter('lafecha')."'";
          Herramientas::insertarRegistros($sql);
        }
      }
     if($opordpag->getTipcau()==$this->ordpagcre)
     {
        CreditosIntegracion::actualizarLiquidacionCreditos($opordpag, $this->getRequestParameter('refcre',''));
      }
      if($opordpag->getTipcau()==$this->ordpagsolpag) {
        $refsolpag = $opordpag->getRefsolpag();
        if($refsolpag){
          $c = new Criteria();
          $c->add(OpsolpagPeer::REFSOL,$refsolpag);
          $solpag = OpsolpagPeer::doSelectOne($c);
          if($solpag) $solpag->setStasol('C');
          $solpag->save();

          $c_select = new Criteria();
          $c_select->add(OpdetsolpagPeer::REFSOL,$refsolpag);

          $c_update = new Criteria();
          $c_update->add(OpdetsolpagPeer::STAIMP,'C');
          $c_update->add(OpdetsolpagPeer::REFORD,$opordpag->getNumord());

          $con = Propel::getConnection(EmpresaPeer::DATABASE_NAME);
          BasePeer::doUpdate($c_select, $c_update, $con);

        }
      }
      }else {
        if ($mentxt!=-1)
          return $mentxt;
        else
          return 595;
      }
    }
    $this->getUser()->getAttributeHolder()->remove('presiona','pagemiord');
   return -1;
  }

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOpordpagFromRequest()
  {
    $opordpag = $this->getRequestParameter('opordpag');
    $this->setVars();
    if (isset($opordpag['numord']))
    {
      $this->opordpag->setNumord($opordpag['numord']);
    }
    if (isset($opordpag['fecemi']))
    {
      if ($opordpag['fecemi'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecemi']))
          {
            $value = $dateFormat->format($opordpag['fecemi'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecemi'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecemi($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecemi(null);
      }
    }
    if (isset($opordpag['tipcau']))
    {
      $this->opordpag->setTipcau($opordpag['tipcau']);
    }
    if (isset($opordpag['nomext']))
    {
      $this->opordpag->setNomext($opordpag['nomext']);
    }
    if (isset($opordpag['desord']))
    {
      $this->opordpag->setDesord($opordpag['desord']);
    }
    if (isset($opordpag['cedrif']))
    {
      $this->opordpag->setCedrif($opordpag['cedrif']);
    }
    if (isset($opordpag['nomben']))
    {
      $this->opordpag->setNomben($opordpag['nomben']);
    }
    if (isset($opordpag['nombensus']))
    {
      $this->opordpag->setNombensus($opordpag['nombensus']);
    }
    if (isset($opordpag['ctapag']))
    {
      $this->opordpag->setCtapag($opordpag['ctapag']);
    }
    if (isset($opordpag['descta']))
    {
      $this->opordpag->setDescta($opordpag['descta']);
    }
    if (isset($opordpag['coduni']))
    {
      $this->opordpag->setCoduni($opordpag['coduni']);
    }
    if (isset($opordpag['desubi']))
    {
      $this->opordpag->setDesubi($opordpag['desubi']);
    }
    if (isset($opordpag['tipfin']))
    {
      $this->opordpag->setTipfin($opordpag['tipfin']);
    }
    if (isset($opordpag['nomext2']))
    {
      $this->opordpag->setNomext2($opordpag['nomext2']);
    }
    if (isset($opordpag['obsord']))
    {
      $this->opordpag->setObsord($opordpag['obsord']);
    }
    if (isset($opordpag['monord']))
    {
        if ($this->getRequestParameter('id')=="")
          $this->opordpag->setMonord($opordpag['monord']);
    }
    if (isset($opordpag['mondes']))
    {
        if ($this->getRequestParameter('id')=="")
          $this->opordpag->setMondes($opordpag['mondes']);
    }
    if (isset($opordpag['monret']))
    {
        if ($this->getRequestParameter('id')=="")
          $this->opordpag->setMonret($opordpag['monret']);
    }
    if (isset($opordpag['status']))
    {
      $this->opordpag->setStatus($opordpag['status']);
    }
    if (isset($opordpag['referencias']))
    {
      $this->opordpag->setReferencias($opordpag['referencias']);
    }
    if (isset($opordpag['documento']))
    {
      $this->opordpag->setDocumento($opordpag['documento']);
    }
    if (isset($opordpag['afectapre']))
    {
      $this->opordpag->setAfectapre($opordpag['afectapre']);
    }
    if (isset($opordpag['totalcomprobantes']))
    {
      $this->opordpag->setTotalcomprobantes($opordpag['totalcomprobantes']);
    }
    if (isset($opordpag['cuentarendicion']))
    {
      $this->opordpag->setCuentarendicion($opordpag['cuentarendicion']);
    }
    if (isset($opordpag['vacio']))
    {
      $this->opordpag->setVacio($opordpag['vacio']);
    }
    if (isset($opordpag['presiono']))
    {
      $this->opordpag->setPresiono($opordpag['presiono']);
    }
    if (isset($opordpag['neto']))
    {
      $this->opordpag->setNeto($opordpag['neto']);
    }
    if (isset($opordpag['totfonter']))
    {
      $this->opordpag->setTotfonter($opordpag['totfonter']);
    }
    if (isset($opordpag['numsigecof']))
    {
      $this->opordpag->setNumsigecof($opordpag['numsigecof']);
    }
    if (isset($opordpag['fecsigecof']))
    {
      if ($opordpag['fecsigecof'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecsigecof']))
          {
            $value = $dateFormat->format($opordpag['fecsigecof'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecsigecof'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecsigecof($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecsigecof(null);
      }
    }
    if (isset($opordpag['expsigecof']))
    {
      $this->opordpag->setExpsigecof($opordpag['expsigecof']);
    }
    if (isset($opordpag['datosnomina']))
    {
      $this->opordpag->setDatosnomina($opordpag['datosnomina']);
    }
    if (isset($opordpag['datosaporte']))
    {
      $this->opordpag->setDatosaporte($opordpag['datosaporte']);
    }
    if (isset($opordpag['codconcepto']))
    {
      $this->opordpag->setCodconcepto($opordpag['codconcepto']);
    }
    if (isset($opordpag['numforpre']))
    {
      $this->opordpag->setNumforpre($opordpag['numforpre']);
    }
    if (isset($opordpag['numcta']))
    {
      $this->opordpag->setNumcta($opordpag['numcta']);
    }
    if (isset($opordpag['tipdoc']))
    {
      $this->opordpag->setTipdoc($opordpag['tipdoc']);
    }
     if (isset($opordpag['amortiza']))
    {
      $this->opordpag->setAmortiza($opordpag['amortiza']);
    }
    if (isset($opordpag['codmon']))
    {
      $this->opordpag->setCodmon($opordpag['codmon']);
    }
    if (isset($opordpag['valmon']))
    {
      $this->opordpag->setValmon($opordpag['valmon']);
    }
    if (isset($opordpag['refcre'])) {
      $this->opordpag->setRefcre($opordpag['refcre']);
    }
    if (isset($opordpag['refsolpag'])) {
      $this->opordpag->setRefsolpag($opordpag['refsolpag']);
    }
    if (isset($opordpag['ordsnc']))
    {
      $this->opordpag->setOrdsnc($opordpag['ordsnc']);
  }
    if (isset($opordpag['codsnc']))
    {
      $this->opordpag->setCodsnc($opordpag['codsnc']);
  }
    if (isset($opordpag['fecini']))
    {
      if ($opordpag['fecini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecini']))
          {
            $value = $dateFormat->format($opordpag['fecini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecini(null);
      }
    }
    if (isset($opordpag['fecfin']))
    {
      if ($opordpag['fecfin'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecfin']))
          {
            $value = $dateFormat->format($opordpag['fecfin'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecfin'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecfin($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecfin(null);
      }
    }
    if (isset($opordpag['medcom']))
    {
      $this->opordpag->setMedcom($opordpag['medcom']);
    }
    if (isset($opordpag['modcon']))
    {
      $this->opordpag->setModcon($opordpag['modcon']);
    }
    if (isset($opordpag['lugeje']))
    {
      $this->opordpag->setLugeje($opordpag['lugeje']);
    }
    if (isset($opordpag['numcon']))
    {
      $this->opordpag->setNumcon($opordpag['numcon']);
    }
    if (isset($opordpag['mescon']))
    {
      $this->opordpag->setMescon($opordpag['mescon']);
    }
    if (isset($opordpag['gencomnom']))
    {
      $this->opordpag->setGencomnom($opordpag['gencomnom']);
    }
    if (isset($opordpag['codtde']))
    {
      $this->opordpag->setCodtde($opordpag['codtde']);
    }
    if (isset($opordpag['codadi']))
    {
      $this->opordpag->setCodadi($opordpag['codadi']);
    }
    if (isset($opordpag['numordamo']))
    {
      $this->opordpag->setNumordamo($opordpag['numordamo']);
    }
    if (isset($opordpag['montoamo']))
    {
      $this->opordpag->setMontoamo($opordpag['montoamo']);
    }
    if (isset($opordpag['restoamo']))
    {
      $this->opordpag->setRestoamo($opordpag['restoamo']);
    }
    if (isset($opordpag['monorddisrgo']))
    {
      $this->opordpag->setMonorddisrgo($opordpag['monorddisrgo']);
    }
    if (isset($opordpag['codrgo']))
    {
      $this->opordpag->setCodrgo($opordpag['codrgo']);
    }
    if (isset($opordpag['nomrgo']))
    {
      $this->opordpag->setNomrgo($opordpag['nomrgo']);
    }
    if (isset($opordpag['monrgo']))
    {
      $this->opordpag->setMonrgo($opordpag['monrgo']);
    }
    if (isset($opordpag['tiepar411']))
    {
      $this->opordpag->setTiepar411($opordpag['tiepar411']);
    }
    if (isset($opordpag['codpro']))
    {
      $this->opordpag->setCodpro($opordpag['codpro']);
    }
    if (isset($opordpag['codprehcm']))
    {
      $this->opordpag->setCodprehcm($opordpag['codprehcm']);
    }
    if (isset($opordpag['referenciashcm']))
    {
      $this->opordpag->setReferenciashcm($opordpag['referenciashcm']);
    }
    if (isset($opordpag['coddirec']))
    {
      $this->opordpag->setCoddirec($opordpag['coddirec']);
    }
    if (isset($opordpag['refava']))
    {
      $this->opordpag->setRefava($opordpag['refava']);
    }
    if (isset($opordpag['fecava']))
    {
      if ($opordpag['fecava'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecava']))
          {
            $value = $dateFormat->format($opordpag['fecava'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecava'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecava($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecava(null);
      }
    }
    if (isset($opordpag['nompacava']))
    {
      $this->opordpag->setNompacava($opordpag['nompacava']);
    }
    if (isset($opordpag['cedpacava']))
    {
      $this->opordpag->setCedpacava($opordpag['cedpacava']);
    }
    if (isset($opordpag['motsolava']))
    {
      $this->opordpag->setMotsolava($opordpag['motsolava']);
    }
    if (isset($opordpag['moncarava']))
    {
      $this->opordpag->setMoncarava($opordpag['moncarava']);
    }
    if (isset($opordpag['numval']))
    {
      $this->opordpag->setNumval($opordpag['numval']);
    }
    if (isset($opordpag['ctaban']))
    {
      $this->opordpag->setCtaban($opordpag['ctaban']);
    }
    if (isset($opordpag['numche']))
    {
      $this->opordpag->setNumche($opordpag['numche']);
    }
    if (isset($opordpag['tipmov']))
    {
      $this->opordpag->setTipmov($opordpag['tipmov']);
    }
  }

  protected function getOpordpagOrCreate($id = 'id')
  {    
    if (!$this->getRequestParameter($id))
    {
      $opordpag = new Opordpag();
      $this->configGrid();
      $this->configGridApliret();
      $ar11=array();
      $ar11[0]=array();
      $ar22=array();
      $ar22[0]=array();
      $ar1=OrdendePago::llenarComboIva($ar11,'','','','');
      $ar2=OrdendePago::llenarComboIslr($ar22,'','');
      $this->configGridFactura('',$ar1,$ar2);
      $this->configGridConsulRet();
      //$this->configGridRetenciones();
      $this->configGridEmpresas();
    }
    else
    {
      $opordpag = OpordpagPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGridConsulta($opordpag->getNumord());
      $this->configGridFactura($opordpag->getNumord());
      $this->configGridConsulRet($opordpag->getNumord());
      $this->configGridApliret();
      //$this->configGridRetenciones();
      $this->configGridEmpresas($opordpag->getNumord());
      $this->forward404Unless($opordpag);
    }

    return $opordpag;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='')
  {
    $c = new Criteria();
    $c->add(OpdetordPeer::NUMORD,$codigo);
    $per = OpdetordPeer::doSelect($c);

    $this->numconsul=count($per);
    $mascaraformato=$this->mascarapresupuesto;
    $lonpre=strlen($this->mascarapresupuesto);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Opdetord');
    $opciones->setAnchoGrid(750);
    $opciones->setAncho(700);
    $nfil=H::getConfApp2('numfilas', 'tesoreria', 'pagemiord');
    if ($nfil!="")
        $opciones->setFilas($nfil);
    else $opciones->setFilas(150);
    $opciones->setTitulo('Imputaciones Presupuestarias');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setNombreCampo('check');
    $col1->setEsGrabable(true);
    $col1->setHTML(' ');
    $col1->setJScript('onClick="totalmarcadas(this.id)"');

    $obj= array('codpre' => 2, 'nompre' => 8);
    $col2 = new Columna('Código Presupuestario');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('codpre');
    $col2->setHTML('type="text" size="25" maxlength="'.chr(39).$lonpre.chr(39).'"');
    $col2->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraformato.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,6);" onBlur="javascript:event.keyCode=13;ajax(event,this.id)" onmouseout="javascript:ocultartex()" onmouseover="mostrartex(this.id)"');
    $col2->setCatalogo('Cpasiini','sf_admin_edit_form',$obj,'Cpasiini_PagemiordNew');

    $col3 = new Columna('Monto a Causar');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('moncau');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="15" maxlength="21"');
    $col3->setJScript('onKeyPress="entermonto(event,this.id); sumardatosgrid2(event);" onBlur="javascript:event.keyCode=13; disponibilidad(event,this.id)"');
    $col3->setEsTotal(true,'opordpag_monord');

    $col4 = clone $col3;
    $col4->setTitulo('Retenciones');
    $col4->setNombreCampo('monret');
    $col4->setHTML('readonly=true');
    $col4->setEsTotal(true,'opordpag_monret');
    $col4->setOculta(true);

    $col5 = clone $col3;
    $col5->setTitulo('Amortización');
    $col5->setNombreCampo('mondes');
    $col5->setJScript('onKeyPress="entermonto(event,this.id); validaAmo(this.id); sumardatosgrid2(event);"');
    $col5->setEsTotal(true,'opordpag_mondes');

    $col6 = new Columna('Aplica Iva');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('retiva');
    $col6->setHTML('type="text" size="10"');
    $col6->setOculta(true);

    $col7 = new Columna('Referencia Compromiso');
    $col7->setTipo(Columna::TEXTO);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('refcom');
    $col7->setHTML('type="text" size="10" readonly=true');
    $col7->setOculta(true);  

    $col8 = new Columna('Nombre Código Pre');
    $col8->setTipo(Columna::TEXTO);
    $col8->setEsGrabable(true);
    $col8->setAlineacionObjeto(Columna::CENTRO);
    $col8->setAlineacionContenido(Columna::CENTRO);
    $col8->setNombreCampo('nompre');
    $col8->setOculta(true); 
    $col8->setHTML('type="text" size="15" maxlength="50"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);

    $this->obj = $opciones->getConfig($per);

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid2($codigo='')
  {
    $c = new Criteria();
    $c->add(OpdetordPeer::NUMORD,$codigo);
    $per = OpdetordPeer::doSelect($c);

    $this->numconsul=count($per);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Opdetord');
    $opciones->setAnchoGrid(750);
    $opciones->setAncho(700);
    $nfil=H::getConfApp2('numfilas', 'tesoreria', 'pagemiord');
    if ($nfil!="")
        $opciones->setFilas($nfil);
    else $opciones->setFilas(150);
    $opciones->setTitulo('Imputaciones Presupuestarias');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('check');
    $col1->setHTML(' ');
    $col1->setJScript('onClick="totalmarcadas(this.id)"');

    $col2 = new Columna('Código Presupuestario');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('codpre');
    $col2->setHTML('type="text" size="25" onmouseout="javascript:ocultartex()" onmouseover="mostrartex(this.id)" readonly=true');

    $col3 = new Columna('Monto a Causar');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('moncau');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="15" readonly=true');
    $col3->setEsTotal(true,'opordpag_monord');

    $col4 = clone $col3;
    $col4->setTitulo('Retenciones');
    $col4->setNombreCampo('monret');
    $col4->setEsTotal(true,'opordpag_monret');
    $col4->setOculta(true);

    $col5 = clone $col3;
    $col5->setTitulo('Amortización');
    $col5->setNombreCampo('mondes');
    $col5->setHTML('type="text" size="15"');
    $col5->setJScript('onKeypress="entermonto(event,this.id); validaAmo(this.id); sumardatosgrid2(event);"');
    $col5->setEsTotal(true,'opordpag_mondes');

    $col6 = new Columna('Aplica Iva');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('retiva');
    $col6->setHTML('type="text" size="25"');
    $col6->setOculta(true);  

    $col7 = new Columna('Referencia Compromiso');
    $col7->setTipo(Columna::TEXTO);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('refcom');
    $col7->setHTML('type="text" size="10" readonly=true');
    $col7->setOculta(true);    

    $col8 = new Columna('Nombre Código Pre');
    $col8->setTipo(Columna::TEXTO);
    $col8->setEsGrabable(true);
    $col8->setAlineacionObjeto(Columna::CENTRO);
    $col8->setAlineacionContenido(Columna::CENTRO);
    $col8->setNombreCampo('nompre');
    $col8->setOculta(true); 
    $col8->setHTML('type="text" size="15" maxlength="50"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);

    $this->obj = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridConsulta($codigo='',$otrotipo='',$arreglo=array())
  {
    if ($otrotipo=='OPNN' || $otrotipo=='APOR' || $otrotipo=='LIQU' || $otrotipo=='OPFD' || $otrotipo=='OPVA')
    { $reg=$arreglo;
    }
    else
    {
      $c = new Criteria();
      $c->add(OpdetordPeer::NUMORD,$codigo);
      $reg = OpdetordPeer::doSelect($c);
    }
    $this->numconsul=count($reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Opdetord');
    $opciones->setAnchoGrid(700);
    $opciones->setAncho(750);
    $opciones->setFilas(0);
    $opciones->setTitulo('Imputaciones Presupuestarias');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('check');
    $col1->setHTML(' ');
    $col1->setOculta(true);

    $col2 = new Columna('Código Presupuestario');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('codpre');
    $col2->setHTML('type="text" size="25" onmouseout="javascript:ocultartex()" onmouseover="mostrartex(this.id)" readonly=true');

    $col3 = new Columna('Monto a Causar');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('moncau');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="10" readonly="true"');
    $col3->setEsTotal(true,'opordpag_monord');

    $col4 = clone $col3;
    $col4->setTitulo('Retenciones');
    $col4->setNombreCampo('monret');
    $col4->setEsTotal(true,'opordpag_monret');
    $col4->setOculta(true);

    $col5 = clone $col3;
    $col5->setTitulo('Amortización');
    $col5->setNombreCampo('mondes');
    $col5->setEsTotal(true,'opordpag_mondes');

    $refecom=H::getX_vacio('NUMORD','Opdetord','Refcom',$codigo);

    $col6 = new Columna('Referencia Compromiso');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('refcom');
    $col6->setHTML('type="text" size="10" readonly=true');
    if ($refecom=='NULO' || $refecom=='') $col6->setOculta(true);   

    $col7 = new Columna('Aplica Iva');
    $col7->setTipo(Columna::TEXTO);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('retiva');
    $col7->setHTML('type="text" size="10"');
    $col7->setOculta(true); 

    $col8 = new Columna('Nombre Código Pre');
    $col8->setTipo(Columna::TEXTO);
    $col8->setEsGrabable(true);
    $col8->setAlineacionObjeto(Columna::CENTRO);
    $col8->setAlineacionContenido(Columna::CENTRO);
    $col8->setNombreCampo('nompre');
    $col8->setOculta(true); 
    $col8->setHTML('type="text" size="15" maxlength="50"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);

    $this->obj = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridFactura($codigo='',$arreglo1=array(),$arreglo2=array(),$arreglo3=array(),$arreglo4=array())
  {
    $sql="SELECT b.fecfac as fecfac, (CASE when b.tiptra='01' THEN b.numfac
  else '' END) as numfac,b.numctr as numctr,(CASE when b.tiptra='02' THEN b.numfac
  else '' END) as notdeb,(CASE when b.tiptra='03' THEN b.numfac
  else '' END) as notcrd,b.tiptra as tiptra,b.facafe as facafe, '' as poriva2,(CASE when b.tiptra='03' THEN b.totfac*-1
  else b.totfac END) as totfac,b.exeiva as exeiva,
  b.basimp as basimp,b.monret as monret,b.moniva as moniva,(CASE when b.basltf!=0 THEN 1
  else 0 END) as unocien,b.basltf as basltf,b.porltf as porltf,b.monltf as monltf,(CASE when b.basislr!=0 THEN 1
  else 0 END) as impusob,b.basislr as basislr,trim(to_char(b.porislr,'99')||'_'||b.codislr) as porislr,b.monislr as monislr,b.codislr as codislr,b.rifalt as rifalt,a.nomben as nomben,(CASE when b.basirs!=0 THEN 1
  else 0 END) as imprs,b.basirs as basirs,b.porirs as porirs,b.monirs as monirs,b.codirs as codirs,b.poriva as poriva,(CASE when b.basimn!=0 THEN 1
  else 0 END) as impmn,b.basimn as basimn,b.porimn as porimn,b.monimn as monimn,b.codimn as codimn,b.fecrecfac as fecrecfac,b.mnosuj as mnosuj,b.mdecre as mdecre,b.monexo as monexo,b.id as id
  from opfactur b left outer join opbenefi a on b.rifalt=a.cedrif where b.numord='".$codigo."'";

    $resp = Herramientas::BuscarDatos($sql,$reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true,'colocarmonto(this.id)');
    $opciones->setTabla('Opfactur');
    $opciones->setAnchoGrid(2800);
    $opciones->setAncho(2800);
    $opciones->setTitulo('Facturas');
    $opciones->setName('b');
    $numfilfac=H::getConfApp2('numfilfac', 'tesoreria', 'pagemiord');
    if ($numfilfac!="") $opciones->setFilas($numfilfac);
    else $opciones->setFilas(150);
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Fecha Factura');
    $col1->setTipo(Columna::FECHA);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('fecfac');
    $col1->setHTML(' ');
    $col1->setVacia(true);

    $col2 = new Columna('Factura Nro.');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('numfac');
    $col2->setHTML('type="text" size="15" maxlength="50"');
    $col2->setJScript('onBlur="javascript:event.keyCode=13; nrofacturadeshabilitar(event,this.id);"');

    $col3 = new Columna('Nro. Control');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('numctr');
    $col3->setHTML('type="text" size="15" maxlength="50"');

    $col4 = new Columna('Nota Débito');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('notdeb');
    $col4->setHTML('type="text" size="15" maxlength="50"');
    $col4->setJScript('onkeyPress="javascript: debitodeshabilitar(event,this.id)"');

    $col5 = new Columna('Nota de Crédito');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('notcrd');
    $col5->setHTML('type="text" size="15" maxlength="50"');
    $col5->setJScript('onkeyPress="javascript: creditodeshabilitar(event,this.id)"');

    $col6 = new Columna('Tipo de Transacción');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(true);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('tiptra');
    $col6->setHTML('type="text" size="4" readonly="true" maxlength="2"');

    $col7 = new Columna('Factura Afectada');
    $col7->setTipo(Columna::TEXTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('facafe');
    $col7->setHTML('type="text" size="15" maxlength="50"');

    $col8 = new Columna('% Alícuota');
   /* if (count($reg)>0) {
        $col8->setTipo(Columna::MONTO);
        $col8->setEsGrabable(true);
        $col8->setAlineacionContenido(Columna::DERECHA);
        $col8->setAlineacionObjeto(Columna::DERECHA);
        $col8->setNombreCampo('poriva2');
        $col8->setEsNumerico(true);
        $col8->setHTML(' size="15" readOnly="true"');
    }
    else {*/
    $col8->setTipo(Columna::COMBO);
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('poriva2');
    $col8->setCombo($arreglo1);
    $col8->setHTML(' ');
    $col8->setJScript('onChange="totalizar2(this.id);"');
    //}

    $col9 = new Columna('Total Factura');
    $col9->setTipo(Columna::MONTO);
    $col9->setEsGrabable(true);
    $col9->setAlineacionContenido(Columna::DERECHA);
    $col9->setAlineacionObjeto(Columna::DERECHA);
    $col9->setNombreCampo('totfac');
    $col9->setHTML('type="text" size="15" maxlength="21"');
    $col9->setEsNumerico(true);
    $col9->setJScript('onKeypress="entermonto_b(event,this.id); totalizar(event,this.id);" onBlur="javascript:event.keyCode=13; validacau(this.id)"');
    //$col9->setEsTotal(true,'totfac');

    $col10 = new Columna('Exento Iva');
    $col10->setTipo(Columna::MONTO);
    $col10->setEsGrabable(true);
    $col10->setAlineacionContenido(Columna::DERECHA);
    $col10->setAlineacionObjeto(Columna::DERECHA);
    $col10->setNombreCampo('exeiva');
    $col10->setHTML('type="text" size="15" maxlength="21"');
    $col10->setEsNumerico(true);
    $col10->setJScript('onKeypress="entermonto_b(event,this.id); totalizar(event,this.id);"');
    //$col10->setEsTotal(true,'totexen');

    $col11 = new Columna('Base Imponible');
    $col11->setTipo(Columna::MONTO);
    $col11->setEsGrabable(true);
    $col11->setAlineacionContenido(Columna::DERECHA);
    $col11->setAlineacionObjeto(Columna::DERECHA);
    $col11->setNombreCampo('basimp');
    $col11->setEsNumerico(true);
    $col11->setJScript('onKeypress="entermonto_b(event,this.id); totalizar(event,this.id);"');
    $col11->setHTML('size="15"');
    //$col11->setEsTotal(true,'totbas');

    $col12 = new Columna('Impuesto');
    $col12->setTipo(Columna::MONTO);
    $col12->setEsGrabable(true);
    $col12->setAlineacionContenido(Columna::DERECHA);
    $col12->setAlineacionObjeto(Columna::DERECHA);
    $col12->setNombreCampo('moniva');
    $col12->setEsNumerico(true);
    $col12->setJScript('onKeypress="entermonto_b(event,this.id); actualizarTotfac();"');
    $col12->setHTML('size="15"');
    //$col12->setEsTotal(true,'totimp');

    $col13 = new Columna('IVA Retenido');
    $col13->setTipo(Columna::MONTO);
    $col13->setEsGrabable(true);
    $col13->setAlineacionContenido(Columna::DERECHA);
    $col13->setAlineacionObjeto(Columna::DERECHA);
    $col13->setNombreCampo('monret');
    $col13->setEsNumerico(true);
    $col13->setJScript('onKeypress="entermonto_b(event,this.id); actualizarTotfac();"');
    $col13->setHTML(' size="15"');
    //$col13->setEsTotal(true,'totiva');

    $col14 = new Columna('1x100');
    $col14->setTipo(Columna::CHECK);
    $col14->setNombreCampo('unocien');
    $col14->setEsGrabable(true);
    $col14->setHTML(' ');
    $col14->setJScript('onClick="unoxmil(this.id); actualizarTotfac();"');

    $col15 = new Columna('Base Imponible 1xMil');
    $col15->setTipo(Columna::MONTO);
    $col15->setEsGrabable(true);
    $col15->setAlineacionContenido(Columna::DERECHA);
    $col15->setAlineacionObjeto(Columna::DERECHA);
    $col15->setNombreCampo('basltf');
    $col15->setEsNumerico(true);
    $col15->setJScript(' onblur="javascript:recalunoxmil(this.id); actualizarTotfac();"');
    $col15->setHTML('size="15"');
    //$col15->setEsTotal(true,'totbasmil');

    $col16 = new Columna('% 1xMil');
    $col16->setTipo(Columna::MONTO);
    $col16->setEsGrabable(true);
    $col16->setAlineacionContenido(Columna::DERECHA);
    $col16->setAlineacionObjeto(Columna::DERECHA);
    $col16->setNombreCampo('porltf');
    $col16->setEsNumerico(true);
    $col16->setJScript(' ');
    $col16->setHTML('readonly="true"');

    $col17 = new Columna('Monto 1xMil');
    $col17->setTipo(Columna::MONTO);
    $col17->setEsGrabable(true);
    $col17->setAlineacionContenido(Columna::DERECHA);
    $col17->setAlineacionObjeto(Columna::DERECHA);
    $col17->setNombreCampo('monltf');
    $col17->setEsNumerico(true);
    $col17->setJScript('onKeypress="entermonto_b(event,this.id);"');
    $col17->setHTML('size="15"');
    //$col17->setEsTotal(true,'totmontmil');

    $col18 = new Columna('I.S.L.R');
    $col18->setTipo(Columna::CHECK);
    $col18->setNombreCampo('impusob');
    $col18->setEsGrabable(true);
    $col18->setHTML(' ');
    $col18->setJScript('onClick="islr(this.id); actualizarTotfac();"');

    $col19 = new Columna('Base Imponible I.S.L.R');
    $col19->setTipo(Columna::MONTO);
    $col19->setEsGrabable(true);
    $col19->setAlineacionContenido(Columna::DERECHA);
    $col19->setAlineacionObjeto(Columna::DERECHA);
    $col19->setNombreCampo('basislr');
    $col19->setEsNumerico(true);
    $col19->setJScript(' onblur="javascript:recalislr(this.id); actualizarTotfac();"');
    $col19->setHTML('size="15"');
    //$col19->setEsTotal(true,'totbasislr');

    $col20 = new Columna('% I.S.L.R');
    $col20->setTipo(Columna::COMBO);
    $col20->setEsGrabable(true);
    $col20->setNombreCampo('porislr');
    $col20->setCombo($arreglo2);
    $col20->setJScript('onChange="encontrarISLRC("ISLR",this.id);"');
    $col20->setHTML(' ');

    $col21 = new Columna('Monto I.S.L.R');
    $col21->setTipo(Columna::MONTO);
    $col21->setEsGrabable(true);
    $col21->setAlineacionContenido(Columna::DERECHA);
    $col21->setAlineacionObjeto(Columna::DERECHA);
    $col21->setNombreCampo('monislr');
    $col21->setEsNumerico(true);
    $col21->setJScript('onKeypress="entermonto_b(event,this.id);"');
    $col21->setHTML('size="15"');
    //$col21->setEsTotal(true,'totmontislr');

    $col22 = new Columna('islr');
    $col22->setTipo(Columna::TEXTO);
    $col22->setEsGrabable(true);
    $col22->setAlineacionObjeto(Columna::CENTRO);
    $col22->setAlineacionContenido(Columna::CENTRO);
    $col22->setNombreCampo('codislr');
    $col22->setHTML('type="text" size="15"');
    $col22->setOculta(true);

    $col23 = new Columna('C.I / R.I.F');
    $col23->setTipo(Columna::TEXTO);
    $col23->setAlineacionObjeto(Columna::CENTRO);
    $col23->setAlineacionContenido(Columna::CENTRO);
    $col23->setEsGrabable(true);
    $col23->setNombreCampo('rifalt');
    $objos= array('cedrif' => 23,'nomben' => 24);
    $col23->setCatalogo('opbenefi','sf_admin_edit_form', $objos,'Opbenefi_Pagemiord');
    $col23->setHTML('type="text" size="15" maxlength="15"');
    $col23->setAjax('pagemiord',24,24);

    $col24 = new Columna('Descripción');
    $col24->setTipo(Columna::TEXTO);
    $col24->setAlineacionObjeto(Columna::IZQUIERDA);
    $col24->setAlineacionContenido(Columna::IZQUIERDA);
    $col24->setNombreCampo('nomben');
    $col24->setHTML('type="text" size="20" readonly="true"');

    $col25 = new Columna('I.R.S');
    $col25->setTipo(Columna::CHECK);
    $col25->setNombreCampo('imprs');
    $col25->setEsGrabable(true);
    $col25->setHTML(' ');
    $col25->setJScript('onClick="irs(this.id); actualizarTotfac();"');

    $col26 = new Columna('Base Imponible I.R.S');
    $col26->setTipo(Columna::MONTO);
    $col26->setEsGrabable(true);
    $col26->setAlineacionContenido(Columna::DERECHA);
    $col26->setAlineacionObjeto(Columna::DERECHA);
    $col26->setNombreCampo('basirs');
    $col26->setEsNumerico(true);
    $col26->setJScript(' onblur="javascript:recalirs(this.id); actualizarTotfac();"');
    $col26->setHTML('size="15"');
    //$col26->setEsTotal(true,'totbasirs');

    $col27 = new Columna('% I.R.S');
    $col27->setTipo(Columna::COMBO);
    $col27->setEsGrabable(true);
    $col27->setNombreCampo('porirs');
    $col27->setCombo($arreglo3);
    $col27->setHTML(' ');

    $col28 = new Columna('Monto I.R.S');
    $col28->setTipo(Columna::MONTO);
    $col28->setEsGrabable(true);
    $col28->setAlineacionContenido(Columna::DERECHA);
    $col28->setAlineacionObjeto(Columna::DERECHA);
    $col28->setNombreCampo('monirs');
    $col28->setEsNumerico(true);
    $col28->setJScript('onKeypress="entermonto_b(event,this.id);"');
    $col28->setHTML('size="15"');
    //$col28->setEsTotal(true,'totmontirs');

    $col29 = new Columna('irs');
    $col29->setTipo(Columna::TEXTO);
    $col29->setEsGrabable(true);
    $col29->setAlineacionObjeto(Columna::CENTRO);
    $col29->setAlineacionContenido(Columna::CENTRO);
    $col29->setNombreCampo('codirs');
    $col29->setHTML('type="text" size="15"');
    $col29->setOculta(true);

    $col30 = new Columna('Porcentaje de Iva');
    $col30->setTipo(Columna::MONTO);
    $col30->setEsGrabable(true);
    $col30->setAlineacionContenido(Columna::DERECHA);
    $col30->setAlineacionObjeto(Columna::DERECHA);
    $col30->setNombreCampo('poriva');
    $col30->setEsNumerico(true);
    if (count($reg)==0) $col30->setOculta(true);
    $col30->setHTML(' size="15" readOnly="true"');

    $col31 = new Columna('I.Municipal');
    $col31->setTipo(Columna::CHECK);
    $col31->setNombreCampo('impmn');
    $col31->setEsGrabable(true);
    $col31->setHTML(' ');
    $col31->setJScript('onClick="imn(this.id); actualizarTotfac();"');    
    
    $col32 = new Columna('Base Imponible I.Municipal');
    $col32->setTipo(Columna::MONTO);
    $col32->setEsGrabable(true);
    $col32->setAlineacionContenido(Columna::DERECHA);
    $col32->setAlineacionObjeto(Columna::DERECHA);
    $col32->setNombreCampo('basimn');
    $col32->setEsNumerico(true);
    $col32->setJScript(' onblur="javascript:recalimn(this.id); actualizarTotfac();"');
    $col32->setHTML('size="15"');
    $col32->setEsTotal(true,'totbasimn');

    $col33 = new Columna('% I.Municipal');
    $col33->setTipo(Columna::COMBO);
    $col33->setEsGrabable(true);
    $col33->setNombreCampo('porimn');
    $col33->setCombo($arreglo4);
    $col33->setHTML(' ');

    $col34 = new Columna('Monto I.Municipal');
    $col34->setTipo(Columna::MONTO);
    $col34->setEsGrabable(true);
    $col34->setAlineacionContenido(Columna::DERECHA);
    $col34->setAlineacionObjeto(Columna::DERECHA);
    $col34->setNombreCampo('monimn');
    $col34->setEsNumerico(true);
    $col34->setJScript('onKeypress="entermonto_b(event,this.id);"');
    $col34->setHTML('size="15"');
    $col34->setEsTotal(true,'totmontimn');

    $col35 = new Columna('I.Municipal');
    $col35->setTipo(Columna::TEXTO);
    $col35->setEsGrabable(true);
    $col35->setAlineacionObjeto(Columna::CENTRO);
    $col35->setAlineacionContenido(Columna::CENTRO);
    $col35->setNombreCampo('codimn');
    $col35->setHTML('type="text" size="15"');
    $col35->setOculta(true);   

    $col36 = new Columna('Fecha de Recepción');
    $col36->setTipo(Columna::FECHA);
    $col36->setAlineacionObjeto(Columna::CENTRO);
    $col36->setAlineacionContenido(Columna::CENTRO);
    $col36->setEsGrabable(true);
    $col36->setNombreCampo('fecrecfac');
    $col36->setHTML(' ');
    $col36->setVacia(true); 

    $col37 = new Columna('Monto No Sujeto');
    $col37->setTipo(Columna::MONTO);
    $col37->setEsGrabable(true);
    $col37->setAlineacionContenido(Columna::DERECHA);
    $col37->setAlineacionObjeto(Columna::DERECHA);
    $col37->setNombreCampo('mnosuj');
    $col37->setEsNumerico(true);
    $col37->setJScript('onKeypress="entermonto_b(event,this.id);"');
    $col37->setHTML(' size="15"');

    $col38 = new Columna('Monto Sin Derecho a Crédito');
    $col38->setTipo(Columna::MONTO);
    $col38->setEsGrabable(true);
    $col38->setAlineacionContenido(Columna::DERECHA);
    $col38->setAlineacionObjeto(Columna::DERECHA);
    $col38->setNombreCampo('mdecre');
    $col38->setEsNumerico(true);
    $col38->setJScript('onKeypress="entermonto_b(event,this.id);"');
    $col38->setHTML(' size="15"');

    $col39 = new Columna('Monto Exonerado');
    $col39->setTipo(Columna::MONTO);
    $col39->setEsGrabable(true);
    $col39->setAlineacionContenido(Columna::DERECHA);
    $col39->setAlineacionObjeto(Columna::DERECHA);
    $col39->setNombreCampo('monexo');
    $col39->setEsNumerico(true);
    $col39->setJScript('onKeypress="entermonto_b(event,this.id);"');
    $col39->setHTML(' size="15"');    

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
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);
    $opciones->addColumna($col18);
    $opciones->addColumna($col19);
    $opciones->addColumna($col20);
    $opciones->addColumna($col21);
    $opciones->addColumna($col22);
    $opciones->addColumna($col23);
    $opciones->addColumna($col24);
    $opciones->addColumna($col25);
    $opciones->addColumna($col26);
    $opciones->addColumna($col27);
    $opciones->addColumna($col28);
    $opciones->addColumna($col29);
    $opciones->addColumna($col30);
    $opciones->addColumna($col31);
    $opciones->addColumna($col32);
    $opciones->addColumna($col33);
    $opciones->addColumna($col34);
    $opciones->addColumna($col35);
    $opciones->addColumna($col36);
    $opciones->addColumna($col37);
    $opciones->addColumna($col38);
    $opciones->addColumna($col39);

    $this->obj2 = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRefere($codigo='')
  {
    $c = new Criteria();
    $c->add(CpimpprcPeer::REFPRC,$codigo);
    $reg = CpimpprcPeer::doSelect($c);

    $this->numfila=count($reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Cpimpprc');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setFilas(0);
    $opciones->setTitulo('Imputaciones Presupuestarias');
    $opciones->setName('c');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Código Presupuestario');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codpre');
    $col1->setHTML('type="text" size="25" readonly=true');

    $col2 = new Columna('Monto a Causar');
    $col2->setTipo(Columna::MONTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionContenido(Columna::DERECHA);
    $col2->setAlineacionObjeto(Columna::DERECHA);
    $col2->setNombreCampo('monimpaju');
    $col2->setEsNumerico(true);
    $col2->setJScript('onKeypress="entermonto_c(event,this.id)"');
    $col2->setHTML('type="text" size="15" readonly=true');

    $col3 = clone $col2;
    $col3->setTitulo('Incremento');
    $col3->setNombreCampo('moncau');

    $col4 = clone $col2;
    $col4->setTitulo('Monto Causado');
    $col4->setNombreCampo('moncau');

    $col5 = clone $col2;
    $col5->setTitulo('Monto por Causar');
    $col5->setNombreCampo('montrue');
    $q= new Criteria();
    $regi= OpdefempPeer::doSelectOne($q);
    if ($regi)
    {
      $cautot=$regi->getOrdcomptot();
    }else $cautot="";
    if ($cautot=='S')
    {$col5->setHTML('type="text" size="15" maxlength="21" readonly=true');}
    else { $col5->setHTML('type="text" size="15" maxlength="21"'); }
    $col5->setJScript('onKeypress="entermonto_c(event,this.id); calculo(event,this.id);"');
    $col5->setEsTotal(true,'totalcau');

    $col6 = clone $col2;
    $col6->setTitulo('Monto ajuste');
    $col6->setNombreCampo('montrue');
    $col6->setEsTotal(true,'total');
    $col6->setOculta(true);

    $col7 = clone $col1;
    $col7->setTitulo('Aplica Iva');
    $col7->setNombreCampo('retiva');
    $col7->setOculta(true);

    $col8 = clone $col2;
    $col8->setTitulo('Monto Retencion');
    $col8->setNombreCampo('monret');
    $col8->setOculta(true);

    $col9 = new Columna('Moneda');
    $col9->setTipo(Columna::MONTO);
    $col9->setAlineacionContenido(Columna::DERECHA);
    $col9->setAlineacionObjeto(Columna::DERECHA);
    $col9->setNombreCampo('valmone');
    $col9->setEsNumerico(true);
    $col9->setOculta(true);
    $col9->setHTML('type="text" size="15" readonly=true');

    $col10 = new Columna('Nombre Código Pre');
    $col10->setTipo(Columna::TEXTO);
    $col10->setEsGrabable(true);
    $col10->setAlineacionObjeto(Columna::CENTRO);
    $col10->setAlineacionContenido(Columna::CENTRO);
    $col10->setNombreCampo('nompre');
    $col10->setOculta(true); 
    $col10->setHTML('type="text" size="15" maxlength="50"');

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

    $this->obj4 = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRefere2($codigo='', $arreglo=array())
  {    
    if (count($arreglo)>0)
    {
      $i=0;
      while ($i<count($arreglo))
      {
          $cpimpcom = new Cpimpcom();
          $cpimpcom->setCodpre($arreglo[$i]["codpre"]);
          $cpimpcom->setComprometido($arreglo[$i]["comprometido"]);
          $cpimpcom->setMoncau($arreglo[$i]["moncau"]);
          $cpimpcom->setAcausar($arreglo[$i]["acausar"]);
          $cpimpcom->setRetiva($arreglo[$i]["retiva"]);
          $cpimpcom->setMonret($arreglo[$i]["monret"]);
          $cpimpcom->setNompre(H::getX_vacio('CODPRE','Cpdeftit','Nompre',$arreglo[$i]["codpre"]));
          $reg[]= $cpimpcom;
          $i++;
      }
    }else {
    $c = new Criteria();
    $c->add(CpimpcomPeer::REFCOM,$codigo);
    $reg = CpimpcomPeer::doSelect($c);
    }

    $this->numfila=count($reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Cpimpcom');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setFilas(0);
    $opciones->setTitulo('Imputaciones Presupuestarias');
    $opciones->setName('c');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Código Presupuestario');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codpre');
    $col1->setHTML('type="text" size="25" readonly=true');

    $col2 = new Columna('Comprometido');
    $col2->setTipo(Columna::MONTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionContenido(Columna::DERECHA);
    $col2->setAlineacionObjeto(Columna::DERECHA);
    $col2->setNombreCampo('comprometido');
    $col2->setEsNumerico(true);
    $col2->setHTML('type="text" size="15" readonly=true');
    $col2->setEsTotal(true,'totalcomprometido');

    $col3 = clone $col2;
    $col3->setTitulo('Incremento');
    $col3->setNombreCampo('moncau');
    $col3->setOculta(true);

    $col4 = clone $col2;
    $col4->setTitulo('Monto Causado');
    $col4->setNombreCampo('moncau');

    $col5 = clone $col2;
    $col5->setTitulo('Monto por Causar');
    $col5->setNombreCampo('acausar');
    $q= new Criteria();
    $regi= OpdefempPeer::doSelectOne($q);
    if ($regi)
    {
      $cautot=$regi->getOrdcomptot();
    }else $cautot="";
    
    if (count($arreglo)>0) $cautot="S";
    
    if ($cautot=='S')
    {$col5->setHTML('type="text" size="15" maxlength="21" readonly=true');}
    else { $col5->setHTML('type="text" size="15" maxlength="21" onKeypress=" entermonto_c(event,this.id); calculoCompro(event,this.id);"'); }
    //$col5->setJScript('onKeypress=" entermonto_c(event,this.id); calculo(event,this.id);"');
    $col5->setEsTotal(true,'totalcau');

    $col6 = clone $col2;
    $col6->setTitulo('Monto ajuste');
    $col6->setNombreCampo('acausar');
    $col6->setEsTotal(true,'total');
    //$col6->setOculta(true);

    $col7 = clone $col1;
    $col7->setTitulo('Aplica Iva');
    $col7->setNombreCampo('retiva');
    $col7->setOculta(true);

    $col8 = clone $col2;
    $col8->setTitulo('Monto Retencion');
    $col8->setNombreCampo('monret');
    $col8->setOculta(true);
    
    $col9 = new Columna('Moneda');
    $col9->setTipo(Columna::MONTO);
    $col9->setAlineacionContenido(Columna::DERECHA);
    $col9->setAlineacionObjeto(Columna::DERECHA);
    $col9->setNombreCampo('valmone');
    $col9->setEsNumerico(true);
    $col9->setOculta(true);
    $col9->setHTML('type="text" size="15" readonly=true');

    $col10 = new Columna('Nombre Código Pre');
    $col10->setTipo(Columna::TEXTO);
    $col10->setEsGrabable(true);
    $col10->setAlineacionObjeto(Columna::CENTRO);
    $col10->setAlineacionContenido(Columna::CENTRO);
    $col10->setNombreCampo('nompre');
    $col10->setOculta(true); 
    $col10->setHTML('type="text" size="15" maxlength="50"');

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

    $this->obj4 = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridConsulRet($codigo='')
  {
    $SQL1 = "select (CASE when a.numret!='NOASIGNA' THEN a.numret
else '' END) as numret,a.codtip,b.destip,b.basimp,b.porret,b.factor,b.porsus,b.unitri,
(CASE when d.codret=a.codtip THEN 'S'
else 'N' END) as esta,
(CASE when c.codret=a.codtip and c.codrep='002' THEN 'S'
else 'N' END) as estaislr,
(CASE when c.codret=a.codtip and c.codrep='003' THEN 'S'
else 'N' END) as esta1xmil,
round((sum(a.monret)/f.valmon),2 ) as montoret, round((sum(a.monbas)/f.valmon),2 ) as monbas, (CASE when c.codret=a.codtip and c.codrep='005' THEN 'S'
else 'N' END) as estairs,(CASE when c.codret=a.codtip and c.codrep='004' THEN 'S'
else 'N' END) as estaimn, 1 as id, count(d.codret) as valor
 from  optipret b, opordpag f, (select distinct(codret) from tsretiva) d RIGHT outer join (opretord a left outer join tsrepret c on c.codret = a.codtip) on d.codret=a.codtip
 where a.numord = '".$codigo."'
 and a.codtip = b.codtip
 and a.numord = f.numord
group by numret,a.codtip,b.destip,b.basimp,b.porret,b.factor,b.porsus,b.unitri,c.codrep,c.codret,d.codret, f.valmon";
    
 //print $SQL1;
    $resp = Herramientas::BuscarDatos($SQL1,$reg);

    $this->numretencion=count($reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Opretord');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setFilas(0);
    $opciones->setTitulo('Retenciones');
    $opciones->setName('d');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Num. Retención');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('numret');
    $col1->setHTML('type="text" size="10" readonly="true"');

    $col2 = clone $col1;
    $col2->setTitulo('Tipo');
    $col2->setNombreCampo('codtip');
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setHTML('type="text" size="10" readonly="true"');

    $col3 = clone $col1;
    $col3->setTitulo('Descripción');
    $col3->setNombreCampo('destip');
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setHTML('type="text" size="40" readonly="true"');

    $col4 = new Columna('Base');
    $col4->setTipo(Columna::MONTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setNombreCampo('basimp');
    $col4->setEsNumerico(true);
    $col4->setOculta(true);

    $col5 = clone $col4;
    $col5->setTitulo('Porcentaje');
    $col5->setNombreCampo('porret');

    $col6 = clone $col4;
    $col6->setTitulo('Factor');
    $col6->setNombreCampo('factor');

    $col7 = clone $col4;
    $col7->setTitulo('% sustraendo');
    $col7->setNombreCampo('porsus');

    $col8 = clone $col4;
    $col8->setTitulo('unidad');
    $col8->setNombreCampo('unitri');

    $col9 = clone $col1;
    $col9->setTitulo('Esta');
    $col9->setNombreCampo('esta');
    $col9->setOculta(true);

    $col10 = clone $col1;
    $col10->setTitulo('EstaISLR');
    $col10->setNombreCampo('estaislr');
    $col10->setOculta(true);

    $col11 = clone $col1;
    $col11->setTitulo('Esta1xmil');
    $col11->setNombreCampo('esta1xmil');
    $col11->setOculta(true);

    $col12= new Columna('Monto');
    $col12->setTipo(Columna::MONTO);
    $col12->setEsGrabable(true);
    $col12->setAlineacionContenido(Columna::DERECHA);
    $col12->setAlineacionObjeto(Columna::DERECHA);
    $col12->setNombreCampo('montoret');
    $col12->setEsNumerico(true);
    $col12->setHTML('type="text" size="15" readonly="true"');
    $col12->setEsTotal(true,'total');

    $col13 = clone $col1;
    $col13->setTitulo('EstaIRS');
    $col13->setNombreCampo('estairs');
    $col13->setOculta(true);

    $col14 = clone $col1;
    $col14->setTitulo('EstaIMN');
    $col14->setNombreCampo('estaimn');
    $col14->setOculta(true);    

    $col15= new Columna('Base Imponible');
    $col15->setTipo(Columna::MONTO);
    $col15->setEsGrabable(true);
    $col15->setAlineacionContenido(Columna::DERECHA);
    $col15->setAlineacionObjeto(Columna::DERECHA);
    $col15->setNombreCampo('monbas');
    $col15->setEsNumerico(true);
    $col15->setHTML('type="text" size="15" readonly="true"');
    $col15->setOculta(true);  

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
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);

    $this->obj3 = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridApliRet($arreglo=array())
  {
    $reg = $arreglo;
    $this->numret=count($reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Optipret');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setTitulo('Datos de las Retenciones');
    $numfilret=H::getConfApp2('numfilret', 'tesoreria', 'pagemiord');
    if ($numfilret!="") $opciones->setFilas($numfilret);
    else $opciones->setFilas(35);
    $opciones->setName('e');
    $opciones->setHTMLTotalFilas(' ');

    $params= array('param1' => "'+$('opordpag_cedrif').value+'", 'val2');

    $col1 = new Columna('Tipo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('codtip');
    $objs= array('codtip' => 1,'destip' => 2,'codcon' => 3,'basimp' => 4, 'porret' => 5,'factor' => 6,'porsus' => 7,'unitri' => 8,'esta' => 9,'estaislr' => 12,'esta1xmil' => 13,'montoiva' => 14);
    $col1->setCatalogo('Optipret','sf_admin_edit_form', $objs,'Optipret_Pagemiret',$params);
    $col1->setHTML('type="text" size="10" maxlength="3"');
    $col1->setJScript('onKeypress="perderfocus(event,this.id,14);" onBlur="javascript:event.keyCode=13; ajaxretenciones(event,this.id);"');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('destip');
    $col2->setHTML('type="text" size="20" readonly="true"');

    $col3 = new Columna('Contable');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codcon');
    $col3->setOculta(true);

    $col4 = new Columna('Base');
    $col4->setTipo(Columna::MONTO);
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setNombreCampo('basimp');
    $col4->setEsNumerico(true);
    $col4->setOculta(true);

    $col5 = clone $col4;
    $col5->setTitulo('Porcentaje');
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('porret');

    $col6 = clone $col4;
    $col6->setTitulo('Factor');
    $col6->setNombreCampo('factor');

    $col7 = clone $col4;
    $col7->setTitulo('% sustraendo');
    $col7->setNombreCampo('porsus');

    $col8 = clone $col4;
    $col8->setTitulo('unidad');
    $col8->setNombreCampo('unitri');

    $col9 = clone $col3;
    $col9->setTitulo('Esta');
    $col9->setNombreCampo('esta');

    $col10 = new Columna('Base para el calculo');
    $col10->setTipo(Columna::MONTO);
    $col10->setEsGrabable(true);
    $col10->setAlineacionContenido(Columna::DERECHA);
    $col10->setAlineacionObjeto(Columna::DERECHA);
    $col10->setNombreCampo('base');
    $col10->setEsNumerico(true);
    $col10->setHTML('type="text" size="15" maxlength="21"');
    //$col10->setJScript('onKeypress="entermonto_e(event,this.id);modifico(event); cambioBase(this.id);"');
    $col10->setJScript('onKeypress="entermonto_e(event,this.id);" onBlur="javascript:event.keyCode=13; modifico(event); cambioBase(this.id);"');

    $col11 = clone $col10;
    $col11->setTitulo('Monto Retencion');
    $col11->setNombreCampo('montorete');
    //$col11->setJScript('onKeypress="entermonto_e(event,this.id);modificar(event);"');
    $col11->setJScript('onKeypress="entermonto_e(event,this.id);" onBlur="javascript:event.keyCode=13; modificar(event);"');
    $col11->setEsTotal(true,'totalmontorete');

    $col12 = clone $col3;
    $col12->setTitulo('EstaISLR');
    $col12->setNombreCampo('estaislr');

    $col13 = clone $col3;
    $col13->setTitulo('Esta1xmil');
    $col13->setNombreCampo('esta1xmil');

    $col14 = clone $col4;
    $col14->setTitulo('Montoiva');
    $col14->setNombreCampo('montoiva');

    $col15 = clone $col3;
    $col15->setTitulo('EstaIRS');
    $col15->setNombreCampo('estairs');

    $col16 = clone $col4;
    $col16->setTitulo('Monto Base Minimo');
    $col16->setNombreCampo('monbasmin');

    $col17 = clone $col3;
    $col17->setTitulo('EstaIMN');
    $col17->setNombreCampo('estaimn');    
    
    $col18 = clone $col4;
    $col18->setTitulo('Monto Base Máximo');
    $col18->setNombreCampo('monbasmax');
    
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
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);
    $opciones->addColumna($col18);

    $this->obj5 = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRetenciones($arreglo1=array())
  {
    $per=$arreglo1;

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('opretord');
    $opciones->setAnchoGrid(900);
    $opciones->setTitulo(' ');
    /*$numfilret=H::getConfApp2('numfilret', 'tesoreria', 'pagemiord');
    if ($numfilret!="") $opciones->setFilas($numfilret);
    else */$opciones->setFilas(300);
    $opciones->setName('f');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Codigo Presupuestario');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('codpre');
    $col1->setHTML('type="text" size="25"');

    $col2 = clone $col1;
    $col2->setTitulo('Tipo de Retencion');
    $col2->setNombreCampo('codtip');

    $col3 = new Columna('Monto Retencion');
    $col3->setTipo(Columna::MONTO);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('monret');
    $col3->setEsNumerico(true);

    $col4 = clone $col1;
    $col4->setTitulo('Referencia');
    $col4->setNombreCampo('refere');

    $col5 = clone $col1;
    $col5->setTitulo('unomil');
    $col5->setNombreCampo('estaunomil');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);

    $this->obj6 = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridEmpresas($numord='')
  {
    $c= new Criteria();
    $c->add(OpordempPeer::NUMORD,$numord);
    $reg= OpordempPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Opordemp');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setTitulo('Empresas Participantes');
    $opciones->setFilas(20);
    $opciones->setName('h');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('C.I/R.I:F');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('cedrif');
    $objs= array('cedrif' => 1,'nomben' => 2);
    $col1->setCatalogo('Opbenefi','sf_admin_edit_form', $objs,'Opbenefi_Pagemiord');
    $col1->setHTML('type="text" size="10" maxlength="16"');
    $col1->setAjax('pagemiord',29,2);

    $col2 = new Columna('Nombre');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomben');
    $col2->setHTML('type="text" size="20" readonly="true"');

    $col3 = new Columna('Monto Total Cotizado');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('montot');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="15" maxlength="21"');
    $col3->setJScript('onKeypress="entermonto_h(event,this.id);"');
    
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    $this->obj7 = $opciones->getConfig($reg);
  }  

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridHCM($rifcli='', $fecdes='', $fechas='')
  {
    $l= new Criteria();
    $l->add(HcregconhcmPeer::RIFPRO,$rifcli);
    if ($fecdes!='') {
      $this->sql="hcregconhcm.feccon>='".$fecdes."' and hcregconhcm.feccon<='".$fechas."' and hcregconhcm.genop=true and (hcregconhcm.statop is null or hcregconhcm.statop='N')";
      $l->add(HcregconhcmPeer::FECCON,$this->sql,Criteria::CUSTOM); 
    }
    $regl= HcregconhcmPeer::doSelect($l);

    $this->numfila=count($regl);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Hcregconhcm');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setTitulo('Consumos HCM');
    $opciones->setFilas(0);
    $opciones->setName('m');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('check');
    $col1->setHTML(' ');

    $col2 = new Columna('Titular');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('cedemp');
    $col2->setHTML('type="text" size="10" readonly="true"');

    $col3 = new Columna('Nombre');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('nomemp');
    $col3->setHTML('type="text" size="20" readonly="true"');

    $col4 = new Columna('Beneficiario');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('cedfam');
    $col4->setHTML('type="text" size="10" readonly="true"');

    $col5 = new Columna('Nombre');
    $col5->setTipo(Columna::TEXTO);
    $col5->setAlineacionObjeto(Columna::IZQUIERDA);
    $col5->setAlineacionContenido(Columna::IZQUIERDA);
    $col5->setNombreCampo('nomfam');
    $col5->setHTML('type="text" size="20" readonly="true"');  

    $col6 = new Columna('Fecha');
    $col6->setTipo(Columna::FECHA);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('feccon');
    $col6->setVacia(true);
    $col6->setHTML('readonly="true"');

    $col7 = new Columna('Monto');
    $col7->setTipo(Columna::MONTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionContenido(Columna::DERECHA);
    $col7->setAlineacionObjeto(Columna::DERECHA);
    $col7->setNombreCampo('moncon');
    $col7->setEsNumerico(true);
    $col7->setHTML('type="text" size="15" maxlength="21"');

    $col8 = new Columna('ID Consumo');
    $col8->setTipo(Columna::TEXTO);
    $col8->setAlineacionObjeto(Columna::CENTRO);
    $col8->setAlineacionContenido(Columna::CENTRO);
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('id');
    $col8->setOculta(true);
    $col8->setHTML('type="text" size="10" readonly="true"');
    
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);

    $this->obj8 = $opciones->getConfig($regl);
  }  

     /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridAportes()
  {
    $reg=array();
    /*$sql="SELECT DISTINCT B.NOMCON as descon,A.CODCON as codcon, A.FECNOM as fecnom,A.CODTIPGAS AS codtipgas, A.CODNOM AS codnom,  
    A.ESPECIAL as especial, A.CODNOMESP as codnomesp,  9 as id, 0 as check  FROM NPCIENOM A, NPDEFCPT B
           Where A.CODCON = B.CODCON AND A.ASIDED='P'";*/
      $sql="SELECT B.NOMCON as descon,A.CODCON as codcon, A.FECNOM as fecnom,A.CODTIPGAS AS codtipgas, A.CODNOM AS codnom,  
    A.ESPECIAL as especial, A.CODNOMESP as codnomesp, sum(A. MONTO) as monto,  9 as id, 0 as check  FROM NPCIENOM A, NPDEFCPT B
           Where A.CODCON = B.CODCON AND A.ASIDED='P' GROUP BY B.NOMCON, A.CODCON, A.FECNOM, A.CODTIPGAS, A.CODNOM, A.ESPECIAL, A.CODNOMESP";
    H::BuscarDatos($sql,$reg);

    $this->numfilapo=count($reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Npcienom');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(750);
    $opciones->setTitulo('Aportes');
    $opciones->setFilas(0);
    $opciones->setName('q');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('check');
    $col1->setHTML(' ');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('descon');
    $col2->setHTML('type="text" size="30" readonly="true"');

    $col3 = new Columna('Concepto');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('codcon');
    $col3->setHTML('type="text" size="5" readonly="true"');

    $col4 = new Columna('Tipo de Gasto');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('codtipgas');
    $col4->setHTML('type="text" size="5" readonly="true"');

    $col5 = new Columna('Fecha');
    $col5->setTipo(Columna::FECHA);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('fecnom');
    $col5->setHTML('readonly="true"');

    $col6 = new Columna('Nómina');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('codnom');
    $col6->setHTML('type="text" size="5" readonly="true"');   

    $col7 = new Columna('Especial');
    $col7->setTipo(Columna::TEXTO);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setEsGrabable(true);
    $col7->setNombreCampo('especial');
    $col7->setHTML('type="text" size="5" readonly="true"');     

    $col8 = new Columna('Nómina Especial');
    $col8->setTipo(Columna::TEXTO);
    $col8->setAlineacionObjeto(Columna::CENTRO);
    $col8->setAlineacionContenido(Columna::CENTRO);
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('codnomesp');
    $col8->setHTML('type="text" size="5" readonly="true"');       

    $col9 = new Columna('Monto');
    $col9->setTipo(Columna::MONTO);
    $col9->setEsGrabable(true);
    $col9->setAlineacionContenido(Columna::DERECHA);
    $col9->setAlineacionObjeto(Columna::DERECHA);
    $col9->setNombreCampo('monto');
    $col9->setEsNumerico(true);
    $col9->setHTML('type="text" size="15" readOnly="true"');  

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);

    $this->obj9 = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridNomina($codnom='', $fecnom='', $especial='', $codnomesp='', $codban='')
  {
    $reg=array();
    $cadena="";
    $agropnomesp=H::getX_vacio('CODEMP','Opdefemp','Agropnomesp','001');
    if ($codnom!='' || $fecnom!='' || $especial!='' || $codnomesp!='' || $codban!=''){
      if ($codnom!='')
        $cadena="and A.CODNOM='".$codnom."'";
      if ($fecnom)
        $cadena.=" and A.FECNOM='".$fecnom."'";
      if ($especial!='')
        $cadena.=" and A.ESPECIAL='".$especial."'";
      if ($codnomesp!='')
        $cadena.=" and A.CODNOMESP='".$codnomesp."'";
      if ($codban!=''){
        if ($agropnomesp!='N')
         $cadena.=" and A.CODBAN='".$codban."'";
      }

    
    if ($agropnomesp=='N'){
       $sql="Select distinct(case when 'S'='S' and A.especial='S' then (select desnomesp from npnomesptipos x where x.codnomesp=A.codnomesp) else (CASE when c.cedemp is null THEN b.nomnom else C.NOMEMP||' ('||B.NOMNOM||')' END) end)
            as nomnom,(case when 'S'='S' and A.especial='S' then 'XXX' else A.CODNOM end) as codnom,A.FECNOM as fecnom,a.codtipgas as codtipgas,(case when 'S'='S' and A.especial='S' then 'AAA' else A.CODBAN end) as codban, A.ESPECIAL as especial, A.CODNOMESP as codnomesp, '9' as id, 0 as check
           FROM NPNOMINA B,NPCIENOM A left outer join NPHOJINT C on A.CODBAN=C.CEDEMP
           WHERE A.CODNOM=B.CODNOM AND A.ASIDED<>'P' ".$cadena." order by nomnom,fecnom;";
    }else {
      $sql="Select distinct((CASE when c.cedemp is null THEN b.nomnom else C.NOMEMP||' ('||B.NOMNOM||')' END)) as nomnom,
           A.CODNOM as codnom,A.FECNOM as fecnom,a.codtipgas as codtipgas,A.CODBAN as codban, A.ESPECIAL as especial, A.CODNOMESP as codnomesp, '9' as id, 0 as check
           FROM NPNOMINA B,NPCIENOM A left outer join NPHOJINT C on A.CODBAN=C.CEDEMP
           WHERE A.CODNOM=B.CODNOM AND A.ASIDED<>'P' ".$cadena." order by nomnom,fecnom;";
    }
      H::BuscarDatos($sql,$reg);
    }

    //print $sql;

    $this->numfilnom=count($reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Npcienom');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setTitulo('Nóminas');
    $opciones->setFilas(0);
    $opciones->setName('s');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('check');
    $col1->setHTML(' ');
    $col1->setJScript('onClick="validarNominaUnica(this.id)"');

    $col2 = new Columna('Nómina');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('nomnom');
    $col2->setHTML('type="text" size="30" readonly="true"');

    $col3 = new Columna('Código');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('codnom');
    $col3->setHTML('type="text" size="10" readonly="true"');

    $col4 = new Columna('Fecha');
    $col4->setTipo(Columna::FECHA);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('fecnom');
    $col4->setHTML('readonly="true"');

    $col5 = new Columna('Tipo de Gasto');
    $col5->setTipo(Columna::TEXTO);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('codtipgas');
    $col5->setHTML('type="text" size="10" readonly="true"');   

    $col6 = new Columna('Banco');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('codban');
    $col6->setHTML('type="text" size="10" readonly="true"');   

    $col7 = new Columna('Especial');
    $col7->setTipo(Columna::TEXTO);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setEsGrabable(true);
    $col7->setNombreCampo('especial');
    $col7->setHTML('type="text" size="5" readonly="true"');        

    $col8 = new Columna('Nómina Especial');
    $col8->setTipo(Columna::TEXTO);
    $col8->setAlineacionObjeto(Columna::CENTRO);
    $col8->setAlineacionContenido(Columna::CENTRO);
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('codnomesp');
    $col8->setHTML('type="text" size="10" readonly="true"');    

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);

    $this->obj10 = $opciones->getConfig($reg);
  }  

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {$this->ajax='';
    $this->setVars();
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $cuenta=$this->getRequestParameter('cuenta');
    $descta=$this->getRequestParameter('descuenta');
    $cuentasec=$this->getRequestParameter('cuenta2');
    $javascript="";
  if ($this->getRequestParameter('ajax')=='1')
  {
      $c= new Criteria();
      $c->add(CpdoccauPeer::TIPCAU,$this->getRequestParameter('codigo'));
      $resultado=CpdoccauPeer::doSelectOne($c);
   if ($resultado)
   {
        $this->div='TIPCAU';
        $this->setVars();
        $this->tipcau=$this->getRequestParameter('codigo');
        $dato=CpdoccauPeer::getNombre($this->getRequestParameter('codigo'));
        $this->afeprc=CpdoccauPeer::getDato($this->getRequestParameter('codigo'),'Afeprc');
        $this->afecom=CpdoccauPeer::getDato($this->getRequestParameter('codigo'),'Afecom');
        $this->afecau=CpdoccauPeer::getDato($this->getRequestParameter('codigo'),'Afecau');
     if (($this->afeprc=='N') && ($this->afecom=='N') && ($this->afecau=='N'))
     {$dato2=0;}else {$dato2=1;}

        OrdendePago::partida($partidas);
        $par=$partidas;
        $this->docrefiere=CpdoccauPeer::getDato($this->getRequestParameter('codigo'),'Refier');
        $orddea=H::getX_vacio('CODEMP','Opdefemp','Ordant','001');
        $orddeacom=H::getX_vacio('CODEMP','Opdefemp','Ordantcom','001');
        $ordcarava=H::getX_vacio('CODEMP','Opdefemp','Ordcarava','001');
        $opsincom411=H::getConfApp2('opsincom411', 'tesoreria', 'pagemiord');
        $mancarava=H::getConfApp2('mancarava', 'tesoreria', 'pagemiord');
        $js="";
        if ($opsincom411=='S') {
          if (($orddea!='' && $orddea!=$this->tipcau) && ($orddeacom!='' && $orddeacom!=$this->tipcau))        
             $js="$('btncomp').show();";
           else
            $js="$('btncomp').hide();";
        }

        if ($mancarava=='S' && $ordcarava==$this->getRequestParameter('codigo'))
           $js.="$('tab5').show();$('datcarava').show();  ";
        else
           $js.="$('tab5').hide(); $('datcarava').hide();  ";

     if ($this->tipcau==$this->ordpagnom || $this->tipcau=="OPNN")
     {
          $this->configGridConsulta();
       //$this->configGridRetenciones();
          $this->configGridApliRet();
          $filopnom=H::getConfApp2('filopnom', 'tesoreria', 'pagemiord'); //OP de Nómina con filtros
          if ($filopnom=='S')
            $this->configGridNomina();
     }
     else if ($this->tipcau==$this->ordpagapo || $this->tipcau=="APOR")
     {
          $this->configGridConsulta();
          $opmulapo=H::getConfApp2('opmulapo', 'tesoreria', 'pagemiord'); 
          if ($opmulapo=='S')
            $this->configGridAportes();
        }
     else if ($this->tipcau==$this->ordpagliq || $this->tipcau=="LIQU")
     {
          $this->configGridConsulta();
        //$this->configGridRetenciones();
      $this->configGridApliRet();
        }
     else if ($this->tipcau==$this->ordpagfid || $this->tipcau=="OPFD")
     {
          $this->configGridConsulta();
    }
     else if ($this->tipcau==$this->ordpagval || $this->tipcau=="OPVA")
     {
          $this->configGridConsulta();
     }
     else if ($this->tipcau==$this->ordpaghcm || $this->tipcau=="OHCM")
     {
          $this->configGrid();
          $this->configGridHCM();
          $this->configGridApliret();
     }
     else
     {
        if ($this->docrefiere=='N')
        {
            $this->configGrid();
            $this->configGridApliret();
          //$this->configGridRetenciones();
          }
        else
        {
            $this->configGrid2();
            $this->configGridRefere();
            $this->configGridRefere2();
            $this->configGridApliret();
          //$this->configGridRetenciones();
          }
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["opordpag_afectapre","'.$dato2.'",""],["partidas","'.$par.'",""],["opordpag_documento","'.$this->docrefiere.'",""],["numfilapo","'.$this->numfilapo.'",""],["javascript","'.$js.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

      }
   else
   {
        $noexiste='S';
        $output = '[["noexistipcau","'.$noexiste.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
    }
  else  if ($this->getRequestParameter('ajax')=='2')
  {
      $existe="S";
      $codigo=str_replace('@','.',$this->getRequestParameter('codigo'));
      $c= new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$codigo);
      $resul= OpbenefiPeer::doSelectOne($c);
    if ($resul)
    {
        $dato=OpbenefiPeer::getDato($codigo,'Nomben');
        $dato1=OpbenefiPeer::getDato($codigo,'Codcta');
        $dato2=OpbenefiPeer::getDato2($dato1,'Descta');
     if ($resul->getCodctasec()!='')
     {
          $this->div='CIRIF';
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cuenta.'","'.$dato1.'",""],["'.$descta.'","'.$dato2.'",""],["'.$cuentasec.'","'.$this->dato3.'",""],["existeben","'.$existe.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        }
     else
     {
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cuenta.'","'.$dato1.'",""],["'.$descta.'","'.$dato2.'",""],["'.$cuentasec.'","'.$this->dato3.'",""],["existeben","'.$existe.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
        }
      }
    else
    {
        $existe="N";
        $output = '[["existeben","'.$existe.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
    }
  else  if ($this->getRequestParameter('ajax')=='3')
  {
    $benvarcta=H::getConfApp2('benvarcta', 'tesoreria', 'pagbenfic');
    $js=""; $dato=""; $dato2="";
    if ($benvarcta=='S')
    {
       $w= new Criteria();
       $w->add(ContabbPeer::CODCTA,$this->getRequestParameter('codigo'));
       $resul= ContabbPeer::doSelectOne($w);
       if ($resul)
       {
           $t= new Criteria();
           $t->add(OpctabenPeer::CODCTA,$this->getRequestParameter('codigo'));
           $reg= OpctabenPeer::doSelectOne($t);
           if ($reg)
           {
               $dato=$resul->getDescta();
               $dato2=$resul->getCargab();
           }else {
               $js="alert('La Cuenta Contable no esta asociada al Beneficiario'); $('$cajtexcom').value='';";
           }
       }else {
          $js="alert('La Cuenta Contable no existe'); $('$cajtexcom').value='';";
       }
    }else {
       $w= new Criteria();
       $w->add(ContabbPeer::CODCTA,$this->getRequestParameter('codigo'));
       $resul= ContabbPeer::doSelectOne($w);
       if ($resul)
       {
         $dato=$resul->getDescta();
         $dato2=$resul->getCargab();
       }else {
         $js="alert('La Cuenta Contable no existe')";
       }
    }

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["cargable","'.$dato2.'",""],["javascript","'.$js.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else  if ($this->getRequestParameter('ajax')=='4')
  {
      $dato=""; $js=""; $gen="";
      $codigo=$this->getRequestParameter('codigo');
      $loguse= $this->getUser()->getAttribute('loguse');
      $lonubi=strlen(H::ObtenerFormato('Opdefemp','Forubi'));
      $filubiadm=H::getConfApp2('filubiadm', 'tesoreria', 'pagemiord');     
      if ($lonubi==strlen($codigo)) {
        $t= new Criteria();      
        if ($filubiadm=='S') {
          $sql='bnubica.codubi=\''.$codigo.'\' and bnubica.codubi in (select codubi from "SIMA_USER".segubausu where loguse=\''.$loguse.'\')';
          $t->add(BnubicaPeer::CODUBI,$sql,Criteria::CUSTOM);
        }else $t->add(BnubicaPeer::CODUBI,$codigo);
        $resul= BnubicaPeer::doSelectOne($t);
        if ($resul)
        {
          $dato=$resul->getDesubi();
          if ($resul->getStacod()=='C')
            $gen=true;
          else $gen=false;
        }else $js="alert_('La Unidad de Origen no existe'); $('opordpag_coduni').value=''; $('opordpag_desubi').value=''; $('opordpag_coduni').focus();";
      }else $js="alert_('La Unidad de Origen no es de &Uacute;ltimo Nivel'); $('opordpag_coduni').value='';  $('opordpag_desubi').value=''; $('opordpag_coduni').focus();";

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["generaotro","'.$gen.'",""],["javascript","'.$js.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else  if ($this->getRequestParameter('ajax')=='5')
  {
      $dato=FortipfinPeer::getDesfin($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else  if ($this->getRequestParameter('ajax')=='6')
  {   $this->ajax='';
      $this->div='REF'; // div grid de la referencia
      $this->docrefiere=CpdoccauPeer::getRefier($this->getRequestParameter('tipcau'));
      $refcre = $this->getRequestParameter('refcre','');
      $refsolpag = $this->getRequestParameter('refsolpag','');
    if ($this->docrefiere=='P')
    {
      $moneda=$this->getRequestParameter('moneda');
      OrdendePago::datosRefere($this->getRequestParameter('codigo'),$this->getRequestParameter('fecha2'),$fecha,$moneda,$descripcion,$tipo,$destipo,$elrif,$descripcion2,$msj,$valmon,$coddirec);
        $fechas=$fecha;
        $descripcions=htmlspecialchars($descripcion);
        $descripcions=eregi_replace("[\n|\r|\n\r]", "", $descripcions);
        $descripcion2=htmlspecialchars($descripcion2);
        $descripcion2=eregi_replace("[\n|\r|\n\r]", "", $descripcion2);
        $tipos=$tipo;
        $destipos=$destipo;
        $dato=htmlspecialchars(OpbenefiPeer::getDato($elrif,'Nomben'));
        $dato1=OpbenefiPeer::getDato($elrif,'Codcta');
        $comple='';
        $dato2=htmlspecialchars(OpbenefiPeer::getDato2($dato1,'Descta'));
        if ($msj=='' && $coddirec!="")
          $comple=',["opordpag_coddirec","'.$coddirec.'",""],["opordpag_desdirec","'.H::getX_vacio('CODDIREC','Cadefdirec','Desdirec',$coddirec).'",""]';
      if ($msj=='')
      {
          $this->configGridRefere(str_pad($this->getRequestParameter('codigo'),8,'0',STR_PAD_LEFT));
      }else {$this->configGridRefere();}
      if ($this->getRequestParameter('observe')=="")
      {
          $output = '[["fecha","'.$fechas.'",""],["descripcion","'.$descripcions.'",""],["tipo","'.$tipos.'",""],["destipo","'.$destipos.'",""],["fila","'.$this->numfila.'",""],["mensaje","'.$msj.'",""],["ajaxs","6",""],["opordpag_desord","'.$descripcion2.'",""],["opordpag_cedrif","'.$elrif.'",""],["opordpag_nomben","'.$dato.'",""],["opordpag_ctapag","'.$dato1.'",""],["opordpag_descta","'.$dato2.'",""],["opordpag_observe","N",""]'.$comple.']';
      }else
      {
          $output = '[["fecha","'.$fechas.'",""],["descripcion","'.$descripcions.'",""],["tipo","'.$tipos.'",""],["destipo","'.$destipos.'",""],["fila","'.$this->numfila.'",""],["mensaje","'.$msj.'",""],["ajaxs","6",""],["opordpag_observe","N",""]'.$comple.']';
        }
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     }else if ($this->docrefiere=='C')
     {  $tipcau=$this->getRequestParameter('tipcau');
        $encpart=false;
        $orddeacom=H::getX_vacio('CODEMP','Opdefemp','Ordantcom','001');
        if ($orddeacom!='' && $orddeacom==$tipcau)
        {
          $encpart=OrdendePago::PartidasDeudasAnteriores($this->getRequestParameter('codigo'));
        }
        if ($encpart)
        {
          $javascript="alert_('El Compromiso seleccionado no esta asociado a una Partida de Deudas Anteriores'); $('refere').value=''; $('refere').focus();";
          $this->configGridRefere2();
          $output = '[["javascript","'.$javascript.'",""]]';
        }else {
         $moneda=$this->getRequestParameter('moneda');
         $valorm=H::toFloat($this->getRequestParameter('valmon'),6);
        OrdendePago::datosRefere2($this->getRequestParameter('codigo'),$this->getRequestParameter('fecha2'),$this->getRequestParameter('arreglo'),$moneda,$fecha,$descripcion,$tipo,$elrif,$descripcion2,$destipo,$financiamiento,$oppermanente,$opper,$msj,$valmon,$coddirec);
        $fechas=$fecha;
        $descripcions=htmlspecialchars($descripcion);
        $descripcions=eregi_replace("[\n|\r|\n\r]", "", $descripcions);
        $descripcion2=htmlspecialchars($descripcion2);
        $descripcion2=eregi_replace("[\n|\r|\n\r]", "", $descripcion2);
        $tipos=$tipo;
        $destipos=$destipo;
        $dato=htmlspecialchars(OpbenefiPeer::getDato($elrif,'Nomben'));
        $dato1=OpbenefiPeer::getDato($elrif,'Codcta');
        $dato2=htmlspecialchars(OpbenefiPeer::getDato2($dato1,'Descta'));
        $dato3=htmlspecialchars(FortipfinPeer::getDesfin($financiamiento));
        $ordcom='';
        $comple='';
        if ($msj=='' && $coddirec!="")
          $comple=',["opordpag_coddirec","'.$coddirec.'",""],["opordpag_desdirec","'.H::getX_vacio('CODDIREC','Cadefdirec','Desdirec',$coddirec).'",""]';

        /*$pw= new Criteria();
        $pw->add(CaordcomPeer::ORDCOM,$this->getRequestParameter('codigo'));
        $regpw= CaordcomPeer::doSelectOne($pw);
        if ($regpw)
        {
          $ordcom=$regpw->getOrdcom();
          $codfinan=$regpw->getTipfin();
          $nomfin=H::getX_vacio('CODFIN','Fortipfin','Nomext',$codfinan);
          $codunid=$regpw->getCoduni();
          $nomuo=H::getX_vacio('CODUBI','Bnubica','Desubi',$codunid);
          $comple=',["opordpag_coduni","'.$codunid.'",""],["opordpag_desubi","'.$nomuo.'",""],["opordpag_tipfin","'.$codfinan.'",""],["opordpag_nomext2","'.$nomfin.'",""]';
        }*/
        $comnoiva=H::getConfApp2('comnoiva', 'compras', 'almordcom');
        $acum=0;
        if ($comnoiva=='S')
        {          
          if ($ordcom!='')
          {
            $w= new Criteria();
            $w->add(CadisrgoPeer::REQART,$ordcom);
            $resulord=CadisrgoPeer::doSelect($w);
            if ($resulord)
            {
              foreach ($resulord as $objrec) {
                $acum+=$objrec->getMonrgo();
              }
            }
          }        
        }

        if ($msj=='')
        {
         $trajo=OrdendePago::buscarNomina($this->getRequestParameter('codigo'),$arreglo,$arregloret,$arregloret2);
         if ($trajo) {
             $this->configGridRefere2(str_pad($this->getRequestParameter('codigo'),8,'0',STR_PAD_LEFT),$arreglo);
             if (count($arregloret)>0)
            {
             $javascript.=" colocarRetenciones('$arregloret2'); ";
            }            
            $javascript.="$('opordpag_gencomnom').value='S';";
         }
         else
         {         
            $trajo2=OrdendePago::buscarAporte($this->getRequestParameter('codigo'),$arreglo); 
            if ($trajo2)
            {
              $this->configGridRefere2(str_pad($this->getRequestParameter('codigo'),8,'0',STR_PAD_LEFT),$arreglo);  
              $javascript.="$('opordpag_gencomnom').value='A';";
            }
            else 
            {   
               $this->configGridRefere2(str_pad($this->getRequestParameter('codigo'),8,'0',STR_PAD_LEFT)); 
            }             
         }
        }else {
          $this->configGridRefere2();
        }
        if($refcre) {
          $ccdetcuades = CcdetcuadesPeer::retrieveByPK($refcre);
          if($ccdetcuades) {
            if($this->obj4['datos']) {
              $this->obj4['datos'][0]->setMondescre($ccdetcuades->getMonto());
            }
            $elrif = $ccdetcuades->getRifter();
            $dato = $ccdetcuades->getNomter();
          }
        }elseif($refsolpag){
          $c = new Criteria();
          $c->add(OpdetsolpagPeer::REFSOL,$refsolpag);
          $opdetsolpag = OpdetsolpagPeer::doSelectOne($c);
          if($opdetsolpag) {
            if($this->obj4['datos']) {
              $this->obj4['datos'][0]->setMondescre($opdetsolpag->getMonimp());
            }
            $c = new Criteria();
            $c->add(OpsolpagPeer::REFSOL,$refsolpag);
            $solpag = OpsolpagPeer::doSelectOne($c);

            $elrif = $solpag->getCedrif();
            $dato = $solpag->getNomben();
          }
        }
        $this->cedrifdesh="";
        $varemp = $this->getUser()->getAttribute('configemp');
        if ($varemp)
          $this->cedrifdesh = H::getConfApp ('cedrifdesh', 'tesoreria', 'pagemiord');
        
        if ($this->cedrifdesh=='S') {
          $javascript.=" $('opordpag_cedrif').readOnly=true; $('opordpag_nomben').readOnly=true; $$('.botoncat')[1].disabled=true;";
        }
        if (H::toFloat($valmon,6)==0) {
            $q= new Criteria();
            $q->add(TsdesmonPeer::CODMON,$moneda);
            $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
            $reg2= TsdesmonPeer::doSelectOne($q);
            if ($reg2)
            {
               $valmon=number_format($reg2->getValmon(),6,',','.');
            }
        }        

         $javascript.=" $('opordpag_codmon').value='$moneda'; $('moneref').value='$moneda'; $('opordpag_valmon').value='$valmon'; $('opordpag_valmon').readOnly=true;";

        /*if ($this->getRequestParameter('observe')=="")
        {
          $output = '[["fecha","'.$fechas.'",""],["descripcion","'.$descripcions.'",""],["tipo","'.$tipos.'",""],["destipo","'.$destipos.'",""],["fila","'.$this->numfila.'",""],["mensaje","'.$msj.'",""],["ajaxs","6",""],["opordpag_desord","'.$descripcion2.'",""],["opordpag_cedrif","'.$elrif.'",""],["opordpag_nomben","'.$dato.'",""],["opordpag_ctapag","'.$dato1.'",""],["opordpag_descta","'.$dato2.'",""],["opordpag_tipfin","'.$financiamiento.'",""],["opordpag_nomext2","'.$dato3.'",""],["opordpag_observe","N",""],["opordpag_monorddisrgo","'.$acum.'",""],["javascript","'.$javascript.'",""]'.$comple.']';
        }else{
          $output = '[["fecha","'.$fechas.'",""],["descripcion","'.$descripcions.'",""],["tipo","'.$tipos.'",""],["destipo","'.$destipos.'",""],["fila","'.$this->numfila.'",""],["mensaje","'.$msj.'",""],["ajaxs","6",""],["opordpag_observe","N",""],["opordpag_monorddisrgo","'.$acum.'",""],["javascript","'.$javascript.'",""]'.$comple.']';
        }*/
        $output = '[["fecha","'.$fechas.'",""],["descripcion","'.$descripcions.'",""],["tipo","'.$tipos.'",""],["destipo","'.$destipos.'",""],["fila","'.$this->numfila.'",""],["mensaje","'.$msj.'",""],["ajaxs","6",""],["opordpag_monorddisrgo","'.$acum.'",""],["javascript","'.$javascript.'",""]'.$comple.']';
      }
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      }
    }
  else  if ($this->getRequestParameter('ajax')=='7')
  {
      $codigo=$this->getRequestParameter('codigo');
      $nompre=$this->getRequestParameter('nombre');
      $tipcau=$this->getRequestParameter('tipcau');
      $mascaraformato=$this->mascarapresupuesto;
      $lonpre=strlen($this->mascarapresupuesto);
      $dato=OpdetordPeer::getRetiva($this->getRequestParameter('codigo'));  
      $nombre=H::getX_vacio('CODPRE','Cpdeftit','Nompre',$this->getRequestParameter('codigo')); 
          
      OrdendePago::validarGrid($codigo,$lonpre,$tipcau,$error1,$error2,$error3,$error4);

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$nompre.'","'.$nombre.'",""],["noexiste","'.$error1.'",""],["nonivel","'.$error2.'",""],["noasigna","'.$error3.'",""],["nopar411","'.$error4.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else if ($this->getRequestParameter('ajax')=='8')
  {
      $numord=$this->getRequestParameter('numord');
      $tipcau=$this->getRequestParameter('tipcau');
      $coduni=$this->getRequestParameter('coduni');
      $compadic=$this->getRequestParameter('compadic');

      $id=0;
      $c = new Criteria();
      $c->add(OpordpagPeer::NUMORD,$numord);
      $resul=OpordpagPeer::doSelectOne($c);
      if ($resul)  $id=$resul->getId();

      $msg = $this->executeEliminar();
      $this->ajax='8';

    if ($msg=='')
    {
        $this->setFlash('notice','Registro Eliminado exitosamente');
        return $this->redirect('pagemiord/edit');
      }
    else
    {
        $this->setFlash('notice',$msg);
        return $this->redirect('pagemiord/edit?id='.$id);
      }
    }
  else if ($this->getRequestParameter('ajax')=='9')
  {
      $fila=$this->getRequestParameter('fila');
      $monto=Herramientas::toFloat($this->getRequestParameter('monto'));
      $letra=$this->getRequestParameter('letra');
      $codigo=$this->getRequestParameter('codigo');
      $afecta=$this->getRequestParameter('afecta');
      $codmon=$this->getRequestParameter('codmon');
      $valmon=H::toFloat($this->getRequestParameter('valmon'),6);
      $monto=$monto*$valmon;
      OrdendePago::montoValido($fila,$monto, $letra, $codigo,$afecta,$msj,$mondis,$sobregiro);
      $output = '[["errormonto","'.$msj.'",""],["montodisponible","'.$mondis.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else if ($this->getRequestParameter('ajax')=='10')
  {
      $this->filretpro="";
      $this->limbaseret="";
      $varemp = $this->getUser()->getAttribute('configemp');
      if ($varemp)
        if(array_key_exists('aplicacion',$varemp))
          if(array_key_exists('tesoreria',$varemp['aplicacion']))
            if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria'])) {
	     if(array_key_exists('pagemiord',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('filretpro',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
	       {
                  $this->filretpro=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['filretpro'];
                }
              }
             if(array_key_exists('pagtipret',$varemp['aplicacion']['tesoreria']['modulos'])){
               if(array_key_exists('limbaseret',$varemp['aplicacion']['tesoreria']['modulos']['pagtipret']))
	       {
                  $this->limbaseret=$varemp['aplicacion']['tesoreria']['modulos']['pagtipret']['limbaseret'];
                }
              }
            }
      $comnoiva=H::getConfApp2('comnoiva', 'compras', 'almordcom');
      $aplrecop=H::getConfApp2('aplrecop', 'tesoreria', 'pagemiord');
      $docume=$this->getRequestParameter('docume');
      $acum=0;
      if ($comnoiva=='S' && $docume!='N')
      {
        $refecom=$this->getRequestParameter('refecom');
        if ($refecom=='')
          $refecom='_';
        $refere=split('_',$refecom);
        $ordcom=H::getX_vacio('ORDCOM','Caordcom','ORDCOM',$refere[1]);
        if ($ordcom!='')
        {
          $w= new Criteria();
          $w->add(CadisrgoPeer::REQART,$ordcom);
          $resulord=CadisrgoPeer::doSelect($w);
          if ($resulord)
          {
            foreach ($resulord as $objrec) {
              $acum+=$objrec->getMonrgo();
            }
          }
        }        
      }


      $c= new Criteria();
    if ($this->filretpro=='S'){
        $codpro=H::getX_vacio('RIFPRO','Caprovee','Codpro',$this->getRequestParameter('codprovee'));
        if ($codpro!="")
        {
            $sql="optipret.codtip='".$this->getRequestParameter('codigo')."' and optipret.codtip in (select codret from caproret where codpro='".$codpro."')";
            $c->add(OptipretPeer::CODTIP,$sql,Criteria::CUSTOM);
        }else {
            $c->add(OptipretPeer::CODTIP,$this->getRequestParameter('codigo'));
        }
      }else {
        $c->add(OptipretPeer::CODTIP,$this->getRequestParameter('codigo'));
      }
      $resul=OptipretPeer::doSelectOne($c);
    if ($resul)
    {
        $existe='S';
        $dato1=OptipretPeer::getRetencion($this->getRequestParameter('codigo'));
        $dato2=OptipretPeer::getDato($this->getRequestParameter('codigo'),'Codcon');
        $dato3=number_format(OptipretPeer::getDato($this->getRequestParameter('codigo'),'Basimp'),2,',','.');
        $dato4=number_format(OptipretPeer::getDato($this->getRequestParameter('codigo'),'Porret'),2,',','.');
        $dato5=number_format(OptipretPeer::getDato($this->getRequestParameter('codigo'),'Factor'),4,',','.');
        $dato6=number_format(OptipretPeer::getDato($this->getRequestParameter('codigo'),'Porsus'),2,',','.');
        $dato7=number_format(OptipretPeer::getDato($this->getRequestParameter('codigo'),'Unitri'),2,',','.');
        $dato8=OptipretPeer::getEsta($this->getRequestParameter('codigo'));
        $dato9=OptipretPeer::getEstaislr($this->getRequestParameter('codigo'));
        $dato10=OptipretPeer::getEsta1xmil($this->getRequestParameter('codigo'));
        $dato11=number_format(OptipretPeer::getMontoiva($this->getRequestParameter('codigo')),2,',','.');
        $dato12=OptipretPeer::getEstairs($this->getRequestParameter('codigo'));
    $dato14=OptipretPeer::getEstaimn($this->getRequestParameter('codigo'));

        if ($this->limbaseret=='S') {
          $t = new Criteria();
          $resultado=OpdefempPeer::doSelectOne($t);
        if ($resultado)
        {
            $unitri=$resultado->getUnitri();
          }else $unitri=0;
          $montobasmin=H::toFloat($resul->getMbasmi(),4)*$unitri;
          $montobasmax=H::toFloat($resul->getMbasma(),4)*$unitri;
          $dato13=number_format($montobasmin,4,',','.');
          $dato15=number_format($montobasmax,4,',','.');
        }else {$dato13='0,00';
        $dato15='0,00';
        }

      }
    else
    {
        $existe='N';
        $dato1='';
        $dato2='';
        $dato3='0,00';
        $dato4='0,00';
        $dato5='0,0000';
        $dato6='0,00';
        $dato7='0,00';
        $dato8='';
        $dato9='';
        $dato10='';
        $dato11='0,00';
        $dato12='';
        $dato13='0,00';
        $dato14='';
        $dato15='0,00';
      }
    $output = '[["existeretencion","'.$existe.'",""],["'.$cajtexmos.'","'.$dato1.'",""],["'.$this->getRequestParameter('contable').'","'.$dato2.'",""],["'.$this->getRequestParameter('base').'","'.$dato3.'",""],["'.$this->getRequestParameter('porretencion').'","'.$dato4.'",""],["'.$this->getRequestParameter('factor').'","'.$dato5.'",""],["'.$this->getRequestParameter('porsustra').'","'.$dato6.'",""],["'.$this->getRequestParameter('unidad').'","'.$dato7.'",""],["'.$this->getRequestParameter('esta').'","'.$dato8.'",""],["'.$this->getRequestParameter('estaislr').'","'.$dato9.'",""],["'.$this->getRequestParameter('estairs').'","'.$dato12.'",""],["'.$this->getRequestParameter('esta1xmil').'","'.$dato10.'",""],["'.$this->getRequestParameter('montoiva').'","'.$dato11.'",""],["'.$this->getRequestParameter('monbasmin').'","'.$dato13.'",""],["'.$this->getRequestParameter('estaimn').'","'.$dato14.'",""],["'.$this->getRequestParameter('monbasmax').'","'.$dato15.'",""],["opordpag_monorddisrgo","'.$acum.'",""]]'; 
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else if ($this->getRequestParameter('ajax')=='11')
  {
      $this->div='OPNN';
      $filopnom=H::getConfApp2('filopnom', 'tesoreria', 'pagemiord');
      if ($filopnom=='S'){
        $datosnomina=$this->getRequestParameter('nomina');
        OrdendePago::ArregloNomina2($this->getRequestParameter('nomina'),$this->getRequestParameter('opordpag_referencias'),$arreglodet,$arregloret,$dato,$this->impcpt,$arregloret2);
      }else {
        $datosnomina=$this->getRequestParameter('tipnom')."_".$this->getRequestParameter('gasto')."_".$this->getRequestParameter('banco')."_".$this->getRequestParameter('fecha')."_".$this->getRequestParameter('nomespecial')."_".$this->getRequestParameter('codnomesp');
        OrdendePago::ArregloNomina($this->getRequestParameter('tipnom'),$this->getRequestParameter('banco'),$this->getRequestParameter('gasto'),$this->getRequestParameter('fecha'),$this->getRequestParameter('opordpag_referencias'),$arreglodet,$arregloret,$dato,$this->impcpt,$this->getRequestParameter('nomespecial'),$this->getRequestParameter('codnomesp'),$arregloret2);
      }
      $this->divu=$this->getRequestParameter('divu');
      if ($this->getRequestParameter('divu')==1)
      {
        $this->configGridConsulta('','OPNN',$arreglodet);
      }else{
        if (count($arregloret)>0)
        {
          $this->getUser()->setAttribute('retencion', 'S','pagemiord');
        }
        //$this->configGridRetenciones($arregloret);
        $this->configGridApliRet($arregloret2);
      }

      $output = '[["opordpag_cedrif","'.$dato.'",""],["opordpag_datosnomina","'.$datosnomina.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    }
  else if ($this->getRequestParameter('ajax')=='12')
  {
      $this->div='APOR';      
      $ranconapo=H::getConfApp2('ranconapo', 'tesoreria', 'pagemiord'); //Rango de OP para una fecha
      $opmulapo=H::getConfApp2('opmulapo', 'tesoreria', 'pagemiord'); //OP de multiples Aportes
      if ($ranconapo=='S') {        
        OrdendePago::ArregloAporte2($this->getRequestParameter('codigoaported'),$this->getRequestParameter('codigoaporteh'),$this->getRequestParameter('fecnom'),$this->getRequestParameter('gasto2'),$this->getRequestParameter('opordpag_referencias'),$arreglodet,$aportes);
        $datosaporte=$aportes;
      }else if ($opmulapo=='S'){
        $datosaporte=$this->getRequestParameter('aportes');
        OrdendePago::ArregloAporte3($this->getRequestParameter('aportes'),$this->getRequestParameter('opordpag_referencias'),$arreglodet);
      }
      else{
        $datosaporte=$this->getRequestParameter('codigoaporte')."_".$this->getRequestParameter('gasto2')."_".date('d/m/Y', strtotime($this->getRequestParameter('fecnom')))."_".$this->getRequestParameter('codnom')."_".$this->getRequestParameter('especial')."_".$this->getRequestParameter('codnomesp')."!";
        OrdendePago::ArregloAporte($this->getRequestParameter('codigoaporte'),$this->getRequestParameter('fecnom'),$this->getRequestParameter('gasto2'),$this->getRequestParameter('opordpag_referencias'),$this->getRequestParameter('codnom'),$this->getRequestParameter('especial'),$this->getRequestParameter('codnomesp'),$arreglodet);
      }
      $this->configGridConsulta('','APOR',$arreglodet);

      $output = '[["opordpag_datosaporte","'.$datosaporte.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    }
  else if ($this->getRequestParameter('ajax')=='13')
  {
      $this->div='LIQU';
    OrdendePago::ArregloLiquidacion($this->getRequestParameter('codemp'),$this->getRequestParameter('nomemp'),$this->getRequestParameter('cedemp'),$this->getRequestParameter('opordpag_referencias'),$arreglodet,$arregloret,$dato,$arregloret2);

      $this->divu=$this->getRequestParameter('divu');
    if ($this->getRequestParameter('divu')==1)
    {
    $this->configGridConsulta('','LIQU',$arreglodet);}
    else{
    if (count($arregloret)>0)
    {
          $this->getUser()->setAttribute('retencion', 'S','pagemiord');
        }
    //$this->configGridRetenciones($arregloret);
    $this->configGridApliRet($arregloret2);

      }

      $output = '[["opordpag_cedrif","'.$dato.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    }
  else if ($this->getRequestParameter('ajax')=='14')
  {
      $this->div='OPFD';
      OrdendePago::ArregloFideicomiso($this->getRequestParameter('codnom'),$this->getRequestParameter('nomnom'),$this->getRequestParameter('fecha'),$this->getRequestParameter('opordpag_referencias'),$arreglodet);
      $this->configGridConsulta('','OPFD',$arreglodet);
    }
  else if ($this->getRequestParameter('ajax')=='15')
  {
      $codigo="";
      $msj="";
      $mondis="0,00";
      $afecta=$this->getRequestParameter('afecta');
      $detalle=Herramientas::CargarDatosGrid($this,$this->obj);
      $x=$detalle[0];
      $i=0;
    while ($i<count($x))
    {
        $codigo=$x[$i]->getCodpre();
        OrdendePago::montoValido($i,$x[$i]->getMoncau(),'N',$codigo,$afecta,$msj,$mondis,$sobregiro);
     if ($msj!="")
     { break;}
        $i++;
      }
      $output = '[["errormonto","'.$msj.'",""],["montodisponible","'.$mondis.'",""],["codigopresupuestario","'.$codigo.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else if ($this->getRequestParameter('ajax')=='16')
  {
    $javascript="";
    if (Herramientas::validarPeriodoPresuesto($this->getRequestParameter('codigo')))
    {
        $valido='N';
    }else { $valido='S';}
    if ($this->getRequestParameter('ordamo')!='') {
        $ordamo=H::getX_vacio('CODEMP','Opdefemp','Ordamo','001');
        $q= new Criteria();
        $q->add(OpordpagPeer::NUMORD,$this->getRequestParameter('ordamo'));
        $q->add(OpordpagPeer::CEDRIF,$this->getRequestParameter('cedrif'));
        $q->add(OpordpagPeer::TIPCAU,$ordamo);
        $reg= OpordpagPeer::doSelectOne($q);
        if ($reg) {
          $fecha=$this->getRequestParameter('codigo');
          $dateFormat = new sfDateFormat('es_VE');
          $fec1 = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
          if ($fec1<$reg->getFecemi())
            $javascript="alert_('La Fecha de la Orden no puede ser menor a la fecha de la Orden de Amortizaci&oacute;n'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }
    }
      $output = '[["valfec","'.$valido.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else  if ($this->getRequestParameter('ajax')=='17')
  {
      $this->getUser()->setAttribute('presiona', 'S','pagemiord');
      $this->getUser()->setAttribute('retencion', 'S','pagemiord');
      $output = '[["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else  if ($this->getRequestParameter('ajax')=='18')
  {
      $dato=number_format(OptipretPeer::getDato($this->getRequestParameter('codigo'),'Factor'),4,',','.');
      $output = '[["fac","'.$dato.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else  if ($this->getRequestParameter('ajax')=='19')
  {
      $dateFormat = new sfDateFormat('es_VE');
      $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

      $c= new Criteria();
      $c->add(OpordpagPeer::NUMORD,$this->getRequestParameter('numord'));
      $data=OpordpagPeer::doSelectOne($c);
    if ($data)
    {
      if ($fecha<$data->getFecemi())
      {
          $msj="alert('La Fecha de Anulacion no puede ser menor a la fecha de la Orden de Pago'); $('opordpag_fecanu').value='';";
        }
      else{$msj="";}

      if ($msj=="")
      {
        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('codigo'))==true)
        {
            $msj="alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('opordpag_fecanu').value='';";
          }
        else { $msj=""; }
          }

      }
    else
    {
        $msj="";
      }

      $output = '[["javascript","'.$msj.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else  if ($this->getRequestParameter('ajax')=='20')
  {
      $this->div='val';
      $c= new Criteria();
      $c->add(OcregconPeer::CODCON,$this->getRequestParameter('contrato'));
      $c->add(OcregconPeer::STACON,'A');
      $c->addJoin(OcregconPeer::REFCOM,CpcomproPeer::REFCOM);
      $c->addJoin(CpcomproPeer::CEDRIF,OpbenefiPeer::CEDRIF);
      $result= CpcomproPeer::doSelectOne($c);
  if ($result)
  {
        $dato=$result->getRefcom();
        $dato1=$result->getCedrif();
        $c= new Criteria();
        $c->add(OpbenefiPeer::CEDRIF,$dato1);
        $resul= OpbenefiPeer::doSelectOne($c);
      if ($resul)
      {
          $dato3=OpbenefiPeer::getDato($dato1,'Nomben');
          $dato4=OpbenefiPeer::getDato($dato3,'Codcta');
          $dato5=OpbenefiPeer::getDato2($dato4,'Descta');
        }


        $javascript="";
        $output = '[["refcomv","'.$dato.'",""],["rifcom","'.$dato1.'",""],["opordpag_cedrif","'.$dato1.'",""],["opordpag_nomben","'.$dato3.'",""],["opordpag_ctapag","'.$dato4.'",""],["opordpag_descta","'.$dato5.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

  }else
  {
        $javascript="alert('El Contrato no Existe');";
        $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }

    }
  else if ($this->getRequestParameter('ajax')=='21')
  {
      $this->div='OPVA';
      OrdendePago::ArregloValuacion($this->getRequestParameter('refcom'),$this->getRequestParameter('montoval'),$this->getRequestParameter('opordpag_referencias'),$arreglodet);
      $this->configGridConsulta('','OPVA',$arreglodet);
    }
  else if ($this->getRequestParameter('ajax')=='22')
  {
      $javascript="";
      $c= new Criteria();
      $c->add(TsmotanuPeer::CODMOTANU,$this->getRequestParameter('codigo'));
      $reg= TsmotanuPeer::doSelectOne($c);
  	if ($reg)
  	{
        $dato=$reg->getDesmotanu();
      }else $javascript="alert('El Motivo de Anulación no Existe'); $('$cajtexcom').value=''; ";
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else if ($this->getRequestParameter('ajax')=='23')
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
  else if ($this->getRequestParameter('ajax')=='24')
  {
      $javascript="";
      $c= new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$this->getRequestParameter('codigo'));
      $reg= OpbenefiPeer::doSelectOne($c);
  	if ($reg)
  	{
        $dato=$reg->getNomben();
      }else $javascript="alert('El Beneficiario Alterno no Existe'); $('$cajtexcom').value=''; ";
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else if ($this->getRequestParameter('ajax')=='99')
  {
      $js=""; $id=$this->getRequestParameter('id');
      $y= new Criteria();
      $y->add(OpordpagPeer::CEDRIF,$this->getRequestParameter('cedrif'));
      $y->add(OpfacturPeer::NUMFAC,$this->getRequestParameter('codigo'));
      $y->addJoin(OpfacturPeer::NUMORD,OpordpagPeer::NUMORD);
      $resul= OpfacturPeer::doSelect($y);
      if ($resul)
      {
        $js="alert('El Proveedor ya tiene asociado ese mismo N&uacute;mero de Factura en otra Orden de Pago.'); $('$id').value=''; $('$id').focus();";
      }


      $output = '[["javascript","'.$js.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else if ($this->getRequestParameter('ajax')=='25')
  {
  	$javascript=""; $dato="";
      $c= new Criteria();
      $c->add(TsdefbanPeer::NUMCUE,$this->getRequestParameter('codigo'));
      $reg= TsdefbanPeer::doSelectOne($c);
  	if ($reg)
  	{
        $dato=$reg->getNomcue();
      }else $javascript="alert('La Cuenta Bancaria no Existe'); $('$cajtexcom').value=''; ";
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else if ($this->getRequestParameter('ajax')=='26')
  {
  	$javascript=""; $dato="";
      $c= new Criteria();
      $c->add(CpdocpagPeer::TIPPAG,$this->getRequestParameter('codigo'));
      $reg= CpdocpagPeer::doSelectOne($c);
  	if ($reg)
  	{
        $dato=$reg->getNomext();
      }else $javascript="alert('El Tipo de Pagado no Existe'); $('$cajtexcom').value=''; ";
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  else  if ($this->getRequestParameter('ajax')=='27')
  {
    $js="";
    $nuevo="";
    $filmonfecord=H::getConfApp2('filmonfecord', 'tesoreria', 'pagemiord');
    $fecha=$this->getRequestParameter('fechaemi');
    $dateFormat = new sfDateFormat('es_VE');
    $fec1 = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
    if ($this->getRequestParameter('nuevo')=='')
    {
       if ($this->getRequestParameter('refiere')!='N' && $this->getRequestParameter('refiere')!='')
       {
          if ($this->getRequestParameter('codigo')==$this->getRequestParameter('moneref')) 
          {
            $q= new Criteria();
            $q->add(TsdesmonPeer::CODMON,$this->getRequestParameter('codigo'));
            if ($filmonfecord=='S') {
              $q->add(TsdesmonPeer::FECMON,$fec1,Criteria::GREATER_EQUAL);
              $q->addAscendingOrderByColumn(TsdesmonPeer::FECMON);
            }else 
              $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
            $reg= TsdesmonPeer::doSelectOne($q);
            if ($reg)
            {
               $dato=number_format($reg->getValmon(),6,',','.');
            }else {
              if ($filmonfecord=='S'){
                $q1= new Criteria();
                $q1->add(TsdesmonPeer::CODMON,$this->getRequestParameter('codigo'));
                $q1->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
                $reg1= TsdesmonPeer::doSelectOne($q);
                if ($reg)
                {
                   $dato=number_format($reg1->getValmon(),6,',','.');
                }
              }
            }
          }else {
               $js="alert('La Moneda debe ser la misma del Compromiso'); $('opordpag_codmon').value='".$this->getRequestParameter('moneref')."'";   
               $dato=$this->getRequestParameter('valmone');
           }
       }else {
            $q= new Criteria();
            $q->add(TsdesmonPeer::CODMON,$this->getRequestParameter('codigo'));
            if ($filmonfecord=='S'){
              $q->add(TsdesmonPeer::FECMON,$fec1,Criteria::GREATER_EQUAL);
              $q->addAscendingOrderByColumn(TsdesmonPeer::FECMON);
            }else
              $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
            $reg= TsdesmonPeer::doSelectOne($q);
            if ($reg)
            {
               $dato=number_format($reg->getValmon(),6,',','.');
            }else {
              if ($filmonfecord=='S'){
                $q1= new Criteria();
                $q1->add(TsdesmonPeer::CODMON,$this->getRequestParameter('codigo'));
                $q1->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
                $reg1= TsdesmonPeer::doSelectOne($q1);
                if ($reg1)
                {
                   $dato=number_format($reg1->getValmon(),6,',','.');
                }
              }
            }
            
       }
    }else {
        $js="$('opordpag_codmon').value='".$this->getRequestParameter('moneref')."'";   
           $dato=$this->getRequestParameter('valmone');
    }
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='28')
  {
    $q= new Criteria();
    $q->add(CacatsncPeer::CODSNC,$this->getRequestParameter('codigo'));
    $reg= CacatsncPeer::doSelectOne($q);
    if ($reg)
    {
       $dato=$reg->getDessnc();
    }else $javascript="alert_('El C&oacute;digo SNC no Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else if ($this->getRequestParameter('ajax')=='29')
  {
  	$javascript="";
  	$c= new Criteria();
  	$c->add(OpbenefiPeer::CEDRIF,$this->getRequestParameter('codigo'));
  	$reg= OpbenefiPeer::doSelectOne($c);
  	if ($reg)
  	{
       $dato=$reg->getNomben();
  	}else $javascript="alert('La Empresa no Existe'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus(); ";
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='30')
  {
    $javascript='';
    $ordamo=H::getX_vacio('CODEMP','Opdefemp','Ordamo','001');
    $q= new Criteria();
    $q->add(OpordpagPeer::NUMORD,$this->getRequestParameter('codigo'));
    $q->add(OpordpagPeer::CEDRIF,$this->getRequestParameter('cedrif'));
    $q->add(OpordpagPeer::TIPCAU,$ordamo);
    $q->add(OpordpagPeer::STATUS,'I');
    $reg= OpordpagPeer::doSelectOne($q);
    if (!$reg)
      $javascript="alert_('La Orden de Amortizaci&oacute;n no Existe o Fue Anulada'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
    else{
        $fecha=$this->getRequestParameter('fecemi');
        $dateFormat = new sfDateFormat('es_VE');
        $fec1 = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
        if ($fec1<$reg->getFecemi())
          $javascript="alert_('La Fecha de la Orden no puede ser menor a la fecha de la Orden de Amortizaci&oacute;n'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        else {
        $acum=0;
        $q= new Criteria();
        $q->add(OpordpagPeer::NUMORDAMO,$this->getRequestParameter('codigo'));
        $q->add(OpordpagPeer::STATUS,'A',Criteria::NOT_EQUAL);
        $q->addJoin(OpdetordPeer::NUMORD,OpordpagPeer::NUMORD);
        $resultado= OpdetordPeer::doSelect($q);
        if ($resultado)
        {
          foreach ($resultado as $obj) {
            $acum+= $obj->getMondes();
          }
        }
        $total=H::FormatoMonto($reg->getMonord());
        $resto=H::FormatoMonto(H::toFloat($total)-$acum);
        if ($resto==0)
          $javascript="alert_('La Orden de Amortizaci&oacute;n ya fue amortizada en su totalidad'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        else
         $javascript="$('opordpag_montoamo').value='".$total."'; $('opordpag_restoamo').value='".$resto."'";
      }
    }
    $output = '[["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='31')
  {
    $acum=0;
    $javascript="";
    $q= new Criteria();
    $q->add(OpordpagPeer::NUMORDAMO,$this->getRequestParameter('codigo'));
    $q->add(OpordpagPeer::STATUS,'N');
    $q->addJoin(OpdetordPeer::NUMORD,OpordpagPeer::NUMORD);
    $resultado= OpdetordPeer::doSelect($q);
    if ($resultado)
    {
      foreach ($resultado as $obj) {
        $acum+= $obj->getMondes();
      }     
    }
     $monord=H::getX_vacio('NUMORD','Opordpag','Monord',$this->getRequestParameter('codigo'));
      $dif=H::toFloat($monord)-$acum;
      $monamo=H::toFloat($this->getRequestParameter('monamo'));
       if ($dif==0)
            $javascript="alert_('La Orden de Amortizaci&oacute;n ya fue amortizada en su totalidad'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
      else if (H::toFloat($monamo)>H::toFloat($dif))
        $javascript="alert_('El Monto a Amortizar sobrepasa al monto de la orden de amortizaci&oacute;n');  $('$cajtexcom').value='0,00'; actualizarsaldos(); netos(); $('$cajtexcom').focus();";
    
    $output = '[["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='32')
  {
    $d = new Criteria();
    $d->add(CarecargPeer::CODRGO, $this->getRequestParameter('codigo'));
    $recargosreg = CarecargPeer::doSelectOne($d);
    if ($recargosreg) {
      $desrgo = $recargosreg->getNomrgo();
      $reccal = SolicituddeEgresos::CalcularRecargos($recargosreg->getTiprgo(), $recargosreg->getMonrgo(), H::toFloat($this->getRequestParameter('monart')));
      $reccalformat = H::FormatoMonto($reccal);
      $javascript="sumardatosgrid()";
    } else {
      $desrgo = "";
      $reccalformat = "0,00";
      $javascript = "alert('El Recargo no existe'); $('$cajtexcom').value='';";
    }
     $output = '[["' . $cajtexmos . '","' . $desrgo . '",""],["' . $this->getRequestParameter('moncal') . '","' . $reccalformat . '",""],["javascript","' . $javascript . '",""]]';
   
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else if ($this->getRequestParameter('ajax')=='33')
  {
    $javascript="";
    $codigo=$this->getRequestParameter('codigo');
     $c= new Criteria();
     $c->add(CpcomproPeer::REFCOM,$codigo);
     $datos= CpcomproPeer::doselectOne($c);
     if ($datos)
     {
      $descripcion=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($datos->getDescom()));
      $elrif=$datos->getCedrif();
      $dato=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars(OpbenefiPeer::getDato($elrif,'Nomben')));
      $dato1=OpbenefiPeer::getDato($elrif,'Codcta');
      $dato2=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars(OpbenefiPeer::getDato2($dato1,'Descta')));
      $comple='';
      $pw= new Criteria();
      $pw->add(CaordcomPeer::ORDCOM,$codigo);
      $regpw= CaordcomPeer::doSelectOne($pw);
      if ($regpw)
      {
        $ordcom=$regpw->getOrdcom();
        $codfinan=$regpw->getTipfin();
        $nomfin=H::getX_vacio('CODFIN','Fortipfin','Nomext',$codfinan);
        $codunid=$regpw->getCoduni();
        $nomuo=H::getX_vacio('CODUBI','Bnubica','Desubi',$codunid);
        $comple=',["opordpag_coduni","'.$codunid.'",""],["opordpag_desubi","'.$nomuo.'",""],["opordpag_tipfin","'.$codfinan.'",""],["opordpag_nomext2","'.$nomfin.'",""]';
      }

      $output = '[["opordpag_desord","'.$descripcion.'",""],["opordpag_cedrif","'.$elrif.'",""],["opordpag_nomben","'.$dato.'",""],["opordpag_ctapag","'.$dato1.'",""],["opordpag_descta","'.$dato2.'",""],["javascript","'.$javascript.'",""]'.$comple.']';
     }else
     $output = '[["javascript","'.$javascript.'",""]]';
    
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else if ($this->getRequestParameter('ajax')=='34')
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
  else if ($this->getRequestParameter('ajax')=='35')
  {
     $javascript="";
     $codigo=$this->getRequestParameter('codigo');
     $c= new Criteria();
     $c->add(HcregconhcmPeer::GENOP,true);
     $c->add(CaproveePeer::RIFPRO,$codigo);
     $c->addJoin(CaproveePeer::RIFPRO, HcregconhcmPeer::RIFPRO);
     $datos= CaproveePeer::doselectOne($c);
     if ($datos)
     {      
      $dato=$datos->getNompro();      
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
     }else {
      $javascript="alert('El Rif Clinica no Existe o no esta asociado a un consumo HCM'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";
      $output = '[["javascript","'.$javascript.'",""]]';
     }
    
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='36')
  {   
    $this->ajax='';
    $this->div='REFHCM'; // div grid de la referencia de HCM    
    $msj="";

    $defhcm = HcdefgenPeer::doSelectOne(new Criteria());
    if ($defhcm)
      $codprehcm=$defhcm->getCodpre();
    else $codprehcm='';
    if ($codprehcm!='') {
      $dateFormat = new sfDateFormat('es_VE');
      $fechas = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

      $dateFormat = new sfDateFormat('es_VE');
      $fecdes = $dateFormat->format($this->getRequestParameter('fechades'), 'i', $dateFormat->getInputPattern('d'));
    
      $this->configGridHCM($this->getRequestParameter('rifclini'),$fecdes, $fechas);
      
      if ($this->numfila==0)
        $msj="alert_('No se encontraron datos')";
    }else {
      $msj="alert_('Se debe definir el C&oacute;digo Presupuestario de HCM');";
       $this->configGridHCM();
    }

    $output = '[["fila","'.$this->numfila.'",""],["opordpag_codprehcm","'.$codprehcm.'",""],["ajaxs","6",""],["javascript","'.$msj.'",""]]';
    
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }
  else  if ($this->getRequestParameter('ajax')=='37')
  {   
    $this->ajax='';
    $this->div='CARNOM'; // div grid de Nóminas filtradas  
    $msj="";
    $codnom=$this->getRequestParameter('codnom');
    if ($this->getRequestParameter('especial_S')=='true')
      $especial='S';
    else $especial='N';
    $codban=$this->getRequestParameter('codban'); 
    $codnomesp=$this->getRequestParameter('codnomesp');    

      if ($this->getRequestParameter('fecnom')!='') {
        $dateFormat = new sfDateFormat('es_VE');
        $fecnom = $dateFormat->format($this->getRequestParameter('fecnom'), 'i', $dateFormat->getInputPattern('d'));
      }else $fecnom='';
    
      $this->configGridNomina($codnom,$fecnom, $especial,$codnomesp,$codban);
      
      if ($this->numfilnom==0)
        $msj="alert_('No se encontraron datos')";
    

    $output = '[["ajaxs","6",""],["numfilnom","'.$this->numfilnom.'",""],["javascript","'.$msj.'",""]]';
    
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')'); 
  }else  if ($this->getRequestParameter('ajax')=='38')
  {
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'viaticos', 'viasolviatra');
    $filsoldir2=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
    $codigo=$this->getRequestParameter('codigo');

    $q= new Criteria();
    if ($filsoldir=='S' || $filsoldir2=='S'){
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
  }else  if ($this->getRequestParameter('ajax')=='39')
  {
    $codigo=$this->getRequestParameter('opordpag[numord]');
    $numcue=$this->getRequestParameter('opordpag[ctaban]');
    $reflib=$this->getRequestParameter('opordpag[numche]');
    $tipmov=$this->getRequestParameter('opordpag[tipmov]');

    $q= new Criteria();
    $q->add(TsmovlibPeer::NUMCUE,$numcue);
    $q->add(TsmovlibPeer::REFLIB,$reflib);
    $q->add(TsmovlibPeer::TIPMOV,$tipmov);
    $regq= TsmovlibPeer::doSelectOne($q);
    if ($regq){
      $q1= new Criteria();
      $q1->add(OpordpagPeer::NUMORD,$codigo);
      $reg= OpordpagPeer::doSelectOne($q1);
      if ($reg)
      {
         $reg->setCtaban($regq->getNumcue());
         $reg->setNumche($regq->getReflib());
         $reg->setFecpag($regq->getFeclib());
         $reg->setMonpag($regq->getMonmov());
         $reg->setStatus('I');
         $reg->save();

         $opordche_new= new Opordche();
         $opordche_new->setNumord($codigo);
         $opordche_new->setNumche($regq->getFeclib());
         $opordche_new->setCodcta($regq->getNumcue());
         $opordche_new->setTipmov($regq->getTipmov());
         $opordche_new->setMonpag($regq->getMonmov());
         $opordche_new->save();

       $js="alert_('La Orden de Pago fue Pagada'); $('opordpag_ctaban').value='';  $('opordpag_nomcue3').value=''; $('opordpag_numche').value=''; $('opordpag_tipmov').value=''; $('opordpag_destip4').value=''; $('btnactpag').hide(); $('divpagado').hide(); f=document.sf_admin_edit_form; f.action='/tesoreria'+getEnv()+'.php/pagemiord/list'; f.submit();";
      }
    }else {
      $js="alert_('El Movimiento en Libro no esta registrado'); $('opordpag_ctaban').value=''; $('opordpag_nomcue3').value=''; $('opordpag_numche').value='';  $('opordpag_tipmov').value=''; $('opordpag_destip4').value=''; ";
    }
    $output = '[["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }else  if ($this->getRequestParameter('ajax')=='40')
  {
    $codigo=$this->getRequestParameter('codigo');
    $js="";
    $q= new Criteria();
    $q->add(TstipmovPeer::CODTIP,$codigo);
    $reg= TstipmovPeer::doSelectOne($q);
    if ($reg)
    {
       $dato=$reg->getDestip();         
    }else {
         $js="alert_('El Tipo de Movimiento no existe'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
    }
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }else  if ($this->getRequestParameter('ajax')=='41')
  {
    $codigo=$this->getRequestParameter('codigo');
    $js="";
    $q= new Criteria();
    $q->add(TsdefbanPeer::NUMCUE,$codigo);
    $reg= TsdefbanPeer::doSelectOne($q);
    if ($reg)
    {
       $dato=$reg->getNomcue();         
    }else {
         $js="alert_('La Cuenta Bancaria no existe'); $('$cajtexcom').value='';  $('$cajtexmos').value=''; $('$cajtexcom').focus();";
    }
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxfactura()
  {
    $javascript="";
    if ($this->getRequestParameter('id')=="")
    {
      $this->configGridApliret();
      $retenciones=Herramientas::CargarDatosGrid($this,$this->obj5,true);
      if ($this->getRequestParameter('opordpag[vacio]')=='')
      {
      OrdendePago::facturar($this->getRequestParameter('opordpag[numord]'),$this->getRequestParameter('id'),$retenciones,$this->getRequestParameter('referencia2'),$eliva,$elislr,$elirs,$eltimbre,$msj,$arreglo1,$arreglo2,$arreglo3,$arreglo4,$elimn,$codiva,$codislr,$codirs,$codimn,$codaxmil);
      if ($msj=='')
      { $this->div='Fac';
        $this->codiva=$codiva;
        $this->codislr=$codislr;
        $this->codirs=$codirs;
        $this->codimn=$codimn;
        $this->codunomil=$codaxmil;
        $this->indiva=H::BuscarIndice($arreglo1,$codiva);
        $this->indislr=H::BuscarIndice($arreglo2,$codislr);
        $this->indirs=H::BuscarIndice($arreglo3,$codirs);       
        $this->indimn=H::BuscarIndice($arreglo4,$codimn);
        $this->configGridFactura('',$arreglo1,$arreglo2,$arreglo3,$arreglo4);
        $output = '[["eliva","'.$eliva.'",""],["elislr","'.$elislr.'",""],["elirs","'.$elirs.'",""],["eltimbre","'.$eltimbre.'",""],["msj","'.$msj.'",""],["opordpag_vacio","1",""],["elimn","'.$elimn.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      }else
      {
          $output = '[["nota","'.$msj.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
        }
      }else
      {
        $javascript="";
        $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
    }
    else
    {
      $this->configGridConsulret($this->getRequestParameter('opordpag[numord]'));
      $retenciones=Herramientas::CargarDatosGrid($this,$this->obj3,true);
      if ($this->getRequestParameter('opordpag[vacio]')=='')
      {
      OrdendePago::facturar($this->getRequestParameter('opordpag[numord]'),$this->getRequestParameter('id'),$retenciones,$this->getRequestParameter('referencia2'),$eliva,$elislr,$elirs,$eltimbre,$msj,$arreglo1,$arreglo2,$arreglo3,$arreglo4,$elimn,$codiva,$codislr,$codirs,$codimn,$codaxmil);
      if ($msj=='')
      { $this->div='Fac';
        $this->codiva=$codiva;
        $this->codislr=$codislr;
        $this->codirs=$codirs;
        $this->codimn=$codimn;
        $this->codunomil=$codaxmil;
        $this->indiva=H::BuscarIndice($arreglo1,$codiva);
        $this->indislr=H::BuscarIndice($arreglo2,$codislr);
        $this->indirs=H::BuscarIndice($arreglo3,$codirs);       
        $this->indimn=H::BuscarIndice($arreglo4,$codimn);
        $this->configGridFactura($this->getRequestParameter('opordpag[numord]'),$arreglo1,$arreglo2,$arreglo3,$arreglo4);
        $output = '[["eliva","'.$eliva.'",""],["elislr","'.$elislr.'",""],["elirs","'.$elirs.'",""],["eltimbre","'.$eltimbre.'",""],["msj","'.$msj.'",""],["opordpag_vacio","1",""],["elimn","'.$elimn.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      }else
      {
          $output = '[["nota","'.$msj.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
        }
      }
      else
      {
        $javascript="";
        $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
    }
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
    $this->opordpag = $this->getOpordpagOrCreate();
    $this->updateOpordpagFromRequest();
    $concom=0;
    $mensaje1="";
    $msj1="";
    $msj2="";
    $cuentaporpagarrendicion="";
    $mensajeuno="";
    $msjuno="";
    $msjdos="";
    $msjtres="";
    $comprobante="";
    $this->mensajeuno="";
    $this->msj1="";
    $this->msj2="";
    $this->mensaje1="";
    $this->msjuno="";
    $this->msjdos="";
    $this->msjtres="";
    $this->i="";
    $this->formulario=array();
    $detalle=Herramientas::CargarDatosGrid($this,$this->obj);
    $retenc=Herramientas::CargarDatosGrid($this,$this->obj5,true);
     if ($this->opordpag->getAfectapre()==1)
     {
     if ($this->opordpag->getCedrif()=="" || $this->opordpag->getCtapag()=="" || count($detalle[0])==0)
     {
        $msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Beneficiario, el Código Contable y las Imputaciones Presupuestarias, para luego generar el comprobante";
      }
    }
     else{
     if ($this->opordpag->getCedrif()=="" || $this->opordpag->getCtapag()=="" || H::toFloat($this->opordpag->getNeto())<=0)
     {
        $msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Beneficiario, el Código Contable ó si el Monto Neto a Pagar es mayor a cero, para luego generar el comprobante";
      }
    }

     if ($this->getRequestParameter('opordpag[documento]')=="C" || $this->getRequestParameter('opordpag[documento]')=="P")
     {
      if ($this->getRequestParameter('generactaord')=='S')
      {
        $x=OrdendePago::grabarComprobanteOrden($this->opordpag,$this->getRequestParameter('tipoben'),$mensaje1,$msj1,$msj2,$comprobante);
        $concom=$concom + 1;
      }
    }

     if ($mensaje1=="" && $msj1=="" && $msj2=="" && $msjtres=="")
     {
      $c= new Criteria();
      $reg= OpdefempPeer::doSelectOne($c);
       if ($reg)
       {
        /*if ($reg->getGencomalc()=='S')
         {
          $x=OrdendePago::grabarComprobanteAlc($this->opordpag,&$mensajeuno,&$msjuno,&$msjdos,&$comprobante);
         }
         else
         {*/
         if ($reg->getOrdant()!='' && $reg->getOrdant()==$this->opordpag->getTipcau())
          $x=OrdendePago::grabarComprobanteDeuAnt($this->opordpag,$detalle,$comprobante);
         else 
        $x=OrdendePago::grabarComprobante($this->opordpag,$detalle,$cuentaporpagarrendicion,$mensajeuno,$msjuno,$msjdos,$comprobante,$retenc);
        //}
      }
      $concom=$concom + 1;

      if ($mensajeuno=="" && $msjuno=="" && $msjdos=="")
      {

        $form="sf_admin/pagemiord/confincomgen";
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
        $this->mensajeuno=$mensajeuno;
        $this->msjuno=$msjuno;
        $this->msjdos=$msjdos;
      }
    }
     else
     {
      $this->mensaje1=$mensaje1;
      $this->msj1=$msj1;
      $this->msj2=$msj2;
      $this->msjtres=$msjtres;
    }
    $output = '[["opordpag_totalcomprobantes","'.$concom.'",""],["opordpag_cuentarendicion","'.$cuentaporpagarrendicion.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

  public function executeAutocomplete()
  {
  if ($this->getRequestParameter('ajax')=='2')
  {
      $this->tags=Herramientas::autocompleteAjax('CEDRIF','Opbenefi','Cedrif',$this->getRequestParameter('opordpag[cedrif]'));
    }
  else  if ($this->getRequestParameter('ajax')=='3')
  {
      $this->tags=Herramientas::autocompleteAjax('CODCONCEPTO','Opconpag','Codconcepto',$this->getRequestParameter('opordpag[codconcepto]'));
    }
  else  if ($this->getRequestParameter('ajax')=='4')
  {
      $this->tags=Herramientas::autocompleteAjax('CODUBI','Bnubica','Codubi',$this->getRequestParameter('opordpag[coduni]'));
    }
    else  if ($this->getRequestParameter('ajax')=='5')
  {
      $this->tags=Herramientas::autocompleteAjax('CODFIN','Fortipfin','Codfin',$this->getRequestParameter('opordpag[tipfin]'));
    }
    else if ($this->getRequestParameter('ajax')=='6')
    {
      $this->docrefiere=CpdoccauPeer::getRefier($this->getRequestParameter('tipcau'));
      if ($this->docrefiere=='P')
      {
        $this->tags=Herramientas::autocompleteAjax('REFPRC','Cpprecom','Refprc',$this->getRequestParameter('refere'));
      }
      else if ($this->docrefiere=='C')
      {
        $this->tags=Herramientas::autocompleteAjax('REFCOM','Cpcompro','Refcom',$this->getRequestParameter('refere'));
      }
    }
    else  if ($this->getRequestParameter('ajax')=='7')
    {
      $this->tags=Herramientas::autocompleteAjax('CODMOTANU','Tsmotanu','Codmotanu',$this->getRequestParameter('opordpag[codmotanu]'));
    }
    else  if ($this->getRequestParameter('ajax')=='8')
    {
      $this->tags=Herramientas::autocompleteAjax('NUMCUE','Tsdefban','Numcue',$this->getRequestParameter('opordpag[numcta]'));
    }
    else  if ($this->getRequestParameter('ajax')=='9')
    {
      $this->tags=Herramientas::autocompleteAjax('TIPPAG','Cpdocpag','Tippag',$this->getRequestParameter('opordpag[tipdoc]'));
    }
  }

  public function setVars()
  {
    $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->loncta=strlen($this->mascara);
    $this->mascaraubi = Herramientas::ObtenerFormato('Opdefemp','Forubi');
    $this->lonubi=strlen($this->mascaraubi);
    $this->mascarapresupuesto = Herramientas::formatoPresupuesto();
    OrdendePago::formload($afectarecargo,$ordpagnom,$ordpagapo,$ordpagliq,$ordpagfid,$ordpagval,$compadic,$genctaord,$ordpagcre,$ordpagsolpag,$ordpaghcm);
    Herramientas::obtenerFormatoCategoria($formatopar,$iniciopartida);
    $this->afectarec=$afectarecargo;
    $this->formatpar=$formatopar;
    $this->iniciopar=$iniciopartida;
    $this->ordpagnom=$ordpagnom;
    $this->ordpagapo=$ordpagapo;
    $this->ordpagliq=$ordpagliq;
    $this->ordpagfid=$ordpagfid;
    $this->ordpagval=$ordpagval;
    $this->compadic=$compadic;
    $this->genctaord=$genctaord;
    $this->ordpagcre=$ordpagcre;
    $this->ordpagsolpag=$ordpagsolpag;
    $this->ordpaghcm=$ordpaghcm;
    $this->unidad=Herramientas::getX('CODEMP','Opdefemp','Unitri','001');
    //$this->anoini=substr(Herramientas::getX('CODEMP','Cpdefniv','fecini','001'),0,4);
    //$this->anocie=substr(Herramientas::getX('CODEMP','Cpdefniv','feccie','001'),0,4);
    OrdendePago::partida($partidas);
    $this->esta=$partidas;
    $this->color='';
    $this->eti="";
    $c= new Criteria();
    $dato= OpdefempPeer::doSelectOne($c);
    if ($dato) $this->genordret=$dato->getGenordret(); else $this->genordret="";

    $this->comprobaut="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('generales',$varemp))
	{
		if(array_key_exists('comprobaut',$varemp['generales']))
		{
          $this->comprobaut=$varemp['generales']['comprobaut'];
        }
        $this->impcpt='';
		if(array_key_exists('impcpt',$varemp['generales']))
		{
          $this->impcpt=$varemp['generales']['impcpt'];
        }
      }

    $this->numdesh="";
    $this->mansolocor="";
    $this->bloqfec="";
    $this->oculeli="";
    if ($varemp){
      $this->numdesh = H::getConfApp('numorddesh', 'tesoreria', 'pagemiord');
      $this->mansolocor = H::getConfApp('mansolocor', 'tesoreria', 'pagemiord');
      $this->bloqfec = H::getConfApp('bloqfec', 'tesoreria', 'pagemiord');
      $this->oculeli = H::getConfApp('oculeli', 'tesoreria', 'pagemiord');
    }


  }

  public function validarGeneraComprobante()
  {
    $concom=$this->getRequestParameter('opordpag[totalcomprobantes]');
    $form="sf_admin/pagemiord/confincomgen";
    if ($concom!=1)
    {
      $grabo=$this->getUser()->getAttribute('grabo',null,$form.'1');
    }
    else
    {
      $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
    }
    if ($grabo=='')
    { return true;}
    else { return false;}
    }

  public function executeAnular()
  {
    $this->referencia="########";//$this->getRequestParameter('referencia');
    $numord=$this->getRequestParameter('numord');
    $fecemi=$this->getRequestParameter('fecemi');
    $this->compadic=$this->getRequestParameter('compadic');
    $q= new Criteria();
    $regi= OpdefempPeer::doSelectOne($q);
    if ($regi)
    {
      $this->tienemot=$regi->getOrdmotanu();
    }else $this->tienemot="";


    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecemi, 'i', $dateFormat->getInputPattern('d'));

    $c = new Criteria();
    $c->add(OpordpagPeer::NUMORD,$numord);
    $c->add(OpordpagPeer::FECEMI,$fec);
    $this->opordpag = OpordpagPeer::doSelectOne($c);
    sfView::SUCCESS;
  }

  public function executeSalvaranu()
  {
    $numord=$this->getRequestParameter('numord');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');
    $codmotanu=$this->getRequestParameter('codmotanu');
    $compadic=$this->getRequestParameter('compadic');
    $this->msg='';
    $this->msg2='';
    $this->setVars();
    $fecha_aux=split("/",$fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

    $fecemi=H::getX('Numord', 'Opordpag', 'Fecemi', $numord);
    if ($fec<$fecemi)
    {
      $this->msg2="La Fecha de Anulación no puede ser menor a la Fecha de Emisión de la OP.";
      return sfView::SUCCESS;
    }
    elseif (Tesoreria::validaPeriodoCerrado($fecanu)==true)
    {
      $this->msg2="La Fecha no se encuentra de un Perido Contable Abierto.";
      return sfView::SUCCESS;
    }
    else {
      $c= new Criteria();
      $c->add(OpordpagPeer::NUMORD,$numord);
      $resul= OpordpagPeer::doSelectOne($c);
    if ($resul)
    {
      $afecau=H::getX_vacio('TIPCAU','Cpdoccau','Afecau',$resul->getTipcau());
      if((!Herramientas::validarPeriodoPresuesto($fecanu)) && $afecau=='S'){
         $this->msg2="La Fecha se encuentra dentro un Período Cerrado Presupuestariamente.";
         return sfView::SUCCESS;
      }else{
        $estaordche=H::getX_vacio('NUMORD','Opordche','Numord',$numord);
        if (($resul->getNumche()=='' || strlen($resul->getNumche())==0) &&  $estaordche=='')
        {
            $documentorefiere=Herramientas::getX('Tipcau','Cpdoccau','Refier',$resul->getTipcau());
          if ($documentorefiere=='C')
          {
              $b= new Criteria();
              $dato= OpdefempPeer::doSelectOne($b); 
            if ($dato)
            {
              if ($dato->getGenctaord()=='S')
              {
                  $numcom=$resul->getNumcom();
                if (OrdendePago::verificarStatusComprobante($numcom))
                {
                    $t=OrdendePago::anularComprobOrden($numcom,$fecanu,$desanu,$msj);
                  if ($msj!="")
                  { $this->msg=$msj;
                      return sfView::SUCCESS;
                    }
                  }
                else { $this->msg="No se puede anular la Orden, ya que el Comprobante de Orden asociado esta actualizado";
                  return sfView::SUCCESS;}
                  }
                }
              }

            OrdendePago::anularRetenciones($numord,$msJ,$puede_eliminar);
          if ($msJ!="")
          {
              $this->msg=$msJ;
              return sfView::SUCCESS;
            }

          if ($puede_eliminar)
          {
              OrdendePago::anularCausado($numord,$fecanu,$desanu);
            if ($resul->getNumcom()!="")
            {
                $numerocomp=$resul->getNumcom();
                $statuscodigo=Herramientas::getX('Codubi','Bnubica','Stacod',$resul->getCoduni());
              if ($statuscodigo=='C'){ $generaotro=true;}else{ $generaotro=false;}
                OrdendePago::anularComprob($numerocomp,$fecanu,$desanu,$compadic,$generaotro,$msjs,$desanu);
              if ($msjs!="")
              {
                  $this->msg=$msjs;
                  return sfView::SUCCESS;
                }
              }
            else
            {
                $cri= new Criteria();
                $dato= OpdefempPeer::doSelectOne($cri);
                if ($dato)
                {
                	if ($resul->getTipcau()!=$dato->getOrdret())
                  {
                    $this->msg="El Comprobante no será eliminado, ya que se perdió la asociación con Contabilidad";
                    return sfView::SUCCESS;
                  }
                }

              }
            if ($resul->getNumcomapr()!="")
            {
              OrdendePago::anularComprobTes($resul->getNumcomapr(),$fecanu,$desanu,$msjs);
              if ($msjs!="")
              {
                $this->msg=$msjs;
                return sfView::SUCCESS;
              }
            }
              OrdendePago::eliminarOPP($numord);
              Herramientas::EliminarRegistro('Opfactur','Numord',$numord);
           if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
           { $resul->setFecanu($fec);}
              $resul->setCodmotanu($codmotanu);
              $resul->setDesanu($desanu);
              $resul->setUsuanu($this->getUser()->getAttribute('loguse'));
              $resul->setStatus('A');
              $resul->save();

              $sql="Update Npliquidacion_det set numord='' where numord='".$numord."'";
              Herramientas::insertarRegistros($sql);

              $sql2="Update Npordfid set numord='' where numord='".$numord."'";
              Herramientas::insertarRegistros($sql2);

              $sql2="Update hcregconhcm set statop='N', numord=null where numord='".$numord."'";
              Herramientas::insertarRegistros($sql2);

              if ($resul->getTipcau()==$this->ordpagnom){
                  $sql2="Update nphiscon set numord='' where numord='".$numord."'";
                  Herramientas::insertarRegistros($sql2);
              }

            }
          else
          {
              $this->msg="La Orden no fue anulada";
              return sfView::SUCCESS;
            }
          }
          else
          {
            $this->msg="La Orden ya fue Pagada en el Módulo de Bancos";
            return sfView::SUCCESS;
          }
       }
      }
    }
    return sfView::SUCCESS;
  }

  public function executeEliminar()
  {
    $numord=$this->getRequestParameter('numord');
    $tipcau=$this->getRequestParameter('tipcau');
    $compadic=$this->getRequestParameter('compadic');
    $coduni=$this->getRequestParameter('coduni');
    $this->msg='';
    $this->setVars();
    $numord=str_replace('*','+',$numord);
    //print $numord; exit;

   if ($this->getUser()->getAttribute('confcorcom')=='N')
   { $numero2="PR".substr($numord,2,6);}
   else
   {
      $reftra="PR".substr($numord,2,6);
      $t= new Criteria();
      $t->add(ContabcPeer::REFTRA,$reftra);
      $resul= ContabcPeer::doSelectOne($t);
   	if ($resul)
   	{
        $numero2=$resul->getNumcom();
      }
    else { $numero2=""; }
      }

    $c= new Criteria();
    $c->add(OpordpagPeer::NUMORD,$numord);
    $data= OpordpagPeer::doSelectOne($c);
    if ($data)
    {
      $numero=$data->getNumcom();
      $afecau=H::getX_vacio('TIPCAU','Cpdoccau','Afecau',$data->getTipcau());
      $fecha=date('d/m/Y',strtotime($data->getFecemi()));
      if((!Herramientas::validarPeriodoPresuesto($fecha)) && $afecau=='S'){
         return $this->msj="La Fecha se encuentra dentro un Período Cerrado Presupuestariamente.";
      }
    }

    //Verificar si la orden de pago es de retencion, si es asi se puede eliminar sin verificar los comprobantes contables
    //ya que las ordenes de pago de retención no tienen comprobantes contables asociados
    $ordret=H::getX('codemp','Opdefemp','Ordret','001');
    if ($tipcau==$ordret){
      $c=new Criteria();
      $c->add(OpretordPeer::NUMRET,$numord);
      $datosret=OpretordPeer::doSelectOne($c);
	    if ($datosret)
	    {
        $c= new Criteria();
        $c->add(OpordpagPeer::NUMORD,$numord);
        $data= OpordpagPeer::doSelectOne($c);
	    if ($data)
	    {
	      if (($data->getNumche()=='') || (strlen($data->getNumche())==0))
	      {
              if (H::getX_vacio('REFERE', 'Cpajuste', 'refere', $data->getNumord())=='') {
                    OrdendePago::eliminarRetenciones($numord,$puedeeliminar,$msjs);
                    Herramientas::EliminarRegistro('Opdetord','Numord',$data->getNumord());
                    OrdendePago::eliminarCausado($data->getNumord());
                    OrdendePago::eliminarOrdenRetencion($data->getNumord());
                    OrdendePago::eliminarOPP($data->getNumord());
                    Herramientas::EliminarRegistro('Opfactur','Numord',$data->getNumord());

                    $sql="Update Npliquidacion_det set numord='' where numord='".$numord."'";
                    Herramientas::insertarRegistros($sql);

                    $sql2="Update Npordfid set numord='' where numord='".$numord."'";
                    Herramientas::insertarRegistros($sql2);

                    $sql2="Update hcregconhcm set statop='N', numord=null where numord='".$numord."'";
                    Herramientas::insertarRegistros($sql2);

                    $data->delete();
          }else { return $this->msj="El Causado de la Orden tiene un Ajuste";}
              }
          
	      else { return $this->msj="La Orden ya fue pagada en el Módulo de Bancos";}
        }//  if ($data)
      }// if ($datosret)
      else {
        $c= new Criteria();
        $c->add(OpordpagPeer::NUMORD,$numord);
        $data= OpordpagPeer::doSelectOne($c);
			    if ($data)
			    {
			      if (($data->getNumche()=='') || (strlen($data->getNumche())==0))
			      {
            OrdendePago::eliminarRetenciones($numord,$puedeeliminar,$msjs);
            Herramientas::EliminarRegistro('Opdetord','Numord',$data->getNumord());
            OrdendePago::eliminarCausado($data->getNumord());
            OrdendePago::eliminarOrdenRetencion($data->getNumord());
            OrdendePago::eliminarOPP($data->getNumord());
            Herramientas::EliminarRegistro('Opfactur','Numord',$data->getNumord());

            $sql="Update Npliquidacion_det set numord='' where numord='".$numord."'";
            Herramientas::insertarRegistros($sql);

            $sql2="Update Npordfid set numord='' where numord='".$numord."'";
            Herramientas::insertarRegistros($sql2);

            $sql2="Update hcregconhcm set statop='N', numord=null where numord='".$numord."'";
            Herramientas::insertarRegistros($sql2);

            $data->delete();
          }
			      else { return $this->msj="La Orden ya fue pagada en el Módulo de Bancos";}
          }
        }
      }
    else //orden de pago normal
    {
      $c= new Criteria();
      $c->add(OpordpagPeer::NUMORD,$numord);
      $opordpag= OpordpagPeer::doSelectOne($c);
       if ($opordpag)
       {
        $f= new Criteria();
        $f->add(TsdetpagelePeer::NUMORD,$numord);
        $f->add(TspagelePeer::ESTPAG,'N',Criteria::NOT_EQUAL);        
        $f->addJoin(TsdetpagelePeer::REFPAG,TspagelePeer::REFPAG);
        $estpagele= TsdetpagelePeer::doSelectOne($f);
        if ($estpagele)
        {
          return $this->msj="La Orden esta Asociada a un Pago Electronico no se puede Eliminar";
        }else {
        $fecemi=date('d/m/Y',strtotime($opordpag->getFecemi()));
        if (Tesoreria::validaPeriodoCerrado($fecemi)==false)
        {
          $c= new Criteria();
          $c->add(OpordpagPeer::NUMORD,$numord);
          $data= OpordpagPeer::doSelectOne($c);
          if ($data)
          {
            if (($data->getNumche()=='') || (strlen($data->getNumche())==0))
            {
              $documento=Herramientas::getX('Tipcau','Cpdoccau','Refier',$tipcau);
            if ($documento=='C')
            {
                $b= new Criteria();
                $dato= OpdefempPeer::doSelectOne($b);
              if ($dato)
              {
                if ($dato->getGenctaord()=='S')
                {
                  //if (OrdendePago::verificarStatusComprobante($numero2))
                  //{
                      Herramientas::EliminarRegistro('Contabc1','Numcom',$numero2);
                      Herramientas::EliminarRegistro('Contabc','Numcom',$numero2);
                    //}
                  //else { return $this->msj="No se eliminar ya que el comprobante de orden asociado esta actualizado";}
                    }
                  }
                }
            if ($opordpag->getNumcomapr()!='') {
              if (OrdendePago::verificarStatusComprobante($opordpag->getNumcomapr()))
              {
                Herramientas::EliminarRegistro('Contabc1','Numcom',$opordpag->getNumcomapr());
                Herramientas::EliminarRegistro('Contabc','Numcom',$opordpag->getNumcomapr());
              }
              else { return $this->msj="No se eliminar ya que el comprobante de Aprobacion asociado esta actualizado";}
            }

              OrdendePago::eliminarRetenciones($numord,$puedeeliminar,$msjs);
            if ($msjs!="")
            {
                return $this->msj=$msjs;
              }
            if ($puedeeliminar)
            {
              if ($data->getNumcom()!='')
              {
                  $numcomprob=$data->getNumcom();
                  OrdendePago::eliminarComprob($data->getFecemi(),$numcomprob);
                }
              else
              {
                  $cri= new Criteria();
                  $datos= OpdefempPeer::doSelectOne($cri);
	              if ($datos)
	              {
	              	if ($data->getTipcau()!=$datos->getOrdret())
	                {
                      return $this->msj="El Comprobante no puede ser Eliminado, ya que se perdio la asociacion con Contabilidad";
                    }
                }

                }

             // Actualizar salidas de Caja Chica
               $tq= new Criteria();
               $tq->add(OpdetordPeer::NUMORD,$data->getNumord());
               $datosq=OpdetordPeer::doSelect($tq);
               if ($datosq)
               {
                   foreach ($datosq as $objdat)
                   {
                       $cadenarefe=split(',',$objdat->getRefsal());
                        $r=0;
                        while ($r<(count($cadenarefe)))
                        {
                            $aux=$cadenarefe[$r];
                            $aq= new Criteria();
                            $aq->add(TssalcajPeer::REFSAL,$aux);
                            $dataq= TssalcajPeer::doSelectOne($aq);
                            if ($dataq)
                            {
                               $dataq->setStasal('P');
                               $dataq->save();
                            }

                            $r++;
                        }
                        if ($r==0)
                        {
                           $aq= new Criteria();
                           $aq->add(TssalcajPeer::REFSAL,$objdat->getRefsal());
                           $dataq= TssalcajPeer::doSelectOne($aq);
                           if ($dataq)
                           {
                               $dataq->setStasal('P');
                               $dataq->save();
                           }
                        }
                   }
               }                
                
                Herramientas::EliminarRegistro('Opdetord','Numord',$data->getNumord());
                OrdendePago::eliminarCausado($data->getNumord());
                OrdendePago::eliminarOrdenRetencion($data->getNumord());
                OrdendePago::eliminarOPP($data->getNumord());
                Herramientas::EliminarRegistro('Opfactur','Numord',$data->getNumord());

                $sql="Update Npliquidacion_det set numord='' where numord='".$numord."'";
                Herramientas::insertarRegistros($sql);

                $sql2="Update Npordfid set numord='' where numord='".$numord."'";
                Herramientas::insertarRegistros($sql2);
                
                $sql2="Update hcregconhcm set statop='N', numord=null where numord='".$numord."'";
                Herramientas::insertarRegistros($sql2);
                
                if ($data->getTipcau()==$this->ordpagnom){
                  $sql2="Update nphiscon set numord='' where numord='".$numord."'";
                  Herramientas::insertarRegistros($sql2);
                }
                
                $ideeli=$data->getId();
                $data->delete();
                $this->SalvarBitacora($ideeli ,'Elimino');


            }else { return $this->msj="La Orden no fue eliminada";}
          }else { return $this->msj="La Orden ya fue pagada en el Módulo de Bancos";}  
          } 
        }else { return $this->msj="La Fecha no se encuentra de un Perido Contable Abierto.";}
      }//estpagele es vacio
      }//if ($opordpag)    
    }//else orden de pago normal
  }


  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxretenciones()
  {
    $this->opordpag = $this->getOpordpagOrCreate();
    $this->updateOpordpagFromRequest();
    $retenciones= array();
    $grid=Herramientas::CargarDatosGrid($this,$this->obj3,true);
    $conret=$grid[0];
    $this->formulario=array();
    $this->i="";
    $i=0;
    $tiporet="";
    $cri= new Criteria();
    $dato= OpdefempPeer::doSelectOne($cri);
    if ($dato) $tiporet=$dato->getOrdret();
    while ($i<count($conret))
    {
      $f[$i]=$this->form.$i;
      if ($tiporet=="") $tiporet=$this->opordpag->getTipcau();
      $this->getUser()->setAttribute('tipo',$tiporet,$f[$i]);
      $desord=$this->opordpag->getNumord().' - '.$conret[$i]['destip'];
      $this->getUser()->setAttribute('concepto',$desord,$f[$i]);
      $this->getUser()->setAttribute('tiporet',$conret[$i]['codtip'],$f[$i]);
      $i++;
    }
    $this->i=count($conret)-1;
    $this->formulario=$f;
    $this->getUser()->getAttributeHolder()->remove('retencion','pagemiord');

    $output = '[["","",""],["","",""],["","",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

   public function getLabels()
  {
    $labels = parent::getLabels();
    $etiforma=H::getConfApp('nometifor', 'tesoreria', 'pagemiord');
    if ($etiforma!="")
      $labels['opordpag{numforpre}'] = $etiforma;
   
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['opordpag{coddirec}'] = 'Estado';
    return $labels;
  }

   protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['numord_is_empty']))
    {
      $criterion = $c->getNewCriterion(OpordpagPeer::NUMORD, '');
      $criterion->addOr($c->getNewCriterion(OpordpagPeer::NUMORD, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['numord']) && $this->filters['numord'] !== '')
    {
      $c->add(OpordpagPeer::NUMORD, '%'.strtr($this->filters['numord'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fecemi_is_empty']))
    {
      $criterion = $c->getNewCriterion(OpordpagPeer::FECEMI, '');
      $criterion->addOr($c->getNewCriterion(OpordpagPeer::FECEMI, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecemi']))
    {
      if (isset($this->filters['fecemi']['from']) && $this->filters['fecemi']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(OpordpagPeer::FECEMI, date('Y-m-d', $this->filters['fecemi']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecemi']['to']) && $this->filters['fecemi']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(OpordpagPeer::FECEMI, date('Y-m-d', $this->filters['fecemi']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(OpordpagPeer::FECEMI, date('Y-m-d', $this->filters['fecemi']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['tipcau_is_empty']))
    {
      $criterion = $c->getNewCriterion(OpordpagPeer::TIPCAU, '');
      $criterion->addOr($c->getNewCriterion(OpordpagPeer::TIPCAU, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['tipcau']) && $this->filters['tipcau'] !== '')
    {
      $c->add(OpordpagPeer::TIPCAU, '%'.strtr($this->filters['tipcau'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['cedrif_is_empty']))
    {
      $criterion = $c->getNewCriterion(OpordpagPeer::CEDRIF, '');
      $criterion->addOr($c->getNewCriterion(OpordpagPeer::CEDRIF, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['cedrif']) && $this->filters['cedrif'] !== '')
    {
      $c->add(OpordpagPeer::CEDRIF, '%'.strtr($this->filters['cedrif'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nomben_is_empty']))
    {
      $criterion = $c->getNewCriterion(OpordpagPeer::NOMBEN, '');
      $criterion->addOr($c->getNewCriterion(OpordpagPeer::NOMBEN, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomben']) && $this->filters['nomben'] !== '')
    {
      $c->add(OpordpagPeer::NOMBEN, '%'.strtr($this->filters['nomben'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['status_is_empty']))
    {
      $criterion = $c->getNewCriterion(OpordpagPeer::STATUS, '');
      $criterion->addOr($c->getNewCriterion(OpordpagPeer::STATUS, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['status']) && $this->filters['status'] !== '')
    {
      $c->add(OpordpagPeer::STATUS, '%'.strtr($this->filters['status'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codconcepto_is_empty']))
    {
      $criterion = $c->getNewCriterion(OpordpagPeer::CODCONCEPTO, '');
      $criterion->addOr($c->getNewCriterion(OpordpagPeer::CODCONCEPTO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codconcepto']) && $this->filters['codconcepto'] !== '')
    {
      $c->add(OpordpagPeer::CODCONCEPTO, '%'.strtr($this->filters['codconcepto'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['desord_is_empty']))
    {
      $criterion = $c->getNewCriterion(OpordpagPeer::DESORD, '');
      $criterion->addOr($c->getNewCriterion(OpordpagPeer::DESORD, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desord']) && $this->filters['desord'] !== '')
    {
      $c->add(OpordpagPeer::DESORD, '%'.strtr($this->filters['desord'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['numforpre_is_empty']))
    {
      $criterion = $c->getNewCriterion(OpordpagPeer::NUMFORPRE, '');
      $criterion->addOr($c->getNewCriterion(OpordpagPeer::NUMFORPRE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['numforpre']) && $this->filters['numforpre'] !== '')
    {
      $c->add(OpordpagPeer::NUMFORPRE, '%'.strtr($this->filters['numforpre'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['refcom_is_empty']))
    {
      $criterion = $c->getNewCriterion(OpordpagPeer::REFCOM, '');
      $criterion->addOr($c->getNewCriterion(OpordpagPeer::REFCOM, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['refcom']) && $this->filters['refcom'] !== '')
    {
      $c->add(OpdetordPeer::REFCOM, $this->filters['refcom']);
      $c->addJoin(OpordpagPeer::NUMORD,  OpdetordPeer::NUMORD);
      //$c->setIgnoreCase(true);
      $c->setDistinct();
    }
    if (isset($this->filters['monord_is_empty']))
    {
      $criterion = $c->getNewCriterion(OpordpagPeer::MONORD, '');
      $criterion->addOr($c->getNewCriterion(OpordpagPeer::MONORD, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['monord']) && $this->filters['monord'] !== '')
    {
      $c->add(OpordpagPeer::MONORD, $this->filters['monord']);
    }
  }  
}
