<?php

/**
 * Subclase para representar una fila de la tabla 'facrovis'.
 *
 * Contiene los registros del Cronograma de Visitas
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Facrovis extends BaseFacrovis
{
	public function getNomven()
    {
      return Herramientas::getX_vacio('RIFVEN','Faregvend','Nomven',self::getRifven());
    }

     public function getNompro()
    {
      return Herramientas::getX_vacio('RIFPRO','Facliente','Nompro',self::getRifpro());
    }
}
