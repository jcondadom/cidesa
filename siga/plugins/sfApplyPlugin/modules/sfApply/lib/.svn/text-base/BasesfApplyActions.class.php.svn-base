<?php

/**
 * sfApply actions.
 *
 * @package    5seven5
 * @subpackage sfApply
 * @author     Tom Boutell, tom@punkave.com
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class BasesfApplyActions extends sfActions
{
  public function validateApply()
  {
    $this->modulo = $this->getRequestParameter('m');
    
    
    // Extend me to validate your own stuff
    if ($this->getRequest()->getMethod() == sfRequest::POST) 
    {
      $email = $this->getRequestParameter('email');
      // $email2 = $this->getRequestParameter('email2');
      // $username = $this->getRequestParameter('username');
      $username = $this->getRequestParameter('email');
      // if ($email !== $email2)
      // {
      //   $this->logMessage("Correos Electronicos no coinciden", 'info');
      //   $this->getRequest()->setError('email', "Las direcciones de email no coinciden.");
      //   return false;
      // }
      $password = $this->getRequestParameter('password'); $password2 = $this->getRequestParameter('password2');
      if ($password !== $password2)
      {
        $this->logMessage("Contrasenas no coinciden", 'info');
        $this->getRequest()->setError('password', "Las contrasenas no coinciden.");
        return false;
      }
      if (sfGuardUserPeer::retrieveByUsername($username))
      {
        // TODO: efficient username suggest-o-matic ala Accountify
        $this->getRequest()->setError('email', "Este correo ya esta en uso. Por favor, seleccione otro.");
        return false;
      }
      // if (!preg_match("/^[\w\ \.\-]+$/", $username))
      // {
      //   $this->getRequest()->setError('username', "Debe ingresar un nombre de usuario");
      //   return false;
      // }
      
      $c = new Criteria();
      $c->add(sfGuardUserProfilePeer::EMAIL, $email);
      $match = sfGuardUserProfilePeer::doSelectOne($c);
      if ($match)
      {
        $this->logMessage("Correo Electrónico en uso", 'info');
        $this->getRequest()->setError('email', "Esta direccion de correo electronico ya esta asociado a una cuenta.");
        return false;
      }
    }
    $this->logMessage("Validate function succeeded", 'info');
    return true;
  }

  public function executeApply()
  {
     
    
    if ($this->getRequest()->getMethod() == sfRequest::POST) 
    {
      $username = $this->getRequestParameter('email');
      $password = $this->getRequestParameter('password');
      $sfGuardUser = new sfGuardUser();
      $sfGuardUser->setUsername(strtoupper($username));
      $sfGuardUser->setPassword($password);
      // Not until confirmed
      $sfGuardUser->setIsActive(true);
      $profile = $sfGuardUser->getProfile();
      $this->populateProfileSettings($profile);
      $sfGuardUser->save();
      $profile->setUserId($sfGuardUser->getId());
      $profile->save();
      $usuario = new Usuarios();
      $usuario->setLoguse(strtoupper($sfGuardUser->getUsername()));
      $usuario->setPasuse($password);
      $usuario->setApluse('CI0');
      $usuario->setNomuse($profile->getFullname());
      Autenticacion::salvarUsuarios($usuario);
      $this->salvarCredenciales($sfGuardUser);
      $this->salvarEmpresa($sfGuardUser);
      $this->setFlash('sfApplyPlugin_id', $sfGuardUser->getId(), false);
     // $this->sendEmail('sfApply', 'sendValidate');
      $modul = $_SESSION["modulo"];
      $sfGuardUser= new sfGuardUser();
      $sfGuardUser= sfGuardUserPeer::retrieveByUsername(strtoupper($username));
      if ($sfGuardUser){
        $this->getUser()->signIn($sfGuardUser); 
        $user = $this->getUser();
   
      }
    
        if ($this->getRequest()->getMethod() == sfRequest::POST)
        {
          $referer = $user->getAttribute('referer', $this->getRequest()->getReferer());
          $user->getAttributeHolder()->remove('referer');

          $signin_url = sfConfig::get('app_sf_guard_plugin_success_signin_url', $referer);

          //$user->autenticate_native($user->getUsername(),$this->getRequestParameter('password'),str_pad($user->getGuardUser()->getId(), 3, '0',  STR_PAD_LEFT));

          $user->autenticate_native(strtoupper($username),$password,str_pad($sfGuardUser->getId(), 3, '0',  STR_PAD_LEFT));
          //$this->redirect('' != $signin_url ? $signin_url : '@homepage');
        }

        if ($user->isAuthenticated())
        {     
          $this->redirect('/apps/index?m='.$modul);
        }
        else
        {
          $this->getUser()->signOut();
          if ($this->getRequest()->isXmlHttpRequest())
          {
            $this->getResponse()->setHeaderOnly(true);
            $this->getResponse()->setStatusCode(401);

            return sfView::NONE;
          }

          if (!$user->hasAttribute('referer'))
          {
            $user->setAttribute('referer', $this->getRequest()->getUri());
          }

          if ($this->getModuleName() != ($module = sfConfig::get('sf_login_module')))
          {
            return $this->redirect($module.'/'.sfConfig::get('sf_login_action'));
          }

          $this->getResponse()->setStatusCode(401);
        }
      return 'After';
    }else{
      $this->email = $this->getRequestParameter('email');
      $this->nombre = $this->getRequestParameter('nombre');
      $this->institucion = $this->getRequestParameter('institution');
    }
  }
  
  public function addmodulos($menu,$codapli,$sfGuardUser){
      foreach($menu as $m => $me){
        foreach($me as $mo => $modulo){
            if($modulo){
                
                    if(!is_array($modulo)) {
                        $apliuser= new ApliUser();
                        $apliuser->setLoguse(strtoupper($sfGuardUser->getUsername()));
                        $apliuser->setCodemp(str_pad($sfGuardUser->getId(), 3, '0',  STR_PAD_LEFT));
                        $apliuser->setCodapl($codapli);
                        $apliuser->setNomopc($modulo);
                        $apliuser->setDesopc($modulo);
                        $apliuser->setPriuse('15');
                        $apliuser->save();

                    } else {

                        foreach($modulo as $fi => $subformulario) {
                            if(!is_array($subformulario)) {
                                $miarreglo = explode ('-',$subformulario);
                                $apliuser= new ApliUser();
                                $apliuser->setLoguse(strtoupper($sfGuardUser->getUsername()));
                                $apliuser->setCodemp(str_pad($sfGuardUser->getId(), 3, '0',  STR_PAD_LEFT));
                                $apliuser->setCodapl($codapli);
                                $apliuser->setNomopc($miarreglo[0]);
                                $apliuser->setDesopc($miarreglo[0]);
                                $apliuser->setPriuse('15');
                                $apliuser->save();
                            }
                            else{
                                foreach($subformulario as $su => $subformu) {
                                $miarreglo2 = explode ('-',$subformu);
                                $apliuser= new ApliUser();
                                $apliuser->setLoguse(strtoupper($sfGuardUser->getUsername()));
                                $apliuser->setCodemp(str_pad($sfGuardUser->getId(), 3, '0',  STR_PAD_LEFT));
                                $apliuser->setCodapl($codapli);
                                $apliuser->setNomopc($miarreglo2[0]);
                                $apliuser->setDesopc($miarreglo2[0]);
                                $apliuser->setPriuse('15');
                                $apliuser->save();
                           
                            }
                        }


                    }
                  

        }}
      }
      
  }
  }


  public function salvarCredenciales($sfGuardUser) {
      $modul =  $_SESSION["modulo"];
      $modul1 = "seguridad";
      $dir=CIDESA_CONFIG.'/menus/'.strtolower($modul).'.yml';
      cidesaTools::exitsfile($dir) ? $dir=$dir : $dir = sfConfig::get('sf_root_dir').'/config/menus/'.strtolower($modul).'.yml';

      $yml = sfYaml::load($dir);
      $menu = $yml[$modul]['menu'];
      
      
      $dir1=CIDESA_CONFIG.'/menus/'.strtolower($modul1).'.yml';
      cidesaTools::exitsfile($dir1) ? $dir1=$dir1 : $dir1 = sfConfig::get('sf_root_dir').'/config/menus/'.strtolower($modul1).'.yml';

      $yml1 = sfYaml::load($dir1);
      $menu1 = $yml1[$modul1]['menu'];
      
      if($modul=="siga")
      {
        foreach($menu as $m => $me){
          foreach($me as $mo => $modulo2){
            foreach($modulo2 as $f => $formulario) {
              $dir = sfConfig::get('sf_root_dir').'/config/menus/'.$f.'.yml';
              $yml = sfYaml::load($dir);
              $menu = $yml[$f]['menu'];

              print $f;

              $aplicacion=new Aplicacion;
              $ca = new Criteria;
              $ca->add(AplicacionPeer::NOMYML,$f.'.yml');
              $aplicacion= AplicacionPeer::doSelectOne($ca);
              $codapli= $aplicacion->getCodapl();
              
              $this->addmodulos($menu,$codapli,$sfGuardUser);
            }
          }
        }
      }else{

        $aplicacion=new Aplicacion;
        $c = new Criteria;
        $c->add(AplicacionPeer::NOMYML,strtolower($modul).'.yml');
        $aplicacion= AplicacionPeer::doSelectOne($c);
        $codapli= $aplicacion->getCodapl();
        $this->addmodulos($menu,$codapli,$sfGuardUser);
      }

      $apliuser= new ApliUser();
      $apliuser->setLoguse(strtoupper($sfGuardUser->getUsername()));
      $apliuser->setCodemp(str_pad($sfGuardUser->getId(), 3, '0', STR_PAD_LEFT));
      $apliuser->setCodapl($codapli);
      $apliuser->setNomopc('menu');
      $apliuser->setDesopc('menu');
      $apliuser->setPriuse('15');
      $apliuser->save();

      $apliuser= new ApliUser();
      $apliuser->setLoguse(strtoupper($sfGuardUser->getUsername()));
      $apliuser->setCodemp(str_pad($sfGuardUser->getId(), 3, '0', STR_PAD_LEFT));
      $apliuser->setCodapl($codapli);
      $apliuser->setNomopc('catalogo');
      $apliuser->setDesopc('catalogo');
      $apliuser->setPriuse('15');
      $apliuser->save();
  }

  public function salvarEmpresa($sfGuardUser) {
      $empresa = new EmpresaUser();
      $empresa->setCodemp(str_pad($sfGuardUser->getId(), 3, '0', STR_PAD_LEFT));
      $empresa->setPassemp('SIMA'.str_pad($sfGuardUser->getId(), 3, '0', STR_PAD_LEFT));
      $empresa->setNomemp(strtoupper($sfGuardUser->getUsername()));
      $empresa->save();
  }

  public function populateProfileSettings($profile)
  {
    // Extend me to save your own stuff the first time
    $fullname = $this->getRequestParameter('fullname');
    $email = $this->getRequestParameter('email');
    $institution = $this->getRequestParameter('institution');
    $information = $this->getRequestParameter('information');
    $pais=$this->getRequestParameter('pais');
    $comentario=$this->getRequestParameter('comentario');
    $tipo=$this->getRequestParameter('optionsRadios');
    $profile->setInstitution($institution);
    $profile->setInformation($information);
    $profile->setFullname($fullname);
    $profile->setEmail(strtoupper($email));
    $profile->setPais($pais);
    $profile->setTipo($tipo);
    $profile->setComentario($comentario);
    $guid = self::createGuid();
    $profile->setValidate("n" . $guid);
  }

  public function executeSendValidate()
  {
    $sfGuardUser = sfGuardUserPeer::retrieveByPK(
      $this->getFlash('sfApplyPlugin_id', false));
    if (!$sfGuardUser)
    {
      $this->logMessage(
        'No user in executeSendValidate', 'err');
    }
    $profile = $sfGuardUser->getProfile();
    if (!$profile->getValidate())
    {
      // Don't send a validation email unless they actually have
      // a validation code at the moment
      $this->logMessage(
        'attempted executeSendValidate for a user with no validate code.', 'err');
      return 'Error';
    }
    $mail = new sfMail();
    $mail->setCharset('utf-8');
    $from = sfConfig::get('app_sfApplyPlugin_from');
    if (!$from)
    {
      $this->logMessage(
        'app_sfApplyPlugin_from is not set. Cannot send email.', 'err');
      return 'Error';
    }
    $this->validate = $profile->getValidate();
    $vtype = self::getValidationType($this->validate);
    if ($vtype == 'Reset')
    {
      $mail->setSubject(sfConfig::get('app_sfApplyPlugin_reset_subject',
        "Por favor confirma el cambio del password de tu cuenta de Cidesa Roraima"));
      $this->logMessage(
        'set reset subject', 'info');
    }
    else
    {
      $mail->setSubject(sfConfig::get('app_sfApplyPlugin_apply_subject',
        "Por favor confirma la creación de tu nuevo usuario de Cidesa Roraima"));
      $this->logMessage(
        'set new subject', 'info');
    }
    $mail->setSender($from['email'], $from['fullname']);
    $mail->setFrom($from['email'], $from['fullname']);
    $mail->addAddress($profile->getEmail(), $profile->getFullname());
    $this->mail = $mail;
    $this->logMessage(
      'returning from executeSendValidate', 'info');
    return $vtype;
  }

  public function executeConfirm()
  {
    $validate = $this->getRequestParameter('validate');
    $c = new Criteria();
    // 0.6.3: oops, this was in sfGuardUserProfilePeer in my application
    // and therefore never got shipped with the plugin until I built
    // a second site and spotted it!
    $c->add(sfGuardUserProfilePeer::VALIDATE, $validate);
    $c->addJoin(sfGuardUserPeer::ID, sfGuardUserProfilePeer::USER_ID);
    $sfGuardUser = sfGuardUserPeer::doSelectOne($c);
    if (!$sfGuardUser)
    {
      return 'Invalid';
    }
    $type = self::getValidationType($validate);
    if (!strlen($validate))
    {
      return 'Invalid';
    }
    $profile = $sfGuardUser->getProfile();
    $profile->setValidate(null);
    $profile->save();
    if ($type == 'New')
    {
      $sfGuardUser->setIsActive(true);  
      $sfGuardUser->save();
      $this->getUser()->signIn($sfGuardUser);
    }
    if ($type == 'Reset')
    {
      $this->getUser()->setAttribute('Reset', 
        $sfGuardUser->getId(), 'sfApplyPlugin');
      return $this->redirect('sfApply/reset');
    }
  }

  public function validateResetRequest()
  {
    if ($this->getRequest()->getMethod() == sfRequest::POST) 
    {
      $username = $this->getRequestParameter('username');
      $this->sfGuardUser = sfGuardUserPeer::retrieveByUsername($username);
      if (!$this->sfGuardUser)
      {
        $this->getRequest()->setError('username', 'There is no account with that username.');
        return false;
      }
      if (!$this->sfGuardUser->getIsActive())
      {
        $this->getRequest()->setError('username', 'That account has not been activated.');
        return false;
      }
    }
    return true;
  }
  
  public function executeResetRequest()
  {
    if ($this->getRequest()->getMethod() == sfRequest::POST) 
    {
      $username = $this->getRequestParameter('username');
      $profile = $this->sfGuardUser->getProfile();
      $profile->setValidate('r' . self::createGuid());
      $profile->save();
      $this->setFlash('sfApplyPlugin_id', $this->sfGuardUser->getId(), false);
      $this->sendEmail('sfApply', 'sendValidate');
      return 'After';
    }
  }

  public function validateReset()
  {
    $this->id = $this->getUser()->getAttribute(
      'Reset', false, 'sfApplyPlugin', false);
    if (!$this->id)
    {
      // No need to be polite, this is probably a hack attempt
      $this->forward404();
    }
    if ($this->getRequest()->getMethod() == sfRequest::POST) 
    {
      $password = $this->getRequestParameter('password'); 
      $password2 = $this->getRequestParameter('password2');
      if ($password !== $password2)
      {
        $this->getRequest()->setError('password', "Passwords do not match.");
        return false;
      }
      $this->sfGuardUser = sfGuardUserPeer::retrieveByPK($this->id);
      if (!$this->sfGuardUser)
      {
        // No need to be polite, this is probably a hack attempt
        $this->forward404();
      }
    }
    return true;
  }

  public function executeReset()
  {
    if ($this->getRequest()->getMethod() == sfRequest::POST) 
    {
      $sfGuardUser = $this->sfGuardUser;
      $sfGuardUser->setPassword($this->getRequestParameter('password'));
      $sfGuardUser->save();
      $this->getUser()->signIn($sfGuardUser);
      $this->getUser()->setAttribute(
        'Reset', null, 'sfApplyPlugin');
      return 'After';
    }
  }

  public function executeResetCancel()
  {
    $this->getUser()->setAttribute(
      'Reset', null, 'sfApplyPlugin');
    return $this->redirect('@homepage'); 
  }

  public function executeSettings()
  {
    $profile = $this->getUser()->getGuardUser()->getProfile();
    $this->profile = $profile;
    if ($this->getRequest()->getMethod() == sfRequest::POST) 
    {
      $this->updateProfileSettings($profile);
      return $this->redirect('@homepage');
    }
  }

  // Extend me to update your own fields when the user
  // changes their settings
  public function updateProfileSettings($profile)
  {
    $fullname = $this->getRequestParameter('fullname');
    $this->profile->setFullname($fullname);
    $this->profile->save();
  }

  static private function createGuid()
  {
    $guid = "";
    for ($i = 0; ($i < 16); $i++) {
      $guid .= sprintf("%02x", mt_rand(0, 255));
    }
    return $guid;
  }
  
  static private function getValidationType($validate)
  {
    $t = substr($validate, 0, 1);  
    if ($t == 'n')
    {
      return 'New';
    } 
    elseif ($t == 'r')
    {
      return 'Reset';
    }
    else
    {
      return sfView::NONE;
    }
  }

  // Since I use this a lot, a simple proxy method
  private function setError($item, $message)
  {
    return $this->getRequest()->setError($item, $message);
  }

  public function handleError()
  {
    return sfView::SUCCESS;
  }
}
