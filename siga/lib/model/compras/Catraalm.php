<?php

/**
 * Subclass for representing a row from the 'catraalm'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Catraalm extends BaseCatraalm
{
        protected $cedemp='';
        protected $mensaje='';
        protected $grid      = array();
        protected $estatus='';

    public function getAlmaori()
	{
		return Herramientas::getX('codalm','cadefalm','nomalm',self::getAlmori());
	}

	public function getAlmades()
	{
		return Herramientas::getX('codalm','cadefalm','nomalm',self::getAlmdes());
	}

	public function getNomubiori()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubiori());
	}

	public function getNomubides()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubides());
	}
        public function getMensaje()
	{
		$valor='';
                if(self::getStatra()=='T'){
                    $valor='En Transito';
                }else  if(self::getStatra()=='R'){
                    $valor='Recibido Conforme';
                } else if(self::getStatra()=='D'){
                    $valor='Recibido con Diferencia';
                }else  if(self::getStatra()=='P'){
                    $valor='Recibido con Diferencia Aprobado';
                }else  if(self::getStatra()=='N'){
                    $valor='Traspaso Anulado  el '.date('d/m/Y',strtotime(self::getFecanu()));
                }
                return($valor);

	}
        public function getNomalm()
	{
		return Herramientas::getX('codalm','cadefalm','nomalm',self::getAlmdes());
	}

}
