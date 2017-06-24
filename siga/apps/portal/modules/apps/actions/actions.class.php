<?php

/**
 * apps actions.
 *
 * @package    siga
 * @subpackage apps
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class appsActions extends sfActions
{
  /**
   * Executes index action
   *
   */
    public function executeIndex()
    {
        

        $this->resu=array();
        $user = $this->getUser();
        $this->usuario='';
        if($user->getGuardUser() ){
           if ($user->isAuthenticated()){
          //  print_r($user->getGuardUser());
                $c = new Criteria();
                $c->add(UsuariosPeer::LOGUSE, $user->getGuardUser()->getUserName());                
                $result = UsuariosPeer::doSelectOne($c);
                $us=$result->getLoguse();
               // echo $us;
                $this->usuario=$result->getLoguse();
                
                $sql='Select distinct(b.nomyml) as nomyml  
                FROM "SIMA_USER".apli_user a,"SIMA_USER".aplicacion b 
                WHERE a.codapl=b.codapl 
                AND a.loguse=\''.$us.'\';';

                H::BuscarDatos($sql, $rs);

                $this->resu=$rs;
                
                $this->permisos=array();
                $sql2='Select nomopc from "SIMA_USER".apli_user where loguse=\''.$us.'\';';
                
                H::BuscarDatos($sql2, $permi);
                $this->permisos=$permi;
              /*  if($permi)
                {
                    $this->permisos=$permi;
                }
                else{
                    $this->permisos="";
                }*/

                //foreach ($r=mysql_fetch_array($rs)) {  
                    # code...
                  //  echo $r[$i];
                   // $i++;
                //}
                
                //foreach ($rs as $innerArray) {
                  //  if (is_array($innerArray)){
                    //    foreach ($innerArray as $value) 
                      //      echo $value;
                        //}
                    //}
                //}

            //print($user->getGuardUser()->getFullname()); exit;
            //$this->usuario = sfGuardUserProfilePeer::retrieveByUsername($user->getGuardUser());
            //print($this->usuario->getFullname()); exit;
           // $this->usuario=$user->getGuardUser();
        }else{ }
        
        }else{
            $this->resu= ""; 
            $this->usuario='';
            $this->permisos="";
        }


        $this->modulo = $this->getRequestParameter('m','');
        
        $_SESSION['modulo']= $this->getRequestParameter('m','');

        $c = new Criteria();
        $c->add(PublicidadPeer::CATPUB, 'S');
        $c->setLimit(8);
        $result = PublicidadPeer::doSelect($c);

        $this->publicidades = $result;
        
        $c = new Criteria();
        $c->add(PublicidadPeer::CATPUB, 'C');
        $c->setLimit(6);
        $result = PublicidadPeer::doSelect($c);

        $this->carrusel = $result;

        $c = new Criteria();
        $c->add(PublicidadPeer::CATPUB, 'E');
        $c->setLimit(20);
        $result = PublicidadPeer::doSelect($c);

        $this->escritorio = $result;

        $c = new Criteria();
        $c->addAscendingOrderByColumn(DetpublicPeer::ID_PUB);
        $c->setLimit(50);
        $result = DetpublicPeer::doSelect($c);

        $this->detalle = $result;

    }

    
}
