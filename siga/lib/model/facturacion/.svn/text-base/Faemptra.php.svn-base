<?php

/**
 * Subclase para representar una fila de la tabla 'faemptra'.
 *
 * null
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */
class Faemptra extends BaseFaemptra {

    public function __toString() {
        return array($this->codemptra => $this->nomemptra);
    }

 //public function getCodzon() {
 //    return Herramientas::getX_vacio('CODZON','fadefzon','deszon', self::getDeszon());
 //}
    
    public function getDeszon() {
     return Herramientas::getX_vacio('CODZON','fadefzon','deszon', self::getCodzon());
 }
}
