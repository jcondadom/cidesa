<?php

/**
 * facciemes actions.
 *
 * @package    siga
 * @subpackage facciemes
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facciemesActions extends autofacciemesActions
{
  public function executeIndex()
  {
    return $this->forward('facciemes', 'edit');
  }
  
  public function editing()
  {
     $c = new Criteria();
     $reg = FaciemesPeer::doSelect($c);
     if (!$reg)
     {
         for($i=1;$i<=12;$i++)
         {
             $faciemes= new Faciemes();
             $faciemes->setFecdes(date('Y').'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-01');
             $faciemes->setFechas(H::dateAdd('d',1,H::dateAdd('m',1,$faciemes->getFecdes(),'+'),'-'));
             $faciemes->setFecini($faciemes->getFecdes());
             $faciemes->setFeccie($faciemes->getFechas());
             $faciemes->setPereje(str_pad($i, 2, '0', STR_PAD_LEFT));
             $faciemes->setStatus('A');
             $faciemes->save();             
         }
     }
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    switch ($ajax){
      case '1':
         $t= new Criteria();
         $t->add(FaciemesPeer::PEREJE,$codigo); 
         $reg= FaciemesPeer::doSelectOne($t);
         if ($reg)
         {
             $dato1=date('d/m/Y',strtotime($reg->getFecdes()));
             $dato2=date('d/m/Y',strtotime($reg->getFechas()));
             $dato3=$reg->getStatus();
         }else {
             $dato1="";
             $dato2="";
             $dato3="";
         }
          
        $output = '[["faciemes_fecdes","'.$dato1.'",""],["faciemes_fechas","'.$dato2.'",""],["faciemes_status","'.$dato3.'",""]]';
        break;
      case '2':
        $output = '[["","",""],["","",""],["","",""]]';
        break;    
      default:
        $pereje = $this->getRequestParameter('faciemes[pereje]','');
        $fecdes = $this->getRequestParameter('faciemes[fecdes]','');
        $fechas = $this->getRequestParameter('faciemes[fechas]','');
        $proceso = $this->getRequestParameter('faciemes[proceso]','');
        
         $c= new Criteria();
         $c->add(FaciemesPeer::PEREJE,$pereje);
         $resulta= FaciemesPeer::doSelectOne($c);
         if ($resulta)
         {
             $resulta->setStatus($proceso);
             $resulta->save();
         }
         if ($proceso=='A')
             $js="alert('El Mes ha sido Abierto satisfactoriamente.'); ";
         else
             $js="alert('El Mes ha sido Cerrado satisfactoriamente.'); ";
    
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
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

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }


}
