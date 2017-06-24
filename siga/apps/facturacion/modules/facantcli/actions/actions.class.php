<?php

/**
 * facantcli actions.
 *
 * @package    siga
 * @subpackage facantcli
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facantcliActions extends autofacantcliActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid($this->faantcli->getNroant(),'',$this->faantcli->getTipant());

  }

  public function configGrid($nroant='', $codcli='', $tipant='')
  {

     if ($codcli!="")
     {
         $det=array();
         if ($tipant=='E'){           
           $p= new Criteria();
           $p->add(FapresupPeer::CODCLI,$codcli);
           $sql=" fapresup.refpre not in (select nroped from fadetant)";
           $p->add(FapresupPeer::REFPRE, $sql, Criteria::CUSTOM);
           $resulta= FapresupPeer::doSelect($p);
           if ($resulta)
           {
               foreach ($resulta as $objped)
               {
                 $fadetant2= new Fadetant();
                 $fadetant2->setNroped($objped->getRefpre());
                 $fadetant2->setFecped(date('d/m/Y',strtotime($objped->getFecpre())));
                 $fadetant2->setDesped($objped->getDespre());
                 $fadetant2->setMonped(number_format($objped->getMonpre(),2,',','.'));
                 $fadetant2->setPorant(0);
                 $fadetant2->setMonant(0);
                 $fadetant2->setMonret('0,00');
                 $fadetant2->setMonpag('0,00');
                 $det[]=$fadetant2;
               }
           }
         }elseif ($tipant=='P'){
           $p= new Criteria();
           $p->add(FapedidoPeer::CODCLI,$codcli);
           $sql=" fapedido.nroped not in (select nroped from fadetant)";
           $p->add(FapedidoPeer::NROPED, $sql, Criteria::CUSTOM);
           $resulta= FapedidoPeer::doSelect($p);
           if ($resulta)
           {
               foreach ($resulta as $objped)
               {
                 $fadetant2= new Fadetant();
                 $fadetant2->setNroped($objped->getNroped());
                 $fadetant2->setFecped(date('d/m/Y',strtotime($objped->getFecped())));
                 $fadetant2->setDesped($objped->getDesped());
                 $fadetant2->setMonped(number_format($objped->getMonped(),2,',','.'));
                 $fadetant2->setPorant(0);
                 $fadetant2->setMonant(0);
                 $fadetant2->setMonret('0,00');
                 $fadetant2->setMonpag('0,00');
                 $det[]=$fadetant2;
               }
           }
         }
     }else {
         $c= new Criteria();
         $c->add(FadetantPeer::NROANT,$nroant);
         $det= FadetantPeer::doSelect($c);
     }
     
     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facantcli/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_fadetant');

     if ($tipant=='E'){
      $cametifor=H::getConfApp2('cametifor', 'facturacion', 'fapresup');
      if ($cametifor=='S')
        $this->columnas[1][0]->setTitulo('N° de Cotización');
      else
        $this->columnas[1][0]->setTitulo('N° de Presupuesto');
     }


     $this->obj =$this->columnas[0]->getConfig($det);

    $this->faantcli->setGrid($this->obj);    

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js=""; $sw=true;
    switch ($ajax){
      case '1':
        $sw=false;
        $tipant = $this->getRequestParameter('tipant','');
        if ($tipant!='') {
        $c= new Criteria();
        $c->add(FaclientePeer::RIFPRO, $codigo);
        $result= FaclientePeer::doSelectOne($c);
        if ($result)
        {
           $dato=$result->getNompro();
           $dato1=$result->getDirpro();
           $dato2=$result->gettelpro();
           $dato3=$result->getCodpro();          
        }else {
            $dato1=""; $dato2=""; $dato3=""; $tipant="";
            $js="alert('El Cliente no esta registrado'); $('faantcli_rifpro').value=''; $('faantcli_rifpro').focus();";
        } 
        }else {          
            $dato1=""; $dato2=""; $dato3="";$tipant="";
            $js="alert('Debe Seleccionar el Tipo de anticipo'); $('faantcli_rifpro').value=''; $('faantcli_rifpro').focus();";
        }      
         $this->params=array();
         $this->faantcli = $this->getFaantcliOrCreate();
         $this->updateFaantcliFromRequest();
         $this->labels = $this->getLabels();
         
         $this->configGrid('',$dato3,$tipant);  
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["faantcli_dirpro","'.$dato1.'",""],["faantcli_telpro","'.$dato2.'",""],["faantcli_codcli","'.$dato3.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
        $c= new Criteria();
        $c->add(TsdefbanPeer::NUMCUE, $codigo);
        $result= TsdefbanPeer::doSelectOne($c);
        if ($result)
        {
            $dato=$result->getNomcue();
        }else {
            $js="alert('La Cuenta Bancaria no esta registrada'); $('faantcli_numcue').value=''; $('faantcli_numcue').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
        $c= new Criteria();
        $c->add(TstipmovPeer::CODTIP, $codigo);
        $result= TstipmovPeer::doSelectOne($c);
        if ($result)
        {
            $dato=$result->getDestip();
        }else {
            $js="alert('El tipo de Movimiento no esta registrado'); $('faantcli_codtip').value=''; $('faantcli_codtip').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;    
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw)  return sfView::HEADER_ONLY;

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
        $this->faantcli = $this->getFaantcliOrCreate();
        $this->updateFaantcliFromRequest();
        
        if (self::validarGeneraComprobante())
        {
            $this->coderr=508;
            return false;
        }
        
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
        if (count($grid[0])==0)
        {
            $this->coderr=4;
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    if ($clasemodelo->getId())
    {
        $clasemodelo->setResant($clasemodelo->getResant());
        $clasemodelo->save();
    }else {
        $tiecor=false;
        if ($clasemodelo->getNroant()=='########')
        {
           $tiecor=true;
           if (Herramientas::getVerCorrelativo('corantcli','facorrelat',$r))
           {
               $encontrado=false;
                while (!$encontrado)
                {
                  $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

                  $sql="select nroant from faantcli where nroant='".$numero."'";
                  if (Herramientas::BuscarDatos($sql,$result))
                  {
                    $r=$r+1;
                  }
                  else
                  {
                    $encontrado=true;
                  }
                }
                $clasemodelo->setNroant(str_pad($r, 8, '0', STR_PAD_LEFT));             
           }
        }
        self::GrabarComprobante($clasemodelo, $grid);
        Facturacion::SalvarAnticipoCliente($clasemodelo, $grid);
        if ($tiecor)
          Herramientas::getSalvarCorrelativo('corantcli','facorrelat','Referencia',$r,$msg);
    }    
    return -1;
  }

  public function deleting($clasemodelo)
  {

    $t= new Criteria();
    $t->add(TsmovlibPeer::NUMCUE,$clasemodelo->getNumcue());
    $t->add(TsmovlibPeer::REFLIB,$clasemodelo->getNroant());
    $t->add(TsmovlibPeer::TIPMOV,$clasemodelo->getCodtip());
    $mov=TsmovlibPeer::doSelectOne($t);
      if ($mov){
        if ($mov->getStacon()!='C'){
            $mov->delete();
          }else{
            return 1506;
          }
      }else{
          return 1505;
      }
    
    Herramientas::EliminarRegistro('Fadetant', 'Nroant', $clasemodelo->getNroant());
    Herramientas::EliminarRegistro('Contabc1', 'Numcom', $clasemodelo->getNumcom());
    Herramientas::EliminarRegistro('Contabc', 'Numcom', $clasemodelo->getNumcom());      
    $clasemodelo->delete();
    
    return -1;
  }
  
  /**
   * FunciÃ³n para procesar _todas_ las funciones Ajax del formulario
   * Cada funciÃ³n esta identificada con el valor de la vista "ajax"
   * el cual traerÃ¡ el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
     $this->faantcli = $this->getFaantcliOrCreate();
     $this->updateFaantcliFromRequest();
     $concom   = 0;
     $msjuno      = "";
     $comprobante = "";
     $this->msjtres  = "";
     $this->i        = "";
     $this->formulario = array();

     if ($this->faantcli->getRifpro()=="" || $this->faantcli->getNumcue()=="" || H::toFloat($this->faantcli->getTotant())==0)
     {
       $this->msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Cliente, la Cuenta Bancaria y El Monto Total Anticipo sea mayor a cero, para luego generar el comprobante";

     }
     if ($this->msjtres=="")
     {
      $x = Facturacion::generarComprobanteAnticipo($this->faantcli,$comprobante,$msjuno);
      if ($msjuno=="") {
          $concom = $concom + 1;

          $form = "sf_admin/facantcli/confincomgen";
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
  
  public function validarGeneraComprobante()
  {
    $form="sf_admin/facantcli/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');

    if ($grabo=='')
    { return true;}
    else { return false;}
  }  
  
  public function GrabarComprobante(&$faantcli, $grid)
  {
      $concom=1;
      $form="sf_admin/facantcli/confincomgen";
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
          $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
          if ($confcorcom=='N')
          {
            $numcom= 'AN'.substr($faantcli->getNroant(),2,6);
          }else $numcom= '########';
          //$numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formulario[$i]);
          $reftra=$faantcli->getNroant();//$this->getUser()->getAttribute('contabc[reftra]',null,$formulario[$i]);
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

          $this->numero = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]));

          $faantcli->setNumcom($this->numero);
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');    

  }


}
