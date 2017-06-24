<?php


abstract class BaseMancatmatPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mancatmat';

	
	const CLASS_DEFAULT = 'lib.model.mantenimiento.Mancatmat';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSOL = 'mancatmat.NUMSOL';

	
	const FECSOL = 'mancatmat.FECSOL';

	
	const UNISOL = 'mancatmat.UNISOL';

	
	const JUSSOL = 'mancatmat.JUSSOL';

	
	const NOMITE = 'mancatmat.NOMITE';

	
	const DESITE = 'mancatmat.DESITE';

	
	const UNIMED = 'mancatmat.UNIMED';

	
	const PESO = 'mancatmat.PESO';

	
	const VOLUME = 'mancatmat.VOLUME';

	
	const OBSSOL = 'mancatmat.OBSSOL';

	
	const LOGUSE = 'mancatmat.LOGUSE';

	
	const ID = 'mancatmat.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol', 'Fecsol', 'Unisol', 'Jussol', 'Nomite', 'Desite', 'Unimed', 'Peso', 'Volume', 'Obssol', 'Loguse', 'Id', ),
		BasePeer::TYPE_COLNAME => array (MancatmatPeer::NUMSOL, MancatmatPeer::FECSOL, MancatmatPeer::UNISOL, MancatmatPeer::JUSSOL, MancatmatPeer::NOMITE, MancatmatPeer::DESITE, MancatmatPeer::UNIMED, MancatmatPeer::PESO, MancatmatPeer::VOLUME, MancatmatPeer::OBSSOL, MancatmatPeer::LOGUSE, MancatmatPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol', 'fecsol', 'unisol', 'jussol', 'nomite', 'desite', 'unimed', 'peso', 'volume', 'obssol', 'loguse', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol' => 0, 'Fecsol' => 1, 'Unisol' => 2, 'Jussol' => 3, 'Nomite' => 4, 'Desite' => 5, 'Unimed' => 6, 'Peso' => 7, 'Volume' => 8, 'Obssol' => 9, 'Loguse' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (MancatmatPeer::NUMSOL => 0, MancatmatPeer::FECSOL => 1, MancatmatPeer::UNISOL => 2, MancatmatPeer::JUSSOL => 3, MancatmatPeer::NOMITE => 4, MancatmatPeer::DESITE => 5, MancatmatPeer::UNIMED => 6, MancatmatPeer::PESO => 7, MancatmatPeer::VOLUME => 8, MancatmatPeer::OBSSOL => 9, MancatmatPeer::LOGUSE => 10, MancatmatPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol' => 0, 'fecsol' => 1, 'unisol' => 2, 'jussol' => 3, 'nomite' => 4, 'desite' => 5, 'unimed' => 6, 'peso' => 7, 'volume' => 8, 'obssol' => 9, 'loguse' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/mantenimiento/map/MancatmatMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.mantenimiento.map.MancatmatMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MancatmatPeer::getTableMap();
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
		return str_replace(MancatmatPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MancatmatPeer::NUMSOL);

		$criteria->addSelectColumn(MancatmatPeer::FECSOL);

		$criteria->addSelectColumn(MancatmatPeer::UNISOL);

		$criteria->addSelectColumn(MancatmatPeer::JUSSOL);

		$criteria->addSelectColumn(MancatmatPeer::NOMITE);

		$criteria->addSelectColumn(MancatmatPeer::DESITE);

		$criteria->addSelectColumn(MancatmatPeer::UNIMED);

		$criteria->addSelectColumn(MancatmatPeer::PESO);

		$criteria->addSelectColumn(MancatmatPeer::VOLUME);

		$criteria->addSelectColumn(MancatmatPeer::OBSSOL);

		$criteria->addSelectColumn(MancatmatPeer::LOGUSE);

		$criteria->addSelectColumn(MancatmatPeer::ID);

	}

	const COUNT = 'COUNT(mancatmat.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mancatmat.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MancatmatPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MancatmatPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MancatmatPeer::doSelectRS($criteria, $con);
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
		$objects = MancatmatPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MancatmatPeer::populateObjects(MancatmatPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MancatmatPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MancatmatPeer::getOMClass();
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
		return MancatmatPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MancatmatPeer::ID); 

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
			$comparison = $criteria->getComparison(MancatmatPeer::ID);
			$selectCriteria->add(MancatmatPeer::ID, $criteria->remove(MancatmatPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MancatmatPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MancatmatPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Mancatmat) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MancatmatPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Mancatmat $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MancatmatPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MancatmatPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(MancatmatPeer::DATABASE_NAME, MancatmatPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MancatmatPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(MancatmatPeer::DATABASE_NAME);

		$criteria->add(MancatmatPeer::ID, $pk);


		$v = MancatmatPeer::doSelect($criteria, $con);

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
			$criteria->add(MancatmatPeer::ID, $pks, Criteria::IN);
			$objs = MancatmatPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMancatmatPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/mantenimiento/map/MancatmatMapBuilder.php';
	Propel::registerMapBuilder('lib.model.mantenimiento.map.MancatmatMapBuilder');
}
