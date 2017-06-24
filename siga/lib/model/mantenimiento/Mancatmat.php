<?php

/**
 * Subclase para representar una fila de la tabla 'mancatmat'.
 *
 * Tabla para guardar la Catalogación de Material
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Mancatmat extends BaseMancatmat
{
	protected $grid=array();
	protected $grid2=array();
	protected $grid3=array();
	protected $grid4=array();

	public function getLoncat(){
      return strlen(H::getObtener_FormatoCategoria());
    }

    public function getNomcat()
    {
	  return Herramientas::getX('CODCAT','Npcatpre','Nomcat',self::getUnisol());
    }
}
