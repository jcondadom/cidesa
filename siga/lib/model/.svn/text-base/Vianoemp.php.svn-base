<?php

/**
 * Subclase para representar una fila de la tabla 'vianoemp'.
 *
 * Contiene los registros del personal que son empleado propio
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Vianoemp extends BaseVianoemp
{
	 public function getNomemp()
    {
    	return self::getNomnemp();
    }

    public function getCodemp()
    {
    	return self::getRifnemp();
    }

    public function getCodempayu()
    {
    	return self::getRifnemp();
    }

    public function getDesban()
  {
    return Herramientas::getX_vacio('CODBAN','Cabanco','Desban',self::getCodban());
  }   

   public function getDesniv()
  {
    return Herramientas::getX_vacio('CODNIV','Npestorg','Desniv',self::getCodniv());
  }

  public function getDesnivnemp()
  {
      return H::getX_vacio('Codniv','Viadefniv','Desniv',self::getCodnivnemp());
  }

}
