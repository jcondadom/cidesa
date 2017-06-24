<?php


abstract class BaseCaalmpdaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caalmpda';

	
	const CLASS_DEFAULT = 'lib.model.compras.Caalmpda';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPDA = 'caalmpda.REFPDA';

	
	const CODART = 'caalmpda.CODART';

	
	const ID_REG = 'caalmpda.ID_REG';

	
	const CODALM = 'caalmpda.CODALM';

	
	const CODUBI = 'caalmpda.CODUBI';

	
	const CANDIS = 'caalmpda.CANDIS';

	
	const ID = 'caalmpda.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refpda', 'Codart', 'IdReg', 'Codalm', 'Codubi', 'Candis', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaalmpdaPeer::REFPDA, CaalmpdaPeer::CODART, CaalmpdaPeer::ID_REG, CaalmpdaPeer::CODALM, CaalmpdaPeer::CODUBI, CaalmpdaPeer::CANDIS, CaalmpdaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refpda', 'codart', 'id_reg', 'codalm', 'codubi', 'candis', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refpda' => 0, 'Codart' => 1, 'IdReg' => 2, 'Codalm' => 3, 'Codubi' => 4, 'Candis' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (CaalmpdaPeer::REFPDA => 0, CaalmpdaPeer::CODART => 1, CaalmpdaPeer::ID_REG => 2, CaalmpdaPeer::CODALM => 3, CaalmpdaPeer::CODUBI => 4, CaalmpdaPeer::CANDIS => 5, CaalmpdaPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('refpda' => 0, 'codart' => 1, 'id_reg' => 2, 'codalm' => 3, 'codubi' => 4, 'candis' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/compras/map/CaalmpdaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.compras.map.CaalmpdaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaalmpdaPeer::getTableMap();
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
		return str_replace(CaalmpdaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaalmpdaPeer::REFPDA);

		$criteria->addSelectColumn(CaalmpdaPeer::CODART);

		$criteria->addSelectColumn(CaalmpdaPeer::ID_REG);

		$criteria->addSelectColumn(CaalmpdaPeer::CODALM);

		$criteria->addSelectColumn(CaalmpdaPeer::CODUBI);

		$criteria->addSelectColumn(CaalmpdaPeer::CANDIS);

		$criteria->addSelectColumn(CaalmpdaPeer::ID);

	}

	const COUNT = 'COUNT(caalmpda.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caalmpda.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaalmpdaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaalmpdaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaalmpdaPeer::doSelectRS($criteria, $con);
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
		$objects = CaalmpdaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaalmpdaPeer::populateObjects(CaalmpdaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaalmpdaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaalmpdaPeer::getOMClass();
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
		return CaalmpdaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CaalmpdaPeer::ID); 

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
			$comparison = $criteria->getComparison(CaalmpdaPeer::ID);
			$selectCriteria->add(CaalmpdaPeer::ID, $criteria->remove(CaalmpdaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaalmpdaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaalmpdaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caalmpda) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaalmpdaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caalmpda $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaalmpdaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaalmpdaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaalmpdaPeer::DATABASE_NAME, CaalmpdaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaalmpdaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaalmpdaPeer::DATABASE_NAME);

		$criteria->add(CaalmpdaPeer::ID, $pk);


		$v = CaalmpdaPeer::doSelect($criteria, $con);

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
			$criteria->add(CaalmpdaPeer::ID, $pks, Criteria::IN);
			$objs = CaalmpdaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaalmpdaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/compras/map/CaalmpdaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.compras.map.CaalmpdaMapBuilder');
}
