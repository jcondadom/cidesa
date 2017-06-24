<?php

/**
 * fadonacion actions.
 *
 * @package    siga
 * @subpackage fadonacion
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class fadonacionActions extends autofadonacionActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    if (!$this->fadonacion->getId())
    {
       $t= new Criteria();
       $t->setLimit(1);
       $t->addDescendingOrderByColumn(FadonacionPeer::NRODON);
       $reg= FadonacionPeer::doSelectOne($t);
       if ($reg)
       {
           $this->fadonacion->setNrodon(str_pad(($reg->getNrodon()+1),8,'0',STR_PAD_LEFT));
       }else $this->fadonacion->setNrodon('00000001');

    }
    $this->configGrid($this->fadonacion->getNrodon());
     $c= new Criteria();
     $reg=FacorrelatPeer::doSelectOne($c);
     if ($reg)
     {
        $this->fadonacion->setCodprg($reg->getCodprgd());
        $this->fadonacion->setConpag($reg->getConpagdId());
     }
  }
  

 public function configGrid($numdon='')
  {
    $c = new Criteria();
    $c->add(FaartdonPeer::NRODON, $numdon);
    $det = FaartdonPeer::doSelect($c);

    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fadonacion/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detalle');

    $mascara=H::getMascaraArticulo();
    $lonarti=strlen($mascara);
    $params= array('param1' => $lonarti);
    
    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][0]->setCatalogo('caregart','sf_admin_edit_form',array('codart' => 1, 'desart' => 2),'Caregart_Fapedido',$params);

    $this->obj1 = $this->columnas[0]->getConfig($det);

    $this->fadonacion->setObj1($this->obj1); 
  }  

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    switch ($ajax){
      case '1':
        $t= new Criteria();
          $t->add(FaclientePeer::RIFPRO,$codigo);
          $reg= FaclientePeer::doSelectOne($t);
          if ($reg)
          {
              $dato=$reg->getNompro();
              $dato1=$reg->getCodpro();
              $dato2=$reg->getDirpro();
              $dato3=$reg->getTelpro();
          }else{
              $js="alert('La CI/RIF del Cliente no existe'); $('$cajtexmos').value=''; $('$cajtexmos').focus();";
              $dato1=""; $dato2=""; $dato3="";
          }
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["fadonacion_codpro","'.$dato1.'",""],["fadonacion_dirpro","'.$dato2.'",""],["fadonacion_telpro","'.$dato3.'",""],["javascript","'.$js.'",""]]';
        break;
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
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
      /*$this->fadonacion = $this->getFadonacionOrCreate();
      try{ $this->updateFadonacionFromRequest();}
      catch (Exception $ex){}
      $this->configGrid();    
      $grid1=Herramientas::CargarDatosGridv2($this,$this->obj1);
      
      $this->coderr=Facturacionv2::validarGridDonación($grid1);     */ 

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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj1);
  }

  public function saving($clasemodelo)
  {
     $grid = Herramientas::CargarDatosGridv2($this,$this->obj1);
     
    Facturacionv2::salvarDonacion($clasemodelo,$grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Faartdon', 'Nrodon', $clasemodelo->getNrodon());
    $p= new Criteria();
    $p->add(FapedidoPeer::NRODON,$clasemodelo->getNrodon());
    $registr= FapedidoPeer::doSelect($p);
    if ($registr)
    {
        foreach ($registr as $obj)
        {
            H::EliminarRegistro('Faartped', 'Nroped', $obj->getNroped());
            $obj->delete();
        }
    }
    $clasemodelo->delete();
    
    return -1;
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra=""; $com="";

    switch ($col) {
    case ('1'):   //Código Artículo
        if ($grid[$fila][$col-1]!="")
        {
            if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
            {
                $lonarti=  strlen(H::getMascaraArticulo());                  
                if (strlen($grid[$fila][$col-1])==$lonarti) {
                    $c= new Criteria();
                    $c->add(CaregartPeer::CODART,$grid[$fila][$col-1]);
                    $reg= CaregartPeer::doSelectOne($c);
                    if ($reg)
                    {
                        $grid[$fila][$col]=$reg->getDesart();                        
                    }else {
                        $idfila=$name.'x_'.$fila.'_1';
                        $javascript = "alert_('El Art&iacute;culo no existe'); $('$idfila').focus();";
                        $grid[$fila][$col-1]="";
                        $grid[$fila][$col]="";
                    } 
                }else {
                    $idfila=$name.'x_'.$fila.'_1';
                    $javascript = "alert_('El Art&iacute;culo no es de &uacute;ltimo nivel'); $('$idfila').focus();";
                    $grid[$fila][$col-1]="";
                    $grid[$fila][$col]="";
                } 
            }else {
                $idfila=$name.'x_'.$fila.'_1';
                $grid[$fila][$col-1]="";
                $grid[$fila][$col]="";                 
                $javascript = "alert_('El Art&iacute;culo esta repetido'); $('$idfila').focus();";
            }
        }
        $jsonextra = ',["javascript","' . $javascript . '",""]'.$com;
        break;                          
    default:
        break;
    }
              

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }    

}
