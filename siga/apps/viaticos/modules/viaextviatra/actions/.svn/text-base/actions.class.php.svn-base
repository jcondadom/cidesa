<?php

/**
 * viaextviatra actions.
 *
 * @package    siga
 * @subpackage viaextviatra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class viaextviatraActions extends autoviaextviatraActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // AquÃ­ va el cÃ³digo para traernos los registros que contendrÃ¡ el grid
      $reg = array();
      // AquÃ­ va el cÃ³digo para generar arreglo de configuraciÃ³n del grid
    $this->obj = array();
    }
    $per=array();
    $valdol=0;
     $cambio=1;
     if(!$this->codpai)
     {
        $numsol = H::GetX('Numcal','Viacalviatra','Refsol',$this->viaextviatra->getRefcal());
        $codciu = H::GetX('Numsol','Viasolviatra','Codciu',$numsol);
        $this->codpai = H::getX('Codciu','Viaciudad','Codpai',$codciu);
        if ($this->codpai=='')
           $this->codpai =H::getX_vacio('Numsol','Viasolviatra','Codpai',$numsol);

     }
     if($this->codpai)
     {
         $c = new Criteria();
         $c->add(ViapaisPeer::CODPAI,$this->codpai);
         $op = ViapaisPeer::doSelectOne($c);
         if($op)
         {
             $valdol=$op->getMonto();
         }
         $c = new Criteria();
         $op = ViadefgenPeer::doSelectOne($c);
         if($op)
         {
             $cambio=$op->getValdolar();
         }
     }
     if($this->viaextviatra->getId()=='')
     {
         if($this->tipvia=='INTERNACIONAL')
         {
            $sql="select 1 as check,codrub,numdia,mondia, montot,tipo,
                  case when tipo='I1' then 'VIATICO DIARIO INTERNACIONAL'
                  when tipo='I2' then 'PRIMA ADICIONAL 100%'
                  when tipo='I3' then 'PRIMA SUPLEMENTARIA 30%'
                  else '' end as desrub,'C' as calculo
                  from viadetcalviatra where numcal='".$this->numcal."' and codrub='VI'
                  union all
                  select 1 as check,codrub,numdia,mondia, montot,tipo,(select desrub from viadefrub where codrub=a.codrub limit 1) as desrub,'F' as calculo
                  from viadetcalviatra a where numcal='".$this->numcal."' and codrub<>'VI' and tipo=''
                  ";

             if(H::BuscarDatos($sql, $arrrs))
             {
                 $i=0;
                 foreach($arrrs as $rs)
                 {
                    $per[$i]['check']=$rs['check'];
                    $per[$i]['codrub']=$rs['codrub'];
                    $per[$i]['desrub']=$rs['desrub'];
                    $per[$i]['numdia']=($rs['numdia']);
                    $per[$i]['mondia']=H::FormatoMonto($rs['mondia']);
                    $per[$i]['montot']=H::FormatoMonto($rs['montot']);
                    $per[$i]['tipo']=$rs['tipo'];
                    $per[$i]['calculo']=$rs['calculo'];
                    $per[$i]['mondiadol']=H::FormatoMonto(($rs['mondia']/$cambio));
                    #$per[$i]['cambio']=H::FormatoMonto($cambio);
                    $per[$i]['montotdol']=H::FormatoMonto(($rs['mondia']/$cambio)*$rs['numdia']);
                    $per[$i]['id']=9;
                    $i++;
                 }
             }
         }else
         {
             $sql="
                    select 1 as check,a.codrub,b.desrub,a.numdia,a.mondia, a.montot,a.tipo,b.tipo as calculo
                    from viadetcalviatra a, viadefrub b where a.numcal='".$this->numcal."' and a.tipo='' and
                    a.codrub=b.codrub
                    union all
                    select 1 as check,a.codrub,b.destiptra,a.numdia,a.mondia, a.montot,a.tipo,'C' as calculo
                    from viadetcalviatra a, viadeftiptra b where a.numcal='".$this->numcal."' and a.tipo<>'' and
                    a.tipo=b.codtiptra and b.tipo<>'A'
                    order by calculo";
             if(H::BuscarDatos($sql, $arrrs))
             {
                 $i=0;
                 foreach($arrrs as $rs)
                 {
                    $per[$i]['check']=$rs['check'];
                    $per[$i]['codrub']=$rs['codrub'];
                    $per[$i]['desrub']=$rs['desrub'];
                    $per[$i]['numdia']=($rs['numdia']);
                    $per[$i]['mondia']=H::FormatoMonto($rs['mondia']);
                    $per[$i]['montot']=H::FormatoMonto($rs['montot']);
                    $per[$i]['tipo']=$rs['tipo'];
                    $per[$i]['calculo']=$rs['calculo'];
                    $per[$i]['id']=9;
                    $i++;
                 }
             }
         }
     }else
     {
         $sql="select 1 as check,*,
               case when codrub='VI' then
                  case when tipo='I1' then 'VIATICO DIARIO INTERNACIONAL'
                       when tipo='I2' then 'PRIMA ADICIONAL 100%'
                       when tipo='I3' then 'PRIMA SUPLEMENTARIA 30%'
                       else ''
                  end
                else
                  case when tipo='' then (select desrub from viadefrub where codrub=a.codrub)
                  else (select destiptra from viadeftiptra where codtiptra=a.tipo)
                  end
                end as desrub,'C' as calculo
               from viadetextviatra a where numext='".$this->viaextviatra->getNumext()."'";

             if(H::BuscarDatos($sql, $arrrs))
             {
                 $i=0;
                 foreach($arrrs as $rs)
                 {
                    $per[$i]['check']=$rs['check'];
                    $per[$i]['codrub']=$rs['codrub'];
                    $per[$i]['desrub']=$rs['desrub'];
                    $per[$i]['numdia']=($rs['numdia']);
                    $per[$i]['mondia']=H::FormatoMonto($rs['mondia']);
                    $per[$i]['montot']=H::FormatoMonto($rs['montot']);
                    $per[$i]['tipo']=$rs['tipo'];
                    $per[$i]['calculo']=$rs['calculo'];
                    $per[$i]['mondiadol']=H::FormatoMonto(($rs['mondia']/$cambio));
                    #$per[$i]['cambio']=H::FormatoMonto($cambio);
                    $per[$i]['montotdol']=H::FormatoMonto(($rs['mondia']/$cambio)*$rs['numdia']);
                    $per[$i]['id']=9;
                    $i++;
                 }
             }
     }

     $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viaextviatra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
     #$this->obj[1][1]->setHtml('size=40 maxlength=250 onBlur="if($(id).value!=\'\')cambiardescripcion(this.id)"');
     $this->obj[1][3]->setHtml('size=10 onBlur="calculamontofinal(this.id,3);" onKeyPress="return validaEntero(event)"');
     $this->obj[1][4]->setHtml('size=10 readonly=true onBlur="ValidarMontoGridv2(this.id);calculamontofinal(this.id,4);"');
     $this->obj[1][0]->setHtml('size=5 onclick="Calculartotal();"');


     if($this->tipvia=='NACIONAL' || substr($this->viaextviatra->getRefcal(),0,2)=='VN')
     {
         $this->obj[1][8]->setOculta(true);
         $this->obj[1][9]->setOculta(true);
     }

     $this->obj = $this->obj[0]->getConfig($per);
     $this->viaextviatra->setGrid($this->obj);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el cÃ³digo necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la peticiÃ³n ajax desde el cliente los datos que necesitemos
    // para generar el cÃ³digo de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.
    $head=true;
    switch ($ajax){
      case '1':
        $fecha = $this->getRequestParameter('fecha','');
        $dateFormat = new sfDateFormat('es_VE');
        $fec1 = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

        $js='';
        $head=false;
        $c = new Criteria();
        $c->add(ViacalviatraPeer::NUMCAL,$codigo);
        $per = ViacalviatraPeer::doSelectOne($c);
        if($per)
        {
           if ($per->getFeccal() <= $fec1) {
            $feccal=date('d/m/Y',strtotime($per->getFeccal()));
            $empleado=$per->getEmpleado();
            $nivel=$per->getNivel();
            $codcat=$per->getCodcat();
            $nomcat=$per->getNomcat();
            $fecdes=$per->getFecdes();
            $fechas=$per->getFechas();
            $numdia=$per->getNumdia();
            $dconper=$per->getDiaconper();
            $dsinper=$per->getDiasinper();
            $tipvia=$per->getTipvia();
            $numsol = $per->getRefsol();//H::GetX('Numcal','Viacalviatra','Refsol',$codigo);
            $codciu = H::GetX('Numsol','Viasolviatra','Codciu',$numsol);
            $codest = H::getX('Codciu','Viaciudad','Codest',$codciu);
            $codpai = H::getX('Codciu','Viaciudad','Codpai',$codciu);
            if ($codpai=='')
               $codpai =H::getX_vacio('Numsol','Viasolviatra','Codpai',$numsol);
            $this->codpai=$codpai;
          }else {
            $feccal="";
            $empleado="";
            $codcat="";
            $nomcat="";
            $nivel="";
            $fecdes="";
            $fechas="";
            $numdia="";
            $dconper="";
            $dsinper="";
            $tipvia="";
            $codigo="";
            $js="alert_('La Fecha del C&aacute;lculo es mayor a la fecha de Extensi&oacute;n'); $('viaextviatra_refcal').value='';";
          }
        }else
        {
            $feccal="";
            $empleado="";
            $codcat="";
            $nomcat="";
            $nivel="";
            $fecdes="";
            $fechas="";
            $numdia="";
            $dconper="";
            $dsinper="";
            $tipvia="";
            $codigo="";
            $js="alert_('El C&aacute;lculo no esta registrado'); $('viaextviatra_refcal').value='';";
        }
        $this->viaextviatra = $this->getViaextviatraOrCreate();
        $this->updateViaextviatraFromRequest();
        $this->numcal=$codigo;
        $this->tipvia=$tipvia;
        if($tipvia=='NACIONAL')
        {
            $js.="$('divtotviadol').hide();";
        }else
        {
            $js.="$('divtotviadol').show();";
        }
        $this->configGrid();
        $output = '[["viaextviatra_feccal","'.$feccal.'",""],["viaextviatra_empleado","'.$empleado.'",""],["viaextviatra_nivel","'.$nivel.'",""],
                    ["viaextviatra_fecdes","'.$fecdes.'",""],["viaextviatra_fechas","'.$fechas.'",""],["viaextviatra_numdia","'.$numdia.'",""],
                    ["viaextviatra_diaconper","'.$dconper.'",""],["viaextviatra_diasinper","'.$dsinper.'",""],["viaextviatra_codcat","'.$codcat.'",""],
                    ["viaextviatra_nomcat","'.$nomcat.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
            $js='';
            $monto= $this->getRequestParameter('monto','');
            $codcat = $this->getRequestParameter('codcat','');
            $monto = H::obtenermontoescrito($monto);

            $output = '[["javascript","'.$js.'",""],["viaextviatra_totviaenletras","'.$monto.'",""],["","",""]]';
        break;
      case '3';
         $numdia=0;
         $fecdes = $this->getRequestParameter('fecdes','');
         $fechas = $this->getRequestParameter('fechas','');
         //$codemp = $this->getRequestParameter('codemp','');
         $id = $this->getRequestParameter('id','');
         $auxfecd = split("/",$fecdes);
         $auxfech = split("/",$fechas);
         $js="";
         $encon=false;
         if ($id=='viaextviatra_fecextdes')
         {
             if(count($auxfecd)==3)
             {
                  if(strtotime($auxfecd[2].'-'.$auxfecd[1].'-'.$auxfecd[0]))
                  {
                      $dateFormat = new sfDateFormat('es_VE');
                      $fec1 = $dateFormat->format($fecdes, 'i', $dateFormat->getInputPattern('d'));
                      
                       
                      /* $t= new Criteria();
                       $t->add(ViasolviatraPeer::CODEMP,$codemp);
                       $t->add(ViasolviatraPeer::STATUS,'N',Criteria::NOT_EQUAL);
                       $regis=ViasolviatraPeer::doSelect($t);
                       if ($regis)
                       {
                           foreach ($regis as $obj)
                           {
                               if ($fec1>=$obj->getFecdes() && $fec1<$obj->getFechas())
                               {
                                   $encon=true;
                                   break;
                               }
                           }
                       }*/
                  }else $js="alert('Fecha Inv&aacute;lida'); $('".$id."').value='';";
             }else $js="alert('Fecha Inv&aacute;lida'); $('".$id."').value='';";
         }else {
             if(count($auxfech)==3)
             {
                  if(strtotime($auxfech[2].'-'.$auxfech[1].'-'.$auxfech[0]))
                  {
                      $dateFormat = new sfDateFormat('es_VE');
                      $fec2 = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));
                      
                       /*$t= new Criteria();
                       $t->add(ViasolviatraPeer::CODEMP,$codemp);
                       $t->add(ViasolviatraPeer::STATUS,'N',Criteria::NOT_EQUAL);
                       $regis=ViasolviatraPeer::doSelect($t);
                       if ($regis)
                       {
                           foreach ($regis as $obj)
                           {
                               if ($fec2>=$obj->getFecdes() && $fec2<=$obj->getFechas())
                               {
                                   $encon=true;
                                   break;
                               }
                           }
                       }*/
                  }else $js="alert('Fecha Inv&aacute;lida'); $('".$id."').value='';";
             }else $js="alert('Fecha Inv&aacute;lida'); $('".$id."').value='';";
         }
         
         if (!$encon)
         {
             if ($fecdes!="" && $fechas!="")
             {
                 $dateFormat = new sfDateFormat('es_VE');
                 $feca = $dateFormat->format($fecdes, 'i', $dateFormat->getInputPattern('d'));
                 $fecb = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));
                 
                  if ($fecb>=$feca) {
                      $sql="select (to_date('$fechas','dd/mm/yyyy')-to_date('$fecdes','dd/mm/yyyy'))+1 as dias";
                      if(H::BuscarDatos($sql, $rs))
                        $numdia=$rs[0]['dias'];
                  }else $js="alert('La Fecha Hasta no puede ser menor a la Fecha Desde'); $('viaextviatra_fecexthas').value=''";
                 
             }
         }//else $js="alert_('El Solicitante del Vi&aacute;tico ya tiene un vi&aacute;tico entre esa fecha'); $('".$id."').value=''";        
         
        
         $output = '[["viaextviatra_numdiaext","'.$numdia.'",""],["javascript","'.$js.'",""]]';
        break;        
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucciÃ³n
    if($head)
        return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

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
      $this->viaextviatra = $this->getViaextviatraOrCreate();
      $this->updateViaextviatraFromRequest();

      if (!$this->viaextviatra->getId())
      {
        $feccal=H::getX_vacio('NUMCAL','Viacalviatra','Feccal',$this->viaextviatra->getRefcal());
        if ($this->viaextviatra->getFecext()<$feccal)
        {
          $this->coderr=1619;
          return false;          
        }

       /* if ($this->viaextviatra->getFecext()<$this->viaextviatra->getFecextdes() || $this->viaextviatra->getFecext()<$this->viaextviatra->getFecexthas())
        {
          $this->coderr=1624;
          return false;
        } */
        $dateFormat = new sfDateFormat('es_VE');
        $fec1 = $dateFormat->format($this->viaextviatra->getFecdes(), 'i', $dateFormat->getInputPattern('d'));

        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($this->viaextviatra->getFechas(), 'i', $dateFormat->getInputPattern('d'));

        if (($this->viaextviatra->getFecextdes()<=$fec1 || $this->viaextviatra->getFecextdes()<=$fec2) || ($this->viaextviatra->getFecexthas()<=$fec1 || $this->viaextviatra->getFecexthas()<=$fec2))
        {
          $this->coderr=1617;
          return false;
        }        
        if ($this->viaextviatra->getFecexthas()<$this->viaextviatra->getFecextdes())
        {
          $this->coderr=1618;
          return false;          
        }
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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    if (!$clasemodelo->getId()) {
    if($clasemodelo->getNumext()=='##########')
    {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(ViaextviatraPeer::NUMEXT);
        $per = ViaextviatraPeer::doSelectOne($c);
        if($per)
            $clasemodelo->setNumext(str_pad((intval($per->getNumext())+1),10,'0',STR_PAD_LEFT));
        else
            $clasemodelo->setNumext('0000000001');

    }
    $c = new Criteria();
    $c->add(ViaextviatraPeer::NUMEXT,$clasemodelo->getNumext());
    $c->add(ViaextviatraPeer::FECEXT,$clasemodelo->getFecext());
    $per= ViaextviatraPeer::doSelectOne($c);
    if($per)
       return 1636;

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    $valor=Viaticos::GenerarCompromisoExtension($clasemodelo,$grid,$refcom);
    if ($valor==-1)
    {
        if($refcom!="")
        {  
          foreach($grid[0] as $reg)
          {
              if($reg['check']=='1' && H::toFloat($reg['montot'])!=0)
              {                 
                $viadetext = new Viadetextviatra();
                $viadetext->setNumext($clasemodelo->getNumext());
                $viadetext->setFecext($clasemodelo->getFecext());
                $viadetext->setCodrub($reg['codrub']);
                $viadetext->setNumdia($reg['numdia']);
                $viadetext->setMondia($reg['mondia']);
                $viadetext->setMontot($reg['montot']);
                $viadetext->setTipo($reg['tipo']);
                $viadetext->save();            
              }
          }
      }else return $valor;
    }else return $valor;
    $clasemodelo->setRefcom($refcom);
    $clasemodelo->setStatus('A');
    return parent::saving($clasemodelo);
  }else
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    $tiecau=H::getX_vacio('REFERE','Cpimpcau','STAIMP',$clasemodelo->getRefcom());
    if ($tiecau=='' || $tiecau!='N') {
      H::EliminarRegistro('Cpimpcom','Refcom',$clasemodelo->getRefcom());
      H::EliminarRegistro('Cpcompro','Refcom',$clasemodelo->getRefcom());
      $c = new Criteria();
      $c->add(ViadetextviatraPeer::NUMEXT,$clasemodelo->getNumext());
      $per= ViadetextviatraPeer::doSelect($c);
      if($per)
          foreach($per as $r)
              $r->delete();

      $clasemodelo->delete();
      }else return 1605;
    return -1;
  }


}
