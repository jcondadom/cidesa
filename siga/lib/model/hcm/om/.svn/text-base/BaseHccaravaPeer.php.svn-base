<?php


abstract class BaseHccaravaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'hccarava';

	
	const CLASS_DEFAULT = 'lib.model.hcm.Hccarava';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCAR = 'hccarava.NUMCAR';

	
	const CODEMP = 'hccarava.CODEMP';

	
	const CEDFAM = 'hccarava.CEDFAM';

	
	const RIFPRO = 'hccarava.RIFPRO';

	
	const FECCAR = 'hccarava.FECCAR';

	
	const CONCAR = 'hccarava.CONCAR';

	
	const MONCAR = 'hccarava.MONCAR';

	
	const OBSERV = 'hccarava.OBSERV';

	
	const NUMPRE = 'hccarava.NUMPRE';

	
	const FECPRE = 'hccarava.FECPRE';

	
	const LOGUSE = 'hccarava.LOGUSE';

	
	const ID = 'hccarava.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcar', 'Codemp', 'Cedfam', 'Rifpro', 'Feccar', 'Concar', 'Moncar', 'Observ', 'Numpre', 'Fecpre', 'Loguse', 'Id', ),
		BasePeer::TYPE_COLNAME => array (HccaravaPeer::NUMCAR, HccaravaPeer::CODEMP, HccaravaPeer::CEDFAM, HccaravaPeer::RIFPRO, HccaravaPeer::FECCAR, HccaravaPeer::CONCAR, HccaravaPeer::MONCAR, HccaravaPeer::OBSERV, HccaravaPeer::NUMPRE, HccaravaPeer::FECPRE, HccaravaPeer::LOGUSE, HccaravaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcar', 'codemp', 'cedfam', 'rifpro', 'feccar', 'concar', 'moncar', 'observ', 'numpre', 'fecpre', 'loguse', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcar' => 0, 'Codemp' => 1, 'Cedfam' => 2, 'Rifpro' => 3, 'Feccar' => 4, 'Concar' => 5, 'Moncar' => 6, 'Observ' => 7, 'Numpre' => 8, 'Fecpre' => 9, 'Loguse' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (HccaravaPeer::NUMCAR => 0, HccaravaPeer::CODEMP => 1, HccaravaPeer::CEDFAM => 2, HccaravaPeer::RIFPRO => 3, HccaravaPeer::FECCAR => 4, HccaravaPeer::CONCAR => 5, HccaravaPeer::MONCAR => 6, HccaravaPeer::OBSERV => 7, HccaravaPeer::NUMPRE => 8, HccaravaPeer::FECPRE => 9, HccaravaPeer::LOGUSE => 10, HccaravaPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('numcar' => 0, 'codemp' => 1, 'cedfam' => 2, 'rifpro' => 3, 'feccar' => 4, 'concar' => 5, 'moncar' => 6, 'observ' => 7, 'numpre' => 8, 'fecpre' => 9, 'loguse' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hcm/map/HccaravaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hcm.map.HccaravaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HccaravaPeer::getTableMap();
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
		return str_replace(HccaravaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HccaravaPeer::NUMCAR);

		$criteria->addSelectColumn(HccaravaPeer::CODEMP);

		$criteria->addSelectColumn(HccaravaPeer::CEDFAM);

		$criteria->addSelectColumn(HccaravaPeer::RIFPRO);

		$criteria->addSelectColumn(HccaravaPeer::FECCAR);

		$criteria->addSelectColumn(HccaravaPeer::CONCAR);

		$criteria->addSelectColumn(HccaravaPeer::MONCAR);

		$criteria->addSelectColumn(HccaravaPeer::OBSERV);

		$criteria->addSelectColumn(HccaravaPeer::NUMPRE);

		$criteria->addSelectColumn(HccaravaPeer::FECPRE);

		$criteria->addSelectColumn(HccaravaPeer::LOGUSE);

		$criteria->addSelectColumn(HccaravaPeer::ID);

	}

	const COUNT = 'COUNT(hccarava.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hccarava.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HccaravaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HccaravaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HccaravaPeer::doSelectRS($criteria, $con);
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
		$objects = HccaravaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HccaravaPeer::populateObjects(HccaravaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HccaravaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HccaravaPeer::getOMClass();
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
		return HccaravaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HccaravaPeer::ID); 

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
			$comparison = $criteria->getComparison(HccaravaPeer::ID);
			$selectCriteria->add(HccaravaPeer::ID, $criteria->remove(HccaravaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HccaravaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HccaravaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Hccarava) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HccaravaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Hccarava $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HccaravaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HccaravaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HccaravaPeer::DATABASE_NAME, HccaravaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HccaravaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HccaravaPeer::DATABASE_NAME);

		$criteria->add(HccaravaPeer::ID, $pk);


		$v = HccaravaPeer::doSelect($criteria, $con);

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
			$criteria->add(HccaravaPeer::ID, $pks, Criteria::IN);
			$objs = HccaravaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHccaravaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hcm/map/HccaravaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hcm.map.HccaravaMapBuilder');
}
