<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'caregart'.
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
class CaregartPeer extends BaseCaregartPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (CaregartPeer::CODART => 'Código', CaregartPeer::DESART => 'Descripción', CaregartPeer::UNIMED => 'Unidad de Medida', CaregartPeer::COSPRO => 'Costo',CaregartPeer::EXITOT => 'Existencia',CaregartPeer::CODPAR => 'Codigo Partida', ),);


	static public function getColumName($colum)
	{
		return self::$columsname[self::COLUMNS][$colum];
	}

	static public function getColumsNames()
	{
		return self::$columsname[self::COLUMNS];
	}


	static public function getArrayFieldsNames()
	{
		$col = self::$columsname[self::COLUMNS];
		$columnas = array();
		foreach($col as $key => $value)
		{
			$punto = strpos($key,'.');
			$tabla = substr($key,0,$punto);
			$campo = substr($key,$punto+1);
			$columnas[] = ucfirst(strtolower($campo));

		}
		return $columnas;
	}

	public static function getDescripcion_art($codigo)
	{
    	return htmlspecialchars(Herramientas::getX('CODART','Caregart','DESART',$codigo));
	}

	public static function getDesart($codigo)
	{
		return htmlspecialchars(Herramientas::getX('CODART','Caregart','Desart',$codigo));
	}

   public static function getDato($codigo, $nomdat)
   {
   	return Herramientas::getX('CODART','Caregart',$nomdat,$codigo);
   }

  public static function getExistencia($codart, $codalm)
  {
    $sql = "select sum((case when A.exiact isnull then 0 else A.exiact end)-B.EXIFAC) as exiact  from caartalmubi A, 
      (SELECT case when SUM(CANTOT) isnull then 0 else SUM(CANTOT) end AS EXIFAC 
      FROM FAARTFAC B,FAFACTUR A 
      where codart='$codart' 
      and A.REFFAC=B.REFFAC 
      AND A.status='A'
      AND A.codalmUSU='$codalm'
      AND A.REFFAC NOT IN (SELECT REQART FROM CADPHART)) B
      where A.codart='$codart' and A.codalm='$codalm'
      GROUP BY B.EXIFAC";
  	//$sql = "select sum(exiact) as exiact from caartalmubi where codart='$codart' and codalm='$codalm'";
  	if(H::BuscarDatos($sql,$regs)){
  		if(count($regs)>0) return (float)$regs[0]['exiact'];
  		else return 0.0; 
  	}else return 0.0;
  }
}
