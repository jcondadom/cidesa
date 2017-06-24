<?php

/**
 * faordtra actions.
 *
 * @package    siga
 * @subpackage faordtra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class faordtraActions extends autofaordtraActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()  {
    $this->configGrid($this->faordtra->getReford());
  }

  public function configGrid($reford, $refcot='',$refpre='')
  {
     if ($refcot=='S')
     {
       $det=array();       
       $p= new Criteria();
       $p->add(FadetprePeer::REFPRE,$refpre);
       $resulta= FadetprePeer::doSelect($p);
       if ($resulta)
       {
         foreach ($resulta as $objpre)
         {
           $fadetord_new= new Fadetord();
           $fadetord_new->setCodart($objpre->getCodart());
           $fadetord_new->setDesart($objpre->getDesart());
           $fadetord_new->setNuitem($objpre->getNuitem());
           $det[]=$fadetord_new;
         }
       }
     }else {
         $c= new Criteria();
         $c->add(FadetordPeer::REFORD,$reford);
         $det= FadetordPeer::doSelect($c);
     }
     
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/faordtra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_detalle');
    
    $mascara=Herramientas::getMascaraArticulo();
    $lonarti=strlen($mascara);
    $obj= array('codart' => 1, 'desart' => 2);
    $params= array('param1' => $lonarti, 'val2');
    $this->columnas[1][0]->setHTML('type="text" size="20" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,3);"');
    $this->columnas[1][0]->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Fapedido',$params);
    $this->columnas[1][3]->setCombo(array('UCOCAR' => 'UCOCAR', 'OTROS' => 'OTROS'));
    
    $this->obj =$this->columnas[0]->getConfig($det);

    $this->faordtra->setObj($this->obj);    
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
        $c= new Criteria();
        $c->add(FapresupPeer::REFPRE, $codigo);
        $result= FapresupPeer::doSelectOne($c);
        if ($result)
        {
           $dato=$result->getDespre();
           $dato1=$result->getCodcli();          
           $dato2=$result->getRifpro();          
           $dato3=$result->getNompro(); 
           $dato4=$result->getCodsed(); 
           $dato5=$result->getDessed(); 
           $dato6=$result->getCodemb(); 
           $dato7=$result->getNomemb(); 

        }else {
            $dato1=$dato2=$dato3=$dato4=$dato5=$dato6=$dato7=""; $codigo="";
            $js="alert_('La Cotizaci&oacute;n no esta registrada'); $('faordtra_refpre').value=''; $('$cajtexmos').value=''; $('faordtra_refpre').focus();";
        } 
    
         $this->params=array();
         $this->faordtra = $this->getFaordtraOrCreate();
         $this->updateFaordtraFromRequest();
         $this->labels = $this->getLabels();
         
         $this->configGrid('','S',$codigo);  
         $output = '[["'.$cajtexmos.'","'.$dato.'",""],["faordtra_codcli","'.$dato1.'",""],["faordtra_rifpro","'.$dato2.'",""],["faordtra_nompro","'.$dato3.'",""],["faordtra_codsed","'.$dato4.'",""],["faordtra_dessed","'.$dato5.'",""],["faordtra_codemb","'.$dato6.'",""],["faordtra_nomemb","'.$dato7.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
        $c= new Criteria();
        $c->add(FaclientePeer::RIFPRO, $codigo);
        $result= FaclientePeer::doSelectOne($c);
        if ($result)
        {
           $dato=$result->getNompro();        
           $dato1=$result->getCodpro();        
        }else {       
            $dato1="";     
            $js="alert('El Cliente no esta registrado'); $('faordtra_codcli').value=''; $('faordtra_rifpro').value=''; $('faordtra_nompro').value=''; $('faordtra_rifpro').focus();";
        } 
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["faordtra_codcli","'.$dato1.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
        $c= new Criteria();
        $c->add(FadefsedPeer::CODSED, $codigo);
        $result= FadefsedPeer::doSelectOne($c);
        if ($result)
        {
            $dato=$result->getDessed();
        }else {
            $js="alert('La Sede no esta registrado'); $('faordtra_codsed').value=''; $('faordtra_dessed').value=''; $('faordtra_codsed').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break; 
      case '4':
        $c= new Criteria();
        $c->add(FaembarcaPeer::CODEMB, $codigo);
        $result= FaembarcaPeer::doSelectOne($c);
        if ($result)
        {
            $dato=$result->getNomemb();
        }else {
            $js="alert_('La Embarcaci&oacute;n no esta registrado'); $('faordtra_codemb').value=''; $('faordtra_nomemb').value=''; $('faordtra_codemb').focus();";
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
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
        $this->faordtra = $this->getFaordtraOrCreate();
         $this->updateFaordtraFromRequest();

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
   * Función para actualziar el grid en el post si ocurre un error
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
    Facturacion::SalvarOrdendeTrabajo($clasemodelo,$grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    Herramientas::EliminarRegistro('Fadetord', 'Reford', $clasemodelo->getReford());
    return parent::deleting($clasemodelo);
  }

       /**
 * Función para procesar _todas_ las funciones Ajax del formulario
 * Cada función esta identificada con el valor de la vista "ajax"
 * el cual traerá el indice de lo que se quiere procesar.
 *
 */
  public function executeAjaxgrid() {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');    
    $idfila = $this->getRequestParameter('this[id]', '');    
    $valuefila = $this->getRequestParameter('this[value]', ''); 
    $javascript="";  $jsonextra="";
      switch ($name) {
        case ('a'):   //grid Detalle 
            switch ($col) { 
              case ('1'):  //Código Articulo
                $long=strlen(H::getMascaraArticulo());
                if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
                {
                  if ($long==strlen($grid[$fila][$col-1])){
                  $c= new Criteria();
                  $c->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
                  $reg= CaregartPeer::doSelectOne($c);
                  if ($reg)
                    $grid[$fila][$col]=$reg->getDesart();
                  else {
                    $javascript = "alert_('El Art&iacute;culo no Existe');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";
                  } 
                }else {
                   $javascript = "alert_('El Art&iacute;culo no es de U&acute;ltimo Nivel');";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";
                }
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                  $grid[$fila][2]="";
                 $javascript="alert_('El Art&iacute;culo esta Repetido');";
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
