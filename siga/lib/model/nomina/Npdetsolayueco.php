<?php

/**
 * Subclase para representar una fila de la tabla 'npdetsolayueco'.
 *
 * Tabla que graba el detalle de la Solicitud de Ayuda Económica
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npdetsolayueco extends BaseNpdetsolayueco
{
	public function getNomemp()
  {
  	$esnoemp=H::getX_vacio('Numsolayu','Npsolayueco','Esnoemp',$this->numsolayu);
    if ($esnoemp=='S')
      return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codempayu);
    else
      return H::getX_vacio('Rifnemp','Vianoemp','Nomnemp',$this->codempayu);
  }
}
