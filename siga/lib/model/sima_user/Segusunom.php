<?php

/**
 * Subclase para representar una fila de la tabla 'segusunom'.
 *
 * Asociación de Categorias a Usuario
 *
 * @package    Roraima
 * @subpackage lib.model.sima_user
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Segusunom extends BaseSegusunom
{
	protected $check="";

	public function getNomnom()
    {
        return H::getX_vacio('CODNOM','Npnomina','Nomnom',self::getCodnom());
    }
}
