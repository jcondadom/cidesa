<?php

/**
 * Subclase para representar una fila de la tabla 'viadefpri'.
 *
 * Tabla que contiene información referente a la Definición de las Primas
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Viadefpri extends BaseViadefpri
{
    protected $obj=array();

    public function getCodprisup()
    {
        return self::getCodpri();
    }

    public function getCodpriadi()
    {
        return self::getCodpri();
    }

    public function getCodprigas()
    {
        return self::getCodpri();
    }

    public function getDespriadi()
    {
        return self::getDespri();
    }

    public function getDesprigas()
    {
        return self::getDespri();
    }
}
