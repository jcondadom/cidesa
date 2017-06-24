<?php

/**
 * Subclass for representing a row from the 'fanotcre'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: efmosquera $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fanotcre.php 48851 2012-07-11 16:31:38Z efmosquera $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fanotcre extends BaseFanotcre {

    public function getNompro() {
        $c = new Criteria();
        $c->add(FafacturPeer :: REFFAC, self::getReffac());
        $c->addJoin(FafacturPeer :: CODCLI, FaclientePeer :: CODPRO);
        $per = FafacturPeer::doSelectOne($c);
        if (!$per) {
           return "Registro No Encontrado";
        } else {
           return $per->getNompro();
        }        
    }

}
