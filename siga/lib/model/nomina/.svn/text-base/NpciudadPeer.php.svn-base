<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npciudad'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class NpciudadPeer extends BaseNpciudadPeer
{
	public static function getNompai($codpai)
  {
	return Herramientas::getX('CODPAI','Nppais','Nompai',$codpai);
  }

public static function getNomedo($codpai,$codedo)
  {
	return Herramientas::getXx('Npestado',array('codpai','codedo'),array($codpai,$codedo),'nomedo');
  }

  public static function getNomciu($codpai,$codedo,$codciu)
  {
	return Herramientas::getXx('Npciudad',array('codpai','codedo','codciu'),array($codpai,$codedo,$codciu),'nomciu');
  }
}
