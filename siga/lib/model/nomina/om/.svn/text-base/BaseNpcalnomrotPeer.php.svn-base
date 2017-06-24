<?php


abstract class BaseNpcalnomrotPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npcalnomrot';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npcalnomrot';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODTUR = 'npcalnomrot.CODTUR';

	
	const CODGRU = 'npcalnomrot.CODGRU';

	
	const CODNOM = 'npcalnomrot.CODNOM';

	
	const FECJOR = 'npcalnomrot.FECJOR';

	
	const CODJOR = 'npcalnomrot.CODJOR';

	
	const NUMDIA = 'npcalnomrot.NUMDIA';

	
	const DIASEM = 'npcalnomrot.DIASEM';

	
	const ID = 'npcalnomrot.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codtur', 'Codgru', 'Codnom', 'Fecjor', 'Codjor', 'Numdia', 'Diasem', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpcalnomrotPeer::CODTUR, NpcalnomrotPeer::CODGRU, NpcalnomrotPeer::CODNOM, NpcalnomrotPeer::FECJOR, NpcalnomrotPeer::CODJOR, NpcalnomrotPeer::NUMDIA, NpcalnomrotPeer::DIASEM, NpcalnomrotPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codtur', 'codgru', 'codnom', 'fecjor', 'codjor', 'numdia', 'diasem', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codtur' => 0, 'Codgru' => 1, 'Codnom' => 2, 'Fecjor' => 3, 'Codjor' => 4, 'Numdia' => 5, 'Diasem' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (NpcalnomrotPeer::CODTUR => 0, NpcalnomrotPeer::CODGRU => 1, NpcalnomrotPeer::CODNOM => 2, NpcalnomrotPeer::FECJOR => 3, NpcalnomrotPeer::CODJOR => 4, NpcalnomrotPeer::NUMDIA => 5, NpcalnomrotPeer::DIASEM => 6, NpcalnomrotPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codtur' => 0, 'codgru' => 1, 'codnom' => 2, 'fecjor' => 3, 'codjor' => 4, 'numdia' => 5, 'diasem' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpcalnomrotMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpcalnomrotMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpcalnomrotPeer::getTableMap();
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
		return str_replace(NpcalnomrotPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpcalnomrotPeer::CODTUR);

		$criteria->addSelectColumn(NpcalnomrotPeer::CODGRU);

		$criteria->addSelectColumn(NpcalnomrotPeer::CODNOM);

		$criteria->addSelectColumn(NpcalnomrotPeer::FECJOR);

		$criteria->addSelectColumn(NpcalnomrotPeer::CODJOR);

		$criteria->addSelectColumn(NpcalnomrotPeer::NUMDIA);

		$criteria->addSelectColumn(NpcalnomrotPeer::DIASEM);

		$criteria->addSelectColumn(NpcalnomrotPeer::ID);

	}

	const COUNT = 'COUNT(npcalnomrot.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npcalnomrot.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpcalnomrotPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpcalnomrotPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpcalnomrotPeer::doSelectRS($criteria, $con);
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
		$objects = NpcalnomrotPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpcalnomrotPeer::populateObjects(NpcalnomrotPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpcalnomrotPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpcalnomrotPeer::getOMClass();
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
		return NpcalnomrotPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpcalnomrotPeer::ID); 

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
			$comparison = $criteria->getComparison(NpcalnomrotPeer::ID);
			$selectCriteria->add(NpcalnomrotPeer::ID, $criteria->remove(NpcalnomrotPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpcalnomrotPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpcalnomrotPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npcalnomrot) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpcalnomrotPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npcalnomrot $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpcalnomrotPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpcalnomrotPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpcalnomrotPeer::DATABASE_NAME, NpcalnomrotPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpcalnomrotPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpcalnomrotPeer::DATABASE_NAME);

		$criteria->add(NpcalnomrotPeer::ID, $pk);


		$v = NpcalnomrotPeer::doSelect($criteria, $con);

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
			$criteria->add(NpcalnomrotPeer::ID, $pks, Criteria::IN);
			$objs = NpcalnomrotPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpcalnomrotPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpcalnomrotMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpcalnomrotMapBuilder');
}
