<?php


abstract class BaseBnpolmuePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bnpolmue';

	
	const CLASS_DEFAULT = 'lib.model.Bnpolmue';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'bnpolmue.CODACT';

	
	const CODMUE = 'bnpolmue.CODMUE';

	
	const NUMCUE = 'bnpolmue.NUMCUE';

	
	const NUMDEP = 'bnpolmue.NUMDEP';

	
	const FECDEPSEG = 'bnpolmue.FECDEPSEG';

	
	const CODTIP = 'bnpolmue.CODTIP';

	
	const MONPAG = 'bnpolmue.MONPAG';

	
	const PORPRI = 'bnpolmue.PORPRI';

	
	const MONPRI = 'bnpolmue.MONPRI';

	
	const NUMCOM = 'bnpolmue.NUMCOM';

	
	const DEPREC = 'bnpolmue.DEPREC';

	
	const SEGNOM = 'bnpolmue.SEGNOM';

	
	const MONNOM = 'bnpolmue.MONNOM';

	
	const FRENOM = 'bnpolmue.FRENOM';

	
	const ID = 'bnpolmue.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Codmue', 'Numcue', 'Numdep', 'Fecdepseg', 'Codtip', 'Monpag', 'Porpri', 'Monpri', 'Numcom', 'Deprec', 'Segnom', 'Monnom', 'Frenom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BnpolmuePeer::CODACT, BnpolmuePeer::CODMUE, BnpolmuePeer::NUMCUE, BnpolmuePeer::NUMDEP, BnpolmuePeer::FECDEPSEG, BnpolmuePeer::CODTIP, BnpolmuePeer::MONPAG, BnpolmuePeer::PORPRI, BnpolmuePeer::MONPRI, BnpolmuePeer::NUMCOM, BnpolmuePeer::DEPREC, BnpolmuePeer::SEGNOM, BnpolmuePeer::MONNOM, BnpolmuePeer::FRENOM, BnpolmuePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'codmue', 'numcue', 'numdep', 'fecdepseg', 'codtip', 'monpag', 'porpri', 'monpri', 'numcom', 'deprec', 'segnom', 'monnom', 'frenom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Codmue' => 1, 'Numcue' => 2, 'Numdep' => 3, 'Fecdepseg' => 4, 'Codtip' => 5, 'Monpag' => 6, 'Porpri' => 7, 'Monpri' => 8, 'Numcom' => 9, 'Deprec' => 10, 'Segnom' => 11, 'Monnom' => 12, 'Frenom' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (BnpolmuePeer::CODACT => 0, BnpolmuePeer::CODMUE => 1, BnpolmuePeer::NUMCUE => 2, BnpolmuePeer::NUMDEP => 3, BnpolmuePeer::FECDEPSEG => 4, BnpolmuePeer::CODTIP => 5, BnpolmuePeer::MONPAG => 6, BnpolmuePeer::PORPRI => 7, BnpolmuePeer::MONPRI => 8, BnpolmuePeer::NUMCOM => 9, BnpolmuePeer::DEPREC => 10, BnpolmuePeer::SEGNOM => 11, BnpolmuePeer::MONNOM => 12, BnpolmuePeer::FRENOM => 13, BnpolmuePeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'codmue' => 1, 'numcue' => 2, 'numdep' => 3, 'fecdepseg' => 4, 'codtip' => 5, 'monpag' => 6, 'porpri' => 7, 'monpri' => 8, 'numcom' => 9, 'deprec' => 10, 'segnom' => 11, 'monnom' => 12, 'frenom' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BnpolmueMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BnpolmueMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BnpolmuePeer::getTableMap();
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
		return str_replace(BnpolmuePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BnpolmuePeer::CODACT);

		$criteria->addSelectColumn(BnpolmuePeer::CODMUE);

		$criteria->addSelectColumn(BnpolmuePeer::NUMCUE);

		$criteria->addSelectColumn(BnpolmuePeer::NUMDEP);

		$criteria->addSelectColumn(BnpolmuePeer::FECDEPSEG);

		$criteria->addSelectColumn(BnpolmuePeer::CODTIP);

		$criteria->addSelectColumn(BnpolmuePeer::MONPAG);

		$criteria->addSelectColumn(BnpolmuePeer::PORPRI);

		$criteria->addSelectColumn(BnpolmuePeer::MONPRI);

		$criteria->addSelectColumn(BnpolmuePeer::NUMCOM);

		$criteria->addSelectColumn(BnpolmuePeer::DEPREC);

		$criteria->addSelectColumn(BnpolmuePeer::SEGNOM);

		$criteria->addSelectColumn(BnpolmuePeer::MONNOM);

		$criteria->addSelectColumn(BnpolmuePeer::FRENOM);

		$criteria->addSelectColumn(BnpolmuePeer::ID);

	}

	const COUNT = 'COUNT(bnpolmue.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bnpolmue.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BnpolmuePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BnpolmuePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BnpolmuePeer::doSelectRS($criteria, $con);
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
		$objects = BnpolmuePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BnpolmuePeer::populateObjects(BnpolmuePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BnpolmuePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BnpolmuePeer::getOMClass();
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
		return BnpolmuePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BnpolmuePeer::ID); 

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
			$comparison = $criteria->getComparison(BnpolmuePeer::ID);
			$selectCriteria->add(BnpolmuePeer::ID, $criteria->remove(BnpolmuePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BnpolmuePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BnpolmuePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bnpolmue) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BnpolmuePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bnpolmue $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BnpolmuePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BnpolmuePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BnpolmuePeer::DATABASE_NAME, BnpolmuePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BnpolmuePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BnpolmuePeer::DATABASE_NAME);

		$criteria->add(BnpolmuePeer::ID, $pk);


		$v = BnpolmuePeer::doSelect($criteria, $con);

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
			$criteria->add(BnpolmuePeer::ID, $pks, Criteria::IN);
			$objs = BnpolmuePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBnpolmuePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BnpolmueMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BnpolmueMapBuilder');
}
