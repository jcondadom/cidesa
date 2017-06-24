<?php

/**
 * confincie actions.
 *
 * @package    siga
 * @subpackage confincie
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class confincieActions extends autoconfincieActions
{
  public function executeIndex()
  {
    return $this->forward('confincie', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $q= new Criteria();
      $q->add(ContabaPeer::CODEMP,'001');
      $resulq= ContabaPeer::doSelectOne($q);
      if ($resulq) {
        $this->contaba->setFecini($resulq->getFecini());
        $this->contaba->setFeccie($resulq->getFeccie());
      }
      $empresa= sfContext::getInstance()->getUser()->getAttribute('empresa');
      $this->contaba->setEsqori($empresa);
      $this->contaba->setEsqdes(str_pad($empresa+1, 3, '0', STR_PAD_LEFT));
  }

  public function configGrid()
  {
 
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js=""; $sw=true;
    switch ($ajax){
      case '1':   
        $esqori = $this->getRequestParameter('esqori','');
        $esqdes = $this->getRequestParameter('esqdes','');  
        Contabilidad::trasladarSaldos($esqori,$esqdes);
        $js="alert('Traslado Realizado con Exito.')";     
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '2':   
        $fecini = $this->getRequestParameter('fecini','');
        $feccie = $this->getRequestParameter('feccie','');  
        $dateFormat = new sfDateFormat('es_VE');
        $fec1 = $dateFormat->format($fecini, 'i', $dateFormat->getInputPattern('d'));
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($feccie, 'i', $dateFormat->getInputPattern('d'));
        $contaba=ContabaPeer::doSelectOne(new Criteria());
        $error=Contabilidad::VerificarComprobantesCierre();
        if ($error==-1) {
          $error=Contabilidad::Verificar_Diferidos($fec1,$fec2);
          if ($error==-1) {
            $error=Contabilidad::Cargar_Cuentas($contaba,$datos);
            if ($error==-1) {             
               Contabilidad::RespaldarenHistorico($fecini,$feccie);
               $js="generarComprobantes();";
            }else {
              $msj=H::obtenerMensajeError($error);
              $js="alert('$msj')";
            }
          }else {
            $msj=H::obtenerMensajeError($error);
            $js="alert('$msj')";
          }
        }else {
            $msj=H::obtenerMensajeError($error);
            $js="alert('$msj')";
        }
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;     
      case '3':  
        break;           
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if ($sw)return sfView::HEADER_ONLY;

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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    if (!self::ValidarGeneroComprobantes()){
        $concom=3;
        $this->form="sf_admin/confincie/confincomgen";
        //Grabar el comprobante contable
        $i=0;
        while ($i<$concom)
        {
          $f[$i]=$this->form.$i;
          if ($this->getUser()->getAttribute('contabc[numcom]',null,$f[$i])!="")
          {
            $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$f[$i]);
            $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$f[$i]);
            $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$f[$i]);
            $descom=$this->getUser()->getAttribute('contabc[descom]',null,$f[$i]);
            $debito=$this->getUser()->getAttribute('debito',null,$f[$i]);
            $credito=$this->getUser()->getAttribute('credito',null,$f[$i]);
            $grid=$this->getUser()->getAttribute('grid',null,$f[$i]);

            $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$f[$i]);
            $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$f[$i]);
            $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$f[$i]);
            $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$f[$i]);
            $this->getUser()->getAttributeHolder()->remove('debito',$f[$i]);
            $this->getUser()->getAttributeHolder()->remove('credito',$f[$i]);
            $this->getUser()->getAttributeHolder()->remove('grid',$f[$i]);

            $numcom = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$f[$i]),'CON');
          }
          $i++;          
        }//  while ($i<$concom)    
        
       while ($i<$concom)
       {
          $f[$i]=$this->form.$i;
          $this->getUser()->getAttributeHolder()->remove('grabo',$f[$i]);
          $i++;
       }
    }else return 639;

    return -1;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

  public function executeAjaxcomprobante()
  {
    //GENERAR COMPROBANTE CONTABLE
      $this->contaba = $this->getContabaOrCreate();
      $this->updateContabaFromRequest();
      $che="";
      $this->msgerr="";
      $comprobante= array();
      $concom=3;
      $this->form="sf_admin/confincie/confincomgen";
      $output = '[["","",""]]';
      $i=0;
       while ($i<$concom)
       {
          $f[$i]=$this->form.$i;
          $this->getUser()->getAttributeHolder()->remove('grabo',$f[$i]);
          $i++;
       }

       Contabilidad::ComprobantesCierre($comprobante);
       $this->formulario=array(); 
       $this->i="";
       if (trim($this->msgerr)=="" && count($comprobante)>0) //ojo nada mas el count
       {
         //verificamos que se haya generado el comprobante
         if ($comprobante[0]->getError()=="S") //hubo un error al generar comprobante
         {
            $this->msgerr=$comprobante[0]->getMsgerr();
            $this->i="";
            $this->formulario=array();
            $output = '[["","",""]]';
         }
         else
         {
            //Preparar las variables de sesion necesarias para el formulario de Comprobante CONFINCOMGEN
            $i=0;
            while ($i<$concom)
            {
              $f[$i]=$this->form.$i;
              $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
              //Cabecera del Comprobante
              $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
              $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
              $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
              $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
              //Detalle (Asientos Contables)
              $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
              $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
              $this->getUser()->setAttribute('tipmov', '');
              $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
              $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
              $i++;
            }
            $this->i=$concom-1;
            $this->formulario=$f;
            $js="$$('.sf_admin_action_save')[0].show(); $$('.sf_admin_action_list')[1].hide();";

            $output = '[["javascript","'.$js.'",""]]';
         }
      }//if ($this->msgerr1!="")
      else {
        $this->msgerr="No hay Datos para generar los Comprobantes";
        $this->i="";
        $this->formulario=array();
        $output = '[["","",""]]';
      }
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }


   public function ValidarGeneroComprobantes()
  {
        $i=0;
        $concom=3;
        $sel=false;
        $this->form="sf_admin/confincie/confincomgen";
        while ($i<$concom && !$sel)
        {
          $f[$i]=$this->form.$i;
          if ($this->getUser()->getAttribute('grabo',null,$f[$i])!="S")
          {
            $sel=true;
          }
           $i++;
        }// while ($i<$concom && !$sel)

       if ($sel)
          return true;
       else
          return false;
  }

}
