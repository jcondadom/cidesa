<?php

/**
 * almordmul actions.
 *
 * @package    siga
 * @subpackage almordmul
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almordmulActions extends autoalmordmulActions
{
  private $codigo="";

  public function executeCreate()
  {
    $c= new Criteria();
    $monedas=TsdesmonPeer::doSelectOne($c);
    if (!$monedas)
    {
      $this->getRequest()->setError('valida', 'Debe registrar al menos un Tipo de Moneda.');
      return $this->forward('almordmul', 'list');
    }
    else {
        $o= new Criteria();
        $o->add(OpdefempPeer::CODEMP,'001');
        $defmon=OpdefempPeer::doSelectOne($o); 
        if ($defmon) {
          if ($defmon->getCodmon()=='') {
            $this->getRequest()->setError('valida', 'Debe definir en el Modulo de Tesoreria -> Empresa la Moneda Oficial.');
            return $this->forward('almordmul', 'list');
          }
        }
    }

    $c= new Criteria();
    $cadefart_search = CadefartPeer::doSelectOne($c);    
    if (!$cadefart_search){
      $this->getRequest()->setError('valida', 'Debe realizar la Definición de Artículos.');
      return $this->forward('almordmul', 'list');
    }

    return $this->forward('almordmul', 'edit');
  }

  public function editing()
  {
    if (!$this->caordcom->getId())
    {
      $mon=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      $this->caordcom->setTipmon($mon);
      $q= new Criteria();
      $q->add(TsdesmonPeer::CODMON,$mon);
      $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
      $reg= TsdesmonPeer::doSelectOne($q);
      if ($reg)      
         $valor=number_format($reg->getValmon(),6,',','.');
      else 
         $valor=0;
      $this->caordcom->setValmon($valor);
    }
    $this->configGrid();
   if (!$this->caordcom->getId())
   {
     $this->caordcom->setTipmon(H::getX_vacio('CODEMP','Opdefemp','Codmon','001'));
     $this->caordcom->setValmon(H::getX_vacio('CODMON','Tsdesmon','Valmon',$this->caordcom->getTipmon()));
   }
  }

  public function configGrid()
  {
    $this->configGridDetalle($this->caordcom->getOrdcom(),'0');
    $this->configGridResumen($this->caordcom->getOrdcom());
    $this->configGridCronograma($this->caordcom->getOrdcom());
    $this->configGridFormaEntrega($this->caordcom->getOrdcom());
    $this->configGridResumenPartidas($this->caordcom->getOrdcom());
    $this->configGridRecargo();    
    $this->configGridSolicitudes();

  }

    public function configGridDetalle($ordcom = '', $ref='', $tipo='', $arreglo=array()) {

        $detsinord=H::getConfApp2('detsinord', 'compras', 'almordcom');
        $manunialt=H::getConfApp2('manunialt','compras','almregart');
        $oculfilas=H::getConfApp2('oculfilas', 'compras', 'almordcom');
        $deshabilmonrec=H::getConfApp2('deshabilmonrec', 'compras', 'almordcom');
        $det=array();
        
        if (count($arreglo)>0)
        {
          $p=0;
          while ($p<count($arreglo))
          {
            $caartord2= new Caartord();
            $caartord2->setCheck($arreglo[$p]["check"]);
            $caartord2->setCodart($arreglo[$p]["codart"]);
            $caartord2->setDesart($arreglo[$p]["desart"]);
            $caartord2->setUnimed($arreglo[$p]["unimed"]);
            $caartord2->setCodpar($arreglo[$p]["codpar"]);
            $caartord2->setCodcat($arreglo[$p]["codcat"]);
            $caartord2->setCodpre($arreglo[$p]["codpre"]);
            $caartord2->setCanord($arreglo[$p]["canord"]);
            $caartord2->setCanaju($arreglo[$p]["canaju"]);
            $caartord2->setCanrec($arreglo[$p]["canrec"]);
            $caartord2->setCantot($arreglo[$p]["cantot"]);
            $caartord2->setPreart($arreglo[$p]["preart"]);
            $caartord2->setPrenet($arreglo[$p]["prenet"]);
            $caartord2->setDtoart($arreglo[$p]["dtoart"]);
            $caartord2->setRgoart($arreglo[$p]["rgoart"]);
            $caartord2->setTotart($arreglo[$p]["totart"]);
            $caartord2->setDatosrecargo($arreglo[$p]["datosrecargo"]);
            $caartord2->setReqart($arreglo[$p]["reqart"]);
            $caartord2->setCanreq($arreglo[$p]["canreq"]);
            $det[]=$caartord2;
            
            $p++;
          }
        }
        else
        {
            $c = new Criteria();
            $c->add(CaartordPeer :: ORDCOM, $ordcom);
          if ($detsinord!='S')
            $c->addAscendingOrderByColumn(CaartordPeer::CODART);
            $det = CaartordPeer :: doSelect($c);
        }        

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almordmul/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detalle');
        if ($ref=='1') {
            $this->columnas[0]->setEliminar(false);
            $this->columnas[0]->setFilas(0);
        }

        $mascaraart= H::getMascaraArticulo();
        $mascaracat= H::getObtener_FormatoCategoria();
        $lonart=strlen($mascaraart);
        $loncat=strlen($mascaracat);

        //Columna de Checkbox Marque
        $this->columnas[1][0]->setHTML('onClick="desmarcarfila(this.id)"');
        if ($tipo=='P') $this->columnas[1][0]->setOculta(true);

        //Columna de Código Artículo
        if ($ref=='1')
        {
            $this->columnas[1][1]->setHTML('type="text" size="17" readOnly=true');

        }else {
            $obj= array('codart' => 2,'desart' => 3, 'unimed' => 4, 'cosult' => 12, 'codpar' => 5);
            $params= array('param1' => $lonart, 'param2' => "'+$('caordcom_tipord').value+'", 'val2');
            $this->columnas[1][1]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonart.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraart.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjax(\'3\',getUrlModulo()+\'ajax\',this.value,\'\',\'&longitud=\'+$(\'formetotrcre_longitud\').value+\'&cajtexcom=\'+this.id)"');
            $this->columnas[1][1]->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Almsolegr',$params);
        }
        //Columna Unidad de Medida
        if ($manunialt=='S')
        {
            $this->columnas[1][3]->setTipo('c');
            $this->columnas[1][3]->setCombo(CaunialartPeer::getUnidades());
            $this->columnas[1][3]->setHTML(' ');
        }

        //Columna de Partida
        $paramsq = array('param1' => "'+$(this.id).up().previous(2).descendants()[0].value+'");
        $this->columnas[1][4]->setCatalogo('caartpar','sf_admin_edit_form',array('codpar' => 5),'Nppartidas_Caregart',$paramsq);

        //Columna de Categoría
        if ($ref=='1')
        {
            $this->columnas[1][5]->setHTML('type="text" size="17" readOnly=true');

        }else {
            $params2= array('param1' => $loncat);
            $this->columnas[1][5]->setHTML('type="text" size="17" maxlength="'.chr(39).$loncat.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaracat.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjax(\'3\',getUrlModulo()+\'ajax\',this.value,\'\',\'&longitud=\'+$(\'formetotrcre_longitud\').value+\'&cajtexcom=\'+this.id)"');
            $this->columnas[1][5]->setCatalogo('npcatpre','sf_admin_edit_form',array('codcat' => 6),'Npcatpre_Almsolegr',$params2);
        }

        //Columna de Cantidad a Ordenar
        //$this->columnas[1][7]->setHTML('type="text" size="10" onBlur="ValidarMontoGridv2(this); "');

        //Ocultar Columnas Cantidad Ajustada, Recibida, Total, Descuento
        if ($oculfilas=='S')
        {
          $this->columnas[1][8]->setOculta(true);
          $this->columnas[1][9]->setOculta(true);
          $this->columnas[1][10]->setOculta(true);
          $this->columnas[1][13]->setOculta(true);
        }

        //Columna Costo
    
        // $this->columnas[1][11]->setHTML('type="text" size="10" onBlur="ValidarMontoGridv2(this,6); "');

        //Columna Descuento
         $this->columnas[1][13]->setHTML('type="text" size="10" onBlur="ValidarMontoGridv2(this);"');

        //Columna Recargo
         if ($tipo=='P') $this->columnas[1][14]->setOculta(true);
         if ($ref!='1')
         {
             if ($deshabilmonrec=='S')
             {
                 $this->columnas[1][14]->setHTML('type="text" size="10" onBlur="ValidarMontoGridv2(this,4);"');
             }
         }
        

        $this->obj = $this->columnas[0]->getConfig($det);

        $this->caordcom->setObj($this->obj);
    }

    public function configGridCronograma($ordcom = '', $arreglo=array()) {

        if (count($arreglo)>0)
        {
          foreach ($arreglo as $art) {
            $caartfec2= new Caartfec();
            $caartfec2->setCodart($art[0]);
            $caartfec2->setDesart($art[1]);
            $caartfec2->setCanart($art[2]);
            $caartfec2->setFecent($art[3]);
            $gfec[]=$caartfec2;
          }
        }else {
          $c = new Criteria();
          $c->add(CaartfecPeer::ORDCOM, $ordcom);
          $gfec = CaartfecPeer::doSelect($c);
        }

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almordmul/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fecha_entrega');

        $this->obj4 = $this->columnas[0]->getConfig($gfec);

        $this->caordcom->setObj4($this->obj4);
    }

    public function configGridFormaEntrega($ordcom = '') {

      $c = new Criteria();
      $c->add(CaentordPeer::ORDCOM, $ordcom);
      $gfen = CaentordPeer::doSelect($c);

      $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almordmul/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_forma_entrega');

      $mascaraart= H::getMascaraArticulo();
      $lonart=strlen($mascaraart);

      //Columna de Código Artículo
      $obj= array('codart' => 1,'desart' => 2);
      $params= array('param1' => $lonart, 'param2' => "'+$('caordcom_tipord').value+'", 'val2');
      $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonart.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraart.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjax(\'3\',getUrlModulo()+\'ajax\',this.value,\'\',\'&longitud=\'+$(\'formetotrcre_longitud\').value+\'&cajtexcom=\'+this.id)"');
      $this->columnas[1][0]->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Almsolegr',$params);      

      $this->obj5 = $this->columnas[0]->getConfig($gfen);

      $this->caordcom->setObj5($this->obj5);
    }

    public function configGridRecargo($ordcom='', $refsol = '', $codart='', $coduni='', $tipdoc='') {

       $deshabilmonrec=H::getConfApp2('deshabilmonrec', 'compras', 'almordcom');

       $c = new Criteria();
       $c->add(CadisrgoPeer::REQART,$refsol);
       $c->add(CadisrgoPeer::CODART,$codart);
       $c->add(CadisrgoPeer::CODCAT,$coduni);
       $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
       $c->addAscendingOrderByColumn(CadisrgoPeer::CODRGO);
       $grec = CadisrgoPeer::doSelect($c);


    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almordmul/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_recargos');


    //Columna Monto Recargo
    if ($deshabilmonrec=='S')
    {
        $this->columnas[1][4]->setHTML('type="text" size="10" onBlur="ValidarMontoGridv2(this,4);"');
    }

    if ($refsol!="")
    {
        $this->columnas[0]->setEliminar(false);
        $this->columnas[0]->setFilas(10);
        $this->columnas[1][0]->setHTML('type="text" size="10" readOnly=true');
    }

    $this->obj6 = $this->columnas[0]->getConfig($grec);

    $this->caordcom->setObj6($this->obj6);
    }

    public function configGridResumen($ordcom = '', $arreglo=array()) {

        if (count($arreglo)>0)
        { 
              foreach ($arreglo as $key => $value) {
                $caresordcom2= new Caresordcom();
                $caresordcom2->setCodart($value[0]);
                $caresordcom2->setDesres($value[1]);
                $caresordcom2->setCodartpro($value[2]);
                $caresordcom2->setCanord($value[3]);
                $caresordcom2->setCanaju($value[4]);
                $caresordcom2->setCanrec($value[5]);
                $caresordcom2->setCantot($value[6]);
                $caresordcom2->setCosto($value[7]);
                $caresordcom2->setRgoart($value[8]);
                $caresordcom2->setTotart($value[9]);
                $gres[]=$caresordcom2;                
              }
        }else {
          $c = new Criteria();
          $c->add(CaresordcomPeer::ORDCOM, $ordcom);
          $gres = CaresordcomPeer::doSelect($c);
        }

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almordmul/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_resumen');

        $this->obj2= $this->columnas[0]->getConfig($gres);

        $this->caordcom->setObj2($this->obj2);
    }

    public function configGridResumenPartidas($ordcom='', $arreglo=array()) {
      $escodpre = 'N';
      if (count($arreglo) > 0) {
        $reg = $arreglo;
        $resp = count($arreglo);
      } else {
        $sql = "select 9 as id, '' as nompar, codpar, sum(totarti) as totart, recargo from (select 9 as id, '' as nompar,  a.codpar as codpar, sum((a.totart-a.rgoart)) as totarti, 'N' as recargo from caartord a
              where a.ordcom='" . $ordcom . "'  group by  a.codpar,a.totart,a.rgoart
              union
              select 9 as id, '' as nompar, c.codpre as codpar,sum(b.monrgo) as totarti, 'S' as recargo from cargosol b, carecarg c
              where reqart='" . $ordcom . "' and b.codrgo=c.codrgo group by c.codpre) as nueva group by codpar, recargo";
        $resp = Herramientas::BuscarDatos($sql, $reg);
      }

        //verificar si la imputacion presupuestaria asociada al recargo es una partida o un codigo presupuestario
        $c = new Criteria();
        $cadefart_search = CadefartPeer::doSelectOne($c);
        if ($cadefart_search) {
          if ($cadefart_search->getAsiparrec() == 'P')
            $escodpre = "S";
        }
        //obtener partida para el caso que la imputacion presupuestaria del recargo este asociada a un codigo presupuestario
        if ($escodpre == "S") {
          $res = array();
          $misql = "Select rupcat, ruppar From CpDefNiv";
          $i = 1;
          if (Herramientas::BuscarDatos($misql, $res)) {
            $categoria = $res[0]['rupcat'];
            $partidas = $res[0]['ruppar'];
          }
        }// if ($escodpre=="S")
        $i = 0;
        while ($i < count($reg)) {
          if ($reg[$i]["recargo"] == "S" and $escodpre == "S")
            $reg[$i]["codpar"] = substr($reg[$i]["codpar"], $categoria + 2);
          $reg[$i]["nompar"] = H::getX_vacio('CODPAR','Nppartidas','Nompar',$reg[$i]["codpar"]);
          $reg[$i]["totart"]=H::FormatoMonto($reg[$i]["totart"]);
          $i++;
        }

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almordmul/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_resumen_partida');

        $this->obj3= $this->columnas[0]->getConfig($reg);

        $this->caordcom->setObj3($this->obj3);
    }

    public function configGridSolicitudes($tipoord='') {
        $arrsol=array();
     if (!$this->caordcom->getId()) {
      if ($tipoord!='') {
        $sql="select '0' as check, a.reqart as reqart, a.fecreq as fecreq, a.desreq as desreq, 9 as id from casolart a, caartsol b
            where a.reqart=b.reqart and a.stareq='A' and a.aprreq='S' and a.tipreq='".$tipoord."'
            group by a.reqart,a.fecreq,a.desreq,a.monreq
            having
            sum(coalesce(b.canreq,0)) > sum(coalesce(b.canord,0))
            order by a.reqart,a.fecreq";          
        Herramientas::BuscarDatos($sql,$arrsol);
      }
     }

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almordmul/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_sc');

        $this->obj7= $this->columnas[0]->getConfig($arrsol);

        $this->caordcom->setObj7($this->obj7);
    }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $js=""; $dato=""; $sw=true;
    $this->ajax=$ajax;

    switch ($ajax){
      case '1':
        if (!Herramientas::validarPeriodoPresuesto($codigo))
        {
            $js="alert_('La Fecha no se encuentra dentro del Per&iacute;odo Fiscal'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }else {
           if (!Herramientas::validarPeriodoFiscal($codigo))
           {
               $js="alert_('La Fecha se encuentra dentro un Per&iacute;odo Cerrado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
           }
        }
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '2':
          $dato2="";
          $sw=false;
          $tipord = $this->getRequestParameter('tipord','');
          $c= new Criteria();
          $c->add(CpdoccomPeer::TIPCOM,$codigo);
          $reg= CpdoccomPeer::doSelectOne($c);
          if ($reg)
          {
             $dato=$reg->getNomext();
             $dato2=$reg->getRefprc();
             if ($reg->getRefprc()=='S' && $reg->getAfeprc()=='N' && $reg->getAfecom()=='S' && $reg->getAfedis()=='N')
             {
               $js="$('divgridsc').show();";
             }else {
                 $ocdirref=H::getConfApp2('ocdirref', 'compras', 'almordmul');
                 if ($ocdirref=='S')
                 {
                     $js="
                        if(confirm('¿Desea visualizar las Solicitudes de Egreso?'))
                        {
                           $('divgridsc').show();
                        }
                       ";
                 }
             }
          }else {
            $tipord="";
            $js="alert_('El Documento de Compromiso no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }

          $this->params=array();
          $this->caordcom = $this->getCaordcomOrCreate();
          $this->updateCaordcomFromRequest();
          $this->labels = $this->getLabels();
       
          $this->configGridSolicitudes($tipord);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["caordcom_refprc","'.$dato2.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
        $refsol=$this->getRequestParameter('refsol');
        $refprc=$this->getRequestParameter('refprc');
        $dato2=""; $dato3=""; $com='';
        $msg="";
        $d= new Criteria();
        $d->add(CaproveePeer::RIFPRO,$codigo);
        $reg= CaproveePeer::doSelectOne($d);
        if ($reg)
        {
           if ($refsol!="" && $refprc=='S')
           {
               if (!OrdenCompraMultiple::Verificar_proveedor($refsol,$codigo,$msg))
              {
                 $js="alert('$msg'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
              }else {
               $dato=$reg->getNompro();
               $dato2=$reg->getCodpro();
               $dato3=$reg->getTipo();

               $cadsol=split('_',$refsol);
               $result=array();
               $conpagfij=H::getConfApp2('conpagfij', 'compras', 'almordcom');
               $sql = "select a.refcot as refcot,a.conpag as conpag,a.forent as forent from cacotiza a,caprovee b where b.estpro='A' and refsol='".$cadsol[0]."' and b.rifpro='".$codigo."' and a.codpro=b.codpro";
               if (Herramientas::BuscarDatos($sql,$result))
               {
                if ($conpagfij=='S')
                {
                    $conpag=H::getX_vacio('Codemp', 'Cadefart', 'Codconpag', '001');
                    $forent=H::getX_vacio('Codemp', 'Cadefart', 'Codforent', '001');
                }else {
                    $conpag=$result[0]['conpag'];
                    $forent=$result[0]['forent'];
                }
                $desconpag=H::getX_vacio('Codconpag', 'Caconpag', 'Desconpag', $conpag);
                $desforent=H::getX_vacio('Codforent', 'Caforent', 'Desforent', $forent);

                $com=',["caordcom_conpag","'.$conpag.'",""],["caordcom_desconpag","'.$desconpag.'",""],["caordcom_forent","'.$forent.'",""],["caordcom_desforent","'.$desforent.'",""]';
               }

               $js="generarDetalle(); total_completo();";
              }
           }else {
               $dato=$reg->getNompro();
               $dato2=$reg->getCodpro();
               $dato3=$reg->getTipo();
           }
        }else {
            $js="alert('El Rif de la Contratista de Bienes o Servicios y Cooperativas no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["caordcom_codpro","'.$dato2.'",""],["caordcom_tipopro","'.$dato3.'",""],["javascript","'.$js.'",""]'.$com.']';
        break;
      case '4':
          $w= new Criteria();
          $w->add(CaconpagPeer::CODCONPAG,$codigo);
          $reg= CaconpagPeer::doSelectOne($w);
          if ($reg)
          {
              $dato=$reg->getDesconpag();
          }else {
              $js="alert_('La Condici&oacute;n de Pago no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '5':
          $w= new Criteria();
          $w->add(CatipproPeer::CODPRO,$codigo);
          $reg= CatipproPeer::doSelectOne($w);
          if ($reg)
          {
              $dato=$reg->getDespro();
          }else {
              $js="alert_('El Proyecto no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '6':
          $w= new Criteria();
          $w->add(CaforentPeer::CODFORENT,$codigo);
          $reg= CaforentPeer::doSelectOne($w);
          if ($reg)
          {
              $dato=$reg->getDesforent();
          }else {
              $js="alert_('La Forma de Entrega no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '7':
          $w= new Criteria();
          $w->add(FortipfinPeer::CODFIN,$codigo);
          $reg= FortipfinPeer::doSelectOne($w);
          if ($reg)
          {
              $dato=$reg->getNomext();
          }else {
              $js="alert_('El Tipo de Financiamiento no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '8':
          $w= new Criteria();
          $w->add(BnubicaPeer::CODUBI,$codigo);
          $reg= BnubicaPeer::doSelectOne($w);
          if ($reg)
          {
              $dato=$reg->getDesubi();
          }else {
              $js="alert_('La Unidad Responsable no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '9':
          $w= new Criteria();
          $w->add(NphojintPeer::CODEMP,$codigo);
          $reg= NphojintPeer::doSelectOne($w);
          if ($reg)
          {
              $dato=$reg->getNomemp();
          }else {
              $js="alert_('El Empleado Responsable no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '10':
        $w= new Criteria();
        $w->add(CadefcenPeer::CODCEN,$codigo);
        $reg= CadefcenPeer::doSelectOne($w);
        if ($reg)
        {
           $dato=$reg->getDescen(); 
        }else {
            $js="alert('El Centro de Costo no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '11':
        $w= new Criteria();
        $w->add(CadefcenacoPeer::CODCENACO,$codigo);
        $reg= CadefcenacoPeer::doSelectOne($w);
        if ($reg)
        {
           $dato=$reg->getDescenaco();
        }else {
            $js="alert('El Centro de Acopio no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '12':
          $com='';
          $sw=false;
          $tippro=H::getX_vacio('RIFPRO', 'Caprovee', 'Tipo', $this->getRequestParameter('rifpro'));
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          $fecha = $dateFormat->format($this->getRequestParameter('fecord'), 'i', $dateFormat->getInputPattern('d'));
          OrdenCompraMultiple::GenerarDetalle($codigo, $fecha, $this->getRequestParameter('rifpro'), $arreglo, $msj, $provedor);
          if ($msj=="")
          {
            if ($provedor!="")
            {
                $rifpro=H::getX_vacio('CODPRO', 'Caprovee', 'Rifpro', $provedor);
                $nompro=H::getX_vacio('CODPRO', 'Caprovee', 'Nompro', $provedor);
                $tippro=H::getX_vacio('CODPRO', 'Caprovee', 'Tippro', $provedor);

                $com=',["caordcom_rifpro","'.$rifpro.'",""],["caordcom_nompro","'.$nompro.'",""],["caordcom_tippro","'.$tippro.'",""],["caordcom_codpro","'.$provedor.'",""]';
            }
            $cadsol=split('_',$codigo);
            $r= new Criteria();
            $r->add(CasolartPeer::REQART,$cadsol[0]);
            $result= CasolartPeer::doSelectOne($r);
            if ($result)
            {
                $desord=eregi_replace("[\n|\r|\n\r]", "", $result->getDesreq());
                $tipfin=$result->getTipfin();
                $nomext=H::getX_vacio('CODFIN', 'Fortipfin', 'Nomext', $tipfin);
                $codcen=$result->getCodcen();
                $descen=H::getX_vacio('CODCEN', 'Cadefcen', 'Descen', $codcen);

              $com=$com.',["caordcom_desord","'.$desord.'",""],["caordcom_tipfin","'.$tipfin.'",""],["caordcom_nomext","'.$nomext.'",""],["caordcom_codcen","'.$codcen.'",""],["caordcom_descen","'.$descen.'",""]';
            }
            

            $this->params=array();
            $this->caordcom = $this->getCaordcomOrCreate();
            $this->labels = $this->getLabels();

            $this->configGridDetalle('', '1', $tippro, $arreglo);
            $js="$('divgridsc').hide(); $('caordcom_refsol').value='$codigo'; $('marrec').hide(); $('desmar').hide(); total_completo();";
          }else {
            $this->params=array();
            $this->caordcom = $this->getCaordcomOrCreate();
            $this->labels = $this->getLabels();

            $this->configGridDetalle();
            $js="alert_('$msj'); $('divgridsc').show(); $('caordcom_refsol').value='".$codigo."'";
          }       

        $output = '[["javascript","'.$js.'",""]'.$com.']';
        break;
      case '13':
        $sw=false;
        $grida = $this->getRequestParameter('grida', '');
        $gridr = $this->getRequestParameter('gridr', array());

        $resumen = OrdenCompraMultiple::generarResumen($grida, $gridr);
        $this->params=array();
        $this->caordcom = $this->getCaordcomOrCreate();
        $this->labels = $this->getLabels();

        $this->configGridResumen('', $resumen);

        $js="$('divgridres').show();";

        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '14':
          $sw=false;
          $grida = $this->getRequestParameter('grida', '');

          $resumenpartidas = OrdenCompraMultiple::generarResumenPartidas($grida);
          $this->params=array();
          $this->caordcom = $this->getCaordcomOrCreate();
          $this->labels = $this->getLabels();

          $this->configGridResumenPartidas('',$resumenpartidas);
         $js="$('divgridrespar').show();";

        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '15':
         $sw=false;
         $grida = $this->getRequestParameter('grida', '');
         $gridb = $this->getRequestParameter('gridb', array());

         $entregas = OrdenCompraMultiple::generarEntregas($grida, $gridb);
         $this->params=array();
         $this->caordcom = $this->getCaordcomOrCreate();
         $this->labels = $this->getLabels();

         $this->configGridCronograma('', $entregas);
        
         $js="$('divgridfecent').show();";

         $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '16':
          $q= new Criteria();
          $q->add(TsdesmonPeer::CODMON,$this->getRequestParameter('codigo'));
          $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
          $reg= TsdesmonPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=number_format($reg->getValmon(),6,',','.');
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      case '17':
          $w= new Criteria();
          $w->add(CadefdirecPeer::CODDIREC,$codigo);
          $reg= CadefdirecPeer::doSelectOne($w);
          if ($reg)
          {
              $dato=$reg->getDesdirec();
          }else {
              $js="alert_('La Direcci&oacute;n no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '18':
         $w= new Criteria();
          $w->add(CadefdiviPeer::CODDIVI,$codigo);
          $w->add(CadefdiviPeer::CODDIREC,$this->getRequestParameter('coddirec'));
          $reg= CadefdiviPeer::doSelectOne($w);
          if ($reg)
          {
              $dato=$reg->getDesdivi();
          }else {
              $js="alert_('La Divisi&oacute;n no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '19':
        $q= new Criteria();
        $q->add(CadefalmPeer::CODALM,$codigo);
        $reg= CadefalmPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getNomalm();
        }else {
            $js="alert_('El Almac&eacute;n no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '20':
         $sw=false;
          $articulo = $this->getRequestParameter('articulo');
          $codunidad = $this->getRequestParameter('coduni');
          $nuevo = $this->getRequestParameter('nuevo');
          $refsol = $this->getRequestParameter('refsol');
          $ordcom = $this->getRequestParameter('ordcom');
          $doccom = $this->getRequestParameter('tipcom');
          $t = new Criteria();
          $t->add(CpdoccomPeer::TIPCOM, $doccom);
          $reg = CpdoccomPeer::doSelectOne($t);
          if ($reg) {
            $refprc = $reg->getRefprc();
            $afeprc = $reg->getAfeprc();
            $afecom = $reg->getAfecom();
            $afedis = $reg->getAfedis();
          } else {
            $refprc = "";
            $afeprc = "";
            $afecom = "";
            $afedis = "";
          }

         $this->params=array();
         $this->caordcom = $this->getCaordcomOrCreate();
         $this->labels = $this->getLabels();

         $this->configGridRecargo($refsol, $articulo, $codunidad, $doccom);
        
         $js="$('divgridrec').show();";

         $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
    default:
        //Generar Compromiso
        $error1=-1;
        $cod1="";
        $error2=-1;
        $error3=-1;
        $this->caordcom = $this->getCaordcomOrCreate();
        $this->updateCaordcomFromRequest();

        Orden_compra::verificarDispComprometer($this->caordcom,$error1,$cod1,$error2,$error3,$mdis,$mimp,$resta);
        if ($error3==-1) {
          if ($error1==-1) {
            if ($error2==-1) {
               OrdenCompraMultiple::Grabar_compromiso($this->caordcom);
               $totaimp=Orden_compra::totalImputacion($this->caordcom->getOrdcom());
                $moneda = $this->caordcom->getTipmon();
                $moneda2 = H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
                if ($moneda2 != $moneda) {
                  $valor = $this->caordcom->getValmon();
                }else
                  $valor=H::getX_vacio('CODMON', 'Tsdesmon', 'Valmon', $moneda);
                if ((H::toFloat($this->caordcom->getMonord()) * H::toFloat($valor,6)) != H::toFloat($totaimp)) 
                {
                    $msj="El Monto de la Imputaciones Generadas no es igual al de la Solicitud, Por favor, realice el respectivo ajuste";
                }else{
                    $msj="Se Genero el Compromiso satisfactoriamente";
                }
               $js="$$('.sf_admin_action_save')[1].hide(); ";
            }
            else{
              $msj="No hay disponibilidad para el siguiente Código presupuestario: ".$cod1.", el monto a imputar es de: ".H::FormatoMonto($mimp) ." y el monto disponible es: ".H::FormatoMonto($mdis).", necesita una disponibilidad adicional de: ".H::FormatoMonto($resta);
            }
          }else $msj="No hay disponibilidad para el siguiente Código presupuestario: ".$cod1.", el monto a imputar es de: ".H::FormatoMonto($mimp) ." y el monto disponible es: ".H::FormatoMonto($mdis).", necesita una disponibilidad adicional de: ".H::FormatoMonto($resta);
        }else $msj="La Fecha no se encuentra dentro de un Perido Abierto.";

        $js=$js."alert('".$msj."')";
       
        $output = '[["javascript","'.$js.'",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if ($sw) return sfView::HEADER_ONLY;

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

    if($this->getRequest()->getMethod() == sfRequest::POST){
      $this->caordcom = $this->getCaordcomOrCreate();
      try{ $this->updateCaordcomFromRequest();}
      catch (Exception $ex){}

      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

      if ($this->caordcom->getId())
      {
        if ($this->caordcom->getStaord()=='N')        
          $this->coderr=159;    
      }else {
        $numord = str_replace('#','0',$this->caordcom->getOrdcom());
        $numord = str_pad($numord, 8, '0', STR_PAD_LEFT);

        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        $moneda=$this->getRequestParameter('caordcom[tipmon]');

        $prefijomixto=H::getConfApp('prefijomixto', 'compras', 'almordcom');
        $mancormext=H::getConfApp2('mancormext', 'compras', 'almordcom');
        if ($mancormext=='S') {
          if ($moneda!=$moneda2)
                $numord = 'OE' . substr($numord, 2, 6);
          else {
            if (($this->caordcom->getTipord()=='S') || ($this->caordcom->getTipord()=='M') || ($this->caordcom->getTipord()=='T') || ($this->caordcom->getTipord() == 'G') || ($this->caordcom->getTipord() == 'A'))
            {
              if ($prefijomixto!="" && $this->caordcom->getTipord()=='M')
                $numord = $prefijomixto.substr($numord, 2, 6);
              elseif ($this->caordcom->getTipord()=='T')
                  $numord = 'CO'.substr($numord, 2, 6);
              elseif ($this->caordcom->getTipord() == 'G')
                    $numord = 'SG' . substr($numord, 2, 6);
              elseif ($this->caordcom->getTipord() == 'A')
                $numord = 'OM' . substr($numord, 2, 6);
              else $numord = 'OS'.substr($numord, 2, 6);
            }else{
              $numord = 'OC'.substr($numord, 2, 6);
            }  
          }
        }else {
          if (($this->caordcom->getTipord()=='S') || ($this->caordcom->getTipord()=='M') || ($this->caordcom->getTipord()=='T') || ($this->caordcom->getTipord() == 'G') || ($this->caordcom->getTipord() == 'A'))
          {
            if ($prefijomixto!="" && $this->caordcom->getTipord()=='M')
              $numord = $prefijomixto.substr($numord, 2, 6);
            elseif ($this->caordcom->getTipord()=='T')
                $numord = 'CO'.substr($numord, 2, 6);
            elseif ($this->caordcom->getTipord() == 'G')
                  $numord = 'SG' . substr($numord, 2, 6);
            elseif ($this->caordcom->getTipord() == 'A')
              $numord = 'OM' . substr($numord, 2, 6);
            else $numord = 'OS'.substr($numord, 2, 6);
          }else{
            $numord = 'OC'.substr($numord, 2, 6);
          }     
        }

        if(H::getX_vacio('ordcom','caordcom','ordcom',$numord)!=''){
          $this->coderr = 102;
          $this->caordcom->setOrdcom($numord);
          return false;
        }

        $refprc=H::getX_vacio('TipCom','CpDocCom','RefPrc',$this->caordcom->getDoccom());
        if ($refprc!='N' && $this->caordcom->getRefsol()=='')
        {
            $this->coderr = 222;
            return false;
        }

        //Valido Fechas
        /*if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('caordcom[fecord]'))==true)
        {
          $this->coderr=529;
          return false;
        }*/

        if (!H::validarPeriodoPresuesto($this->getRequestParameter('caordcom[fecord]')))
        {
          $this->coderr=151;
          return false;
        }

        if (!H::validarPeriodoFiscal($this->getRequestParameter('caordcom[fecord]')))
        {
            $this->coderr=150;
            return false;
        }
        //Validaciones de variables configurables
        $mannivapr=H::getConfAppGen('mannivapr');
        if ($mannivapr=='S')
        {
          $login=$this->getUser()->getAttribute('loguse');
          Autenticacion::validadNivelAprobacion($login,H::tofloat($this->getRequestParameter('caordcom[monord]')),$erro);
          if ($erro!=-1)
          {
            $this->coderr=$erro;
            return false;
          }
        }

        $valcencos=H::getConfApp2('valcencos', 'compras', 'almordcom');
        if ($valcencos=='S')
        {
          if ($this->getRequestParameter('caordcom[codcen]')=="")
          {
            $this->coderr = 569;
            return false;
          }else {
              $r= new Criteria();
              $r->add(CadefcenPeer::CODCEN,$this->getRequestParameter('caordcom[codcen]'));
              $reg= CadefcenPeer::doSelectOne($r);
              if (!$reg)
              {
                $this->coderr = 570;
                return false;
              }
          }
        }

        $valunidad=H::getConfApp2('valunidad', 'compras', 'almordcom');
        if ($valunidad=='S')
        {
          if ($this->getRequestParameter('caordcom[coduni]')=="")
          {
            $this->coderr = 567;
            return false;
          }else {
              $r= new Criteria();
              $r->add(BnubicaPeer::CODUBI,$this->getRequestParameter('caordcom[coduni]'));
              $reg= BnubicaPeer::doSelectOne($r);
              if (!$reg)
              {
                $this->coderr = 568;
                return false;
              }
          }
        }
        $valresp=H::getConfApp2('valresp', 'compras', 'almordcom');
        if ($valresp=='S')
        {
          if ($this->getRequestParameter('caordcom[codemp]')=="")
          {
            $this->coderr = 209;
            return false;
          }
        }
        
        $this->coderr=OrdenCompraMultiple::validacionOCM($this->caordcom,$grid,$codi);
        $this->codigo=$codi;
      }

      if($this->coderr!=-1){        
        return false;
      } else return true;

    }else return true;

  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);  //Detalle
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2); // Resumen
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4); // Cronograma Fcehas de entrega
    $grid5 = Herramientas::CargarDatosGridv2($this,$this->obj5); //Formas de Entrega

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4);
    $grid5 = Herramientas::CargarDatosGridv2($this,$this->obj5);

    return OrdenCompraMultiple::salvarOrdenCompraM($clasemodelo,$grid,$grid2,$grid4,$grid5);
  }

  public function deleting($clasemodelo)
  {
    return OrdenCompraMultiple::eliminarOrdenCompraM($clasemodelo);
  }


  public function executeSalvaranu()
  {
    $ordcom=$this->getRequestParameter('ordcom');//0
    $fecord=$this->getRequestParameter('fecord');//1
    $descripcion=$this->getRequestParameter('valor');//2
    $fecanu=$this->getRequestParameter('fecha');//3
    $fecanuvalidar=$this->getRequestParameter('fecha');//3
    $fecserv=$this->getRequestParameter('fecserv');
    $motanu=$this->getRequestParameter('motanu');
    $fechaanula=$fecanu;

    $dateFormat = new sfDateFormat('es_VE');
    $fecord = $dateFormat->format($fecord, 'i', $dateFormat->getInputPattern('d'));
    $fecanu = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
    $this->msgerr="";
    $this->btn="";

    if ($fecserv=='S'){
     $fecanu=date('Y-m-d');
     $fecanuvalidar=date('d/m/Y');
    }    

    if (Tesoreria::validaPeriodoCerrado($fecanuvalidar)==true)
    {
      $this->msgerr=Herramientas::obtenerMensajeError('529');
      $this->btn="S";
    }
    else {
        if (strtotime($fecanu) < strtotime($fecord))
        {
          $this->msgerr=Herramientas::obtenerMensajeError('144');
          $this->btn="S";
        }
        else//fecha correcta
        {
          $c = new Criteria();
          $c->add(CaordcomPeer::ORDCOM,$ordcom);
          $c->add(CaordcomPeer::FECORD,$fecord);
          $caordcom = CaordcomPeer::doSelectOne($c);
          if (count($caordcom)>0)
            if ($caordcom->getStaord()!='N')
            {
               // Verificamos que el compromiso no esté aprobado para poder anular
              $desaprcom=H::getConfApp2('desaprcom', 'presupuesto', 'precompro');
              if ($desaprcom == "S" and $caordcom->getComproaprob()=="S"){
                $this->msgerr = Herramientas::obtenerMensajeError('2109');
              }else if ($afecom=='S' && (!Herramientas::validarPeriodoPresuesto($fechaanula))) {
                 $this->msgerr = Herramientas::obtenerMensajeError('142');
              }else{
                Orden_compra::Salvar_anular($caordcom,$descripcion,$fecanu,$coderror);
                if ($coderror!=-1)
                  $this->msgerr=Herramientas::obtenerMensajeError($coderror);
                else
                  $this->msgerr=Herramientas::obtenerMensajeError('158');
              }
          }
          else
            $this->msgerr=Herramientas::obtenerMensajeError('169');
        }
    }
  }

  public function executeAjaxgrid() {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra="";
    switch ($name) {
      case ('a'):
        switch ($col) {     
              case ('8' || '12'):  //Cantidad a Ordenar y Costo
                if (H::toFloat($grid[$fila][$col-1])>0)
                {
                  if ($col==8 && H::toFloat($grid[$fila][$col-1])>H::toFloat($grid[$fila][19]))
                  {
                    $javascript = "alert('La Cantidad a Ordenar es mayor a la requerida')";
                    $grid[$fila][$col-1]=$grid[$fila][19];
                  }else {
                    $cantxcost = H::toFloat(H::toFloat($grid[$fila][7]) * H::toFloat($grid[$fila][11],6), 6);
                    $grid[$fila][12] = H::FormatoMonto($cantxcost,6);
                    $totalgeneral = $cantxcost - H::toFloat($grid[$fila][13]) + H::toFloat($grid[$fila][14]);
                    $grid[$fila][15] = H::FormatoMonto($totalgeneral,6);
                    $idfila=$name."x_".$fila."_".$col;
                    $javascript="recalcularecargos2('$idfila'); ";
                  }              
                }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              default:
                break;
            }
        break;            
      case ('d'):
        switch ($col) {
             case ('1'):
                if (H::toFloat($grid[$fila][$col-1])!='') {
                  $d = new Criteria();
                  $d->add(CarecargPeer::CODRGO, $grid[$fila][$col-1]);
                  $recargosreg = CarecargPeer::doSelectOne($d);
                  if ($recargosreg) {
                    if ($recargosreg->getCodpre() != "") {
                      $desrgo = $recargosreg->getNomrgo();
                      $grid[$fila][$col] = $desrgo;
                      $montorgotab = $recargosreg->getMonrgo();
                      $monrgo = number_format($montorgotab, 2, ',', '.');
                      $grid[$fila][$col+1] = $monrgo;
                      $tiprgo = $recargosreg->getTiprgo();
                      $grid[$fila][$col+2] = $tiprgo;
                      $reccal = SolicituddeEgresos::CalcularRecargos($tiprgo, $montorgotab, H::toFloat($this->getRequestParameter('caordcom_totartsinrec'),6));
                      $reccalformat = $reccal; 
                      $grid[$fila][$col+3] = number_format($reccal, 4, ',', '.');
                      $codpar = $recargosreg->getCodpre();
                      $grid[$fila][$col+4] = $codpar;
                      if ($tiprgo == 'M') {//Tipo recargo puntual (monto)
                        $javascript = "$('rx_" . $fila . "_5').readOnly=false; Total_grid_recargos();";
                      } else {
                        $javascript = "Total_grid_recargos();"; 
                      }
                    } else {     
                      $javascript = "alert('Debe asociarle al Recargo el Código Presupuestario');";
                      $grid[$fila][$col-1]="";
                      $grid[$fila][$col]="";
                      $grid[$fila][$col+1]="0,00";
                      $grid[$fila][$col+2]="";
                      $grid[$fila][$col+3]="0,0000";
                      $grid[$fila][$col+4]="";
                    }
                  }else {
                    $javascript = "alert('El Recargo no existe');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";
                    $grid[$fila][$col+1]="0,00";
                    $grid[$fila][$col+2]="";
                    $grid[$fila][$col+3]="0,0000";
                    $grid[$fila][$col+4]="";
                 }
               }
               $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;             
            default:
              break;
           }
          break;
        default:
          break;            
      }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

    }

}
