<?php

/**
 * Subclase para representar una fila de la tabla 'cafirdocpre'.
 *
 * Tabla para configuración de  firmas para  documentos preimpresos
 *
 * @package    Roraima
 * @subpackage lib.model.compras
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Cafirdocpre extends BaseCafirdocpre
{
	protected $obj=array();

	public function getDesdirec()
    {
        return H::getX_vacio('Coddirec','Cadefdirec','Desdirec',$this->coddirec);
    }
}
