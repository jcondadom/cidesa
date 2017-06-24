<?php

/**
 * bieregactinmd actions.
 *
 * @package    Roraima
 * @subpackage bieregactinmd
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class bieregactinmdActions extends autobieregactinmdActions
{
  // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;

  public function setVars()
  {
    $this->forubi = Herramientas::ObtenerFormato('Bndefins','forubi');
    $this->lonubi= Herramientas::ObtenerFormato('Bndefins','lonubi');
    $this->foract = Herramientas::ObtenerFormato('Bndefins','foract');
    $this->lonact=Herramientas::ObtenerFormato('Bndefins','lonact');

  }

  protected function getBnreginmOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $bnreginm = new Bnreginm();
      $this->setVars();
    }
    else
    {
      $bnreginm = BnreginmPeer::retrieveByPk($this->getRequestParameter($id));
      $this->setVars();
      $this->forward404Unless($bnreginm);
    }

    return $bnreginm;
  }


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
    $filcat=H::getConfApp2('filcat', 'bienes', 'bieregactinmd');
      $result=array();
      $sql="select a.codact as codigo_nivel,a.DesAct as activo, a.viduti as vida From bndefact a, bndefins b where length(RTrim(a.CodAct))=cast(b.LonAct as integer) and a.codact='".$this->getRequestParameter('codigo')."' and (codact like '" . $filcat . "%%') Order By codact";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $dato=$result[0]['codigo_nivel'];
      $dato1=$result[0]['activo'];
      $dato2=H::FormatoMonto($result[0]['vida']);
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","'.$dato1.'",""],["bnreginm_viduti","'.$dato2.'",""]]';
    }
    else
    {
          $javascript="alert('El código no existe...');$('bnreginm_codact').value='';$('bnreginm_desinm').value='';$('bnreginm_codinm').value=''; $('bnreginm_viduti').value='0,00'; $('bnreginm_codact').focus();";
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
      $sql="Select a.ordcom as orden,a.codpro as proveedor, to_char(a.fecord,'dd/mm/yyyy') as fecha, b.nompro as nompro, a.desord from caordcom a, caprovee b  where b.estpro='A' and a.codpro=b.codpro and a.ordcom='".$this->getRequestParameter('codigo')."' order By ordcom";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $dato=$result[0]['orden'];
      $dato1=$result[0]['proveedor'];
      $dato2=$result[0]['nompro'];
      $dato3=$result[0]['fecha'];
      $descripcion = H::getConfApp('descripcion','bienes','bieregactinmd');
      !$descripcion? $descripcion='' : '';
      if($descripcion=='S')
      {
        $cajtexmos_cuatro='bnreginm_desinm';
        $dato4=$result[0]['desord'];
      }else
      {
        $cajtexmos_cuatro='';
        $dato4='';
      }
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexmos_uno.'","'.$dato1.'",""],["'.$cajtexmos_dos.'","'.$dato2.'",""],["'.$cajtexmos_tres.'","'.$dato3.'",""],["'.$cajtexmos_cuatro.'","'.$dato4.'",""]]';
    }
    else
    {
        $javascript="alert('La Orden de Compra no existe...');$('$cajtexmos').value='';$('$cajtexmos_uno').value='';$('$cajtexmos_dos').value='';$('$cajtexmos_tres').value='';$('$cajtexmos').focus();";
              $output = '[["javascript","'.$javascript.'",""]]';
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='3')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
        $dato=BnubibiePeer::getDesubicacion(trim($this->getRequestParameter('codigo')));

    $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
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
   }elseif ($this->getRequestParameter('ajax')=='5')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $c = new Criteria();
    $c->add(BnclafunPeer::CODCLA,$this->getRequestParameter('codigo'));
    $dato=BnclafunPeer::doSelectOne($c);

    if($dato) $output = '[["'.$cajtexmos.'","'.$dato->getDescla().'",""]]';
    else $output = '[["'.$cajtexmos.'","'.Constantes::REGVACIO.'",""]]';

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
    elseif ($this->getRequestParameter('ajax')=='6')
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
      $javascript="$('bnreginm_ordrcp').value='$numfac'; ";
    }
    $output = '[["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='7')
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
        $js="alert('El Estado de Conservación'); $('$cajtexmos').value='', $('$cajtexmos').focus();";
    
    $output = '[["'.$cajtexcom.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='8')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $js="";
    $dato="";
    
    $r= new Criteria();
    $r->add(BnclabiePeer::CODCLA,$this->getRequestParameter('codigo'));
    $reg= BnclabiePeer::doSelectOne($r);
    if ($reg)
        $dato=$reg->getDescla();
    else
        $js="alert('La Clase del Bien no existe'); $('bnreginm_codcl2').value='', $('bnreginm_codcl2').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
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
    $r->add(BndefusoPeer::CODUSO,$this->getRequestParameter('codigo'));
    $reg= BndefusoPeer::doSelectOne($r);
    if ($reg)
        $dato=$reg->getDesuso();
    else
        $js="alert('El Uso no existe'); $('bnreginm_coduso').value='', $('bnreginm_coduso').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
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
    $r->add(CadefunimedPeer::CODUNIMED,$this->getRequestParameter('codigo'));
    $reg= CadefunimedPeer::doSelectOne($r);
    if ($reg)
        $dato=$reg->getDesunimed();
    else
        $js="alert('La Unidad de Medida no existe'); $('bnreginm_codunimed').value='', $('bnreginm_codunimed').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
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
    $r->add(BntiplugPeer::CODTLU,$this->getRequestParameter('codigo'));
    $reg= BntiplugPeer::doSelectOne($r);
    if ($reg)
        $dato=$reg->getDestlu();
    else
        $js="alert('El Tipo de Lugar no existe'); $('bnreginm_codtlu').value='', $('bnreginm_codtlu').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='12')
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
        $js="alert('El Pais no existe'); $('bnreginm_codpai').value=''; $('bnreginm_nompai').value=''; $('bnreginm_codpai').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
   elseif ($this->getRequestParameter('ajax')=='13')
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
        $js="alert('El Estado no existe'); $('bnreginm_codes2').value=''; $('bnreginm_nomest').value=''; $('bnreginm_codes2').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   } 
   elseif ($this->getRequestParameter('ajax')=='14')
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
        $js="alert('El Municipio no existe o no esta asociado al Estado'); $('bnreginm_codmun').value=''; $('bnreginm_nommun').value=''; $('bnreginm_codmun').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='15')
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
        $js="alert('La Parroquia no existe o no esta asociado al Municipio'); $('bnreginm_codpar').value=''; $('bnreginm_nompar').value=''; $('bnreginm_codpar').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='16')
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
        $js="alert('La Ciudad no existe o no esta asociado al Municipio'); $('bnreginm_codciu').value=''; $('bnreginm_nomciu').value=''; $('bnreginm_codciu').focus();";
    
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
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
    $this->bnreginm = $this->getBnreginmOrCreate();

    try{
    $this->updateBnreginmFromRequest();
  }
    catch(Exception $ex){}

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
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->bnreginm = $this->getBnreginmOrCreate();
        $this->updateBnreginmFromRequest();

        if (!$this->bnreginm->getId())
    self::$coderror=Bienes::validarBnreginm($this->bnreginm);

        if (self::$coderror<>-1)
        {
          return false;
        }
        else return true;

      }else return true;
    }

  protected function saveBnreginm($bnreginm)
  {
    if ($bnreginm->getCodinm()=='########')
    {
      if (Herramientas::getVerCorrelativo('coractinm','bndefins',$r))
      {
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $sql="select codinm from bnreginm where codinm='".$numero."'";
          if (Herramientas::BuscarDatos($sql,$result))
          {
             $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
        }
        $bnreginm->setCodinm(str_pad($r, 8, '0', STR_PAD_LEFT));
       }
       Herramientas::getSalvarCorrelativo('coractinm','bndefins','RegistroInMuebles',$r,$msg);
    }

    if (!$bnreginm->getId())
      $this->bnreginm->setStainm('A');

      $bnreginm->save();

}
}
