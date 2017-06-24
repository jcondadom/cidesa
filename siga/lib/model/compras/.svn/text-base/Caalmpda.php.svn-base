<?php

/**
 * Subclase para representar una fila de la tabla 'caalmpda'.
 *
 * Tabla que contiene informaciÃ³n referente a los la distribucion en almacen de PDA
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Caalmpda extends BaseCaalmpda
{
     public function getNomalm()
    {
            return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
    }

    public function getNomubi()
    {
            return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubi());
    }
}
