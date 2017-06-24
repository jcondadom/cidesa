<?php

/**
 * Subclase para representar una fila de la tabla 'npasonomcptgru'.
 *
 * Tabla que contiene informaciÃ³n referente a los conceptos para reportes
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npasonomcptgru extends BaseNpasonomcptgru
{
    public function getNomnom()
    {
        return Herramientas::getX_vacio('codnom','Npnomina','nomnom',self::getCodnom());
    }

    public function getNomcon()
    {
        return Herramientas::getX('codcon','Npdefcpt','nomcon',self::getCodcon());
    }
}
