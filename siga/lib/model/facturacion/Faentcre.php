<?php

/**
 * Subclase para representar una fila de la tabla 'faentcre'.
 *
 * Registro de Entidades Crediticias
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Faentcre extends BaseFaentcre
{    
    
    public function getDeszon()
  {
   return Herramientas::getX_vacio('CODZON','Fadefzon','Deszon',self::getCodzon());
  }
}
