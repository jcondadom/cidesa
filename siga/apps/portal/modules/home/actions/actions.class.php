<?php

/**
 * home actions.
 *
 * @package    siga
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class homeActions extends sfActions
{
  /**
   * Executes index action
   *
   */
    public function executeIndex()
    {
        $user = $this->getUser();
        
        if($user->getGuardUser() ){
           if ($user->isAuthenticated()){
                $c = new Criteria();
                $c->add(sfGuardUserProfilePeer::EMAIL, $user->getGuardUser());                
                $result = sfGuardUserProfilePeer::doSelectOne($c);
                $this->usuario=$result->getFullname();
            }    
        }else{
            $this->usuario='';
        }

        $c = new Criteria();
        $c->add(PublicidadPeer::CATPUB, 'P');
        $c->setLimit(3);
        $result = PublicidadPeer::doSelect($c);

        $this->publicidades = $result;

        $c = new Criteria();
        $c->add(PublicidadPeer::CATPUB, 'C');
        $c->setLimit(3);
        $result = PublicidadPeer::doSelect($c);

        $this->carrusel = $result;


        if(isset($_SESSION['modulo']))
        {
            $this->modulo=$_SESSION['modulo'];
        }
        else $this->modulo="siga";


    }

    public function executeAcerca(){
        if(isset($_SESSION['modulo']))
        {
            $this->modulo=$_SESSION['modulo'];
        }
        else $this->modulo="siga";
    }

    public function executeAcompanamiento(){
        if(isset($_SESSION['modulo']))
        {
            $this->modulo=$_SESSION['modulo'];
        }
        else $this->modulo="siga";
    }
    public function executeAfiliacion(){
        if(isset($_SESSION['modulo']))
        {
            $this->modulo=$_SESSION['modulo'];
        }
        else $this->modulo="siga";
    }
    public function executeAlianzas(){
        if(isset($_SESSION['modulo']))
        {
            $this->modulo=$_SESSION['modulo'];
        }
        else $this->modulo="siga";
    }
    public function executeContacto(){
        if(isset($_SESSION['modulo']))
        {
            $this->modulo=$_SESSION['modulo'];
        }
        else $this->modulo="siga";
    }

    
}
