<?php

/**
 * Subclase para representar una fila de la tabla 'fapreprocan'.
 *
 * Tabla que graba los precios por producto canal y frecuencia
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fapreprocan extends BaseFapreprocan
{
	protected $obj=array();
	protected $longitud="";

	public function getLongitud()
   {
     return strlen(H::getMascaraArticulo());
   }

    public function getDesart()
    {
      return Herramientas::getX_vacio('CODART','Caregart','Desart',self::getCodart());
    }

     public function getDescan()
    {
      return Herramientas::getX_vacio('CODCAN','Fadefcan','Descan',self::getCodcan());
    }

}
