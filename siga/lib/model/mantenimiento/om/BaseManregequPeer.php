<?php


abstract class BaseManregequPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'manregequ';

	
	const CLASS_DEFAULT = 'lib.model.mantenimiento.Manregequ';

	
	const NUM_COLUMNS = 36;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMEQU = 'manregequ.NUMEQU';

	
	const NOMEQU = 'manregequ.NOMEQU';

	
	const SEREQU = 'manregequ.SEREQU';

	
	const CODTEQ = 'manregequ.CODTEQ';

	
	const CODIDE = 'manregequ.CODIDE';

	
	const CODCLA = 'manregequ.CODCLA';

	
	const CODTAL = 'manregequ.CODTAL';

	
	const CODTTA = 'manregequ.CODTTA';

	
	const CODFAB = 'manregequ.CODFAB';

	
	const FECFAB = 'manregequ.FECFAB';

	
	const CODDIS = 'manregequ.CODDIS';

	
	const CODMON = 'manregequ.CODMON';

	
	const VALMON = 'manregequ.VALMON';

	
	const COSEQU = 'manregequ.COSEQU';

	
	const CODTGA = 'manregequ.CODTGA';

	
	const VALGAR = 'manregequ.VALGAR';

	
	const FECGAR = 'manregequ.FECGAR';

	
	const CODUME = 'manregequ.CODUME';

	
	const COMBUS = 'manregequ.COMBUS';

	
	const CODEST = 'manregequ.CODEST';

	
	const CODUBI = 'manregequ.CODUBI';

	
	const CODNIV = 'manregequ.CODNIV';

	
	const CODUNI = 'manregequ.CODUNI';

	
	const CODCENCOS = 'manregequ.CODCENCOS';

	
	const CARCOS = 'manregequ.CARCOS';

	
	const CODCAR = 'manregequ.CODCAR';

	
	const LOGUSE = 'manregequ.LOGUSE';

	
	const PESO = 'manregequ.PESO';

	
	const LONGIT = 'manregequ.LONGIT';

	
	const ALTURA = 'manregequ.ALTURA';

	
	const ANCHO = 'manregequ.ANCHO';

	
	const BALDE = 'manregequ.BALDE';

	
	const TOLBA = 'manregequ.TOLBA';

	
	const LLENAD = 'manregequ.LLENAD';

	
	const LUBRIC = 'manregequ.LUBRIC';

	
	const ID = 'manregequ.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numequ', 'Nomequ', 'Serequ', 'Codteq', 'Codide', 'Codcla', 'Codtal', 'Codtta', 'Codfab', 'Fecfab', 'Coddis', 'Codmon', 'Valmon', 'Cosequ', 'Codtga', 'Valgar', 'Fecgar', 'Codume', 'Combus', 'Codest', 'Codubi', 'Codniv', 'Coduni', 'Codcencos', 'Carcos', 'Codcar', 'Loguse', 'Peso', 'Longit', 'Altura', 'Ancho', 'Balde', 'Tolba', 'Llenad', 'Lubric', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ManregequPeer::NUMEQU, ManregequPeer::NOMEQU, ManregequPeer::SEREQU, ManregequPeer::CODTEQ, ManregequPeer::CODIDE, ManregequPeer::CODCLA, ManregequPeer::CODTAL, ManregequPeer::CODTTA, ManregequPeer::CODFAB, ManregequPeer::FECFAB, ManregequPeer::CODDIS, ManregequPeer::CODMON, ManregequPeer::VALMON, ManregequPeer::COSEQU, ManregequPeer::CODTGA, ManregequPeer::VALGAR, ManregequPeer::FECGAR, ManregequPeer::CODUME, ManregequPeer::COMBUS, ManregequPeer::CODEST, ManregequPeer::CODUBI, ManregequPeer::CODNIV, ManregequPeer::CODUNI, ManregequPeer::CODCENCOS, ManregequPeer::CARCOS, ManregequPeer::CODCAR, ManregequPeer::LOGUSE, ManregequPeer::PESO, ManregequPeer::LONGIT, ManregequPeer::ALTURA, ManregequPeer::ANCHO, ManregequPeer::BALDE, ManregequPeer::TOLBA, ManregequPeer::LLENAD, ManregequPeer::LUBRIC, ManregequPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numequ', 'nomequ', 'serequ', 'codteq', 'codide', 'codcla', 'codtal', 'codtta', 'codfab', 'fecfab', 'coddis', 'codmon', 'valmon', 'cosequ', 'codtga', 'valgar', 'fecgar', 'codume', 'combus', 'codest', 'codubi', 'codniv', 'coduni', 'codcencos', 'carcos', 'codcar', 'loguse', 'peso', 'longit', 'altura', 'ancho', 'balde', 'tolba', 'llenad', 'lubric', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numequ' => 0, 'Nomequ' => 1, 'Serequ' => 2, 'Codteq' => 3, 'Codide' => 4, 'Codcla' => 5, 'Codtal' => 6, 'Codtta' => 7, 'Codfab' => 8, 'Fecfab' => 9, 'Coddis' => 10, 'Codmon' => 11, 'Valmon' => 12, 'Cosequ' => 13, 'Codtga' => 14, 'Valgar' => 15, 'Fecgar' => 16, 'Codume' => 17, 'Combus' => 18, 'Codest' => 19, 'Codubi' => 20, 'Codniv' => 21, 'Coduni' => 22, 'Codcencos' => 23, 'Carcos' => 24, 'Codcar' => 25, 'Loguse' => 26, 'Peso' => 27, 'Longit' => 28, 'Altura' => 29, 'Ancho' => 30, 'Balde' => 31, 'Tolba' => 32, 'Llenad' => 33, 'Lubric' => 34, 'Id' => 35, ),
		BasePeer::TYPE_COLNAME => array (ManregequPeer::NUMEQU => 0, ManregequPeer::NOMEQU => 1, ManregequPeer::SEREQU => 2, ManregequPeer::CODTEQ => 3, ManregequPeer::CODIDE => 4, ManregequPeer::CODCLA => 5, ManregequPeer::CODTAL => 6, ManregequPeer::CODTTA => 7, ManregequPeer::CODFAB => 8, ManregequPeer::FECFAB => 9, ManregequPeer::CODDIS => 10, ManregequPeer::CODMON => 11, ManregequPeer::VALMON => 12, ManregequPeer::COSEQU => 13, ManregequPeer::CODTGA => 14, ManregequPeer::VALGAR => 15, ManregequPeer::FECGAR => 16, ManregequPeer::CODUME => 17, ManregequPeer::COMBUS => 18, ManregequPeer::CODEST => 19, ManregequPeer::CODUBI => 20, ManregequPeer::CODNIV => 21, ManregequPeer::CODUNI => 22, ManregequPeer::CODCENCOS => 23, ManregequPeer::CARCOS => 24, ManregequPeer::CODCAR => 25, ManregequPeer::LOGUSE => 26, ManregequPeer::PESO => 27, ManregequPeer::LONGIT => 28, ManregequPeer::ALTURA => 29, ManregequPeer::ANCHO => 30, ManregequPeer::BALDE => 31, ManregequPeer::TOLBA => 32, ManregequPeer::LLENAD => 33, ManregequPeer::LUBRIC => 34, ManregequPeer::ID => 35, ),
		BasePeer::TYPE_FIELDNAME => array ('numequ' => 0, 'nomequ' => 1, 'serequ' => 2, 'codteq' => 3, 'codide' => 4, 'codcla' => 5, 'codtal' => 6, 'codtta' => 7, 'codfab' => 8, 'fecfab' => 9, 'coddis' => 10, 'codmon' => 11, 'valmon' => 12, 'cosequ' => 13, 'codtga' => 14, 'valgar' => 15, 'fecgar' => 16, 'codume' => 17, 'combus' => 18, 'codest' => 19, 'codubi' => 20, 'codniv' => 21, 'coduni' => 22, 'codcencos' => 23, 'carcos' => 24, 'codcar' => 25, 'loguse' => 26, 'peso' => 27, 'longit' => 28, 'altura' => 29, 'ancho' => 30, 'balde' => 31, 'tolba' => 32, 'llenad' => 33, 'lubric' => 34, 'id' => 35, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/mantenimiento/map/ManregequMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.mantenimiento.map.ManregequMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ManregequPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(ManregequPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ManregequPeer::NUMEQU);

		$criteria->addSelectColumn(ManregequPeer::NOMEQU);

		$criteria->addSelectColumn(ManregequPeer::SEREQU);

		$criteria->addSelectColumn(ManregequPeer::CODTEQ);

		$criteria->addSelectColumn(ManregequPeer::CODIDE);

		$criteria->addSelectColumn(ManregequPeer::CODCLA);

		$criteria->addSelectColumn(ManregequPeer::CODTAL);

		$criteria->addSelectColumn(ManregequPeer::CODTTA);

		$criteria->addSelectColumn(ManregequPeer::CODFAB);

		$criteria->addSelectColumn(ManregequPeer::FECFAB);

		$criteria->addSelectColumn(ManregequPeer::CODDIS);

		$criteria->addSelectColumn(ManregequPeer::CODMON);

		$criteria->addSelectColumn(ManregequPeer::VALMON);

		$criteria->addSelectColumn(ManregequPeer::COSEQU);

		$criteria->addSelectColumn(ManregequPeer::CODTGA);

		$criteria->addSelectColumn(ManregequPeer::VALGAR);

		$criteria->addSelectColumn(ManregequPeer::FECGAR);

		$criteria->addSelectColumn(ManregequPeer::CODUME);

		$criteria->addSelectColumn(ManregequPeer::COMBUS);

		$criteria->addSelectColumn(ManregequPeer::CODEST);

		$criteria->addSelectColumn(ManregequPeer::CODUBI);

		$criteria->addSelectColumn(ManregequPeer::CODNIV);

		$criteria->addSelectColumn(ManregequPeer::CODUNI);

		$criteria->addSelectColumn(ManregequPeer::CODCENCOS);

		$criteria->addSelectColumn(ManregequPeer::CARCOS);

		$criteria->addSelectColumn(ManregequPeer::CODCAR);

		$criteria->addSelectColumn(ManregequPeer::LOGUSE);

		$criteria->addSelectColumn(ManregequPeer::PESO);

		$criteria->addSelectColumn(ManregequPeer::LONGIT);

		$criteria->addSelectColumn(ManregequPeer::ALTURA);

		$criteria->addSelectColumn(ManregequPeer::ANCHO);

		$criteria->addSelectColumn(ManregequPeer::BALDE);

		$criteria->addSelectColumn(ManregequPeer::TOLBA);

		$criteria->addSelectColumn(ManregequPeer::LLENAD);

		$criteria->addSelectColumn(ManregequPeer::LUBRIC);

		$criteria->addSelectColumn(ManregequPeer::ID);

	}

	const COUNT = 'COUNT(manregequ.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT manregequ.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ManregequPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ManregequPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ManregequPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ManregequPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ManregequPeer::populateObjects(ManregequPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ManregequPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ManregequPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return ManregequPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ManregequPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(ManregequPeer::ID);
			$selectCriteria->add(ManregequPeer::ID, $criteria->remove(ManregequPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(ManregequPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(ManregequPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Manregequ) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ManregequPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Manregequ $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ManregequPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ManregequPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(ManregequPeer::DATABASE_NAME, ManregequPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ManregequPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(ManregequPeer::DATABASE_NAME);

		$criteria->add(ManregequPeer::ID, $pk);


		$v = ManregequPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(ManregequPeer::ID, $pks, Criteria::IN);
			$objs = ManregequPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseManregequPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/mantenimiento/map/ManregequMapBuilder.php';
	Propel::registerMapBuilder('lib.model.mantenimiento.map.ManregequMapBuilder');
}
