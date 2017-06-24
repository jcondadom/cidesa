<?php


abstract class BaseHcliqreePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'hcliqree';

	
	const CLASS_DEFAULT = 'lib.model.hcm.Hcliqree';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODLIQ = 'hcliqree.CODLIQ';

	
	const CODEMP = 'hcliqree.CODEMP';

	
	const CEDFAM = 'hcliqree.CEDFAM';

	
	const TIPLIQ = 'hcliqree.TIPLIQ';

	
	const FECLIQ = 'hcliqree.FECLIQ';

	
	const MONSOL = 'hcliqree.MONSOL';

	
	const MONLIQ = 'hcliqree.MONLIQ';

	
	const OBSLIQ = 'hcliqree.OBSLIQ';

	
	const STATUS = 'hcliqree.STATUS';

	
	const FECAPR = 'hcliqree.FECAPR';

	
	const USRAPR = 'hcliqree.USRAPR';

	
	const STACIE = 'hcliqree.STACIE';

	
	const STACPR = 'hcliqree.STACPR';

	
	const FECAPRCP = 'hcliqree.FECAPRCP';

	
	const USRAPRCP = 'hcliqree.USRAPRCP';

	
	const CODCIE = 'hcliqree.CODCIE';

	
	const LOGUSE = 'hcliqree.LOGUSE';

	
	const ID = 'hcliqree.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codliq', 'Codemp', 'Cedfam', 'Tipliq', 'Fecliq', 'Monsol', 'Monliq', 'Obsliq', 'Status', 'Fecapr', 'Usrapr', 'Stacie', 'Stacpr', 'Fecaprcp', 'Usraprcp', 'Codcie', 'Loguse', 'Id', ),
		BasePeer::TYPE_COLNAME => array (HcliqreePeer::CODLIQ, HcliqreePeer::CODEMP, HcliqreePeer::CEDFAM, HcliqreePeer::TIPLIQ, HcliqreePeer::FECLIQ, HcliqreePeer::MONSOL, HcliqreePeer::MONLIQ, HcliqreePeer::OBSLIQ, HcliqreePeer::STATUS, HcliqreePeer::FECAPR, HcliqreePeer::USRAPR, HcliqreePeer::STACIE, HcliqreePeer::STACPR, HcliqreePeer::FECAPRCP, HcliqreePeer::USRAPRCP, HcliqreePeer::CODCIE, HcliqreePeer::LOGUSE, HcliqreePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codliq', 'codemp', 'cedfam', 'tipliq', 'fecliq', 'monsol', 'monliq', 'obsliq', 'status', 'fecapr', 'usrapr', 'stacie', 'stacpr', 'fecaprcp', 'usraprcp', 'codcie', 'loguse', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codliq' => 0, 'Codemp' => 1, 'Cedfam' => 2, 'Tipliq' => 3, 'Fecliq' => 4, 'Monsol' => 5, 'Monliq' => 6, 'Obsliq' => 7, 'Status' => 8, 'Fecapr' => 9, 'Usrapr' => 10, 'Stacie' => 11, 'Stacpr' => 12, 'Fecaprcp' => 13, 'Usraprcp' => 14, 'Codcie' => 15, 'Loguse' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (HcliqreePeer::CODLIQ => 0, HcliqreePeer::CODEMP => 1, HcliqreePeer::CEDFAM => 2, HcliqreePeer::TIPLIQ => 3, HcliqreePeer::FECLIQ => 4, HcliqreePeer::MONSOL => 5, HcliqreePeer::MONLIQ => 6, HcliqreePeer::OBSLIQ => 7, HcliqreePeer::STATUS => 8, HcliqreePeer::FECAPR => 9, HcliqreePeer::USRAPR => 10, HcliqreePeer::STACIE => 11, HcliqreePeer::STACPR => 12, HcliqreePeer::FECAPRCP => 13, HcliqreePeer::USRAPRCP => 14, HcliqreePeer::CODCIE => 15, HcliqreePeer::LOGUSE => 16, HcliqreePeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('codliq' => 0, 'codemp' => 1, 'cedfam' => 2, 'tipliq' => 3, 'fecliq' => 4, 'monsol' => 5, 'monliq' => 6, 'obsliq' => 7, 'status' => 8, 'fecapr' => 9, 'usrapr' => 10, 'stacie' => 11, 'stacpr' => 12, 'fecaprcp' => 13, 'usraprcp' => 14, 'codcie' => 15, 'loguse' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17,)
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hcm/map/HcliqreeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hcm.map.HcliqreeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HcliqreePeer::getTableMap();
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
		return str_replace(HcliqreePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HcliqreePeer::CODLIQ);

		$criteria->addSelectColumn(HcliqreePeer::CODEMP);

		$criteria->addSelectColumn(HcliqreePeer::CEDFAM);

		$criteria->addSelectColumn(HcliqreePeer::TIPLIQ);

		$criteria->addSelectColumn(HcliqreePeer::FECLIQ);

		$criteria->addSelectColumn(HcliqreePeer::MONSOL);

		$criteria->addSelectColumn(HcliqreePeer::MONLIQ);

		$criteria->addSelectColumn(HcliqreePeer::OBSLIQ);

		$criteria->addSelectColumn(HcliqreePeer::STATUS);

		$criteria->addSelectColumn(HcliqreePeer::FECAPR);

		$criteria->addSelectColumn(HcliqreePeer::USRAPR);

		$criteria->addSelectColumn(HcliqreePeer::STACIE);

		$criteria->addSelectColumn(HcliqreePeer::STACPR);

		$criteria->addSelectColumn(HcliqreePeer::FECAPRCP);

		$criteria->addSelectColumn(HcliqreePeer::USRAPRCP);

		$criteria->addSelectColumn(HcliqreePeer::CODCIE);

		$criteria->addSelectColumn(HcliqreePeer::LOGUSE);

		$criteria->addSelectColumn(HcliqreePeer::ID);

	}

	const COUNT = 'COUNT(hcliqree.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hcliqree.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HcliqreePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HcliqreePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HcliqreePeer::doSelectRS($criteria, $con);
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
		$objects = HcliqreePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HcliqreePeer::populateObjects(HcliqreePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HcliqreePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HcliqreePeer::getOMClass();
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
		return HcliqreePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HcliqreePeer::ID); 

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
			$comparison = $criteria->getComparison(HcliqreePeer::ID);
			$selectCriteria->add(HcliqreePeer::ID, $criteria->remove(HcliqreePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HcliqreePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HcliqreePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Hcliqree) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HcliqreePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Hcliqree $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HcliqreePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HcliqreePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HcliqreePeer::DATABASE_NAME, HcliqreePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HcliqreePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HcliqreePeer::DATABASE_NAME);

		$criteria->add(HcliqreePeer::ID, $pk);


		$v = HcliqreePeer::doSelect($criteria, $con);

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
			$criteria->add(HcliqreePeer::ID, $pks, Criteria::IN);
			$objs = HcliqreePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHcliqreePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hcm/map/HcliqreeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hcm.map.HcliqreeMapBuilder');
}
