<?php

/**
 * pretitpre actions.
 *
 * @package    Roraima
 * @subpackage pretitpre
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 59323 2014-11-03 13:52:18Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pretitpreActions extends autopretitpreActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->setVars();

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js="";
    switch ($ajax){
      case '1':
        $t= new Criteria();
        $t->add(ContabbPeer::CARGAB,'C');
        $t->add(ContabbPeer::CODCTA,$codigo);
        $result= ContabbPeer::doSelectOne($t);
        if ($result)
        {
            $dato=$result->getDescta();            
        }else {
            $js="alert('La Cuenta Contable no existeo no es Cargable'); $('cpdeftit_codcta').value=''; $('cpdeftit_codcta').focus();";
        }        
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
         $cpdefniv = CpdefnivPeer::doSelectOne(new Criteria());
         if ($cpdefniv)
         $formato = $cpdefniv->getForpre();
         else $formato='';

        $posrup1=Herramientas::instr($formato,'-',0,1);
        $posrup1=$posrup1-1;
        if (strlen(trim($codigo))<$posrup1)
        {
           $js="alert('Código Presupuestario Inválido'); $('cpdeftit_codpre').value=''; $('cpdeftit_codpre').focus(); ";
        }
        if ($js=="")
        {
          Herramientas::FormarCodigoPadre($codigo,$nivelcodigo,$ultimo,$formato);
          $c= new Criteria();
          $c->add(CpdeftitPeer::CODPRE,$ultimo);        
          $exis = CpdeftitPeer::doSelectOne($c);
          if (!$exis)
          {
            if ($nivelcodigo == 0)
              $js="alert('Nivel Anterior No Existe'); $('cpdeftit_codpre').value=''; $('cpdeftit_codpre').focus();";
          }

          if ($js==""){  
            $c= new Criteria();
            $c->add(CpdeftitPeer::CODPRE,$codigo);        
            $exiscod = CpdeftitPeer::doSelectOne($c);
            if (!$exiscod) {
            if (strlen($formato)!=strlen($codigo))
              $js="$('cpdeftit_codcta').readOnly=true; $$('.botoncat')[0].disabled=true;";
            }else $js="alert('Código Presupuestario ya esta registrado'); $('cpdeftit_codpre').value=''; $('cpdeftit_codpre').focus();";
          }
        }       
        
               
        $output = '[["javascript","'.$js.'",""],["","",""]]';
        break;        
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  public function validateEdit()
  {
    $this->coderr =-1;
    $this->params = array();

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

	    $this->cpdeftit = $this->getCpdeftitOrCreate();
	    $this->updateCpdeftitFromRequest();

        $this->coderr = Presupuesto::validarPretitpre($this->cpdeftit);

        $cpdefniv = CpdefnivPeer::doSelectOne(new Criteria());
        $forpre = $cpdefniv->getForpre();
        
        if (strlen($forpre)==strlen($this->cpdeftit->getCodpre()))
              if ($this->cpdeftit->getCodcta()=='')
                $this->coderr = 198;


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
  	    $this->params=array();
		$this->setVars();
  }


   public function setVars(){
  	$c = new Criteria();
  	$reg = CpnivelesPeer::doSelect($c);
	if($reg){
	  	foreach ($reg as $datos){
	  		$this->loncc = $datos->getLonniv();
	  		$this->nomabr = $this->nomabr .'-'.$datos->getNomabr();
	  	}
	}
  	$cpdefniv = CpdefnivPeer::doSelectOne(new Criteria());
  	$this->params[0] = $cpdefniv->getForpre();
  	//$this->params[1] = strlen(substr($this->params[0],0,strlen($this->params[0])-$this->loncc-1));
  	$this->params[1] = strlen($this->params[0]);
  	$this->params[2] = substr($this->nomabr,1,strlen($this->nomabr));
  	$this->params[3] = $this->loncc;

  }


  public function saving($cpdeftit){
    
  	return Presupuesto::salvarPretitpre($cpdeftit);
  }

  public function deleting($cpdeftit)
  {
    return Presupuesto::eliminarPretitpre($cpdeftit);
  }


}
