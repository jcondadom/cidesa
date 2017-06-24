<?php

/**
 * pagbenfic actions.
 *
 * @package    Roraima
 * @subpackage pagbenfic
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pagbenficActions extends autopagbenficActions
{
   public $coderror=-1;

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->opbenefi = $this->getOpbenefiOrCreate();
      $this->updateOpbenefiFromRequest();
      $opbenefi = $this->getRequestParameter('opbenefi');
      $tiecedben=H::getConfApp2('tiecedben', 'tesoreria', 'pagbenfic');
      if ($tiecedben=='S'){
        if ($opbenefi['cedben']!=''){
          $op= new Criteria();
          $op->add(OpbenefiPeer::CEDRIF,$opbenefi['cedrif'],Criteria::NOT_EQUAL);
          $op->add(OpbenefiPeer::CEDBEN,$opbenefi['cedben']);
          $regop= OpbenefiPeer::doSelectOne($op);
          if ($regop){
            $this->coderror = 5010;
            return false;
          }
        }
      }

      $valor = $opbenefi['cedrif'];
       $campo='cedrif';
    $resp=Herramientas::ValidarCodigo($valor,$this->opbenefi,$campo);

    if($resp!=-1)
    {
        $this->coderror = $resp;
        return false;
      }else return true;

    }else return true;
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
    $this->opbenefi = $this->getOpbenefiOrCreate();

    try{
    $this->updateOpbenefiFromRequest();
    }catch(Exception $ex){}

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
      $err = Herramientas::obtenerMensajeError($this->coderror);
      $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;
  }

 /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->opbenefi = $this->getOpbenefiOrCreate();
    $this->setVars();
    $this->configGrid($this->opbenefi->getCedrif());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpbenefiFromRequest();

      $this->saveOpbenefi($this->opbenefi);

    $this->opbenefi->setId(Herramientas::getX_vacio('cedrif','opbenefi','id',$this->opbenefi->getCedrif()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagbenfic/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagbenfic/list');
      }
      else
      {
        return $this->redirect('pagbenfic/edit?id='.$this->opbenefi->getId());
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
  protected function updateOpbenefiFromRequest()
  {
    $opbenefi = $this->getRequestParameter('opbenefi');
    $this->setVars();

    if (isset($opbenefi['cedrif']))
    {
      $this->opbenefi->setCedrif($opbenefi['cedrif']);
    }
    if (isset($opbenefi['nomben']))
    {
      $this->opbenefi->setNomben($opbenefi['nomben']);
    }
    if (isset($opbenefi['dirben']))
    {
      $this->opbenefi->setDirben($opbenefi['dirben']);
    }
    if (isset($opbenefi['telben']))
    {
      $this->opbenefi->setTelben($opbenefi['telben']);
    }
    if (isset($opbenefi['codcta']))
    {
      $this->opbenefi->setCodcta($opbenefi['codcta']);
    }
    if (isset($opbenefi['nitben']))
    {
      $this->opbenefi->setNitben($opbenefi['nitben']);
    }
    if (isset($opbenefi['codtipben']))
    {
      $this->opbenefi->setCodtipben($opbenefi['codtipben']);
    }
    if (isset($opbenefi['tipper']))
    {
      $this->opbenefi->setTipper($opbenefi['tipper']);
    }
    if (isset($opbenefi['nacionalidad']))
    {
      $this->opbenefi->setNacionalidad($opbenefi['nacionalidad']);
    }
    if (isset($opbenefi['residente']))
    {
      $this->opbenefi->setResidente($opbenefi['residente']);
    }
    if (isset($opbenefi['constituida']))
    {
      $this->opbenefi->setConstituida($opbenefi['constituida']);
    }
    if (isset($opbenefi['codord']))
    {
      $this->opbenefi->setCodord($opbenefi['codord']);
    }
    if (isset($opbenefi['codpercon']))
    {
      $this->opbenefi->setCodpercon($opbenefi['codpercon']);
    }
    if (isset($opbenefi['codordadi']))
    {
      $this->opbenefi->setCodordadi($opbenefi['codordadi']);
    }
    if (isset($opbenefi['codperconadi']))
    {
      $this->opbenefi->setCodperconadi($opbenefi['codperconadi']);
    }
    if (isset($opbenefi['codordcontra']))
    {
      $this->opbenefi->setCodordcontra($opbenefi['codordcontra']);
    }
    if (isset($opbenefi['codpercontra']))
    {
      $this->opbenefi->setCodpercontra($opbenefi['codpercontra']);
    }
    if (isset($opbenefi['temcedrif']))
    {
      $this->opbenefi->setTemcedrif($opbenefi['temcedrif']);
    }
    if (isset($opbenefi['codctasec']))
    {
      $this->opbenefi->setCodctasec($opbenefi['codctasec']);
    }
    if (isset($opbenefi['codctacajchi']))
    {
      $this->opbenefi->setCodctacajchi($opbenefi['codctacajchi']);
    }
    if (isset($opbenefi['numcue']))
    {
      $this->opbenefi->setNumcue($opbenefi['numcue']);
    }
    if (isset($opbenefi['codctaant']))
    {
      $this->opbenefi->setCodctaant($opbenefi['codctaant']);
    }
    if (isset($opbenefi['codban']))
    {
      $this->opbenefi->setCodban($opbenefi['codban']);
    }
    if (isset($opbenefi['numcueb']))
    {
      $this->opbenefi->setNumcueb($opbenefi['numcueb']);
    }
    if (isset($opbenefi['banint']))
    {
      $this->opbenefi->setBanint($opbenefi['banint']);
    }
    if (isset($opbenefi['numcueint']))
    {
      $this->opbenefi->setNumcueint($opbenefi['numcueint']);
    }
    if (isset($opbenefi['dirbanint']))
    {
      $this->opbenefi->setDirbanint($opbenefi['dirbanint']);
    }
    if (isset($opbenefi['codswiint']))
    {
      $this->opbenefi->setCodswiint($opbenefi['codswiint']);
    }
    if (isset($opbenefi['numabaint']))
    {
      $this->opbenefi->setNumabaint($opbenefi['numabaint']);
    }
    if (isset($opbenefi['numibaint']))
    {
      $this->opbenefi->setNumibaint($opbenefi['numibaint']);
    }
    if (isset($opbenefi['numrouint']))
    {
      $this->opbenefi->setNumrouint($opbenefi['numrouint']);
    }
    if (isset($opbenefi['banben']))
    {
      $this->opbenefi->setBanben($opbenefi['banben']);
    }
    if (isset($opbenefi['numcueben']))
    {
      $this->opbenefi->setNumcueben($opbenefi['numcueben']);
    }
    if (isset($opbenefi['dirbanben']))
    {
      $this->opbenefi->setDirbanben($opbenefi['dirbanben']);
    }
    if (isset($opbenefi['codswiben']))
    {
      $this->opbenefi->setCodswiben($opbenefi['codswiben']);
    }
    if (isset($opbenefi['numababen']))
    {
      $this->opbenefi->setNumababen($opbenefi['numababen']);
    }
    if (isset($opbenefi['numibaben']))
    {
      $this->opbenefi->setNumibaben($opbenefi['numibaben']);
    }
    if (isset($opbenefi['numrouben']))
    {
      $this->opbenefi->setNumrouben($opbenefi['numrouben']);
    }
    if (isset($opbenefi['codcopant']))
    {
      $this->opbenefi->setCodcopant($opbenefi['codcopant']);
    }
    if (isset($opbenefi['cedben']))
    {
      $this->opbenefi->setCedben($opbenefi['cedben']);
    }
    if (isset($opbenefi['codtipban']))
    {
      $this->opbenefi->setCodtipban($opbenefi['codtipban']);
    }
    if (isset($opbenefi['email']))
    {
      $this->opbenefi->setEmail($opbenefi['email']);
    }
  }

 public function setVars()
  {
     $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
     $this->lengthmask = strlen($this->mascaracontabilidad);
    //$this->getUser()->setAttribute('lengthmask',$lengthmask);
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
    $js=""; $dato="";
    if ($this->getRequestParameter('ajax')=='1')
      {
        $q= new Criteria();
        $q->add(ContabbPeer::CODCTA,$this->getRequestParameter('codigo'));
        $result= ContabbPeer::doSelectOne($q);
        if ($result) {
          if ($result->getCargab()=='C') {
            $dato=$result->getDescta();
            $dato2=$result->getCargab();
          }else
            $js="alert_('La Cuenta Contable no es Cargable'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }else
          $js="alert_('La Cuenta Contable no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        
        $output = '[["'.$cajtexmos.'","'.$dato.'",""], ["cargable","'.$dato2.'",""],["javascript","'.$js.'",""]]';

     }
   else if ($this->getRequestParameter('ajax')=='2')
      {
        $dato=OptipbenPeer::getDestipben($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
      }
      else if ($this->getRequestParameter('ajax')=='3')
      {
        $p= new  Criteria();
        $p->add(TsdefbanPeer::NUMCUE,$this->getRequestParameter('codigo'));
        $respuesta= TsdefbanPeer::doSelectOne($p);
        if ($respuesta)
        {
          $dato=$respuesta->getNomcue();          
        }else {
          $js="alert_('La Cuenta Bancaria no existe'); $('$cajtexcom').value='';";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
      }
      else if ($this->getRequestParameter('ajax')=='4')
      {
        $p= new  Criteria();
        $p->add(CabancoPeer::CODBAN,$this->getRequestParameter('codigo'));
        $respuesta= CabancoPeer::doSelectOne($p);
        if ($respuesta)
        {
          $dato=$respuesta->getDesban();          
        }else {
          $js="alert_('El Banco no existe'); $('opbenefi_codban').value=''; $('opbenefi_desban').value='';";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
      }
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }

  public function executeAutocomplete()
  {
  if ($this->getRequestParameter('ajax')=='1')
  {
    $this->tags=Herramientas::autocompleteAjax('CODTIPBEN','Optipben','codtipben',$this->getRequestParameter('opbenefi[codtipben]'));
  }
  }

  public function executeDelete()
  {
    $this->opbenefi = OpbenefiPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->opbenefi);

    try
    {
      $tiene=H::getX_vacio('CEDRIF', 'Opordpag', 'CEDRIF', $this->opbenefi->getCedrif());
      if ($tiene=="")
      {
          $tiene2=H::getX_vacio('CEDRIF', 'Cpcompro', 'CEDRIF', $this->opbenefi->getCedrif());
          if ($tiene2=="")
          {
            if (H::getX_vacio('RIFEMP', 'Nphojint', 'RIFEMP', $this->opbenefi->getCedrif())=='' && H::getX_vacio('CEDEMP', 'Nphojint', 'CEDEMP', $this->opbenefi->getCedrif())=='')
            {
              H::EliminarRegistro('Opctaben', 'CEDRIF', $this->opbenefi->getCedrif());
              $this->deleteOpbenefi($this->opbenefi);
              $this->Bitacora('Elimino');
            }else {
              $this->getRequest()->setError('delete', 'No se pudo borrar el registro seleccionado. Debido a que el Beneficiario esta asociado a un Personal.');
              return $this->forward('pagbenfic', 'list');
             }
          }else {
            $this->getRequest()->setError('delete', 'No se pudo borrar el registro seleccionado. Debido a que tiene Compromisos asociados.');
            return $this->forward('pagbenfic', 'list');
        }
      }else {
        $this->getRequest()->setError('delete', 'No se pudo borrar el registro seleccionado. Debido a que tiene Ordenes de Pago asociadas.');
        return $this->forward('pagbenfic', 'list');
}
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('pagbenfic', 'list');
    }

    return $this->redirect('pagbenfic/list');
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($cedrif='') {
    $c = new Criteria();
    $c->add(OpctabenPeer::CEDRIF, $cedrif);
    $c->addDescendingOrderByColumn(OpctabenPeer::CODCTA);
    $reg = OpctabenPeer::doSelect($c);

    $mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
    $loncta=strlen($mascara);
    
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/pagbenfic/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_cuentas');

    $this->columnas[1][0]->setHTML('type="text" size="32" maxlength="'.chr(39).$loncta.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');

    $this->obj =$this->columnas[0]->getConfig($reg);

    $this->opbenefi->setObj($this->obj);
  }

   public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $javascript="";  $jsonextra=""; $com='';

    switch ($col) {
          case '1': 
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                 $w= new Criteria();
                 $w->add(ContabbPeer::CODCTA,$grid[$fila][$col-1]);
                 $reg= ContabbPeer::doSelectOne($w);
                 if ($reg)
                 {    
                    if ($reg->getCargab()=='C')                
                       $grid[$fila][1]=$reg->getDescta();     
                    else {
                    $grid[$fila][$col-1]="";
                    $grid[$fila][1]="";
                    $javascript="alert_('La Cuenta Contable no es Cargable');";
                   }                     
                 }else {
                    $grid[$fila][$col-1]="";
                    $grid[$fila][1]="";
                    $javascript="alert_('La Cuenta Contable no existe');";
                 }   
              }else {
                  $grid[$fila][$col-1]="";
                  $grid[$fila][1]="";
                 $javascript="alert('La Cuenta Contable esta Repetida');";
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

  protected function saveOpbenefi($opbenefi)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $j=0;
    $x=$grid[0];
    while ($j<count($x))
    {
        if ($x[$j]->getCodcta()!='')
        {
            $x[$j]->setCedrif($opbenefi->getCedrif());            
            $x[$j]->save();
        }
        $j++;
    }
    
    $z = $grid[1];
    $l = 0;
    if (!empty($z[$l]))
    {
      while ($l < count($z))
      {
        $z[$l]->delete();
        $l++;
      }
    }
    $opbenefi->save();

  }  

   public function getLabels()
  {
    $labels = parent::getLabels();
    $tiecedben=H::getConfApp2('tiecedben', 'tesoreria', 'pagbenfic');
    if ($tiecedben=='S')
      $labels['opbenefi{cedrif}'] = 'R.I.F';
   
  
    return $labels;
  }

}
