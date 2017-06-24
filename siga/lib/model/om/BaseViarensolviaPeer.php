<?php


abstract class BaseViarensolviaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'viarensolvia';

	
	const CLASS_DEFAULT = 'lib.model.Viarensolvia';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMREN = 'viarensolvia.NUMREN';

	
	const FECREN = 'viarensolvia.FECREN';

	
	const NUMSOL = 'viarensolvia.NUMSOL';

	
	const LUGVIS = 'viarensolvia.LUGVIS';

	
	const ACTREA = 'viarensolvia.ACTREA';

	
	const RESOBT = 'viarensolvia.RESOBT';

	
	const BENINS = 'viarensolvia.BENINS';

	
	const CONREC = 'viarensolvia.CONREC';

	
	const ID = 'viarensolvia.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numren', 'Fecren', 'Numsol', 'Lugvis', 'Actrea', 'Resobt', 'Benins', 'Conrec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ViarensolviaPeer::NUMREN, ViarensolviaPeer::FECREN, ViarensolviaPeer::NUMSOL, ViarensolviaPeer::LUGVIS, ViarensolviaPeer::ACTREA, ViarensolviaPeer::RESOBT, ViarensolviaPeer::BENINS, ViarensolviaPeer::CONREC, ViarensolviaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numren', 'fecren', 'numsol', 'lugvis', 'actrea', 'resobt', 'benins', 'conrec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numren' => 0, 'Fecren' => 1, 'Numsol' => 2, 'Lugvis' => 3, 'Actrea' => 4, 'Resobt' => 5, 'Benins' => 6, 'Conrec' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (ViarensolviaPeer::NUMREN => 0, ViarensolviaPeer::FECREN => 1, ViarensolviaPeer::NUMSOL => 2, ViarensolviaPeer::LUGVIS => 3, ViarensolviaPeer::ACTREA => 4, ViarensolviaPeer::RESOBT => 5, ViarensolviaPeer::BENINS => 6, ViarensolviaPeer::CONREC => 7, ViarensolviaPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('numren' => 0, 'fecren' => 1, 'numsol' => 2, 'lugvis' => 3, 'actrea' => 4, 'resobt' => 5, 'benins' => 6, 'conrec' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ViarensolviaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ViarensolviaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ViarensolviaPeer::getTableMap();
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
		return str_replace(ViarensolviaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ViarensolviaPeer::NUMREN);

		$criteria->addSelectColumn(ViarensolviaPeer::FECREN);

		$criteria->addSelectColumn(ViarensolviaPeer::NUMSOL);

		$criteria->addSelectColumn(ViarensolviaPeer::LUGVIS);

		$criteria->addSelectColumn(ViarensolviaPeer::ACTREA);

		$criteria->addSelectColumn(ViarensolviaPeer::RESOBT);

		$criteria->addSelectColumn(ViarensolviaPeer::BENINS);

		$criteria->addSelectColumn(ViarensolviaPeer::CONREC);

		$criteria->addSelectColumn(ViarensolviaPeer::ID);

	}

	const COUNT = 'COUNT(viarensolvia.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT viarensolvia.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViarensolviaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViarensolviaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ViarensolviaPeer::doSelectRS($criteria, $con);
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
		$objects = ViarensolviaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ViarensolviaPeer::populateObjects(ViarensolviaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ViarensolviaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ViarensolviaPeer::getOMClass();
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
		return ViarensolviaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ViarensolviaPeer::ID); 

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
			$comparison = $criteria->getComparison(ViarensolviaPeer::ID);
			$selectCriteria->add(ViarensolviaPeer::ID, $criteria->remove(ViarensolviaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ViarensolviaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ViarensolviaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Viarensolvia) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ViarensolviaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Viarensolvia $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ViarensolviaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ViarensolviaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ViarensolviaPeer::DATABASE_NAME, ViarensolviaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ViarensolviaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ViarensolviaPeer::DATABASE_NAME);

		$criteria->add(ViarensolviaPeer::ID, $pk);


		$v = ViarensolviaPeer::doSelect($criteria, $con);

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
			$criteria->add(ViarensolviaPeer::ID, $pks, Criteria::IN);
			$objs = ViarensolviaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseViarensolviaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ViarensolviaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ViarensolviaMapBuilder');
}
