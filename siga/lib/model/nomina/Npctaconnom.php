<?php

/**
 * Subclase para representar una fila de la tabla 'npctaconnom'.
 *
 * Tabla para registrar detalle de Cuentas Contables a Conceptos por Nómina
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npctaconnom extends BaseNpctaconnom
{
	protected $obj=array();

	 public function getDescta()
    {
        return Herramientas::getX('codcta','Contabb','Descta',self::getCodcta());
    }

    public function getNomnom()
    {
        return Herramientas::getX('codnom','Npnomina','Nomnom',self::getCodnom());
    }

    public function getNomcon()
    {
        return Herramientas::getX('codcon','Npdefcpt','Nomcon',self::getCodcon());
    }
}
