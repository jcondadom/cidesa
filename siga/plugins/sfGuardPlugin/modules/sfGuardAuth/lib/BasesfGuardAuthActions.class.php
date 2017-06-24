<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: BasesfGuardAuthActions.class.php 8371 2008-04-09 10:18:22Z gordon $
 */
class BasesfGuardAuthActions extends sfActions
{
  public function executeSignin()
  {
   $modul = $_SESSION["modulo"];
   $sfGuardUser= new sfGuardUser();
   $sfGuardUser= sfGuardUserPeer::retrieveByUsername(strtoupper($this->getRequestParameter('username')));
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
      
      $user->autenticate_native(strtoupper($this->getRequestParameter('username')),$this->getRequestParameter('password'),str_pad($sfGuardUser->getId(), 3, '0',  STR_PAD_LEFT));
      $this->redirect('' != $signin_url ? $signin_url : '@homepage');
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
  }

  public function executeSignout()
  {
    $this->getUser()->signOut();

    $signout_url = sfConfig::get('app_sf_guard_plugin_success_signout_url', $this->getRequest()->getReferer());

    $this->redirect('' != $signout_url ? $signout_url : '@homepage');
  }

  public function executeSecure()
  {
    $this->getResponse()->setStatusCode(403);
  }

  public function executePassword()
  {
    throw new sfException('This method is not yet implemented.');
  }

  public function handleErrorSignin()
  {

    $user = $this->getUser();
    if (!$user->hasAttribute('referer'))
    {
      $user->setAttribute('referer', $this->getRequest()->getReferer());
    }

    $module = sfConfig::get('sf_login_module');
    if ($this->getModuleName() != $module)
    {
      $this->forward(sfConfig::get('sf_login_module'), sfConfig::get('sf_login_action'));
    }

    return sfView::SUCCESS;
  }
}
