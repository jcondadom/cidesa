<?php
/**
 * AutosetSchemaFIlter: Clase para cambiar de forma dinámica el schema sobre
 * el cual se esta trabajando actualmente.
 *
 * @package    Roraima
 * @subpackage lib
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: AutosetSchemaFIlter.class.php 41948 2011-01-07 17:50:04Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class AutosetSchemaFIlter extends sfFilter
{
  public function execute($filterChain)
  {
    $user = $this->getContext()->getUser();

    $esquema = $user->getAttribute('schema');
    $database = $user->getAttribute('database');

    if (isset($esquema))
    {
      $db = sfContext::getInstance()->getDatabaseManager()->getDatabase('propel');
      $db->setConnectionParameter('schema',$esquema);
      if (isset($database))
        $db->setConnectionParameter('database',$database);

    }else{
      $esquema = $this->getContext()->getRequest()->getParameter('schema');
      if (isset($esquema))
      {
        $db = sfContext::getInstance()->getDatabaseManager()->getDatabase('propel');
        $db->setConnectionParameter('schema',$esquema);
        if (isset($database))
          $db->setConnectionParameter('database',$database);

        if(!$this->getContext()->getUser()->isAuthenticated()){
          if(defined('CIDESA_CONFIG')) {
            if(file_exists(CIDESA_CONFIG))
              $app_yml = sfYaml::load(CIDESA_CONFIG.DIRECTORY_SEPARATOR.'app.yml');
            else{
              $app_yml = sfYaml::load(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps/autenticacion/config/app.yml');              
            }
            $this->getContext()->getUser()->setAttribute('configemp', $app_yml['all']['.apps']['configemp']);
            $this->getContext()->getUser()->setAttribute('schema', $esquema);
          }          
        }

      }
    }

    $this->getContext()->getUser()->setCulture('es_VE');

    // Para hacer pruebas
    if(SF_ENVIRONMENT=='test'){
      $user->setAuthenticated(true);
      $user->addCredential('admin');
    }

    $filterChain->execute();
  }
}
