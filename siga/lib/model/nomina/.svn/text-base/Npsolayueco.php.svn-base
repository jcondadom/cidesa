<?php

/**
 * Subclase para representar una fila de la tabla 'npsolayueco'.
 *
 * Tabla que graba las Solicitudes de Ayuda Económica
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npsolayueco extends BaseNpsolayueco
{
  protected $grid=array();

  public function getNomext()
  {
    return H::getX_vacio('TIPCOM','Cpdoccom','Nomext',self::getTipcom());
  }  

  /*public function getNomemp()
  {
    if (self::getEsnoemp()=='S')
      return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codempayu);
    else
      return H::getX_vacio('Rifnemp','Vianoemp','Nomnemp',$this->codempayu);
  }*/

  public function getNomben()
  {
  	$nombre=H::getX_vacio('Cedrif','Opbenefi','Nomben',self::getCedrif());
  	if ($nombre!='')
  		return $nombre;
  	else {
	    if (self::getEsnoemp()=='S')
	      return H::getX_vacio('Codemp','Nphojint','Nomemp',self::getCedrif());
	    else
	      return H::getX_vacio('Rifnemp','Vianoemp','Nomnemp',self::getCedrif());
    } 
  }

  public function getDestipayu()
  {
    return H::getX_vacio('CODTIPAYU','Nptipayu','Destipayu',self::getCodtipayu());
  }  

  public function getNomcat()
  {
    return H::getX_vacio('CODCAT','Npcatpre','Nomcat',self::getCodcat());
  }

  public function getDeseve()
  {
    return H::getX_vacio('CODEVE','Cpevepre','Deseve',self::getCodeve());
  } 

  public function getDesniv()
  {
    return H::getX_vacio('CODNIV','Npestorg','Desniv',self::getCodniv());
  }   
}
