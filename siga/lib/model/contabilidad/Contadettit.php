<?php

/**
 * Subclase para representar una fila de la tabla 'contadettit'.
 *
 * Contiene los registros del detalle de los Titulos del Estado de Flujo Efectivo
 *
 * @package    Roraima
 * @subpackage lib.model.contabilidad
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Contadettit extends BaseContadettit
{
    protected $destit = '';
    
    public function getDestit(){
        return Herramientas::getX('CODTIT', 'Contatit', 'Destit', self::getCodtit());
    }
}
