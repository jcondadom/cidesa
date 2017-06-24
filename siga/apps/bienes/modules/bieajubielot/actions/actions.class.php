<?php

/**
 * bieajubielot actions.
 *
 * @package    siga
 * @subpackage bieajubielot
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class bieajubielotActions extends autobieajubielotActions
{

   public function executeIndex()
  {
    return $this->forward('bieajubielot', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato="";
    switch ($ajax){
      case '1':
        $t= new Criteria();
        $t->add(BnregmuePeer::CODACT,$codigo);
        $reg= BnregmuePeer::doSelectOne($t);
        if (!$reg)
        {
          $js="alert('El Activo no esta registrado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '2':
        $t= new Criteria();
        $t->add(BnregmuePeer::CODACT,$this->getRequestParameter('codact'));
        $t->add(BnregmuePeer::CODMUE,$codigo);
        $reg= BnregmuePeer::doSelectOne($t);
        if (!$reg)
        {
          $js="alert('El Bien Mueble no esta registrado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '3':
         $t= new Criteria();
        $t->add(BnubibiePeer::CODUBI,$codigo);
        $reg= BnubibiePeer::doSelectOne($t);
        if ($reg)        
           $dato=$reg->getDesubi();
        else        
          $js="alert('La Ubicaci&oacute;n F&iacute;sica no esta registrada'); $('bnregmue_codubi').value='';  $('bnregmue_desubi').value=''; $('bnregmue_codubi').focus();";

        $output = '[["javascript","'.$js.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
        break;
      case '4':
        $t= new Criteria();
        $t->add(BnubicaPeer::CODUBI,$codigo);
        $reg= BnubicaPeer::doSelectOne($t);
        if ($reg)        
           $dato=$reg->getDesubi();
        else        
          $js="alert('La Ubicaci&oacute;n Administrativa no esta registrada'); $('bnregmue_codubiadm').value=''; $('bnregmue_desubiadm').value=''; $('bnregmue_codubiadm').focus();";

        $output = '[["javascript","'.$js.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
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

     if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }


  public function saving($clasemodelo)
  {
    $w= new Criteria();
    $w->add(BnregmuePeer::CODACT,$clasemodelo->getCodact());
    $w->add(BnregmuePeer::CODMUE,$clasemodelo->getCoddes(),Criteria::GREATER_EQUAL);
    $w->add(BnregmuePeer::CODMUE,$clasemodelo->getCodhas(),Criteria::LESS_EQUAL);
    $trajo= BnregmuePeer::doSelect($w);
    if ($trajo)
    {
       foreach ($trajo as $obj) {
         if ($clasemodelo->getMarmue()!="")
           $obj->setMarmue($clasemodelo->getMarmue());
         if ($clasemodelo->getModmue()!="")
           $obj->setModmue($clasemodelo->getModmue());
         if ($clasemodelo->getDesmue()!="")
           $obj->setDesmue($clasemodelo->getDesmue());
         if ($clasemodelo->getValini()==0)
           $obj->setValini($clasemodelo->getValini());
         if ($clasemodelo->getCodubi()!="")
           $obj->setCodubi($clasemodelo->getCodubi());
         if ($clasemodelo->getCodubiadm()!="")
           $obj->setCodubiadm($clasemodelo->getCodubiadm());
         $obj->save();
       }
    }

    return -1;
  }

}
