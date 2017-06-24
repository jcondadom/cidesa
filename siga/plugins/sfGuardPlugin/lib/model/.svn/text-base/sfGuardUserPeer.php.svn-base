<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'sf_guard_user'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage plugins.sfGuardPlugin.lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class sfGuardUserPeer extends BasesfGuardUserPeer
{
    public static function retrieveByUsername($pk, $con = null)
    {
        if ($con === null) {
                $con = Propel::getConnection(self::DATABASE_NAME);
        }

        $criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);

        $criteria->add(sfGuardUserPeer::USERNAME, $pk);


        $v = sfGuardUserPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }
}
