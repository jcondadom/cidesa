<?php


abstract class BaseOpciecajPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'opciecaj';

	
	const CLASS_DEFAULT = 'lib.model.Opciecaj';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMREF = 'opciecaj.NUMREF';

	
	const FECCIE = 'opciecaj.FECCIE';

	
	const DESCON = 'opciecaj.DESCON';

	
	const CODUBI = 'opciecaj.CODUBI';

	
	const CODFIN = 'opciecaj.CODFIN';

	
	const CODCAJCHI = 'opciecaj.CODCAJCHI';

	
	const LOGUSE = 'opciecaj.LOGUSE';

	
	const MONCIE = 'opciecaj.MONCIE';

	
	const REFCOM = 'opciecaj.REFCOM';

	
	const REFPAG = 'opciecaj.REFPAG';

	
	const NUMCOM = 'opciecaj.NUMCOM';

	
	const ID = 'opciecaj.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numref', 'Feccie', 'Descon', 'Codubi', 'Codfin', 'Codcajchi', 'Loguse', 'Moncie', 'Refcom', 'Refpag', 'Numcom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OpciecajPeer::NUMREF, OpciecajPeer::FECCIE, OpciecajPeer::DESCON, OpciecajPeer::CODUBI, OpciecajPeer::CODFIN, OpciecajPeer::CODCAJCHI, OpciecajPeer::LOGUSE, OpciecajPeer::MONCIE, OpciecajPeer::REFCOM, OpciecajPeer::REFPAG, OpciecajPeer::NUMCOM, OpciecajPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numref', 'feccie', 'descon', 'codubi', 'codfin', 'codcajchi', 'loguse', 'moncie', 'refcom', 'refpag', 'numcom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numref' => 0, 'Feccie' => 1, 'Descon' => 2, 'Codubi' => 3, 'Codfin' => 4, 'Codcajchi' => 5, 'Loguse' => 6, 'Moncie' => 7, 'Refcom' => 8, 'Refpag' => 9, 'Numcom' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (OpciecajPeer::NUMREF => 0, OpciecajPeer::FECCIE => 1, OpciecajPeer::DESCON => 2, OpciecajPeer::CODUBI => 3, OpciecajPeer::CODFIN => 4, OpciecajPeer::CODCAJCHI => 5, OpciecajPeer::LOGUSE => 6, OpciecajPeer::MONCIE => 7, OpciecajPeer::REFCOM => 8, OpciecajPeer::REFPAG => 9, OpciecajPeer::NUMCOM => 10, OpciecajPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('numref' => 0, 'feccie' => 1, 'descon' => 2, 'codubi' => 3, 'codfin' => 4, 'codcajchi' => 5, 'loguse' => 6, 'moncie' => 7, 'refcom' => 8, 'refpag' => 9, 'numcom' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OpciecajMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OpciecajMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OpciecajPeer::getTableMap();
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
		return str_replace(OpciecajPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OpciecajPeer::NUMREF);

		$criteria->addSelectColumn(OpciecajPeer::FECCIE);

		$criteria->addSelectColumn(OpciecajPeer::DESCON);

		$criteria->addSelectColumn(OpciecajPeer::CODUBI);

		$criteria->addSelectColumn(OpciecajPeer::CODFIN);

		$criteria->addSelectColumn(OpciecajPeer::CODCAJCHI);

		$criteria->addSelectColumn(OpciecajPeer::LOGUSE);

		$criteria->addSelectColumn(OpciecajPeer::MONCIE);

		$criteria->addSelectColumn(OpciecajPeer::REFCOM);

		$criteria->addSelectColumn(OpciecajPeer::REFPAG);

		$criteria->addSelectColumn(OpciecajPeer::NUMCOM);

		$criteria->addSelectColumn(OpciecajPeer::ID);

	}

	const COUNT = 'COUNT(opciecaj.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT opciecaj.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpciecajPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpciecajPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OpciecajPeer::doSelectRS($criteria, $con);
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
		$objects = OpciecajPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OpciecajPeer::populateObjects(OpciecajPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OpciecajPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OpciecajPeer::getOMClass();
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
		return OpciecajPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OpciecajPeer::ID); 

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
			$comparison = $criteria->getComparison(OpciecajPeer::ID);
			$selectCriteria->add(OpciecajPeer::ID, $criteria->remove(OpciecajPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OpciecajPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OpciecajPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Opciecaj) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OpciecajPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Opciecaj $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OpciecajPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OpciecajPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OpciecajPeer::DATABASE_NAME, OpciecajPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OpciecajPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OpciecajPeer::DATABASE_NAME);

		$criteria->add(OpciecajPeer::ID, $pk);


		$v = OpciecajPeer::doSelect($criteria, $con);

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
			$criteria->add(OpciecajPeer::ID, $pks, Criteria::IN);
			$objs = OpciecajPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOpciecajPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OpciecajMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OpciecajMapBuilder');
}
