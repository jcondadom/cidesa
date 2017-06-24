<?php

/**
 * bieregactmued actions.
 *
 * @package    Roraima
 * @subpackage bieregactmued
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class bieregactmuedActions extends autobieregactmuedActions
{

  // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
   if ($this->getRequestParameter('ajax')=='1')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
      $result=array(); 
      $javascript="";
      $filcat=H::getConfApp2('filcat', 'bienes', 'bieregactmued');
      $sql="select a.codact as codigo_nivel,a.DesAct as activo, a.viduti as vida From bndefact a, bndefins b where length(RTrim(a.CodAct))=cast(b.LonAct as integer) and a.codact='".$this->getRequestParameter('codigo')."' and (codact like '" . $filcat . "%%') Order By codact";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $dato=$result[0]['codigo_nivel'];
      $dato1=$result[0]['activo'];
      $dato2=H::FormatoMonto($result[0]['vida']);
      
      
      $cormueact=H::getConfApp2('cormueact', 'bienes', 'bieregactmued');
      if ($cormueact=='S')
      {
           $t= new Criteria();           
           $t->add(BnregmuePeer::CODACT,$dato);
           $t->setLimit(1);
           $t->addDescendingOrderByColumn(BnregmuePeer::CODMUE);
           $reg= BnregmuePeer::doSelectOne($t);
           if ($reg)
           {
               $r=$reg->getCodmue()+1;
                $encontrado=false;
      	        while (!$encontrado)
      	        {
      	          $numero=str_pad($r, 10, '0', STR_PAD_LEFT);

      	          $sql="select codmue from bnregmue where codact='".$dato."' and codmue='".$numero."'";
      	          if (Herramientas::BuscarDatos($sql,$result))
      	          {
      	            $r=$r+1;
      	          }
      	          else
      	          {
      	            $encontrado=true;
      	          }
      	        }
               $codmue=$numero;
           }else $codmue='0000000001';
        $javascript="$('bnregmue_codmue').value='$codmue';";
      }
      
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","'.$dato1.'",""],["bnregmue_viduti","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';
    }
    else
    {
          $javascript="alert('El código no existe...');$('bnregmue_codact').value='';$('bnregmue_desmue').value='';$('bnregmue_codmue').value='';$('bnregmue_codact').focus();";
              $output = '[["javascript","'.$javascript.'",""]]';
    }


     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }

   elseif ($this->getRequestParameter('ajax')=='2')
   {
      $cajtexmos=$this->getRequestParameter('cajtexmos');
      $cajtexmos_uno=$this->getRequestParameter('cajtexmos_uno');
      $cajtexmos_dos=$this->getRequestParameter('cajtexmos_dos');
      $cajtexmos_tres=$this->getRequestParameter('cajtexmos_tres');
      $result=array();
      $filpar404 = H::getConfApp2('filpar404', 'bienes', 'bieregactmued');
      if ($filpar404=='S')
        $sql="Select a.ordcom as orden,a.codpro as proveedor, to_char(a.fecord,'dd/mm/yyyy') as fecha, b.nompro as nompro, a.desord from caordcom a, caprovee b, caartord c  where  a.codpro=b.codpro and a.ordcom=c.ordcom and a.ordcom='".$this->getRequestParameter('codigo')."' and b.estpro='A' and c.codpar like '404%' order By a.ordcom";
      else
        $sql="Select a.ordcom as orden,a.codpro as proveedor, to_char(a.fecord,'dd/mm/yyyy') as fecha, b.nompro as nompro, a.desord from caordcom a, caprovee b  where  a.codpro=b.codpro and a.ordcom='".$this->getRequestParameter('codigo')."' order By ordcom";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $dato=$result[0]['orden'];
      $dato1=$result[0]['proveedor'];
      $dato2=$result[0]['nompro'];
      $dato3=$result[0]['fecha'];
      $descripcion = H::getConfApp('descripcion','bienes','bieregactmued');
      !$descripcion? $descripcion='' : '';
      if($descripcion=='S')
      {
        $cajtexmos_cuatro='bnregmue_desmue';
        $dato4=$result[0]['desord'];
      }else
      {
        $cajtexmos_cuatro='';
        $dato4='';
      }     
      $cadena='';
      $numord=H::getX_vacio('REFCOM','Opdetord','Numord',$dato);
      if ($numord!=''){
        $q= new Criteria();
        $q->add(OpfacturPeer::NUMORD,$numord);
        $regfac= OpfacturPeer::doSelectOne($q);
        if ($regfac){
          $cadena=',["bnregmue_ordrcp","'.$regfac->getNumfac().'",""],["bnregmue_fecfac","'.date('d/m/Y',strtotime($regfac->getFecfac())).'",""],["bnregmue_nrocon","'.$regfac->getNumctr().'",""]';
        }
      }

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexmos_uno.'","'.$dato1.'",""],["'.$cajtexmos_dos.'","'.$dato2.'",""],["'.$cajtexmos_tres.'","'.$dato3.'",""],["'.$cajtexmos_cuatro.'","'.$dato4.'",""]'.$cadena.']';
    }
    else
    {
        $javascript="alert_('La Orden de Compra no existe o no es v&aacute;lida...');$('$cajtexmos').value='';$('$cajtexmos_uno').value='';$('$cajtexmos_dos').value='';$('$cajtexmos_tres').value='';$('$cajtexmos').focus();";
              $output = '[["javascript","'.$javascript.'",""]]';
    }
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='3')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $dato=""; $dato1=""; $javascript=""; $dato2="";
    $t= new Criteria();
    $t->add(BnubibiePeer::CODUBI,$this->getRequestParameter('codigo'));
    $reg= BnubibiePeer::doSelectOne($t);
    if ($reg)
    {
     $dato=$reg->getDesubi();
     $dato1=$reg->getCodubiadm();
     $dato2=H::getX('CODUBI','Bnubica','Desubi',$dato1);
    }else {$javascript="alert('La Ubicacion Fisica no existe'); $('bnregmue_codubi').value=''; $('bnregmue_codubi').focus();";}
    $output = '[["'.$cajtexcom.'","'.$dato.'",""],["bnregmue_codubiadm","'.$dato1.'",""],["desubiadm","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='4')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
        $dato=BndisbiePeer::getDesdis_descripcion(trim($this->getRequestParameter('codigo')));

    $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='5')
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
	      if ($cajtexmos=="bnregmue_nomrespat") $cajita="bnregmue_codrespat"; else $cajita="bnregmue_codresuso";
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
	      if ($cajtexmos=="bnregmue_nomrespat") $cajita="bnregmue_codrespat"; else $cajita="bnregmue_codresuso";
	      $javascript="alert('El código del empleado no existe...');$('$cajita').value=''";
	      $dato="";
	      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
	    }
        }
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='6')
   {
   	$id = $this->getRequestParameter('id');
   	$output = '[["","",""],["",""]]';
    if ($id!="")
    {
       $codigo = Bienes::GrabarMovimiento($id);
       $javascript="alert('$codigo' ); f = document.sf_admin_edit_form;
                    f.action = '/bienes'+getEnv()+'.php/bieregactmued/list';
                    f.submit();";
	     $output = '[["javascript","'.$javascript.'",""]]';
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='7')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');

    $l= new Criteria();
    $l->add(CatipproPeer::CODPRO,$this->getRequestParameter('codigo'));
    $reg= CatipproPeer::doSelectOne($l);
    if ($reg)
    {
      $dato=$reg->getDespro();
      $javascript="";
    }
     else {
     	$javascript="alert('El Proyecto no existe'); $('$cajtexcom').value='';"; $dato="";
     }
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;

   }
   elseif ($this->getRequestParameter('ajax')=='8')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $javascript="";
    $c= new Criteria();
    $c->add(OpordpagPeer::NUMORD,$this->getRequestParameter('codigo'));
    $reg= OpordpagPeer::doSelectOne($c);
    if (!$reg)
     { $javascript="alert('El Numero de Orden de Pago no existe'); $('$cajtexcom').value=''; "; }
    else {
      $numfac=H::getX_vacio('NUMORD', 'Opfactur', 'Numfac', $reg->getNumord());
      $javascript="$('bnregmue_ordrcp').value='$numfac'; "; 
    }

    $output = '[["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
   elseif ($this->getRequestParameter('ajax')=='9')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $dato=BnubicaPeer::getDesubi($this->getRequestParameter('codigo'));

    $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='10')
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
        $js="alert('El Estado de Conservación no existe'); $('$cajtexmos').value='', $('$cajtexmos').focus();";
    
    $output = '[["'.$cajtexcom.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='11')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $js="";
    $dato="";
    
    $r= new Criteria();
    $r->add(BnmodtraPeer::CODMOD,$this->getRequestParameter('codigo'));
    $reg= BnmodtraPeer::doSelectOne($r);
    if ($reg)
        $dato=$reg->getDesmod();
    else
        $js="alert('El Modo de Transporte no existe'); $('$cajtexmos').value='', $('$cajtexmos').focus();";
    
    $output = '[["'.$cajtexcom.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='12')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $js="";
    $dato="";
    
    $r= new Criteria();
    $r->add(TsdefbanPeer::NUMCUE,$this->getRequestParameter('codigo'));
    $reg= TsdefbanPeer::doSelectOne($r);
    if ($reg)
        $dato=$reg->getNomcue();
    else
        $js="alert('La Cuenta Bancaria no existe'); $('$cajtexmos').value='', $('$cajtexmos').focus();";
    
    $output = '[["'.$cajtexcom.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='13')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $js="";
    $dato="";
    
    $r= new Criteria();
    $r->add(TstipmovPeer::CODTIP,$this->getRequestParameter('codigo'));
    $reg= TstipmovPeer::doSelectOne($r);
    if ($reg)
        $dato=$reg->getDestip();
    else
        $js="alert('El Tipo de Movimiento no existe'); $('$cajtexmos').value='', $('$cajtexmos').focus();";
    
    $output = '[["'.$cajtexcom.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='14')
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
        if ($cajtexmos=="bnregmue_nomrespat") $cajita="bnregmue_codrespat"; else $cajita="bnregmue_codresuso";
        $javascript="alert('El código del empleado no existe...');$('$cajita').value=''";
        $dato="";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }        
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   } 
   elseif ($this->getRequestParameter('ajax')=='15')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $js="";
    $dato="";
    
    $r= new Criteria();
    $r->add(BndefproPeer::CODPROC,$this->getRequestParameter('codigo'));
    $reg= BndefproPeer::doSelectOne($r);
    if ($reg)
        $dato=$reg->getDesproc();
    else
        $js="alert('La Procedencia no existe'); $('$cajtexmos').value='', $('$cajtexmos').focus();";
    
    $output = '[["'.$cajtexcom.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   } 
      elseif ($this->getRequestParameter('ajax')=='16')
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
        $js="alert('El Estudiante no existe'); $('bnregmue_cedest').value='', $('bnregmue_cedest').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["bnregmue_cedrep","'.$dato1.'",""],["bnregmue_nomaperep","'.$dato2.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }   
   elseif ($this->getRequestParameter('ajax')=='17')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $js="";
    $dato=""; $dato1=""; $dato2="";
    
    $r= new Criteria();
    $r->add(BncatcolPeer::CODCOL,$this->getRequestParameter('codigo'));
    $reg= BncatcolPeer::doSelectOne($r);
    if ($reg) {
        $dato=$reg->getDescol();
    }
    else
        $js="alert('El Color no existe'); $('bnregmue_codcol').value=''; $('bnregmue_descol').value=''; $('bnregmue_codcol').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='18')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $js="";
    $dato="";
    
    $r= new Criteria();
    $r->add(BnpaisPeer::CODPAI,$this->getRequestParameter('codigo'));
    $reg= BnpaisPeer::doSelectOne($r);
    if ($reg) {
        $dato=$reg->getNompai();
    }
    else
        $js="alert('El Pais no existe'); $('bnregmue_codpai').value=''; $('bnregmue_nompai').value=''; $('bnregmue_codpai').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   } 
   elseif ($this->getRequestParameter('ajax')=='19')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $js="";
    $dato="";
    
    $r= new Criteria();
    $r->add(BnestadoPeer::CODEST,$this->getRequestParameter('codigo'));
    $reg= BnestadoPeer::doSelectOne($r);
    if ($reg) {
        $dato=$reg->getNomest();
    }
    else
        $js="alert('El Estado no existe'); $('bnregmue_codes2').value=''; $('bnregmue_nomest').value=''; $('bnregmue_codes2').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   } 
   elseif ($this->getRequestParameter('ajax')=='20')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $js="";
    $dato="";
    
    $r= new Criteria();
    $r->add(BnmunicipPeer::CODMUN,$this->getRequestParameter('codigo'));
    $r->add(BnmunicipPeer::BNESTADO_CODEST,$this->getRequestParameter('estado'));
    $reg= BnmunicipPeer::doSelectOne($r);
    if ($reg) {
        $dato=$reg->getNommun();
    }
    else
        $js="alert('El Municipio no existe o no esta asociado al Estado'); $('bnregmue_codmun').value=''; $('bnregmue_nommun').value=''; $('bnregmue_codmun').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   } 
   elseif ($this->getRequestParameter('ajax')=='21')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $js="";
    $dato="";
    
    $r= new Criteria();
    $r->add(BnparroqPeer::CODPAR,$this->getRequestParameter('codigo'));
    $r->add(BnparroqPeer::BNMUNICIP_CODMUN,$this->getRequestParameter('municipio'));
    $reg= BnparroqPeer::doSelectOne($r);
    if ($reg) {
        $dato=$reg->getNompar();
    }
    else
        $js="alert('La Parroquia no existe o no esta asociado al Municipio'); $('bnregmue_codpar').value=''; $('bnregmue_nompar').value=''; $('bnregmue_codpar').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='22')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $js="";
    $dato="";
    
    $r= new Criteria();
    $r->add(BnciudadPeer::CODCIU,$this->getRequestParameter('codigo'));
    $r->add(BnciudadPeer::BNMUNICIP_CODMUN,$this->getRequestParameter('municipio'));
    $reg= BnciudadPeer::doSelectOne($r);
    if ($reg) {
        $dato=$reg->getNomciu();
    }
    else
        $js="alert('La Ciudad no existe o no esta asociado al Municipio'); $('bnregmue_codciu').value=''; $('bnregmue_nomciu').value=''; $('bnregmue_codciu').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='23')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $js="";
    $dato="";
    
    $r= new Criteria();
    $r->add(BnusobiePeer::CODUSOBIE,$this->getRequestParameter('codigo'));
    $reg= BnusobiePeer::doSelectOne($r);
    if ($reg) {
        $dato=$reg->getDesusobie();
    }
    else
        $js="alert('El Estatus de Uso del Bien no existe'); $('bnregmue_codusobie').value=''; $('desusobie').value=''; $('bnregmue_codusobie').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='24')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codact=$this->getRequestParameter('codact');
    $codmue=$this->getRequestParameter('codmue');
    $codmuedep=$this->getRequestParameter('codmuedep');
    $js="";
    $dato="";
    
    $r= new Criteria();
    $r->add(BnregmuePeer::CODACT,$this->getRequestParameter('codigo'));
    $r->add(BnregmuePeer::CODMUE,$codmuedep);
    $r->add(BnregmuePeer::CODACT,$codact,Criteria::NOT_EQUAL);
    $r->add(BnregmuePeer::CODMUE,$codmue,Criteria::NOT_EQUAL);
    $reg= BnregmuePeer::doSelectOne($r);
    if (!$reg) {
        $js="alert('El Bien no existe'); $('bnregmue_codactdep').value=''; $('bnregmue_codmuedep').value='';";
        $output = '[["javascript","'.$js.'",""]]';
    }else {
      if ($reg->getProced()=='N')
        $js="$('bnregmue_proced_N').checked=true;";
      else
        $js="$('bnregmue_proced_R').checked=true;";
      $output = '[["bnregmue_fecreg","'.date('d/m/Y',strtotime($reg->getFecreg())).'",""],["bnregmue_codubi","'.$reg->getCodubi().'",""],["bnregmue_codubiadm","'.$reg->getCodubiadm().'",""],["bnregmue_codest","'.$reg->getCodest().'",""],["desubi","'.$reg->getNomubicac().'",""],["desubiadm","'.$reg->getDesubiadm().'",""],["desest","'.$reg->getDesest().'",""],["javascript","'.$js.'",""]]';

    }
    
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
  }


  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateBnregmueFromRequest()
  {
    $bnregmue = $this->getRequestParameter('bnregmue');

    if (isset($bnregmue['codact']))
    {
      $this->bnregmue->setCodact(trim($bnregmue['codact']));
    }
    if (isset($bnregmue['codmue']))
    {
      $this->bnregmue->setCodmue(trim($bnregmue['codmue']));
    }
    if (isset($bnregmue['desmue']))
    {
      $this->bnregmue->setDesmue(trim($bnregmue['desmue']));
    }
    if (isset($bnregmue['codpro']))
    {
      $this->bnregmue->setCodpro(trim($bnregmue['codpro']));
    }
    if (isset($bnregmue['ordcom']))
    {
      $this->bnregmue->setOrdcom(trim($bnregmue['ordcom']));
    }
    if (isset($bnregmue['fecreg']))
    {
      if ($bnregmue['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecreg']))
          {
            $value = $dateFormat->format($bnregmue['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecreg(trim($value));
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecreg(null);
      }
    }
    if (isset($bnregmue['feccom']))
    {
      if ($bnregmue['feccom'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['feccom']))
          {
            $value = $dateFormat->format($bnregmue['feccom'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['feccom'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFeccom($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFeccom(null);
      }
    }
    if (isset($bnregmue['fecdep']))
    {
      if ($bnregmue['fecdep'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecdep']))
          {
            $value = $dateFormat->format($bnregmue['fecdep'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecdep'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecdep($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecdep(null);
      }
    }
    if (isset($bnregmue['fecaju']))
    {
      if ($bnregmue['fecaju'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecaju']))
          {
            $value = $dateFormat->format($bnregmue['fecaju'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecaju'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecaju($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecaju(null);
      }
    }
    if (isset($bnregmue['fecact']))
    {
      if ($bnregmue['fecact'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecact']))
          {
            $value = $dateFormat->format($bnregmue['fecact'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecact'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecact($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecact(null);
      }
    }
    if (isset($bnregmue['fecexp']))
    {
      if ($bnregmue['fecexp'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecexp']))
          {
            $value = $dateFormat->format($bnregmue['fecexp'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecexp'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecexp($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecexp(null);
      }
    }
    if (isset($bnregmue['ordrcp']))
    {
      $this->bnregmue->setOrdrcp(trim($bnregmue['ordrcp']));
    }
    if (isset($bnregmue['fotmue']))
    {
      $this->bnregmue->setFotmue(trim($bnregmue['fotmue']));
    }
    if (isset($bnregmue['marmue']))
    {
      $this->bnregmue->setMarmue(trim($bnregmue['marmue']));
    }
    if (isset($bnregmue['modmue']))
    {
      $this->bnregmue->setModmue(trim($bnregmue['modmue']));
    }
    if (isset($bnregmue['anomue']))
    {
      $this->bnregmue->setAnomue(trim($bnregmue['anomue']));
    }
    if (isset($bnregmue['colmue']))
    {
      $this->bnregmue->setColmue(trim($bnregmue['colmue']));
    }
    if (isset($bnregmue['codubi']))
    {
      $this->bnregmue->setCodubi(trim($bnregmue['codubi']));
    }
    if (isset($bnregmue['pesmue']))
    {
      $this->bnregmue->setPesmue(trim($bnregmue['pesmue']));
    }
    if (isset($bnregmue['capmue']))
    {
      $this->bnregmue->setCapmue(trim($bnregmue['capmue']));
    }
    if (isset($bnregmue['tipmue']))
    {
      $this->bnregmue->setTipmue(trim($bnregmue['tipmue']));
    }
    if (isset($bnregmue['viduti']))
    {
      $this->bnregmue->setViduti(trim($bnregmue['viduti']));
    }
    if (isset($bnregmue['lngmue']))
    {
      $this->bnregmue->setLngmue(trim($bnregmue['lngmue']));
    }
    if (isset($bnregmue['nropie']))
    {
      $this->bnregmue->setNropie(trim($bnregmue['nropie']));
    }
    if (isset($bnregmue['sermue']))
    {
      $this->bnregmue->setSermue(trim($bnregmue['sermue']));
    }
    if (isset($bnregmue['usomue']))
    {
      $this->bnregmue->setUsomue(trim($bnregmue['usomue']));
    }
    if (isset($bnregmue['altmue']))
    {
      $this->bnregmue->setAltmue(trim($bnregmue['altmue']));
    }
    if (isset($bnregmue['larmue']))
    {
      $this->bnregmue->setLarmue(trim($bnregmue['larmue']));
    }
    if (isset($bnregmue['ancmue']))
    {
      $this->bnregmue->setAncmue(trim($bnregmue['ancmue']));
    }
    if (isset($bnregmue['coddis']))
    {
      $this->bnregmue->setCoddis(trim($bnregmue['coddis']));
    }
    if (isset($bnregmue['detmue']))
    {
      $this->bnregmue->setDetmue(trim($bnregmue['detmue']));
    }
    if (isset($bnregmue['edomue']))
    {
      $this->bnregmue->setEdomue(trim($bnregmue['edomue']));
    }
    if (isset($bnregmue['munmue']))
    {
      $this->bnregmue->setMunmue(trim($bnregmue['munmue']));
    }
    if (isset($bnregmue['depmue']))
    {
      $this->bnregmue->setDepmue(trim($bnregmue['depmue']));
    }
    if (isset($bnregmue['dirmue']))
    {
      $this->bnregmue->setDirmue(trim($bnregmue['dirmue']));
    }
    if (isset($bnregmue['ubimue']))
    {
      $this->bnregmue->setUbimue(trim($bnregmue['ubimue']));
    }
    if (isset($bnregmue['mesdep']))
    {
      $this->bnregmue->setMesdep(trim($bnregmue['mesdep']));
    }
    if (isset($bnregmue['valini']))
    {
      $this->bnregmue->setValini(trim($bnregmue['valini']));
    }
    if (isset($bnregmue['valres']))
    {
      $this->bnregmue->setValres(trim($bnregmue['valres']));
    }
    if (isset($bnregmue['vallib']))
    {
      $this->bnregmue->setVallib(trim($bnregmue['vallib']));
    }
    if (isset($bnregmue['valrex']))
    {
      $this->bnregmue->setValrex(trim($bnregmue['valrex']));
    }
    if (isset($bnregmue['cosrep']))
    {
      $this->bnregmue->setCosrep(trim($bnregmue['cosrep']));
    }
    if (isset($bnregmue['depmen']))
    {
      $this->bnregmue->setDepmen(trim($bnregmue['depmen']));
    }
    if (isset($bnregmue['depacu']))
    {
      $this->bnregmue->setDepacu(trim($bnregmue['depacu']));
    }
    if (!$this->bnregmue->getId())
      $this->bnregmue->setStamue('A');


    if (isset($bnregmue['codalt']))
    {
      $this->bnregmue->setCodalt(trim($bnregmue['codalt']));
    }
    if (isset($bnregmue['fecrcp']))
    {
      if ($bnregmue['fecrcp'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecrcp']))
          {
            $value = $dateFormat->format($bnregmue['fecrcp'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecrcp'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecrcp($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecrcp(null);
      }
    }
    if (isset($bnregmue['valadi']))
    {
      $this->bnregmue->setValadi(trim($bnregmue['valadi']));
    }
    if (isset($bnregmue['aumviduti']))
    {
      $this->bnregmue->setAumviduti(trim($bnregmue['aumviduti']));
    }
    if (isset($bnregmue['dimviduti']))
    {
      $this->bnregmue->setDimviduti(trim($bnregmue['dimviduti']));
    }
    if (isset($bnregmue['stasem']))
    {
      $this->bnregmue->setStasem(trim($bnregmue['stasem']));
    }
    if (isset($bnregmue['stainm']))
    {
      $this->bnregmue->setStainm(trim($bnregmue['stainm']));
    }
    if (isset($bnregmue['codrespat']))
    {
      $this->bnregmue->setCodrespat($bnregmue['codrespat']);
    }
    if (isset($bnregmue['codresuso']))
    {
      $this->bnregmue->setCodresuso($bnregmue['codresuso']);
    }
    if (isset($bnregmue['tippro']))
    {
      $this->bnregmue->setTippro($bnregmue['tippro']);
    }
    if (isset($bnregmue['numord']))
    {
      $this->bnregmue->setNumord($bnregmue['numord']);
  }
    if (isset($bnregmue['savenumord']))
    {
      $this->bnregmue->setSavenumord($bnregmue['savenumord']);
    }
    if (isset($bnregmue['codubiadm']))
    {
      $this->bnregmue->setCodubiadm(trim($bnregmue['codubiadm']));
    }
    if (isset($bnregmue['canmueigu']))
    {
      $this->bnregmue->setCanmueigu(trim($bnregmue['canmueigu']));
    }
    if (isset($bnregmue['nrocon']))
    {
      $this->bnregmue->setNrocon(trim($bnregmue['nrocon']));
    }
    if (isset($bnregmue['feccon']))
    {
      if ($bnregmue['feccon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['feccon']))
          {
            $value = $dateFormat->format($bnregmue['feccon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['feccon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFeccon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFeccon(null);
      }
    }
    if (isset($bnregmue['codest']))
    {
      $this->bnregmue->setCodest(trim($bnregmue['codest']));
    }
    if (isset($bnregmue['codmod']))
    {
      $this->bnregmue->setCodmod(trim($bnregmue['codmod']));
    }
    if (isset($bnregmue['fecfac']))
    {
      if ($bnregmue['fecfac'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecfac']))
          {
            $value = $dateFormat->format($bnregmue['fecfac'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecfac'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecfac($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecfac(null);
      }
    }
    if (isset($bnregmue['numcue']))
    {
      $this->bnregmue->setNumcue(trim($bnregmue['numcue']));
    }
    if (isset($bnregmue['numdep']))
    {
      $this->bnregmue->setNumdep(trim($bnregmue['numdep']));
    }
    if (isset($bnregmue['fecdepseg']))
    {
      if ($bnregmue['fecdepseg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecdepseg']))
          {
            $value = $dateFormat->format($bnregmue['fecdepseg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecdepseg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecdepseg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecdepseg(null);
      }
    }
    if (isset($bnregmue['codtip']))
    {
      $this->bnregmue->setCodtip(trim($bnregmue['codtip']));
    }
    if (isset($bnregmue['monpag']))
    {
      $this->bnregmue->setMonpag(trim($bnregmue['monpag']));
    }
    if (isset($bnregmue['porpri']))
    {
      $this->bnregmue->setPorpri(trim($bnregmue['porpri']));
    }
    if (isset($bnregmue['monpri']))
    {
      $this->bnregmue->setMonpri(trim($bnregmue['monpri']));
    }
    if (isset($bnregmue['deprec']))
    {
      $this->bnregmue->setDeprec(trim($bnregmue['deprec']));
    }
    if (isset($bnregmue['segnom']))
    {
      $this->bnregmue->setSegnom(trim($bnregmue['segnom']));
    }
    if (isset($bnregmue['monnom']))
    {
      $this->bnregmue->setMonnom(trim($bnregmue['monnom']));
    }
    if (isset($bnregmue['frenom']))
    {
      $this->bnregmue->setFrenom(trim($bnregmue['frenom']));
    }
    if (isset($bnregmue['renovo']))
    {
      $this->bnregmue->setRenovo(trim($bnregmue['renovo']));
    }
    if (isset($bnregmue['numcom']))
    {
      $this->bnregmue->setNumcom(trim($bnregmue['numcom']));
    }
    if (isset($bnregmue['fecregcom']))
    {
      if ($bnregmue['fecregcom'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecregcom']))
          {
            $value = $dateFormat->format($bnregmue['fecregcom'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecregcom'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecregcom($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecregcom(null);
      }
    }
    if (isset($bnregmue['codproc']))
    {
      $this->bnregmue->setCodproc(trim($bnregmue['codproc']));
    }    
    if (isset($bnregmue['cedest']))
    {
      $this->bnregmue->setCedest($bnregmue['cedest']);
    }
    $this->bnregmue->setPerest(isset($bnregmue['perest']) ? $bnregmue['perest'] : 0);
    if (isset($bnregmue['codcol']))
    {
      $this->bnregmue->setCodcol($bnregmue['codcol']);
    }
    if (isset($bnregmue['codpai']))
    {
      $this->bnregmue->setCodpai($bnregmue['codpai']);
    }
    if (isset($bnregmue['codes2']))
    {
      $this->bnregmue->setCodes2($bnregmue['codes2']);
    }
    if (isset($bnregmue['codmun']))
    {
      $this->bnregmue->setCodmun($bnregmue['codmun']);
    }
    if (isset($bnregmue['codpar']))
    {
      $this->bnregmue->setCodpar($bnregmue['codpar']);
    }
    if (isset($bnregmue['codciu']))
    {
      $this->bnregmue->setCodciu($bnregmue['codciu']);
    }
    if (isset($bnregmue['proced']))
    {
      $this->bnregmue->setProced($bnregmue['proced']);
    }
    if (isset($bnregmue['sudebip']))
    {
      $this->bnregmue->setSudebip($bnregmue['sudebip']);
    }
    if (isset($bnregmue['actrec']))
    {
      $this->bnregmue->setActrec($bnregmue['actrec']);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/muebles/".$this->bnregmue->getFotmue();
    if (!$this->getRequest()->hasErrors() && isset($bnregmue['fotmue_remove']))
    {
      $this->bnregmue->setFotmue('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('bnregmue[fotmue]'))
    {
      $fileName = md5($this->getRequest()->getFileName('bnregmue[fotmue]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('bnregmue[fotmue]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('bnregmue[fotmue]', sfConfig::get('sf_upload_dir')."/muebles/".$fileName.$ext);
      $this->bnregmue->setFotmue($fileName.$ext);
    }
    if (isset($bnregmue['fecasiact']))
    {
      if ($bnregmue['fecasiact'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecasiact']))
          {
            $value = $dateFormat->format($bnregmue['fecasiact'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecasiact'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecasiact($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecasiact(null);
      }
    }
    if (isset($bnregmue['fecdesact']))
    {
      if ($bnregmue['fecdesact'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecdesact']))
          {
            $value = $dateFormat->format($bnregmue['fecdesact'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecdesact'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecdesact($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecdesact(null);
      }
    }
    if (isset($bnregmue['codusobie']))
    {
      $this->bnregmue->setCodusobie($bnregmue['codusobie']);
    }
    if (isset($bnregmue['anoinv']))
    {
      $this->bnregmue->setAnoinv($bnregmue['anoinv']);
    }
    if (isset($bnregmue['codactdep']))
    {
      $this->bnregmue->setCodactdep($bnregmue['codactdep']);
    }
    if (isset($bnregmue['codmuedep']))
    {
      $this->bnregmue->setCodmuedep($bnregmue['codmuedep']);
    }
    if (isset($bnregmue['fecont']))
    {
      if ($bnregmue['fecont'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecont']))
          {
            $value = $dateFormat->format($bnregmue['fecont'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecont'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecont($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecont(null);
      }
    }
    if (isset($bnregmue['fecins']))
    {
      if ($bnregmue['fecins'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecins']))
          {
            $value = $dateFormat->format($bnregmue['fecins'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecins'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecins($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecins(null);
      }
    }
  }

  public function setVars()
  {
    $this->forubi = Herramientas::ObtenerFormato('Bndefins','forubi');
    $this->lonubi= Herramientas::ObtenerFormato('Bndefins','lonubi');
    $this->foract = Herramientas::ObtenerFormato('Bndefins','foract');
    $this->lonact=Herramientas::ObtenerFormato('Bndefins','lonact');
    $this->forubiadm = Herramientas::ObtenerFormato('Opdefemp','Forubi');
    $this->lonubiadm=strlen($this->forubiadm);
    $this->incorporacion='';

  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->bnregmue = $this->getBnregmueOrCreate();
    $this->incorporacion = $this->getRequestParameter('incorporacion');
	$this->desincorp = '';
  $this->configGrid($this->bnregmue->getCodact(), $this->bnregmue->getCodmue());
  $this->configGrid2($this->bnregmue->getCodact(), $this->bnregmue->getCodmue());
	if($this->bnregmue->getCodmue())
	{
		$c = new Criteria();
		$sql="substr(bndismue.tipdismue,1,6)=bndisbie.coddis";
		$c->add(BndisbiePeer::CODDIS,$sql,Criteria :: CUSTOM);
		$c->add(BndismuePeer::CODMUE,$this->bnregmue->getCodmue());
		$c->add(BndisbiePeer::DESINC,'S');
                $c->add(BndismuePeer::CODACT,$this->bnregmue->getCodact());
		$per = BndismuePeer::doSelectOne($c);
		if($per)
		{
			$this->desincorp = 'D E S I N C O R P O R A D O';
		}
	}
  $cormueact=H::getConfApp2('cormueact', 'bienes', 'bieregactmued');
    if (!$this->bnregmue->getId() && $cormueact=='S')
    {
       $t= new Criteria();
       $t->setLimit(1);
       $t->addDescendingOrderByColumn(BnregmuePeer::CODMUE);
       $reg= BnregmuePeer::doSelectOne($t);
       if ($reg)
       {
           $r=$reg->getCodmue()+1;
            $encontrado=false;
            while (!$encontrado)
            {
              $numero=str_pad($r, 10, '0', STR_PAD_LEFT);

              $sql="select codmue from bnregmue where codmue='".$numero."'";
              if (Herramientas::BuscarDatos($sql,$result))
              {
                $r=$r+1;
              }
              else
              {
                $encontrado=true;
              }
            }
           $this->bnregmue->setCodmue($numero);
       }else $this->bnregmue->setCodmue('0000000001');
    }
    $gencorcodalt=H::getConfApp2('gencorcodalt', 'bienes', 'bieregactmued');
    if (!$this->bnregmue->getId() && $gencorcodalt=='S')
    {
       $this->bnregmue->setCodalt('##########'); 
    }
    $mancornacreg=H::getConfApp2('mancornacreg', 'bienes', 'bieregactmued');
    if (!$this->bnregmue->getId() && $mancornacreg=='S')
    {
       $this->bnregmue->setCodmue('########'); 
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBnregmueFromRequest();

      $this->saveBnregmue($this->bnregmue);

      $this->setFlash('notice', 'Your modifications have been saved');

    $this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('bieregactmued/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('bieregactmued/list');
      }
      else
      {
        return $this->redirect('bieregactmued/edit?id='.$this->bnregmue->getId().'&incorporacion='.$this->incorporacion);

      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function getBnregmueOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $bnregmue = new Bnregmue();
      $this->setVars();
    }
    else
    {
      $bnregmue = BnregmuePeer::retrieveByPk($this->getRequestParameter($id));
      $this->setVars();
      
      $this->forward404Unless($bnregmue);
    }

    return $bnregmue;
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
    $this->bnregmue = $this->getBnregmueOrCreate();
    try{
   $this->updateBnregmueFromRequest();
    }
    catch(Exception $ex){}
    $grid= Herramientas::CargarDatosGridv2($this, $this->obj);
    $grid1= Herramientas::CargarDatosGridv2($this, $this->obj1);

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
      {
       if (self::$coderror!=-1)
        {
          $err = Herramientas::obtenerMensajeError(self::$coderror);
          $this->getRequest()->setError('',$err);
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
      $this->desincorp='';
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->bnregmue = $this->getBnregmueOrCreate();
        //$this->updateBnregmueFromRequest();
        //$bnregmue = $this->getRequestParameter('bnregmue');
        $grid= Herramientas::CargarDatosGridv2($this, $this->obj);
        $dateFormat = new sfDateFormat('es_VE');
        $fec1 = $dateFormat->format($this->getRequestParameter('bnregmue[fecfac]'), 'i', $dateFormat->getInputPattern('d'));
        
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($this->getRequestParameter('bnregmue[fecreg]'), 'i', $dateFormat->getInputPattern('d'));
        
        $dateFormat = new sfDateFormat('es_VE');
        $fec3 = $dateFormat->format($this->getRequestParameter('bnregmue[feccom]'), 'i', $dateFormat->getInputPattern('d'));
        
        $dateFormat = new sfDateFormat('es_VE');
        $fec4 = $dateFormat->format($this->getRequestParameter('bnregmue[feccon]'), 'i', $dateFormat->getInputPattern('d'));
        
        $mosfecact=H::getConfApp2('mosfecact', 'bienes', 'bieregactmued');
        if ($mosfecact=='S'){
           if ($this->getRequestParameter('bnregmue[fecasiact]')==""){
              self::$coderror= 229;
               return false;
           }
           if ($this->getRequestParameter('bnregmue[fecdesact]')==""){
              self::$coderror= 230;
               return false;
           }
        }
        if ($this->getRequestParameter('id')=="") {
           $this->bnregmue->setCodact($this->getRequestParameter('bnregmue[codact]'));
           $this->bnregmue->setCodmue($this->getRequestParameter('bnregmue[codmue]'));
           $this->bnregmue->setCodalt($this->getRequestParameter('bnregmue[codalt]'));
           $this->bnregmue->setValini($this->getRequestParameter('bnregmue[valini]'));
           $this->bnregmue->setCodactdep($this->getRequestParameter('bnregmue[codactdep]'));
           $this->bnregmue->setCodmuedep($this->getRequestParameter('bnregmue[codmuedep]'));
           $this->bnregmue->setFecreg($fec2);
           $mancornacreg=H::getConfApp2('mancornacreg', 'bienes', 'bieregactmued');
           if ($mancornacreg=='S'){
              $this->bnregmue->setProced($this->getRequestParameter('bnregmue[proced]'));
              self::$coderror=Bienes::validarCorrelativoNacReg($this->bnregmue);       
           }          
           self::$coderror=Bienes::validarBnregmue($this->bnregmue);
           if (self::$coderror<>-1)
             return false;    
        }else {
          $novalbiedep=H::getConfApp2('novalbiedep', 'bienes', 'bieregactmued');
          if ($novalbiedep!='S') {
            $q= new Criteria();
            $q->add(BndepactdetPeer::CODACT,$this->getRequestParameter('bnregmue[codact]'));
            $q->add(BndepactdetPeer::CODMUE,$this->getRequestParameter('bnregmue[codmue]'));
            $q->add(BndepactdetPeer::DEPMUE,0,Criteria::GREATER_THAN);
            $encon= BndepactdetPeer::doSelectOne($q);
            if ($encon){
               self::$coderror= 2112;
               return false;
            }
        }
        }
        

        if ($this->getRequestParameter('bnregmue[fecfac]')!="" && $this->getRequestParameter('bnregmue[fecreg]')!="" && $fec2<$fec1){
               self::$coderror= 217;      
                return false;  
        }
        
        if ($this->getRequestParameter('bnregmue[fecfac]')!="" && $this->getRequestParameter('bnregmue[feccom]')!="" && $fec1<$fec3){
               self::$coderror= 218;   
                return false;
             }
        
        if ($this->getRequestParameter('bnregmue[feccom]')!="" && $this->getRequestParameter('bnregmue[feccon]')!="" && $fec4<$fec3){
               self::$coderror= 219;  
                return false;
             }
        $mansegbie=H::getConfApp2('mansegbie', 'bienes', 'bieregactmued');
        if ($mansegbie=='S' && $this->getRequestParameter('bnregmue[numcue]')!="" && $this->getRequestParameter('bnregmue[segnom]')!="S" && $this->getRequestParameter('bnregmue[renovo]')=="S")
        {
            if (self::validarGeneraComprobante())
            {
              self::$coderror= 508;
               return false;
            }
        }

        if ($mansegbie=='S' && $this->getRequestParameter('bnregmue[numcue]')!="" && $this->getRequestParameter('bnregmue[fecdepseg]')!="")
        {
          if ($this->getRequestParameter('bnregmue[segnom]')=='N'){
            if (Tesoreria::validaPeriodoCerradoBanco($this->getRequestParameter('bnregmue[fecdepseg]'),$this->getRequestParameter('bnregmue[numcue]'))==false)
            {
              self::$coderror=537;              
            }
          }
        }
        
        if (self::$coderror<>-1)
        {
          return false;
        }
        else return true;


      }else return true;
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
  protected function saveBnregmue($bnregmue)
  {
  	if ($bnregmue->getId()=='')
  	{             	
      $mansegbie=H::getConfApp2('mansegbie', 'bienes', 'bieregactmued');
      if ($mansegbie=='S')
      {
        if ($bnregmue->getSegnom()=='N' && $bnregmue->getNumcue()!="" && $bnregmue->getFecdepseg()!="")
          self::GrabarComprobante($bnregmue);
      }            
      $e=Bienes::salvarSaveBnregmue($bnregmue);
      if ($e==-1){
        if ($bnregmue->getCoddis()!='' && (!self::validarGeneraComprobanteIncorp())){
          $codigo = Bienes::GrabarMovimiento($bnregmue->getId());
          $this->incorporacion=$codigo; 
        }
      }
      return $e;
    }else {
      $mansegbie=H::getConfApp2('mansegbie', 'bienes', 'bieregactmued');
      if ($mansegbie=='S' && $bnregmue->getRenovo()=='S')
      {
        if ($bnregmue->getSegnom()=='N' && $bnregmue->getNumcue()!="" && $bnregmue->getFecdepseg()!="") {
          $bnregmue->setFrenom('');
          self::GrabarComprobante($bnregmue);
          Bienes::generar_movimientos_segun_librosSegBieMue($bnregmue);        
        }
        Bienes::grabarPolhistorico($bnregmue);
      }
        $bnregmue->save();
        return -1;
    }

  }

  
  protected function deleteBnregmue($bnregmue)
  {
      $w= new Criteria();
      $w->add(BndismuePeer::CODACT,$bnregmue->getCodact());
      $w->add(BndismuePeer::CODMUE,$bnregmue->getCodmue());
      BndismuePeer::doDelete($w);    
      
      $mansegbie=H::getConfApp2('mansegbie', 'bienes', 'bieregactmued');
      if ($mansegbie=='s')
      {
          //Eliminamos el Comprobante Contable
          H::EliminarRegistro('Contabc1', 'NUMCOM', $bnregmue->getNumcom());
          H::EliminarRegistro('Contabc', 'NUMCOM', $bnregmue->getNumcom());
          
          //Eliminamos Mov. según Libros
          $r= new Criteria();
          $r->add(TsmovlibPeer::NUMCUE,$bnregmue->getNumcue());
          $r->add(TsmovlibPeer::REFLIB,$bnregmue->getNumdep());
          $r->add(TsmovlibPeer::CODTIP,$bnregmue->getCodtip());
          TsmovlibPeer::doDelete($r);
      }
              
      $bnregmue->delete();
  }
  
  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
     $this->bnregmue = $this->getBnregmueOrCreate();
     $this->updateBnregmueFromRequest();
     $concom   = 0;
     $msjuno="";
     $comprobante = "";
     $this->msjtres  = "";
     $this->i        = "";
     $this->formulario = array();

     if ($this->bnregmue->getNumcue()=="" || $this->bnregmue->getCodtip()=="" || $this->bnregmue->getMonpag()==0)
     {
       $this->msjtres="No se puede Generar el Comprobante, Verique si introdujo La Cuenta Bancaria, Tipo de Movimiento del Seguro del Bien yMonto pagar mayor a cero, para luego generar el comprobante";
     }
     
     if ($this->msjtres=="")
     {
      $x = Bienes::generarComprobanteBieMue($this->bnregmue,$comprobante,$msjuno);
      if ($msjuno=="") {
      $concom = $concom + 1;

      $form = "sf_admin/bieregactmued/confincomgen";
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

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante2() //Comprobante de la Disposición
  {
     $this->bnregmue = $this->getBnregmueOrCreate();
     $this->updateBnregmueFromRequest();
     $concom   = 0;
     $msjuno="";
     $comprobante = "";
     $desincorpora="";
     $this->msjtres  = "";
     $this->i        = "";
     $this->formulario = array();    

     if ($this->bnregmue->getCodact()=="" || $this->bnregmue->getCodmue()=="" || $this->bnregmue->getCoddis()=="" || $this->bnregmue->getValini()==0)
     {
       $this->msjtres="No se puede Generar el Comprobante, Verique si introdujo El Cód. del Activo, Cód. de Mueble, Cód. de la Disposición y el Valor Inicial  del Mueble mayor a cero, para luego generar el comprobante";
     }else {
       $u = new Criteria();
       $u->add(BndisbiePeer::CODDIS,$this->bnregmue->getCoddis());
       $per2 = BndisbiePeer::doselectone($u);
       if ($per2){
         if ($per2->getAfecon()=='S'){
            $desincorpora=$per2->getDesinc();
            $u1 = new Criteria();
            $u1->add(BndefconPeer::CODACT,$this->bnregmue->getCodact());
            $u1->add(BndefconPeer::CODMUE,$this->bnregmue->getCodmue());
            $bndefcon = BndefconPeer::doSelectOne($u1);
         }else $this->msjtres="No se puede Generar el Comprobante, el tipo de Disposición no afecta Contabilidad";
       }
     }
     
     if ($this->msjtres=="")
     {
      $x = Bienes::generarComprobanteDisRegMue($this->bnregmue,$comprobante,$desincorpora,$bndefcon);
      if ($msjuno=="") {
      $concom = $concom + 1;

      $form = "sf_admin/bieregactmued/confincomgendis";
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
  
   public function GrabarComprobante(&$bnregmue)
  {
      $concom=1;
      $form="sf_admin/bieregactmued/confincomgen";
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

          $bnregmue->setNumcom($this->numero);
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');
  }  
  
  
  public function validarGeneraComprobante()
  {
    $form="sf_admin/bieregactmued/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');

    if ($grabo=='')
    { return true;}
    else { return false;}
  } 

  public function validarGeneraComprobanteIncorp()
  {
    $form="sf_admin/bieregactmued/confincomgendis";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');

    if ($grabo=='')
    { return true;}
    else { return false;}
  }    

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codact='', $codmue='') {
    $c = new Criteria();
    $c->add(BnpolmuePeer::CODACT, $codact);
    $c->add(BnpolmuePeer::CODMUE, $codmue);
    $c->addDescendingOrderByColumn(BnpolmuePeer::FECDEPSEG);
    $reg = BnpolmuePeer::doSelect($c);
    
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/bieregactmued/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_polizas');

    $this->obj =$this->columnas[0]->getConfig($reg);

    $this->bnregmue->setObj($this->obj);
  }

   public function configGrid2($codact='', $codmue='') {
    $reg=array();
    if ($this->bnregmue->getId()) {
    $c = new Criteria();
    $c->add(BnregmuePeer::CODACTDEP, $codact);
    $c->add(BnregmuePeer::CODMUEDEP, $codmue);
    $reg = BnregmuePeer::doSelect($c);
  }
    
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/bieregactmued/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_muedep');

    $this->obj1 =$this->columnas[0]->getConfig($reg);

    $this->bnregmue->setObj1($this->obj1);
  }

    public function getLabels()
  {
    $labels = parent::getLabels();
    $eticodalt=H::getConfApp2('eticodalt', 'bienes', 'bieregactmued');
    if ($eticodalt!='')
      $labels['bnregmue{codalt}'] = $eticodalt;

    $cambiareti=H::getConfApp2('cameti', 'bienes', 'bieregproc');
    if ($cambiareti=='S')
      $labels['bnregmue{codproc}'] = 'Forma de Adquisición del Bien';
    return $labels;
  }
}
