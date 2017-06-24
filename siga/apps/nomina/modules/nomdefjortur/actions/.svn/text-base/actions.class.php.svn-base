<?php

/**
 * nomdefjortur actions.
 *
 * @package    siga
 * @subpackage nomdefjortur
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomdefjorturActions extends autonomdefjorturActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $dato=""; $js="";
    switch ($ajax){
      case '1':
        /*if(strtotime(strtolower($codigo))===false)
        {					
               $js="alert('La Hora no cumple con el formato HH:MM'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }elseif(!(strrpos(strtolower($codigo),'am') || strrpos(strtolower($codigo),'pm')))
        {
                $js="alert('Debe indicar si la hora es AM o PM'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }else {*/
            if ($this->getRequestParameter('hora')!="")
            {
                //$cad1 = strtotime(strtolower(trim($codigo)));
                //$cad1 = date("H:i", $cad1);
                
                //$cad2 = strtotime(strtolower(trim($this->getRequestParameter('hora'))));
                //$cad2 = date("H:i", $cad2);
                
                if ($cajtexcom=='npjortur_horini')
                   $dato=H::hourdiff($codigo, $this->getRequestParameter('hora'), true);
                else
                    $dato=H::hourdiff($this->getRequestParameter('hora'), $codigo, true);
            }
        //}
        $output = '[["npjortur_numhor","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
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
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    $datos=H::getX_vacio('CODJOR','Npdettur', 'Codjor', $clasemodelo->getCodjor());
    if ($datos!='')
        return 6;
    else {
    return parent::deleting($clasemodelo);
    }
  }


}
